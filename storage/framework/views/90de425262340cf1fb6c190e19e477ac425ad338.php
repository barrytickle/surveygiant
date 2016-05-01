<?php $__env->startSection('content'); ?>
    <div class="row">
        <?php foreach($category as $cat): ?>
            <h1>Category: <?php echo e($cat->CategoryName); ?></h1>
        <div class="card-section clearfix">
                <?php foreach($cat->surveys as $survey): ?>
                     <?php if(!$survey): ?>
                         <h4>Sorry, no surveys are available yet. Be the first to create one for this category!</h4>
                     <?php endif; ?>
                     <?php if($survey->published == 1): ?>
                    <div class="card">
                        <div class="card-header"><h2><?php echo e($survey->name); ?></h2></div>
                        <div class="card-body">
                            <ul>
                                <li>Author: <?php echo e($survey->user->name); ?></li>
                                <li>Created: <?php echo e($survey->published_at); ?></li>
                                <li>Days Left: <?php echo e($survey->expire); ?></li>
                            </ul>
                        </div>
                        <div class="card-footer">
                            <button class="btn"><a href="/survey/<?php echo e($survey->slug); ?>">View Survey</a></button>
                        </div>
                    </div>
                    <?php endif; ?>
                <?php endforeach; ?>
        <?php endforeach; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>