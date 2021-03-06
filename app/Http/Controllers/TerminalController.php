<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TerminalInfo;

class TerminalController extends Controller
{
    public function index()
    {
        date_default_timezone_set('Asia/Hong_Kong'); 
        
        //$terminals = TerminalInfo::where('is_active','!=','0')->get();
        $terminals = TerminalInfo::all();
        return view('Terminal.terminal',compact('terminals'));
    }

    public function add(Request $request){
        // $term_id = '';
        // $term = TerminalInfo::all();
        // if(empty($term)){
        //     $term_id = '1';
        // } else {
        //     $high = '';
        //     foreach($term as $ter){
        //         if($ter->terminal_id > $high){
        //             $high = $ter->terminal_id;
        //         }
        //     }
        //     $term_id = number_format($high)+1;
        // }

        $terminal = new TerminalInfo;

        //$terminal->terminal_id = $term_id.'';
        $terminal->name = $request->terminal['tname'];
        $terminal->comp_name = $request->terminal['tcomp'];
        $terminal->ipadd = $request->terminal['tip'];
        $terminal->loop_status = $request->terminal['tloop'];
        $terminal->type = $request->terminal['ttype'];
        $terminal->save();

        if($request->ajax()){
            return 0;
        }
    }

    public function toEdit(Request $request){
        $terminal = TerminalInfo::find($request->terminal['tid']);
        //$terminal->terminal_id = $request->terminal['tid'];
        $terminal->name = $request->terminal['tname'];
        $terminal->comp_name = $request->terminal['tcomp'];
        $terminal->ipadd = $request->terminal['tip'];
        $terminal->loop_status = $request->terminal['tloop'];
        $terminal->type = $request->terminal['ttype'];
        $terminal->save();


        if($request->ajax()){
            return 0;
        }
    }

    public function delete(Request $request){
        //$terminal = TerminalInfo::where('terminal_id',$request['id'])->get()->first();
        //$terminal->terminal_id = $request['id'];
        //$terminal->is_active = '0';
        //$terminal->save();
        $term = TerminalInfo::find($request['id']);
        $term->delete();
        if($request->ajax()){
            return 0;
        }
    }

    public function getTerminal(Request $request){
        $ctr = 0;
        if($request['ids'] != 'none' && $request['stat'] != 'none'){
            $termID = explode("-",$request['ids']);
            $stat = explode("-",$request['stat']);
            foreach($termID as $id){
                if($stat[$ctr] != '' && $id != ''){
                    $term = TerminalInfo::find($id);
                    $term->loop_status = $stat[$ctr];
                    $ctr++;
                    $term->save();
                }
            }   
        }
        $term = TerminalInfo::all();
        if($request->ajax()){
            return $term;
        }
    }

}
