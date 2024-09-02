function validarLogin() {
    var usuario = document.getElementById("usuario").value;
    var senha = document.getElementById("senha").value;

    if (usuario === "" || senha === "") {
        alert("Por favor, preencha todos os campos.");
        return false; // Impede o envio do formulário
    }

    // Adicione mais validações se necessário

    return true; // Permite o envio do formulário se todos os campos forem preenchidos
}
