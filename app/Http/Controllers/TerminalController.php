<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TerminalInfo;

class TerminalController extends Controller
{
    public function index()
    {
        $terminals = TerminalInfo::all();
        return view('Terminal.terminal',compact('terminals'));
    }

    public function add(Request $request){

        $terminal = new TerminalInfo;

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
        $terminal = TerminalInfo::find($request['id']);
        $terminal->delete();
        if($request->ajax()){
            return 0;
        }
    }

}
