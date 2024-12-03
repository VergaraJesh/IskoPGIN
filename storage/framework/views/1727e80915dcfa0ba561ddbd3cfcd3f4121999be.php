<!doctype html>
<html lang="<?php echo e(app()->getLocale()); ?>">
    <head>
    <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Schoolar Form</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
        <script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
        <link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/bootstrap-3.min.css">

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
            <b>LIST OF ACADEMIC SCHOLARS <?php if($sst==1): ?>
                        (OLD)
                    <?php endif; ?>
                    <?php if($sst==2): ?>
                        (NEW)
                    <?php endif; ?><br>
            <?php echo e($semester); ?> SEMESTER S.Y. 
            <?php $__currentLoopData = $syear; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ys): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo e($ys->from); ?>-<?php echo e($ys->to); ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </b>
            </h5>
        </div>
    <br><br>
<?php if($sep==0): ?>
    <div class="container">
        <div class="row">
                <div class="col-md-12" align="center">
                        <b>MARIANO MARCOS STATE UNIVERSITY</b>
                </div>
        </div>
    <table class="table table-bordered">
            <thead>
              <tr>
                <th>No.</th>
                <th>NAME</th>
                <th>SCHOOL</th>
                <th>COLLEGE</th>        
                <th>COURSE</th>
                <th>YEAR LEVEL</th>
                <?php if($g1==1): ?>
                <th>GWA</th>
                <?php endif; ?>
                
              </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $users): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td><?php echo e(++$i); ?></td>
                <td><?php echo e(strtoupper($users['lname'])); ?>, <?php echo e(strtoupper($users['fname'])); ?> <?php if($users['tem']==1): ?> * <?php endif; ?></td>     
                <td><?php echo e($users['school']); ?></td>
                <td><?php echo e($users['coll']); ?></td>
                <td><?php echo e($users['course']); ?></td>
                <td><?php echo e($users['yl']); ?></td>
                <?php if($g1==1): ?>
                <td><?php $__currentLoopData = $users['gwa']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gwa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo e($gwa); ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                </td>                 
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
          <br><br>
          <p></p><br><br>
          <div class="row">
                        <div class="col-md-12" align="center">
                                <b>PRIVATE INSTITUTIONS</b>
                        </div>
                </div>
            <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>NAME</th>
                        <th style="width: 90px;">SCHOOL</th>
                        <th>COURSE</th>
                        <th>YEAR LEVEL</th>
                        <?php if($g1==1): ?>
                        <th>GWA</th>
                        <?php endif; ?>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $students1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $users): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                        <td><?php echo e(++$j); ?></td>
                        <td><?php echo e(strtoupper($users['lname'])); ?>, <?php echo e(strtoupper($users['fname'])); ?> <?php if($users['tem']==1): ?>  * <?php endif; ?></td>  
                        <td><?php echo e($users['school']); ?>  </td>
                        <td><?php echo e($users['course']); ?></td>
                        <td><?php echo e($users['yl']); ?></td>
                        <?php if($g1==1): ?>
                        <td><?php $__currentLoopData = $users['gwa']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gwa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo e($gwa); ?>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                      </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                  </table>   <b>
                  <br>
<?php else: ?>
<div class="container">
<table class="table table-bordered">
            <thead>
              <tr>
                <th>No.</th>
                <th>NAME</th>                
                <th>SCHOOL</th>      
                <th>COURSE</th>
                <th>YEAR LEVEL</th>
                <?php if($g1==1): ?>
                <th>GWA</th>
                <?php endif; ?>
                <?php if($in==1): ?>
                <th>Municipality/City</th>
                <th class="text-center">Gender</th>
                <th class="text-center">Contact Info</th>
                <th class="text-center">Date of Birth</th>
                <th class="text-center">CS</th>
                <?php endif; ?>
              </tr>
            </thead>
            <tbody>
            <tbody>
            <?php $__currentLoopData = $students2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $users): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td><?php echo e(++$i); ?></td>
                <td><?php echo e(strtoupper($users['lname'])); ?>, <?php echo e(strtoupper($users['fname'])); ?> <?php if($users['tem']==1): ?> * <?php endif; ?></td>     
               
                <td><?php if($users['school']=="MMSU"): ?> <?php echo e($users['school']); ?>-<?php echo e($users['coll']); ?> <?php else: ?> <?php echo e($users['school']); ?>  <?php endif; ?></td>
                <td><?php echo e($users['course']); ?></td>                
                <td><?php echo e($users['yl']); ?></td>
                <?php if($g1==1): ?>
                <td><?php $__currentLoopData = $users['gwa']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gwa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo e($gwa); ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                <?php if($in==1): ?> 
                <td><?php echo e($users['municipality']); ?></td>
                <td class="text-center align-middle"><?php echo e($users['gender']); ?></td> 
                      <td class="text-center align-middle"><?php echo e($users['c1']); ?> <?php if($users['c2']!="N/A"): ?> / <?php echo e($users['c2']); ?> <?php endif; ?></td> 
                      <td class="text-center align-middle"><?php echo e($users['dob']); ?></td> 
                      <td class="text-center align-middle"><?php if($users['cs']==0): ?> - <?php else: ?> <?php echo e($users['cs']); ?> <?php endif; ?></td> 
                <?php endif; ?>
                </td>                 
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
<?php endif; ?>

                  <?php if($users['tem']!=1 && $users['op']==0): ?>  
                  LEGEND:<br>
                  <font size=5>* </b></font>New Scholars
                  <br>                  
                   <?php endif; ?>
                




</body>                      
</html>