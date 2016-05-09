<?php $__env->startSection('content'); ?>
    <div class="row">
        <h1>Your Surveys</h1>

        <?php foreach($surveys as $survey): ?>
            <div class="card card-large">
                <div class="card-header"><h2><?php echo e($survey->name); ?></h2></div>
                <div class="card-body">
                    <ul>
                        <!-- Will display the survey category and if the survey is published in the card body -->
                        <?php foreach($survey->category as $cat): ?>
                        <li>Category: <?php echo e($cat->CategoryName); ?></li>
                        <?php endforeach; ?>
                        <li>Published:
                            <?php if($survey->published < 1): ?>
                                No
                            <?php else: ?>
                                Yes
                            <?php endif; ?>
                        </li>
                    </ul>
                </div>
                <!-- Options for each survey:
                    - View
                    - Edit
                    - Questions
                    - Responses
                    - Submit
                 -->
                <div class="card-footer">
                    <div class="row btn-center">
                        <a href="/survey/<?php echo e($survey->slug); ?>"><button class="btn">View Survey</button></a>
                    </div>
                    <div class="row btn-center">
                        <a href="/survey/<?php echo e($survey->id); ?>/edit"> <button class="btn">Edit Survey</button></a>
                    </div>
                    <div class="row btn-center">
                        <a href="/question/<?php echo e($survey->slug); ?>"><button class="btn btn-center">Questions</button></a>
                    </div>
                    <div class="row btn-center">
                        <a href="/responses/<?php echo e($survey->slug); ?>"><button class="btn">View Responses</button></a>
                    </div>
                    <!-- will link to custom destroy method-->
                    <div class="row btn-center">
                        <?php echo Form::open(['method' => 'DELETE', 'route' => ['survey.destroy', $survey->id]]); ?>

                        <?php echo Form::submit('Delete Survey', ['class' => 'btn']); ?>

                        <?php echo Form::close(); ?>


                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>