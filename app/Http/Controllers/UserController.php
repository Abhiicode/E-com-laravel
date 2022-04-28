<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginValidation;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Validator;
use App\Services\ProductServices;

class UserController extends Controller
{

    private $productService;


    public function __construct(ProductServices $productService){
        $this->productService = $productService;
    }

    function login(Request $request){
        
        //?validating requests wether the email and password field is empty or not
        // $requestUser = $request->validated();
        // $validator = Validator::make($request->all(),[
        //     'email'=>'required',
        // ])->validate();
        // $validatedData = $request->validate([
        //     'email'=>'required|email',
        // ]);

        // dd($validatedData);
        // dd($request->all());
        $validate = array(
            'email' => 'required|email',
            'password'=>'required|min:5|max:15'
         );
        $validatedData = Validator::make($request->all(),$validate);
        if($validatedData->fails()) {
          $err = $validatedData->errors()->toArray();
          return view('login',["err"=>$err]); 
        }

        // return redirect("/");
        // dd($validateReq);
        // dd($validatedData);
        
        
        
        //?getting user from User table from data base using email attribute
        $user =  User::where('users.email' ,'=' , $request->email)->first();
        
        //! checking if entered credentials are good to go or not 
        if(!$user || !Hash::check($request->password,$user->password)){
            return "Username or Password is not matched";
        }else{
            $request->session()->put('user',$user);
            return redirect('/');
        }
    }

    function register(Request $req){
        //? validating entered credentials wether the email name password fields are empty or not
        // $req->validate([
        //     'birthdayDate'=>'required',
        //     'lastName' => 'required',
        //     'firstName' => 'required',
        //     'email' => 'required|email|unique:users',
        //     'password'=> 'required|min:5|max:12',
        //     'confirmPassword'=>'required'
        // ]);
        return $this->productService->registerUser($req);
    }
}
