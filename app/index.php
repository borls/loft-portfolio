<?php
    session_start();
    require_once 'backend/authorization.php';

    $user = $auth->getUser();
    $file = basename(__FILE__);
    $info = pathinfo($file);
    $page = basename($file,'.'.$info['extension']);
?>
<!DOCTYPE html>
<!--нужен для того, чтобы на скрин-ридерах хорошо отоброжался русский текст-->
<html lang="ru-RU">

<head>
    <?php
        $pageCssList = array('aboutme' => 'css/about_me.css');
        include('template/head.php')
    ?>
</head>


<body>
<!--[if lt IE 7]>
<p class="browsehappy">Ваш браузер <strong>устарел</strong>.
    Пожалуйста<a href="http://browsehappy.com/">обновите</a> его.</p>
<![endif]-->
<div class="wrapper">
    <div class="main-content">
        <!-- Header -->
        <?php include('template/header.php') ?>
        <!-- / Header -->

        <!-- Container -->
        <div class="container clearfix">
            <!-- Left Menu -->
            <?php include('template/sidebar.php') ?>
            <!-- / Left Menu -->

            <!-- Variable Content -->
            <div class="variable-content">
                <!-- About Me -->
                <section class="aboutbox">
                    <div class="aboutbox-header">Основная информация</div>
                    <div class="aboutbox-body clearfix">
                        <div class="aboutbox-image">
                            <div class="image-box">
                                <div class="image-wrap">
                                    <img src="img/user/borls.png" alt="Южаков Борис" class="avatar">
                                </div>
                            </div>

                        </div>
                        <ul class="aboutme-list list-unstyled">
                            <li class="aboutme-item clearfix">
                                <div class="aboutme-what">Меня зовут:</div>
                                <div class="aboutme-info">Южаков Борис Борисович</div>
                            </li>
                            <li class="aboutme-item clearfix">
                                <div class="aboutme-what">Мой возраст:</div>
                                <div class="aboutme-info">28 лет</div>
                            </li>
                            <li class="aboutme-item clearfix">
                                <div class="aboutme-what">Мой город:</div>
                                <div class="aboutme-info">Москва, Россия</div>
                            </li>
                            <li class="aboutme-item clearfix">
                                <div class="aboutme-what">Моя специализация:</div>
                                <div class="aboutme-info">FrontEnd developer</div>
                            </li>
                            <li class="aboutme-item clearfix">
                                <div class="aboutme-what">Ключевые навыки:</div>
                                <div class="aboutme-info">
                                    <ul class="skill-list list-unstyled">
                                        <li class="skill-item btn-blue">html</li>
                                        <li class="skill-item btn-blue">css</li>
                                        <li class="skill-item btn-blue">javascript</li>
                                        <li class="skill-item btn-blue">gulp</li>
                                        <li class="skill-item btn-blue">git</li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </section>
                <!-- Experience -->
                <section class="aboutbox">
                    <div class="aboutbox-header">Опыт работы</div>
                    <div class="aboutbox-body">
                        <ul class="aboutbox-list list-unstyled">
                            <li class="aboutbox-item icon-work before-icon">
                                <div class="where">"OOO Tesis" - c++ developer</div>
                                <div class="interval">Сентябрь 2009 - Август 2013</div>
                            </li>
                            <li class="aboutbox-item icon-work before-icon">
                                <div class="where">"OOO Communa" - frontend developer</div>
                                <div class="interval">Февраль 2014 - Март 2015</div>
                            </li>
                        </ul>
                    </div>
                </section>
                <!-- Education -->
                <section class="aboutbox">
                    <div class="aboutbox-header">Образование</div>
                    <div class="aboutbox-body">
                        <ul class="aboutbox-list list-unstyled">
                            <li class="aboutbox-item icon-education before-icon">
                                <div class="where">МФТИ ФАКИ, Магистр</div>
                                <div class="interval">Сентябрь 2005 - Май 2011</div>
                            </li>
                            <li class="aboutbox-item icon-page before-icon">
                                <div class="where">Курсы LoftScool</div>
                                <div class="interval">Март 2015 - настоящее время</div>
                            </li>
                        </ul>
                    </div>
                </section>
            </div>
            <!-- /Variable Content -->
        </div>
        <!-- / Container -->
    </div>
</div>
<!-- Footer -->
<?php include('template/footer.php') ?>
<!-- / Footer -->

<!-- vendor JS -->
<script src="bower/jquery/dist/jquery.js"></script>
<script src="bower/jquery-placeholder/jquery.placeholder.min.js"></script>

<!--[if lt IE 9]>
<script src="js/vendor/respond.js"></script>
<script>
    // fix IE8
    // исправление отсутствие :last-child
    // .nav-item:last-child {border-bottom: none;}
    $('.nav-item').last().css('border-bottom', 'none')
</script>
<![endif]-->

<!-- JS -->
<script src="js/plugins.js"></script>
<script src="js/main.js"></script>
<script src="js/modal.js"></script>
<script src="js/validation.js"></script>

</body>
</html>