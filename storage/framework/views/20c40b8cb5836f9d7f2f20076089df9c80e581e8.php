<?php $__env->startSection('content'); ?>
    <div class="row">
        <h1>Edit Roles</h1>
        <div class="row">
            <a href="/admin/role/create"><button type="button" class="btn">Add New Role</button></a>
        </div>
        <table>
            <thead>
            <tr>
                <th width="200">Role Name</th>
                <th width="150">Role Label</th>
                <th width="150">Edit</th>
                <th width="150">Delete</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($role as $roles): ?>
                <tr>
                    <td><a href="/admin/role/<?php echo e($roles->id); ?>/"><?php echo e($roles->name); ?></a></td>
                    <td><?php echo e($roles->label); ?></td>
                    <td><a href="/admin/role/<?php echo e($roles->id); ?>/edit"><button type="button" class="btn">Edit</button></a></td>
                    <td><?php echo Form::open(['method' => 'DELETE', 'route' => ['admin.role.destroy', $roles->id]]); ?>

                        <?php echo Form::submit('Delete', ['class' => 'btn']); ?>

                        <?php echo Form::close(); ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>