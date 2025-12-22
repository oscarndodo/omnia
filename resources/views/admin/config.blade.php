<!doctype html>
<html lang="pt">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Configurações - Dashboard</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}">
    <style>
        .active {
            background-color: #d83737;
            color: white;
        }
    </style>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-50">
    <div class="min-h-screen p-4 md:p-6">

        <!-- Cabeçalho da Página -->
        <div class="mb-6 md:mb-8">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
                <div>
                    <h1 class="text-2xl lg:text-3xl font-bold text-gray-900">Configurações</h1>
                    <p class="text-gray-600 mt-2">Gerencie as configurações do sistema e estrutura da igreja</p>
                </div>
                <div class="mt-4 lg:mt-0">
                    <!-- Breadcrumb -->
                    <nav class="flex" aria-label="Breadcrumb">
                        <ol class="inline-flex items-center space-x-1 md:space-x-3">
                            <li class="inline-flex items-center">
                                <a href="{{ route('admin.home') }}"
                                    class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-red-600">
                                    <i class="fas fa-arrow-left mr-2"></i> Voltar para Dashboard
                                </a>
                            </li>
                            <li aria-current="page">
                                <div class="flex items-center">
                                    <i class="fas fa-chevron-right text-gray-400"></i>
                                    <span class="ml-3 text-sm font-medium text-red-600">Configurações</span>
                                </div>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Layout em Grid -->
        <div class="flex gap-6">

            <div class="lg:col-span-1 max-w-80">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden sticky top-6">

                    <!-- Perfil do Usuário -->
                    <div class="p-6 border-b border-gray-100 bg-gradient-to-r from-red-50 to-white">
                        <div class="flex items-center space-x-4">
                            <div
                                class="w-16 h-12 rounded-full bg-gradient-to-br from-red-600 to-red-800 flex items-center justify-center text-white font-bold text-lg">
                                {{ Auth::user()->name[0] ?? 'A' }}
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900">{{ Auth::user()->name ?? 'Administrador' }}</h3>
                                <p class="text-sm text-gray-600">Administrador do Sistema</p>
                            </div>
                        </div>
                    </div>

                    <!-- Navegação Principal -->
                    <nav class="p-4">
                        <ul class="space-y-1">
                            <li>
                                <button data-tab="usuarios"
                                    class="config-tab w-full text-left px-4 py-3 rounded-xl hover:bg-red-50 hover:text-red-700 text-gray-700 font-medium flex items-center transition-all duration-200 active">
                                    <i class="fas fa-users w-5 mr-3"></i> Usuários
                                    <span
                                        class="ml-auto bg-red-100 text-red-800 text-xs font-semibold px-2 py-1 rounded-full">
                                        {{ $users->total() }}
                                    </span>
                                </button>
                            </li>

                            <li>
                                <button data-tab="sectores"
                                    class="config-tab w-full text-left px-4 py-3 rounded-xl hover:bg-red-50 hover:text-red-700 text-gray-700 font-medium flex items-center transition-all duration-200">
                                    <i class="fas fa-sitemap w-5 mr-3"></i> Sectores
                                    <span
                                        class="ml-auto bg-blue-100 text-blue-800 text-xs font-semibold px-2 py-1 rounded-full">
                                        {{ $sectores->total() }}
                                    </span>
                                </button>
                            </li>

                            <li>
                                <button data-tab="congregacoes"
                                    class="config-tab w-full text-left px-4 py-3 rounded-xl hover:bg-red-50 hover:text-red-700 text-gray-700 font-medium flex items-center transition-all duration-200">
                                    <i class="fas fa-church w-5 mr-3"></i> Congregações
                                    <span
                                        class="ml-auto bg-green-100 text-green-800 text-xs font-semibold px-2 py-1 rounded-full">
                                        {{ $congregacoes->count() }}
                                    </span>
                                </button>
                            </li>

                            <li>
                                <button data-tab="notificacoes"
                                    class="config-tab w-full text-left px-4 py-3 rounded-xl hover:bg-red-50 hover:text-red-700 text-gray-700 font-medium flex items-center transition-all duration-200">
                                    <i class="fas fa-bell w-5 mr-3"></i> Notificações
                                </button>
                            </li>
                        </ul>

                        <!-- Configurações Avançadas -->
                        <div class="mt-8 pt-6 border-t border-gray-100">
                            <h4 class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-3 px-4">Avançado
                            </h4>
                            <ul class="space-y-1">
                                <li>
                                    <button data-tab="api"
                                        class="config-tab w-full text-left px-4 py-3 rounded-xl hover:bg-red-50 hover:text-red-700 text-gray-700 font-medium flex items-center transition-all duration-200">
                                        <i class="fas fa-code w-5 mr-3"></i> API
                                    </button>
                                </li>
                                <li>
                                    <button data-tab="logs"
                                        class="config-tab w-full text-left px-4 py-3 rounded-xl hover:bg-red-50 hover:text-red-700 text-gray-700 font-medium flex items-center transition-all duration-200">
                                        <i class="fas fa-history w-5 mr-3"></i> Logs de Sistema
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>

                <!-- Quick Stats -->
                <div class="mt-6 bg-white rounded-2xl shadow-sm border border-gray-100 p-4">
                    <h3 class="font-semibold text-gray-900 mb-3">Resumo do Sistema</h3>
                    <div class="space-y-3">
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-600">Usuários Ativos</span>
                            <span class="font-semibold text-green-600">{{ $activos }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-600">Usuários Inativos</span>
                            <span class="font-semibold text-red-600">{{ $inactivos }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-600">Sectores Ativos</span>
                            <span
                                class="font-semibold text-blue-600">{{ $sectores->where('status', true)->count() }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Conteúdo Principal -->
            <div class="w-full space-y-6">

                <!-- === TAB: USUÁRIOS === -->
                <section id="tab-usuarios" class="config-content animate-fadeIn">
                    <!-- Cabeçalho da Tab -->
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 my-4">
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

              

                    <!-- Tabela de Usuários -->
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                        <!-- Barra de Busca e Ações -->
                        <div class="p-6 border-b border-gray-100">
                            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
                                <div class="flex-1">
                                    <div class="relative">
                                        <i
                                            class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                        <input type="text" id="searchUsers"
                                            placeholder="Buscar usuário por nome, telefone ou perfil..."
                                            class="w-full pl-12 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all">
                                    </div>
                                </div>
                                <div class="flex items-center space-x-3 mt-4 lg:mt-0 lg:ml-4">
                                    <button
                                        class="px-4 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-xl transition-colors flex items-center group">
                                        <i class="fas fa-filter mr-2 group-hover:rotate-90 transition-transform"></i>
                                        Filtros
                                    </button>
                                    <button
                                        class="px-4 py-3 bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white rounded-xl transition-all duration-300 flex items-center group">
                                        <i class="fas fa-download mr-2 group-hover:scale-110 transition-transform"></i>
                                        Exportar
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Tabela -->
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Usuário
                                        </th>
                                        <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Perfil</th>
                                        <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Última
                                            Atualização</th>
                                        <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Status</th>
                                        <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Ações</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100" id="usersTableBody">
                                    @forelse ($users as $item)
                                        <tr class="hover:bg-gray-50 transition-colors duration-150 user-row"
                                            data-name="{{ strtolower($item->name) }}"
                                            data-role="{{ strtolower($item->role) }}">
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
                                                <span
                                                    class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800">
                                                    {{ $item->role }}
                                                </span>
                                            </td>
                                            <td class="py-4 px-6">
                                                <div class="space-y-1">
                                                    <span
                                                        class="text-sm text-gray-700">{{ $item->updated_at->diffForHumans() }}</span>
                                                    <p class="text-xs text-gray-500">
                                                        {{ $item->updated_at->format('d/m/Y H:i') }}</p>
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
                                                    <button
                                                        class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-100 transition-colors flex items-center justify-center group relative"
                                                        title="Visualizar">
                                                        <i class="fas fa-eye"></i>
                                                        <span
                                                            class="absolute -top-8 left-1/2 transform -translate-x-1/2 bg-gray-900 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap">
                                                            Visualizar
                                                        </span>
                                                    </button>
                                                    <button
                                                        class="w-8 h-8 rounded-lg bg-green-50 text-green-600 hover:bg-green-100 transition-colors flex items-center justify-center group relative"
                                                        title="Editar">
                                                        <i class="fas fa-edit"></i>
                                                        <span
                                                            class="absolute -top-8 left-1/2 transform -translate-x-1/2 bg-gray-900 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap">
                                                            Editar
                                                        </span>
                                                    </button>
                                                    @if ($item->status)
                                                        <a href="{{ route('admin.config.user.status', ['id' => $item->id]) }}"
                                                            class="w-8 h-8 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 transition-colors flex items-center justify-center group relative"
                                                            title="Bloquear">
                                                            <i class="fas fa-lock"></i>
                                                            <span
                                                                class="absolute -top-8 left-1/2 transform -translate-x-1/2 bg-gray-900 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap">
                                                                Bloquear
                                                            </span>
                                                        </a>
                                                    @else
                                                        <a href="{{ route('admin.config.user.status', ['id' => $item->id]) }}"
                                                            class="w-8 h-8 rounded-lg bg-green-50 text-green-600 hover:bg-green-100 transition-colors flex items-center justify-center group relative"
                                                            title="Desbloquear">
                                                            <i class="fas fa-unlock"></i>
                                                            <span
                                                                class="absolute -top-8 left-1/2 transform -translate-x-1/2 bg-gray-900 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap">
                                                                Desbloquear
                                                            </span>
                                                        </a>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="py-8 px-6 text-center text-gray-500">
                                                <div class="flex flex-col items-center">
                                                    <i class="fas fa-users text-gray-300 text-4xl mb-3"></i>
                                                    <p class="text-lg font-medium">Nenhum usuário encontrado</p>
                                                    <p class="text-gray-600 mt-1">Comece criando um novo usuário</p>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <!-- Paginação -->
                        <div
                            class="px-6 py-4 border-t border-gray-100 flex flex-col sm:flex-row sm:items-center sm:justify-between">
                            <div class="text-sm text-gray-500 mb-4 sm:mb-0">
                                Mostrando {{ $users->firstItem() }} a {{ $users->lastItem() }} de
                                {{ $users->total() }} usuários
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
                </section>

                <!-- === TAB: SECTORES === -->
                <section id="tab-sectores" class="config-content hidden animate-fadeIn">
                    <!-- Cabeçalho -->
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
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

                    <!-- Tabela de Sectores -->
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                        

                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Sector</th>
                                        <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Líder</th>
                                        <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Status</th>
                                        <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Ações</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100">
                                    @forelse ($sectores as $item)
                                        <tr class="hover:bg-gray-50 transition-colors">
                                            <td class="py-4 px-6">
                                                <div class="flex items-center">
                                                    <div
                                                        class="w-10 h-10 rounded-full bg-gradient-to-br from-blue-600 to-blue-800 flex items-center justify-center text-white font-semibold mr-3">
                                                        {{ substr($item->nome, 0, 1) }}
                                                    </div>
                                                    <div>
                                                        <p class="font-medium text-gray-900">{{ $item->nome }}</p>
                                                        <p class="text-sm text-gray-500">Cadastro:
                                                            {{ $item->created_at->format('m/Y') }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="py-4 px-6">
                                                <div class="space-y-1">
                                                    <span
                                                        class="font-medium text-gray-900">{{ $item->lider->name }}</span>
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
                            <div class="text-sm text-gray-500">
                                Mostrando {{ $sectores->firstItem() }} a {{ $sectores->lastItem() }} de
                                {{ $sectores->total() }} sectores
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
                </section>

                <!-- === TAB: CONGREGAÇÕES === -->
                <section id="tab-congregacoes" class="config-content hidden animate-fadeIn">
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

                 

                    <!-- Tabela de Congregações -->
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                      
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Congregação
                                        </th>
                                        <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Pastor
                                            Responsável</th>
                                        <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Localização
                                        </th>
                                        <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Status</th>
                                        <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Ações</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100">
                                    @forelse ($congregacoes as $item)
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
                                                    <a href="{{ route('admin.home', $item->id) }}"
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
                                    @empty
                                        <tr>
                                            <td colspan="5" class="py-4 px-6 text-center text-gray-500">
                                                Nenhuma congregação encontrada.
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
                </section>

                <!-- === TABS ADICIONAIS === -->
                <section id="tab-notificacoes" class="config-content hidden">
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                        <h2 class="text-xl font-bold text-gray-900">Notificações</h2>
                        <p class="text-gray-600 mt-1">Em construção...</p>
                    </div>
                </section>

                <section id="tab-api" class="config-content hidden">
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                        <h2 class="text-xl font-bold text-gray-900">API</h2>
                        <p class="text-gray-600 mt-1">Em construção...</p>
                    </div>
                </section>

                <section id="tab-logs" class="config-content hidden">
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                        <h2 class="text-xl font-bold text-gray-900">Logs de Sistema</h2>
                        <p class="text-gray-600 mt-1">Em construção...</p>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <!-- === MODAIS === -->

    <!-- Modal: Novo Usuário -->
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

    <!-- Modal: Novo Sector -->
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

    <!-- Modal: Nova Congregação -->
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

            <form class="p-6" action="{{ route('admin.congregacao.novo') }}" method="POST">
                @csrf
                <div class="space-y-6">
                    <!-- Informações da Congregação -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Informações da Congregação</h3>
                        <div class="space-y-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Nome da Congregação
                                        *</label>
                                    <input type="text" name="nome"
                                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all"
                                        placeholder="Ex: Congregação Central">
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Data de
                                        Fundação</label>
                                    <input type="date" name="data_fundancao"
                                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all">
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Pastor
                                        Responsável</label>
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

    <!-- Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Sistema de Tabs
            const configTabs = document.querySelectorAll('.config-tab');
            const configContents = document.querySelectorAll('.config-content');

            function mostrarTab(tabId) {
                // Remover active de todas as tabs
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

                    // Salvar tab ativa no localStorage
                    localStorage.setItem('ultimaTabAtiva', tabId);
                });
            });

            // Busca em tempo real na tabela de usuários
            const searchUsers = document.getElementById('searchUsers');
            const userRows = document.querySelectorAll('.user-row');

            if (searchUsers && userRows.length > 0) {
                searchUsers.addEventListener('input', function() {
                    const searchTerm = this.value.toLowerCase();

                    userRows.forEach(row => {
                        const name = row.getAttribute('data-name');
                        const role = row.getAttribute('data-role');

                        if (name.includes(searchTerm) || role.includes(searchTerm)) {
                            row.style.display = '';
                        } else {
                            row.style.display = 'none';
                        }
                    });
                });
            }

            // Sistema de Modais
            class ModalManager {
                constructor(modalId, openBtnId, closeBtnIds = []) {
                    this.modal = document.getElementById(modalId);
                    this.content = this.modal?.querySelector('.transform');
                    this.openBtn = document.getElementById(openBtnId);
                    this.closeBtns = closeBtnIds.map(id => document.getElementById(id));
                    this.init();
                }

                init() {
                    if (!this.modal || !this.content) return;

                    // Abrir modal
                    if (this.openBtn) {
                        this.openBtn.addEventListener('click', () => this.abrir());
                    }

                    // Fechar modal com botões
                    this.closeBtns.forEach(btn => {
                        if (btn) {
                            btn.addEventListener('click', () => this.fechar());
                        }
                    });

                    // Fechar modal ao clicar fora
                    this.modal.addEventListener('click', (e) => {
                        if (e.target === this.modal) this.fechar();
                    });

                    // Fechar com ESC
                    document.addEventListener('keydown', (e) => {
                        if (e.key === 'Escape' && !this.modal.classList.contains('hidden')) {
                            this.fechar();
                        }
                    });
                }

                abrir() {
                    this.modal.classList.remove('hidden');
                    this.modal.classList.add('flex');

                    setTimeout(() => {
                        this.content.classList.remove('scale-95', 'opacity-0');
                        this.content.classList.add('modal-aberto');
                    }, 10);

                    document.body.style.overflow = 'hidden';
                }

                fechar() {
                    this.content.classList.remove('modal-aberto');
                    this.content.classList.add('scale-95', 'opacity-0');

                    setTimeout(() => {
                        this.modal.classList.remove('flex');
                        this.modal.classList.add('hidden');
                        document.body.style.overflow = '';
                    }, 300);
                }
            }

            // Inicializar modais
            const modalUsuario = new ModalManager('modalNovoUsuario', 'novoUsuarioBtn', ['fecharModalUsuario',
                'cancelarModalUsuario'
            ]);
            const modalSector = new ModalManager('modalNovoSector', 'novoSectorBtn', ['fecharModalSector',
                'cancelarModalSector'
            ]);
            const modalCongregacao = new ModalManager('modalNovaCongregacao', 'novaCongregacaoBtn', [
                'fecharModalCongregacao', 'cancelarModalCongregacao'
            ]);

            // Validação de formulários
            const forms = document.querySelectorAll('form');
            forms.forEach(form => {
                form.addEventListener('submit', function(e) {
                    const requiredFields = this.querySelectorAll('[required]');
                    let isValid = true;

                    requiredFields.forEach(field => {
                        if (!field.value.trim()) {
                            isValid = false;
                            field.classList.add('border-red-500');
                            field.classList.remove('border-gray-200');

                            // Adicionar mensagem de erro
                            let errorMsg = field.parentElement.querySelector('.error-msg');
                            if (!errorMsg) {
                                errorMsg = document.createElement('p');
                                errorMsg.className = 'error-msg text-red-500 text-xs mt-1';
                                errorMsg.textContent = 'Este campo é obrigatório';
                                field.parentElement.appendChild(errorMsg);
                            }
                        } else {
                            field.classList.remove('border-red-500');
                            field.classList.add('border-gray-200');

                            // Remover mensagem de erro
                            const errorMsg = field.parentElement.querySelector(
                                '.error-msg');
                            if (errorMsg) {
                                errorMsg.remove();
                            }
                        }
                    });

                    if (!isValid) {
                        e.preventDefault();
                        // Scroll para o primeiro erro
                        const firstError = this.querySelector('.border-red-500');
                        if (firstError) {
                            firstError.scrollIntoView({
                                behavior: 'smooth',
                                block: 'center'
                            });
                        }
                    }
                });
            });

            // Carregar última tab ativa
            const ultimaTab = localStorage.getItem('ultimaTabAtiva') || 'usuarios';
            mostrarTab(ultimaTab);

            // Tooltips para botões de ação
            const actionButtons = document.querySelectorAll('[title]');
            actionButtons.forEach(btn => {
                btn.addEventListener('mouseenter', function() {
                    const tooltip = this.querySelector('.tooltip');
                    if (tooltip) {
                        tooltip.classList.remove('opacity-0', 'invisible');
                        tooltip.classList.add('opacity-100', 'visible');
                    }
                });

                btn.addEventListener('mouseleave', function() {
                    const tooltip = this.querySelector('.tooltip');
                    if (tooltip) {
                        tooltip.classList.remove('opacity-100', 'visible');
                        tooltip.classList.add('opacity-0', 'invisible');
                    }
                });
            });
        });
    </script>
</body>

</html>
