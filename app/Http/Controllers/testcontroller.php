<?php

namespace App\Http\Controllers;

use App\Models\orders;
use App\Models\Products;
use App\Models\Slide;
use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Auth;

class testcontroller extends Controller
{
    private $name = 'ahmed';
    //
    public function about() {
        $x = $this->name;
        $users = User::all();
        return view('testpage',compact('x','users'));
        // return view('testpage',['x'=>$this->name]);;
    }
    public function contact() {
        
    }
    public function home() {
        $products = Products::all();
        $slids = Slide::all();
        // dd($products);
        return view('homepage',compact('products','slids'));
    }
    public function product($id) {
        $product = Products::find($id);
        // dd($products);
        return view('productpage',compact('product'));
    }
    public function orderSave(Request $r) {
        $user = auth()->user();
        $product = Products::find($r->prdct_id);
        orders::create([
            'user'=> $user->id,
            'product'=> $product->id,
            'price'=> $product->price_sale,
            'count'=> $r->count,
            'total'=> $r->count * $product->price_sale
        ]);
        return redirect()->route('product',$r->prdct_id);
    }
}
