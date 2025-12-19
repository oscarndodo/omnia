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
                                        <h1 class="text-2xl lg:text-3xl font-bold text-gray-900">{{ $grupo->nome }}</h1>
                                        <div class="flex flex-wrap items-center gap-2 mt-2">
                                            @if ($grupo->estado)
                                                <span
                                                    class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800 border border-green-200">
                                                    <i class="fas fa-check-circle mr-1"></i> Activo
                                                </span>
                                            @else
                                                <span
                                                    class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800 border border-red-200">
                                                    <i class="fas fa-close mr-1"></i> Inactivo
                                                </span>
                                            @endif
                                            <span
                                                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800 border border-blue-200">
                                                <i class="fas fa-users mr-1"></i> {{ $grupo->crentes->count() }} crentes
                                            </span>
                                            <span
                                                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-purple-100 text-purple-800 border border-purple-200">
                                                <i class="fas fa-map-marker-alt mr-1"></i> {{ $grupo->endereco }}
                                            </span>
                                        </div>
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
                    <!-- Tab Membros -->
                    <button id="tab-membros"
                        class="tab-button py-4 px-1 border-b-2 font-medium text-sm transition-all duration-300 border-red-700 text-red-700 whitespace-nowrap flex items-center group">
                        <div
                            class="w-8 h-8 rounded-lg bg-red-100 flex items-center justify-center mr-3 group-hover:bg-red-200 transition-colors">
                            <i class="fas fa-users text-red-600"></i>
                        </div>
                        <span>Membros</span>
                        <span
                            class="ml-2 bg-red-100 text-red-800 text-xs px-2 py-0.5 rounded-full">{{ $grupo->crentes->count() }}</span>
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


                            @forelse ($grupo->crentes as $item)
                                <!-- Líder Principal -->
                                <tr class="hover:bg-red-50/30 transition-colors duration-200">
                                    <td class="py-4 px-6">
                                        <div class="flex items-center">
                                            <div class="relative">
                                                <div
                                                    class="w-10 h-10 rounded-full bg-gradient-to-br from-red-600 to-red-800 flex items-center justify-center text-white font-semibold mr-3 shadow-md">
                                                    {{ $item->nome[0] }}
                                                </div>
                                            </div>
                                            <div>
                                                <p class="font-medium text-gray-900">{{ $item->nome }}</p>
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
                            @empty
                            @endforelse

                        </tbody>
                    </table>
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


            <!-- Lista de Eventos -->
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">

                @forelse ($grupo->eventos as $item)
                    <div
                        class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-shadow duration-300">
                        <div class="h-2 bg-red-500"></div>
                        <div class="p-6">
                            <div class="flex items-start justify-between mb-4">
                                <div class="w-12 h-12 rounded-xl bg-red-50 flex items-center justify-center">
                                    <i class="fas fa-flag text-red-600 text-lg"></i>
                                </div>

                                @if (!$item->status)
                                    <span class="px-3 py-1 text-xs rounded-full bg-green-100 text-green-700">
                                        Agendado
                                    </span>
                                @else
                                    <span class="px-3 py-1 text-xs rounded-full bg-red-100 text-red-700">
                                        Terminado
                                    </span>
                                @endif
                            </div>

                            <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $item->titulo }}</h3>
                            <p class="text-gray-600 text-sm mb-4">{{ $item->descricao }}</p>

                            <div class="space-y-3 mb-6">
                                <div class="flex items-center text-gray-700">
                                    <i class="fas fa-calendar-day text-gray-400 mr-3 w-5"></i>
                                    <span>{{ \Carbon\Carbon::parse($item->data)->format('d/m/Y') }}</span>
                                </div>
                                <div class="flex items-center text-gray-700">
                                    <i class="fas fa-clock text-gray-400 mr-3 w-5"></i>
                                    <span>{{ \Carbon\Carbon::parse($item->hora_inicio)->format('H:i') }} - {{ \Carbon\Carbon::parse($item->hora_fim)->format('H:i') }}</span>
                                </div>
                                <div class="flex items-center text-gray-700">
                                    <i class="fas fa-map-marker-alt text-gray-400 mr-3 w-5"></i>
                                    <span>{{ $item->local }}</span>
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
                                    <a href="{{ route('admin.grupo.evento', ['id' => $grupo->id, 'evento_id' => $item->id]) }}"
                                        class="p-4 h-8 rounded-lg bg-blue-100 text-blue-600 hover:bg-blue-100 transition-colors flex items-center justify-center">
                                        <i class="fas fa-eye"></i> detalhes
                                </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-sm text-gray-500 text-center py-6">
                        Nenhum evento registado.
                    </p>
                @endforelse



            </div>
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

            <form class="p-6" action="{{ route('admin.grupos.evento') }}" method="POST">
                @csrf
                <div class="space-y-5">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Título do Evento *</label>
                        <input type="text" name="titulo"
                            class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all"
                            placeholder="Ex: Reunião Semanal">

                        <input type="hidden" name="grupo_id" value="{{ $grupo->id }}">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Tipo de Evento</label>
                            <select name="tipo"
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all">
                                <option value="reuniao">Reunião Semanal</option>
                                <option value="especial">Evento Especial</option>
                                <option value="social">Encontro Social</option>
                                <option value="oracao">Encontro de Oração</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Local</label>
                            <input type="text" name="local"
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all"
                                placeholder="Local do evento">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Data *</label>
                            <input type="date" name="data"
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Horário *</label>
                            <div class="grid grid-cols-2 gap-3">
                                <input type="time" name="inicio"
                                    class="px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all"
                                    placeholder="Início">
                                <input type="time" name="termino"
                                    class="px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all"
                                    placeholder="Fim">
                            </div>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Descrição</label>
                        <textarea rows="3" name="descricao"
                            class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all"
                            placeholder="Descrição do evento..."></textarea>
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
                                form.submit();
                            });
                        }
                    }
                });
            });
        </script>
    @endpush
@endsection
