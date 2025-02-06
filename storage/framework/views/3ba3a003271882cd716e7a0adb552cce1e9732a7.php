<?php if($exercise == null): ?>
<div class="col-md-12">
    <h2 class="yellow mt-5">Exercise <?php echo e($i); ?>.</h2>
</div>
<div class="col-md-6">
    <div class="mb-3">
        <label for="exerciseText<?php echo e($i); ?>">Exercise name</label>
        <input type="text" class="contact_control" id="exerciseText<?php echo e($i); ?>" name="exerciseText<?php echo e($i); ?>">
    </div>
    <div class="mb-3">
        <label for="assignment<?php echo e($i); ?>">Assignment</label>
        <input type="text" class="contact_control" id="assignment<?php echo e($i); ?>" name="assignment<?php echo e($i); ?>">
    </div>
</div>
<div class="col-md-6">
        <div class="row pl-5">
            <div class="col-12">
                <h3>Exercise type:</h3>
            </div>
            <div class="col-12">
                <div class="row mt-5">
                    <div class="col-6 pl-5">
                        <label for="exType<?php echo e($i); ?>">Text</label>
                    </div>
                    <div class="col-6">
                        <input type="checkbox" value="1" name="exType<?php echo e($i); ?>">
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="row mt-5">
                    <div class="col-6 pl-5">
                        <label for="exType<?php echo e($i); ?>">Radio</label>
                    </div>
                    <div class="col-6">
                        <input type="checkbox" value="2" name="exType<?php echo e($i); ?>">
                    </div>
                </div>
            </div>
        </div>
</div>

<?php else: ?>
    <div class="col-md-12">
        <h2 class="yellow mt-5">Exercise id: <?php echo e($i); ?></h2>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label for="exerciseText<?php echo e($i); ?>">Exercise name</label>
            <input type="text" class="contact_control" id="exerciseText<?php echo e($i); ?>" name="exerciseText<?php echo e($i); ?>" value="<?php echo e($exercise->text); ?>">
        </div>
        <div class="mb-3">
            <label for="assignment<?php echo e($i); ?>">Assignment</label>
            <input type="text" class="contact_control" id="assignment<?php echo e($i); ?>" name="assignment<?php echo e($i); ?>" value="<?php echo e($exercise->assignment); ?>">
        </div>
    </div>
    <div class="col-md-6">
        <div class="row pl-5">
            <div class="col-12">
                <h3>Exercise type:</h3>
            </div>
            <div class="col-12">
                <div class="row mt-5">
                    <div class="col-6 pl-5">
                        <label for="exType<?php echo e($i); ?>">Text</label>
                    </div>
                    <div class="col-6">
                        <input type="radio" value="1" name="exType<?php echo e($i); ?>" <?php if($exercise->type == "text"): ?> checked <?php endif; ?>>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="row mt-5">
                    <div class="col-6 pl-5">
                        <label for="exType<?php echo e($i); ?>">Radio</label>
                    </div>
                    <div class="col-6">
                        <input type="radio" value="2" name="exType<?php echo e($i); ?>" <?php if($exercise->type == "radio"): ?> checked <?php endif; ?>>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH C:\Users\Jovana\OneDrive\Desktop\english-tests\resources\views/components/exercise.blade.php ENDPATH**/ ?>