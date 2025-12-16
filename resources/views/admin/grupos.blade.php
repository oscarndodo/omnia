<!-- grupos.blade.php -->
@extends('admin.index')

@section('main')
    <div class="p-6">
        <!-- Cabeçalho -->
        <div class="mb-8">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
                <div>
                    <h1 class="text-2xl lg:text-3xl font-bold text-gray-900">Grupos / Células</h1>
                    <p class="text-gray-600 mt-2">Gerencie os grupos de células da sua igreja</p>
                </div>
                <div class="flex items-center space-x-4 mt-4 lg:mt-0">
                    <!-- Botão de Relatório -->
                    <button
                        class="px-5 py-2.5 bg-white border border-gray-200 hover:bg-gray-50 text-gray-700 font-medium rounded-xl transition-colors flex items-center">
                        <i class="fas fa-file-export mr-2"></i> Exportar
                    </button>
                    <!-- Botão Novo Grupo -->
                    <button id="novoGrupoBtn"
                        class="px-6 py-3 bg-red-700 hover:bg-red-800 text-white font-medium rounded-xl transition-colors flex items-center">
                        <i class="fas fa-plus mr-2"></i> Novo Grupo
                    </button>
                </div>
            </div>
        </div>

        <!-- Tabs para alternar entre Crentes e Grupos -->
        <div class="mb-8">
            <div class="border-b border-gray-200">
                <nav class="-mb-px flex space-x-8">
                    <!-- Tab Grupos (Ativa por padrão) -->
                    <button id="tab-grupos"
                        class="tab-button py-3 px-1 border-b-2 font-medium text-sm transition-colors border-red-700 text-red-700 flex items-center">
                        <i class="fas fa-church mr-2"></i> Grupos
                        <span class="ml-2 bg-red-100 text-red-800 text-xs px-2 py-0.5 rounded-full">18</span>
                    </button>

                    <!-- Tab Crentes -->
                    <button id="tab-crentes"
                        class="tab-button py-3 px-1 border-b-2 font-medium text-sm transition-colors border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 flex items-center">
                        <i class="fas fa-users mr-2"></i> Crentes
                        <span class="ml-2 bg-gray-100 text-gray-800 text-xs px-2 py-0.5 rounded-full">248</span>
                    </button>
                </nav>
            </div>
        </div>

        <!-- Conteúdo da Tab Grupos (Visível por padrão) -->
        <div id="conteudo-grupos">
            <!-- Cards de Estatísticas -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Total de Grupos -->
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm font-medium">Total de Grupos</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">18</p>
                        </div>
                        <div class="w-12 h-12 rounded-xl bg-red-50 flex items-center justify-center">
                            <i class="fas fa-church text-red-600 text-xl"></i>
                        </div>
                    </div>
                    <div class="mt-4">
                        <span class="text-green-600 text-sm font-medium flex items-center">
                            <i class="fas fa-arrow-up mr-1"></i> +2 este mês
                        </span>
                    </div>
                </div>

                <!-- Membros Ativos -->
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm font-medium">Membros Ativos</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">248</p>
                        </div>
                        <div class="w-12 h-12 rounded-xl bg-blue-50 flex items-center justify-center">
                            <i class="fas fa-users text-blue-600 text-xl"></i>
                        </div>
                    </div>
                    <div class="mt-4">
                        <span class="text-green-600 text-sm font-medium flex items-center">
                            <i class="fas fa-arrow-up mr-1"></i> +15 este mês
                        </span>
                    </div>
                </div>

                <!-- Líderes -->
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm font-medium">Líderes</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">24</p>
                        </div>
                        <div class="w-12 h-12 rounded-xl bg-green-50 flex items-center justify-center">
                            <i class="fas fa-user-friends text-green-600 text-xl"></i>
                        </div>
                    </div>
                    <div class="mt-4">
                        <span class="text-gray-500 text-sm">+2 novos líderes</span>
                    </div>
                </div>

                <!-- Reuniões Esta Semana -->
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm font-medium">Reuniões Esta Semana</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">15</p>
                        </div>
                        <div class="w-12 h-12 rounded-xl bg-purple-50 flex items-center justify-center">
                            <i class="fas fa-calendar-alt text-purple-600 text-xl"></i>
                        </div>
                    </div>
                    <div class="mt-4">
                        <span class="text-blue-600 text-sm font-medium">Ver calendário →</span>
                    </div>
                </div>
            </div>

            <!-- Filtros e Busca -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 mb-6">
                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <div class="flex-1">
                        <div class="relative">
                            <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                            <input type="text" placeholder="Buscar grupo ou líder..."
                                class="w-full pl-12 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent">
                        </div>
                    </div>
                    <div class="flex flex-wrap gap-3">
                        <select
                            class="px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent">
                            <option>Todos os Dias</option>
                            <option>Segunda-feira</option>
                            <option>Terça-feira</option>
                            <option>Quarta-feira</option>
                            <option>Quinta-feira</option>
                            <option>Sexta-feira</option>
                            <option>Sábado</option>
                            <option>Domingo</option>
                        </select>
                        <select
                            class="px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent">
                            <option>Todas as Regiões</option>
                            <option>Centro</option>
                            <option>Norte</option>
                            <option>Sul</option>
                            <option>Leste</option>
                            <option>Oeste</option>
                        </select>
                        <button
                            class="px-4 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-xl transition-colors flex items-center">
                            <i class="fas fa-filter mr-2"></i> Mais Filtros
                        </button>
                    </div>
                </div>
            </div>

            <!-- Lista de Grupos -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Nome do Grupo</th>
                                <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Líder</th>
                                <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Dia da Reunião</th>
                                <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Membros</th>
                                <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Região</th>
                                <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Status</th>
                                <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Ações</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            <!-- Grupo 1 -->
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="py-4 px-6">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 rounded-lg bg-red-100 flex items-center justify-center mr-3">
                                            <i class="fas fa-church text-red-600"></i>
                                        </div>
                                        <div>
                                            <p class="font-medium text-gray-900">Célula Avivamento</p>
                                            <p class="text-sm text-gray-500">Reuniões às 19h</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="flex items-center">
                                        <div
                                            class="w-8 h-8 rounded-full bg-gradient-to-br from-blue-500 to-blue-700 flex items-center justify-center text-white text-sm font-semibold mr-2">
                                            JM
                                        </div>
                                        <span class="font-medium">João Miguel</span>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                                        <i class="fas fa-calendar-day mr-1"></i> Segunda
                                    </span>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="flex items-center">
                                        <div class="flex -space-x-2 mr-3">
                                            <div
                                                class="w-8 h-8 rounded-full bg-gradient-to-br from-gray-400 to-gray-600 border-2 border-white">
                                            </div>
                                            <div
                                                class="w-8 h-8 rounded-full bg-gradient-to-br from-yellow-400 to-yellow-600 border-2 border-white">
                                            </div>
                                            <div
                                                class="w-8 h-8 rounded-full bg-gradient-to-br from-green-400 to-green-600 border-2 border-white">
                                            </div>
                                            <div
                                                class="w-8 h-8 rounded-full bg-gradient-to-br from-red-400 to-red-600 border-2 border-white">
                                            </div>
                                        </div>
                                        <span class="font-medium">15</span>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <span class="text-gray-700">Centro</span>
                                </td>
                                <td class="py-4 px-6">
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                        <i class="fas fa-circle mr-1 text-xs"></i> Ativo
                                    </span>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="flex items-center space-x-2">
                                        <a href="{{ route('admin.grupo', 12) }}"
                                            class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-100 transition-colors flex items-center justify-center">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <button
                                            class="w-8 h-8 rounded-lg bg-green-50 text-green-600 hover:bg-green-100 transition-colors flex items-center justify-center">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button
                                            class="w-8 h-8 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 transition-colors flex items-center justify-center">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Grupo 2 -->
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="py-4 px-6">
                                    <div class="flex items-center">
                                        <div
                                            class="w-10 h-10 rounded-lg bg-blue-100 flex items-center justify-center mr-3">
                                            <i class="fas fa-church text-blue-600"></i>
                                        </div>
                                        <div>
                                            <p class="font-medium text-gray-900">Célula Fé Viva</p>
                                            <p class="text-sm text-gray-500">Reuniões às 20h</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="flex items-center">
                                        <div
                                            class="w-8 h-8 rounded-full bg-gradient-to-br from-purple-500 to-purple-700 flex items-center justify-center text-white text-sm font-semibold mr-2">
                                            MA
                                        </div>
                                        <span class="font-medium">Maria Alice</span>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-purple-100 text-purple-800">
                                        <i class="fas fa-calendar-day mr-1"></i> Quarta
                                    </span>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="flex items-center">
                                        <div class="flex -space-x-2 mr-3">
                                            <div
                                                class="w-8 h-8 rounded-full bg-gradient-to-br from-gray-400 to-gray-600 border-2 border-white">
                                            </div>
                                            <div
                                                class="w-8 h-8 rounded-full bg-gradient-to-br from-yellow-400 to-yellow-600 border-2 border-white">
                                            </div>
                                            <div
                                                class="w-8 h-8 rounded-full bg-gradient-to-br from-green-400 to-green-600 border-2 border-white">
                                            </div>
                                        </div>
                                        <span class="font-medium">12</span>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <span class="text-gray-700">Norte</span>
                                </td>
                                <td class="py-4 px-6">
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                        <i class="fas fa-circle mr-1 text-xs"></i> Ativo
                                    </span>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="flex items-center space-x-2">
                                        <button
                                            class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-100 transition-colors flex items-center justify-center">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button
                                            class="w-8 h-8 rounded-lg bg-green-50 text-green-600 hover:bg-green-100 transition-colors flex items-center justify-center">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button
                                            class="w-8 h-8 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 transition-colors flex items-center justify-center">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Grupo 3 -->
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="py-4 px-6">
                                    <div class="flex items-center">
                                        <div
                                            class="w-10 h-10 rounded-lg bg-yellow-100 flex items-center justify-center mr-3">
                                            <i class="fas fa-church text-yellow-600"></i>
                                        </div>
                                        <div>
                                            <p class="font-medium text-gray-900">Célula Esperança</p>
                                            <p class="text-sm text-gray-500">Reuniões às 19:30h</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="flex items-center">
                                        <div
                                            class="w-8 h-8 rounded-full bg-gradient-to-br from-green-500 to-green-700 flex items-center justify-center text-white text-sm font-semibold mr-2">
                                            PS
                                        </div>
                                        <span class="font-medium">Pedro Silva</span>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                        <i class="fas fa-calendar-day mr-1"></i> Sexta
                                    </span>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="flex items-center">
                                        <div class="flex -space-x-2 mr-3">
                                            <div
                                                class="w-8 h-8 rounded-full bg-gradient-to-br from-gray-400 to-gray-600 border-2 border-white">
                                            </div>
                                            <div
                                                class="w-8 h-8 rounded-full bg-gradient-to-br from-yellow-400 to-yellow-600 border-2 border-white">
                                            </div>
                                            <div
                                                class="w-8 h-8 rounded-full bg-gradient-to-br from-green-400 to-green-600 border-2 border-white">
                                            </div>
                                            <div
                                                class="w-8 h-8 rounded-full bg-gradient-to-br from-red-400 to-red-600 border-2 border-white">
                                            </div>
                                            <div
                                                class="w-8 h-8 rounded-full bg-gradient-to-br from-blue-400 to-blue-600 border-2 border-white">
                                            </div>
                                        </div>
                                        <span class="font-medium">18</span>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <span class="text-gray-700">Sul</span>
                                </td>
                                <td class="py-4 px-6">
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800">
                                        <i class="fas fa-circle mr-1 text-xs"></i> Inativo
                                    </span>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="flex items-center space-x-2">
                                        <button
                                            class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-100 transition-colors flex items-center justify-center">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button
                                            class="w-8 h-8 rounded-lg bg-green-50 text-green-600 hover:bg-green-100 transition-colors flex items-center justify-center">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button
                                            class="w-8 h-8 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 transition-colors flex items-center justify-center">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Paginação -->
                <div class="px-6 py-4 border-t border-gray-100 flex items-center justify-between">
                    <div class="text-sm text-gray-500">
                        Mostrando 1-3 de 18 grupos
                    </div>
                    <div class="flex items-center space-x-2">
                        <button
                            class="w-10 h-10 rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-700 flex items-center justify-center">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <button
                            class="w-10 h-10 rounded-lg bg-red-600 text-white flex items-center justify-center">1</button>
                        <button
                            class="w-10 h-10 rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-700 flex items-center justify-center">2</button>
                        <button
                            class="w-10 h-10 rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-700 flex items-center justify-center">3</button>
                        <span class="px-2">...</span>
                        <button
                            class="w-10 h-10 rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-700 flex items-center justify-center">6</button>
                        <button
                            class="w-10 h-10 rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-700 flex items-center justify-center">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Conteúdo da Tab Crentes (Escondido por padrão) -->
        <div id="conteudo-crentes" class="hidden">
            <!-- Cards de Estatísticas de Crentes -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Total de Crentes -->
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm font-medium">Total de Crentes</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">248</p>
                        </div>
                        <div class="w-12 h-12 rounded-xl bg-red-50 flex items-center justify-center">
                            <i class="fas fa-users text-red-600 text-xl"></i>
                        </div>
                    </div>
                    <div class="mt-4">
                        <span class="text-green-600 text-sm font-medium flex items-center">
                            <i class="fas fa-arrow-up mr-1"></i> +15 este mês
                        </span>
                    </div>
                </div>

                <!-- Novos Convertidos -->
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm font-medium">Novos Convertidos</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">8</p>
                        </div>
                        <div class="w-12 h-12 rounded-xl bg-green-50 flex items-center justify-center">
                            <i class="fas fa-star text-green-600 text-xl"></i>
                        </div>
                    </div>
                    <div class="mt-4">
                        <span class="text-green-600 text-sm font-medium flex items-center">
                            <i class="fas fa-arrow-up mr-1"></i> +3 esta semana
                        </span>
                    </div>
                </div>

                <!-- Batizados -->
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm font-medium">Batizados</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">156</p>
                        </div>
                        <div class="w-12 h-12 rounded-xl bg-blue-50 flex items-center justify-center">
                            <i class="fas fa-water text-blue-600 text-xl"></i>
                        </div>
                    </div>
                    <div class="mt-4">
                        <span class="text-gray-500 text-sm">+5 este trimestre</span>
                    </div>
                </div>

                <!-- Sem Grupo -->
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm font-medium">Sem Grupo</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">24</p>
                        </div>
                        <div class="w-12 h-12 rounded-xl bg-yellow-50 flex items-center justify-center">
                            <i class="fas fa-user-times text-yellow-600 text-xl"></i>
                        </div>
                    </div>
                    <div class="mt-4">
                        <span class="text-red-600 text-sm font-medium">Necessita atenção</span>
                    </div>
                </div>
            </div>

            <!-- Filtros e Busca de Crentes -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 mb-6">
                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <div class="flex-1">
                        <div class="relative">
                            <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                            <input type="text" placeholder="Buscar crente por nome..."
                                class="w-full pl-12 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent">
                        </div>
                    </div>
                    <div class="flex flex-wrap gap-3">
                        <select
                            class="px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent">
                            <option>Todos os Status</option>
                            <option>Ativo</option>
                            <option>Inativo</option>
                            <option>Visitante</option>
                            <option>Novo Convertido</option>
                        </select>
                        <select
                            class="px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent">
                            <option>Todos os Grupos</option>
                            <option>Célula Avivamento</option>
                            <option>Célula Fé Viva</option>
                            <option>Célula Esperança</option>
                            <option>Sem Grupo</option>
                        </select>
                        <button
                            class="px-4 py-3 bg-red-600 hover:bg-red-700 text-white rounded-xl transition-colors flex items-center">
                            <i class="fas fa-plus mr-2"></i> Novo Crente
                        </button>
                    </div>
                </div>
            </div>

            <!-- Lista de Crentes -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Nome</th>
                                <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Telefone</th>
                                <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">E-mail</th>
                                <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Grupo</th>
                                <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Status</th>
                                <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Última Visita</th>
                                <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Ações</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            <!-- Crente 1 -->
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="py-4 px-6">
                                    <div class="flex items-center">
                                        <div
                                            class="w-10 h-10 rounded-full bg-gradient-to-br from-blue-500 to-blue-700 flex items-center justify-center text-white font-semibold mr-3">
                                            JM
                                        </div>
                                        <div>
                                            <p class="font-medium text-gray-900">João Miguel</p>
                                            <p class="text-sm text-gray-500">Líder de Célula</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <span class="text-gray-700">(11) 99999-8888</span>
                                </td>
                                <td class="py-4 px-6">
                                    <span class="text-gray-700">joao.miguel@email.com</span>
                                </td>
                                <td class="py-4 px-6">
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800">
                                        <i class="fas fa-church mr-1 text-xs"></i> Avivamento
                                    </span>
                                </td>
                                <td class="py-4 px-6">
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                        <i class="fas fa-circle mr-1 text-xs"></i> Ativo
                                    </span>
                                </td>
                                <td class="py-4 px-6">
                                    <span class="text-gray-700">15/03/2024</span>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="flex items-center space-x-2">
                                        <button
                                            class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-100 transition-colors flex items-center justify-center">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button
                                            class="w-8 h-8 rounded-lg bg-green-50 text-green-600 hover:bg-green-100 transition-colors flex items-center justify-center">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button
                                            class="w-8 h-8 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 transition-colors flex items-center justify-center">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Crente 2 -->
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="py-4 px-6">
                                    <div class="flex items-center">
                                        <div
                                            class="w-10 h-10 rounded-full bg-gradient-to-br from-purple-500 to-purple-700 flex items-center justify-center text-white font-semibold mr-3">
                                            MA
                                        </div>
                                        <div>
                                            <p class="font-medium text-gray-900">Maria Alice</p>
                                            <p class="text-sm text-gray-500">Líder de Célula</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <span class="text-gray-700">(11) 97777-6666</span>
                                </td>
                                <td class="py-4 px-6">
                                    <span class="text-gray-700">maria.alice@email.com</span>
                                </td>
                                <td class="py-4 px-6">
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                                        <i class="fas fa-church mr-1 text-xs"></i> Fé Viva
                                    </span>
                                </td>
                                <td class="py-4 px-6">
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                        <i class="fas fa-circle mr-1 text-xs"></i> Ativo
                                    </span>
                                </td>
                                <td class="py-4 px-6">
                                    <span class="text-gray-700">14/03/2024</span>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="flex items-center space-x-2">
                                        <button
                                            class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-100 transition-colors flex items-center justify-center">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button
                                            class="w-8 h-8 rounded-lg bg-green-50 text-green-600 hover:bg-green-100 transition-colors flex items-center justify-center">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button
                                            class="w-8 h-8 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 transition-colors flex items-center justify-center">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Crente 3 -->
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="py-4 px-6">
                                    <div class="flex items-center">
                                        <div
                                            class="w-10 h-10 rounded-full bg-gradient-to-br from-green-500 to-green-700 flex items-center justify-center text-white font-semibold mr-3">
                                            PS
                                        </div>
                                        <div>
                                            <p class="font-medium text-gray-900">Pedro Silva</p>
                                            <p class="text-sm text-gray-500">Membro</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <span class="text-gray-700">(11) 95555-4444</span>
                                </td>
                                <td class="py-4 px-6">
                                    <span class="text-gray-700">pedro.silva@email.com</span>
                                </td>
                                <td class="py-4 px-6">
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800">
                                        <i class="fas fa-church mr-1 text-xs"></i> Esperança
                                    </span>
                                </td>
                                <td class="py-4 px-6">
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800">
                                        <i class="fas fa-circle mr-1 text-xs"></i> Inativo
                                    </span>
                                </td>
                                <td class="py-4 px-6">
                                    <span class="text-gray-700">01/02/2024</span>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="flex items-center space-x-2">
                                        <button
                                            class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-100 transition-colors flex items-center justify-center">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button
                                            class="w-8 h-8 rounded-lg bg-green-50 text-green-600 hover:bg-green-100 transition-colors flex items-center justify-center">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button
                                            class="w-8 h-8 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 transition-colors flex items-center justify-center">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Paginação -->
                <div class="px-6 py-4 border-t border-gray-100 flex items-center justify-between">
                    <div class="text-sm text-gray-500">
                        Mostrando 1-3 de 248 crentes
                    </div>
                    <div class="flex items-center space-x-2">
                        <button
                            class="w-10 h-10 rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-700 flex items-center justify-center">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <button
                            class="w-10 h-10 rounded-lg bg-red-600 text-white flex items-center justify-center">1</button>
                        <button
                            class="w-10 h-10 rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-700 flex items-center justify-center">2</button>
                        <button
                            class="w-10 h-10 rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-700 flex items-center justify-center">3</button>
                        <span class="px-2">...</span>
                        <button
                            class="w-10 h-10 rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-700 flex items-center justify-center">25</button>
                        <button
                            class="w-10 h-10 rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-700 flex items-center justify-center">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal para Novo Grupo (inicialmente escondido) -->
        <div id="novoGrupoModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden items-center justify-center p-4">
            <div class="bg-white rounded-2xl w-full max-w-2xl max-h-[90vh] overflow-y-auto">
                <div class="p-6 border-b border-gray-100">
                    <div class="flex items-center justify-between">
                        <h2 class="text-xl font-bold text-gray-900">Novo Grupo/Célula</h2>
                        <button id="fecharModalBtn"
                            class="w-10 h-10 rounded-lg hover:bg-gray-100 flex items-center justify-center">
                            <i class="fas fa-times text-gray-500"></i>
                        </button>
                    </div>
                </div>

                <form class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nome do Grupo</label>
                            <input type="text"
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent"
                                placeholder="Ex: Célula Avivamento">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Líder</label>
                            <select
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent">
                                <option>Selecione um líder</option>
                                <option>João Miguel</option>
                                <option>Maria Alice</option>
                                <option>Pedro Silva</option>
                                <option>Ana Costa</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Dia da Reunião</label>
                            <select
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent">
                                <option>Selecione o dia</option>
                                <option>Segunda-feira</option>
                                <option>Terça-feira</option>
                                <option>Quarta-feira</option>
                                <option>Quinta-feira</option>
                                <option>Sexta-feira</option>
                                <option>Sábado</option>
                                <option>Domingo</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Horário</label>
                            <input type="time"
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Região</label>
                            <select
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent">
                                <option>Selecione a região</option>
                                <option>Centro</option>
                                <option>Norte</option>
                                <option>Sul</option>
                                <option>Leste</option>
                                <option>Oeste</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Endereço</label>
                            <input type="text"
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent"
                                placeholder="Rua, número, bairro">
                        </div>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Descrição (opcional)</label>
                        <textarea rows="3"
                            class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent"
                            placeholder="Descreva o propósito deste grupo..."></textarea>
                    </div>

                    <div class="flex justify-end space-x-4 pt-6 border-t border-gray-100">
                        <button type="button" id="cancelarModalBtn"
                            class="px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-xl transition-colors">
                            Cancelar
                        </button>
                        <button type="submit"
                            class="px-6 py-3 bg-red-700 hover:bg-red-800 text-white font-medium rounded-xl transition-colors flex items-center">
                            <i class="fas fa-save mr-2"></i> Salvar Grupo
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            // Controle do Modal
            document.addEventListener('DOMContentLoaded', function() {
                const novoGrupoBtn = document.getElementById('novoGrupoBtn');
                const fecharModalBtn = document.getElementById('fecharModalBtn');
                const cancelarModalBtn = document.getElementById('cancelarModalBtn');
                const novoGrupoModal = document.getElementById('novoGrupoModal');

                // Abrir modal
                if (novoGrupoBtn) {
                    novoGrupoBtn.addEventListener('click', function() {
                        novoGrupoModal.classList.remove('hidden');
                        novoGrupoModal.classList.add('flex');
                    });
                }

                // Fechar modal
                function fecharModal() {
                    novoGrupoModal.classList.remove('flex');
                    novoGrupoModal.classList.add('hidden');
                }

                if (fecharModalBtn) fecharModalBtn.addEventListener('click', fecharModal);
                if (cancelarModalBtn) cancelarModalBtn.addEventListener('click', fecharModal);

                // Fechar modal ao clicar fora
                if (novoGrupoModal) {
                    novoGrupoModal.addEventListener('click', function(e) {
                        if (e.target === novoGrupoModal) {
                            fecharModal();
                        }
                    });
                }

                // Form submit
                const form = document.querySelector('#novoGrupoModal form');
                if (form) {
                    form.addEventListener('submit', function(e) {
                        e.preventDefault();
                        // Aqui você adicionaria a lógica para salvar o grupo
                        alert('Grupo salvo com sucesso!');
                        fecharModal();
                    });
                }

                // Controle das Tabs
                const tabGrupos = document.getElementById('tab-grupos');
                const tabCrentes = document.getElementById('tab-crentes');
                const conteudoGrupos = document.getElementById('conteudo-grupos');
                const conteudoCrentes = document.getElementById('conteudo-crentes');

                // Função para alternar tabs
                function alternarTab(tabAtiva, conteudoAtivo) {
                    // Resetar todas as tabs
                    [tabGrupos, tabCrentes].forEach(tab => {
                        tab.classList.remove('border-red-700', 'text-red-700');
                        tab.classList.add('border-transparent', 'text-gray-500');
                    });

                    // Esconder todos os conteúdos
                    [conteudoGrupos, conteudoCrentes].forEach(conteudo => {
                        conteudo.classList.add('hidden');
                    });

                    // Ativar tab selecionada
                    tabAtiva.classList.remove('border-transparent', 'text-gray-500');
                    tabAtiva.classList.add('border-red-700', 'text-red-700');

                    // Mostrar conteúdo correspondente
                    conteudoAtivo.classList.remove('hidden');
                }

                // Event listeners para as tabs
                if (tabGrupos && conteudoGrupos) {
                    tabGrupos.addEventListener('click', function() {
                        alternarTab(tabGrupos, conteudoGrupos);
                    });
                }

                if (tabCrentes && conteudoCrentes) {
                    tabCrentes.addEventListener('click', function() {
                        alternarTab(tabCrentes, conteudoCrentes);
                    });
                }
            });
        </script>
    @endpush
@endsection
