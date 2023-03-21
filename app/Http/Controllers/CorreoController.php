<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Mail\ActualizacionContrasena;

class CorreoController extends Controller
{
    public function enviarCorreo(Request $request) {
        $user = User::where('email', $request->input('email'))->first();
        $newPassword = Str::random(10);
        $user->password = Hash::make($newPassword);
        $user->save();
        // Dentro del método enviarCorreo
        Mail::to($user->email)->send(new ActualizacionContrasena($user, $newPassword));
    }
}
