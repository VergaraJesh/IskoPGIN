<?php $__env->startSection('head'); ?>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<h2>Search Student</h2>
<div class="row">
    <div class="col-md-5">
        <div class="form-group form-inline">
            <label for="search">Search</label>
            <input type="text" class="form-control"  id="search" name="search">
        </div>
    </div>
</div>
    <table class="table table-striped">
    <thead>
        <tr>
            <th>Student Name</th>
            <th>Commands</th>
        </tr>
    </thead>
        <tbody>     
        </tbody>    
    </table>

<script type="text/javascript">
 
        $('#search').on('keyup',function(){
         
                $value=$(this).val();
                 
                $.ajax({
                 
                type : 'get',
                 
                url : '<?php echo e(URL::to('search')); ?>',
                 
                data:{'search':$value},
                 
                success:function(data){
                 
                $('tbody').html(data);
         
            }
         
        });
         
         
         
        })
         
        </script>
         
        <script type="text/javascript">
         
        $.ajaxSetup({ headers: { 'csrftoken' : '<?php echo e(csrf_token()); ?>' } });
         
        </script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>