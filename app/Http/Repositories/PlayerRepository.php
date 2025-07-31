<?php

namespace App\Http\Repositories;

use App\Models\Player;

class PlayerRepository
{
    public function all()   { return Player::with('team')->get(); }
    public function find($id){ return Player::findOrFail($id); }
    public function create(array $data){ return Player::create($data); }
    public function update(Player $p,array $d){ $p->update($d); return $p; }
    public function delete(Player $p){ return $p->delete(); }
}
