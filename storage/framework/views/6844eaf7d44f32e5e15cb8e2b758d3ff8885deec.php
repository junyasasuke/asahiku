<?php $__env->startSection('content'); ?>
    <div class="">
      <div class="">
        <h6>活動名</h6>
      </div>

          <h1 class='each-title'><?php echo e($project->title); ?></h1>
          <div class="">
            <h6>活動概要</h6>
          </div>
          <div class="content box">
            <?php echo e($project->description); ?>

          </div>
          <div class="">
          <p>
              <a href="/projects/<?php echo e($project->id); ?>/edit">↑編集</a>
          </p>
          </div>
     </div>

<div class="">


      <div class="box">

                <form  action="/tasks" method="post" class="box">
                  <?php echo csrf_field(); ?>
                  <div class="field">
                    <label class="label" for='body'>活動内容（todo）</label>
                        <div class="control">
                            <input type="text" class="input" name="body" placefolder="New Task">
                        </div>
                  </div>

                  <input type="hidden" name="project_id" value="<?php echo e($project->id); ?>">

                  <div class="field">
                    <div class="control">
                      <button type="submit" name="button is-link">詳細追加</button>
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
      <?php if($project->tasks->count()): ?>
        <?php $__currentLoopData = $project->tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div>
        <form  action="/tasks/<?php echo e($task->id); ?>" method="post">
          <?php echo method_field('PATCH'); ?>
          <?php echo csrf_field(); ?>
          <label class="checkbox <?php echo e($task->completed ? 'is-complete': ''); ?>" for='completed'>
            <input type="checkbox" name="completed" onchange="this.form.submit()"
                <?php echo e($task->completed ? 'checked': ''); ?>>
             <input type="text" name="" value="<?php echo e($task->body); ?>">これ編集と削除できるようにする <button type="submit" name="button">変更</button>
          </label>
        </form>
      </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

      </div>
      <?php endif; ?>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\Laracast\resources\views/projects/show.blade.php ENDPATH**/ ?>