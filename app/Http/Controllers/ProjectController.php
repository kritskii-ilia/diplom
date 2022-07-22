<?php

namespace App\Http\Controllers;

use App\Models\Bet;
use App\Models\Project;
use App\Models\Req;
use Carbon\Carbon;
use Illuminate\Database\Query\Expression;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Expr\New_;
use function React\Promise\all;

class ProjectController extends Controller
{
    public function project_add(Request $request){
        $ProjectData = $request->all();
        $validator = Validator::make($ProjectData,[
            'name' => 'required|unique:projects',
            'description' => 'required|unique:projects',
            'category_id' => 'required',
            'img_url' => 'required|unique:projects|mimes:jpeg,png',
        ]);
        if($validator->fails()) {
            return redirect(route('project-add-page'))
                ->withErrors($validator)
                ->withInput();
        }
        $project = new Project();
        $project->name = $ProjectData['name'];
        $project->description = $ProjectData['description'];
        $project->category_id = $ProjectData['category_id'];
        if ($request->hasFile('img_url')) {
            $project->img_url = $ProjectData['img_url']->store('/img/projects');
        }
        $project->save();
        return redirect(route('projects'));
    }
    public function editProject(Request $request){
        $editData = $request->all();
        $validator = Validator::make($editData,[
            'img_url' => '|mimes:jpeg,png',
        ]);
        if($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $project = Project::findOrFail($editData['project_id']);
        $project->name = $editData['name'];
        $project->description = $editData['description'];
        $project->category_id = $editData['category_id'];
        if ($request->hasFile('img_url')) {
            $project->img_url = $editData['img_url']->store('/img/projects');
        }
        $project->save();
        return redirect(route('projects'));
    }
    public function delProject ($id)
    {
        DB::table('projects')->where('id', '=', $id)->delete();
        return redirect(route('projects'));
    }
    public function search(Request $request){
        $search = $request->input('search');
        $project = Project::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->orWhere('description', 'LIKE', "%{$search}%")
            ->get();
        $requests = Req::orderBy('id', 'desc')->get();
        return view('search', ['projects'=>$project, 'requests' => $requests, 'search' => $search]);
    }
    public function addBet(Request $request){
        $betInfo = $request->all();
        $user = Auth::user();
        $project = Project::findOrFail($betInfo['project_id']);
        $balance = $user['balance'];
        $minBet = 1;
        $maxBet = $project->max_supply-$project->supply;
        $validator = Validator::make($betInfo,[
            'sum'=>[
                'required',
                'integer',
                'min:'.$minBet,
                'max:'.$maxBet,
                'between:'.$minBet.','.$balance
            ],
        ],
            [
                'required'=>'Данное поле должно быть заполнено',
                'integer'=>'Введите число',
                'min'=>'Минимальная ставка должна быть больше или равна '.$minBet,
                'max'=>'Максимальная ставка должна быть не больше или равна '.$maxBet,
                'between'=>'Недостаточно средств, ваш баланс: '.$balance
            ]);
        if($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $bet= new Bet();
        $bet->sum = $betInfo['sum'];
        $bet->user_id = $user->id;
        $bet->project_id = $project->id;
        $bet->created_at = Carbon::now();
        $bet->updated_at = Carbon::now();
        $bet->save();
        $user->balance = $user['balance'] - intval($betInfo['sum']);
        $user->save();
        $project->supply += $betInfo['sum'];
        $project->save();
        return redirect()->back();
    }

    public function test(Request $request) {
        $data = json_decode($request->getContent(), true);
        //return $data;
        $bet= new Bet();
        $bet->sum = $data['amount'];
        $bet->user_id = 1;
        $bet->project_id = 5;
        dd($request->id);
        $bet->created_at = Carbon::now();
        $bet->updated_at = Carbon::now();
        $bet->save();
        //return $request->all();
        // return response()->json([
        //     'code'=>422,
        //     'message'=> $request->all(),    
        // ],204);
    }
}
