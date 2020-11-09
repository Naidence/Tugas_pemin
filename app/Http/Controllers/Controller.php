<?php

namespace App\Http\Controllers;

use App\Models\data;

use App\Models\pemin;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function index()
    {
        return data::all();
    }

    public function indexpemin()
    {
        return pemin::all();
    }

    public function getdatabyid(Request $request, $id){
        $result = DB::select("SELECT * FROM pemin WHERE id = $id");
        if(empty($result)){
            return response()->json(['message'=>'Data Not Found'], 404);
        }
        else{
            return $result;
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'user' => 'required',
            'pass' => 'required'
        ]);

        $pemin = pemin::create(
            $request->only(['user','pass'])
        );

        return response()->json([
            'created' => true,
            'data' => $pemin
        ], 201);
    }

    public function update(Request $request, $id)
    {
        try {
            $pemin = pemin::findOrFail($id);
        } catch (ModelNotFoundException $e){
            return response()->json([
                'message' => 'Data Not Found'
            ], 404);
        }

        $pemin->fill(
            $request->only(['user','pass'])
        );

        $pemin->save();

        return response()->json([
            'updated' => true,
            'data' => $pemin
        ], 200);
    }

    public function destroy($id)
    {
        try {
            $pemin = pemin::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'error' => [
                    'message' => 'Data not found'
                ]
                ],404);
        }

        $pemin->delete();

        return response()->json([
            'deleted' => true
        ],200);
    }
}