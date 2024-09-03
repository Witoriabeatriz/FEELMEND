// BLOCO DE VERIFICAÇÃO DE PREENCHIMENTO DE CAMPOS
function Verifica() {
    let user = document.getElementById('loginEmail').value;
    let senha = document.getElementById('loginSenha').value;
    if (!user || !senha) {
    alert("Campos de preenchimento obrigatorio. Favor preencher!");
    }else if (user.indexOf('@') < 0) {
    alert("Informe um email válido!");
    }
    else {
        window.location = "../roda.html";}}
        
        // REDIRECIONAR PARA CADASTRO
function Redirecionar() {
    window.location.href = "Cadastro.html";
    }
    