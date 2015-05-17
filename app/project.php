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

<div class="modal" data-name="project-append">
    <div class="modal-wrapper">
        <div class="modal-header">
            Добавление проекта
            <span class="icon-close"></span>
        </div>

        <div class="modal-body">
            <form class="form" name="project-append" action="#">
                <div class="field-box">
                    <div class="field field-red server-message server-error">
                        <span class="close">&times;</span>
                        <span class="message-title">Ошибка!</span>
                        <span class="message-body">Невозможно добавить проект.</span>
                    </div>
                    <div class="field field-green server-message server-success">
                        <span class="close">&times;</span>
                        <span class="message-title">Well Done!</span>
                        <span class="message-body">Операция прошла успешно.</span>
                    </div>
                </div>
                <div class="field-box tooltip-left field-required">
                    <div class="field-label">Название проекта</div>
                    <div class="field-field">
                        <span class="arrow-box">Введите название</span>
                        <input class="field field-blue" type="text" name="name"
                               placeholder="Название проекта">
                    </div>
                </div>
                <div class="field-box tooltip-left field-required">
                    <div class="field-label">Картинка проекта</div>
                    <div class="field-field">
                        <span class="arrow-box">Изображение</span>
                        <input class="field field-blue" type="text" name="image" id="load_image" placeholder="Загрузите изображение" readonly="">
                        <input class="modal-input-file transparent0" type="file">

                        <div class="modal-input-file-icon"></div>
                    </div>
                </div>
                <div class="field-box tooltip-left field-required">
                    <div class="field-label">URL проекта</div>
                    <div class="field-field">
                        <span class="arrow-box">Ссылка на проект</span>
                        <input class="field field-blue" type="text" name="url"
                               placeholder="Добавьте ссылку">
                    </div>
                </div>
                <div class="field-box tooltip-left field-required">
                    <div class="field-label">Описание</div>
                    <div class="field-field">
                        <span class="arrow-box">Описание проекта</span>
                        <textarea class="field field-blue" name="description" cols="20" rows="4"
                                  placeholder="Пара слов о Вашем проекте"></textarea>
                    </div>
                </div>

                <div class="field-box field-field field-center">
                    <input type="submit" class="btn btn-lightblue" value="Добавить">
                </div>
            </form>
        </div>
    </div>
</div>

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