<!-- eventos.blade.php -->
@extends('admin.index')

@section('main')
    <div class="p-6">
        <!-- Cabeçalho -->
        <div class="mb-8">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
                <div>
                    <h1 class="text-2xl lg:text-3xl font-bold text-gray-900">Calendário de Eventos</h1>
                    <p class="text-gray-600 mt-2">Gerencie todos os eventos da igreja e grupos</p>
                </div>
                <button id="novoEventoBtn"
                    class="mt-4 lg:mt-0 px-6 py-3 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-medium rounded-xl transition-all duration-300 shadow-sm hover:shadow-md flex items-center justify-center group">
                    <i class="fas fa-calendar-plus mr-2 group-hover:scale-110 transition-transform"></i> Novo Evento
                </button>
            </div>
        </div>

        <!-- Filtros e Visões -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 mb-8">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
                <!-- Filtros -->
                <div class="flex flex-wrap items-center gap-4">
                    <!-- Filtro por Tipo -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Tipo</label>
                        <select id="filtroTipo"
                            class="px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all">
                            <option value="todos">Todos os Eventos</option>
                            <option value="culto">Cultos</option>
                            <option value="celula">Células/Grupos</option>
                            <option value="especial">Eventos Especiais</option>
                            <option value="reuniao">Reuniões</option>
                            <option value="social">Eventos Sociais</option>
                        </select>
                    </div>

                    <!-- Filtro por Grupo -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Grupo</label>
                        <select id="filtroGrupo"
                            class="px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all">
                            <option value="todos">Todos os Grupos</option>
                            <option value="avivamento">Célula Avivamento</option>
                            <option value="fe-viva">Célula Fé Viva</option>
                            <option value="esperanca">Célula Esperança</option>
                            <option value="igreja">Igreja Central</option>
                        </select>
                    </div>

                    <!-- Filtro por Status -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                        <select id="filtroStatus"
                            class="px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all">
                            <option value="todos">Todos</option>
                            <option value="agendado">Agendados</option>
                            <option value="realizado">Realizados</option>
                            <option value="cancelado">Cancelados</option>
                        </select>
                    </div>

                    <!-- Botão Limpar Filtros -->
                    <div class="self-end">
                        <button id="limparFiltros"
                            class="px-4 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-xl transition-colors flex items-center">
                            <i class="fas fa-times mr-2"></i> Limpar
                        </button>
                    </div>
                </div>

                <!-- Visões -->
                <div class="flex items-center space-x-2">
                    <button id="viewCalendar" class="px-4 py-2.5 bg-red-600 text-white rounded-xl flex items-center">
                        <i class="fas fa-calendar-alt mr-2"></i> Calendário
                    </button>
                    <button id="viewList"
                        class="px-4 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-xl transition-colors flex items-center">
                        <i class="fas fa-list mr-2"></i> Lista
                    </button>
                    <button id="viewGrid"
                        class="px-4 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-xl transition-colors flex items-center">
                        <i class="fas fa-th-large mr-2"></i> Grid
                    </button>
                </div>
            </div>
        </div>

        <!-- Estatísticas -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm font-medium">Total de Eventos</p>
                        <p class="text-3xl font-bold text-gray-900 mt-2">48</p>
                    </div>
                    <div class="w-12 h-12 rounded-xl bg-red-50 flex items-center justify-center">
                        <i class="fas fa-calendar text-red-600 text-xl"></i>
                    </div>
                </div>
                <div class="mt-4">
                    <span class="text-green-600 text-sm font-medium flex items-center">
                        <i class="fas fa-arrow-up mr-1"></i> +8 este mês
                    </span>
                </div>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm font-medium">Próximos 7 Dias</p>
                        <p class="text-3xl font-bold text-gray-900 mt-2">12</p>
                    </div>
                    <div class="w-12 h-12 rounded-xl bg-blue-50 flex items-center justify-center">
                        <i class="fas fa-clock text-blue-600 text-xl"></i>
                    </div>
                </div>
                <div class="mt-4">
                    <span class="text-blue-600 text-sm font-medium">2 hoje</span>
                </div>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm font-medium">Participação Média</p>
                        <p class="text-3xl font-bold text-gray-900 mt-2">85%</p>
                    </div>
                    <div class="w-12 h-12 rounded-xl bg-green-50 flex items-center justify-center">
                        <i class="fas fa-users text-green-600 text-xl"></i>
                    </div>
                </div>
                <div class="mt-4">
                    <span class="text-green-600 text-sm font-medium flex items-center">
                        <i class="fas fa-arrow-up mr-1"></i> +5% vs mês anterior
                    </span>
                </div>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm font-medium">Taxa de Cancelamento</p>
                        <p class="text-3xl font-bold text-gray-900 mt-2">3%</p>
                    </div>
                    <div class="w-12 h-12 rounded-xl bg-yellow-50 flex items-center justify-center">
                        <i class="fas fa-exclamation-triangle text-yellow-600 text-xl"></i>
                    </div>
                </div>
                <div class="mt-4">
                    <span class="text-green-600 text-sm font-medium flex items-center">
                        <i class="fas fa-arrow-down mr-1"></i> -2% vs último mês
                    </span>
                </div>
            </div>
        </div>

        <!-- Conteúdo - Calendário (Visível por padrão) -->
        <div id="view-calendar" class="space-y-6">
            <!-- Cabeçalho do Calendário -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
                    <div class="flex items-center space-x-4">
                        <button id="prevMonth"
                            class="w-10 h-10 rounded-lg bg-gray-100 hover:bg-gray-200 flex items-center justify-center">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <h2 class="text-xl font-bold text-gray-900" id="currentMonth">Março 2024</h2>
                        <button id="nextMonth"
                            class="w-10 h-10 rounded-lg bg-gray-100 hover:bg-gray-200 flex items-center justify-center">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                        <button id="todayBtn"
                            class="px-4 py-2 bg-red-50 hover:bg-red-100 text-red-700 rounded-xl transition-colors">
                            Hoje
                        </button>
                    </div>
                    <div class="mt-4 lg:mt-0">
                        <span class="text-sm text-gray-600">
                            <i class="fas fa-circle text-red-500 mr-1 text-xs"></i> Cultos
                            <i class="fas fa-circle text-blue-500 mx-2 text-xs"></i> Células
                            <i class="fas fa-circle text-green-500 mx-2 text-xs"></i> Especiais
                            <i class="fas fa-circle text-purple-500 mx-2 text-xs"></i> Reuniões
                        </span>
                    </div>
                </div>
            </div>

            <!-- Calendário -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <!-- Dias da Semana -->
                <div class="grid grid-cols-7 border-b border-gray-100">
                    <div class="py-4 text-center text-sm font-semibold text-gray-700">Dom</div>
                    <div class="py-4 text-center text-sm font-semibold text-gray-700">Seg</div>
                    <div class="py-4 text-center text-sm font-semibold text-gray-700">Ter</div>
                    <div class="py-4 text-center text-sm font-semibold text-gray-700">Qua</div>
                    <div class="py-4 text-center text-sm font-semibold text-gray-700">Qui</div>
                    <div class="py-4 text-center text-sm font-semibold text-gray-700">Sex</div>
                    <div class="py-4 text-center text-sm font-semibold text-gray-700">Sáb</div>
                </div>

                <!-- Dias do Mês -->
                <div class="grid grid-cols-7">
                    <!-- Dias vazios do início -->
                    <div class="min-h-[120px] border-r border-b border-gray-100 p-2 bg-gray-50"></div>
                    <div class="min-h-[120px] border-r border-b border-gray-100 p-2 bg-gray-50"></div>
                    <div class="min-h-[120px] border-r border-b border-gray-100 p-2 bg-gray-50"></div>
                    <div class="min-h-[120px] border-r border-b border-gray-100 p-2 bg-gray-50"></div>

                    <!-- Dia 1 -->
                    <div class="min-h-[120px] border-r border-b border-gray-100 p-2 relative">
                        <div class="text-right">
                            <span class="inline-flex w-6 h-6 items-center justify-center text-sm text-gray-500">1</span>
                        </div>
                        <div class="mt-1 space-y-1">
                            <div class="text-xs px-2 py-1 rounded bg-red-100 text-red-800 truncate cursor-pointer hover:bg-red-200 transition-colors"
                                data-event="1">
                                Culto de Domingo
                            </div>
                        </div>
                    </div>

                    <!-- Dia 2 -->
                    <div class="min-h-[120px] border-r border-b border-gray-100 p-2 relative">
                        <div class="text-right">
                            <span class="inline-flex w-6 h-6 items-center justify-center text-sm text-gray-500">2</span>
                        </div>
                    </div>

                    <!-- Dia 3 -->
                    <div class="min-h-[120px] border-r border-b border-gray-100 p-2 relative">
                        <div class="text-right">
                            <span class="inline-flex w-6 h-6 items-center justify-center text-sm text-gray-500">3</span>
                        </div>
                    </div>

                    <!-- Dia 4 (Dia atual) -->
                    <div class="min-h-[120px] border-r border-b border-gray-100 p-2 relative bg-red-50/30">
                        <div class="text-right">
                            <span
                                class="inline-flex w-6 h-6 items-center justify-center text-sm bg-red-600 text-white rounded-full">4</span>
                        </div>
                        <div class="mt-1 space-y-1">
                            <div class="text-xs px-2 py-1 rounded bg-blue-100 text-blue-800 truncate cursor-pointer hover:bg-blue-200 transition-colors"
                                data-event="2">
                                Reunião de Líderes
                            </div>
                        </div>
                    </div>

                    <!-- Continue com mais dias... -->
                    <!-- Dia 5 -->
                    <div class="min-h-[120px] border-r border-b border-gray-100 p-2 relative">
                        <div class="text-right">
                            <span class="inline-flex w-6 h-6 items-center justify-center text-sm text-gray-500">5</span>
                        </div>
                    </div>

                    <!-- Dia 6 -->
                    <div class="min-h-[120px] border-r border-b border-gray-100 p-2 relative">
                        <div class="text-right">
                            <span class="inline-flex w-6 h-6 items-center justify-center text-sm text-gray-500">6</span>
                        </div>
                    </div>

                    <!-- Dia 7 -->
                    <div class="min-h-[120px] border-r border-b border-gray-100 p-2 relative">
                        <div class="text-right">
                            <span class="inline-flex w-6 h-6 items-center justify-center text-sm text-gray-500">7</span>
                        </div>
                    </div>

                    <!-- Dia 8 -->
                    <div class="min-h-[120px] border-r border-b border-gray-100 p-2 relative">
                        <div class="text-right">
                            <span class="inline-flex w-6 h-6 items-center justify-center text-sm text-gray-500">8</span>
                        </div>
                    </div>

                    <!-- Dia 9 -->
                    <div class="min-h-[120px] border-r border-b border-gray-100 p-2 relative">
                        <div class="text-right">
                            <span class="inline-flex w-6 h-6 items-center justify-center text-sm text-gray-500">9</span>
                        </div>
                    </div>

                    <!-- Dia 10 -->
                    <div class="min-h-[120px] border-r border-b border-gray-100 p-2 relative">
                        <div class="text-right">
                            <span class="inline-flex w-6 h-6 items-center justify-center text-sm text-gray-500">10</span>
                        </div>
                        <div class="mt-1 space-y-1">
                            <div class="text-xs px-2 py-1 rounded bg-red-100 text-red-800 truncate cursor-pointer hover:bg-red-200 transition-colors"
                                data-event="3">
                                Culto Especial
                            </div>
                        </div>
                    </div>

                    <!-- Dia 11 -->
                    <div class="min-h-[120px] border-r border-b border-gray-100 p-2 relative">
                        <div class="text-right">
                            <span class="inline-flex w-6 h-6 items-center justify-center text-sm text-gray-500">11</span>
                        </div>
                    </div>

                    <!-- Dia 12 -->
                    <div class="min-h-[120px] border-r border-b border-gray-100 p-2 relative">
                        <div class="text-right">
                            <span class="inline-flex w-6 h-6 items-center justify-center text-sm text-gray-500">12</span>
                        </div>
                    </div>

                    <!-- Dia 13 -->
                    <div class="min-h-[120px] border-r border-b border-gray-100 p-2 relative">
                        <div class="text-right">
                            <span class="inline-flex w-6 h-6 items-center justify-center text-sm text-gray-500">13</span>
                        </div>
                    </div>

                    <!-- Dia 14 -->
                    <div class="min-h-[120px] border-r border-b border-gray-100 p-2 relative">
                        <div class="text-right">
                            <span class="inline-flex w-6 h-6 items-center justify-center text-sm text-gray-500">14</span>
                        </div>
                    </div>

                    <!-- Dia 15 -->
                    <div class="min-h-[120px] border-r border-b border-gray-100 p-2 relative">
                        <div class="text-right">
                            <span class="inline-flex w-6 h-6 items-center justify-center text-sm text-gray-500">15</span>
                        </div>
                    </div>

                    <!-- Dia 16 -->
                    <div class="min-h-[120px] border-r border-b border-gray-100 p-2 relative">
                        <div class="text-right">
                            <span class="inline-flex w-6 h-6 items-center justify-center text-sm text-gray-500">16</span>
                        </div>
                    </div>

                    <!-- Dia 17 -->
                    <div class="min-h-[120px] border-r border-b border-gray-100 p-2 relative">
                        <div class="text-right">
                            <span class="inline-flex w-6 h-6 items-center justify-center text-sm text-gray-500">17</span>
                        </div>
                    </div>

                    <!-- Dia 18 -->
                    <div class="min-h-[120px] border-r border-b border-gray-100 p-2 relative">
                        <div class="text-right">
                            <span class="inline-flex w-6 h-6 items-center justify-center text-sm text-gray-500">18</span>
                        </div>
                    </div>

                    <!-- Dia 19 -->
                    <div class="min-h-[120px] border-r border-b border-gray-100 p-2 relative">
                        <div class="text-right">
                            <span class="inline-flex w-6 h-6 items-center justify-center text-sm text-gray-500">19</span>
                        </div>
                    </div>

                    <!-- Dia 20 -->
                    <div class="min-h-[120px] border-r border-b border-gray-100 p-2 relative">
                        <div class="text-right">
                            <span class="inline-flex w-6 h-6 items-center justify-center text-sm text-gray-500">20</span>
                        </div>
                    </div>

                    <!-- Dia 21 -->
                    <div class="min-h-[120px] border-r border-b border-gray-100 p-2 relative">
                        <div class="text-right">
                            <span class="inline-flex w-6 h-6 items-center justify-center text-sm text-gray-500">21</span>
                        </div>
                    </div>

                    <!-- Dia 22 -->
                    <div class="min-h-[120px] border-r border-b border-gray-100 p-2 relative">
                        <div class="text-right">
                            <span class="inline-flex w-6 h-6 items-center justify-center text-sm text-gray-500">22</span>
                        </div>
                    </div>

                    <!-- Dia 23 -->
                    <div class="min-h-[120px] border-r border-b border-gray-100 p-2 relative">
                        <div class="text-right">
                            <span class="inline-flex w-6 h-6 items-center justify-center text-sm text-gray-500">23</span>
                        </div>
                    </div>

                    <!-- Dia 24 -->
                    <div class="min-h-[120px] border-r border-b border-gray-100 p-2 relative">
                        <div class="text-right">
                            <span class="inline-flex w-6 h-6 items-center justify-center text-sm text-gray-500">24</span>
                        </div>
                    </div>

                    <!-- Dia 25 (Evento importante) -->
                    <div class="min-h-[120px] border-r border-b border-gray-100 p-2 relative">
                        <div class="text-right">
                            <span
                                class="inline-flex w-6 h-6 items-center justify-center text-sm font-medium text-gray-900">25</span>
                        </div>
                        <div class="mt-1 space-y-1">
                            <div class="text-xs px-2 py-1 rounded bg-green-100 text-green-800 truncate cursor-pointer hover:bg-green-200 transition-colors"
                                data-event="4">
                                Conferência Anual
                            </div>
                            <div class="text-xs px-2 py-1 rounded bg-blue-100 text-blue-800 truncate cursor-pointer hover:bg-blue-200 transition-colors"
                                data-event="5">
                                Célula Avivamento
                            </div>
                        </div>
                    </div>

                    <!-- Continue até o final do mês... -->
                    <!-- Dias restantes simplificados -->
                    <div class="min-h-[120px] border-r border-b border-gray-100 p-2 relative">
                        <div class="text-right">
                            <span class="inline-flex w-6 h-6 items-center justify-center text-sm text-gray-500">26</span>
                        </div>
                    </div>
                    <div class="min-h-[120px] border-r border-b border-gray-100 p-2 relative">
                        <div class="text-right">
                            <span class="inline-flex w-6 h-6 items-center justify-center text-sm text-gray-500">27</span>
                        </div>
                    </div>
                    <div class="min-h-[120px] border-r border-b border-gray-100 p-2 relative">
                        <div class="text-right">
                            <span class="inline-flex w-6 h-6 items-center justify-center text-sm text-gray-500">28</span>
                        </div>
                    </div>
                    <div class="min-h-[120px] border-r border-b border-gray-100 p-2 relative">
                        <div class="text-right">
                            <span class="inline-flex w-6 h-6 items-center justify-center text-sm text-gray-500">29</span>
                        </div>
                    </div>
                    <div class="min-h-[120px] border-r border-b border-gray-100 p-2 relative">
                        <div class="text-right">
                            <span class="inline-flex w-6 h-6 items-center justify-center text-sm text-gray-500">30</span>
                        </div>
                    </div>
                    <div class="min-h-[120px] border-r border-b border-gray-100 p-2 relative">
                        <div class="text-right">
                            <span class="inline-flex w-6 h-6 items-center justify-center text-sm text-gray-500">31</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Eventos do Dia -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-6">
                    <i class="fas fa-calendar-day text-red-600 mr-2"></i> Eventos de Hoje (04/03/2024)
                </h3>

                <div class="space-y-4">
                    <!-- Evento 1 -->
                    <div
                        class="flex items-start p-4 border border-gray-200 rounded-xl hover:border-red-300 transition-colors">
                        <div class="w-12 h-12 rounded-xl bg-blue-50 flex items-center justify-center mr-4">
                            <i class="fas fa-users text-blue-600 text-lg"></i>
                        </div>
                        <div class="flex-1">
                            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
                                <div>
                                    <h4 class="font-semibold text-gray-900">Reunião de Líderes</h4>
                                    <p class="text-sm text-gray-600 mt-1">Planejamento mensal das células</p>
                                </div>
                                <div class="mt-2 lg:mt-0">
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                                        <i class="fas fa-clock mr-1 text-xs"></i> 19:00 - 21:00
                                    </span>
                                </div>
                            </div>
                            <div class="mt-3 flex flex-wrap items-center gap-2">
                                <span
                                    class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-gray-100 text-gray-800">
                                    <i class="fas fa-church mr-1 text-xs"></i> Igreja Central
                                </span>
                                <span
                                    class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-purple-100 text-purple-800">
                                    <i class="fas fa-user-friends mr-1 text-xs"></i> 8 confirmados
                                </span>
                            </div>
                        </div>
                        <div class="ml-4">
                            <div class="flex space-x-2">
                                <button
                                    class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-100 transition-colors flex items-center justify-center">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button
                                    class="w-8 h-8 rounded-lg bg-green-50 text-green-600 hover:bg-green-100 transition-colors flex items-center justify-center">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Evento 2 -->
                    <div
                        class="flex items-start p-4 border border-gray-200 rounded-xl hover:border-red-300 transition-colors">
                        <div class="w-12 h-12 rounded-xl bg-red-50 flex items-center justify-center mr-4">
                            <i class="fas fa-pray text-red-600 text-lg"></i>
                        </div>
                        <div class="flex-1">
                            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
                                <div>
                                    <h4 class="font-semibold text-gray-900">Encontro de Oração</h4>
                                    <p class="text-sm text-gray-600 mt-1">Momento especial de intercessão</p>
                                </div>
                                <div class="mt-2 lg:mt-0">
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                        <i class="fas fa-clock mr-1 text-xs"></i> 20:00 - 21:00
                                    </span>
                                </div>
                            </div>
                            <div class="mt-3 flex flex-wrap items-center gap-2">
                                <span
                                    class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-gray-100 text-gray-800">
                                    <i class="fas fa-home mr-1 text-xs"></i> Sala de Oração
                                </span>
                                <span
                                    class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-purple-100 text-purple-800">
                                    <i class="fas fa-user-friends mr-1 text-xs"></i> Aberto a todos
                                </span>
                            </div>
                        </div>
                        <div class="ml-4">
                            <div class="flex space-x-2">
                                <button
                                    class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-100 transition-colors flex items-center justify-center">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button
                                    class="w-8 h-8 rounded-lg bg-green-50 text-green-600 hover:bg-green-100 transition-colors flex items-center justify-center">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Conteúdo - Lista (Escondido por padrão) -->
        <div id="view-list" class="hidden space-y-6">
            <!-- Busca Avançada -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <div class="flex-1">
                        <div class="relative">
                            <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                            <input type="text" placeholder="Buscar eventos..."
                                class="w-full pl-12 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all">
                        </div>
                    </div>
                    <div class="flex items-center space-x-3">
                        <button
                            class="px-4 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-xl transition-colors flex items-center">
                            <i class="fas fa-sort mr-2"></i> Ordenar
                        </button>
                    </div>
                </div>
            </div>

            <!-- Lista de Eventos -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Evento</th>
                                <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Data/Hora</th>
                                <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Local/Grupo</th>
                                <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Tipo</th>
                                <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Status</th>
                                <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Participantes</th>
                                <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Ações</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            <!-- Evento 1 -->
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="py-4 px-6">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 rounded-xl bg-red-50 flex items-center justify-center mr-3">
                                            <i class="fas fa-church text-red-600"></i>
                                        </div>
                                        <div>
                                            <p class="font-medium text-gray-900">Culto de Domingo</p>
                                            <p class="text-sm text-gray-500">Culto principal da semana</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="space-y-1">
                                        <span class="block text-gray-700">01/03/2024</span>
                                        <span class="block text-sm text-gray-500">09:00 - 11:00</span>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <span class="text-gray-700">Igreja Central</span>
                                </td>
                                <td class="py-4 px-6">
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800">
                                        Culto
                                    </span>
                                </td>
                                <td class="py-4 px-6">
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                        Realizado
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
                                        <span class="font-medium">120</span>
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
                                        <button
                                            class="w-8 h-8 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 transition-colors flex items-center justify-center">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Evento 2 -->
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="py-4 px-6">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center mr-3">
                                            <i class="fas fa-users text-blue-600"></i>
                                        </div>
                                        <div>
                                            <p class="font-medium text-gray-900">Reunião de Líderes</p>
                                            <p class="text-sm text-gray-500">Planejamento mensal</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="space-y-1">
                                        <span class="block text-gray-700">04/03/2024</span>
                                        <span class="block text-sm text-gray-500">19:00 - 21:00</span>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <span class="text-gray-700">Igreja Central</span>
                                </td>
                                <td class="py-4 px-6">
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                                        Reunião
                                    </span>
                                </td>
                                <td class="py-4 px-6">
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800">
                                        Agendado
                                    </span>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="flex items-center">
                                        <div class="flex -space-x-2 mr-3">
                                            <div
                                                class="w-8 h-8 rounded-full bg-gradient-to-br from-red-400 to-red-600 border-2 border-white">
                                            </div>
                                            <div
                                                class="w-8 h-8 rounded-full bg-gradient-to-br from-purple-400 to-purple-600 border-2 border-white">
                                            </div>
                                            <div
                                                class="w-8 h-8 rounded-full bg-gradient-to-br from-blue-400 to-blue-600 border-2 border-white">
                                            </div>
                                        </div>
                                        <span class="font-medium">8</span>
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
                                        <button
                                            class="w-8 h-8 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 transition-colors flex items-center justify-center">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Evento 3 -->
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="py-4 px-6">
                                    <div class="flex items-center">
                                        <div
                                            class="w-10 h-10 rounded-xl bg-green-50 flex items-center justify-center mr-3">
                                            <i class="fas fa-star text-green-600"></i>
                                        </div>
                                        <div>
                                            <p class="font-medium text-gray-900">Conferência Anual</p>
                                            <p class="text-sm text-gray-500">Conferência de avivamento</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="space-y-1">
                                        <span class="block text-gray-700">25/03/2024</span>
                                        <span class="block text-sm text-gray-500">19:00 - 22:00</span>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <span class="text-gray-700">Auditório Principal</span>
                                </td>
                                <td class="py-4 px-6">
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                        Especial
                                    </span>
                                </td>
                                <td class="py-4 px-6">
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800">
                                        Agendado
                                    </span>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="flex items-center">
                                        <span class="font-medium">250 esperados</span>
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
                        Mostrando 1-3 de 48 eventos
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
                            class="w-10 h-10 rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-700 flex items-center justify-center">16</button>
                        <button
                            class="w-10 h-10 rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-700 flex items-center justify-center">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Conteúdo - Grid (Escondido por padrão) -->
        <div id="view-grid" class="hidden">
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
                <!-- Card Evento 1 -->
                <div
                    class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-shadow duration-300">
                    <div class="h-2 bg-red-500"></div>
                    <div class="p-6">
                        <div class="flex items-start justify-between mb-4">
                            <div class="w-12 h-12 rounded-xl bg-red-50 flex items-center justify-center">
                                <i class="fas fa-church text-red-600 text-lg"></i>
                            </div>
                            <span
                                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                Realizado
                            </span>
                        </div>

                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Culto de Domingo</h3>
                        <p class="text-gray-600 text-sm mb-4">Culto principal da semana com louvor e palavra.</p>

                        <div class="space-y-3 mb-6">
                            <div class="flex items-center text-gray-700">
                                <i class="fas fa-calendar-day text-gray-400 mr-3 w-5"></i>
                                <span>01/03/2024</span>
                            </div>
                            <div class="flex items-center text-gray-700">
                                <i class="fas fa-clock text-gray-400 mr-3 w-5"></i>
                                <span>09:00 - 11:00</span>
                            </div>
                            <div class="flex items-center text-gray-700">
                                <i class="fas fa-map-marker-alt text-gray-400 mr-3 w-5"></i>
                                <span>Igreja Central</span>
                            </div>
                        </div>

                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="flex -space-x-2">
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
                                <span class="ml-2 text-sm text-gray-600">120 participantes</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <button
                                    class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-100 transition-colors flex items-center justify-center">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card Evento 2 -->
                <div
                    class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-shadow duration-300">
                    <div class="h-2 bg-blue-500"></div>
                    <div class="p-6">
                        <div class="flex items-start justify-between mb-4">
                            <div class="w-12 h-12 rounded-xl bg-blue-50 flex items-center justify-center">
                                <i class="fas fa-users text-blue-600 text-lg"></i>
                            </div>
                            <span
                                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800">
                                Agendado
                            </span>
                        </div>

                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Reunião de Líderes</h3>
                        <p class="text-gray-600 text-sm mb-4">Planejamento mensal das células e ministérios.</p>

                        <div class="space-y-3 mb-6">
                            <div class="flex items-center text-gray-700">
                                <i class="fas fa-calendar-day text-gray-400 mr-3 w-5"></i>
                                <span>04/03/2024</span>
                            </div>
                            <div class="flex items-center text-gray-700">
                                <i class="fas fa-clock text-gray-400 mr-3 w-5"></i>
                                <span>19:00 - 21:00</span>
                            </div>
                            <div class="flex items-center text-gray-700">
                                <i class="fas fa-map-marker-alt text-gray-400 mr-3 w-5"></i>
                                <span>Sala de Reuniões</span>
                            </div>
                        </div>

                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="flex -space-x-2">
                                    <div
                                        class="w-8 h-8 rounded-full bg-gradient-to-br from-red-400 to-red-600 border-2 border-white">
                                    </div>
                                    <div
                                        class="w-8 h-8 rounded-full bg-gradient-to-br from-purple-400 to-purple-600 border-2 border-white">
                                    </div>
                                </div>
                                <span class="ml-2 text-sm text-gray-600">8 confirmados</span>
                            </div>
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
                        </div>
                    </div>
                </div>

                <!-- Card Evento 3 -->
                <div
                    class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-shadow duration-300">
                    <div class="h-2 bg-green-500"></div>
                    <div class="p-6">
                        <div class="flex items-start justify-between mb-4">
                            <div class="w-12 h-12 rounded-xl bg-green-50 flex items-center justify-center">
                                <i class="fas fa-star text-green-600 text-lg"></i>
                            </div>
                            <span
                                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800">
                                Agendado
                            </span>
                        </div>

                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Conferência Anual</h3>
                        <p class="text-gray-600 text-sm mb-4">Conferência de avivamento com preletor convidado.</p>

                        <div class="space-y-3 mb-6">
                            <div class="flex items-center text-gray-700">
                                <i class="fas fa-calendar-day text-gray-400 mr-3 w-5"></i>
                                <span>25/03/2024</span>
                            </div>
                            <div class="flex items-center text-gray-700">
                                <i class="fas fa-clock text-gray-400 mr-3 w-5"></i>
                                <span>19:00 - 22:00</span>
                            </div>
                            <div class="flex items-center text-gray-700">
                                <i class="fas fa-map-marker-alt text-gray-400 mr-3 w-5"></i>
                                <span>Auditório Principal</span>
                            </div>
                        </div>

                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <span class="text-sm text-gray-600">250 esperados</span>
                            </div>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Novo Evento -->
    <div id="modalNovoEvento"
        class="fixed inset-0 bg-black backdrop-blur-sm bg-opacity-50 z-50 hidden items-center justify-center p-4">
        <div
            class="bg-white rounded-2xl w-full max-w-2xl max-h-[90vh] overflow-y-auto transform transition-all duration-300 scale-95 opacity-0">
            <div class="sticky top-0 bg-white p-6 border-b border-gray-100 z-10">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-xl font-bold text-gray-900">Criar Novo Evento</h2>
                        <p class="text-gray-600 mt-1">Preencha os dados do novo evento</p>
                    </div>
                    <button id="fecharModalNovoEvento"
                        class="w-10 h-10 rounded-lg hover:bg-gray-100 flex items-center justify-center transition-colors">
                        <i class="fas fa-times text-gray-500"></i>
                    </button>
                </div>
            </div>

            <form class="p-6">
                <div class="space-y-6">
                    <!-- Informações Básicas -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Informações Básicas</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Título do Evento *</label>
                                <input type="text"
                                    class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all"
                                    placeholder="Ex: Culto de Domingo">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Tipo de Evento *</label>
                                <select
                                    class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all">
                                    <option value="">Selecione o tipo</option>
                                    <option value="culto">Culto</option>
                                    <option value="celula">Célula/Grupo</option>
                                    <option value="reuniao">Reunião</option>
                                    <option value="especial">Evento Especial</option>
                                    <option value="social">Evento Social</option>
                                    <option value="oracao">Encontro de Oração</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Grupo/Responsável</label>
                                <select
                                    class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all">
                                    <option value="">Selecione</option>
                                    <option value="igreja">Igreja Central</option>
                                    <option value="avivamento">Célula Avivamento</option>
                                    <option value="fe-viva">Célula Fé Viva</option>
                                    <option value="esperanca">Célula Esperança</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                                <select
                                    class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all">
                                    <option value="agendado">Agendado</option>
                                    <option value="confirmado">Confirmado</option>
                                    <option value="realizado">Realizado</option>
                                    <option value="cancelado">Cancelado</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Data e Hora -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Data e Hora</h3>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Data do Evento *</label>
                                <input type="date"
                                    class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Hora de Início *</label>
                                <input type="time"
                                    class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Hora de Término *</label>
                                <input type="time"
                                    class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all">
                            </div>
                        </div>
                    </div>

                    <!-- Descrição -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Descrição</h3>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Descrição do Evento</label>
                            <textarea rows="4"
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all"
                                placeholder="Descreva o evento, programação, objetivos..."></textarea>
                        </div>
                    </div>


                </div>

                <div class="mt-8 pt-6 border-t border-gray-100 flex justify-end space-x-4">
                    <button type="button" id="cancelarModalNovoEvento"
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
            .calendar-day {
                min-height: 120px;
                border-right: 1px solid #e5e7eb;
                border-bottom: 1px solid #e5e7eb;
                padding: 8px;
                position: relative;
            }

            .calendar-day:hover {
                background-color: #f9fafb;
            }

            .calendar-day.today {
                background-color: #fef2f2;
            }

            .event-dot {
                width: 8px;
                height: 8px;
                border-radius: 50%;
                display: inline-block;
                margin-right: 4px;
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
            document.addEventListener('DOMContentLoaded', function() {
                // Controle das Views (Calendário/Lista/Grid)
                const viewCalendarBtn = document.getElementById('viewCalendar');
                const viewListBtn = document.getElementById('viewList');
                const viewGridBtn = document.getElementById('viewGrid');
                const viewCalendar = document.getElementById('view-calendar');
                const viewList = document.getElementById('view-list');
                const viewGrid = document.getElementById('view-grid');

                function alternarView(viewAtiva) {
                    // Resetar todos os botões
                    [viewCalendarBtn, viewListBtn, viewGridBtn].forEach(btn => {
                        btn.classList.remove('bg-red-600', 'text-white');
                        btn.classList.add('bg-gray-100', 'text-gray-700', 'hover:bg-gray-200');
                    });

                    // Esconder todas as views
                    [viewCalendar, viewList, viewGrid].forEach(view => {
                        view.classList.add('hidden');
                    });

                    // Ativar view selecionada
                    if (viewAtiva === 'calendar') {
                        viewCalendarBtn.classList.remove('bg-gray-100', 'text-gray-700', 'hover:bg-gray-200');
                        viewCalendarBtn.classList.add('bg-red-600', 'text-white');
                        viewCalendar.classList.remove('hidden');
                    } else if (viewAtiva === 'list') {
                        viewListBtn.classList.remove('bg-gray-100', 'text-gray-700', 'hover:bg-gray-200');
                        viewListBtn.classList.add('bg-red-600', 'text-white');
                        viewList.classList.remove('hidden');
                    } else if (viewAtiva === 'grid') {
                        viewGridBtn.classList.remove('bg-gray-100', 'text-gray-700', 'hover:bg-gray-200');
                        viewGridBtn.classList.add('bg-red-600', 'text-white');
                        viewGrid.classList.remove('hidden');
                    }
                }

                viewCalendarBtn.addEventListener('click', () => alternarView('calendar'));
                viewListBtn.addEventListener('click', () => alternarView('list'));
                viewGridBtn.addEventListener('click', () => alternarView('grid'));

                // Iniciar com calendário
                alternarView('calendar');

                // Controle do Calendário
                const currentMonthEl = document.getElementById('currentMonth');
                const prevMonthBtn = document.getElementById('prevMonth');
                const nextMonthBtn = document.getElementById('nextMonth');
                const todayBtn = document.getElementById('todayBtn');

                let currentDate = new Date();

                function atualizarCalendario() {
                    const options = {
                        month: 'long',
                        year: 'numeric'
                    };
                    currentMonthEl.textContent = currentDate.toLocaleDateString('pt-BR', options).replace(' de', '')
                        .replace(/^\w/, c => c.toUpperCase());

                    // Aqui você implementaria a lógica para atualizar os dias do calendário
                    // Esta é uma versão simplificada
                }

                prevMonthBtn.addEventListener('click', function() {
                    currentDate.setMonth(currentDate.getMonth() - 1);
                    atualizarCalendario();
                });

                nextMonthBtn.addEventListener('click', function() {
                    currentDate.setMonth(currentDate.getMonth() + 1);
                    atualizarCalendario();
                });

                todayBtn.addEventListener('click', function() {
                    currentDate = new Date();
                    atualizarCalendario();
                });

                // Clique em eventos no calendário
                document.querySelectorAll('[data-event]').forEach(eventEl => {
                    eventEl.addEventListener('click', function() {
                        const eventId = this.getAttribute('data-event');
                        // Aqui você abriria um modal com os detalhes do evento
                        alert(`Visualizando evento ${eventId}`);
                    });
                });

                // Filtros
                const filtroTipo = document.getElementById('filtroTipo');
                const filtroGrupo = document.getElementById('filtroGrupo');
                const filtroStatus = document.getElementById('filtroStatus');
                const limparFiltros = document.getElementById('limparFiltros');

                function aplicarFiltros() {
                    const tipo = filtroTipo.value;
                    const grupo = filtroGrupo.value;
                    const status = filtroStatus.value;

                    // Aqui você implementaria a lógica para filtrar os eventos
                    console.log('Filtrando por:', {
                        tipo,
                        grupo,
                        status
                    });
                }

                filtroTipo.addEventListener('change', aplicarFiltros);
                filtroGrupo.addEventListener('change', aplicarFiltros);
                filtroStatus.addEventListener('change', aplicarFiltros);

                limparFiltros.addEventListener('click', function() {
                    filtroTipo.value = 'todos';
                    filtroGrupo.value = 'todos';
                    filtroStatus.value = 'todos';
                    aplicarFiltros();
                });

                // Modal Novo Evento
                const novoEventoBtn = document.getElementById('novoEventoBtn');
                const modalNovoEvento = document.getElementById('modalNovoEvento');
                const fecharModalNovoEvento = document.getElementById('fecharModalNovoEvento');
                const cancelarModalNovoEvento = document.getElementById('cancelarModalNovoEvento');
                const modalContent = modalNovoEvento?.querySelector('.transform');

                function abrirModal() {
                    modalNovoEvento.classList.remove('hidden');
                    modalNovoEvento.classList.add('flex');
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
                        modalNovoEvento.classList.remove('flex');
                        modalNovoEvento.classList.add('hidden');
                        document.body.style.overflow = '';
                    }, 300);
                }

                if (novoEventoBtn) novoEventoBtn.addEventListener('click', abrirModal);
                if (fecharModalNovoEvento) fecharModalNovoEvento.addEventListener('click', fecharModal);
                if (cancelarModalNovoEvento) cancelarModalNovoEvento.addEventListener('click', fecharModal);

                if (modalNovoEvento) {
                    modalNovoEvento.addEventListener('click', function(e) {
                        if (e.target === modalNovoEvento) {
                            fecharModal();
                        }
                    });

                    const form = modalNovoEvento.querySelector('form');
                    if (form) {
                        form.addEventListener('submit', function(e) {
                            e.preventDefault();
                            // Aqui você adicionaria a lógica para salvar o evento
                            alert('Evento criado com sucesso!');
                            fecharModal();
                        });
                    }
                }

                // Inicializar calendário
                atualizarCalendario();
            });
        </script>
    @endpush
@endsection
