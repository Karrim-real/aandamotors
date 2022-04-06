<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class BackendController extends Controller
{

    //Authentication Middleware
    public function __construct()
    {
      $this->middleware('auth');
    }


    public function index()
    {
        $prods = Product::latest()->get();
       return view('backend.index', compact('prods'));
    }

    public function show($prodId)
    {
        // $prods = Product::where('id', $prodId)->first()->get();
        return view('backend.edit-product', compact('prods'));
    }

    public function store()
    {
        return view('backend.add-product');
    }
    public function insertProduct(Request $request)
    {
        $validate = $request->validate([
        'name' => 'required',
        'short_desc' => 'required',
        'selling_price' => 'required',
        'discount_price' => 'required',
        'status' => 'required',
        'qty' => 'required',
        'desc' => 'required',
        'slug' => 'required',
        'brand_id' => 'required',
        ]);
        // if($request->hasFile(('image'))){
        //     $file = $request->file('image');
        //     $ext = $file->getClientOriginalName();
        //     $filename = time().'.'.$ext;
        //     $file->move("uploads/images/", $filename);
        //     $fields['image'] = $filename;
        // }
        $fields = $request->all();
        // dd($fields);
        $fields['status'] = $request->status == TRUE ? '1': '0';
        // $fields['image'] = time().'.'. $request->image->extension();
        // $request->image->move("uploads/images", $fields['image']);
        $prods = Product::create($fields);
        $url = 'dashboard';
        return response()->json(['status' => 'success', 'message'=> "Product Added Successfully ", 'url' => $url]);
        // return view('backend.index', compact('prods'));

    }

    public function edit($prodId)
    {
        $product = Product::where('id', $prodId)->first();
        return view('backend.edit-product', compact('product'));
    }

    public function updateProduct(Request $request, $prodId)
    {
        $prods = Product::where('id', $prodId)->first();
        $inputs = $request->all();
        $inputs['status'] = $request->status == TRUE ? '1': '0';
        $prods->update($inputs);
        $url = '/dashboard';
        // return view('backend.index', compact('prods'));
        return response()->json(['status' => 'success', 'message'=> "Product Update Successfully ", 'url' => $url]);


    }

    public function deleteProduct($prodId)
    {
        $prodid = Product::where('id', $prodId);
        if($prodId->exists()){
            $prodid->delete();
            $url = 'dashboard';
        return response()->json(['status' => 'success', 'message'=> "Product Removed ", 'url' => $url]);
        }else{
            return response()->json(['status' => 'error', 'message' => "An error occur while delete product"]);
        }

    }
}
