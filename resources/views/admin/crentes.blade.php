@extends('admin.index')

@section('main')
    @push('styles')
        <style>
            .stats-card {
                transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
                background: white;
                border-radius: 16px;
                border: 1px solid #f1f1f1;
            }

            .stats-card:hover {
                transform: translateY(-4px);
                box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
            }

            .member-card {
                transition: all 0.2s ease;
                border-radius: 12px;
                overflow: hidden;
            }

            .member-card:hover {
                transform: translateY(-2px);
                box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            }

            .avatar-gradient {
                background: linear-gradient(135deg, #7f1d1d 0%, #dc2626 100%);
            }

            .status-badge {
                display: inline-flex;
                align-items: center;
                padding: 4px 12px;
                border-radius: 20px;
                font-size: 12px;
                font-weight: 500;
            }

            .filter-chip {
                display: inline-flex;
                align-items: center;
                padding: 6px 16px;
                border-radius: 20px;
                background: #f8fafc;
                border: 1px solid #e2e8f0;
                font-size: 13px;
                transition: all 0.2s ease;
            }

            .filter-chip:hover {
                background: #f1f5f9;
                border-color: #cbd5e1;
            }

            .filter-chip.active {
                background: #7f1d1d;
                color: white;
                border-color: #7f1d1d;
            }

            .table-row-hover {
                transition: background-color 0.2s ease;
            }

            .table-row-hover:hover {
                background-color: #f8fafc;
            }

            .search-box {
                background: white;
                border: 1px solid #e2e8f0;
                border-radius: 12px;
                transition: all 0.2s ease;
            }

            .search-box:focus-within {
                border-color: #7f1d1d;
                box-shadow: 0 0 0 3px rgba(127, 29, 29, 0.1);
            }

            .pagination-item {
                display: flex;
                align-items: center;
                justify-content: center;
                width: 36px;
                height: 36px;
                border-radius: 8px;
                font-size: 14px;
                transition: all 0.2s ease;
            }

            .pagination-item:hover {
                background: #f1f5f9;
            }

            .pagination-item.active {
                background: #7f1d1d;
                color: white;
            }

            .modal-overlay {
                position: fixed;
                inset: 0;
                background: rgba(0, 0, 0, 0.5);
                display: none;
                align-items: center;
                justify-content: center;
                z-index: 1000;
                opacity: 0;
                transition: opacity 0.3s ease;
            }

            .modal-overlay.show {
                display: flex;
                opacity: 1;
            }

            .modal-content {
                background: white;
                border-radius: 16px;
                max-width: 500px;
                width: 90%;
                max-height: 90vh;
                overflow-y: auto;
                transform: translateY(20px);
                transition: transform 0.3s ease;
            }

            .modal-overlay.show .modal-content {
                transform: translateY(0);
            }

            .tab-button {
                padding: 12px 24px;
                border-bottom: 2px solid transparent;
                font-weight: 500;
                color: #64748b;
                transition: all 0.2s ease;
            }

            .tab-button:hover {
                color: #334155;
            }

            .tab-button.active {
                color: #7f1d1d;
                border-bottom-color: #7f1d1d;
            }
        </style>
    @endpush



    <!-- Conteúdo Principal -->
    <div class="flex-1 flex flex-col ">
        <!-- Header -->
        <header class="sticky top-0 z-30 bg-white/80 backdrop-blur-sm border-b border-gray-100 shadow-sm">
            <div class="flex items-center justify-between px-6 py-4">
                <div class="flex items-center space-x-4">
                    <button id="menuToggle"
                        class="lg:hidden text-gray-600 hover:text-red-700 p-2 rounded-lg hover:bg-gray-100">
                        <i class="fas fa-bars text-lg"></i>
                    </button>
                    <div>
                        <h1 class="text-xl font-bold text-gray-900">Crentes/Almas</h1>
                        <div class="flex items-center text-sm text-gray-500">
                            <a href="/dashboard" class="hover:text-red-700">Dashboard</a>
                            <i class="fas fa-chevron-right mx-2 text-xs"></i>
                            <span class="text-gray-900 font-medium">Gestão de Crentes</span>
                        </div>
                    </div>
                </div>

                <div class="flex items-center space-x-4">
                    <a href="{{ route('admin.crentes.novo') }}"
                        class="bg-red-600 hover:bg-red-700 text-white font-medium px-5 py-2.5 rounded-xl flex items-center shadow-lg hover:shadow-xl transition-all">
                        <i class="fas fa-plus mr-2"></i>
                        <span class="hidden md:inline">Novo Crente</span>
                    </a>
                </div>
            </div>
        </header>

        <!-- Conteúdo Principal -->
        <main class="flex-1 overflow-y-auto p-6">
         
            <!-- Filtros e Busca -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 mb-8">
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                    <!-- Barra de Busca -->
                    <div class="flex justify-end w-full">
                        <form action="{{ route('admin.crentes.buscar') }}" method="GET" class="search-box flex items-center px-4 py-2.5 w-1/3">
                            <input type="text" placeholder="Buscar crentes por nome ou endereço..."
                                class="flex-1 outline-none text-sm" id="searchInput" name="q" value="{{ request('q') }}">
                            <button type="submit" class="text-gray-400 hover:text-gray-600 ml-3">
                                <i class="fas fa-search"></i>
                            </button>
                        </form>
                    </div>

                  
                </div>

                <!-- Chips de Filtro -->
                <div class="flex flex-wrap gap-2 mt-6">
                    <button class="filter-chip active">
                        <i class="fas fa-users mr-2"></i>
                        Todos
                    </button>
                    <button class="filter-chip">
                        <i class="fas fa-water mr-2"></i>
                        Em Comunhão
                    </button>
                   
                    <button class="filter-chip">
                        <i class="fas fa-child mr-2"></i>
                        Jovens
                    </button>
                    <button class="filter-chip">
                        <i class="fas fa-home mr-2"></i>
                        Casados
                    </button>
                </div>
            </div>

            <!-- Tabela de Crentes -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                
                <!-- Tabela -->
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th
                                    class="text-left py-4 px-6 text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                    Crente</th>
                                <th
                                    class="text-left py-4 px-6 text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                    Estado</th>
                                <th
                                    class="text-left py-4 px-6 text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                    Localização</th>
                                <th
                                    class="text-left py-4 px-6 text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                    Estado</th>

                                <th
                                    class="text-left py-4 px-6 text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                    Ações</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse ($crentes as $i => $item)
                                <tr class="table-row-hover">
                                   
                                    <td class="py-4 px-6">
                                        <div class="flex items-center">
                                            <div
                                                class="w-10 h-10 rounded-full bg-gradient-to-br from-red-100 to-red-200 flex items-center justify-center text-red-800 font-semibold mr-3">
                                                {{ substr($item->nome, 0, 1) }}
                                            </div>
                                            <div>
                                                <p class="font-medium text-gray-900">
                                                    {{ $item->nome }}
                                                </p>
                                                <p class="text-xs text-gray-500">
                                                    {{ $item->genero }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <div class="space-y-1">
                                            <p class="text-sm font-medium text-gray-900">
                                                @if ($item->batizado)
                                                    @if ($item->dizimista)
                                                        Em Comunhão
                                                    @else
                                                        Em Disciplina
                                                    @endif
                                                @else
                                                    Simpatizante
                                                @endif
                                            </p>
                                            @php

                                                $idade = \Carbon\Carbon::parse($item->data_nascimento)->age;

                                                if ($idade <= 12) {
                                                    $faixa = 'Criança';
                                                } elseif ($idade <= 17) {
                                                    $faixa = 'Adolescente';
                                                } elseif ($idade <= 35) {
                                                    $faixa = 'Jovem';
                                                } else {
                                                    $faixa = 'Adulto';
                                                }
                                            @endphp


                                            <p class="text-xs text-gray-500">{{ $faixa }}</p>
                                        </div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <div class="space-y-1">
                                            <p class="font-medium text-gray-900">
                                                {{ $item->endereco }}
                                            </p>
                                            <p class="text-xs text-gray-500">Grupo {{ $item->grupo->nome ?? "N/A" }}</p>
                                        </div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <p class="font-medium text-gray-900 capitalize">
                                            {{ $item->estado_civil }}
                                        </p>
                                        <p class="text-xs text-gray-500">{{ $item->estado }}</p>
                                    </td>

                                    <td class="py-4 px-6">
                                        <div class="flex items-center space-x-2">
                                            <a href="{{ route('admin.crentes.perfil', $item->id) }}"
                                                class="p-1.5 text-gray-400 hover:text-red-600 rounded-lg hover:bg-red-50 transition-colors"
                                                title="Ver perfil">
                                                <i class="fas fa-eye"></i>
                                        </a>
                                            <a href="{{ route('admin.crentes.editar', $item->id) }}"
                                                class="p-1.5 text-gray-400 hover:text-blue-600 rounded-lg hover:bg-blue-50 transition-colors"
                                                title="Editar">
                                                <i class="fas fa-edit"></i>
                                    </a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Paginação -->
                <div class="px-6 py-4 border-t border-gray-100">
    <div class="flex items-center justify-between">
        <div class="text-sm text-gray-600">
            Mostrando
            <span class="font-medium">{{ $crentes->firstItem() }}</span>
            a
            <span class="font-medium">{{ $crentes->lastItem() }}</span>
            de
            <span class="font-medium">{{ $crentes->total() }}</span>
            resultados
        </div>

        <div class="flex items-center space-x-2">
            {{-- Botão Anterior --}}
            @if ($crentes->onFirstPage())
                <button class="pagination-item opacity-50 cursor-not-allowed">
                    <i class="fas fa-chevron-left"></i>
                </button>
            @else
                <a href="{{ $crentes->previousPageUrl() }}" class="pagination-item">
                    <i class="fas fa-chevron-left"></i>
                </a>
            @endif

            {{-- Números das páginas --}}
            @foreach ($crentes->getUrlRange(
                max(1, $crentes->currentPage() - 2),
                min($crentes->lastPage(), $crentes->currentPage() + 2)
            ) as $page => $url)
                <a href="{{ $url }}"
                   class="pagination-item {{ $page == $crentes->currentPage() ? 'active' : '' }}">
                    {{ $page }}
                </a>
            @endforeach

            {{-- Botão Próximo --}}
            @if ($crentes->hasMorePages())
                <a href="{{ $crentes->nextPageUrl() }}" class="pagination-item">
                    <i class="fas fa-chevron-right"></i>
                </a>
            @else
                <button class="pagination-item opacity-50 cursor-not-allowed">
                    <i class="fas fa-chevron-right"></i>
                </button>
            @endif
        </div>
    </div>
</div>

            </div>


        </main>
    </div>


    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Toggle Menu Mobile
                const menuToggle = document.getElementById('menuToggle');
                const sidebar = document.querySelector('.sidebar');

                menuToggle.addEventListener('click', function() {
                    sidebar.classList.toggle('hidden');
                });


                // Filter Chips
                const filterChips = document.querySelectorAll('.filter-chip');
                filterChips.forEach(chip => {
                    chip.addEventListener('click', function() {
                        filterChips.forEach(c => c.classList.remove('active'));
                        this.classList.add('active');
                    });
                });

                // Search Functionality
                const searchInput = document.getElementById('searchInput');
                let searchTimeout;

                searchInput.addEventListener('input', function() {
                    clearTimeout(searchTimeout);
                    searchTimeout = setTimeout(function() {
                        // Implement search logic here
                        console.log('Searching for:', searchInput.value);
                    }, 500);
                });

                // Gráfico de Distribuição por Idade
                const ageOptions = {
                    series: [{
                        name: 'Homens',
                        data: [45, 60, 75, 90, 85, 70, 55, 40, 25]
                    }, {
                        name: 'Mulheres',
                        data: [40, 55, 70, 85, 80, 65, 50, 35, 20]
                    }],
                    chart: {
                        type: 'bar',
                        height: 300,
                        stacked: true,
                        toolbar: {
                            show: false
                        }
                    },
                    colors: ['#7f1d1d', '#3b82f6'],
                    plotOptions: {
                        bar: {
                            horizontal: false,
                            columnWidth: '70%',
                            borderRadius: 6,
                            borderRadiusApplication: 'end'
                        },
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
                        categories: ['0-12', '13-18', '19-25', '26-35', '36-45', '46-55', '56-65', '66-75', '75+'],
                        labels: {
                            style: {
                                fontSize: '12px'
                            }
                        }
                    },
                    yaxis: {
                        title: {
                            text: 'Número de Pessoas'
                        },
                        labels: {
                            formatter: function(val) {
                                return Math.floor(val);
                            }
                        }
                    },
                    fill: {
                        opacity: 0.9
                    },
                    tooltip: {
                        theme: 'light',
                        y: {
                            formatter: function(val) {
                                return val + " pessoas";
                            }
                        }
                    },
                    legend: {
                        position: 'top',
                        horizontalAlign: 'right',
                        fontSize: '12px',
                        markers: {
                            radius: 12
                        }
                    }
                };


                const checkboxes = document.querySelectorAll('input[type="checkbox"]');
                const selectAllCheckbox = checkboxes[0];

                selectAllCheckbox.addEventListener('change', function() {
                    const isChecked = this.checked;
                    checkboxes.forEach((checkbox, index) => {
                        if (index !== 0) {
                            checkbox.checked = isChecked;
                        }
                    });
                });
            });
        </script>
    @endpush
@endsection
