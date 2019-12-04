<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function getInfos()
    {
      return view('infos');
    }

    public function postInfos(Request $request)
    {
      // Affiche les données du champs input nommé "nom", envoyé depuis le formulaire POST
      return 'Le nom est ' . $request->input('nom');
    }
}
