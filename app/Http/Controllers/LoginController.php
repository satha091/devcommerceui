<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;

class LoginController extends Controller
{
    //
    public function index(Request $request, $page = 1)
    {

        // try {
        //     $response =  Http::withHeaders([
        //         'Accept' => 'application/vnd.api.v1+json',
        //         'Content-Type' => 'application/json'
        //     ])->get(config('global.url') . '/api/member/prodCat');
        // } catch (\Exception $e) {     }

        // $product = $response['data'];
        // $pagination = $response['meta']['pagination'];
        // $lastpage = $pagination['total_pages'];
        // return view(
        //     'home', compact(
        //        'product', 'pagination'
        //     ));

        return view('login');


    }

    public function show($id,$page = 1)
    {

        try {
            $response =  Http::withHeaders([
                'Accept' => 'application/vnd.api.v1+json',
                'Content-Type' => 'application/json'
            ])->get(config('global.url') . '/api/member/prodCat?include=SubCategories');
        } catch (\Exception $e) {     }

        $prodcategories = $response['data'];

        try{
            $response =  Http::withHeaders([
                'Accept' => 'application/vnd.api.v1+json',
                'Content-Type' => 'application/json'
            ])->get(config('global.url') . '/api/member/item');

        }catch (\Exception $e){
              }

        $item = $response['data'];



        try {
            $response =  Http::withHeaders([
                'Accept' => 'application/vnd.api.v1+json',
                'Content-Type' => 'application/json'
            ])->get(config('global.url') . 'api/member/prodCat/'.$id.'?include=SubCategories');
        } catch (\Exception $e) {     }

        $prodsubcategories = $response['data'];

// return $prodsubcategories;
        try{
            $response =  Http::withHeaders([
                'Accept' => 'application/vnd.api.v1+json',
                'Content-Type' => 'application/json'
            ])->get(config('global.url') . '/api/member/prodSubCat?include=Items');

        }catch (\Exception $e){
              }

        $item = $response['data'];

     // return $item;






        return view(
            'product', compact(
               'item', 'prodcategories','prodsubcategories'
            ));

    }
    // public function show($id)
    // {

    //     $responce = Http::get(config('global.url') . 'api/member/prodCat/'.$id.'?include=SubCategories');
    //     if($responce->ok()){
    //      $xxx= $responce['data'];
    //     // return $xxx;
    //     return view('category', ['categories' =>$xxx]);

    //     }
    //     return $id;
    // }
}
