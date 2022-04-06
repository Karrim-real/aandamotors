<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    // Getting Product to Home
    public function index()
    {
        $prods = Product::all();
       return view('frontend.index', compact('prods'));
    }

        // Getting Product to Home
        public function show($prodID)
        {

            $prod = Product::find($prodID);
            // dd($prod);
           return view('frontend.product', compact('prod'));
        }

        public function contact()
        {
            return view('');
        }



}
