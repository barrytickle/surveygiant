<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/animate.css"/>
    <link rel="stylesheet" href="/css/app.css"/>
    @yield('styles')
</head>
<body>
@include('includes.header')
<section class="section-main">
    @yield('content')
</section>
<footer>
    <ul>
        <li>Copyright&copy; Survey Giant 2016. All Rights reserved</li>
    </ul>
</footer>
<script src="/js/jquery-1.12.3.min.js"></script>
<script src="/js/global.js"></script>
</body>
</html>