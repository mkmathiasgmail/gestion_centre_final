<x-app-layout>
    <!-- Display errors if any -->
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-red-400"
                role="alert">
                <span class="font-medium">{{ $error }}</span>
            </div>
        @endforeach
    @endif

    <!-- Header section -->
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <!-- Title of the page -->
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Gestion Activites') }}
                </h2>
            </div>
        </div>
    </x-slot>

    <!-- Tab navigation -->
    <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-styled-tab"
            data-tabs-toggle="#default-styled-tab-content"
            data-tabs-active-classes="text-purple-600 hover:text-purple-600 dark:text-purple-500 dark:hover:text-purple-500 border-purple-600 dark:border-purple-500"
            data-tabs-inactive-classes="dark:border-transparent text-gray-500 hover:text-gray-600 dark:text-gray-400 border-gray-100 hover:border-gray-300 dark:border-gray-700 dark:hover:text-gray-300"
            role="tablist">
            <li class="me-2" role="presentation">
                <button class="inline-block p-4 border-b-2 rounded-t-lg" id="profile-styled-tab"
                    data-tabs-target="#styled-profile" type="button" role="tab" aria-controls="profile"
                    aria-selected="false">Detail</button>
            </li>
            <li class="me-2" role="presentation">
                <button
                    class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                    id="dashboard-styled-tab" data-tabs-target="#styled-dashboard" type="button" role="tab"
                    aria-controls="dashboard" aria-selected="false">Candidats</button>
            </li>
            <li class="me-2" role="presentation">
                <button
                    class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                    id="dashboard-styled-tab" data-tabs-target="#participants-tab" type="button" role="tab"
                    aria-controls="dashboard" aria-selected="false">Participants</button>
            </li>
            <li class="me-2" role="presentation">
                <button
                    class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                    id="presence-styled-tab" data-tabs-target="#content-presence" type="button" role="tab"
                    aria-controls="presence" aria-selected="false">Presence</button>
            </li>
            <li class="me-2" role="presentation">

            <li role="presentation">
                <button
                    class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                    id="import-styled-tab" data-tabs-target="#import" type="button" role="tab"
                    aria-controls="Importation" aria-selected="false">Import</button>
            </li>
        </ul>
    </div>

    <!-- Tab content -->
    <div id="default-styled-tab-content">
        <!-- Show activity details -->
        <x-activitesShow :datachart="$datachart" :show="$activite" />

        <!-- Show candidates for the activity -->
        <x-show-candidates-event :activite="$activite" :labels="$labels" :candidatsData="$candidatsData" :odcusers="$odcusers"
            :activite_Id="$activite_Id" :id="$id" />

        <!-- Participants tab content -->
        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="participants-tab" role="tabpanel"
            aria-labelledby="participants-tab">
            <x-show-participants-event :participantsData="$participantsData" :activite="$activite" :labels="$labels" :candidatsData="$candidatsData"
                :odcusers="$odcusers" :activite_Id="$activite_Id" :id="$id" />
        </div>



        <!-- Presence tab content -->
        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="content-presence" role="tabpanel"
            aria-labelledby="settings-tab">
            <x-activite-presence-component :fullDates="$fullDates" :dates="$dates" :data="$data" :presences="$presences"
                :countdate="$countdate" :activite="$activite" :candidats="$candidats" />
        </div>

        <!-- import tab content -->
        <div class="hidden p-4 ro unded-lg bg-gray-50 dark:bg-gray-800" id="import" role="tabpanel"
            aria-labelledby="contacts-tab">
            <p class="text-sm text-gray-500 dark:text-gray-400"><x-activite-import :activite="$activite" /></p>
        </div>
    </div>

    <x-statusactive :name="__('Would you like show in calendar this activity? ')" />

    <x-statusdesactive :name="__('Would you like disable in calendar this activity? ')" />

    @php
        $url = env('API_URL');
    @endphp

    @section('script')
        {{-- Script for presence data table --}}
        <script>
            $(document).ready(function() {
                $('#candidatpresence').DataTable({
                    "scrollX": true,
                    "fixedColumns": {
                        "start": 3
                    }
                });

                $('#candidatpresence').css('width', '100%');
            });
        </script>

        {{-- Script for participants data table --}}
        <script>
            $(document).ready(function() {
                let event = @json($activite->title);
                $('#participantTable').DataTable({
                    responsive: true,

                    columnDefs: [{
                            visible: false,
                            targets: [0, 3, 5, 7, 8, 9]
                        }, // hide columns 1 and 3 by default
                        {
                            responsivePriority: 1,
                            targets: 0
                        },
                        {
                            responsivePriority: 2,
                            targets: -1
                        }
                    ],
                    layout: {
                        topStart: {
                            pageLength: {
                                menu: [10, 25, 50, 100, 200]
                            },
                            buttons: [
                                'colvis',
                                {
                                    extend: 'excelHtml5',
                                    action: function(e, dt, node, config) {
                                        e.preventDefault();
                                        let id_event = @json($activite->id);
                                        // Redirection vers la méthode du contrôleur
                                        window.location.href = '{{ url('generate_excel') }}/' +
                                            id_event;
                                    }
                                }
                            ]
                        },
                        topEnd: {
                            search: {
                                placeholder: 'Type search here'
                            }
                        }
                    }
                });

                $('#participantTable').css('width', '100%');
            });
        </script>

        {{-- Script for candidates data table --}}
        <script>
            var tr = null;
            var statusCell = null;

            function readMore(event, value) {
                event.preventDefault();
                var td = $(event.target).closest('td');
                $(td).text(value);

            }

            $(document).ready(function() {

                $('#candidatTable').on('click', '.btn-menu', function() {
                    const rel = $(this).attr('rel')
                    $('.div-dropdown').fadeOut('fast')

                    const lien = $(this).attr('data-target')

                    $('.btn-menu').each(function() {
                        if (lien != $(this).attr('data-target')) {
                            $(this).attr('rel', 0)
                        }
                    })

                    if (rel == 1) {
                        $(this).attr('rel', 0)
                        $('#' + lien).fadeOut('fast')
                    } else {
                        $(this).attr('rel', 1)
                        $('#' + lien).fadeIn('fast')
                    }
                    // const lien = $(this).attr('data-target')
                    // $('#' + lien).fadeToggle('fast')
                });

                $('body').on('click', function(event) {
                    if (!event.target.closest('.tdAction')) {
                        $('.div-dropdown').fadeOut('fast')
                        $('.btn-menu').each(function() {
                            $(this).attr('rel', 0)
                        })
                    } else {
                        console.log('td act', $(this).hasClass('tdAction'))
                    }


                });

                let event = @json($activite->title);


                $('#candidatTable').DataTable({
                    responsive: true,

                    columnDefs: [{
                            visible: false,
                            targets: [0, 3, 4, 5, 7, 8, 9, 10]
                        }, // hide columns 1 and 3 by default
                        {
                            responsivePriority: 1,
                            targets: 0
                        },
                        {
                            responsivePriority: 2,
                            targets: -1
                        }
                    ],
                    layout: {
                        topStart: {
                            pageLength: {
                                menu: [10, 25, 50, 100, 200]
                            },
                            buttons: [
                                'colvis',
                            ]
                        },
                        topEnd: {
                            search: {
                                placeholder: 'Type search here'
                            }
                        }
                    }
                });

                $('#candidatTable').css('width', '100%');

                $('.dt-container').addClass('text-lg text-gray-800 dark:text-gray-400 leading-tight')

                $('.dt-buttons').addClass('mt-4')
                $('.dt-buttons buttons').addClass('cursor-pointer mt-5 bg-slate-600 p-2 rounded-sm font-bold')

                $("#dt-length-2").addClass('text-gray-700 dark:text-gray-200 w-24 bg-white');
                $("label[for='dt-length-2']").addClass('text-gray-700 dark:text-gray-200').text(
                    ' Enregistrements par page');

            })

            function changeStatus(event) {
                event.preventDefault();
                let status = $(event.target).data('text');

                let id = $('#decline-link').attr('data')
                console.log(id)
                $.ajax({
                    type: 'POST',
                    url: '/candidat/' + status,
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        // Update the UI or display a success message
                        // Update the table cell with the new status
                        statusCell[0].textContent = status
                        console.log('Status updated successfully!');
                    },
                    error: function(xhr, status, error) {
                        console.log('Error updating status: ' + error);
                    }
                });
            }

            function actionStatus(event, type, id, firstname, lastname) {
                tr = $(event.target.closest('tr'));
                statusCell = tr.find('#statusCell');

                switch (type) {
                    case 'accept':
                        $('#accept-link').attr('data', id)
                        $('#popup-title-accept').text(
                            "Confirmez-vous la validation de la candidature de " + firstname + " ?")
                        document.getElementById('first-modal').click()
                        break;
                    case 'decline':
                        $('#decline-link').attr('data', id)
                        $('#popup-title-decline').text(
                            "Confirmez-vous l'annulation de la candidature de " + firstname + " ?");
                        document.getElementById('second-modal').click()
                        break;
                    case 'wait':
                        $('#wait-link').attr('data', id)
                        $('#popup-title-wait').text(
                            "Confirmez-vous la mise en attente de " + firstname + " ?")
                        document.getElementById('third-modal').click()
                    default:
                        break;
                }


            }
        </script>

        {{-- Script for storing candidates --}}
        <script>
            let url = "{!! $url !!}"
            let id = @json($id);
            let idEvent = "{!! $activite_Id !!}"
            let idUsers = @json($odcusers);
            let user = {};
            // Initialize the user object with pairs of `_id` and `id`
            idUsers.forEach(element => {
                user[element._id] = element.id;
            });

            function Reload() {
                fetch(`${url}/events/show/${idEvent}`)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        let events = data.data;
                        events.forEach(event => {
                            let userId = event.user._id;
                            if (user.hasOwnProperty(userId)) {
                                // Add an object to the candidates array with `odcuser_id` containing `id`
                                let candidat = {
                                    'odcuser_id': user[userId],
                                    'activite_id': id, // or use event.activite_id if available
                                    'status': 1
                                };
                                console.log(candidat)
                                storeCandidats(candidat);
                            }
                        });
                    })
                    .catch(error => {
                        console.error('There was a problem with the fetch operation:', error);
                    });
            }

            function storeCandidats(candidat) {
                fetch('/api/candidat', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify(candidat)
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        console.log('Candidats stored successfully:', data);
                    })
                    .catch(error => {
                        console.error('There was a problem with the fetch operation:', error);
                    });
            }

            function redirectToPresence() {
                window.location.href = '{{ route('presences.index') }}';
            }
        </script>
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>


        <script>
            function activer(event) {
                event.preventDefault();
                let link = event.target.getAttribute('href');
                document.querySelector('#desactiveStatus form').setAttribute('action', link);
            }

            function desactiver(event) {
                event.preventDefault();
                let link = event.target.getAttribute('href');
                document.querySelector('#activeStatus form').setAttribute('action', link);
            }
        </script>
        <script>
            const getChartOptions = () => {
                return {
                    series: [
                        @json([$datachart->sum('total_candidats')]),
                        @json([$datachart->sum('total_filles')]), // Total des filles
                        @json([$datachart->sum('total_garcons')]),
                        // Total des garçons
                    ],
                    colors: ["#1C64F2", "#16BDCA", "#FDBA8C"],
                    chart: {
                        height: "380px",
                        width: "100%",
                        type: "radialBar",
                        sparkline: {
                            enabled: true,
                        },
                    },
                    stroke: {
                        colors: ["transparent"],
                        lineCap: "round", // Use 'round' for the end caps of the radial bar
                    },
                    plotOptions: {
                        radialBar: {
                            track: {
                                background: '#E5E7EB',
                            },
                            dataLabels: {
                                show: false,
                            },
                            hollow: {
                                margin: 0,
                                size: "32%",
                            },
                            donut: {
                                labels: {
                                    show: true,
                                    name: {
                                        show: true,
                                        fontFamily: "Inter, sans-serif",
                                        offsetY: 20,
                                    },

                                    value: {
                                        show: true,
                                        fontFamily: "Inter, sans-serif",
                                        offsetY: -20,
                                        formatter: function(value) {
                                            return value; // Afficher la valeur brute
                                        },
                                    },
                                },
                                size: "70%",
                            },
                        },
                    },
                    grid: {
                        show: false,
                        strokeDashArray: 4,
                        padding: {
                            left: 2,
                            right: 2,
                            top: -23,
                            bottom: -20,
                        },
                    },
                    labels: ["Total", "Filles", "Garçons"], // Étiquettes pour les séries
                    dataLabels: {
                        enabled: false,
                    },
                    legend: {

                        show: true,
                        position: "bottom",
                        fontFamily: "Inter, sans-serif",
                    },
                    tooltip: {
                        enabled: true,
                        x: {
                            show: false,
                        },
                    },
                    yaxis: {
                        show: false,

                    }
                }
            }

            document.addEventListener('DOMContentLoaded', function() {
                const options = getChartOptions();
                const chart = new ApexCharts(document.querySelector("#chart"), options);
                chart.render();
            });
        </script>

        </script>
    @endsection
</x-app-layout>
