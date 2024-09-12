<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>

<body class="font-sans antialiased dark:bg-black dark:text-white/50">
    <nav class="bg-white border-gray-200 dark:bg-gray-900 fixed top-0 left-0 w-full p-5">
        <a href="#" class="flex space-x-2">
            <img src="{{ asset('img/orange.png') }}" class="h-8" alt="LogoOrange Digital Center" />
            <span class="self-center text-1xl font-semibold whitespace-nowrap dark:text-white">Orange Digital
                Center</span>
        </a>
    </nav>
    <div class=" p-5">
        <h1
            class ="mb-2 mt-14 text-3xl font-extrabold tracking-tight leading-none text-gray-900 md:text-3xl lg:text-4xl dark:text-white">
            Liste des activités en cours
        </h1>
    </div>
    <div class=" p-5">
        @if (session('error'))
            <div id="alert-2"
                class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Alert</span>
                <div class="ms-3 text-sm font-medium">
                    {{ session('error') }}
                </div>
            </div>
        @endif
        @if (session('errorCreate'))
            <div id="alert-2"
                class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Alert</span>
                <div class="ms-3 text-sm font-medium">
                    {{ session('errorCreate') }}
                </div>
            </div>
        @endif
        @if ($activites->isEmpty())
            <div class="p-4 mb-4 mt-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                role="alert">
                <span class="font-medium">Oops, désolé !</span> Modifiez quelques choses et essayez de soumettre à
                nouveau.
            </div>
        @else
            <div id="alert-additional-content-1"
                class="p-4 mb-4 mx-auto text-gray-800 border border-gray-300 rounded-lg bg-orange-50 dark:bg-gray-800 dark:text-orange-400 dark:border-gray-700"
                role="alert">
                @foreach ($activites as $i => $item)
                    <div class="flex items-center">
                        <a href="#" data-modal-target="crud-modal{{ $item->id }}"
                            data-modal-toggle="crud-modal{{ $item->id }}"
                            class="py-2.5 px-5 flex items-center me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-400">
                            <svg class="flex-shrink-0 w-4 h-4 me-2" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <h3 class="text-lg font-medium">{{ $item->title }}</h3>
                        </a>
                    </div>
                    {{-- Modal de confirmation de l'adresse mail --}}
                    <div id="crud-modal{{ $item->id }}" tabindex="-1" aria-hidden="true"
                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-lg max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <!-- Modal header -->
                                <div
                                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white modal-title">
                                        Entrez votre email ou votre numéro de téléphone
                                    </h3>

                                    <button type="button"
                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                        data-modal-toggle="crud-modal{{ $item->id }}">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <div class="flex p-4 md:p-5 radiodiv">
                                    <div class="flex items-center  w-full">
                                        <input id="default-radio-1{{ $item->id }}" type="radio"
                                            onchange="show(event, '{{ $item->id }}')" name="default-radio"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="default-radio-1{{ $item->id }}"
                                            class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                            J'ai une adresse mail
                                        </label>
                                    </div>
                                    <div class="flex items-center w-full">
                                        <input id="default-radio-2{{ $item->id }}" type="radio"
                                            onchange="show(event, '{{ $item->id }}')" name="default-radio"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="default-radio-2{{ $item->id }}"
                                            class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300 w-full">
                                            J'ai un numéro de téléphone
                                        </label>
                                    </div>
                                </div>
                                <div class="grid gap-4 mb-4 grid-cols-2">
                                    <div class="col-span-2 p-4 md:p-5">
                                        <div class="filterForms">
                                            <div class="hidden" id="emailDiv{{ $item->id }}">
                                                <form class="validateForm1" method="POST">
                                                    @csrf
                                                    <div class="flex items-center space-x-6 justify-center">
                                                        <label for="email"
                                                            class="block mb-5 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                                        <input type="text" name="email" id="email"
                                                            data-id="{{ $item->id }}"
                                                            class="mb-5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            placeholder="Veuillez saisir votre email" required>
                                                        <input type="text" value="{{ $item->id }}" hidden
                                                            name="id">
                                                    </div>
                                                    <button type="submit"
                                                        class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                        Confirmer
                                                    </button>
                                                </form>
                                            </div>
                                            <div class="hidden" id="phoneDiv{{ $item->id }}">
                                                <form class="validateForm2" method="POST">
                                                    @csrf
                                                    <div class="flex items-center justify-center">
                                                        <label for="phone"
                                                            class="block mb-5 w-64 text-sm font-medium text-gray-900 dark:text-white">Numéro
                                                            de téléphone</label>
                                                        <input type="text" name="phone" id="phone"
                                                            data-id="{{ $item->id }}"
                                                            class="mb-5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            placeholder="Veuillez saisir votre numéro de téléphone"
                                                            required>
                                                        <input type="text" value="{{ $item->id }}" hidden
                                                            name="id">
                                                    </div>
                                                    <button type="submit"
                                                        class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                        Confirmer
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                        <div id="alert-2"
                                            class="notfound hidden items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                                            role="alert">
                                            <span class="sr-only">Alert</span>
                                            <div class="ms-3 text-sm font-medium error">
                                                
                                            </div>
                                        </div>
                                        <div class="hidden" id="confirmDiv">
                                            <form class="space-y-5" action="{{ route('presences.store') }}"
                                                method="post" id="confirmForm">
                                                @csrf
                                                <div class="flex items-center space-x-5">
                                                    <label for="firstname"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Firstname</label>
                                                    <input type="text" name="firstname" id="firstname"
                                                        class="bg-gray-50 border border-gray-300
                                 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 
                                 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600
                                  dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        required="">
                                                </div>
                                                <div class="flex items-center mb-4 space-x-5">
                                                    <label for="lastname"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lastname</label>
                                                    <input type="text" name="lastname" id="lastname"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        required="">
                                                </div>
                                                <div class="flex items-center mb-4 space-x-5">
                                                    <label for="email"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Adresse mail</label>
                                                    <input type="text" name="email" id="email"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        required="">
                                                </div>

                                                <div class="flex items-center mb-4 space-x-5 eventinputdiv">
                                                    <label for="activite"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Activite</label>
                                                    <input type="text" name="idactivite" id="activite"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        required="" readonly>
                                                </div>
                                                <input type="text" value="{{ $item->id }}" hidden
                                                    name="id">


                                                <button type="submit"
                                                    class=" w-full text-white bg-odcolor hover:bg-odcolor/75 focus:ring-4
                             focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2
                              dark:bg-odcolor dark:hover:bg-odcolor/75 focus:outline-none
                               dark:focus:ring-blue-900">Valider</button>



                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>


    {{-- La section des scripts --}}
    <script>
        function confirmerMail(event) {
            event.preventDefault();
            const lien = event.target.getAttribute("href");
            console.log(lien);
            document.getElementByClassName('validateForm').setAttribute('action', lien)
        }
    </script>

    {{-- Script de l'auto complétion de l'email de l'utilisateur
    <script type="text/javascript">
        $(document).ready(function() {
            $('#email').on('input', function() {
                if ($(this).val().length > 0) {
                    $('#results').removeClass('hidden');
                } else {
                    $('#results').addClass('hidden');
                }
            });

            let idActivite = $('#email').data('id');

            $('#email').autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: "/autocompleted/" + idActivite,
                        data: {
                            query: request.term
                        },
                        success: function(data) {
                            response(data.map(item => item.email));
                        }
                    });
                },
                minLength: 1,
                select: function(event, ui) {
                    $('#results').append('<div class="p-2 bg-gray-500 border-b">' + ui.item.value +
                        '</div>');
                    $('#results').addClass('hidden');
                }
            });
        });
    </script> --}}
    <script>
        function show(event, id) {
            if (event.target.getAttribute('id') === 'default-radio-1' + id) {
                $('#emailDiv' + id).show();
                $('#phoneDiv' + id).hide();
            } else {
                $('#emailDiv' + id).hide();
                $('#phoneDiv' + id).show();
            }
        }
    </script>

    <script>
        $('.validateForm1').submit(function(e) {
            e.preventDefault();
            var formData = $(this).serialize();
            var activityId = $(this).find('input[name="id"]').val();
            $.ajax({
                type: 'POST',
                url: '/filtrer/' + activityId,
                data: formData,
                success: function(data) {
                    if (data.error ===
                        "Désole, vous n\'avez pas de compte. Contactez un agent de la sécurité pour vous créer un compte. Merci !"
                    ) {
                        $('.error').text("Désole, vous n'avez pas de compte. Contactez un agent de la sécurité pour vous créer un compte. Merci !")
                        $('.notfound').removeClass('hidden')
                        $('.filterForms').addClass('hidden');
                        $('.modal-title').text("Confirmation des informations")
                        $('.radiodiv').addClass('hidden');
                    } else {
                        $('.filterForms').addClass('hidden');
                        $('.radiodiv').addClass('hidden');
                        $("#confirmDiv").removeClass('hidden');
                        $('.modal-title').text("Confirmation des informations")
                        $('#firstname').attr('value', data.prenom);
                        $('#lastname').attr('value', data.nom);
                        $('#email').attr('value', data.email);
                        $('#activite').attr('value', data.activite);
                    }
                }
            });
        });

        $('.validateForm2').submit(function(e) {
            e.preventDefault();
            var formData = $(this).serialize();

            var activityId = $(this).find('input[name="id"]').val();
            $.ajax({
                type: 'POST',
                url: '/filtrer/' + activityId,
                data: formData,
                success: function(data) {
                    if (data.error ===
                        "Désolé, vous n\'êtes pas enregistré sur cette activité. Merci !"
                    ) {
                        $('.error').text("Désole, vous n'avez pas de compte. Donnez-nous plus d'informations pour vous identifier !")
                        $('.notfound').removeClass('hidden')
                        $("#confirmDiv").removeClass('hidden');
                        $('.filterForms').addClass('hidden');
                        $('.modal-title').text("Confirmation des informations")
                        $('.radiodiv').addClass('hidden');
                        $('.eventinputdiv').addClass('hidden')
                    } else {
                        $('.filterForms').addClass('hidden');
                        $('.radiodiv').addClass('hidden');
                        $("#confirmDiv").removeClass('hidden');
                        $('.modal-title').text("Confirmation des informations")
                        $('#firstname').attr('value', data.prenom);
                        $('#lastname').attr('value', data.nom);
                        $('#email').attr('value', data.email);
                        $('#activite').attr('value', data.activite);
                    }
                }
            });
        });
    </script>
</body>

</html>
