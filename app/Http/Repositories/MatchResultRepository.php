<?php

namespace App\Http\Repositories;

use App\Models\MatchResult;
use App\Models\Goal;

class MatchResultRepository
{
    public function all()
    {
        return MatchResult::with(['match.homeTeam','match.awayTeam','goals.player'])->get();
    }

    public function find($id)
    {
        return MatchResult::with(['match','goals.player'])->findOrFail($id);
    }

    public function create(array $data)
    {
        $goalsData = $data['goals'] ?? [];
        unset($data['goals']);

        $result = MatchResult::create($data);

        foreach ($goalsData as $g) {
            $result->goals()->create($g);
        }

        return $this->find($result->id);
    }

    public function update(MatchResult $res, array $data)
    {
        if (isset($data['home_score'])) {
            $res->home_score = $data['home_score'];
        }
        if (isset($data['away_score'])) {
            $res->away_score = $data['away_score'];
        }
        $res->save();

        if (isset($data['goals'])) {
            // Soft-delete old goals
            $res->goals()->delete();
            foreach ($data['goals'] as $g) {
                $res->goals()->create($g);
            }
        }

        return $this->find($res->id);
    }

    public function delete(MatchResult $res)
    {
        return $res->delete();
    }
}
