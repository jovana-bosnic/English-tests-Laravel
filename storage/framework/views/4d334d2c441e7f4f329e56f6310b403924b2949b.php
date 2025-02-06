<?php $__env->startSection('content'); ?>
    <div id="contact" class="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2><strong class="yellow"><?php echo e($categories["category"]); ?></strong><br><?php echo e($categories["subcategory"]); ?></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <form id="post_form" method="post" class="contact_form" action="<?php echo e(route('tests.update', ['test' => $categories["idCategory"]])); ?>">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="row">
                            <?php
                                $counter = 1;
                            ?>
                            <?php $__currentLoopData = $tests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exercise): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="row border-tab">
                                    <?php echo $__env->make('components.exercise', ['exercise' => $exercise, 'i' => $exercise->exerciseId], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                    <?php $__currentLoopData = $exercise->questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="row border-tab mx-3">
                                            <?php echo $__env->make('components.question', ['question' => $question, 'i' => $exercise->exerciseId, 'j' => $question->id], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-12">
                                <button class="send_btn">Edit</button>
                            </div>
                        </div>
                    </form>
                    <div class="mt-5"><h2 id="result"></h2></div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Jovana\OneDrive\Desktop\english-tests\resources\views/pages/tests/edit.blade.php ENDPATH**/ ?>