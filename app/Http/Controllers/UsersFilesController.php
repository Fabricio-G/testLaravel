<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UsersFiles;
use Illuminate\Support\Facades\Storage;
use Response;
use Illuminate\Http\Request;

class UsersFilesController extends Controller
{
    public function getFile(Request $request, $userId){
        if (User::find($userId) == null){
            return Response::json(['message' => 'El usuario no existe.'], 404);
        }
        if ($request->hasFile('file')){
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            Storage::disk('files')->put($filename, file_get_contents($file));
            $user_file = new UsersFiles;
            $user_file->user_id = $userId;
            $user_file->file_name = $filename;
            $user_file->save();
            return Response::json(['message' => 'Archivo cargado correctamente'], 200);
        }
        else {
            return Response::json(['message' => 'No se ha encontrado ningun archivo.'], 400);
        }
    }
}
