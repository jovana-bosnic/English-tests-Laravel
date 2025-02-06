<?php $__env->startSection('title'); ?> English tests - Home <?php $__env->stopSection(); ?>
<?php $__env->startSection('description'); ?> Discover your level of English with our quick, free online test.<?php $__env->stopSection(); ?>
<?php $__env->startSection('keywords'); ?> English test, Test, Home, Business <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<section class="banner_main">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-7">
                <div class="text-bg">
                    <h1>Discover your <br>level of English</h1>
                    <span>with our quick, free online test</span>
                    <p>Learn English online and improve your skills through our high-quality courses and resources.</p>
                    <a href="#about">About us</a>
                </div>
            </div>

        </div>
    </div>
</section>

<div id="about" class="about">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-7">
                <div class="about_box">
                    <div class="titlepage">
                        <h2><strong class="yellow">About US</strong><br> WE CAN HELP YOUR business GROW</h2>
                    </div>
                    <h3>EVERYTHING YOU NEED IN ONE SOLUTION</h3>
                    <span>HELP YOUR NEXT CAREER MOVE MORE SMOOTHER AND <br> MORE EFFICIENT</span>
                    <p>Learn how to communicate professionally with business partners around the world. Check out our tests of the most important branches in business.</p>
                    <span class="try">CHECK YOUR KNOWLEDGE FOR FREE</span>
                    <a class="read_morea" href="<?php echo e(route('tests.index')); ?>">Get Started <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                </div>
            </div>
            <div class="col-md-12 col-lg-5">
                <div class="about_img">
                    <figure><img src="<?php echo e(asset('assets/img/books.jpg')); ?>" alt="Books" /></figure>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="service" class="service">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="titlepage">
                    <h2><strong class="yellow">service</strong><br> WE CAN HELP YOUR business GROW</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <?php $__currentLoopData = $business; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $biz): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-3 col-sm-6">
                    <div id="ho_color" class="service_box">
                        <img src="<?php echo e(asset('assets/img/business'. $biz->id .'.png')); ?>" alt="<?php echo e($biz->name); ?>" />
                        <h3> <a class="text-dark" href="<?php echo e(route('tests.show', ['test' => $biz->id])); ?>"><?php echo e($biz->name); ?></a></h3>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="col-md-12">
             <a class="read_more" href="<?php echo e(route('tests.index')); ?>">Read More</a>
        </div>
    </div>
</div>

<div class="portfolio">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
                <div class="titlepage">
                    <h2><strong class="yellow">REMINDERS</strong><br> Choose faster and easier way</h2>
                    <span>Learning</span>
                    <p>With our shortened versions of the lessons, remind yourself of the most important points on your journey to improve your English.</p>
                </div>
            </div>
        </div>
    </div>
    <div id="myCarousel" class="carousel slide portfolio_Carousel " data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container">
                    <div class="carousel-caption ">
                        <div class="row">
                            <?php $__currentLoopData = $reminders->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reminder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-4 col-sm-6">
                                    <div class="portfolio_img">
                                        <img src="<?php echo e(asset('assets/img/'.$reminder->path)); ?>" alt="<?php echo e($reminder->alt); ?>" />
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-12 mb-2">
                                <a class="read_more" href="<?php echo e(route('reminders')); ?>">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="carousel-caption">
                        <div class="row">
                            <?php $__currentLoopData = $reminders->skip(3)->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reminder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-4 col-sm-6">
                                    <div class="portfolio_img">
                                        <img src="<?php echo e(asset('assets/img/'.$reminder->path)); ?>" alt="<?php echo e($reminder->alt); ?>" />
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-12 mb-2">
                                    <a class="read_more" href="<?php echo e(route('reminders')); ?>">Read More</a>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <i class="fa fa-chevron-left" aria-hidden="true"></i>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <i class="fa fa-chevron-right" aria-hidden="true"></i>
        </a>
    </div>
</div>

<div class="business">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="titlepage">
                    <h2><strong class="yellow">INFO</strong><br>About our success</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div id="ho_color" class="business_box">
                    <i><img src="<?php echo e(asset('assets/img/business_icon1.png')); ?>" alt="Nominations" /></i>
                    <h3>23</h3>
                    <p>NOMINATIONS </p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div id="ho_color" class="business_box">
                    <i><img src="<?php echo e(asset('assets/img/business_icon2.png')); ?>" alt="Agencies" /></i>
                    <h3>31</h3>
                    <p>AGENCIES</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div id="ho_color" class="business_box">
                    <i><img src="<?php echo e(asset('assets/img/business_icon3.png')); ?>" alt="Awards" /></i>
                    <h3>7</h3>
                    <p>AWARDS</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div id="ho_color" class="business_box">
                    <i><img src="<?php echo e(asset('assets/img/business_icon4.png')); ?>" alt="Supported" /></i>
                    <h3>8</h3>
                    <p>Supported </p>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="client" class="testimonial">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="titlepage">
                    <h2><strong class="yellow">Opportunities</strong><br>What you can practice and learn</h2>
                </div>
            </div>
        </div>
    </div>
    <div id="testimo" class="carousel slide testimonial_Carousel " data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#testimo" data-slide-to="0" class="active"></li>
            <li data-target="#testimo" data-slide-to="1"></li>
            <li data-target="#testimo" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container">
                    <div class="carousel-caption ">
                        <div class="row">
                            <div class="col-md-6 offset-md-3 mb-4">
                                <div class="test_box">
                                    <p>Learn new words and improve your language level to be able to communicate in English effectively.</p>
                                <span>Vocabulary</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="carousel-caption">
                        <div class="row">
                            <div class="col-md-6 offset-md-3 mb-4">
                                <div class="test_box">
                                    <p>Revise and practise your grammar to improve your language level and increase your confidence.</p>
                                    <span>Grammar</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="carousel-caption">
                        <div class="row">
                            <div class="col-md-6 offset-md-3 mb-4">
                                <div class="test_box">
                                    <p>Practise your reading, writing and speaking and learn useful language to use at work or to communicate effectively with friends.</p>
                                    <span>Skills</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#testimo" role="button" data-slide="prev">
            <i class="fa fa-chevron-left" aria-hidden="true"></i>
        </a>
        <a class="carousel-control-next" href="#testimo" role="button" data-slide="next">
            <i class="fa fa-chevron-right" aria-hidden="true"></i>
        </a>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Jovana\OneDrive\Desktop\english-tests\resources\views/pages/main/home.blade.php ENDPATH**/ ?>