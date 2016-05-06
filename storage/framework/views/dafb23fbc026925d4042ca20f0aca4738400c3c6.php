<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/animate.css"/>
    <link rel="stylesheet" href="/css/app.css"/>
    <?php echo $__env->yieldContent('styles'); ?>
</head>
<body>
<?php echo $__env->make('includes.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->yieldContent('extra-nav'); ?>
<section class="section-main">
    <?php echo $__env->yieldContent('content'); ?>
</section>
<footer>
    <ul>
        <li>Copyright&copy; Survey Giant 2016. All Rights reserved</li>
    </ul>
</footer>
<script src="/js/app.js"></script>
<script src="/js/jquery-1.12.3.min.js"></script>
<script src="/js/global.js"></script>
</body>
</html>