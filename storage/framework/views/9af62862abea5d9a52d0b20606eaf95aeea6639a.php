

<?php $__env->startSection('content'); ?>
<div class="py-3"></div>
<div class="col-md-10 mx-auto">
   <div class="card">
      <div class="card-body">
         <h3 class="mb-4">Crear area</h3>
         <?php echo Form::open(['route' => 'area.create', 'autocomplete' => 'off']); ?>


            <?php echo $__env->make('area.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php echo Form::submit('Crear area', ['class' => 'btn btn-primary']); ?>



         <?php echo Form::close(); ?>

      </div>
   </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Desktop\Desktop\code\resources\views/area/create.blade.php ENDPATH**/ ?>