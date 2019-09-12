<?php $__env->startSection('title'); ?>
    Projects
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<br>
<br>
<div class="">


 <h2>旭区民の活動たち</h2>
 </div>
   <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
   <div class="">


   <div class="">
     <a href="/projects/<?php echo e($project->id); ?>" class="projects"> <li><?php echo e($project->title); ?>___ <?php echo e($project->username); ?></li></a>
   </div>
   <div class="pagelinks">
     <?php echo e($projects->links()); ?>

   </div>
   </div>

   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laracast\resources\views/projects/index.blade.php ENDPATH**/ ?>