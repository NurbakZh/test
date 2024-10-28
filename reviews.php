<?php
//---------------------------------------------
$link = $_SERVER['DOCUMENT_ROOT'] . '/admin/db/config.php';
require_once($link);
//---------------------------------------------
$notification = $_SESSION["NOTIFICATION"];
unset($_SESSION['NOTIFICATION']);
//--------------------------------------------
/* Reviews */
$itemsViewPage = 5;
$page = (int)($_GET['page'] ?? 1);
$offset = ($page - 1) * $itemsViewPage;
$reviews = getReviewsPagePagination($offset, $itemsViewPage);
/* Pagination */
$totalItems = getTotalCommentsCount();
$totalPages = ceil($totalItems / $itemsViewPage);
$startPage = max($page - 2, 1);
$endPage = min($page + 2, $totalPages);
//--------------------------------------------
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Отзывы наших клиентов о работе компании – SoftGroup.kz</title>
    <!-- Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="description" content="Отзывы клиентов о компании SoftGroup. Все отзывы публикуются без предварительного рецензирования. Отправить жалобу, благодарность за работу Softgroup.kz в Актау">
    <!-- CSS -->
    <link href="/css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
    <link href="/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
    <link href="/css/style.css" rel="stylesheet" type="text/css" media="all">
    <link href="/css/font-awesome.css" rel="stylesheet" type="text/css" media="all">
    <link href="/css/jquery.cart.css" rel="stylesheet" type="text/css" media="all">
    <link href="/css/jquery.slick.css" rel="stylesheet" type="text/css" media="all">
    <!-- Icon -->
    <link href="/images/favicon.ico" rel="shortcut icon" type="image/x-icon">
    <!-- Google Recaptcha -->
    <script src="https://www.google.com/recaptcha/api.js">
    <script src="https://www.google.com/recaptcha/api.js?render=<?= RE_CAPTCHA_SITE_KEY ?>>"></script>
    <!-- Google Tag Manager -->
    <script>(function (w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start':
                    new Date().getTime(), event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-T3HWCNF');</script>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-E0MLEWZE9L"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'G-E0MLEWZE9L');
    </script>
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T3HWCNF" height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->
<!-- Header -->
<div class="header-bot">
    <div class="loaf_header">
        <label class="btn back_btn" onclick="history.back()">
            <i class="fa fa-angle-left" aria-hidden="true"></i>
        </label>
        <div class="logo">
            <a href="index.html">
                <span>Soft</span>
                <p>Gr</p>
                <img src="/images/header/globs.webp" alt="logo">
                <p>up</p>
            </a>
        </div>
        <input type="radio" name="slider" id="menu_btn">
        <input type="radio" name="slider" id="close_btn">
        <ul class="loaf_header_links">
            <label for="close_btn" class="btn close_btn">
                <i class="fa fa-times" aria-hidden="true"></i>
            </label>
            <li><a href="index.html" class="loaf_header_links_line">Главная</a></li>
            <li>
                <a href="products.html" class="desktop_item loaf_header_links_line">Оборудование</a>
                <input type="checkbox" id="showProducts">
                <label for="showProducts" class="mobile_item">Оборудование</label>
                <div class="products_box">
                    <div class="products_content">
                        <div class="products_content_column">
                            <img src="/images/header/icon_1.webp" alt="Icons">
                        </div>
                        <div class="products_content_column">
                            <ul class="products_box_list">
                                <li><a href="pos.html" data-image="/images/header/icon_1.webp">POS системы</a></li>
                                <li><a href="computer.html" data-image="/images/header/icon_2.webp">Компьютеры</a></li>
                                <li><a href="scanner.html" data-image="/images/header/icon_3.webp">Сканеры штрих-кодов</a></li>
                            </ul>
                        </div>
                        <div class="products_content_column">
                            <ul class="products_box_list">
                                <li><a href="printer.html" data-image="/images/header/icon_4.webp">Принтеры чеков и этикеток</a></li>
                                <li><a href="till.html" data-image="/images/header/icon_5.webp">Денежные ящики</a></li>
                                <li><a href="scale.html" data-image="/images/header/icon_6.webp">Весы электронные</a></li>
                            </ul>
                        </div>
                        <div class="products_content_column">
                            <ul class="products_box_list">
                                <li><a href="terminal.html" data-image="/images/header/icon_7.webp">Терминалы</a></li>
                                <li><a href="banknotes.html" data-image="/images/header/icon_8.webp">Счетчики и детекторы</a></li>
                                <li><a href="eas.html" data-image="/images/header/icon_9.webp">Антикражное оборудование</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <a href="programs.html" class="desktop_item loaf_header_links_line">Программы</a>
                <input type="checkbox" id="showPrograms">
                <label for="showPrograms" class="mobile_item">Программы</label>
                <ul class="programs_list">
                    <li><a href="programs.html#one_c"><img src="/images/header/1_1c.webp" alt="1c">1С Розница</a></li>
                    <li><a href="programs.html#r_keeper"><img src="/images/header/2_r_keeper.webp" alt="r_keeper">R-keeper</a></li>
                    <li><a href="programs.html#umag"><img src="/images/header/3_umag.webp" alt="umag">Umag</a></li>
                </ul>
            </li>
            <li><a href="automation.html" class="loaf_header_links_line">Автоматизация</a></li>
            <li><a href="reviews.php" class="loaf_header_links_line">Отзывы</a></li>
            <li><a href="about.html" class="loaf_header_links_line">О нас</a></li>
            <li><a href="contact.html" class="loaf_header_links_line">Контакты</a></li>
        </ul>
        <label for="menu_btn" class="btn menu_btn">
            <i class="fa fa-align-justify" aria-hidden="true"></i>
        </label>
    </div>
    <div class="boot_header">
        <div class="boot_header_container">
            <div class="burger_btn">
                <div class="burger_text">
                    <span><i class="fa fa-th-large fa-2x" aria-hidden="true"></i><p>&nbsp; Каталог товаров</p></span>
                    <span><i class="fa fa-th-large fa-2x" aria-hidden="true"></i><p>&nbsp; Каталог товаров</p></span>
                </div>
            </div>
            <div class="search_box">
                <span class="search_box_btn">
                    <i class="fa fa-search"></i>
                </span>
                <label for="search_box_input"></label>
                <input class="search_box_input" autocomplete="off" id="search_box_input" type="text">
            </div>
            <div class="contact_info">
                <div class="contact_info_btn">
                    <span class="contact_city_name">Алматы</span>
                    <span class="contact_info_arrow"></span>
                    <span class="contact_city_number">
                        <a href="tel:87273449900"> &nbsp 8 (727) <span class="contact_city_number_b">344-99-00</span></a>
                    </span>
                    <div class="cont_icon_menu">
                        <div class="cont_circle_0 fa fa-phone" aria-hidden="true"></div>
                        <div class="cont_circle_1"></div>
                        <div class="cont_circle_2"></div>
                        <div class="cont_circle_3"></div>
                        <div class="cont_circle_4"></div>
                    </div>
                </div>
                <div class="contact_drop_down">
                    <div class="contact_drop_down_items">
                        <div class="contact_drop_down_city">
                            <span class="contact_drop_down_item_line"></span>
                            <span class="contact_drop_down_item_city contact_drop_down_city_hidden">Алматы</span>
                        </div>
                        <div class="contact_drop_down_item_number">
                            <a href="tel:87012667700"> +7 (701) <span class="contact_city_number_b">266-77-00</span></a>
                        </div>
                    </div>
                    <br>
                    <div class="contact_drop_down_items">
                        <div class="contact_drop_down_city">
                            <span class="contact_drop_down_item_line"></span>
                            <span class="contact_drop_down_item_city">Астана</span>
                        </div>
                        <div class="contact_drop_down_item_number">
                            <a href="tel:87172279900" class="contact_drop_down_mobile_hidden"> &nbsp 8 (7172) <span class="contact_city_number_b">27-99-00</span></a>
                            <br class="contact_drop_down_mobile_hidden">
                            <a href="tel:87015112200"> +7 (701) <span class="contact_city_number_b">511-22-00</span></a>
                        </div>
                    </div>
                    <br>
                    <div class="contact_drop_down_items">
                        <div class="contact_drop_down_city">
                            <span class="contact_drop_down_item_line"></span>
                            <span class="contact_drop_down_item_city">Шымкент</span>
                        </div>
                        <div class="contact_drop_down_item_number">
                            <a href="tel:87252399900" class="contact_drop_down_mobile_hidden"> &nbsp 8 (7252) <span class="contact_city_number_b">39-99-00</span></a>
                            <br class="contact_drop_down_mobile_hidden">
                            <a href="tel:87019447700"> +7 (701) <span class="contact_city_number_b">944-77-00</span></a>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
            <div class="open_cart_btn" id="open_cart_btn">
                <img src="/images/header/cart.webp" alt="Cart">
                <p>Корзина</p>
                <span class="open_cart_number label-place"></span>
            </div>
        </div>
    </div>
    <div class="burger_category_menu">
        <button class="burger_menu_close">
            <div class="close-container">
                <div class="burger_menu_left"></div>
                <div class="burger_menu_right"></div>
            </div>
        </button>
        <ul class="burger_menu_content">
            <li class="burger_category_items">
                <a href="pos.html">
                    <ul class="burger_category_parent">
                        <div class="burger_category_title">
                            <img src="/images/header/icon_1s.webp" alt="pos">
                            <h3>POS системы</h3>
                        </div>
                        <div class="burger_category_arrow"></div>
                    </ul>
                </a>
                <ul class="burger_category_children">
                    <li>
                        <a href="pos_monoblock.html">
                            <img src="/images/header/icon_1s_1.webp" alt="pos">
                            <h4>Сенсорные моноблоки</h4>
                        </a>
                    </li>
                    <li>
                        <a href="pos_system.html">
                            <img src="/images/header/icon_1s_2.webp" alt="pos">
                            <h4>POS системы</h4>
                        </a>
                    </li>
                    <li>
                        <a href="pos_accessories.html">
                            <img src="/images/header/icon_1s_3.webp" alt="pos">
                            <h4>Комплектующие</h4>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="burger_category_items">
                <a href="computer.html">
                    <ul class="burger_category_parent">
                        <div class="burger_category_title">
                            <img src="/images/header/icon_2s.webp" alt="computer">
                            <h3>Компьютеры и комплектующие</h3>
                        </div>
                        <div class="burger_category_arrow"></div>
                    </ul>
                </a>
                <ul class="burger_category_children">
                    <li>
                        <a href="computer_block.html">
                            <img src="/images/header/icon_2s_1.webp" alt="computer">
                            <h4>Блок системы</h4>
                        </a>
                    </li>
                    <li>
                        <a href="computer_periferiya.html">
                            <img src="/images/header/icon_2s_2.webp" alt="computer">
                            <h4>Монитор и периферия</h4>
                        </a>
                    </li>
                    <li>
                        <a href="/computer_chair.html">
                            <img src="/images/header/icon_2s_3.webp" alt="computer">
                            <h4>Офисные стулья и кресла</h4>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="burger_category_items">
                <a href="scanner.html">
                    <ul class="burger_category_parent">
                        <div class="burger_category_title">
                            <img src="/images/header/icon_3s.webp" alt="scanner">
                            <h3>Сканеры штрих-кодов</h3>
                        </div>
                        <div class="burger_category_arrow"></div>
                    </ul>
                </a>
                <ul class="burger_category_children">
                    <li>
                        <a href="scanner_hand.html">
                            <img src="/images/header/icon_3s_1.webp" alt="scanner">
                            <h4>Ручные сканеры штрих-кодов</h4>
                        </a>
                    </li>
                    <li>
                        <a href="scanner_desktop.html">
                            <img src="/images/header/icon_3s_2.webp" alt="scanner">
                            <h4>Настольные сканеры штрих-кодов</h4>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="burger_category_items">
                <a href="printer.html">
                    <ul class="burger_category_parent">
                        <div class="burger_category_title">
                            <img src="/images/header/icon_4s.webp" alt="printer">
                            <h3>Принтеры чеков и этикеток</h3>
                        </div>
                        <div class="burger_category_arrow"></div>
                    </ul>
                </a>
                <ul class="burger_category_children">
                    <li>
                        <a href="printer_receipt.html">
                            <img src="/images/header/icon_4s_1.webp" alt="printer">
                            <h4>Принтеры чеков</h4>
                        </a>
                    </li>
                    <li>
                        <a href="printer_label.html">
                            <img src="/images/header/icon_4s_2.webp" alt="printer">
                            <h4>Принтеры этикеток</h4>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="burger_category_items">
                <a href="till.html">
                    <ul class="burger_category_parent">
                        <div class="burger_category_title">
                            <img src="/images/header/icon_5s.webp" alt="till">
                            <h3>Денежные ящики</h3>
                        </div>
                    </ul>
                </a>
            </li>
            <li class="burger_category_items">
                <a href="scale.html">
                    <ul class="burger_category_parent">
                        <div class="burger_category_title">
                            <img src="/images/header/icon_6s.webp" alt="scale">
                            <h3>Весы электронные</h3>
                        </div>
                        <div class="burger_category_arrow"></div>
                    </ul>
                </a>
                <ul class="burger_category_children">
                    <li>
                        <a href="scale_none.html">
                            <img src="/images/header/icon_6s_1.webp" alt="scale">
                            <h4>Весы без печати этикеток</h4>
                        </a>
                    </li>
                    <li>
                        <a href="scale_with.html">
                            <img src="/images/header/icon_6s_2.webp" alt="scale">
                            <h4>Весы с печатью этикеток</h4>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="burger_category_items">
                <a href="terminal.html">
                    <ul class="burger_category_parent">
                        <div class="burger_category_title">
                            <img src="/images/header/icon_7s.webp" alt="terminal">
                            <h3>Терминалы сбора данных</h3>
                        </div>
                    </ul>
                </a>
            </li>
            <li class="burger_category_items">
                <a href="banknotes.html">
                    <ul class="burger_category_parent">
                        <div class="burger_category_title">
                            <img src="/images/header/icon_8s.webp" alt="banknotes">
                            <h3>Счетчики и детекторы банкнот</h3>
                        </div>
                        <div class="burger_category_arrow"></div>
                    </ul>
                </a>
                <ul class="burger_category_children">
                    <li>
                        <a href="banknotes_counter.html">
                            <img src="/images/header/icon_8s_1.webp" alt="banknotes">
                            <h4>Счетчики банкнот</h4>
                        </a>
                    </li>
                    <li>
                        <a href="banknotes_detector.html">
                            <img src="/images/header/icon_8s_2.webp" alt="banknotes">
                            <h4>Детекторы банкнот</h4>
                        </a>
                    </li>
                    <li>
                        <a href="banknotes_packer.html">
                            <img src="/images/header/icon_8s_3.png" alt="banknotes">
                            <h4>Упаковщики банкнот</h4>
                        </a>
                    </li>
                    <li>
                        <a href="coins_counter.html">
                            <img src="/images/header/icon_10.png" alt="banknotes">
                            <h4>Счетчики монет</h4>
                        </a>
                    </li>
                </ul>
            </li>


            <li class="burger_category_items">
                <a href="eas.html">
                    <ul class="burger_category_parent">
                        <div class="burger_category_title">
                            <img src="/images/header/icon_9s.webp" alt="eas">
                            <h3>Антикражное оборудование</h3>
                        </div>
                        <div class="burger_category_arrow"></div>
                    </ul>
                </a>
                <ul class="burger_category_children">
                    <li>
                        <a href="eas_radio.html">
                            <img src="/images/header/icon_9s_1.webp" alt="eas">
                            <h4>Радиочастотная антикражная система</h4>
                        </a>
                    </li>
                    <li>
                        <a href="eas_magnetic.html">
                            <img src="/images/header/icon_9s_2.webp" alt="eas">
                            <h4>Акустомагнитная антикражная система</h4>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="overlap">
        <div class="bubbles">
            <span style="--i:16;"><img src="/images/header/icon_1s_2.webp" alt="Bubble"></span>
            <span style="--i:36;"><img src="/images/header/icon_7s.webp" alt="Bubble"></span>
            <span style="--i:27;"><img src="/images/header/icon_3s_1.webp" alt="Bubble"></span>
            <span style="--i:31;"><img src="/images/header/icon_8s_1.webp" alt="Bubble"></span>
            <span style="--i:21;"><img src="/images/header/icon_5s.webp" alt="Bubble"></span>
            <span style="--i:19;"><img src="/images/header/icon_9s.webp" alt="Bubble"></span>
            <span style="--i:41;"><img src="/images/header/icon_2s.webp" alt="Bubble"></span>
            <span style="--i:36;"><img src="/images/header/icon_1s_1.webp" alt="Bubble"></span>
            <span style="--i:15;"><img src="/images/header/icon_6s.webp" alt="Bubble"></span>
            <span style="--i:26;"><img src="/images/header/icon_4s.webp" alt="Bubble"></span>
        </div>
    </div>
    <ul class="lour_header">
        <li class="lour_header_item">
            <a href="index.html">
                <div class="lour_icon">
                    <img src="/images/header/lour_1.webp" alt="Main">
                    <h5>Главная</h5>
                </div>
            </a>
        </li>
        <li class="lour_header_item">
            <a href="programs.html">
                <div class="lour_icon">
                    <img src="/images/header/lour_2.webp" alt="Automation">
                    <h5>Программы</h5>
                </div>
            </a>
        </li>
        <li class="lour_header_item">
            <a href="about.html">
                <div class="lour_icon">
                    <img src="/images/header/lour_3.webp" alt="About">
                    <h5>О нас</h5>
                </div>
            </a>
        </li>
        <li class="lour_header_item">
            <a href="reviews.php">
                <div class="lour_icon">
                    <img src="/images/header/lour_4.webp" alt="Reviews">
                    <h5>Отзывы</h5>
                </div>
            </a>
        </li>
        <li class="lour_header_item">
            <a href="contact.html">
                <div class="lour_icon">
                    <img src="/images/header/lour_5.webp" alt="Contanct">
                    <h5>Контакты</h5>
                </div>
            </a>
        </li>
        <div class="lour_indicator"></div>
    </ul>
</div>
<!-- Page Head-->
<div class="page-head_agile_info_w3l">
    <div class="container">
        <h1>Отзывы наших клиентов о SoftGroup</h1>
    </div>
</div>
<!-- Reviews -->
<div class="reviews">
    <div class="container">
        <!-- Page Navigation -->
        <div class="page_navigation">
            <ul class="bread_crumbs">
                <li><a href="index.html">Главная</a></li>
                <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                <li>Отзывы</li>
            </ul>
        </div>
        <!-- Reviews Container -->
        <div class="reviews_container">
            <div class="toast <?= ($notification['success']) ? '' : 'toast_none'; ?>">
                <div class="toast_title">Отзыв успешно сохранен</div>
                <button class="toast_close" type="button"></button>
            </div>
            <div class="reviews_title">
                <h1>Отзывы клиентов</h1>
            </div>
            <hr>
            <div class="reviews_block">
                <div class="reviews_form">
                    <form method="POST" action="/php/review_comment.php" class="reviews_form_container" id="review_comment" name="review_comment">
                        <div class="reviews_form_title">
                            Оставить отзыв о компании SoftGroup
                        </div>
                        <div class="reviews_form_bock">
                            <div class="reviews_form_input">
                                <label for="user_name">Имя:</label>
                                <input type="text" id="user_name" name="user_name" maxlength="20" placeholder="Введите имя" class="<?= $notification['color_red'] ?>" value="<?= $notification['user_name'] ?>">
                            </div>
                            <div class="reviews_form_input">
                                <label for="user_city">Город:</label>
                                <select id="user_city" name="user_city">
                                    <option value="Алматы" selected="selected">Алматы</option>
                                    <option value="Астана">Астана</option>
                                    <option value="Актау">Актау</option>
                                    <option value="Актобе">Актобе</option>
                                    <option value="Атырау">Атырау</option>
                                    <option value="Жанаозен">Жанаозен</option>
                                    <option value="Жезказган">Жезказган</option>
                                    <option value="Караганда">Караганда</option>
                                    <option value="Кокшетау">Кокшетау</option>
                                    <option value="Костанай">Костанай</option>
                                    <option value="Кызылорда">Кызылорда</option>
                                    <option value="Павлодар">Павлодар</option>
                                    <option value="Петропавловск">Петропавловск</option>
                                    <option value="Семей">Семей</option>
                                    <option value="Талдыкорган">Талдыкорган</option>
                                    <option value="Тараз">Тараз</option>
                                    <option value="Туркестан">Туркестан</option>
                                    <option value="Уральск">Уральск</option>
                                    <option value="Усть-Каменогорск">Усть-Каменогорск</option>
                                    <option value="Шымкент">Шымкент</option>
                                </select>
                            </div>
                        </div>
                        <div class="reviews_form_text">
                            <label for="user_text">Отзыв:</label>
                            <textarea id="user_text" name="user_text" placeholder="<?= $notification['red_text'] ?>"><?= $notification['user_text'] ?></textarea>
                        </div>
                        <div class="reviews_form_rating">
                            <label>Ваша оценка:</label>
                            <span id="starRating" class="starRating">
                                    <input id="rating5" type="radio" name="rating" value="5" checked="">
                                    <label for="rating5">5</label>
                                    <input id="rating4" type="radio" name="rating" value="4">
                                    <label for="rating4">4</label>
                                    <input id="rating3" type="radio" name="rating" value="3">
                                    <label for="rating3">3</label>
                                    <input id="rating2" type="radio" name="rating" value="2">
                                    <label for="rating2">2</label>
                                    <input id="rating1" type="radio" name="rating" value="1">
                                    <label for="rating1">1</label>
                            </span>
                        </div>
                        <div style="display:block; width:1px; height:1px; margin-bottom:-1px; opacity:0.01;">
                            <input type="text" name="copyemail" placeholder="Email">
                        </div>'
                        <input type="hidden" id="url_response" name="url_response" value="<?= $_SERVER['REQUEST_URI'] ?>">
                        <button class="g-recaptcha reviews_form_submit"
                                data-sitekey="<?= RE_CAPTCHA_SITE_KEY ?>"
                                data-callback='onSubmit'
                                data-action='submit'>
                            Отправить
                        </button>
                    </form>
                </div>
                <?php if (!empty($reviews)): ?>
                    <div class="reviews_comments_list">
                        <?php foreach ($reviews as $comment) : ?>
                            <div class="reviews_comment">
                                <div class="reviews_comment_line">
                                    <div class="reviews_name">
                                        <i class="fa fa-user-secret padding_both" aria-hidden="true"></i>
                                        Имя: <b><?= htmlspecialchars($comment['user_name']) ?></b>
                                    </div>
                                    <div class="reviews_date">
                                        <?= date("d.m.Y в H:i ", (int)$comment['date']) ?>
                                        <i class="fa fa-clock-o padding_both" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="reviews_comment_line">
                                    <div class="reviews_city">
                                        <i class="fa fa-building-o padding_both" aria-hidden="true"></i>
                                        Город: <b><?= htmlspecialchars($comment['user_city']) ?></b>
                                    </div>
                                    <?php
                                    switch ((int)$comment['user_rating']) :
                                        case 5:
                                            echo '<img src="/images/five.png">';
                                            break;
                                        case 4:
                                            echo '<img src="/images/four.png">';
                                            break;
                                        case 3:
                                            echo '<img src="/images/three.png">';
                                            break;
                                        case 2:
                                            echo '<img src="/images/two.png">';
                                            break;
                                        default:
                                            echo '<img src="/images/one.png">';
                                    endswitch;
                                    ?>
                                </div>
                                <div class="reviews_message">
                                    <hr style="padding-top: 0">
                                    <?= htmlspecialchars($comment['user_message']) ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <div class="pagination">
                            <?php
                            if ($page > 1) {
                                echo '<a class="pagination_control" href="?page=' . ($page - 1) . '">◄</a>';
                            }
                            for ($i = $startPage; $i <= $endPage; $i++) {
                                if ($i === $page) {
                                    echo '<span class="pagination_control_span">' . $i . '</span>';
                                } else {
                                    echo '<a class="pagination_control" href="?page=' . $i . '"><span class="pagination_number">' . $i . '</span></a>';
                                }
                            }
                            if ($page < $totalPages) {
                                echo '<a class="pagination_control" href="?page=' . ($page + 1) . '">►</a>';
                            }
                            ?>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="reviews_comments_list">
                        <div class="reviews_comment">
                            Нет комментариев ...
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <hr>
        </div>
    </div>
</div>
        <!-- Clients -->
        <div class="clients clients_padding_null">
            <div class="container">
                <h3 class="clients_title">Наши клиенты</h3>
                <div class="clients_items clients_margin_null">
                    <img class="clients_items__image" src="/images/logo/helios.webp" alt="hel" />
                    <img class="clients_items__image" src="/images/logo/sinooil.webp" alt="sinooil" />
                    <img class="clients_items__image" src="/images/logo/technodom.webp" alt="tech" />
                    <img class="clients_items__image clients_items__image_small" src="/images/logo/magnum.webp" alt="magnum" />
                    <img class="clients_items__image" src="/images/logo/ecco.webp" alt="ecco" />
                    <img class="clients_items__image" src="/images/logo/koton.webp" alt="koton" />
                    <img class="clients_items__image" src="/images/logo/kulanoil.webp" alt="kul" />
                    <img class="clients_items__image clients_items__image_small" src="/images/logo/nu.webp" alt="naz" />
                    <img class="clients_items__image clients_items__image_small" src="/images/logo/mega.webp" alt="meg" />
                </div>
            </div>
        </div>
<!-- Footer -->
<div class="footer_nav">
    <div class="container footer_nav_container">
        <div class="footer_mobile_block">
            <div class="footer_mobile_block__item">
                <div class="footer_mobile_block__title">
                    <h5 class="footer_trans_title">О компании</h5>
                </div>
                <div class="footer_mobile_block__text">
                    <ul class="footer_mobile_block__content">
                        <li><a class="footer_trans_title" href="index.html">Главная</a></li>
                        <li><a class="footer_trans_title" href="products.html">Оборудование</a></li>
                        <li><a class="footer_trans_title" href="programs.html">Программы</a></li>
                        <li><a class="footer_trans_title" href="automation.html">Автоматизация</a></li>
                        <li><a class="footer_trans_title" href="reviews.php">Отзывы</a></li>
                        <li><a class="footer_trans_title" href="about.html">О нас</a></li>
                        <li><a class="footer_trans_title" href="contact.html">Контакты</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer_mobile_block__item">
                <div class="footer_mobile_block__title">
                    <h5 class="footer_trans_title">Оборудование</h5>
                </div>
                <div class="footer_mobile_block__text">
                    <ul class="footer_mobile_block__content">
                        <li><a class="footer_trans_title" href="pos.html">POS системы</a></li>
                        <li><a class="footer_trans_title" href="computer.html">Компьютеры и комплектующие</a></li>
                        <li><a class="footer_trans_title" href="scanner.html">Сканеры штрих-кодов</a></li>
                        <li><a class="footer_trans_title" href="printer.html">Принтеры чеков и этикеток</a></li>
                        <li><a class="footer_trans_title" href="till.html">Денежные ящики</a></li>
                        <li><a class="footer_trans_title" href="scale.html">Весы электронные</a></li>
                        <li><a class="footer_trans_title" href="terminal.html">Терминалы сбора данных</a></li>
                        <li><a class="footer_trans_title" href="banknotes.html">Счетчики и детекторы банкнот</a></li>
                        <li><a class="footer_trans_title" href="eas.html">Антикражное оборудование</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer_mobile_block__item">
                <div class="footer_mobile_block__title">
                    <h5 class="footer_trans_title">г. Алматы</h5>
                </div>
                <div class="footer_mobile_block__text">
                    <div class="footer_mobile_block_padding">
                        <p><a class="almaty_info" href="contact_almaty.html">ул. Мынбаева 43 (уг. ул. между Ауезова и Манаса) 050008</a></p>
                    </div>
                    <div class="footer_mobile_block_padding">
                        <p><a href="tel:87273449900" onclick="gtag('event', 'click phone numbers', {'event_category': 'link', 'event_action': 'click'});">8 (727) 344-99-00</a></p>
                        <p><a href="tel:87012667700" onclick="gtag('event', 'click phone numbers', {'event_category': 'link', 'event_action': 'click'});">+7 (701) 266-77-00</a></p>
                    </div>
                    <div class="footer_mobile_block_padding">
                        <p><a href="mailto:zakaz@idiamarket.kz">zakaz@idiamarket.kz</a></p>
                    </div>
                </div>
            </div>
            <div class="footer_mobile_block__item">
                <div class="footer_mobile_block__title">
                    <h5 class="footer_trans_title">г. Астана</h5>
                </div>
                <div class="footer_mobile_block__text">
                    <div class="footer_mobile_block_padding">
                        <p><a class="almaty_info" href="contact_astana.html">ул. Бейсекбаева 24/1, 2-этаж бизнес-центр DARA.</a></p>
                    </div>
                    <div class="footer_mobile_block_padding">
                        <p><a href="tel:87172279900" onclick="gtag('event', 'click phone numbers', {'event_category': 'link', 'event_action': 'click'});">8 (7172) 27-99-00</a></p>
                        <p><a href="tel:87015112200" onclick="gtag('event', 'click phone numbers', {'event_category': 'link', 'event_action': 'click'});">+7 (701) 511-22-00</a></p>
                    </div>
                    <div class="footer_mobile_block_padding">
                        <p><a href="mailto:astana@idiamarket.kz">astana@idiamarket.kz</a></p>
                    </div>
                </div>
            </div>
            <div class="footer_mobile_block__item">
                <div class="footer_mobile_block__title">
                    <h5 class="footer_trans_title">г. Шымкент</h5>
                </div>
                <div class="footer_mobile_block__text">
                    <div class="footer_mobile_block_padding">
                        <p><a class="almaty_info" href="contact_shymkent.html">ул. Мадели кожа 35/1, (уг.ул. Байтурсынова) 1-этаж, бизнес-центр BNK</a></p>
                    </div>
                    <div class="footer_mobile_block_padding">
                        <p><a href="tel:87252399900" onclick="gtag('event', 'click phone numbers', {'event_category': 'link', 'event_action': 'click'});">8 (7252) 39-99-00</a></p>
                        <p><a href="tel:87019447700" onclick="gtag('event', 'click phone numbers', {'event_category': 'link', 'event_action': 'click'});">+7 (701) 944 77 00</a></p>
                    </div>
                    <div class="footer_mobile_block_padding">
                        <p><a href="mailto:shymkent@idiamarket.kz">shymkent@idiamarket.kz</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer_desktop_block">
            <div class="footer_contact_container">
                <div class="footer_nav_logo">
                    <a href="index.html">
                        <span>Soft</span>Gr<img src="/images/globe1.png" alt="logo">up
                    </a>
                </div>
                <div class="footer_nav_phone">
                    <a href="tel:87273449900">&nbsp 8 (727) 344-99-00</a>
                </div>
                <div class="footer_nav_phone">
                    <a href="tel:87012667700">+7 (701) 266-77-00</a>
                </div>
                <div class="footer_nav_text">
                    <a href="contact_almaty.html">
                        <p>г. Алматы, ул. Мынбаева 43 (уг.ул. Манаса), 1-этаж, 050008</p>
                    </a>
                </div>
                <hr class="footer_nav_hr">
                <div class="footer_nav_phone">
                    <a href="tel:87172279900">&nbsp 8 (7172) 27-99-00</a>
                </div>
                <div class="footer_nav_phone">
                    <a href="tel:87015112200">+7 (701) 511-22-00</a>
                </div>
                <div class="footer_nav_text">
                    <a href="contact_astana.html">
                        <p>г. Астана, ул. Бейсекбаева 24/1, 2-этаж бизнес-центр DARA</p>
                    </a>
                </div>
                <hr class="footer_nav_hr">
                <div class="footer_nav_phone">
                    <a href="tel:87252399900">&nbsp 8 (7252) 39-99-00</a>
                </div>
                <div class="footer_nav_phone">
                    <a href="tel:87019447700">+7 (701) 944-77-00</a>
                </div>
                <div class="footer_nav_text">
                    <a href="contact_shymkent.html">
                        <p>г. Шымкент, ул. Мадели кожа 35/1, (уг.ул. Байтурсынова) 1-этаж, бизнес-центр BNK</p>
                    </a>
                </div>
            </div>
            <div class="footer_links_container">
                <div class="footer_links_container_column">
                    <div class="footer_link_subtitle">
                        <a href="index.html">Главная</a>
                    </div>
                    <ul class="footer_link_list">
                        <li><a href="products.html">Оборудование</a></li>
                        <li><a href="programs.html">Программы</a></li>
                        <li><a href="automation.html">Автоматизация</a></li>
                        <li><a href="reviews.php">Отзывы</a></li>
                        <li><a href="about.html">О нас</a></li>
                        <li><a href="contact.html">Контакты</a></li>
                    </ul>
                </div>
                <div class="footer_links_container_column">
                    <div class="footer_link_subtitle">
                        <a href="products.html">Оборудование</a>
                    </div>
                    <ul class="footer_link_list">
                        <li><a href="pos.html">POS системы</a></li>
                        <li><a href="computer.html">Компьютеры и комплектующие</a></li>
                        <li><a href="scanner.html">Сканеры штрих-кодов</a></li>
                        <li><a href="printer.html">Принтеры чеков и этикеток</a></li>
                        <li><a href="till.html">Денежные ящики</a></li>
                        <li><a href="scale.html">Весы электронные</a></li>
                        <li><a href="terminal.html">Терминалы сбора данных</a></li>
                        <li><a href="banknotes.html">Счетчики и детекторы банкнот</a></li>
                        <li><a href="eas.html">Антикражное оборудование</a></li>
                    </ul>
                    <div class="footer_social_btns">
                        <div class="footer_social_btns_content">
                            <a class="btn instagram" href="https://www.instagram.com/idiamarket/">
                                <i class="fa fa-instagram" aria-hidden="true"></i>
                            </a>
                            <a class="btn whatsapp" href="https://api.whatsapp.com/send/?phone=77012336600&amp;text&amp;app_absent=0">
                                <i class="fa fa-whatsapp" aria-hidden="true"></i>
                            </a>
                            <a class="btn youtube" href="https://www.youtube.com/channel/UCNDMIviMuZOhhCP7xoxGYAA/videos">
                                <i class="fa fa-youtube-play" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <p class="footer_copy_right"><span class="copy_right"></span></p>
    </div>
</div>
<!-- JS -->
<script src="/js/jquery-1.11.3.min.js"></script>
<script src="/js/jquery.cart.js"></script>
<script src="/js/jquery.slick.js"></script>
<script>
    function onSubmit(token) {
        document.getElementById("review_comment").submit();
    }
</script>
<script type="module" src="/js/bootstrap.js"></script>
<script type="module" src="/js/script.js"></script>
</body>
</html>