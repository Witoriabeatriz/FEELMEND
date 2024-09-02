document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault();

    const username = document.getElementById('username').value.trim();
    const password = document.getElementById('password').value.trim();
    const errorMessage = document.getElementById('error-message');

    errorMessage.textContent = '';

    if (username === '') {
        errorMessage.textContent = 'Por favor, insira seu nome de usuário.';
        return;
    }

    if (password === '') {
        errorMessage.textContent = 'Por favor, insira sua senha.';
        return;
    }

    alert('Login realizado com sucesso!');
});
