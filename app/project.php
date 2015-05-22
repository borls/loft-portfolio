<?php
session_start();
require_once 'backend/authorization.php';

$user = $auth->getUser();
$file = basename(__FILE__);
$info = pathinfo($file);
$page = basename($file,'.'.$info['extension']);

//if (!isset($_SESSION['developer'])) echo $_SESSION['developer'];
//unset($_SESSION['developer']);
?>
<!DOCTYPE html>
<!--нужен для того, чтобы на скрин-ридерах хорошо отоброжался русский текст-->
<html lang="ru-RU">
<head>
    <?php
    $pageCssList = array(
        'form' => 'css/form.css',
        'modal' => 'css/modal.css',
        'project' => 'css/project.css',
        );
    include('template/head.php')
    ?>
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
                <!-- My projects -->
                <section class="aboutbox">
                    <div class="aboutbox-header">Мои работы</div>
                    <div class="aboutbox-body">
                        <ul class="project-list list-unstyled clearfix">
                            <li class="project-item">
                                <div class="project-image project1">
                                    <div class="project-name-bg">
                                        <div><span class="project-name-text">Название</span></div>
                                    </div>
                                </div>
                                <a href="#" class="project-link">www.site.ru</a>

                                <div class="project-description">Информация о проекте 1 превью 2 строки....</div>
                            </li>
                            <li class="project-item">
                                <div class="project-image project2">
                                    <div class="project-name-bg">
                                        <div><span class="project-name-text">Название</span></div>
                                    </div>
                                </div>
                                <a href="#" class="project-link">www.site.ru</a>

                                <div class="project-description">Информация о проекте 2 превью 2 строки....</div>
                            </li>
                            <li class="project-item">
                                <div class="project-image project3">
                                    <div class="project-name-bg">
                                        <div><span class="project-name-text">Название</span></div>
                                    </div>
                                </div>
                                <a href="#" class="project-link">www.site.ru</a>

                                <div class="project-description">Информация о проекте 3 превью 2 строки....</div>
                            </li>
                            <li class="project-item">
                                <div class="project-image project4">
                                    <div class="project-name-bg">
                                        <div><span class="project-name-text">Название</span></div>
                                    </div>
                                </div>
                                <a href="#" class="project-link">www.site.ru</a>

                                <div class="project-description">Информация о проекте 4 превью 2 строки....</div>
                            </li>
                            <li class="project-item">
                                <div class="project-image project-append">
                                    <div class="project-append-wrapper">
                                        <div class="project-append-icon"></div>
                                        Добавить проект
                                    </div>

                                </div>
                            </li>
                        </ul>
                    </div>
                </section>
                <!-- / My projects -->
            </div>
            <!-- / Variable Content -->
        </div>
        <!-- Container -->
    </div>
</div>
<!-- Footer -->
<?php include('template/footer.php') ?>
<!-- / Footer -->
<?php include('template/modal/project-append.php') ?>

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
<script src="js/append_project.js"></script>
</body>

</html>