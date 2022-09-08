<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Product;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function update_product_confirm( Request $request, $id){
        $product=product::find($id);
       
        
        $image=$request->image;
        //if only image then this line execute
        if($image){
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product',$imagename);
        $product->image=$imagename;
        }
        


        $product->product_name=$request->title;
        $product->discription=$request->discription;
        $product->type=$request->type;
        $product->price=$request->price;
       
        $product->stock=$request->stock;
        $product->weight=$request->weight;
        $product->save();
        return redirect()->back()->with('message','product updated successfuly');
    }
    public function register(){
        return view('admin.register');
    }
     
    public function update_product($id){
           $product=product::find($id);

           
           
        
         return view('admin.update_product',compact('product'));
     }

    public function delete_product($id){

       $product=product::find($id);
       $product->delete();

        return redirect()->back()->with('message', 'Product Deleted Succesfully');
    }

    public function add_product(Request $request){
        $product=new product;
        $product->product_name=$request->title;
        $product->discription=$request->discription;
        $product->type=$request->type;
        $product->price=$request->price;
        $product->weight=$request->weight;
        $product->stock=$request->stock;
        
        
  
        $image=$request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product',$imagename);
        $product->image=$imagename;
  
  
        $product->save();
        return redirect()->back()->with('message','Succesfully product added');
        
      }
  
  
      public function view_product(){
          $product=product::all();
          return view('admin.view_product',compact('product'));
      }
  
      public function show_product(){
          $product=product::all();
          return view('admin.show_product',compact('product'));
      }
  
      


    public function login(){
        return view('admin.login');
    }
    public function index(){
        return view('admin.index');
    }
    




    public function store(Request $request)
    {

        $validate = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:admin',
            'password' => 'required|min:5',
            'gender' => 'required',
            'phone' => 'required|min:10|max:10',
            'address' => 'required',
            'dob' => 'required',
        ]);

        $admin = new Admin();
        $admin->first_name = $request->input('first_name');
        $admin->last_name = $request->input('last_name');
        $admin->email = $request->input('email');
        $admin->password = Hash::make($request->input('password'));
        $admin->phone = $request->input('phone');
        $admin->gender = $request->input('gender');
        $admin->dob = $request->input('dob');
        $admin->address = $request->input('address');
        $admin->save();

        return redirect()->route('admin.login');

        
    }
    public function signup(Request $request ){

        $validate = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $email = $request->input('email');
        $password = $request->input('password');

        $admin = Admin::where('email', $email)->first();
        // select * from users where email = $email;

        if (!empty($admin)) {

            if (Hash::check($password, $admin->password)) {
                //Session::put('user_id', $admin->id);

                

                return redirect()->route('admin.index');
            } else {
                return view('admin.login', [
                    'msg' => 'Invalid username and password.',
                ]);
            }
        } else {
            return view('admin.login', [
                'msg' => 'User does not exist.',
            ]);
        }




    }
}
