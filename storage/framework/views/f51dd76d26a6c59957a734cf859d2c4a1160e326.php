<?php $__env->startSection('content'); ?>
    <div class="row">
        <h1><?php echo e($user->name); ?> - Surveys</h1>
    </div>
    <div class="row">
        <table>
            <thead>
                <tr>
                    <th width="200">Survey Name</th>
                    <th width="150">Survey Category</th>
                    <th width="150">Created at</th>
                    <th width="150">Days Left</th>
                    <th width="150">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($survey as $surveys): ?>
                    <tr>
                        <td><?php echo e($surveys->name); ?></td>
                        <?php foreach($surveys->category as $category): ?>
                        <td><a href="/admin/category/<?php echo e($category->id); ?>"><?php echo e($category->CategoryName); ?></a></td>
                        <?php endforeach; ?>
                        <td><?php echo e($surveys->created_at); ?></td>
                        <td><?php echo e($surveys->expire); ?></td>
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