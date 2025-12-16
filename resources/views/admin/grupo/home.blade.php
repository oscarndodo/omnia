<!-- visualizar-grupo.blade.php -->
@extends('admin.index')

@section('main')
    <div class="p-6">
        <!-- Cabeçalho com Breadcrumb -->
        <div class="mb-8">
            <nav class="flex mb-6" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ route('admin.home') }}"
                            class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-red-700 transition-colors">
                            <i class="fas fa-home mr-2"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 text-xs"></i>
                            <a href="{{ route('admin.grupos') }}"
                                class="ml-2 text-sm font-medium text-gray-700 hover:text-red-700 transition-colors">Grupos</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 text-xs"></i>
                            <span class="ml-2 text-sm font-medium text-red-700">Grupo Familiar</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <!-- Cabeçalho do Grupo -->
            <div class="bg-gradient-to-r from-red-50 to-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between">
                    <div class="flex-1">
                        <div class="flex items-start">
                            <div
                                class="w-16 h-16 rounded-2xl bg-gradient-to-br from-red-600 to-red-800 flex items-center justify-center mr-4 shadow-lg">
                                <i class="fas fa-church text-white text-2xl"></i>
                            </div>
                            <div class="flex-1">
                                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
                                    <div>
                                        <h1 class="text-2xl lg:text-3xl font-bold text-gray-900">Avivamento</h1>
                                        <div class="flex flex-wrap items-center gap-2 mt-2">
                                            <span
                                                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800 border border-green-200">
                                                <i class="fas fa-circle mr-1 text-xs"></i> Ativo
                                            </span>
                                            <span
                                                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800 border border-blue-200">
                                                <i class="fas fa-users mr-1"></i> 15 membros
                                            </span>
                                            <span
                                                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-purple-100 text-purple-800 border border-purple-200">
                                                <i class="fas fa-map-marker-alt mr-1"></i> Centro
                                            </span>
                                        </div>
                                    </div>
                                    <div class="mt-4 lg:mt-0">
                                        <span
                                            class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800 border border-red-200">
                                            <i class="fas fa-calendar-day mr-1"></i> Segunda, 19h
                                        </span>
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <p class="text-gray-600">
                                        <i class="fas fa-map-marker-alt text-red-600 mr-2"></i>
                                        Rua das Flores, 123 - Centro, São Paulo - SP
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabs de Conteúdo -->
        <div class="mb-8">
            <div class="border-b border-gray-200">
                <nav class="-mb-px flex space-x-8 overflow-x-auto">
                    <!-- Tab Membros -->
                    <button id="tab-membros"
                        class="tab-button py-4 px-1 border-b-2 font-medium text-sm transition-all duration-300 border-red-700 text-red-700 whitespace-nowrap flex items-center group">
                        <div
                            class="w-8 h-8 rounded-lg bg-red-100 flex items-center justify-center mr-3 group-hover:bg-red-200 transition-colors">
                            <i class="fas fa-users text-red-600"></i>
                        </div>
                        <span>Membros</span>
                        <span class="ml-2 bg-red-100 text-red-800 text-xs px-2 py-0.5 rounded-full">15</span>
                    </button>

                    <!-- Tab Líderes -->
                    <button id="tab-lideres"
                        class="tab-button py-4 px-1 border-b-2 font-medium text-sm transition-all duration-300 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap flex items-center group">
                        <div
                            class="w-8 h-8 rounded-lg bg-gray-100 flex items-center justify-center mr-3 group-hover:bg-gray-200 transition-colors">
                            <i class="fas fa-crown text-gray-600"></i>
                        </div>
                        <span>Líderes</span>
                        <span class="ml-2 bg-gray-100 text-gray-800 text-xs px-2 py-0.5 rounded-full">2</span>
                    </button>

                    <!-- Tab Eventos -->
                    <button id="tab-eventos"
                        class="tab-button py-4 px-1 border-b-2 font-medium text-sm transition-all duration-300 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap flex items-center group">
                        <div
                            class="w-8 h-8 rounded-lg bg-gray-100 flex items-center justify-center mr-3 group-hover:bg-gray-200 transition-colors">
                            <i class="fas fa-calendar-alt text-gray-600"></i>
                        </div>
                        <span>Eventos</span>
                        <span class="ml-2 bg-gray-100 text-gray-800 text-xs px-2 py-0.5 rounded-full">4</span>
                    </button>
                </nav>
            </div>
        </div>

        <!-- Conteúdo da Tab Membros (Visível por padrão) -->
        <div id="conteudo-membros" class="space-y-6">
            <!-- Cabeçalho da Seção -->
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 mb-6">
                <div>
                    <h2 class="text-xl font-bold text-gray-900">Membros do Grupo</h2>
                    <p class="text-gray-600 mt-1">Gerencie os membros da célula</p>
                </div>
                <button id="adicionarMembroBtn"
                    class="px-6 py-3 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-medium rounded-xl transition-all duration-300 shadow-sm hover:shadow-md flex items-center justify-center group">
                    <i class="fas fa-user-plus mr-2 group-hover:scale-110 transition-transform"></i> Adicionar Membro
                </button>
            </div>

            <!-- Filtros -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <div class="flex flex-col lg:flex-row lg:items-center gap-4">
                    <div class="flex-1">
                        <div class="relative">
                            <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                            <input type="text" placeholder="Buscar membro por nome..."
                                class="w-full pl-12 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all">
                        </div>
                    </div>
                    <div class="flex flex-wrap gap-3">
                        <select
                            class="px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all">
                            <option>Todos os Status</option>
                            <option>Ativo</option>
                            <option>Inativo</option>
                            <option>Visitante</option>
                        </select>
                        <button
                            class="px-4 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-xl transition-colors flex items-center">
                            <i class="fas fa-filter mr-2"></i> Filtros
                        </button>
                    </div>
                </div>
            </div>

            <!-- Lista de Membros -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Membro</th>
                                <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Função</th>
                                <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Contato</th>
                                <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Frequência</th>
                                <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Status</th>
                                <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Ações</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            <!-- Líder Principal -->
                            <tr class="hover:bg-red-50/30 transition-colors duration-200">
                                <td class="py-4 px-6">
                                    <div class="flex items-center">
                                        <div class="relative">
                                            <div
                                                class="w-10 h-10 rounded-full bg-gradient-to-br from-red-600 to-red-800 flex items-center justify-center text-white font-semibold mr-3 shadow-md">
                                                JM
                                                <div
                                                    class="absolute -top-1 -right-1 w-5 h-5 rounded-full bg-yellow-500 border-2 border-white flex items-center justify-center">
                                                    <i class="fas fa-crown text-white text-xs"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <p class="font-medium text-gray-900">João Miguel</p>
                                            <p class="text-sm text-gray-500">Líder Principal</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800 border border-yellow-200">
                                        <i class="fas fa-crown mr-1 text-xs"></i> Líder
                                    </span>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="space-y-1">
                                        <div class="flex items-center text-gray-600">
                                            <i class="fas fa-phone text-xs mr-2 w-4"></i>
                                            <span class="text-sm">(11) 99999-8888</span>
                                        </div>
                                        <div class="flex items-center text-gray-600">
                                            <i class="fas fa-envelope text-xs mr-2 w-4"></i>
                                            <span class="text-sm truncate">joao@email.com</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="flex items-center">
                                        <div class="w-24 bg-gray-200 rounded-full h-2 mr-3">
                                            <div class="bg-green-600 h-2 rounded-full" style="width: 95%"></div>
                                        </div>
                                        <span class="text-sm font-medium text-gray-700">95%</span>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800 border border-green-200">
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
                                    </div>
                                </td>
                            </tr>

                            <!-- Líder Auxiliar -->
                            <tr class="hover:bg-purple-50/30 transition-colors duration-200">
                                <td class="py-4 px-6">
                                    <div class="flex items-center">
                                        <div
                                            class="w-10 h-10 rounded-full bg-gradient-to-br from-purple-600 to-purple-800 flex items-center justify-center text-white font-semibold mr-3 shadow-md">
                                            AC
                                        </div>
                                        <div>
                                            <p class="font-medium text-gray-900">Ana Costa</p>
                                            <p class="text-sm text-gray-500">Líder Auxiliar</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-purple-100 text-purple-800 border border-purple-200">
                                        <i class="fas fa-user-shield mr-1 text-xs"></i> Auxiliar
                                    </span>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="space-y-1">
                                        <div class="flex items-center text-gray-600">
                                            <i class="fas fa-phone text-xs mr-2 w-4"></i>
                                            <span class="text-sm">(11) 98888-7777</span>
                                        </div>
                                        <div class="flex items-center text-gray-600">
                                            <i class="fas fa-envelope text-xs mr-2 w-4"></i>
                                            <span class="text-sm truncate">ana@email.com</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="flex items-center">
                                        <div class="w-24 bg-gray-200 rounded-full h-2 mr-3">
                                            <div class="bg-green-600 h-2 rounded-full" style="width: 88%"></div>
                                        </div>
                                        <span class="text-sm font-medium text-gray-700">88%</span>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800 border border-green-200">
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
                                    </div>
                                </td>
                            </tr>

                            <!-- Membros Regulares -->
                            <tr class="hover:bg-gray-50 transition-colors duration-200">
                                <td class="py-4 px-6">
                                    <div class="flex items-center">
                                        <div
                                            class="w-10 h-10 rounded-full bg-gradient-to-br from-blue-600 to-blue-800 flex items-center justify-center text-white font-semibold mr-3 shadow-md">
                                            PS
                                        </div>
                                        <div>
                                            <p class="font-medium text-gray-900">Pedro Silva</p>
                                            <p class="text-sm text-gray-500">Membro</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800 border border-blue-200">
                                        <i class="fas fa-user mr-1 text-xs"></i> Membro
                                    </span>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="space-y-1">
                                        <div class="flex items-center text-gray-600">
                                            <i class="fas fa-phone text-xs mr-2 w-4"></i>
                                            <span class="text-sm">(11) 97777-6666</span>
                                        </div>
                                        <div class="flex items-center text-gray-600">
                                            <i class="fas fa-envelope text-xs mr-2 w-4"></i>
                                            <span class="text-sm truncate">pedro@email.com</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="flex items-center">
                                        <div class="w-24 bg-gray-200 rounded-full h-2 mr-3">
                                            <div class="bg-green-600 h-2 rounded-full" style="width: 92%"></div>
                                        </div>
                                        <span class="text-sm font-medium text-gray-700">92%</span>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800 border border-green-200">
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
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Conteúdo da Tab Líderes (Escondido por padrão) -->
        <div id="conteudo-lideres" class="hidden space-y-6">
            <!-- Cabeçalho da Seção -->
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 mb-6">
                <div>
                    <h2 class="text-xl font-bold text-gray-900">Líderes do Grupo</h2>
                    <p class="text-gray-600 mt-1">Gerencie os líderes da célula</p>
                </div>
                <button id="adicionarLiderBtn"
                    class="px-6 py-3 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-medium rounded-xl transition-all duration-300 shadow-sm hover:shadow-md flex items-center justify-center group">
                    <i class="fas fa-user-plus mr-2 group-hover:scale-110 transition-transform"></i> Adicionar Líder
                </button>
            </div>

            <!-- Grid de Líderes -->
            <div class="grid grid-cols-1 sm:grid-cols-3 md:grid-cols-4 gap-6">
                <!-- Líder Principal -->
                <div
                    class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition-shadow duration-300">
                    <div class="flex items-start justify-between mb-6">
                        <div class="flex items-center">
                            <div class="relative">
                                <div
                                    class="w-16 h-16 rounded-full bg-gradient-to-br from-red-600 to-red-800 flex items-center justify-center text-white text-xl font-bold mr-4 shadow-lg">
                                    JM
                                    <div
                                        class="absolute -top-1 -right-0.5 w-8 h-8 rounded-full bg-yellow-500 border-2 border-white flex items-center justify-center shadow-md">
                                        <i class="fas fa-crown text-white text-sm"></i>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-900">João Miguel</h3>
                                <p class="text-gray-600">Líder Principal</p>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div>
                            <p class="text-sm text-gray-500 mb-2">Contato</p>
                            <div class="flex items-center text-gray-700 mb-2">
                                <i class="fas fa-phone text-gray-400 mr-3 w-5"></i>
                                <span>(11) 99999-8888</span>
                            </div>
                            <div class="flex items-center text-gray-700">
                                <i class="fas fa-envelope text-gray-400 mr-3 w-5"></i>
                                <span class="truncate">joao.miguel@email.com</span>
                            </div>
                        </div>

                        <div>
                            <p class="text-sm text-gray-500 mb-2">Desde</p>
                            <p class="text-gray-700">15/01/2023 (1 ano, 2 meses)</p>
                        </div>

                        <div>
                            <p class="text-sm text-gray-500 mb-2">Responsabilidades</p>
                            <div class="flex flex-wrap gap-2">
                                <span
                                    class="px-3 py-1 bg-red-50 text-red-700 rounded-full text-sm border border-red-100">Coordenação</span>
                                <span
                                    class="px-3 py-1 bg-blue-50 text-blue-700 rounded-full text-sm border border-blue-100">Ensino</span>
                                <span
                                    class="px-3 py-1 bg-green-50 text-green-700 rounded-full text-sm border border-green-100">Discipulado</span>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 pt-6 border-t border-gray-100 flex space-x-3">
                        <button
                            class="flex-1 px-4 py-2.5 bg-red-50 hover:bg-red-100 text-red-700 font-medium rounded-xl transition-colors flex items-center justify-center">
                            <i class="fas fa-comment-alt mr-2"></i> Mensagem
                        </button>
                        <button
                            class="flex-1 px-4 py-2.5 bg-blue-50 hover:bg-blue-100 text-blue-700 font-medium rounded-xl transition-colors flex items-center justify-center">
                            <i class="fas fa-edit mr-2"></i> Editar
                        </button>
                    </div>
                </div>

                <!-- Líder Auxiliar -->
                <div
                    class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition-shadow duration-300">
                    <div class="flex items-start justify-between mb-6">
                        <div class="flex items-center">
                            <div
                                class="w-16 h-16 rounded-full bg-gradient-to-br from-purple-600 to-purple-800 flex items-center justify-center text-white text-xl font-bold mr-4 shadow-lg">
                                AC
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-900">Ana Costa</h3>
                                <p class="text-gray-600">Líder Auxiliar</p>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div>
                            <p class="text-sm text-gray-500 mb-2">Contato</p>
                            <div class="flex items-center text-gray-700 mb-2">
                                <i class="fas fa-phone text-gray-400 mr-3 w-5"></i>
                                <span>(11) 98888-7777</span>
                            </div>
                            <div class="flex items-center text-gray-700">
                                <i class="fas fa-envelope text-gray-400 mr-3 w-5"></i>
                                <span class="truncate">ana.costa@email.com</span>
                            </div>
                        </div>

                        <div>
                            <p class="text-sm text-gray-500 mb-2">Desde</p>
                            <p class="text-gray-700">20/02/2023 (1 ano, 1 mês)</p>
                        </div>

                        <div>
                            <p class="text-sm text-gray-500 mb-2">Responsabilidades</p>
                            <div class="flex flex-wrap gap-2">
                                <span
                                    class="px-3 py-1 bg-purple-50 text-purple-700 rounded-full text-sm border border-purple-100">Acolhimento</span>
                                <span
                                    class="px-3 py-1 bg-blue-50 text-blue-700 rounded-full text-sm border border-blue-100">Logística</span>
                                <span
                                    class="px-3 py-1 bg-green-50 text-green-700 rounded-full text-sm border border-green-100">Comunicação</span>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 pt-6 border-t border-gray-100 flex space-x-3">
                        <button
                            class="flex-1 px-4 py-2.5 bg-red-50 hover:bg-red-100 text-red-700 font-medium rounded-xl transition-colors flex items-center justify-center">
                            <i class="fas fa-comment-alt mr-2"></i> Mensagem
                        </button>
                        <button
                            class="flex-1 px-4 py-2.5 bg-blue-50 hover:bg-blue-100 text-blue-700 font-medium rounded-xl transition-colors flex items-center justify-center">
                            <i class="fas fa-edit mr-2"></i> Editar
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Conteúdo da Tab Eventos (Escondido por padrão) -->
        <div id="conteudo-eventos" class="hidden space-y-6">
            <!-- Cabeçalho da Seção -->
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 mb-6">
                <div>
                    <h2 class="text-xl font-bold text-gray-900">Eventos do Grupo</h2>
                    <p class="text-gray-600 mt-1">Gerencie os eventos da célula</p>
                </div>
                <button id="adicionarEventoBtn"
                    class="px-6 py-3 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-medium rounded-xl transition-all duration-300 shadow-sm hover:shadow-md flex items-center justify-center group">
                    <i class="fas fa-calendar-plus mr-2 group-hover:scale-110 transition-transform"></i> Novo Evento
                </button>
            </div>

            <!-- Filtros de Eventos -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <div class="flex flex-col lg:flex-row lg:items-center gap-4">
                    <div class="flex-1">
                        <div class="relative">
                            <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                            <input type="text" placeholder="Buscar evento..."
                                class="w-full pl-12 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all">
                        </div>
                    </div>
                    <div class="flex flex-wrap gap-3">
                        <select
                            class="px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all">
                            <option>Todos os Tipos</option>
                            <option>Reunião Semanal</option>
                            <option>Evento Especial</option>
                            <option>Encontro Social</option>
                        </select>
                        <select
                            class="px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all">
                            <option>Todos os Status</option>
                            <option>Agendado</option>
                            <option>Realizado</option>
                            <option>Cancelado</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Lista de Eventos -->
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
                <!-- Evento 1 -->
                <div
                    class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition-all duration-300">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex items-center">
                            <div class="w-12 h-12 rounded-xl bg-red-50 flex items-center justify-center mr-4">
                                <i class="fas fa-church text-red-600 text-lg"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-900">Reunião Semanal</h3>
                                <p class="text-sm text-gray-600">Estudo bíblico e comunhão</p>
                            </div>
                        </div>
                        <span
                            class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800 border border-green-200">
                            Agendado
                        </span>
                    </div>

                    <div class="space-y-3">
                        <div class="flex items-center text-gray-700">
                            <i class="fas fa-calendar-day text-red-500 mr-3 w-5"></i>
                            <span>Segunda-feira, 25/03/2024</span>
                        </div>
                        <div class="flex items-center text-gray-700">
                            <i class="fas fa-clock text-blue-500 mr-3 w-5"></i>
                            <span>19:00 - 21:00 (2 horas)</span>
                        </div>
                        <div class="flex items-center text-gray-700">
                            <i class="fas fa-users text-green-500 mr-3 w-5"></i>
                            <span>12 confirmados / 15 convidados</span>
                        </div>
                    </div>

                    <div class="mt-6 pt-6 border-t border-gray-100 flex space-x-3">
                        <a href="{{ route('admin.grupo.evento', [12, 12]) }}"
                            class="flex-1 px-4 py-2.5 bg-blue-50 hover:bg-blue-100 text-blue-700 font-medium rounded-xl transition-colors flex items-center justify-center">
                            <i class="fas fa-eye mr-2"></i> Detalhes
                        </a>
                        <button
                            class="flex-1 px-4 py-2.5 bg-green-50 hover:bg-green-100 text-green-700 font-medium rounded-xl transition-colors flex items-center justify-center">
                            <i class="fas fa-edit mr-2"></i> Editar
                        </button>
                    </div>
                </div>

                <!-- Evento 2 -->
                <div
                    class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition-all duration-300">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex items-center">
                            <div class="w-12 h-12 rounded-xl bg-blue-50 flex items-center justify-center mr-4">
                                <i class="fas fa-utensils text-blue-600 text-lg"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-900">Jantar Especial</h3>
                                <p class="text-sm text-gray-600">Confraternização do grupo</p>
                            </div>
                        </div>
                        <span
                            class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800 border border-green-200">
                            Agendado
                        </span>
                    </div>

                    <div class="space-y-3">
                        <div class="flex items-center text-gray-700">
                            <i class="fas fa-calendar-day text-red-500 mr-3 w-5"></i>
                            <span>Sábado, 30/03/2024</span>
                        </div>
                        <div class="flex items-center text-gray-700">
                            <i class="fas fa-clock text-blue-500 mr-3 w-5"></i>
                            <span>20:00 - 23:00 (3 horas)</span>
                        </div>
                        <div class="flex items-center text-gray-700">
                            <i class="fas fa-users text-green-500 mr-3 w-5"></i>
                            <span>8 confirmados / 15 convidados</span>
                        </div>
                    </div>

                    <div class="mt-6 pt-6 border-t border-gray-100 flex space-x-3">
                        <button
                            class="flex-1 px-4 py-2.5 bg-blue-50 hover:bg-blue-100 text-blue-700 font-medium rounded-xl transition-colors flex items-center justify-center">
                            <i class="fas fa-eye mr-2"></i> Detalhes
                        </button>
                        <button
                            class="flex-1 px-4 py-2.5 bg-green-50 hover:bg-green-100 text-green-700 font-medium rounded-xl transition-colors flex items-center justify-center">
                            <i class="fas fa-edit mr-2"></i> Editar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Adicionar Membro -->
    <div id="modalAdicionarMembro"
        class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm z-50 hidden items-center justify-center p-4">
        <div
            class="bg-white rounded-2xl w-full max-w-lg max-h-[90vh] overflow-y-auto transform transition-all duration-300 scale-95 opacity-0">
            <div class="sticky top-0 bg-white p-6 border-b border-gray-100 z-10">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-xl font-bold text-gray-900">Adicionar Membro</h2>
                        <p class="text-gray-600 mt-1">Adicione um novo membro à célula</p>
                    </div>
                    <button id="fecharModalMembro"
                        class="w-10 h-10 rounded-lg hover:bg-gray-100 flex items-center justify-center transition-colors">
                        <i class="fas fa-times text-gray-500"></i>
                    </button>
                </div>
            </div>

            <form class="p-6">
                <div class="space-y-5">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nome Completo *</label>
                        <input type="text"
                            class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all"
                            placeholder="Ex: João da Silva">
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Telefone</label>
                            <input type="tel"
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all"
                                placeholder="(11) 99999-8888">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">E-mail</label>
                            <input type="email"
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all"
                                placeholder="exemplo@email.com">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Função *</label>
                        <select
                            class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all">
                            <option value="">Selecione a função</option>
                            <option value="membro">Membro</option>
                            <option value="auxiliar">Líder Auxiliar</option>
                            <option value="lider">Líder Principal</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                        <div class="grid grid-cols-3 gap-3">
                            <label class="flex items-center">
                                <input type="radio" name="status" value="ativo" class="mr-2" checked>
                                <span class="text-gray-700">Ativo</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="status" value="inativo" class="mr-2">
                                <span class="text-gray-700">Inativo</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="status" value="visitante" class="mr-2">
                                <span class="text-gray-700">Visitante</span>
                            </label>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Observações</label>
                        <textarea rows="3"
                            class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all"
                            placeholder="Observações sobre o membro..."></textarea>
                    </div>
                </div>

                <div class="mt-8 pt-6 border-t border-gray-100 flex justify-end space-x-4">
                    <button type="button" id="cancelarModalMembro"
                        class="px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-xl transition-colors">
                        Cancelar
                    </button>
                    <button type="submit"
                        class="px-6 py-3 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-medium rounded-xl transition-all duration-300 flex items-center">
                        <i class="fas fa-user-plus mr-2"></i> Adicionar Membro
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Adicionar Líder -->
    <div id="modalAdicionarLider"
        class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm z-50 hidden items-center justify-center p-4">
        <div
            class="bg-white rounded-2xl w-full max-w-lg max-h-[90vh] overflow-y-auto transform transition-all duration-300 scale-95 opacity-0">
            <div class="sticky top-0 bg-white p-6 border-b border-gray-100 z-10">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-xl font-bold text-gray-900">Adicionar Líder</h2>
                        <p class="text-gray-600 mt-1">Adicione um novo líder à célula</p>
                    </div>
                    <button id="fecharModalLider"
                        class="w-10 h-10 rounded-lg hover:bg-gray-100 flex items-center justify-center transition-colors">
                        <i class="fas fa-times text-gray-500"></i>
                    </button>
                </div>
            </div>

            <form class="p-6">
                <div class="space-y-5">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Selecione o Membro *</label>
                        <select
                            class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all">
                            <option value="">Selecione um membro</option>
                            <option value="1">Pedro Silva</option>
                            <option value="2">Maria Alice</option>
                            <option value="3">Carlos Santos</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Cargo *</label>
                        <div class="grid grid-cols-2 gap-3">
                            <label
                                class="flex items-center p-4 border border-gray-200 rounded-xl hover:border-red-300 cursor-pointer transition-colors">
                                <input type="radio" name="cargo" value="principal" class="mr-3">
                                <div>
                                    <div class="font-medium text-gray-900">Líder Principal</div>
                                    <div class="text-sm text-gray-500">Responsável pela célula</div>
                                </div>
                            </label>
                            <label
                                class="flex items-center p-4 border border-gray-200 rounded-xl hover:border-red-300 cursor-pointer transition-colors">
                                <input type="radio" name="cargo" value="auxiliar" class="mr-3">
                                <div>
                                    <div class="font-medium text-gray-900">Líder Auxiliar</div>
                                    <div class="text-sm text-gray-500">Auxilia o líder principal</div>
                                </div>
                            </label>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Responsabilidades</label>
                        <div class="space-y-2">
                            <label class="flex items-center">
                                <input type="checkbox"
                                    class="rounded border-gray-300 mr-3 text-red-600 focus:ring-red-500">
                                <span class="text-gray-700">Coordenação das reuniões</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox"
                                    class="rounded border-gray-300 mr-3 text-red-600 focus:ring-red-500">
                                <span class="text-gray-700">Ensino bíblico</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox"
                                    class="rounded border-gray-300 mr-3 text-red-600 focus:ring-red-500">
                                <span class="text-gray-700">Acompanhamento de membros</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox"
                                    class="rounded border-gray-300 mr-3 text-red-600 focus:ring-red-500">
                                <span class="text-gray-700">Organização de eventos</span>
                            </label>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Data de Início *</label>
                        <input type="date"
                            class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all">
                    </div>
                </div>

                <div class="mt-8 pt-6 border-t border-gray-100 flex justify-end space-x-4">
                    <button type="button" id="cancelarModalLider"
                        class="px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-xl transition-colors">
                        Cancelar
                    </button>
                    <button type="submit"
                        class="px-6 py-3 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-medium rounded-xl transition-all duration-300 flex items-center">
                        <i class="fas fa-crown mr-2"></i> Adicionar Líder
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Adicionar Evento -->
    <div id="modalAdicionarEvento"
        class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm z-50 hidden items-center justify-center p-4">
        <div
            class="bg-white rounded-2xl w-full max-w-2xl max-h-[90vh] overflow-y-auto transform transition-all duration-300 scale-95 opacity-0">
            <div class="sticky top-0 bg-white p-6 border-b border-gray-100 z-10">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-xl font-bold text-gray-900">Novo Evento</h2>
                        <p class="text-gray-600 mt-1">Crie um novo evento para a célula</p>
                    </div>
                    <button id="fecharModalEvento"
                        class="w-10 h-10 rounded-lg hover:bg-gray-100 flex items-center justify-center transition-colors">
                        <i class="fas fa-times text-gray-500"></i>
                    </button>
                </div>
            </div>

            <form class="p-6">
                <div class="space-y-5">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Título do Evento *</label>
                        <input type="text"
                            class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all"
                            placeholder="Ex: Reunião Semanal">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Tipo de Evento</label>
                            <select
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all">
                                <option value="reuniao">Reunião Semanal</option>
                                <option value="especial">Evento Especial</option>
                                <option value="social">Encontro Social</option>
                                <option value="oracao">Encontro de Oração</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Local</label>
                            <input type="text"
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all"
                                placeholder="Local do evento">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Data *</label>
                            <input type="date"
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Horário *</label>
                            <div class="grid grid-cols-2 gap-3">
                                <input type="time"
                                    class="px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all"
                                    placeholder="Início">
                                <input type="time"
                                    class="px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all"
                                    placeholder="Fim">
                            </div>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Descrição</label>
                        <textarea rows="3"
                            class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all"
                            placeholder="Descrição do evento..."></textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Convidar Membros</label>
                        <div class="bg-gray-50 border border-gray-200 rounded-xl p-4 max-h-48 overflow-y-auto">
                            <div class="space-y-2">
                                <label class="flex items-center">
                                    <input type="checkbox"
                                        class="rounded border-gray-300 mr-3 text-red-600 focus:ring-red-500" checked>
                                    <span class="text-gray-700">Todos os membros (15)</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox"
                                        class="rounded border-gray-300 mr-3 text-red-600 focus:ring-red-500">
                                    <span class="text-gray-700">Apenas líderes (2)</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox"
                                        class="rounded border-gray-300 mr-3 text-red-600 focus:ring-red-500">
                                    <span class="text-gray-700">Selecionar individualmente</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-8 pt-6 border-t border-gray-100 flex justify-end space-x-4">
                    <button type="button" id="cancelarModalEvento"
                        class="px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-xl transition-colors">
                        Cancelar
                    </button>
                    <button type="submit"
                        class="px-6 py-3 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-medium rounded-xl transition-all duration-300 flex items-center">
                        <i class="fas fa-calendar-plus mr-2"></i> Criar Evento
                    </button>
                </div>
            </form>
        </div>
    </div>

    @push('styles')
        <style>
            .tab-button {
                white-space: nowrap;
                padding-bottom: 12px;
                position: relative;
            }

            .tab-button::after {
                content: '';
                position: absolute;
                bottom: -2px;
                left: 0;
                right: 0;
                height: 2px;
                background-color: #dc2626;
                transform: scaleX(0);
                transition: transform 0.3s ease;
            }

            .tab-button.border-red-700::after {
                transform: scaleX(1);
            }

            /* Animação de entrada dos modais */
            @keyframes modalEntrada {
                from {
                    opacity: 0;
                    transform: scale(0.95);
                }

                to {
                    opacity: 1;
                    transform: scale(1);
                }
            }

            .modal-aberto {
                animation: modalEntrada 0.3s ease forwards;
            }
        </style>
    @endpush

    @push('scripts')
        <script>
            // Controle das Tabs
            document.addEventListener('DOMContentLoaded', function() {
                const tabs = {
                    'membros': {
                        button: 'tab-membros',
                        conteudo: 'conteudo-membros'
                    },
                    'lideres': {
                        button: 'tab-lideres',
                        conteudo: 'conteudo-lideres'
                    },
                    'eventos': {
                        button: 'tab-eventos',
                        conteudo: 'conteudo-eventos'
                    }
                };

                function alternarTab(tabAtiva) {
                    Object.values(tabs).forEach(tab => {
                        const button = document.getElementById(tab.button);
                        const conteudo = document.getElementById(tab.conteudo);

                        if (button && conteudo) {
                            button.classList.remove('border-red-700', 'text-red-700');
                            button.classList.add('border-transparent', 'text-gray-500');
                            conteudo.classList.add('hidden');
                        }
                    });

                    const tab = tabs[tabAtiva];
                    const buttonAtivo = document.getElementById(tab.button);
                    const conteudoAtivo = document.getElementById(tab.conteudo);

                    if (buttonAtivo && conteudoAtivo) {
                        buttonAtivo.classList.remove('border-transparent', 'text-gray-500');
                        buttonAtivo.classList.add('border-red-700', 'text-red-700');
                        conteudoAtivo.classList.remove('hidden');
                    }
                }

                Object.keys(tabs).forEach(tabName => {
                    const button = document.getElementById(tabs[tabName].button);
                    if (button) {
                        button.addEventListener('click', function() {
                            alternarTab(tabName);
                        });
                    }
                });

                alternarTab('membros');

                // Controle dos Modais
                const modais = {
                    'membro': {
                        abrir: 'adicionarMembroBtn',
                        modal: 'modalAdicionarMembro',
                        fechar: 'fecharModalMembro',
                        cancelar: 'cancelarModalMembro'
                    },
                    'lider': {
                        abrir: 'adicionarLiderBtn',
                        modal: 'modalAdicionarLider',
                        fechar: 'fecharModalLider',
                        cancelar: 'cancelarModalLider'
                    },
                    'evento': {
                        abrir: 'adicionarEventoBtn',
                        modal: 'modalAdicionarEvento',
                        fechar: 'fecharModalEvento',
                        cancelar: 'cancelarModalEvento'
                    }
                };

                Object.values(modais).forEach(config => {
                    const abrirBtn = document.getElementById(config.abrir);
                    const modal = document.getElementById(config.modal);
                    const fecharBtn = document.getElementById(config.fechar);
                    const cancelarBtn = document.getElementById(config.cancelar);
                    const modalContent = modal?.querySelector('.transform');

                    function abrirModal() {
                        modal.classList.remove('hidden');
                        modal.classList.add('flex');
                        setTimeout(() => {
                            modalContent.classList.remove('scale-95', 'opacity-0');
                            modalContent.classList.add('modal-aberto');
                        }, 10);
                        document.body.style.overflow = 'hidden';
                    }

                    function fecharModal() {
                        modalContent.classList.remove('modal-aberto');
                        modalContent.classList.add('scale-95', 'opacity-0');
                        setTimeout(() => {
                            modal.classList.remove('flex');
                            modal.classList.add('hidden');
                            document.body.style.overflow = '';
                        }, 300);
                    }

                    if (abrirBtn) abrirBtn.addEventListener('click', abrirModal);
                    if (fecharBtn) fecharBtn.addEventListener('click', fecharModal);
                    if (cancelarBtn) cancelarBtn.addEventListener('click', fecharModal);

                    if (modal) {
                        modal.addEventListener('click', function(e) {
                            if (e.target === modal) {
                                fecharModal();
                            }
                        });

                        const form = modal.querySelector('form');
                        if (form) {
                            form.addEventListener('submit', function(e) {
                                e.preventDefault();
                                // Aqui você adicionaria a lógica para salvar
                                alert('Salvo com sucesso!');
                                fecharModal();
                            });
                        }
                    }
                });
            });
        </script>
    @endpush
@endsection
