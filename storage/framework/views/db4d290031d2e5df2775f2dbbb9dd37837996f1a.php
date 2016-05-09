<?php $__env->startSection('content'); ?>
    <div class="row">
        <h1>Add Choice</h1>
    </div>
    <!-- makes a form to create a choice for each question, will hide the question id so that the choice can redirect to the question choice -->
    <?php echo Form::open(array('action'=> 'ChoiceController@store', 'class' => 'login-box')); ?>

    <?php echo Form::hidden('id', $question->id); ?>

    <?php echo Form::label('ChoiceName', 'Enter Choice:'); ?>

    <?php echo Form::text('ChoiceName', null); ?>

    <?php echo Form::submit('Add Choice', array('class'=> 'btn')); ?>

    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>