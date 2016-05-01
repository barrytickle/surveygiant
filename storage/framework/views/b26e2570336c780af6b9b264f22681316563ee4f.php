<?php $__env->startSection('content'); ?>
    <div class="row">
        <h1>Edit user <?php echo e($user->name); ?></h1>
    </div>
    <div class="row">
        <?php echo Form::model($user, ['method' => 'PATCH', 'url' => 'admin/user/' . $user->id, 'class' => 'login-box'] ); ?>

        <?php echo Form::label('name', 'Edit Name: '); ?>

        <?php echo Form::text('name', null); ?>

        <?php echo Form::label('email', 'Edit Email: '); ?>

        <?php echo Form::email('email', null); ?>

        <?php echo Form::submit('Update User', ['class' => 'btn']); ?>

        <?php echo Form::close(); ?>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>