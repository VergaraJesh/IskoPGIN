<?php

namespace App\Http\Controllers;

use App\SHSchools;
use Illuminate\Http\Request;

class SHController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('student.shschools');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('student.createshss');
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
                    'sname' => 'required',                    
                ], [
                    'sname.required' => 'Please Input Name of Schools.',
                ]);
        $shs = new SHSchools;
        $shs->name=$request->input('sname');
        $shs->save();
        return redirect('shschools')->with('success','School Successfully Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SHSchools  $sHSchools
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $all=SHSchools::all()->sortBy('name');
        $i=1;
        return view('student.shslistdisplay',['courses'=>$all,'i'=>$i]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SHSchools  $sHSchools
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $shs=SHSchools::where('id',$id)->first();
        return view('student.editshs',['shs'=>$shs]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SHSchools  $sHSchools
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {        
        $shs=SHSchools::where('id',$id)->first();
        if($request->input('school')!=""){
            $shs->name=$request->input('school');
            $shs->save();
        }
        
        return redirect('shschools')->with('success','School Successfully Edited!');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SHSchools  $sHSchools
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $course=SHSchools::where('id',$id)->delete();
        return redirect('shschools')->with('success','School Successfully Deleted!');
    }
}
