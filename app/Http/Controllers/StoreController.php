<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class StoreController extends Controller
{

    public function getstores(){
        return User::where('role_id', 2)->paginate(15);
    }


    public function searchstores(Request $request)
    {
        $query = $request->query('query');

        if ($request->has('query') && $query) {

            return User::query()->where('role_id', 2)->whereLike('name', $query)->paginate(15);
        }
        return response()->json([
            'status' => 'success',
            'message' => 'no store found'
        ]);
    }


    public function getcustomers()
    {
        return User::where('role_id', 3)->paginate(15);
    }


    public function searchcustomers(Request $request)
    {
        $query = $request->query('query');

        if ($request->has('query') && $query) {

            return User::query()->where('role_id', 3)->whereLike('name', $query)->paginate(15);
        }
        return response()->json([
            'status' => 'success',
            'message' => 'no user found'
        ]);
    }


}
