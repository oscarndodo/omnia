@extends('admin.index')

@section('main')
    @push('styles')
        <style>
            /* Variáveis CSS */
            :root {
                --primary-gradient: linear-gradient(135deg, #7f1d1d 0%, #991b1b 50%, #b91c1c 100%);
                --card-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
                --card-shadow-hover: 0 20px 50px rgba(0, 0, 0, 0.12);
            }

            /* Layout Principal */
            .settings-container {
                display: grid;
                grid-template-columns: 280px 1fr;
                gap: 2rem;
                min-height: calc(100vh - 180px);
            }

            /* Sidebar de Configurações */
            .settings-sidebar {
                position: sticky;
                top: 120px;
                height: fit-content;
            }

            .settings-nav-item {
                display: flex;
                align-items: center;
                padding: 1rem 1.5rem;
                color: #64748b;
                text-decoration: none;
                border-radius: 12px;
                margin-bottom: 0.5rem;
                transition: all 0.3s ease;
                border-left: 4px solid transparent;
            }

            .settings-nav-item:hover {
                background: #f8fafc;
                color: #1e293b;
                transform: translateX(4px);
            }

            .settings-nav-item.active {
                background: linear-gradient(90deg, rgba(127, 29, 29, 0.1) 0%, rgba(127, 29, 29, 0.05) 100%);
                color: #7f1d1d;
                border-left-color: #7f1d1d;
                font-weight: 600;
            }

            .settings-nav-icon {
                width: 24px;
                height: 24px;
                display: flex;
                align-items: center;
                justify-content: center;
                margin-right: 12px;
                background: rgba(127, 29, 29, 0.1);
                border-radius: 8px;
                color: #7f1d1d;
            }

            /* Cards Modernos */
            .modern-card {
                background: white;
                border-radius: 20px;
                box-shadow: var(--card-shadow);
                transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
                overflow: hidden;
                border: 1px solid rgba(0, 0, 0, 0.05);
            }

            .modern-card:hover {
                box-shadow: var(--card-shadow-hover);
                transform: translateY(-4px);
            }

            .card-header {
                padding: 1.75rem 2rem;
                border-bottom: 1px solid #f1f5f9;
                background: linear-gradient(90deg, #f8fafc 0%, #ffffff 100%);
            }

            .card-body {
                padding: 2rem;
            }

            /* Form Elements Avançados */
            .form-group {
                margin-bottom: 1.75rem;
            }

            .form-label {
                display: block;
                margin-bottom: 0.75rem;
                font-weight: 500;
                color: #334155;
                font-size: 0.875rem;
            }

            .form-input-modern {
                width: 100%;
                padding: 1rem 1.25rem;
                border: 2px solid #e2e8f0;
                border-radius: 12px;
                font-size: 0.95rem;
                transition: all 0.3s ease;
                background: white;
            }

            .form-input-modern:focus {
                outline: none;
                border-color: #7f1d1d;
                box-shadow: 0 0 0 3px rgba(127, 29, 29, 0.1);
            }

            .form-input-modern.error {
                border-color: #ef4444;
            }

            /* Badges Avançados */
            .badge-modern {
                display: inline-flex;
                align-items: center;
                padding: 0.375rem 0.875rem;
                border-radius: 20px;
                font-size: 0.75rem;
                font-weight: 600;
                text-transform: uppercase;
                letter-spacing: 0.5px;
            }

            .badge-success {
                background: linear-gradient(135deg, #10b981 0%, #059669 100%);
                color: white;
            }

            .badge-warning {
                background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
                color: white;
            }

            .badge-danger {
                background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
                color: white;
            }

            .badge-info {
                background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
                color: white;
            }

            /* User Cards */
            .user-card {
                display: flex;
                align-items: center;
                padding: 1.25rem;
                border-radius: 16px;
                background: white;
                border: 1px solid #f1f5f9;
                transition: all 0.3s ease;
                margin-bottom: 1rem;
            }

            .user-card:hover {
                border-color: #7f1d1d;
                transform: translateY(-2px);
                box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            }

            .user-avatar {
                width: 56px;
                height: 56px;
                border-radius: 16px;
                display: flex;
                align-items: center;
                justify-content: center;
                font-weight: 700;
                font-size: 1.25rem;
                color: white;
                margin-right: 1rem;
                flex-shrink: 0;
                position: relative;
                overflow: hidden;
            }

            .user-avatar::before {
                content: '';
                position: absolute;
                top: -2px;
                left: -2px;
                right: -2px;
                bottom: -2px;
                background: linear-gradient(135deg, #7f1d1d, #dc2626);
                border-radius: 18px;
                z-index: -1;
                animation: pulse-ring 2s infinite;
            }

            .user-info {
                flex: 1;
                min-width: 0;
            }

            .user-name {
                font-weight: 600;
                color: #1e293b;
                margin-bottom: 0.25rem;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }

            .user-email {
                font-size: 0.875rem;
                color: #64748b;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }

            .user-actions {
                display: flex;
                gap: 0.5rem;
                opacity: 0;
                transition: opacity 0.3s ease;
            }

            .user-card:hover .user-actions {
                opacity: 1;
            }

            .action-btn {
                width: 36px;
                height: 36px;
                border-radius: 10px;
                display: flex;
                align-items: center;
                justify-content: center;
                background: #f8fafc;
                color: #64748b;
                border: none;
                cursor: pointer;
                transition: all 0.2s ease;
            }

            .action-btn:hover {
                background: #7f1d1d;
                color: white;
                transform: scale(1.1);
            }

            /* Group Cards */
            .group-card {
                background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
                border-radius: 20px;
                padding: 1.5rem;
                border: 1px solid #e2e8f0;
                transition: all 0.3s ease;
                position: relative;
                overflow: hidden;
            }

            .group-card::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                height: 4px;
                background: linear-gradient(90deg, #7f1d1d, #dc2626);
            }

            .group-card:hover {
                transform: translateY(-4px);
                box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            }

            .group-icon {
                width: 64px;
                height: 64px;
                border-radius: 16px;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 1.5rem;
                margin-bottom: 1rem;
                background: rgba(127, 29, 29, 0.1);
                color: #7f1d1d;
            }

            .group-stats {
                display: flex;
                justify-content: space-between;
                margin-top: 1rem;
                padding-top: 1rem;
                border-top: 1px solid #e2e8f0;
            }

            .stat-item {
                text-align: center;
            }

            .stat-value {
                font-weight: 700;
                color: #1e293b;
                font-size: 1.25rem;
            }

            .stat-label {
                font-size: 0.75rem;
                color: #64748b;
                text-transform: uppercase;
                letter-spacing: 0.5px;
            }

            /* Tabs Modernas */
            .modern-tabs {
                display: flex;
                border-bottom: 2px solid #f1f5f9;
                margin-bottom: 2rem;
            }

            .modern-tab {
                padding: 1rem 2rem;
                color: #64748b;
                font-weight: 500;
                text-decoration: none;
                position: relative;
                transition: all 0.3s ease;
                border-bottom: 3px solid transparent;
                margin-bottom: -2px;
            }

            .modern-tab:hover {
                color: #1e293b;
            }

            .modern-tab.active {
                color: #7f1d1d;
                border-bottom-color: #7f1d1d;
            }

            /* Modal Moderno */
            .modal-overlay {
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: rgba(0, 0, 0, 0.75);
                display: flex;
                align-items: center;
                justify-content: center;
                z-index: 1000;
                opacity: 0;
                visibility: hidden;
                transition: all 0.3s ease;
                backdrop-filter: blur(5px);
            }

            .modal-overlay.active {
                opacity: 1;
                visibility: visible;
            }

            .modal-content {
                background: white;
                border-radius: 24px;
                width: 90%;
                max-width: 600px;
                max-height: 90vh;
                overflow-y: auto;
                transform: scale(0.9);
                opacity: 0;
                transition: all 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
            }

            .modal-overlay.active .modal-content {
                transform: scale(1);
                opacity: 1;
            }

            /* Search Modern */
            .search-container {
                position: relative;
                margin-bottom: 2rem;
            }

            .search-input {
                width: 100%;
                padding: 1rem 1.5rem 1rem 3.5rem;
                border: 2px solid #e2e8f0;
                border-radius: 16px;
                font-size: 1rem;
                transition: all 0.3s ease;
                background: white;
            }

            .search-input:focus {
                outline: none;
                border-color: #7f1d1d;
                box-shadow: 0 0 0 3px rgba(127, 29, 29, 0.1);
            }

            .search-icon {
                position: absolute;
                left: 1.25rem;
                top: 50%;
                transform: translateY(-50%);
                color: #94a3b8;
            }

            /* Loading Skeleton */
            .skeleton {
                background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
                background-size: 200% 100%;
                animation: loading 1.5s infinite;
                border-radius: 12px;
            }

            @keyframes loading {
                0% {
                    background-position: 200% 0;
                }

                100% {
                    background-position: -200% 0;
                }
            }

            /* Animações */
            @keyframes fadeInUp {
                from {
                    opacity: 0;
                    transform: translateY(20px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .animate-in {
                animation: fadeInUp 0.6s ease forwards;
            }

            .delay-1 {
                animation-delay: 0.1s;
                opacity: 0;
            }

            .delay-2 {
                animation-delay: 0.2s;
                opacity: 0;
            }

            .delay-3 {
                animation-delay: 0.3s;
                opacity: 0;
            }

            .delay-4 {
                animation-delay: 0.4s;
                opacity: 0;
            }

            /* Responsivo */
            @media (max-width: 1024px) {
                .settings-container {
                    grid-template-columns: 1fr;
                }

                .settings-sidebar {
                    position: static;
                    margin-bottom: 2rem;
                }
            }
        </style>
    @endpush

    <div class="w-full">
        <!-- Header -->
        <header class="sticky top-0 z-40 bg-white/95 backdrop-blur-lg border-b border-gray-100/50 shadow-sm">
            <div class="flex items-center justify-between px-8 py-5">
                <div class="flex items-center space-x-4">
                    <button id="menuToggle"
                        class="lg:hidden text-gray-600 hover:text-red-700 p-2 rounded-xl hover:bg-gray-100 transition-all">
                        <i class="fas fa-bars text-lg"></i>
                    </button>
                    <div>
                        <h1
                            class="text-2xl font-bold text-gray-900 bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent">
                            Configurações
                        </h1>
                        <p class="text-sm text-gray-500 mt-1">Gerencie usuários, grupos e configurações do sistema</p>
                    </div>
                </div>

                <div class="flex items-center space-x-3">
                    <div class="relative">
                        <button id="createBtn"
                            class="bg-gradient-to-r from-red-600 to-red-700 text-white px-6 py-3 rounded-xl font-semibold hover:shadow-lg hover:shadow-red-200 transition-all transform hover:-translate-y-0.5">
                            <i class="fas fa-plus mr-2"></i> Criar Novo
                        </button>
                        <div id="createDropdown"
                            class="absolute right-0 mt-2 w-64 bg-white rounded-2xl shadow-2xl border border-gray-100 py-2 z-50 hidden animate-in">
                            <div class="px-4 py-3 border-b border-gray-100">
                                <h3 class="font-semibold text-gray-900">Criar Novo</h3>
                            </div>
                            <div class="py-2">
                                <a href="#" onclick="openUserModal()"
                                    class="flex items-center px-4 py-3 hover:bg-red-50 transition-colors group">
                                    <div
                                        class="w-10 h-10 rounded-xl bg-red-100 group-hover:bg-red-200 transition-colors flex items-center justify-center mr-3">
                                        <i class="fas fa-user-plus text-red-600"></i>
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-900">Novo Usuário</p>
                                        <p class="text-xs text-gray-500">Adicionar administrador/membro</p>
                                    </div>
                                </a>
                                <a href="#" onclick="openGroupModal()"
                                    class="flex items-center px-4 py-3 hover:bg-blue-50 transition-colors group">
                                    <div
                                        class="w-10 h-10 rounded-xl bg-blue-100 group-hover:bg-blue-200 transition-colors flex items-center justify-center mr-3">
                                        <i class="fas fa-layer-group text-blue-600"></i>
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-900">Nova Célula</p>
                                        <p class="text-xs text-gray-500">Criar grupo/célula da igreja</p>
                                    </div>
                                </a>
                                <a href="#" onclick="openRoleModal()"
                                    class="flex items-center px-4 py-3 hover:bg-green-50 transition-colors group">
                                    <div
                                        class="w-10 h-10 rounded-xl bg-green-100 group-hover:bg-green-200 transition-colors flex items-center justify-center mr-3">
                                        <i class="fas fa-shield-alt text-green-600"></i>
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-900">Novo Cargo</p>
                                        <p class="text-xs text-gray-500">Definir permissões</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Conteúdo Principal -->
        <main class="p-8">
            <!-- Banner de Ações Rápidas -->
            <div class="modern-card mb-8 animate-in">
                <div class="card-header">
                    <div class="flex items-center justify-between">
                        <div>
                            <h2 class="text-xl font-bold text-gray-900">Gestão do Sistema</h2>
                            <p class="text-gray-500 mt-1">Gerencie todos os aspectos do sistema em um só lugar</p>
                        </div>
                        <div class="flex items-center space-x-3">
                            <button onclick="exportData()"
                                class="px-4 py-2 border border-gray-200 rounded-xl text-gray-600 hover:bg-gray-50 transition-colors">
                                <i class="fas fa-download mr-2"></i> Exportar
                            </button>
                            <button onclick="backupSystem()"
                                class="px-4 py-2 bg-green-600 text-white rounded-xl hover:bg-green-700 transition-colors">
                                <i class="fas fa-database mr-2"></i> Backup
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Layout de Configurações -->
            <div class="settings-container">
                <!-- Sidebar -->
                <aside class="settings-sidebar">
                    <div class="modern-card">
                        <nav class="py-4">
                            <a href="#" onclick="switchTab('users')" class="settings-nav-item active"
                                data-tab="users">
                                <div class="settings-nav-icon">
                                    <i class="fas fa-users"></i>
                                </div>
                                <span>Usuários</span>
                                <span class="ml-auto text-xs bg-red-100 text-red-700 px-2 py-1 rounded-full">12</span>
                            </a>
                            <a href="#" onclick="switchTab('groups')" class="settings-nav-item" data-tab="groups">
                                <div class="settings-nav-icon">
                                    <i class="fas fa-church"></i>
                                </div>
                                <span>Grupos & Células</span>
                                <span class="ml-auto text-xs bg-blue-100 text-blue-700 px-2 py-1 rounded-full">8</span>
                            </a>
                            <a href="#" onclick="switchTab('roles')" class="settings-nav-item" data-tab="roles">
                                <div class="settings-nav-icon">
                                    <i class="fas fa-user-tag"></i>
                                </div>
                                <span>Cargos & Permissões</span>
                            </a>
                            <a href="#" onclick="switchTab('system')" class="settings-nav-item" data-tab="system">
                                <div class="settings-nav-icon">
                                    <i class="fas fa-cogs"></i>
                                </div>
                                <span>Configurações</span>
                            </a>
                            <a href="#" onclick="switchTab('logs')" class="settings-nav-item" data-tab="logs">
                                <div class="settings-nav-icon">
                                    <i class="fas fa-history"></i>
                                </div>
                                <span>Logs do Sistema</span>
                            </a>
                            <a href="#" onclick="switchTab('backup')" class="settings-nav-item" data-tab="backup">
                                <div class="settings-nav-icon">
                                    <i class="fas fa-shield-alt"></i>
                                </div>
                                <span>Segurança & Backup</span>
                            </a>
                        </nav>
                    </div>

                    <!-- Quick Stats -->
                    <div class="modern-card mt-6">
                        <div class="p-6">
                            <h3 class="font-semibold text-gray-900 mb-4">Resumo do Sistema</h3>
                            <div class="space-y-4">
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-600">Usuários Ativos</span>
                                    <span class="font-semibold text-gray-900">8/12</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-600">Células Ativas</span>
                                    <span class="font-semibold text-gray-900">6/8</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-600">Último Backup</span>
                                    <span class="font-semibold text-green-600">Hoje</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-600">Espaço Usado</span>
                                    <span class="font-semibold text-gray-900">1.2GB</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>

                <!-- Conteúdo Principal -->
                <div class="settings-content">
                    <!-- Tab: Usuários -->
                    <div id="users-tab" class="tab-content active">
                        <div class="modern-card animate-in">
                            <div class="card-header">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h2 class="text-xl font-bold text-gray-900">Gestão de Usuários</h2>
                                        <p class="text-gray-500 mt-1">Gerencie administradores e membros do sistema</p>
                                    </div>
                                    <div class="flex items-center space-x-3">
                                        <div class="relative">
                                            <div class="search-container">
                                                <i class="fas fa-search search-icon"></i>
                                                <input type="text" id="userSearch" placeholder="Buscar usuários..."
                                                    class="search-input" oninput="searchUsers(this.value)">
                                            </div>
                                        </div>
                                        <button onclick="openUserModal()"
                                            class="bg-gradient-to-r from-red-600 to-red-700 text-white px-5 py-2.5 rounded-xl font-medium hover:shadow-lg hover:shadow-red-200 transition-all">
                                            <i class="fas fa-plus mr-2"></i> Adicionar
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <!-- Filtros -->
                                <div class="flex items-center justify-between mb-6">
                                    <div class="flex space-x-2">
                                        <button onclick="filterUsers('all')"
                                            class="px-4 py-2 bg-red-600 text-white rounded-xl font-medium">Todos</button>
                                        <button onclick="filterUsers('active')"
                                            class="px-4 py-2 border border-gray-200 rounded-xl text-gray-600 hover:bg-gray-50">Ativos</button>
                                        <button onclick="filterUsers('inactive')"
                                            class="px-4 py-2 border border-gray-200 rounded-xl text-gray-600 hover:bg-gray-50">Inativos</button>
                                        <button onclick="filterUsers('admin')"
                                            class="px-4 py-2 border border-gray-200 rounded-xl text-gray-600 hover:bg-gray-50">Administradores</button>
                                    </div>
                                    <div class="flex items-center space-x-3">
                                        <span class="text-sm text-gray-500">Ordenar por:</span>
                                        <select class="form-input-modern w-48" onchange="sortUsers(this.value)">
                                            <option value="name">Nome</option>
                                            <option value="date">Data de Criação</option>
                                            <option value="role">Cargo</option>
                                            <option value="status">Status</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Lista de Usuários -->
                                <div id="usersList" class="space-y-3">
                                    <!-- Usuário 1 -->
                                    <div class="user-card animate-in delay-1">
                                        <div class="user-avatar"
                                            style="background: linear-gradient(135deg, #7f1d1d, #dc2626);">
                                            AD
                                        </div>
                                        <div class="user-info">
                                            <div class="user-name">Admin OMNIA</div>
                                            <div class="user-email">admin@igreja.com</div>
                                            <div class="flex items-center mt-2 space-x-3">
                                                <span class="badge-modern badge-success">Administrador</span>
                                                <span class="text-xs text-gray-500">
                                                    <i class="fas fa-calendar mr-1"></i> Criado em: 15/01/2024
                                                </span>
                                            </div>
                                        </div>
                                        <div class="user-actions">
                                            <button onclick="editUser(1)" class="action-btn" title="Editar">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button onclick="viewUser(1)" class="action-btn" title="Visualizar">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button onclick="toggleUserStatus(1)" class="action-btn" title="Desativar">
                                                <i class="fas fa-power-off"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <!-- Usuário 2 -->
                                    <div class="user-card animate-in delay-2">
                                        <div class="user-avatar"
                                            style="background: linear-gradient(135deg, #3b82f6, #1d4ed8);">
                                            MP
                                        </div>
                                        <div class="user-info">
                                            <div class="user-name">Maria Pastor</div>
                                            <div class="user-email">maria.pastor@igreja.com</div>
                                            <div class="flex items-center mt-2 space-x-3">
                                                <span class="badge-modern badge-info">Pastora</span>
                                                <span class="text-xs text-gray-500">
                                                    <i class="fas fa-clock mr-1"></i> Último acesso: Hoje, 14:30
                                                </span>
                                            </div>
                                        </div>
                                        <div class="user-actions">
                                            <button onclick="editUser(2)" class="action-btn">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button onclick="viewUser(2)" class="action-btn">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button onclick="sendResetPassword(2)" class="action-btn"
                                                title="Redefinir Senha">
                                                <i class="fas fa-key"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <!-- Usuário 3 -->
                                    <div class="user-card animate-in delay-3">
                                        <div class="user-avatar"
                                            style="background: linear-gradient(135deg, #10b981, #059669);">
                                            JB
                                        </div>
                                        <div class="user-info">
                                            <div class="user-name">João Batista</div>
                                            <div class="user-email">joao.batista@igreja.com</div>
                                            <div class="flex items-center mt-2 space-x-3">
                                                <span class="badge-modern badge-warning">Líder de Célula</span>
                                                <span class="text-xs text-gray-500">
                                                    <i class="fas fa-users mr-1"></i> 45 membros
                                                </span>
                                            </div>
                                        </div>
                                        <div class="user-actions">
                                            <button onclick="editUser(3)" class="action-btn">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button onclick="viewUser(3)" class="action-btn">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button onclick="toggleUserStatus(3)" class="action-btn">
                                                <i class="fas fa-power-off"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <!-- Usuário 4 -->
                                    <div class="user-card animate-in delay-4">
                                        <div class="user-avatar"
                                            style="background: linear-gradient(135deg, #8b5cf6, #7c3aed);">
                                            AP
                                        </div>
                                        <div class="user-info">
                                            <div class="user-name">Ana Profeta</div>
                                            <div class="user-email">ana.profeta@igreja.com</div>
                                            <div class="flex items-center mt-2 space-x-3">
                                                <span class="badge-modern badge-info">Ministra de Louvor</span>
                                                <span class="text-xs text-gray-500">
                                                    <i class="fas fa-clock mr-1"></i> Último acesso: Ontem
                                                </span>
                                            </div>
                                        </div>
                                        <div class="user-actions">
                                            <button onclick="editUser(4)" class="action-btn">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button onclick="viewUser(4)" class="action-btn">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button onclick="sendResetPassword(4)" class="action-btn">
                                                <i class="fas fa-key"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Paginação -->
                                <div class="flex items-center justify-between mt-8 pt-6 border-t border-gray-100">
                                    <div class="text-sm text-gray-500">
                                        Mostrando 4 de 12 usuários
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <button
                                            class="w-10 h-10 flex items-center justify-center rounded-xl border border-gray-200 text-gray-600 hover:bg-gray-50">
                                            <i class="fas fa-chevron-left"></i>
                                        </button>
                                        <button
                                            class="w-10 h-10 flex items-center justify-center rounded-xl bg-red-600 text-white font-medium">1</button>
                                        <button
                                            class="w-10 h-10 flex items-center justify-center rounded-xl border border-gray-200 text-gray-600 hover:bg-gray-50">2</button>
                                        <button
                                            class="w-10 h-10 flex items-center justify-center rounded-xl border border-gray-200 text-gray-600 hover:bg-gray-50">3</button>
                                        <button
                                            class="w-10 h-10 flex items-center justify-center rounded-xl border border-gray-200 text-gray-600 hover:bg-gray-50">
                                            <i class="fas fa-chevron-right"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tab: Grupos & Células -->
                    <div id="groups-tab" class="tab-content">
                        <div class="modern-card animate-in">
                            <div class="card-header">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h2 class="text-xl font-bold text-gray-900">Grupos & Células</h2>
                                        <p class="text-gray-500 mt-1">Gerencie os grupos e células da igreja</p>
                                    </div>
                                    <button onclick="openGroupModal()"
                                        class="bg-gradient-to-r from-blue-600 to-blue-700 text-white px-5 py-2.5 rounded-xl font-medium hover:shadow-lg hover:shadow-blue-200 transition-all">
                                        <i class="fas fa-plus mr-2"></i> Nova Célula
                                    </button>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                    <!-- Grupo 1 -->
                                    <div class="group-card animate-in delay-1">
                                        <div class="group-icon">
                                            <i class="fas fa-church"></i>
                                        </div>
                                        <h3 class="text-lg font-bold text-gray-900 mb-2">Célula Central</h3>
                                        <p class="text-gray-600 text-sm mb-4">Célula principal da igreja com foco em
                                            discipulado</p>

                                        <div class="group-stats">
                                            <div class="stat-item">
                                                <div class="stat-value">65</div>
                                                <div class="stat-label">Membros</div>
                                            </div>
                                            <div class="stat-item">
                                                <div class="stat-value">Qua</div>
                                                <div class="stat-label">Dia</div>
                                            </div>
                                            <div class="stat-item">
                                                <div class="stat-value">19h</div>
                                                <div class="stat-label">Horário</div>
                                            </div>
                                        </div>

                                        <div class="flex justify-between items-center mt-6">
                                            <div class="flex items-center">
                                                <div
                                                    class="w-8 h-8 rounded-full bg-red-100 flex items-center justify-center mr-2">
                                                    <span class="text-xs font-semibold text-red-700">MP</span>
                                                </div>
                                                <span class="text-sm text-gray-600">Maria Pastor</span>
                                            </div>
                                            <button onclick="viewGroup(1)" class="text-blue-600 hover:text-blue-800">
                                                <i class="fas fa-chevron-right"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <!-- Grupo 2 -->
                                    <div class="group-card animate-in delay-2">
                                        <div class="group-icon"
                                            style="background: rgba(59, 130, 246, 0.1); color: #3b82f6;">
                                            <i class="fas fa-music"></i>
                                        </div>
                                        <h3 class="text-lg font-bold text-gray-900 mb-2">Ministério de Louvor</h3>
                                        <p class="text-gray-600 text-sm mb-4">Equipe responsável pela adoração e música</p>

                                        <div class="group-stats">
                                            <div class="stat-item">
                                                <div class="stat-value">24</div>
                                                <div class="stat-label">Membros</div>
                                            </div>
                                            <div class="stat-item">
                                                <div class="stat-value">Sáb</div>
                                                <div class="stat-label">Dia</div>
                                            </div>
                                            <div class="stat-item">
                                                <div class="stat-value">15h</div>
                                                <div class="stat-label">Horário</div>
                                            </div>
                                        </div>

                                        <div class="flex justify-between items-center mt-6">
                                            <div class="flex items-center">
                                                <div
                                                    class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center mr-2">
                                                    <span class="text-xs font-semibold text-blue-700">JB</span>
                                                </div>
                                                <span class="text-sm text-gray-600">João Batista</span>
                                            </div>
                                            <button onclick="viewGroup(2)" class="text-blue-600 hover:text-blue-800">
                                                <i class="fas fa-chevron-right"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <!-- Grupo 3 -->
                                    <div class="group-card animate-in delay-3">
                                        <div class="group-icon"
                                            style="background: rgba(16, 185, 129, 0.1); color: #10b981;">
                                            <i class="fas fa-hands-helping"></i>
                                        </div>
                                        <h3 class="text-lg font-bold text-gray-900 mb-2">Diaconia</h3>
                                        <p class="text-gray-600 text-sm mb-4">Serviço social e assistência à comunidade</p>

                                        <div class="group-stats">
                                            <div class="stat-item">
                                                <div class="stat-value">18</div>
                                                <div class="stat-label">Membros</div>
                                            </div>
                                            <div class="stat-item">
                                                <div class="stat-value">Sex</div>
                                                <div class="stat-label">Dia</div>
                                            </div>
                                            <div class="stat-item">
                                                <div class="stat-value">17h</div>
                                                <div class="stat-label">Horário</div>
                                            </div>
                                        </div>

                                        <div class="flex justify-between items-center mt-6">
                                            <div class="flex items-center">
                                                <div
                                                    class="w-8 h-8 rounded-full bg-green-100 flex items-center justify-center mr-2">
                                                    <span class="text-xs font-semibold text-green-700">PA</span>
                                                </div>
                                                <span class="text-sm text-gray-600">Pedro Apóstolo</span>
                                            </div>
                                            <button onclick="viewGroup(3)" class="text-blue-600 hover:text-blue-800">
                                                <i class="fas fa-chevron-right"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Outras Tabs (simplificadas) -->
                    <div id="roles-tab" class="tab-content">
                        <div class="modern-card animate-in">
                            <div class="card-header">
                                <h2 class="text-xl font-bold text-gray-900">Cargos & Permissões</h2>
                            </div>
                            <div class="card-body">
                                <!-- Conteúdo dos cargos -->
                            </div>
                        </div>
                    </div>

                    <div id="system-tab" class="tab-content">
                        <div class="modern-card animate-in">
                            <div class="card-header">
                                <h2 class="text-xl font-bold text-gray-900">Configurações do Sistema</h2>
                            </div>
                            <div class="card-body">
                                <!-- Configurações -->
                            </div>
                        </div>
                    </div>

                    <div id="logs-tab" class="tab-content">
                        <div class="modern-card animate-in">
                            <div class="card-header">
                                <h2 class="text-xl font-bold text-gray-900">Logs do Sistema</h2>
                            </div>
                            <div class="card-body">
                                <!-- Logs -->
                            </div>
                        </div>
                    </div>

                    <div id="backup-tab" class="tab-content">
                        <div class="modern-card animate-in">
                            <div class="card-header">
                                <h2 class="text-xl font-bold text-gray-900">Segurança & Backup</h2>
                            </div>
                            <div class="card-body">
                                <!-- Backup -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Modal de Usuário -->
    <div id="userModal" class="modal-overlay">
        <div class="modal-content">
            <div class="p-8">
                <div class="flex items-center justify-between mb-8">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900">Novo Usuário</h2>
                        <p class="text-gray-500 mt-1">Adicione um novo usuário ao sistema</p>
                    </div>
                    <button onclick="closeModal('userModal')"
                        class="w-10 h-10 rounded-xl flex items-center justify-center hover:bg-gray-100">
                        <i class="fas fa-times text-gray-500"></i>
                    </button>
                </div>

                <form id="userForm" class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="form-group">
                            <label class="form-label">Nome Completo</label>
                            <input type="text" class="form-input-modern" placeholder="Digite o nome completo"
                                required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-input-modern" placeholder="exemplo@igreja.com" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Telefone</label>
                            <input type="tel" class="form-input-modern" placeholder="+258 84 123 4567">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Cargo</label>
                            <select class="form-input-modern">
                                <option value="">Selecione um cargo</option>
                                <option value="admin">Administrador</option>
                                <option value="pastor">Pastor/Pastora</option>
                                <option value="leader">Líder de Célula</option>
                                <option value="member">Membro</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="form-group">
                            <label class="form-label">Senha</label>
                            <input type="password" class="form-input-modern" placeholder="Mínimo 8 caracteres" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Confirmar Senha</label>
                            <input type="password" class="form-input-modern" placeholder="Digite novamente" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Permissões</label>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-3">
                            <label class="flex items-center space-x-3 cursor-pointer">
                                <input type="checkbox" class="w-5 h-5 text-red-600 rounded">
                                <span class="text-gray-700">Usuários</span>
                            </label>
                            <label class="flex items-center space-x-3 cursor-pointer">
                                <input type="checkbox" class="w-5 h-5 text-red-600 rounded">
                                <span class="text-gray-700">Grupos</span>
                            </label>
                            <label class="flex items-center space-x-3 cursor-pointer">
                                <input type="checkbox" class="w-5 h-5 text-red-600 rounded">
                                <span class="text-gray-700">Financeiro</span>
                            </label>
                            <label class="flex items-center space-x-3 cursor-pointer">
                                <input type="checkbox" class="w-5 h-5 text-red-600 rounded">
                                <span class="text-gray-700">Relatórios</span>
                            </label>
                        </div>
                    </div>

                    <div class="flex justify-end space-x-4 pt-6 border-t border-gray-100">
                        <button type="button" onclick="closeModal('userModal')"
                            class="px-6 py-3 border border-gray-200 rounded-xl text-gray-600 hover:bg-gray-50 transition-colors">
                            Cancelar
                        </button>
                        <button type="submit"
                            class="px-6 py-3 bg-red-600 text-white rounded-xl font-medium hover:bg-red-700 transition-colors">
                            <i class="fas fa-save mr-2"></i> Salvar Usuário
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal de Grupo -->
    <div id="groupModal" class="modal-overlay">
        <div class="modal-content">
            <div class="p-8">
                <div class="flex items-center justify-between mb-8">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900">Nova Célula/Grupo</h2>
                        <p class="text-gray-500 mt-1">Crie um novo grupo ou célula da igreja</p>
                    </div>
                    <button onclick="closeModal('groupModal')"
                        class="w-10 h-10 rounded-xl flex items-center justify-center hover:bg-gray-100">
                        <i class="fas fa-times text-gray-500"></i>
                    </button>
                </div>

                <form id="groupForm" class="space-y-6">
                    <div class="form-group">
                        <label class="form-label">Nome do Grupo</label>
                        <input type="text" class="form-input-modern" placeholder="Ex: Célula Central" required>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="form-group">
                            <label class="form-label">Tipo</label>
                            <select class="form-input-modern">
                                <option value="cell">Célula</option>
                                <option value="ministry">Ministério</option>
                                <option value="department">Departamento</option>
                                <option value="team">Equipe</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Líder Responsável</label>
                            <select class="form-input-modern">
                                <option value="">Selecione um líder</option>
                                <option value="1">Maria Pastor</option>
                                <option value="2">João Batista</option>
                                <option value="3">Pedro Apóstolo</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="form-group">
                            <label class="form-label">Dia da Reunião</label>
                            <select class="form-input-modern">
                                <option>Segunda-feira</option>
                                <option>Terça-feira</option>
                                <option>Quarta-feira</option>
                                <option>Quinta-feira</option>
                                <option>Sexta-feira</option>
                                <option>Sábado</option>
                                <option>Domingo</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Horário</label>
                            <input type="time" class="form-input-modern">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Local</label>
                            <input type="text" class="form-input-modern" placeholder="Ex: Templo Principal">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Descrição</label>
                        <textarea rows="4" class="form-input-modern" placeholder="Descreva o propósito deste grupo..."></textarea>
                    </div>

                    <div class="flex justify-end space-x-4 pt-6 border-t border-gray-100">
                        <button type="button" onclick="closeModal('groupModal')"
                            class="px-6 py-3 border border-gray-200 rounded-xl text-gray-600 hover:bg-gray-50 transition-colors">
                            Cancelar
                        </button>
                        <button type="submit"
                            class="px-6 py-3 bg-blue-600 text-white rounded-xl font-medium hover:bg-blue-700 transition-colors">
                            <i class="fas fa-plus mr-2"></i> Criar Grupo
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Sistema de Tabs
                window.switchTab = function(tabName) {
                    // Remover active de todas as tabs
                    document.querySelectorAll('.tab-content').forEach(tab => {
                        tab.classList.remove('active');
                    });

                    document.querySelectorAll('.settings-nav-item').forEach(item => {
                        item.classList.remove('active');
                    });

                    // Ativar tab selecionada
                    document.getElementById(tabName + '-tab').classList.add('active');
                    document.querySelector(`[data-tab="${tabName}"]`).classList.add('active');

                    // Animar entrada
                    const tabContent = document.getElementById(tabName + '-tab');
                    tabContent.querySelectorAll('.animate-in').forEach((el, index) => {
                        el.style.animationDelay = `${index * 0.1}s`;
                        el.classList.add('animate-in');
                    });
                };

                // Create Button Dropdown
                const createBtn = document.getElementById('createBtn');
                const createDropdown = document.getElementById('createDropdown');

                if (createBtn) {
                    createBtn.addEventListener('click', function(e) {
                        e.stopPropagation();
                        createDropdown.classList.toggle('hidden');
                    });
                }

                // Fechar dropdown ao clicar fora
                document.addEventListener('click', function(e) {
                    if (!e.target.closest('#createDropdown') && !e.target.closest('#createBtn')) {
                        createDropdown.classList.add('hidden');
                    }
                });

                // Modal Functions
                window.openUserModal = function() {
                    document.getElementById('userModal').classList.add('active');
                    createDropdown.classList.add('hidden');
                };

                window.openGroupModal = function() {
                    document.getElementById('groupModal').classList.add('active');
                    createDropdown.classList.add('hidden');
                };

                window.closeModal = function(modalId) {
                    document.getElementById(modalId).classList.remove('active');
                };

                // Fechar modal ao clicar fora
                document.querySelectorAll('.modal-overlay').forEach(modal => {
                    modal.addEventListener('click', function(e) {
                        if (e.target === modal) {
                            modal.classList.remove('active');
                        }
                    });
                });

                // Form Submissions
                document.getElementById('userForm')?.addEventListener('submit', function(e) {
                    e.preventDefault();
                    // Implementar criação de usuário
                    alert('Usuário criado com sucesso!');
                    closeModal('userModal');
                });

                document.getElementById('groupForm')?.addEventListener('submit', function(e) {
                    e.preventDefault();
                    // Implementar criação de grupo
                    alert('Grupo criado com sucesso!');
                    closeModal('groupModal');
                });

                // Search Users
                window.searchUsers = function(query) {
                    console.log('Buscando usuários:', query);
                    // Implementar busca
                };

                // Filter Users
                window.filterUsers = function(filter) {
                    console.log('Filtrando por:', filter);
                    // Implementar filtro
                };

                // Sort Users
                window.sortUsers = function(sortBy) {
                    console.log('Ordenando por:', sortBy);
                    // Implementar ordenação
                };

                // User Actions
                window.editUser = function(id) {
                    console.log('Editando usuário:', id);
                    openUserModal();
                };

                window.viewUser = function(id) {
                    console.log('Visualizando usuário:', id);
                    // Implementar visualização
                };

                window.toggleUserStatus = function(id) {
                    console.log('Alternando status do usuário:', id);
                    // Implementar alternância de status
                };

                window.sendResetPassword = function(id) {
                    console.log('Enviando redefinição de senha para:', id);
                    // Implementar redefinição
                };

                window.viewGroup = function(id) {
                    console.log('Visualizando grupo:', id);
                    // Implementar visualização
                };

                // System Functions
                window.exportData = function() {
                    console.log('Exportando dados...');
                    // Implementar exportação
                };

                window.backupSystem = function() {
                    console.log('Fazendo backup do sistema...');
                    // Implementar backup
                };
            });
        </script>
    @endpush
@endsection
