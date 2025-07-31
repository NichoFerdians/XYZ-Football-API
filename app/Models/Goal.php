<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Goal extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['match_result_id','player_id','minute'];

    public function result()
    {
        return $this->belongsTo(MatchResult::class, 'match_result_id');
    }

    public function player()
    {
        return $this->belongsTo(Player::class);
    }
}
