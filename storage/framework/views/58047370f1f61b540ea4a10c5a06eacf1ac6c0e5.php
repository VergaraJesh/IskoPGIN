<?php $__env->startSection('head'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="container">
        <div class="row" >
            <div class="col-md-10" align="center">
            <h3>Requirements</h3>
            </div>
        </div>
        <form>
        <div class="row">
               
                <h5><b>Application Letter</b>
               <label class="radio-inline">
                  
                </label> <input type="radio" id="al" name="al" value="0" checked="true">
                <b>No</b>
               <label class="radio-inline">
                </label>
                <input type="radio" id="al" name="al" value="1" >
                  <b>Yes</b>
                </h5>
              </div>
        </div>
        </form>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>