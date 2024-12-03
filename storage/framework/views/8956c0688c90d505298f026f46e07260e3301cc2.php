<?php $__env->startSection('head'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
		<div class="container" align="center">
			<div class="row">
				<div class="col-md-9" align="left">
					<p><h4><b>Remarks for:</b> 
						<?php echo e(ucfirst($student->fname)); ?> <?php echo e(ucfirst($student->lname)); ?></h4></p>
					</div>
			</div>

			<div class="row">
					<div class="col-md-2" align="center">
							<b><h5>Title</h5></b>
							</div>
					<div class="col-md-6" align="center">
							<b><h5>Remarks</h5></b>
							</div>
					<div class="col-md-2" align="center">
							<b><h5>Option</h5></b>
							</div>
				</div>
			<?php $__currentLoopData = $remark; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div class="row">
					<div class="col-md-2" align="left">
						<?php echo e($rem->title); ?>

					</div>
					<div class="col-md-6" align="left">
							<?php echo e($rem->remark); ?> <br>Created By: 
							<?php echo e($users[$rem->staff]->name); ?> at 
				<?php echo e(date_format($rem->created_at,'Y-m-d')); ?>

						</div>
					<div class="col-md-2" align="center">
							<form class="delete" action="<?php echo e(route('record.remdestroy', $rem->id)); ?>" method="POST">
									<input type="hidden" name="_method" value="DELETE">
									<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
									<input type="submit" value="Delete" class="btn btn-danger">
								</form>
						</div>
				</div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<br><br>
			<div class="row">
					<div class="col-md-10" align="center">
							<a href="/student/<?php echo e($student->id); ?>" class="btn btn-danger" role="button">Back</a>
							<a class="btn btn-primary" href="/createremark/<?php echo e($student->id); ?>" role="button">Create Remark</a>
					</div>
			</div>
		</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
	
<?php $__env->stopSection(); ?>

<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>