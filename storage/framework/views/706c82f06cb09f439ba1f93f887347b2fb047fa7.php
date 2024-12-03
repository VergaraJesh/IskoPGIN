<!doctype html>
<html lang="<?php echo e(app()->getLocale()); ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Schoolar Form</title>
        <!-- Fonts -->
        
        <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('js\bootstrap-3.3.0\dist\css\bootstrap.min.cc')); ?>" rel="stylesheet">
        

        <script src="<?php echo e(asset('js\jquery-3.3.1.js')); ?>"></script> 
        <script src="<?php echo e(asset('js\bootstrap-3.3.0\dist\js\bootstrap.min.js')); ?>"></script> 
        <script src="<?php echo e(asset('js\bootstrap-3.3.0\dist\js\bootstrap.js')); ?>"></script> 
        
        <!--Navbar-->

        <style type="text/css">
        body,html,.row-offcanvas {
                  height:100%;
                }

                body {
                  padding-top: 50px;
                }

                #sidebar {
                  width: inherit;
                  min-width: 220px;
                  max-width: 220px;
                  background-color:#f5f5f5;
                  float: left;
                  height:100%;
                  position:relative;
                  overflow-y:auto;
                  overflow-x:hidden;
                }
                #main {
                  height:100%;
                  overflow:auto;
                }

                /*
                 * off Canvas sidebar
                 * --------------------------------------------------
                 */
                @media  screen and (max-width: 768px) {
                  .row-offcanvas {
                    position: relative;
                    -webkit-transition: all 0.25s ease-out;
                    -moz-transition: all 0.25s ease-out;
                    transition: all 0.25s ease-out;
                    width:calc(100% + 220px);
                  }
                    
                  .row-offcanvas-left
                  {
                    left: -220px;
                  }

                  .row-offcanvas-left.active {
                    left: 0;
                  }

                  .sidebar-offcanvas {
                    position: absolute;
                    top: 0;
                  }
                }
        </style>
        <?php echo $__env->yieldContent('head'); ?>
    </head>
<body>
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

      <a class="navbar-brand" href="#">SCHOLARSHIP</a>
    </div>
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                                </a>
                            </li>
                            <li>
                                        <a href="<?php echo e(route('logout')); ?>"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                            <?php echo e(csrf_field()); ?>

                                        </form>
                                    </li>
                    </ul>
    </div><!--/.nav-collapse -->

</div><!--/.navbar -->

<div class="row-offcanvas row-offcanvas-left">
  <div id="sidebar" class="sidebar-offcanvas">
      <div class="col-md-12">
        <h3>DashBoard</h3>
        <ul class="nav nav-pills nav-stacked">
            <li ><a href="/student"><span class="glyphicon glyphicon-home" aria-hidden="true"> Home</span></a></li>
            <li><a href="/student/create"><span class="glyphicon glyphicon-file" aria-hidden="true"> Add Student</span></a></li>
            <li ><a href="/studentsearch"><span class="glyphicon glyphicon-search" aria-hidden="true"> Search Student </span></a></li>
            <li  data-toggle="collapse" data-target="#products" class="collapsed">
              <a href="#"><span class="glyphicon glyphicon-folder-open" aria-hidden="true"> Management Tools</span></a>
            </li>
            <ul class="sub-menu collapse" id="products">
                <li><a href="/admins/create"><span class="glyphicon glyphicon-pencil" aria-hidden="true"> Add Course</span></a></li>
                <li><a href="/admins"<span class="glyphicon glyphicon-pencil" aria-hidden="true"> Edit Course</span></a></li>
                <li><a href="/shschools"<span class="glyphicon glyphicon-pencil" aria-hidden="true">Senior High Schools</span></a></li>
                <li><a href="/adminupdateall"><span class="glyphicon glyphicon-pencil" aria-hidden="true"> Update List</span></a></li>
            </ul>
            <li  data-toggle="collapse" data-target="#products1" class="collapsed">
              <a href="#"><span class="glyphicon glyphicon-folder-open" aria-hidden="true"> Reporting</span></a>
            </li>
            <ul class="sub-menu collapse" id="products1">
                <li><a href="/scholarmasterlist"><span class="glyphicon glyphicon-pencil" aria-hidden="true"> Master List</span></a></li>
                <li><a href="/payrolllist"><span class="glyphicon glyphicon-pencil" aria-hidden="true"> Reporting all</span></a></li>
                <li><a href="/eilisting"><span class="glyphicon glyphicon-pencil" aria-hidden="true"> Exam/Interview Result</span></a></li>
                <li><a href="/examresults"><span class="glyphicon glyphicon-pencil" aria-hidden="true"> Exam Result</span></a></li>
                <li><a href="/grouplist"><span class="glyphicon glyphicon-pencil" aria-hidden="true"> Groups</span></a></li>
                <li  data-toggle="collapse" data-target="#lgu" class="collapsed">
                  <a href="#"><span class="glyphicon glyphicon-folder-open" aria-hidden="true"> LGU</span></a>
                </li>
                <ul class="sub-menu collapse" id="lgu">
                    <li><a href="/lgulist"><span class="glyphicon glyphicon-pencil" aria-hidden="true">Number</span></a></li>
                    <li><a href="/lgubrgy"><span class="glyphicon glyphicon-pencil" aria-hidden="true">Name</span></a></li>
                    <li><a href="/lgugo"><span class="glyphicon glyphicon-pencil" aria-hidden="true">LGU</span></a></li>
                  </ul>
                
              </ul>  
              <li  data-toggle="collapse" data-target="#products2" class="collapsed">
                <a href="#"><span class="glyphicon glyphicon-folder-open" aria-hidden="true"> Schools Info</span></a>
              </li>
              <ul class="sub-menu collapse" id="products2">
                  <li><a href="/screcord/"><span class="glyphicon glyphicon-pencil" aria-hidden="true">Search Contact</span></a></li>
              </ul>    
              <li  data-toggle="collapse" data-target="#products3" class="collapsed">
                <a href="#"><span class="glyphicon glyphicon-folder-open" aria-hidden="true"> Document Tracker</span></a>
              </li>
              <ul class="sub-menu collapse" id="products3">
                  <li><a href="/documents/create"><span class="glyphicon glyphicon-pencil" aria-hidden="true">Add Documents</span></a></li>
                  <li><a href="/docusearches/"><span class="glyphicon glyphicon-pencil" aria-hidden="true">Search Documents</span></a></li>
              </ul>  
          </ul>
      </div>
  </div>
  <div id="main">
      <div class="col-md-12">
          <p class="visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i></button>
          <div class="row">
              <div class="col-md-12"><div class="well">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </div>
          
      </div>
  </div>
</div><!--/row-offcanvas -->



   <script type="text/javascript">
       $(document).ready(function() {
  $('[data-toggle=offcanvas]').click(function() {
    $('.row-offcanvas').toggleClass('active');
  });
});
   </script>
<script src="<?php echo e(asset('js/app.js')); ?>">
   
</script>
<script type="text/javascript"></script>
 <?php echo $__env->yieldContent('scripts'); ?>
  <footer class="navbar-default navbar-fixed-bottom">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; N-S-C</p>
      </div>
      <!-- /.container -->
    </footer>
</body>

</html>