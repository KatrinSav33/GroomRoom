<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ГрумRoom</title>
    <link rel="stylesheet" href="/resources/css/app.css">
</head>
<body>
    <div class="container">
        <img src="../../public/assets/image/logo_groom.png" alt="">
                <div class="navbar-nav">
                    <a class="nav-link" href="<?php echo e(route('index')); ?>">Главная</a>
                    <?php if(auth()->guard()->guest()): ?>
                        <a class="nav-link" href="<?php echo e(route('register')); ?>">Регистрация</a>
                        <a class="nav-link" href="<?php echo e(route('login')); ?>">Авторизация</a>
                    <?php endif; ?>
                    <?php if(auth()->guard()->check()): ?>
                        <?php if(Auth::user()->role===1): ?>
                                <a class="nav-link" href="<?php echo e(route('admin')); ?>">Аккаунт</a>
                                <a class="nav-link" href="<?php echo e(route('editCategory')); ?>">Категории</a>
                        <?php endif; ?>
                        <?php if(Auth::user()->role===0): ?>
                                <a class="nav-link" href="<?php echo e(route('create')); ?>">Создать заявку</a>
                                <a class="nav-link" href="<?php echo e(route('account')); ?>">Аккаунт</a>
                        <?php endif; ?>
                            <a class="nav-link" href="<?php echo e(route('logout')); ?>">Выход</a>
                    <?php endif; ?>
                </div>
    </div>
<?php echo $__env->yieldContent('content'); ?>
</body>
</html>
<?php /**PATH C:\OpenServer\domains\pxatibk-m3\resources\views/welcome.blade.php ENDPATH**/ ?>