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
            <h5>Contact for <?php if($stype==3): ?>
                              Tech Voc Scholar
                            <?php else: ?>
                              Senior High School
                            <?php endif; ?> 
                            <?php $__currentLoopData = $syear; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $syear): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php echo e($syear->from); ?>-<?php echo e($syear->to); ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php echo e($semester); ?> Semester</h5>
        </div>
    <br>
    <div class="container">
    <table class="table table-bordered">
            <thead>
              <tr>
                <th>No.</th>
                <th>NAME</th>
                <th>SCHOOL</th>
                <?php if($stype==3): ?>
                            <th>COURSE</th>
                            <?php else: ?>
                            <th>STRAND</th>
                            
                            <?php endif; ?> 
                <th>CONTACT</th>
              </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $users): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                  <td> <?php echo e(++$i); ?></td>
                
                <td><?php echo e($users['name']); ?></td>
                <td><?php echo e($users['school']); ?></td>
                <td><?php echo e($users['course']); ?></td>
                <td><?php echo e($users['grade']); ?>

                        <?php if($users['con']>1): ?>
                        /<?php echo e($users['con']); ?>

                        <?php endif; ?>
                </td>
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
        
</body>                      
</html>