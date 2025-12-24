<!-- eventos.blade.php -->
@extends('admin.index')

@section('main')
    <div class="p-6">
        <!-- Cabeçalho -->
        <div class="mb-8">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
                <div>
                    <h1 class="text-2xl lg:text-3xl font-bold text-gray-900">Calendário de Cultos</h1>
                    <p class="text-gray-600 mt-2">Gerencie todos os culto da igreja e grupos</p>
                </div>
                
            </div>
        </div>

        

        <!-- Conteúdo - Lista (Escondido por padrão) -->
        <div id="view-list" class=" space-y-6">
            <!-- Busca Avançada -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 flex justify-end w-full">
                <form action="{{ route('admin.eventos.buscar') }}" method="GET" class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 sm:w-1/3">
                    <div class="flex-1">
                        <div class="relative">
                            <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                            <input type="text" name="q" placeholder="Buscar eventos..."
                                class="w-full pl-12 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all">
                        </div>
                    </div>
                    <div class="flex items-center space-x-3">
                        <button type="submit"
                            class="px-4 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-xl transition-colors flex items-center">
                            <i class="fas fa-search mr-2"></i> Buscar
                        </button>
                    </div>
                </form>
            </div>

            <!-- Lista de Eventos -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Culto</th>
                                <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Data/Hora</th>
                                <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Grupo Familiar</th>
                                <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Tipo</th>
                                <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Status</th>
                                <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Participantes</th>
                                <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Ações</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                           @forelse ($eventos as $item)
                                <tr class="hover:bg-gray-50 transition-colors">
                                <td class="py-4 px-6">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 rounded-xl bg-red-50 flex items-center justify-center mr-3">
                                            <i class="fas fa-flag text-red-600"></i>
                                        </div>
                                        <div>
                                            <p class="font-medium text-gray-900 text-ellipsis whitespace-nowrap max-w-60 overflow-hidden">{{ $item->titulo }}</p>
                                            <p class="text-sm text-gray-500 text-ellipsis whitespace-nowrap max-w-40 overflow-hidden">{{ $item->descricao }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-2">
                                    <div class="space-y-1">
                                        <span class="block text-gray-700">{{ \Carbon\Carbon::parse($item->data)->format('d/m/Y') }}</span>
                                        <span class="block text-sm text-gray-500">{{ \Carbon\Carbon::parse($item->inicio)->format('H:i') }} - {{ \Carbon\Carbon::parse($item->termino)->format('H:i') }}</span>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <span class="text-gray-700">{{ $item->grupo->nome }}</span>
                                </td>
                                <td class="py-4 px-6">
                                    <span
                                        class="inline-flex capitalize items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800">
                                        {{ $item->tipo }}
                                    </span>
                                </td>
                                <td class="py-4 px-6">
                                    @if (!$item->status)
                                        <span
                                            class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800">
                                            Agendado
                                        </span>
                                    @else
                                        <span
                                            class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                            Realizado
                                        </span>
                                    @endif
                                </td>
                                <td class="py-4 px-6">
                                    <div class="flex items-center">
                                        <span class="font-medium">{{ $item->presenca()->count() }}</span>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="flex items-center space-x-2">
                                        <a href="{{ route('admin.grupo.evento', [$item->grupo->id, $item->id]) }}"
                                            class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-100 transition-colors flex items-center justify-center">
                                            <i class="fas fa-eye"></i>
                                    </a>
                                        <button
                                            class="w-8 h-8 rounded-lg bg-green-50 text-green-600 hover:bg-green-100 transition-colors flex items-center justify-center">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <a href="{{ route('admin.grupo.evento.delete', [$item->grupo->id, $item->id] ) }}"
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

               @if ($eventos->hasPages())
<div class="px-6 py-4 border-t border-gray-100 flex flex-col md:flex-row md:items-center md:justify-between gap-4">

    <!-- Info -->
    <div class="text-sm text-gray-500">
        Mostrando
        <span class="font-medium text-gray-700">{{ $eventos->firstItem() }}</span>
        –
        <span class="font-medium text-gray-700">{{ $eventos->lastItem() }}</span>
        de
        <span class="font-medium text-gray-700">{{ $eventos->total() }}</span>
        cultos
    </div>

    <!-- Navegação -->
    <div class="flex items-center space-x-1">

        {{-- Página anterior --}}
        @if ($eventos->onFirstPage())
            <span class="w-9 h-9 flex items-center justify-center rounded-md bg-gray-100 text-gray-400 cursor-not-allowed">
                <i class="fas fa-chevron-left"></i>
            </span>
        @else
            <a href="{{ $eventos->previousPageUrl() }}"
               class="w-9 h-9 flex items-center justify-center rounded-md bg-gray-100 hover:bg-gray-200 text-gray-700">
                <i class="fas fa-chevron-left"></i>
            </a>
        @endif

        {{-- Links numéricos --}}
        @foreach ($eventos->links()->elements[0] ?? [] as $page => $url)
            @if ($page == $eventos->currentPage())
                <span class="w-9 h-9 flex items-center justify-center rounded-md bg-red-600 text-white text-sm font-medium">
                    {{ $page }}
                </span>
            @else
                <a href="{{ $url }}"
                   class="w-9 h-9 flex items-center justify-center rounded-md bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm">
                    {{ $page }}
                </a>
            @endif
        @endforeach

        {{-- Próxima página --}}
        @if ($eventos->hasMorePages())
            <a href="{{ $eventos->nextPageUrl() }}"
               class="w-9 h-9 flex items-center justify-center rounded-md bg-gray-100 hover:bg-gray-200 text-gray-700">
                <i class="fas fa-chevron-right"></i>
            </a>
        @else
            <span class="w-9 h-9 flex items-center justify-center rounded-md bg-gray-100 text-gray-400 cursor-not-allowed">
                <i class="fas fa-chevron-right"></i>
            </span>
        @endif

    </div>
</div>
@endif

            </div>
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

@endsection
