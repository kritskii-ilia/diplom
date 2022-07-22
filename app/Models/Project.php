<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $table='projects';


    public function requests(){
        return $this->hasMany(Req::class, 'project_id');
    }

    public function categories(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function bets(){
        return $this->hasMany(Bet::class, 'project_id');
    }

    public function comments(){
        return $this->hasMany(Comment::class, 'project_id');
    }
}

//$project = Project::where('id', '');
//$project->requests;
//
//$request->project;
