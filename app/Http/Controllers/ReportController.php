<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\MatchResult;

class ReportController extends Controller
{
    public function matchReport()
    {
        $results = MatchResult::with('match.homeTeam','match.awayTeam','goals.player')->get();

        $accHomeWins = 0;
        $accAwayWins = 0;
        $data = $results->map(function($res) use (&$accHomeWins,&$accAwayWins) {
            $home = $res->home_score;
            $away = $res->away_score;
            $status = $home > $away ? 'Home Menang' : ($away > $home ? 'Away Menang' : 'Draw');
            if ($home > $away) $accHomeWins++; elseif ($away > $home) $accAwayWins++;

            $topScorer = collect($res->goals)
                ->groupBy('player_id')
                ->map(fn($g,$pid)=> ['player'=> $g->first()->player->name, 'count'=> count($g)])
                ->sortByDesc('count')
                ->first();

            return [
                'match_date' => $res->match->match_date,
                'match_time' => $res->match->match_time,
                'home_team'  => $res->match->homeTeam->name,
                'away_team'  => $res->match->awayTeam->name,
                'score'      => "$home - $away",
                'status'     => $status,
                'top_scorer'=> $topScorer,
                'acc_home_wins' => $accHomeWins,
                'acc_away_wins' => $accAwayWins,
            ];
        });

        return response()->json($data);
    }
}
