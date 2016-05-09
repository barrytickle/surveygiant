<?php $__env->startSection('content'); ?>
    <div class="row">
        <h1>View Surveys</h1>
        <table>
            <thead>
            <tr>
                <th width="200">Survey Name</th>
                <th width="150">Survey Description</th>
                <th width="150">Category</th>
                <th width="150">Author</th>
                <th width="150">Start Date</th>
                <th width="150">Delete</th>
            </tr>
            </thead>
            <tbody>
            <!-- due to the admin only being able to view and delete surveys, no edit has been created.
                 This will loop through the surveys giving the admin only the option to delete any surveys
                 that break the site rules
             -->
            <?php foreach($survey as $surveys): ?>
                <tr>
                    <td><?php echo e($surveys->name); ?></td>
                    <td><?php echo e($surveys->description); ?></td>
                    <?php foreach($surveys->category as $category): ?>
                        <td><a href="/admin/category/<?php echo e($category->id); ?>"><?php echo e($category->CategoryName); ?></a></td>
                    <?php endforeach; ?>
                    <td><a href="/admin/user/<?php echo e($surveys->user->id); ?>"><?php echo e($surveys->user->name); ?></a></td>
                    <td><?php echo e($surveys->created_at); ?></td>
                    <td><?php echo Form::open(['method' => 'DELETE', 'route' => ['admin.survey.destroy', $surveys->id]]); ?>

                        <?php echo Form::submit('Delete', ['class' => 'btn']); ?>

                        <?php echo Form::close(); ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>