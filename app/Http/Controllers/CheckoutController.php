<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;

class CheckoutController extends Controller
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

        return view('checkout');


    }

    public function show($id,$page = 1)
    {






        try {
            $response =  Http::withHeaders([
                'Accept' => 'application/vnd.api.v1+json',
                'Content-Type' => 'application/json'
            ])->get(config('global.url') . 'api/member/item/'.$id.'?include=ItemVariants');
        } catch (\Exception $e) {     }

        $itemvariant = $response['data'];

// return $itemvariant;


     // return $item;






        return view(
            'variant', compact(
               'itemvariant'
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
