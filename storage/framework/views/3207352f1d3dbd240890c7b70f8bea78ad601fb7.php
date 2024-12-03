<?php $__env->startSection('head'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<div class="container">
        <div class="row">
            <div class="col-md-10" align="center"> 
                    <p><h4><b>ADD SCHOOL CONTACT INFO</b> 						
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
            <form class="form" action="/addconsgo" method="POST">  
                <input type="hidden" value="<?php echo e($sc->sc_id); ?>" name="scid" id="scid" />    
                <input type="hidden" value="<?php echo e($sc->sc_name); ?>" name="scname" id="scname" />      
                <input type="hidden" value="<?php echo e($sc->district); ?>" name="dis" id="dis" />      
                <input type="hidden" value="<?php echo e($sc->sc_type); ?>" name="type" id="type" />    
                <?php echo e(csrf_field()); ?>

                <div class="row">
                        <div class="col-md-4">
                                <div class="form-group">
                                        <div class="input-group">
                                                <span class="input-group-addon"><b>School Head</b></span>
                                                <input type="text" id="schead" name="schead" class="form-control mx-sm-1" value="">
                                            </div>
                                    </div>
                        </div>
                        <div class="col-md-4">
                                <div class="form-group">
                                        <div class="input-group">
                                                <span class="input-group-addon"><b>School Contact</b></span>
                                                <input type="text" id="sccon" name="sccon" class="form-control mx-sm-1" value="">
                                            </div>
                                    </div>
                        </div>
                        <div class="col-md-4">
                                <div class="form-group">
                                        <div class="input-group">
                                                <span class="input-group-addon"><b>School Email</b></span>
                                                <input type="email" id="sce" name="sce" class="form-control mx-sm-1" value="">
                                            </div>
                                    </div>
                        </div>
                </div>
                <div class="row">
                        <div class="col-md-3" align="center">
                                        <div class="form-group">
                                                        <div class="form-group">
                                                                        <div class="input-group">
                                                                        <span class="input-group-addon"><b>Official</b></span>
                                                                        <select id="otype" name="otype" class="form-control">
                                                                        <option value="">------</option>
                                                                        <option value="1">Head</option>
                                                                        <option value="2">Staff</option>
                                                                        </select>
                                                                    </div>
                                                    </div>
                        </div>
                </div>        
                        
                <div class="row">
                    <div class="col-md-10" align="center">
                            <a href="/screcord/" class="btn btn-danger" role="button">Back</a>
                            <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
              </form>
        </div>
	

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>