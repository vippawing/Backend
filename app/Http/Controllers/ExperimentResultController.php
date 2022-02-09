<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExperimentResultController extends Controller
{
    public function store(Request $request)
    {
        try {
            $r = $request;
            $id = $this->alreadyExists($request);
            if (!is_numeric($id)) {
                $results = DB::table('experiment_results')->insertGetId(
                    array(
                        'experimentId' => $r->experimentId,
                        'train_test' => $r->train_test,
                        'return' => $r->return,
                        'tradeCount' => $r->tradeCount,
                        'successCount' => $r->successCount,
                        'STDReturn' => $r->STDReturn,
                        'MaxReturn' => $r->MaxReturn,
                        'MinReturn' => $r->MinReturn,
                        'profit_loss_ratio' => $r->profit_loss_ratio,
                        'profitFactor' => $r->profitFactor,
                        'MaxDrawdown' => $r->MaxDrawdown,
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
        DB::table('experiment_results')
            ->where('id', $id)
            ->update(
                array(
                    'train_test' => $r->train_test,
                    'return' => $r->return,
                    'tradeCount' => $r->tradeCount,
                    'successCount' => $r->successCount,
                    'STDReturn' => $r->STDReturn,
                    'MaxReturn' => $r->MaxReturn,
                    'MinReturn' => $r->MinReturn,
                    'profit_loss_ratio' => $r->profit_loss_ratio,
                    'profitFactor' => $r->profitFactor,
                    'MaxDrawdown' => $r->MaxDrawdown,
                )
            );
    }

    public function alreadyExists(Request $request)
    {
        try {
            $r = $request;
            $results = DB::table('experiment_results')
            ->select('id')
            ->where('experimentId', $r->experimentId)
            ->get();
            return $results[0]->id;
        } catch (\Throwable $th) {
            return $th;
        }
    }
}
