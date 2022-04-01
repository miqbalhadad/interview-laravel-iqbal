<?php

namespace App\Http\Controllers;

use App\Models\Shopping;
use Illuminate\Http\Request;

class ShoppingController extends Controller
{
    public function createShopping(Request $request) {
        $shopping_m = new Shopping();
        $shopping_m->createddate = $request->shopping['createddate'];
        $shopping_m->name = $request->shopping['name'];

        $shopping_m->save();

        $response['data']['createddate'] = $request->shopping['createddate'];
        $response['data']['id'] = $shopping_m->id;
        $response['data']['name'] = $request->shopping['name'];

        return response()->json($response, 201);
    }

    public function getAllShopping(Request $request)
    {
        $shopping_m = new Shopping();
        $data = $shopping_m->get();
        return response()->json($data, 200);
    }

    public function getDetailShopping($id)
    {
        $shopping_m = new Shopping();
        $data = $shopping_m->find($id);
        return response()->json($data, 200);
    }
    
    
    public function updateShopping($id, Request $request)
    {
        $shopping_m = new Shopping();
        $shopping_m = $shopping_m->find($id);
        $shopping_m->createddate = $request->shopping['createddate'];
        $shopping_m->name = $request->shopping['name'];
        $shopping_m->save();
        
        $response['createddate'] = $request->shopping['createddate'];
        $response['name'] = $request->shopping['name'];
        return response()->json($response, 200);
    }

    public function deleteShopping($id)
    {
        $shopping_m = new Shopping();
        $data = $shopping_m->find($id);
        $data->delete();
        return response()->json($data, 200);
    }
}
