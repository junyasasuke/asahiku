<?php $__env->startSection('content'); ?>



<div class="">
  <div class="">



  <h1>編集</h1>

  <form action="/projects/<?php echo e($project->id); ?>" method="post" class="box">
    <?php echo e(method_field('PATCH')); ?>

    <?php echo csrf_field(); ?>
    <div class="box">
    <div class="field">
      <label class="label" for="title">活動名</label>
      </div>
      <div class="control">
        <input type="text" class="input" name="title" placeholder="Title" value="<?php echo e($project->title); ?>">
      </div>
    </div>

    <div class="box">

    <div class="field">
      <label for="description" class="label">活動概要</label>

            <div class="control">
              <textarea name="description" class="textarea"><?php echo e($project->description); ?></textarea>
            </div>
            <br>
            <?php if(isset($message)): ?>
             <div class="notification is-danger">
               <ul>

                  <li><?php echo e($message); ?></li>

               </ul>
             </div>
             <?php endif; ?>
    </div>

        </div>

    <div class="field">
      <div class="control">
        <button type="submit">更新</button>
      </div>
    </div>

  </form>

  <form action="/projects/<?php echo e($project->id); ?>" method="post">
    <?php echo e(method_field('DELETE')); ?>

    <?php echo csrf_field(); ?>
    <div class="field">
      <div class="control">
        <button type="submit" name="button" onClick="return confirm('<?php echo e($project->title); ?>を削除します。\nよろしいですか？');">活動を削除</button>
        <input type="hidden" name="id" value="<?php echo e($project->id); ?>">
      </div>

    </div>
  </form>

</div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laracast\resources\views/projects/edit.blade.php ENDPATH**/ ?>