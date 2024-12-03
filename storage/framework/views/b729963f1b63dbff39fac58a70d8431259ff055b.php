<?php $__env->startSection('head'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<div class="container">
        <br><br>
        <div class="row" align="center">
            <div class="col-md-10">
            <h2><b>Select Scholarship Type</b></h2>
            </div>
        </div>
            <div class="row" align="center">
                <div class="col-md-10">
                    <?php echo $__env->make('student.flash-message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
            </div>
        <div class="row" align="center">
                <div class="col-md-10" align="center">
                    <a class="btn btn-success" href="/admins/1" role="button">Academic</a>                
                    <a class="btn btn-success" href="/admins/3" role="button">Tech Voc</a>
                    </div>
        </div>
    </div>
	

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>