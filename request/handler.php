<?php
parse_str($_POST['orderlist'], $orderlist);
parse_str($_POST['userdata'], $userdata);
/*
$orderlist - массив со списком заказа
$userdata - данные заказчика
*/

// При желании, можно посмотреть полученные данные, записав их в файл:
file_put_contents('cart_data_log.txt', var_export($orderlist, 1) . "\r\n");
file_put_contents('cart_data_log.txt', var_export($userdata, 1), FILE_APPEND);

// Заголовок письма
$subject = 'Заказ от '.date('d.m.Y').'г.'; // Заказ через корзину
$subject2 = 'Запрос на звонок '.date('H:i:s / d.m.Y').'г.'; // Заказ звонка
// ваш Email
$admin_mail = 'idiasoftgroup@gmail.com';
// Email заказчика (как fallback - ваш же Email)
$to = !empty($userdata['user_mail']) ? $userdata['user_mail'] : $admin_mail;

$token = "1793100576:AAEPdhzR3Ogn2X-zwxNYLg48bSYHgG6zZWQ";
$chat_id = "-1001571347347";

function formatNumber($priceSum): string
{
    $price = strval($priceSum);
    $formattedPrice = '';
    $length = strlen($price);
    $mn = 0;

    for ($ij = $length; $ij > 0; $ij--) {
        if ($mn % 3 === 0 && $mn !== 0) {
            $formattedPrice = ' ' . $formattedPrice;
        }
        $formattedPrice = $price[$ij - 1] . $formattedPrice;
        $mn++;
    }

    return $formattedPrice;
}

/* Формируем таблицу с заказанными товарами */
$tbl = '<table style="width: 100%; border-collapse: collapse;">
            <tr>
                <th style="width: 3%; border: 1px solid #333333; padding: 10px; background-color: #cbcbcb"><b>№</b></th>
                <th style="width: 5%; border: 1px solid #333333; padding: 10px;">ID</th>
                <th style="width: 2%; border: 1px solid #333333; padding: 10px;"></th>
                <th style="border: 1px solid #333333; padding: 5px;">Наименование</th>
                <th style="border: 1px solid #333333; padding: 5px;">Цена</th>
                <th style="border: 1px solid #333333; padding: 5px;">Кол-во</th>
                <th style="border: 1px solid #333333; padding: 5px;">Сумма</th>
            </tr>';

$total_sum = 0;

$index = 0;
foreach($orderlist as $id => $item_data) {
    $total_sum_each = (float)$item_data['count'] * (float)$item_data['price'];
    $total_sum += (float)$item_data['count'] * (float)$item_data['price'];

    $index++;

    $tbl .= '
    <tr>
        <td style="border: 1px solid #333333; padding: 5px; text-align: center;"><b>'.$index.'</b></td>
        <td style="border: 1px solid #333333; padding: 5px; text-align: center;">'.$item_data['id'].'</td>
        <td style="border: 1px solid #333333; padding: 7.5px 15px; text-align: center;"><img src="https://softgroup.kz'.$item_data['img'].'" alt="" style="max-width: 120px; max-height: 120px;"></td>
        <td style="border: 1px solid #333333;"><div style="margin-left: 50px; text-decoration: none;">'.$item_data['title'].'</div></td>
        <td style="text-align: center; border: 1px solid #333333; padding: 5px;">'.formatNumber($item_data['price']).' ₸</td>
        <td style="text-align: center; border: 1px solid #333333; padding: 5px;">'.$item_data['count'].'</td>
        <td style="text-align: center; border: 1px solid #333333; padding: 5px;">'.formatNumber($total_sum_each).' ₸</td>
    </tr>';
}

$tbl .= '<tr>
            <td style="border: 1px solid #333333; border-right: none; padding: 10px;" colspan="4"><b><i>Итого:</i></b></td>
            <td style="border: 1px solid #333333; border-left: none; border-right: none; padding: 10px;"></td>
            <td style="border: 1px solid #333333; border-left: none; border-right: none; padding: 10px;"></td>
            <td style="border: 1px solid #333333; text-align: center;  border-left: none; padding: 10px;"><b><i>'.formatNumber($total_sum).' ₸</i></b></td>
        </tr>
</table>';

// Тело письма
$body = '
<html> 
<head>
 <title>'.$subject.'</title></head>
<body>
  <p>Информация о заказчике:</p>
	<ul>
		<li><b>Имя клиента:</b> '.$userdata['user_name'].'</li>
		<li><b>Тел.:</b> '.$userdata['user_phone'].'</li>
		<li><b>Email:</b> '.$userdata['user_mail'].'</li>
		<li><b>Адрес:</b> '.$userdata['user_address'].'</li>
		<li><b>Комментарий:</b> '.$userdata['user_comment'].'</li>
	</ul>
	<p>Информация о заказе:</p>
  '.$tbl.'
	<p>Отправитель: сайт softgroup.kz</p>
</body>
</html>';

function prettyNumber($phone_number) {
    $phone_number = preg_replace('/\D/', '', $phone_number);
    return preg_replace('/(\d{3})(\d{3})(\d{2})(\d{2})/', '$1 $2 $3 $4', $phone_number);
}

$body2 = '<html>
<head>
  <title>'.$subject2. '</title>
</head>
<body>
    <p style="color: #244556;font-weight: 700;font-size: 14px;"><span style="color: #2e4856;font-size: 16px;">Заказ звонка</span></p>
    <p style="color: #274f63;font-weight: 700;font-size: 14px;">Имя клиента: <span style="color: #2e4856;font-size: 16px;">'.$userdata['user_name'].'</span></p>
    <p style="color: #274f63;font-weight: 700;font-size: 14px;">Номер: <span style="color: #2e4856;font-size: 16px;">+7 ' .prettyNumber($userdata['user_phone']). '</span></p>
    <p style="color: #274f63;font-weight: 700;font-size: 14px;">Время: <span style="color: #1c272d;">' .date('H:i:s / d.m.Y').'г.</span></p>
    <p style="color: #274f63;font-weight: 700;font-size: 14px;">Отправитель: <span style="color: #6ca7fb;">softgroup.kz</span></p>
</body>
</html>'; // Заказ звонка


// Заголовки
$headers   = []; // или $headers = array() для версии ниже 5.4
$headers[] = 'MIME-Version: 1.0'; // Обязательный заголовок
$headers[] = 'Content-type: text/html; charset=utf-8'; // Обязательный заголовок. Кодировку изменить при необходимости
$headers[] = 'From: Softgroup.kz <zakaz@softgroup.kz>'; // От кого
$headers[] = 'Bcc: Admin <'.$admin_mail.'>'; // скрытая копия админу сайта, т.е. вам
$headers[] = 'X-Mailer: PHP/'.phpversion();

/* Отправка */
if ($userdata['user_phone'] && $userdata['user_name'] && !$userdata['user_mail']) {
    $send_phone = mail($to, $subject2, $body2, implode("\r\n", $headers));
    $response = [
       
	'errors' => !$send_phone,
	'message' => $send_phone ? 'Заказ принят в обработку!' : 'Хьюстон! У нас проблемы!'
    ];
} else {
    $send_ok = mail($to, $subject, $body, implode("\r\n", $headers));
    $response = [
       
	'errors' => !$send_ok,
	'message' => $send_ok ? 'Заказ принят в обработку!' : 'Хьюстон! У нас проблемы!'
    ];
}

exit(json_encode($response));
?>