<?php $__env->startSection('content'); ?>
    <div id="contact" class="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2><strong class="yellow">Create new</strong><br>Test</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <?php if(Session::get('error')): ?>
                        <div class="alert alert-danger mt-5" role="alert">
                            <?php echo e(Session::get('error')); ?>

                        </div>
                    <?php endif; ?>
                        <?php if(Session::get('success')): ?>
                            <div class="alert alert-success mt-5" role="alert">
                                <?php echo e(Session::get('success')); ?>

                            </div>
                        <?php endif; ?>
                    <form id="post_form" class="contact_form" method="post" action="<?php echo e(route("tests.store")); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="testCategory">Test Category</label>
                                <select class="contact_control" id="testCategory" name="testCategory">
                                    <option value="0">Choose...</option>
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label for="testName">Test Name</label>
                                <input type="text" class="contact_control" id="testName" name="testName">
                            </div>
                            <?php for($i = 1; $i <= 5; $i++): ?>
                                <div class="row border-tab">
                                    <?php echo $__env->make('components.exercise', ['exercise' => null, 'i' => $i] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php for($j = 1; $j <= 3; $j++): ?>
                                        <div class="row border-tab mx-3">
                                            <?php echo $__env->make('components.question', ['question' => null, 'i' => $i, 'j' => $j] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        </div>
                                    <?php endfor; ?>
                                </div>
                            <?php endfor; ?>
                        </div>
                        <div class="col-md-12">
                            <button id="createTest" class="send_btn">Create test</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Jovana\OneDrive\Desktop\english-tests\resources\views/pages/tests/create.blade.php ENDPATH**/ ?>