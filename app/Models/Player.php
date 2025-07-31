<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Player extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'team_id','name','height','weight','position','jersey_number'
    ];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
