

<?php $__env->startSection('content'); ?>
<div class="py-3"></div>
<div class="col-md-10 mx-auto">
    <?php if(session('info')): ?>
      <div class="alert alert-success">
         <strong><?php echo e(session('info')); ?></strong>
      </div>
    <?php endif; ?>
   <div class="card">
      <div class="card-body">
         <h3 class="mb-4">Editar enfermero</h3>
         <?php echo Form::model($enfermero, ['route' => ['enfermero.update', $enfermero->id], 'autocomplete' => 'off', 'method' => 'put']); ?>


            <?php echo $__env->make('enfermero.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php echo Form::submit('Editar enfermero', ['class' => 'btn btn-primary']); ?>



         <?php echo Form::close(); ?>

      </div>
   </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Desktop\Desktop\code\resources\views/enfermero/edit.blade.php ENDPATH**/ ?>