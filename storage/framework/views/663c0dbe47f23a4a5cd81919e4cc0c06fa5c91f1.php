<?php $__env->startSection('head'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<div class="container">
        <div class="row">
            <div class="col-md-10" align="center"> 
                    <p><h4><b>ADD SCHOOL RECORDS INFO FOR<br> <font color="blue"><h3><?php echo e(strtoupper($sc->sc_name)); ?></h3></font></b> 					
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
            <br><br>
        </div>
            <form class="form" action="/addrecsgo" method="POST">  
                <input type="hidden" value="<?php echo e($sc->sc_id); ?>" name="scid" id="scid" />  
                <input type="hidden" value="<?php echo e($sc->sc_type); ?>" name="type" id="type" />  
                <?php echo e(csrf_field()); ?>

                <div class="row">
                        <div class="col-md-3">
                                        <div class="input-group">
                                        <span class="input-group-addon"><b>School Year</b></span>
                                        <select id="sy" name="sy" class="form-control">                        
                                                        <?php $__currentLoopData = $sy; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($sy->id); ?>"><?php echo e($sy->from); ?>-<?php echo e($sy->to); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                        </div>
                        </div>
                </div>
                <br><br>
                <table class="table table-bordered" >
                                <thead >
                                <?php if($sc->sc_type==1): ?>
                                  <tr>
                                    <th>Kinder</th>                                                   
                                    <th>Grade 1</th>  
                                    <th>Grade 2</th> 
                                    <th>Grade 3</th> 
                                    <th>Grade 4</th> 
                                    <th>Grade 5</th> 
                                    <th>Grade 6</th>                  
                                  </tr>
                                <?php else: ?>
                                  <tr>      
                                    <th>Grade 7</th> 
                                    <th>Grade 8</th> 
                                    <th>Grade 9</th> 
                                    <th>Grade 10</th> 
                                    <th>Grade 11</th>      
                                    <th>Grade 12</th>             
                                  </tr>
                                <?php endif; ?>
                                </thead>
                                <tbody>
                                <?php if($sc->sc_type==1): ?>
                                  <tr>
                                    <td><input type="text" id="kin" name="kin" class="form-control mx-sm-1" value=""></td>     
                                    <td><input type="text" id="g1" name="g1" class="form-control mx-sm-1" value=""></td>   
                                    <td><input type="text" id="g2" name="g2" class="form-control mx-sm-1" value=""></td>   
                                    <td><input type="text" id="g3" name="g3" class="form-control mx-sm-1" value=""></td>   
                                    <td><input type="text" id="g4" name="g4" class="form-control mx-sm-1" value=""></td>   
                                    <td><input type="text" id="g5" name="g5" class="form-control mx-sm-1" value=""></td>   
                                    <td><input type="text" id="g6" name="g6" class="form-control mx-sm-1" value=""></td>             
                                  </tr>
                                <?php else: ?>
                                  <tr>      
                                    <td><input type="text" id="g1" name="g1" class="form-control mx-sm-1" value=""></td>   
                                    <td><input type="text" id="g2" name="g2" class="form-control mx-sm-1" value=""></td>   
                                    <td><input type="text" id="g3" name="g3" class="form-control mx-sm-1" value=""></td>   
                                    <td><input type="text" id="g4" name="g4" class="form-control mx-sm-1" value=""></td>   
                                    <td><input type="text" id="g5" name="g5" class="form-control mx-sm-1" value=""></td>   
                                    <td><input type="text" id="g6" name="g6" class="form-control mx-sm-1" value=""></td>              
                                  </tr>
                                <?php endif; ?>
                                </tbody>
                </table>
                        
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