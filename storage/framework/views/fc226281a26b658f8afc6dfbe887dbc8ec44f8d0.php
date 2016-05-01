<?php $__env->startSection('content'); ?>
    <div class="row">
        <h1><?php echo e($category->CategoryName); ?> - Surveys</h1>
    </div>
    <div class="row">
        <table>
            <thead>
            <tr>
                <th width="200">Survey Name</th>
                <th width="150">Author Name</th>
                <th width="150">Created at</th>
                <th width="150">Days Left</th>
                <th width="150">Delete</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($survey as $surveys): ?>
                <?php foreach($surveys->category as $cat): ?>
                    <?php if($cat->id == $category->id): ?>
                        <tr>
                            <td><?php echo $surveys->name; ?></td>
                            <td><a href="/admin/user/<?php echo e($surveys->user->id); ?>"><?php echo $surveys->user->name; ?></a></td>
                            <td><?php echo $surveys->created_at; ?></td>
                            <td><?php echo $surveys->expire; ?></td>
                            <td><?php echo Form::open(['method' => 'DELETE', 'route' => ['admin.survey.destroy', $surveys->id]]); ?>

                                <?php echo Form::submit('Delete', ['class' => 'btn']); ?>

                                <?php echo Form::close(); ?></td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>