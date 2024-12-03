<?php $__env->startSection('head'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<div class="container">
        <div class="row">
            <div class="col-md-10" align="center"> 
                    <p><h4><b>Add Senior High Schools</b></h4></p>
            </div>
            <div class="row">
                <div class="col-md-1">
                </div>
               <div class="col-md-9">
                  <?php if($errors->any()): ?>
                      <div class="alert alert-danger">
                          <ul class="list-inline">
                              <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <li class="list-inline-item"><?php echo e($error); ?></li>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </ul>
                    </div>
                  <?php endif; ?>
                </div>
          </div>
            <br><br><br><br>
        </div>
            <form class="form" action="/shschools" method="POST">                
                <?php echo e(csrf_field()); ?>

                
                <div class="row">
                    <div class="form-group">
                            <div class="col-md-10">
                            <div class="input-group-inline">
                                    <label for="remd">School Name</label>               
                                    <input id="sname" type="text" class="form-control" name="sname" placeholder="School Name ...." size="50">
                                  </div>
                            </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-10" align="center">
                            <a href="/remark/" class="btn btn-danger" role="button">Back</a>
                            <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
              </form>
        </div>
	

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>