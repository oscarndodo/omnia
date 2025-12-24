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
                                    <!-- Botão Adicionar Cliente -->
                                    <button id="openModal"
                                        class="mt-4 lg:mt-0 px-6 py-3 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-medium rounded-xl transition-all duration-300 shadow-sm hover:shadow-md flex items-center justify-center group">
                                        <i class="fas fa-user-plus mr-2 group-hover:scale-110 transition-transform"></i> Adicionar Crente
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabs de Conteúdo -->
        <div class="mb-8 h-auto">
            <div class="border-b h-auto border-gray-200">
                <nav class="flex space-x-8 overflow-x-auto">
                    <!-- Tab Membros -->
                    <button id="tab-membros"
                        class="tab-button py- px-1 border-b-2 font-medium text-sm transition-all duration-300 border-red-700 text-red-700 whitespace-nowrap flex items-center group">
                        <div
                            class="w-8 h-8 rounded-lg bg-red-100 flex items-center justify-center mr-3 group-hover:bg-red-200 transition-colors">
                            <i class="fas fa-users text-red-600"></i>
                        </div>
                        <span>Crentes</span>
                        <span
                            class="ml-2 bg-red-100 text-red-800 text-xs px-2 py-0.5 rounded-full">{{ $grupo->crentes->count() }}</span>
                    </button>

                    <!-- Tab Eventos -->
                    <button id="tab-eventos"
                        class="tab-button py- px-1 border-b-2 font-medium text-sm transition-all duration-300 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap flex items-center group">
                        <div
                            class="w-8 h-8 rounded-lg bg-gray-100 flex items-center justify-center mr-3 group-hover:bg-gray-200 transition-colors">
                            <i class="fas fa-calendar-alt text-gray-600"></i>
                        </div>
                        <span>Cultos</span>
                        <span class="ml-2 bg-gray-100 text-gray-800 text-xs px-2 py-0.5 rounded-full">{{$grupo->eventos()->count()}}</span>
                    </button>
                </nav>
            </div>
        </div>

        <!-- Conteúdo da Tab Membros (Visível por padrão) -->
        <div id="conteudo-membros" class="space-y-6">
            <!-- Cabeçalho da Seção -->
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 mb-6">
                <div>
                    <h2 class="text-xl font-bold text-gray-900">Crentes do Grupo Familiar</h2>
                    <p class="text-gray-600 mt-1">Gerencie os crentes da grupo</p>
                </div>
                <div class="flex gap-3">
                    <button
                        class="px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-xl transition-colors flex items-center">
                        <i class="fas fa-download mr-2"></i> Exportar
                    </button>
                </div>
            </div>

    

            <!-- Lista de Membros -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Crente</th>
                                <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Contato</th>
                                <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Status</th>
                                <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Ações</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse ($crentes as $item)
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
                                                <p class="text-sm text-gray-500">
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
                                                    {{ $faixa }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                   
                                    <td class="py-4 px-6">
                                        <div class="space-y-1">
                                            <div class="flex items-center text-gray-600">
                                                <i class="fas fa-phone text-xs mr-2 w-4"></i>
                                                <span class="text-sm">{{ $item->telefone ?? "N/A" }}</span>
                                            </div>
                                            <div class="flex items-center text-gray-600">
                                                <i class="fas fa-envelope text-xs mr-2 w-4"></i>
                                                <span class="text-sm truncate">{{ $item->endereco ?? "N/A" }}</span>
                                            </div>
                                        </div>
                                    </td>
                                  
                                    <td class="py-4 px-6">
                                        @if ($item->batizado)
                                            <span
                                            class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800 border border-green-200">
                                            <i class="fas fa-circle mr-1 text-xs"></i> Em Comunhão
                                        </span>
                                        @else
                                            <span
                                            class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800 border border-red-200">
                                            <i class="fas fa-close mr-1 text-xs"></i> Simpatizante
                                        </span>
                                        @endif
                                    </td>
                                    <td class="py-4 px-6">
                                        <div class="flex items-center space-x-2">
                                            <a href="{{ route('admin.crentes.perfil', $item->id) }}"
                                                class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-100 transition-colors flex items-center justify-center">
                                                <i class="fas fa-eye"></i>
                                        </a>
                                            <a href="{{ route('admin.crentes.editar', $item->id) }}"
                                                class="w-8 h-8 rounded-lg bg-green-50 text-green-600 hover:bg-green-100 transition-colors flex items-center justify-center">
                                                <i class="fas fa-edit"></i>
                                    </a>
                                            <a href="{{ route('admin.crentes.removeGrupo', $item->id) }}"
                                                class="w-8 h-8 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 transition-colors flex items-center justify-center">
                                                <i class="fas fa-ban"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="py-8 px-6 text-center text-gray-500">
                                        <i class="fas fa-users text-3xl text-gray-300 mb-3"></i>
                                        <p class="text-lg">Nenhum crente adicionado ao grupo</p>
                                        <p class="text-sm mt-1">Clique no botão "Adicionar Crente" para começar</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Conteúdo da Tab Cultos (Escondido por padrão) -->
        <div id="conteudo-eventos" class="hidden space-y-6">
            <!-- Cabeçalho da Seção -->
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 mb-6">
                <div>
                    <h2 class="text-xl font-bold text-gray-900">Cultos do Grupo Familiar</h2>
                    <p class="text-gray-600 mt-1">Gerencie os cultos da grupo</p>
                </div>
                <button id="adicionarEventoBtn"
                    class="px-6 py-3 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-medium rounded-xl transition-all duration-300 shadow-sm hover:shadow-md flex items-center justify-center group">
                    <i class="fas fa-calendar-plus mr-2 group-hover:scale-110 transition-transform"></i> Novo Culto
                </button>
            </div>

            <!-- Lista de Eventos -->
            <div class="grid grid-cols-1 sm:grid-cols-3 2xl:grid-cols-4 gap-6">
                @forelse ($grupo->eventos as $item)
                    <div
                        class="bg-white rounded-xl shadow-sm border-2 shadow-red-300 border-red-200 overflow-hidden hover:shadow-md transition-shadow duration-300">
                        <div class="h-auto p-5 bg-gradient-to-r from-red-400 to-red-700">
                            <p class="text-white text-sm">{{ $item->descricao }}</p>
                        </div>
                        <div class="p-6 pt-0">
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $item->titulo }}</h3>
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
                                            class="w-10 h-10 rounded-full bg-gradient-to-br from-gray-400 to-gray-600 border-2 border-white flex items-center justify-center">
                                            <i class="fas fa-users text0-xs text-white"></i>
                                        </div>
                                    </div>
                                    <span class="ml-2 text-sm text-gray-600">{{ $item->presenca()->count() }} participantes</span>
                                </div>
                                <div class="flex justify-center items-center bg-red-600 rounded-lg  text-white hover:bg-red-500">
                                    <a href="{{ route('admin.grupo.evento', ['id' => $grupo->id, 'evento_id' => $item->id]) }}"
                                        class="px-6 py-2.5  transition-colors flex items-center justify-center">
                                        Detalhes
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-sm text-gray-500 text-center py-6">
                        Nenhum culto registado.
                    </p>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Modal para Adicionar Crentes -->
    <div id="modalAdicionarMembro" class="hidden fixed inset-0 z-50 overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen p-4">
            <!-- Backdrop -->
            <div class="fixed inset-0 bg-black/60 backdrop-blur-sm transition-opacity duration-300" id="modalBackdrop"></div>

            <!-- Modal Content -->
            <div class="relative bg-white rounded-2xl shadow-2xl w-full max-w-md transform transition-all duration-300 scale-95 opacity-0"
                id="modalContent">
                <form action="{{ route('admin.grupo.crente', $grupo->id) }}" method="POST" class="relative">
                    @csrf
                    <input type="hidden" name="grupo_id" value="{{ $grupo->id }}">

                    <!-- Header -->
                    <div class="p-6 border-b border-gray-200">
                        <div class="flex items-center gap-3">
                            <div class="p-2 bg-gradient-to-r from-red-600 to-red-800 rounded-xl">
                                <i class="fas fa-user-plus text-white text-sm"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900">Adicionar Crentes ao Grupo</h3>
                                <p class="text-sm text-gray-500 mt-1">Selecione os crentes para adicionar ao grupo</p>
                            </div>
                        </div>
                    </div>

                    <!-- Body -->
                    <div class="p-6">
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-users text-gray-400 mr-2"></i>
                                    Selecionar Crentes
                                </label>

                                <div class="relative w-full">
                                    <!-- Dropdown Button -->
                                    <div id="dropdownButton"
                                        class="w-full border-2 border-gray-200 rounded-xl p-3 flex justify-between items-center cursor-pointer bg-white hover:border-red-500 transition-all duration-200 group">
                                        <span id="selectedText" class="text-gray-500 group-hover:text-gray-700">Selecionar crentes...</span>
                                        <svg class="w-4 h-4 text-gray-400 transition-transform duration-200 group-hover:text-gray-600"
                                            fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </div>

                                    <!-- Dropdown -->
                                    <div id="dropdown"
                                        class="absolute mt-2 w-full bg-white border border-gray-200 rounded-xl shadow-lg z-10 hidden max-h-60 overflow-auto transform transition-all duration-200 origin-top">

                                        <!-- Search -->
                                        <div class="p-3 border-b border-gray-200">
                                            <div class="relative">
                                                <input id="searchBox" type="text" placeholder="Pesquisar crentes..."
                                                    class="w-full pl-9 pr-4 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all duration-200">
                                                <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                            </div>
                                        </div>

                                        <!-- Options -->
                                        <div id="optionsContainer" class="max-h-48 overflow-y-auto">
                                            @foreach($crentes_disponiveis ?? [] as $crente)
                                                <label
                                                    class="flex items-center p-3 hover:bg-gray-50 cursor-pointer border-b border-gray-100 last:border-b-0 transition-colors duration-150">
                                                    <input type="checkbox" name="crentes[]" value="{{ $crente->id }}"
                                                        class="crente-checkbox w-4 h-4 mr-3 text-red-600 bg-white border-2 border-gray-300 rounded focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition-all duration-200">
                                                    <div class="flex-1 min-w-0">
                                                        <div class="flex items-center justify-between">
                                                            <p class="text-sm font-medium text-gray-800 truncate">
                                                                {{ $crente->nome }}
                                                            </p>
                                                            @if($crente->grupo_id)
                                                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 ml-2">
                                                                    <i class="fas fa-users mr-1 text-xs"></i> Tem grupo
                                                                </span>
                                                            @endif
                                                        </div>
                                                        <div class="flex items-center mt-1">
                                                            <p class="text-xs text-gray-500 truncate">
                                                                <i class="fas fa-phone text-xs mr-1"></i>
                                                                {{ $crente->telefone ?? 'Sem telefone' }}
                                                            </p>
                                                            @if($crente->batizado)
                                                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 ml-2">
                                                                    <i class="fas fa-check-circle mr-1 text-xs"></i> Comunhão
                                                                </span>
                                                            @else
                                                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 ml-2">
                                                                    <i class="fas fa-user mr-1 text-xs"></i> Simpatizante
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </label>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Selected Count -->
                            <div id="selectedCount" class="hidden bg-red-50 border border-red-200 rounded-xl p-3">
                                <div class="flex items-center justify-between">
                                    <span class="text-sm font-medium text-red-800">
                                        <i class="fas fa-users mr-1"></i>
                                        <span id="selectedNumber">0</span> crente(s) selecionado(s)
                                    </span>
                                    <button type="button" id="clearSelection"
                                        class="text-red-600 hover:text-red-800 text-sm font-medium">
                                        Limpar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Footer -->
                    <div class="p-6 border-t border-gray-200 bg-gray-50 rounded-b-2xl">
                        <div class="flex flex-col sm:flex-row gap-3">
                            <button type="button" id="closeModal"
                                class="flex-1 px-4 py-3 border border-gray-300 text-gray-700 font-medium rounded-lg hover:bg-white hover:shadow-sm transition-all duration-200 active:scale-95">
                                Cancelar
                            </button>
                            <button type="submit"
                                class="flex-1 px-4 py-3 bg-gradient-to-r from-red-600 to-red-800 text-white font-semibold rounded-lg shadow-lg hover:shadow-xl transition-all duration-200 hover:scale-105 active:scale-95 disabled:opacity-50 disabled:cursor-not-allowed"
                                id="submitButton" disabled>
                                <span>Adicionar</span>
                                <i class="fas fa-plus ml-2"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Adicionar Culto (manter o existente) -->
    <div id="modalAdicionarEvento"
        class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm z-50 hidden items-center justify-center p-4">
        <div
            class="bg-white rounded-2xl w-full max-w-2xl max-h-[90vh] overflow-y-auto transform transition-all duration-300 scale-95 opacity-0">
            <div class="sticky top-0 bg-white p-6 border-b border-gray-100 z-10">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-xl font-bold text-gray-900">Novo Culto</h2>
                        <p class="text-gray-600 mt-1">Crie um novo culto para o grupo</p>
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
                        <label class="block text-sm font-medium text-gray-700 mb-2">Título do Culto *</label>
                        <input type="text" name="titulo"
                            class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all"
                            placeholder="Ex: Reunião Semanal" required>

                        <input type="hidden" name="grupo_id" value="{{ $grupo->id }}">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Tipo de Culto</label>
                            <select name="tipo"
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all">
                                <option value="">Selecione o tipo</option>
                                <option value="culto">Culto</option>
                                <option value="estudo">Estudo Bíblico</option>
                                <option value="oracao">Oração</option>
                                <option value="evangelismo">Evangelismo</option>
                                <option value="social">Social</option>
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
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all"
                                required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Horário *</label>
                            <div class="grid grid-cols-2 gap-3">
                                <input type="time" name="inicio"
                                    class="px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all"
                                    placeholder="Início" required>
                                <input type="time" name="termino"
                                    class="px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all"
                                    placeholder="Fim" required>
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
                        <i class="fas fa-calendar-plus mr-2"></i> Criar Culto
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

            /* Estilo para o dropdown */
            #dropdown::-webkit-scrollbar {
                width: 6px;
            }

            #dropdown::-webkit-scrollbar-track {
                background: #f1f1f1;
                border-radius: 10px;
            }

            #dropdown::-webkit-scrollbar-thumb {
                background: #c1c1c1;
                border-radius: 10px;
            }

            #dropdown::-webkit-scrollbar-thumb:hover {
                background: #a1a1a1;
            }

            /* Estilo para checkbox selecionado */
            .crente-checkbox:checked + div {
                background-color: #fef2f2;
            }

            .crente-checkbox:checked + div p {
                color: #dc2626;
                font-weight: 600;
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

                // Modal para Adicionar Crentes
                const modal = document.getElementById('modalAdicionarMembro');
                const modalBackdrop = document.getElementById('modalBackdrop');
                const modalContent = document.getElementById('modalContent');
                const openModalBtn = document.getElementById('openModal');
                const closeModalBtn = document.getElementById('closeModal');
                const dropdownButton = document.getElementById('dropdownButton');
                const dropdown = document.getElementById('dropdown');
                const searchBox = document.getElementById('searchBox');
                const optionsContainer = document.getElementById('optionsContainer');
                const selectedCount = document.getElementById('selectedCount');
                const selectedNumber = document.getElementById('selectedNumber');
                const selectedText = document.getElementById('selectedText');
                const clearSelectionBtn = document.getElementById('clearSelection');
                const submitButton = document.getElementById('submitButton');
                const checkboxes = document.querySelectorAll('.crente-checkbox');

                // Funções para abrir/fechar modal
                function openModal() {
                    modal.classList.remove('hidden');
                    setTimeout(() => {
                        modalBackdrop.style.opacity = '1';
                        modalContent.classList.remove('scale-95', 'opacity-0');
                        modalContent.classList.add('modal-aberto');
                    }, 10);
                    document.body.style.overflow = 'hidden';
                }

                function closeModal() {
                    modalBackdrop.style.opacity = '0';
                    modalContent.classList.remove('modal-aberto');
                    modalContent.classList.add('scale-95', 'opacity-0');
                    setTimeout(() => {
                        modal.classList.add('hidden');
                        document.body.style.overflow = '';
                    }, 300);
                }

                // Event Listeners para o modal
                if (openModalBtn) {
                    openModalBtn.addEventListener('click', openModal);
                }

                if (closeModalBtn) {
                    closeModalBtn.addEventListener('click', closeModal);
                }

                if (modalBackdrop) {
                    modalBackdrop.addEventListener('click', closeModal);
                }

                // Dropdown functionality
                if (dropdownButton) {
                    dropdownButton.addEventListener('click', function(e) {
                        e.stopPropagation();
                        const isOpen = dropdown.classList.contains('hidden');
                        
                        // Fecha todos os dropdowns abertos
                        document.querySelectorAll('#dropdown').forEach(d => {
                            d.classList.add('hidden');
                        });
                        
                        if (isOpen) {
                            dropdown.classList.remove('hidden');
                            dropdown.style.transform = 'scaleY(1)';
                            searchBox.focus();
                        }
                    });
                }

                // Fechar dropdown ao clicar fora
                document.addEventListener('click', function(e) {
                    if (!dropdown.contains(e.target) && !dropdownButton.contains(e.target)) {
                        dropdown.classList.add('hidden');
                        dropdown.style.transform = 'scaleY(0)';
                    }
                });

                // Busca no dropdown
                if (searchBox) {
                    searchBox.addEventListener('input', function() {
                        const searchTerm = this.value.toLowerCase();
                        const options = optionsContainer.querySelectorAll('label');
                        
                        options.forEach(option => {
                            const text = option.querySelector('p').textContent.toLowerCase();
                            if (text.includes(searchTerm)) {
                                option.style.display = 'flex';
                            } else {
                                option.style.display = 'none';
                            }
                        });
                    });
                }

                // Controle de seleção
                function updateSelection() {
                    const selectedCheckboxes = document.querySelectorAll('.crente-checkbox:checked');
                    const count = selectedCheckboxes.length;
                    
                    selectedNumber.textContent = count;
                    
                    if (count > 0) {
                        selectedCount.classList.remove('hidden');
                        selectedText.textContent = `${count} crente(s) selecionado(s)`;
                        submitButton.disabled = false;
                        
                        // Atualiza o texto com os nomes selecionados (limita a 2 nomes)
                        if (count <= 2) {
                            const names = Array.from(selectedCheckboxes).map(cb => {
                                return cb.closest('label').querySelector('p').textContent;
                            });
                            selectedText.textContent = names.join(', ');
                        } else {
                            const firstNames = Array.from(selectedCheckboxes).slice(0, 2).map(cb => {
                                return cb.closest('label').querySelector('p').textContent;
                            });
                            selectedText.textContent = `${firstNames.join(', ')} e mais ${count - 2}`;
                        }
                    } else {
                        selectedCount.classList.add('hidden');
                        selectedText.textContent = 'Selecionar crentes...';
                        submitButton.disabled = true;
                    }
                }

                // Event listeners para checkboxes
                checkboxes.forEach(checkbox => {
                    checkbox.addEventListener('change', updateSelection);
                });

                // Limpar seleção
                if (clearSelectionBtn) {
                    clearSelectionBtn.addEventListener('click', function() {
                        checkboxes.forEach(checkbox => {
                            checkbox.checked = false;
                        });
                        updateSelection();
                    });
                }

                // Inicializar contagem
                updateSelection();

                // Controle do Modal de Cultos (existente)
                const modaisEventos = {
                    'evento': {
                        abrir: 'adicionarEventoBtn',
                        modal: 'modalAdicionarEvento',
                        fechar: 'fecharModalEvento',
                        cancelar: 'cancelarModalEvento'
                    }
                };

                Object.values(modaisEventos).forEach(config => {
                    const abrirBtn = document.getElementById(config.abrir);
                    const modalEv = document.getElementById(config.modal);
                    const fecharBtn = document.getElementById(config.fechar);
                    const cancelarBtn = document.getElementById(config.cancelar);
                    const modalContentEv = modalEv?.querySelector('.transform');

                    function abrirModalEv() {
                        modalEv.classList.remove('hidden');
                        modalEv.classList.add('flex');
                        setTimeout(() => {
                            modalContentEv.classList.remove('scale-95', 'opacity-0');
                            modalContentEv.classList.add('modal-aberto');
                        }, 10);
                        document.body.style.overflow = 'hidden';
                    }

                    function fecharModalEv() {
                        modalContentEv.classList.remove('modal-aberto');
                        modalContentEv.classList.add('scale-95', 'opacity-0');
                        setTimeout(() => {
                            modalEv.classList.remove('flex');
                            modalEv.classList.add('hidden');
                            document.body.style.overflow = '';
                        }, 300);
                    }

                    if (abrirBtn) abrirBtn.addEventListener('click', abrirModalEv);
                    if (fecharBtn) fecharBtn.addEventListener('click', fecharModalEv);
                    if (cancelarBtn) cancelarBtn.addEventListener('click', fecharModalEv);

                    if (modalEv) {
                        modalEv.addEventListener('click', function(e) {
                            if (e.target === modalEv) {
                                fecharModalEv();
                            }
                        });
                    }
                });
            });

        </script>
    @endpush
@endsection