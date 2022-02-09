<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StockController extends Controller
{
    public function store(Request $request)
    {
        try {
            $r = $request;
            $Data = json_decode($r->Json, true);
            foreach ($Data as $key => $value) {
                $id = DB::table('stocks')->insertGetId(
                    array(
                        'id' => $Data[$key]['id'],
                        'name' => $Data[$key]['Name'],
                    )
                );
            }
            return $id;
        } catch (\Throwable $th) {
            return $th;
        }
    }
}
