<!-- configuracoes.blade.php -->
@extends('admin.index')

@section('main')
    <div class="p-6">
        <!-- Cabeçalho -->
        <div class="mb-8">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
                <div>
                    <h1 class="text-2xl lg:text-3xl font-bold text-gray-900">Configurações</h1>
                    <p class="text-gray-600 mt-2">Gerencie as configurações do sistema e estrutura da igreja</p>
                </div>
            </div>
        </div>

        <!-- Layout em 2 Colunas -->
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
            <!-- Menu Lateral -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden sticky top-6">
                    <!-- Perfil do Usuário -->
                    <div class="p-6 border-b border-gray-100 bg-gradient-to-r from-red-50 to-white">
                        <div class="flex items-center py-2">

                        </div>
                    </div>

                    <!-- Navegação -->
                    <nav class="p-4">
                        <ul class="space-y-1">
                            <li>
                                <button data-tab="usuarios"
                                    class="config-tab w-full text-left px-4 py-3 rounded-xl hover:bg-red-50 hover:text-red-700 text-gray-700 font-medium flex items-center transition-colors active">
                                    <i class="fas fa-users w-6 mr-3"></i>
                                    Usuários
                                </button>
                            </li>

                            <li>
                                <button data-tab="sectores"
                                    class="config-tab w-full text-left px-4 py-3 rounded-xl hover:bg-red-50 hover:text-red-700 text-gray-700 font-medium flex items-center transition-colors">
                                    <i class="fas fa-sitemap w-6 mr-3"></i>
                                    Sectores
                                </button>
                            </li>

                            <li>
                                <button data-tab="congregacoes"
                                    class="config-tab w-full text-left px-4 py-3 rounded-xl hover:bg-red-50 hover:text-red-700 text-gray-700 font-medium flex items-center transition-colors">
                                    <i class="fas fa-church w-6 mr-3"></i>
                                    Congregações
                                </button>
                            </li>

                            <li>
                                <button data-tab="notificacoes"
                                    class="config-tab w-full text-left px-4 py-3 rounded-xl hover:bg-red-50 hover:text-red-700 text-gray-700 font-medium flex items-center transition-colors">
                                    <i class="fas fa-bell w-6 mr-3"></i>
                                    Notificações
                                </button>
                            </li>
                           
                        </ul>

                        <!-- Configurações Avançadas -->
                        <div class="mt-8 pt-6 border-t border-gray-100">
                            <h4 class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-3 px-4">Avançado</h4>
                            <ul class="space-y-1">
                                <li>
                                    <button data-tab="api"
                                        class="config-tab w-full text-left px-4 py-3 rounded-xl hover:bg-red-50 hover:text-red-700 text-gray-700 font-medium flex items-center transition-colors">
                                        <i class="fas fa-code w-6 mr-3"></i>
                                        API
                                    </button>
                                </li>
                                <li>
                                    <button data-tab="logs"
                                        class="config-tab w-full text-left px-4 py-3 rounded-xl hover:bg-red-50 hover:text-red-700 text-gray-700 font-medium flex items-center transition-colors">
                                        <i class="fas fa-history w-6 mr-3"></i>
                                        Logs de Sistema
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>

            <!-- Conteúdo Principal -->
            <div class="lg:col-span-3 space-y-8">
                <!-- Tab Usuários (Ativa por padrão) -->
                <div id="tab-usuarios" class="config-content">
                    <!-- Cabeçalho -->
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
                            <div>
                                <h2 class="text-xl font-bold text-gray-900">Gestão de Usuários</h2>
                                <p class="text-gray-600 mt-1">Gerencie os usuários do sistema OMNIA</p>
                            </div>
                            <button id="novoUsuarioBtn"
                                class="mt-4 lg:mt-0 px-6 py-3 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-medium rounded-xl transition-all duration-300 shadow-sm hover:shadow-md flex items-center justify-center group">
                                <i class="fas fa-user-plus mr-2 group-hover:scale-110 transition-transform"></i> Novo
                                Usuário
                            </button>
                        </div>
                    </div>

                    <!-- Estatísticas -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 my-4">
                        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-gray-500 text-sm font-medium">Total Usuários</p>
                                    <p class="text-3xl font-bold text-gray-900 mt-2">{{$users->count()}}</p>
                                </div>
                                <div class="w-12 h-12 rounded-xl bg-blue-50 flex items-center justify-center">
                                    <i class="fas fa-users text-blue-600 text-xl"></i>
                                </div>
                            </div>
                            <div class="mt-4">
                                <span class="text-green-600 text-sm font-medium flex items-center">
                                    <i class="fas fa-arrow-up mr-1"></i> +3 este mês
                                </span>
                            </div>
                        </div>

                        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-gray-500 text-sm font-medium">Ativos</p>
                                    <p class="text-3xl font-bold text-gray-900 mt-2">{{ $activos }}</p>
                                </div>
                                <div class="w-12 h-12 rounded-xl bg-green-50 flex items-center justify-center">
                                    <i class="fas fa-user-check text-green-600 text-xl"></i>
                                </div>
                            </div>
                            <div class="mt-4">
                                <span class="text-green-600 text-sm font-medium">92% ativos</span>
                            </div>
                        </div>

                       
                        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-gray-500 text-sm font-medium">Inativos</p>
                                    <p class="text-3xl font-bold text-gray-900 mt-2">{{$inactivos}}</p>
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

                    <!-- Lista de Usuários -->
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                        <div class="p-6 border-b border-gray-100">
                            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
                                <div class="flex-1">
                                    <div class="relative">
                                        <i
                                            class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                        <input type="text" placeholder="Buscar usuário por nome, e-mail ou cargo..."
                                            class="w-full pl-12 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all">
                                    </div>
                                </div>
                                <div class="flex items-center space-x-3 mt-4 lg:mt-0 lg:ml-4">
                                    <button
                                        class="px-4 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-xl transition-colors flex items-center">
                                        <i class="fas fa-filter mr-2"></i> Filtros
                                    </button>
                                    <button
                                        class="px-4 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-xl transition-colors flex items-center">
                                        <i class="fas fa-download mr-2"></i> Exportar
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Usuário</th>
                                        <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Acesso
                                        </th>
                                        <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Último
                                            Actualização
                                        </th>
                                        <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Status</th>
                                        <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Ações</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100">

                                    @forelse ($users as $item)
                                        <!-- Usuário 1 -->
                                        <tr class="hover:bg-gray-50 transition-colors">
                                            <td class="py-4 px-6">
                                                <div class="flex items-center">
                                                    <div
                                                        class="w-10 h-10 rounded-full bg-gradient-to-br from-red-600 to-red-800 flex items-center justify-center text-white font-semibold mr-3">
                                                        {{ $item->name[0] }}
                                                    </div>
                                                    <div>
                                                        <p class="font-medium text-gray-900">{{ $item->name }}</p>
                                                        <p class="text-sm text-gray-500">{{ $item->phone }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="py-4 px-6">
                                                <div class="space-y-1">
                                                    <span
                                                        class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800">
                                                        {{ $item->role }}
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="py-4 px-6">
                                                <div class="space-y-1">
                                                    <span
                                                        class="text-sm text-gray-700">{{ $item->updated_at->diffForHumans() }}</span>
                                                </div>
                                            </td>
                                            <td class="py-4 px-6">
                                                @if ($item->status)
                                                    <span
                                                        class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                                        <i class="fas fa-circle mr-1 text-xs"></i> Online
                                                    </span>
                                                @else
                                                    <span
                                                        class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800">
                                                        <i class="fas fa-circle mr-1 text-xs"></i> Offline
                                                    </span>
                                                @endif
                                            </td>
                                            <td class="py-4 px-6">
                                                <div class="flex items-center space-x-2">

                                                    <a href="#"
                                                        class="w-8 h-8 rounded-lg bg-green-50 text-green-600 hover:bg-green-100 transition-colors flex items-center justify-center">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    @if ($item->status)
                                                        <a href="{{ route('admin.config.user.status', ['id' => $item->id]) }}"
                                                            class="w-8 h-8 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 transition-colors flex items-center justify-center">
                                                            <i class="fas fa-lock"></i>
                                                        </a>
                                                    @else
                                                        <a href="{{ route('admin.config.user.status', ['id' => $item->id]) }}"
                                                            class="w-8 h-8 rounded-lg bg-green-50 text-green-600 hover:bg-green-100 transition-colors flex items-center justify-center">
                                                            <i class="fas fa-unlock"></i>
                                                        </a>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="py-4 px-6 text-center text-gray-500">
                                                Nenhum usuário encontrado.
                                            </td>
                                        </tr>
                                    @endforelse

                                </tbody>
                            </table>
                        </div>

                        <!-- Paginação -->
                        <div class="px-6 py-4 border-t border-gray-100 flex items-center justify-between">
                            <!-- Na seção de paginação dos usuários -->
                            <div class="px-6 py-4 border-t border-gray-100 flex items-center justify-between">
                                <div class="text-sm text-gray-500">
                                    Mostrando {{ $users->firstItem() }} a {{ $users->lastItem() }} de {{ $users->total() }}
                                    usuários
                                </div>

                                @if ($users->hasPages())
                                    <div class="flex items-center space-x-2">
                                        <!-- Botão Anterior -->
                                        @if ($users->onFirstPage())
                                            <button disabled
                                                class="w-10 h-10 rounded-lg bg-gray-100 text-gray-400 cursor-not-allowed flex items-center justify-center">
                                                <i class="fas fa-chevron-left"></i>
                                            </button>
                                        @else
                                            <a href="{{ $users->previousPageUrl() }}"
                                                class="w-10 h-10 rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-700 flex items-center justify-center transition-colors">
                                                <i class="fas fa-chevron-left"></i>
                                            </a>
                                        @endif

                                        <!-- Primeira página -->
                                        @if ($users->currentPage() > 3)
                                            <a href="{{ $users->url(1) }}"
                                                class="w-10 h-10 rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-700 flex items-center justify-center transition-colors">
                                                1
                                            </a>
                                            @if ($users->currentPage() > 4)
                                                <span class="px-2 text-gray-500">...</span>
                                            @endif
                                        @endif

                                        <!-- Páginas ao redor da atual -->
                                        @foreach (range(1, $users->lastPage()) as $page)
                                            @if ($page >= $users->currentPage() - 2 && $page <= $users->currentPage() + 2)
                                                @if ($page == $users->currentPage())
                                                    <span
                                                        class="w-10 h-10 rounded-lg bg-red-600 text-white flex items-center justify-center">
                                                        {{ $page }}
                                                    </span>
                                                @else
                                                    <a href="{{ $users->url($page) }}"
                                                        class="w-10 h-10 rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-700 flex items-center justify-center transition-colors">
                                                        {{ $page }}
                                                    </a>
                                                @endif
                                            @endif
                                        @endforeach

                                        <!-- Última página -->
                                        @if ($users->currentPage() < $users->lastPage() - 2)
                                            @if ($users->currentPage() < $users->lastPage() - 3)
                                                <span class="px-2 text-gray-500">...</span>
                                            @endif
                                            <a href="{{ $users->url($users->lastPage()) }}"
                                                class="w-10 h-10 rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-700 flex items-center justify-center transition-colors">
                                                {{ $users->lastPage() }}
                                            </a>
                                        @endif

                                        <!-- Botão Próximo -->
                                        @if ($users->hasMorePages())
                                            <a href="{{ $users->nextPageUrl() }}"
                                                class="w-10 h-10 rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-700 flex items-center justify-center transition-colors">
                                                <i class="fas fa-chevron-right"></i>
                                            </a>
                                        @else
                                            <button disabled
                                                class="w-10 h-10 rounded-lg bg-gray-100 text-gray-400 cursor-not-allowed flex items-center justify-center">
                                                <i class="fas fa-chevron-right"></i>
                                            </button>
                                        @endif
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tab Sectores -->
                <div id="tab-sectores" class="config-content hidden">
                    <!-- Cabeçalho -->
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 -mt-8">
                        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
                            <div>
                                <h2 class="text-xl font-bold text-gray-900">Gestão de Sectores</h2>
                                <p class="text-gray-600 mt-1">Organize os sectores da sua igreja</p>
                            </div>
                            <button id="novoSectorBtn"
                                class="mt-4 lg:mt-0 px-6 py-3 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-medium rounded-xl transition-all duration-300 shadow-sm hover:shadow-md flex items-center justify-center group">
                                <i class="fas fa-plus-circle mr-2 group-hover:scale-110 transition-transform"></i> Novo
                                Sector
                            </button>
                        </div>
                    </div>

                 

                    <!-- Lista de Sectores -->
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                        <div class="p-6 border-b border-gray-100">
                            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
                                <div class="flex-1">
                                    <div class="relative">
                                        <i
                                            class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                        <input type="text"
                                            placeholder="Buscar sector por nome, líder ou localização..."
                                            class="w-full pl-12 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all">
                                    </div>
                                </div>
                                <div class="flex items-center space-x-3 mt-4 lg:mt-0 lg:ml-4">
                                    <button
                                        class="px-4 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-xl transition-colors flex items-center">
                                        <i class="fas fa-filter mr-2"></i> Filtros
                                    </button>
                                    <button
                                        class="px-4 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-xl transition-colors flex items-center">
                                        <i class="fas fa-download mr-2"></i> Exportar
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Sector</th>
                                        <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Líder
                                        </th>
                                        <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Status</th>
                                        <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Ações</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100">
                                    @forelse ($sectores as $item)
                                    <!-- Sector 1 -->
                                    <tr class="hover:bg-gray-50 transition-colors">
                                        <td class="py-4 px-6">
                                            <div class="flex items-center">
                                               
                                                <div>
                                                    <p class="font-medium text-gray-900">{{$item->nome}}</p>
                                                    <p class="text-sm text-gray-500">Cadastro: {{ $item->created_at->format('m/Y') }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="py-4 px-6">
                                            <div class="space-y-1">
                                                <span class="font-medium text-gray-900">{{ $item->lider->name }}</span>
                                                <p class="text-sm text-gray-500">{{ $item->lider->role }}</p>
                                            </div>
                                        </td>
                                       
                                       
                                        <td class="py-4 px-6">
                                            @if ($item->status)
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
                                      @empty
                                        <tr>
                                            <td colspan="4" class="py-4 px-6 text-center text-gray-500">
                                                Nenhum sector encontrado.
                                            </td>
                                        </tr>
                                    @endforelse

                                </tbody>
                            </table>
                        </div>

                        <!-- Paginação -->
                        <div class="px-6 py-4 border-t border-gray-100 flex items-center justify-between">
                            <!-- Na seção de paginação dos usuários -->
                            <div class="px-6 py-4 border-t border-gray-100 flex items-center justify-between">
                                <div class="text-sm text-gray-500">
                                    Mostrando {{ $sectores->firstItem() }} a {{ $sectores->lastItem() }} de {{ $sectores->total() }}
                                    sectores
                                </div>

                                @if ($sectores->hasPages())
                                    <div class="flex items-center space-x-2">
                                        <!-- Botão Anterior -->
                                        @if ($sectores->onFirstPage())
                                            <button disabled
                                                class="w-10 h-10 rounded-lg bg-gray-100 text-gray-400 cursor-not-allowed flex items-center justify-center">
                                                <i class="fas fa-chevron-left"></i>
                                            </button>
                                        @else
                                            <a href="{{ $sectores->previousPageUrl() }}"
                                                class="w-10 h-10 rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-700 flex items-center justify-center transition-colors">
                                                <i class="fas fa-chevron-left"></i>
                                            </a>
                                        @endif

                                        <!-- Primeira página -->
                                        @if ($sectores->currentPage() > 3)
                                            <a href="{{ $sectores->url(1) }}"
                                                class="w-10 h-10 rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-700 flex items-center justify-center transition-colors">
                                                1
                                            </a>
                                            @if ($sectores->currentPage() > 4)
                                                <span class="px-2 text-gray-500">...</span>
                                            @endif
                                        @endif

                                        <!-- Páginas ao redor da atual -->
                                        @foreach (range(1, $sectores->lastPage()) as $page)
                                            @if ($page >= $sectores->currentPage() - 2 && $page <= $sectores->currentPage() + 2)
                                                @if ($page == $sectores->currentPage())
                                                    <span
                                                        class="w-10 h-10 rounded-lg bg-red-600 text-white flex items-center justify-center">
                                                        {{ $page }}
                                                    </span>
                                                @else
                                                    <a href="{{ $sectores->url($page) }}"
                                                        class="w-10 h-10 rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-700 flex items-center justify-center transition-colors">
                                                        {{ $page }}
                                                    </a>
                                                @endif
                                            @endif
                                        @endforeach

                                        <!-- Última página -->
                                        @if ($sectores->currentPage() < $sectores->lastPage() - 2)
                                            @if ($sectores->currentPage() < $sectores->lastPage() - 3)
                                                <span class="px-2 text-gray-500">...</span>
                                            @endif
                                            <a href="{{ $sectores->url($sectores->lastPage()) }}"
                                                class="w-10 h-10 rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-700 flex items-center justify-center transition-colors">
                                                {{ $sectores->lastPage() }}
                                            </a>
                                        @endif

                                        <!-- Botão Próximo -->
                                        @if ($sectores->hasMorePages())
                                            <a href="{{ $sectores->nextPageUrl() }}"
                                                class="w-10 h-10 rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-700 flex items-center justify-center transition-colors">
                                                <i class="fas fa-chevron-right"></i>
                                            </a>
                                        @else
                                            <button disabled
                                                class="w-10 h-10 rounded-lg bg-gray-100 text-gray-400 cursor-not-allowed flex items-center justify-center">
                                                <i class="fas fa-chevron-right"></i>
                                            </button>
                                        @endif
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tab Congregações -->
                <div id="tab-congregacoes" class="config-content hidden">
                    <!-- Cabeçalho -->
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
                            <div>
                                <h2 class="text-xl font-bold text-gray-900">Gestão de Congregações</h2>
                                <p class="text-gray-600 mt-1">Administre as congregações da sua igreja</p>
                            </div>
                            <button id="novaCongregacaoBtn"
                                class="mt-4 lg:mt-0 px-6 py-3 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-medium rounded-xl transition-all duration-300 shadow-sm hover:shadow-md flex items-center justify-center group">
                                <i class="fas fa-plus-circle mr-2 group-hover:scale-110 transition-transform"></i> Nova
                                Congregação
                            </button>
                        </div>
                    </div>

                    <!-- Estatísticas -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 my-4">
                        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-gray-500 text-sm font-medium">Total Congregações</p>
                                    <p class="text-3xl font-bold text-gray-900 mt-2">4</p>
                                </div>
                                <div class="w-12 h-12 rounded-xl bg-blue-50 flex items-center justify-center">
                                    <i class="fas fa-church text-blue-600 text-xl"></i>
                                </div>
                            </div>
                            <div class="mt-4">
                                <span class="text-green-600 text-sm font-medium flex items-center">
                                    <i class="fas fa-check-circle mr-1"></i> Ativas
                                </span>
                            </div>
                        </div>

                        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-gray-500 text-sm font-medium">Pastores Responsáveis</p>
                                    <p class="text-3xl font-bold text-gray-900 mt-2">4</p>
                                </div>
                                <div class="w-12 h-12 rounded-xl bg-green-50 flex items-center justify-center">
                                    <i class="fas fa-user-tie text-green-600 text-xl"></i>
                                </div>
                            </div>
                            <div class="mt-4">
                                <span class="text-green-600 text-sm font-medium">100% designados</span>
                            </div>
                        </div>

                        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-gray-500 text-sm font-medium">Membros nas Congregações</p>
                                    <p class="text-3xl font-bold text-gray-900 mt-2">342</p>
                                </div>
                                <div class="w-12 h-12 rounded-xl bg-red-50 flex items-center justify-center">
                                    <i class="fas fa-users text-red-600 text-xl"></i>
                                </div>
                            </div>
                            <div class="mt-4">
                                <span class="text-gray-500 text-sm">Média: 85.5/congregação</span>
                            </div>
                        </div>
                    </div>

                    <!-- Lista de Congregações -->
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                        <div class="p-6 border-b border-gray-100">
                            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
                                <div class="flex-1">
                                    <div class="relative">
                                        <i
                                            class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                        <input type="text"
                                            placeholder="Buscar congregação por nome, pastor ou cidade..."
                                            class="w-full pl-12 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all">
                                    </div>
                                </div>
                                <div class="flex items-center space-x-3 mt-4 lg:mt-0 lg:ml-4">
                                    <button
                                        class="px-4 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-xl transition-colors flex items-center">
                                        <i class="fas fa-filter mr-2"></i> Filtros
                                    </button>
                                    <button
                                        class="px-4 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-xl transition-colors flex items-center">
                                        <i class="fas fa-download mr-2"></i> Exportar
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Congregação
                                        </th>
                                        <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Pastor
                                            Responsável
                                        </th>
                                        <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Localização
                                        </th>
                                        <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Status</th>
                                        <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Ações</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100">

                                    @forelse ($congregacoes as $item)
                                         <!-- Congregação 1 -->
                                    <tr class="hover:bg-gray-50 transition-colors">
                                        <td class="py-4 px-6">
                                            <div class="flex items-center">
                                                <div
                                                    class="w-10 h-10 rounded-full bg-gradient-to-br from-red-600 to-red-800 flex items-center justify-center text-white font-semibold mr-3">
                                                    C1
                                                </div>
                                                <div>
                                                    <p class="font-medium text-gray-900">{{ $item->nome }}</p>
                                                    <p class="text-sm text-gray-500">{{ $item->sector->nome }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="py-4 px-6">
                                            <div class="space-y-1">
                                                <span class="font-medium text-gray-900">{{ $item->lider }}</span>
                                                <p class="text-sm text-gray-500">Pastor Titular</p>
                                            </div>
                                        </td>
                                        <td class="py-4 px-6">
                                            <div class="space-y-1">
                                                <span class="text-sm text-gray-700">{{ $item->endereco }}</span>
                                            </div>
                                        </td>
                                        
                                        <td class="py-4 px-6">
                                             @if ($item->status)
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
                                    @empty
                                         <tr>
                                            <td colspan="4" class="py-4 px-6 text-center text-gray-500">
                                                Nenhuma congregacao encontrada.
                                            </td>
                                        </tr>
                                    @endforelse
                                   

                                </tbody>
                            </table>
                        </div>

                        <!-- Paginação -->
                        <div class="px-6 py-4 border-t border-gray-100 flex items-center justify-between">
                            <div class="text-sm text-gray-500">
                                Mostrando 1-3 de 4 congregações
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
                                <button
                                    class="w-10 h-10 rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-700 flex items-center justify-center">
                                    <i class="fas fa-chevron-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tabs restantes (mantidas do original) -->
                <div id="tab-notificacoes" class="config-content hidden">
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                        <h2 class="text-xl font-bold text-gray-900">Notificações</h2>
                        <p class="text-gray-600 mt-1">Em construção...</p>
                    </div>
                </div>

                <div id="tab-backup" class="config-content hidden">
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                        <h2 class="text-xl font-bold text-gray-900">Backup & Segurança</h2>
                        <p class="text-gray-600 mt-1">Em construção...</p>
                    </div>
                </div>

                <div id="tab-api" class="config-content hidden">
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                        <h2 class="text-xl font-bold text-gray-900">API</h2>
                        <p class="text-gray-600 mt-1">Em construção...</p>
                    </div>
                </div>

                <div id="tab-logs" class="config-content hidden">
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                        <h2 class="text-xl font-bold text-gray-900">Logs de Sistema</h2>
                        <p class="text-gray-600 mt-1">Em construção...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Novo Usuário -->
    <div id="modalNovoUsuario"
        class="fixed inset-0 bg-black backdrop-blur-sm bg-opacity-50 z-50 hidden items-center justify-center p-4">
        <div
            class="bg-white rounded-2xl w-full max-w-xl max-h-[90vh] overflow-y-auto transform transition-all duration-300 scale-95 opacity-0">
            <div class="sticky top-0 bg-white p-6 border-b border-gray-100 z-10">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-xl font-bold text-gray-900">Novo Usuário</h2>
                        <p class="text-gray-600 mt-1">Crie uma nova conta de acesso</p>
                    </div>
                    <button id="fecharModalUsuario"
                        class="w-10 h-10 rounded-lg hover:bg-gray-100 flex items-center justify-center transition-colors">
                        <i class="fas fa-times text-gray-500"></i>
                    </button>
                </div>
            </div>

            <form class="p-6" action="{{ route('admin.config.user') }}" method="POST">
                @csrf
                <div class="space-y-6">
                    <!-- Informações Pessoais -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Informações Pessoais</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Nome Completo *</label>
                                <input type="text" name="name"
                                    class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all"
                                    placeholder="Ex: João da Silva">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Telefone</label>
                                <input type="tel" name="phone"
                                    class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all"
                                    placeholder="81 23 45 678">
                            </div>

                        </div>
                    </div>

                    <!-- Perfil e Permissões -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Perfil de usuário</h3>
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Perfil *</label>
                                <select name="role"
                                    class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all">
                                    <option value="">Selecione um perfil</option>
                                    <option value="Provincia">Provincial</option>
                                    <option value="Distrito">Distrital</option>
                                    <option value="Sector">Sectorial</option>
                                    <option value="Congregacao">Pastor</option>
                                    <option value="Grupo">Líder</option>
                                    <option value="Outro">Crente</option>
                                </select>
                            </div>

                        </div>
                    </div>


                </div>

                <div class="mt-8 pt-6 border-t border-gray-100 flex justify-end space-x-4">
                    <button type="button" id="cancelarModalUsuario"
                        class="px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-xl transition-colors">
                        Cancelar
                    </button>
                    <button type="submit"
                        class="px-6 py-3 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-medium rounded-xl transition-all duration-300 flex items-center">
                        <i class="fas fa-user-plus mr-2"></i> Criar Usuário
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Novo Sector -->
    <div id="modalNovoSector"
        class="fixed inset-0 bg-black backdrop-blur-sm bg-opacity-50 z-50 hidden items-center justify-center p-4">
        <div
            class="bg-white rounded-2xl w-full max-w-xl max-h-[90vh] overflow-y-auto transform transition-all duration-300 scale-95 opacity-0">
            <div class="sticky top-0 bg-white p-6 border-b border-gray-100 z-10">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-xl font-bold text-gray-900">Novo Sector</h2>
                        <p class="text-gray-600 mt-1">Crie um novo sector organizacional</p>
                    </div>
                    <button id="fecharModalSector"
                        class="w-10 h-10 rounded-lg hover:bg-gray-100 flex items-center justify-center transition-colors">
                        <i class="fas fa-times text-gray-500"></i>
                    </button>
                </div>
            </div>

            <form class="p-6" action="{{ route('admin.sector.novo') }}" method="POST">
                @csrf
                <div class="space-y-6">
                    <!-- Informações do Sector -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Informações do Sector</h3>
                        <div class="space-y-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Nome do Sector *</label>
                                <input type="text" name="nome"
                                    class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all"
                                    placeholder="Ex: Sector Central">
                            </div>



                            <div class="grid grid-cols-1 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Líder do Sector</label>
                                    <select name="lider"
                                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all">
                                        <option value="">Selecione um líder</option>
                                        @foreach ($users as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}
                                                ({{ $item->role }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>


                            </div>
                        </div>
                    </div>


                </div>

                <div class="mt-8 pt-6 border-t border-gray-100 flex justify-end space-x-4">
                    <button type="button" id="cancelarModalSector"
                        class="px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-xl transition-colors">
                        Cancelar
                    </button>
                    <button type="submit"
                        class="px-6 py-3 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-medium rounded-xl transition-all duration-300 flex items-center">
                        <i class="fas fa-plus-circle mr-2"></i> Criar Sector
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Nova Congregação -->
    <div id="modalNovaCongregacao"
        class="fixed inset-0 bg-black backdrop-blur-sm bg-opacity-50 z-50 hidden items-center justify-center p-4">
        <div
            class="bg-white rounded-2xl w-full max-w-2xl overflow-y-auto transform transition-all duration-300 scale-95 opacity-0">
            <div class="sticky top-0 bg-white p-6 border-b border-gray-100 z-10">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-xl font-bold text-gray-900">Nova Congregação</h2>
                        <p class="text-gray-600 mt-1">Crie uma nova congregação</p>
                    </div>
                    <button id="fecharModalCongregacao"
                        class="w-10 h-10 rounded-lg hover:bg-gray-100 flex items-center justify-center transition-colors">
                        <i class="fas fa-times text-gray-500"></i>
                    </button>
                </div>
            </div>

            <form class="p-6" action={{ route('admin.congregacao.novo') }} method="POST">
                <div class="space-y-6">
                    @csrf
                    <!-- Informações da Congregação -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Informações da Congregação</h3>
                        <div class="space-y-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Nome da Congregação *</label>
                                <input type="text" name="nome"
                                    class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all"
                                    placeholder="Ex: Congregação Central">
                            </div>

                             <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Data de Fundação</label>
                                <input type="date" name="data_fundancao"
                                    class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all">
                            </div>

                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                 <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Pastor Responsável</label>
                                <input type="text" name="lider" placeholder="Joel Manuel"
                                    class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all">
                            </div>

                               
                                
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Tipo de obra</label>
                                    <select name="tipo"
                                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all">
                                        <option value="">Selecione o tipo</option>
                                        <option value="Precaria">Precaria</option>
                                        <option value="Condigna">Condigna</option>
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                             <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Proprietario</label>
                                <input type="text" name="propriedade" placeholder="Ex: Igreja"
                                    class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all">
                            </div>

                            <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Sector</label>
                                    <select name="sector_id"
                                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all">
                                        <option value="">Selecione o sector</option>
                                        @foreach ($sectores as $item)
                                            <option value="{{ $item->id }}">{{ $item->nome }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                           
                        </div>
                    </div>

                    <!-- Localização e Contactos -->
                    <div>
                        <div class="space-y-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Endereço</label>
                                    <input type="text" name="endereco"
                                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all"
                                        placeholder="Ex: Maputo, Matola, Boane">
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Categoria</label>
                                    <select name="sede"
                                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all">
                                        <option value="1">Congregação(Sede)</option>
                                        <option value="0">Sub-Congregação</option>
                                    </select>
                                </div>
                            </div>

                           
                        </div>
                    </div>
                </div>

                <div class="mt-8 pt-6 border-t border-gray-100 flex justify-end space-x-4">
                    <button type="button" id="cancelarModalCongregacao"
                        class="px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-xl transition-colors">
                        Cancelar
                    </button>
                    <button type="submit"
                        class="px-6 py-3 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-medium rounded-xl transition-all duration-300 flex items-center">
                        <i class="fas fa-plus-circle mr-2"></i> Criar Congregação
                    </button>
                </div>
            </form>
        </div>
    </div>

    @push('styles')
        <style>
            .config-tab.active {
                background-color: #fef2f2;
                color: #dc2626;
                font-weight: 600;
            }

            .config-tab.active:hover {
                background-color: #fee2e2;
            }

            .config-content {
                animation: fadeIn 0.3s ease;
            }

            @keyframes fadeIn {
                from {
                    opacity: 0;
                    transform: translateY(10px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            /* Switch personalizado */
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
        </style>
    @endpush

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Controle das Tabs de Configurações
                const configTabs = document.querySelectorAll('.config-tab');
                const configContents = document.querySelectorAll('.config-content');

                function mostrarTab(tabId) {
                    // Remover classe active de todas as tabs
                    configTabs.forEach(tab => {
                        tab.classList.remove('active');
                    });

                    // Esconder todos os conteúdos
                    configContents.forEach(content => {
                        content.classList.add('hidden');
                    });

                    // Ativar tab clicada
                    const tabAtiva = document.querySelector(`[data-tab="${tabId}"]`);
                    if (tabAtiva) {
                        tabAtiva.classList.add('active');
                    }

                    // Mostrar conteúdo correspondente
                    const conteudoAtivo = document.getElementById(`tab-${tabId}`);
                    if (conteudoAtivo) {
                        conteudoAtivo.classList.remove('hidden');
                    }
                }

                // Adicionar event listeners para cada tab
                configTabs.forEach(tab => {
                    tab.addEventListener('click', function() {
                        const tabId = this.getAttribute('data-tab');
                        mostrarTab(tabId);
                    });
                });

                // Modal Novo Usuário
                const novoUsuarioBtn = document.getElementById('novoUsuarioBtn');
                const modalNovoUsuario = document.getElementById('modalNovoUsuario');
                const fecharModalUsuario = document.getElementById('fecharModalUsuario');
                const cancelarModalUsuario = document.getElementById('cancelarModalUsuario');
                const modalUsuarioContent = modalNovoUsuario?.querySelector('.transform');

                function abrirModalUsuario() {
                    modalNovoUsuario.classList.remove('hidden');
                    modalNovoUsuario.classList.add('flex');
                    setTimeout(() => {
                        modalUsuarioContent.classList.remove('scale-95', 'opacity-0');
                        modalUsuarioContent.classList.add('modal-aberto');
                    }, 10);
                    document.body.style.overflow = 'hidden';
                }

                function fecharModalUsuarioFunc() {
                    modalUsuarioContent.classList.remove('modal-aberto');
                    modalUsuarioContent.classList.add('scale-95', 'opacity-0');
                    setTimeout(() => {
                        modalNovoUsuario.classList.remove('flex');
                        modalNovoUsuario.classList.add('hidden');
                        document.body.style.overflow = '';
                    }, 300);
                }

                if (novoUsuarioBtn) novoUsuarioBtn.addEventListener('click', abrirModalUsuario);
                if (fecharModalUsuario) fecharModalUsuario.addEventListener('click', fecharModalUsuarioFunc);
                if (cancelarModalUsuario) cancelarModalUsuario.addEventListener('click', fecharModalUsuarioFunc);

                if (modalNovoUsuario) {
                    modalNovoUsuario.addEventListener('click', function(e) {
                        if (e.target === modalNovoUsuario) {
                            fecharModalUsuarioFunc();
                        }
                    });

                    const form = modalNovoUsuario.querySelector('form');
                    if (form) {
                        form.addEventListener('submit', function(e) {
                            form.submit();
                        });
                    }
                }

                // Modal Novo Sector
                const novoSectorBtn = document.getElementById('novoSectorBtn');
                const modalNovoSector = document.getElementById('modalNovoSector');
                const fecharModalSector = document.getElementById('fecharModalSector');
                const cancelarModalSector = document.getElementById('cancelarModalSector');
                const modalSectorContent = modalNovoSector?.querySelector('.transform');

                function abrirModalSector() {
                    modalNovoSector.classList.remove('hidden');
                    modalNovoSector.classList.add('flex');
                    setTimeout(() => {
                        modalSectorContent.classList.remove('scale-95', 'opacity-0');
                        modalSectorContent.classList.add('modal-aberto');
                    }, 10);
                    document.body.style.overflow = 'hidden';
                }

                function fecharModalSectorFunc() {
                    modalSectorContent.classList.remove('modal-aberto');
                    modalSectorContent.classList.add('scale-95', 'opacity-0');
                    setTimeout(() => {
                        modalNovoSector.classList.remove('flex');
                        modalNovoSector.classList.add('hidden');
                        document.body.style.overflow = '';
                    }, 300);
                }

                if (novoSectorBtn) novoSectorBtn.addEventListener('click', abrirModalSector);
                if (fecharModalSector) fecharModalSector.addEventListener('click', fecharModalSectorFunc);
                if (cancelarModalSector) cancelarModalSector.addEventListener('click', fecharModalSectorFunc);

                if (modalNovoSector) {
                    modalNovoSector.addEventListener('click', function(e) {
                        if (e.target === modalNovoSector) {
                            fecharModalSectorFunc();
                        }
                    });

                    const form = modalNovoSector.querySelector('form');
                    if (form) {
                        form.addEventListener('submit', function(e) {
                            form.submit();
                        });
                    }
                }

                // Modal Nova Congregação
                const novaCongregacaoBtn = document.getElementById('novaCongregacaoBtn');
                const modalNovaCongregacao = document.getElementById('modalNovaCongregacao');
                const fecharModalCongregacao = document.getElementById('fecharModalCongregacao');
                const cancelarModalCongregacao = document.getElementById('cancelarModalCongregacao');
                const modalCongregacaoContent = modalNovaCongregacao?.querySelector('.transform');

                function abrirModalCongregacao() {
                    modalNovaCongregacao.classList.remove('hidden');
                    modalNovaCongregacao.classList.add('flex');
                    setTimeout(() => {
                        modalCongregacaoContent.classList.remove('scale-95', 'opacity-0');
                        modalCongregacaoContent.classList.add('modal-aberto');
                    }, 10);
                    document.body.style.overflow = 'hidden';
                }

                function fecharModalCongregacaoFunc() {
                    modalCongregacaoContent.classList.remove('modal-aberto');
                    modalCongregacaoContent.classList.add('scale-95', 'opacity-0');
                    setTimeout(() => {
                        modalNovaCongregacao.classList.remove('flex');
                        modalNovaCongregacao.classList.add('hidden');
                        document.body.style.overflow = '';
                    }, 300);
                }

                if (novaCongregacaoBtn) novaCongregacaoBtn.addEventListener('click', abrirModalCongregacao);
                if (fecharModalCongregacao) fecharModalCongregacao.addEventListener('click',
                    fecharModalCongregacaoFunc);
                if (cancelarModalCongregacao) cancelarModalCongregacao.addEventListener('click',
                    fecharModalCongregacaoFunc);

                if (modalNovaCongregacao) {
                    modalNovaCongregacao.addEventListener('click', function(e) {
                        if (e.target === modalNovaCongregacao) {
                            fecharModalCongregacaoFunc();
                        }
                    });

                    const form = modalNovaCongregacao.querySelector('form');
                    if (form) {
                        form.addEventListener('submit', function(e) {
                            form.submit()
                        });
                    }
                }

                // Validação de formulários
                const forms = document.querySelectorAll('form');
                forms.forEach(form => {
                    form.addEventListener('submit', function(e) {
                        e.preventDefault();

                        // Validação básica de campos obrigatórios
                        const requiredFields = form.querySelectorAll('[required]');
                        let isValid = true;

                        requiredFields.forEach(field => {
                            if (!field.value.trim()) {
                                isValid = false;
                                field.classList.add('border-red-500');
                                field.classList.remove('border-gray-200');
                            } else {
                                field.classList.remove('border-red-500');
                                field.classList.add('border-gray-200');
                            }
                        });

                        if (isValid) {
                            console.log('Formulário válido, enviando...');
                        } else {
                            alert('Por favor, preencha todos os campos obrigatórios!');
                        }
                    });
                });

                // Inicializar com a primeira tab ativa
                mostrarTab('usuarios');
            });
        </script>
    @endpush
@endsection
