// BLOCO DE VERIFICAÇÃO DE PREENCHIMENTO DE CAMPOS
function Verifica() {
    let user = document.getElementById('logincpf').value;
    let senha = document.getElementById('loginSenha').value;
    if (!user || !senha) {
    alert("Campos de preenchimento obrigatorio. Favor preencher!");
    }else if (user.indexOf('@') < 0) {
    alert("Informe um CPF válido!");
    }
    else {
        window.location = "../roda.html";}}
        
        // REDIRECIONAR PARA CADASTRO
function Redirecionar() {
    window.location.href = "cadastro.html";
    }

    function validarCPF() {
        let cpf = document.getElementById('identificacao').value;
        cpf = cpf.replace(/[^\d]/g, ''); // Remove todos os caracteres que não sejam dígitos
    
        if (cpf.length !== 11) {
            alert('CPF inválido! O CPF deve conter 11 dígitos.');
            return false;
        }
    
        // Verifica se todos os dígitos são iguais
        if (/^(\d)\1*$/.test(cpf)) {
            alert('CPF inválido! Todos os dígitos são iguais.');
            return false;
        }
    
        let soma = 0;
        let resto;
    
        // Calcula o primeiro dígito verificador
        for (let i = 1; i <= 9; i++) {
            soma += parseInt(cpf.substring(i - 1, i)) * (11 - i);
        }
        resto = (soma * 10) % 11;
    
        if ((resto === 10) || (resto === 11)) resto = 0;
        if (resto !== parseInt(cpf.substring(9, 10))) {
            alert('CPF inválido!');
            return false;
        }
    
        soma = 0;
    
        // Calcula o segundo dígito verificador
        for (let i = 1; i <= 10; i++) {
            soma += parseInt(cpf.substring(i - 1, i)) * (12 - i);
        }
        resto = (soma * 10) % 11;
    
        if ((resto === 10) || (resto === 11)) resto = 0;
        if (resto !== parseInt(cpf.substring(10, 11))) {
            alert('CPF inválido!');
            return false;
        }
    
        alert('CPF válido!');
        return true;
    }
    
    // Exemplo de uso ao sair do campo de input
    document.getElementById('identificacao').addEventListener('blur', validarCPF);
    

    
    function buscarCep() {
        var cep = document.getElementById('Cep').value;
        var url = 'https://viacep.com.br/ws/' + cep + '/json/';

        fetch(url)
            .then(response => response.json())
            .then(data => {
                if (!data.erro) {
                    document.getElementById('rua').value = data.logradouro;
                    document.getElementById('Cidade').value = data.localidade;
                    document.getElementById('Estado').value = data.uf;
                    document.getElementById('Bairro').value = data.bairro;
                } else {
                    alert('CEP não encontrado');
                }
            })
            .catch(error => {
                console.error('Erro ao buscar CEP:', error);
            });
    }
 