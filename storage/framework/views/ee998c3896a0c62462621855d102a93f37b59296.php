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
                    width: 90px;
                    border: 3px solid black;
                    padding: 1px;
                }
                </style>
    </head>
<body>
             <div class="right">
              <p> PED-003-0 </p>
             </div>
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
            <b>LIST OF <?php if($stype==1): ?> SIRIB ACADEMIC SCHOLARS <?php else: ?> SENIOR HIGH SCHOOL SCHOLARS <?php endif; ?><br>
            <?php echo e($semester); ?> SEMESTER S.Y. 
            <?php $__currentLoopData = $syear; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ys): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo e($ys->from); ?>-<?php echo e($ys->to); ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </b>
            </h5>
        </div>
    <br><br>
    <div class="container">
    <table class="table table-bordered">
            <thead>
              <tr>
                <th>No.</th>
                <th>LAST NAME</th>
                <th>FIRST NAME</th>
                <th>MUN</th>
                <th>SCHOOL</th>
                <?php if($stype==1): ?>                        
                        <th>COLLEGE</th>
                        <th>COURSE</th>
                        <th>YEAR LEVEL</th>
                        <th>GWA</th>
                <?php else: ?>
                        <th class="text-center align-middle">STRAND</th>
                        <th class="text-center align-middle">GRADE LEVEL</th>
                        <th class="text-center align-middle">Overall Rating(%)<br>(GWA,Exam,Interviews)</th>
                <?php endif; ?>
                
                
              </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $users): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td><font face="calibri" size="2pt"><?php echo e(++$i); ?></font></td>
                <td><font face="calibri"  size="2pt"><?php echo e($users['lname']); ?></font></td>
                <td><font face="calibri"  size="2pt"><p><?php echo e($users['fname']); ?></p></font></td>
                <td><font face="calibri"  size="2pt"><?php echo e($users['mun']); ?></font></td>
                <td><font face="calibri"  size="2pt"><?php echo e(ucwords($users['school'])); ?></font></td>
                <?php if($stype==1): ?>                        
                        <td><font face="calibri" size="2pt"><?php echo e($users['coll']); ?></font></td>
                        <td class="text-center align-middle"><font face="calibri" size="2pt"><?php echo e($users['course']); ?></font></td>
                        <td class="text-center align-middle"><font  face="calibri"  size="2pt"><?php echo e($users['yl']); ?></font></td>
                        <td class="text-center align-middle"><?php $__currentLoopData = $users['gwa']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gwa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <font  face="calibri" size="2pt"><?php echo e($gwa); ?></font>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </td>
                <?php elseif($stype==4): ?>
                        
                        <td class="text-center align-middle"><font face="calibri" size="2pt"><?php echo e($users['course']); ?></font></td>
                        <td class="text-center align-middle"><font  face="calibri"  size="2pt"><?php echo e($users['yl']); ?></font></td>
                        <td class="text-center align-middle">
                                <font  face="calibri" size="2pt"><?php echo e($users['total']); ?></font>
                               
                        </td>
                <?php endif; ?>
                
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
          
</body>                      
</html>