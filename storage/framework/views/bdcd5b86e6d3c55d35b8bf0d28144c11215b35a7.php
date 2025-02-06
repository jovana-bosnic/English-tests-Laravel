<?php $__env->startSection('content'); ?>
    <div id="contact" class="contact">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <?php if(session('success')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('success')); ?>

                        </div>
                    <?php endif; ?>
                    <?php if(session('error')): ?>
                         <div class="alert alert-danger">
                            <?php echo e(session('error')); ?>

                         </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row mb-5 mt-5 border-tab">
                <div class="col-md-12">
                    <h2>Statistics</h2>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="titlepage pb-0">
                                <h3 class="text-left"><strong class="yellow">Most popular test</strong><br><?php echo e($statistics->mostPopular->name); ?></h3>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="titlepage pb-0">
                                <h3 class="text-left"><strong class="yellow">Best results</strong><br><?php echo e($statistics->bestResult->name); ?></h3>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="titlepage pb-0">
                                <h3 class="text-left"><strong class="yellow">The worst results</strong><br><?php echo e($statistics->worstResult->name); ?></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row border-tab">
                <div class="col-md-6 my-auto">
                    <div class="titlepage pb-0">
                        <h2 class="text-left"><strong class="yellow">Create new</strong><br>Category</h2>
                    </div>
                </div>
                <div class="col-md-6">
                    <form method="post" action="<?php echo e(route('categoryInsert')); ?>" class="contact_form">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-6 titlepage pb-0">
                                <label for="name">Category name</label>
                                <input type="text" class="contact_control" name="name">
                            </div>
                            <div class="col-md-6 titlepage pb-0 my-auto">
                                <button class="sign_btn" type="submit">Create category</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row mt-5 border-tab">
                <div class="col-md-6">
                    <div class="titlepage pb-0">
                        <h2 class="text-left"><strong class="yellow">Create new</strong><br>Test</h2>
                    </div>
                </div>
                <div class="col-md-6 my-auto">
                    <div class="titlepage pb-0">
                        <a class="sign_btn" href="<?php echo e(route("tests.create")); ?>">Create test</a>
                    </div>
                </div>
            </div>
            <div class="row mb-5 mt-5 border-tab">
                <div class="col-md-12">
                    <h2>Tests table</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Category</th>
                                <th>Test name</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $counter = 0;
                        ?>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($category->name); ?></td>
                            </tr>
                            <?php $__currentLoopData = $category->subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr <?php if($counter++ % 2 == 0): ?> class="zebra" <?php endif; ?>>
                                    <td></td>
                                    <td><?php echo e($subcategory->name); ?></td>
                                    <td> <a class="btn btn-dark btn-sm" href="<?php echo e(route('tests.edit', ['test' => $subcategory->id])); ?>">Edit</a></td>
                                    <td>
                                        <form method="POST" action="<?php echo e(route('tests.destroy', ['test' => $subcategory->id])); ?>">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-dark btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row border-tab">
                <div class="col-md-3 mt-5 my-auto">
                    <div class="titlepage pb-0">
                        <h2 class="text-left"><strong class="yellow">Create new</strong><br>Reminder</h2>
                    </div>
                </div>
                <div class="col-md-9 mt-5">
                    <form method="post" action="<?php echo e(route("reminderInsert")); ?>" class="contact_form" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-4 titlepage pb-0">
                                <label for="alt">Text</label>
                                <input type="text" class="contact_control" name="alt">
                            </div>
                            <div class="col-md-4 titlepage pb-0">
                                <label for="picture">Picture</label>
                                <input type="file" class="form-control" name="picture">
                            </div>
                            <div class="col-md-4 titlepage pb-0">
                                <button class="sign_btn" type="submit">Create reminder</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row border-tab">
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Reminder</th>
                            <th>Text</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $reminders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reminder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td> <img src="<?php echo e(asset('assets/img/'.$reminder->path)); ?>" alt="<?php echo e($reminder->alt); ?>" width="150px"></td>
                                <td><?php echo e($reminder->alt); ?></td>
                                <td>
                                    <form method="POST" action="<?php echo e(route('deleteReminder', ['reminder' => $reminder->id])); ?>">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-dark btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <div div="row">
                        <ul class="pagination pagination-sm justify-content-end">
                            <?php echo e($reminders->links("pagination::bootstrap-4")); ?>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="row mb-5 mt-5 border-tab">
                <div class="col-md-12">
                    <h2>Users messages</h2>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Email</th>
                            <th>Message</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $counter = 0;
                        ?>
                        <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <tr <?php if($counter++ % 2 == 0): ?> class="zebra" <?php endif; ?>>
                                    <?php if($message->userEmail != null): ?>
                                        <td><?php echo e($message->userEmail); ?></td>
                                    <?php else: ?>
                                        <td><?php echo e($message->messageEmail); ?></td>
                                    <?php endif; ?>
                                    <td><?php echo e($message->message); ?></td>
                                </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Jovana\OneDrive\Desktop\english-tests\resources\views/pages/main/admin.blade.php ENDPATH**/ ?>