<?php $__env->startSection('title'); ?>
    Create Projects
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div><a href="/projects">Projects</a></div>


<form class="" action="/projects" method="post">
 <?php echo csrf_field(); ?>
 <div class="field">
   <label class="label" for="title" >活動名</label>

   <div class="control">
      <input type="text" name="title" class="input"　required>
      <input type="hidden" name="username" value="<?php echo e($user->name); ?>">
   </div>
 </div>


 <div class="field">
   <label class="label" for="description" >活動概要</label>
   <div class="control">
     <textarea name="description" class="textarea"></textarea>
   </div>
 </div>


 <div class="field">
   <div class="control">
     <button type="submit" class="button is-link">作成</button>
   </div>
 </div>
<?php if($errors->any()): ?>
 <div class="notification is-danger">
   <ul>
     <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <li><?php echo e($error); ?></li>
     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   </ul>
 </div>
<?php endif; ?>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\Laracast\resources\views/projects/create.blade.php ENDPATH**/ ?>