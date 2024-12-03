<?php $__env->startSection('head'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<div class="container">
        <div class="row">
            <div class="col-md-10" align="center"> 
                    <p><h4><b>ADD DOCUMENTS</b></h4></p>
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
            <form class="form" action="/documents" method="POST" enctype="multipart/form-data">                
                <?php echo e(csrf_field()); ?>

                <div class="row">
                    <div class="form-group">
                            <div class="col-md-8">
                            <div class="input-group-inline">
                                    <label for="sname">Document Name</label>               
                                    <input id="sname" type="text" class="form-control" name="sname" placeholder="School Name ...." size="50">
                                  </div>
                            </div>
                            <div class="col-md-2">
                                <label for="dty">Document Type</label>
                                <select id="dty" name="dty" class="form-control" >
                                            <option value="">-------</option>  
                                            <option value="0">Incomming</option>    
                                            <option value="1">Outgoing</option>                              
                                        </select>
                            </div>
                    </div>
                </div>
                <div class="row">
                <br>
                <div class="form-group">
                            <div class="col-md-10">
                            <div class="input-group-inline">
                                    <label for="docdet">Document Details</label>               
                                    <textarea id="docdet"  class="form-control" name="docdet"  rows="4" placeholder="Details..."></textarea>
                                  </div>
                            </div>
                    </div>
                
                </div>
                <br><br>
                <div class="row">
                    <div class="form-group">
                            <div class="col-md-2">
                            <div class="input-group-inline">
                                    <label for="dept">Department</label>               
                                    <input id="dept" type="text" class="form-control" name="dept" placeholder="Department.." size="50">
                                  </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group-inline">
                                <span class="btn btn-default btn-file">
                                   Browe <input  type="file" id="profileImage" name="profileImage[]" class="form-control" multiple="">
                                    </span>
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="dr1">Date Received</label>
                                <input class="datepicker1 form-control" type="date" id="dr1" name="dr1">  
                                </div>
                                <div class="form-group col-md-2">
                                <label for="dr2">Date Released</label>
                                <input class="datepicker1 form-control" type="date" id="dr2" name="dr2">  
                                </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-10" align="center">
                            <a href="/remark/" class="btn btn-danger" role="button">Back</a>
                            <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
              </form>
        </div>
	

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>