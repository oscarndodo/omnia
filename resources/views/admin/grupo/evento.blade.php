<!-- detalhes-evento.blade.php -->
@extends('admin.index')

@section('main')
    <div class="p-6">
        <!-- Breadcrumb -->
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
                    <li>
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 text-xs"></i>
                            <a href="#"
                                class="ml-2 text-sm font-medium text-gray-700 hover:text-red-700 transition-colors">Grupo
                                Avivamento</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 text-xs"></i>
                            <span class="ml-2 text-sm font-medium text-red-700">Detalhes do Evento</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <!-- Cabeçalho do Evento -->
            <div class="bg-gradient-to-r from-blue-50 to-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between">
                    <div class="flex-1">
                        <div class="flex items-start">
                            <div
                                class="w-16 h-16 rounded-2xl bg-gradient-to-br from-blue-600 to-blue-800 flex items-center justify-center mr-4 shadow-lg">
                                <i class="fas fa-church text-white text-2xl"></i>
                            </div>
                            <div class="flex-1">
                                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
                                    <div>
                                        <h1 class="text-2xl lg:text-3xl font-bold text-gray-900">Reunião Semanal da Célula
                                        </h1>
                                        <div class="flex flex-wrap items-center gap-2 mt-2">
                                            <span
                                                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800 border border-green-200">
                                                <i class="fas fa-check-circle mr-1 text-xs"></i> Realizado
                                            </span>
                                            <span
                                                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800 border border-blue-200">
                                                <i class="fas fa-users mr-1"></i> 12 presentes
                                            </span>
                                            <span
                                                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-purple-100 text-purple-800 border border-purple-200">
                                                <i class="fas fa-coins mr-1"></i> R$ 280,50 coletado
                                            </span>
                                        </div>
                                    </div>
                                    <div class="mt-4 lg:mt-0">
                                        <span
                                            class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800 border border-red-200">
                                            <i class="fas fa-calendar-day mr-1"></i> 25/03/2024
                                        </span>
                                    </div>
                                </div>

                                <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div class="flex items-center text-gray-600">
                                        <i class="fas fa-clock text-blue-600 mr-3 w-5"></i>
                                        <span>19:00 - 21:00 (2 horas)</span>
                                    </div>
                                    <div class="flex items-center text-gray-600">
                                        <i class="fas fa-map-marker-alt text-red-600 mr-3 w-5"></i>
                                        <span>Casa do João Miguel - Rua das Flores, 123</span>
                                    </div>
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
                    <!-- Tab Presenças -->
                    <button id="tab-presencas"
                        class="tab-button py-4 px-1 border-b-2 font-medium text-sm transition-all duration-300 border-red-700 text-red-700 whitespace-nowrap flex items-center group">
                        <div
                            class="w-8 h-8 rounded-lg bg-red-100 flex items-center justify-center mr-3 group-hover:bg-red-200 transition-colors">
                            <i class="fas fa-user-check text-red-600"></i>
                        </div>
                        <span>Presenças</span>
                        <span class="ml-2 bg-red-100 text-red-800 text-xs px-2 py-0.5 rounded-full">12/15</span>
                    </button>

                    <!-- Tab Ofertas -->
                    <button id="tab-ofertas"
                        class="tab-button py-4 px-1 border-b-2 font-medium text-sm transition-all duration-300 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap flex items-center group">
                        <div
                            class="w-8 h-8 rounded-lg bg-gray-100 flex items-center justify-center mr-3 group-hover:bg-gray-200 transition-colors">
                            <i class="fas fa-hand-holding-usd text-gray-600"></i>
                        </div>
                        <span>Ofertas</span>
                        <span class="ml-2 bg-gray-100 text-gray-800 text-xs px-2 py-0.5 rounded-full">R$ 280,50</span>
                    </button>


                </nav>
            </div>
        </div>

        <!-- Conteúdo da Tab Presenças -->
        <div id="conteudo-presencas" class="space-y-6">
            <!-- Estatísticas Rápidas -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm font-medium">Total Presentes</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">12</p>
                        </div>
                        <div class="w-12 h-12 rounded-xl bg-green-50 flex items-center justify-center">
                            <i class="fas fa-user-check text-green-600 text-xl"></i>
                        </div>
                    </div>
                    <div class="mt-4">
                        <span class="text-green-600 text-sm font-medium flex items-center">
                            <i class="fas fa-arrow-up mr-1"></i> 80% do grupo
                        </span>
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm font-medium">Ausentes</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">3</p>
                        </div>
                        <div class="w-12 h-12 rounded-xl bg-red-50 flex items-center justify-center">
                            <i class="fas fa-user-times text-red-600 text-xl"></i>
                        </div>
                    </div>
                    <div class="mt-4">
                        <span class="text-red-600 text-sm font-medium flex items-center">
                            <i class="fas fa-exclamation-circle mr-1"></i> 20% do grupo
                        </span>
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm font-medium">Visitantes</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">2</p>
                        </div>
                        <div class="w-12 h-12 rounded-xl bg-blue-50 flex items-center justify-center">
                            <i class="fas fa-user-plus text-blue-600 text-xl"></i>
                        </div>
                    </div>
                    <div class="mt-4">
                        <span class="text-blue-600 text-sm font-medium">Novas pessoas</span>
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm font-medium">Frequência</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">80%</p>
                        </div>
                        <div class="w-12 h-12 rounded-xl bg-yellow-50 flex items-center justify-center">
                            <i class="fas fa-chart-line text-yellow-600 text-xl"></i>
                        </div>
                    </div>
                    <div class="mt-4">
                        <span class="text-green-600 text-sm font-medium flex items-center">
                            <i class="fas fa-arrow-up mr-1"></i> +5% vs último
                        </span>
                    </div>
                </div>
            </div>

            <!-- Controle de Presenças -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="p-6 border-b border-gray-100">
                    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">Controle de Presenças</h3>
                            <p class="text-gray-600 mt-1">Marque os membros presentes no evento</p>
                        </div>
                        <div class="flex items-center space-x-3 mt-4 lg:mt-0">
                            <button
                                class="px-4 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-xl transition-colors flex items-center">
                                <i class="fas fa-download mr-2"></i> Exportar
                            </button>
                            <button id="adicionarVisitanteBtn"
                                class="px-4 py-2.5 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-medium rounded-xl transition-all duration-300 flex items-center">
                                <i class="fas fa-user-plus mr-2"></i> Adicionar Visitante
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Lista de Presenças -->
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Membro</th>
                                <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Função</th>
                                <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Status</th>
                                <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Presença</th>
                                <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Hora de Chegada</th>
                                <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Ações</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            <!-- Membro 1 - Presente -->
                            <tr class="hover:bg-green-50/30 transition-colors duration-200">
                                <td class="py-4 px-6">
                                    <div class="flex items-center">
                                        <div
                                            class="w-10 h-10 rounded-full bg-gradient-to-br from-red-600 to-red-800 flex items-center justify-center text-white font-semibold mr-3 shadow-md">
                                            JM
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
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800 border border-green-200">
                                        <i class="fas fa-circle mr-1 text-xs"></i> Ativo
                                    </span>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="flex items-center">
                                        <div class="relative">
                                            <input type="checkbox" id="presenca-1" class="sr-only" checked>
                                            <label for="presenca-1" class="flex items-center cursor-pointer">
                                                <div
                                                    class="w-10 h-6 flex items-center bg-green-500 rounded-full p-1 transition-all duration-300">
                                                    <div
                                                        class="bg-white w-4 h-4 rounded-full shadow-md transform translate-x-4">
                                                    </div>
                                                </div>
                                                <span class="ml-3 text-sm font-medium text-green-700">Presente</span>
                                            </label>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <span class="text-gray-700">19:05</span>
                                </td>
                                <td class="py-4 px-6">
                                    <button
                                        class="px-3 py-1.5 bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm rounded-lg transition-colors flex items-center">
                                        <i class="fas fa-clock mr-1"></i> Editar Hora
                                    </button>
                                </td>
                            </tr>

                            <!-- Membro 2 - Presente -->
                            <tr class="hover:bg-green-50/30 transition-colors duration-200">
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
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800 border border-green-200">
                                        <i class="fas fa-circle mr-1 text-xs"></i> Ativo
                                    </span>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="flex items-center">
                                        <div class="relative">
                                            <input type="checkbox" id="presenca-2" class="sr-only" checked>
                                            <label for="presenca-2" class="flex items-center cursor-pointer">
                                                <div
                                                    class="w-10 h-6 flex items-center bg-green-500 rounded-full p-1 transition-all duration-300">
                                                    <div
                                                        class="bg-white w-4 h-4 rounded-full shadow-md transform translate-x-4">
                                                    </div>
                                                </div>
                                                <span class="ml-3 text-sm font-medium text-green-700">Presente</span>
                                            </label>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <span class="text-gray-700">19:15</span>
                                </td>
                                <td class="py-4 px-6">
                                    <button
                                        class="px-3 py-1.5 bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm rounded-lg transition-colors flex items-center">
                                        <i class="fas fa-clock mr-1"></i> Editar Hora
                                    </button>
                                </td>
                            </tr>

                            <!-- Membro 3 - Ausente -->
                            <tr class="hover:bg-red-50/30 transition-colors duration-200">
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
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800 border border-yellow-200">
                                        <i class="fas fa-circle mr-1 text-xs"></i> Irregular
                                    </span>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="flex items-center">
                                        <div class="relative">
                                            <input type="checkbox" id="presenca-3" class="sr-only">
                                            <label for="presenca-3" class="flex items-center cursor-pointer">
                                                <div
                                                    class="w-10 h-6 flex items-center bg-gray-300 rounded-full p-1 transition-all duration-300">
                                                    <div class="bg-white w-4 h-4 rounded-full shadow-md"></div>
                                                </div>
                                                <span class="ml-3 text-sm font-medium text-gray-700">Ausente</span>
                                            </label>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <span class="text-gray-400">-</span>
                                </td>
                                <td class="py-4 px-6">
                                    <button
                                        class="px-3 py-1.5 bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm rounded-lg transition-colors flex items-center">
                                        <i class="fas fa-edit mr-1"></i> Justificar
                                    </button>
                                </td>
                            </tr>

                            <!-- Visitante 1 -->
                            <tr class="hover:bg-blue-50/30 transition-colors duration-200">
                                <td class="py-4 px-6">
                                    <div class="flex items-center">
                                        <div
                                            class="w-10 h-10 rounded-full bg-gradient-to-br from-gray-600 to-gray-800 flex items-center justify-center text-white font-semibold mr-3 shadow-md">
                                            VS
                                        </div>
                                        <div>
                                            <p class="font-medium text-gray-900">Visitante Silva</p>
                                            <p class="text-sm text-gray-500">Convidado</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-gray-100 text-gray-800 border border-gray-200">
                                        <i class="fas fa-user-clock mr-1 text-xs"></i> Visitante
                                    </span>
                                </td>
                                <td class="py-4 px-6">
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800 border border-blue-200">
                                        <i class="fas fa-star mr-1 text-xs"></i> Novo
                                    </span>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="flex items-center">
                                        <div class="relative">
                                            <input type="checkbox" id="presenca-4" class="sr-only" checked>
                                            <label for="presenca-4" class="flex items-center cursor-pointer">
                                                <div
                                                    class="w-10 h-6 flex items-center bg-green-500 rounded-full p-1 transition-all duration-300">
                                                    <div
                                                        class="bg-white w-4 h-4 rounded-full shadow-md transform translate-x-4">
                                                    </div>
                                                </div>
                                                <span class="ml-3 text-sm font-medium text-green-700">Presente</span>
                                            </label>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <span class="text-gray-700">19:20</span>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="flex items-center space-x-2">
                                        <button
                                            class="px-3 py-1.5 bg-red-50 hover:bg-red-100 text-red-700 text-sm rounded-lg transition-colors flex items-center">
                                            <i class="fas fa-times mr-1"></i> Remover
                                        </button>
                                        <button
                                            class="px-3 py-1.5 bg-blue-50 hover:bg-blue-100 text-blue-700 text-sm rounded-lg transition-colors flex items-center">
                                            <i class="fas fa-user-plus mr-1"></i> Converter
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Total de Presenças -->
                <div class="p-6 border-t border-gray-100 bg-gray-50">
                    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
                        <div class="text-sm text-gray-600">
                            <span class="font-medium text-green-700">12 presentes</span> |
                            <span class="font-medium text-red-700">3 ausentes</span> |
                            <span class="font-medium text-blue-700">2 visitantes</span>
                        </div>
                        <button
                            class="mt-4 lg:mt-0 px-6 py-3 bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white font-medium rounded-xl transition-all duration-300 flex items-center">
                            <i class="fas fa-save mr-2"></i> Salvar Alterações
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Conteúdo da Tab Ofertas -->
        <div id="conteudo-ofertas" class="hidden space-y-6">
            <!-- Estatísticas Financeiras -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm font-medium">Total Coletado</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">R$ 280,50</p>
                        </div>
                        <div class="w-12 h-12 rounded-xl bg-green-50 flex items-center justify-center">
                            <i class="fas fa-hand-holding-usd text-green-600 text-xl"></i>
                        </div>
                    </div>
                    <div class="mt-4">
                        <span class="text-green-600 text-sm font-medium flex items-center">
                            <i class="fas fa-arrow-up mr-1"></i> 15% vs último evento
                        </span>
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm font-medium">Contribuintes</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">8</p>
                        </div>
                        <div class="w-12 h-12 rounded-xl bg-blue-50 flex items-center justify-center">
                            <i class="fas fa-users text-blue-600 text-xl"></i>
                        </div>
                    </div>
                    <div class="mt-4">
                        <span class="text-blue-600 text-sm font-medium">67% dos presentes</span>
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm font-medium">Média por Pessoa</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">R$ 35,06</p>
                        </div>
                        <div class="w-12 h-12 rounded-xl bg-purple-50 flex items-center justify-center">
                            <i class="fas fa-chart-bar text-purple-600 text-xl"></i>
                        </div>
                    </div>
                    <div class="mt-4">
                        <span class="text-green-600 text-sm font-medium flex items-center">
                            <i class="fas fa-arrow-up mr-1"></i> R$ 5,20 vs média
                        </span>
                    </div>
                </div>
            </div>

            <!-- Detalhes das Ofertas -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="p-6 border-b border-gray-100">
                    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">Registro de Ofertas</h3>
                            <p class="text-gray-600 mt-1">Registro detalhado das contribuições do evento</p>
                        </div>
                        <div class="flex items-center space-x-3 mt-4 lg:mt-0">
                            <button
                                class="px-4 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-xl transition-colors flex items-center">
                                <i class="fas fa-print mr-2"></i> Imprimir
                            </button>
                            <button id="registrarOfertaBtn"
                                class="px-4 py-2.5 bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white font-medium rounded-xl transition-all duration-300 flex items-center">
                                <i class="fas fa-plus-circle mr-2"></i> Nova Oferta
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Lista de Ofertas -->
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Contribuinte</th>
                                <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Tipo</th>
                                <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Valor (R$)</th>
                                <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Método</th>
                                <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Data/Hora</th>
                                <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Observações</th>
                                <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Ações</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            <!-- Oferta 1 -->
                            <tr class="hover:bg-green-50/30 transition-colors duration-200">
                                <td class="py-4 px-6">
                                    <div class="flex items-center">
                                        <div
                                            class="w-8 h-8 rounded-full bg-gradient-to-br from-red-600 to-red-800 flex items-center justify-center text-white text-sm font-semibold mr-3">
                                            JM
                                        </div>
                                        <span class="font-medium text-gray-900">João Miguel</span>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800 border border-blue-200">
                                        Oferta
                                    </span>
                                </td>
                                <td class="py-4 px-6">
                                    <span class="text-lg font-bold text-green-700">R$ 50,00</span>
                                </td>
                                <td class="py-4 px-6">
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-gray-100 text-gray-800 border border-gray-200">
                                        <i class="fas fa-money-bill-wave mr-1"></i> Dinheiro
                                    </span>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="space-y-1">
                                        <span class="text-sm text-gray-700">25/03/2024</span>
                                        <span class="text-xs text-gray-500">19:30</span>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <span class="text-sm text-gray-600">Contribuição regular</span>
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

                            <!-- Oferta 2 -->
                            <tr class="hover:bg-green-50/30 transition-colors duration-200">
                                <td class="py-4 px-6">
                                    <div class="flex items-center">
                                        <div
                                            class="w-8 h-8 rounded-full bg-gradient-to-br from-purple-600 to-purple-800 flex items-center justify-center text-white text-sm font-semibold mr-3">
                                            AC
                                        </div>
                                        <span class="font-medium text-gray-900">Ana Costa</span>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-purple-100 text-purple-800 border border-purple-200">
                                        Dízimo
                                    </span>
                                </td>
                                <td class="py-4 px-6">
                                    <span class="text-lg font-bold text-green-700">R$ 35,50</span>
                                </td>
                                <td class="py-4 px-6">
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-gray-100 text-gray-800 border border-gray-200">
                                        <i class="fas fa-money-bill-wave mr-1"></i> Dinheiro
                                    </span>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="space-y-1">
                                        <span class="text-sm text-gray-700">25/03/2024</span>
                                        <span class="text-xs text-gray-500">19:35</span>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <span class="text-sm text-gray-600">Dízimo mensal</span>
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

                            <!-- Oferta 3 -->
                            <tr class="hover:bg-green-50/30 transition-colors duration-200">
                                <td class="py-4 px-6">
                                    <div class="flex items-center">
                                        <div
                                            class="w-8 h-8 rounded-full bg-gradient-to-br from-gray-600 to-gray-800 flex items-center justify-center text-white text-sm font-semibold mr-3">
                                            VS
                                        </div>
                                        <span class="font-medium text-gray-900">Visitante Silva</span>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800 border border-yellow-200">
                                        Contribuição
                                    </span>
                                </td>
                                <td class="py-4 px-6">
                                    <span class="text-lg font-bold text-green-700">R$ 20,00</span>
                                </td>
                                <td class="py-4 px-6">
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-gray-100 text-gray-800 border border-gray-200">
                                        <i class="fas fa-money-bill-wave mr-1"></i> Dinheiro
                                    </span>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="space-y-1">
                                        <span class="text-sm text-gray-700">25/03/2024</span>
                                        <span class="text-xs text-gray-500">20:15</span>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <span class="text-sm text-gray-600">Primeira contribuição</span>
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

    </div>

    <!-- Modal Adicionar Visitante -->
    <div id="modalAdicionarVisitante"
        class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden items-center justify-center p-4">
        <div
            class="bg-white rounded-2xl w-full max-w-md max-h-[90vh] overflow-y-auto transform transition-all duration-300 scale-95 opacity-0">
            <div class="sticky top-0 bg-white p-6 border-b border-gray-100 z-10">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-xl font-bold text-gray-900">Adicionar Visitante</h2>
                        <p class="text-gray-600 mt-1">Registre um novo visitante no evento</p>
                    </div>
                    <button id="fecharModalVisitante"
                        class="w-10 h-10 rounded-lg hover:bg-gray-100 flex items-center justify-center transition-colors">
                        <i class="fas fa-times text-gray-500"></i>
                    </button>
                </div>
            </div>

            <form class="p-6">
                <div class="space-y-5">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nome do Visitante *</label>
                        <input type="text"
                            class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                            placeholder="Nome completo">
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Telefone</label>
                            <input type="tel"
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                                placeholder="(11) 99999-8888">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Idade</label>
                            <input type="number"
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                                placeholder="30">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Como conheceu o grupo?</label>
                        <select
                            class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                            <option value="">Selecione</option>
                            <option value="indicacao">Indicação de amigo</option>
                            <option value="rede-social">Redes sociais</option>
                            <option value="convite">Convite pessoal</option>
                            <option value="outro">Outro</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Observações</label>
                        <textarea rows="3"
                            class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                            placeholder="Observações sobre o visitante..."></textarea>
                    </div>
                </div>

                <div class="mt-8 pt-6 border-t border-gray-100 flex justify-end space-x-4">
                    <button type="button" id="cancelarModalVisitante"
                        class="px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-xl transition-colors">
                        Cancelar
                    </button>
                    <button type="submit"
                        class="px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-medium rounded-xl transition-all duration-300 flex items-center">
                        <i class="fas fa-user-plus mr-2"></i> Adicionar Visitante
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Registrar Oferta -->
    <div id="modalRegistrarOferta"
        class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden items-center justify-center p-4">
        <div
            class="bg-white rounded-2xl w-full max-w-md max-h-[90vh] overflow-y-auto transform transition-all duration-300 scale-95 opacity-0">
            <div class="sticky top-0 bg-white p-6 border-b border-gray-100 z-10">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-xl font-bold text-gray-900">Registrar Oferta</h2>
                        <p class="text-gray-600 mt-1">Registre uma nova contribuição</p>
                    </div>
                    <button id="fecharModalOferta"
                        class="w-10 h-10 rounded-lg hover:bg-gray-100 flex items-center justify-center transition-colors">
                        <i class="fas fa-times text-gray-500"></i>
                    </button>
                </div>
            </div>

            <form class="p-6">
                <div class="space-y-5">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Contribuinte *</label>
                        <select
                            class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all">
                            <option value="">Selecione um membro</option>
                            <option value="1">João Miguel</option>
                            <option value="2">Ana Costa</option>
                            <option value="3">Pedro Silva</option>
                            <option value="visitante">Visitante</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Tipo de Contribuição *</label>
                        <div class="grid grid-cols-2 gap-3">
                            <label
                                class="flex items-center p-4 border border-gray-200 rounded-xl hover:border-green-300 cursor-pointer transition-colors">
                                <input type="radio" name="tipo" value="oferta" class="mr-3" checked>
                                <div>
                                    <div class="font-medium text-gray-900">Oferta</div>
                                </div>
                            </label>
                            <label
                                class="flex items-center p-4 border border-gray-200 rounded-xl hover:border-green-300 cursor-pointer transition-colors">
                                <input type="radio" name="tipo" value="dizimo" class="mr-3">
                                <div>
                                    <div class="font-medium text-gray-900">Dízimo</div>
                                </div>
                            </label>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Valor (R$) *</label>
                        <input type="number" step="0.01"
                            class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all"
                            placeholder="0,00">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Método de Pagamento</label>
                        <select
                            class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all">
                            <option value="dinheiro">Dinheiro</option>
                            <option value="pix">PIX</option>
                            <option value="cartao">Cartão</option>
                            <option value="transferencia">Transferência</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Observações</label>
                        <textarea rows="3"
                            class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all"
                            placeholder="Observações sobre a contribuição..."></textarea>
                    </div>
                </div>

                <div class="mt-8 pt-6 border-t border-gray-100 flex justify-end space-x-4">
                    <button type="button" id="cancelarModalOferta"
                        class="px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-xl transition-colors">
                        Cancelar
                    </button>
                    <button type="submit"
                        class="px-6 py-3 bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white font-medium rounded-xl transition-all duration-300 flex items-center">
                        <i class="fas fa-save mr-2"></i> Registrar Oferta
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

            /* Switch personalizado para presenças */
            input[type="checkbox"]:checked+label div {
                background-color: #10b981 !important;
            }

            input[type="checkbox"]:checked+label div div {
                transform: translateX(16px) !important;
            }

            /* Animação dos modais */
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
                    'presencas': {
                        button: 'tab-presencas',
                        conteudo: 'conteudo-presencas'
                    },
                    'ofertas': {
                        button: 'tab-ofertas',
                        conteudo: 'conteudo-ofertas'
                    },
                    'detalhes': {
                        button: 'tab-detalhes',
                        conteudo: 'conteudo-detalhes'
                    },
                    'relatorio': {
                        button: 'tab-relatorio',
                        conteudo: 'conteudo-relatorio'
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

                alternarTab('presencas');

                // Controle dos Switch de Presenças
                document.querySelectorAll('input[type="checkbox"][id^="presenca-"]').forEach(checkbox => {
                    checkbox.addEventListener('change', function() {
                        const label = this.nextElementSibling;
                        const statusText = label.querySelector('span:last-child');
                        const timeCell = this.closest('tr').querySelector('td:nth-child(5) span');

                        if (this.checked) {
                            statusText.textContent = 'Presente';
                            statusText.className = 'ml-3 text-sm font-medium text-green-700';
                            if (timeCell.textContent === '-') {
                                const now = new Date();
                                const hours = now.getHours().toString().padStart(2, '0');
                                const minutes = now.getMinutes().toString().padStart(2, '0');
                                timeCell.textContent = `${hours}:${minutes}`;
                            }
                        } else {
                            statusText.textContent = 'Ausente';
                            statusText.className = 'ml-3 text-sm font-medium text-gray-700';
                            timeCell.textContent = '-';
                        }
                    });
                });

                // Controle dos Modais
                const modais = {
                    'visitante': {
                        abrir: 'adicionarVisitanteBtn',
                        modal: 'modalAdicionarVisitante',
                        fechar: 'fecharModalVisitante',
                        cancelar: 'cancelarModalVisitante'
                    },
                    'oferta': {
                        abrir: 'registrarOfertaBtn',
                        modal: 'modalRegistrarOferta',
                        fechar: 'fecharModalOferta',
                        cancelar: 'cancelarModalOferta'
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

                // Salvar alterações de presenças
                const salvarBtn = document.querySelector('button:contains("Salvar Alterações")');
                if (salvarBtn) {
                    salvarBtn.addEventListener('click', function() {
                        // Aqui você adicionaria a lógica para salvar todas as presenças
                        alert('Presenças salvas com sucesso!');
                    });
                }
            });
        </script>
    @endpush
@endsection
