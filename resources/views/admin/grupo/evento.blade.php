<!-- detalhes-evento.blade.php -->
@extends('admin.index')

@section('main')
    <div class="p-6">
        <!-- Breadcrumb -->
        <div class="mb-8">


            <!-- Cabeçalho do Evento -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
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
                                        <h1 class="text-2xl lg:text-3xl font-bold text-gray-900">{{ $evento->titulo }}
                                        </h1>
                                        <div class="flex flex-wrap items-center gap-2 mt-2">

                                            <span
                                                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800 border border-blue-200">
                                                <i class="fas fa-users mr-1"></i> {{ $presentes }} presentes
                                            </span>
                                            <span
                                                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-purple-100 text-purple-800 border border-purple-200">
                                                <i class="fas fa-coins mr-1"></i> {{ number_format($total_ofertas, 2, '.', ',') }}
                                                MT coletado
                                            </span>
                                        </div>
                                    </div>
                                    <div class="mt-4 lg:mt-0">
                                        <span
                                            class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800 border border-red-200">
                                            <i class="fas fa-calendar-day mr-1"></i>
                                            <span>{{ \Carbon\Carbon::parse($evento->data)->format('d/m/Y') }}</span>
                                        </span>
                                    </div>
                                </div>

                                <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div class="flex items-center text-gray-600">
                                        <i class="fas fa-clock text-blue-600 mr-3 w-5"></i>
                                        <span>{{ \Carbon\Carbon::parse($evento->hora_inicio)->format('H:i') }} -
                                            {{ \Carbon\Carbon::parse($evento->hora_fim)->format('H:i') }}</span>
                                    </div>
                                    <div class="flex items-center text-gray-600">
                                        <i class="fas fa-map-marker-alt text-red-600 mr-3 w-5"></i>
                                        <span>{{ $evento->local }}</span>
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
                        <span
                            class="ml-2 bg-red-100 text-red-800 text-xs px-2 py-0.5 rounded-full">{{ $presentes }}</span>
                    </button>

                    <!-- Tab Ofertas -->
                    <button id="tab-ofertas"
                        class="tab-button py-4 px-1 border-b-2 font-medium text-sm transition-all duration-300 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap flex items-center group">
                        <div
                            class="w-8 h-8 rounded-lg bg-gray-100 flex items-center justify-center mr-3 group-hover:bg-gray-200 transition-colors">
                            <i class="fas fa-hand-holding-usd text-gray-600"></i>
                        </div>
                        <span>Ofertas</span>
                        <span
                            class="ml-2 bg-gray-100 text-gray-800 text-xs px-2 py-0.5 rounded-full">{{ number_format($total_ofertas, 2, '.', ',') }}
                            MT</span>
                    </button>


                </nav>
            </div>
        </div>

        <!-- Conteúdo da Tab Presenças -->
        <div id="conteudo-presencas" class="space-y-6">


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
                                <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Presença</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">


                            @foreach ($presenca as $item)
                                <!-- Membro 3 - Ausente -->
                                <tr class="hover:bg-red-50/30 transition-colors duration-200">
                                    <td class="py-4 px-6">
                                        <div class="flex items-center">
                                            <div
                                                class="w-10 h-10 rounded-full bg-gradient-to-br from-blue-600 to-blue-800 flex items-center justify-center text-white font-semibold mr-3 shadow-md">
                                                {{ $item['data']->nome[0] }}
                                            </div>
                                            <div>
                                                <p class="font-medium text-gray-900"> {{ $item['data']->nome }}</p>
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
                                        <div class="flex items-center">
                                            @if ($item->status)
                                                <a href="{{ route('admin.grupo.evento.presenca', [$evento->grupo->id, $evento->id, $item->id]) }}"
                                                    class="relative">
                                                    <label for="presenca-4" class="flex items-center cursor-pointer">
                                                        <div
                                                            class="w-10 h-6 flex items-center bg-green-500 rounded-full p-1 transition-all duration-300">
                                                            <div
                                                                class="bg-white w-4 h-4 rounded-full shadow-md transform translate-x-4">
                                                            </div>
                                                        </div>
                                                        <span
                                                            class="ml-3 text-sm font-medium text-green-700">Presente</span>
                                                    </label>
                                                </a>
                                            @else
                                             <a href="{{ route('admin.grupo.evento.presenca', [$evento->grupo->id, $evento->id, $item->id]) }}"
                                                    class="relative">
                                                    <label for="presenca-3" class="flex items-center cursor-pointer">
                                                        <div
                                                            class="w-10 h-6 flex items-center bg-gray-300 rounded-full p-1 transition-all duration-300">
                                                            <div class="bg-white w-4 h-4 rounded-full shadow-md"></div>
                                                        </div>
                                                        <span class="ml-3 text-sm font-medium text-gray-700">Ausente</span>
                                                    </label>
                                                </a>
                                               
                                            @endif
                                        </div>
                                    </td>


                                </tr>
                            @endforeach

                            @foreach ($evento->visitas as $item)
                                <tr class="hover:bg-blue-50/30 transition-colors duration-200">
                                <td class="py-4 px-6">
                                    <div class="flex items-center">
                                        <div
                                            class="w-10 h-10 rounded-full bg-gradient-to-br from-gray-600 to-gray-800 flex items-center justify-center text-white font-semibold mr-3 shadow-md">
                                            VS
                                        </div>
                                        <div>
                                            <p class="font-medium text-gray-900">{{ $item->nome }}</p>
                                            <p class="text-sm text-gray-500">{{ $item->telefone }} ({{ $item->idade }} anos)</p>
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
                                    <div class="flex items-center">
                                        <div class="relative">
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

                            </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>


            </div>
        </div>

        <!-- Conteúdo da Tab Ofertas -->
        <div id="conteudo-ofertas" class="hidden space-y-6">
          

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
                                <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Valor</th>
                                <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Ações</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                           
                            @forelse ($evento->ofertas as $item)
                                 <!-- Oferta 1 -->
                            <tr class="hover:bg-green-50/30 transition-colors duration-200">
                                <td class="py-4 px-6">
                                    <div class="flex items-center">
                                        <div
                                            class="w-8 h-8 rounded-full bg-gradient-to-br from-red-600 to-red-800 flex items-center justify-center text-white text-sm font-semibold mr-3">
                                            {{ $item->crente->nome[0] }}
                                        </div>
                                        <span class="font-medium text-gray-900">{{ $item->crente->nome }}</span>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800 border border-blue-200">
                                        {{ $item->tipo }}
                                    </span>
                                </td>
                                <td class="py-4 px-6">
                                    <span class="text-lg font-bold text-green-700">{{ number_format($item->valor, 2, '.', ',') }}
                            MT</span>
                              
                                <td class="py-4 px-6">
                                    <div class="flex items-center space-x-2">
                                        <button
                                        class="w-8 h-8 rounded-lg bg-green-50 text-green-600 hover:bg-green-100 transition-colors flex items-center justify-center">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <a href="{{ route('admin.grupo.evento.oferta.delete', [$evento->grupo->id, $evento->id, $item->id]) }}"
                                        class="w-8 h-8 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 transition-colors flex items-center justify-center">
                                        <i class="fas fa-trash"></i>
                                </a>
                                    </div>
                                </td>
                            </tr>
                            @empty
                                
                            @endforelse
                           
                        </tbody>
                    </table>
                </div>


            </div>
        </div>

    </div>

    <!-- Modal Adicionar Visitante -->
    <div id="modalAdicionarVisitante"
        class="fixed inset-0 bg-black backdrop-blur-sm bg-opacity-50 z-50 hidden items-center justify-center p-4">
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

            <form class="p-6" action="{{ route('admin.grupo.evento.visita', [$evento->grupo->id, $evento->id]) }}" method="POST">
                @csrf
                <div class="space-y-5">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nome do Visitante *</label>
                        <input type="text" name="nome"
                            class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                            placeholder="Nome completo">
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Telefone</label>
                            <input type="tel" name="telefone"
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                                placeholder="84 12 34 567">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Idade</label>
                            <input type="number" name="idade"
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                                placeholder="30">
                        </div>
                    </div>

                   

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Observações</label>
                        <textarea rows="3" name="descricao"
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
        class="fixed inset-0 bg-black backdrop-blur-sm bg-opacity-50 z-50 hidden items-center justify-center p-4">
        <div class="bg-white rounded-2xl w-full max-w-md transform transition-all duration-300 scale-95 opacity-0">
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

            <form class="p-6" action="{{ route('admin.grupo.evento.oferta', [$evento->grupo->id, $evento->id]) }}" method="POST">
                <div class="space-y-5">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Crente *</label>
                        <select name="crente_id"
                            class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all">
                            <option value="">Selecione um</option>
                           @foreach ($presenca as $item)
                               <option value="{{ $item->id }}">{{$item->data->nome}}</option>
                           @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Tipo de oferta *</label>
                        <div class="grid grid-cols-2 gap-3">
                            <label
                                class="flex items-center p-4 border border-gray-200 rounded-xl hover:border-green-300 cursor-pointer transition-colors">
                                <input type="radio" name="tipo" value="Oferta" class="mr-3" checked>
                                <div>
                                    <div class="font-medium text-gray-900">Oferta</div>
                                </div>
                            </label>
                            <label
                                class="flex items-center p-4 border border-gray-200 rounded-xl hover:border-green-300 cursor-pointer transition-colors">
                                <input type="radio" name="tipo" value="Dizimo" class="mr-3">
                                <div>
                                    <div class="font-medium text-gray-900">Dízimo</div>
                                </div>
                            </label>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Valor em MT *</label>
                        <input type="number" step="0.01" name="valor"
                            class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all"
                            placeholder="0,00">
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
                                form.submit();
                            });
                        }
                    }
                });

                
            });
        </script>
    @endpush
@endsection
