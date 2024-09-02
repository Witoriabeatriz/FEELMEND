function validarLogin() {
    const usuario = document.getElementById("usuario").value.trim();
    const senha = document.getElementById("senha").value.trim();

    if (usuario === "") {
        alert("Por favor, preencha o campo de usuário.");
        return false;
    }

    if (senha === "") {
        alert("Por favor, preencha o campo de senha.");
        return false;
    }

    
    return true;
}
