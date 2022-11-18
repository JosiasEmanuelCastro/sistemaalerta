

<?php $__env->startSection('content'); ?>
    <div class="col-md-6 mx-auto">
        <div class="py-4"></div>
        <h3>Todas las rutas</h3>
        <div class="row">
            <?php $__currentLoopData = $rutas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ruta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-6 col-lg-4 col-md-4 p-2 p-md-3">
                    <a href="<?php echo e(route('ruta.show', $ruta)); ?>"  class="bg-light card relative">
                        <img class="align-items-start card-img d-flex flex-column justify-content-end" src="<?php echo e(Storage::url($ruta->image_url)); ?>">
                        <div class="card-gradient p-2 w-100 absolute">
                            <h5 class="mb-0 text-light"><?php echo e($ruta->title); ?></h5>
                        </div>
                        <div class="bg-primary card-line-bottom"></div>
                    </a>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Desktop\03 EEST\Olimpiadas\pazmuseu\resources\views/ruta/index.blade.php ENDPATH**/ ?>