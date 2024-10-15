<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $subject }}</title>
</head>

<body>
    <p>Bonjour {{ $prenom }} {{ $nom }},</p>

    <p>{!! $body !!}</p>

    <h2>Détails de l'activité :</h2>
    <ul>
        <li>Date : {{ $date }}</li>
        <li>Lieu : {{ $lieu }}</li>
    </ul>

    <p>Pour faciliter l'organisation et vérifier votre présence à l'événement, veuillez présenter ce code QR lors de
        votre arrivée :</p>
    <img src="{{ $codeqr }}" alt="Code QR" style="width: 200px; height: auto;" />

    <p>Veuillez garder ce message et le code QR, car il sera utilisé pour pointer votre présence à l'activité.</p>

    <p>Merci encore de votre participation !</p>
</body>

</html>
