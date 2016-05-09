<?php $__env->startSection('content'); ?>
    <div class="row">
        <h1><?php echo e($roles->name); ?> - Users</h1>
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
                <?php foreach($roles->user as $user): ?>
                    <?php foreach($user->role as $role): ?>
                        <?php if($role->id == $roles->id): ?>
                        <tr>
                            <td><?php echo e($user->name); ?></td>
                            <td><a href="/admin/users/<?php echo e($user->id); ?>/edit"><button type="button" class="btn">Edit</button></a></td>
                            <td><?php echo Form::open(['method' => 'DELETE', 'route' => ['admin.role.destroy', $role->id]]); ?>

                                <?php echo Form::submit('Delete Role', ['class' => 'btn']); ?>

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