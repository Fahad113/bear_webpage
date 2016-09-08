<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use DB; 
use App\Http\Requests;
use App\Http;
use App\Bear;
use App\Tree;
use App\Fish1;
use App\Picnic;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Session;
class bearController extends Controller
{
    //
    public function getbear(){
        $bear= DB::table('bears')->paginate(6);
        return view('my.print', compact('bear'));
    }
     public function getpicnic(){
        $picnic = DB::table('picnics')->paginate(6);

        return view('my.picnic', ['picnic' => $picnic]);
    }
     public function getfish(){
        $fish = DB::table('fish1')->paginate(6);

        return view('my.fish', ['fish' => $fish]);
    }
     public function gettree(){
        $tree = DB::table('trees')->paginate(6);

        return view('my.trees', ['trees' => $tree]);
    }
    
    public function add_bear(Request $request){
           
            $post =$request->all();
            $v = validator::make($request->all(),
               [
                   'name' => 'required',
                   'type' => 'required',
                   'level' => 'required',
                   
                   
               ]);
            if($v->fails()){
            return redirect()->back()->withErrors($v->errors());
       }
       
        else {
            $bear = new Bear;
            $bear->name =$request->get('name');
            $bear->type = $request->get('type');
            $bear->danger_level=$request->get('level');
            $i= $bear->save();
            if($i>0)
           {
               Session::flash('message','record save ');
                return back(); 
           }
        } 
        
    }
    
    public function add_fish(Request $request){
           
            $post =$request->all();
            $v = validator::make($request->all(),
               [
                   'weight' => 'required',
                   'bear_id' => 'required',
                         
               ]);
            
            if($v->fails()){
            return redirect()->back()->withErrors($v->errors());
       }
       
        else {
            
            $fish = new Fish1;
            $fish->weight =$request->get('weight');
            $fish->bear_id = $request->get('bear_id');
           
            $i= $fish->save();
            
            if($i>0)
           {
               Session::flash('message','record save ');
                return back(); 
           }
        } 
        
    }
    
    public function add_tree(Request $request){
           
            $post =$request->all();
            $v = validator::make($request->all(),
               [
                   'type' => 'required',
                   'age' => 'required',
                   'bear_id' => 'required',
                   
                   
               ]);
            if($v->fails()){
            return redirect()->back()->withErrors($v->errors());
       }
       
        else {
            $tree = new Tree;
            $tree->type =$request->get('type');
            $tree->age = $request->get('age');
            $tree->bear_id=$request->get('bear_id');
            $i= $tree->save();
            if($i>0)
           {
               Session::flash('message','record save ');
                return back(); 
           }
        } 
        
    }
    
     public function add_picnic(Request $request){
           
            $post =$request->all();
            $v = validator::make($request->all(),
               [
                   'taste_level' => 'required',
                   'name' => 'required',
                   
                   
               ]);
            if($v->fails()){
            return redirect()->back()->withErrors($v->errors());
       }
       
        else {
            $picnic= new Picnic;
            $picnic->name =$request->get('name');
            $picnic->taste_level = $request->get('taste_level');
            $i= $picnic->save();
            if($i>0)
           {
               Session::flash('message','record save ');
                return back(); 
           }
        } 
        
    }
    
    public function bear_delete($id)
    { 
            $i = DB::table('bears')->where('id',$id)->delete();
        
         if($i>0)
           {
               Session::flash('success', 'Event delete successfully!');
               return back();
           }
    }
    
    public function fish_delete($id)
    { 
            $i = DB::table('fish1')->where('id',$id)->delete();
        
         if($i>0)
           {
               Session::flash('success', 'Event delete successfully!');
               return back();
           }
    }
    public function picnic_delete($id)
    { 
            $i = DB::table('picnics')->where('id',$id)->delete();
        
         if($i>0)
           {
               Session::flash('success', 'Event delete successfully!');
               return back();
           }
    }
    
     public function tree_delete($id)
    { 
            $i = DB::table('trees')->where('id',$id)->delete();
        
         if($i>0)
           {
               Session::flash('success', 'Event delete successfully!');
               return back();
           }
    }
}
