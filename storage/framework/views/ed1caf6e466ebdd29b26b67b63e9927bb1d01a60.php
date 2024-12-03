<!doctype html>
<html lang="<?php echo e(app()->getLocale()); ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Schoolar Form</title>
        <!-- Fonts -->
        
        <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('js\bootstrap-3.3.0\dist\css\bootstrap.min.cc')); ?>" rel="stylesheet">
        

        <script src="<?php echo e(asset('js\jquery-3.3.1.js')); ?>"></script> 
        <script src="<?php echo e(asset('js\bootstrap-3.3.0\dist\js\bootstrap.min.js')); ?>"></script> 
        <script src="<?php echo e(asset('js\bootstrap-3.3.0\dist\js\bootstrap.js')); ?>"></script> 

        <!--Navbar-->
        
        <style>
                .right {
                    position: absolute;
                    right: 0px;
                    width: 80px;
                    border: 3px solid black;
                    padding: 1px;
                }
                </style>
    </head>
<body>
    <div class="row" align="center">
            <img src="<?php echo asset("ilocosnortelogo.png")?>" class="rounded mx-auto d-block" alt="..." width="70px" length="70px" >	
            <font face="Arial" size="2">
                    <br>Republic of the Phillipines<br>
                    <b>PROVINCE OF ILOCOS NORTE</b><br>
                    Laoag City 2900
            </font>
            <br>
            <h5><b>PROVINCIAL EDUCATION OFFICE</b>
            <br>
            <br>
            <b>PRESPECTIVE LIST OF 
                <?php if($stype==1): ?>
                    ACADEMIC
                <?php elseif($stype==3): ?>
                    TECHVOC
                <?php else: ?>
                    SENIOR HIGH SCHOOL
                <?php endif; ?>

                SCHOLARS<br>
            <?php echo e($sem); ?> SEMESTER S.Y. 
            <?php $__currentLoopData = $sy; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ys): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo e($ys->from); ?>-<?php echo e($ys->to); ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </b>
            </h5>
        </div>
        <br>
        <div class="container">
                <table class="table table-bordered">
                        <thead>
                                <tr>
                                  <th>No.</th>
                                  <th width="50%">NAME</th>                                  
                                  <th>Barangay</th>
                                  <th>Municipality</th>
                                  <th>Contact</th>
                                </tr>
                              </thead>
                              <tbody>
                            <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e(++$i); ?></td>
                                <td><?php echo e($s['lname']); ?>, <?php echo e($s['fname']); ?></td>                                
                                <td><?php echo e($s['brgy']); ?></td>
                                <td><?php echo e($s['mun']); ?></td>
                                <td><?php echo e($s['contact']); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
        
</body>                      
</html>