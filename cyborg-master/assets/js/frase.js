document.addEventListener('DOMContentLoaded', function() {
    fetch('obter_frase.php')
        .then(response => response.text())
        .then(frase => {
            document.getElementById('frase-motivacional').innerText = frase;
        })
        .catch(error => console.error('Erro ao obter a frase:', error));
});
