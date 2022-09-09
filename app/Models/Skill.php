<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Sqits\UserStamps\Concerns\HasUserStamps;
use App\Models\Candidate;

class Skill extends Model
{
    use HasUserStamps, HasFactory;

    protected $table = "skills";
    protected $primaryKey = "id";
    protected $fillable = [
        'name',
    ];

    public function candidate()
    {
        return $this->belongsToMany(Candidate::class);
    }
}
