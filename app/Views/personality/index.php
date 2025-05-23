<?php
// Inicialização das variáveis
$dimensoes = ['E' => 0, 'I' => 0, 'S' => 0, 'N' => 0, 'T' => 0, 'F' => 0, 'J' => 0, 'P' => 0];
$tipo = '';
$descricao = '';
$mostrarResultado = false;

// Processamento do formulário
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $respostas = $_POST['respostas'] ?? [];

    // Contagem das respostas
    foreach ($respostas as $resposta) {
        if (array_key_exists($resposta, $dimensoes)) {
            $dimensoes[$resposta]++;
        }
    }

    // Determinação do tipo MBTI
    $tipo .= ($dimensoes['E'] >= $dimensoes['I']) ? 'E' : 'I';
    $tipo .= ($dimensoes['S'] >= $dimensoes['N']) ? 'S' : 'N';
    $tipo .= ($dimensoes['T'] >= $dimensoes['F']) ? 'T' : 'F';
    $tipo .= ($dimensoes['J'] >= $dimensoes['P']) ? 'J' : 'P';

    // Descrições simplificadas para cada tipo (exemplo)
    $descricoes = [
        'INTJ' => 'Arquitetos são pensadores estratégicos e criativos, com um plano para tudo.',
        'INTP' => 'Lógicos são inventores inovadores com sede insaciável por conhecimento.',
        'ENTJ' => 'Comandantes são líderes ousados, imaginativos e fortes, sempre encontrando um caminho — ou criando um.',
        'ENTP' => 'Inovadores são pensadores inteligentes e curiosos que não resistem a um desafio intelectual.',
        'INFJ' => 'Advogados são idealistas quietos e místicos, mas muito inspiradores e incansáveis.',
        'INFP' => 'Mediadores são poetas gentis e altruístas, sempre prontos a ajudar uma boa causa.',
        'ENFJ' => 'Protagonistas são líderes carismáticos e inspiradores, capazes de cativar seus ouvintes.',
        'ENFP' => 'Ativistas são espíritos livres entusiásticos, criativos e sociáveis, que sempre encontram uma razão para sorrir.',
        'ISTJ' => 'Logísticos são indivíduos práticos e voltados para os fatos, cuja confiabilidade não tem igual.',
        'ISFJ' => 'Defensores são protetores dedicados e calorosos, sempre prontos a defender aqueles que amam.',
        'ESTJ' => 'Executivos são administradores excelentes, inigualáveis na gestão de coisas — ou pessoas.',
        'ESFJ' => 'Consul são pessoas extraordinariamente atenciosas, sociáveis e populares, sempre dispostas a ajudar.',
        'ISTP' => 'Virtuosos são experimentadores práticos e ousados, mestres em todos os tipos de ferramentas.',
        'ISFP' => 'Aventureiros são artistas flexíveis e encantadores, sempre prontos a explorar e experimentar algo novo.',
        'ESTP' => 'Empresários são pessoas inteligentes, enérgicas e perceptivas, que realmente gostam de viver no limite.',
        'ESFP' => 'Animadores são animadores espontâneos, enérgicos e entusiásticos — a vida nunca é entediante perto deles.'
    ];

    $descricao = $descricoes[$tipo] ?? 'Tipo de personalidade não reconhecido.';
    $mostrarResultado = true;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Teste de Personalidade MBTI</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="<?= asset('css/quiz.css') ?>">
</head>
<body>
<?php view('components/header') ?>

<div class="container">
    <h1>Teste de Personalidade (MBTI)</h1>

    <?php if ($mostrarResultado): ?>
        <h2>Resultado: <?= htmlspecialchars($tipo) ?></h2>
        <p><?= nl2br(htmlspecialchars($descricao)) ?></p>
        <canvas id="graficoMBTI" width="400" height="400"></canvas>
        <a href="personality">
            <button type="button">Refazer teste</button>
        </a>
        <script>
            const ctx = document.getElementById('graficoMBTI').getContext('2d');
            const graficoMBTI = new Chart(ctx, {
                type: 'radar',
                data: {
                    labels: ['Extroversão (E)', 'Introversão (I)', 'Sensação (S)', 'Intuição (N)', 'Pensamento (T)', 'Sentimento (F)', 'Julgamento (J)', 'Percepção (P)'],
                    datasets: [{
                        label: 'Pontuação',
                        data: [
                            <?= $dimensoes['E'] ?>,
                            <?= $dimensoes['I'] ?>,
                            <?= $dimensoes['S'] ?>,
                            <?= $dimensoes['N'] ?>,
                            <?= $dimensoes['T'] ?>,
                            <?= $dimensoes['F'] ?>,
                            <?= $dimensoes['J'] ?>,
                            <?= $dimensoes['P'] ?>
                        ],
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
                            suggestedMax: 15
                        }
                    },
                    plugins: {
                        title: {
                            display: true,
                            text: 'Perfil de Personalidade MBTI'
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
                ['texto' => '1. Em uma reunião social, você se sente mais energizado ao interagir com um grande grupo de pessoas ou ao ter conversas individuais?', 'opcoes' => ['E' => 'Interagir com um grande grupo de pessoas', 'I' => 'Conversas individuais']],
                ['texto' => '2. Como você costuma recarregar suas energias após um dia agitado?', 'opcoes' => ['E' => 'Passando tempo com amigos ou participando de atividades sociais', 'I' => 'Tendo um tempo sozinho para relaxar']],
                ['texto' => '3. Ao enfrentar um desafio, você prefere discutir ideias com outras pessoas ou trabalhar nele de forma independente?', 'opcoes' => ['E' => 'Discutir ideias com outras pessoas', 'I' => 'Trabalhar de forma independente']],
                ['texto' => '4. No seu tempo livre, você busca eventos sociais e encontros ou prefere atividades mais tranquilas em casa?', 'opcoes' => ['E' => 'Eventos sociais e encontros', 'I' => 'Atividades tranquilas em casa']],
                ['texto' => '5. Como você se sente em relação a conversas triviais?', 'opcoes' => ['E' => 'Gosta e acha fácil se envolver', 'I' => 'Acha um pouco desconfortável ou cansativo']],
                ['texto' => '6. Ao tomar decisões, você se baseia mais em seus próprios instintos e sentimentos ou busca a opinião de outros?', 'opcoes' => ['I' => 'Baseio-me em meus próprios instintos e sentimentos', 'E' => 'Busco a opinião de outros']],
                ['texto' => '7. Como você lida com situações novas e desconhecidas?', 'opcoes' => ['E' => 'Abraça com entusiasmo', 'I' => 'Aborda com cautela']],
                ['texto' => '8. Em um ambiente de trabalho ou equipe, você prefere espaços abertos e colaboração ou espaços individuais?', 'opcoes' => ['E' => 'Espaços abertos e colaboração', 'I' => 'Espaços individuais']],
                // Adicione mais perguntas aqui, totalizando 50
            ];

            foreach ($perguntas as $index => $pergunta) {
                echo '<div class="pergunta">';
                echo '<p>' . $pergunta['texto'] . '</p>';
                foreach ($pergunta['opcoes'] as $valor => $texto) {
                    echo '<label><input type="radio" name="respostas[' . $index . ']" value="' . $valor . '" required> ' . $texto . '</label><br>';
                }
                echo '</div>';
            }
            ?>
            <button type="submit">Ver Resultado</button>
        </form>
    <?php endif; ?>
</div>

<?php view('components/footer') ?>
<script>
    $(function () {
        $('.btn-6')
            .on('mouseenter', function (e) {
                var parentOffset = $(this).offset(),
                    relX = e.pageX - parentOffset.left,
                    relY = e.pageY - parentOffset.top;
                $(this).find('span').css({top: relY, left: relX})
            })
            .on('mouseout', function (e) {
                var parentOffset = $(this).offset(),
                    relX = e.pageX - parentOffset.left,
                    relY = e.pageY - parentOffset.top;
                $(this).find('span').css({top: relY, left: relX})
            });
    });
</script>
</body>
</html>
