<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;

class RegisterController extends Controller
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

        return view('register');


    }


    // public function create()
    // {
    //     return view('home');
    // }
    public function storeregistration(Request $request)
    {
        $session = session()->get('token');
        // dd($request);
        // $response =  Http::withHeaders([
            // 'Accept' => 'application/vnd.api.v1+json',
            // 'Content-Type' => 'application/json'
        // ])->post(config('global.url').'api/guest/biderRegister',
        $response = Http::withToken($session)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->post(config('global.url').'api/member/register',

        [

            "name"=>$request->name,

            "email"=>$request->email,
            // "mobile"=>$request->mobile,

            "password"=>$request->password,

            "password_confirmation"=>$request->password_confirmation,

            // "roles"=>$request->roles

        ]);
    //  return $request->all();

        //  dd($response);
        // echo $response->status();exit;

        if($response->status()===201){

            return redirect()->route('home')->with('success','User Registration Success Please Login!');
        }else{
            // return $response;
            // var_dump($response);exit;
        //   return dd($response->json());
            $request->flash();
            // dd($response);
            return redirect()->back()->with('errors',$response['errors']);
            // return redirect()->back()->with('error',$response['error']);

        }

    }



    public function logout()
    {

        session()->flush();

        session()->forget('token');

        return redirect()->route('home');

    }
}
