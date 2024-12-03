<?php $__env->startSection('head'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
		<div class="container" >
		<form method="POST" action="/updatedall">
		<table width="90%">
			<tr>
				<th width="25%">Name</th>
				<th width="10%">Exam Result</th>
				<th width="10%">PED(Interview)</th>
				<th width="10%">INYDO(Interview)</th>
				<th width="15%">Contact Info</th>
				<th width="5%">Status</th>
			</tr>
			<?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td><?php echo e($student['lname']); ?>, <?php echo e($student['fname']); ?></td>
					<td><input name="exam<?php echo e($student['no']); ?>" id="exam<?php echo e($student['no']); ?>" class="form-control mx-sm-3" placeholder="Exam"></td>
					
					<input type="hidden" value="<?php echo e($student['id']); ?>" name="id<?php echo e($student['no']); ?>" id="id<?php echo e($student['no']); ?>">
				</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</table>
		<br>
			<div class="row">
					<?php echo e(csrf_field()); ?>

					<input type="hidden" value="<?php echo e($i); ?>" name="total" id="total">
					<input type="hidden" value="<?php echo e($sem); ?>" name="sem" id="sem">
					<input type="hidden" value="<?php echo e($sy); ?>" name="sy" id="sy">
					<div class="col-md-8" align="center">
						<button type="submit" class="btn btn-primary btn-md">Submit</button>
					</div>
				</div>
		</form>
		</div>
		
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
	
<?php $__env->stopSection(); ?>

<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>