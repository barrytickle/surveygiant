<?php $__env->startSection('extra-nav'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <h1>Add Question</h1>
    </div>
    <!-- Store question method linked-->
    <?php echo Form::open(array('action'=> 'QuestionController@store', 'class' => 'login-box')); ?>

            <!-- will have two hidden fields, survey id and the survey slug, this is so it can be attached in the pivot table
            and redirect back to surveys-->
    <?php foreach($survey as $sur): ?>
        <?php echo Form::hidden('slug', $sur->slug); ?>

        <?php echo Form::hidden('id', $sur->id); ?>

    <?php endforeach; ?>

            <!-- form for entering questions -->
        <?php echo Form::label('QuestionName', 'Enter Question Title'); ?>

        <?php echo Form::text('QuestionName', null); ?>

        <?php echo Form::label('QuestionType', 'Select Question Type:'); ?>

                <!-- Select box with three possible choices for question type -->
        <?php echo Form::select('QuestionType', [
           'Short' => 'Short',
           'Long' =>  'Long',
           'Radio' => 'Radio'], null, ['id' => 'QuestionType']
        ); ?>

        <?php echo Form::submit('Add Question', array('class'=> 'btn', 'id' => 'QuestionSub')); ?>

    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>