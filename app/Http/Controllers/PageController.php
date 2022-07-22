<?php

namespace App\Http\Controllers;

use App\Models\Bet;
use App\Models\Category;
use App\Models\Project;
use App\Models\Req;
use App\Models\Status;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function GuzzleHttp\Psr7\_caseless_remove;

class PageController extends Controller
{
    public function index(){
        return view('index');
    }
    public function signup(){
        return view('sign-up');
    }
    public function login(){
        return view('login');
    }
    public function profile(){
        return view('profile');
    }
    public function projects(){
        $projects = Project::orderBy('id', 'desc')->get();
        return view('projects', ['projects' => $projects]);
    }
    public function project_add(){
        $categories = Category::all();
        return view('project-add', ['categories' => $categories]);
    }
    public function project_single($id){
        $project = Project::findOrFail($id);
        $requests = Req::orderBy('id', 'desc')->get();
        $statuses = Status::orderBy('id', 'desc')->get();
        $data = DB::table("users")
            ->join("bets", function($join){
                $join->on("users.id", "=", "bets.user_id");
            })
            ->join("projects", function($join){
                $join->on("projects.id", "=", "bets.project_id");
            })
            ->select("users.balance", "users.volume", "users.participations",
                "users.invested_sum", "projects.supply", "projects.max_supply")
            ->where('users.id' ,'=', Auth::id())
            ->get();
        $balance = DB::table("users")->max('users.balance');
        $volume = DB::table('users')->max('users.volume');
        $participations = DB::table('users')->max('users.participations');
        $invested_sum = DB::table('users')->max('users.invested_sum');
        $supply = DB::table('projects')->max('projects.supply');
        $max_supply = DB::table('projects')->max('projects.max_supply');
        $max = ['balance' =>$balance, 'volume' => $volume, 'participations' => $participations, 'invested_sum' => $invested_sum,
            'supply' => $supply, 'max_supply' =>$max_supply];
        $b = [1, 1, 1, 1, 1, 1];
        $c = [1, 1, 0.75, 0.75, 0.75, 1];
        $matrix = [];
        $array = json_decode(json_encode($data), true);
        $k=0;
        foreach ($array as $item)
        {
            $matrix[$k] = [
                $item['balance']/$max['balance'],
                $item['volume']/$max['volume'],
                $item['participations']/$max['participations'],
                $item['invested_sum']/$max['invested_sum'],
                $item['supply']/$max['supply'],
                $item['max_supply']/$max['max_supply']
            ];
            $k++;
        }
        $rate = 0;
        for ($i=0; $i < count($item);$i++){
            $rate += $matrix[0][$i] * $c[$i] * $b[$i];
        }
        return view('project-single', ['project' => $project, 'requests' => $requests, 'statuses' => $statuses, 'rate' => $rate]);
    }
    public function editProject($id){
        $project = Project::findOrFail($id);
        return view('project-edit', ['project' => $project]);
    }

    public function requests(){
        $requests = Req::orderBy('id', 'desc')->get();
        return view('requests', ['requests' => $requests]);
    }

    public function criterion(){
        $data = DB::table("users")
            ->join("bets", function($join){
                $join->on("users.id", "=", "bets.user_id");
            })
            ->join("projects", function($join){
                $join->on("projects.id", "=", "bets.project_id");
            })
            ->select("users.balance", "users.volume", "users.participations", "users.invested_sum", "projects.supply", "projects.max_supply")
            ->get();
        $balance = DB::table("users")->max('users.balance');
        $volume = DB::table('users')->max('users.volume');
        $participations = DB::table('users')->max('users.participations');
        $invested_sum = DB::table('users')->max('users.invested_sum');
        $supply = DB::table('projects')->max('projects.supply');
        $max_supply = DB::table('projects')->max('projects.max_supply');

        $max = ['balance' =>$balance, 'volume' => $volume, 'participations' => $participations, 'invested_sum' => $invested_sum, 'supply' => $supply, 'max_supply' =>$max_supply];
        $b = [1, 1, 1, 1, 1, 1];
        $c = [1, 1, 0.75, 0.75, 0.75, 1];
        $matrix = [];
        $array = json_decode(json_encode($data), true);

        $k=0;
      foreach ($array as $item)
      {
          $matrix[$k] = [
              $item['balance']/$max['balance'],
              $item['volume']/$max['volume'],
              $item['participations']/$max['participations'],
              $item['invested_sum']/$max['invested_sum'],
              $item['supply']/$max['supply'],
              $item['max_supply']/$max['max_supply']
          ];
          $k++;
      }

      $tmp = [];
          for ($j=0;4;$j++){
              for ($i=0; $i < count($item);$i++){
                  $tmp[$j] += $item['balance'] * $c[$i];
                  $tmp[$j] += $item['volume'] * $c[$i];
                  $tmp[$j] += $item['participations'] * $c[$i];
                  $tmp[$j] += $item['invested_sum'] * $c[$i];
                  $tmp[$j] += $item['supply'] * $c[$i];
                  $tmp[$j] += $item['max_supply'] * $c[$i];
              }
          }


//          $s=0;
//          for ($i=0;5;$i++){
//              $qq[$i] = [
//                  $item[] += $item[$s]*$c[$s],
//
//              ];
//              dd($item);
//              $s++;
//
//          }
//      }
//      dd($qq);

//        dd($matrix);
       // var_dump($array[0]['balance']);

//        $a = array();
//        list($d1,$d2) = $array;
//        while($d1){
//            $a[] = array(array_shift($d1), array_shift($d2));
//        }
        $b = [];
//        for ($i=0;$i<$max;$i++){
//
//        }
//        for ($i=0;$max;$i++){
//            for ($j=0;$a;$j++){
//                $f = $a[$i][$j] * $max[$j];
//            }
//        }
//        var_dump($f);

//        var_dump($a[0][0]);
//        var_dump($array[0][0]);
//        for ($i=0;$array<$i;$i++){
//            $arr += json_decode(json_encode($array[$i]), true);
//        }
//        var_dump($arr);
//        for ($i=0;$max;$i++){
//            for ($j=0;$d;$j++){
//                $matrix[$i][$j] += $array[$i][$max[$j]]/$max[$i];
//
//                print_r($matrix[$i][$j]);
//            }
//        }



//        for ($i=0;6;$i++){
//            for ($j=0;7;$i++){
//                $data = (array)$data[$i][$j];
//            }
//        }



//        echo $data;
//        for ($i=0;$i<6;$i++){
//            for ($j=0;$j<$c;$j++){
//                $
//                $matrix[$i][$j] += $data[$i][$j]*$arr[$j];
//                print_r($matrix[$i][$j]);
//            }
//        }



//                $balance_q[] = $date->balance/$balance;
//                $volume_q[] = $d/$volume;
//                $participations_q[] = $d/$participations;
//                $invested_sum_q[] = $d/$invested_sum;
//                $supply_q[] = $d/$supply;
//                $max_supply_q[] = $d/$max_supply;
//                $q = array_push($q, $balance_q, $volume_q, $participations_q, $invested_sum_q, $supply_q, $max_supply_q);

        return view('criterion', ['data' => $data, 'tmp' => $tmp, 'balance' => $balance, 'volume' => $volume, 'participations' => $participations, 'invested_sum' => $invested_sum, 'supply' => $supply, 'max_supply' => $max_supply, 'matrix' => $matrix] );
    }

    public function bets(){
        $bets = Bet::orderBy('id', 'desc')->get();
        return view('bets', ['bets' => $bets]);
    }

    public function search(){
        return view('search');
    }
}
