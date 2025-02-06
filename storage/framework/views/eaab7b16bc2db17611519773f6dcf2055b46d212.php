<?php if($question == null): ?>
<div class="col-md-12">
    <h4 class="mt-5 yellow">Question <?php echo e($j); ?>.</h4>
</div>
<div class="col-md-12">
    <div class="row">
        <div class="mb-3 col-4">
            <label for="q<?php echo e($j); ?>ex<?php echo e($i); ?>textFirst">First part</label>
            <input type="text" class="contact_control" id="q<?php echo e($j); ?>ex<?php echo e($i); ?>textFirst" name="q<?php echo e($j); ?>ex<?php echo e($i); ?>textFirst">
        </div>
        <div class="mb-3 col-4">
            <label for="q<?php echo e($j); ?>ex<?php echo e($i); ?>textSecond">Second part</label>
            <input type="text" class="contact_control" id="q<?php echo e($j); ?>ex<?php echo e($i); ?>textSecond" name="q<?php echo e($j); ?>ex<?php echo e($i); ?>textSecond">
        </div>
        <div class="mb-3 col-4">
            <label for="q<?php echo e($j); ?>ex<?php echo e($i); ?>explanation">Explanation</label>
            <input type="text" class="contact_control" id="q<?php echo e($j); ?>ex<?php echo e($i); ?>explanation" name="q<?php echo e($j); ?>ex<?php echo e($i); ?>explanation">
        </div>
    </div>
</div>
<div class="col-md-12">
    <div class="row">
        <div class="mb-3 col-4">
            <label for="q<?php echo e($j); ?>ex<?php echo e($i); ?>-correct">Correct answer</label>
            <input type="text" class="contact_control" id="q<?php echo e($j); ?>ex<?php echo e($i); ?>-correct" name="q<?php echo e($j); ?>ex<?php echo e($i); ?>correct">
        </div>
        <div class="mb-3 col-4">
            <label for="q<?php echo e($j); ?>ex<?php echo e($i); ?>-false1">False answer</label>
            <input type="text" class="contact_control" id="q<?php echo e($j); ?>ex<?php echo e($i); ?>-false1" name="q<?php echo e($j); ?>ex<?php echo e($i); ?>false1">
        </div>
        <div class="mb-3 col-4">
            <label for="q<?php echo e($j); ?>ex<?php echo e($i); ?>-false2">False answer</label>
            <input type="text" class="contact_control" id="q<?php echo e($j); ?>ex<?php echo e($i); ?>-false2" name="q<?php echo e($j); ?>ex<?php echo e($i); ?>false2">
        </div>
    </div>
</div>
<?php else: ?>
    <div class="col-md-12">
        <h4 class="mt-5 yellow">Question <?php echo e($j); ?>.</h4>
    </div>
    <div class="col-md-12">
        <div class="row">
            <div class="mb-3 col-4">
                <label for="q<?php echo e($j); ?>ex<?php echo e($i); ?>textFirst">First part</label>
                <input type="text" class="contact_control" id="q<?php echo e($j); ?>ex<?php echo e($i); ?>textFirst" name="q<?php echo e($j); ?>ex<?php echo e($i); ?>textFirst" value="<?php echo e($question->text_first); ?>">
            </div>
            <div class="mb-3 col-4">
                <label for="q<?php echo e($j); ?>ex<?php echo e($i); ?>textSecond">Second part</label>
                <input type="text" class="contact_control" id="q<?php echo e($j); ?>ex<?php echo e($i); ?>textSecond" name="q<?php echo e($j); ?>ex<?php echo e($i); ?>textSecond" value="<?php echo e($question->text_second); ?>">
            </div>
            <div class="mb-3 col-4">
                <label for="q<?php echo e($j); ?>ex<?php echo e($i); ?>explanation">Explanation</label>
                <input type="text" class="contact_control" id="q<?php echo e($j); ?>ex<?php echo e($i); ?>explanation" name="q<?php echo e($j); ?>ex<?php echo e($i); ?>explanation" value="<?php echo e($question->explanation); ?>">
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="row">
            <div class="mb-3 col-4">
                <?php $__currentLoopData = $question->answers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $answer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($answer->is_correct): ?>
                        <label for="q<?php echo e($j); ?>ex<?php echo e($i); ?>-correct">Correct answer</label>
                        <input type="text" class="contact_control" id="q<?php echo e($j); ?>ex<?php echo e($i); ?>-correct" name="q<?php echo e($j); ?>ex<?php echo e($i); ?>correct" value="<?php echo e($answer->text); ?>">
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <?php if($question->answers->where("is_correct", false)->count() > 1): ?>
                <?php $falseNum = 1; ?>

                <?php $__currentLoopData = $question->answers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $answer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(!$answer->is_correct): ?>
                        <div class="mb-3 col-4">
                            <label for="q<?php echo e($j); ?>ex<?php echo e($i); ?>-false<?php echo e($falseNum); ?>">False answer</label>
                            <input type="text" class="contact_control" id="q<?php echo e($j); ?>ex<?php echo e($i); ?>-false<?php echo e($falseNum); ?>" name="q<?php echo e($j); ?>ex<?php echo e($i); ?>false<?php echo e($falseNum++); ?>" value="<?php echo e($answer->text); ?>">
                        </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <?php for($m = 1; $m < 3; $m++): ?>
                    <div class="mb-3 col-4">
                        <label for="q<?php echo e($j); ?>ex<?php echo e($i); ?>-false<?php echo e($m); ?>">False answer</label>
                        <input type="text" class="contact_control" id="q<?php echo e($j); ?>ex<?php echo e($i); ?>-false<?php echo e($m); ?>" name="q<?php echo e($j); ?>ex<?php echo e($i); ?>false<?php echo e($m); ?>">
                    </div>
                <?php endfor; ?>
            <?php endif; ?>
        </div>
    </div>
    <?php endif; ?>
<?php /**PATH C:\Users\Jovana\OneDrive\Desktop\english-tests\resources\views/components/question.blade.php ENDPATH**/ ?>