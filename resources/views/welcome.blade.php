<!doctype html>
<html lang="pt">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Bem-vindo</title>
    @vite('resources/css/app.css')

</head>

<body class="bg-gradient-to-br from-white to-red-100 flex items-center justify-center min-h-screen p-4">
    <main class="w-full max-w-sm animate-fade-in">
        <!-- Card de Login -->
        <section class="bg-white rounded-2xl -sm overflow-hidden">
            <!-- Header com gradiente sutil -->
            <div class="bg-gradient-to-r from-primary/5 to-primary/10 p-6 text-center">
                <div class="inline-flex items-center justify-center w-14 h-14 rounded-full bg-white mb-3">
                    <svg class="w-7 h-7 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                        </path>
                    </svg>
                </div>
                <h1 class="text-4xl text-gray-800 font-black">OMNIA</h1>
                <p class="text-gray-600 text-sm mt-1">Entre com suas credenciais</p>
            </div>

            <!-- Formulário -->
            <div class="p-6 animate-slide-up">
                <form id="loginForm" class="space-y-5" action="{{ route('auth.login') }}" method="POST">
                    <!-- Campo Número -->
                    @csrf
                    <div>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                    </path>
                                </svg>
                            </div>
                            <input type="tel" name="phone" placeholder="Número de telefone" required
                                class="w-full pl-10 pr-4 py-3 text-sm border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary focus:outline-none transition-all duration-200 bg-surface/50"
                                autocomplete="tel" />
                        </div>
                        <p class="text-xs text-gray-500 mt-1 ml-1">Use o formato: (+258) 84 12 34 567</p>
                    </div>

                    <!-- Campo Senha -->
                    <div>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                    </path>
                                </svg>
                            </div>
                            <input type="password" name="password" id="passwordField" placeholder="Senha" required
                                minlength="6"
                                class="w-full pl-10 pr-12 py-3 text-sm border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary focus:outline-none transition-all duration-200 bg-surface/50"
                                autocomplete="current-password" />
                            <button type="button" id="togglePassword"
                                class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                <svg id="eyeIcon" class="h-5 w-5 text-gray-400 hover:text-gray-600 transition-colors"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                        <p class="text-xs text-gray-500 mt-1 ml-1">Mínimo de 6 caracteres</p>
                    </div>

                    <!-- Botão de Submit com estados -->
                    <button type="submit" id="submitBtn"
                        class="w-full py-3 px-4 bg-gradient-to-r from-red-700 to-red-900 text-white font-medium rounded-lg hover:from-red-800 hover:to-red-900 focus:outline-none focus:ring-2 focus:ring-red-300 focus:ring-offset-2 transition-all text-sm uppercase duration-300 transform hover:-translate-y-0.5 active:translate-y-0 -md hover:-lg">
                        <span id="btnText">Entrar</span>
                        <div id="loadingSpinner" class="hidden justify-center flex w-full">
                            <div class="animate-spin rounded-full h-5 w-5 border-b-2 border-white"></div>
                        </div>
                    </button>

                    <!-- Link de recuperação (simples) -->
                    <div class="text-center pt-2">
                        <a href="#"
                            class="text-sm text-primary hover:text-primary-dark font-medium transition-colors">Esqueceu
                            sua senha?</a>
                    </div>
                </form>

                <!-- Mensagem de erro -->
                <div id="errorMessage"
                    class="hidden mt-4 p-3 bg-red-50 border border-red-100 rounded-lg text-red-700 text-sm text-center animate-shake">
                </div>

                <!-- Mensagem de sucesso -->
                <div id="successMessage"
                    class="hidden mt-4 p-3 bg-green-50 border border-green-100 rounded-lg text-green-700 text-sm text-center">
                </div>
            </div>

            <!-- Footer minimalista -->
            <div class="border-t border-gray-200 p-4 text-center">
                <p class="text-xs text-gray-500">&copy;{{ now()->format('Y') }} • Todos os direitos reservados</p>
            </div>
        </section>

        <!-- Indicador de foco minimalista -->
        <div class="mt-6 text-center">
            <div class="inline-flex space-x-1">
                <div class="w-2 h-2 rounded-full bg-primary/30 animate-pulse-subtle"></div>
                <div class="w-2 h-2 rounded-full bg-primary/30 animate-pulse-subtle" style="animation-delay: 0.2s">
                </div>
                <div class="w-2 h-2 rounded-full bg-primary/30 animate-pulse-subtle" style="animation-delay: 0.4s">
                </div>
            </div>
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('loginForm');
            const errorMessage = document.getElementById('errorMessage');
            const successMessage = document.getElementById('successMessage');
            const passwordField = document.getElementById('passwordField');
            const togglePassword = document.getElementById('togglePassword');
            const eyeIcon = document.getElementById('eyeIcon');
            const submitBtn = document.getElementById('submitBtn');
            const btnText = document.getElementById('btnText');
            const loadingSpinner = document.getElementById('loadingSpinner');
            const numeroField = form.querySelector('input[name="numero"]');

            // Máscara para telefone
            numeroField.addEventListener('input', function(e) {
                let value = e.target.value.replace(/\D/g, '');

                if (value.length <= 9) {
                    value = value.replace(/^(\d{2})(\d{2})(\d{2})(\d{3})/, '$2 $2 $2 $3');
                } else {
                    value = value.replace(/^(\d{3})(\d{2})(\d{2})(\d{2})(\d{3})/, '($2) $2 $2 $2 $3');
                }

                e.target.value = value;
            });

            // Alternar visibilidade da senha
            togglePassword.addEventListener('click', function() {
                const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordField.setAttribute('type', type);

                // Alternar ícone
                if (type === 'text') {
                    eyeIcon.innerHTML = `
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L6.59 6.59m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path>
          `;
                } else {
                    eyeIcon.innerHTML = `
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
          `;
                }
            });

            // Validação e envio do formulário
            form.addEventListener('submit', async function(e) {
                e.preventDefault();

                // Esconder mensagens anteriores
                errorMessage.classList.add('hidden');
                successMessage.classList.add('hidden');

                // Mostrar estado de carregamento
                btnText.classList.add('hidden');
                loadingSpinner.classList.remove('hidden');
                submitBtn.disabled = true;

                // Simular atraso de rede
                await new Promise(resolve => setTimeout(resolve, 1500));

                const numero = form.numero.value.trim().replace(/\D/g, '');
                const senha = form.senha.value.trim();

                // Validações
                let isValid = true;
                let errorText = '';

                if (!numero || numero.length < 10) {
                    isValid = false;
                    errorText = 'Número de telefone inválido';
                    numeroField.classList.add('border-red-300', 'focus:border-red-500',
                        'focus:ring-red-200');
                } else {
                    numeroField.classList.remove('border-red-300', 'focus:border-red-500',
                        'focus:ring-red-200');
                }

                if (!senha || senha.length < 6) {
                    isValid = false;
                    errorText = errorText ? 'Dados inválidos' :
                        'A senha deve ter pelo menos 6 caracteres';
                    passwordField.classList.add('border-red-300', 'focus:border-red-500',
                        'focus:ring-red-200');
                } else {
                    passwordField.classList.remove('border-red-300', 'focus:border-red-500',
                        'focus:ring-red-200');
                }

                if (!isValid) {
                    errorMessage.textContent = errorText;
                    errorMessage.classList.remove('hidden');
                    errorMessage.classList.add('animate-shake');

                    // Restaurar botão
                    btnText.classList.remove('hidden');
                    loadingSpinner.classList.add('hidden');
                    submitBtn.disabled = false;

                    // Remover animação de shake após execução
                    setTimeout(() => {
                        errorMessage.classList.remove('animate-shake');
                    }, 500);

                    return;
                }

                // Simulação de sucesso no login
                console.log('Credenciais enviadas:', {
                    numero,
                    senha
                });

                // Mostrar mensagem de sucesso
                successMessage.textContent = 'Login realizado com sucesso! Redirecionando...';
                successMessage.classList.remove('hidden');

                // Simular redirecionamento
                setTimeout(() => {
                    // Aqui normalmente faria o redirecionamento real
                    // window.location.href = '/dashboard';

                    // Para demonstração, resetamos o formulário
                    form.reset();
                    successMessage.classList.add('hidden');

                    // Restaurar botão
                    btnText.classList.remove('hidden');
                    loadingSpinner.classList.add('hidden');
                    submitBtn.disabled = false;

                    // Feedback visual de sucesso
                    submitBtn.classList.add('bg-gradient-to-r', 'from-green-500',
                        'to-green-600');
                    btnText.textContent = '✓ Login realizado';

                    setTimeout(() => {
                        submitBtn.classList.remove('bg-gradient-to-r', 'from-green-500',
                            'to-green-600');
                        submitBtn.classList.add('bg-gradient-to-r', 'from-primary',
                            'to-primary-dark');
                        btnText.textContent = 'Entrar';
                    }, 2000);

                }, 1500);
            });

            // Validação em tempo real para os campos
            [numeroField, passwordField].forEach(field => {
                field.addEventListener('blur', function() {
                    if (this.value.trim() && !this.checkValidity()) {
                        this.classList.add('border-red-300');
                    } else {
                        this.classList.remove('border-red-300');
                    }
                });

                field.addEventListener('input', function() {
                    if (this.checkValidity()) {
                        this.classList.remove('border-red-300');
                    }
                });
            });

            // Foco automático no primeiro campo
            numeroField.focus();
        });
    </script>
</body>

</html>
