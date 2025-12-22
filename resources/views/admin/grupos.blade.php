<!-- grupos.blade.php -->
@extends('admin.index')

@section('main')
    <div class="p-6">
        <!-- Cabeçalho -->
        <div class="mb-8">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
                <div>
                    <h1 class="text-2xl lg:text-3xl font-bold text-gray-900">Grupos Familiares</h1>
                    <p class="text-gray-600 mt-2">Gerencie os grupos familiares da igreja</p>
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


        <!-- Conteúdo da Tab Grupos (Visível por padrão) -->
        <div id="conteudo-grupos">



            <!-- Lista de Grupos -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Nome do Grupo</th>
                                <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Líder</th>
                                <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Membros</th>
                                <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Congregação</th>
                                <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Sector</th>
                                <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Status</th>
                                <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Ações</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">


                            @foreach ($grupos as $item)
                                <!-- Grupo-->
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="py-4 px-6">
                                        <div class="flex items-center">
                                            <div
                                                class="w-10 h-10 rounded-lg bg-red-100 flex items-center justify-center mr-3">
                                                <i class="fas fa-church text-red-600"></i>
                                            </div>
                                            <div>
                                                <p class="font-medium text-gray-900">{{ $item->nome }}</p>
                                                <p class="text-sm text-gray-500">{{ $item->endereco ?? 'N/A' }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <div class="flex items-center">
                                            <div
                                                class="w-8 h-8 rounded-full bg-gradient-to-br from-blue-500 to-blue-700 flex items-center justify-center text-white text-sm font-semibold mr-2">
                                                {{ $item->lider->name[0] }}
                                            </div>
                                            <span class="font-medium">{{ $item->lider->name }}</span>
                                        </div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <div class="flex items-center">
                                            <span class="font-medium">{{ $item->crentes->count() }}</span>
                                        </div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <span
                                            class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                                            {{ $item->congregacao->nome ?? 'N/A' }}
                                        </span>
                                    </td>
                                    <td class="py-4 px-6">
                                        <span class="text-gray-700">{{ $item->congregacao->sector->nome }}</span>
                                    </td>
                                    <td class="py-4 px-6">
                                        @if ($item->estado)
                                            <span
                                                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                                <i class="fas fa-circle mr-1 text-xs"></i> Activo
                                            </span>
                                        @else
                                            <span
                                                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800">
                                                <i class="fas fa-circle mr-1 text-xs"></i> Inactivo
                                            </span>
                                        @endif
                                    </td>
                                    <td class="py-4 px-6">
                                        <div class="flex items-center space-x-2">
                                            <a href="{{ route('admin.grupo', $item->id) }}"
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
                            @endforeach


                        </tbody>
                    </table>
                </div>

                <div class="px-6 py-4 border-t border-gray-100 flex items-center justify-between">
                    {{-- Informação --}}
                    <div class="text-sm text-gray-500">
                        Mostrando
                        {{ $grupos->firstItem() }}
                        -
                        {{ $grupos->lastItem() }}
                        de
                        {{ $grupos->total() }}
                        grupos
                    </div>

                    {{-- Controles --}}
                    <div class="flex items-center space-x-2">
                        {{-- Página anterior --}}
                        @if ($grupos->onFirstPage())
                            <button
                                class="w-10 h-10 rounded-lg bg-gray-100 text-gray-400 flex items-center justify-center cursor-not-allowed">
                                <i class="fas fa-chevron-left"></i>
                            </button>
                        @else
                            <a href="{{ $grupos->previousPageUrl() }}"
                                class="w-10 h-10 rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-700 flex items-center justify-center">
                                <i class="fas fa-chevron-left"></i>
                            </a>
                        @endif

                        {{-- Páginas --}}
                        @foreach ($grupos->getUrlRange(max(1, $grupos->currentPage() - 1), min($grupos->lastPage(), $grupos->currentPage() + 1)) as $page => $url)
                            <a href="{{ $url }}"
                                class="w-10 h-10 rounded-lg flex items-center justify-center
                      {{ $page == $grupos->currentPage() ? 'bg-red-600 text-white' : 'bg-gray-100 hover:bg-gray-200 text-gray-700' }}">
                                {{ $page }}
                            </a>
                        @endforeach

                        {{-- Reticências --}}
                        @if ($grupos->currentPage() + 1 < $grupos->lastPage())
                            <span class="px-2 text-gray-400">...</span>

                            <a href="{{ $grupos->url($grupos->lastPage()) }}"
                                class="w-10 h-10 rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-700 flex items-center justify-center">
                                {{ $grupos->lastPage() }}
                            </a>
                        @endif

                        {{-- Próxima página --}}
                        @if ($grupos->hasMorePages())
                            <a href="{{ $grupos->nextPageUrl() }}"
                                class="w-10 h-10 rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-700 flex items-center justify-center">
                                <i class="fas fa-chevron-right"></i>
                            </a>
                        @else
                            <button
                                class="w-10 h-10 rounded-lg bg-gray-100 text-gray-400 flex items-center justify-center cursor-not-allowed">
                                <i class="fas fa-chevron-right"></i>
                            </button>
                        @endif
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
                                    <span class="text-gray-700">joao.miguel@email.com</span>3mwenj
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
        <div id="novoGrupoModal"
            class="fixed inset-0 bg-black backdrop-blur-sm bg-opacity-50 z-50 hidden items-center justify-center p-4">
            <div class="bg-white rounded-2xl w-full max-w-sm max-h-[90vh] overflow-y-auto">
                <div class="p-6 border-b border-gray-100">
                    <div class="flex items-center justify-between">
                        <h2 class="text-xl font-bold text-gray-900">Novo Grupo Familiar</h2>
                        <button id="fecharModalBtn"
                            class="w-10 h-10 rounded-lg hover:bg-gray-100 flex items-center justify-center">
                            <i class="fas fa-times text-gray-500"></i>
                        </button>
                    </div>
                </div>

                <form class="p-6" action="{{ route('admin.grupos.novo') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 gap-6 mb-6">

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Congregação</label>
                            <select name="congregacao"
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent">
                                <option>Selecione uma congregação</option>
                                @foreach ($congregacoes as $congregacao)
                                    <option value="{{ $congregacao->id }}">{{ $congregacao->nome }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Líder</label>
                            <select name="lider"
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent">
                                <option>Selecione um líder</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nome do Grupo</label>
                            <input type="text" name="nome"
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent"
                                placeholder="Ex: Célula Avivamento">
                        </div>


                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Endereço</label>
                            <input type="text" name="endereco"
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent"
                                placeholder="Rua, número, bairro">
                        </div>
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
                        form.submit();
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
