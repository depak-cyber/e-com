<?php

namespace App\Http\Controllers;
use App\Models\Users;
use App\Models\Product;
use App\Models\UserFavorite;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
   
    
  


    public function register(){
        return view('user.register');
    }
 

    public function login(){
        return view('user.login');
    }
    public function index(){
        return view('user.index');
    }

    public function store(Request $request)
    {

        $validate = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5',
            'gender' => 'required',
            'phone' => 'required|min:10|max:10',
            'address' => 'required',
            'dob' => 'required',
        ]);

        $user = new Users();
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->phone = $request->input('phone');
        $user->gender = $request->input('gender');
        $user->dob = $request->input('dob');
        $user->address = $request->input('address');
        $user->save();

        return redirect()->route('user.login');

        
    }
    public function signup(Request $request ){

        

        $validate = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $email = $request->input('email');
        $password = $request->input('password');

        $user = Users::where('email', $email)->first();
        

         //product data
        

        if (!empty($user)) {

            if (Hash::check($password, $user->password)) {
                Session::put('user_id', $user->id);

               if($user->role=='admin'){
                return redirect()->route('admin.index');

               } else {
                return redirect()->route('welcome');
               }

                
            } else {
                return view('user.login' && 'admin.login', [
                    'msg' => 'Invalid username and password.',
                ]);
            }
        } else {
            return view('user.login' && 'admin.login', [
                'msg' => 'User does not exist.',
            ]);
        }




    }
    
    public function welcome(){ 
            $userId= Session::get('user_id');
            $product = Product::all();
            //$product=Product::limit(3)->get();

            $products=product::where(['type'=>'Top seller'])->get();
            $featured= product::where(['type'=>'Featured'])->get();
            
            return view('welcome',compact('product','products', 'featured'));
            
        }
       
      public function addProduct(Request $request){
        $product_id = $request->input('product_id');
        if(Session::check()){
            $prod_check= Product::where('id',$product_id)->first();
            if($prod_check){
                
                if(UserFavorite::where('products_id',$product_id)->where('users_id', Session::id())->exists()){
                    return response()->json(['status'=>$prod_check->name.' already Added to cart']);
                }
                else{

                 $fav=new UserFavorite();
                 $fav->products_id=$product_id;
                 $fav->users_id=Session::id();
                 $fav->save();
                 return response()->json(['status'=>$prod_check->name.' Added to cart']);

                }
                 


            }else{

            }
        }else {

        }
        return response()->json(['status'=>'login to continue']);
      }
        
        
    

    public function product_details($id){
        $product=product::find($id);
       
        return view('user.product_details',compact('product'));
        
    }

  
    
    

    
    
    public function forgotpassword(){
        return view('user.forgotpassword');
    }
}    
