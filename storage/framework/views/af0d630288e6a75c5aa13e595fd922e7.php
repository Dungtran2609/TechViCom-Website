<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $__env->yieldContent('title', 'Admin Dashboard'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('admin/css/vendor.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('admin/css/icons.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('admin/css/app.min.css')); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-PvNcazjx3bDAzjlfKEXAMPLEKEY..." crossorigin="anonymous" referrerpolicy="no-referrer" />
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body>
    <div class="wrapper">
        <?php echo $__env->make('admin.layouts.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <?php echo $__env->make('admin.layouts.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <?php echo $__env->yieldContent('content'); ?>
                </div>
            </div>

            <?php echo $__env->make('admin.layouts.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </div>
    </div>

    <!-- JS -->
    <script src="<?php echo e(asset('admin/js/config.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/vendor.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/app.min.js')); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- Vendor Javascript (Require in all Page) -->
<script src="<?php echo e(asset('admin/js/vendor.js')); ?>"></script>

<!-- App Javascript (Require in all Page) -->
<script src="<?php echo e(asset('admin/js/app.js')); ?>"></script>

<!-- Vector Map Js -->
<script src="<?php echo e(asset('admin/vendor/jsvectormap/js/jsvectormap.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin/vendor/jsvectormap/maps/world-merc.js')); ?>"></script>
<script src="<?php echo e(asset('admin/vendor/jsvectormap/maps/world.js')); ?>"></script>

<!-- Dashboard Js -->
<script src="<?php echo e(asset('admin/js/pages/dashboard.js')); ?>"></script>
 <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\laragon\www\TechViCom_Website_BE\resources\views/admin/layouts/app.blade.php ENDPATH**/ ?>