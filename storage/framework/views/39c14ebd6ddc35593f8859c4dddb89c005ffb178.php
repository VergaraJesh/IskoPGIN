<?php $__env->startSection('head'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<div class="container">
		<h2>SCHOOL INFORMATION FOR <?php echo e(strtoupper($sn)); ?></h2>
		<br><br>
		<table class="table table-bordered">
				<thead>
				  <tr>
					<th>School Staff/Head</th>
					<th>School Contact</th>
					<th>School Email</th>
					<th>Function</th>
					<th>Staff Updated/Created</th>
				  </tr>
				</thead>
				<tbody>
					<?php $__currentLoopData = $sch; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td><?php echo e($s->sc_head); ?></td>
						<td align="center"><?php echo e($s->sc_contact); ?></td>
						<td align="center"><?php echo e($s->sc_email); ?></td>
						<td>
							<div class="row">
								<div class="col-md-4" align="left">
										<a class="btn btn-info" href="/screcord/<?php echo e($s->id); ?>/edit" role="button">Update</a>
									</div>
								<?php if($s->awt!=1): ?>
								 <div class="col-md-3" align="left">
										 <form class="delete" action="<?php echo e(route('screcord.destroy', $s->id)); ?>" method="POST">
												 <input type="hidden" name="_method" value="DELETE">
												 <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
												 <input type="submit" value="Delete" class="btn btn-danger">
											 </form>
											 
									 </div>
								<?php endif; ?>
							</div>
						</td>
						<td align="center"><?php $__currentLoopData = $staffs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $staff): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<?php if($staff->id==$s->staff): ?>
								<?php echo e($staff->name); ?>

								<?php endif; ?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</td>
					</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
		</table>

		<br><br>
		<table class="table table-bordered">
				<table class="table table-bordered" >
						<thead >
								<tr>
									<th>SY</th>    
								<?php if($type==1): ?>								
									<th>Kinder</th>                                                   
									<th>Grade 1</th>  
									<th>Grade 2</th> 
									<th>Grade 3</th> 
									<th>Grade 4</th> 
									<th>Grade 5</th> 
									<th>Grade 6</th>   
								<?php else: ?>    
									<th>Grade 7</th> 
									<th>Grade 8</th> 
									<th>Grade 9</th> 
									<th>Grade 10</th> 
									<th>Grade 11</th>      
									<th>Grade 12</th> 
								<?php endif; ?>
									<th>Staff</th>    
									<th>Function</th>
								</tr>
						</thead>
						<tbody>
					<?php $__currentLoopData = $sch2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>						
						<td><?php echo e($s['sy']); ?></td>						
						<?php if($type==1): ?>						
							<td><?php echo e($s['kin']); ?></td>							 
						<?php endif; ?>
							<td><?php echo e($s['g1']); ?></td> 
							<td><?php echo e($s['g2']); ?></td> 
							<td><?php echo e($s['g3']); ?></td> 
							<td><?php echo e($s['g4']); ?></td> 
							<td><?php echo e($s['g5']); ?></td>      
							<td><?php echo e($s['g6']); ?></td> 
							<td><?php echo e($s['staff']); ?></td> 
							<td>
							<div class="row">
								<div class="col-md-4" align="left">
										<a class="btn btn-info" href="/editrecs/<?php echo e($s['id']); ?>" role="button">Update</a>
									</div>
								 <div class="col-md-2" align="left">
										 <form class="delete" action="<?php echo e(route('student.delrecsgo', $s['id'])); ?>" method="POST">
												 <input type="hidden" name="_method" value="DELETE">
												 <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
												 <input type="hidden" name="sch" value="<?php echo e($s['scc']); ?>" />
												 <input type="submit" value="Del" class="btn btn-danger">
											 </form>
											 
									 </div>
							</div>
							</td>
					</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
		</table>
	</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
		$(".delete").on("submit", function(){
			return confirm("Do you want to delete this item?");
		});
	</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>