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
    <div class="row" align="center">
            <h2>Exam Result for <?php if($stype==1): ?> ACADEMIC <?php else: ?> SENIOR HIGH SCHOOL <?php endif; ?>
                for the School year <?php $__currentLoopData = $sy; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ys): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <?php echo e($ys->from); ?>-<?php echo e($ys->to); ?>

                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> - <?php echo e($sem); ?></h2> 
        </div>
    <br>
    <div class="container">
    <table class="table table-bordered">
            <thead>
              <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Sentence</th>
                <th>Antonyms</th>
                <th>Analogy</th>
                <th>Synonym</th>
                <th>Numeric Reasoning</th>
                <th>Ilocos Norte</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $users): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                  <td> <?php echo e(++$i); ?></td>
                  <td> <?php echo e($users['name']); ?></td>
                  <td> <?php echo e($users['t1']); ?></td>
                  <td> <?php echo e($users['t2']); ?></td>
                  <td> <?php echo e($users['t3']); ?></td>
                  <td> <?php echo e($users['t4']); ?></td>
                  <td> <?php echo e($users['t5']); ?></td>
                  <td> <?php echo e($users['t6']); ?></td>
                  <td> <?php echo e($users['total']); ?></td>
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
        
</body>                      
</html>