<?php $__env->startSection('content'); ?>
    <div class="row">
        <h1>Edit user <?php echo e($role->name); ?></h1>
    </div>
    <div class="row">
        <?php echo Form::model($role, ['method' => 'PATCH', 'url' => 'admin/role/' . $role->id, 'class' => 'login-box'] ); ?>

        <?php echo Form::label('name', 'Edit Role Name:'); ?>

        <?php echo Form::text('name', null); ?>

        <?php echo Form::label('label', 'Edit Role Label:'); ?>

        <?php echo Form::text('label', null); ?>

        <?php echo Form::submit('Update Role', ['class' => 'btn']); ?>

        <?php echo Form::close(); ?>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>