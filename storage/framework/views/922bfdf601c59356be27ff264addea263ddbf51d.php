<?php $__env->startSection('content'); ?>
    <div class="row">
        <!-- Will loop through surveys -->
        <?php foreach($survey as $sur): ?>
                <!-- will send responses to custom method "response" -->
            <?php echo Form::open(array('action' => 'SurveyController@response', 'class' => 'login-box survey-box')); ?>

                    <!-- will show intro screen -->
            <section class="survey-section section-active">
                <h1><?php echo e($sur->name); ?></h1>
                <h3>Author : <?php echo e($sur->user->name); ?></h3>
                <p><?php echo e($sur->description); ?></p>
                <button type="button" class="btn js-btn-right">Start Survey</button>
            </section>
        <!-- will loop through each question -->
            <?php foreach($sur->question as $question): ?>
                <section class="survey-section">
                    <h1><?php echo e($question->QuestionName); ?></h1>
                    <h2>Responses</h2>
                    <!-- displays all responses for that question as a list. -->
                    <ul class="responses">
                        <?php foreach($question->response as $response): ?>
                            <li><?php echo e($response->ResponseName); ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <button type="button" class="btn js-btn-left">Back</button>
                    <button type="button" class="btn js-btn-right">Next</button>
                </section>

            <?php endforeach; ?>
                    <!-- end of survey, submit form removed.-->
            <section class="survey-section">
                <h1>End of Survey</h1>
                <button type="button" class="btn js-btn-left">Back</button>
            </section>

            <?php echo Form::close(); ?>

        <?php endforeach; ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>