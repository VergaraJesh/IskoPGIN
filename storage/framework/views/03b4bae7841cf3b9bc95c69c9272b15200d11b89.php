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
            <b>LIST OF SCHOOLS CONTACT FOR <?php if($dis!=""): ?> <?php echo e(strtoupper($dis)); ?> <?php endif; ?> ILOCOS NORTE<br>
            </b>
            </h5>
        </div>
    <br><br>
    <div class="container-fluid">
    <table class="table table-bordered">
            <thead>
              <tr>
                <th>ID</th>       
                <th>NAME</th>
                <th>DISTRICT</th>
                <th>TYPE</th>
                <th>HEAD</th>
                <th>CONTACT</th>
                <th>EMAIL</th>
              </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $sc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($s->sc_id); ?></td>
                    <td><?php echo e($s->sc_name); ?></td>
                    <td><?php echo e($s->district); ?></td>
                    <td><?php if($s->sc_type==1): ?>
                            Elemenetary
                        <?php else: ?>
                            High School
                        <?php endif; ?>
                    </td>
                    <td><?php echo e($s->sc_head); ?></td>
                    <td><?php echo e($s->sc_contact); ?></td>
                    <td><?php echo e($s->sc_email); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                   
            </tbody>
          </table>
          
</body>                      
</html>