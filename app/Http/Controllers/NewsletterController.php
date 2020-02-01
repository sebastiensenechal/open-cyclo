<?php

namespace App\Http\Controllers;

use App\Email;
use App\Http\Requests\NewsletterRequest;

class NewsletterController extends Controller
{
    public function getForm()
    {
      return view('newsletter');
    }

    // Injection du modèle Email dans la méthode postForm du controller (meilleur que de créer une instance)
    public function postForm(NewsletterRequest $request, Email $email)
    {
      $email->email = $request->input('email');
      $email->save();

      return view('newsletterConfirm');
    }
}
