<?php $__env->startSection('content'); ?>
    <div class="row">
        <?php foreach($survey as $sur): ?>
            <?php echo Form::open(array('action' => 'SurveyController@response', 'class' => 'login-box')); ?>

                <section class="survey-section section-active">
                    <h1><?php echo e($sur->name); ?></h1>
                    <h3>Author : <?php echo e($sur->user->name); ?></h3>
                    <p><?php echo e($sur->description); ?></p>
                    <button type="button" class="btn js-btn-right">Start Survey</button>
                </section>
            <?php foreach($sur->question as $question): ?>
                <section class="survey-section">
                    <h1><?php echo e($question->QuestionName); ?></h1>
                    <?php if($question->QuestionType == 'Short'): ?>
                        <?php echo Form::text('sur['.$question->id.']'); ?>

                    <?php endif; ?>
                    <?php if($question->QuestionType == 'Radio'): ?>
                        <div class="row">
                            <?php foreach($question->choice as $choice): ?>
                                <?php echo Form::radio('sur['.$question->id.']', $choice->ChoiceName, ['id' => $choice->ChoiceName.$question->id]); ?>

                                <?php echo Form::label($choice->ChoiceName.$question->id, $choice->ChoiceName); ?>

                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                    <?php if($question->QuestionType == 'Long'): ?>
                        <?php echo Form::textarea('sur['.$question->id.']'); ?>

                    <?php endif; ?>
                    <button type="button" class="btn js-btn-left">Back</button>
                    <button type="button" class="btn js-btn-right">Next</button>
                </section>
            <?php endforeach; ?>
            <section class="survey-section">
                <h1>End of survey</h1>
                <p>Thank you for finishing this survey, press submit to send.</p>
                <button type="button" class="btn js-btn-left">Back</button>
                <?php echo Form::submit('Submit Survey', array('class' => 'btn')); ?>

            </section>

            <?php echo Form::close(); ?>

        <?php endforeach; ?>


    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>