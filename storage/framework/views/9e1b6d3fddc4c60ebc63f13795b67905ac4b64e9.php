<title><?php echo e(config('chatify.name')); ?></title>


<meta name="route" content="<?php echo e($route); ?>">
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

 <link href="<?php echo e(asset('css/chatify/'.$dark_mode.'.mode.css')); ?>" rel="stylesheet" />

  <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet" /> 
 

<script src='https://unpkg.com/nprogress@0.2.0/nprogress.js'></script>


<?php echo $__env->make('Chatify::layouts.messengerColor', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /home/sites/1a/7/74fc9abc3b/public_html/resources/views/vendor/Chatify/layouts/headLinks.blade.php ENDPATH**/ ?>