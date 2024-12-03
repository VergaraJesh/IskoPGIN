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
            <b>LIST OF SIRIB ACADEMIC SCHOLARS(<?php echo e($stat); ?>)<br>
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
                <th>COLLEGE</th>
                <th>COURSE</th>
                <th>YEAR LEVEL</th>
                <th>CONTACT INFO</th>
              </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $users): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td><?php echo e(++$i); ?></td>
                <td><?php echo e($users['lname']); ?>,<?php echo e($users['fname']); ?></td>
                <td><?php echo e($users['coll']); ?></td>
                <td><?php echo e($users['course']); ?></td>
                <td><?php echo e($users['yl']); ?></td>
                <td><?php echo e($users['gwa']); ?>

                        <?php if($users['con']>1): ?>
                        /<?php echo e($users['con']); ?>

                        <?php endif; ?></td>
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
          <br><br>
          <p></p><br><br>

            <br><br>
</body>                      
</html>