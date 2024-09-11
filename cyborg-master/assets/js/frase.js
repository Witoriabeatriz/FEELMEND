function obterFraseDoDia() {
    const frases = [
        "A vida é 10% o que acontece com você e 90% como você reage a isso.",
        "Acredite em si próprio e todo o resto virá naturalmente.",
        "O único lugar onde o sucesso vem antes do trabalho é no dicionário.",
        "A jornada de mil milhas começa com um único passo.",
        "Não espere. O tempo nunca será justo."
    ];

    const hoje = new Date();
    const diaDoAno = Math.floor((hoje - new Date(hoje.getFullYear(), 0, 0)) / 86400000);
    const indice = diaDoAno % frases.length;

    return frases[indice];
}

document.addEventListener('DOMContentLoaded', function() {
    const fraseDoDia = obterFraseDoDia();
    document.getElementById('frase-motivacional').innerText = fraseDoDia;
});
