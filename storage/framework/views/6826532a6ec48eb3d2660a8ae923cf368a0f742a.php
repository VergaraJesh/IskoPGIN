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
                <th>ID</th>       
                <th>FIRST NAME</th>
                <th>LAST NAME</th>
                
              </tr>
            </thead>
            <tbody>
                
                <?php for($j=0;$j<$i;$j++): ?>
                <tr>         
                    <td><?php echo e($j+1); ?></td>                        
                    <td><?php echo e($lname[$j]); ?></td>
                    <td> <?php echo e($fname[$j]); ?></td>
                </tr>
                        <?php endfor; ?>                        
            </tbody>
          </table>
          
</body>                      
</html>