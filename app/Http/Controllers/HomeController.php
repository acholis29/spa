<?php

namespace App\Http\Controllers;

use App\Models\MsCatalogGroups;
use App\Models\MsCatalogImages;
use App\Models\MsCatalogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    public function index()
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
                DB::raw("ifnull((SELECT catalog_images FROM ms_catalog_images WHERE ms_catalog_id = ms_catalogs.id LIMIT 1), 'noimages.jpg') as catalog_images"))
            ->where('ms_catalogs.is_active', 1)
            ->get();
        //   dump($dt); 
        return view('home', ['dt' => $dt]);
    }
}
