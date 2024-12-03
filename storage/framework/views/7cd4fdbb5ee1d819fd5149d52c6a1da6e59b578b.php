<?php $__env->startSection('head'); ?>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<h2>Display Interview and Exam Result</h2>
<form method="post" action="<?php echo e(route('student.eiresult')); ?>" target="_blank">
    <div class="row">
            <div class="col-md-1">
                </div>
            <div class="col-md-10" align="center">
                    <h4 align="center">SCHOLARSHIP TYPE</h4>
                    <h5>
                   <label class="radio-inline"> 
                      <input type="radio" id="scholarship" name="scholarship" value="1" checked="true" onclick="Acad()">
                      <b>ACADEMIC</b>
                    </label>
                    <label class="radio-inline">
                            <input type="radio" id="scholarship" name="scholarship" value="4" onclick="TechVoc()">
                            <b>Senior High</b>
                          </label>
                          <label class="radio-inline">
                          <input type="radio" id="scholarship" name="scholarship" value="5">
                          <b>Doctor of Medicine</b>
                        </label>
                        <label class="radio-inline">
                          <input type="radio" id="scholarship" name="scholarship" value="6">
                          <b>Arts</b>
                        </label>
                        <label class="radio-inline">
                          <input type="radio" id="scholarship" name="scholarship" value="7">
                          <b>Agriculture</b>
                        </label>
                    </h5>
                  </div>
    </div>
     <div class="row">
        <div class="col-md-1">
        </div>
       
          <div class="form-group col-md-2">
              <?php echo e(csrf_field()); ?>

            <label for="sy">School Year</label>
             <select id="sy" name="sy" class="form-control">
                        <option value="">- Select-SY -</option>
                        <?php $__currentLoopData = $sy; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($sy->id); ?>"><?php echo e($sy->from); ?>-<?php echo e($sy->to); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
          </div>
          <div class="col-md-1">
          </div>
          <div class="form-group col-md-2">
           <div class="form-group">
            <label for="sem">Semester</label>
            <select id="sem" name="sem" class="form-control">
              <option value="">-- Select Sem --</option> 
              <option value="1">1st</option>
              <option value="2">2nd</option>
            </select>
          </div>
          </div>
          
          <div class="form-group col-md-2">
            <div class="form-group">
             <label for="rep">Report</label>
             <select id="rep" name="rep" class="form-control">
               <option value="">-- Select Report --</option> 
               <option value="0">Exam List</option>
               <option value="1">Final List</option>
               <option value="2">Examinee Info</option>
               <option value="4">Special Exam List</option>
             </select>
           </div>
           </div>

           <div class="form-group col-md-2">
            <div class="form-group">
             <label for="rep1">Sort By</label>
             <select id="rep1" name="rep1" class="form-control">
               <option value="">-- Select Report --</option> 
               <option value="0">Alphabetical</option>
               <option value="1">School</option>
             </select>
           </div>    
           </div>
           <div class="form-group col-md-2">
            <div class="form-group">
             <label for="rep11">Type</label>
             <select id="rep11" name="rep11" class="form-control">
               <option value="">-- Pick --</option> 
               <option value="0">Secondary</option>
               <option value="1">Tertiary</option>
             </select>
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