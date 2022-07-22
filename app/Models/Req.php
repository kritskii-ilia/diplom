<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Req extends Model
{
    use HasFactory;
    protected $table='requests';

    public $timestamps = false;

    public function projects(){
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function statuses(){
        return $this->belongsTo(Status::class, 'status_id');
    }

    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
