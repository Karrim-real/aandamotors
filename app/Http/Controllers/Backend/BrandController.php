<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BandController extends Controller
{
    //Authentication Middleware
    public function __construct()
    {
      $this->middleware('auth');
    }


    public function index()
    {
       return view('backend.brand.index');
    }

    public function show($prodId)
    {
        $prods = Brand::where('id', $prodId)->first()->get();
        return view('backend.brand.edit-brand', compact('prods'));
    }

    public function store()
    {
        return view('backend.brand.add-brand');
    }
    public function insertProduct(Request $request)
    {
        $fields = $request->validate([]);
        return view('backend.brand.edit-brand');

    }

    public function edit($prodId)
    {
        $products = Brand::where('id', $prodId)->first()->get();
        return view('backend.brand.edit-brand', compact('products'));
    }

    public function update(Request $request, $prodId)
    {
        $prodId = Brand::where('id', $prodId)->first()->get();
        return view('backend.brand.edit-brand', compact('prodId'));
    }
    public function deleteBrand($prodId)
    {
        $prodid = Brand::where('id', $prodId);
        if($prodId->exists()){
            $prodid->delete();
        }else{
            return response()->json(['status' => 'error', 'message' => "An error occur while delete product"]);
        }

    }
}
