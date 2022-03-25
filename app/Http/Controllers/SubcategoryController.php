<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;

class SubcategoryController extends Controller
{
    //
    public function index(Request $request, $page = 1)
    {


        // return view('home');


    }
    public function subcategory($id)
    {
        //    return $prope_id;
        $session = session()->get('token');
        try {
            $response =  Http::withHeaders([
                'Accept' => 'application/vnd.api.v1+json',
                'Content-Type' => 'application/json'
            ])->get(config('global.url') . 'api/member/prodCat/'.$id.'?include=SubCategories');
        } catch (\Exception $e) {     }

        $prodsubcategories = $response['data']['SubCategories']['data'];

        return view(
            'subcategory', compact(
               'prodsubcategories'
            ));
    }

    public function show($id,$page = 1)
    {


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
