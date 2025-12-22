<!-- crentes-batizados.blade.php -->
@extends('admin.index')

@section('main')
    <div class="p-6">
        <!-- Cabeçalho -->
        <div class="mb-8">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
                <div>
                    <h1 class="text-2xl lg:text-3xl font-bold text-gray-900">Crentes Batizados</h1>
                    <p class="text-gray-600 mt-2">Gestão organizada por famílias e setores</p>
                </div>

            </div>
        </div>

        <!-- Estatísticas de Batizados -->
        {{-- <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm font-medium">Total Batizados</p>
                        <p class="text-3xl font-bold text-gray-900 mt-2">156</p>
                    </div>
                    <div class="w-12 h-12 rounded-xl bg-blue-50 flex items-center justify-center">
                        <i class="fas fa-water text-blue-600 text-xl"></i>
                    </div>
                </div>
                <div class="mt-4">
                    <span class="text-green-600 text-sm font-medium flex items-center">
                        <i class="fas fa-arrow-up mr-1"></i> +12 este ano
                    </span>
                </div>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm font-medium">Famílias Cadastradas</p>
                        <p class="text-3xl font-bold text-gray-900 mt-2">42</p>
                    </div>
                    <div class="w-12 h-12 rounded-xl bg-green-50 flex items-center justify-center">
                        <i class="fas fa-home text-green-600 text-xl"></i>
                    </div>
                </div>
                <div class="mt-4">
                    <span class="text-green-600 text-sm font-medium flex items-center">
                        <i class="fas fa-arrow-up mr-1"></i> +3 novas famílias
                    </span>
                </div>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm font-medium">Setores Ativos</p>
                        <p class="text-3xl font-bold text-gray-900 mt-2">5</p>
                    </div>
                    <div class="w-12 h-12 rounded-xl bg-purple-50 flex items-center justify-center">
                        <i class="fas fa-map-marker-alt text-purple-600 text-xl"></i>
                    </div>
                </div>
                <div class="mt-4">
                    <span class="text-gray-500 text-sm">Todos ativos</span>
                </div>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm font-medium">Média por Família</p>
                        <p class="text-3xl font-bold text-gray-900 mt-2">3,7</p>
                    </div>
                    <div class="w-12 h-12 rounded-xl bg-yellow-50 flex items-center justify-center">
                        <i class="fas fa-users text-yellow-600 text-xl"></i>
                    </div>
                </div>
                <div class="mt-4">
                    <span class="text-green-600 text-sm font-medium flex items-center">
                        <i class="fas fa-arrow-up mr-1"></i> +0,2 vs último ano
                    </span>
                </div>
            </div>
        </div> --}}

        <!-- Conteúdo - Lista Geral (Escondido por padrão) -->
        <div id="view-lista" class="space-y-6">
            <!-- Filtros Avançados -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">

                <!-- Lista Geral de Crentes -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Crente</th>
                                    <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Família</th>
                                    <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Setor</th>
                                    <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Batismo</th>
                                    <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Idade</th>
                                    <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Status</th>
                                    <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Ações</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
     
                                @forelse ($batizados as $item)
                                                               <!-- Crente 1 -->
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="py-4 px-6">
                                        <div class="flex items-center">
                                            <div
                                                class="w-10 h-10 rounded-full bg-gradient-to-br from-blue-500 to-blue-700 flex items-center justify-center text-white font-semibold mr-3">
                                                JS
                                            </div>
                                            <div>
                                                <p class="font-medium text-gray-900">João Silva</p>
                                                <p class="text-sm text-gray-500">Pai de Família</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <span class="text-gray-700">Família Silva</span>
                                    </td>
                                    <td class="py-4 px-6">
                                        <span
                                            class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                                            Norte
                                        </span>
                                    </td>
                                    <td class="py-4 px-6">
                                        <div class="space-y-1">
                                            <span class="text-sm text-gray-700">15/03/2020</span>
                                            <span class="text-xs text-gray-500">4 anos</span>
                                        </div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <span class="text-gray-700">45 anos</span>
                                    </td>
                                    <td class="py-4 px-6">
                                        <span
                                            class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                            Ativo
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

                    <!-- Paginação -->
                    <div class="px-6 py-4 border-t border-gray-100 flex items-center justify-between">
                        <div class="text-sm text-gray-500">
                            Mostrando 1-3 de 156 crentes
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
                                class="w-10 h-10 rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-700 flex items-center justify-center">16</button>
                            <button
                                class="w-10 h-10 rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-700 flex items-center justify-center">
                                <i class="fas fa-chevron-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Novo Crente -->
        <div id="modalNovoCrente"
            class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden items-center justify-center p-4">
            <div
                class="bg-white rounded-2xl w-full max-w-4xl max-h-[90vh] overflow-y-auto transform transition-all duration-300 scale-95 opacity-0">
                <div class="sticky top-0 bg-white p-6 border-b border-gray-100 z-10">
                    <div class="flex items-center justify-between">
                        <div>
                            <h2 class="text-xl font-bold text-gray-900">Novo Crente</h2>
                            <p class="text-gray-600 mt-1">Cadastre um novo membro da igreja</p>
                        </div>
                        <button id="fecharModalCrente"
                            class="w-10 h-10 rounded-lg hover:bg-gray-100 flex items-center justify-center transition-colors">
                            <i class="fas fa-times text-gray-500"></i>
                        </button>
                    </div>
                </div>

                <form class="p-6">
                    <div class="space-y-6">
                        <!-- Informações Pessoais -->
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Informações Pessoais</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Nome Completo *</label>
                                    <input type="text"
                                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all"
                                        placeholder="Ex: João da Silva">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Data de Nascimento</label>
                                    <input type="date"
                                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">CPF</label>
                                    <input type="text"
                                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all"
                                        placeholder="000.000.000-00">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">RG</label>
                                    <input type="text"
                                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all"
                                        placeholder="00.000.000-0">
                                </div>
                            </div>
                        </div>

                        <!-- Contato -->
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Contato</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Telefone *</label>
                                    <input type="tel"
                                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all"
                                        placeholder="(11) 99999-8888">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">E-mail</label>
                                    <input type="email"
                                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all"
                                        placeholder="exemplo@email.com">
                                </div>
                            </div>
                        </div>

                        <!-- Endereço -->
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Endereço</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">CEP</label>
                                    <input type="text"
                                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all"
                                        placeholder="00000-000">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Rua</label>
                                    <input type="text"
                                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all"
                                        placeholder="Rua, avenida, etc">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Número</label>
                                    <input type="text"
                                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all"
                                        placeholder="123">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Bairro</label>
                                    <input type="text"
                                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all"
                                        placeholder="Centro">
                                </div>
                            </div>
                        </div>

                        <!-- Informações Eclesiásticas -->
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Informações Eclesiásticas</h3>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Família</label>
                                    <select
                                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all">
                                        <option value="">Selecione uma família</option>
                                        <option value="silva">Família Silva</option>
                                        <option value="santos">Família Santos</option>
                                        <option value="oliveira">Família Oliveira</option>
                                        <option value="nova">Criar nova família</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Setor</label>
                                    <select
                                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all">
                                        <option value="">Selecione um setor</option>
                                        <option value="norte">Norte</option>
                                        <option value="sul">Sul</option>
                                        <option value="leste">Leste</option>
                                        <option value="oeste">Oeste</option>
                                        <option value="centro">Centro</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                                    <select
                                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all">
                                        <option value="ativo">Ativo</option>
                                        <option value="inativo">Inativo</option>
                                        <option value="visitante">Visitante</option>
                                        <option value="novo">Novo Convertido</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Batismo -->
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Informações de Batismo</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="flex items-center mb-4">
                                        <input type="checkbox" id="batizado"
                                            class="rounded border-gray-300 mr-3 text-red-600 focus:ring-red-500">
                                        <span class="text-gray-700">É batizado?</span>
                                    </label>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Data do Batismo</label>
                                    <input type="date"
                                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all"
                                        disabled id="dataBatismo">
                                </div>
                            </div>
                        </div>

                        <!-- Observações -->
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Observações</h3>
                            <div>
                                <textarea rows="4"
                                    class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all"
                                    placeholder="Observações sobre o crente..."></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 pt-6 border-t border-gray-100 flex justify-end space-x-4">
                        <button type="button" id="cancelarModalCrente"
                            class="px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-xl transition-colors">
                            Cancelar
                        </button>
                        <button type="submit"
                            class="px-6 py-3 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-medium rounded-xl transition-all duration-300 flex items-center">
                            <i class="fas fa-user-plus mr-2"></i> Cadastrar Crente
                        </button>
                    </div>
                </form>
            </div>
        </div>

        @push('styles')
            <style>
                .setor-tab {
                    transition: all 0.3s ease;
                }

                .setor-tab:hover {
                    color: #374151;
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
        @endpush
    @endsection
