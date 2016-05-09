<?php $__env->startSection('content'); ?>
    <div class="row">
        <h1>Create a survey</h1>
        <?php echo Form::open(array('action' => 'SurveyController@store', 'class'=>'login-box')); ?>

        <section class="survey-section section-active">
            <?php echo Form::label('name', 'Survey Name:'); ?>

            <?php echo Form::text('name', null); ?>

            <?php echo Form::label('description', 'Survey Description:'); ?>

            <?php echo Form::textarea('description', null); ?>

            <?php echo Form::label('expire', 'How many days would you like this to be available for?:'); ?>

            <?php echo Form::number('expire', null); ?>

            <?php echo Form::label('category', 'Category:'); ?>

            <?php echo Form::select('category[]', $cats, null); ?>

            <?php echo Form::submit('Create Survey', array('class' => 'btn btn-center')); ?>

        </section>
        <?php echo Form::close(); ?>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>