<?php $__env->startSection('content'); ?>
    <div class="row">
        <h1>Edit user <?php echo e($category->name); ?></h1>
    </div>
    <div class="row">
        <?php echo Form::model($category, ['method' => 'PATCH', 'url' => 'admin/category/' . $category->id, 'class' => 'login-box'] ); ?>

        <?php echo Form::label('CategoryName', 'Edit Category Name:'); ?>

        <?php echo Form::text('CategoryName', null); ?>

        <?php echo Form::label('CategoryDescription', 'Edit Category Description:'); ?>

        <?php echo Form::text('CategoryDescription', null); ?>

        <?php echo Form::submit('Update Category', ['class' => 'btn']); ?>

        <?php echo Form::close(); ?>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>