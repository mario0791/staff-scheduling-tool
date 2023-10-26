<html>
   <head>
      <style>
         table {
           font-family: arial, sans-serif;
           border-collapse: collapse;
           width: 100%;
         }
         
         td, th {           
           text-align: left;
           padding: 8px;
         }
         
         tr:nth-child(even) {
           background-color: #dddddd;
         }
         </style>
   </head>
   <body>
      <div style="background-color:#f8f8f8">
         <h4> <?php echo e(__('Details of your rotas for this week.')); ?> </h4>
            <table>
               <thead>
                  <tr>
                     <td ></td>
                     <td ><?php echo e(__('Date')); ?></td>
                     <td ><?php echo e(__('Role')); ?></td>
                     <td ><?php echo e(__('Time')); ?></td>
                     <td ><?php echo e(__('Location')); ?></td>
                     <td ><?php echo e(__('Note')); ?></td>
                  </tr>
               </thead>
               <tbody>
                  <?php $__currentLoopData = $rotas_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                     <td> <?php echo e(++$key); ?></td>
                     <td> <?php echo e($data['rotas_date']); ?> </td>
                     <td> <?php echo e((!empty($role_datas[$data['role_id']])) ? $role_datas[$data['role_id']] : ''); ?> </td>
                     <td> <?php echo e($data['start_time'].' - '.$data['end_time']); ?> </td>
                     <td> <?php echo e((!empty($location_datas[$data['location_id']])) ? $location_datas[$data['location_id']] : ''); ?></td>
                     <td><?php echo e($data['note']); ?></td>
                  </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               </tbody>
            </table>         
      </div>
   </body>
</html><?php /**PATH /home/sites/1a/7/74fc9abc3b/public_html/resources/views/email/sendrotas.blade.php ENDPATH**/ ?>