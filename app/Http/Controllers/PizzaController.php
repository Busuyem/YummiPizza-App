<?php

namespace App\Http\Controllers;

use App\Pizza;
use App\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PizzaController extends Controller
{
    
    public function addPizza(Request $request){

       

      $data = $this->validate($request, [

            'title' => 'required',

            'description' => 'required',

            'price' => 'required',

            'image' => 'required|max:2000',

            'image.*' => 'mimes:jpg,jpeg,png,pdf',

        ]);

        

        
        
        $data['image'] = $request->image->store('images', 'public');
       
        $pizza = Pizza::create($data);

        return redirect('/');
    

    }


    public function showPizzas(){
    
        $pizzas = Pizza::orderBy("updated_at", "desc")->Paginate(10);

        return view("pizza.index", compact("pizzas"));
    
    }


    public function getAddToCart(Request $request, $id){

        $pizza = Pizza::findOrFail($id);

        $oldCart = Session::has('cart') ? Session::get('cart') : null;

        $cart = new Cart($oldCart);

        $cart->add($pizza, $pizza->id);

        $request->session()->put('cart', $cart);

        return redirect()->route('showpizza');

    }


    public function shoppingCart(){
        
        if(!Session::has("cart")){
            
            return view("pizza.shopping");

        }


        $oldCart = Session::get("cart");

        $cart = new Cart($oldCart);

        $shipping = $cart->shippingCost;

        return view('pizza.shopping', ["pizzas" => $cart->items, "totalPrice" => $cart->totalPrice, "shipping" => $shipping]);
    }

    
   /* public function transaction(){

        if(!Session::has("cart")){
            
            return view("pizza.shopping");

        }

        $oldCart = Session::get("cart");

        $cart = new Cart($oldCart);
        $cart->user = auth()->user()->session();
        $total = $cart->totalPrice;

        $shipping = $cart->shippingCost;

        return view("pizza.checkout", compact('total', 'shipping'));
    }
    */

    



    public function checkout(){

        if(!Session::has("cart")){
            
            return view("pizza.shopping");

        }

        $oldCart = Session::get("cart");


        $cart = new Cart($oldCart);

        $total = $cart->totalPrice;

        $shipping = $cart->shippingCost;

        //Session::flush();
        return view("pizza.checkout", compact('total', 'shipping'));
    }

    public function payment(){

        Session::flush();
        
        return view("pizza.payment")->with("payment", "Payment Successful. Thanks for patronizing us");
    }

}
