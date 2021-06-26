<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class produkController extends BaseController
{
    public function create(Request $request){
        $data=$request->all();
        $produk=Produk::create($data);

        return response()->json($produk);
    }
}
