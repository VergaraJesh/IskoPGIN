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

                        <div class="right">
                                <p>PED-003-0</p>
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
            <b>LIST OF SIRIB ACADEMIC SCHOLARS(OLD)<br>
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
                <th>NAME</th>
                <th>SCHOOL</th>
                <th>COLLEGE</th>
                <th>COURSE</th>
                <th>YEAR LEVEL</th>
                <th>CS Hours</th>
              </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $users): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td><?php echo e(++$i); ?></td>
                <td><?php if($users['tem']==1): ?>
                        (*)
                    <?php endif; ?>
                        <?php echo e(strtoupper($users['lname'])); ?>, <?php echo e(strtoupper($users['fname'])); ?></td>
                <td><?php echo e($users['school']); ?></td>
                <td><?php echo e($users['coll']); ?></td>
                <td><?php echo e($users['course']); ?></td>
                <td><?php echo e($users['yl']); ?></td>
                <td>
                <?php echo e($users['cs']); ?>

                </td>
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
          <br><br>
          <p></p><br><br>
        
            <tr>
                    <td width="5%">&nbsp</td>
                    <td width="200px">Prepared By:</td>
                    
            </tr>
    </table>
    <br><br>
    <table width="375px">
            <tr align="center">
                    <td width="10%">&nbsp</td>
                    <td width="20%"><p align="center"><b><?php echo e(strtoupper($staff)); ?></b><br>Education Staff</p></td>    
            </tr>
    </table>
    <br><br>
    <table width="100%">
            <tr>
                    <th width="5%">&nbsp</th>
                    <td width="200px">Recommending Approval:</td>
                    
            </tr>
    </table>
    <br><br>
    <table width="375px">
            <tr align="center">
                    <th width="10%">&nbsp</th>
                    <th width="20%"><p align="center"><b>MATILDE M. NERY</b><br>OIC- Education Office</p></th>    
            </tr>
    </table>
    <br><br>
    <table width="100%">
            <tr>
                    <th width="150px" >&nbsp</th>
                    <td width="200px" align="center"><p align="left">Approved: </td>    
            </tr>
    </table>
    <br><br>
    <table width="100%">
            <tr>
                    <th width="50px" >&nbsp</th>
                    <th width="200px" align="center"><p align="center"> <b>HON. IMEE R. MARCOS</b><br>Governor</p></th>    
            </tr>
    </table>

</body>                      
</html>