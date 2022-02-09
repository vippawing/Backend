<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExperimentController extends Controller
{
    public function store(Request $request)
    {
        try {
            $r = $request;
            $id = $this->alreadyExists($request);
            if (!is_numeric($id)) {
                $results = DB::table('experiments')->insertGetId(
                    array(
                        'startDate' => $r->startDate,
                        'endDate' => $r->endDate,
                        'selectMethod' => $r->selectMethod,
                        'k_close' => $r->k_close,
                        'nSTD' => $r->nSTD,
                        'window_size' => $r->window_size,
                        'predict_size' => $r->predict_size,
                    )
                );
                $id = $results;
            }
            $JSON = array('id' => $id);
            return $id;
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function alreadyExists(Request $request)
    {
        try {
            $r = $request;
            $results = DB::table('experiments')
            ->select('id')
            ->where('startDate', $r->startDate)
            ->where('endDate', $r->endDate)
            ->where('selectMethod', $r->selectMethod)
            ->where('k_close', $r->k_close)
            ->where('nSTD', $r->nSTD)
            ->where('window_size', $r->window_size)
            ->where('predict_size', $r->predict_size)
            ->get();
            return $results[0]->id;
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function getResultReturn(Request $request)
    {
        try {
            $r = $request;
            $results = DB::table('experiments')
            ->join('experiment_results', 'experiment_results.experimentId', '=', 'experiments.id')
            ->select('experiments.selectMethod', 'experiments.nSTD', 'experiment_results.return as Return')
            ->where('experiments.window_size', $r->window_size)
            ->where('experiments.predict_size', $r->predict_size)
            ->where('experiment_results.train_test', $r->train_test)
            ->get();
            return $results;
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function getResultSTDReturn(Request $request)
    {
        try {
            $r = $request;
            $results = DB::table('experiments')
            ->join('experiment_results', 'experiment_results.experimentId', '=', 'experiments.id')
            ->select('experiments.selectMethod', 'experiments.nSTD', 'experiment_results.STDReturn as Return')
            ->where('experiments.window_size', $r->window_size)
            ->where('experiments.predict_size', $r->predict_size)
            ->where('experiment_results.train_test', $r->train_test)
            ->get();
            return $results;
        } catch (\Throwable $th) {
            return $th;
        }
    }
}
