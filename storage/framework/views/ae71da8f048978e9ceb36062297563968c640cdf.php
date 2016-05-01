<?php $__env->startSection('content'); ?>
    <div class="row">
        <h1><?php echo e($roles); ?> - Users</h1>
    </div>
    <div class="row">
        <table>
            <thead>
            <tr>
                <th width="200">User Name</th>
                <th width="150">Edit</th>
                <th width="150">Delete</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($roles as $role): ?>
                <tr>
                    <?php foreach($role->user as $user): ?>
                        <td><?php echo e($user); ?></td>
                    <?php endforeach; ?>
                    <td>Edit</td>
                    <td>Delete</td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>