<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
  </head>
  <body>
    <p><strong>Formulaire de contact OpenCyclo</strong></p>
    <ul>
      <li><strong>Nom</strong> : {{ $contact['name'] }}</li> 
      <li><strong>Email</strong> : <a href="mailto:{{ $email }}">{{ $email }}</a></li>
      <li><strong>Message</strong> :<br />{{ $contact['mess'] }}</li>
    </ul>
  </body>
</html>