<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Record;
use App\Student;
use App\User;
use App\Municipality;
use App\Schoolyear;
use App\School;
use App\Brgy;
use App\Examrecords;
use App\AcadCourses;
use App\SHSchools;
use App\Questionrecords;
use App\Remark;
use PDF;
use DB;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $student = Student::where('id','3')->first();
        return view('AcadRecords.pdfView',compact('student'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        $student = Student::where('id',$id)->first();
        $sy = Schoolyear::all();
        return view('student.renewal',['student'=>$student,'sy'=>$sy]);
        
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $stud = Student::find($request->input('student'));
       $input = request()->validate([
                'sem' => 'required',
                'sy' => 'required',

            ], [

                'sem.required' => 'Please enter Semester.',
                'sy.required' => 'Please enter School Year.',
                'gwa.required' => 'Please enter GWA.',
                'gwa.numeric' => 'GWA must be Numeric.',
            ]);

       if($request->input("sem") =="" || $request->input("sy") == ""){
            return back()->withInput();
       }
       else{
           
           if(Record::where('student_id',$request->input('student'))->
            where('sem',$request->input('sem'))->
            where('schoolyear_id',$request->input('sy'))->
                exists() && $stud->scholartype!=2)
               {
                    return back()->withErrors(['record' => ['Record already Exist.']]);
               }
           else{
                if($request->input('sem')=='3'){
                    if(Record::where('student_id',$request->input('student'))->
                        where('sem','1')->
                        where('schoolyear_id',$request->input('sy'))->
                        exists() || Record::where('student_id',$request->input('student'))->
                        where('sem','2')->
                        where('schoolyear_id',$request->input('sy'))->
                        exists())
                           {
                                return back()->withErrors(['record' => ['Record already Exist.']]);
                           }
                    else{
                         $record = new Record;
                         $record->student_id = $request->input("student");
                         $record->schoolyear_id = $request->input("sy");
                         if($stud->scholartype%2==1){
                            $record->yearlvl = $request->input('yl');
                         }
                        if($stud->scholartype%2==0){
                            $record->grade_lvl = $request->input('gl');
                         }
                         $record->scholartype=$stud->scholartype;
                         $record->sem = '1';
                         $record->gwa = $request->input('gwa');
                         $record->save();
                         $record = new Record;
                         $record->student_id = $request->input("student");
                         $record->schoolyear_id = $request->input("sy");
                        if($stud->scholartype%2==1){
                            $record->yearlvl = $request->input('yl');
                         }
                        if($stud->scholartype%2==0){
                            $record->grade_lvl = $request->input('gl');
                         }
                         $record->scholartype=$stud->scholartype;
                         $record->sem = '2';
                         $record->gwa = $request->input('gwa');
                         $record->save();
                    }
                 
                 }
                 else{
                    if($request->input('contact')!=""){
                        $stud->contact=$request->input('contact');
                        $stud->staff=Auth::user()->id;
                        $stud->save();
                    }
                    $record = new Record;
                    $record->student_id = $request->input("student");
                    $record->scholartype=$stud->scholartype;
                    $record->statactive = 1;
                    $record->schoolyear_id = $request->input("sy");
                    if($stud->scholartype%2==1){
                        $record->yearlvl = $request->input('yl');
                     }
                    if($stud->scholartype%2==0){
                        $record->grade_lvl = $request->input('gl');
                     }
                    $record->sem = $request->input('sem');
                    $record->gwa = $request->input('gwa');
                    $record->staff=Auth::user()->id;
                    $record->save();
                 }
                 return redirect()->action(
                    'StudentController@show', ['id' => $request->input("student")]
                );
           }
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function show(Record $record)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sy = Schoolyear::all();
        $rec = Record::where('id',$id)->first();
        $student=$rec->student_id;
        $student = Student::where('id',$student)->first();
        return view('student.updaterecords',['rec' => $rec,'student' => $student,'sy'=>$sy]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Record $record)
    {
        //
        $stud = Student::find($request->input('student'));
        $recs = Record::find($request->input('record'));
        $status=$recs->statactive;
        if($request->input('sy')!=""){
            $recs->schoolyear_id = $request->input("sy");
        }
        if($request->input('stat')!=""){
            $status = $request->input("stat");
        }
        
            if($request->input('yl')!=""){
                if($request->input('yl')=="NULL"){
                    $recs->yearlvl = NULL;
                    $school1 = School::where('level',3)->where('student_id',$request->input('student'))->delete();
                    
                }
                else{
                    $recs->yearlvl = $request->input('yl');
                }
               
                
            }
         
        if($stud->scholartype==4 || $stud->scholartype==6 || $stud->scholartype==7){
            if($request->input('gl')!=""){
                $recs->grade_lvl = $request->input('gl');
                if($request->input('gl')<11){
                    $school1 = School::where('level',2)->where('student_id',$request->input('student'))->delete();
                    
                }
            }
         }
        if($request->input('sem')!=""){
            $recs->sem = $request->input('sem');
        }
        if($request->input('gwa')!=""){
            $recs->gwa = $request->input('gwa');
        }
        if($request->input('cs')!=""){
            $recs->comserve = floatval($request->input('cs'));
        }
        if($request->input('stype')!=""){
            $recs->scholartype = $stud->scholartype;
        }
        $recs->statactive=$status;
        $recs->save();
        return redirect()->action(
            'StudentController@show', ['id' => $request->input("student")]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function destroy(Record $record)
    {
        //
        $deletedRows = Record::where('id', $record->id)->delete();
        return redirect()->action(
            'StudentController@show', ['id' => $record->student_id]
        );
    }

    public function downloadPDF()
    {
        $pdf = PDF::loadView('/student/display')->setPaper('legal', 'portrait');
		return $pdf->download('test.pdf');
    }

    public function remark($id){
        $users = User::all();
        $remark = Remark::where('student_id',$id)->get();
        $student = Student::where('id',$id)->first();
        return view('student.remarks',['remark' => $remark, 'student'=>$student,'users'=>$users]);
    }
    public function createremark($id){
        $student = Student::where('id',$id)->first();
        return view('student.createremark',['student' => $student]);
    }
    public function createrem(Request $request){
        $student = $request->input('student');
        $input = request()->validate([
            'title' => 'required',
            'remd' => 'required',

        ], [
            'title.required' => 'Please enter Title of Remark.',
            'remd.required' => 'Please enter Remarks.',
        ]);
        $remark = new Remark;
        $remark->title=$request->input('title');
        $remark->remark=$request->input('remd');
        $remark->student_id=$student;
        $remark->staff=Auth::user()->id;
        $remark->save();
        return redirect()->action(
            'RecordController@remark', ['id' => $student]
        );
    }
    public function remdestroy(Remark $remark)
    {
        $student=$remark->student_id;
        //
        $deletedRows = Remark::where('id', $remark->id)->delete();
        return redirect()->action(
            'RecordController@remark', ['id' => $student]
        );
    }

    public function examresults(){
        $sy = Schoolyear::all();
        return view('student.examlist',['sy'=>$sy]);
    }
    public function exResult(Request $request){
        $sy=$request->input('sy');
        $date=$request->input('dt');
        $newDate = date("Y-m-d", strtotime($date));

        $stype=$request->input('scholarship');
        $sem=$request->input('sem');
        $syear=Schoolyear::where('id',$sy)->get();
        $semester="";
        switch($sem){
            case 1:$semester="1st Semester";break;
            case 2:$semester="2nd Semester";break;
        }
        $query ="SELECT examination_record.*, students.*
        FROM examination_record 
        INNER JOIN students ON examination_record.student_id=students.id 
        where examination_record.schoolyear_id=$sy and examination_record.sem=$sem and students.scholartype=$stype";
        if($request->input('dt')!=null){
            $query=$query. " and examination_record.created_at='$newDate'";
        }  
        $query=$query." ORDER by examination_record.score DESC";      
        $users = DB::select($query);
        $examresult = collect();
        foreach($users as $users){
            $name=$users->lname.", ".$users->fname." ".$users->suffix;
            $examresult->push(['name'=>$name,'t1'=>$users->sentence_score,'t2'=>$users->antonym_score,'t3'=>$users->analogy_score,'t4'=>$users->synonym_score,'t5'=>$users->math_score,'t6'=>$users->in_score,'total'=>$users->score]);
        }
        $i=0;
        return view('student.examresultlsit',['stype'=>$stype,'students'=>$examresult,'i'=>$i,'sem'=>$semester,'sy'=>$syear]);    
    }
    public function iplist(){
        $sy = Schoolyear::all();
        return view('student.iplist',['sy'=>$sy]);
    }
    public function ipResult(Request $request){
        $groups=$request->input('ip');
        $sy=$request->input('sy');
        $stype=$request->input('scholarship');
        $sem=$request->input('sem');
        $syear=Schoolyear::where('id',$sy)->get();
        $semester="";
        switch($sem){
            case 1:$semester="1st Semester";break;
            case 2:$semester="2nd Semester";break;
        }
        if($stype==1){
            $level=3;
        }
        else{
            $level=2;
        }
        $query ="SELECT records.*, students.*,schools.* 
        FROM records 
        INNER JOIN students ON records.student_id=students.id 
        INNER JOIN schools ON records.student_id=schools.student_id 
        where records.schoolyear_id=$sy and records.sem=$sem and students.scholartype=$stype 
        and schools.level=$level and records.statactive=1";
        $query=$query." ORDER by grade_lvl,lname,fname";        
        $users = DB::select($query);
        $students = collect();
        
        foreach($users as $users){
            $schools=$users->name;
            if($stype==4){
                $t1=SHSchools::where('id',$users->name)->get();
                foreach($t1 as $t){
                    $schools=$t->name;
                }   
                
            }
            if($groups==1){
                if($users->ip==1 || $users->ip==3){
                    $name=$users->lname.", ".$users->fname." ".$users->suffix;
                    $students->push(['name'=>$name,'school'=>$schools,'gl'=>$users->grade_lvl,'c1'=>$users->contact,'c2'=>$users->contact1,'cou'=>$users->course]);
                }               
            }
            if($groups==2){
                if($users->ip==2 || $users->ip==3){
                        $name=$users->lname.", ".$users->fname." ".$users->suffix;
                        $students->push(['name'=>$name,'school'=>$schools,'gl'=>$users->grade_lvl,'c1'=>$users->contact,'c2'=>$users->contact1,'cou'=>$users->course]);
                    
                }               
            }
            if($groups==4){
                if($users->ip==4){
                    $name=$users->lname.", ".$users->fname." ".$users->suffix;
                    $students->push(['name'=>$name,'school'=>$schools,'gl'=>$users->grade_lvl,'c1'=>$users->contact,'c2'=>$users->contact1,'cou'=>$users->course]);
                }  
            }
            if($groups==5){
                if($users->ip==5){
                    $name=$users->lname.", ".$users->fname." ".$users->suffix;
                    $students->push(['name'=>$name,'school'=>$schools,'gl'=>$users->grade_lvl,'c1'=>$users->contact,'c2'=>$users->contact1,'cou'=>$users->course]);
                }  
            }
            if($groups==6){
                if($users->ip==6){
                    $total=(40*$users->result_interview/100)+(15*$users->pgrade/100)+(30*$users->result_interview1/100)+(15*$users->result_exam/100);
                                $tot=round($total);  
                                if($total>74 && $users->pgrade>84){
                    $name=$users->lname.", ".$users->fname." ".$users->suffix;
                    $students->push(['name'=>$name,'school'=>$schools,'gl'=>$users->grade_lvl,'c1'=>$users->contact,'c2'=>$users->contact1,'cou'=>$users->course]);
                                }
                }  
            }
        }
        $i=0;
        return view('student.iplistresult',['group'=>$groups,'i'=>$i,'sem'=>$semester,'sy'=>$syear,'students'=>$students]);    
    }
    public function lgulist(){
        $sy = Schoolyear::all();
        return view('student.lgulist',['sy'=>$sy]);
    }
    public function lguResult(Request $request){
        $staff=Auth::user()->name;
        $stype=$request->input('scholarship');
        $sem=$request->input('sem');
        $semester="";
        switch($sem){
            case 1:$semester="1st";break;
            case 2:$semester="2nd";break;
        }
        $sy=$request->input('sy');
        $syear=Schoolyear::where('id',$sy)->get();
        $i=0;
        if($stype==1){
        $query="";
        if($request->input('scl')=='1'){
            $query ="SELECT records.*, students.*,schools.*,municipalities.name 
            FROM records 
            INNER JOIN students ON records.student_id=students.id 
            INNER JOIN schools ON records.student_id=schools.student_id 
            INNER JOIN municipalities ON students.cur_mun=municipalities.id
            where  students.scholartype=$stype and records.schoolyear_id=$sy and records.sem=$sem and records.statactive=1 and schools.level=3";
            $query=$query." ORDER by municipalities.name,lname,fname";
            $users = DB::select($query);        
        $temp=1;
        $town = [];
        $town1 = [];
        for($i=1;$i<=23;$i++){
            $town[$i]=0;
        }
        $mun = Municipality::all();   
        for($i=1;$i<=23;$i++){
            $t=Municipality::find($i);
            $town1[$i]=$t->name;
        }    
        $stotal=0;   
        foreach($users as $users){
            switch($users->cur_mun){
                case 1:$town[1]++;break;
                case 2:$town[2]++;break;
                case 3:$town[3]++;break;
                case 4:$town[4]++;break;
                case 5:$town[5]++;break;
                case 6:$town[6]++;break;
                case 7:$town[7]++;break;
                case 8:$town[8]++;break;
                case 9:$town[9]++;break;
                case 10:$town[10]++;break;
                case 11:$town[11]++;break;
                case 12:$town[12]++;break;
                case 13:$town[13]++;break;
                case 14:$town[14]++;break;
                case 15:$town[15]++;break;
                case 16:$town[16]++;break;
                case 17:$town[17]++;break;
                case 18:$town[18]++;break;
                case 19:$town[19]++;break;
                case 20:$town[20]++;break;
                case 21:$town[21]++;break;
                case 22:$town[22]++;break;
                case 23:$town[23]++;break;
            }            
            $stotal++;  
        }
        $i=0;
        return view('student.lguresult',['total'=>$stotal,'stype'=>$stype,'staff'=>$staff,'i'=>$i,'sem'=>$semester,'sy'=>$syear,'townname'=>$town1,'towncount'=>$town]);
        }
        else{
            $j=0;
            $query ="SELECT students.*,records.*, schools.id,municipalities.*
            FROM records 
            INNER JOIN students ON records.student_id=students.id 
            INNER JOIN schools ON records.student_id=schools.student_id 
            INNER JOIN municipalities ON students.cur_mun=municipalities.id
            where students.scholartype=$stype and records.schoolyear_id=$sy and records.sem=$sem and records.statactive=0 and schools.level=3 and students.created_at>1";
            $query=$query." ORDER by municipalities.name,lname,fname";
            $users = DB::select($query);
            $temp=1;
        $town = [];
        $town1 = [];
        for($i=1;$i<=23;$i++){
            $town[$i]=0;
        }
        $mun = Municipality::all();   
        for($i=1;$i<=23;$i++){
            $t=Municipality::find($i);
            $town1[$i]=$t->name;
        }   
        $stotal=0;  
        foreach($users as $users){
            if($users->result_exam>0 || $users->result_interview>0 || $users->result_interview1>0 && $users->ip!=4 && $users->ip!=5 && $users->ip!=6 && $users->ip!=7){
            switch($users->cur_mun){
                case 1:$town[1]++;break;
                case 2:$town[2]++;break;
                case 3:$town[3]++;break;
                case 4:$town[4]++;break;
                case 5:$town[5]++;break;
                case 6:$town[6]++;break;
                case 7:$town[7]++;break;
                case 8:$town[8]++;break;
                case 9:$town[9]++;break;
                case 10:$town[10]++;break;
                case 11:$town[11]++;break;
                case 12:$town[12]++;break;
                case 13:$town[13]++;break;
                case 14:$town[14]++;break;
                case 15:$town[15]++;break;
                case 16:$town[16]++;break;
                case 17:$town[17]++;break;
                case 18:$town[18]++;break;
                case 19:$town[19]++;break;
                case 20:$town[20]++;break;
                case 21:$town[21]++;break;
                case 22:$town[22]++;break;
                case 23:$town[23]++;break;
            }    
            $stotal++;
        }        
        }
        $i=0;
        return view('student.lguresult',['total'=>$stotal,'stype'=>$stype,'staff'=>$staff,'i'=>$i,'sem'=>$semester,'sy'=>$syear,'townname'=>$town1,'towncount'=>$town]);
        }   
    }
        if($stype==3){
            $query="SELECT records.student_id, students.*,schools.id,records.* ,municipalities.*
            FROM records 
            INNER JOIN students ON records.student_id=students.id 
            INNER JOIN schools ON records.student_id=schools.student_id 
            INNER JOIN municipalities ON students.cur_mun=municipalities.id
            where records.schoolyear_id=$sy and records.sem=$sem and students.scholartype=$stype and schools.level=3
            and records.statactive=1";
            $query=$query." ORDER by name,lname,fname";
            $users = DB::select($query);
            $temp=1;
        $town = [];
        $town1 = [];
        for($i=1;$i<=23;$i++){
            $town[$i]=0;
        }
        
        $mun = Municipality::all();   
        for($i=1;$i<=23;$i++){
            $t=Municipality::find($i);
            $town1[$i]=$t->name;
        }    
        $stotal=0; 
        foreach($users as $users){
            switch($users->cur_mun){
                case 1:$town[1]++;break;
                case 2:$town[2]++;break;
                case 3:$town[3]++;break;
                case 4:$town[4]++;break;
                case 5:$town[5]++;break;
                case 6:$town[6]++;break;
                case 7:$town[7]++;break;
                case 8:$town[8]++;break;
                case 9:$town[9]++;break;
                case 10:$town[10]++;break;
                case 11:$town[11]++;break;
                case 12:$town[12]++;break;
                case 13:$town[13]++;break;
                case 14:$town[14]++;break;
                case 15:$town[15]++;break;
                case 16:$town[16]++;break;
                case 17:$town[17]++;break;
                case 18:$town[18]++;break;
                case 19:$town[19]++;break;
                case 20:$town[20]++;break;
                case 21:$town[21]++;break;
                case 22:$town[22]++;break;
                case 23:$town[23]++;break;
                }
                $stotal++;      
            }
            return view('student.lguresult',['total'=>$stotal,'stype'=>$stype,'staff'=>$staff,'i'=>$i,'sem'=>$semester,'sy'=>$syear,'townname'=>$town1,'towncount'=>$town]);
        }
        if($stype==4){
            $query="SELECT records.student_id, students.*,schools.id,records.*,municipalities.*
            FROM records 
            INNER JOIN students ON records.student_id=students.id 
            INNER JOIN schools ON records.student_id=schools.student_id 
            INNER JOIN municipalities ON students.cur_mun=municipalities.id
            where records.schoolyear_id=$sy and records.sem=$sem and students.scholartype=$stype and schools.level=2 
            ";
            $query=$query." ORDER by name,lname,fname";            
            $users = DB::select($query);       
            $temp=1;
        $stotal=0;
        $town = [];
        $town1 = [];
        $schools = [];
        $schools1 = [];
        $counter=SHSchools::all()->last();
        $counter=$counter->id;
        $x=0;
        $y=0;
        for($i=1;$i<=$counter;$i++){
            $t1=SHSchools::where('id',$i)->first();
            $schools[$i]=0;
            if($t1){
                    $schools1[$i]=$t1->name;
            }
            else{
                $schools1[$i]="";
            }   
        }
        for($i=1;$i<=23;$i++){
            $t=Municipality::find($i);
            $town1[$i]=$t->name;
            $town[$i]=0;
        }     
        foreach($users as $users){
            $total=(40*$users->result_interview/100)+(15*$users->pgrade/100)+(30*$users->result_interview1/100)+(15*$users->result_exam/100);
            $tot=round($total);  
            if($total>74 && $users->pgrade>84 && $users->ip!=4 && $users->ip!=5 && $users->ip!=6 && $users->ip!=7){
                switch($users->cur_mun){
                    case 1:$town[1]++;break;
                    case 2:$town[2]++;break;
                    case 3:$town[3]++;break;
                    case 4:$town[4]++;break;
                    case 5:$town[5]++;break;
                    case 6:$town[6]++;break;
                    case 7:$town[7]++;break;
                    case 8:$town[8]++;break;
                    case 9:$town[9]++;break;
                    case 10:$town[10]++;break;
                    case 11:$town[11]++;break;
                    case 12:$town[12]++;break;
                    case 13:$town[13]++;break;
                    case 14:$town[14]++;break;
                    case 15:$town[15]++;break;
                    case 16:$town[16]++;break;
                    case 17:$town[17]++;break;
                    case 18:$town[18]++;break;
                    case 19:$town[19]++;break;
                    case 20:$town[20]++;break;
                    case 21:$town[21]++;break;
                    case 22:$town[22]++;break;
                    case 23:$town[23]++;break;
                    } 
                    $stotal++;
                    $find=School::where('student_id',$users->student_id)->Where('level',2)->first();
                    $schools[$find->name]++;  
                }       
            }
        }
            $i=0;
            return view('student.lguresult',['counter'=>$counter,'schoolsname'=>$schools1,'schoolcount'=>$schools,'total'=>$stotal,'stype'=>$stype,'staff'=>$staff,'i'=>$i,'sem'=>$semester,'sy'=>$syear,'townname'=>$town1,'towncount'=>$town]);
    }
    public function comserve(){
        $sy = Schoolyear::all();
        return view('student.comlist',['sy'=>$sy]);
    }
    public function comserveresult(Request $request){
        $staff=Auth::user()->name;
        $stype=$request->input('scholarship');
        $sem=$request->input('sem');
        $semester="";
        switch($sem){
            case 1:$semester="1st";break;
            case 2:$semester="2nd";break;
        }
        $sy=$request->input('sy');
        $syear=Schoolyear::where('id',$sy)->get();
        $i=0;
    if($stype==1){
        $query="";
        if($request->input('scl')=='1'){
            $query ="SELECT records.*, students.*,schools.* 
            FROM records 
            INNER JOIN students ON records.student_id=students.id 
            INNER JOIN schools ON records.student_id=schools.student_id 
            where students.scholartype=$stype and records.schoolyear_id=$sy and records.sem=$sem 
            and records.statactive=1 and schools.level=3";
            $query=$query." ORDER by lname,fname";
            $users = DB::select($query);
            $students1 = collect();
            $students2 = collect();
            $tempacad=AcadCourses::all();
            foreach($users as $users){
                $mun=Municipality::where('id',$users->cur_mun)->get();
                foreach($mun as $mun){
                    $municipality=$mun->name;
                }                   
                $gwa= collect();
                $yll="";
                $course=$users->course;
                $temp=$tempacad->find($course);
                $cou=$temp['abvr'];
                $ptemp=0;
                $psy=0;
                if($sem==1){
                    $ptemp=2;
                    $psy=$users->schoolyear_id-1;
                }
                else{
                    $ptemp=1;
                    $psy=$users->schoolyear_id;
                }
                $prev=Record::where('student_id',$users->student_id)
                ->where('schoolyear_id',$psy)
                ->where('sem',$ptemp)->count();
                $tempo=0;
                if($prev==0){
                    $gwa->push($users->pgrade);
                    $tempo=1;
                }   
                else{
                    $prev=Record::where('student_id',$users->student_id)
                    ->where('schoolyear_id',$psy)
                    ->where('sem',$ptemp)->get()->pluck('GWA');
                    $gwa=$prev;
                } 
                switch($users->yearlvl){
                    case 1:$yll="I";break;
                    case 2:$yll="II";break;
                    case 3:$yll="III";break;
                    case 4:$yll="IV";break;
                    case 5:$yll="V";break;
                }
                $name=$users->fname;
                    if($users->suffix!=""){
                    $name=$name." ".$users->suffix;
                    }
                    if($users->ip!=4 && $users->ip!=5 && $users->ip!=6 && $users->ip!=7){
                            $students1->push(['cs'=>$users->comserve,'num'=>$i,'id'=>$users->id,'school'=>$users->name,'lname'=>$users->lname,'fname'=>$name,'coll'=>$users->college,'course'=>$cou,'yl'=>$yll,'gwa'=>$gwa,'tem'=>$tempo,'cs'=>$users->comserve]);
                      }
                $i++;
            }
            $i=0;
            $j=0;
            $students1->groupBy('id');
            return view('student.resultnew1',['staff'=>$staff,'j'=>$j,'i'=>$i,'semester'=>$semester,'syear'=>$syear,'students1'=>$students2])->with("students",$students1);
        }
        else{
            $query ="SELECT students.*,records.*, schools.* 
            FROM records 
            INNER JOIN students ON records.student_id=students.id 
            INNER JOIN schools ON records.student_id=schools.student_id 
            where students.scholartype=$stype and records.schoolyear_id=$sy and records.sem=$sem and records.statactive=1 and schools.level=3";
            $query=$query." ORDER by lname,fname";
            $users = DB::select($query);
            $students1 = collect();
            $tempacad=AcadCourses::all();
            foreach($users as $users){
                $gwa= collect();
                $yll="";
                $course=$users->course;
                $temp=$tempacad->find($course);
                $cou=$temp['abvr'];
                
                switch($users->yearlvl){
                    case 1:$yll="I";break;
                    case 2:$yll="II";break;
                    case 3:$yll="III";break;
                    case 4:$yll="IV";break;
                    case 5:$yll="V";break;
                }
                $name=$users->fname;
                    if($users->suffix!=""){
                       $name=$name." ".$users->suffix;
                    }
                    $student=Student::where('fname',$users->fname)
                    ->where('lname',$users->lname)
                    ->where('mname',$users->mname)->get()->pluck('id');
                    $brgy=Brgy::where('id',$users->cur_brgy)->get()->pluck('name');
                    $mun=Municipality::where('id',$users->cur_mun)->get()->pluck('name');
                    $college="";
                    if($users->name=="MMSU"){
                        $college=$users->college;
                    }
                    else{
                        $college=$users->name;
                    }
                    $students1->push(['cs'=>$users->comserve,'mun'=>$mun,'brgy'=>$brgy,'num'=>$i,'id'=>$users->id,'lname'=>$users->lname,'fname'=>$name,'coll'=>$college,'course'=>$cou,'yl'=>$yll,'gwa'=>$gwa]);
                $i++;
            }
            $i=0;
            $j=0;
            $students1->groupBy('id');
            return view('student.resultnew1',['staff'=>$staff,'j'=>$j,'i'=>$i,'semester'=>$semester,'syear'=>$syear])->with("students",$students1);    
        }
        
        
    }
    }

    public function reportlist(){
        $sy = Schoolyear::all();
        return view('student.reportlist',['sy'=>$sy]);
    }
    public function reportResult(Request $request){
        $staff=Auth::user()->name;
        $stype=$request->input('scholarship');
        $sem=$request->input('sem');
        $semester="";
        switch($sem){
            case 1:$semester="1st";break;
            case 2:$semester="2nd";break;
        }
        $sy=$request->input('sy');
        $syear=Schoolyear::where('id',$sy)->get();
        $i=0;
        $scl=3;
        if($stype==4){
            $scl=2;
        }
    if($stype==1 || $stype==4){        
                    $query ="SELECT students.*,records.*, schools.* 
                    FROM records INNER JOIN students ON records.student_id=students.id 
                    INNER JOIN schools ON records.student_id=schools.student_id 
                    where students.scholartype=$stype and records.schoolyear_id=$sy and records.sem=$sem and 
                    schools.level=$scl and students.created_at>1 and records.statactive=0";
                    if($stype==1){
                        $query=$query." ORDER by lname,fname";
                    }
                    else{
                        $query=$query." ORDER by lname,fname ASC";            
                    }
                            
                    $users = DB::select($query);
                    $students1 = collect();
                    $students2 = collect();
                    $tempacad=AcadCourses::all();
                    $fname = [];
                    $lname = [];
                    foreach($users as $users){                        
                        $sen="";
                        $senior="";
                        $gwa= collect();
                        $yll="";
                        $course=$users->course;
                                       
                        $gwa->push($users->pgrade);                  
                        switch($users->yearlvl){
                            case 1:$yll="I";break;
                            case 2:$yll="II";break;
                            case 3:$yll="III";break;
                            case 4:$yll="IV";break;
                            case 5:$yll="V";break;
                            case 11:$yll="11";break;
                            case 12:$yll="12";break;
                        }
                        $town=Municipality::where('id',$users->cur_mun)->first();                              
                        $mun=$town->name;  
                            $name=$users->fname;
                            if($users->suffix!=""){
                            $name=$name." ".$users->suffix;
                            }
                            if($stype==1){
                                $temp=$tempacad->find($course);
                                $cou=$temp['abvr'];
                                if($users->result_exam>0 || $users->result_interview>0 || $users->result_interview1>0 && $users->ip!=2 && $users->ip!=3 && $users->ip!=4 && $users->ip!=5){
                                    $students1->push(['mun'=>$mun,'num'=>$i,'id'=>$users->id,'school'=>$users->name,'lname'=>$users->lname,'fname'=>$name,'coll'=>$users->college,'course'=>$cou,'yl'=>$yll,'gwa'=>$gwa]);
                                    }
                                    $i++;
                            }
                            else{
                                $senior=SHSchools::where('id',$users->name)->get();     
                                foreach($senior as $sen){
                                    $senior=$sen->name;
                                }                                                           
                                $yll=$users->grade_lvl;
                                $cou=$course;
                                $total=(40*$users->result_interview/100)+(15*$users->pgrade/100)+(30*$users->result_interview1/100)+(15*$users->result_exam/100);
                                $tot=round($total);  
                                if($total>74 && $users->ip!=2 && $users->pgrade>84 && $users->ip!=3 && $users->ip!=4 && $users->ip!=5){
                                    $students1->push(['lname'=>$users->lname,'fname'=>$name]);
                                    $fname[$i]=$users->fname;
                                    $lname[$i]=$users->lname;
                                    $i++;
                                    }
                                    
                            }
                            
                        
                    }
                    
                    $j=0;
                    
                    return view('student.result2',['fname'=>$fname,'lname'=>$lname,'stype'=>$stype,'staff'=>$staff,'j'=>$j,'i'=>$i,'semester'=>$semester,'syear'=>$syear])->with("students",$students1);
                
        }
        
    }
    
    

}

