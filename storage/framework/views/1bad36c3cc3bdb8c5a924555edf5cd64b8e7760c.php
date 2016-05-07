<?php $__env->startSection('content'); ?>
    <div class="row">
        <h1>Your Surveys</h1>
        <?php foreach($surveys as $survey): ?>
            <div class="card card-large">
                <div class="card-header"><h2><?php echo e($survey->name); ?></h2></div>
                <div class="card-body">
                    <ul>
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
                        <?php /*<li>Days left: <?php echo e($survey->expire); ?></li>*/ ?>
                    </ul>
                </div>
                <div class="card-footer">
                    <div class="row btn-center">
                        <button class="btn "><a href="/survey/<?php echo e($survey->slug); ?>">View Survey</a></button>
                    </div>
                    <div class="row btn-center">
                        <button class="btn"><a href="/survey/<?php echo e($survey->id); ?>/edit">Edit Survey</a></button>
                    </div>
                    <div class="row btn-center">
                        <button class="btn btn-center"><a href="/question/<?php echo e($survey->slug); ?>">Questions</a></button>
                    </div>
                    <div class="row btn-center">
                         <button class="btn"><a href="/responses/<?php echo e($survey->slug); ?>">View Responses</a></button>
                    </div>
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