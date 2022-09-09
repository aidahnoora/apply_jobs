<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Sqits\UserStamps\Concerns\HasUserStamps;
use App\Models\Job;
use App\Models\Skill;

class Candidate extends Model
{
    use HasUserStamps, HasFactory;

    protected $table = "candidates";
    protected $primaryKey = "id";
    protected $fillable = [
    	'job_id',
        'name',
        'email',
        'phone',
    	'year',
    ];

    public function job()
    {
        return $this->belongsTo(Job::class, 'job_id');
    }

    public function skill()
    {
        return $this->belongsToMany(Skill::class);
    }
}
