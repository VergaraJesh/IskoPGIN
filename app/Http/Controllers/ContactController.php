<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\ContactSchool;
use App\SchRecords;
use App\User;
use App\Schoolyear;
use DB;
use App\Http\Requests;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function search(Request $request) 
        {         
            if($request->ajax())             
            {             
                $output="";                 
                $products=DB::table('schools_in')->where('sc_name','LIKE','%'.$request->search."%")                
                ->orderBy('district','desc')->orderBy('sc_name','desc')->get(); 
                if($products)
                    {                     
                    foreach ($products as $key => $product) {                       
                        $output.='<tr>'.      
                        '<td>   '.strtoupper($product->sc_name).' - '.$product->district.'</td>'.
                        '<td>
                        <a href="/screcord/'.$product->sc_id.'" class="btn btn-info" role="button">Show Info</a>
                        <a href="/screcord/addcons/'.$product->sc_id .'" class="btn btn-success" role="button">Add Contact</a>
                        <a href="/screcord/addrecs/'.$product->sc_id .'" class="btn btn-warning" role="button">Add Records</a>
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
    public function index(){
        return view('student.scschool');
    }
    public function show($id){
        $schrecs = collect();
        $sch=ContactSchool::where('sc_id',$id)->first();
        $scname=$sch->sc_name;
        $stype=$sch->sc_type;
        $staffs=User::all();
        $sch=ContactSchool::where('sc_id',$id)->get();
        $sch2=SchRecords::where('sc_id',$id)->get();
        foreach($sch2 as $s){
            $sy = Schoolyear::where('id',$s->sy_id)->first();
            $syy=$sy->from."-".$sy->to;
            $staf=User::where('id',$s->staff)->first();
            $stafs=$staf->name;
            $schrecs->push(['scc'=>$s->sc_id,'id'=>$s->id,'kin'=>$s->kinder,'g1'=>$s->g17,'g2'=>$s->g28,'g3'=>$s->g39,'g4'=>$s->g410,'g5'=>$s->g511,'g6'=>$s->g612,'sy'=>$syy,'staff'=>$stafs]);
        }
        return view('student.showsc',['sch'=>$sch,'sn'=>$scname,'staffs'=>$staffs,'sch2'=>$schrecs,'type'=>$stype]);
    }
    public function addrecs($id){
        $sy = Schoolyear::all();
        $sel = ContactSchool::where('sc_id', $id)->first();
        return view('student.addrecsch',['sc'=>$sel,'sy'=>$sy]);
    }
    public function addrecsgo(Request $request){
        $sch=new SchRecords;
        $sch->sc_id=$request->input('scid');
        $sch->sy_id=$request->input('sy');
        if($request->input('type')=="1"){
            $sch->kinder=$request->input('kin');         
        }
        $sch->g17=$request->input('g1');   
        $sch->g28=$request->input('g2');   
        $sch->g39=$request->input('g3');   
        $sch->g410=$request->input('g4');   
        $sch->g511=$request->input('g5');   
        $sch->g612=$request->input('g6'); 
        $sch->staff= Auth::user()->id;
        $sch->save();
        return redirect()->action(
            'ContactController@show',['id'=>$request->input('scid')]);
    }
    public function addcons($id){
        $sel = ContactSchool::where('sc_id', $id)->first();
        return view('student.addconsch',['sc'=>$sel]);
    }

    
    public function addconsgo(Request $request){
        $input = request()->all();
        $input = request()->validate([
                    'schead' => 'required|min:1',
                    'sccon' => 'required|min:1',                    
                ], [
    
                    'schead.required' => 'Please Enter School Head.',
                    'sccon.required' => 'Please Enter School Contacy.',                    
                ]);
            
        $sch=new ContactSchool;
        $sch->sc_id=$request->input("scid");
        $sch->sc_name=$request->input("scname");
        $sch->district=$request->input("dis");
        $sch->sc_type=$request->input("type");
        $sch->sc_head=$request->input("schead");
        $sch->sc_contact=$request->input("sccon");
        $sch->sc_email=$request->input("sce");
        $sch->staff= Auth::user()->id;
        $sch->awt=$request->input("otype");
        $sch->save();
        return redirect()->action(
            'ContactController@index' );        
    }
    public function editrecs($id){
        $sch=SchRecords::where('id',$id)->first();
        $sy = Schoolyear::all();
        $sel = ContactSchool::where('sc_id', $sch->sc_id)->first();
        return view('student.editrecsch',['sc'=>$sel,'sy'=>$sy,'sch'=>$sch]);
    }
    public function delrecsgo(Request $request,$id){
        $sch=SchRecords::where('id',$id)->delete();
        return redirect()->action(
            'ContactController@show',['id'=>$request->input('sch')] );
    }
    public function editrecsgo(Request $request){
        $t=0;
        $sch=SchRecords::where('id',$request->input('scrid'))->first();
        if($request->input('sy')!=""){
            $sch->sy_id=$request->input('sy');
            $t++;
        }
        if($request->input('kin')!=""){
            $sch->kinder=$request->input('kin');
            $t++;
        }
        if($request->input('g1')!=""){
            $sch->g17=$request->input('g1');
            $t++;
        }
        if($request->input('g2')!=""){
            $sch->g28=$request->input('g2');
            $t++;
        }
        if($request->input('g3')!=""){
            $sch->g39=$request->input('g3');
            $t++;
        }
        if($request->input('g4')!=""){
            $sch->g410=$request->input('g4');
            $t++;
        }
        if($request->input('g5')!=""){
            $sch->g511=$request->input('g5');
            $t++;
        }
        if($request->input('g6')!=""){
            $sch->g612=$request->input('g6');
            $t++;
        }
        if($t>0){            
            $sch->staff= Auth::user()->id;
            $sch->save();
        }
        
        return redirect()->action(
            'ContactController@show',['id'=>$sch->sc_id] );
    }
    public function edit($id){
        $sel = ContactSchool::where('id', $id)->first();
        return view('student.editsch',['sc'=>$sel]);
    }
    public function update(Request $request,$id){
        $sel = ContactSchool::where('id', $id)->first();
        $i=0;
        if($request->input("scid")!=""){
            $sch->sc_id=$request->input("scid");
            $i++;
        }
        if($request->input("scname")!=""){
            $sch->sc_name=$request->input("scname");
            $i++;
        }
        if($request->input("dis")!=""){
            $sch->district=$request->input("dis");
            $i++;
        }
        if($request->input("type")!=""){
            $sch->sc_type=$request->input("type");
            $i++;
        }
        if($request->input("schead")!=""){
            $sch->sc_head=$request->input("schead");
            $i++;
        }
        if($request->input("sccon")!=""){
            $sch->sc_contact=$request->input("sccon");
            $i++;
        }
        if($request->input("sce")!=""){
            $sch->sc_email=$request->input("sce");
            $i++;
        }   
        if($i>0){
            $sch->staff= Auth::user()->id;
            $sch->save();
        }             
        return redirect()->action(
            'ContactController@show',['id'=>$sch->sc_id] );
    }
    public function destroy($cs)
    {
        $deletedRows = ContactSchool::where('id', $cs)->delete();
        return redirect()->action(
            'ContactController@index');
    }
    public function create(){
        return view('student.createsch');
    }
    public function store(Request $request){
        $input = request()->all();
        $input = request()->validate([
                    'schead' => 'required|min:1',
                    'sccon' => 'required|min:1',
                    'scid' => 'required|min:4',
                    'type' => 'required',
                    'dis' => 'required',
                    'scname' => 'required',
                ], [
    
                    'schead.required' => 'Please Enter School Head.',
                    'sccon.required' => 'Please Enter School Contacy.',
                    'scid.required' => 'Please Enter School ID.',
                    'type.required' => 'Please Enter School Type.',
                    'dis.required' => 'Please Enter School District.',
                    'scname.required' => 'Please Enter School Name.',
                ]);
            
            $find = ContactSchool::where('sc_id',$request->input("scid"))->first();
            if($find){
                return back()->withErrors(['studenterror' => ['School already Registered.']]);
            }
        $sch=new ContactSchool;
        $sch->sc_id=$request->input("scid");
        $sch->sc_name=$request->input("scname");
        $sch->district=$request->input("dis");
        $sch->sc_type=$request->input("type");
        $sch->sc_head=$request->input("schead");
        $sch->sc_contact=$request->input("sccon");
        $sch->sc_email=$request->input("sce");
        $sch->staff= Auth::user()->id;
        $sch->awt=$request->input("otype");
        $sch->save();
        return redirect()->action(
            'ContactController@index' );
    }
    public function scshow(){
        $query ="SELECT distinct district FROM `schools_in` WHERE 1 ORDER by district";
        $dis = DB::select($query);  
        return view('student.schlist',['sy'=>$dis]);
    }  
    
    public function screcordResult(Request $request){
        $district="";
        $query = "SELECT * FROM `schools_in` WHERE `stat`=1 ";
        if($request->sy==""){
            if($request->type!=""){
                $query=$query."and sc_type = $request->type";
            }            
        }
        else{ 
            $query=$query."and `district` like '$request->sy' ";
            if($request->type!=""){
                $query=$query."and `sc_type` = $request->type";
            } 
            $district=$request->sy;
        }              
        $query=$query." ORDER by sc_type,district,sc_name";      
        $users = DB::select($query);        
        return view('student.result3',['sc'=>$users,'dis'=>$district]);
    }  
    public function scshow2(){
        
        $query ="SELECT distinct district FROM `schools_in` WHERE 1 ORDER by district";
        $dis = DB::select($query);  
        $sy = Schoolyear::all();
        return view('student.schlist1',['sy'=>$dis,'sy2'=>$sy]);
    }  
    
    public function screcordResult2(Request $request){
        $district=$request->input('sy');
        if($district!=""){
            $query ="SELECT DISTINCT(`sc_id`) FROM `schools_in` WHERE `district`='$district'";
        }
        else{
            $query ="SELECT DISTINCT(`sc_id`) FROM `schools_in` WHERE 1";
        }        
        $dis = DB::select($query);
        $sch2 = collect();
        foreach($dis as $s){
            $temp=SchRecords::where('sc_id',$s->sc_id)->where('sy_id',$request->input('sy2'))->first();
            if($temp){
                $sch2->push($temp);
            }
            
        }        
        return $sch2;
    } 

    public function searchIn()
    {
        //
        return view('student.searchsc');
    }    
}
