<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\User;
use App\Documents;
use App\DocRecords;
use DB;
use File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Image;
use App\Http\Requests;
use Illuminate\Http\Request;

class DocuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function searchsdocs(Request $request) 
        {         
            if($request->ajax())             
            {             
                $output="";                 
                $products=DB::table('documents')->where('docu_name','LIKE','%'.$request->search."%")
                ->orWhere('tracknum','LIKE','%'.$request->search."%")
                ->orderBy('docu_name','desc')->get(); 
                if($products)
                    {                     
                    foreach ($products as $key => $product) {                       
                        $output.='<tr>'.      
                        '<td>   '.$product->tracknum.'</td>'.
                        '<td>   '.$product->docu_name.' - '.$product->docu_dets.'</td>'.
                        '<td>   
                        <a href="/documents/'.$product->docu_id.'" class="btn btn-info" role="button">SHOW</a>
                        <a href="" class="btn btn-success" role="button">EDIT</a>
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
    
    public function searchIn()
    {
        //
        return view('student.searchdocs');
    }    
    public function index()
    {
        //
        return "HEYHET";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        return view('student.adddocu');
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
        $hour=date('h')+8;        
        $id=date('ymd'.$hour.'i');
        if($request->input('dty')!=''){
            $id=$id.$request->input('dty').'1';
        }
        else{
            $id=$id.'00';
        }
        $tn=$id;
        $input = request()->all();
        $input = request()->validate([
            'sname' => 'required',   
            'docdet' => 'required',                  
        ], [
            'sname.required' => 'Please Input Document Name',
            'docdet.required' => 'Please Input Document Details',
        ]);
        $date=$request->input('dr1');
        $newDate = date("Y-m-d", strtotime($date));
        $date=$request->input('dr2');
        $newDate1 = date("Y-m-d", strtotime($date));
        $record = new Documents;
        $record->docu_name=$request->input('sname');
        $record->staff=Auth::user()->id;
        $record->department=$request->input('dept');
        $record->docu_dets=$request->input('docdet');
        if($request->input('dty')!=''){
            $record->outin=$request->input('dty');
        }
        $record->tracknum=$tn;
        $record->date_received=$request->input('newDate');
        $record->date_release=$request->input('newDate1');
        $record->save();
        if($files=$request->file('profileImage')){
            $file='';
            $filename='';
            $i=0;
                foreach($request->file('profileImage') as $fle){
                    $i++;
                    $file=$fle;
                    $filename=$request->input('docsid').'-'.$i.'.jpeg';
                    $filename = str_replace(' ','',$filename);
                    $photo = $fle;
                    $destinationPath = public_path().'document_img\\' ;
                    $filenames='document_img\\'.$filename;
                    $file->move($destinationPath,$filename);   
                    $record1 = new DocRecords; 
                    $record1->docs_id=$record->id;
                    $record1->pics=$filenames;
                    $record1->save();
                }
        }
        
        return redirect()->action(
            'DocuController@show', ['id' => $record->docu_id]
        );
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
        $docs = Documents::where('docu_id',$id)->first();
        $sid=$docs->docu_id;
        $docsrecs = DocRecords::where('docs_id',$sid)->get();
        return view('student.showdocs',['docsrecs'=>$docsrecs,'docs'=>$docs]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return $id;
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
