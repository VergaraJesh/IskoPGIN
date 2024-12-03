@extends('main')
@section('head')

@endsection

@section('content')
		<div class="container" align="center">
			<div class="row">
				<div class="col-md-9" align="left">
					<p><h4><b>Remarks for:</b> 
						{{ucfirst($student->fname)}} {{ucfirst($student->lname)}}</h4></p>
					</div>
			</div>

			<div class="row">
					<div class="col-md-2" align="center">
							<b><h5>Title</h5></b>
							</div>
					<div class="col-md-6" align="center">
							<b><h5>Remarks</h5></b>
							</div>
					<div class="col-md-2" align="center">
							<b><h5>Option</h5></b>
							</div>
				</div>
			@foreach($remark as $rem)
				<div class="row">
					<div class="col-md-2" align="left">
						{{ $rem->title}}
					</div>
					<div class="col-md-6" align="left">
							{{ $rem->remark}} <br>Created By: 
							{{ $users[$rem->staff]->name }} at 
				{{ date_format($rem->created_at,'Y-m-d')}}
						</div>
					<div class="col-md-2" align="center">
							<form class="delete" action="{{ route('record.remdestroy', $rem->id) }}" method="POST">
									<input type="hidden" name="_method" value="DELETE">
									<input type="hidden" name="_token" value="{{ csrf_token() }}" />
									<input type="submit" value="Delete" class="btn btn-danger">
								</form>
						</div>
				</div>
			@endforeach
			<br><br>
			<div class="row">
					<div class="col-md-10" align="center">
							<a href="/student/{{$student->id}}" class="btn btn-danger" role="button">Back</a>
							<a class="btn btn-primary" href="/createremark/{{ $student->id }}" role="button">Create Remark</a>
					</div>
			</div>
		</div>
@endsection

@section('scripts')
	
@endsection
