<?php

namespace App\Http\Controllers;

use App\Models\shopping;
use Illuminate\Http\Request;
use Validator;

class ShoppingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Shopping = shopping::all();
        return response()->json($Shopping);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required',
            'createddate' => 'date',
        ]);

        if ($validation->fails()) {
            return response()->json(['error' => $validation->errors()]);
        }

        $data = shopping::create([
            'name' => $request->name,
            'createddate' => $request->createddate,
        ]);

        return response()->json(['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\shopping  $shopping
     * @return \Illuminate\Http\Response
     */
    public function show(shopping $shopping)
    {
        //
    }

    public function search($id)
    {
        $Shopping = shopping::where('id', $id)->get();
        return response()->json($Shopping);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\shopping  $shopping
     * @return \Illuminate\Http\Response
     */
    public function edit(shopping $shopping)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\shopping  $shopping
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, shopping $shopping)
    {

        shopping::where('id', $shopping->id)
            ->update([
                'name' => $request->name,
                'createddate' => $request->createddate,
            ]);

        $data = shopping::where('id', $shopping->id)->get();
        return response()->json(['data' => $data, 'message' => 'success update']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\shopping  $shopping
     * @return \Illuminate\Http\Response
     */
    public function destroy(shopping $shopping)
    {
        shopping::destroy($shopping->id);
        return response()->json(['message' => 'success delete']);
    }
}