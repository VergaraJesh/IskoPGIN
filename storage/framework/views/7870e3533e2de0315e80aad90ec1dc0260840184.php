<?php $__env->startSection('head'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<div class="container">
			<form id="regForm" method="POST" action="<?php echo e(route('record.update',[$rec->id])); ?>" enctype="multipart/form-data">
					<?php echo e(csrf_field()); ?>

					<input type="hidden" name="_method" value="put">
				<div class="row">
			<div class="form-group col-md-9" align="center">
				 <input type="hidden" value="<?php echo e($student->id); ?>" name="student" id="student" />
				 <input type="hidden" value="<?php echo e($rec->id); ?>" name="record" id="record" />
				<h3>Student Update Records for <b><?php echo e($student->fname); ?> <?php echo e($student->lname); ?></b></h3>
			</div>
		</div>
		<div class="row">
	            <div class="col-md-1">
	            </div>
	           <div class="col-md-7">
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
		<br>
		<div class="row">
			<?php echo e(csrf_field()); ?>

			<div class="form-group col-md-2">
            <label for="sy">School Year</label>
             <select id="sy" name="sy" class="form-control">
					<option value="">------</option>
                        <?php $__currentLoopData = $sy; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($sy->id); ?>"><?php echo e($sy->from); ?>-<?php echo e($sy->to); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
          </div>

          <div class="form-group col-md-2">
            <label for="sem">Semester</label>
             <select id="sem" name="sem" class="form-control">   
						<option value="">------</option>                  
                        <option value="1">1st</option>
                        <option value="2">2nd</option>
                        <option value="3">Both</option>
                    </select>
          </div>
			<div class="form-group col-md-1">
	            <label for="gwa">GWA/Grade</label>
	           	<input id="gwa" name="gwa" class="form-control mx-sm-1" placeholder="00.00" step="0.01">
			</div>
			<div class="form-group col-md-1">
	           <label for="cs">CS</label>
	           <input id="cs" name="cs" class="form-control mx-sm-3" placeholder="0.0" step="0.01">
			  </div>  
			
				<div class="form-group col-md-1">
				<div class="form-group">
					<label for="yl">YearLevel</label>
					<select id="yl" name="yl" class="form-control">
					<option value="">------</option>
					<option value="1">I</option>
					<option value="2">II</option>
					<option value="3">III</option>
					<option value="4">IV</option>
					<option value="5">V</option> 
					<?php if($student->scholartype==6 || $student->scholartype==7): ?>
					<option value=NULL>DELETE</option> 
					<?php endif; ?>
					</select>
				</div>
			</div>
		
		  <div class="form-group col-md-2">
				<div class="form-group">
					<label for="gl">Grade Level</label>
					<select id="gl" name="gl" class="form-control">
					<option value="">------</option>
					<?php if($student->scholartype==6 || $student->scholartype==7): ?>
					<option value="7">Grade 7</option>
					<option value="8">Grade 8</option>
					<option value="9">Grade 9</option>
					<option value="10">Grade 10</option>
					<?php endif; ?>
					<option value="11">Grade 11</option>
					<option value="12">Grade 12</option>
					</select>
				</div>
			</div>
		  
		
	
		<div class="form-group col-md-2">
				<label for="stat">Status</label>
				<select id="stat" name="stat" class="form-control">
					<option value="">------</option>
					<option value="0">Not Approved</option>
					<option value="1">Approved</option>
					</select>
			   </div>  

		</div>
	 </div>
		
		<div class="row">
			<div class="col-md-1"></div>
		<div class="form-group col-md-2">
			<label for="stype">Scholartype Update</label>
			<select id="stype" name="stype" class="form-control">
				<option value="">------</option>
				<option value="1">Yes</option>
				</select>
			 </div>  
		</div>
		<div class="row">
			<div class="col-md-8" align="center">
				<a href="/student/<?php echo e($student->id); ?>" class="btn btn-danger" role="button">Back</a>
				<button type="submit" class="btn btn-primary btn-md">Submit</button>
			</div>
		</div>
	</form>
	</div>
	

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>