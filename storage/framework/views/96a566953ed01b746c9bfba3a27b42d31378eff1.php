<?php $__env->startSection('content'); ?>
<div class="row">
    <h1>Survey Questions</h1>
</div>
<div class="row">
    <!-- loops through all surveys-->
    <?php foreach($survey as $surveys): ?>
            <!-- gives the user the chance to add a question -->
        <div class="row">
            <a href="/question/<?php echo e($surveys->slug); ?>/create"><button type="button" class="btn">Add new Question</button></a>
        </div>
        <table>
            <thead>
            <tr>
                <th width="200">Question</th>
                <th width="200">Type</th>
                <th width="200">Edit</th>
                <th width="200">Delete</th>
            </tr>
            </thead>
            <tbody>
            <!-- will loop through all questions for the selected survey. -->
        <?php foreach($surveys->question as $question): ?>
                <tr>
                    <!-- allows the user to go to a seperate link to add choices to question -->
                    <?php if($question->QuestionType == 'Radio'): ?>
                        <td><a href="/choice/<?php echo e($question->id); ?>"><?php echo e($question->QuestionName); ?></a></td>
                    <?php else: ?>
                    <td><?php echo e($question->QuestionName); ?></td>
                    <?php endif; ?>
                    <td><?php echo e($question->QuestionType); ?></td>
                    <td><a href="/question/<?php echo e($question->id); ?>/edit"><button class="btn" type="button">Edit</button></a></td>
                    <!-- will trigger the destroy method in the question controller. -->
                    <td>
                        <?php echo Form::open(['method' => 'DELETE', 'route' => ['question.destroy', $question->id]]); ?>

                        <?php echo Form::submit('Delete', ['class' => 'btn']); ?>

                        <?php echo Form::close(); ?>

                    </td>
                </tr>
        <?php endforeach; ?>
            </tbody>
        </table>
    <?php endforeach; ?>


</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>