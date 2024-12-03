<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Student;
use App\School;
use App\SHSchools;
use App\Skills;
use App\Record;
use App\User;
use App\Examrecords;
use App\Schoolyear;
use App\Municipality;
use App\Remark;
use App\Parents;
use App\AcadCourses;
use App\TVCourses;
use App\Ltr;
use App\Tsw;
use DB;
use File;
use Image;
use App\Brgy;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Hamcrest\Core\IsNull;

class StudentController extends Controller
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
        $student = Student::all()->sortBy('lname');
        $sy = Schoolyear::where('from','2017');
        $i=0;
        return view('student.index',['student' => $student,'sy'=>$sy])->with($i);
    }
    public function searchIn()
    {
        //
        return view('student.search');
    }
   
    public function searchGp()
    {
        //
        $cor = AcadCourses::all()->sortBy('name');
        $tcor = TVCourses::all()->sortBy('name');
        $sy = Schoolyear::all();
        $municipalities = Municipality::all();
        return view('student.groupsearch',['sy'=>$sy,'municipalities'=>$municipalities,'cor'=>$cor,'tcor'=>$tcor]);
    }
    /**
     * 
     *  the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $sy = Schoolyear::all();
        $cor = AcadCourses::all()->sortBy('name');
        $shscl = SHSchools::all()->sortBy('name');
        $tcor = TVCourses::all()->sortBy('name');
        $town2 = DB::table("municipalities")->pluck("name","id");
        $town1 = DB::table("municipalities")->pluck("name","id");
        //
        return view('student.register',['shscl'=>$shscl,'town2' => $town2,'town1' => $town1,'cor'=>$cor,'tcor'=>$tcor,'sy'=>$sy]);
    }
    public function myformAjax($id)
    {
        $cities = DB::table("brgys")
                    ->where("municipality_id",$id)
                    ->pluck("name","id");
        return json_encode($cities);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    

    public function store(Request $request)
    {
        
    $input = request()->all();
    $skills = explode(',', $request->input('hidden-skills'));
    $input = request()->validate([
                'fname' => 'required|min:1',
                'lname' => 'required|min:1',
                'city' => 'required',
                'sy' => 'required',
                'sem' => 'required',
            ], [

                'fname.required' => 'Please enter your First Name.',
                'lname.required' => 'Please enter your Last Name.',
            ]); 
        
        $find = Student::where('fname',$request->input("fname"))->where('lname',$request->input('lname'))->where('mname',$request->input('mi'))->first();
        if($find){
            return back()->withErrors(['studenterror' => ['Student already Register.']]);
        }
        else{
            $student = new Student;
            $filename='';
            if($request->file('img')){
                $filename=$student->fname.''.$student->lname.'.jpeg';
                $filename = str_replace(' ','',$filename);
                $photo = $request->file('img');
                $destinationPath = public_path('/acad_img');
                $thumb_img = Image::make($photo->getRealPath())->resize(200, 200);
                $thumb_img->save($destinationPath.'/'.$filename,80);
                $filename='acad_img/'.$filename;
            }
            if($filename!=null){
                $student->pic=$filename;
            }
            $student->fname = strtoupper($request->input('fname'));
            $student->mname = strtoupper($request->input('mi'));
            $student->lname = strtoupper($request->input('lname'));
            $student->suffix=strtoupper($request->input('suf'));
            $student->gender = $request->input('sex');
            $student->scholartype = $request->input('scholarship');
            $student->dob = $request->input('dob');
            $student->staff = Auth::user()->id;
            $student->status = '0';
            $student->civilstatus = $request->input('cs');
            $student->contact =$request->input('contact');
            $student->apletter=$request->input('aplet');
            $student->apgrades=$request->input('apgr');
            $student->goodmoral=$request->input('gmoral');
            $student->bcert=$request->input('nso');
            $student->bclear=$request->input('bclear');
            $student->incert=$request->input('indigent');
            if($request->input('contact1')!=""){
                $student->contact1 = $request->input('contact1');  
            } 
            if($request->input('ip')>0){
                $student->ip = $request->input('ip');  
            } 
            $student->income = $request->input('monthly');
            if($request->input('state')!='' && $request->input('city')!=''){
            //permanent Address
                $student->cur_mun=$request->input('state');
                $student->cur_brgy=$request->input('city');
            }
            if($request->input('state1')!='' && $request->input('city1')!=''){
                //Boarding Address
                $student->perma_mun=$request->input('state1');
                $student->perma_brgy=$request->input('city1'); 
            }
            $student->pgrade=$request->input('gwa');
            $student->save();
            for($i=0;$i<count($skills);$i++){
                if($skills[0]==""){
                    $i=1000;
                }
                else
                {
                        $skill = new Skills;
                        $skill->skillname=$skills[$i];
                        $skill->student_id = $student->id;
                        $skill->save();
                }
            }
             if($request->input('mparent')!=''){
                $mpar = new Parents;
                $mpar->pname = $request->input('mparent');
                $mpar->student_id = $student->id;
                if($request->input('mcontact')!=""){
                $mpar->contact= $request->input('mcontact');
                  }
                if($request->input('moccupation')!=""){  
                $mpar->occupation= $request->input('moccupation');
                }
                if($request->input('madd')!=""){  
                $mpar->address= $request->input('madd');
                }
                if($request->input('mage')!=""){
                $mpar->age= $request->input('mage');
                  }
                $mpar->type= 0;
                $mpar->save();
              }
            if($request->input('fparent')!=''){
                $fpar = new Parents;
                $fpar->pname = $request->input('fparent');
                $fpar->student_id = $student->id;
                if($request->input('fcontact')!=""){
                $fpar->contact= $request->input('fcontact');
                  }
                if($request->input('foccupation')!=""){  
                $fpar->occupation= $request->input('foccupation');
                }
                if($request->input('fadd')!=""){  
                $fpar->address= $request->input('fadd');
                }
                if($request->input('fage')!=""){
                $fpar->age= $request->input('fage');
                  }
                $fpar->type= 1;
                $fpar->save();
            }
            if($request->input('gparent')!=''){
                $gpar = new Parents;
                $gpar->pname = $request->input('gparent');
                $gpar->student_id = $student->id;
                if($request->input('gcontact')!=""){
                $gpar->contact= $request->input('gcontact');
                  }
                if($request->input('goccupation')!=""){  
                $gpar->occupation= $request->input('goccupation');
                }
                if($request->input('gadd')!=""){  
                $gpar->address= $request->input('gadd');
                }
                if($request->input('gage')!=""){
                $gpar->age= $request->input('gage');
                  }
                $gpar->type= 2;
                $gpar->save();
            }
            for($i=0;$i<5;$i++){
                if($request->input('sname'.$i)!=''){
                $spar = new Parents;
                $spar->pname = $request->input('sname'.$i);
                $spar->student_id = $student->id;
                if($request->input('scontact'.$i)!=""){
                $spar->contact= $request->input('scontact'.$i);
                  }
                if($request->input('sage'.$i)!=""){
                $spar->age= $request->input('sage'.$i);
                  }
                if($request->input('soccupation'.$i)!=""){  
                $spar->occupation= $request->input('soccupation'.$i);
                }
                if($request->input('sadd'.$i)!=""){  
                $spar->address= $request->input('sadd'.$i);
                }
                $spar->type= 3;
                $spar->save();
            }
            }
            if($request->input('elem')!=''){
                $elem = new School;
                $elem->student_id = $student->id;
                $elem->level=0;
                $elem->name= $request->input('elem');
                $elem->year= $request->input('elemgrad');
                $elem->save();
            }
            if($request->input('hs')!=''){
                $hs = new School;
                $hs->student_id = $student->id;
                $hs->level=1;
                $hs->name= $request->input('hs');
                $hs->year= $request->input('hsgrad');
                $hs->save();
            }
            if($request->input('sh')!=''){
                $hs = new School;
                $hs->student_id = $student->id;
                $hs->level=2;
                $hs->name= $request->input('sh');
                $hs->course= $request->input('track');
                $hs->year= $request->input('shgrad');
                $hs->save();
            }
            if($request->input('scholarship')==1 || $request->input('scholarship')==3 || $request->input('scholarship')==6 || $request->input('scholarship')==7){
                if($request->input('courseacad')!=0 && $request->input('acadcoll')!=0){
                    $coll = new School;
                    $coll->student_id = $student->id;
                    $coll->level=3;
                    if($request->input('scholarship')=='1' || $request->input('scholarship')==6 || $request->input('scholarship')==7){
                        if($request->input('acadcoll')!=0){
                            $coll->course=$request->input('courseacad');
                            $coll->name= $request->input('acadcoll');
                            if($request->input('acadcoll')=="MMSU"){
                                $coll->college= $request->input('colle');
                            }
                        }
                        $coll->save();
                }     
                }
                if($request->input('scholarship')=='3'){
                    $coll = new School;
                    $coll->student_id = $student->id;
                    $coll->level=3;
                    $coll->course=$request->input('coursetv');
                    $coll->name= $request->input('tvcoll');
                    $coll->year=$request->input('sy');
                    $coll->sem=$request->input('sem');
                    $coll->save();
                }
                
               
            }    
            if($request->input('scholarship')==5){
                $coll = new School;
                $coll->student_id = $student->id;
                $coll->level=3;
                if($request->input('scholarship')=='5'){
                    $coll->course=$request->input('coursedom');
                    $coll->name= $request->input('domschool');
                }
                $coll->save();                
                $coll1 = new School;
                $coll1->student_id = $student->id;
                $coll1->level=4;
                $coll1->course="LAW";
                $coll1->name= $request->input('lawschool');
                $coll1->college= "LAW";                
                $coll1->save();
            }       
            $records = new Record;
            $records->GWA=0;
            $records->scholartype = $request->input('scholarship');
            $records->student_id=$student->id;
            $records->comserve=0;
            $records->schoolyear_id=$request->input('sy');
            if($request->input('yl')!=""){
                $records->yearlvl=$request->input('yl');
            }
            if($request->input('gl')!=""){
                $records->grade_lvl=$request->input('gl');
            }
            $records->sem=$request->input('sem');
            if($request->input('scholarship')==3 || $request->input('scholarship')==5 || $request->input('scholarship')==6 || $request->input('scholarship')==4){
                $records->statactive=1;
            }
            else{
                $records->statactive=0;
            }
            
            $records->staff=Auth::user()->id;
            $records->save();
            if($request->input('inter')){
                $student->result_interview=$request->input('inter');
                $student->save();
            }
            if($request->input('inter1')){
                $student->result_interview1=$request->input('inter1');
                $student->save();
            }
            if($request->input('sen')!=null && $request->input('anto')!=null && $request->input('ana') && $request->input('syn') && $request->input('num') && $request->input('in')!=null){
                $examrecords = new Examrecords;
                $examrecords->sem=$records->sem;
                $examrecords->student_id=$student->id;
                $examrecords->schoolyear_id=$records->schoolyear_id;
                $examrecords->scholartype=$student->scholartype;
                $examrecords->sentence_score=$request->input('sen');
                $examrecords->antonym_score=$request->input('anto');
                $examrecords->analogy_score=$request->input('ana');
                $examrecords->synonym_score=$request->input('syn');
                $examrecords->math_score=$request->input('num');
                $examrecords->in_score=$request->input('in');
                $examrecords->score=$request->input('in')+$request->input('num')+$request->input('syn')+$request->input('ana')+$request->input('anto')+$request->input('sen');
                $examrecords->num_item=95;
                $examrecords->save();
            }

            return view('student.congrats');
        }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
         $users = User::all();
         $brgy = Brgy::all();
         $brgy1 = Brgy::all();
         $mun1 = Municipality::all();
         $mun = Municipality::all();
         $courseacad=AcadCourses::all();
         $courseTV=TVCourses::all();
         $remark=Remark::where('student_id',$student->id)->get()->count();
         $sen = SHSchools::all();
         return view('student.show',['senior'=>$sen,'rem'=>$remark,'users'=>$users,'courseTV'=>$courseTV,'courseacad'=>$courseacad,'brgy'=>$brgy,'mun'=>$mun,'brgy1'=>$brgy1,'mun1'=>$mun1])->with('student',$student);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $tcor = TVCourses::all()->sortBy('name');
        $cor = AcadCourses::all()->sortBy('name');
        $town2 = DB::table("municipalities")->pluck("name","id");
        $town1 = DB::table("municipalities")->pluck("name","id");
        $sy = Schoolyear::all();
        $shscl = SHSchools::all()->sortBy('name');
        $student = Student::where('id',$id)->first();
        return view('student.edit',['shscl'=>$shscl,'town2' => $town2,'town1' => $town1,'sy'=>$sy,'cor'=>$cor,'tcor'=>$tcor])->with('student',$student);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //      
        $skills = explode(',', $request->input('skills1'));
        $filename='';
        if($request->file('pic1')){
            $filename=$student->fname.''.$student->lname.'.jpeg';
            $filename = str_replace(' ','',$filename);
            $photo = $request->file('pic1');
            $destinationPath = public_path('/acad_img');
            $thumb_img = Image::make($photo->getRealPath())->resize(200, 200);
            $thumb_img->save($destinationPath.'/'.$filename,80);
            $filename='acad_img/'.$filename;
        }
        $student = Student::where('id',$student->id)->first();
        for($i=0;$i<count($skills);$i++){
            if($skills[0]==""){
                $i=1000;
            }
            else
            {
                    $skill = new Skills;
                    $skill->skillname=$skills[$i];
                    $skill->student_id = $student->id;
                    $skill->save();
            }
        }
   
        if($request->input('ip')!=null){
            $student->ip = $request->input('ip');  
        } 
        if($filename!=null){
            $student->pic=$filename;
        }
        
        if($request->input('suf')!=''){
            $student->suffix=strtoupper($request->input('suf'));
        }
        
        if($request->input('gwatv')!=''){
            $student->pgrade=$request->input('gwatv');
            if($student->apgrades==0){
                $student->apgrades=1;
            }
           
        }
        if($request->input('fname')!=''){
            $student->fname=strtoupper($request->input('fname'));
        }
        if($request->input('mi')!=''){
            $student->mname=strtoupper($request->input('mi'));
        }
        if($request->input('lname')!=''){
            $student->lname=strtoupper($request->input('lname'));
        }
        if($request->input('sex')!=''){
            $student->gender=$request->input('sex');
        }
        if($request->input('dob')!=''){
            $student->dob=$request->input('dob');
        }
        if($request->input('contact')!=''){
            $student->contact=$request->input('contact');
        }
        if($request->input('contact1')!=''){
            $student->contact1=$request->input('contact1');
        }
        if($request->input('email')!=''){
            $student->email=$request->input('email');
        }
        if($request->input('email1')!=''){
            $student->email1=$request->input('email1');
        }
        if($request->input('skill')!=''){
            $student->skills=$request->input('skill');
        }
        if($request->input('state')!='' && $request->input('city')!=''){
            //permanent Address
            $student->cur_mun=$request->input('state');
            $student->cur_brgy=$request->input('city');
        }
        if($request->input('state1')!='' && $request->input('city1')!=''){
            //Boarding Address
            $student->perma_mun=$request->input('state1');
            $student->perma_brgy=$request->input('city1'); 
        }
        if($request->input('elem')!=''){
            $find = School::where('level','0')->where('student_id',$student->id)->first();
            if($find==''){
                $elem = new School;
                $elem->student_id = $student->id;
                $elem->level=0;
                $elem->name= $request->input('elem');
                $elem->year= $request->input('elemgrad');
                $elem->save();
            }
            else{
                $find->name= $request->input('elem');
                if($request->input('elemgrad')!=''){
                $find->year= $request->input('elemgrad');
                }
                $find->save();
            }
        }
        if($request->input('hs')!=''){
            $find = School::where('level','1')->where('student_id',$student->id)->first();
                if($find==''){
                $hs = new School;
                $hs->student_id = $student->id;
                $hs->level=1;
                $hs->name= $request->input('hs');
                $hs->year= $request->input('hsgrad');
                $hs->save();
                }
                else{
                    $find->name= $request->input('hs');
                    if($request->input('hsgrad')!=''){
                    $find->year= $request->input('hsgrad');
                    }
                $find->save();
                }
        }
        if($request->input('sh')!='' || $request->input('track')!=''){
            $find = School::where('level','2')->where('student_id',$student->id)->first();
            if($find!=''){
                    if($request->input('sh')!=''){
                    $find->name= $request->input('sh');
                    }
                
                    if($request->input('shgrad')!=''){
                        $find->year= $request->input('hsgrad');
                    }
                    if($request->input('track')!=''){
                        $find->course= $request->input('track');
                    }
                $find->save();
            }
            else{
                $hs = new School;
                $hs->student_id = $student->id;
                $hs->level=2;
                $hs->name= $request->input('sh');
                $hs->course= $request->input('track');
                $hs->year= $request->input('shgrad');
                $hs->save();
            }
                
        }
        if($student->scholartype =='5' || $student->scholartype =='8'){
            $coll = School::where('level','4')->where('student_id',$student->id)->first();
            return $coll;
            if(!$coll){
                $coll1 = new School;
                $coll1->student_id = $student->id;
                $coll1->level=4;
                if($student->scholartype =='5'){
                    $coll1->course="DOM";
                    $coll1->name= "MMSU";
                    $coll1->college= "domspe";  
                }
                else{
                    $coll1->course="LAW";
                    $coll1->name= $request->input('lawschool');
                    $coll1->college= "LAW";  
                }
               
                             
                $coll1->save();
            }
        }
        $coll = School::where('level','3')->where('student_id',$student->id)->first();
        if($coll == null){
            
                if($student->scholartype =='1'  || $student->scholartype == '6' || $student->scholartype == '7'){
                    if($request->input('courseacad')!='' && $request->input('acadcoll')){
                    $coll = new School;
                    $coll->student_id = $student->id;
                    $coll->level=3;
                    $coll->course=$request->input('courseacad');
                    $coll->name= $request->input('acadcoll');
                    if($request->input('acadcoll')=="MMSU"){
                        $coll->college= $request->input('colle');
                    }
                    $coll->save();
                    }
                }
                if($student->scholartype =='3'){
                    if($coll){
                        $coll->course=$request->input('coursetv');
                        $coll->name= $request->input('tvcoll');
                    }
                    else{
                        $coll = new School;
                        $coll->level="3";
                        $coll->student_id=$student->id;
                        $coll->course=$request->input('coursetv');
                        $coll->name= $request->input('tvcoll');
                    }
                   
                    
                    $coll->save();
                }         
                
        }
        if($coll != null)
        {
            $tempo=0;
            if($student->scholartype =='1'  || $student->scholartype == '6' || $student->scholartype == '7'){
                
                
                if($request->input('courseacad')!=''){
                $coll->course=$request->input('courseacad');
                $tempo=1;
                }
                if($request->input('acadcoll')!=''){
                $coll->name= $request->input('acadcoll');
                $tempo=1;
                }
                if($request->input('acadcoll')=="MMSU"){
                $coll->college= $request->input('colle');
                $tempo=1;
                }
                if($tempo==1){                    
                    $coll->save();
                }                
            }
            if($student->scholartype =='5'){
                if($request->input('coursedom')!=''){
                    $coll->course=$request->input('coursedom');
                    $tempo=1;
                    }
                    if($request->input('domschool')!=''){
                    $coll->name= $request->input('domschool');
                    $tempo=1;
                    }
                    if($tempo==1){
                        $coll->save();
                    }
            }
            if($student->scholartype =='3'){
                if($request->input('coursetv')!='0'){
                $coll->course=$request->input('coursetv');
                $tempo=1;
                }
                if($request->input('tvcoll')!='0'){
                $coll->name= $request->input('tvcoll');
                $tempo=1;
                }
                if($tempo==1){
                    $coll->save();
                }
            }         
            
        }
        if($request->input('mparent')!='' || $request->input('moccupation')!="" || $request->input('mcontact')!="" || $request->input('madd')!="" || $request->input('mage')!=""){
            $find=Parents::where('student_id',$student->id)->where('type',0)->first();
                if($find==""){
                    $mpar = new Parents;
                    $mpar->pname = $request->input('mparent');
                    $mpar->student_id = $student->id;
                    if($request->input('mcontact')!=""){
                    $mpar->contact= $request->input('mcontact');
                    }
                    if($request->input('moccupation')!=""){  
                    $mpar->occupation= $request->input('moccupation');
                    }
                    if($request->input('madd')!=""){  
                    $mpar->address= $request->input('madd');
                    }
                    if($request->input('mage')!=""){
                    $mpar->age= $request->input('mage');
                    }
                    $mpar->type= 0;
                    $mpar->save();
                }
                else{
                        if($request->input('mparent')!=""){
                        $find->pname= $request->input('mparent');
                        }
                        if($request->input('mcontact')!=""){
                        $find->contact= $request->input('mcontact');
                        }
                        if($request->input('moccupation')!=""){  
                        $find->occupation= $request->input('moccupation');
                        }
                        if($request->input('madd')!=""){  
                        $find->address= $request->input('madd');
                        }
                        if($request->input('mage')!=""){
                        $find->age= $request->input('mage');
                        }
                        $find->save();
                }
              }
              if($request->input('fparent')!='' || $request->input('foccupation')!="" || $request->input('fcontact')!="" || $request->input('fadd')!="" || $request->input('fage')!=""){
                $find=Parents::where('student_id',$student->id)->where('type',1)->first();
                if($find==""){
                    $fpar = new Parents;
                    $fpar->pname = $request->input('fparent');
                    $fpar->student_id = $student->id;
                    if($request->input('fcontact')!=""){
                    $fpar->contact= $request->input('fcontact');
                    }
                    if($request->input('foccupation')!=""){  
                    $fpar->occupation= $request->input('foccupation');
                    }
                    if($request->input('fadd')!=""){  
                    $fpar->address= $request->input('fadd');
                    }
                    if($request->input('fage')!=""){
                    $fpar->age= $request->input('fage');
                    }
                    $fpar->type= 1;
                    $fpar->save();
                }
                else{
                        if($request->input('fparent')!=""){
                            $find->pname= $request->input('fparent');
                        }
                        if($request->input('fcontact')!=""){
                            $find->contact= $request->input('fcontact');
                        }
                        if($request->input('foccupation')!=""){  
                            $find->occupation= $request->input('foccupation');
                        }
                        if($request->input('fadd')!=""){  
                            $find->address= $request->input('fadd');
                        }
                        if($request->input('fage')!=""){
                            $find->age= $request->input('fage');
                        }
                        $find->save();
                }
            }
            if($request->input('aplet')!=''){
                $student->apletter=$request->input('aplet');
            }
            if($request->input('apgr')!=''){
                $student->apgrades=$request->input('apgr');
            }
            if($request->input('gmoral')!=''){
                $student->goodmoral=$request->input('gmoral');
            }
            if($request->input('nso')!=''){
                $student->bcert=$request->input('nso');
            }
            if($request->input('bclear')!=''){
                $student->bclear=$request->input('bclear');
            }
            if($request->input('indigent')!=''){
                $student->incert=$request->input('indigent');
            }    
            if($request->input('scholarship')!=''){
                $student->scholartype=$request->input('scholarship');
                $student->result_interview=0;
                $student->result_exam=0;
                $student->result_interview1=0;
            }
        $student->staff=Auth::user()->id;
        $student->save();
            return redirect()->action(
                    'StudentController@show', ['id' => $student->id]
                );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }
    public function mlResult(Request $request){
            $input = request()->validate([
                'sem' => 'required',
                'sy' => 'required',
            ]);
            $inf1=$request->input('go1');
            $sss=$request->input('rep11');
            $seperated=$request->input('g2');
            $legends=$request->input('gx');
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
            if($stype==6 || $stype==7){
                $query="";
                $query ="SELECT students.*,records.*
                FROM records INNER JOIN students ON records.student_id=students.id              
                where records.scholartype=$stype and records.schoolyear_id=$sy and records.sem=$sem 
                and students.created_at>1 and records.spcase=0 and records.statactive=1";                   
                    $query=$query." ORDER by lname,fname";                    
                
                $users = DB::select($query);
                        $students = collect();
                        $tempacad=AcadCourses::all();   
                        foreach($users as $users){   
                            $cs=0;   
                            $municipality="";   
                            $mun=Municipality::where('id',$users->cur_mun)->get();
                            foreach($mun as $mun){
                                $municipality=$mun->name;
                            }    
                            $dob=$users->dob;                       
                            $lg=0;
                            $cou='';
                            $h=0;
                            $i++;
                            $reqs=1;
                            $yll=0;                  
                            $gwa=$users->pgrade;  
                            $school="";
                            $couward="N/A";
                            $levelss='1';
                            if($users->grade_lvl!=''){
                                $clvl=$users->grade_lvl;
                            }
                            if($users->yearlvl!=''){
                                $clvl=$users->yearlvl;
                            }                                 
                                switch($clvl){
                                    case 1:$yll="I";break;
                                    case 2:$yll="II";break;
                                    case 3:$yll="III";break;
                                    case 4:$yll="IV";break;
                                    case 5:$yll="V";break;
                                    case 7:$yll="7";break;
                                    case 8:$yll="8";break;
                                    case 9:$yll="9";break;
                                    case 10:$yll="10";break;
                                    case 11:$yll="11";break;
                                    case 12:$yll="12";break;
                                }
                                
                                if($yll<11 && $yll>5){
                                   $levelss='1';   
                                }
                                if($yll==11 || $yll==12){
                                    $levelss='2';             
                                 }
                                 if($yll=='I' || $yll=='II' || $yll=='III' || $yll=='IV' || $yll=='V'){
                                    $levelss='3'; 
                                    $lg=1;        
                                 }
                                
                                $schools=School::where('student_id',$users->student_id)->
                                    where('level',$levelss)->get();    
                                    $levelss=$schools;
                                    foreach($schools as $skl){
                                        if($skl->course!=0){
                                            $couward=$skl->course;
                                        }  
                                        if($skl->level==3){
                                            $school=$skl->name." ".$skl->college;
                                            $course=$skl->course;
                                            $temp=$tempacad->find($course);
                                            $cou=$temp['abvr'];
                                        }
                                        else{
                                        $senior=SHSchools::where('id',$skl->name)->get();   
                                            foreach($senior as $sen){
                                                $school=$sen->name;
                                            }   
                                        }                                    
                                    }     
                                $name=$users->fname;
                                if($users->suffix!=""){
                                $name=$users->lname.", ".$name." ".$users->suffix." ".$users->mname;
                                }    
                                else{
                                    $name=$users->lname.", ".$name." ".$users->mname;   
                                }                                
                                if($sem==1){
                                    $ptemp=2;
                                    $psy=$users->schoolyear_id-1;
                                }
                                else{
                                    $ptemp=1;
                                    $psy=$users->schoolyear_id;
                                }                                
                                $prev=Record::where('student_id',$users->student_id)
                                ->where('scholartype',$stype)->where('schoolyear_id',$psy)->where('sem',$ptemp)->where('statactive',1)->count();
                                if($prev>0){
                                    $prev=Record::where('student_id',$users->student_id)
                                ->where('scholartype',$stype)->where('schoolyear_id',$psy)->where('sem',$ptemp)->where('statactive',1)->first();
                                $gwa=$prev->GWA;
                                $cs=$prev->comserve;
                                }
                                $pers="None";
                                if($users->person!=null){
                                    $pers=$users->person;
                                }                                
                                    if($sss==1 && $lg==1){
                                        $students->push(['cs'=>$cs,'dob'=>$dob,'gender'=>$users->gender,'mun'=>$municipality,'per'=>$pers,'statss'=>$users->statactive,'reqs'=>$reqs,'gropus'=>$users->ip,'num'=>$i,'id'=>$users->id,'school'=>$school,'name'=>$name,'course'=>$cou,'yl'=>$yll,'gwa'=>$gwa,"c1"=>$users->contact,"c2"=>$users->contact1,'sid'=>$users->student_id,'levelss'=>$levelss]);
                                    }
                                    if($sss==0 && $lg==0){
                                        $students->push(['cs'=>$cs,"c1"=>$users->contact,"c2"=>$users->contact1,'dob'=>$dob,'gender'=>$users->gender,'mun'=>$municipality,'per'=>$pers,'statss'=>$users->statactive,'reqs'=>$reqs,'gropus'=>$users->ip,'num'=>$i,'id'=>$users->id,'school'=>$school,'name'=>$name,'course'=>$couward,'yl'=>$yll,'gwa'=>$gwa,'sid'=>$users->student_id,'levelss'=>$levelss]);
                                    }
                                        
                                     
                        }
                        $i=0;
                        
                        if($sss==0){
                            if($stype==7){
                            $students= $students->sortBy(['school','name']);
                            $students = $students->sortBy(function ($product, $key) {
                                return $product['school'].$product['name'];
                            });
                        }
                            $students->values()->all();
                            return view('student.amasterlist2nd',['in'=>$inf1,'stype'=>$stype,'staff'=>$staff,'i'=>$i,'semester'=>$semester,'syear'=>$syear])->with("students",$students);    
                        }
                        else{
                            $students->values()->all();
                            return view('student.amasterlist3rd',['in'=>$inf1,'dob'=>$dob,'stype'=>$stype,'staff'=>$staff,'i'=>$i,'semester'=>$semester,'syear'=>$syear])->with("students",$students);    
                        }
                        
            }    
        if($stype==1){
            $query="";
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
                $students3 = collect();
                $tempacad=AcadCourses::all();
                foreach($users as $users){
                    $cs=0;
                    $mun=Municipality::where('id',$users->cur_mun)->get();
                    foreach($mun as $mun){
                        $municipality=$mun->name;
                    }                   
                    $gwa= collect();
                    $yll="";
                    $dob=$users->dob;
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
                    ->where('scholartype',1)
                    ->where('statactive',1)
                    ->where('sem',$ptemp)->count();
                    $tempo=0;
                    if($prev==0){
                        $gwa->push($users->pgrade);
                        $tempo=1;
                    }   
                    else{
                        $prev=Record::where('student_id',$users->student_id)
                        ->where('schoolyear_id',$psy)
                        ->where('sem',$ptemp)->get()->first();
                        $gwa=$prev->gwa;
                        $cs=$prev->comserve;
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
                        if($request->input('scl')=='1'){
                            if($tempo!=1){
                                if($users->ip!=4){                           
                                    if($users->name=="MMSU"){
                                        $students1->push(['cs'=>$cs,"c1"=>$users->contact,"c2"=>$users->contact1,'dob'=>$dob,'gender'=>$users->gender,'municipality'=>$municipality,'num'=>$i,'id'=>$users->id,'school'=>$users->name,'lname'=>$users->lname,'fname'=>$name,'coll'=>$users->college,'course'=>$cou,'yl'=>$yll,'gwa'=>$gwa,'tem'=>$tempo,'op'=>1]);
                                    }
                                    else{
                                        $students2->push(['cs'=>$cs,"c1"=>$users->contact,"c2"=>$users->contact1,'dob'=>$dob,'gender'=>$users->gender,'municipality'=>$municipality,'num'=>$i,'id'=>$users->id,'school'=>$users->name,'lname'=>$users->lname,'fname'=>$name,'coll'=>$users->college,'course'=>$cou,'yl'=>$yll,'gwa'=>$gwa,'tem'=>$tempo,'op'=>1]);
                                    }
                                    $students3->push(['cs'=>$cs,"c1"=>$users->contact,"c2"=>$users->contact1,'dob'=>$dob,'gender'=>$users->gender,'municipality'=>$municipality,'num'=>$i,'id'=>$users->id,'school'=>$users->name,'lname'=>$users->lname,'fname'=>$name,'coll'=>$users->college,'course'=>$cou,'yl'=>$yll,'gwa'=>$gwa,'tem'=>$tempo,'op'=>1]);
                                }
                                $i++; 
                            }
                            
                        }
                        else if($request->input('scl')=='2'){
                            if($tempo==1){
                                if($users->ip!=4 && $users->ip!=5 && $users->ip!=6 && $users->ip!=7){                           
                                    if($users->name=="MMSU"){
                                        $students1->push(['cs'=>$cs,"c1"=>$users->contact,"c2"=>$users->contact1,'dob'=>$dob,'gender'=>$users->gender,'municipality'=>$municipality,'num'=>$i,'id'=>$users->id,'school'=>$users->name,'lname'=>$users->lname,'fname'=>$name,'coll'=>$users->college,'course'=>$cou,'yl'=>$yll,'gwa'=>$gwa,'tem'=>$tempo,'op'=>2]);
                                    }
                                    else{
                                        $students2->push(['cs'=>$cs,"c1"=>$users->contact,"c2"=>$users->contact1,'dob'=>$dob,'gender'=>$users->gender,'municipality'=>$municipality,'num'=>$i,'id'=>$users->id,'school'=>$users->name,'lname'=>$users->lname,'fname'=>$name,'coll'=>$users->college,'course'=>$cou,'yl'=>$yll,'gwa'=>$gwa,'tem'=>$tempo,'op'=>2]);
                                    }
                                    $students3->push(['cs'=>$cs,"c1"=>$users->contact,"c2"=>$users->contact1,'dob'=>$dob,'gender'=>$users->gender,'municipality'=>$municipality,'num'=>$i,'id'=>$users->id,'school'=>$users->name,'lname'=>$users->lname,'fname'=>$name,'coll'=>$users->college,'course'=>$cou,'yl'=>$yll,'gwa'=>$gwa,'tem'=>$tempo,'op'=>2]);
                                }
                                $i++; 
                            }
                            
                        }
                        else{
                            if($users->ip!=4 && $users->ip!=5 && $users->ip!=6 && $users->ip!=7){                           
                                if($users->name=="MMSU"){
                                    $students1->push(['cs'=>$cs,"c1"=>$users->contact,"c2"=>$users->contact1,'dob'=>$dob,'gender'=>$users->gender,'municipality'=>$municipality,'num'=>$i,'id'=>$users->id,'school'=>$users->name,'lname'=>$users->lname,'fname'=>$name,'coll'=>$users->college,'course'=>$cou,'yl'=>$yll,'gwa'=>$gwa,'tem'=>$tempo,'op'=>0]);
                                }
                                else{
                                    $students2->push(['cs'=>$cs,"c1"=>$users->contact,"c2"=>$users->contact1,'dob'=>$dob,'gender'=>$users->gender,'municipality'=>$municipality,'num'=>$i,'id'=>$users->id,'school'=>$users->name,'lname'=>$users->lname,'fname'=>$name,'coll'=>$users->college,'course'=>$cou,'yl'=>$yll,'gwa'=>$gwa,'tem'=>$tempo,'op'=>0]);
                                }
                                $students3->push(['cs'=>$cs,"c1"=>$users->contact,"c2"=>$users->contact1,'dob'=>$dob,'gender'=>$users->gender,'municipality'=>$municipality,'num'=>$i,'id'=>$users->id,'school'=>$users->name,'lname'=>$users->lname,'fname'=>$name,'coll'=>$users->college,'course'=>$cou,'yl'=>$yll,'gwa'=>$gwa,'tem'=>$tempo,'op'=>0]);
                            }
                        $i++; 
                        }
                        
                }
                $i=0;
                $j=0;
                $students1->groupBy('id');
                return view('student.result',['in'=>$inf1,'legends'=>$legends,'sep'=>$seperated,'staff'=>$staff,'j'=>$j,'i'=>$i,'semester'=>$semester,'syear'=>$syear,'students2'=>$students3,'students1'=>$students2,'g1'=>$request->input('g1'),'sst'=>$request->input('scl')])->with("students",$students1);            
        }
        if($stype==2){
            $stats=0;
            if($request->input('scl')=='2'){      
                $stats=1;   
            }
            $query="";
            $query ="SELECT students.*,records.*, schools.* 
            FROM records INNER JOIN students ON records.student_id=students.id 
            INNER JOIN schools ON records.student_id=schools.student_id 
            where students.scholartype=$stype and records.schoolyear_id=$sy and records.sem=$sem and 
            schools.level=2 and students.created_at>1 and records.statactive=$stats"; 
                $query=$query." ORDER by lname,fname";
                $users = DB::select($query);
                $students = collect();
                foreach($users as $users){
                    $cou="";
                    $senior="";
                    $yll="";
                    $gwa=$users->pgrade;  
                   
                        $senior=SHSchools::where('id',$users->name)->get();   
                        foreach($senior as $sen){
                            $senior=$sen->name;
                        }                        
                        $cou=$users->course;
                        $clvl=$users->grade_lvl;                       
                    switch($clvl){
                        case 11:$yll="11";break;
                        case 12:$yll="12";break;
                    }
                    $name=$users->lname.", ".$users->fname." ".$users->mname;
                        if($users->suffix!=""){
                        $name=$name." ".$users->suffix;
                        }
                        $ptemp=0;
                        $reqs=1;
                        $psy=0;         
                        $students->push(['gender'=>$users->gender,'num'=>$i,'id'=>$users->id,'schl'=>$senior,'name'=>$name,'course'=>$cou,'gl'=>$yll]);                                             
                }
                return view('student.caapmasterlist',['in'=>$inf1,'i'=>$i,'semester'=>$semester,'syear'=>$syear])->with("students",$students);
        }
        if($stype==3){
            $query="SELECT records.student_id, students.*,schools.*,records.* 
                FROM records 
                INNER JOIN students ON records.student_id=students.id 
                INNER JOIN schools ON records.student_id=schools.student_id 
                where records.schoolyear_id=$sy and records.sem=$sem and 
                students.scholartype=$stype and schools.level=3 and records.statactive=1";
                $query=$query." ORDER by name,lname,fname";
                $users = DB::select($query);
                $students = collect();
                $students1 = collect();
                $temptv=TVCourses::all();  
                            
                foreach($users as $users){
                    $mun=Municipality::where('id',$users->cur_mun)->get();
                    foreach($mun as $mun){
                        $municipality=$mun->name;
                    }  
                    $dob=$users->dob;
                    $cs=0;
                    $course=$users->course;
                    $temp=$temptv->find($course);
                    $cou=$temp['abvr'];
                    $school=$users->name;
                    $ren=0;
                    $ptemp=0;
                    $dob=$users->dob;
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
                        ->where('scholartype',3)
                        ->where('sem',$ptemp)->count();
                        if($prev==0){
                            $gwa=$users->pgrade;
                        }   
                        else{
                            $prev=Record::where('student_id',$users->student_id)
                            ->where('schoolyear_id',$psy)
                            ->where('sem',$ptemp)->first();
                            $gwa=$prev->GWA;
                            $cs=$prev->comserve;
                            $ren=1;
                        } 
                    $name=$users->lname." ,".$users->fname." ".$users->mname." ".$users->suffix;
                    $noschool=$school;
                    
                    if($school=="DATA"){
                        $noschool="DCCP";
                    }
                        if($gwa>1){
                            $students->push(['cs'=>$cs,"c1"=>$users->contact,"c2"=>$users->contact1,'dob'=>$dob,'mun'=>$municipality,'gender'=>$users->gender,'name'=>$name,'school'=>$noschool,'course'=>$cou,'grade'=>$gwa,'stat'=>$ren]);
                        }          
                    } 
                    return view('student.tvmasterlist',['in'=>$inf1,'staff'=>$staff,'g1'=>$request->input('g1'),'i'=>$i,'semester'=>$semester,'syear'=>$syear])->with("students",$students);
                    }
        if($stype==4){
            
                $query="";
                $query ="SELECT students.*,records.*, schools.* 
                FROM records INNER JOIN students ON records.student_id=students.id 
                INNER JOIN schools ON records.student_id=schools.student_id 
                where records.scholartype=$stype and records.schoolyear_id=$sy and records.sem=$sem and 
                schools.level=2 and students.created_at>1 and records.statactive=1";                
                    $query=$query." ORDER by lname,fname";
                    $users = DB::select($query);
                    $students = collect();
                    $tempacad=AcadCourses::all();
                    $ei=1;
                    
                    if($request->input('scl')=='1'){
                        $ei=0;
                    }
                    foreach($users as $users){
                        $mun=Municipality::where('id',$users->cur_mun)->get();
                            foreach($mun as $mun){
                                $municipality=$mun->name;
                            }  
                            $dob=$users->dob;
                            $cs=0;
                        $cou="";
                        $senior="";
                        $yll="";
                        $gwa=$users->pgrade;  
                       
                            $senior=SHSchools::where('id',$users->name)->get();   
                            foreach($senior as $sen){
                                $senior=$sen->name;
                            }                        
                            $cou=$users->course;
                            $clvl=$users->grade_lvl;   
                        
                          
                        switch($clvl){
                            case 11:$yll="11";break;
                            case 12:$yll="12";break;
                        }
                        $name=$users->fname;
                            
                            $ptemp=0;
                            $reqs=1;
                            $psy=0;
                                if($sem==1){
                                    $ptemp=2;
                                    $psy=$users->schoolyear_id-1;
                                }
                                else{
                                    $ptemp=1;
                                    $psy=$users->schoolyear_id;
                                }
                            $mnm=1;
                        $prev=Record::where('student_id',$users->student_id)
                                ->where('scholartype',$stype)->count();
                        $x=0;
                        $tear=0;
                        $prev1=Record::where('student_id',$users->student_id)
                                ->where('schoolyear_id',$psy)->where('sem',$ptemp)
                                ->where('scholartype',$stype)->count();   
                                $prev2=Record::where('student_id',$users->student_id)
                                ->where('schoolyear_id',$psy)->where('sem',$ptemp)
                                ->where('statactive',$mnm)
                                ->where('scholartype',$stype)->get();
                                foreach($prev2 as $pe){
                                    $gwa=$pe->GWA;
                                    $cs=$pe->comserve;
                                }
                        if($request->input('scl')==''){                                          
                            if($prev1==""){    
                                $x=1;
                            }                            
                            $name=ucwords(mb_strtolower($users->lname))." ,".ucwords(mb_strtolower($users->fname))." ".strtoupper($users->mname)." ";     
                                if($users->suffix!=""){
                                    $name=$name." ".strtoupper($users->suffix);
                                    }
                            if($users->ip!=4){
                                $students->push(['cs'=>$cs,"c1"=>$users->contact,"c2"=>$users->contact1,'dob'=>$dob,'mun'=>$municipality,'gender'=>$users->gender,'prev'=>$prev,'num'=>$i,'id'=>$users->id,'schl'=>$senior,'name'=>$name,'course'=>$cou,'gl'=>$yll,'gwa'=>$gwa,'x'=>$x]);                                             
                                $i++;
                            }  
                        }
                        if($request->input('scl')=='1'){ 
                            $tear=1;   
                            if($prev1>0){                                
                                $name=ucwords(mb_strtolower($users->lname))." ,".ucwords(mb_strtolower($users->fname))." ".strtoupper($users->mname)." ";     
                                if($users->suffix!=""){
                                    $name=$name." ".strtoupper($users->suffix);
                                    }
                                    if($users->ip!=4){
                                        $students->push(['cs'=>$cs,"c1"=>$users->contact,"c2"=>$users->contact1,'dob'=>$dob,'mun'=>$municipality,'x'=>$x,'gender'=>$users->gender,'prev'=>$gwa,'num'=>$i,'id'=>$users->id,'schl'=>$senior,'name'=>$name,'course'=>$cou,'gl'=>$yll,'gwa'=>$gwa]);                                             
                                        $i++;
                                    }       
                            }
                        }                        
                        if($request->input('scl')=='2'){ 
                            $tear=2;
                            $remp=0;        
                            if($prev1==0){                                               
                                $name=ucwords(mb_strtolower($users->lname))." ,".ucwords(mb_strtolower($users->fname))." ".strtoupper($users->mname)." ".strtoupper($users->suffix);
                                    if($users->apletter==0 || $users->apgrades==0 || $users->goodmoral==0 || $users->bcert==0 || $users->bclear==0 || $users->incert==0){
                                        $reqs=0;
                                    }     
                                    if($users->ip!=4){                
                                    $students->push(['cs'=>$cs,"c1"=>$users->contact,"c2"=>$users->contact1,'dob'=>$dob,'mun'=>$municipality,'x'=>$x,'gender'=>$users->gender,'prev'=>$gwa,'num'=>$i,'id'=>$users->id,'schl'=>$senior,'name'=>$name,'course'=>$cou,'gl'=>$yll,'gwa'=>$gwa]);                         
                                    $i++;  
                                    }                                  
                            }
                        }  
                    }
                $i=0;
                return view('student.shmasterlist',['in'=>$inf1,'legends'=>$legends,'g1'=>$request->input('g1'),'tear'=>$tear,'ei'=>$ei,'i'=>$i,'semester'=>$semester,'syear'=>$syear])->with('students',$students);
                      
        }
        if($stype==5 || $stype==8){
            $query="";
            $query ="SELECT students.*,records.*, schools.* 
            FROM records INNER JOIN students ON records.student_id=students.id 
            INNER JOIN schools ON records.student_id=schools.student_id 
            where records.scholartype=$stype and records.schoolyear_id=$sy and records.sem=$sem and 
            schools.level=4 and students.created_at>1 and records.statactive=1";                            
                $query=$query." ORDER by lname,fname";
                $users = DB::select($query);
                $students = collect();
                $ei=1;
                foreach($users as $users){                    
                    $mun=Municipality::where('id',$users->cur_mun)->get();
                    foreach($mun as $mun){
                        $municipality=$mun->name;
                    }  
                    $cou="";
                    $senior="";
                    $yll="";
                    $dob=$users->dob;
                    $gwa=$users->pgrade;                       
                    $cou=$users->course;
                    $clvl=$users->yearlvl;   
                    switch($clvl){
                        case 1:$yll="I";break;
                        case 2:$yll="II";break;
                        case 3:$yll="III";break;
                        case 4:$yll="IV";break;
                    }
                    $name=$users->fname;                        
                        $ptemp=0;
                        $reqs=1;
                        $psy=0;
                            if($sem==1){
                                $ptemp=2;
                                $psy=$users->schoolyear_id-1;
                            }
                            else{
                                $ptemp=1;
                                $psy=$users->schoolyear_id;
                            }
                        $mnm=1;
                    $prev=Record::where('student_id',$users->student_id)
                    ->where('scholartype',$stype)->count();
            $x=0;
            $tear=0;
            $prev1=Record::where('student_id',$users->student_id)
                    ->where('schoolyear_id',$psy)->where('sem',$ptemp)
                    ->where('scholartype',$stype)->count();   
                    $prev2=Record::where('student_id',$users->student_id)
                    ->where('schoolyear_id',$psy)->where('sem',$ptemp)
                    ->where('statactive',$mnm)
                    ->where('scholartype',$stype)->get();
                    foreach($prev2 as $pe){
                        $gwa=$pe->GWA;
                        $cs=$pe->comserve;
                    }
                        $name=ucwords(mb_strtolower($users->lname))." ,".ucwords(mb_strtolower($users->fname))." ".strtoupper($users->mname)." ";     
                            if($users->suffix!=""){
                                $name=$name." ".strtoupper($users->suffix);
                                }
                        if($users->ip!=4){
                            $students->push(['gender'=>$users->gender,"c1"=>$users->contact,"c2"=>$users->contact1,'dob'=>$dob,'mun'=>$municipality,'prev'=>$prev,'num'=>$i,'id'=>$users->id,'schl'=>$senior,'name'=>$name,'course'=>$cou,'gl'=>$yll,'gwa'=>$gwa,'x'=>$x]);                                             
                            $i++;
                        }  
                    
                }
            $i=0;
            return view('student.dommasterlist',['stype'=>$stype,'in'=>$inf1,'g1'=>$request->input('g1'),'ei'=>$ei,'i'=>$i,'semester'=>$semester,'syear'=>$syear])->with('students',$students);
                  
    }
        }   

    
//Basic Search
    public function search(Request $request) 
        {         
            if($request->ajax())             
            {             
                $output="";                 
                $products=DB::table('students')->where('fname','LIKE','%'.$request->search."%")
                ->orWhere('lname','LIKE','%'.$request->search."%")
                ->orderBy('lname','desc')->orderBy('id','asc')->get(); 
                if($products)
                    {                     
                    foreach ($products as $key => $product) {                       
                        $output.='<tr>'.      
                        '<td>   '.$product->id.'   .'.$product->lname.' '.strtoupper($product->suffix).','.$product->fname.' '.$product->mname.'</td>'.
                        '<td>
                        <a href="/student/'.$product->id.'" class="btn btn-info" role="button">Profile</a>
                        <a href="/record/create/'.$product->id .'" class="btn btn-danger" role="button">Renew</a>
                        <a class="btn btn-info" href="/ratings/'.$product->id.'" role="button">Rating</a>
                        </td>'.
                        '</tr>';                    
                        }
                    return Response($output);
                    }
                else
                    {
                         $output='';
                         return Response($output);
                    }
           }
        }
        
    public function ratings($id){
        $student=Student::where('id',$id)->first();
        $records=Record::where('student_id',$id)->first();
        if($records!=''){
            $yearlvl="";
            $lvl='';
            $lvlper=100;
            if($student->scholartype==1){
                $yearlvl=$records->yearlvl;
                switch($yearlvl){
                    case 1:$lvl='I';$lvlper=$lvlper-30;break;
                    case 2:$lvl='II';$lvlper=$lvlper-20;break;
                    case 3:$lvl='III';$lvlper=$lvlper-10;break;
                    case 4:$lvl='IV';break;
                    case 5:$lvl='V';break;
                }
            }
        }
        else{
            $lvl='';
            $lvlper=0;
        }
        
        if($student->scholartype==4){
            $yearlvl=$records->grade_lvl; 
            switch($yearlvl){
                case 11:$lvl='11';break;
                case 22:$lvl='12';break;
            }
        }
        return view('student.ratings',['student'=>$student,'lvl'=>$lvl,'lvlper'=>$lvlper]);        
    }


    public function cratings($id){
        $student=Student::where('id',$id)->first();
        $records=Record::where('student_id',$id)->first();
        if($records!=''){
            $yearlvl="";
            $lvl='';
            $lvlper=100;
            if($student->scholartype==1){
                $yearlvl=$records->yearlvl;
                switch($yearlvl){
                    case 1:$lvl='I';$lvlper=$lvlper-15;break;
                    case 2:$lvl='II';$lvlper=$lvlper-10;break;
                    case 3:$lvl='III';$lvlper=$lvlper-5;break;
                    case 4:$lvl='IV';break;
                    case 5:$lvl='V';break;
                }
            }
            else{
                $yearlvl=$records->grade_lvl;
                switch($yearlvl){
                    case 11:$lvl='I';$lvlper=$lvlper-5;break;
                    case 12:$lvl='II';$lvlper;break;                    
                }
            }
        }
        else{
            $lvl='';
            $lvlper=0;
        }
        
        if($student->scholartype==4){
            $yearlvl=$records->grade_lvl; 
            switch($yearlvl){
                case 11:$lvl='11';break;
                case 22:$lvl='12';break;
            }
        }
        return view('student.ratingsc',['student'=>$student,'lvl'=>$lvl,'lvlper'=>$lvlper]);        
    }
    

    public function ratingresult(Request $request){
        $records=Record::where('student_id',$request->input('student'))->first();
        $student=Student::where('id',$request->input('student'))->first();
        $x=0;
        if($request->input('pers')!=null){
            $student->person=$request->input('pers');
            $student->save();
            $x=1;
        }
        if($request->input('exam')!=null){
            $student->result_exam=$request->input('exam');
            $student->save();
            $x=1;
        }
        if($request->input('inter')!=null){
            $student->result_interview=$request->input('inter');
            $student->save();
            $x=1;
        }
        if($request->input('inter1')!=null){
            $student->result_interview1=$request->input('inter1');
            $student->save();
            $x=1;
        }
        if($request->input('pg')){
            $student->pgrade=$request->input('pg');
            $student->save();
            $x=1;
        }
        if($request->input('yl')){
            $records->yearlvl=$request->input('yl');
            $records->save();
            $x=1;
        }
        if($request->input('gl')){
            $records->grade_lvl=$request->input('gl');
            $records->save();
            $x=1;
        }
        if($records!=''){
            if($records->statactive==0){
                if($student->scholartype==1){
                    $total=$request->input('inter')+$request->input('exam')+$request->input('ylper')+$request->input('pgrade');
                    $total=$total/4;
                    
                }
                if($student->scholartype==4){
                    
                    $total=$request->input('inter')+$request->input('exam')+$request->input('pgrade');
                    $total=$total/3;
                   
                }
            }
        }
        $examrecords=Examrecords::where('student_id',$student->id)->first();
        if($examrecords==null){
            if($request->input('sen')!=null && $request->input('anto')!=null && $request->input('ana') && $request->input('syn') && $request->input('num') && $request->input('in')!=null){
                $examrecords = new Examrecords;
                $examrecords->sem=$records->sem;
                $examrecords->student_id=$student->id;
                $examrecords->schoolyear_id=$records->schoolyear_id;
                $examrecords->scholartype=$student->scholartype;
                $examrecords->sentence_score=$request->input('sen');
                $examrecords->antonym_score=$request->input('anto');
                $examrecords->analogy_score=$request->input('ana');
                $examrecords->synonym_score=$request->input('syn');
                $examrecords->math_score=$request->input('num');
                $examrecords->in_score=$request->input('in');
                $examrecords->score=$request->input('in')+$request->input('num')+$request->input('syn')+$request->input('ana')+$request->input('anto')+$request->input('sen');
                $examrecords->num_item=95;
                $examrecords->save();
            }
            
        }
        else{
            if($request->input('sen')!=""){
                $examrecords->sentence_score=$request->input('sen');
                $examrecords->save();
                
            }
            if($request->input('anto')!=""){
                $examrecords->antonym_score=$request->input('anto');
                $examrecords->save();
            }
            if($request->input('ana')!=""){
                $examrecords->analogy_score=$request->input('ana');
                $examrecords->save();
            }
            if($request->input('syn')!=""){
                $examrecords->synonym_score=$request->input('syn');
                $examrecords->save();
            }
            if($request->input('num')!=""){
                $examrecords->math_score=$request->input('num');
                $examrecords->save();
            }
            if($request->input('in')!=""){
                $examrecords->in_score=$request->input('in');
                $examrecords->save();
            }
            if($x==1){
                $student->staff=Auth::user()->id;
                $student->save();
                $x=0;
            }
        }
        
        return redirect()->action(
            'StudentController@show', ['id' => $request->input("student")]
        );
    }

    public function masterList()
    {
        $sy = Schoolyear::all();
        return view('student.masterlist',['sy'=>$sy]);
    }
    
    public function eilisting()
    {
        $sy = Schoolyear::all();
        return view('student.eilist',['sy'=>$sy]);
    }
    public function eiResult(Request $request)
    {
        
        $staff=Auth::user()->name;
        $stype=$request->input('scholarship');
        $sss=$request->input('rep11');
        $sem=$request->input('sem');
        $semester="";
        switch($sem){
            case 1:$semester="1st";break;
            case 2:$semester="2nd";break;
        }
        $sy=$request->input('sy');
        $syear=Schoolyear::where('id',$sy)->get();
        $i=0;
        $sal2=0;
        $scl=3;
        if($stype==4){
            $scl=2;
        }
        if($stype==6 || $stype==7){
            $query="";
            $query ="SELECT students.*,records.*
            FROM records INNER JOIN students ON records.student_id=students.id              
            where records.scholartype=$stype and records.schoolyear_id=$sy and records.sem=$sem 
            and students.created_at>1 and records.spcase=0";
            
            if($stype==7 && $sss==1){
                $query=$query." ORDER by yearlvl,lname,fname";  
            }
            if($stype==7 && $sss==0){
                $query=$query." ORDER by lname,fname";  
            }
            $users = DB::select($query);
                    $students = collect();
                    $tempacad=AcadCourses::all();   
                    foreach($users as $users){  
                        $lg=0;
                        $status='Fail';
                        $totaltemp=0;
                        $cou='';
                        $h=0;
                        $i++;
                        $reqs=1;
                        $yll=0;                  
                        $gwa=$users->pgrade;  
                        $school="";
                        $couward="N/A";
                        $levelss='1';
                        if($users->grade_lvl!=''){
                            $clvl=$users->grade_lvl;
                        }
                        if($users->yearlvl!=''){
                            $clvl=$users->yearlvl;
                        }                                 
                            switch($clvl){
                                case 1:$yll="I";break;
                                case 2:$yll="II";break;
                                case 3:$yll="III";break;
                                case 4:$yll="IV";break;
                                case 5:$yll="V";break;
                                case 7:$yll="7";break;
                                case 8:$yll="8";break;
                                case 9:$yll="9";break;
                                case 10:$yll="10";break;
                                case 11:$yll="11";break;
                                case 12:$yll="12";break;
                            }
                            
                            if($yll<11 && $yll>5){
                               $levelss='1';   
                            }
                            if($yll==11 || $yll==12){
                                $levelss='2';             
                             }
                             if($yll=='I' || $yll=='II' || $yll=='III' || $yll=='IV' || $yll=='V'){
                                $levelss='3'; 
                                $lg=1;          
                                $sal2++; 
                             }
                            
                            $schools=School::where('student_id',$users->student_id)->
                                where('level',$levelss)->get();    
                                $levelss=$schools;
                                foreach($schools as $skl){
                                    if($skl->course!=0){
                                        $couward=$skl->course;
                                    }  
                                    if($skl->level==3){
                                        $school=$skl->name." ".$skl->college;
                                        $course=$skl->course;
                                        $temp=$tempacad->find($course);
                                        $cou=$temp['abvr'];
                                    }
                                    else{
                                    $senior=SHSchools::where('id',$skl->name)->get();   
                                        foreach($senior as $sen){
                                            $school=$sen->name;
                                        }   
                                    }                                    
                                }     
                            $name=$users->fname;
                            if($users->suffix!=""){
                            $name=$users->lname.", ".$name." ".$users->suffix." ".$users->mname;
                            }    
                            else{
                                $name=$users->lname.", ".$name." ".$users->mname;   
                            }
                            $town=Municipality::where('id',$users->cur_mun)->first();                              
                            $mun=$town->name; 
                            $brgy=Brgy::where('id',$users->cur_brgy)->first();                              
                            $brgy1=$brgy->name; 
                            if($sem==1){
                                $ptemp=2;
                                $psy=$users->schoolyear_id-1;
                            }
                            else{
                                $ptemp=1;
                                $psy=$users->schoolyear_id;
                            }
                            $prev=Record::where('student_id',$users->student_id)
                            ->where('scholartype',$stype)->where('schoolyear_id',$psy)->where('sem',$ptemp)->where('statactive',1)->count();
                            $pers="None";
                            if($users->person!=null){
                                $pers=$users->person;
                            }
                            $mother="N/A";
                            $father="N/A";
                            $guardian="N/A";
                                $parents=Parents::where('student_id',$users->student_id)->get(); 
                                foreach($parents as $p){
                                    if($p->type==0){
                                        $mother=$p->pname;
                                    }
                                    if($p->type==1){
                                        $father=$p->pname;
                                    }
                                    if($p->type==2){
                                        $guardian=$p->pname;
                                    }
                                }
                                $totaltemp=($gwa+$users->result_interview)/2;
                                $totaltemp=round($totaltemp,2);
                                
                                if($sss==1 && $lg==1){
                                    $students->push(['per'=>$pers,'statss'=>$users->statactive,'reqs'=>$reqs,'gropus'=>$users->ip,'num'=>$i,'id'=>$users->id,'school'=>$school,'name'=>$name,'course'=>$cou,'yl'=>$yll,'gwa'=>$gwa,'mun'=>$mun,"c1"=>$users->contact,"c2"=>$users->contact1,'sid'=>$users->student_id,'brgy'=>$brgy1,'mother'=>$mother,'father'=>$father,'guardian'=>$guardian,'levelss'=>$levelss,'ped'=>$users->result_interview,'tots'=>$totaltemp,'ss'=> $status]);
                                }
                                if($sss==0 && $lg==0){                                    
                                    $students->push(['per'=>$pers,'statss'=>$users->statactive,'reqs'=>$reqs,'gropus'=>$users->ip,'num'=>$i,'id'=>$users->id,'school'=>$school,'name'=>$name,'course'=>$couward,'yl'=>$yll,'gwa'=>$gwa,'mun'=>$mun,"c1"=>$users->contact,"c2"=>$users->contact1,'sid'=>$users->student_id,'brgy'=>$brgy1,'mother'=>$mother,'father'=>$father,'guardian'=>$guardian,'levelss'=>$levelss,'ped'=>$users->result_interview,'tots'=>$totaltemp,'ss'=> $status]);
                                }
                                    
                                 
                    }
                    $i=0;
                    $students=$students->sortByDesc('tots');
                    if($sss==0){
                        return view('student.eiresult3',['stype'=>$stype,'staff'=>$staff,'i'=>$i,'semester'=>$semester,'syear'=>$syear])->with("students",$students);    
                    }
                    else{
                        return view('student.eiresult4',['stype'=>$stype,'staff'=>$staff,'i'=>$i,'semester'=>$semester,'syear'=>$syear])->with("students",$students);    
                    }
                    
        }    
    if($stype==1 || $stype==4){
        if($request->input('rep')%2==0){                 
                $query="";
                $query ="SELECT students.*,records.*, schools.* 
                FROM records INNER JOIN students ON records.student_id=students.id 
                INNER JOIN schools ON records.student_id=schools.student_id 
                where students.scholartype=$stype and records.schoolyear_id=$sy and records.sem=$sem and 
                schools.level=$scl and students.created_at>1 and records.spcase=0 and records.statactive=0"; 
                if($stype==1){
                    $query=$query." ORDER by lname,fname";
                }
                else{
                    $query=$query." ORDER by lname,fname";
                }
                    $users = DB::select($query);
                    $students = collect();
                    $tempacad=AcadCourses::all();                    
                    foreach($users as $users){
                        $cou="";
                        $senior="";
                        $yll="";
                        $gwa=$users->pgrade;  
                        if($stype==1){
                            $clvl=$users->yearlvl; 
                            $yll=0; 
                            switch($clvl){
                                case 1:$yll=85;
                                case 2:$yll=90;
                                case 3:$yll=95;
                                case 4:$yll=100;
                                case 5:$yll=100;
                            }
                            $course=$users->course;
                            $temp=$tempacad->find($course);
                            $cou=$temp['abvr'];
                            
                        }   
                        else{
                            $senior=SHSchools::where('id',$users->name)->get();   
                            foreach($senior as $sen){
                                $senior=$sen->name;
                            }                        
                            $cou=$users->course;
                            $clvl=$users->grade_lvl;   
                            $total=(40*$users->result_interview/100)+(15*$users->pgrade/100)+(30*$users->result_interview1/100)+(15*$users->result_exam/100);
                            $tot=$total;                             
                        }
                        switch($clvl){
                            case 1:$yll="I";break;
                            case 2:$yll="II";break;
                            case 3:$yll="III";break;
                            case 4:$yll="IV";break;
                            case 5:$yll="V";break;
                            case 11:$yll="11";break;
                            case 12:$yll="12";break;
                        }
                        $name=$users->fname;
                            if($users->suffix!=""){
                            $name=$name." ".$users->suffix;
                            }    
                            $college="";
                            if($users->name=="MMSU"){
                                $college=$users->college;
                            }
                            else{
                                $college=$users->name;
                            }  
                            $town=Municipality::where('id',$users->cur_mun)->first();                              
                            $mun=$town->name; 
                            $brgy=Brgy::where('id',$users->cur_brgy)->first();                              
                            $brgy1=$brgy->name; 
                            $ptemp=0;
                            $reqs=1;
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
                                ->where('scholartype',$stype)->where('schoolyear_id',$psy)->where('sem',$ptemp)->where('statactive',1)->count();
                            $pers="None";
                            if($users->person!=null){
                                $pers=$users->person;
                            }
                            if($stype==1 || $stype==4){
                                $xxx=0;
                                $yyy=0;
                                if($gwa<4){
                                    if($gwa<1.75){$yyy=100;}
                                    else if($gwa<2){$yyy=95;}
                                    else if($gwa<2.25){$yyy=90;}
                                    else {$yyy=85;}
                                }
                                switch($yll){
                                    case "I":$xxx=85;break;
                                    case "II":$xxx=90;break;
                                    case "III":$xxx=95;break;
                                    case "V":$xxx=100;break;
                                    case "IV":$xxx=100;break;
                                    case 11:$xxx=95;break;
                                    case 12:$xxx=100;break;
                                }
                                $temp123=0;
                                if($request->input('rep')==4){                                    
                                    $tot=(($users->result_exam*.5)+($users->result_interview*.4)+($xxx*.10));
                                }else{
                                    $tot=(($users->result_exam*.2)+($users->result_interview*.3)+($users->result_interview1*.30)+($xxx*.10)+($yyy*.10));
                                }                                
                                
                            }
                            $mother="N/A";
                            $father="N/A";
                            $guardian="N/A";
                                $parents=Parents::where('student_id',$users->student_id)->get(); 
                                foreach($parents as $p){
                                    if($p->type==0){
                                        $mother=$p->pname;
                                    }
                                    if($p->type==1){
                                        $father=$p->pname;
                                    }
                                    if($p->type==2){
                                        $guardian=$p->pname;
                                    }
                                }
                            if($prev==1){                               
                                    if($users->apletter==0 || $users->apgrades==0 || $users->goodmoral==0 || $users->bcert==0 || $users->bclear==0 || $users->incert==0){
                                        $reqs=0;
                                    }                     
                                    if($stype==1){
                                    $students->push(['per'=>$pers,'statss'=>$users->statactive,'reqs'=>$reqs,'gropus'=>$users->ip,'num'=>$i,'id'=>$users->id,'school'=>$users->name,'mname'=>$users->mname,'lname'=>$users->lname,'fname'=>$name,'coll'=>$college,'course'=>$cou,'yl'=>$yll,'exam'=>$users->result_exam,'ped'=>$users->result_interview,'inydo'=>$users->result_interview1,'total'=>$tot,'gwa'=>$gwa,'mun'=>$mun,"c1"=>$users->contact,"c2"=>$users->contact1,'sid'=>$users->student_id,'brgy'=>$brgy1,'tt'=>$temp123,'mother'=>$mother,'father'=>$father,'guardian'=>$guardian]);
                                                                             
                                    }else{                     
                                    $students->push(['per'=>$pers,'statss'=>$users->statactive,'reqs'=>$reqs,'gropus'=>$users->ip,'num'=>$i,'id'=>$users->id,'school'=>$senior,'mname'=>$users->mname,'lname'=>$users->lname,'fname'=>$name,'coll'=>$college,'course'=>$cou,'yl'=>$yll,'exam'=>$users->result_exam,'ped'=>$users->result_interview,'inydo'=>$users->result_interview1,'total'=>$tot,'gwa'=>$gwa,'mun'=>$mun,"c1"=>$users->contact,"c2"=>$users->contact1,'sid'=>$users->student_id,'brgy'=>$brgy1,'tt'=>$temp123,'mother'=>$mother,'father'=>$father,'guardian'=>$guardian]);                          
                                    
                                }                                                        
                                    $i++;
                            }
                            else{
                                if($users->apletter==0 || $users->apgrades==0 || $users->goodmoral==0 || $users->bcert==0 || $users->bclear==0 || $users->incert==0){
                                    $reqs=0;
                                } 
                                if($users->statactive==0){
                                    if($stype==1){
                                        $students->push(['per'=>$pers,'statss'=>$users->statactive,'reqs'=>$reqs,'gropus'=>$users->ip,'num'=>$i,'id'=>$users->id,'school'=>$users->name,'mname'=>$users->mname,'lname'=>$users->lname,'fname'=>$name,'coll'=>$college,'course'=>$cou,'yl'=>$yll,'exam'=>$users->result_exam,'ped'=>$users->result_interview,'inydo'=>$users->result_interview1,'total'=>$tot,'gwa'=>$gwa,'mun'=>$mun,"c1"=>$users->contact,"c2"=>$users->contact1,'sid'=>$users->student_id,'brgy'=>$brgy1,'tt'=>$temp123,'mother'=>$mother,'father'=>$father,'guardian'=>$guardian]);
                                                                                 
                                        }else{                     
                                        $students->push(['per'=>$pers,'statss'=>$users->statactive,'reqs'=>$reqs,'gropus'=>$users->ip,'num'=>$i,'id'=>$users->id,'school'=>$senior,'mname'=>$users->mname,'lname'=>$users->lname,'fname'=>$name,'coll'=>$college,'course'=>$cou,'yl'=>$yll,'exam'=>$users->result_exam,'ped'=>$users->result_interview,'inydo'=>$users->result_interview1,'total'=>$tot,'gwa'=>$gwa,'mun'=>$mun,"c1"=>$users->contact,"c2"=>$users->contact1,'sid'=>$users->student_id,'brgy'=>$brgy1,'tt'=>$temp123,'mother'=>$mother,'father'=>$father,'guardian'=>$guardian]);                          
                                        }                                                        
                                        $i++;
                                        
                                }
                                
                            }
                           
                           
                    }
                    $i=0;
                    $j=0;      
                    //$student=$students->sortBy('lname');            
                    $student=$students->sortByDesc('total');
                    if($request->input('rep')==0){ 
                    return view('student.eiresult',['stype'=>$stype,'staff'=>$staff,'j'=>$j,'i'=>$i,'semester'=>$semester,'syear'=>$syear])->with("students",$student);   
                    }        
                    if($request->input('rep')==2){ 
                        return view('student.eiresult1',['stype'=>$stype,'staff'=>$staff,'j'=>$j,'i'=>$i,'semester'=>$semester,'syear'=>$syear])->with("students",$student);   
                        } 
                    if($request->input('rep')==4){ 
                        return view('student.eiresult2',['stype'=>$stype,'staff'=>$staff,'j'=>$j,'i'=>$i,'semester'=>$semester,'syear'=>$syear])->with("students",$student);   
                            } 
                }
                if($request->input('rep')==1){    
                    $query ="SELECT students.*,records.*, schools.* 
                    FROM records INNER JOIN students ON records.student_id=students.id 
                    INNER JOIN schools ON records.student_id=schools.student_id 
                    where students.scholartype=$stype and records.schoolyear_id=$sy and records.sem=$sem and 
                    schools.level=$scl and students.created_at>1 and records.statactive=0";
                    if($stype==1){
                        $query=$query." ORDER by lname,fname";
                    }
                    else{
                        $query=$query." ORDER by  name,lname,fname ASC";            
                    }                  
                    $users = DB::select($query);
                    $students1 = collect();
                    $tempacad=AcadCourses::all();
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
                                 $cou=$temp['name'];
                                 return $cou;
                                    if($users->result_exam>0 || $users->result_interview>0 || $users->result_interview1>0 && $users->ip!=2 && $users->ip!=3 && $users->ip!=4 && $users->ip!=5){
                                        $students1->push(['mun'=>$mun,'num'=>$i,'id'=>$users->id,'school'=>$users->name,'lname'=>$users->lname,'fname'=>$name,'coll'=>$users->college,'course'=>$cou,'yl'=>$yll,'gwa'=>$gwa,'sid'=>$users->student_id]);
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
                                if($total>74 && $users->pgrade>84 && $users->ip!=4 && $users->ip!=5 && $users->ip!=6 && $users->ip!=7){
                                    $students1->push(['mun'=>$mun,'num'=>$i,'id'=>$users->id,'school'=>$senior,'lname'=>$users->lname,'mname'=>$users->mname,'fname'=>$name,'coll'=>$users->college,'course'=>$cou,'yl'=>$yll,'gwa'=>$gwa,'total'=>$tot,'sid'=>$users->student_id]);
                                    }
                                    $i++;                                
                            }                           
                    }
                    $i=0;
                    $j=0;
                    $students1=$students1->sortBy('school');                    
                    return view('student.result1',['stype'=>$stype,'staff'=>$staff,'j'=>$j,'i'=>$i,'semester'=>$semester,'syear'=>$syear])->with("students",$students1);
            }                
        }
        
    }

    Public Function updateall(){
        $sy = Schoolyear::all();
        return view('student.adminupdate',['sy'=>$sy]);
    }
    public function auResult(Request $request)
    {
        $i=0;
        $students = collect();
        $stype=$request->input('scholarship');
        $sem=$request->input('sem');
        $semester="";
        switch($sem){
            case 1:$semester="1st";break;
            case 2:$semester="2nd";break;
        }
        $sy=$request->input('sy');
        $query ="SELECT students.*
        FROM records 
        INNER JOIN students ON records.student_id=students.id 
        INNER JOIN schools ON records.student_id=schools.student_id 
        where students.scholartype=$stype and records.schoolyear_id=$sy and records.sem=$sem and records.statactive=0 and schools.level=3 and students.created_at>1";
        $query=$query." ORDER by lname,fname";
        $users = DB::select($query);
        foreach($users as $users){
            $name=$users->fname;
                if($users->suffix!=""){
                   $name=$name." ".$users->suffix;
                }
                $students->push(['no'=>$i,'id'=>$users->id,'mname'=>$users->mname,'lname'=>$users->lname,'fname'=>$name,'contact'=>$users->contact]);
                $i++;
            }
        $i=count($students);
        return view('student.multiupdate',['i'=>$i,'sem'=>$sem,'sy'=>$sy])->with("students",$students);
    }
    public function updatedall(Request $request){
        $max=$request->input('total');
        $sem=$request->input('sem');
        $sy=$request->input('sy');
        $y=0;
        for($i=0;$i<$max;$i++){
            $y=0;
            $exam=$request->input('exam'.$i);
          
            $no=$request->input('id'.$i);
            $student = Student::where('id',$no)->first();
            if($request->input('exam'.$i)!=""){
                $student->result_exam=$exam;
                $y++;
            }
            
            if($y>1){
                $student->save(); 
            }
        }
        $sy = Schoolyear::all();
    }

    public function payrolllist()
    {
        $sy = Schoolyear::all();
        return view('student.payrolllist',['sy'=>$sy]);
    }

    public function mlPayroll(Request $request){
          
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
                $male=0;
                $female=0;            
                foreach($users as $users){    
                    if($users->gender=="Female"){
                        $female=$female+1;
                    }             
                    if($users->gender=="Male"){                        
                        $male=$male+1;
                    }   
                    $newDateFormat2 = date('M-d-Y', strtotime($users->dob));
                    $dob=$newDateFormat2;
                    $gen=$users->gender;
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
                    $vs=0;
                    if($prev==0){
                        $gwa->push($users->pgrade);
                        $tempo=1;
                    }   
                    else{
                        $prev1=Record::where('student_id',$users->student_id)
                        ->where('schoolyear_id',$psy)
                        ->where('sem',$ptemp)->first();
                        $gwa=$prev1->GWA;
                        $vs=$prev1->comserve;
                        
                    } 
                    switch($users->yearlvl){
                        case 1:$yll="I";break;
                        case 2:$yll="II";break;
                        case 3:$yll="III";break;
                        case 4:$yll="IV";break;
                        case 5:$yll="V";break;
                    }
                        $brgy="";
                        $name=$users->fname;
                        if($users->suffix!=""){
                        $name=$name." ".$users->suffix;                       
                        }
                        $town=Municipality::where('id',$users->cur_mun)->first();                              
                        $mun=$town->name;  
                        $brgys=Brgy::where('id',$users->cur_brgy)->first();
                        $brgy=$brgys->name;
                        $mother="N/A";
                        $father="N/A";
                        $guardian="N/A";
                        $parents=Parents::where('student_id',$users->student_id)->get(); 
                        
                        foreach($parents as $p){
                            if($p->type==0){
                                $mother=$p->pname;
                            }
                            if($p->type==1){
                                $father=$p->pname;
                            }
                            if($p->type==2){
                                $guardian=$p->pname;
                            }
                        }
                        if($users->ip!=4 && $users->ip!=5 && $users->ip!=6 && $users->ip!=7){
                            
                                $students1->push(['vs'=>$vs,'dob'=>$dob,'mun'=>$mun,'brgy'=>$brgy,'c1'=>$users->contact,'c2'=>$users->contact1,'gen'=>$gen,'municipality'=>$municipality,'num'=>$i,'id'=>$users->id,'school'=>$users->name,'lname'=>$users->lname,'fname'=>$name,'mname'=>$users->mname,'coll'=>$users->college,'course'=>$cou,'yl'=>$yll,'gwa'=>$gwa,'tem'=>$tempo,'father'=>$father,'mother'=>$mother,'temp'=>$tempo,'guardian'=>$guardian]);
                            
                        }
                    $i++;
                }
                
                $i=0;
                $j=0;
                $students1->groupBy('id');
                return view('student.presult',['male'=>$male,'female'=>$female,'stype'=>$stype,'staff'=>$staff,'j'=>$j,'i'=>$i,'semester'=>$semester,'syear'=>$syear,'students1'=>$students2])->with("students",$students1);            
        }
        if($stype==3){
            $query="SELECT records.student_id, students.*,schools.*,records.* 
            FROM records 
            INNER JOIN students ON records.student_id=students.id 
            INNER JOIN schools ON records.student_id=schools.student_id 
            where records.schoolyear_id=$sy and records.sem=$sem and students.scholartype=$stype and schools.level=3";
                $query=$query." ORDER by name,lname,fname";
                $users = DB::select($query);
                $students = collect();
                $students1 = collect();
                $yll="";
                $temptv=TVCourses::all();             
                $male=0;
                $female=0;            
                foreach($users as $users){    
                    if($users->gender=="Female"){
                        $female=$female+1;
                    }             
                    if($users->gender=="Male"){                        
                        $male=$male+1;
                    }   
                    $newDateFormat2 = date('M-d-Y', strtotime($users->dob));
                    $dob=$newDateFormat2;
                    $gen=$users->gender;
                    $course=$users->course;
                    $temp=$temptv->find($course);
                    $cou=$temp['abvr'];
                    $school=$users->name;
                    $ren=0;
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
                        if($prev==0){
                            $gwa=$users->pgrade;
                            $vs=$users->comserve;
                        }   
                        else{
                            $prev=Record::where('student_id',$users->student_id)
                            ->where('schoolyear_id',$psy)
                            ->where('sem',$ptemp)->first();
                            $gwa=$prev->GWA;
                            $vs=$prev->comserve;
                            $ren=1;                            
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
                        $town=Municipality::where('id',$users->cur_mun)->first();                              
                        $mun=$town->name;  
                        $brgys=Brgy::where('id',$users->cur_brgy)->first();
                        $brgy=$brgys->name;
                        $mother="";
                        $father="";                        
                        $guardian="N/A";
                        $parents=Parents::where('student_id',$users->student_id)->get(); 
                        foreach($parents as $p){
                            if($p->type==0){
                                $mother=$p->pname;
                            }
                            if($p->type==1){
                                $father=$p->pname;
                            }
                            if($p->type==2){
                                $guardian=$p->pname;
                            }
                        }
                        if($gwa>1){
                        $students1->push(['dob'=>$dob,'mun'=>$mun,'brgy'=>$brgy,'c1'=>$users->contact,'c2'=>$users->contact1,'gen'=>$gen,'mname'=>$users->mname,'lname'=>$users->lname,'fname'=>$name,'school'=>$school,'course'=>$cou,'grade'=>$gwa,'stat'=>$ren,'yl'=>$yll,'father'=>$father,'mother'=>$mother,'guardian'=>$guardian]);
                        }   
                                    
                    }   
                    $i=0;
                    if($request->input('scl')=='1'){
                        return view('student.presult',['male'=>$male,'female'=>$female,'stype'=>$stype,'staff'=>$staff,'i'=>$i,'semester'=>$semester,'syear'=>$syear])->with("students",$students);            
                    }
                    else{
                        return view('student.presult',['male'=>$male,'female'=>$female,'stype'=>$stype,'staff'=>$staff,'i'=>$i,'semester'=>$semester,'syear'=>$syear])->with("students",$students1);            
                    }
                    
            }
        if($stype==7){
            $try=$request->input('sclx');
            $query="";
                $query ="SELECT records.*, students.*,schools.* 
                FROM records 
                INNER JOIN students ON records.student_id=students.id 
                INNER JOIN schools ON records.student_id=schools.student_id 
                where students.scholartype=$stype and records.schoolyear_id=$sy and records.sem=$sem 
                and records.statactive=1";     
            $query=$query." ORDER by lname,fname";
            $male=0;
            $female=0;
            
            $users = DB::select($query);
                    $students1 = collect();
                    $tempacad=AcadCourses::all();   
                    foreach($users as $users){      
                        $municipality="";   
                        $mun=Municipality::where('id',$users->cur_mun)->get();
                        foreach($mun as $mun){
                            $municipality=$mun->name;
                        }      
                        if($users->gender=="Female"){
                                    $female=$female+1;
                                   
                        }             
                        if($users->gender=="Male"){                        
                                    $male=$male+1;
                        }                       
                        $lg=0;
                        $cou='';
                        $h=0;
                        $i++;
                        $reqs=1;
                        $yll=0;                  
                        $gwa=$users->pgrade;  
                        $school="";
                        $couward="N/A";
                        $levelss='1';
                        if($users->grade_lvl!=''){
                            $clvl=$users->grade_lvl;
                        }
                        if($users->yearlvl!=''){
                            $clvl=$users->yearlvl;
                        }                                 
                            switch($clvl){
                                case 1:$yll="I";break;
                                case 2:$yll="II";break;
                                case 3:$yll="III";break;
                                case 4:$yll="IV";break;
                                case 5:$yll="V";break;
                                case 7:$yll="7";break;
                                case 8:$yll="8";break;
                                case 9:$yll="9";break;
                                case 10:$yll="10";break;
                                case 11:$yll="11";break;
                                case 12:$yll="12";break;
                            }
                            
                            if($yll<11 && $yll>5){
                               $levelss='1';   
                            }
                            if($yll==11 || $yll==12){
                                $levelss='2';             
                             }
                             if($yll=='I' || $yll=='II' || $yll=='III' || $yll=='IV' || $yll=='V'){
                                $levelss='3'; 
                                $lg=1;        
                             }
                            
                            $schools=School::where('student_id',$users->student_id)->
                                where('level',$levelss)->get();    
                                $levelss=$schools;
                                foreach($schools as $skl){
                                    if($skl->course!=0){
                                        $couward=$skl->course;
                                    }  
                                    if($skl->level==3){
                                        $school=$skl->name." ".$skl->college;
                                        $course=$skl->course;
                                        $temp=$tempacad->find($course);
                                        $cou=$temp['abvr'];
                                    }
                                    else{
                                    $senior=SHSchools::where('id',$skl->name)->get();   
                                        foreach($senior as $sen){
                                            $school=$sen->name;
                                        }   
                                    }                                    
                                }     
                            $name=$users->fname;
                            if($users->suffix!=""){
                            $name=$name." ".$users->suffix;
                            }                               
                            if($sem==1){
                                $ptemp=2;
                                $psy=$users->schoolyear_id-1;
                            }
                            else{
                                $ptemp=1;
                                $psy=$users->schoolyear_id;
                            }
                            $prev=Record::where('student_id',$users->student_id)
                            ->where('scholartype',$stype)->where('schoolyear_id',$psy)->where('sem',$ptemp)->where('statactive',1)->count();
                            if($prev>0){
                                $prev=Record::where('student_id',$users->student_id)
                            ->where('scholartype',$stype)->where('schoolyear_id',$psy)->where('sem',$ptemp)->where('statactive',1)->first();
                            $gwa=$prev->GWA;
                            }
                            $town=Municipality::where('id',$users->cur_mun)->first();                              
                            $mun=$town->name;  
                            $brgys=Brgy::where('id',$users->cur_brgy)->first();
                            $brgy=$brgys->name;
                            $pers="None";
                            $mother="";
                        $father="";                        
                        $guardian="N/A";
                        $parents=Parents::where('student_id',$users->student_id)->get(); 
                        foreach($parents as $p){
                            if($p->type==0){
                                $mother=$p->pname;
                            }
                            if($p->type==1){
                                $father=$p->pname;
                            }
                            if($p->type==2){
                                $guardian=$p->pname;
                            }
                        }   
                            if($users->person!=null){
                                $pers=$users->person;
                            }                                
                   
                                    $students1->push(['guardian'=>$guardian,'father'=>$father,'mother'=>$mother,'brgy'=>$brgy,'dob'=>$users->dob,'gen'=>$users->gender,'mun'=>$municipality,'per'=>$pers,'statss'=>$users->statactive,'reqs'=>$reqs,'gropus'=>$users->ip,'num'=>$i,'id'=>$users->id,'school'=>$school,'fname'=>$name,'lname'=>$users->lname,'mname'=>$users->mname,'course'=>$cou,'yl'=>$yll,'gwa'=>$gwa,"c1"=>$users->contact,"c2"=>$users->contact1,'sid'=>$users->student_id,'levelss'=>$levelss]);
                            }
                    $i=0;
        }
        if($stype==6){
            $query="";
            $male=0;
            $female=0;
            $query ="SELECT students.*,records.*
            FROM records INNER JOIN students ON records.student_id=students.id              
            where records.scholartype=$stype and records.schoolyear_id=$sy and records.sem=$sem 
            and students.created_at>1  and records.statactive=1";                
            $query=$query." ORDER by lname,fname";
            $users = DB::select($query);
                    $students1 = collect();
                    $tempacad=AcadCourses::all();   
                    foreach($users as $users){      
                        $municipality="";   
                        $mun=Municipality::where('id',$users->cur_mun)->get();
                        foreach($mun as $mun){
                            $municipality=$mun->name;
                        }      
                        if($users->gender=="Female"){
                                    $female=$female+1;
                                   
                        }             
                        if($users->gender=="Male"){                        
                                    $male=$male+1;
                        }                       
                        $lg=0;
                        $cou='';
                        $h=0;
                        $i++;
                        $reqs=1;
                        $yll=0;                  
                        $gwa=$users->pgrade;  
                        $school="";
                        $couward="N/A";
                        $levelss='1';
                        if($users->grade_lvl!=''){
                            $clvl=$users->grade_lvl;
                        }
                        if($users->yearlvl!=''){
                            $clvl=$users->yearlvl;
                        }                                 
                            switch($clvl){
                                case 1:$yll="I";break;
                                case 2:$yll="II";break;
                                case 3:$yll="III";break;
                                case 4:$yll="IV";break;
                                case 5:$yll="V";break;
                                case 7:$yll="7";break;
                                case 8:$yll="8";break;
                                case 9:$yll="9";break;
                                case 10:$yll="10";break;
                                case 11:$yll="11";break;
                                case 12:$yll="12";break;
                            }
                            
                            if($yll<11 && $yll>5){
                               $levelss='1';   
                            }
                            if($yll==11 || $yll==12){
                                $levelss='2';             
                             }
                             if($yll=='I' || $yll=='II' || $yll=='III' || $yll=='IV' || $yll=='V'){
                                $levelss='3'; 
                                $lg=1;        
                             }
                            
                            $schools=School::where('student_id',$users->student_id)->
                                where('level',$levelss)->get();    
                                $levelss=$schools;
                                foreach($schools as $skl){
                                    if($skl->course!=0){
                                        $couward=$skl->course;
                                    }  
                                    if($skl->level==3){
                                        $school=$skl->name." ".$skl->college;
                                        $course=$skl->course;
                                        $temp=$tempacad->find($course);
                                        $cou=$temp['abvr'];
                                    }
                                    else{
                                    $senior=SHSchools::where('id',$skl->name)->get();   
                                        foreach($senior as $sen){
                                            $school=$sen->name;
                                        }   
                                    }                                    
                                }     
                            $name=$users->fname;
                            if($users->suffix!=""){
                            $name=$name." ".$users->suffix;
                            }                               
                            if($sem==1){
                                $ptemp=2;
                                $psy=$users->schoolyear_id-1;
                            }
                            else{
                                $ptemp=1;
                                $psy=$users->schoolyear_id;
                            }
                            $prev=Record::where('student_id',$users->student_id)
                            ->where('scholartype',$stype)->where('schoolyear_id',$psy)->where('sem',$ptemp)->where('statactive',1)->count();
                            if($prev>0){
                                $prev=Record::where('student_id',$users->student_id)
                            ->where('scholartype',$stype)->where('schoolyear_id',$psy)->where('sem',$ptemp)->where('statactive',1)->first();
                            $gwa=$prev->GWA;
                            }
                            $town=Municipality::where('id',$users->cur_mun)->first();                              
                            $mun=$town->name;  
                            $brgys=Brgy::where('id',$users->cur_brgy)->first();
                            $brgy=$brgys->name;
                            $pers="None";
                            $mother="";
                        $father="";                        
                        $guardian="N/A";
                        $parents=Parents::where('student_id',$users->student_id)->get(); 
                        foreach($parents as $p){
                            if($p->type==0){
                                $mother=$p->pname;
                            }
                            if($p->type==1){
                                $father=$p->pname;
                            }
                            if($p->type==2){
                                $guardian=$p->pname;
                            }
                        }   
                            if($users->person!=null){
                                $pers=$users->person;
                            }                                
                             
                                    $students1->push(['guardian'=>$guardian,'father'=>$father,'mother'=>$mother,'brgy'=>$brgy,'dob'=>$users->dob,'gen'=>$users->gender,'mun'=>$municipality,'per'=>$pers,'statss'=>$users->statactive,'reqs'=>$reqs,'gropus'=>$users->ip,'num'=>$i,'id'=>$users->id,'school'=>$school,'fname'=>$name,'lname'=>$users->lname,'mname'=>$users->mname,'course'=>$cou,'yl'=>$yll,'gwa'=>$gwa,"c1"=>$users->contact,"c2"=>$users->contact1,'sid'=>$users->student_id,'levelss'=>$levelss]);
                                
                                    
                                 
                    }
                    $i=0;
        }
        if($stype==4){$query="";
            $query ="SELECT students.*,records.*, schools.* 
                FROM records INNER JOIN students ON records.student_id=students.id 
                INNER JOIN schools ON records.student_id=schools.student_id 
                where records.scholartype=$stype and records.schoolyear_id=$sy and records.sem=$sem and 
                schools.level=2 and students.created_at>1 and records.statactive=1";                 
                $query=$query." ORDER by lname,fname";
                $users = DB::select($query);
                $students = collect();
                $students1 = collect();
                $tempacad=AcadCourses::all();
                $ei=1;
                if($request->input('scl')=='1'){
                    $ei=0;
                }
                $male=0;
                $female=0;            
                foreach($users as $users){    
                    if($users->gender=="Female"){
                        $female=$female+1;
                    }             
                    if($users->gender=="Male"){                        
                        $male=$male+1;
                    }   
                    $newDateFormat2 = date('M-d-Y', strtotime($users->dob));
                    $dob=$newDateFormat2;
                    $name="";
                    $cou="";
                    $senior="";
                    $yll="";
                    $gwa=$users->pgrade;  
                   
                        $senior=SHSchools::where('id',$users->name)->get();   
                        foreach($senior as $sen){
                            $senior=$sen->name;
                        }                        
                        $cou=$users->course;
                        $clvl=$users->grade_lvl;   
                    
                      
                    switch($clvl){
                        case 11:$yll="11";break;
                        case 12:$yll="12";break;
                    }
                   
                        $ptemp=0;
                        $reqs=1;
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
                            ->where('scholartype',$stype)->count();                          
                            $town=Municipality::where('id',$users->cur_mun)->first();                              
                            $mun=$town->name;  
                            $brgys=Brgy::where('id',$users->cur_brgy)->first();
                            $brgy=$brgys->name;
                            $course=$users->course;   
                    $gen=$users->gender;       
                    $mother="N/A";
                    $father="N/A";
                    $guardian="N/A";
                        $parents=Parents::where('student_id',$users->student_id)->get(); 
                        foreach($parents as $p){
                            if($p->type==0){
                                $mother=$p->pname;
                            }
                            if($p->type==1){
                                $father=$p->pname;
                            }
                            if($p->type==2){
                                $guardian=$p->pname;
                            }
                        }  
                        $fname=$users->fname;
                        if($users->suffix!=""){
                        $fname=$fname." ".$users->suffix;
                        }

                        if($request->input('scl')=='1'){ 
                            $tear=1;            
                            if($prev>0){
                                $prev1=Record::where('student_id',$users->student_id)
                                ->where('schoolyear_id',$psy)->where('sem',$ptemp)
                                ->where('statactive',1)
                                ->where('scholartype',$stype)->get();
                                foreach($prev1 as $pe){
                                    $gwa=$pe->GWA;
                                }
                                $vs=$users->comserve;
                                if($users->suffix!=""){
                                    $name=$name." ".strtoupper($users->suffix);
                                    }
                                    if($users->ip!=4){
                                        $students1->push(['dob'=>$dob,'vs'=>$vs,'mun'=>$mun,'brgy'=>$brgy,'c1'=>$users->contact,'c2'=>$users->contact1,'gen'=>$gen,'lname'=>$users->lname,'mname'=>$users->mname,'fname'=>$fname,'school'=>$senior,'course'=>$course,'grade'=>$gwa,'yl'=>$yll,'father'=>$father,'mother'=>$mother,'guardian'=>$guardian]);
                                        $i++;
                                    }       
                            }
                        }                        
                        if($request->input('scl')=='2'){ 
                            $vs=$users->comserve;
                            $tear=2;
                            $remp=0;
                            $prev1=0;
                            $prev1=Record::where('student_id',$users->student_id)
                                ->where('schoolyear_id',$psy)->where('sem',$ptemp)
                                ->where('scholartype',$stype)->count();                
                            if($prev1==0){                                               
                                $name=ucwords(mb_strtolower($users->lname))." ,".ucwords(mb_strtolower($users->fname))." ".strtoupper($users->mname)." ".strtoupper($users->suffix);
                                    if($users->apletter==0 || $users->apgrades==0 || $users->goodmoral==0 || $users->bcert==0 || $users->bclear==0 || $users->incert==0){
                                        $reqs=0;
                                    }     
                                    if($users->ip!=4){                
                                        $students1->push(['male'=>$male,'female'=>$female,'dob'=>$dob,'vs'=>$vs,'mun'=>$mun,'brgy'=>$brgy,'c1'=>$users->contact,'c2'=>$users->contact1,'gen'=>$gen,'lname'=>$users->lname,'mname'=>$users->mname,'fname'=>$fname,'school'=>$senior,'course'=>$course,'grade'=>$gwa,'yl'=>$yll,'father'=>$father,'mother'=>$mother,'guardian'=>$guardian]);
                                    $i++;  
                                    }                                  
                            }
                        }
                }
                    }
                    if($stype==5){
                                             
                        $query ="SELECT students.*,records.*, schools.* 
                        FROM records INNER JOIN students ON records.student_id=students.id 
                        INNER JOIN schools ON records.student_id=schools.student_id 
                        where records.scholartype=$stype and records.schoolyear_id=$sy and records.sem=$sem and 
                        schools.level=4 and students.created_at>1 and records.statactive=1";             
                        $query=$query." ORDER by lname,fname";
                        $users = DB::select($query);
                        $students1 = collect();
                        $male=0;
                        $female=0;            
                        foreach($users as $users){    
                            if($users->gender=="Female"){
                                $female=$female+1;
                            }             
                            if($users->gender=="Male"){                        
                                $male=$male+1;
                            }                 
                            $newDateFormat2 = date('M-d-Y', strtotime($users->dob));
                            $dob=$newDateFormat2;
                            $gen=$users->gender;
                            $mun=Municipality::where('id',$users->cur_mun)->get();
                            foreach($mun as $mun){
                                $municipality=$mun->name;
                            }                   
                            $gwa= collect();
                            $yll="";
                            $cou=$users->course;
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
                                $brgy="";
                                $name=$users->fname;
                                if($users->suffix!=""){
                                $name=$name." ".$users->suffix;                       
                                }
                                $town=Municipality::where('id',$users->cur_mun)->first();                              
                                $mun=$town->name;  
                                $brgys=Brgy::where('id',$users->cur_brgy)->first();
                                $brgy=$brgys->name;
                                $mother="N/A";
                                $father="N/A";
                                $guardian="N/A";
                                $parents=Parents::where('student_id',$users->student_id)->get(); 
                                foreach($parents as $p){
                                    if($p->type==0){
                                        $mother=$p->pname;
                                    }
                                    if($p->type==1){
                                        $father=$p->pname;
                                    }
                                    if($p->type==2){
                                        $guardian=$p->pname;
                                    }
                                }
                                if($users->ip!=4 && $users->ip!=5 && $users->ip!=6 && $users->ip!=7){
                                    
                                        $students1->push(['dob'=>$dob,'mun'=>$mun,'brgy'=>$brgy,'c1'=>$users->contact,'c2'=>$users->contact1,'gen'=>$gen,'municipality'=>$municipality,'num'=>$i,'id'=>$users->id,'school'=>$users->name,'lname'=>$users->lname,'fname'=>$name,'coll'=>$users->college,'course'=>$cou,'yl'=>$yll,'gwa'=>$gwa,'tem'=>$tempo,'father'=>$father,'mother'=>$mother,'temp'=>$tempo,'guardian'=>$guardian]);
                                    
                                }
                            $i++;
                        }
                    }
                    $i=0;
                    $j=0;
                    return view('student.presult',['male'=>$male,'female'=>$female,'stype'=>$stype,'staff'=>$staff,'j'=>$j,'i'=>$i,'semester'=>$semester,'syear'=>$syear])->with("students",$students1);
            
            
        
    }
    
}
