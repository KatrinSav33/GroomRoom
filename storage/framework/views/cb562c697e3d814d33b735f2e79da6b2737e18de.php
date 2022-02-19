<?php $__env->startSection('content'); ?>
    <?php if(session()->has('add')): ?>
        <div class="alert alert-success">Категория успешно добавлена</div>
    <?php endif; ?>
    <form class="form-category" method="POST" enctype="multipart/form-data">
        <p>Добавить категорию</p>
        <?php echo csrf_field(); ?>
        <div class="mb-3">
            <input type="text" name="name" class="form-control-category <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="inputName" aria-describedby="inputNameValidation" placeholder="Название категории">
            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div id="inputNameValidation" class="invalid-feedback"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <button type="submit" class="btn btn-primary-category">Добавить категорию</button>
    </form>
    <?php if(session()->has('destroy')): ?>
        <div class="alert alert-success">Категория удалена</div>
    <?php endif; ?>
    <table class="table-category">
        <thead>
        <tr>
            <th>Название категории</th>
            <th>Действие</th>
        </tr>
        </thead>
        <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr class="tr-category">
                <td><?php echo e($category->name); ?></td>
                <td>
                    <form class="delete-form-category" action="<?php echo e(route('destroyCategory', ['category' => $category->id])); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="submit" class="" value="Удалить">
                    </form>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td class="invalid-feedback">Категории отсутствуют</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\pxatibk-m3\resources\views/admin/categories.blade.php ENDPATH**/ ?>