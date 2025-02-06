<?php $__env->startSection('title'); ?> English tests - Registration <?php $__env->stopSection(); ?>
<?php $__env->startSection('description'); ?> If you are unregistered user, create account and solve our tests. <?php $__env->stopSection(); ?>
<?php $__env->startSection('keywords'); ?> English test, Test, Exercises, Register, User <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="contact">
        <div class="row">
            <div class="col-md-12">
                <div class="titlepage">
                    <h2>
                        <strong class="yellow">User registration</strong>
                    </h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 offset-md-2">
                <form action="<?php echo e(route("doRegister")); ?>" class="contact_form" method="post" role="form">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="form-group col-md-6 mb-3">
                            <label for="firstname">First name</label>
                            <input type="text" class="contact_control" id="firstname" name="firstname">
                        </div>
                        <div class="form-group col-md-6 mb-3">
                            <label for="lastname">Last name</label>
                            <input type="text" class="contact_control" id="lastname" name="lastname">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="contact_control" id="email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="password">Password</label>
                        <input type="password" class="contact_control" id="password" name="password">
                    </div>
                    <div class="mb-3">
                        <label for="confirm">Confirm password</label>
                        <input type="password" class="contact_control" id="confirm" name="confirm">
                    </div>
                    <div class="row">
                        <div class="col-3 text-end mt-2">
                            <button type="submit" class="send_btn">Register</button>
                        </div>
                    </div>
                </form>
                <div class="row py-5">
                    <div class="mb-3 col-md-12">
                        <?php if(session('errors')): ?>
                            <div class="alert alert-danger">
                                <ul>
                                    <?php $__currentLoopData = session('errors')->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($error); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Jovana\OneDrive\Desktop\english-tests\resources\views/pages/users/register.blade.php ENDPATH**/ ?>