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

    public function login(Request $request)
    {
        // echo config('global.url');exit;
        $respose = Http::withHeaders([
            'Accept' => 'application/vnd.api.v1+json',
            'Content-Type' => 'application/json'
        ])->post(config('global.url').'/oauth/token', [
            "grant_type" => "password",
            "client_id" => 2,
            "client_secret" => "Hridhamtech",
            "username" => $request->username,
            "password" => $request->password,
            "scope" => ''
        ]);

        if($respose->ok()){

            $request->session()->put('token',$respose->json()['access_token']);

            $request->session()->save();

            $token = session()->get('token');

            try{

                $profresponse = Http::withToken($token)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->get(config('global.url') .'api/me');

                // $profresponse = json_decode($call->getBody()->getContents(), true);



            }catch (\Exception $e){
                //buy a beer


            }

            if($profresponse->ok()){

                // return $profresponse->json()['data']['name'];

                $username = $profresponse->json()['data']['name'];

                $request->session()->put('username',$username);
                // return $request->all();

                $request->session()->save();

            }
// return $respose;
            return redirect()->route('allproduct');

        }
        else{

            return redirect()->route('home')->with($respose->json());
        }
        //  return 1;
        //
    }

    // public function create()
    // {
    //     return view('home');
    // }
    // public function storeregistration(Request $request)
    // {
    //     $session = session()->get('token');
    //     // dd($request);
    //     // $response =  Http::withHeaders([
    //         // 'Accept' => 'application/vnd.api.v1+json',
    //         // 'Content-Type' => 'application/json'
    //     // ])->post(config('global.url').'api/guest/biderRegister',
    //     $response = Http::withToken($session)->withHeaders(['Accept'=>'application/vnd.api.v1+json','Content-Type'=>'application/json'])->post(config('global.url').'api/guest/biderRegister',

    //     [

    //         "name"=>$request->name,

    //         "email"=>$request->email,
    //         "mobile"=>$request->mobile,

    //         "password"=>$request->password,

    //         "password_confirmation"=>$request->password_confirmation,

    //         // "roles"=>$request->roles

    //     ]);
    // //  return $request->all();

    //     //  dd($response);
    //     // echo $response->status();exit;

    //     if($response->status()===201){

    //         return redirect()->route('home')->with('success','User Registration Success!');
    //     }else{
    //         // var_dump($response);exit;
    //       // return dd($response->json());
    //         $request->flash();
    //         // dd($response);
    //         return redirect()->route('home')->with('error',$response['errors']);

    //     }

    // }



    public function logout()
    {

        session()->flush();

        session()->forget('token');

        return redirect()->route('home');

    }
}
