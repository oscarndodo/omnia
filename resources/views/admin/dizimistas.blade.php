<!-- dizimistas.blade.php -->
@extends('admin.index')

@section('main')
    <div class="p-6">
        <!-- Cabeçalho -->
        <div class="mb-8">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
                <div>
                    <h1 class="text-2xl lg:text-3xl font-bold text-gray-900">Controle de Dizimistas</h1>
                    <p class="text-gray-600 mt-2">Registre quem pagou dízimo sem valores específicos</p>
                </div>
               
            </div>
        </div>

        {{-- <!-- Período e Filtros -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 mb-8">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
                <!-- Período -->
                <div class="flex flex-wrap items-center gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Período</label>
                        <div class="flex items-center space-x-3">
                            <select id="mesReferencia"
                                class="px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all">
                                <option value="03">Março</option>
                                <option value="02">Fevereiro</option>
                                <option value="01">Janeiro</option>
                                <option value="12">Dezembro</option>
                                <option value="11">Novembro</option>
                            </select>
                            <select id="anoReferencia"
                                class="px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all">
                                <option value="2024">2024</option>
                                <option value="2023">2023</option>
                                <option value="2022">2022</option>
                            </select>
                            <button id="aplicarPeriodo"
                                class="px-4 py-2.5 bg-red-600 hover:bg-red-700 text-white rounded-xl transition-colors">
                                Aplicar
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Status e Busca -->
                <div class="flex items-center space-x-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                        <select id="filtroStatus"
                            class="px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all">
                            <option value="todos">Todos</option>
                            <option value="pago">Pagou</option>
                            <option value="nao-pago">Não Pagou</option>
                            <option value="pendente">Pendente</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Buscar</label>
                        <div class="relative">
                            <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                            <input type="text" placeholder="Nome..."
                                class="pl-10 pr-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Estatísticas de Dízimos -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm font-medium">Total Dizimistas</p>
                        <p class="text-3xl font-bold text-gray-900 mt-2">85</p>
                    </div>
                    <div class="w-12 h-12 rounded-xl bg-blue-50 flex items-center justify-center">
                        <i class="fas fa-users text-blue-600 text-xl"></i>
                    </div>
                </div>
                <div class="mt-4">
                    <span class="text-green-600 text-sm font-medium flex items-center">
                        <i class="fas fa-arrow-up mr-1"></i> +5 este mês
                    </span>
                </div>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm font-medium">Pagaram Este Mês</p>
                        <p class="text-3xl font-bold text-gray-900 mt-2">68</p>
                    </div>
                    <div class="w-12 h-12 rounded-xl bg-green-50 flex items-center justify-center">
                        <i class="fas fa-check-circle text-green-600 text-xl"></i>
                    </div>
                </div>
                <div class="mt-4">
                    <span class="text-green-600 text-sm font-medium">80% dos dizimistas</span>
                </div>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm font-medium">Não Pagaram</p>
                        <p class="text-3xl font-bold text-gray-900 mt-2">17</p>
                    </div>
                    <div class="w-12 h-12 rounded-xl bg-red-50 flex items-center justify-center">
                        <i class="fas fa-times-circle text-red-600 text-xl"></i>
                    </div>
                </div>
                <div class="mt-4">
                    <span class="text-red-600 text-sm font-medium">20% dos dizimistas</span>
                </div>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm font-medium">Regularidade</p>
                        <p class="text-3xl font-bold text-gray-900 mt-2">92%</p>
                    </div>
                    <div class="w-12 h-12 rounded-xl bg-yellow-50 flex items-center justify-center">
                        <i class="fas fa-chart-line text-yellow-600 text-xl"></i>
                    </div>
                </div>
                <div class="mt-4">
                    <span class="text-green-600 text-sm font-medium flex items-center">
                        <i class="fas fa-arrow-up mr-1"></i> +3% vs mês anterior
                    </span>
                </div>
            </div>
        </div>

        <!-- Período Atual -->
        <div class="mb-6">
            <div class="bg-gradient-to-r from-red-50 to-white rounded-2xl p-6 border border-red-100">
                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
                    <div class="flex items-center">
                        <div class="w-12 h-12 rounded-xl bg-red-100 flex items-center justify-center mr-4">
                            <i class="fas fa-calendar-alt text-red-600 text-lg"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">Março 2024</h3>
                            <p class="text-gray-600">Período atual de controle de dízimos</p>
                        </div>
                    </div>
                    <div class="mt-4 lg:mt-0 flex items-center space-x-4">
                        <div class="text-center">
                            <p class="text-2xl font-bold text-green-700">68</p>
                            <p class="text-sm text-gray-600">Pagaram</p>
                        </div>
                        <div class="text-center">
                            <p class="text-2xl font-bold text-red-700">17</p>
                            <p class="text-sm text-gray-600">Não Pagaram</p>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        <!-- Lista de Dizimistas -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-6 border-b border-gray-100">
                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900">Lista de Dizimistas</h3>
                        <p class="text-gray-600 mt-1">Marque quem já pagou o dízimo de {{ now()->format("M") }}/{{ now()->format("Y") }}</p>
                    </div>
                   
                </div>
            </div>

          

            <!-- Lista -->
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Dizimista</th>
                            <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Grupo Famíliar</th>
                            <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Status</th>
                            <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Último Pagamento</th>
                            <th class="text-left py-4 px-6 text-sm font-semibold text-gray-700">Ações</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">

                        @forelse ($dizimistas as $item)
                            
                        <!-- Dizimista 1 - Pagou -->
                        <tr class="hover:bg-green-50/30 transition-colors">
                            
                            <td class="py-4 px-6">
                                <div class="flex items-center">
                                    <div
                                        class="w-10 h-10 rounded-full bg-gradient-to-br from-blue-500 to-blue-700 flex items-center justify-center text-white font-semibold mr-3">
                                        {{ $item->data->nome[0] }}
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-900">{{ $item->data->nome }}</p>
                                        <p class="text-sm text-gray-500">
                                            @php

                                                $idade = \Carbon\Carbon::parse($item->data->data_nascimento)->age;

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
                                    <span class="text-gray-700">{{ $item->nome }}</span>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center">
                                    <div class="relative">
                                        <label for="pago-1" class="flex items-center cursor-pointer">
                                            <div
                                                class="w-12 h-6 flex items-center bg-green-500 rounded-full p-1 transition-all duration-300">
                                                <div
                                                    class="bg-white w-4 h-4 rounded-full shadow-md transform translate-x-6">
                                                </div>
                                            </div>
                                            <span class="ml-3 text-sm font-medium text-green-700">Pagou</span>
                                        </label>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="space-y-1">
                                    <span class="text-sm text-gray-700">{{ $item->created_at->format("d/m/Y") }}</span>
                                    {{-- <span class="text-xs text-gray-500">Dentro do prazo</span> --}}
                                </div>
                            </td>
                            
                            <td class="py-4 px-6">
                                <div class="flex items-center space-x-2">
                                    <button
                                        class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-100 transition-colors flex items-center justify-center">
                                        <i class="fas fa-eye"></i>
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

    @push('styles')
        <style>
            .status-checkbox:checked+label div {
                background-color: #10b981 !important;
            }

            .status-checkbox:checked+label div div {
                transform: translateX(24px) !important;
            }

            .checkbox-dizimista:checked {
                background-color: #dc2626;
                border-color: #dc2626;
            }

            /* Switch customizado */
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

            /* Checkbox personalizado para selecionar todos */
            #selecionarTodos:checked+label div div {
                display: block;
            }

            #selecionarTodosHeader:checked {
                background-color: #dc2626;
                border-color: #dc2626;
            }
        </style>
    @endpush

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Controle dos Switches de Status
                const statusCheckboxes = document.querySelectorAll('.status-checkbox');

                statusCheckboxes.forEach(checkbox => {
                    checkbox.addEventListener('change', function() {
                        const label = this.nextElementSibling;
                        const statusText = label.querySelector('span:last-child');

                        if (this.checked) {
                            statusText.textContent = 'Pagou';
                            statusText.className = 'ml-3 text-sm font-medium text-green-700';
                            this.closest('tr').classList.remove('hover:bg-red-50/30',
                                'hover:bg-yellow-50/30');
                            this.closest('tr').classList.add('hover:bg-green-50/30');
                        } else {
                            statusText.textContent = 'Não Pagou';
                            statusText.className = 'ml-3 text-sm font-medium text-gray-700';
                            this.closest('tr').classList.remove('hover:bg-green-50/30');
                            this.closest('tr').classList.add('hover:bg-red-50/30');
                        }
                    });
                });

                // Controle de Seleção Múltipla
                const selecionarTodosHeader = document.getElementById('selecionarTodosHeader');
                const selecionarTodos = document.getElementById('selecionarTodos');
                const checkboxesDizimistas = document.querySelectorAll('.checkbox-dizimista');

                // Selecionar todos no header
                if (selecionarTodosHeader) {
                    selecionarTodosHeader.addEventListener('change', function() {
                        const isChecked = this.checked;
                        checkboxesDizimistas.forEach(checkbox => {
                            checkbox.checked = isChecked;
                        });
                        selecionarTodos.checked = isChecked;
                    });
                }

                // Selecionar todos no painel de ações
                if (selecionarTodos) {
                    selecionarTodos.addEventListener('change', function() {
                        const isChecked = this.checked;
                        checkboxesDizimistas.forEach(checkbox => {
                            checkbox.checked = isChecked;
                        });
                        selecionarTodosHeader.checked = isChecked;
                    });
                }

                // Verificar se todos estão selecionados quando marcar individualmente
                checkboxesDizimistas.forEach(checkbox => {
                    checkbox.addEventListener('change', function() {
                        const todosSelecionados = Array.from(checkboxesDizimistas).every(cb => cb
                            .checked);
                        selecionarTodosHeader.checked = todosSelecionados;
                        selecionarTodos.checked = todosSelecionados;
                    });
                });

                // Ações em Massa
                const marcarComoPagoBtn = document.getElementById('marcarComoPago');
                const marcarComoNaoPagoBtn = document.getElementById('marcarComoNaoPago');
                const marcarTodosBtn = document.getElementById('marcarTodosBtn');
                const salvarAlteracoesBtn = document.getElementById('salvarAlteracoesBtn');

                if (marcarComoPagoBtn) {
                    marcarComoPagoBtn.addEventListener('click', function() {
                        const selecionados = Array.from(checkboxesDizimistas).filter(cb => cb.checked);

                        selecionados.forEach(checkbox => {
                            const id = checkbox.getAttribute('data-id');
                            const statusCheckbox = document.querySelector(
                                `.status-checkbox[data-id="${id}"]`);
                            if (statusCheckbox) {
                                statusCheckbox.checked = true;
                                statusCheckbox.dispatchEvent(new Event('change'));
                            }
                        });

                        // Desmarcar todos os checkboxes
                        checkboxesDizimistas.forEach(cb => cb.checked = false);
                        selecionarTodosHeader.checked = false;
                        selecionarTodos.checked = false;
                    });
                }

                if (marcarComoNaoPagoBtn) {
                    marcarComoNaoPagoBtn.addEventListener('click', function() {
                        const selecionados = Array.from(checkboxesDizimistas).filter(cb => cb.checked);

                        selecionados.forEach(checkbox => {
                            const id = checkbox.getAttribute('data-id');
                            const statusCheckbox = document.querySelector(
                                `.status-checkbox[data-id="${id}"]`);
                            if (statusCheckbox) {
                                statusCheckbox.checked = false;
                                statusCheckbox.dispatchEvent(new Event('change'));
                            }
                        });

                        // Desmarcar todos os checkboxes
                        checkboxesDizimistas.forEach(cb => cb.checked = false);
                        selecionarTodosHeader.checked = false;
                        selecionarTodos.checked = false;
                    });
                }

                if (marcarTodosBtn) {
                    marcarTodosBtn.addEventListener('click', function() {
                        statusCheckboxes.forEach(checkbox => {
                            checkbox.checked = true;
                            checkbox.dispatchEvent(new Event('change'));
                        });
                    });
                }

                if (salvarAlteracoesBtn) {
                    salvarAlteracoesBtn.addEventListener('click', function() {
                        // Coletar todos os status atualizados
                        const dados = Array.from(statusCheckboxes).map(checkbox => {
                            return {
                                id: checkbox.getAttribute('data-id'),
                                pago: checkbox.checked
                            };
                        });

                        // Aqui você enviaria os dados para o servidor
                        console.log('Salvando alterações:', dados);
                        alert('Alterações salvas com sucesso!');
                    });
                }

                // Período
                const aplicarPeriodoBtn = document.getElementById('aplicarPeriodo');
                const mesReferencia = document.getElementById('mesReferencia');
                const anoReferencia = document.getElementById('anoReferencia');

                if (aplicarPeriodoBtn) {
                    aplicarPeriodoBtn.addEventListener('click', function() {
                        const mes = mesReferencia.value;
                        const ano = anoReferencia.value;

                        // Aqui você carregaria os dados do período selecionado
                        console.log('Carregando dados do período:', mes, ano);

                        // Atualizar o título do período atual
                        const meses = {
                            '01': 'Janeiro',
                            '02': 'Fevereiro',
                            '03': 'Março',
                            '04': 'Abril',
                            '05': 'Maio',
                            '06': 'Junho',
                            '07': 'Julho',
                            '08': 'Agosto',
                            '09': 'Setembro',
                            '10': 'Outubro',
                            '11': 'Novembro',
                            '12': 'Dezembro'
                        };

                        const tituloPeriodo = document.querySelector('.bg-gradient-to-r h3');
                        if (tituloPeriodo) {
                            tituloPeriodo.textContent = `${meses[mes]} ${ano}`;
                        }
                    });
                }

                // Modal Registrar Pagamento
                const registrarPagamentoBtn = document.getElementById('registrarPagamentoBtn');
                const modalRegistrarPagamento = document.getElementById('modalRegistrarPagamento');
                const fecharModalPagamento = document.getElementById('fecharModalPagamento');
                const cancelarModalPagamento = document.getElementById('cancelarModalPagamento');
                const modalContent = modalRegistrarPagamento?.querySelector('.transform');

                function abrirModal() {
                    modalRegistrarPagamento.classList.remove('hidden');
                    modalRegistrarPagamento.classList.add('flex');
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
                        modalRegistrarPagamento.classList.remove('flex');
                        modalRegistrarPagamento.classList.add('hidden');
                        document.body.style.overflow = '';
                    }, 300);
                }

                if (registrarPagamentoBtn) registrarPagamentoBtn.addEventListener('click', abrirModal);
                if (fecharModalPagamento) fecharModalPagamento.addEventListener('click', fecharModal);
                if (cancelarModalPagamento) cancelarModalPagamento.addEventListener('click', fecharModal);

                if (modalRegistrarPagamento) {
                    modalRegistrarPagamento.addEventListener('click', function(e) {
                        if (e.target === modalRegistrarPagamento) {
                            fecharModal();
                        }
                    });

                    const form = modalRegistrarPagamento.querySelector('form');
                    if (form) {
                        form.addEventListener('submit', function(e) {
                            e.preventDefault();

                            // Coletar os dizimistas selecionados
                            const selecionados = Array.from(form.querySelectorAll('input[type="checkbox"]'))
                                .filter(cb => cb.checked && !cb.name); // Somente checkboxes de dizimistas

                            if (selecionados.length === 0) {
                                alert('Selecione pelo menos um dizimista!');
                                return;
                            }

                            // Aqui você processaria o registro dos pagamentos
                            alert(`${selecionados.length} dizimista(s) marcado(s) como pagos!`);
                            fecharModal();
                        });
                    }
                }

                // Gerar Relatório
                const gerarRelatorioBtn = document.getElementById('gerarRelatorioBtn');
                if (gerarRelatorioBtn) {
                    gerarRelatorioBtn.addEventListener('click', function() {
                        // Coletar dados para o relatório
                        const pagaram = document.querySelectorAll('.status-checkbox:checked').length;
                        const total = statusCheckboxes.length;
                        const naoPagaram = total - pagaram;

                        // Aqui você geraria e baixaria o relatório
                        alert(
                            `Gerando relatório:\nPagaram: ${pagaram}\nNão Pagaram: ${naoPagaram}\nTotal: ${total}\nTaxa: ${Math.round((pagaram/total)*100)}%`
                            );
                    });
                }

                // Filtro por Status
                const filtroStatus = document.getElementById('filtroStatus');
                if (filtroStatus) {
                    filtroStatus.addEventListener('change', function() {
                        const status = this.value;
                        const linhas = document.querySelectorAll('tbody tr');

                        linhas.forEach(linha => {
                            const statusCheckbox = linha.querySelector('.status-checkbox');
                            let mostrar = true;

                            if (status === 'pago' && !statusCheckbox.checked) {
                                mostrar = false;
                            } else if (status === 'nao-pago' && statusCheckbox.checked) {
                                mostrar = false;
                            }

                            if (mostrar) {
                                linha.style.display = '';
                            } else {
                                linha.style.display = 'none';
                            }
                        });
                    });
                }
            });
        </script>
    @endpush
@endsection
