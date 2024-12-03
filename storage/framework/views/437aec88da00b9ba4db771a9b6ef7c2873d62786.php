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
            <b>LIST OF SENIOR HIGH SCHOOL <?php if($tear>1): ?> <?php if($ei==1): ?>
                    (NEW)
                    <?php else: ?>
                   (OLD)
                    <?php endif; ?> 
                    
                    <?php endif; ?>
                                        SCHOLARS<br>
            <?php echo e($semester); ?> SEMESTER S.Y. 
            <?php $__currentLoopData = $syear; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ys): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo e($ys->from); ?>-<?php echo e($ys->to); ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </b>
            </h5>
        </div>
    <div class="container">
    <table class="table table-bordered">
            <thead>
              <tr>
                <th class="text-center align-middle">No.</th>
                <th class="text-center align-middle">NAME</th>
                <th class="text-center align-middle">SCHOOL</th>
                <th class="text-center align-middle">STRAND</th>
                <th class="text-center align-middle">GRADE LVL</th>
                <?php if($g1==1): ?>
                <th class="text-center align-middle">GWA</th>
                <?php endif; ?>
                <?php if($in==1): ?>
                <th class="text-center align-middle">Municipality/City</th>                
                <th class="text-center">Gender</th>
                  <th class="text-center">Contact Info</th>
                  <th class="text-center">Date of Birth</th>
                  <th class="text-center">CS</th>
                <?php endif; ?>
              </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $users): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td>
                    <?php echo e(++$i); ?>

                </td>
                <td><?php echo e($users['name']); ?> 
                <?php if($tear==0): ?> 
                  <?php if($legends==1): ?>
                    <?php if($users['x']==1): ?> 
                    <font color=black size="4" face='Arial'> <b>*</b> </font> 
                    <?php endif; ?> 
                  <?php elseif($legends==2): ?>
                    <?php if($users['x']==0): ?> 
                    <font color=black size="4" face='Arial'> <b>*</b> </font> 
                    <?php endif; ?> 
                  <?php endif; ?>
                <?php endif; ?></td>
                <td><?php echo e($users['schl']); ?></td>
                <td align="center"><?php echo e($users['course']); ?></td>
                <td align="center"><?php echo e($users['gl']); ?></td>
                <?php if($g1==1): ?>
                <td align="center"><?php echo e($users['gwa']); ?></td>
                <?php endif; ?>
                <?php if($in==1): ?>
                <td align="center"><?php echo e($users['mun']); ?></td>                
                <td class="text-center align-middle"><?php echo e($users['gender']); ?></td> 
                      <td class="text-center align-middle"><?php echo e($users['c1']); ?> <?php if($users['c2']!="N/A"): ?> / <?php echo e($users['c2']); ?> <?php endif; ?></td> 
                      <td class="text-center align-middle"><?php echo e($users['dob']); ?></td> 
                      <td class="text-center align-middle"><?php if($users['cs']==0): ?> - <?php else: ?> <?php echo e($users['cs']); ?> <?php endif; ?></td> 
                <?php endif; ?>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
          <br>
          <?php if($tear==0): ?>  
          <?php if($legends>0): ?>
                  LEGEND:<br>
          <?php endif; ?>
                  <?php if($legends==2): ?>
                  <font size=5><b>* </b></font>Renewed Scholars
                  <?php elseif($legends==1): ?>
                  <font size=5><b>* </b></font>New Scholars
                  <?php endif; ?>
                  
                  <br>                  
            <?php endif; ?>
          <br>
          
    </div>
</body>                      
</html>