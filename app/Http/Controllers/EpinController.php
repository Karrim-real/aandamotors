<?php

namespace App\Http\Controllers;

use App\Models\Epin;
use Illuminate\Http\Request;


class EpinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_pin = Epin::all();
        return response()->json([
            'status' => 'success',
            'data' => $all_pin
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $inputs = $request->validate([
        //     'generated_pin' => 'required',
        //     'generated_status' => 'required',
        //     'redem_pin' => 'required'
        // ]);

        $inputs['generated_pin'] = 'prc'.rand(1000, 9999);
        $inputs['generated_status'] = 'success';
        $inputs['redem_pin'] = '0';
        $create_pin = Epin::create([
            'generated_pin' => $inputs['generated_pin'],
            'generated_status' => $inputs['generated_status'],
            'redem_pin' => $inputs['redem_pin'],
        ]);
        if ($create_pin) {
            # code...
            return response()->json([
                'status' => 'success',
                'data' => $create_pin
            ]);
        }
        return response()->json([
            'status' => 'error',
            'message' => 'An error occur'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $searchpin = $request->get('pin');
        $pin = Epin::where('generated_pin', 'LIKE', '%'.$searchpin.'%')->get();

        if ($pin) {
            return response()->json([
                'status' => 'success',
                'data' => $pin
            ]);
        } else {
            return response()->json([
                'status' => 'success',
                'data' => 'No Data Found'
            ]);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
