@extends('admin.index')



@section('main')
    @push('styles')
        <style>
            .card-hover {
                transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            }

            .card-hover:hover {
                transform: translateY(-4px);
                box-border: 0 20px 40px rgba(0, 0, 0, 0.1);
            }

            .gradient-bg {
                background: linear-gradient(135deg, #7f1d1d 0%, #991b1b 50%, #b91c1c 100%);
            }

            .stats-icon {
                width: 48px;
                height: 48px;
                border-radius: 12px;
                display: flex;
                align-items: center;
                justify-content: center;
                transition: all 0.3s ease;
            }

            .stats-icon:hover {
                transform: rotate(10deg) scale(1.1);
            }

            .avatar-ring {
                position: relative;
            }

            .avatar-ring::after {
                content: '';
                position: absolute;
                top: -2px;
                left: -2px;
                right: -2px;
                bottom: -2px;
                border-radius: 50%;
                background: linear-gradient(135deg, #7f1d1d, #dc2626);
                z-index: -1;
                animation: pulse-ring 2s infinite;
            }

            @keyframes pulse-ring {
                0% {
                    transform: scale(0.95);
                    opacity: 0.8;
                }

                100% {
                    transform: scale(1.05);
                    opacity: 0;
                }
            }

            .skeleton {
                background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
                background-size: 200% 100%;
                animation: loading 1.5s infinite;
            }

            @keyframes loading {
                0% {
                    background-position: 200% 0;
                }

                100% {
                    background-position: -200% 0;
                }
            }

            .chart-container {
                position: relative;
                overflow: hidden;
            }

            .chart-container::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: linear-gradient(to bottom, transparent 95%, rgba(255, 255, 255, 0.8) 100%);
                pointer-events: none;
                z-index: 1;
            }

            .notification-badge {
                position: absolute;
                top: -5px;
                right: -5px;
                width: 18px;
                height: 18px;
                background: var(--danger);
                border-radius: 50%;
                font-size: 10px;
                display: flex;
                align-items: center;
                justify-content: center;
                animation: pulse 2s infinite;
            }

            @keyframes pulse {
                0% {
                    transform: scale(1);
                }

                50% {
                    transform: scale(1.1);
                }

                100% {
                    transform: scale(1);
                }
            }

            .search-input:focus {
                box-border: 0 0 0 3px rgba(127, 29, 29, 0.1);
            }

            .dropdown-content {
                opacity: 0;
                transform: translateY(-10px);
                transition: all 0.2s ease;
                pointer-events: none;
            }

            .dropdown-content.show {
                opacity: 1;
                transform: translateY(0);
                pointer-events: all;
            }
        </style>
    @endpush




    <div class="w-full">


        <!-- Conteúdo Principal -->
        <main class="flex-1 overflow-y-auto p-6">
            <!-- Welcome Banner -->
            <div class="mb-8">
                <div class="gradient-bg rounded-2xl p-8 text-white border -lg">
                    <div class="flex flex-col md:flex-row md:items-center justify-between">
                        <div>
                            {{-- <h2 class="text-2xl md:text-3xl font-bold mb-2">Bem-vindo, {{ auth()->user()->name }}</h2> --}}
                            <p class="text-red-100 opacity-90">Aqui está uma visão geral da igreja hoje</p>
                        </div>
                        <div class="mt-4 md:mt-0">
                            <a href="{{ route('admin.crentes.novo') }}"
                                class="bg-white text-red-800 font-semibold px-6 py-3 rounded-xl hover:scale-90 hover:opacity-80 active:scale-95 ease-in-out duration-300 transition-all border-lg">
                                <i class="fas fa-plus mr-2"></i> Adicionar Novo Crente
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Cards de Estatísticas -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6 mb-8">
                <!-- Total de Crentes -->
                <div class="card-hover bg-white rounded-2xl border-sm border border-gray-100 p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500 font-medium">Total de Crentes</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">{{ $total_crentes }}</p>

                        </div>
                        <div class="stats-icon bg-red-50">
                            <i class="fas fa-users text-2xl text-red-600"></i>
                        </div>
                    </div>
                    <div class="mt-4 pt-4 border-t border-gray-100">
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-gray-500">Homens: {{ $total_homens }}</span>
                            <span class="text-gray-500">Mulheres: {{ $total_mulheres }}</span>
                        </div>
                    </div>
                </div>

                <!-- Batismos do Mês -->
                <div class="card-hover bg-white rounded-2xl border -sm border border-gray-100 p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500 font-medium">Batizados</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">{{ $total_batizados }}</p>
                            <div class="flex items-center mt-2">

                            </div>
                        </div>
                        <div class="stats-icon bg-blue-50">
                            <i class="fas fa-water text-2xl text-blue-600"></i>
                        </div>
                    </div>
                    <div class="mt-4 pt-4 border-t border-gray-100">
                        <div class="flex items-center text-sm">
                            <i class="fas fa-calendar text-gray-400 mr-2"></i>
                            <span class="text-gray-500"> 25 Nov</span>
                        </div>
                    </div>
                </div>

                <!-- Grupos Ativos -->
                <div class="card-hover bg-white rounded-2xl border-sm border border-gray-100 p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500 font-medium">Grupos Familiares</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">{{ $total_grupos }}</p>
                            <div class="flex items-center mt-2">

                            </div>
                        </div>
                        <div class="stats-icon bg-amber-50">
                            <i class="fas fa-church text-2xl text-amber-600"></i>
                        </div>
                    </div>
                    <div class="mt-4 pt-4 border-t border-gray-100">
                        <div class="flex items-center text-sm">
                            <i class="fas fa-user text-gray-400 mr-2"></i>
                            <span class="text-gray-500">Média: 69 </span>
                        </div>
                    </div>
                </div>

                <!-- Dízimos do Mês -->
                <div class="card-hover col-span-2 bg-white rounded-2xl border -sm border border-gray-100 p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500 font-medium">Total Acumulado</p>
                            <p class="text-2xl font-bold text-gray-900 mt-2">
                                {{ number_format($total_ofertas, 2, '.', ',') }} MT</p>
                            <div class="flex items-center mt-2">

                            </div>
                        </div>
                        <div class="stats-icon bg-emerald-50">
                            <i class="fas fa-hand-holding-usd text-2xl text-emerald-600"></i>
                        </div>
                    </div>
                    <div class="mt-4 pt-4 border-t border-gray-100">
                        <div class="flex items-center justify-between text-sm">
                            {{-- <span class="text-gray-500">Ofertas: {{ number_format($total_oferta, 2, '.', ',') }} MT</span> --}}
                            {{-- <span class="text-gray-500">Dízimos: {{ number_format($total_dizimo, 2, '.', ',') }} MT</span> --}}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Gráficos e Visualizações -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                <!-- Gráfico de Crescimento (ApexCharts) -->
                <div class="card-hover bg-white rounded-2xl border -sm border border-gray-100 p-6">
                    <div class="flex items-center justify-between mb-6">
                        <div>
                            <h3 class="text-lg font-bold text-gray-900">Crescimento da Igreja</h3>
                            <p class="text-sm text-gray-500">Últimos 12 meses</p>
                        </div>
                        <div class="flex items-center space-x-2">
                           
                        </div>
                    </div>
                    <div id="registroMensalChart" class="chart-container" style="height: 300px;"></div>
                </div>

                <!-- Distribuição por Idade (ApexCharts) -->
                <div class="card-hover bg-white rounded-2xl border -sm border border-gray-100 p-6">
                    <div class="flex items-center justify-between mb-6">
                        <div>
                            <h3 class="text-lg font-bold text-gray-900">Distribuição por Idade</h3>
                            <p class="text-sm text-gray-500">Perfil demográfico</p>
                        </div>
                        <div class="flex items-center">
                            <div class="flex items-center mr-4">
                                <div class="w-3 h-3 rounded-full bg-red-500 mr-2"></div>
                                <span class="text-xs text-gray-600">Homens</span>
                            </div>
                            <div class="flex items-center">
                                <div class="w-3 h-3 rounded-full bg-blue-500 mr-2"></div>
                                <span class="text-xs text-gray-600">Mulheres</span>
                            </div>
                        </div>
                    </div>
                    <div id="ageDistributionChart" style="height: 300px;"></div>
                </div>
            </div>


    </div>





    @push('scripts')
        <!-- ApexCharts -->
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {




             
                const registroMensalOptions = {
                    series: [{
                        name: 'Registos de Crentes',
                        data:  @json($registroMensalData)
                    }],
                    chart: {
                        type: 'area',
                        height: 480,
                        toolbar: {
                            show: false
                        }
                    },
                    colors: ['#7f1d1d'],
                    plotOptions: {
                        bar: {
                            columnWidth: '50%',
                            borderRadius: 6
                        }
                    },
                    dataLabels: {
                        enabled: false
                    },
                    xaxis: {
                        categories: @json($registroMensalCategorias),
                        axisBorder: {
                            show: false
                        },
                        axisTicks: {
                            show: false
                        }
                    },
                    yaxis: {
                        title: {
                            text: 'Número de Registos'
                        },
                        labels: {
                            formatter: val => Math.round(val)
                        }
                    },
                    grid: {
                        borderColor: '#f1f1f1',
                        strokeDashArray: 3
                    },
                    tooltip: {
                        theme: 'light',
                        y: {
                            formatter: val => val + ' crentes'
                        }
                    }
                };

                new ApexCharts(
                    document.querySelector("#registroMensalChart"),
                    registroMensalOptions
                ).render();

                // Gráfico de Distribuição por Idade (ApexCharts)
                const homens = @json($homens);
                const mulheres = @json($mulheres);
                const ageDistributionOptions = {
                    series: [{
                            name: 'Homens',
                            data: homens
                        },
                        {
                            name: 'Mulheres',
                            data: mulheres
                        }
                    ],
                    chart: {
                        type: 'bar',
                        height: 480,
                        stacked: true,
                        toolbar: {
                            show: false
                        }
                    },
                    colors: ['#7f1d1d', '#3b82f6'],
                    plotOptions: {
                        bar: {
                            horizontal: false,
                            columnWidth: '55%',
                            borderRadius: 6,
                            borderRadiusApplication: 'end'
                        }
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        show: true,
                        width: 2,
                        colors: ['transparent']
                    },
                    xaxis: {
                        categories: [
                            '0-12', '13-18', '19-25',
                            '26-35', '36-45', '46-55',
                            '56-65', '66-75', '75+'
                        ]
                    },
                    yaxis: {
                        title: {
                            text: 'Número de Pessoas'
                        }
                    },
                    fill: {
                        opacity: 1
                    },
                    tooltip: {
                        theme: 'light',
                        y: {
                            formatter: val => val + ' pessoas'
                        }
                    },
                    legend: {
                        position: 'top',
                        horizontalAlign: 'right'
                    }
                };

                new ApexCharts(
                    document.querySelector("#ageDistributionChart"),
                    ageDistributionOptions
                ).render();

                // Animações de entrada
                const observerOptions = {
                    threshold: 0.1,
                    rootMargin: '0px 0px -50px 0px'
                };

                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.style.opacity = '1';
                            entry.target.style.transform = 'translateY(0)';
                        }
                    });
                }, observerOptions);

                // Observar cards para animação
                document.querySelectorAll('.card-hover').forEach(card => {
                    card.style.opacity = '0';
                    card.style.transform = 'translateY(20px)';
                    card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                    observer.observe(card);
                });
            });
        </script>
    @endpush
@endsection
