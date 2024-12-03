@extends('main')
@section('head')

@endsection

@section('content')
		<div class="container" >
		<form method="POST" action="/updatedall">
		<table width="90%">
			<tr>
				<th width="25%">Name</th>
				<th width="10%">Exam Result</th>
				<th width="10%">PED(Interview)</th>
				<th width="10%">INYDO(Interview)</th>
				<th width="15%">Contact Info</th>
				<th width="5%">Status</th>
			</tr>
			@foreach($students as $student)
				<tr>
					<td>{{ $student['lname']}}, {{$student['fname']}}</td>
					<td><input name="exam{{$student['no']}}" id="exam{{$student['no']}}" class="form-control mx-sm-3" placeholder="Exam"></td>
					
					<input type="hidden" value="{{ $student['id'] }}" name="id{{$student['no']}}" id="id{{$student['no']}}">
				</tr>
			@endforeach
		</table>
		<br>
			<div class="row">
					{{ csrf_field() }}
					<input type="hidden" value="{{ $i }}" name="total" id="total">
					<input type="hidden" value="{{ $sem }}" name="sem" id="sem">
					<input type="hidden" value="{{ $sy }}" name="sy" id="sy">
					<div class="col-md-8" align="center">
						<button type="submit" class="btn btn-primary btn-md">Submit</button>
					</div>
				</div>
		</form>
		</div>
		
@endsection

@section('scripts')
	
@endsection
