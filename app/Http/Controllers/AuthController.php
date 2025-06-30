<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // Exemple de méthode register()
    public function register(Request $request)
    {
        return response()->json(['message' => 'Inscription OK']);
    }

    // Ajout d'une méthode login() minimale pour éviter l'erreur
    public function login(Request $request)
    {
        return response()->json(['message' => 'Connexion OK']);
    }
}
