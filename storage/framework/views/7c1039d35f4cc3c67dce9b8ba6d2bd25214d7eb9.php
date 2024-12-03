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
        <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-9">
               <h2><b>SCHOLARS PER MUNICIPALITY</b></h2></div>
            </div>
            <div class="container">
                    <table class="table table-bordered">
                        <thead align="center">
                            <th width="150px" align="center">MUNICIPALITY</th>
                            <th width="50px">No. of Scholars</th>
                        </thead>
            <?php for($i=1;$i<=23;$i++): ?>
            <tr>
                <td align="center"><?php echo e($townname[$i]); ?></td>
                <td align="center"> <?php echo e($towncount[$i]); ?></td>
            </tr>
            
            <?php endfor; ?>
            <tr>
                    <td align="center">TOTAL</td>
                    <td align="center"><?php echo e($total); ?></td>
                </tr>
                </table>
        </div>
          
        <br><br><br>
        <?php if($stype==4): ?>
        <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-9">
               <h3><b>SCHOLARS PER SCHOOLS</b></h3></div>
            </div>
            <div class="container">
            <table class="table table-bordered">
                <thead>
                    <th>SCHOOLS NAME</th>
                    <th>No. of Scholars</th>
                </thead>
            <?php for($i=1;$i<=$counter;$i++): ?>
                <?php if($schoolsname[$i]!=""): ?>
                <tr>
                <td><?php echo e($schoolsname[$i]); ?></td>
                <td><?php echo e($schoolcount[$i]); ?></td>
                </tr>
                <?php endif; ?>
            <?php endfor; ?>
            <tr>
                <td align="center">TOTAL</td>
                <td><?php echo e($total); ?></td>
            </tr>
            </table>
        </div>
        <?php endif; ?>
</body>                      
</html>