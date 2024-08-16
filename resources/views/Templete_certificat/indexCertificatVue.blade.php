<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Certificate</title>
    <link rel="stylesheet" href="{{ asset('certificat.css') }}" type="text/css">
   
</head>

<body>
    <div class="container">
        <div class="certificate">
            <h1>CERTIFICATE</h1>
            <p>OF APPRECIATION</p>
            <img src="{{ asset('img/orange.png') }}" alt="Logo" />
            <div class="organization">Orange Digital Center</div>
            <div class="recipient">{{ $candidat->name }}</div>
            <div class="description">
                Track work across the enterprise through an open, collaborative platform.
                <em>Link issues across Jira</em> and ingest data from other software development tools, so your IT
                support
                and operations teams have richer contextual information to rapidly respond to requests, incidents, and
                changes.
            </div>
            <div class="date-signature">
                <div class="date">
                    <span>{{ $format }}</span>
                    <div class="label">DATE</div>
                </div>
                <div class="signature">
                    <span>Expires on</span>
                    <div class="label">Signature</div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
