<?php $__env->startSection('content'); ?>
        <!-- Data will be presented as a table -->
    <div class="row">
        <h1>Choice List - <?php echo e($question->QuestionName); ?></h1>
    </div>
    <div class="row">
        <div class="row">
            <a href="/choice/<?php echo e($question->id); ?>/create"><button type="button" class="btn">Add new Choice</button></a>
        </div>
        <table>
            <thead>
            <tr>
                <th width="200">Choice</th>
                <th width="200">Edit</th>
                <th width="200">Delete</th>
            </tr>
            </thead>
            <tbody>
            <!-- Loops through choices. -->
            <?php foreach($question->choice as $choice): ?>
                <tr>
                    <td><?php echo e($choice->ChoiceName); ?></td>
                    <td><a href="/choice/<?php echo e($choice->id); ?>/edit"><button class="btn" type="button">Edit</button></a></td>
                    <td>
                        <!-- links to custom delete method-->
                        <?php echo Form::open(['method' => 'DELETE', 'route' => ['choice.destroy', $choice->id]]); ?>

                        <?php echo Form::submit('Delete', ['class' => 'btn']); ?>

                        <?php echo Form::close(); ?>

                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>