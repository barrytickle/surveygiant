<?php $__env->startSection('content'); ?>
    <div class="row">
        <h1>Edit Users</h1>
        <table>
            <thead>
            <tr>
                <th width="200">User Name</th>
                <th width="150">Email Address</th>
                <th width="150">Edit</th>
                <th width="150">Delete</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($user as $users): ?>
            <tr>
                <td><a href="/admin/user/<?php echo e($users->id); ?>/"><?php echo e($users->name); ?></a></td>
                <td><?php echo e($users->email); ?></td>
                <td><a href="/admin/user/<?php echo e($users->id); ?>/edit"><button type="button" class="btn">Edit</button></a></td>
                <td><?php echo Form::open(['method' => 'DELETE', 'route' => ['admin.user.destroy', $users->id]]); ?>

                    <?php echo Form::submit('Delete', ['class' => 'btn']); ?>

                    <?php echo Form::close(); ?></td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>