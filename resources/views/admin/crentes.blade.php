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
            <!-- Estatísticas Gerais -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="stats-card p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500 font-medium">Total de Crentes</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">1,248</p>
                        </div>
                        <div class="w-12 h-12 rounded-xl bg-red-50 flex items-center justify-center">
                            <i class="fas fa-users text-2xl text-red-600"></i>
                        </div>
                    </div>
                    <div class="mt-4 pt-4 border-t border-gray-100">
                        <div class="flex items-center text-sm text-gray-600">
                            <i class="fas fa-arrow-up text-green-500 mr-2"></i>
                            <span>+45 este mês</span>
                        </div>
                    </div>
                </div>

                <div class="stats-card p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500 font-medium">Homens</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">680</p>
                        </div>
                        <div class="w-12 h-12 rounded-xl bg-blue-50 flex items-center justify-center">
                            <i class="fas fa-male text-2xl text-blue-600"></i>
                        </div>
                    </div>
                    <div class="mt-4 pt-4 border-t border-gray-100">
                        <div class="text-sm text-gray-600">54.5% do total</div>
                    </div>
                </div>

                <div class="stats-card p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500 font-medium">Mulheres</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">568</p>
                        </div>
                        <div class="w-12 h-12 rounded-xl bg-pink-50 flex items-center justify-center">
                            <i class="fas fa-female text-2xl text-pink-600"></i>
                        </div>
                    </div>
                    <div class="mt-4 pt-4 border-t border-gray-100">
                        <div class="text-sm text-gray-600">45.5% do total</div>
                    </div>
                </div>

                <div class="stats-card p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500 font-medium">Média de Idade</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">38</p>
                        </div>
                        <div class="w-12 h-12 rounded-xl bg-amber-50 flex items-center justify-center">
                            <i class="fas fa-birthday-cake text-2xl text-amber-600"></i>
                        </div>
                    </div>
                    <div class="mt-4 pt-4 border-t border-gray-100">
                        <div class="flex items-center justify-between text-sm text-gray-600">
                            <span>Min: 12</span>
                            <span>Max: 85</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Filtros e Busca -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 mb-8">
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                    <!-- Barra de Busca -->
                    <div class="flex-1">
                        <div class="search-box flex items-center px-4 py-2.5">
                            <i class="fas fa-search text-gray-400 mr-3"></i>
                            <input type="text" placeholder="Buscar crentes por nome, telefone ou localização..."
                                class="flex-1 outline-none text-sm" id="searchInput">
                            <button class="text-gray-400 hover:text-gray-600 ml-3">
                                <i class="fas fa-filter"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Filtros Rápidos -->
                    <div class="flex items-center space-x-3">
                        <select
                            class="text-sm border border-gray-200 rounded-xl px-4 py-2.5 focus:outline-none focus:border-red-300">
                            <option>Ordenar por: Mais Recentes</option>
                            <option>Ordenar por: Nome (A-Z)</option>
                            <option>Ordenar por: Data de Nascimento</option>
                            <option>Ordenar por: Data de Registro</option>
                        </select>

                        <button class="p-2.5 border border-gray-200 rounded-xl hover:bg-gray-50">
                            <i class="fas fa-download text-gray-600"></i>
                        </button>
                    </div>
                </div>

                <!-- Chips de Filtro -->
                <div class="flex flex-wrap gap-2 mt-6">
                    <button class="filter-chip active">
                        <i class="fas fa-users mr-2"></i>
                        Todos
                    </button>
                    <button class="filter-chip">
                        <i class="fas fa-star mr-2"></i>
                        Líderes
                    </button>
                    <button class="filter-chip">
                        <i class="fas fa-water mr-2"></i>
                        Batizados
                    </button>
                    <button class="filter-chip">
                        <i class="fas fa-music mr-2"></i>
                        Ministério de Louvor
                    </button>
                    <button class="filter-chip">
                        <i class="fas fa-child mr-2"></i>
                        Jovens
                    </button>
                    <button class="filter-chip">
                        <i class="fas fa-home mr-2"></i>
                        Visitantes
                    </button>
                </div>
            </div>

            <!-- Tabela de Crentes -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <!-- Cabeçalho da Tabela -->
                <div class="px-6 py-4 border-b border-gray-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-lg font-bold text-gray-900">Lista de Crentes</h3>
                            <p class="text-sm text-gray-500">1,248 crentes registrados</p>
                        </div>
                        <div class="flex items-center space-x-3">
                            <span class="text-sm text-gray-600">Mostrar:</span>
                            <select class="text-sm border border-gray-200 rounded-lg px-3 py-1.5">
                                <option>25</option>
                                <option>50</option>
                                <option>100</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Tabela -->
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th
                                    class="text-left py-4 px-6 text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                    <div class="flex items-center">
                                        <input type="checkbox" class="rounded border-gray-300">
                                    </div>
                                </th>
                                <th
                                    class="text-left py-4 px-6 text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                    Crente</th>
                                <th
                                    class="text-left py-4 px-6 text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                    Contacto</th>
                                <th
                                    class="text-left py-4 px-6 text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                    Localização</th>
                                <th
                                    class="text-left py-4 px-6 text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                    Estado Civil</th>
                                <th
                                    class="text-left py-4 px-6 text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                    Status</th>
                                <th
                                    class="text-left py-4 px-6 text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                    Ações</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @for ($i = 0; $i < 10; $i++)
                                <tr class="table-row-hover">
                                    <td class="py-4 px-6">
                                        <input type="checkbox" class="rounded border-gray-300">
                                    </td>
                                    <td class="py-4 px-6">
                                        <div class="flex items-center">
                                            <div
                                                class="w-10 h-10 rounded-full bg-gradient-to-br from-red-100 to-red-200 flex items-center justify-center text-red-800 font-semibold mr-3">
                                                {{ substr(['Maria', 'João', 'Ana', 'Pedro', 'Luísa', 'Carlos', 'Sofia', 'Miguel', 'Teresa', 'Paulo'][$i], 0, 1) }}
                                            </div>
                                            <div>
                                                <p class="font-medium text-gray-900">
                                                    {{ ['Maria João', 'João Baptista', 'Ana Silva', 'Pedro Santos', 'Luísa Fernandes', 'Carlos Manuel', 'Sofia Matos', 'Miguel Costa', 'Teresa Lopes', 'Paulo Dias'][$i] }}
                                                </p>
                                                <p class="text-xs text-gray-500">
                                                    {{ now()->subYears(rand(20, 60))->subMonths(rand(0, 11))->format('d/m/Y') }}
                                                    •
                                                    {{ $i % 2 == 0 ? 'Masculino' : 'Feminino' }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <div class="space-y-1">
                                            <p class="text-sm text-gray-900">+258 84 123 456{{ $i }}</p>
                                            <p class="text-xs text-gray-500">
                                                {{ ['maria@gmail.com', 'joao@gmail.com', 'ana@gmail.com', 'pedro@gmail.com', 'luisa@gmail.com', 'carlos@gmail.com', 'sofia@gmail.com', 'miguel@gmail.com', 'teresa@gmail.com', 'paulo@gmail.com'][$i] }}
                                            </p>
                                        </div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <div class="space-y-1">
                                            <p class="text-sm text-gray-900">
                                                {{ ['Maputo', 'Matola', 'Beira', 'Nampula', 'Quelimane', 'Tete', 'Pemba', 'Xai-Xai', 'Inhambane', 'Chimoio'][$i] }}
                                            </p>
                                            <p class="text-xs text-gray-500">Grupo {{ chr(65 + ($i % 5)) }}</p>
                                        </div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <span
                                            class="status-badge {{ ['bg-green-100 text-green-800', 'bg-blue-100 text-blue-800', 'bg-yellow-100 text-yellow-800', 'bg-green-100 text-green-800', 'bg-red-100 text-red-800'][$i % 5] }}">
                                            {{ ['Casado', 'Solteiro', 'Viúvo', 'Casado', 'Divorciado'][$i % 5] }}
                                        </span>
                                    </td>
                                    <td class="py-4 px-6">
                                        <span
                                            class="status-badge {{ $i < 5 ? 'bg-green-100 text-green-800' : 'bg-blue-100 text-blue-800' }}">
                                            <i
                                                class="fas fa-circle text-xs mr-1 {{ $i < 5 ? 'text-green-500' : 'text-blue-500' }}"></i>
                                            {{ $i < 5 ? 'Ativo' : 'Novo' }}
                                        </span>
                                    </td>
                                    <td class="py-4 px-6">
                                        <div class="flex items-center space-x-2">
                                            <button
                                                class="p-1.5 text-gray-400 hover:text-red-600 rounded-lg hover:bg-red-50 transition-colors"
                                                title="Ver perfil">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button
                                                class="p-1.5 text-gray-400 hover:text-blue-600 rounded-lg hover:bg-blue-50 transition-colors"
                                                title="Editar">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>

                <!-- Paginação -->
                <div class="px-6 py-4 border-t border-gray-100">
                    <div class="flex items-center justify-between">
                        <div class="text-sm text-gray-600">
                            Mostrando <span class="font-medium">1</span> a <span class="font-medium">10</span> de
                            <span class="font-medium">1,248</span> resultados
                        </div>
                        <div class="flex items-center space-x-2">
                            <button class="pagination-item">
                                <i class="fas fa-chevron-left"></i>
                            </button>
                            <button class="pagination-item active">1</button>
                            <button class="pagination-item">2</button>
                            <button class="pagination-item">3</button>
                            <button class="pagination-item">4</button>
                            <button class="pagination-item">5</button>
                            <button class="pagination-item">
                                <i class="fas fa-chevron-right"></i>
                            </button>
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
