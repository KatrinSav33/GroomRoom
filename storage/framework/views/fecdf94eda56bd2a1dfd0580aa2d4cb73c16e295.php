<?php $__env->startSection('content'); ?>

    <div class="main">
        <div class="card">
            <div class="application-card">
                <p class="id-card">№ заявки: <?php echo e($application->id); ?></p>
                <p class="id-card">ID пользователя: <?php echo e($application->id_user); ?></p>
                <img src="../public/storage/<?php echo e($application->img); ?>" alt="photo">
                <p><?php echo e($application->created_at); ?></p>
                <p><?php echo e($application->title); ?></p>
                <p class="description-applications"><?php echo e($application->description); ?></p>
                <p>Категория: <?php echo e($application->name); ?></p>
                <p>Статус: <?php echo e($application->status); ?></p>
                <?php if($application->status == 'Новая'): ?>
                    <div class="btn-application-decision">
                        <a class="btn btn-primary-category" onclick="return acceptFunction()">Принять</a>
                        <a class="btn btn-primary-category" onclick="return rejectFunction()">Отклонить</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>


    <form class="accept" action="<?php echo e(route('changeStatusPost', ['id' => $application->id])); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="mb-3">
            <input type="file" name="new_img" class="form-control <?php $__errorArgs = ['new_img'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="inputImg" aria-describedby="inputImgValidation" accept="image/*">
            <?php $__errorArgs = ['new_img'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div id="inputImgValidation" class="invalid-feedback"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <input type="hidden" name="id" value="<?php echo e($application->id); ?>">
        <input type="hidden" name="status" value="<?php echo e("Решена"); ?>">
        <button type="submit" class="btn btn-primary-category">Отправить</button>
    </form>

    <form class="reject" action="<?php echo e(route('changeStatusPost', ['id' => $application->id])); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="mb-3">
            <textarea  name="cause" class="form-textarea-control <?php $__errorArgs = ['cause'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="inputCause" aria-describedby="inputCauseValidation" placeholder="Причина отказа"></textarea>
            <?php $__errorArgs = ['cause'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div id="inputCauseValidation" class="invalid-feedback"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <input type="hidden" name="id" value="<?php echo e($application->id); ?>">
        <input type="hidden" name="status" value="<?php echo e("Отклонена"); ?>">
        <button type="submit" class="btn btn-primary-category">Отправить</button>
    </form>
    <script>
        let accept = document.querySelector('.accept');
        let reject = document.querySelector('.reject');

        function acceptFunction(){
            reject.classList.remove('reject--active');
            accept.classList.add('accept--active');
        }
        function rejectFunction(){
            accept.classList.remove('accept--active');
            reject.classList.add('reject--active');
        }
    </script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\pxatibk-m3\resources\views/admin/update.blade.php ENDPATH**/ ?>