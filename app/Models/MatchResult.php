<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MatchResult extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['match_id','home_score','away_score'];

    public function match()
    {
        return $this->belongsTo(MatchSchedule::class, 'match_id');
    }

    public function goals()
    {
        return $this->hasMany(Goal::class);
    }
}
