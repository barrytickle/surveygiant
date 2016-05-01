<?php $__env->startSection('content'); ?>
    <div class="row">
        <h1>Create Category</h1>
    </div>
    <?php echo Form::open(array('action'=> 'RoleController@store', 'class' => 'login-box')); ?>

    <?php echo Form::label('name', 'Enter Role Name:'); ?>

    <?php echo Form::text('name', null); ?>

    <?php echo Form::label('label', 'Enter Role Label:'); ?>

    <?php echo Form::text('label', null); ?>

    <?php echo Form::submit('Add Role', array('class'=> 'btn')); ?>

    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>