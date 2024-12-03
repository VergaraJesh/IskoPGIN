@extends('main')
@section('head')

@endsection

@section('content')
	<div class="container">
		<form method="POST" action="/record">
		<div class="row">
			<div class="form-group col-md-9" align="center">
				 <input type="hidden" value="{{ $student->id }}" name="student" id="student" />
				<h3>Student Renewal for <b>{{ $student->fname}} {{$student->lname}}</b></h3>
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
                        @foreach ($sy as $sy)
							@if($sy->id>9)
                            <option value="{{$sy->id}}">{{ $sy->from }}-{{$sy->to}}</option>
							@endif
                        @endforeach
                    </select>
          </div>

          <div class="form-group col-md-1">
            <label for="sem">Semester</label>
             <select id="sem" name="sem" class="form-control">                     
                        <option value="1">1st</option>
                        <option value="2">2nd</option>
                        <option value="3">Both</option>

                    </select>
          </div>
		

			<div class="form-group col-md-2">
	            <label for="gwa">GWA/Grade</label>
	           	<input id="gwa" name="gwa" class="form-control mx-sm-1" placeholder="0" value="0">
			</div>
			@if($student->scholartype%2==1)
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
					</select>
				</div>
			</div>
		  @else
		  <div class="form-group col-md-2">
				<div class="form-group">
					<label for="gl">Grade Level</label>
					<select id="gl" name="gl" class="form-control">
					<option >------</option>
					@if($student->scholartype==6)
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
		  @endif
		<div class="form-group col-md-3">
	           <label for="contact">New Contact Info(if available)</label>
	           <input id="contact" name="contact" class="form-control mx-sm-3" placeholder="Contact Info" min="0" max="13">
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
