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
            <b>LIST OF  <?php if($stype==1): ?> ACADEMIC  <?php else: ?> SENIOR HIGH SCHOOL <?php endif; ?> SCHOLARS<br>
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
              <tr valign="middle">
                <th>No.</th>
                <th scope="col">NAME</th>
                <?php if($stype==1): ?>
                  <th>COLLEGE</th>
                  <th>COURSE</th>
                  <th scope="col">YEAR LEVEL</th>                  
                  <th class="text-center">GWA</th>
                  <th class="text-center">Exam Result</th>
                  <th class="text-center">Interview(PED) Result</th>
                  <th class="text-center">Interview(INYDO) Result</th>
                  <th class="text-center">Total</th>
                  <th class="text-center">Scholarship Applied</th>
                <?php else: ?>
                  <th scope="col">SCHOOL</th>
                  <th>MUNICIPALITY</th>
                  <th class="text-center">GRADE LEVEL</th>
                  <th class="text-center">GWA(15%)</th>
                  <th class="text-center">Exam Result(15%)</th>
                  <th class="text-center">Interview(PED) Result(40%)</th>
                  <th class="text-center">Interview(INYDO) Result(30%)</th>
                  <th class="text-center">Total</th>  
                  <th class="text-center">Scholarship Applied</th>      
                  <th class="text-center">Initial Interviewer</th>          
                <?php endif; ?>                
                
              </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $users): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>               
                    <tr>
                      <td> 
                          <?php if($users['statss']==0): ?>
                          <font color="red"><?php echo e(++$i); ?></font>
                          <?php else: ?>
                          <?php echo e(++$i); ?>

                          <?php endif; ?>
                        </td>
                      <td>
                          <?php if($users['reqs']==0): ?>  
                          <font color="red"><?php echo e($users['lname']); ?>,<?php echo e($users['fname']); ?> <?php echo e($users['mname']); ?></font>
                          <?php else: ?>
                          <?php echo e($users['lname']); ?>,<?php echo e($users['fname']); ?> <?php echo e($users['mname']); ?>

                          <?php endif; ?>
                        
                        
                      </td>
                      <?php if($stype==1): ?>
                        <td><?php echo e($users['coll']); ?></td>
                        <td><?php echo e($users['course']); ?></td>
                        <td><?php echo e($users['yl']); ?></td>
                      <?php else: ?>
                      <td><?php echo e(ucwords($users['school'])); ?></td>
                      <td><?php echo e($users['mun']); ?></td>
                      <td><?php echo e($users['yl']); ?></td>                      
                      <?php endif; ?> 
                      <td class="text-center align-middle"><?php echo e($users['gwa']); ?></td>          
                      <td class="text-center align-middle"><?php echo e($users['exam']); ?></td>
                      <td class="text-center align-middle"><?php echo e($users['ped']); ?></td>
                      <td class="text-center align-middle"><?php echo e($users['inydo']); ?></td>
                      <td class="text-center align-middle"><?php echo e($users['total']); ?></td>
                      <td><?php if($users['gropus']==2 ||$users['gropus']==3): ?>
                        <font color="red">(4Ps)</font>
                        <?php elseif($users['gropus']==4): ?>
                        <font color="red">Sibling Scholar</font>
                        <?php elseif($users['gropus']==5): ?>
                        <font color="red">Other Scholarship</font>
                        <?php elseif($users['gropus']==6): ?>
                        <font color="blue">LGU Scholarship</font>
                        <?php elseif($users['gropus']==7): ?>
                        <font color="red">LGU + 4PS</font>
                        <?php elseif($users['gropus']==8): ?>
                        <font color="red">CHED</font>
                        <?php elseif($users['gropus']==9): ?>
                        <font color="red">TES</font>
                        <?php elseif($users['gropus']==10): ?>
                        <font color="red">CHED & TES</font>
                        <?php else: ?>
                        None
                        <?php endif; ?></td>
                        <?php if($stype==4): ?>
                        <td class="text-center align-middle"><?php echo e($users['per']); ?></td>
                        <?php endif; ?>
                      
                  </tr>              
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
          <br><br>
          <p></p><br><br>

            <br><br>
</body>                      
</html>