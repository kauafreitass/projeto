<?php
// Inicialização das variáveis
$inteligencias = [
    'Linguística' => 0,
    'Lógico-Matemática' => 0,
    'Espacial' => 0,
    'Corporal-Cinestésica' => 0,
    'Musical' => 0,
    'Interpessoal' => 0,
    'Intrapessoal' => 0,
    'Naturalista' => 0
];
$mostrarResultado = false;

// Processamento do formulário
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $respostas = $_POST['respostas'] ?? [];

    // Contagem das respostas
    foreach ($respostas as $resposta) {
        if (array_key_exists($resposta, $inteligencias)) {
            $inteligencias[$resposta]++;
        }
    }

    $mostrarResultado = true;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Teste de Inteligências Múltiplas</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="<?= asset('css/quiz.css') ?>">
</head>
<body>
<?php view('components/header') ?>

<div class="container">
    <h1>Teste de Inteligências Múltiplas</h1>

    <?php if ($mostrarResultado): ?>
        <h2>Resultado:</h2>
        <canvas id="graficoInteligencias" width="400" height="400"></canvas>
        <a href="multiple-intelligences">
            <button type="button">Refazer teste</button>
        </a>
        <script>
            const ctx = document.getElementById('graficoInteligencias').getContext('2d');
            const graficoInteligencias = new Chart(ctx, {
                type: 'radar',
                data: {
                    labels: <?= json_encode(array_keys($inteligencias)) ?>,
                    datasets: [{
                        label: 'Pontuação',
                        data: <?= json_encode(array_values($inteligencias)) ?>,
                        backgroundColor: 'rgba(91, 75, 190, 0.2)',
                        borderColor: 'rgba(91, 75, 190, 1)',
                        borderWidth: 2,
                        pointBackgroundColor: 'rgba(91, 75, 190, 1)'
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        r: {
                            beginAtZero: true,
                            suggestedMax: 1
                        }
                    },
                    plugins: {
                        title: {
                            display: true,
                            text: 'Perfil de Inteligências Múltiplas'
                        }
                    }
                }
            });
        </script>
    <hr>
    <?php else: ?>
        <form method="POST">
            <?php
            // Lista de perguntas (exemplo com 8 perguntas; adicione mais conforme necessário)
            $perguntas = [
                ['texto' => '1. Você gosta de ler e escrever?', 'opcoes' => ['Linguística' => 'Sim', 'Outro' => 'Não']],
                ['texto' => '2. Você se destaca em resolver problemas matemáticos?', 'opcoes' => ['Lógico-Matemática' => 'Sim', 'Outro' => 'Não']],
                ['texto' => '3. Você tem facilidade em visualizar objetos em diferentes ângulos?', 'opcoes' => ['Espacial' => 'Sim', 'Outro' => 'Não']],
                ['texto' => '4. Você pratica atividades físicas regularmente?', 'opcoes' => ['Corporal-Cinestésica' => 'Sim', 'Outro' => 'Não']],
                ['texto' => '5. Você aprecia música e identifica facilmente ritmos?', 'opcoes' => ['Musical' => 'Sim', 'Outro' => 'Não']],
                ['texto' => '6. Você entende bem os sentimentos dos outros?', 'opcoes' => ['Interpessoal' => 'Sim', 'Outro' => 'Não']],
                ['texto' => '7. Você reflete frequentemente sobre suas emoções e comportamentos?', 'opcoes' => ['Intrapessoal' => 'Sim', 'Outro' => 'Não']],
                ['texto' => '8. Você se sente conectado com a natureza?', 'opcoes' => ['Naturalista' => 'Sim', 'Outro' => 'Não']],
                // Adicione mais perguntas aqui, totalizando 50
            ];

            foreach ($perguntas as $index => $pergunta) {
                echo '<div class="pergunta">';
                echo '<p>' . $pergunta['texto'] . '</p>';
                foreach ($pergunta['opcoes'] as $valor => $texto) {
                    if ($valor !== 'Outro') {
                        echo '<label><input type="radio" name="respostas[' . $index . ']" value="' . $valor . '" required> ' . $texto . '</label><br>';
                    } else {
                        echo '<label><input type="radio" name="respostas[' . $index . ']" value="" required> ' . $texto . '</label><br>';
                    }
                }
                echo '</div>';
            }
            ?>
            <button type="submit">Ver Resultado</button>
        </form>
    <?php endif; ?>
</div>
<?php view('components/footer') ?>

</body>
</html>
