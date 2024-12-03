<?php $__env->startSection('head'); ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<div class="container">
		<?php echo $__env->make('student/modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<div class="row" align="center">
			<div class="col-md-6">
				<h3>Student Profile :
				<?php switch($student->scholartype):
					case (1): ?>
						Academic Scholar
					<?php break; ?>
					<?php case (2): ?>
						CAAP
					<?php break; ?>
					<?php case (3): ?>
						TechVoc Scholar
					<?php break; ?>
					<?php case (4): ?>
						Senior High School Scholar
					<?php break; ?>
					<?php case (5): ?>
						Doctor of Medicine
					<?php break; ?>
					<?php case (6): ?>
						Arts
					<?php break; ?>
					<?php case (7): ?>
						Agriculture
					<?php break; ?>
				<?php endswitch; ?>
				</h3>
			</div>
			<div class="col-md-2" align="left" valign="center">
				<?php if($rem>0): ?>
						<b><p class="text-danger"> = Remarks = </p></b>
				<?php endif; ?>
			</div>
			<div class="col-md-3">

				<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $users): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php if($users->id == $student->staff): ?>
						Last Updated by: <?php echo e($users->name); ?>

					<?php endif; ?>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
		</div>
		
		<div class="row">
        <div class="col-xs-2">
            <div class="big-box">
            	<?php if($student->pic != null): ?>
            	<img src="/<?php echo e($student->pic); ?>" class="rounded mx-auto d-block" alt="..." width="150px" length="150px" >
            	<?php else: ?>
            	<img src="<?php echo asset("default.jpeg")?>" class="rounded mx-auto d-block" alt="..." width="150px" length="150px" >
            	<?php endif; ?>
            </div>
        </div>
        <div class="col-xs-10">
            <div class="row">
                <div class="col-xs-12">
                	<div class="mini-box">
							<?php if($student->ip==1): ?>
							<p><font color="red"><h4 align="justify"><b>Name:(IP) <u><?php echo e(strtoupper($student->fname)); ?> <?php echo e(strtoupper($student->mname)); ?> <?php echo e(strtoupper($student->lname)); ?>

									<?php if($student->suffix!=null): ?> <?php echo e($student->suffix); ?> <?php endif; ?> </u></b></h4></font></p>
							<?php elseif($student->ip==2): ?>
							<p><font color="blue"><h4 align="justify"><b>Name: (4Ps)<u><?php echo e(strtoupper($student->fname)); ?> <?php echo e(strtoupper($student->mname)); ?> <?php echo e(strtoupper($student->lname)); ?>

								<?php if($student->suffix!=null): ?> <?php echo e($student->suffix); ?> <?php endif; ?> </u></b></h4></font></p>
							<?php elseif($student->ip==3): ?>
							<p><font color="green"><h4 align="justify"><b>Name: (4Ps+IP)<u><?php echo e(strtoupper($student->fname)); ?> <?php echo e(strtoupper($student->mname)); ?> <?php echo e(strtoupper($student->lname)); ?>

								<?php if($student->suffix!=null): ?> <?php echo e($student->suffix); ?> <?php endif; ?> </u></b></h4></font></p>
							<?php elseif($student->ip==4): ?>
							<p><font color="gold"><h4 align="justify"><b>Name: (Sibling Scholar)<u><?php echo e(strtoupper($student->fname)); ?> <?php echo e(strtoupper($student->mname)); ?> <?php echo e(strtoupper($student->lname)); ?>

								<?php if($student->suffix!=null): ?> <?php echo e($student->suffix); ?> <?php endif; ?> </u></b></h4></font></p>
							<?php elseif($student->ip==5): ?>
								<p><font color="gold"><h4 align="justify"><b>Name: (Other Scholarship)<u><?php echo e(strtoupper($student->fname)); ?> <?php echo e(strtoupper($student->mname)); ?> <?php echo e(strtoupper($student->lname)); ?>

								<?php if($student->suffix!=null): ?> <?php echo e($student->suffix); ?> <?php endif; ?> </u></b></h4></font></p>
							<?php elseif($student->ip==6): ?>
								<p><font color="silver"><h4 align="justify"><b>Name: (LGU Scholarship)<u><?php echo e(strtoupper($student->fname)); ?> <?php echo e(strtoupper($student->mname)); ?> <?php echo e(strtoupper($student->lname)); ?>

								<?php if($student->suffix!=null): ?> <?php echo e($student->suffix); ?> <?php endif; ?> </u></b></h4></font></p>
							<?php elseif($student->ip==7): ?>
								<p><font color="orange"><h4 align="justify"><b>Name: (LGU Scholarship + 4Ps)<u><?php echo e(strtoupper($student->fname)); ?> <?php echo e(strtoupper($student->mname)); ?> <?php echo e(strtoupper($student->lname)); ?>

								<?php if($student->suffix!=null): ?> <?php echo e($student->suffix); ?> <?php endif; ?> </u></b></h4></font></p>
							<?php elseif($student->ip==8): ?>
								<p><font color="orange"><h4 align="justify"><b>Name: (CHED)<u><?php echo e(strtoupper($student->fname)); ?> <?php echo e(strtoupper($student->mname)); ?> <?php echo e(strtoupper($student->lname)); ?>

								<?php if($student->suffix!=null): ?> <?php echo e($student->suffix); ?> <?php endif; ?> </u></b></h4></font></p>
							<?php elseif($student->ip==9): ?>
								<p><font color="orange"><h4 align="justify"><b>Name: (TES)<u><?php echo e(strtoupper($student->fname)); ?> <?php echo e(strtoupper($student->mname)); ?> <?php echo e(strtoupper($student->lname)); ?>

								<?php if($student->suffix!=null): ?> <?php echo e($student->suffix); ?> <?php endif; ?> </u></b></h4></font></p>
							<?php elseif($student->ip==10): ?>
								<p><font color="orange"><h4 align="justify"><b>Name: (CHED + TES)<u><?php echo e(strtoupper($student->fname)); ?> <?php echo e(strtoupper($student->mname)); ?> <?php echo e(strtoupper($student->lname)); ?>

								<?php if($student->suffix!=null): ?> <?php echo e($student->suffix); ?> <?php endif; ?> </u></b></h4></font></p>							
							<?php else: ?>							
							<p><h4 align="justify"><b>Name: <u><?php echo e(strtoupper($student->fname)); ?> <?php echo e(strtoupper($student->mname)); ?> <?php echo e(strtoupper($student->lname)); ?>

									<?php if($student->suffix!=null): ?> <?php echo e($student->suffix); ?> <?php endif; ?></u></b></h4></p>
							<?php endif; ?>
                		
                	</div>
            	</div>
                <div class="col-xs-2">
                	<div class="mini-box">
                		<p>
						AGE:<b>
							<?php if($student->dob != ""): ?>
								<?php echo e($age = date_diff(date_create($student->dob), date_create('now'))->y); ?>

							<?php else: ?>
								N/A
							<?php endif; ?>	
								</b>
							</p>
                </div>
            </div>
            <div class="col-xs-3">
                	<div class="mini-box">
                		<p>
						Monthly Income:<b>
							<?php echo e($student->income); ?>

								</b>
							</p>
                </div>
            </div>
            <div class="col-xs-7">
                	<div class="mini-box">
                		<p>
						Skills:<b>
								<?php $__currentLoopData = $student->skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skills): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<?php echo e($skills->skillname); ?>

								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							
								</b>
							</p>
                </div>
			</div>
			
			<div class="col-xs-12"><div class="mini-box">
                				
								<b>Permanent :
								<?php $__currentLoopData = $brgy; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brgy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<?php if($brgy->id == $student->cur_brgy): ?>
										<?php echo e($brgy->name); ?>,
									<?php endif; ?>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
								<?php $__currentLoopData = $mun; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brgy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<?php if($brgy->id == $student->cur_mun): ?>
										<?php echo e($brgy->name); ?>

									<?php endif; ?>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</b>
								
			                	</div>
			            	</div>
							
			<div class="col-xs-12"><div class="mini-box">
                				
								<b>Boarding :
								<?php if($student->perma_brgy): ?> 
									<?php $__currentLoopData = $brgy1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brgy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<?php if($brgy->id == $student->perma_brgy): ?>
											<?php echo e($brgy->name); ?>,
										<?php endif; ?>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
									<?php $__currentLoopData = $mun1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brgy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<?php if($brgy->id == $student->perma_mun): ?>
											<?php echo e($brgy->name); ?>

										<?php endif; ?>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								<?php else: ?>
									N/A
								<?php endif; ?>	
             					</b>
								
			                	</div>
			            	</div>
							
             	<div class="col-xs-5">
                	<div class="mini-box">
                		<p align="justify"><b>Contact Number:</b>
                			<?php if($student->contact): ?>
	                			<?php echo e($student->contact); ?>

	                		<?php else: ?>
	                			N/A
	                		<?php endif; ?>
                		</p>
                	</div>
            	</div>
	                <div class="col-xs-7">
	                	<div class="mini-box">
	                		<p align="justify"><b>Alternate Contact:</b> 
	                			<?php if($student->contact1): ?>
	                			<?php echo e($student->contact1); ?>

	                			<?php else: ?>
	                			N/A
	                			<?php endif; ?>
	                		</p>
	                </div>
	            </div>
	            <div class="col-xs-5">
                	<div class="mini-box">
                		<p align="justify"><b>Email:</b>
                			<?php if($student->email): ?>
	                			<?php echo e($student->email); ?>

	                		<?php else: ?>
	                			N/A
	                		<?php endif; ?>
                		</p>
                	</div>
            	</div>
	                <div class="col-xs-7">
	                	<div class="mini-box">
	                		<p align="justify"><b>alternate Email:</b>
	                			<?php if($student->email1): ?>
	                			<?php echo e($student->email1); ?>

		                		<?php else: ?>
		                			N/A
		                		<?php endif; ?>
	                		</p>
	                </div>
	            </div>

	            <div class="col-xs-3">
                	<div class="mini-box">
                		<p align="justify"><b>Mothers Name</b>
                		</p>
                	</div>
            	</div>
            	<div class="col-xs-1">
                	<div class="mini-box">
                		<p align="justify"><b>Age</b>
                		</p>
                	</div>
            	</div>
            	<div class="col-xs-2">
                	<div class="mini-box">
                		<p align="justify"><b>Address</b>
                		</p>
                	</div>
            	</div>
            	<div class="col-xs-2">
                	<div class="mini-box">
                		<p align="justify"><b>Contact</b>
                		</p>
                	</div>
            	</div>
            	<div class="col-xs-4">
                	<div class="mini-box">
                		<p align="justify"><b>Occupation</b>
                		</p>
                	</div>
            	</div>
	            <?php $__currentLoopData = $student->parents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parents): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                				<?php if($parents != null): ?>
	                				<?php if($parents->type == 0): ?>
	                					<div class="col-xs-3">
						                	<div class="mini-box">
						                		<p align="justify"><?php echo e(strtoupper($parents->pname)); ?>

						                		</p>
						                	</div>
						            	</div>
						            	<div class="col-xs-1">
						                	<div class="mini-box">
						                		<p align="justify"><?php echo e($parents->age); ?>

						                		</p>
						                	</div>
						            	</div>
						            	<div class="col-xs-2">
						                	<div class="mini-box">
						                		<p align="justify">
						                			<?php $__currentLoopData = $mun; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brgy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<?php if($brgy->id == $parents->address): ?>
															<?php echo e($brgy->name); ?>

														<?php endif; ?>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						                		</p>
						                	</div>
						            	</div>
						            	<div class="col-xs-2">
						                	<div class="mini-box">
						                		<p align="justify"><?php echo e($parents->contact); ?>

						                		</p>
						                	</div>
						            	</div>
						            	<div class="col-xs-4">
						                	<div class="mini-box">
						                		<p align="justify"><?php echo e($parents->occupation); ?>

						                		</p>
						                	</div>
						            	</div>						            
	                				<?php endif; ?>
                				<?php endif; ?>
                			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <div class="col-xs-3">
                	<div class="mini-box">
                		<p align="justify"><b>Fathers Name</b>
                		</p>
                	</div>
            	</div>
            	<div class="col-xs-1">
                	<div class="mini-box">
                		<p align="justify"><b>Age</b>
                		</p>
                	</div>
            	</div>
            	<div class="col-xs-2">
                	<div class="mini-box">
                		<p align="justify"><b>Address</b>
                		</p>
                	</div>
            	</div>
            	<div class="col-xs-2">
                	<div class="mini-box">
                		<p align="justify"><b>Contact</b>
                		</p>
                	</div>
            	</div>
            	<div class="col-xs-4">
                	<div class="mini-box">
                		<p align="justify"><b>Occupation</b>
                		</p>
                	</div>
            	</div>
	            <?php $__currentLoopData = $student->parents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parents): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                				<?php if($parents != null): ?>
	                				<?php if($parents->type == 1): ?>
	                					<div class="col-xs-3">
						                	<div class="mini-box">
						                		<p align="justify"><?php echo e(strtoupper($parents->pname)); ?>

						                		</p>
						                	</div>
						            	</div>
						            	<div class="col-xs-1">
						                	<div class="mini-box">
						                		<p align="justify"><?php echo e($parents->age); ?>

						                		</p>
						                	</div>
						            	</div>
						            	<div class="col-xs-2">
						                	<div class="mini-box">
						                		<p align="justify">
						                			<?php $__currentLoopData = $mun; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brgy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<?php if($brgy->id == $parents->address): ?>
															<?php echo e($brgy->name); ?>

														<?php endif; ?>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						                		</p>
						                	</div>
						            	</div>
						            	<div class="col-xs-2">
						                	<div class="mini-box">
						                		<p align="justify"><?php echo e($parents->contact); ?>

						                		</p>
						                	</div>
						            	</div>
						            	<div class="col-xs-4">
						                	<div class="mini-box">
						                		<p align="justify"><?php echo e($parents->occupation); ?>

						                		</p>
						                	</div>
						            	</div>						            
	                				<?php endif; ?>
                				<?php endif; ?>
                			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                		<div class="col-xs-3">
                	<div class="mini-box">
                		<p align="justify"><b>Guardian Name</b>
                		</p>
                	</div>
            	</div>
            	<div class="col-xs-1">
                	<div class="mini-box">
                		<p align="justify"><b>Age</b>
                		</p>
                	</div>
            	</div>
            	<div class="col-xs-2">
                	<div class="mini-box">
                		<p align="justify"><b>Address</b>
                		</p>
                	</div>
            	</div>
            	<div class="col-xs-2">
                	<div class="mini-box">
                		<p align="justify"><b>Contact</b>
                		</p>
                	</div>
            	</div>
            	<div class="col-xs-4">
                	<div class="mini-box">
                		<p align="justify"><b>Occupation</b>
                		</p>
                	</div>
            	</div>
	            <?php $__currentLoopData = $student->parents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parents): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                				<?php if($parents != null): ?>
	                				<?php if($parents->type == 2): ?>
	                					<div class="col-xs-2">
						                	<div class="mini-box">
						                		<p align="justify"><?php echo e(strtoupper($parents->pname)); ?>

						                		</p>
						                	</div>
						            	</div>
						            	<div class="col-xs-1">
						                	<div class="mini-box">
						                		<p align="justify"><?php echo e($parents->age); ?>

						                		</p>
						                	</div>
						            	</div>
						            	<div class="col-xs-2">
						                	<div class="mini-box">
						                		<p align="justify">
						                			<?php $__currentLoopData = $mun; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brgy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<?php if($brgy->id == $parents->address): ?>
															<?php echo e($brgy->name); ?>

														<?php endif; ?>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						                		</p>
						                	</div>
						            	</div>
						            	<div class="col-xs-2">
						                	<div class="mini-box">
						                		<p align="justify"><?php echo e($parents->contact); ?>

						                		</p>
						                	</div>
						            	</div>
						            	<div class="col-xs-5">
						                	<div class="mini-box">
						                		<p align="justify"><?php echo e($parents->occupation); ?>

						                		</p>
						                	</div>
						            	</div>						            
	                				<?php endif; ?>
                				<?php endif; ?>
                			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

        </div>
        <?php $__currentLoopData = $student->parents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parents): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        	<?php if($parents !=null): ?>
        		<?php if($parents->type==3): ?>
        		<div class="row">
			        	<div class="col-md-3">
			           		<p align="justify"><b>
			           			Sibling Name
			           			</b></p>
			           	</div>
			           	<div class="col-md-2">
			           		<p align="justify"><b>
			           			Age
			           			</b></p>
			           	</div>
			           	<div class="col-md-2">
			           		<p align="justify"><b>
			           			Contact Number
			           			</b></p>
			           	</div>
			           	<div class="col-md-3">
			           		<p align="justify"><b>
			           			Occupation
			           			</b></p>
			           	</div>
			        </div>
			        <?php break; ?>
        		<?php endif; ?>
        	<?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php $__currentLoopData = $student->parents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parents): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        	<?php if($parents !=null): ?>
        		<?php if($parents->type==3): ?>
			        <div class="row">
			        	<div class="col-md-3">
			           		<p>
			           			<?php echo e(strtoupper($parents->pname)); ?>

			           			</p>
			           	</div>
			           	<div class="col-md-2">
			           		<p>
			           			<?php echo e($parents->age); ?>

			           			</p>
			           	</div>
			           	<div class="col-md-2">
			           		<p>
			           			<?php echo e($parents->contact); ?>

							   </p>
			           	</div>
			           	<div class="col-md-3">
			           		<p>
			           			<?php echo e($parents->occupation); ?>

			           			</p>
			           	</div>
			        </div>
        		<?php endif; ?>
        	<?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <div class="row">
        	<div class="col-md-4">
           		<h4 align="justify"><b>Educational Background</b></h4>
           	</div>
           </div>

        <div class="row">
         	<div class="col-md-3">
           		<h4>Elementary :</h4>
           	</div>
           			<div class="col-md-4">
           				<h4 align="justify">
	           			<?php $__currentLoopData = $student->schools; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $schools): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	           				<?php if($schools->level == 0): ?>
	           					<b><?php echo e($schools->name); ?></b>
	           				<?php endif; ?>
	           			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           				<h4>
        			</div>
           </div>
           <div class="row">
         	<div class="col-md-3">
           		<h4>High School/Junior High School:</h4>
           	</div>
           			<div class="col-md-4">
           				<h4 align="justify">
	           			<?php $__currentLoopData = $student->schools; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $schools): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	           				<?php if($schools->level == 1): ?>
	           					<b><?php if(is_numeric($schools->name)): ?>
								   		<?php $__currentLoopData = $senior; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sen1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<?php if($sen1->id==$schools->name): ?>
												<?php echo e($sen1->name); ?>

											<?php endif; ?>										   
										 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									<?php else: ?>
										<?php echo e($schools->name); ?>

									<?php endif; ?>
								   </b>
	           				<?php endif; ?>
	           			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           				</h4>
        			</div>
		   </div>
		   
		   <div class="row">
				<div class="col-md-3">
					  <h4>Senior School :</h4>
				  </div>
						  <div class="col-md-4">
							  <h4 align="justify">
							  <?php $__currentLoopData = $student->schools; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $schools): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								  <?php if($schools->level == 2): ?>
									  <b><?php $__currentLoopData = $senior; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sen): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										  <?php if($sen->id==$schools->name): ?>
										  	<?php echo e($sen->name); ?>

										  <?php endif; ?>
										   
										 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										  - <?php echo e($schools->course); ?></b>
								  <?php endif; ?>
							  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							  </h4>
					   </div>
			  </div>

           <div class="row">
         	<div class="col-md-2">
			<?php if($student->scholartype==5): ?>
           		<h4 align="justify">Tertiary :</h4>
			<?php else: ?>
				<h4 align="justify">University :</h4>
			<?php endif; ?>
           	</div>
           		<h4 align="justify">
           			<?php $__currentLoopData = $student->schools; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $schools): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           				<?php if($schools->level == 3): ?>
	           				<div class="col-md-1">
	           					<b><?php echo e(strtoupper($schools->name)); ?></b>
	           				</div>
	           				<div class="col-md-4">		
							<?php if($student->scholartype==5): ?>
								Course: <?php echo e(strtoupper($schools->course)); ?>

							<?php endif; ?>							   
	           				<?php if($student->scholartype==1 || $student->scholartype==6 || $student->scholartype==7): ?>
	           						<?php $__currentLoopData = $courseacad; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $courses): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	           							<?php if($courses->id == $schools->course): ?>
	           								Course: <?php echo e(strtoupper($courses->abvr)); ?>

	           							<?php endif; ?>
	           						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	           				<?php elseif($student->scholartype==3): ?>	           					
										<?php $__currentLoopData = $courseTV; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $courses): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<?php if($courses->id == $schools->course): ?>
											Course: <?php echo e(strtoupper($courses->name)); ?>

										<?php endif; ?>	
						   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>								
	           				<?php endif; ?>
	           				</div>
	           				<?php if($schools->name=='mmsu' || $schools->name=='MMSU'): ?>
	           				<div class="col-md-2">
	           					<b>College: <?php echo e(strtoupper($schools->college)); ?></b>
	           				</div>
	           				<?php endif; ?>
           				<?php endif; ?>
           			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           		</h4>
		   </div>  		   
		   <div class="row">
				<div class="col-md-2">
				<h4 align="justify"><b>Requirements</b></h4>
				</div>
				<div class="col-md-10">
					<table>
						<tr>
							<?php if($student->apletter==1): ?>
							<span class="glyphicon glyphicon-ok text-primary"></span><font color="blue"><b> Application Letter  </b></font>
							<?php else: ?>
							<span class="glyphicon glyphicon-remove text-danger"></span><font color="red"><b> Application Letter  </b></font>
							<?php endif; ?>
							
						</tr>
						<tr>
								<?php if($student->apgrades==1): ?>
								<span class="glyphicon glyphicon-ok text-primary"></span><font color="blue"><b> Form 138/Grades </b></font>
								<?php else: ?>
								<span class="glyphicon glyphicon-remove text-danger"><font color="red"><b> Form 138/Grades </b></font>
								<?php endif; ?>
						</tr>
						<tr>
								<?php if($student->goodmoral==1): ?>
								<span class="glyphicon glyphicon-ok text-primary"></span><font color="blue"><b>Good Moral </b></font>
								<?php else: ?>
								<span class="glyphicon glyphicon-remove text-danger"><font color="red"><b>Good Moral </b></font>
								<?php endif; ?>
						</tr>
						<tr>
								<?php if($student->bcert==1): ?>
								<span class="glyphicon glyphicon-ok text-primary"></span><font color="blue"><b>NSO/PSA </b></font>
								<?php else: ?>
								<span class="glyphicon glyphicon-remove text-danger"><font color="red"><b>NSO/PSA </b></font>
								<?php endif; ?>
						</tr>
						<tr>
								<?php if($student->bclear==1): ?>
								<span class="glyphicon glyphicon-ok text-primary"></span><font color="blue"><b>Barangay Clearance </b></font>
								<?php else: ?>
								<span class="glyphicon glyphicon-remove text-danger"><font color="red"><b>Barangay Clearance </b></font>
								<?php endif; ?>
						</tr>
						<tr>
								<?php if($student->incert==1): ?>
								<span class="glyphicon glyphicon-ok text-primary"></span><font color="blue"><b>Indigency </b></font>
								<?php else: ?>
								<span class="glyphicon glyphicon-remove text-danger"><font color="red"><b>Indigency </b></font>
								<?php endif; ?>
						</tr>
					</table>
				</div>
				
		   </div>

           <div class="row">
        	<div class="col-md-4">
           		<h4 align="justify"><b>Schoolarship Records:</b></h4>
           	</div>
           </div>
		   <?php $__currentLoopData = $student->records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $records): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		   
				<?php switch($records->scholartype):
				case (1): ?>
					<font color="Blue">
					<?php break; ?>
				<?php case (2): ?>
					<font color="#013220">
					<?php break; ?>
				<?php case (3): ?>
					<font color="Red">
					<?php break; ?>
				<?php case (4): ?>
					<font color="Orange">
					<?php break; ?>	
				<?php case (5): ?>
					<font color="Purple">
					<?php break; ?>
				<?php case (6): ?>
					<font color="Magenta">
					<?php break; ?>
				<?php case (7): ?>
					<font color="#013220">
					<?php break; ?>			
				<?php endswitch; ?>
	           <div class="row">				   
	        	<div class="col-md-4">
							<?php if($records->statactive==1): ?>
							<span class="glyphicon glyphicon-ok text-primary"></span>
							<?php else: ?>
							<span class="glyphicon glyphicon-ok text-danger"></span>
							<?php endif; ?>
							<?php switch($records->scholartype):
							case (1): ?>
								(Acad) 
								<?php break; ?>
							<?php case (2): ?>
								(CAAP) 
								<?php break; ?>
							<?php case (3): ?>
								(TV) 
								<?php break; ?>
							<?php case (4): ?>
								(SHS) 
								<?php break; ?>
							<?php case (5): ?>
								(DoM) 
								<?php break; ?>	
							<?php case (6): ?>
								(Arts) 
								<?php break; ?>	
							<?php case (7): ?>
								(Agri) 
								<?php break; ?>					
							<?php endswitch; ?>

	           				Schoolyear : <b><?php echo e($records->schoolyear->from); ?>-<?php echo e($records->schoolyear->to); ?> - 
	           				<?php switch($records->sem):
							    case (1): ?>
							        1st sem
							        <?php break; ?>
							    <?php case (2): ?>
							        2nd sem
							        <?php break; ?>							 
							<?php endswitch; ?>
						</b>
	           	</div>
	           	<div class="col-md-1">
				   <?php if($records->scholartype==1 || $records->scholartype==3 || $records->scholartype==6 || $records->scholartype==5): ?>
				   	   
				   <?php switch($records->yearlvl):
									case (1): ?>
										I
										<?php break; ?>
									<?php case (2): ?>
										II
										<?php break; ?>
									<?php case (3): ?>
										III
										<?php break; ?>
									<?php case (4): ?>
										IV
										<?php break; ?>
									<?php case (5): ?>
										V
										<?php break; ?>
								<?php endswitch; ?>
					<?php elseif($records->scholartype==3): ?>
					<?php switch($records->yearlvl):
									case (1): ?>
									Year :	I
										<?php break; ?>
									<?php case (2): ?>
									Year :	II
										<?php break; ?>
									<?php case (3): ?>
									Year :	III
										<?php break; ?>
									<?php case (4): ?>
									Year :	IV
										<?php break; ?>
									<?php case (7): ?>
									Grade: 7
										<?php break; ?>
									<?php case (8): ?>
										Grade: 8
										<?php break; ?>
									<?php case (9): ?>
										Grade: 9
										<?php break; ?>
									<?php case (10): ?>
										Grade: 10
										<?php break; ?>
									<?php case (11): ?>
										Grade: 11
										<?php break; ?>
									<?php case (12): ?>
										Grade: 12
										<?php break; ?>
								<?php endswitch; ?>
				    <?php else: ?>
					Grade:<?php echo e($records->grade_lvl); ?>

				   <?php endif; ?>
					   													
	           		
	           	</div>
	           	<div class="col-md-2">
	           				GWA : <?php echo e($records->GWA); ?>

	           	</div>
	           	<div class="col-md-2">
	           				CS : <?php echo e($records->comserve); ?> Hours
	           	</div>
	           	<div class="col-md-1" align="left">
	           		<a class="btn btn-info" href="/record/<?php echo e($records->id); ?>/edit" role="button">Update</a>
				   </div>
				<div class="col-md-1" align="left">
						<form class="delete" action="<?php echo e(route('record.destroy', $records->id)); ?>" method="POST">
								<input type="hidden" name="_method" value="DELETE">
								<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
								<input type="submit" value="Delete" class="btn btn-danger">
							</form>
							
					</div>
			   </div>
		   </font>
		   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		   <script>
				$(".delete").on("submit", function(){
					return confirm("Do you want to delete this item?");
				});
			</script>
           <div class="row">
        	<div class="col-md-3" align="right">
           		<a class="btn btn-success" href="/student/<?php echo e($student->id); ?>/edit" role="button">Update Basic Information</a>
           	</div>
           	<div class="col-md-1" align="center">
           		<a class="btn btn-primary" href="/record/create/<?php echo e($student->id); ?>" role="button">Renew</a>
			   </div>
			<?php if($student->scholartype=='1' || $student->scholartype=='4' || $student->scholartype=='6' || $student->scholartype=='7'): ?>
			<div class="col-md-1" align="center">
				<a class="btn btn-info" href="/ratings/<?php echo e($student->id); ?>" role="button">Rating</a>
			</div>
			<div class="col-md-2" align="center">
				<a class="btn btn-info" href="/cratings/<?php echo e($student->id); ?>" role="button">Special Rating</a>
			</div>
			<?php endif; ?>			
			<div class="col-md-1" align="center">
					<a class="btn btn-warning" href="/remark/<?php echo e($student->id); ?>" role="button">Remarks</a>
				</div>	
           	<div class="col-md-2" align="left">
           		<a class="btn btn-danger" href="<?php echo e(action('RecordController@downloadPDF', ['id' => $student->id])); ?>

           			" role="button">Download</a>
           	</div>
           </div>

    </div>
	</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>