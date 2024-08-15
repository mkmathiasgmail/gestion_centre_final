<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="flex items-center justify-center min-h-screen bg-cover bg-center bg-no-repeat  backdrop-blur-md"
        style="background-image: url('https://www.orangedigitalcenters.com:12345/api/v1/odcGlobal/ComingSoon%E2%80%9311652362999309.jpg')">
        <div class="max-w-md mx-auto text-center bg-white bg-opacity-90 p-8 rounded-lg shadow-lg">
            <div class="text-9xl font-bold text-orange-500 mb-4">500</div>
            <h1 class="text-4xl font-bold text-gray-800 mb-6">Erreur interne du serveur</h1>
            <p class="text-lg text-gray-600 mb-8">Nous nous excusons pour la gêne occasionnée. Veuillez réessayer plus
                tard.</p>
            <a href="{{ route('dashboard') }}"
                class="inline-block bg-orange-500 text-white font-semibold px-6 py-3 rounded-md hover:bg-orange-500 transition-colors duration-300">
                Veuillez réessayer
            </a>
        </div>
    </div>
</body>

</html>
