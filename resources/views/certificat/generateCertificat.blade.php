<!doctype html>
<html lang="fr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Beau+Rivage&display=swap" rel="stylesheet">
    <title>Certificate</title>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box
        }

        .container {
            display: flex;
            justify-content: center;
            text-align: center;
            box-shadow: rgba(99, 96, 96, 0.075) 1px 5px 1px 4px;
            margin: 20px;
            background-color: rgb(3, 86, 155);
        }

        .certificate {
            width: 100%;
        }

        .certhead {
            text-align: center;
            margin-bottom: 20px;
        }

        .certhead img {
            width: 10%;
        }

        .date-signature {
            display: flex;
            justify-content: space-between;

        }

        .bodycertificat {
            background-color: white;
            border-radius: 100px 100px 0 0;
            padding: 20px;
            align-content: center;
            text-align: center;
        }

        .recipient h2 {
            font-family: "Beau Rivage", cursive;
            font-weight: 400;
            font-style: normal;
            font-size: 6em;
        }

        .description {
            max-width: 800px;
        }

        .description p {
            color: gray;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="certificate">
            <div class="certhead">
                <h1>CERTIFICATE</h1>
                <p>OF APPRECIATION</p>
                <img src="{{ asset('img/orange.png') }}" alt="Logo" />
            </div>

            <div class="bodycertificat">

                <div class="organization">Orange Digital Center</div>
                <div class="recipient">
                    <h2>{{ $candidat->odcuser->first_name }} {{ $candidat->odcuser->last_name }}</h2>
                </div>
                <div class="description">
                    <p>
                        Track work across the enterprise through an open, collaborative platform.
                        <em>Link issues across Jira</em> and ingest data from other software development tools, so your
                        IT
                        support
                        and operations teams have richer contextual information to rapidly respond to requests,
                        incidents,
                        and
                        changes.
                    </p>

                </div>
                <div class="activity">{{ $candidat->activite->title }}</div>
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
    </div>
</body>

</html>
