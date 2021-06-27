<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class produkController extends BaseController
{

    public function __construct(){

        $this->middleware('auth');

    }

    public function index(){
        $produk=Produk::all();
        return response()->json($produk);
    }

    public function show($id){
        $produk=Produk::find($id);
        return response()->json($produk);
    }



    public function create(Request $request){
        $this->validate($request,[
        'nama'=> 'required|string',
        'harga'=> 'required|integer',
        'warna'=> 'required|string',
        'kondisi'=> 'required|in:baru,lama',
        'deskripsi'=> 'required|string',
        ]);


        $data=$request->all();
        $produk=Produk::create($data);

        return response()->json($produk);
    }

    public function update(Request $request, $id){
        $produk = Produk::find($id);

        if(!$produk){
            return response()->json(['message'=>'product not found'],404);
        }

        $data = $request->all();

        $produk->update($data);

        // $produk->save();
        return response()->json($produk);
    }

    public function destroy($id){
        $produk = Produk::find($id);

        if(!$produk){
            return response()->json(['message'=>'product not found'],404);
        }

        $produk->delete();
        return response()->json(['message'=>'data berhasil di delet']);

    }

}
