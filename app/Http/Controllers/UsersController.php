<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use Response;
use Illuminate\Support\Facades\DB;

class UsersController extends BaseController
{
    
    public function list()
    {
        return Response::json(User::all());
    }

    public function user($id)
    {
        $user = DB::select(DB::raw('SELECT name, email, password FROM users WHERE id = '. $id));
        return Response::json($user);
    }
}