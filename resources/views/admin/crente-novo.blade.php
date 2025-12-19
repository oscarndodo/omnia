@extends('admin.index')

@section('main')
    <div class="p-6 w-full flex flex-col space-y-6 items-center">
      

        <form id="memberForm" action="{{ route('admin.crentes.novo') }}" method="POST" class="max-w-4xl mx-auto">
            @csrf

            <!-- Seção 1: Informações Pessoais -->
            <div id="section1" class="bg-white rounded-xl shadow-sm border border-gray-100 mb-6">
                <div class="p-6 border-b border-gray-100">
                    <h2 class="text-xl font-bold text-gray-900">
                        <i class="fas fa-user-circle text-red-600 mr-2"></i>
                        Informações Pessoais
                    </h2>
                    <p class="text-gray-600 text-sm mt-1">Preencha os dados pessoais básicos do crente</p>
                </div>

                <div class="p-6 space-y-6">
                    <!-- Dados Pessoais -->
                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nome Completo *</label>
                            <input type="text" name="nome"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition"
                                placeholder="Ex: João Baptista Silva" value="{{ old('nome') }}">
                            @error('nome')
                                <div class="text-red-600 text-sm mt-1">
                                    <i class="fas fa-exclamation-circle mr-1"></i>
                                    <span>{{ $message }}</span>
                                </div>
                            @enderror
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Data de Nascimento *</label>
                                <input type="date" name="data_nascimento"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition"
                                    value="{{ old('data_nascimento') }}">
                                @error('data_nascimento')
                                    <div class="text-red-600 text-sm mt-1">
                                        <i class="fas fa-exclamation-circle mr-1"></i>
                                        <span>{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Telefone *</label>
                                <input type="tel" name="telefone"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition"
                                    placeholder="+258 84 123 4567" value="{{ old('telefone') }}">
                                @error('telefone')
                                    <div class="text-red-600 text-sm mt-1">
                                        <i class="fas fa-exclamation-circle mr-1"></i>
                                        <span>{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Nome do Pai</label>
                                <input type="text" name="nome_pai"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition"
                                    placeholder="Nome completo do pai" value="{{ old('nome_pai') }}">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Nome da Mãe</label>
                                <input type="text" name="nome_mae"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition"
                                    placeholder="Nome completo da mãe" value="{{ old('nome_mae') }}">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Profissão</label>
                                <input type="text" name="profissao"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition"
                                    placeholder="Ex: Professor, Enfermeiro, Agricultor" value="{{ old('profissao') }}">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Endereço</label>
                                <input type="text" name="endereco"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition"
                                    placeholder="Ex: Muatala, Nampula" value="{{ old('endereco') }}">
                            </div>
                        </div>
                    </div>

                    <!-- Gênero -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Gênero *</label>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <label
                                class="border-2 border-gray-200 rounded-xl p-4 cursor-pointer hover:border-red-300 transition-colors {{ old('genero') == 'masculino' ? 'border-red-500 bg-red-50' : '' }}"
                                onclick="selectRadioCard(this, 'genero')">
                                <input type="radio" name="genero" value="masculino" class="hidden"
                                    {{ old('genero') == 'masculino' ? 'checked' : '' }}>
                                <div class="flex items-center">
                                    <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center mr-3">
                                        <i class="fas fa-male text-blue-600"></i>
                                    </div>
                                    <div>
                                        <p class="font-medium">Masculino</p>
                                        <p class="text-sm text-gray-500">Homem</p>
                                    </div>
                                </div>
                            </label>

                            <label
                                class="border-2 border-gray-200 rounded-xl p-4 cursor-pointer hover:border-red-300 transition-colors {{ old('genero') == 'feminino' ? 'border-red-500 bg-red-50' : '' }}"
                                onclick="selectRadioCard(this, 'genero')">
                                <input type="radio" name="genero" value="feminino" class="hidden"
                                    {{ old('genero') == 'feminino' ? 'checked' : '' }}>
                                <div class="flex items-center">
                                    <div class="w-10 h-10 rounded-full bg-pink-100 flex items-center justify-center mr-3">
                                        <i class="fas fa-female text-pink-600"></i>
                                    </div>
                                    <div>
                                        <p class="font-medium">Feminino</p>
                                        <p class="text-sm text-gray-500">Mulher</p>
                                    </div>
                                </div>
                            </label>


                        </div>
                        @error('genero')
                            <div class="text-red-600 text-sm mt-1">
                                <i class="fas fa-exclamation-circle mr-1"></i>
                                <span>{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <!-- Estado Civil -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Estado Civil *</label>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            <label
                                class="border-2 border-gray-200 rounded-xl p-4 cursor-pointer text-center hover:border-red-300 transition-colors {{ old('estado_civil') == 'solteiro' ? 'border-red-500 bg-red-50' : '' }}"
                                onclick="selectRadioCard(this, 'estado_civil')">
                                <input type="radio" name="estado_civil" value="solteiro" class="hidden"
                                    {{ old('estado_civil') == 'solteiro' ? 'checked' : '' }}>
                                <i class="fas fa-user text-2xl text-gray-600 mb-2"></i>
                                <p class="font-medium">Solteiro(a)</p>
                            </label>

                            <label
                                class="border-2 border-gray-200 rounded-xl p-4 cursor-pointer text-center hover:border-red-300 transition-colors {{ old('estado_civil') == 'casado' ? 'border-red-500 bg-red-50' : '' }}"
                                onclick="selectRadioCard(this, 'estado_civil')">
                                <input type="radio" name="estado_civil" value="casado" class="hidden"
                                    {{ old('estado_civil') == 'casado' ? 'checked' : '' }}>
                                <i class="fas fa-ring text-2xl text-red-600 mb-2"></i>
                                <p class="font-medium">Casado(a)</p>
                            </label>

                            <label
                                class="border-2 border-gray-200 rounded-xl p-4 cursor-pointer text-center hover:border-red-300 transition-colors {{ old('estado_civil') == 'divorciado' ? 'border-red-500 bg-red-50' : '' }}"
                                onclick="selectRadioCard(this, 'estado_civil')">
                                <input type="radio" name="estado_civil" value="divorciado" class="hidden"
                                    {{ old('estado_civil') == 'divorciado' ? 'checked' : '' }}>
                                <i class="fas fa-user-times text-2xl text-orange-600 mb-2"></i>
                                <p class="font-medium">Divorciado(a)</p>
                            </label>

                            <label
                                class="border-2 border-gray-200 rounded-xl p-4 cursor-pointer text-center hover:border-red-300 transition-colors {{ old('estado_civil') == 'viuvo' ? 'border-red-500 bg-red-50' : '' }}"
                                onclick="selectRadioCard(this, 'estado_civil')">
                                <input type="radio" name="estado_civil" value="viuvo" class="hidden"
                                    {{ old('estado_civil') == 'viuvo' ? 'checked' : '' }}>
                                <i class="fas fa-heart-broken text-2xl text-gray-600 mb-2"></i>
                                <p class="font-medium">Viúvo(a)</p>
                            </label>
                        </div>
                        @error('estado_civil')
                            <div class="text-red-600 text-sm mt-1">
                                <i class="fas fa-exclamation-circle mr-1"></i>
                                <span>{{ $message }}</span>
                            </div>
                        @enderror
                    </div>
                </div>

                <!-- Botões de Navegação -->
                <div class="p-6 border-t border-gray-100 flex justify-end">
                    <button type="button" onclick="nextSection(2)"
                        class="px-6 py-3 bg-red-600 text-white font-medium rounded-lg hover:bg-red-700 transition-colors shadow-sm">
                        Continuar
                        <i class="fas fa-arrow-right ml-2"></i>
                    </button>
                </div>
            </div>

            <!-- Seção 2: Informações Eclesiásticas -->
            <div id="section2" class="bg-white rounded-xl shadow-sm border border-gray-100 mb-6 hidden">
                <div class="p-6 border-b border-gray-100">
                    <h2 class="text-xl font-bold text-gray-900">
                        <i class="fas fa-church text-red-600 mr-2"></i>
                        Informações Eclesiásticas
                    </h2>
                    <p class="text-gray-600 text-sm mt-1">Datas importantes e status na igreja</p>
                </div>

                <div class="p-6 space-y-6">
                      <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Grupo Familiar</label>
                            <select name="grupo"
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent">
                                <option>Selecione uma congregação</option>
                                @foreach ($grupos as $grupo)
                                    <option value="{{ $grupo->id }}">{{ $grupo->nome }}</option>
                                @endforeach
                            </select>
                        </div>

                    <!-- Datas Importantes -->
                    <div class="space-y-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Datas Importantes</h3>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Data de Aceitação</label>
                                <input type="date" name="data_aceitacao"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition"
                                    value="{{ old('data_aceitacao') }}">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Data de Batismo</label>
                                <input type="date" name="data_batismo"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition"
                                    value="{{ old('data_batismo') }}">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Data de Casamento</label>
                                <input type="date" name="data_casamento"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition"
                                    value="{{ old('data_casamento') }}">
                            </div>
                        </div>
                    </div>

                    <!-- Status -->
                    <div class="space-y-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Status</h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 border border-gray-200 p-4 rounded-lg">
                            <div class="flex items-center space-x-3">
                                <input type="checkbox" name="batizado" value="1"
                                    class="h-5 w-5 rounded border-gray-300 text-red-600 focus:ring-red-500"
                                    {{ old('batizado') ? 'checked' : '' }}>
                                <span class="text-sm font-medium text-gray-700">Batizado</span>
                            </div>

                            <div class="flex items-center space-x-3">
                                <input type="checkbox" name="dizimista" value="1"
                                    class="h-5 w-5 rounded border-gray-300 text-red-600 focus:ring-red-500"
                                    {{ old('dizimista') ? 'checked' : '' }}>
                                <span class="text-sm font-medium text-gray-700">Dizimista</span>
                            </div>
                        </div>
                    </div>

                    <!-- Estado do Membro -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Estado do Membro *</label>
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                            @php
                                $estados = [
                                    'Ativo' => [
                                        'label' => 'Ativo',
                                        'icon' => 'fa-check-circle',
                                        'color' => 'text-green-600',
                                    ],
                                    'Inativo' => [
                                        'label' => 'Inativo',
                                        'icon' => 'fa-pause-circle',
                                        'color' => 'text-yellow-600',
                                    ],
                                    'Morto' => [
                                        'label' => 'Morto',
                                        'icon' => 'fa-ban',
                                        'color' => 'text-red-600',
                                    ],
                                    'Desviado' => [
                                        'label' => 'Desviado',
                                        'icon' => 'fa-exchange-alt',
                                        'color' => 'text-blue-600',
                                    ],
                                ];
                            @endphp

                            @foreach ($estados as $value => $data)
                                <label
                                    class="border-2 border-gray-200 rounded-xl p-4 cursor-pointer text-center hover:border-red-300 transition-colors {{ old('estado') == $value ? 'border-red-500 bg-red-50' : '' }}"
                                    onclick="selectRadioCard(this, 'estado')">
                                    <input type="radio" name="estado" value="{{ $value }}" class="hidden"
                                        {{ old('estado') == $value ? 'checked' : '' }}>
                                    <i class="fas {{ $data['icon'] }} text-2xl {{ $data['color'] }} mb-2"></i>
                                    <p class="font-medium">{{ $data['label'] }}</p>
                                </label>
                            @endforeach
                        </div>
                        @error('estado')
                            <div class="text-red-600 text-sm mt-1">
                                <i class="fas fa-exclamation-circle mr-1"></i>
                                <span>{{ $message }}</span>
                            </div>
                        @enderror
                    </div>
                </div>

                <!-- Botões de Navegação -->
                <div class="p-6 border-t border-gray-100 flex justify-between">
                    <button type="button" onclick="prevSection(1)"
                        class="px-6 py-3 border border-gray-300 text-gray-700 font-medium rounded-lg hover:bg-gray-50 transition-colors">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Voltar
                    </button>
                    <div class="flex space-x-3">
                        <button type="submit"
                            class="px-6 py-3 bg-green-600 text-white font-medium rounded-lg hover:bg-green-700 transition-colors shadow-sm">
                            <i class="fas fa-check mr-2"></i>
                            Finalizar Cadastro
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        let currentSection = 1;

        // Funções de navegação entre seções
        function showSection(sectionNumber) {
            // Esconder todas as seções
            for (let i = 1; i <= 2; i++) {
                const section = document.getElementById(`section${i}`);
                if (i === sectionNumber) {
                    if (section) section.classList.remove('hidden');
                } else {
                    if (section) section.classList.add('hidden');
                }
            }

            currentSection = sectionNumber;

            // Scroll para o topo suave
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }

        function nextSection(next) {
            if (validateCurrentSection()) {
                showSection(next);
            }
        }

        function prevSection(prev) {
            showSection(prev);
        }

        // Validação
        function validateCurrentSection() {
            let isValid = true;

            if (currentSection === 1) {
                // Validar nome completo
                const nomeInput = document.querySelector('input[name="nome"]');
                const nomeError = document.getElementById('nomeError');
                if (nomeInput && !nomeInput.value.trim()) {
                    nomeInput.classList.add('border-red-500');
                    if (!nomeError) {
                        const errorDiv = document.createElement('div');
                        errorDiv.id = 'nomeError';
                        errorDiv.className = 'text-red-600 text-sm mt-1';
                        errorDiv.innerHTML =
                            '<i class="fas fa-exclamation-circle mr-1"></i><span>Nome completo é obrigatório</span>';
                        nomeInput.parentNode.appendChild(errorDiv);
                    } else {
                        nomeError.classList.remove('hidden');
                    }
                    isValid = false;
                } else {
                    if (nomeInput) nomeInput.classList.remove('border-red-500');
                    if (nomeError) nomeError.classList.add('hidden');
                }

                // Validar data de nascimento
                const nascimentoInput = document.querySelector('input[name="data_nascimento"]');
                const nascimentoError = document.getElementById('nascimentoError');
                if (nascimentoInput && !nascimentoInput.value) {
                    nascimentoInput.classList.add('border-red-500');
                    if (!nascimentoError) {
                        const errorDiv = document.createElement('div');
                        errorDiv.id = 'nascimentoError';
                        errorDiv.className = 'text-red-600 text-sm mt-1';
                        errorDiv.innerHTML =
                            '<i class="fas fa-exclamation-circle mr-1"></i><span>Data de nascimento é obrigatória</span>';
                        nascimentoInput.parentNode.appendChild(errorDiv);
                    } else {
                        nascimentoError.classList.remove('hidden');
                    }
                    isValid = false;
                } else {
                    if (nascimentoInput) nascimentoInput.classList.remove('border-red-500');
                    if (nascimentoError) nascimentoError.classList.add('hidden');
                }

                // Validar telefone
                const telefoneInput = document.querySelector('input[name="telefone"]');
                const telefoneError = document.getElementById('telefoneError');
                if (telefoneInput && !telefoneInput.value.trim()) {
                    telefoneInput.classList.add('border-red-500');
                    if (!telefoneError) {
                        const errorDiv = document.createElement('div');
                        errorDiv.id = 'telefoneError';
                        errorDiv.className = 'text-red-600 text-sm mt-1';
                        errorDiv.innerHTML =
                            '<i class="fas fa-exclamation-circle mr-1"></i><span>Telefone é obrigatório</span>';
                        telefoneInput.parentNode.appendChild(errorDiv);
                    } else {
                        telefoneError.classList.remove('hidden');
                    }
                    isValid = false;
                } else {
                    if (telefoneInput) telefoneInput.classList.remove('border-red-500');
                    if (telefoneError) telefoneError.classList.add('hidden');
                }

                // Validar gênero
                const generoError = document.getElementById('generoError');
                const generoSelected = document.querySelector('input[name="genero"]:checked');
                if (!generoSelected) {
                    if (!generoError) {
                        const generoContainer = document.querySelector('input[name="genero"]').closest('div').parentNode;
                        const errorDiv = document.createElement('div');
                        errorDiv.id = 'generoError';
                        errorDiv.className = 'text-red-600 text-sm mt-1';
                        errorDiv.innerHTML =
                            '<i class="fas fa-exclamation-circle mr-1"></i><span>Selecione um gênero</span>';
                        generoContainer.appendChild(errorDiv);
                    } else {
                        generoError.classList.remove('hidden');
                    }
                    isValid = false;
                } else {
                    if (generoError) generoError.classList.add('hidden');
                }

                // Validar estado civil
                const estadoCivilError = document.getElementById('estadoCivilError');
                const estadoCivilSelected = document.querySelector('input[name="estado_civil"]:checked');
                if (!estadoCivilSelected) {
                    if (!estadoCivilError) {
                        const estadoCivilContainer = document.querySelector('input[name="estado_civil"]').closest('div')
                            .parentNode;
                        const errorDiv = document.createElement('div');
                        errorDiv.id = 'estadoCivilError';
                        errorDiv.className = 'text-red-600 text-sm mt-1';
                        errorDiv.innerHTML =
                            '<i class="fas fa-exclamation-circle mr-1"></i><span>Selecione o estado civil</span>';
                        estadoCivilContainer.appendChild(errorDiv);
                    } else {
                        estadoCivilError.classList.remove('hidden');
                    }
                    isValid = false;
                } else {
                    if (estadoCivilError) estadoCivilError.classList.add('hidden');
                }
            }

            if (currentSection === 2) {
                // Validar estado do membro
                const estadoError = document.getElementById('estadoError');
                const estadoSelected = document.querySelector('input[name="estado"]:checked');
                if (!estadoSelected) {
                    if (!estadoError) {
                        const estadoContainer = document.querySelector('input[name="estado"]').closest('div').parentNode;
                        const errorDiv = document.createElement('div');
                        errorDiv.id = 'estadoError';
                        errorDiv.className = 'text-red-600 text-sm mt-1';
                        errorDiv.innerHTML =
                            '<i class="fas fa-exclamation-circle mr-1"></i><span>Selecione o estado do membro</span>';
                        estadoContainer.appendChild(errorDiv);
                    } else {
                        estadoError.classList.remove('hidden');
                    }
                    isValid = false;
                } else {
                    if (estadoError) estadoError.classList.add('hidden');
                }
            }

            if (!isValid) {
                alert('Por favor, preencha todos os campos obrigatórios antes de continuar.');
            }

            return isValid;
        }

        // Funções auxiliares
        function selectRadioCard(element, name) {
            // Remover selected de todos os cards no mesmo grupo
            document.querySelectorAll(`input[name="${name}"]`).forEach(input => {
                const card = input.closest('label');
                if (card) {
                    card.classList.remove('border-red-500', 'bg-red-50');
                    card.classList.add('border-gray-200');
                }
            });

            // Marcar o radio button dentro do card
            const radio = element.querySelector('input[type="radio"]');
            if (radio) {
                radio.checked = true;
                element.classList.remove('border-gray-200');
                element.classList.add('border-red-500', 'bg-red-50');
            }
        }

        // Submissão do formulário
        document.getElementById('memberForm')?.addEventListener('submit', function(e) {
            // Validar todas as seções
            let allValid = true;
            for (let i = 1; i <= 2; i++) {
                currentSection = i;
                if (!validateCurrentSection()) {
                    allValid = false;
                    showSection(i);
                    break;
                }
            }

            if (!allValid) {
                e.preventDefault();
                alert('Por favor, preencha todos os campos obrigatórios antes de enviar.');
            }
        });

        // Inicializar cards selecionados com valores antigos
        document.addEventListener('DOMContentLoaded', function() {
            // Gênero
            const generoSelected = document.querySelector('input[name="genero"]:checked');
            if (generoSelected) {
                const card = generoSelected.closest('label');
                if (card) {
                    card.classList.remove('border-gray-200');
                    card.classList.add('border-red-500', 'bg-red-50');
                }
            }

            // Estado Civil
            const estadoCivilSelected = document.querySelector('input[name="estado_civil"]:checked');
            if (estadoCivilSelected) {
                const card = estadoCivilSelected.closest('label');
                if (card) {
                    card.classList.remove('border-gray-200');
                    card.classList.add('border-red-500', 'bg-red-50');
                }
            }

            // Estado
            const estadoSelected = document.querySelector('input[name="estado"]:checked');
            if (estadoSelected) {
                const card = estadoSelected.closest('label');
                if (card) {
                    card.classList.remove('border-gray-200');
                    card.classList.add('border-red-500', 'bg-red-50');
                }
            }
        });
    </script>
@endpush
