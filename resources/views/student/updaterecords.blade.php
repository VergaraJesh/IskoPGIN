@extends('main')
@section('head')

@endsection

@section('content')
	<div class="container">
			<form id="regForm" method="POST" action="{{ route('record.update',[$rec->id])}}" enctype="multipart/form-data">
					{{ csrf_field()}}
					<input type="hidden" name="_method" value="put">
				<div class="row">
			<div class="form-group col-md-9" align="center">
				 <input type="hidden" value="{{ $student->id }}" name="student" id="student" />
				 <input type="hidden" value="{{ $rec->id }}" name="record" id="record" />
				<h3>Student Update Records for <b>{{ $student->fname}} {{$student->lname}}</b></h3>
			</div>
		</div>
		<div class="row">
	            <div class="col-md-1">
	            </div>
	           <div class="col-md-7">
	      @if ($errors->any())
	          <div class="alert alert-danger">
	              <ul class="list-inline">
						
	                  @foreach ($errors->all() as $error)
	                      <li class="list-inline-item">{{ $error }}</li>
	                  @endforeach
	              </ul>
	          </div>
	      @endif
	    </div>
	  </div>
		<br>
		<div class="row">
			{{ csrf_field() }}
			<div class="form-group col-md-2">
            <label for="sy">School Year</label>
             <select id="sy" name="sy" class="form-control">
					<option value="">------</option>
                        @foreach ($sy as $sy)
                            <option value="{{$sy->id}}">{{ $sy->from }}-{{$sy->to}}</option>
                        @endforeach
                    </select>
          </div>

          <div class="form-group col-md-2">
            <label for="sem">Semester</label>
             <select id="sem" name="sem" class="form-control">   
						<option value="">------</option>                  
                        <option value="1">1st</option>
                        <option value="2">2nd</option>
                        <option value="3">Both</option>
                    </select>
          </div>
			<div class="form-group col-md-1">
	            <label for="gwa">GWA/Grade</label>
	           	<input id="gwa" name="gwa" class="form-control mx-sm-1" placeholder="00.00" step="0.01">
			</div>
			<div class="form-group col-md-1">
	           <label for="cs">CS</label>
	           <input id="cs" name="cs" class="form-control mx-sm-3" placeholder="0.0" step="0.01">
			  </div>  
			
				<div class="form-group col-md-1">
				<div class="form-group">
					<label for="yl">YearLevel</label>
					<select id="yl" name="yl" class="form-control">
					<option value="">------</option>
					<option value="1">I</option>
					<option value="2">II</option>
					<option value="3">III</option>
					<option value="4">IV</option>
					<option value="5">V</option> 
					@if($student->scholartype==6 || $student->scholartype==7)
					<option value=NULL>DELETE</option> 
					@endif
					</select>
				</div>
			</div>
		
		  <div class="form-group col-md-2">
				<div class="form-group">
					<label for="gl">Grade Level</label>
					<select id="gl" name="gl" class="form-control">
					<option value="">------</option>
					@if($student->scholartype==6 || $student->scholartype==7)
					<option value="7">Grade 7</option>
					<option value="8">Grade 8</option>
					<option value="9">Grade 9</option>
					<option value="10">Grade 10</option>
					@endif
					<option value="11">Grade 11</option>
					<option value="12">Grade 12</option>
					</select>
				</div>
			</div>
		  
		
	
		<div class="form-group col-md-2">
				<label for="stat">Status</label>
				<select id="stat" name="stat" class="form-control">
					<option value="">------</option>
					<option value="0">Not Approved</option>
					<option value="1">Approved</option>
					</select>
			   </div>  

		</div>
	 </div>
		
		<div class="row">
			<div class="col-md-1"></div>
		<div class="form-group col-md-2">
			<label for="stype">Scholartype Update</label>
			<select id="stype" name="stype" class="form-control">
				<option value="">------</option>
				<option value="1">Yes</option>
				</select>
			 </div>  
		</div>
		<div class="row">
			<div class="col-md-8" align="center">
				<a href="/student/{{$student->id}}" class="btn btn-danger" role="button">Back</a>
				<button type="submit" class="btn btn-primary btn-md">Submit</button>
			</div>
		</div>
	</form>
	</div>
	

@endsection

@section('scripts')

@endsection
