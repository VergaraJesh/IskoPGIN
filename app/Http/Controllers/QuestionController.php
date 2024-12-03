<?php

namespace App\Http\Controllers;
use DB;
use App\Student;
use App\Questions;
use App\SHExam;
use App\SHSchools;
use App\Schoolyear;
use App\Municipality;
use App\Record;
use App\Examrecords;
use App\Questionrecords;
use App\Http\Requests;
use App\Http\Redirect;
use Illuminate\Http\Request;


class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        //
        $sy = Schoolyear::all();
        return view('student.exam',['sy'=>$sy]);
    }
    public function examstart(Request $request)
    {
        //
        $student=Student::where('id',$request->input('student'))->first();
        if($student==null){
            return redirect()->back()->with('error', ['1']);   
        }
        $student1=Examrecords::where('student_id',$request->input('student'))->first();
        if($student1!=null){
            return redirect()->back()->with('error', ['1']);   
        }
        if($request->input('sy')==null || $request->input('sem')==null){
            return redirect()->back()->with('error', ['1']);   
        }
        $stype=1;
        if($student->scholartype==1){
            $stype=1;
        }
        if($student->scholartype==3){
            $stype=2;
        }
        $qc1 = collect();
        $q1=SHExam::where('extype',$stype)->where('qtype',1)->get();
        $q1=$q1->shuffle();
        $j=0;
        foreach($q1 as $q1){
            if($j<20){
                $data =array();
                $data[0]=$q1->choice1;
                $data[1]=$q1->choice2;
                $data[2]=$q1->choice3;
                $data[3]=$q1->choice4;
                shuffle($data);            
                $qc1->push(['id'=>$q1->id,'quest'=>$q1->question,'opt1'=>$data[0],'opt2'=>$data[1],'opt3'=>$data[2],'opt4'=>$data[3]]);
                $j++;
            }            
        } 

        $qc2 = collect();
        $q2=SHExam::where('extype',$stype)->where('qtype',2)->get();        
        $q2=$q2->shuffle();
        $j=0;
        foreach($q2 as $q2){
            if($j<5){
                $data =array();
                $data[0]=$q2->choice1;
                $data[1]=$q2->choice2;
                $data[2]=$q2->choice3;
                $data[3]=$q2->choice4;
                shuffle($data);            
                $qc2->push(['id'=>$q2->id,'quest'=>$q2->question,'opt1'=>$data[0],'opt2'=>$data[1],'opt3'=>$data[2],'opt4'=>$data[3]]);
                $j++;
            }            
        }         
        
        $qc3 = collect();
        if($stype==4){
            $q3=SHExam::where('extype',$stype)->where('qtype',3)->get(); 
        }
        else{
            $q3=SHExam::where('qtype',7)->get(); 
        }       
        $q3=$q3->shuffle();
        $j=0;
        foreach($q3 as $q2){
            if($j<5){
                $data =array();
                $data[0]=$q2->choice1;
                $data[1]=$q2->choice2;
                $data[2]=$q2->choice3;
                $data[3]=$q2->choice4;
                shuffle($data);            
                $qc3->push(['id'=>$q2->id,'quest'=>$q2->question,'opt1'=>$data[0],'opt2'=>$data[1],'opt3'=>$data[2],'opt4'=>$data[3]]);
                $j++;
            }            
        }        

        $qc4 = collect();
        $q4=SHExam::where('extype',$stype)->where('qtype',4)->get();        
        $q4=$q4->shuffle();
        $j=0;
        foreach($q4 as $q2){
            if($j<5){
                $data =array();
                $data[0]=$q2->choice1;
                $data[1]=$q2->choice2;
                $data[2]=$q2->choice3;
                $data[3]=$q2->choice4;
                shuffle($data);            
                $qc4->push(['id'=>$q2->id,'quest'=>$q2->question,'opt1'=>$data[0],'opt2'=>$data[1],'opt3'=>$data[2],'opt4'=>$data[3]]);
                $j++;
            }            
        }        

        $qc5 = collect();
        $q5=SHExam::where('extype',$stype)->where('qtype',5)->get();        
        $q5=$q5->shuffle();
        $j=0;
        foreach($q5 as $q2){
            if($j<25){
                $data =array();
                $data[0]=$q2->choice1;
                $data[1]=$q2->choice2;
                $data[2]=$q2->choice3;
                $data[3]=$q2->choice4;
                shuffle($data);            
                $qc5->push(['id'=>$q2->id,'quest'=>$q2->question,'opt1'=>$data[0],'opt2'=>$data[1],'opt3'=>$data[2],'opt4'=>$data[3]]);
                $j++;
            }            
        }        

        $qc6 = collect();
        $q6=SHExam::where('qtype',6)->get();        
        $q6=$q6->shuffle();
        $j=0;
        foreach($q6 as $q2){
            if($j<40){
                $data =array();
                $data[0]=$q2->choice1;
                $data[1]=$q2->choice2;
                $data[2]=$q2->choice3;
                $data[3]=$q2->choice4;
                shuffle($data);            
                $qc6->push(['id'=>$q2->id,'quest'=>$q2->question,'opt1'=>$data[0],'opt2'=>$data[1],'opt3'=>$data[2],'opt4'=>$data[3]]);
                $j++;
            }            
        }
        $i=0;
        $sem=$request->input('sem');       
        $sy=$request->input('sy');
        return view('student.examination',['sem'=>$sem,'sy'=>$sy,'i'=>$i,'q1'=>$qc1,'q2'=>$qc2,'q3'=>$qc3,'q4'=>$qc4,'q5'=>$qc5,'q6'=>$qc6,'student'=>$student]);
    }
    public function examdone(Request $request)
    {
        //
        $count1=0;
        $count2=0;
        $count3=0;
        $count4=0;
        $count5=0;
        $count6=0;
        $total=0;
        for($i=0;$i<500;$i++){
            if($request->input($i)==true){
                $temp=Questions::where('id',$i)->first();
                if($request->input("ans".$i)==$temp->answer){
                    switch($temp->qtype){
                        case 1:$count1++;break;
                        case 2:$count2++;break;
                        case 7:$count3++;break;
                        case 4:$count4++;break;
                        case 5:$count5++;break;
                        case 6:$count6++;break;
                    }
                }                
            }
        }
        $total=$count1+$count2+$count3+$count4+$count5+$count6;
        $exam=new Examrecords;
        $exam->student_id=$request->input('student');
        $exam->sem=$request->input('sem');
        $exam->schoolyear_id=$request->input('sy');
        $exam->scholartype=$request->input('stype');
        $exam->sentence_score=$count1;
        $exam->antonym_score=$count2;
        $exam->analogy_score=$count3;
        $exam->synonym_score=$count4;
        $exam->math_score=$count5;
        $exam->in_score=$count6;
        $exam->score=$total;
        $exam->num_item=90;
        $exam->save();
        return view('student.congratsexam');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $date="2/12/2020";
        $newDate = date("Y-m-d", strtotime($date));
        $query ="SELECT examination_record.*, students.*
        FROM examination_record 
        INNER JOIN students ON examination_record.student_id=students.id 
        where examination_record.schoolyear_id=8 and examination_record.sem=2 and students.scholartype=1";
        $query=$query. " and examination_record.created_at='$newDate'";
        $query=$query." ORDER by examination_record.score DESC";      
        $users = DB::select($query);
        $i=0;
        $tots=0;
        foreach($users as $users){
            if($users->score<33){
                $tots=70;
            }
            else if($users->score>32 && $users->score<37){
                $tots=73;
            }
            else if($users->score>36 && $users->score<41){
                $tots=75;
            }
            else if($users->score>40 && $users->score<45){
                $tots=78;
            }
            else if($users->score>44 && $users->score<49){
                $tots=80;
            }
            else if($users->score>48 && $users->score<53){
                $tots=83;
            }
            else if($users->score>52 && $users->score<57){
                $tots=85;
            }
            else if($users->score>56 && $users->score<61){
                $tots=88;
            }
            else if($users->score>60 && $users->score<65){
                $tots=90;
            }
            else if($users->score>64 && $users->score<69){
                $tots=93;
            }
            else if($users->score>68 && $users->score<73){
                $tots=95;
            }
            else if($users->score>72 && $users->score<77){
                $tots=98;
            }
            else if($users->score>76){
                $tots=100;
            }
           
            $student=Student::where('id',$users->student_id)->first();
            echo ++$i." ".$users->fname." ".$users->lname." = ".$users->score." = ".$tots."%";
            if($users->student_id==$student->id){
                $student->result_exam=$tots;
                $student->save();
                echo " OK";
            }
            else{
                echo " DECLINED";
            }
            echo "<br>";
        }
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Questions  $questions
     * @return \Illuminate\Http\Response
     */
    public function show(Questions $questions)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Questions  $questions
     * @return \Illuminate\Http\Response
     */
    public function edit(Questions $questions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Questions  $questions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Questions $questions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Questions  $questions
     * @return \Illuminate\Http\Response
     */
    public function destroy(Questions $questions)
    {
        //
    }
}
