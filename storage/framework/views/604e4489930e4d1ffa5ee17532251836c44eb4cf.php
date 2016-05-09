<?php $__env->startSection('content'); ?>
    <div class="row">
        <h1>Edit Categories</h1>
        <div class="row">
            <a href="/admin/category/create"><button type="button" class="btn">Add New Category</button></a>
        </div>
        <table>
            <thead>
            <tr>
                <th width="200">Category Name</th>
                <th width="150">Category Description</th>
                <th width="150">Edit</th>
                <th width="150">Delete</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($category as $cats): ?>
                <tr>
                    <td><a href="/admin/category/<?php echo e($cats->id); ?>/"><?php echo e($cats->CategoryName); ?></a></td>
                    <td><?php echo e($cats->CategoryDescription); ?></td>
                    <td><a href="/admin/category/<?php echo e($cats->id); ?>/edit"><button type="button" class="btn">Edit</button></a></td>
                    <td><?php echo Form::open(['method' => 'DELETE', 'route' => ['admin.category.destroy', $cats->id]]); ?>

                        <?php echo Form::submit('Delete', ['class' => 'btn']); ?>

                        <?php echo Form::close(); ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>