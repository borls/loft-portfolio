<!DOCTYPE html>
<!--нужен для того, чтобы на скрин-ридерах хорошо отоброжался русский текст-->
<html lang="ru-RU">
<head>
    <?php
    $pageCssList = array(
        'form' => 'css/form.css',
        'authorization' => 'css/authorization.css',
    );
    include('template/head.php')
    ?>
</head>
<body>
<div class="wrapper">
    <div class="main-content">

        <!-- Container -->
        <div class="container clearfix">
            <section class="aboutbox">
                <div class="authorization-header">Авторизируйтесь</div>

                <div class="field-body">
                    <form class="form" name="authorization">  <!-- action="" method="post" php/feedback.php -->
                        <div class="field-wrapper">
                            <div class="clearfix">
                                <!-- Login Input -->
                                <div class="field-box tooltip-left field-required">
                                    <div class="field-label">Логин</div>
                                    <div class="field-field">
                                        <span class="arrow-box">Введите логин</span>
                                        <input class="field field-blue" type="text" name="login"
                                               placeholder="Введите логин">
                                    </div>
                                </div>

                                <!-- Password Input -->
                                <div class="field-box tooltip-left field-required">
                                    <div class="field-label">Пароль</div>
                                    <div class="field-field">
                                        <span class="arrow-box">Введите пароль</span>
                                        <input class="field field-blue" type="text" name="password"
                                               placeholder="Введите пароль">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Buttons -->
                        <div class="field-box clearfix">
                            <div class="field-field field-center">
                                <input type="submit" class="btn btn-lightblue btn-enter" value="Войти">
                            </div>
                        </div>

                    </form>
                </div>
            </section>
        </div>
        <!-- Container -->
    </div>
</div>
<!-- Footer -->
<?php include('template/footer.php') ?>
<!-- / Footer -->

<script src="bower/jquery/dist/jquery.js"></script>
<script src="js/vendor/jquery.min.js"></script>
<!--[if lt IE 9]>
<script src="js/vendor/respond.js"></script>
<script>
    // fix IE8
    $(".porfolio-item:nth-child(3n)").css("margin-right", "0");
    $('.porfolio-img-hover').hide();
    $('.porfolio-item').hover(function() {
        $(this).find('.porfolio-img-hover').show();
    }, function() {
        $(this).find('.porfolio-img-hover').hide();
    });
</script>
<script src="js/vendor/placeholders.js"></script>
<![endif]-->
<script src="js/plugins.js"></script>
<script src="js/main.js"></script>
<script src="js/modal.js"></script>
<script src="js/validation.js"></script>
<script src="js/authorization.js"></script>
</body>

</html>