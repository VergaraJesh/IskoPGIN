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
        <form class="form-inline" id="regForm" method="POST" action="<?php echo e(route('admins.update',[$course->id])); ?>" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="_method" value="put">
                <input type="hidden" name="type" value="<?php echo e($t); ?>">
            <div class="row" align="justify">
                    <div class="form-group">
                            <div class="input-group">
                                    <span class="input-group-addon">Old Course Name</span>
                                    <input id="" type="text" class="form-control" name="" disabled size="35" value="<?php echo e($course->name); ?>">
                                    </div>
                        </div>
                        <div class="form-group">
                                <div class="input-group">
                                        <span class="input-group-addon">Old Course Abreviation</span>
                                        <input id="" type="text" class="form-control" name="" disabled value="<?php echo e($course->abvr); ?>" size="35">
                                      </div>
                        </div>
                        <br><br>     
        <div class="row">
                <div class="form-group">
                        <div class="input-group">
                                <span class="input-group-addon">Course Name</span>
                                <input id="cname" type="text" class="form-control" name="cname" placeholder="Course Name" size="35">
                              </div>
                </div>
                <div class="form-group">
                        <div class="input-group">
                                <span class="input-group-addon">Course Abreviation</span>
                                <input id="abvr" type="text" class="form-control" name="abvr" placeholder="Abreviation" size="35">
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