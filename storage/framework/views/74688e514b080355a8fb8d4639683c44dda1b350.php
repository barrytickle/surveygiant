<?php $__env->startSection('content'); ?>
    <div class="row">
        <h1>Create Category</h1>
    </div>
    <?php echo Form::open(array('action'=> 'AdminCategoryController@store', 'class' => 'login-box')); ?>

    <?php echo Form::label('CategoryName', 'Enter Category Name:'); ?>

    <?php echo Form::text('CategoryName', null); ?>

    <?php echo Form::label('CategoryDescription', 'Enter Category Description:'); ?>

    <?php echo Form::text('CategoryDescription', null); ?>

    <?php echo Form::submit('Add Category', array('class'=> 'btn')); ?>

    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>