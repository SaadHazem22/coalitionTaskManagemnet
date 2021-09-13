<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Project extends Model
{
    use SoftDeletes,HasFactory;

    protected $primaryKey = 'id'; 

    protected $table = 'projects';

    protected $fillable = ['name'];

    public function tasks()
    {
        return $this->hasMany(Task::class , 'project_id');
    }
}
