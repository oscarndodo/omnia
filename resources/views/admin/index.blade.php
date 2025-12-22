<!doctype html>
<html lang="pt">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard</title>
    @vite('resources/css/app.css')


    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #7f1d1d;
            --primary-light: #fef2f2;
            --secondary: #1e293b;
            --success: #059669;
            --info: #0ea5e9;
            --warning: #f59e0b;
            --danger: #dc2626;
        }

        .sidebar {
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .gradient-bg {
            background: linear-gradient(135deg, #7f1d1d 0%, #991b1b 50%, #b91c1c 100%);
        }


        .sidebar:hover .sidebar-item-text {
            opacity: 1;
            transform: translateX(0);
        }

        .sidebar-item {
            position: relative;
            overflow: hidden;
        }

        .sidebar-item::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 3px;
            background: var(--primary);
            transform: scaleY(0);
            transition: transform 0.2s ease;
        }

        .sidebar-item.active::before {
            transform: scaleY(1);
        }

        /* Corrige o overflow do conteúdo */
        .main-content {
            margin-left: 5rem;
            /* w-20 = 5rem */
        }

        @media (min-width: 1024px) {
            .main-content {
                margin-left: 16rem;
                /* lg:w-64 = 16rem */
            }
        }
    </style>
    @stack('styles')
</head>

<body class="bg-gray-100 font-sans antialiased">
    <!-- Layout Principal -->
    <div class="flex">
        <!-- Sidebar Minimalista FIXA -->
        <aside
            class="sidebar fixed top-0 left-0 h-screen w-20 lg:w-64 bg-white border-r border-gray-100 flex flex-col z-50">
            <!-- Logo -->
            <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-center lg:justify-start">
                <div class="w-10 h-10 rounded-xl gradient-bg flex items-center justify-center border -lg">
                    <span class="text-white font-bold text-lg fas fa-crown"></span>
                </div>
                <div class="hidden lg:block ml-3">
                    <h1 class="text-xl font-bold text-gray-900">OMNIA</h1>
                    <p class="text-xs text-gray-500">Gestão Eclesiástica</p>
                </div>
            </div>

            <!-- Menu Principal -->
            <nav class="p-4 flex-1 overflow-y-auto">
                <ul class="space-y-2">
                    <!-- Dashboard -->
                    <li>
                        <a href="{{ route('admin.home') }}"
                            class="sidebar-item flex items-center p-3 rounded-xl hover:bg-gray-50 text-gray-700 transition-colors">
                            <i class="fas fa-home text-lg w-6 text-center"></i>
                            <span class="sidebar-item-text hidden lg:block ml-3 font-medium">Dashboard</span>
                        </a>
                    </li>

                    <!-- Crentes/Almas -->
                    <li>
                        <a href="{{ route('admin.crentes') }}"
                            class="sidebar-item flex items-center p-3 rounded-xl hover:bg-gray-50 text-gray-700 transition-colors">
                            <i class="fas fa-users text-lg w-6 text-center"></i>
                            <span class="sidebar-item-text hidden lg:block ml-3 font-medium">Crentes</span>
                            
                        </a>
                    </li>

                    <!-- Grupos/Células -->
                    <li>
                        <a href="{{ route('admin.grupos') }}"
                            class="sidebar-item flex items-center p-3 rounded-xl hover:bg-gray-50 text-gray-700 transition-colors">
                            <i class="fas fa-church text-lg w-6 text-center"></i>
                            <span class="sidebar-item-text hidden lg:block ml-3 font-medium">Grupos Fimiliares</span>
                        </a>
                    </li>

                    <!-- Eventos -->
                    <li>
                        <a href="{{ route('admin.eventos') }}"
                            class="sidebar-item flex items-center p-3 rounded-xl hover:bg-gray-50 text-gray-700 transition-colors">
                            <i class="fas fa-calendar-alt text-lg w-6 text-center"></i>
                            <span class="sidebar-item-text hidden lg:block ml-3 font-medium">Cultos</span>
                           
                        </a>
                    </li>

                    <!-- Batismos -->
                    <li>
                        <a href="{{ route('admin.batizados') }}"
                            class="sidebar-item flex items-center p-3 rounded-xl hover:bg-gray-50 text-gray-700 transition-colors">
                            <i class="fas fa-water text-lg w-6 text-center"></i>
                            <span class="sidebar-item-text hidden lg:block ml-3 font-medium">Membros</span>
                        </a>
                    </li>

                    <!-- Dízimos -->
                    <li>
                        <a href="{{ route('admin.dizimistas') }}"
                            class="sidebar-item flex items-center p-3 rounded-xl hover:bg-gray-50 text-gray-700 transition-colors">
                            <i class="fas fa-hand-holding-usd text-lg w-6 text-center"></i>
                            <span class="sidebar-item-text hidden lg:block ml-3 font-medium">Dízimistas</span>
                        </a>
                    </li>

                    <!-- Relatórios -->
                    {{-- <li>
                        <a href="#"
                            class="sidebar-item flex items-center p-3 rounded-xl hover:bg-gray-50 text-gray-700 transition-colors">
                            <i class="fas fa-chart-bar text-lg w-6 text-center"></i>
                            <span class="sidebar-item-text hidden lg:block ml-3 font-medium">Relatórios</span>
                        </a>
                    </li> --}}
                </ul>

                <!-- Menu Secundário -->
                <div class="mt-8 pt-6 border-t border-gray-100">
                    <ul class="space-y-2">
                        <!-- Configurações -->
                        <li>
                            <a href="{{ route('admin.config') }}"
                                class="sidebar-item flex items-center p-3 rounded-xl hover:bg-gray-50 text-gray-700 transition-colors">
                                <i class="fas fa-cog text-lg w-6 text-center"></i>
                                <span class="sidebar-item-text hidden lg:block ml-3 font-medium">Configurações</span>
                            </a>
                        </li>

                        <!-- Ajuda -->
                        <li>
                            <a href="https://oscarndodo.com"
                                class="sidebar-items flex items-center p-3 rounded-xl hover:bg-gray-50 text-red-700 transition-colors">
                                <i class="fas fa-question-circle text-lg w-6 text-center"></i>
                                <span class="sidebar-item-text hidden lg:block ml-3 font-medium">Ajuda</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- User Profile -->
            <a href="{{ route('auth.logout') }}" class="p-4 border-t border-gray-100">
                <div class="flex items-center">
                    <div class="relative">
                        <div
                            class="w-10 h-10 rounded-full bg-gradient-to-br from-red-600 to-red-800 flex items-center justify-center text-white font-semibold border -lg avatar-ring">
                            AD
                        </div>
                        <div class="absolute bottom-0 right-0 w-3 h-3 bg-green-500 rounded-full border-2 border-white">
                        </div>
                    </div>
                    <div class="hidden lg:block ml-3 flex-1">
                        <p class="text-sm font-semibold text-gray-900">Admin OMNIA</p>
                        <p class="text-xs text-gray-500">Terminar sessão</p>
                    </div>
                    <button class="hidden lg:block text-gray-400 hover:text-gray-600 ml-2">
                        <i class="fas fa-chevron-down"></i>
                    </button>
                </div>
            </a>
        </aside>

        <!-- Conteúdo Principal -->
        <div class="main-content flex-1 min-h-screen">
            @yield('main')
        </div>
    </div>

    <script src="{{ asset('assets/js/main.js') }}"></script>
    @stack('scripts')
</body>

</html>
