<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GAParamsController extends Controller
{
    public function store(Request $request)
    {
        try {
            $r = $request;
            $id = $this->alreadyExists($request);
            if (!is_numeric($id)) {
                $results = DB::table('ga_params')->insertGetId(
                    array(
                        'experimentId' => $r->experimentId,
                        'population' => $r->population,
                        'generation' => $r->generation,
                        'crossoverRate' => $r->crossoverRate,
                        'mutationRate' => $r->mutationRate,
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
        DB::table('ga_params')
            ->where('id', $id)
            ->update(
                array(
                    'population' => $r->population,
                    'generation' => $r->generation,
                    'crossoverRate' => $r->crossoverRate,
                    'mutationRate' => $r->mutationRate,
                )
            );
    }

    public function alreadyExists(Request $request)
    {
        try {
            $r = $request;
            $results = DB::table('ga_params')
            ->select('id')
            ->where('experimentId', $r->experimentId)
            ->get();
            return $results[0]->id;
        } catch (\Throwable $th) {
            return $th;
        }
    }
}
