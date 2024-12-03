<?php $__env->startSection('head'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<div class="container">
        <br><br>
        <div class="row" align="center">
            <div class="col-md-10">
            <h2><b>Edit Course</b></h2>
            </div>
        </div>
        <br><br>
        <form class="form-inline" id="regForm" method="POST" action="<?php echo e(route('shschools.update',[$shs->id])); ?>" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="_method" value="put">   
                
        <div class="row">
                <div class="form-group">
                        <div class="input-group">
                                <span class="input-group-addon">Course Name</span>
                                <input id="school" type="text" class="form-control" name="school" placeholder="Course Name" size="35">
                              </div>
                </div>                
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>

    </div>
	

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>