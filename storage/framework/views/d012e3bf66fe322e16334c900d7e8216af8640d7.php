<?php $__env->startSection('content'); ?>
    <div class="row">
        <h1>Edit Choice - <?php echo e($choice->ChoiceName); ?></h1>
        <?php if($errors->any()): ?>
            <div>
                <ul class="alert alert-danger">
                    <?php foreach($errors->all() as $error): ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; ?>

                </ul>
            </div>
        <?php endif; ?>
        <?php echo e($choice->id); ?>

        <?php echo Form::model($choice, ['method' => 'PATCH', 'url' => 'choice/' . $choice->id, 'class' => 'login-box'] ); ?>

        <?php echo Form::label('ChoiceName', 'Choice Text: '); ?>

        <?php echo Form::text('ChoiceName', null); ?>

        <?php echo Form::submit('Update Choice', ['class' => 'btn']); ?>

        <?php echo Form::close(); ?>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>