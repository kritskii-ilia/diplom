<?php

namespace App\Http\Controllers;

use App\Models\Req;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RequestController extends Controller
{
    public function addReq(Request $request){
        $ReqData = $request->all();
        $req = new Req();
        $req->user_id = $ReqData['user_id'];
        $req->project_id = $ReqData['project_id'];
        $req->status_id = 1;
        $req->save();
        return redirect()->back();
    }
    public function reqWait($id){
        $reqw = Req::findOrFail($id);
        $reqw->status_id = 1;
        $reqw->save();
        return redirect()->back();
    }
    public function reqSuccess($id){
        $reqs = Req::findOrFail($id);
        $reqs->status_id = 2;
        $reqs->save();
        return redirect()->back();
    }
    public function reqDenied($id){
        $reqs = Req::findOrFail($id);
        $reqs->status_id = 3;
        $reqs->save();
        return redirect()->back();
    }
}
