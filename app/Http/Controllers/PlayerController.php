<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Services\PlayerService;
use App\Http\Requests\StorePlayerRequest;
use App\Http\Requests\UpdatePlayerRequest;

class PlayerController extends Controller
{
    protected $svc;
    public function __construct(PlayerService $svc){ $this->svc=$svc; }

    public function index() { return response()->json($this->svc->list()); }
    public function show($id){ return response()->json($this->svc->get($id)); }
    public function store(StorePlayerRequest $r){
        return response()->json($this->svc->create($r->validated()),201);
    }
    public function update(UpdatePlayerRequest $r,$id){
        try {
            $result = $this->svc->update($id,$r->validated());
        } catch (\Throwable $e) {
            return response()->json(['messages'=> $e->getMessage()], 422);
        }
        return response()->json($result);
    }
    public function destroy($id){
        try {
            $result = $this->svc->delete($id);
        } catch (\Throwable $e) {
            return response()->json(['messages'=> $e->getMessage(), 'deleted' => false], 422);
        }
        return response()->json(['deleted' => $result]);
    }
}
