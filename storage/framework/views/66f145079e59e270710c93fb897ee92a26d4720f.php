<?php $__env->startSection('head'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
		<div class="container" align="center">
			<br><br><br><br><br>
			<div class="row">
					<img src="<?php echo e(url('/congrats.gif')); ?> " class="rounded mx-auto d-block" alt="..." width="500px">
			</div>
				<div class="row">
					<h1><p class="text-success">CONGRATULATION SUCCESSFUL ADDED STUDENT!</p></h1>
				</div>
				<div class="row" align="center">
				<div class="col-md-10" align="center">
						<a class="btn btn-success" href="/student/create" role="button">Register Again</a>
					</div>
				</div>
			</div>
			<br><br><br><br><br>
			
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
	
<?php $__env->stopSection(); ?>

<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>