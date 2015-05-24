<?php
    session_start();
    require_once 'backend/authorization.php';
//    require_once 'backend/feedback.php';

    $user = $auth->getUser();
    $file = basename(__FILE__);
    $info = pathinfo($file);
    $page = basename($file, '.' . $info['extension']);
?>
<!DOCTYPE html>
<!--нужен для того, чтобы на скрин-ридерах хорошо отоброжался русский текст-->
<html lang="ru-RU">
<head>
    <?php
    $pageCssList = array(
        'form' => 'css/form.css',
        'modal' => 'css/modal.css',
        'project' => 'css/feedback.css',
    );
    include('template/head.php')
    ?>
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>

<body>
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
                <section class="aboutbox">
                    <div class="feedback-header">У вас интересный проект? Напишите мне</div>

                    <div class="field-body">
                        <form class="form" name="feedback" action="backend/feedback.php" method="post"><!-- enctype="multipart/form=data" method="post">-->
                            <div class="field-wrapper">
                                <div class="clearfix">
                                    <!-- Name Input -->
                                    <div class="field-box tooltip-left col-6 field-required">
                                        <div class="field-label">Имя</div>
                                        <div class="field-field">
                                            <span class="arrow-box">Вы не ввели имя</span>
                                            <input class="field field-blue" type="text" name="name"
                                                   placeholder="Как к Вам обращаться">
                                        </div>
                                    </div>

                                    <!-- Email Input -->
                                    <div class="field-box tooltip-right col-6 field-required">
                                        <div class="field-label">Email</div>
                                        <div class="field-field">
                                            <span class="arrow-box">Вы не ввели Email</span>
                                            <input class="field field-blue" type="email" name="email"
                                                   placeholder="Куда мне писать">
                                        </div>
                                    </div>
                                </div>

                                <!-- Message TextArea -->
                                <div class="field-box tooltip-left field-required">
                                    <div class="field-label">Сообщение</div>
                                    <div class="field-field">
                                        <span class="arrow-box">Ваш вопрос</span>
                                    <textarea class="field field-blue" name="message" id="" cols="30" rows="8"
                                              placeholder="Кратко в чем суть"></textarea>
                                    </div>
                                </div>

                                <!-- Captcha -->
                                <div class="field-box clearfix">
                                    <div class="field-label">Введите код, указанный на картинке</div>
                                    <div class="field-box tooltip-right col-6 field-required" style="margin-top: 20px;">
                                        <div class="field-field">
                                            <span class="arrow-box">Вы не ввели код</span>
                                            <div class="g-recaptcha" data-sitekey="6Le49wYTAAAAAOF2yXK91DOjY9RHcPLHwOYRtyjj"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Buttons -->
                            <div class="field-box clearfix">
                                <div class="col-6">
                                    <div class="field-field">
                                        <input type="submit" class="btn btn-lightblue" value="Отправить">
                                    </div>
                                </div>
                                <div class="field-right col-6">
                                    <div class="field-field">
                                        <input type="reset" class="btn btn-grayblue" value="Очистить">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
            <!-- /Variable Content -->
        </div>
        <!-- Container -->
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
<script src="js/feedback.js"></script>
</body>

</html>