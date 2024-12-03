<?php $__env->startSection('head'); ?>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<h2>Search School Info</h2>
<form method="post" action="<?php echo e(route('student.screcordresult')); ?>" target="_blank">
      <br><br>
      
     <div class="row">
        <div class="col-md-1">
        </div>
        <div class="form-group col-md-2">
                <div class="form-group">
                        <?php echo e(csrf_field()); ?>

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
        <div class="form-group col-md-4">
                  <div class="form-group">
                      <div class="input-group">
                      <span class="input-group-addon"><b>District</b></span>
                      <select id="sy" name="sy" class="form-control">
                          <option value="">- All District -</option>
                          <?php $__currentLoopData = $sy; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option value="<?php echo e($sy->district); ?>"><?php echo e($sy->district); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                  </div>
              </div>
      </div>
        </div>

        <div class="row">
            <div class="col-md-8" align="center">
              <button type="submit" class="btn btn-primary btn-md">Submit</button>
            </div> 
        </div>
</form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>