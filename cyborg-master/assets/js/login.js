// BLOCO DE VERIFICAÇÃO DE PREENCHIMENTO DE CAMPOS
function Verifica() {
    let user = document.getElementById('loginEmail').value;
    let senha = document.getElementById('loginSenha').value;
    if (!user || !senha) {
    alert("Campos de preenchimento obrigatorio. Favor preencher!");
    }else {
        window.location = "./Campeonato.html";}}
        
        // REDIRECIONAR PARA CADASTRO
function Redirecionar() {
    window.location.href = "Cadastro.html";
    }
    