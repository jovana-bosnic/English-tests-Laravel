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
                    <form id="post_form" class="contact_form">
                        <div class="row">
                            <?php
                                $counter = 1;
                            ?>
                            <?php if(count($tests) > 0): ?>
                                <?php $__currentLoopData = $tests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exercise): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $quCounter = 1; ?>
                                    <div class="col-md-12">
                                        <h3 class="yellow mt-5"><?php echo e($counter++); ?>. <?php echo e($exercise->text); ?></h3>
                                    </div>
                                    <div class="col-md-12">
                                        <p class="assignment">- <?php echo e($exercise->assignment); ?></p>
                                    </div>
                                    <?php if($exercise->type == "text"): ?>
                                        <?php $__currentLoopData = $exercise->questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-md-11">
                                                <?php echo e($quCounter++); ?>.
                                                <?php if(is_null($question->text_first)): ?>
                                                    <input class="contact_control input-line" type="text" id="questionId-<?php echo e($question->id); ?>" name="questionId-<?php echo e($question->id); ?>">
                                                <?php else: ?>
                                                    <?php echo e($question->text_first); ?>

                                                <?php endif; ?>
                                                <?php if(!is_null($question->text_first)): ?>
                                                    <input class="contact_control input-line" type="text" id="questionId-<?php echo e($question->id); ?>" name="questionId-<?php echo e($question->id); ?>">
                                                <?php endif; ?>
                                                <?php if(!is_null($question->text_second)): ?>
                                                    <?php echo e($question->text_second); ?>

                                                <?php endif; ?>
                                            </div>
                                            <div class="col-md-1">
                                                <i id="correct-<?php echo e($question->id); ?>" class='fa fa-check btn-success p-1 correct-answer hide' aria-hidden='true'></i>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <span class="explanation" id="explanation-<?php echo e($question->id); ?>"></span>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                        <?php $__currentLoopData = $exercise->questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-md-12">
                                                <?php echo e($quCounter++); ?>. <?php echo e($question->text_first); ?>

                                            </div>
                                            <div class="col-md-11">
                                                <?php $__currentLoopData = $question->answers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $answer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <input class="radio-answer" type="radio" value="<?php echo e($answer->text); ?>" name="questionId-<?php echo e($question->id); ?>"> <?php echo e($answer->text); ?>

                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                            <div class="col-md-1">
                                                <i id="correct-<?php echo e($question->id); ?>" class='fa fa-check btn-success p-1 correct-answer hide' aria-hidden='true'></i>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <span class="explanation" id="explanation-<?php echo e($question->id); ?>"></span>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-12">
                                    <button id="checkAnswers" data-id="<?php echo e($categories["idCategory"]); ?>" class="send_btn">Check answers</button>
                                </div>
                            <?php else: ?>
                                <div class="col-md-12">
                                    <h2>Dear users, the test is being prepared. Thank you for your understanding.</h2>
                                </div>
                            <?php endif; ?>
                        </div>
                    </form>
                    <div class="mt-5"><h2 id="result"></h2></div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Jovana\OneDrive\Desktop\english-tests\resources\views/pages/tests/show.blade.php ENDPATH**/ ?>