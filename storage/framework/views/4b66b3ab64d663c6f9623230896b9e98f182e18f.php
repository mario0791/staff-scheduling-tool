    <!-- Required Js -->
    <script src="<?php echo e(asset('custom/libs/jquery/dist/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/perfect-scrollbar.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/feather.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/dash.js')); ?>"></script>
    <script src="<?php echo e(asset('custom/libs/moment/min/moment.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/simple-datatables.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/sweetalert2.all.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/bootstrap-switch-button.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/apexcharts.min.js')); ?>"></script>
    <script src="<?php echo e(asset('custom/libs/range-date-picker/daterangepicker.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/choices.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/datepicker-full.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/flatpickr.min.js')); ?>"></script>

    <script src="<?php echo e(asset('custom/libs/bootstrap-notify/bootstrap-notify.min.js')); ?>"></script>
    <script src="<?php echo e(asset('custom/libs/jqueryui/jquery-ui.min.js')); ?>"></script>
    <script src="<?php echo e(asset('custom/libs/select2/dist/js/select2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('custom/libs/moment/min/moment.min.js')); ?>"></script>

    
     
    
    <script src="<?php echo e(asset('custom/js/custom.js')); ?>"></script>

  

    <?php echo $__env->yieldContent('availabilityscriptlink'); ?>
    
    <?php echo $__env->yieldPushContent('pagescript'); ?>


    

    <script>
        if ($('.pc-dt-simple').length > 0) {
            const dataTable = new simpleDatatables.DataTable(".pc-dt-simple");
        }
    </script>
    <?php if(Utility::getValByName('gdpr_cookie') == 'on'): ?>
        <script type="text/javascript">
            var defaults = {
                'messageLocales': {
                    /*'en': 'We use cookies to make sure you can have the best experience on our website. If you continue to use this site we assume that you will be happy with it.'*/
                    'en': "<?php echo e(Utility::getValByName('cookie_text')); ?>"
                },
                'buttonLocales': {
                    'en': 'Ok'
                },
                'cookieNoticePosition': 'bottom',
                'learnMoreLinkEnabled': false,
                'learnMoreLinkHref': '/cookie-banner-information.html',
                'learnMoreLinkText': {
                    'it': 'Saperne di più',
                    'en': 'Learn more',
                    'de': 'Mehr erfahren',
                    'fr': 'En savoir plus'
                },
                'buttonLocales': {
                    'en': 'Ok'
                },
                'expiresIn': 30,
                'buttonBgColor': '#d35400',
                'buttonTextColor': '#fff',
                'noticeBgColor': '#000000',
                'noticeTextColor': '#fff',
                'linkColor': '#009fdd'
            };
        </script>
        <script src="<?php echo e(asset('js/cookie.notice.js')); ?>"></script>
    <?php endif; ?>

    <?php if(\Session::has('success')): ?>
        <script>
            show_toastr('<?php echo e(__('success')); ?>', '<?php echo session('success'); ?>', 'success');
        </script>
        <?php echo e(Session::forget('success')); ?>

    <?php endif; ?>
    
    <?php if(\Session::has('error')): ?>
        <script>
            show_toastr('<?php echo e(__('Error')); ?>', '<?php echo session('error'); ?>', 'error');
        </script>
        <?php echo e(Session::forget('error')); ?>

    <?php endif; ?>
<?php /**PATH /home/sites/1a/7/74fc9abc3b/public_html/resources/views/partision/footerlink.blade.php ENDPATH**/ ?>