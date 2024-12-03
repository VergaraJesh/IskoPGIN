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

class SearcherController extends Controller
{
    //
    public function lgubrgylist(){
        $sy = Schoolyear::all();
        return view('student.lgulist1',['sy'=>$sy]);
    }
    public function lgubrgyresult(Request $request){
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
        $level=3;
        $students = collect();
        if($stype==4){
            $level=2;
        }
        if($request->input('scl')=='1'){ 
            $query ="SELECT records.*, students.*,schools.*,municipalities.name 
            FROM records 
            INNER JOIN students ON records.student_id=students.id 
            INNER JOIN schools ON records.student_id=schools.student_id 
            INNER JOIN municipalities ON students.cur_mun=municipalities.id
            where  records.scholartype=$stype and records.schoolyear_id=$sy and records.sem=$sem and records.statactive=1 and schools.level=$level";
            $query=$query." ORDER by municipalities.name,lname,fname";
            $users = DB::select($query);  
            foreach($users as $users){
                $contact=" ".$users->contact."/".$users->contact1;
                if($stype==4){
                    $total=(40*$users->result_interview/100)+(15*$users->pgrade/100)+(30*$users->result_interview1/100)+(15*$users->result_exam/100);
                    $tot=round($total); 
                    $muni="";
                    $brgys="";
                    if($total>74 && $users->pgrade>84 && $users->ip!=4 && $users->ip!=5 && $users->ip!=6 && $users->ip!=7){
                        $mun=Municipality::where('id',$users->cur_mun)->get();
                        $brgy=Brgy::where('id',$users->cur_brgy)->get();
                        foreach($mun as $m){
                            $muni=$m->name;
                        }
                        foreach($brgy as $m){
                            $brgys=$m->name;
                        }
                        
                        $students->push(['fname'=>$users->fname,'mun'=>$muni,'brgy'=>$brgys,'lname'=>$users->lname,'contact'=>$contact]);
                    }
                }
                if($stype==1){
                    $muni="";
                    $brgys="";
                    
                        $mun=Municipality::where('id',$users->cur_mun)->get();
                        $brgy=Brgy::where('id',$users->cur_brgy)->get();
                        foreach($mun as $m){
                            $muni=$m->name;
                        }
                        foreach($brgy as $m){
                            $brgys=$m->name;
                        }
                        $students->push(['fname'=>$users->fname,'mun'=>$muni,'brgy'=>$brgys,'lname'=>$users->lname,'contact'=>$contact]);
                    }
                
                
            }
            $i=0;
            $students=$students->sortBy('mun');
            return view('student.lguresult1',['i'=>$i,'stype'=>$stype,'sy'=>$syear,'sem'=>$semester])->with('students',$students);
        }
        else{
            if($stype!=3){
                $query ="SELECT students.*,records.*, schools.* 
                FROM records INNER JOIN students ON records.student_id=students.id 
                INNER JOIN schools ON records.student_id=schools.student_id 
                where students.scholartype=$stype and records.schoolyear_id=$sy and records.sem=$sem and 
                schools.level=$level and students.created_at>1 and records.statactive=0";
            }
            else{
                $query ="SELECT students.*,records.*, schools.* 
                FROM records INNER JOIN students ON records.student_id=students.id 
                INNER JOIN schools ON records.student_id=schools.student_id 
                where students.scholartype=$stype and records.schoolyear_id=$sy and records.sem=$sem and 
                schools.level=$level and students.created_at>1";
            }
            $query=$query." ORDER by lname,fname";
            $users = DB::select($query);     
            foreach($users as $users){
               
                if($stype==4){
                    $contact=" ".$users->contact."/".$users->contact1;
                    $total=(40*$users->result_interview/100)+(15*$users->pgrade/100)+(30*$users->result_interview1/100)+(15*$users->result_exam/100);
                    $tot=round($total); 
                    $muni="";
                    $brgys="";
                    if($total>74 && $users->pgrade>84 && $users->ip!=4 && $users->ip!=5 && $users->ip!=6 && $users->ip!=7){
                        $mun=Municipality::where('id',$users->cur_mun)->get();
                        $brgy=Brgy::where('id',$users->cur_brgy)->get();
                        foreach($mun as $m){
                            $muni=$m->name;
                        }
                        foreach($brgy as $m){
                            $brgys=$m->name;
                        }
                        $students->push(['fname'=>$users->fname,'mun'=>$muni,'brgy'=>$brgys,'lname'=>$users->lname,'contact'=>$contact]);
                    }
                }
                if($stype==1){
                    $contact=" ".$users->contact."/".$users->contact1;
                    $muni="";
                    $brgys="";
                    if($users->result_exam>0 && $users->result_interview>0 && $users->result_interview1>0 && $users->pgrade>84 && $users->ip!=4 && $users->ip!=5 && $users->ip!=6 && $users->ip!=7){
                        $mun=Municipality::where('id',$users->cur_mun)->get();
                        $brgy=Brgy::where('id',$users->cur_brgy)->get();
                        foreach($mun as $m){
                            $muni=$m->name;
                        }
                        foreach($brgy as $m){
                            $brgys=$m->name;
                        }
                        $students->push(['fname'=>$users->fname,'mun'=>$muni,'brgy'=>$brgys,'lname'=>$users->lname,'contact'=>$contact]);
                    }
                }
                if($stype==3){
                    $contact=" ".$users->contact."/".$users->contact1;
                    $muni="";
                    $brgys="";                   
                        $mun=Municipality::where('id',$users->cur_mun)->get();
                        $brgy=Brgy::where('id',$users->cur_brgy)->get();
                        foreach($mun as $m){
                            $muni=$m->name;
                        }
                        foreach($brgy as $m){
                            $brgys=$m->name;
                        }
                        $students->push(['fname'=>$users->fname,'mun'=>$muni,'brgy'=>$brgys,'lname'=>$users->lname,'contact'=>$contact]);
                    
                }
            }
            $i=0;
            $students=$students->sortBy('mun');
            return view('student.lguresult1',['i'=>$i,'stype'=>$stype,'sy'=>$syear,'sem'=>$semester])->with('students',$students);
        }
    }
    public function lgugolist(){
        $sy = Schoolyear::all();
        $skol = SHSchools::all()->sortBy('name');
        return view('student.lgulist2',['sy'=>$sy,'skol'=>$skol]);
    }
    public function lgugoresult(Request $request){
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
        $level=3;
        $students = collect();
        if($stype==4){
            $level=2;
        }
        $shs=$request->input('skol');
        if($request->input('skol')){
            $query ="SELECT students.*,records.*, schools.* 
                FROM records INNER JOIN students ON records.student_id=students.id 
                INNER JOIN schools ON records.student_id=schools.student_id 
                where students.scholartype=$stype and records.schoolyear_id=$sy and records.sem=$sem and 
                schools.level=$level and students.created_at>1 and schools.name=$shs";
        }
        else{
            $query ="SELECT students.*,records.*, schools.* 
                FROM records INNER JOIN students ON records.student_id=students.id 
                INNER JOIN schools ON records.student_id=schools.student_id 
                where students.scholartype=$stype and records.schoolyear_id=$sy and records.sem=$sem and 
                schools.level=$level and students.created_at>1";
        }
        $query=$query." ORDER by lname,fname";
        $users = DB::select($query);     
        foreach($users as $users){            
                $total=(40*$users->result_interview/100)+(15*$users->pgrade/100)+(30*$users->result_interview1/100)+(15*$users->result_exam/100);
                $tot=round($total); 
                $muni="";
                $brgys="";
                if($total>74 && $users->pgrade>84 && $users->ip!=4 && $users->ip!=5 && $users->ip!=6 && $users->ip!=7){
                    $mun=Municipality::where('id',$users->cur_mun)->get();
                    $brgy=Brgy::where('id',$users->cur_brgy)->get();
                    $sc=SHSchools::where('id',$users->name)->get();
                    foreach($mun as $m){
                        $muni=$m->name;
                    }
                    foreach($brgy as $m){
                        $brgys=$m->name;
                    }
                    foreach($sc as $s){
                        $scl=$s->name;
                    }
                    $students->push(['fname'=>$users->fname,'mun'=>$muni,'brgy'=>$brgys,'lname'=>$users->lname,'scl'=>$scl]);
                }
            }
            $i=0;
            $students=$students->sortBy('mun');
            return view('student.lguresult2',['i'=>$i,'stype'=>$stype,'sy'=>$syear,'sem'=>$semester])->with('students',$students);
    }
}
