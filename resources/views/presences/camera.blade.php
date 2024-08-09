<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>QR Code Scanner</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .container {
            text-align: center;
            padding: 20px;
        }

        #video {
            width: 100%;
            max-width: 500px;
            height: auto;
        }

        #result {
            margin-top: 20px;
        }

        
    </style>
</head>

<body>
    <div class="container">
        <h1>scanner qrcode</h1>
        <video id="video" autoplay></video>
        <div id="result"></div>
    </div>

    <script src="https://unpkg.com/jsqr/dist/jsQR.js"></script>
    <script>
        const video = document.getElementById('video');
        const resultDiv = document.getElementById('result');
        let stream;
        async function startCamera() {
            try {
                stream = await navigator.mediaDevices.getUserMedia({
                    video: {
                        facingMode: 'environment'
                    }
                });
                video.srcObject = stream;
                video.setAttribute('playsinline', true); 
                video.play();
                requestAnimationFrame(scanQRCode);
            } catch (err) {
                console.error('Erreur d\'acces à la camera', err);
                resultDiv.innerHTML = '<p>Erreur d\'acces à la camera. Veuillez verifier la permission à la camera.</p>';
            }
        }
        function scanQRCode() {
            if (video.readyState === video.HAVE_ENOUGH_DATA) {
                const canvas = document.createElement('canvas');
                const context = canvas.getContext('2d');
                canvas.height = video.videoHeight;
                canvas.width = video.videoWidth;
                context.drawImage(video, 0, 0, canvas.width, canvas.height);

                const imageData = context.getImageData(0, 0, canvas.width, canvas.height);
                const code = jsQR(imageData.data, canvas.width, canvas.height, {
                    inversionAttempts: "dontInvert",
                });

                if (code) {
                    resultDiv.innerHTML = `<p>QR Code result: <a href="${code.data}" target="_blank">${code.data}</a></p>`;
                }
            }

            requestAnimationFrame(scanQRCode);
        }       
        startCamera();
    </script>
</body>

</html>