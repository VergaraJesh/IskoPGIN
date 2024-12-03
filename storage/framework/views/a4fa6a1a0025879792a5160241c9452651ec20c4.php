<?php $__env->startSection('head'); ?>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tagmanager/3.0.2/tagmanager.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/tagmanager/3.0.2/tagmanager.min.css">
<style type="text/css">
	.btn-file {
    position: relative;
    overflow: hidden;
}
.btn-file input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    min-width: 100%;
    min-height: 100%;
    font-size: 100px;
    text-align: right;
    filter: alpha(opacity=0);
    opacity: 0;
    outline: none;
    background: white;
    cursor: inherit;
    display: block;
}


</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">

				<h3>Student Profile</h3>
	<form id="regForm" method="POST" action="<?php echo e(route('student.update',[$student->id])); ?>" enctype="multipart/form-data">
		<?php echo e(csrf_field()); ?>

		<input type="hidden" name="_method" value="put">

		<div class="row" align="justify">
			<div class="form-group col-md-3">

				 <img id='img-upload' width="200px" length="200px" />
			        <label>Upload Image</label>
			        <div class="input-group">
			            <span class="input-group-btn">
			                <span class="btn btn-default btn-file">
			                    Browse… <input type="file" name="pic1" id="pic1">
			                </span>
			            </span>
			            <input type="text" class="form-control" readonly>
			        </div>
			 
			</div>
			       
			    </div>

		</div>
		<script type="text/javascript">
			
			$(document).ready( function() {
    	$(document).on('change', '.btn-file :file', function() {
		var input = $(this),
			label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
		input.trigger('fileselect', [label]);
		});

		$('.btn-file :file').on('fileselect', function(event, label) {
		    
		    var input = $(this).parents('.input-group').find(':text'),
		        log = label;
		    
		    if( input.length ) {
		        input.val(log);
		    } else {
		        if( log ) alert(log);
		    }
	    
		});
		function readURL(input) {
		    if (input.files && input.files[0]) {
		        var reader = new FileReader();
		        
		        reader.onload = function (e) {
		            $('#img-upload').attr('src', e.target.result);
		        }
		        
		        reader.readAsDataURL(input.files[0]);
		    }
		}

		$("#pic1").change(function(){
		    readURL(this);
		}); 	
	});
		</script>
        <div class="row">
                <div class="col-md-10" align="center">
                        <h4 align="center">SCHOLARSHIP TYPE</h4>
                        <h5>
                       <label class="radio-inline">
                          <input type="radio" id="scholarship" name="scholarship" value="1">
                          <b>ACADEMIC</b>
                        </label>
                            
                       <label class="radio-inline">
                          <input type="radio" id="scholarship" name="scholarship" value="2" >
                          <b>CAAP</b>
                        </label>
                        
                        <label class="radio-inline">
                          <input type="radio" id="scholarship" name="scholarship" value="3">
                          <b>TECH. VOC</b>
                        </label>
                        <label class="radio-inline">
                            <input type="radio" id="scholarship" name="scholarship" value="4">
                            <b>SENIOR HIGH</b>
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
                          <label class="radio-inline">
                            <input type="radio" id="scholarship" name="scholarship" value="8">
                            <b>LAW</b>
                          </label>
                        </h5>
                      </div>
        </div>
		<div class="row">
		<div class="form-group col-md-3">
           <label for="fname">First Name</label>
           <input id="fname" name="fname" class="form-control mx-sm-3 " placeholder="<?php echo e($student->fname); ?>" >
          </div>
        <div class="form-group col-md-1">
           <label for="mi">M.I.</label>
           <input id="mi" name="mi" class="form-control mx-sm-1" placeholder="<?php echo e($student->mname); ?>">
          </div> 
          <div class="form-group col-md-3">
            <label for="lname">Last Name</label>
            <input  class="form-control" id="lname" name="lname" placeholder="<?php echo e($student->lname); ?>">
          </div>
          <div class="form-group col-md-1">
                <label for="suf">Suffix</label>
                <input  class="form-control" id="suf" name="suf" placeholder="JR">
              </div>
          <div class="form-group col-md-2">
	           <label for="sex">Gender</label>
	            <select class="form-control" id="sex" name="sex" class="form-control mx-sm-2" style="width: 100px">
	              <option value="<?php echo e($student->gender); ?>">-<?php echo e($student->gender); ?>-</option>
	              <option value="Male">Male</option>
	              <option value="Female">Female</option>
	            </select>
	          </div>  
      </div>

          <div class="row">
	          <div class="form-group col-md-2">
	          <label for="dob">DOB</label>
	          <input class="datepicker1 form-control" type="date" id="dob" name="dob" value="<?php echo e($student->dob); ?>">  
	          </div>
        <div class="form-group col-md-4">
           <label for="contact">Contact Number</label>
           <input id="contact" name="contact" class="form-control mx-sm-3" placeholder="<?php echo e($student->contact); ?>" min="0" max="13">
          </div>
        <div class="form-group col-md-4">
           <label for="contact1">Alternate Contact</label>
           <input id="contact1" name="contact1" class="form-control mx-sm-3" placeholder="<?php echo e($student->contact1); ?>" min="0" max="13">
          </div>
      		</div>

          <div class="row">

               <div class="form-group col-md-11">
                    <label for="skills1">Special Skills/Hobbies :</label>
                    <input type="skills1" name="skills1" placeholder="Skills" class="tm-input form-control tm-input-info">
                   </div>
                   
          </div>
        <div class="row">
            <div class="form-group col-md-4">
               <label for="email">Primary Email</label>
               <input type="email" id="email" name="email" class="form-control mx-sm-3" placeholder="<?php echo e($student->email); ?>">
              </div> 
              <div class="form-group col-md-4">
               <label for="email">Alternate Email</label>
               <input type="email" id="email1" name="email1" class="form-control mx-sm-3" placeholder="<?php echo e($student->email1); ?>">
              </div> 
              <div class="form-group col-md-2">
                <label for="sex">Others</label>
                 <select class="form-control" id="ip" name="ip" class="form-control mx-sm-2" style="width: 100px">
                    <option value="">-Select-</option>
                    <option value="0">No</option>
                   <option value="1">IP</option>
                   <option value="2">4Ps</option>
                   <option value="3">IP + 4Ps</option>
                   <option value="4">Sibling Scholar</option>
                   <option value="6">LGU Scholarship</option>
                   <option value="5">Other Scholarship</option>
                   <option value="7">LGU Scholarship + 4PS</option>
                   <option value="8">CHED</option>
                   <option value="9">TES</option>
                   <option value="10">CHED & TES</option>
                 </select>
               </div>  
          </div>
      	<div class="row">
	      <div class="form-group col-md-2">
	         <label for="state">Permanent Town</label>
	         <select id="state" name="state" class="form-control">
	                    <option value="">- Select Town -</option>
	                    <?php $__currentLoopData = $town1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                        <option value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
	                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	                </select>
        </div> 
        <div class="form-group col-md-3">
         <label for="city">Permanent Barrangay</label>
          <select id="city" name="city" class="form-control" >
            <option value="">- Select Town First -</option>
          </select>
        </div>   

        <script type="text/javascript">
          $(document).ready(function() {
              $('select[name="state"]').on('change', function() {
                  var stateID = $(this).val();
                  if(stateID) {
                      $.ajax({
                          url: '/student/ajax/'+stateID,
                          type: "GET",
                          dataType: "json",
                          success:function(data) {
                              $('select[name="city"]').empty();
                              $.each(data, function(key, value) {
                                  $('select[name="city"]').append('<option value="'+ key +'">'+ value +'</option>');
                              });
                          }
                      });
                  }else{
                      $('select[name="city"]').empty();
                  }
              });
          });
      </script>


       <div class="form-group col-md-2">
         <label for="state1">Boarding Town</label>
         <select id="state1" name="state1" class="form-control">
                    <option value="">- Select Town -</option>
                    <?php $__currentLoopData = $town2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
        </div> 
        <div class="form-group col-md-3">
         <label for="city1">Boarding Barrangay</label>
          <select id="city1" name="city1" class="form-control">
          	<option value="">- Select Town First -</option>
          </select>
        </div>   

          <script type="text/javascript">
            $(document).ready(function() {
                $('select[name="state1"]').on('change', function() {
                    var stateID = $(this).val();
                    if(stateID) {
                        $.ajax({
                            url: '/student/ajax/'+stateID,
                            type: "GET",
                            dataType: "json",
                            success:function(data) {
                                $('select[name="city1"]').empty();
                                $.each(data, function(key, value) {
                                    $('select[name="city1"]').append('<option value="'+ key +'">'+ value +'</option>');
                                });
                            }
                        });
                    }else{
                        $('select[name="city"]').empty();
                    }
                });
            });
        </script>

              </div>
          <div class="row">
                <div class="form-group col-md-4">
                        <label for="elem">Elementary School</label>
                        <input id="elem" name="elem" class="form-control mx-sm-3" placeholder="Name of School..">
                       </div>
                     <div class="form-group col-md-1">
                       </div>
                       <div class="form-group col-md-4">
                         <label for="elemgrad">Year Graduated in Elementary</label>
                         <input  class="form-control" id="elemgrad" name="elemgrad" placeholder="Year Graduated">
                       </div>
          </div>
          <div class="row">
                <div class="form-group col-md-4">
                        <label for="fname">High/Junior High School</label>
                        <select id="hs" name="hs" class="form-control">
                            <option value="">-Select-</option>
                            <?php $__currentLoopData = $shscl; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shs1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($shs1->id); ?>"><?php echo e($shs1->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                       </div>
                     <div class="form-group col-md-1">
                       </div>
                       <div class="form-group col-md-4">
                         <label for="hsgrad">Year Graduated in High/Junior High School</label>
                         <input  class="form-control" id="hsgrad" name="hsgrad" placeholder="Year Graduated">
                       </div>
            </div>
          <div class="row">
                <div class="form-group col-md-4">
                        <label for="fname">Senior High School</label>
                        <select id="sh" name="sh" class="form-control">
                            <option value="">-Select-</option>
                            <?php $__currentLoopData = $shscl; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($shs->id); ?>"><?php echo e($shs->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                       </div>
                     <div class="form-group col-md-3">
                         <label for="fname">Track</label>
                         <select id="track" name="track" class="form-control">
                             <option value="">-- Select Track --</option> 
                             <option value="GAS">General Academic Strand</option>
                             <option value="HUMMS">Humanities and Social Sciences Strand</option>
                             <option value="STEM">Science, Technology, Engineering and Mathematics Strand</option>
                             <option value="ABM">Accountancy, Business and Management Strand</option>
                             <option value="TVL">Technical-Vocational-Livelihood</option>     
                             <option value="AD">Arts and Design</option>        
                           </select>
                       </div>
                       <div class="form-group col-md-4">
                         <label for="shgrad">Year Graduated in Senior High School</label>
                         <input  class="form-control" id="shgrad" name="shgrad" placeholder="Year Graduated">
                       </div>
                </div>
          <div class="row">
          <?php if($student->scholartype == 1 || $student->scholartype == 6 || $student->scholartype == 7): ?>
          <div class="form-group col-md-3">
           <div class="form-group">
            <label for="acadcoll">University(ACADEMIC)</label>
            <select id="acadcoll" name="acadcoll" class="form-control">
                <option value="">-- Select School --</option> 
              <option value="MMSU">Mariano Marcos State University</option>
              <option value="NWU">Northwestern University</option>
              <option value="DCCP">Data Center College of the Philippines</option>
              <option value="NCC">Northern Christian College</option>     
              <option value="UNP">University of Northern Philippines</option>     
              <option value="DATA">DATA Center</option>     
            </select>
          </div>
          </div>
          <?php endif; ?>
          <?php if($student->scholartype == 5): ?>
          <div class="form-group col-md-3">
           <div class="form-group">
           <label for="coursedom">Tertiary(DoM)</label>
            <input id="coursedom" name="coursedom" class="form-control mx-sm-3" placeholder="Course in Tertiary..">
          </div>
          </div>
          <?php endif; ?>
          <?php if($student->scholartype == 3): ?>
          <div class="form-group col-md-3">
           <div class="form-group">
            <label for="tvcoll">University(TECHVOC)</label>
            <select id="tvcoll" name="tvcoll" class="form-control">
              <option value="0">-- Select School --</option> 
              <option value="DWCL">Divine Word College of Laoag</option>
              <option value="IGAMA">IGAMA Colleges Found Inc.</option> 
              <option value="MMSU">MMSU College of Industrial Tech.</option> 
              <option value="OTI">Overseas Tech. Ins.</option> 
              <option value="MAIS">Marcos Agro-Industrial SChool-Tesda</option> 
              <option value="INCAT">Ilocos Norte College of Arts and Trades</option> 
              <option value="BIT">Bangui Institute of Technology</option>
              <option value="SGI">Saint Gabriel International</option>    
              <option value="DATA">Data Center</option>  
              <option value="AIE">Asian Institure of E-commerce</option>  
              <option value="PrimaCare">Prima Care</option> 
              <option value="STI">STI</option> 
            </select>
          </div>
          </div>
          <?php endif; ?>
          <?php if($student->scholartype == 1  || $student->scholartype == 6 || $student->scholartype == 7): ?>
          <div class="form-group col-md-2">
           <div class="form-group">
            <label for="colle">College</label>
            <select id="colle" name="colle" class="form-control">
              <option value="">- College -</option> 
              <option value="CBEA">CBEA</option>
              <option value="COE">COE</option>
              <option value="CAS">CAS</option>
              <option value="CAFSD">CAFSD</option>
              <option value="CTE">CTE</option>
              <option value="CIT">CIT</option>
              <option value="CASAT">CASAT</option>
            </select>
          </div>
          </div>
          <?php endif; ?>
          <?php if($student->scholartype == 3): ?>
          <div class="form-group col-md-4">
                <label for="coursetv">Course(TECH VOC)</label>
                <select id="coursetv" name="coursetv" class="form-control">
                 <option value="0">- Select Course -</option> 
                 <?php $__currentLoopData = $tcor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tcor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <option value="<?php echo e($tcor->id); ?>"><?php echo e($tcor->name); ?></option> 
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               </select>
          </div>
          
        <?php endif; ?>
        <?php if($student->scholartype == 1  || $student->scholartype == 6 || $student->scholartype == 7): ?>
          <div class="form-group col-md-4">
             <label for="courseacad">Course(ACADEMIC)</label>
             <select id="courseacad" name="courseacad" class="form-control">
              <option value="">- Select Course -</option> 
              <?php $__currentLoopData = $cor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($cor->id); ?>"><?php echo e($cor->name); ?></option> 
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
          </div>
        <?php endif; ?>  
        
        <?php if($student->scholartype == 5 || $student->scholartype == 8): ?>
          <div class="form-group col-md-4">
          <label for="domschool">School Attended(DoM/LAW)</label>
            <input id="domschool" name="domschool" class="form-control mx-sm-3" placeholder="School in Tertiary..">
          </div>
          <div class="form-group col-md-4">
          <label for="lawschool">School Attending(LAW)</label>
            <input id="lawschool" name="lawschool" class="form-control mx-sm-3" placeholder="School in Tertiary..">
          </div>
        <?php endif; ?>
        <div class="form-group col-md-2">
                <label for="gwatv">GWA</label>
                <input type="number" name="gwatv" id="gwatv" class="form-control mx-sm-3" placeholder="GWA" step=".01">
             
          </div>
        </div>
        <div class="row">
        <div class="form-group col-md-3">
           <label for="fparent">Fathers Name</label>
           <input name="fparent" id="fparent" class="form-control mx-sm-3" placeholder="Fathers Name">
          </div>
          <div class="form-group col-md-1">
           <label for="fcontact">Age</label>
           <input name="fage" id="fage" class="form-control mx-sm-1" placeholder="0">
          </div>
        <div class="form-group col-md-2">
           <label for="fcontact">Fathers Address</label>
           <select id="fadd" name="fadd" class="form-control">
                    <option value="">- Select Town -</option>
                    <?php $__currentLoopData = $town1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
          </div>
        <div class="form-group col-md-2">
           <label for="fcontact">Fathers Contact</label>
           <input name="fcontact" id="fcontact" class="form-control mx-sm-1" placeholder="0">
          </div>
          <div class="form-group col-md-2">
            <label for="foccupation">Fathers Occupation</label>
            <input class="form-control" id="foccupation" name="foccupation" placeholder="Fathers Occupation">
          </div>
        </div>
        <div class="row">
        <div class="form-group col-md-3">
           <label for="mparent">Mothers Name</label>
           <input name="mparent" id="mparent" class="form-control mx-sm-3" placeholder="Mothers Name">
          </div>
        <div class="form-group col-md-1">
           <label for="fcontact">Age</label>
           <input name="mage" id="mage" class="form-control mx-sm-1" placeholder="0">
          </div>
        <div class="form-group col-md-2">
           <label for="mcontact">Mothers Address</label>
           <select id="madd" name="madd" class="form-control">
                    <option value="">- Select Town -</option>
                    <?php $__currentLoopData = $town1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
          </div>
        <div class="form-group col-md-2">
           <label for="mcontact">Mothers Contact</label>
           <input name="mcontact" id="mcontact" class="form-control mx-sm-1" placeholder="09">
          </div>
          <div class="form-group col-md-2">
            <label for="moccupation">Mothers Occupation</label>
            <input class="form-control" id="moccupation" name="moccupation" placeholder="Mothers Occupation">
          </div>
        </div>
        <div class="row" >
            <div class="col-md-10" align="center">
             <b><h3>REQUIREMENTS</h3></b>
            </div>
        </div>
        <div class="row">
              <div class="form-group col-md-2">
                  <label for="aplet">Application Letter:</label>
                  <select id="aplet" name="aplet" class="form-control">   
                             <option value="">-(*^*)-</option>      
                             <option value="0">NO</option>
                             <option value="1">OK</option>
                         </select>
              </div>
              <div class="form-group col-md-1">
                  <label for="apgr">GRADES:</label>
                  <select id="apgr" name="apgr" class="form-control"> 
                      <option value="">(*^*)</option>      
                      <option value="0">NO</option>
                      <option value="1">OK</option>
                         </select>
              </div>
              <div class="form-group col-md-2">
                  <label for="gmoral">GOOD MORAL:</label>
                  <select id="gmoral" name="gmoral" class="form-control">                   
                      <option value="">-(*^*)-</option>      
                      <option value="0">NO</option>
                      <option value="1">OK</option>
                         </select>
              </div>
              <div class="form-group col-md-1">
                  <label for="nso">PSA/NSO:</label>
                  <select id="nso" name="nso" class="form-control">                   
                      <option value="">(*^*)</option>      
                      <option value="0">NO</option>
                      <option value="1">OK</option>
                         </select>
              </div>
              <div class="form-group col-md-2">
                  <label for="bclear">BRGY CLEARANCE:</label>
                  <select id="bclear" name="bclear" class="form-control">                   
                      <option value="">-(*^*)-</option>      
                      <option value="0">NO</option>
                      <option value="1">OK</option>
                         </select>
              </div>
              <div class="form-group col-md-2">
                  <label for="indigent">INDIGENCY:</label>
                  <select id="indigent" name="indigent" class="form-control">                   
                      <option value="">-(*^*)-</option>      
                      <option value="0">NO</option>
                      <option value="1">OK</option>
                         </select>
              </div>
        </div>
        
      	</div>

      </div>
      
     

      <div class="row" align="center">
      		<button type="submit" class="btn btn-success btn-md">Edit</button>
      		<a href="/student/<?php echo e($student->id); ?>" class="btn btn-danger" role="button">Back</a>
      </div>>
  </form>

	
		</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>