@extends('main')
@section('head')
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
@endsection

@section('content')
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
                 
                url : '{{URL::to('search')}}',
                 
                data:{'search':$value},
                 
                success:function(data){
                 
                $('tbody').html(data);
         
            }
         
        });
         
         
         
        })
         
        </script>
         
        <script type="text/javascript">
         
        $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
         
        </script>
@endsection

@section('scripts')

@endsection
