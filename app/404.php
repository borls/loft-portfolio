<!DOCTYPE html>
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
            <div class="field field-red server-message server-error" style="display: block; text-align: center;">
                <div class="message-title">Ошибка 404!</div>
                <div class="message-body">Страницы не существует!</div>
            </div>
        </div>
        <!-- Container -->
    </div>
</div>

<!--<script src="bower/jquery/dist/jquery.js"></script>-->
<!--<script src="js/plugins.js"></script>-->
<!--<script src="js/main.js"></script>-->
<!--<script src="js/modal.js"></script>-->
<!--<script src="js/validation.js"></script>-->
<!--<script src="js/authorization.js"></script>-->
</body>

</html>