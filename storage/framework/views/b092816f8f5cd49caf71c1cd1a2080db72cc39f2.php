<?php $__env->startSection('head'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<div class="container">
        <br><br>
        <div class="row" align="center">
            <div class="col-md-10">
            <h2><b><?php echo e($msg); ?></b></h2>
            </div>
        </div>
        <br><br>
        <div class="row">
            <b>
            <div class="col-sm-1">
                No.
            </div>
            <div class="col-md-3">
                Course Name
            </div>
            <div class="col-md-3">
                    Course Abreviation
            </div>
            <div class="col-md-2">
                    Functions
            </div>
            </b>
        </div>
                    <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $courses): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="row">
                            <div class="col-sm-1">
                                    <b><?php echo e($i++); ?>.</b>
                            </div>
                            <div class="col-md-3">
                                    <p><?php echo e($courses->name); ?></p>
                            </div>
                            <div class="col-md-3">
                                    <?php echo e($courses->abvr); ?>

                            </div>
                            <div class="col-md-5">
                                <div class="row">
                                    <div class="col-md-2" align="left">
                                            <a class="btn btn-info" href="/admins/<?php echo e($courses->id); ?>/<?php echo e($type); ?>/edit" role="button">Update</a>
                                        </div>
                                     <div class="col-md-2" align="left">
                                             <form class="delete" action="<?php echo e(route('admins.destroy', $courses->id)); ?>" method="POST">
                                                     <input type="hidden" name="_method" value="DELETE">
                                                     <input type="hidden" name="type" value="<?php echo e($type); ?>">
                                                     <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                                                     <input type="submit" value="Delete" class="btn btn-danger">
                                                 </form>
                                                 
                                         </div>
                                </div>
                            </div>
                        </div>          
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <script>
                            $(".delete").on("submit", function(){
                                return confirm("Do you want to delete this item?");
                            });
                        </script>

    </div>
	

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>