@extends('main')
@section('head')

@endsection

@section('content')
		<div class="container" >
			
			<div class="row">
				<div class="col-md-10" align="center">
				<h4><b>RATINGS of {{$student->fname}} {{$student->mname}} {{$student->lname}} {{$student->suffix}}</b></h4>
				</div>
			</div>
			<br>
			<div class="row">
			<h4>PREVIOUS RATINGS</h4>
			</div>
			<div class="row">
				<div class="col-md-2">
					<b>Year Level:</b> {{$lvl}}  @if($student->scholartype==1)={{$lvlper}}%@endif
					</div>
				<div class="col-md-2">
					<b>Examination:</b> {{$student->result_exam}}%
					</div>
				<div class="col-md-2">
					<b>Essay:</b> {{$student->result_interview}}%
					</div>					
				<div class="col-md-2">
						<b>Previous Grade:</b> {{$student->pgrade}}
					</div>
			</div>
			<div class="row" align="center">
				<div class="col-md-10">
				<h3>Total Percentage:<b>
					@if($student->scholartype==1)
					{{($lvlper+$student->result_exam+$student->result_interview+$student->pgrade+$student->result_interview1)/5}}%
					@else
					{{(40*$student->result_interview/100)+(15*$student->pgrade/100)+(30*$student->result_interview1/100)+(15*$student->result_exam/100)}}%
					@endif
					</b>
				</h3>
				</div>
			</div>
			<br><br><br><br>
			<div class="row"><h4>New Rating</h4></div>
			<br>
		<form method="POST" action="/ratingresult">
			<div class="row">
					<div class="form-group col-md-3">
							<div class="form-group">
								<div class="input-group">
										<span class="input-group-addon"><b>Examination Result</b></span>
										<input type="number" step=".01" id="exam" name="exam" class="form-control mx-sm-1" placeholder="0.00" value="{{$student->result_exam}}">
									</div>
							</div>
							</div>

					<div class="form-group col-md-3">
						<div class="form-group">
								<div class="input-group">
										<span class="input-group-addon"><b>Essay</b></span>
										<input type="number" step=".01" id="inter" name="inter" class="form-control mx-sm-1" placeholder="0.00" value="{{$student->result_interview}}">
									  </div>
							</div>
						</div>				
					
				</div>	
				<div class="row">
					<div class="form-group col-md-3">
									<div class="form-group">
											<div class="input-group">
													<span class="input-group-addon"><b>Prev Grade</b></span>
													<input type="number" step=".01" id="pg" name="pg" class="form-control mx-sm-1" placeholder="0.00" value="{{$student->pgrade}}">
												  </div>
										</div>
									</div>						
			@if($student->scholartype==4)	
			<div class="form-group col-md-3">
				<div class="form-group">
					<div class="input-group">
					<span class="input-group-addon"><b>Grade Lvl</b></span>
					<select id="gl" name="gl" class="form-control">
					<option value="">------</option>
					<option value="11">Grade 11</option>
					<option value="12">Grade 12</option>
					</select>
				</div>
			</div>			
			@endif			
				</div>
			<div class="row">
			<div class="form-group col-md-3">
				<div class="form-group">
					<div class="input-group">
					<span class="input-group-addon"><b>Intial Interviewer:</b></span>
					<select id="pers" name="pers" class="form-control">
					<option value="">------</option>
					<option value="ate a">Arlene</option>
					<option value="bedz">Benedict</option>
					<option value="maam c">Carolyn</option>
					<option value="jam">Jamaica</option>
					<option value="majoy">Mae-Joy</option>
					<option value="nats">Nathan</option>
					<option value="pswd">PSWD</option>
					<option value="other">Other</option>
					</select>
				</div>
			</div>			
			</div>
			
			<div class="row">
					{{ csrf_field() }}
					<input type="hidden" value="{{ $student->id }}" name="student" id="student" />
					<input type="hidden" value="{{ $lvlper }}" name="ylper" id="ylper" />
					<input type="hidden" value="{{ $student->pgrade }}" name="pgrade" id="pgrade" />
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
