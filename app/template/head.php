<meta charset="UTF-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>portfolio:about me</title>
<!-- seo -->
<meta name="description" content="Портфолио Южакова Бориса">
<meta name="keywords" content="Портфолио Южаков Борис">
<meta name="author" content="Южаков Борис">
<!-- favicon -->
<?php include('favicon.php') ?>
<!-- fonts css -->
<link rel="stylesheet" href="css/font/font.css">
<!-- vendor css -->
<link rel="stylesheet" href="bower/normalize.css/normalize.css">
<!-- common css -->
<link rel="stylesheet" href="css/common.css">
<link rel="stylesheet" href="css/buttons.css">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/social.css">
<link rel="stylesheet" href="css/logo.css">
<link rel="stylesheet" href="css/navigation.css">
<link rel="stylesheet" href="css/contact.css">
<link rel="stylesheet" href="css/auth.css">
<link rel="stylesheet" href="css/content.css">

<!-- page css -->
<?php
foreach ($pageCssList as $css) {
    echo '<link rel="stylesheet" href="' . $css . '">';
}
?>
<!-- js -->
<script src="js/vendor/modernizr.min.js"></script>
<!--[if lt IE 9]>
<script src="js/vendor/placeholders.min.js"></script>
<script src="js/vendor/respond.js"></script>
<![endif]-->

<script src="bower/jquery/dist/jquery.js"></script>
<!-- <script srd="bower/modernizr.js"></script> -->
<script src="js/main.js"></script>
<script src="js/plugins.js"></script>
