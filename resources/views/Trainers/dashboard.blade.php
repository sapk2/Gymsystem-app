@extends('layouts.trainer-app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
               <p>Welcome</p>
               <hr>
            </div>
        </div>
    </div>
</div>
<div class="py-12">

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            
            <!-- Users Chart -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-4 md:p-6">
                <div class="flex justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-700">Users</h3>
                    <span class="text-sm text-gray-500">Last Week</span>
                </div>
                <div id="area-chart" class="min-h-[350px] lg:min-h-[400px]"></div>
            </div>

            <!-- Leads Chart -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-4 md:p-6">
                <div class="flex justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-700">Leads</h3>
                    <span class="text-sm text-gray-500">This Week</span>
                </div>
                <div id="column-chart" class="min-h-[350px] lg:min-h-[400px]"></div>
            </div>

            <!-- Progress Chart -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-4 md:p-6">
                <div class="flex justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-700">Progress</h3>
                    <span class="text-sm text-gray-500">Completion</span>
                </div>
                <div id="radial-chart" class="min-h-[350px] lg:min-h-[400px]"></div>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    // Area Chart (Users)
    function initAreaChart() {
        const areaChartOptions = {
            chart: {
                type: 'area',
                height: '100%',
                width: '100%',
                toolbar: { show: false },
                zoom: { enabled: false }
            },
            series: [{
                name: 'Users',
                data: [30, 40, 35, 50, 49, 60, 70]
            }],
            colors: ['#3b82f6'],
            dataLabels: { enabled: false },
            stroke: { curve: 'smooth' },
            xaxis: {
                categories: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun']
            },
            tooltip: { theme: document.documentElement.classList.contains('dark') ? 'dark' : 'light' }
        };

        const areaChart = new ApexCharts(
            document.querySelector("#area-chart"),
            areaChartOptions
        );
        areaChart.render();
    }

    // Column Chart (Leads)
    function initColumnChart() {
        const columnChartOptions = {
            chart: {
                type: 'bar',
                height: '100%',
                width: '100%',
                toolbar: { show: false }
            },
            series: [{
                name: 'Leads',
                data: [30, 40, 35, 50, 49, 60, 70]
            }],
            colors: ['#10b981'],
            plotOptions: { bar: { borderRadius: 4 } },
            dataLabels: { enabled: false },
            xaxis: {
                categories: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun']
            },
            tooltip: { theme: document.documentElement.classList.contains('dark') ? 'dark' : 'light' }
        };

        const columnChart = new ApexCharts(
            document.querySelector("#column-chart"),
            columnChartOptions
        );
        columnChart.render();
    }

    // Radial Chart (Progress)
    function initRadialChart() {
        const radialChartOptions = {
            chart: {
                type: 'radialBar',
                height: '100%',
                width: '100%'
            },
            series: [75], // 75% Completion for example
            colors: ['#3b82f6'],
            plotOptions: {
                radialBar: {
                    hollow: { size: '60%' },
                    dataLabels: {
                        name: { show: false },
                        value: {
                            offsetY: 5,
                            fontSize: '18px',
                            color: document.documentElement.classList.contains('dark') ? '#fff' : '#111'
                        }
                    }
                }
            },
            stroke: { lineCap: 'round' }
        };

        const radialChart = new ApexCharts(
            document.querySelector("#radial-chart"),
            radialChartOptions
        );
        radialChart.render();
    }

    // Initialize charts on load
    window.addEventListener('load', () => {
        initAreaChart();
        initColumnChart();
        initRadialChart();
    });

    // Reinitialize charts on window resize
    window.addEventListener('resize', function() {
        setTimeout(() => {
            initAreaChart();
            initColumnChart();
            initRadialChart();
        }, 300);
    });
</script>

@endsection
