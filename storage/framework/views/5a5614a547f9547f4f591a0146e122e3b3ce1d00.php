<?php $__env->startSection('content'); ?>
    <div class="row">
        <!-- Grabs survey name dynamically -->
        <h1>Edit - <?php echo e($survey->name); ?></h1>
        <!-- will update survey, patch url will link to the update method-->
        <?php echo Form::model($survey, ['method' => 'PATCH', 'url' => 'survey/' . $survey->id, 'class' => 'login-box']); ?>

        <section class="survey-section section-active">
            <?php echo Form::label('name', 'Survey Name:'); ?>

            <?php echo Form::text('name', null); ?>

            <?php echo Form::label('description', 'Survey Description:'); ?>

            <?php echo Form::textarea('description', null); ?>

            <?php echo Form::label('expire', 'How many days would you like this to be available for?:'); ?>

            <?php echo Form::number('expire', null); ?>

            <?php echo Form::label('category', 'Category:'); ?>

                    <!-- Will loop through categories-->
            <?php foreach($survey->category as $cat): ?>
                <?php echo Form::select('category[]', $cats,$cat->id ); ?>

            <?php endforeach; ?>
                    <!-- Gives the user the option to publish survey -->
            <?php echo Form::label('publish', 'Publish Survey?'); ?>

                    <!-- Will check to see if the survey is published, if it is it will leave the checkbox checked, else it will be unchecked. -->
            <?php if($survey->published == 1): ?>
                <?php echo Form::checkbox('publish', 'Publish', true); ?>

            <?php else: ?>
                <?php echo Form::checkbox('publish', 'Publish'); ?>

            <?php endif; ?>
            <?php echo Form::submit('Update Survey', ['class' => 'btn']); ?>

        </section>
        <?php echo Form::close(); ?>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>