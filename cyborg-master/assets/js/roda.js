const canvas = document.getElementById('wheel'); // Obtém o elemento canvas
const ctx = canvas.getContext('2d'); // Obtém o contexto 2D do canvas

function drawWheel(values) {
    const totalSegments = values.length; // Total de segmentos
    const angleStep = (2 * Math.PI) / totalSegments; // Ângulo para cada segmento

    const maxRadius = canvas.width / 2 - 20; // Raio máximo ajustado para caber no canvas
    const centerX = canvas.width / 2; // Centro X do canvas
    const centerY = canvas.height / 2; // Centro Y do canvas

    ctx.clearRect(0, 0, canvas.width, canvas.height); // Limpa o canvas

    // Desenha a grade e os números
    for (let i = 1; i <= 10; i++) {
        const radius = (maxRadius / 10) * i;
        ctx.beginPath();
        ctx.arc(centerX, centerY, radius, 0, 2 * Math.PI);
        ctx.strokeStyle = '#ccc';
        ctx.lineWidth = 1;
        ctx.stroke();

        // Adiciona os números
        ctx.fillStyle = '#000';
        ctx.font = '14px Arial';
        ctx.fillText(i, centerX + radius - 15, centerY - 5);
    }

    // Desenha as linhas radiais
    for (let i = 0; i < totalSegments; i++) {
        const angle = i * angleStep;
        ctx.beginPath();
        ctx.moveTo(centerX, centerY);
        ctx.lineTo(centerX + maxRadius * Math.cos(angle), centerY + maxRadius * Math.sin(angle));
        ctx.strokeStyle = '#ccc';
        ctx.lineWidth = 1;
        ctx.stroke();
    }

    // Desenha os segmentos
    values.forEach((value, index) => {
        const startAngle = index * angleStep;
        const endAngle = startAngle + angleStep;
        const radius = (maxRadius / 10) * value;

        ctx.beginPath();
        ctx.moveTo(centerX, centerY);
        ctx.arc(centerX, centerY, radius, startAngle, endAngle);
        ctx.lineTo(centerX, centerY);
        ctx.closePath();

        // Define uma cor diferente para cada segmento
        ctx.fillStyle = `hsl(${(index * (360 / totalSegments))}, 100%, 50%)`;
        ctx.fill();
    });

    // Desenha a borda da roda
    ctx.beginPath();
    ctx.arc(centerX, centerY, maxRadius, 0, 2 * Math.PI);
    ctx.strokeStyle = '#000';
    ctx.lineWidth = 2;
    ctx.stroke();
}

function updateWheel() {
    const values = [
        parseInt(document.getElementById('autoconhecimento').value), // Obtém o valor de Autoconhecimento
        parseInt(document.getElementById('autoestima').value), // Obtém o valor de Autoestima
        parseInt(document.getElementById('gestaoEmocoes').value), // Obtém o valor de Gestão de Emoções
        parseInt(document.getElementById('relacionamentos').value), // Obtém o valor de Relacionamentos
        parseInt(document.getElementById('empatia').value), // Obtém o valor de Empatia
        parseInt(document.getElementById('comunicacao').value), // Obtém o valor de Comunicação
        parseInt(document.getElementById('proposito').value), // Obtém o valor de Propósito
        parseInt(document.getElementById('autocontrole').value), // Obtém o valor de Autocontrole
        parseInt(document.getElementById('motivacao').value), // Obtém o valor de Motivação
        parseInt(document.getElementById('bemEstar').value), // Obtém o valor de Bem-estar
        parseInt(document.getElementById('aceitacao').value), // Obtém o valor de Aceitação
        parseInt(document.getElementById('confianca').value) // Obtém o valor de Confiança
    ];

    drawWheel(values); // Atualiza a roda da vida com os valores
}

updateWheel(); // Chama a função para desenhar a roda da vida inicialmente

function drawWheel(values) {
    const totalSegments = values.length; // Total de segmentos
    const angleStep = (2 * Math.PI) / totalSegments; // Ângulo para cada segmento

    const maxRadius = canvas.width / 2 - 20; // Raio máximo ajustado para caber no canvas
    const centerX = canvas.width / 2; // Centro X do canvas
    const centerY = canvas.height / 2; // Centro Y do canvas

    ctx.clearRect(0, 0, canvas.width, canvas.height); // Limpa o canvas

    // Desenha a grade e os números
    for (let i = 1; i <= 10; i++) {
        const radius = (maxRadius / 10) * i;
        ctx.beginPath();
        ctx.arc(centerX, centerY, radius, 0, 2 * Math.PI);
        ctx.strokeStyle = '#ccc';
        ctx.lineWidth = 1;
        ctx.stroke();
    }

    // Desenha as linhas radiais
    for (let i = 0; i < totalSegments; i++) {
        const angle = i * angleStep;
        ctx.beginPath();
        ctx.moveTo(centerX, centerY);
        ctx.lineTo(centerX + maxRadius * Math.cos(angle), centerY + maxRadius * Math.sin(angle));
        ctx.strokeStyle = '#ccc';
        ctx.lineWidth = 1;
        ctx.stroke();
    }

    // Desenha os segmentos e adiciona os números
    values.forEach((value, index) => {
        const startAngle = index * angleStep;
        const endAngle = startAngle + angleStep;
        const radius = (maxRadius / 10) * value;

        // Calcula a posição para o número
        const textRadius = radius + 10; // Distância do número ao centro
        const textAngle = startAngle + (angleStep / 2); // Ângulo médio do segmento
        const textX = centerX + textRadius * Math.cos(textAngle); // Posição X do número
        const textY = centerY + textRadius * Math.sin(textAngle); // Posição Y do número

        ctx.beginPath();
        ctx.moveTo(centerX, centerY);
        ctx.arc(centerX, centerY, radius, startAngle, endAngle);
        ctx.lineTo(centerX, centerY);
        ctx.closePath();

        // Define uma cor diferente para cada segmento
        ctx.fillStyle = `hsl(${(index * (360 / totalSegments))}, 100%, 50%)`;
        ctx.fill();

        // Adiciona o número
        ctx.fillStyle = '#000';
        ctx.font = '14px Courier New';
        ctx.textAlign = 'center';
        ctx.textBaseline = 'middle';
        ctx.fillText(value, textX, textY);
    });

    // Desenha a borda da roda
    ctx.beginPath();
    ctx.arc(centerX, centerY, maxRadius, 0, 2 * Math.PI);
    ctx.strokeStyle = '#000';
    ctx.lineWidth = 2;
    ctx.stroke();
}
