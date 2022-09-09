<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Sqits\UserStamps\Concerns\HasUserStamps;
use App\Models\Candidate;

class Job extends Model
{
    use HasUserStamps, HasFactory;

    protected $table = "jobs";
    protected $primaryKey = "id";
    protected $fillable = [
        'name',
    ];

    public function candidate()
    {
        return $this->hasMany(Candidate::class);
    }
}
