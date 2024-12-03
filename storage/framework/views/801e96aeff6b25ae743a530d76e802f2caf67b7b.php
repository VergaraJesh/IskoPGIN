<?php $__env->startSection('head'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<div class="container">
        <div class="row">
            <div class="col-md-10" align="center"> 
                    <p><h4><b>EDIT SCHOOL INFO</b> 
						
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
        <form id="regForm" method="POST" action="<?php echo e(route('screcord.update',[$sc->id])); ?>" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

                        <input type="hidden" name="_method" value="put">
                <div class="row">
                            <div class="col-md-3">
                                    <div class="form-group">
                                            <div class="input-group">
                                                    <span class="input-group-addon"><b>School ID</b></span>
                                                    <input type="text" id="scid" name="scid" class="form-control mx-sm-1" value="">
                                                </div>
                                        </div>
                            </div>
                            <div class="col-md-4">
                                    <div class="form-group">
                                            <div class="input-group">
                                                    <span class="input-group-addon"><b>School Name</b></span>
                                                    <input type="text" id="scname" name="scname" class="form-control mx-sm-1" value="">
                                                </div>
                                        </div>
                            </div>
                            <div class="form-group col-md-3">
                                    <div class="form-group">
                                        <div class="input-group">
                                        <span class="input-group-addon"><b>District</b></span>
                                        <select id="dis" name="dis" class="form-control">
                                        <option value="">------</option>
                                        <option value="Bacarra">Bacarra</option>
                                        <option value="Badoc">Badoc</option>
                                        <option value="Bangui">Bangui</option>
                                        <option value="Banna (Espiritu)">Banna</option>
                                        <option value="Batac">Batac</option>
                                        <option value="Burgos">Burgos</option>
                                        <option value="Currimao">Currimao</option>
                                        <option value="Dingras">Dingras</option>                                       
                                        <option value="Dumalneg">Dumalneg</option>
                                        <option value="Laoag">Laoag</option>
                                        <option value="Marcos">Marcos</option>
                                        <option value="Nueva Era">Nueva Era</option>
                                        <option value="Pagudpud">Pagudpud</option>
                                        <option value="Paoay">Paoay</option>
                                        <option value="Pasuquin">Pasuquin</option>
                                        <option value="Piddig">Piddig</option>
                                        <option value="Pinili">Pinili</option>
                                        <option value="San Nicolas">San Nicolas</option>
                                        <option value="Sarrat">Sarrat</option>
                                        <option value="Solsona">Solsona</option>
                                        <option value="Vintar">Vintar</option>
                                        </select>
                                    </div>
                                </div>
                </div>
                        <div class="form-group col-md-2">
                                <div class="form-group">
                                    <div class="input-group">
                                    <span class="input-group-addon"><b>Type</b></span>
                                    <select id="type" name="type" class="form-control">
                                    <option value="">------</option>
                                    <option value="1">Elem</option>
                                    <option value="2">HS</option>
                                    </select>
                                </div>
                            </div>
                </div>
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