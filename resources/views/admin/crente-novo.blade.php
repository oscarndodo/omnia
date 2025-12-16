@extends('admin.index')

@section('main')
    <!-- Header -->

    <div class="p-6 w-full flex flex-col space-y-6 items-center">
        <header class="w-full sticky top-0 z-40 bg-white border-b border-gray-100 shadow-sm">
            <div class="flex items-center justify-between px-6 py-4">
                <div class="flex items-center space-x-4">
                    <button id="menuToggle"
                        class="lg:hidden text-gray-600 hover:text-red-700 p-2 rounded-lg hover:bg-gray-100">
                        <i class="fas fa-bars text-lg"></i>
                    </button>
                    <div>
                        <h1 class="text-xl font-bold text-gray-900">Cadastrar Crente</h1>
                        <div class="flex items-center text-sm text-gray-500">
                            <a href="{{ route('admin.home') }}" class="hover:text-red-700">Dashboard</a>
                            <i class="fas fa-chevron-right mx-2 text-xs"></i>
                            <a href="{{ route('admin.crentes') }}" class="hover:text-red-700">Crentes</a>
                            <i class="fas fa-chevron-right mx-2 text-xs"></i>
                            <span class="text-gray-900 font-medium">Novo Cadastro</span>
                        </div>
                    </div>
                </div>


            </div>


        </header>
        <form id="memberForm" action="#" method="POST" enctype="multipart/form-data" class="max-w-6xl mx-auto">
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
                    <!-- Foto e Nome -->
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                        <!-- Upload de Foto -->
                        <div class="lg:col-span-1">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Foto</label>
                            <div class="border-2 border-dashed border-gray-300 rounded-xl p-8 text-center hover:border-red-300 transition-colors cursor-pointer"
                                onclick="document.getElementById('photoInput').click()">
                                <div id="avatarContainer">
                                    <div
                                        class="mx-auto w-32 h-32 rounded-full bg-gray-100 flex items-center justify-center mb-4">
                                        <i class="fas fa-user text-gray-400 text-4xl"></i>
                                    </div>
                                    <p class="text-sm text-gray-600 mb-2">Clique para selecionar uma foto</p>
                                    <p class="text-xs text-gray-500">JPEG, PNG • Máx. 5MB</p>
                                </div>
                                <input type="file" id="photoInput" name="foto" accept="image/*" class="hidden"
                                    onchange="previewPhoto(event)">
                            </div>
                            <div id="photoPreview" class="hidden mt-4 text-center">
                                <img id="previewImage"
                                    class="w-32 h-32 rounded-full object-cover mx-auto border-4 border-white shadow-lg">
                                <button type="button" onclick="removePhoto()"
                                    class="mt-3 text-sm text-red-600 hover:text-red-800">
                                    <i class="fas fa-trash mr-1"></i> Remover foto
                                </button>
                            </div>
                        </div>

                        <!-- Nome e Documentos -->
                        <div class="lg:col-span-2 space-y-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Nome Completo *</label>
                                    <input type="text" name="nome_completo" required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition"
                                        placeholder="Ex: João Baptista Silva">
                                    <div id="nomeError" class="hidden text-red-600 text-sm mt-1">
                                        <i class="fas fa-exclamation-circle mr-1"></i>
                                        <span>Nome completo é obrigatório</span>
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Data de Nascimento
                                        *</label>
                                    <input type="date" name="data_nascimento" required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition">
                                    <div id="nascimentoError" class="hidden text-red-600 text-sm mt-1">
                                        <i class="fas fa-exclamation-circle mr-1"></i>
                                        <span>Data de nascimento é obrigatória</span>
                                    </div>
                                </div>

                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Naturalidade</label>
                                    <input type="text" name="naturalidade"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition"
                                        placeholder="Ex: Maputo, Moçambique">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Nacionalidade</label>

                                    <select name="nacionalidade"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition">
                                        <option value="">Selecione...</option>
                                        <option value="MZ" selected>Moçambicana</option>
                                        <option value="PT">Portuguesa</option>
                                        <option value="BR">Brasileira</option>
                                        <option value="AO">Angolana</option>
                                        <option value="OUTRA">Outra</option>
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Nacionalidade</label>

                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Gênero e Estado Civil -->
                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Gênero *</label>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <label
                                    class="border-2 border-gray-200 rounded-xl p-4 cursor-pointer hover:border-red-300 transition-colors"
                                    onclick="selectRadioCard(this, 'genero')">
                                    <input type="radio" name="genero" value="masculino" required class="hidden">
                                    <div class="flex items-center">
                                        <div
                                            class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center mr-3">
                                            <i class="fas fa-male text-blue-600"></i>
                                        </div>
                                        <div>
                                            <p class="font-medium">Masculino</p>
                                            <p class="text-sm text-gray-500">Homem</p>
                                        </div>
                                    </div>
                                </label>

                                <label
                                    class="border-2 border-gray-200 rounded-xl p-4 cursor-pointer hover:border-red-300 transition-colors"
                                    onclick="selectRadioCard(this, 'genero')">
                                    <input type="radio" name="genero" value="feminino" class="hidden">
                                    <div class="flex items-center">
                                        <div
                                            class="w-10 h-10 rounded-full bg-pink-100 flex items-center justify-center mr-3">
                                            <i class="fas fa-female text-pink-600"></i>
                                        </div>
                                        <div>
                                            <p class="font-medium">Feminino</p>
                                            <p class="text-sm text-gray-500">Mulher</p>
                                        </div>
                                    </div>
                                </label>

                                <label
                                    class="border-2 border-gray-200 rounded-xl p-4 cursor-pointer hover:border-red-300 transition-colors"
                                    onclick="selectRadioCard(this, 'genero')">
                                    <input type="radio" name="genero" value="outro" class="hidden">
                                    <div class="flex items-center">
                                        <div
                                            class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center mr-3">
                                            <i class="fas fa-user text-gray-600"></i>
                                        </div>
                                        <div>
                                            <p class="font-medium">Outro</p>
                                            <p class="text-sm text-gray-500">Prefiro não dizer</p>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            <div id="generoError" class="hidden text-red-600 text-sm mt-1">
                                <i class="fas fa-exclamation-circle mr-1"></i>
                                <span>Selecione um gênero</span>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Estado Civil *</label>
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                                <label
                                    class="border-2 border-gray-200 rounded-xl p-4 cursor-pointer text-center hover:border-red-300 transition-colors"
                                    onclick="selectRadioCard(this, 'estado_civil')">
                                    <input type="radio" name="estado_civil" value="solteiro" required class="hidden">
                                    <i class="fas fa-user text-2xl text-gray-600 mb-2"></i>
                                    <p class="font-medium">Solteiro(a)</p>
                                </label>

                                <label
                                    class="border-2 border-gray-200 rounded-xl p-4 cursor-pointer text-center hover:border-red-300 transition-colors"
                                    onclick="selectRadioCard(this, 'estado_civil')">
                                    <input type="radio" name="estado_civil" value="casado" class="hidden">
                                    <i class="fas fa-ring text-2xl text-red-600 mb-2"></i>
                                    <p class="font-medium">Casado(a)</p>
                                </label>

                                <label
                                    class="border-2 border-gray-200 rounded-xl p-4 cursor-pointer text-center hover:border-red-300 transition-colors"
                                    onclick="selectRadioCard(this, 'estado_civil')">
                                    <input type="radio" name="estado_civil" value="divorciado" class="hidden">
                                    <i class="fas fa-user-times text-2xl text-orange-600 mb-2"></i>
                                    <p class="font-medium">Divorciado(a)</p>
                                </label>

                                <label
                                    class="border-2 border-gray-200 rounded-xl p-4 cursor-pointer text-center hover:border-red-300 transition-colors"
                                    onclick="selectRadioCard(this, 'estado_civil')">
                                    <input type="radio" name="estado_civil" value="viuvo" class="hidden">
                                    <i class="fas fa-heart-broken text-2xl text-gray-600 mb-2"></i>
                                    <p class="font-medium">Viúvo(a)</p>
                                </label>
                            </div>
                            <div id="estadoCivilError" class="hidden text-red-600 text-sm mt-1">
                                <i class="fas fa-exclamation-circle mr-1"></i>
                                <span>Selecione o estado civil</span>
                            </div>
                        </div>
                    </div>

                    <!-- Profissão e Escolaridade -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Profissão/Ocupação</label>
                            <input type="text" name="profissao"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition"
                                placeholder="Ex: Professor, Enfermeiro, Agricultor">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Escolaridade</label>
                            <select name="escolaridade"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition">
                                <option value="">Selecione...</option>
                                <option value="nenhuma">Nenhuma</option>
                                <option value="primaria_incompleta">Primária Incompleta</option>
                                <option value="primaria_completa">Primária Completa</option>
                                <option value="secundaria_incompleta">Secundária Incompleta</option>
                                <option value="secundaria_completa">Secundária Completa</option>
                                <option value="superior_incompleto">Superior Incompleto</option>
                                <option value="superior_completo">Superior Completo</option>
                            </select>
                        </div>
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

            <!-- Seção 2: Informações de Contacto -->
            <div id="section2" class="bg-white rounded-xl shadow-sm border border-gray-100 mb-6 hidden">
                <div class="p-6 border-b border-gray-100">
                    <h2 class="text-xl font-bold text-gray-900">
                        <i class="fas fa-address-book text-red-600 mr-2"></i>
                        Informações de Contacto
                    </h2>
                    <p class="text-gray-600 text-sm mt-1">Contactos e endereço residencial</p>
                </div>

                <div class="p-6 space-y-6">
                    <!-- Contactos Telefónicos -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Contactos Telefónicos</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Telefone Principal *</label>
                                <input type="tel" name="telefone_principal" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition"
                                    placeholder="+258 84 123 4567">
                                <div id="telefoneError" class="hidden text-red-600 text-sm mt-1">
                                    <i class="fas fa-exclamation-circle mr-1"></i>
                                    <span>Telefone principal é obrigatório</span>
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Telefone Alternativo</label>
                                <input type="tel" name="telefone_alternativo"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition"
                                    placeholder="+258 86 987 6543">
                            </div>
                        </div>
                    </div>


                    <!-- Endereço Residencial -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Endereço Residencial</h3>
                        <div class="space-y-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Província</label>
                                    <select name="provincia"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition">
                                        <option value="">Selecione...</option>
                                        <option value="maputo_cidade">Maputo Cidade</option>
                                        <option value="maputo_provincia">Maputo Província</option>
                                        <option value="gaza">Gaza</option>
                                        <option value="inhambane">Inhambane</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Cidade/Distrito</label>
                                    <input type="text" name="cidade"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition"
                                        placeholder="Ex: Maputo, Matola">
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Bairro/Comunal</label>
                                    <input type="text" name="bairro"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition"
                                        placeholder="Ex: Central, Malhangalene">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Rua/Avenida</label>
                                    <input type="text" name="rua"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition"
                                        placeholder="Ex: Av. 25 de Setembro">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Botões de Navegação -->
                <div class="p-6 border-t border-gray-100 flex justify-between">
                    <button type="button" onclick="prevSection(1)"
                        class="px-6 py-3 border border-gray-300 text-gray-700 font-medium rounded-lg hover:bg-gray-50 transition-colors">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Voltar
                    </button>
                    <button type="button" onclick="nextSection(3)"
                        class="px-6 py-3 bg-red-600 text-white font-medium rounded-lg hover:bg-red-700 transition-colors shadow-sm">
                        Continuar
                        <i class="fas fa-arrow-right ml-2"></i>
                    </button>
                </div>
            </div>

            <!-- Seção 3: Informações Eclesiásticas -->
            <div id="section3" class="bg-white rounded-xl shadow-sm border border-gray-100 mb-6 hidden">
                <div class="p-6 border-b border-gray-100">
                    <h2 class="text-xl font-bold text-gray-900">
                        <i class="fas fa-church text-red-600 mr-2"></i>
                        Informações Eclesiásticas
                    </h2>
                    <p class="text-gray-600 text-sm mt-1">Relação com a igreja e serviços</p>
                </div>

                <div class="p-6 space-y-6">
                    <!-- Informações de Igreja -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Informações de Igreja</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Data de Conversão</label>
                                <input type="date" name="data_conversao"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Data de Batismo</label>
                                <input type="date" name="data_batismo"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Situação na Igreja *</label>
                                <select name="situacao_igreja" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition">
                                    <option value="">Selecione...</option>
                                    <option value="membro_efetivo">Membro Efetivo</option>
                                    <option value="membro_assistente">Membro Assistente</option>
                                    <option value="frequentador">Frequentador</option>
                                    <option value="visitante">Visitante</option>
                                </select>
                                <div id="situacaoError" class="hidden text-red-600 text-sm mt-1">
                                    <i class="fas fa-exclamation-circle mr-1"></i>
                                    <span>Situação na igreja é obrigatória</span>
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Grupo/Célula *</label>
                                <select name="grupo_celula" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition">
                                    <option value="">Selecione um grupo...</option>
                                    <option value="A">Grupo A - Maputo Central</option>
                                    <option value="B">Grupo B - Matola</option>
                                    <option value="C">Grupo C - Beira</option>
                                </select>
                                <div id="grupoError" class="hidden text-red-600 text-sm mt-1">
                                    <i class="fas fa-exclamation-circle mr-1"></i>
                                    <span>Grupo/célula é obrigatório</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Ministérios -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Ministérios que Participa</h3>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                            @foreach (['Louvor', 'Intercessão', 'Diaconia', 'Evangelismo', 'Ensino', 'Acolhimento', 'Infantil', 'Juventude'] as $ministerio)
                                <label class="flex items-center space-x-2 p-2 hover:bg-gray-50 rounded">
                                    <input type="checkbox" name="ministerios[]" value="{{ strtolower($ministerio) }}"
                                        class="rounded border-gray-300 text-red-600 focus:ring-red-500">
                                    <span class="text-sm text-gray-700">{{ $ministerio }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <!-- Observações Eclesiásticas -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Observações Eclesiásticas</label>
                        <textarea name="observacoes_eclesiasticas" rows="3"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition resize-none"
                            placeholder="Informações relevantes sobre a vida espiritual..."></textarea>
                    </div>
                </div>

                <!-- Botões de Navegação -->
                <div class="p-6 border-t border-gray-100 flex justify-between">
                    <button type="button" onclick="prevSection(2)"
                        class="px-6 py-3 border border-gray-300 text-gray-700 font-medium rounded-lg hover:bg-gray-50 transition-colors">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Voltar
                    </button>
                    <button type="button" onclick="nextSection(4)"
                        class="px-6 py-3 bg-red-600 text-white font-medium rounded-lg hover:bg-red-700 transition-colors shadow-sm">
                        Continuar
                        <i class="fas fa-arrow-right ml-2"></i>
                    </button>
                </div>
            </div>

            <!-- Seção 4: Família -->
            <div id="section4" class="bg-white rounded-xl shadow-sm border border-gray-100 mb-6 hidden">
                <div class="p-6 border-b border-gray-100">
                    <h2 class="text-xl font-bold text-gray-900">
                        <i class="fas fa-home text-red-600 mr-2"></i>
                        Informações Familiares
                    </h2>
                    <p class="text-gray-600 text-sm mt-1">Membros da família e informações familiares</p>
                </div>

                <div class="p-6 space-y-6">
                    <!-- Cônjuge -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Informações do Cônjuge</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Nome do Cônjuge</label>
                                <input type="text" name="nome_conjuge"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition"
                                    placeholder="Nome completo do(a) esposo(a)">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Telefone do Cônjuge</label>
                                <input type="tel" name="telefone_conjuge"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition"
                                    placeholder="+258 84 123 4567">
                            </div>
                        </div>
                    </div>

                    <!-- Filhos -->
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-lg font-semibold text-gray-800">Filhos/Dependentes</h3>
                            <button type="button" onclick="addChild()"
                                class="text-sm text-red-600 hover:text-red-800 font-medium">
                                <i class="fas fa-plus mr-1"></i>
                                Adicionar Filho
                            </button>
                        </div>

                        <div id="childrenContainer" class="space-y-4">
                            <!-- Filhos serão adicionados aqui dinamicamente -->
                        </div>
                    </div>

                    <!-- Contacto de Emergência -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Contacto de Emergência</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Nome do Contacto</label>
                                <input type="text" name="emergencia_nome"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition"
                                    placeholder="Nome completo">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Parentesco</label>
                                <input type="text" name="emergencia_parentesco"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition"
                                    placeholder="Ex: Irmão, Tio, Amigo">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Telefone de Emergência</label>
                                <input type="tel" name="emergencia_telefone"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition"
                                    placeholder="+258 84 123 4567">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Telefone Alternativo</label>
                                <input type="tel" name="emergencia_telefone_alternativo"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition"
                                    placeholder="+258 86 987 6543">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Botões de Navegação -->
                <div class="p-6 border-t border-gray-100 flex justify-between">
                    <button type="button" onclick="prevSection(3)"
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
        let childrenCount = 0;

        // Funções de navegação entre seções
        function showSection(sectionNumber) {
            // Esconder todas as seções
            for (let i = 1; i <= 4; i++) {
                const section = document.getElementById(`section${i}`);
                const step = document.querySelector(`[data-step="${i}"]`);

                if (i === sectionNumber) {
                    if (section) section.classList.remove('hidden');
                    if (step) {
                        step.classList.add('active');
                        step.classList.remove('completed');
                    }
                } else {
                    if (section) section.classList.add('hidden');
                    if (step) {
                        step.classList.remove('active');
                        if (i < sectionNumber) {
                            step.classList.add('completed');
                        } else {
                            step.classList.remove('completed');
                        }
                    }
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
                const nomeInput = document.querySelector('input[name="nome_completo"]');
                const nomeError = document.getElementById('nomeError');
                if (nomeInput && !nomeInput.value.trim()) {
                    nomeInput.classList.add('border-red-500');
                    if (nomeError) nomeError.classList.remove('hidden');
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
                    if (nascimentoError) nascimentoError.classList.remove('hidden');
                    isValid = false;
                } else {
                    if (nascimentoInput) nascimentoInput.classList.remove('border-red-500');
                    if (nascimentoError) nascimentoError.classList.add('hidden');
                }

                // Validar gênero
                const generoError = document.getElementById('generoError');
                const generoSelected = document.querySelector('input[name="genero"]:checked');
                if (!generoSelected) {
                    if (generoError) generoError.classList.remove('hidden');
                    isValid = false;
                } else {
                    if (generoError) generoError.classList.add('hidden');
                }

                // Validar estado civil
                const estadoCivilError = document.getElementById('estadoCivilError');
                const estadoCivilSelected = document.querySelector('input[name="estado_civil"]:checked');
                if (!estadoCivilSelected) {
                    if (estadoCivilError) estadoCivilError.classList.remove('hidden');
                    isValid = false;
                } else {
                    if (estadoCivilError) estadoCivilError.classList.add('hidden');
                }
            }

            if (currentSection === 2) {
                // Validar telefone principal
                const telefoneInput = document.querySelector('input[name="telefone_principal"]');
                const telefoneError = document.getElementById('telefoneError');
                if (telefoneInput && !telefoneInput.value.trim()) {
                    telefoneInput.classList.add('border-red-500');
                    if (telefoneError) telefoneError.classList.remove('hidden');
                    isValid = false;
                } else {
                    if (telefoneInput) telefoneInput.classList.remove('border-red-500');
                    if (telefoneError) telefoneError.classList.add('hidden');
                }
            }

            if (currentSection === 3) {
                // Validar situação na igreja
                const situacaoSelect = document.querySelector('select[name="situacao_igreja"]');
                const situacaoError = document.getElementById('situacaoError');
                if (situacaoSelect && !situacaoSelect.value) {
                    situacaoSelect.classList.add('border-red-500');
                    if (situacaoError) situacaoError.classList.remove('hidden');
                    isValid = false;
                } else {
                    if (situacaoSelect) situacaoSelect.classList.remove('border-red-500');
                    if (situacaoError) situacaoError.classList.add('hidden');
                }

                // Validar grupo/célula
                const grupoSelect = document.querySelector('select[name="grupo_celula"]');
                const grupoError = document.getElementById('grupoError');
                if (grupoSelect && !grupoSelect.value) {
                    grupoSelect.classList.add('border-red-500');
                    if (grupoError) grupoError.classList.remove('hidden');
                    isValid = false;
                } else {
                    if (grupoSelect) grupoSelect.classList.remove('border-red-500');
                    if (grupoError) grupoError.classList.add('hidden');
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

        function previewPhoto(event) {
            const file = event.target.files[0];
            if (file) {
                if (file.size > 5 * 1024 * 1024) {
                    alert('O arquivo é muito grande. Por favor, selecione uma imagem menor que 5MB.');
                    return;
                }

                const reader = new FileReader();
                reader.onload = function(e) {
                    const previewImage = document.getElementById('previewImage');
                    const avatarContainer = document.getElementById('avatarContainer');
                    const photoPreview = document.getElementById('photoPreview');

                    if (previewImage) previewImage.src = e.target.result;
                    if (avatarContainer) avatarContainer.classList.add('hidden');
                    if (photoPreview) photoPreview.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            }
        }

        function removePhoto() {
            const photoInput = document.getElementById('photoInput');
            const avatarContainer = document.getElementById('avatarContainer');
            const photoPreview = document.getElementById('photoPreview');

            if (photoInput) photoInput.value = '';
            if (avatarContainer) avatarContainer.classList.remove('hidden');
            if (photoPreview) photoPreview.classList.add('hidden');
        }

        function addChild() {
            childrenCount++;
            const childHtml = `
            <div class="border border-gray-200 rounded-lg p-4 bg-gray-50" id="child-${childrenCount}">
                <div class="flex items-center justify-between mb-4">
                    <h4 class="font-medium text-gray-800">Filho ${childrenCount}</h4>
                    <button type="button" onclick="removeChild(${childrenCount})" 
                            class="text-red-600 hover:text-red-800">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nome</label>
                        <input type="text" name="filhos[${childrenCount}][nome]" 
                               class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none"
                               placeholder="Nome completo">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Data de Nascimento</label>
                        <input type="date" name="filhos[${childrenCount}][data_nascimento]" 
                               class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Gênero</label>
                        <select name="filhos[${childrenCount}][genero]" 
                                class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none">
                            <option value="">Selecione...</option>
                            <option value="masculino">Masculino</option>
                            <option value="feminino">Feminino</option>
                        </select>
                    </div>
                </div>
            </div>
        `;

            const childrenContainer = document.getElementById('childrenContainer');
            if (childrenContainer) {
                childrenContainer.insertAdjacentHTML('beforeend', childHtml);
            }
        }

        function removeChild(childId) {
            const childElement = document.getElementById(`child-${childId}`);
            if (childElement) {
                childElement.remove();
            }
        }

        function saveDraft() {
            // Coletar dados do formulário
            const formData = new FormData(document.getElementById('memberForm'));

            // Simular salvamento de rascunho
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            });

            Toast.fire({
                icon: 'success',
                title: 'Rascunho salvo com sucesso!'
            });
        }

        // Submissão do formulário
        document.getElementById('memberForm')?.addEventListener('submit', function(e) {
            e.preventDefault();

            // Validar todas as seções
            let allValid = true;
            for (let i = 1; i <= 4; i++) {
                currentSection = i;
                if (!validateCurrentSection()) {
                    allValid = false;
                    showSection(i);
                    break;
                }
            }

            if (allValid) {
                // Mostrar loading
                const submitBtn = this.querySelector('button[type="submit"]');
                const originalText = submitBtn.innerHTML;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Salvando...';
                submitBtn.disabled = true;

                // Enviar formulário
                this.submit();
            }
        });
    </script>
@endpush
