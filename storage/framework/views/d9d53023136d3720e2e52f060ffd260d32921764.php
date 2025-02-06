<?php $__env->startSection('title'); ?> English tests - Tests <?php $__env->stopSection(); ?>
<?php $__env->startSection('description'); ?> English language tests by category and results for each user. <?php $__env->stopSection(); ?>
<?php $__env->startSection('keywords'); ?> English test, Test, Exercises, Business, Results <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div id="service" class="service">
        <div class="container">
            <div class="row mb-3">
                <div class="col-md-12">
                    <form class="contact_form row" action="<?php echo e(route('tests.index')); ?>" method="get">
                        <div class="col-md-4">
                            <select name="categoryFilter" class="contact_control mt-4">
                                <option value="0">All categories</option>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($category->id); ?>" <?php if(request()->categoryFilter && request()->categoryFilter == $category->id): ?> selected <?php endif; ?>>
                                        <?php echo e($category->name); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <input class="contact_control mt-4" type="text" name="testName" value="<?php echo e(request()->testName ?? ''); ?>" placeholder="Test name">
                        </div>
                        <div class="col-md-4">
                            <button class="send_btn btn-sm float-left mb-2 p-2" style="width: 18%"><i class="fa fa-search fa-md" aria-hidden="true"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($category->subcategories != null): ?>
                    <div class="row">
                        <div class="col-md-7">
                            <div class="titlepage">
                                <h2><strong class="yellow">category</strong><br><?php echo e($category->name); ?></h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php $__currentLoopData = $category->subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-4 col-sm-6">
                                <div id="ho_color" class="service_box">
                                    <img src="<?php echo e(asset('assets/img/service_icon1.png')); ?>" alt="Test icon" />
                                    <h3 class="mb-3"> <a class="yellow" href="<?php echo e(route('tests.show', ['test' => $subcategory->id])); ?>"><?php echo e($subcategory->name); ?></a></h3>
                                    <?php if(count($subcategory->tests) > 0): ?>
                                        <table class="table result-table">
                                            <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Result</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $__currentLoopData = $subcategory->tests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tests): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e(date('d-m-Y', strtotime($tests->date))); ?></td>
                                                    <td class="badge p-2 m-3 <?php if($tests->result < 50): ?> badge-danger <?php elseif($tests->result < 70): ?> badge-warning <?php else: ?> badge-success <?php endif; ?>">
                                                        <?php echo e(round($tests->result, 2)); ?>%
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>

                                    <?php else: ?>
                                        <table class="table result-table">
                                            <thead>
                                            <tr>
                                                <th class="text-center">No results</th>
                                            </tr>
                                            </thead>
                                        </table>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Jovana\OneDrive\Desktop\english-tests\resources\views/pages/tests/index.blade.php ENDPATH**/ ?>