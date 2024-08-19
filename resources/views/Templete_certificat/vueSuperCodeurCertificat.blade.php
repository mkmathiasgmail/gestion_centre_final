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
            box-sizing: border-box;
            border: 20px solid #ccc;
            align-items: center;
            margin: 20px;
            width: 297mm;
            height: 210mm;

        }

        .header {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-grow: 1;
            text-align: center;
            /* margin-top: -25px; */

            /* Orange */
            color: black;
            padding: 0px;
            font-size: 32px;
            font-weight: bold;
            /* margin-bottom: 5px; */
        }

        .logohead {
            margin-right: 20px;
        }

        .logohead img {
            max-height: 110px;
            margin-bottom: 0px;

        }

        .certificate {
            display: flex;
            align-items: center;
            padding: 10px;
            justify-content: space-between;
        }

        .title {
            font-size: 45px;
            font-weight: bold;
            margin-bottom: 0px;
            margin-right: 150px;
            text-align: center;
            align-items: center;

        }

        .container {
            display: flex;
            justify-content: space-between;
            text-align: center;
            margin: 20px;
        }



        .certificate>div {
            /* flex-basis: 50%; */
            /* margin-left: 10px;
            margin-right: 10px;
            justify-content: space-around; */
        }

        .certhead {
            text-align: center;
            margin-bottom: 20px;
        }


        .date-signature {
            display: flex;
            justify-content: space-between;
        }

        .bodycertificat {
            background-color: white;
            padding: 10px;
            align-content: center;
            text-align: center;
            line-height: 1.2;
            margin-bottom: 5px;
        }

        .bodycertificat p {
            font-size: 14px;
            margin-bottom: 5px;
        }

        .organization {
            font-size: 42px;
            font-weight: bold;
            color: #ff8cc00;
            margin-bottom: 20px;
            line-height: 1.2;
            margin-bottom: 5px;
        }

        .recipient h2 {
            font-family: "BeauRivage-Regular";
            font-weight: 400;
            font-style: normal;
            font-size: 2em;
            margin-bottom: 15px;
            margin-top: 10px;
        }

        .description {
            display: flex;
            justify-content: center;
            margin: 0px auto;
            line-height: 1.2;
            margin-bottom: 5px;
            margin-top: 5px;
            max-width: 2000px;
        }

        .description p {
            color: black;
            text-align: center;
            max-width: 80%;
            font-size: 16px;
            line-height: 1.2;
            margin: 2px;
            display: block;
            margin: 0 auto;
            /* Limite la largeur maximale du paragraphe */
        }

        .description span {
            font-weight: bold;
        }

        .activity {
            font-size: 15px;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }

        .header span {
            color: rgb(240, 109, 61);
        }

        .organization span {
            color: rgb(240, 109, 61);
        }


        .signature {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: right;
            margin-inline-start: 470px;
        }

        .signature b {
            font-size: 18px;
            margin-bottom: 5px;
        }

        .signature span {
            font-size: 14px;
        }

        .supcoders {
            text-align: center;
        }

        .supcoders img {
            width: 90px;
            display: inline-block;
        }

        @media print {
            body {
                font-family: 'Arial', sans-serif;
                box-sizing: border-box;
                border: 20px solid #ccc;
                align-items: center;
                margin: 20px;
                width: 297mm;
                height: 210mm;
            }

            .header {
                display: flex;
                align-items: center;
                justify-content: center;
                flex-grow: 1;
                text-align: center;
                color: black;
                padding: 0px;
                font-size: 32px;
                font-weight: bold;
            }

            .logohead {
                margin-right: 20px;
            }

            .logohead img {
                max-height: 110px;
                margin-bottom: 0px;
            }

            .certificate {
                display: flex;
                align-items: center;
                padding: 10px;
                justify-content: space-between;
            }

            .title {
                font-size: 45px;
                font-weight: bold;
                margin-bottom: 0px;
                margin-right: 150px;
                text-align: center;
                align-items: center;
            }

            .container {
                display: flex;
                justify-content: space-between;
                text-align: center;
                margin: 20px;
            }

            .certhead {
                text-align: center;
                margin-bottom: 20px;
            }

            .date-signature {
                display: flex;
                justify-content: space-between;
            }

            .bodycertificat {
                background-color: white;
                padding: 10px;
                align-content: center;
                text-align: center;
                line-height: 1.2;
                margin-bottom: 5px;
            }

            .bodycertificat p {
                font-size: 14px;
                margin-bottom: 5px;
            }

            .organization {
                font-size: 42px;
                font-weight: bold;
                color: #ff8cc00;
                margin-bottom: 20px;
                line-height: 1.2;
                margin-bottom: 5px;
            }

            .recipient h2 {
                font-family: "BeauRivage-Regular";
                font-weight: 400;
                font-style: normal;
                font-size: 2em;
                margin-bottom: 2px;
                margin: 2px;
            }

            .description {
                display: flex;
                justify-content: center;
                margin: 0px auto;
                line-height: 1.2;
                margin-bottom: 5px;
                margin-top: 5px;
                max-width: 2000px;
            }

            .description p {
                color: black;
                text-align: center;
                max-width: 80%;
                font-size: 16px;
                line-height: 1.2;
                margin: 2px;
                display: block;
                margin: 0 auto;
            }

            .description span {
                font-weight: bold;
            }

            .activity {
                font-size: 15px;
                font-weight: bold;
                margin-bottom: 20px;
                text-align: center;
            }

            .header span {
                color: rgb(240, 109, 61);
            }

            .organization span {
                color: rgb(240, 109, 61);
            }

            .signature {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: right;
                margin-inline-start: 470px;
            }

            .signature b {
                font-size: 18px;
                margin-bottom: 5px;
            }

            .signature span {
                font-size: 14px;
            }

            .supcoders {
                text-align: center;
            }

            .supcoders img {
                width: 90px;
                display: inline-block;
            }
        }
    </style>
</head>

<body>
    <div class="certificate">
        <div class="logohead">
            <img src="https://th.bing.com/th/id/OIP.YPJJUqjDwFpw72wl7bgcTwHaFj?rs=1&pid=ImgDetMain" alt="Logo" />
        </div>
        <div class="header">
            <div class="title">Orange Digital Center <span>R.D.Congo</span></div>
        </div>
    </div>
    <div class="supcoders">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQp8aT6Sp3lzRSAihKTUIcxlLdmE9K4zYNFeQ&s"
            alt="supercodeur" />
    </div>
    <div class="container">

        <div class="bodycertificat">
            <div class="organization">Certificat de <span>participation</span> </div>
            <p>Ce certificat est décerné à </p>
            <div class="recipient">
                <h2>{{ $candidat->odcuser->first_name }} {{ $candidat->odcuser->last_name }}</h2>
            </div>
            <div class="description">
                <p>
                    Elève...............................................................................................................................
                    <br>
                    pour sa participation à la session de formation:

                    <span>{{ $candidat->activite->title }} </span> qui s'est tenue du
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
