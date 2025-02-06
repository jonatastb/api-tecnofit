<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\RankingService;
use App\Models\Movement;
use App\Models\PersonalRecord;
use Illuminate\Http\Request;

class RankingController extends BaseController
{

    public function index()
    {
        try {

            $movements = Movement::with('personalRecord.user')->get();
            $rankings = RankingService::getAllMovementsRanking($movements);
            return $this->successResponse($rankings, 200, 'Todos os recordes dos movimentos');

        } catch (\Exception $e) {

            return $this->errorResponse(500, ['error' => 'Internal Server Error', 'message' => $e->getMessage()]);

        }
    }

    public function show($id)
    {
        try {
            $movement = Movement::find($id);
            if (!$movement) {

                return $this->errorResponse(404, ['error' => 'Not Found', 'message' => 'Movimento nao encontrado']);
            }

            $rankings = RankingService::getRanking($movement);
            return $this->successResponse($rankings, 200, 'Recordes do movimento ' . $movement->name);

        } catch (\Exception $e) {
            
            return $this->errorResponse(500, ['error' => 'Internal Server Error', 'message' => $e->getMessage()]);

        }
    }
}
