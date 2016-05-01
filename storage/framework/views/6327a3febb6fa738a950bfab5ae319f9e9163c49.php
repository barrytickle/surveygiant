<?php $__env->startSection('content'); ?>

    <div class="row">
        <h1>Edit Question - <?php echo e($question->QuestionName); ?></h1>
        <?php if($errors->any()): ?>
            <div>
                <ul class="alert alert-danger">
                    <?php foreach($errors->all() as $error): ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; ?>

                </ul>
            </div>
        <?php endif; ?>
        <?php echo Form::model($question, ['method' => 'PATCH', 'url' => 'question/' . $question->id, 'class' => 'login-box'] ); ?>

        <?php echo Form::hidden('id', $question->id); ?>

        <?php echo Form::label('QuestionName', 'Question Name: '); ?>

        <?php echo Form::text('QuestionName', null); ?>

        <?php echo Form::label('QuestionType', 'Select Question Type:'); ?>

        <?php echo Form::select('QuestionType', [
           'Short' => 'Short',
           'Long' =>  'Long',
           'Radio' => 'Radio'], null, ['id' => 'QuestionType']
        ); ?>

        <?php echo Form::submit('Update Question', ['class' => 'btn']); ?>

        <?php echo Form::close(); ?>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>