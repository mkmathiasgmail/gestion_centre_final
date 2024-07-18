<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('certificat.css') }}" type="text/css">
</head>

<body>
    <div class=" flex justify-center shadow-lg shadow-gray-500/20 text-center border border-indigo-600 bg-sky-950 w-full h-full">
        <div class=" ">
            <div class=" p-5">
                <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white">
                    CERTIFICATE</h1>
                <p class="mb-4 text-1xl font-extrabold tracking-tight leading-none text-white">OF APPRECIATE</p>
                <img src="{{ asset('img/orange.png') }}" class="h-8 me-3" alt="FlowBite Logo" />
            </div>

            <div class=" bg-white rounded-t-full bg-[url('{{asset('img/background1.png')}}')]">

                <div class=" pl-96 pr-96 pt-4 pb-4">
                    <div>
                        <span>
                            Orange Digital Center
                        </span>
                    </div>

                    <div>
                        <em class="text-4xl">Tshim's Bololo</em>
                    </div>

                    <div class=" mb-10 text-center">

                        <p class="mb-3 text-gray-500 dark:text-gray-400 ">Track work across the enterprise through an
                            open, collaborative platform. <em class="font-italic">Link issues across Jira</em> and
                            ingest data from other software development tools, so your IT support and operations teams
                            have richer contextual information to rapidly respond to requests, incidents, and changes.
                        </p>

                    </div>

                    <div class=" flex justify-between">
                        <div>
                            <span class="text-gray-600 dark:text-gray-400">July 15, 2023</span>
                            <p class="text-xl font-bold text-gray-900 dark:text-gray-100">DATE</p>
                        </div>

                        <div>
                            <span class="text-gray-600 dark:text-gray-400">Expires on</span>
                            <p class="text-xl font-bold text-gray-900 dark:text-gray-100">Signature</p>
                        </div>
                    </div>






                </div>

            </div>
        </div>
    </div>
</body>

</html>
