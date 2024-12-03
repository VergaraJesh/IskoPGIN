@extends('main')
@section('head')

@endsection

@section('content')
	<div class="container">
		<h2>SCHOOL INFORMATION FOR {{strtoupper($sn)}}</h2>
		<br><br>
		<table class="table table-bordered">
				<thead>
				  <tr>
					<th>School Staff/Head</th>
					<th>School Contact</th>
					<th>School Email</th>
					<th>Function</th>
					<th>Staff Updated/Created</th>
				  </tr>
				</thead>
				<tbody>
					@foreach($sch as $s)
					<tr>
						<td>{{ $s->sc_head }}</td>
						<td align="center">{{ $s->sc_contact }}</td>
						<td align="center">{{ $s->sc_email }}</td>
						<td>
							<div class="row">
								<div class="col-md-4" align="left">
										<a class="btn btn-info" href="/screcord/{{ $s->id}}/edit" role="button">Update</a>
									</div>
								@if($s->awt!=1)
								 <div class="col-md-3" align="left">
										 <form class="delete" action="{{ route('screcord.destroy', $s->id) }}" method="POST">
												 <input type="hidden" name="_method" value="DELETE">
												 <input type="hidden" name="_token" value="{{ csrf_token() }}" />
												 <input type="submit" value="Delete" class="btn btn-danger">
											 </form>
											 
									 </div>
								@endif
							</div>
						</td>
						<td align="center">@foreach($staffs as $staff)
								@if($staff->id==$s->staff)
								{{$staff->name}}
								@endif
							@endforeach
						</td>
					</tr>
					@endforeach
				</tbody>
		</table>

		<br><br>
		<table class="table table-bordered">
				<table class="table table-bordered" >
						<thead >
								<tr>
									<th>SY</th>    
								@if($type==1)								
									<th>Kinder</th>                                                   
									<th>Grade 1</th>  
									<th>Grade 2</th> 
									<th>Grade 3</th> 
									<th>Grade 4</th> 
									<th>Grade 5</th> 
									<th>Grade 6</th>   
								@else    
									<th>Grade 7</th> 
									<th>Grade 8</th> 
									<th>Grade 9</th> 
									<th>Grade 10</th> 
									<th>Grade 11</th>      
									<th>Grade 12</th> 
								@endif
									<th>Staff</th>    
									<th>Function</th>
								</tr>
						</thead>
						<tbody>
					@foreach($sch2 as $s)
					<tr>						
						<td>{{$s['sy']}}</td>						
						@if($type==1)						
							<td>{{$s['kin']}}</td>							 
						@endif
							<td>{{$s['g1']}}</td> 
							<td>{{$s['g2']}}</td> 
							<td>{{$s['g3']}}</td> 
							<td>{{$s['g4']}}</td> 
							<td>{{$s['g5']}}</td>      
							<td>{{$s['g6']}}</td> 
							<td>{{$s['staff']}}</td> 
							<td>
							<div class="row">
								<div class="col-md-4" align="left">
										<a class="btn btn-info" href="/editrecs/{{$s['id']}}" role="button">Update</a>
									</div>
								 <div class="col-md-2" align="left">
										 <form class="delete" action="{{ route('student.delrecsgo', $s['id']) }}" method="POST">
												 <input type="hidden" name="_method" value="DELETE">
												 <input type="hidden" name="_token" value="{{ csrf_token() }}" />
												 <input type="hidden" name="sch" value="{{ $s['scc'] }}" />
												 <input type="submit" value="Del" class="btn btn-danger">
											 </form>
											 
									 </div>
							</div>
							</td>
					</tr>
					@endforeach
				</tbody>
		</table>
	</div>

@endsection

@section('scripts')
<script>
		$(".delete").on("submit", function(){
			return confirm("Do you want to delete this item?");
		});
	</script>

@endsection
