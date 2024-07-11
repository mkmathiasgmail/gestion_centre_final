<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <section class=" mt-4">
        <div>
            <h1
                class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
                Registered activity in the last 30 days</h1>
            <p class="mb-6 text-lg font-normal text-gray-500 lg:text-xl  dark:text-gray-400">Here at
                Flowbite we focus on markets where technology, innovation, and capital can unlock long-term value and
                drive
                economic growth.</p>
        </div>


        <div>
            <canvas id="myChart"></canvas>
        </div>

    </section>
    @section('scripts')
        
    @endsection

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    <script>
        const data = {
            labels: @json($data->map(fn($data) => $data->date)),
            datasets: [{
                label: 'Registered activity in the last 30 days',
                backgroundColor: 'rgba(255, 99, 132, 0.3)',
                borderColor: 'rgb(255, 99, 132)',
                data: @json($data->map(fn($data) => $data->aggregate)),
            }]
        };
        const config = {
            type: 'line',
            data: data,
            options: {
                animations: {
                    tension: {
                        duration: 5000,
                        easing: 'linear',
                        from: 1,
                        to: 0,
                        loop: true
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,

                    }
                }
            }
        };
        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>


</x-app-layout>
