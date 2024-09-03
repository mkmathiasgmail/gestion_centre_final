<!doctype html>
<html lang="fr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        @page {
            size: 11in 8.5in;
            margin: 0;
            
        }
        body {
            font-family: 'Arial', sans-serif;
            box-sizing: border-box;
            border: 20pt solid #ccc;
            margin: 30pt;
            padding: 0;
        }
        .content {
            padding: 2in;
        }

        .certificate {
            text-align: center;
            padding: 20px;
        }

        .logohead img,
        .supcoders img {
            max-height: 110px;
        }

        .title {
            font-size: 32pt;
            font-weight: bold;
            color: black;
            margin-bottom: 20px;
        }

        .organization {
            font-size: 24pt;
            font-weight: bold;
            color: rgb(240, 109, 61);
            margin-bottom: 20px;
        }

        .recipient h2 {
            font-size: 24pt;
            margin: 15px 0;
            font-family: "BeauRivage-Regular";
        }

        .description,
        .bodycertificat p {
            font-size: 12pt;
            margin: 10px 0;
        }

        .signature {
            text-align: right;
            margin-top: 30px;
        }

        .signature b {
            font-size: 14pt;
        }

        .signature span {
            font-size: 12pt;
        }
    </style>
    <title>Certificate</title>
</head>

<body>
    <div class="certificate">
        <div class="logohead">
           <img src="{{asset('./img/logorange.svg')}}" alt="logorange">
        </div>
        <div class="title">Orange Digital Center <span>R.D.Congo</span></div>
        <div class="supcoders">
            <img src="{{ asset('./img/supeurcodeurlogo.svg') }}" alt="supercodeur">
        </div>
        <div class="bodycertificat">
            <div class="organization">Certificat de <span>participation</span></div>
            <p>Ce certificat est décerné à </p>
            <div class="recipient">
                <h2>{{ $candidat->odcuser->first_name }} {{ $candidat->odcuser->last_name }}</h2>
            </div>
            <div class="description">
                <p>
                    Elève
                    de...............................................................................................................................<br>
                    pour sa participation à la session de formation: <span>{{ $candidat->activite->title }}</span> qui
                    s'est tenue du
                    {{ $format }} au sein de Orange Digital Center.
                </p>
            </div>
        </div>
    </div>
    <div class="signature">
        <b>Marc TSHIBASU</b>
        <span>Chef de Département Orange Digital Center</span>
    </div>
</body>

</html>
