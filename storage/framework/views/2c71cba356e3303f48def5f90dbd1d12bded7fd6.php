<?php $__env->startSection('content'); ?>
  <p class="admin-p">Заявки пользователей</p>
    <?php $__empty_1 = true; $__currentLoopData = $applications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $application): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="main">
            <div class="card">
                <div class="application-card">
                    <p class="id-card">ID пользователя: <?php echo e($application->id_user); ?></p>
                    <p class="id-card">№ заявки: <?php echo e($application->id); ?></p>
                    <img src="../public/storage/<?php echo e($application->photo); ?>" alt="photo">
                    <p><?php echo e($application->created_at); ?></p>
                    <p><?php echo e($application->name_animal); ?></p>
                    <p class="description-applications"><?php echo e($application->description); ?></p>
                    <p>Категория: <?php echo e($application->name); ?></p>
                    <p>Статус: <?php echo e($application->status); ?></p>
                    <?php if($application->status == 'Новая'): ?>
                        <a class="status-change" href="<?php echo e(route('changeStatus', ['id' => $application->id])); ?>">Изменить статус</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <h4 class="no-applications">Заявки отсутствуют</h4>
    <?php endif; ?>


    <script>
        function confirmDelete(){
            return confirm('Вы действительно хотите удалить заявку?');
        }
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\pxatibk-m3\resources\views/admin/account.blade.php ENDPATH**/ ?>