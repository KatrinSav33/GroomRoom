<?php $__env->startSection('content'); ?>
    <?php $__empty_1 = true; $__currentLoopData = $applications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $application): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="main">
            <div class="card">
                <div class="application-card">
                    <p class="id-card">ID: <?php echo e($application->id); ?></p>
                    <img src="../public/storage/<?php echo e($application->photo); ?>" alt="photo">
                    <p><?php echo e($application->created_at); ?></p>
                    <p><?php echo e($application->name_animal); ?></p>
                    <p class="description-applications"><?php echo e($application->description); ?></p>
                    <p>Категория: <?php echo e($application->name); ?></p>
                    <p>Статус: <?php echo e($application->status); ?></p>
                    <?php if($application->status == 'Новая'): ?>
                        <form class="delete-form" action="<?php echo e(route('delete', ['id' => $application->id])); ?>" method="GET">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="btn btn-primary" onclick="return confirmDelete();" data-confirm = "true" data-operation = "delete" data-id = "<?php echo e($application->id); ?>">Удалить</button>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <h4 class="no-applications">Вы не создали ни одной заявки <a href="<?php echo e(route('create')); ?>">Создать заявку</a></h4>
    <?php endif; ?>


    <script>
        function confirmDelete(){
            return confirm('Вы действительно хотите удалить заявку?');
        }
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\pxatibk-m3\resources\views/user/account.blade.php ENDPATH**/ ?>