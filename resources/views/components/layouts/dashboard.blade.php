<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Page Title' }}</title>

    @livewireStyles
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css"
        crossorigin="anonymous" />
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script src="https://cdn.jsdelivr.net/npm/interactjs/dist/interact.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/echarts/dist/echarts.min.js"></script>
</head>

<body  class="flex h-screen  bg-gray-50 dark:bg-gray-900">
        <!-- Sidebar Navigation -->
    @livewire('components.common.navigation-bar')
    {{ $slot }}

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const isDark = document.documentElement.classList.contains('dark');

            const options = {
                chart: {
                    type: 'area',
                    height: 320,
                    toolbar: {
                        show: false
                    },
                    zoom: {
                        enabled: false
                    },
                    foreColor: isDark ? '#9ca3af' : '#6b7280',
                },
                colors: ['#3b82f6', '#10b981'],
                stroke: {
                    curve: 'smooth',
                    width: 4,
                },
                grid: {
                    borderColor: isDark ? '#374151' : '#e5e7eb',
                    strokeDashArray: 4,
                },
                fill: {
                    type: 'gradient',
                    gradient: {
                        shadeIntensity: 1,
                        opacityFrom: 0.4,
                        opacityTo: 0.1,
                        stops: [0, 90, 100]
                    }
                },
                series: [{
                        name: 'Revenue',
                        data: [12000, 15500, 14200, 18800, 22500, 26300, 30500, 33000, 35000, 39000, 42000,
                            48000
                        ]
                    },
                    {
                        name: 'Profit',
                        data: [4000, 5200, 4800, 6500, 8300, 9100, 10200, 11400, 12000, 13300, 14600, 15800]
                    }
                ],
                xaxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov',
                        'Dec'
                    ],
                    axisBorder: {
                        show: false
                    },
                    axisTicks: {
                        show: false
                    },
                },
                yaxis: {
                    labels: {
                        formatter: (value) => `$${value / 1000}k`
                    }
                },
                legend: {
                    position: 'top',
                    horizontalAlign: 'right',
                    labels: {
                        colors: isDark ? '#d1d5db' : '#4b5563'
                    }
                },
                tooltip: {
                    theme: isDark ? 'dark' : 'light',
                    y: {
                        formatter: function(value) {
                            return `$${value.toLocaleString()}`;
                        }
                    }
                }
            };

            const chart = new ApexCharts(document.querySelector("#revenueChart"), options);
            chart.render();
        });
    </script>

</body>

</html>
