<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExperimentWindowController extends Controller
{
    public function store(Request $request)
    {
        try {
            $r = $request;
            $id = $this->alreadyExists($request);
            if (!is_numeric($id)) {
                $results = DB::table('experiment_windows')->insertGetId(
                    array(
                        'experimentId' => $r->experimentId,
                        'train_test' => $r->train_test,
                        'k_window' => $r->k_window,
                        'stockA1Id' => $r->stockA1Id,
                        'stockA2Id' => $r->stockA2Id,
                        'stockB1Id' => $r->stockB1Id,
                        'stockB2Id' => $r->stockB2Id,
                        'A_return' => $r->A_return,
                        'A_tradeCount' => $r->A_tradeCount,
                        'A_successCount' => $r->A_successCount,
                        'A_STDReturn' => $r->A_STDReturn,
                        'A_MaxReturn' => $r->A_MaxReturn,
                        'A_MinReturn' => $r->A_MinReturn,
                        'A_profit_loss_ratio' => $r->A_profit_loss_ratio,
                        'A_profitFactor' => $r->A_profitFactor,
                        'A_MaxDrawdown' => $r->A_MaxDrawdown,
                        'B_return' => $r->B_return,
                        'B_tradeCount' => $r->B_tradeCount,
                        'B_successCount' => $r->B_successCount,
                        'B_STDReturn' => $r->B_STDReturn,
                        'B_MaxReturn' => $r->B_MaxReturn,
                        'B_MinReturn' => $r->B_MinReturn,
                        'B_profit_loss_ratio' => $r->B_profit_loss_ratio,
                        'B_profitFactor' => $r->B_profitFactor,
                        'B_MaxDrawdown' => $r->B_MaxDrawdown,
                    )
                );
                $id = $results;
            } else {
                $this->update($request, $id);
            }
            $JSON = array('id' => $id);
            return $id;
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function update(Request $request, $id)
    {
        DB::table('experiment_windows')
            ->where('id', $id)
            ->update(
                array(
                    'train_test' => $r->train_test,
                    'k_window' => $r->k_window,
                    'stockA1Id' => $r->stockA1Id,
                    'stockA2Id' => $r->stockA2Id,
                    'stockB1Id' => $r->stockB1Id,
                    'stockB2Id' => $r->stockB2Id,
                    'A_return' => $r->A_return,
                    'A_tradeCount' => $r->A_tradeCount,
                    'A_successCount' => $r->A_successCount,
                    'A_STDReturn' => $r->A_STDReturn,
                    'A_MaxReturn' => $r->A_MaxReturn,
                    'A_MinReturn' => $r->A_MinReturn,
                    'A_profit_loss_ratio' => $r->A_profit_loss_ratio,
                    'A_profitFactor' => $r->A_profitFactor,
                    'A_MaxDrawdown' => $r->A_MaxDrawdown,
                    'B_return' => $r->B_return,
                    'B_tradeCount' => $r->B_tradeCount,
                    'B_successCount' => $r->B_successCount,
                    'B_STDReturn' => $r->B_STDReturn,
                    'B_MaxReturn' => $r->B_MaxReturn,
                    'B_MinReturn' => $r->B_MinReturn,
                    'B_profit_loss_ratio' => $r->B_profit_loss_ratio,
                    'B_profitFactor' => $r->B_profitFactor,
                    'B_MaxDrawdown' => $r->B_MaxDrawdown,
                )
            );
    }

    public function alreadyExists(Request $request)
    {
        try {
            $r = $request;
            $results = DB::table('experiment_windows')
            ->select('id')
            ->where('experimentId', $r->experimentId)
            ->get();
            return $results[0]->id;
        } catch (\Throwable $th) {
            return $th;
        }
    }
}
