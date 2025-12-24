@extends('admin.index')

@section('main')
<div class="max-w-6xl mx-auto px-4 py-6">

    <!-- Header -->
    <div class="flex items-center justify-between mb-8">
        <div class="flex items-center gap-4">
            <a href="{{ route('admin.crentes') }}" 
               class="text-gray-400 hover:text-gray-600 transition-colors">
                <i class="fas fa-arrow-left text-lg"></i>
            </a>
            <div>
                <h1 class="text-2xl font-semibold text-gray-900">{{ $crente->nome }}</h1>
                <p class="text-sm text-gray-500">Perfil do crente</p>
            </div>
        </div>

        <div class="flex gap-3">
            <button onclick="window.print()"
                    class="inline-flex items-center px-4 py-2 text-sm border border-gray-300 rounded-md 
                           text-gray-700 hover:bg-gray-50 transition-colors">
                <i class="fas fa-print mr-2"></i> Imprimir
            </button>
            <a href="{{ route('admin.crentes.editar', $crente->id) }}"
               class="inline-flex items-center px-4 py-2 text-sm font-medium text-white 
                      bg-red-600 rounded-md hover:bg-red-700 transition-colors">
                <i class="fas fa-edit mr-2"></i> Editar
            </a>
        </div>
    </div>

    <!-- Perfil Resumido -->
    <div class="bg-white rounded-lg border border-gray-200 mb-8 overflow-hidden">
        <div class="flex items-center p-6">
            <!-- Avatar -->
            <div class="flex-shrink-0 mr-6">
                <div class="w-20 h-20 rounded-full bg-gray-100 border-4 border-white 
                            flex items-center justify-center text-2xl font-semibold 
                            text-gray-700 shadow-sm">
                    {{ strtoupper(substr($crente->nome, 0, 1)) }}
                </div>
            </div>

            <!-- Info -->
            <div class="flex-1">
                <div class="flex items-center flex-wrap gap-3 mb-3">
                    <span class="px-3 py-1 text-xs font-medium rounded-full 
                        {{ $crente->estado == 'ativo' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                        {{ ucfirst($crente->estado) }}
                    </span>
                    
                    @if($crente->genero)
                    <span class="text-sm text-gray-600">
                        <i class="fas fa-{{ $crente->genero == 'Masculino' ? 'mars' : 'venus' }} mr-1"></i>
                        {{ $crente->genero }}
                    </span>
                    @endif
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @if($crente->telefone)
                    <div class="flex items-center text-gray-600">
                        <i class="fas fa-phone mr-3 text-gray-400"></i>
                        <div>
                            <a href="tel:{{ $crente->telefone }}" 
                               class="hover:text-red-600 transition-colors">
                                {{ $crente->telefone }}
                            </a>
                            <div class="text-xs text-gray-400 mt-0.5">Telefone</div>
                        </div>
                    </div>
                    @endif

                    @if($crente->profissao)
                    <div class="flex items-center text-gray-600">
                        <i class="fas fa-briefcase mr-3 text-gray-400"></i>
                        <div>
                            <span>{{ $crente->profissao }}</span>
                            <div class="text-xs text-gray-400 mt-0.5">Profissão</div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Grid de Informações -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
        <!-- Dados Pessoais -->
        <div class="bg-white border border-gray-200 rounded-lg p-6">
            <div class="flex items-center mb-4">
                <div class="w-8 h-8 rounded-lg bg-red-50 flex items-center justify-center mr-3">
                    <i class="fas fa-user text-red-600 text-sm"></i>
                </div>
                <h3 class="text-sm font-semibold text-gray-700 uppercase tracking-wide">
                    Dados Pessoais
                </h3>
            </div>

            <dl class="space-y-4">
                <div>
                    <dt class="text-xs text-gray-400 mb-1">Nascimento</dt>
                    <dd class="font-medium text-gray-800">
                        {{ $crente->data_nascimento ? date('d/m/Y', strtotime($crente->data_nascimento)) : '—' }}
                    </dd>
                </div>

                <div>
                    <dt class="text-xs text-gray-400 mb-1">Estado Civil</dt>
                    <dd class="font-medium text-gray-800">{{ $crente->estado_civil ?? '—' }}</dd>
                </div>

                <div>
                    <dt class="text-xs text-gray-400 mb-1">Endereço</dt>
                    <dd class="font-medium text-gray-800">{{ $crente->endereco ?? '—' }}</dd>
                </div>
            </dl>
        </div>

        <!-- Família -->
        <div class="bg-white border border-gray-200 rounded-lg p-6">
            <div class="flex items-center mb-4">
                <div class="w-8 h-8 rounded-lg bg-blue-50 flex items-center justify-center mr-3">
                    <i class="fas fa-users text-blue-600 text-sm"></i>
                </div>
                <h3 class="text-sm font-semibold text-gray-700 uppercase tracking-wide">
                    Família
                </h3>
            </div>

            <dl class="space-y-4">
                <div>
                    <dt class="text-xs text-gray-400 mb-1">Pai</dt>
                    <dd class="font-medium text-gray-800">{{ $crente->nome_pai ?? '—' }}</dd>
                </div>

                <div>
                    <dt class="text-xs text-gray-400 mb-1">Mãe</dt>
                    <dd class="font-medium text-gray-800">{{ $crente->nome_mae ?? '—' }}</dd>
                </div>

                <div>
                    <dt class="text-xs text-gray-400 mb-1">Casamento</dt>
                    <dd class="font-medium text-gray-800">
                        {{ $crente->data_casamento ? date('d/m/Y', strtotime($crente->data_casamento)) : '—' }}
                    </dd>
                </div>
            </dl>
        </div>

        <!-- Vida Espiritual -->
        <div class="bg-white border border-gray-200 rounded-lg p-6">
            <div class="flex items-center mb-4">
                <div class="w-8 h-8 rounded-lg bg-green-50 flex items-center justify-center mr-3">
                    <i class="fas fa-church text-green-600 text-sm"></i>
                </div>
                <h3 class="text-sm font-semibold text-gray-700 uppercase tracking-wide">
                    Vida Espiritual
                </h3>
            </div>

            <dl class="space-y-4">
                <div>
                    <dt class="text-xs text-gray-400 mb-1">Aceitação</dt>
                    <dd class="font-medium text-gray-800">
                        {{ $crente->data_aceitacao ? date('d/m/Y', strtotime($crente->data_aceitacao)) : '—' }}
                    </dd>
                </div>

                <div>
                    <dt class="text-xs text-gray-400 mb-1">Batismo</dt>
                    <dd class="font-medium text-gray-800">
                        {{ $crente->data_batismo ? date('d/m/Y', strtotime($crente->data_batismo)) : '—' }}
                    </dd>
                </div>

                <div class="flex items-center justify-between py-2 border-t border-gray-100">
                    <span class="text-sm text-gray-600">Batizado</span>
                    <span class="text-sm font-medium {{ $crente->batizado ? 'text-green-600' : 'text-red-600' }}">
                        {{ $crente->batizado ? 'Sim' : 'Não' }}
                    </span>
                </div>

                <div class="flex items-center justify-between py-2 border-t border-gray-100">
                    <span class="text-sm text-gray-600">Dizimista</span>
                    <span class="text-sm font-medium {{ $crente->dizimista ? 'text-green-600' : 'text-red-600' }}">
                        {{ $crente->dizimista ? 'Sim' : 'Não' }}
                    </span>
                </div>
            </dl>
        </div>
    </div>

    <!-- Ações WhatsApp -->
    @if($crente->telefone)
    <div class="bg-white border border-gray-200 rounded-lg p-6 mb-8">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <div class="w-12 h-12 rounded-full bg-green-50 flex items-center justify-center mr-4">
                    <i class="fab fa-whatsapp text-green-600 text-xl"></i>
                </div>
                <div>
                    <h3 class="font-medium text-gray-900">Enviar mensagem</h3>
                    <p class="text-sm text-gray-500">Entre em contato via WhatsApp</p>
                </div>
            </div>
            
            <a target="_blank"
               href="https://wa.me/{{ preg_replace('/\D/', '', $crente->telefone) }}"
               class="inline-flex items-center px-4 py-2 text-sm font-medium 
                      text-white bg-green-600 rounded-lg hover:bg-green-700 
                      transition-colors shadow-sm">
                <i class="fab fa-whatsapp mr-2"></i> Iniciar Conversa
            </a>
        </div>
    </div>
    @endif

</div>
@endsection