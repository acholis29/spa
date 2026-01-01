<?php

namespace App\Http\Controllers;
use App\Models\MsCatalogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailController extends Controller
{
    public function index(Request $r)
    {
        $dt = MsCatalogs::query()
             ->join('ms_catalog_groups', 'ms_catalogs.mscatalog_groups_id', '=', 'ms_catalog_groups.id')
             ->join('ms_catalog_categorys', 'ms_catalogs.mscatalog_categorys_id', '=', 'ms_catalog_categorys.id')
             ->join('ms_currencies', 'ms_catalogs.mscurrencies_id', '=', 'ms_currencies.id')
             ->select(
                'ms_catalogs.*',
                'ms_catalog_groups.name as group_name',
                'ms_catalog_categorys.name as category_name',
                'ms_currencies.code as currency_code',
                )
            ->where('ms_catalogs.sku', $r->id)
            ->get();

            if($dt->isEmpty()){
                abort(404);
            }

        $dtimg=DB::table('ms_catalog_images')
            ->where('ms_catalog_id', $dt[0]->id)
            ->get();
          // dump($dt); 
        return view('detail',['dt' => $dt, 'dtimg' => $dtimg]);
    }
}
