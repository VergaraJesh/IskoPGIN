<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\AcadCourses;
use App\TVCourses;

class AdminsController extends Controller
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
        return view('student.courselist');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('student.createcourse');
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
        $input = request()->all();
        $input = request()->validate([
                    'scholarship' => 'required',
                    'cname' => 'required|min:5',
                    'abvr' => 'required|min:4',
                ], [

                    'scholarship.required' => 'Please Select Scholarship type.',
                    'cname.required' => 'Please enter Course Name.',
                    'abvr.required' => 'Please enter Course Abreveation.',
                ]);
        if($request->scholarship==1){
            $course = new AcadCourses;
            $course->name=$request->input('cname');
            $course->abvr=$request->input('abvr');;
            $course->save();
            return redirect('admins')->with('success','Academic Course Successfully Created!');
        }
        else{
            $course = new TVCourses;
            $course->name=$request->input('cname');
            $course->abvr=$request->input('abvr');;
            $course->save();
            return redirect('admins')->with('success','Tech Voc Course Successfully Created!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $i=1;
        if($id==1){
            $courses = AcadCourses::all();
            $msg="Academic Courses List";
            $type=1;
        }
        if($id==3){
            $courses = TVCourses::all();
            $msg="Tech Voc Courses List";
            $type=3;
        }
        return view('student.courselistdisplay',['courses'=>$courses,'msg'=>$msg,'i'=>$i,'type'=>$type]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,$type)
    {
        //
        if($type==1){
            $course=AcadCourses::where('id',$id)->first();
            $t=$type;
        }
        if($type==3){
            $course=TVCourses::where('id',$id)->first();
            $t=$type;
        }
        return view('student.editcourse',['course'=>$course,'t'=>$t]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        if($request->input('type')==1){
            $course=AcadCourses::where('id',$id)->first();
        }
        if($request->input('type')==3){
            $course=TVCourses::where('id',$id)->first();
        }
        if($request->input('cname')!=""){
            $course->name=$request->input('cname');
        }
        if($request->input('abvr')!=""){
            $course->abvr=$request->input('abvr');
        }
        $course->save();
        return redirect('admins')->with('success','Course Successfully Edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
        //
        if($request->input('type')==1){
            $course=AcadCourses::where('id',$id)->delete();
        }
        if($request->input('type')==3){
            $course=TVCourses::where('id',$id)->delete();
        }
        return redirect('admins')->with('success','Course Successfully Deleted!');
    }
}
