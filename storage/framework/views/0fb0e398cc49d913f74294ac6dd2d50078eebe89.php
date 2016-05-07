<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="card-section clearfix">
            <?php foreach($cats as $cat): ?>
                <div class="card">
                    <div class="card-header"><h2><?php echo e($cat->CategoryName); ?></h2></div>
                    <div class="card-body">
                        <ul>
                            <?php foreach($cat->surveys as $survey): ?>

                                <?php if($survey->published == 1): ?>
                                    <li><a href="/survey/<?php echo e($survey->slug); ?>"><?php echo e($survey->name); ?></a></li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="card-footer">
                        <button class="btn"><a href="/category/<?php echo e($cat->CategoryName); ?>">View All</a></button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>