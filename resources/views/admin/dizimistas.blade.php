<!-- dizimistas.blade.php -->
@extends('admin.index')

@section('main')
    <div class="p-6">
        <!-- Cabeçalho -->
        <div class="mb-8">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
                <div>
                    <h1 class="text-2xl lg:text-3xl font-bold text-gray-900">Controle de Dizimistas</h1>
                    <p class="text-gray-600 mt-2">Registre quem pagou dízimo sem valores específicos</p>
                </div>
                <div class="flex items-center space-x-3 mt-4 lg:mt-0">
                    <button id="registrarPagamentoBtn"
                        class="px-6 py-3 bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white font-medium rounded-xl transition-all duration-300 shadow-sm hover:shadow-md flex items-center justify-center group">
                        <i class="fas fa-hand-holding-usd mr-2 group-hover:scale-110 transition-transform"></i> Registrar
                        Pagamento
                    </button>
                </div>
            </div>
        </div>

        <!-- Período e Filtros -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 mb-8">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
                <!-- Período -->
                <div class="flex flex-wrap items-center gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Período</label>
                        <div class="flex items-center space-x-3">
                            <select id="mesReferencia"
                                class="px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all">
                                <option value="03">Março</option>
                                <option value="02">Fevereiro</option>
                                <option value="01">Janeiro</option>
                                <option value="12">Dezembro</option>
                                <option value="11">Novembro</option>
                            </select>
                            <select id="anoReferencia"
                                class="px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all">
                                <option value="2024">2024</option>
                                <option value="2023">2023</option>
                                <option value="2022">2022</option>
                            </select>
                            <button id="aplicarPeriodo"
                                class="px-4 py-2.5 bg-red-600 hover:bg-red-700 text-white rounded-xl transition-colors">
                                Aplicar
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Status e Busca -->
                <div class="flex items-center space-x-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                        <select id="filtroStatus"
                            class="px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all">
                            <option value="todos">Todos</option>
                            <option value="pago">Pagou</option>
                            <option value="nao-pago">Não Pagou</option>
                            <option value="pendente">Pendente</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Buscar</label>
                        <div class="relative">
                            <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                            <input type="text" placeholder="Nome..."
                                class="pl-10 pr-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Estatísticas de Dízimos -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm font-medium">Total Dizimistas</p>
                        <p class="text-3xl font-bold text-gray-900 mt-2">85</p>
                    </div>
                    <div class="w-12 h-12 rounded-xl bg-blue-50 flex items-center justify-center">
                        <i class="fas fa-users text-blue-600 text-xl"></i>
                    </div>
                </div>
                <div class="mt-4">
                    <span class="text-green-600 text-sm font-medium flex items-center">
                        <i class="fas fa-arrow-up mr-1"></i> +5 este mês
                    </span>
                </div>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm font-medium">Pagaram Este Mês</p>
                        <p class="text-3xl font-bold text-gray-900 mt-2">68</p>
                    </div>
                    <div class="w-12 h-12 rounded-xl bg-green-50 flex items-center justify-center">
                        <i class="fas fa-check-circle text-green-600 text-xl"></i>
                    </div>
                </div>
                <div class="mt-4">
                    <span class="text-green-600 text-sm font-medium">80% dos dizimistas</span>
                </div>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm font-medium">Não Pagaram</p>
                        <p class="text-3xl font-bold text-gray-900 mt-2">17</p>
                    </div>
                    <div class="w-12 h-12 rounded-xl bg-red-50 flex items-center justify-center">
                        <i class="fas fa-times-circle text-red-600 text-xl"></i>
                    </div>
                </div>
                <div class="mt-4">
                    <span class="text-red-600 text-sm font-medium">20% dos dizimistas</span>
                </div>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm font-medium">Regularidade</p>
                        <p class="text-3xl font-bold text-gray-900 mt-2">92%</p>
                    </div>
                    <div class="w-12 h-12 rounded-xl bg-yellow-50 flex items-center justify-center">
                        <i class="fas fa-chart-line text-yellow-600 text-xl"></i>
                    </div>
                </div>
                <div class="mt-4">
                    <span class="text-green-600 text-sm font-medium flex items-center">
                        <i class="fas fa-arrow-up mr-1"></i> +3% vs mês anterior
                    </span>
                </div>
            </div>
        </div>

        <!-- Período Atual -->
        <div class="mb-6">
            <div class="bg-gradient-to-r from-red-50 to-white rounded-2xl p-6 border border-red-100">
                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
                    <div class="flex items-center">
                        <div class="w-12 h-12 rounded-xl bg-red-100 flex items-center justify-center mr-4">
                            <i class="fas fa-calendar-alt text-red-600 text-lg"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">Março 2024</h3>
                            <p class="text-gray-600">Período atual de controle de dízimos</p>
                        </div>
                    </div>
                    <div class="mt-4 lg:mt-0 flex items-center space-x-4">
                        <div class="text-center">
                            <p class="text-2xl font-bold text-green-700">68</p>
                            <p class="text-sm text-gray-600">Pagaram</p>
                        </div>
                        <div class="text-center">
                            <p class="text-2xl font-bold text-red-700">17</p>
                            <p class="text-sm text-gray-600">Não Pagaram</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Lista de Dizimistas -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-6 border-b border-gray-100">
                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900">Lista de Dizimistas</h3>
                        <p class="text-gray-600 mt-1">Marque quem já pagou o dízimo de Março/2024</p>
                    </div>
                    <div class="flex items-center space-x-3 mt-4 lg:mt-0">
                        <button id="marcarTodosBtn"
                            class="px-4 py-2.5 bg-blue-50 hover:bg-blue-100 text-blue-700 font-medium rounded-xl transition-colors flex items-center">
                            <i class="fas fa-check-double mr-2"></i> Marcar Todos
                        </button>
                        <button id="salvarAlteracoesBtn"
                            class="px-4 py-2.5 bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white font-medium rounded-xl transition-all duration-300 flex items-center">
                            <i class="fas fa-save mr-2"></i> Salvar Alterações
                        </button>
                    </div>
                </div>
            </div>

            <!-- Cabeçalho da Tabela com Ações em Massa -->
            <div class="bg-gray-50 px-6 py-4 border-b border-gray-100">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="relative">
                            <input type="checkbox" id="selecionarTodos" class="sr-only">
                            <label for="selecionarTodos" class="flex items-center cursor-pointer">
                                <div
                                    class="w-5 h-5 border-2 border-gray-300 rounded flex items-center justify-center mr-3">
                                    <div class="w-3 h-3 bg-red-600 rounded-sm hidden"></div>
                                </div>
                                <span class="text-sm text-gray-700">Selecionar todos</span>
                            </label>
                        </div>
                    </div>
                    <div class="flex items-center space-x-3">
                        <button id="marcarComoPago"
                            class="px-3 py-1.5 bg-green-50 hover:bg-green-100 text-green-700 text-sm rounded-lg transition-colors flex items-center">
                            <i class="fas fa-check mr-1"></i> Marcar como Pago
                        </button>
                        <button id="marcarComoNaoPago"
                            class="px-3 py-1.5 bg-red-50 hover:bg-red-100 text-red-700 text-sm rounded-lg transition-colors flex items-center">
                            <i class="fas fa-times mr-1"></i> Marcar como Não Pago
                        </button>
                    </div>
                </div>
            </div>

            <!-- Lista -->
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700 w-12">
                                <div class="flex items-center">
                                    <input type="checkbox" id="selecionarTodosHeader"
                                        class="rounded border-gray-300 text-red-600 focus:ring-red-500">
                                </div>
                            </th>
                            <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Dizimista</th>
                            <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Família/Setor</th>
                            <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Status</th>
                            <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Último Pagamento</th>
                            <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Regularidade</th>
                            <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Ações</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        <!-- Dizimista 1 - Pagou -->
                        <tr class="hover:bg-green-50/30 transition-colors">
                            <td class="py-4 px-6">
                                <div class="flex items-center">
                                    <input type="checkbox"
                                        class="rounded border-gray-300 text-red-600 focus:ring-red-500 checkbox-dizimista"
                                        data-id="1">
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center">
                                    <div
                                        class="w-10 h-10 rounded-full bg-gradient-to-br from-blue-500 to-blue-700 flex items-center justify-center text-white font-semibold mr-3">
                                        JS
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-900">João Silva</p>
                                        <p class="text-sm text-gray-500">Dizimista desde 2020</p>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="space-y-1">
                                    <span class="text-gray-700">Família Silva</span>
                                    <span
                                        class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                        Setor Norte
                                    </span>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center">
                                    <div class="relative">
                                        <input type="checkbox" id="pago-1" class="sr-only status-checkbox"
                                            data-id="1" checked>
                                        <label for="pago-1" class="flex items-center cursor-pointer">
                                            <div
                                                class="w-12 h-6 flex items-center bg-green-500 rounded-full p-1 transition-all duration-300">
                                                <div
                                                    class="bg-white w-4 h-4 rounded-full shadow-md transform translate-x-6">
                                                </div>
                                            </div>
                                            <span class="ml-3 text-sm font-medium text-green-700">Pagou</span>
                                        </label>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="space-y-1">
                                    <span class="text-sm text-gray-700">15/03/2024</span>
                                    <span class="text-xs text-gray-500">Dentro do prazo</span>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center">
                                    <div class="w-24 bg-gray-200 rounded-full h-2 mr-3">
                                        <div class="bg-green-600 h-2 rounded-full" style="width: 100%"></div>
                                    </div>
                                    <span class="text-sm font-medium text-green-700">100%</span>
                                </div>
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

                        <!-- Dizimista 2 - Pagou -->
                        <tr class="hover:bg-green-50/30 transition-colors">
                            <td class="py-4 px-6">
                                <div class="flex items-center">
                                    <input type="checkbox"
                                        class="rounded border-gray-300 text-red-600 focus:ring-red-500 checkbox-dizimista"
                                        data-id="2">
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center">
                                    <div
                                        class="w-10 h-10 rounded-full bg-gradient-to-br from-purple-500 to-purple-700 flex items-center justify-center text-white font-semibold mr-3">
                                        AC
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-900">Ana Costa</p>
                                        <p class="text-sm text-gray-500">Dizimista desde 2021</p>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="space-y-1">
                                    <span class="text-gray-700">Família Costa</span>
                                    <span
                                        class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800">
                                        Setor Centro
                                    </span>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center">
                                    <div class="relative">
                                        <input type="checkbox" id="pago-2" class="sr-only status-checkbox"
                                            data-id="2" checked>
                                        <label for="pago-2" class="flex items-center cursor-pointer">
                                            <div
                                                class="w-12 h-6 flex items-center bg-green-500 rounded-full p-1 transition-all duration-300">
                                                <div
                                                    class="bg-white w-4 h-4 rounded-full shadow-md transform translate-x-6">
                                                </div>
                                            </div>
                                            <span class="ml-3 text-sm font-medium text-green-700">Pagou</span>
                                        </label>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="space-y-1">
                                    <span class="text-sm text-gray-700">18/03/2024</span>
                                    <span class="text-xs text-gray-500">Dentro do prazo</span>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center">
                                    <div class="w-24 bg-gray-200 rounded-full h-2 mr-3">
                                        <div class="bg-green-600 h-2 rounded-full" style="width: 92%"></div>
                                    </div>
                                    <span class="text-sm font-medium text-green-700">92%</span>
                                </div>
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

                        <!-- Dizimista 3 - Não Pagou -->
                        <tr class="hover:bg-red-50/30 transition-colors">
                            <td class="py-4 px-6">
                                <div class="flex items-center">
                                    <input type="checkbox"
                                        class="rounded border-gray-300 text-red-600 focus:ring-red-500 checkbox-dizimista"
                                        data-id="3">
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center">
                                    <div
                                        class="w-10 h-10 rounded-full bg-gradient-to-br from-green-500 to-green-700 flex items-center justify-center text-white font-semibold mr-3">
                                        PS
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-900">Pedro Silva</p>
                                        <p class="text-sm text-gray-500">Dizimista desde 2022</p>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="space-y-1">
                                    <span class="text-gray-700">Família Silva</span>
                                    <span
                                        class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                        Setor Norte
                                    </span>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center">
                                    <div class="relative">
                                        <input type="checkbox" id="pago-3" class="sr-only status-checkbox"
                                            data-id="3">
                                        <label for="pago-3" class="flex items-center cursor-pointer">
                                            <div
                                                class="w-12 h-6 flex items-center bg-gray-300 rounded-full p-1 transition-all duration-300">
                                                <div class="bg-white w-4 h-4 rounded-full shadow-md"></div>
                                            </div>
                                            <span class="ml-3 text-sm font-medium text-gray-700">Não Pagou</span>
                                        </label>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="space-y-1">
                                    <span class="text-sm text-gray-500">15/02/2024</span>
                                    <span class="text-xs text-red-500">Último: Fevereiro</span>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center">
                                    <div class="w-24 bg-gray-200 rounded-full h-2 mr-3">
                                        <div class="bg-yellow-500 h-2 rounded-full" style="width: 75%"></div>
                                    </div>
                                    <span class="text-sm font-medium text-yellow-700">75%</span>
                                </div>
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

                        <!-- Dizimista 4 - Pendente -->
                        <tr class="hover:bg-yellow-50/30 transition-colors">
                            <td class="py-4 px-6">
                                <div class="flex items-center">
                                    <input type="checkbox"
                                        class="rounded border-gray-300 text-red-600 focus:ring-red-500 checkbox-dizimista"
                                        data-id="4">
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center">
                                    <div
                                        class="w-10 h-10 rounded-full bg-gradient-to-br from-yellow-500 to-yellow-700 flex items-center justify-center text-white font-semibold mr-3">
                                        CS
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-900">Carlos Santos</p>
                                        <p class="text-sm text-gray-500">Dizimista desde 2023</p>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="space-y-1">
                                    <span class="text-gray-700">Família Santos</span>
                                    <span
                                        class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        Setor Centro
                                    </span>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center">
                                    <div class="relative">
                                        <input type="checkbox" id="pago-4" class="sr-only status-checkbox"
                                            data-id="4">
                                        <label for="pago-4" class="flex items-center cursor-pointer">
                                            <div
                                                class="w-12 h-6 flex items-center bg-gray-300 rounded-full p-1 transition-all duration-300">
                                                <div class="bg-white w-4 h-4 rounded-full shadow-md"></div>
                                            </div>
                                            <span class="ml-3 text-sm font-medium text-gray-700">Não Pagou</span>
                                        </label>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="space-y-1">
                                    <span class="text-sm text-gray-500">-</span>
                                    <span class="text-xs text-yellow-500">Primeiro mês</span>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center">
                                    <div class="w-24 bg-gray-200 rounded-full h-2 mr-3">
                                        <div class="bg-blue-500 h-2 rounded-full" style="width: 0%"></div>
                                    </div>
                                    <span class="text-sm font-medium text-blue-700">Novo</span>
                                </div>
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

                        <!-- Dizimista 5 - Pagou -->
                        <tr class="hover:bg-green-50/30 transition-colors">
                            <td class="py-4 px-6">
                                <div class="flex items-center">
                                    <input type="checkbox"
                                        class="rounded border-gray-300 text-red-600 focus:ring-red-500 checkbox-dizimista"
                                        data-id="5">
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center">
                                    <div
                                        class="w-10 h-10 rounded-full bg-gradient-to-br from-pink-500 to-pink-700 flex items-center justify-center text-white font-semibold mr-3">
                                        MA
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-900">Maria Alice</p>
                                        <p class="text-sm text-gray-500">Dizimista desde 2020</p>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="space-y-1">
                                    <span class="text-gray-700">Família Alice</span>
                                    <span
                                        class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-pink-100 text-pink-800">
                                        Setor Sul
                                    </span>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center">
                                    <div class="relative">
                                        <input type="checkbox" id="pago-5" class="sr-only status-checkbox"
                                            data-id="5" checked>
                                        <label for="pago-5" class="flex items-center cursor-pointer">
                                            <div
                                                class="w-12 h-6 flex items-center bg-green-500 rounded-full p-1 transition-all duration-300">
                                                <div
                                                    class="bg-white w-4 h-4 rounded-full shadow-md transform translate-x-6">
                                                </div>
                                            </div>
                                            <span class="ml-3 text-sm font-medium text-green-700">Pagou</span>
                                        </label>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="space-y-1">
                                    <span class="text-sm text-gray-700">10/03/2024</span>
                                    <span class="text-xs text-gray-500">Dentro do prazo</span>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center">
                                    <div class="w-24 bg-gray-200 rounded-full h-2 mr-3">
                                        <div class="bg-green-600 h-2 rounded-full" style="width: 98%"></div>
                                    </div>
                                    <span class="text-sm font-medium text-green-700">98%</span>
                                </div>
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

            <!-- Resumo e Ações -->
            <div class="p-6 border-t border-gray-100 bg-gray-50">
                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
                    <div>
                        <div class="flex items-center space-x-6">
                            <div class="text-center">
                                <p class="text-2xl font-bold text-green-700">68</p>
                                <p class="text-sm text-gray-600">Pagaram</p>
                            </div>
                            <div class="text-center">
                                <p class="text-2xl font-bold text-red-700">17</p>
                                <p class="text-sm text-gray-600">Não Pagaram</p>
                            </div>
                            <div class="text-center">
                                <p class="text-2xl font-bold text-gray-700">85</p>
                                <p class="text-sm text-gray-600">Total</p>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 lg:mt-0">
                        <button id="gerarRelatorioBtn"
                            class="px-6 py-3 bg-white border border-gray-300 hover:bg-gray-50 text-gray-700 font-medium rounded-xl transition-colors flex items-center">
                            <i class="fas fa-file-export mr-2"></i> Gerar Relatório
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Histórico de Dízimos -->
        <div class="mt-8">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-6">Histórico de Dízimos</h3>

                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700">Mês/Ano</th>
                                <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700">Pagaram</th>
                                <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700">Não Pagaram</th>
                                <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700">Taxa</th>
                                <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700">Ações</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="py-3 px-4">
                                    <span class="font-medium text-gray-900">Fevereiro 2024</span>
                                </td>
                                <td class="py-3 px-4">
                                    <span class="text-green-700 font-medium">70</span>
                                </td>
                                <td class="py-3 px-4">
                                    <span class="text-red-700">15</span>
                                </td>
                                <td class="py-3 px-4">
                                    <span class="font-medium">82%</span>
                                </td>
                                <td class="py-3 px-4">
                                    <button
                                        class="px-3 py-1.5 bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm rounded-lg transition-colors flex items-center">
                                        <i class="fas fa-eye mr-1"></i> Ver
                                    </button>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="py-3 px-4">
                                    <span class="font-medium text-gray-900">Janeiro 2024</span>
                                </td>
                                <td class="py-3 px-4">
                                    <span class="text-green-700 font-medium">72</span>
                                </td>
                                <td class="py-3 px-4">
                                    <span class="text-red-700">13</span>
                                </td>
                                <td class="py-3 px-4">
                                    <span class="font-medium">85%</span>
                                </td>
                                <td class="py-3 px-4">
                                    <button
                                        class="px-3 py-1.5 bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm rounded-lg transition-colors flex items-center">
                                        <i class="fas fa-eye mr-1"></i> Ver
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Registrar Pagamento -->
    <div id="modalRegistrarPagamento"
        class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden items-center justify-center p-4">
        <div
            class="bg-white rounded-2xl w-full max-w-md max-h-[90vh] overflow-y-auto transform transition-all duration-300 scale-95 opacity-0">
            <div class="sticky top-0 bg-white p-6 border-b border-gray-100 z-10">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-xl font-bold text-gray-900">Registrar Pagamento</h2>
                        <p class="text-gray-600 mt-1">Selecione quem pagou o dízimo</p>
                    </div>
                    <button id="fecharModalPagamento"
                        class="w-10 h-10 rounded-lg hover:bg-gray-100 flex items-center justify-center transition-colors">
                        <i class="fas fa-times text-gray-500"></i>
                    </button>
                </div>
            </div>

            <form class="p-6">
                <div class="space-y-5">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Período</label>
                        <div class="flex items-center space-x-3">
                            <select
                                class="flex-1 px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all">
                                <option>Março 2024</option>
                                <option>Abril 2024</option>
                                <option>Maio 2024</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Selecione Dizimista(s)</label>
                        <div class="space-y-2 max-h-60 overflow-y-auto p-3 border border-gray-200 rounded-xl">
                            <label class="flex items-center p-2 hover:bg-gray-50 rounded-lg cursor-pointer">
                                <input type="checkbox"
                                    class="rounded border-gray-300 mr-3 text-green-600 focus:ring-green-500">
                                <div class="flex items-center">
                                    <div
                                        class="w-8 h-8 rounded-full bg-gradient-to-br from-blue-500 to-blue-700 flex items-center justify-center text-white text-xs font-semibold mr-3">
                                        JS
                                    </div>
                                    <span class="text-gray-700">João Silva</span>
                                </div>
                            </label>
                            <label class="flex items-center p-2 hover:bg-gray-50 rounded-lg cursor-pointer">
                                <input type="checkbox"
                                    class="rounded border-gray-300 mr-3 text-green-600 focus:ring-green-500">
                                <div class="flex items-center">
                                    <div
                                        class="w-8 h-8 rounded-full bg-gradient-to-br from-purple-500 to-purple-700 flex items-center justify-center text-white text-xs font-semibold mr-3">
                                        AC
                                    </div>
                                    <span class="text-gray-700">Ana Costa</span>
                                </div>
                            </label>
                            <label class="flex items-center p-2 hover:bg-gray-50 rounded-lg cursor-pointer">
                                <input type="checkbox"
                                    class="rounded border-gray-300 mr-3 text-green-600 focus:ring-green-500">
                                <div class="flex items-center">
                                    <div
                                        class="w-8 h-8 rounded-full bg-gradient-to-br from-green-500 to-green-700 flex items-center justify-center text-white text-xs font-semibold mr-3">
                                        PS
                                    </div>
                                    <span class="text-gray-700">Pedro Silva</span>
                                </div>
                            </label>
                        </div>
                    </div>

                    <div>
                        <label class="flex items-center">
                            <input type="checkbox"
                                class="rounded border-gray-300 mr-3 text-green-600 focus:ring-green-500">
                            <span class="text-gray-700">Enviar notificação por e-mail</span>
                        </label>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Observação (opcional)</label>
                        <textarea rows="3"
                            class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all"
                            placeholder="Observação sobre o pagamento..."></textarea>
                    </div>
                </div>

                <div class="mt-8 pt-6 border-t border-gray-100 flex justify-end space-x-4">
                    <button type="button" id="cancelarModalPagamento"
                        class="px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-xl transition-colors">
                        Cancelar
                    </button>
                    <button type="submit"
                        class="px-6 py-3 bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white font-medium rounded-xl transition-all duration-300 flex items-center">
                        <i class="fas fa-check-circle mr-2"></i> Registrar
                    </button>
                </div>
            </form>
        </div>
    </div>

    @push('styles')
        <style>
            .status-checkbox:checked+label div {
                background-color: #10b981 !important;
            }

            .status-checkbox:checked+label div div {
                transform: translateX(24px) !important;
            }

            .checkbox-dizimista:checked {
                background-color: #dc2626;
                border-color: #dc2626;
            }

            /* Switch customizado */
            input[type="checkbox"]:checked+label div {
                background-color: #10b981 !important;
            }

            input[type="checkbox"]:checked+label div div {
                transform: translateX(24px) !important;
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

            /* Checkbox personalizado para selecionar todos */
            #selecionarTodos:checked+label div div {
                display: block;
            }

            #selecionarTodosHeader:checked {
                background-color: #dc2626;
                border-color: #dc2626;
            }
        </style>
    @endpush

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Controle dos Switches de Status
                const statusCheckboxes = document.querySelectorAll('.status-checkbox');

                statusCheckboxes.forEach(checkbox => {
                    checkbox.addEventListener('change', function() {
                        const label = this.nextElementSibling;
                        const statusText = label.querySelector('span:last-child');

                        if (this.checked) {
                            statusText.textContent = 'Pagou';
                            statusText.className = 'ml-3 text-sm font-medium text-green-700';
                            this.closest('tr').classList.remove('hover:bg-red-50/30',
                                'hover:bg-yellow-50/30');
                            this.closest('tr').classList.add('hover:bg-green-50/30');
                        } else {
                            statusText.textContent = 'Não Pagou';
                            statusText.className = 'ml-3 text-sm font-medium text-gray-700';
                            this.closest('tr').classList.remove('hover:bg-green-50/30');
                            this.closest('tr').classList.add('hover:bg-red-50/30');
                        }
                    });
                });

                // Controle de Seleção Múltipla
                const selecionarTodosHeader = document.getElementById('selecionarTodosHeader');
                const selecionarTodos = document.getElementById('selecionarTodos');
                const checkboxesDizimistas = document.querySelectorAll('.checkbox-dizimista');

                // Selecionar todos no header
                if (selecionarTodosHeader) {
                    selecionarTodosHeader.addEventListener('change', function() {
                        const isChecked = this.checked;
                        checkboxesDizimistas.forEach(checkbox => {
                            checkbox.checked = isChecked;
                        });
                        selecionarTodos.checked = isChecked;
                    });
                }

                // Selecionar todos no painel de ações
                if (selecionarTodos) {
                    selecionarTodos.addEventListener('change', function() {
                        const isChecked = this.checked;
                        checkboxesDizimistas.forEach(checkbox => {
                            checkbox.checked = isChecked;
                        });
                        selecionarTodosHeader.checked = isChecked;
                    });
                }

                // Verificar se todos estão selecionados quando marcar individualmente
                checkboxesDizimistas.forEach(checkbox => {
                    checkbox.addEventListener('change', function() {
                        const todosSelecionados = Array.from(checkboxesDizimistas).every(cb => cb
                            .checked);
                        selecionarTodosHeader.checked = todosSelecionados;
                        selecionarTodos.checked = todosSelecionados;
                    });
                });

                // Ações em Massa
                const marcarComoPagoBtn = document.getElementById('marcarComoPago');
                const marcarComoNaoPagoBtn = document.getElementById('marcarComoNaoPago');
                const marcarTodosBtn = document.getElementById('marcarTodosBtn');
                const salvarAlteracoesBtn = document.getElementById('salvarAlteracoesBtn');

                if (marcarComoPagoBtn) {
                    marcarComoPagoBtn.addEventListener('click', function() {
                        const selecionados = Array.from(checkboxesDizimistas).filter(cb => cb.checked);

                        selecionados.forEach(checkbox => {
                            const id = checkbox.getAttribute('data-id');
                            const statusCheckbox = document.querySelector(
                                `.status-checkbox[data-id="${id}"]`);
                            if (statusCheckbox) {
                                statusCheckbox.checked = true;
                                statusCheckbox.dispatchEvent(new Event('change'));
                            }
                        });

                        // Desmarcar todos os checkboxes
                        checkboxesDizimistas.forEach(cb => cb.checked = false);
                        selecionarTodosHeader.checked = false;
                        selecionarTodos.checked = false;
                    });
                }

                if (marcarComoNaoPagoBtn) {
                    marcarComoNaoPagoBtn.addEventListener('click', function() {
                        const selecionados = Array.from(checkboxesDizimistas).filter(cb => cb.checked);

                        selecionados.forEach(checkbox => {
                            const id = checkbox.getAttribute('data-id');
                            const statusCheckbox = document.querySelector(
                                `.status-checkbox[data-id="${id}"]`);
                            if (statusCheckbox) {
                                statusCheckbox.checked = false;
                                statusCheckbox.dispatchEvent(new Event('change'));
                            }
                        });

                        // Desmarcar todos os checkboxes
                        checkboxesDizimistas.forEach(cb => cb.checked = false);
                        selecionarTodosHeader.checked = false;
                        selecionarTodos.checked = false;
                    });
                }

                if (marcarTodosBtn) {
                    marcarTodosBtn.addEventListener('click', function() {
                        statusCheckboxes.forEach(checkbox => {
                            checkbox.checked = true;
                            checkbox.dispatchEvent(new Event('change'));
                        });
                    });
                }

                if (salvarAlteracoesBtn) {
                    salvarAlteracoesBtn.addEventListener('click', function() {
                        // Coletar todos os status atualizados
                        const dados = Array.from(statusCheckboxes).map(checkbox => {
                            return {
                                id: checkbox.getAttribute('data-id'),
                                pago: checkbox.checked
                            };
                        });

                        // Aqui você enviaria os dados para o servidor
                        console.log('Salvando alterações:', dados);
                        alert('Alterações salvas com sucesso!');
                    });
                }

                // Período
                const aplicarPeriodoBtn = document.getElementById('aplicarPeriodo');
                const mesReferencia = document.getElementById('mesReferencia');
                const anoReferencia = document.getElementById('anoReferencia');

                if (aplicarPeriodoBtn) {
                    aplicarPeriodoBtn.addEventListener('click', function() {
                        const mes = mesReferencia.value;
                        const ano = anoReferencia.value;

                        // Aqui você carregaria os dados do período selecionado
                        console.log('Carregando dados do período:', mes, ano);

                        // Atualizar o título do período atual
                        const meses = {
                            '01': 'Janeiro',
                            '02': 'Fevereiro',
                            '03': 'Março',
                            '04': 'Abril',
                            '05': 'Maio',
                            '06': 'Junho',
                            '07': 'Julho',
                            '08': 'Agosto',
                            '09': 'Setembro',
                            '10': 'Outubro',
                            '11': 'Novembro',
                            '12': 'Dezembro'
                        };

                        const tituloPeriodo = document.querySelector('.bg-gradient-to-r h3');
                        if (tituloPeriodo) {
                            tituloPeriodo.textContent = `${meses[mes]} ${ano}`;
                        }
                    });
                }

                // Modal Registrar Pagamento
                const registrarPagamentoBtn = document.getElementById('registrarPagamentoBtn');
                const modalRegistrarPagamento = document.getElementById('modalRegistrarPagamento');
                const fecharModalPagamento = document.getElementById('fecharModalPagamento');
                const cancelarModalPagamento = document.getElementById('cancelarModalPagamento');
                const modalContent = modalRegistrarPagamento?.querySelector('.transform');

                function abrirModal() {
                    modalRegistrarPagamento.classList.remove('hidden');
                    modalRegistrarPagamento.classList.add('flex');
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
                        modalRegistrarPagamento.classList.remove('flex');
                        modalRegistrarPagamento.classList.add('hidden');
                        document.body.style.overflow = '';
                    }, 300);
                }

                if (registrarPagamentoBtn) registrarPagamentoBtn.addEventListener('click', abrirModal);
                if (fecharModalPagamento) fecharModalPagamento.addEventListener('click', fecharModal);
                if (cancelarModalPagamento) cancelarModalPagamento.addEventListener('click', fecharModal);

                if (modalRegistrarPagamento) {
                    modalRegistrarPagamento.addEventListener('click', function(e) {
                        if (e.target === modalRegistrarPagamento) {
                            fecharModal();
                        }
                    });

                    const form = modalRegistrarPagamento.querySelector('form');
                    if (form) {
                        form.addEventListener('submit', function(e) {
                            e.preventDefault();

                            // Coletar os dizimistas selecionados
                            const selecionados = Array.from(form.querySelectorAll('input[type="checkbox"]'))
                                .filter(cb => cb.checked && !cb.name); // Somente checkboxes de dizimistas

                            if (selecionados.length === 0) {
                                alert('Selecione pelo menos um dizimista!');
                                return;
                            }

                            // Aqui você processaria o registro dos pagamentos
                            alert(`${selecionados.length} dizimista(s) marcado(s) como pagos!`);
                            fecharModal();
                        });
                    }
                }

                // Gerar Relatório
                const gerarRelatorioBtn = document.getElementById('gerarRelatorioBtn');
                if (gerarRelatorioBtn) {
                    gerarRelatorioBtn.addEventListener('click', function() {
                        // Coletar dados para o relatório
                        const pagaram = document.querySelectorAll('.status-checkbox:checked').length;
                        const total = statusCheckboxes.length;
                        const naoPagaram = total - pagaram;

                        // Aqui você geraria e baixaria o relatório
                        alert(
                            `Gerando relatório:\nPagaram: ${pagaram}\nNão Pagaram: ${naoPagaram}\nTotal: ${total}\nTaxa: ${Math.round((pagaram/total)*100)}%`
                            );
                    });
                }

                // Filtro por Status
                const filtroStatus = document.getElementById('filtroStatus');
                if (filtroStatus) {
                    filtroStatus.addEventListener('change', function() {
                        const status = this.value;
                        const linhas = document.querySelectorAll('tbody tr');

                        linhas.forEach(linha => {
                            const statusCheckbox = linha.querySelector('.status-checkbox');
                            let mostrar = true;

                            if (status === 'pago' && !statusCheckbox.checked) {
                                mostrar = false;
                            } else if (status === 'nao-pago' && statusCheckbox.checked) {
                                mostrar = false;
                            }

                            if (mostrar) {
                                linha.style.display = '';
                            } else {
                                linha.style.display = 'none';
                            }
                        });
                    });
                }
            });
        </script>
    @endpush
@endsection
