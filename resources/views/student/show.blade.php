@extends('main')
@section('head')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
@endsection

@section('content')
	<div class="container">
		@include('student/modal')
		<div class="row" align="center">
			<div class="col-md-6">
				<h3>Student Profile :
				@switch($student->scholartype)
					@case(1)
						Academic Scholar
					@break
					@case(2)
						CAAP
					@break
					@case(3)
						TechVoc Scholar
					@break
					@case(4)
						Senior High School Scholar
					@break
					@case(5)
						Doctor of Medicine
					@break
					@case(6)
						Arts
					@break
					@case(7)
						Agriculture
					@break
				@endswitch
				</h3>
			</div>
			<div class="col-md-2" align="left" valign="center">
				@if($rem>0)
						<b><p class="text-danger"> = Remarks = </p></b>
				@endif
			</div>
			<div class="col-md-3">

				@foreach($users as $users)
					@if($users->id == $student->staff)
						Last Updated by: {{ $users->name }}
					@endif
				@endforeach
			</div>
		</div>
		{{-- end container --}}
		<div class="row">
        <div class="col-xs-2">
            <div class="big-box">
            	@if($student->pic != null)
            	<img src="/{{$student->pic}}" class="rounded mx-auto d-block" alt="..." width="150px" length="150px" >
            	@else
            	<img src="<?php echo asset("default.jpeg")?>" class="rounded mx-auto d-block" alt="..." width="150px" length="150px" >
            	@endif
            </div>
        </div>
        <div class="col-xs-10">
            <div class="row">
                <div class="col-xs-12">
                	<div class="mini-box">
							@if($student->ip==1)
							<p><font color="red"><h4 align="justify"><b>Name:(IP) <u>{{strtoupper($student->fname)}} {{strtoupper($student->mname)}} {{strtoupper($student->lname)}}
									@if($student->suffix!=null) {{$student->suffix}} @endif </u></b></h4></font></p>
							@elseif($student->ip==2)
							<p><font color="blue"><h4 align="justify"><b>Name: (4Ps)<u>{{strtoupper($student->fname)}} {{strtoupper($student->mname)}} {{strtoupper($student->lname)}}
								@if($student->suffix!=null) {{$student->suffix}} @endif </u></b></h4></font></p>
							@elseif($student->ip==3)
							<p><font color="green"><h4 align="justify"><b>Name: (4Ps+IP)<u>{{strtoupper($student->fname)}} {{strtoupper($student->mname)}} {{strtoupper($student->lname)}}
								@if($student->suffix!=null) {{$student->suffix}} @endif </u></b></h4></font></p>
							@elseif($student->ip==4)
							<p><font color="gold"><h4 align="justify"><b>Name: (Sibling Scholar)<u>{{strtoupper($student->fname)}} {{strtoupper($student->mname)}} {{strtoupper($student->lname)}}
								@if($student->suffix!=null) {{$student->suffix}} @endif </u></b></h4></font></p>
							@elseif($student->ip==5)
								<p><font color="gold"><h4 align="justify"><b>Name: (Other Scholarship)<u>{{strtoupper($student->fname)}} {{strtoupper($student->mname)}} {{strtoupper($student->lname)}}
								@if($student->suffix!=null) {{$student->suffix}} @endif </u></b></h4></font></p>
							@elseif($student->ip==6)
								<p><font color="silver"><h4 align="justify"><b>Name: (LGU Scholarship)<u>{{strtoupper($student->fname)}} {{strtoupper($student->mname)}} {{strtoupper($student->lname)}}
								@if($student->suffix!=null) {{$student->suffix}} @endif </u></b></h4></font></p>
							@elseif($student->ip==7)
								<p><font color="orange"><h4 align="justify"><b>Name: (LGU Scholarship + 4Ps)<u>{{strtoupper($student->fname)}} {{strtoupper($student->mname)}} {{strtoupper($student->lname)}}
								@if($student->suffix!=null) {{$student->suffix}} @endif </u></b></h4></font></p>
							@elseif($student->ip==8)
								<p><font color="orange"><h4 align="justify"><b>Name: (CHED)<u>{{strtoupper($student->fname)}} {{strtoupper($student->mname)}} {{strtoupper($student->lname)}}
								@if($student->suffix!=null) {{$student->suffix}} @endif </u></b></h4></font></p>
							@elseif($student->ip==9)
								<p><font color="orange"><h4 align="justify"><b>Name: (TES)<u>{{strtoupper($student->fname)}} {{strtoupper($student->mname)}} {{strtoupper($student->lname)}}
								@if($student->suffix!=null) {{$student->suffix}} @endif </u></b></h4></font></p>
							@elseif($student->ip==10)
								<p><font color="orange"><h4 align="justify"><b>Name: (CHED + TES)<u>{{strtoupper($student->fname)}} {{strtoupper($student->mname)}} {{strtoupper($student->lname)}}
								@if($student->suffix!=null) {{$student->suffix}} @endif </u></b></h4></font></p>							
							@else							
							<p><h4 align="justify"><b>Name: <u>{{strtoupper($student->fname)}} {{strtoupper($student->mname)}} {{strtoupper($student->lname)}}
									@if($student->suffix!=null) {{$student->suffix}} @endif</u></b></h4></p>
							@endif
                		
                	</div>
            	</div>
                <div class="col-xs-2">
                	<div class="mini-box">
                		<p>
						AGE:<b>
							@if($student->dob != "")
								{{$age = date_diff(date_create($student->dob), date_create('now'))->y}}
							@else
								N/A
							@endif	
								</b>
							</p>
                </div>
            </div>
            <div class="col-xs-3">
                	<div class="mini-box">
                		<p>
						Monthly Income:<b>
							{{ $student->income }}
								</b>
							</p>
                </div>
            </div>
            <div class="col-xs-7">
                	<div class="mini-box">
                		<p>
						Skills:<b>
								@foreach($student->skills as $skills)
									{{ $skills->skillname}}
								@endforeach
							
								</b>
							</p>
                </div>
			</div>
			
			<div class="col-xs-12"><div class="mini-box">
                				
								<b>Permanent :
								@foreach($brgy as $brgy)
									@if($brgy->id == $student->cur_brgy)
										{{ $brgy->name }},
									@endif
								@endforeach 
								@foreach($mun as $brgy)
									@if($brgy->id == $student->cur_mun)
										{{ $brgy->name }}
									@endif
								@endforeach
								</b>
								
			                	</div>
			            	</div>
							
			<div class="col-xs-12"><div class="mini-box">
                				
								<b>Boarding :
								@if($student->perma_brgy) 
									@foreach($brgy1 as $brgy)
										@if($brgy->id == $student->perma_brgy)
											{{ $brgy->name }},
										@endif
									@endforeach 
									@foreach($mun1 as $brgy)
										@if($brgy->id == $student->perma_mun)
											{{ $brgy->name }}
										@endif
									@endforeach
								@else
									N/A
								@endif	
             					</b>
								
			                	</div>
			            	</div>
							
             	<div class="col-xs-5">
                	<div class="mini-box">
                		<p align="justify"><b>Contact Number:</b>
                			@if($student->contact)
	                			{{ $student->contact }}
	                		@else
	                			N/A
	                		@endif
                		</p>
                	</div>
            	</div>
	                <div class="col-xs-7">
	                	<div class="mini-box">
	                		<p align="justify"><b>Alternate Contact:</b> 
	                			@if($student->contact1)
	                			{{ $student->contact1 }}
	                			@else
	                			N/A
	                			@endif
	                		</p>
	                </div>
	            </div>
	            <div class="col-xs-5">
                	<div class="mini-box">
                		<p align="justify"><b>Email:</b>
                			@if($student->email)
	                			{{ $student->email }}
	                		@else
	                			N/A
	                		@endif
                		</p>
                	</div>
            	</div>
	                <div class="col-xs-7">
	                	<div class="mini-box">
	                		<p align="justify"><b>alternate Email:</b>
	                			@if($student->email1)
	                			{{ $student->email1 }}
		                		@else
		                			N/A
		                		@endif
	                		</p>
	                </div>
	            </div>

	            <div class="col-xs-3">
                	<div class="mini-box">
                		<p align="justify"><b>Mothers Name</b>
                		</p>
                	</div>
            	</div>
            	<div class="col-xs-1">
                	<div class="mini-box">
                		<p align="justify"><b>Age</b>
                		</p>
                	</div>
            	</div>
            	<div class="col-xs-2">
                	<div class="mini-box">
                		<p align="justify"><b>Address</b>
                		</p>
                	</div>
            	</div>
            	<div class="col-xs-2">
                	<div class="mini-box">
                		<p align="justify"><b>Contact</b>
                		</p>
                	</div>
            	</div>
            	<div class="col-xs-4">
                	<div class="mini-box">
                		<p align="justify"><b>Occupation</b>
                		</p>
                	</div>
            	</div>
	            @foreach($student->parents as $parents)
                				@if($parents != null)
	                				@if($parents->type == 0)
	                					<div class="col-xs-3">
						                	<div class="mini-box">
						                		<p align="justify">{{ strtoupper($parents->pname) }}
						                		</p>
						                	</div>
						            	</div>
						            	<div class="col-xs-1">
						                	<div class="mini-box">
						                		<p align="justify">{{ $parents->age }}
						                		</p>
						                	</div>
						            	</div>
						            	<div class="col-xs-2">
						                	<div class="mini-box">
						                		<p align="justify">
						                			@foreach($mun as $brgy)
														@if($brgy->id == $parents->address)
															{{ $brgy->name }}
														@endif
													@endforeach
						                		</p>
						                	</div>
						            	</div>
						            	<div class="col-xs-2">
						                	<div class="mini-box">
						                		<p align="justify">{{ $parents->contact }}
						                		</p>
						                	</div>
						            	</div>
						            	<div class="col-xs-4">
						                	<div class="mini-box">
						                		<p align="justify">{{ $parents->occupation }}
						                		</p>
						                	</div>
						            	</div>						            
	                				@endif
                				@endif
                			@endforeach
                <div class="col-xs-3">
                	<div class="mini-box">
                		<p align="justify"><b>Fathers Name</b>
                		</p>
                	</div>
            	</div>
            	<div class="col-xs-1">
                	<div class="mini-box">
                		<p align="justify"><b>Age</b>
                		</p>
                	</div>
            	</div>
            	<div class="col-xs-2">
                	<div class="mini-box">
                		<p align="justify"><b>Address</b>
                		</p>
                	</div>
            	</div>
            	<div class="col-xs-2">
                	<div class="mini-box">
                		<p align="justify"><b>Contact</b>
                		</p>
                	</div>
            	</div>
            	<div class="col-xs-4">
                	<div class="mini-box">
                		<p align="justify"><b>Occupation</b>
                		</p>
                	</div>
            	</div>
	            @foreach($student->parents as $parents)
                				@if($parents != null)
	                				@if($parents->type == 1)
	                					<div class="col-xs-3">
						                	<div class="mini-box">
						                		<p align="justify">{{ strtoupper($parents->pname) }}
						                		</p>
						                	</div>
						            	</div>
						            	<div class="col-xs-1">
						                	<div class="mini-box">
						                		<p align="justify">{{ $parents->age }}
						                		</p>
						                	</div>
						            	</div>
						            	<div class="col-xs-2">
						                	<div class="mini-box">
						                		<p align="justify">
						                			@foreach($mun as $brgy)
														@if($brgy->id == $parents->address)
															{{ $brgy->name }}
														@endif
													@endforeach
						                		</p>
						                	</div>
						            	</div>
						            	<div class="col-xs-2">
						                	<div class="mini-box">
						                		<p align="justify">{{ $parents->contact }}
						                		</p>
						                	</div>
						            	</div>
						            	<div class="col-xs-4">
						                	<div class="mini-box">
						                		<p align="justify">{{ $parents->occupation }}
						                		</p>
						                	</div>
						            	</div>						            
	                				@endif
                				@endif
                			@endforeach
                		<div class="col-xs-3">
                	<div class="mini-box">
                		<p align="justify"><b>Guardian Name</b>
                		</p>
                	</div>
            	</div>
            	<div class="col-xs-1">
                	<div class="mini-box">
                		<p align="justify"><b>Age</b>
                		</p>
                	</div>
            	</div>
            	<div class="col-xs-2">
                	<div class="mini-box">
                		<p align="justify"><b>Address</b>
                		</p>
                	</div>
            	</div>
            	<div class="col-xs-2">
                	<div class="mini-box">
                		<p align="justify"><b>Contact</b>
                		</p>
                	</div>
            	</div>
            	<div class="col-xs-4">
                	<div class="mini-box">
                		<p align="justify"><b>Occupation</b>
                		</p>
                	</div>
            	</div>
	            @foreach($student->parents as $parents)
                				@if($parents != null)
	                				@if($parents->type == 2)
	                					<div class="col-xs-2">
						                	<div class="mini-box">
						                		<p align="justify">{{ strtoupper($parents->pname) }}
						                		</p>
						                	</div>
						            	</div>
						            	<div class="col-xs-1">
						                	<div class="mini-box">
						                		<p align="justify">{{ $parents->age }}
						                		</p>
						                	</div>
						            	</div>
						            	<div class="col-xs-2">
						                	<div class="mini-box">
						                		<p align="justify">
						                			@foreach($mun as $brgy)
														@if($brgy->id == $parents->address)
															{{ $brgy->name }}
														@endif
													@endforeach
						                		</p>
						                	</div>
						            	</div>
						            	<div class="col-xs-2">
						                	<div class="mini-box">
						                		<p align="justify">{{ $parents->contact }}
						                		</p>
						                	</div>
						            	</div>
						            	<div class="col-xs-5">
						                	<div class="mini-box">
						                		<p align="justify">{{ $parents->occupation }}
						                		</p>
						                	</div>
						            	</div>						            
	                				@endif
                				@endif
                			@endforeach
            </div>

        </div>
        @foreach($student->parents as $parents)
        	@if($parents !=null)
        		@if($parents->type==3)
        		<div class="row">
			        	<div class="col-md-3">
			           		<p align="justify"><b>
			           			Sibling Name
			           			</b></p>
			           	</div>
			           	<div class="col-md-2">
			           		<p align="justify"><b>
			           			Age
			           			</b></p>
			           	</div>
			           	<div class="col-md-2">
			           		<p align="justify"><b>
			           			Contact Number
			           			</b></p>
			           	</div>
			           	<div class="col-md-3">
			           		<p align="justify"><b>
			           			Occupation
			           			</b></p>
			           	</div>
			        </div>
			        @break
        		@endif
        	@endif
        @endforeach
        @foreach($student->parents as $parents)
        	@if($parents !=null)
        		@if($parents->type==3)
			        <div class="row">
			        	<div class="col-md-3">
			           		<p>
			           			{{strtoupper($parents->pname)}}
			           			</p>
			           	</div>
			           	<div class="col-md-2">
			           		<p>
			           			{{$parents->age}}
			           			</p>
			           	</div>
			           	<div class="col-md-2">
			           		<p>
			           			{{$parents->contact}}
							   </p>
			           	</div>
			           	<div class="col-md-3">
			           		<p>
			           			{{$parents->occupation}}
			           			</p>
			           	</div>
			        </div>
        		@endif
        	@endif
        @endforeach

        <div class="row">
        	<div class="col-md-4">
           		<h4 align="justify"><b>Educational Background</b></h4>
           	</div>
           </div>

        <div class="row">
         	<div class="col-md-3">
           		<h4>Elementary :</h4>
           	</div>
           			<div class="col-md-4">
           				<h4 align="justify">
	           			@foreach($student->schools as $schools)
	           				@if($schools->level == 0)
	           					<b>{{ $schools->name }}</b>
	           				@endif
	           			@endforeach
           				<h4>
        			</div>
           </div>
           <div class="row">
         	<div class="col-md-3">
           		<h4>High School/Junior High School:</h4>
           	</div>
           			<div class="col-md-4">
           				<h4 align="justify">
	           			@foreach($student->schools as $schools)
	           				@if($schools->level == 1)
	           					<b>@if(is_numeric($schools->name))
								   		@foreach($senior as $sen1)
											@if($sen1->id==$schools->name)
												{{ $sen1->name }}
											@endif										   
										 @endforeach
									@else
										{{ $schools->name }}
									@endif
								   </b>
	           				@endif
	           			@endforeach
           				</h4>
        			</div>
		   </div>
		   
		   <div class="row">
				<div class="col-md-3">
					  <h4>Senior School :</h4>
				  </div>
						  <div class="col-md-4">
							  <h4 align="justify">
							  @foreach($student->schools as $schools)
								  @if($schools->level == 2)
									  <b>@foreach($senior as $sen)
										  @if($sen->id==$schools->name)
										  	{{ $sen->name }}
										  @endif
										   
										 @endforeach
										  - {{$schools->course}}</b>
								  @endif
							  @endforeach
							  </h4>
					   </div>
			  </div>

           <div class="row">
         	<div class="col-md-2">
			@if($student->scholartype==5)
           		<h4 align="justify">Tertiary :</h4>
			@else
				<h4 align="justify">University :</h4>
			@endif
           	</div>
           		<h4 align="justify">
           			@foreach($student->schools as $schools)
           				@if($schools->level == 3)
	           				<div class="col-md-1">
	           					<b>{{ strtoupper($schools->name) }}</b>
	           				</div>
	           				<div class="col-md-4">		
							@if($student->scholartype==5)
								Course: {{strtoupper($schools->course)}}
							@endif							   
	           				@if($student->scholartype==1 || $student->scholartype==6 || $student->scholartype==7)
	           						@foreach($courseacad as $courses)
	           							@if($courses->id == $schools->course)
	           								Course: {{strtoupper($courses->abvr)}}
	           							@endif
	           						@endforeach
	           				@elseif($student->scholartype==3)	           					
										@foreach($courseTV as $courses)
										@if($courses->id == $schools->course)
											Course: {{strtoupper($courses->name)}}
										@endif	
						   @endforeach								
	           				@endif
	           				</div>
	           				@if($schools->name=='mmsu' || $schools->name=='MMSU')
	           				<div class="col-md-2">
	           					<b>College: {{ strtoupper($schools->college) }}</b>
	           				</div>
	           				@endif
           				@endif
           			@endforeach
           		</h4>
		   </div>  		   
		   <div class="row">
				<div class="col-md-2">
				<h4 align="justify"><b>Requirements</b></h4>
				</div>
				<div class="col-md-10">
					<table>
						<tr>
							@if($student->apletter==1)
							<span class="glyphicon glyphicon-ok text-primary"></span><font color="blue"><b> Application Letter  </b></font>
							@else
							<span class="glyphicon glyphicon-remove text-danger"></span><font color="red"><b> Application Letter  </b></font>
							@endif
							
						</tr>
						<tr>
								@if($student->apgrades==1)
								<span class="glyphicon glyphicon-ok text-primary"></span><font color="blue"><b> Form 138/Grades </b></font>
								@else
								<span class="glyphicon glyphicon-remove text-danger"><font color="red"><b> Form 138/Grades </b></font>
								@endif
						</tr>
						<tr>
								@if($student->goodmoral==1)
								<span class="glyphicon glyphicon-ok text-primary"></span><font color="blue"><b>Good Moral </b></font>
								@else
								<span class="glyphicon glyphicon-remove text-danger"><font color="red"><b>Good Moral </b></font>
								@endif
						</tr>
						<tr>
								@if($student->bcert==1)
								<span class="glyphicon glyphicon-ok text-primary"></span><font color="blue"><b>NSO/PSA </b></font>
								@else
								<span class="glyphicon glyphicon-remove text-danger"><font color="red"><b>NSO/PSA </b></font>
								@endif
						</tr>
						<tr>
								@if($student->bclear==1)
								<span class="glyphicon glyphicon-ok text-primary"></span><font color="blue"><b>Barangay Clearance </b></font>
								@else
								<span class="glyphicon glyphicon-remove text-danger"><font color="red"><b>Barangay Clearance </b></font>
								@endif
						</tr>
						<tr>
								@if($student->incert==1)
								<span class="glyphicon glyphicon-ok text-primary"></span><font color="blue"><b>Indigency </b></font>
								@else
								<span class="glyphicon glyphicon-remove text-danger"><font color="red"><b>Indigency </b></font>
								@endif
						</tr>
					</table>
				</div>
				
		   </div>

           <div class="row">
        	<div class="col-md-4">
           		<h4 align="justify"><b>Schoolarship Records:</b></h4>
           	</div>
           </div>
		   @foreach($student->records as $records)
		   
				@switch($records->scholartype)
				@case(1)
					<font color="Blue">
					@break
				@case(2)
					<font color="#013220">
					@break
				@case(3)
					<font color="Red">
					@break
				@case(4)
					<font color="Orange">
					@break	
				@case(5)
					<font color="Purple">
					@break
				@case(6)
					<font color="Magenta">
					@break
				@case(7)
					<font color="#013220">
					@break			
				@endswitch
	           <div class="row">				   
	        	<div class="col-md-4">
							@if($records->statactive==1)
							<span class="glyphicon glyphicon-ok text-primary"></span>
							@else
							<span class="glyphicon glyphicon-ok text-danger"></span>
							@endif
							@switch($records->scholartype)
							@case(1)
								(Acad) 
								@break
							@case(2)
								(CAAP) 
								@break
							@case(3)
								(TV) 
								@break
							@case(4)
								(SHS) 
								@break
							@case(5)
								(DoM) 
								@break	
							@case(6)
								(Arts) 
								@break	
							@case(7)
								(Agri) 
								@break					
							@endswitch

	           				Schoolyear : <b>{{ $records->schoolyear->from}}-{{ $records->schoolyear->to}} - 
	           				@switch($records->sem)
							    @case(1)
							        1st sem
							        @break
							    @case(2)
							        2nd sem
							        @break							 
							@endswitch
						</b>
	           	</div>
	           	<div class="col-md-1">
				   @if($records->scholartype==1 || $records->scholartype==3 || $records->scholartype==6 || $records->scholartype==5)
				   	   
				   @switch($records->yearlvl)
									@case(1)
										I
										@break
									@case(2)
										II
										@break
									@case(3)
										III
										@break
									@case(4)
										IV
										@break
									@case(5)
										V
										@break
								@endswitch
					@elseif($records->scholartype==3)
					@switch($records->yearlvl)
									@case(1)
									Year :	I
										@break
									@case(2)
									Year :	II
										@break
									@case(3)
									Year :	III
										@break
									@case(4)
									Year :	IV
										@break
									@case(7)
									Grade: 7
										@break
									@case(8)
										Grade: 8
										@break
									@case(9)
										Grade: 9
										@break
									@case(10)
										Grade: 10
										@break
									@case(11)
										Grade: 11
										@break
									@case(12)
										Grade: 12
										@break
								@endswitch
				    @else
					Grade:{{ $records->grade_lvl}}
				   @endif
					   													
	           		
	           	</div>
	           	<div class="col-md-2">
	           				GWA : {{ $records->GWA}}
	           	</div>
	           	<div class="col-md-2">
	           				CS : {{ $records->comserve}} Hours
	           	</div>
	           	<div class="col-md-1" align="left">
	           		<a class="btn btn-info" href="/record/{{ $records->id}}/edit" role="button">Update</a>
				   </div>
				<div class="col-md-1" align="left">
						<form class="delete" action="{{ route('record.destroy', $records->id) }}" method="POST">
								<input type="hidden" name="_method" value="DELETE">
								<input type="hidden" name="_token" value="{{ csrf_token() }}" />
								<input type="submit" value="Delete" class="btn btn-danger">
							</form>
							
					</div>
			   </div>
		   </font>
		   @endforeach
		   <script>
				$(".delete").on("submit", function(){
					return confirm("Do you want to delete this item?");
				});
			</script>
           <div class="row">
        	<div class="col-md-3" align="right">
           		<a class="btn btn-success" href="/student/{{ $student->id}}/edit" role="button">Update Basic Information</a>
           	</div>
           	<div class="col-md-1" align="center">
           		<a class="btn btn-primary" href="/record/create/{{ $student->id }}" role="button">Renew</a>
			   </div>
			@if($student->scholartype=='1' || $student->scholartype=='4' || $student->scholartype=='6' || $student->scholartype=='7')
			<div class="col-md-1" align="center">
				<a class="btn btn-info" href="/ratings/{{ $student->id}}" role="button">Rating</a>
			</div>
			<div class="col-md-2" align="center">
				<a class="btn btn-info" href="/cratings/{{ $student->id}}" role="button">Special Rating</a>
			</div>
			@endif			
			<div class="col-md-1" align="center">
					<a class="btn btn-warning" href="/remark/{{ $student->id}}" role="button">Remarks</a>
				</div>	
           	<div class="col-md-2" align="left">
           		<a class="btn btn-danger" href="{{action('RecordController@downloadPDF', ['id' => $student->id])}}
           			" role="button">Download</a>
           	</div>
           </div>

    </div>
	</div>

@endsection

@section('scripts')

@endsection
