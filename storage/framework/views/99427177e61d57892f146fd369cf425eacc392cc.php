<?php $__env->startSection('title'); ?> English tests - Reminders <?php $__env->stopSection(); ?>
<?php $__env->startSection('description'); ?> With our shortened versions of the lessons, remind yourself of the most important points on your journey to improve your English. <?php $__env->stopSection(); ?>
<?php $__env->startSection('keywords'); ?> English test, Test, Reminders, Business, Lessons <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ">
                    <div class="titlepage">
                        <h2><strong class="yellow">quick</strong><br>reminder</h2>
                        <span>before taking the tests</span>
                        <p>With our shortened versions of the lessons, remind yourself of the most important points on your journey to improve your English.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                $i = 1;
                ?>
                <?php $__currentLoopData = $reminders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reminder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-3 col-sm-6 mb-5">
                        <div class="gallery border-tab">
                            <a href="<?php echo e(asset('assets/img/'.$reminder->path)); ?>" class="big" rel="rel<?php echo e($i++); ?>">
                                <img src="<?php echo e(asset('assets/img/'.$reminder->path)); ?>" alt="<?php echo e($reminder->alt); ?>" title="<?php echo e($reminder->alt); ?>">
                                <div class="middle">
                                    <div class="text2">View More</div>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div div="row">
                <div class="col-12">
                    <ul class="pagination pagination-md justify-content-end">
                        <?php echo e($reminders->links("pagination::bootstrap-4")); ?>

                    </ul>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Jovana\OneDrive\Desktop\english-tests\resources\views/pages/main/reminders.blade.php ENDPATH**/ ?>