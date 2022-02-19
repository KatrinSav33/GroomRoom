<?php $__env->startSection('content'); ?>
    <div class="header">
        <div class="welcome">
            <p class="welcome-groom">Добро пожаловать на сайт GroomRoom!</p>
            <p class="welcome-description"> В руках опытных специалистов ваш питомец не испытает и капли волнения во время бьюти-процедур. Подайте заявку для записи вашего питомца на процедуру.</p>
            <div class="welcome-login"><a href="<?php echo e(route('login')); ?>">Подать заявку</a></div>
        </div>
    </div>

    <div class="main">
        <p>НАШИ РАБОТЫ</p>
        <div class="work-card">
            <div class="work-card-row">
                <img src="public/assets/image/1.jpg" alt="work">
                <img src="public/assets/image/1.jpg" alt="work">
            </div>
            <div class="work-card-row">
                <img src="public/assets/image/1.jpg" alt="work">
                <img src="public/assets/image/1.jpg" alt="work">
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\pxatibk-m3\resources\views/index.blade.php ENDPATH**/ ?>