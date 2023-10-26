
<!DOCTYPE html>
<?php
    $setting = \App\Models\Utility::colorset();
    $SITE_RTL= isset($setting['SITE_RTL'])?$setting['SITE_RTL']:'off';
?>

<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" dir="<?php echo e($SITE_RTL == 'on' ? 'rtl' : ''); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Lato&amp;display=swap" rel="stylesheet">    
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>" id="main-style-link">  

    <?php if($SITE_RTL == 'on'): ?>
        <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap-rtl.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/style-rtl.css')); ?>">
    <?php endif; ?>

    <style>
        [dir="rtl"] .dash-sidebar {
            left: auto !important;
        }

        [dir="rtl"] .dash-header {
            left: 0;
            right: 280px;
        }

        [dir="rtl"] .dash-header:not(.transprent-bg) .header-wrapper {
            padding: 0 0 0 30px;
        }

        [dir="rtl"] .dash-header:not(.transprent-bg):not(.dash-mob-header) ~ .dash-container {
            margin-left: 0px; 
        }
        
        [dir="rtl"] .me-auto.dash-mob-drp {
            margin-right: 10px !important;
        }

        [dir="rtl"] .me-auto {
            margin-left: 10px !important;
        }
    </style>


    <style type="text/css">
        .text-white { color: #fff; }
        table { width: 97%; }
        table,
        th,
        td {
            border: 1px solid rgba(0, 0, 0, 0);
            border-collapse: collapse;
        }
        th,
        td {
            padding: 15px;
            text-align: left;
        }
        /* #t01 tr:nth-child(even) { background-color: #eee; }
        #t01 tr:nth-child(odd) { background-color: #fff; } */
        #t01 th {
            background-color: #051C4B;
            color: white;
            font-size: 13px;
        }
        .m0 { margin: 0px; }
        .mb5 { margin-bottom: 5px; }
        .mb10 { margin-bottom: 10px; }
        tr.dsads td{
            background-color: #000;            
            padding: 0px 0;
            border-top: 1px solid #000;
            border-bottom: 1px solid #000;
        }

    </style>
</head>

<body class="overflow-x-hidden">
    <div class="container" id="boxes">
        <div id="app" class="content">
            <div style="width:1000px;margin-left: auto;margin-right: auto; background-color: #dddddd26; height: 98vh;">
                <div class="bg-primary" style="padding: 20px 25px;">
                    <div class="bg-primary" style="padding: 20px 25px;display: inline-block;">
                        <img src="<?php echo e(asset('storage/uploads/logo/logo.png')); ?>" style="width: 100%; display: inline-block; float: left; max-width: 150px;">
                    </div>
                    <div style="display: inline-block; float: right; color: white; width: 250px; text-align: center;">
                        <h2 class="m0 mb5"><?php echo e((!empty($location_data)) ? $location_data->name : ''); ?></h2>
                        <div class="mb10"> <?php echo e((!empty($location_data)) ? $location_data->address : ''); ?> </div>
                        <div> <?php echo e(__('week').' '.date("W Y", strtotime($week_date[0]))); ?> </div>
                    </div>
                    <span style="clear: both; display: block;"></span>
                </div>
                <table id="t01" style="margin: 20px 15px;">
                    <thead>
                        <tr>
                            <th class="bg-primar"><?php echo e(__('Date')); ?></th>
                            <th class="bg-primar"><?php echo e(__('Employee')); ?></th>
                            <th class="bg-primar"><?php echo e(__('Time In')); ?></th>
                            <th class="bg-primar"><?php echo e(__('Time Out')); ?></th>
                        </tr>
                    </thead>
                    <tbody>                        
                        

                        <?php if(!empty($users_name)): ?>
                            <?php $__currentLoopData = $week_date; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $date): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $__currentLoopData = $users_name; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo \App\Models\Rotas::getdaterotasreport($date, $item['id'], $location_data->id, $role_id); ?>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4">
                                    <h2>
                                        <center> <?php echo e(__('No Data Found')); ?> </center>
                                    </h2>
                                </td>
                            </tr>
                        <?php endif; ?>
                        
                    </tbody>                                    
                </table>
            </div>                        
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    
    <script src="<?php echo e(asset('custom/libs/moment/min/moment.min.js')); ?>"></script>
    <script src="<?php echo e(asset('custom/libs/ultimate-export/libs/pdfmake/pdfmake.min.js')); ?>"></script>
    <script src="<?php echo e(asset('custom/libs/ultimate-export/libs/pdfmake/vfs_fonts.js')); ?>"></script>
    <script src="<?php echo e(asset('custom/libs/ultimate-export/tableExport.js')); ?>"></script>
    <script>
        // function closeScript() {
        //     setTimeout(function() {
        //         window.history.back();
        //         window.open(window.location, '_self').close();
        //     }, 1000);
        // }
        // var element = document.getElementById('boxes');
        // var opt = {
        //     filename: '#Rotas00010',
        //     image: {type: 'jpeg', quality: 1},
        //     html2canvas: {scale: 4, dpi: 72, letterRendering: true},
        //     jsPDF: {unit: 'in', format: 'A'}
        // };
        // html2pdf().set(opt).from(element).save().then(closeScript);
        $(document).ready(function() {
            var name = 'Rotas-' + moment().format("YYYYMMDDhhmmssA");
            $('#t01').tableExport({
                type: 'pdf',
                fileName: name,
                pdfmake: {
                    enabled: true,
                    docDefinition: {
                        pageOrientation: 'landscape'
                    }
                },
                onAfterSaveToFile: function(data, fileName) {
                    if (fileName != '') {
                        setTimeout(() => {
                            window.history.back();
                        }, 1000);
                    }
                }
            });
        });
    </script>
</body>
</html><?php /**PATH /home/sites/1a/7/74fc9abc3b/public_html/resources/views/rotas/rotastable.blade.php ENDPATH**/ ?>