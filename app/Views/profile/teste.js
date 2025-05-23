(async function votarInfinito() {
    const fixos = ["JOÃO PEDRO", "FILIPE"];
    const todos = [
        "VICTOR HUGO LIMA",
        "JOÃO GABRIEL DOS SANTOS",
        "RARIKA CHAMEC",
        "MATEUS RUFINO",
        "PEDRO NESPOLI",
        "NATÁLIA PAYÃO",
        "MURILO VILELA LEITE",
        "JOSÉ OLIVEIRA",
        "YASMIM GARCIA SOUZA",
        "ANA LÍVIA GARCIA",
        "LUCAS NHOQUE",
        "JOÃO AUGUSTO",
        "YAMIN MALVINO (2º EM)",
        "KAREN",
        "FILIPE",
        "ANGELO",
        "JOÃO PEDRO",
        "VINICIUS"
    ];

    function delay(ms) {
        return new Promise(resolve => setTimeout(resolve, ms));
    }

    async function votar() {
        console.clear();
        console.log("🔁 Iniciando nova votação...");

        const restantes = todos.filter(n => !fixos.includes(n));
        const votosRestantes = 3 - fixos.length;
        const aleatorios = restantes.sort(() => 0.5 - Math.random()).slice(0, votosRestantes);
        const alvos = [...fixos, ...aleatorios].map(n => n.toUpperCase());

        // Marca os checkboxes
        const opcoes = document.querySelectorAll('[data-automation-id="checkbox"]');
        let marcados = 0;
        opcoes.forEach(el => {
            const valor = el.getAttribute("data-automation-value")?.trim().toUpperCase();
            if (alvos.includes(valor)) {
                el.click();
                marcados++;
            }
        });

        if (marcados < 3) {
            console.warn("⚠️ Nem todas as opções foram marcadas:", alvos);
            return;
        }

        await delay(500);

        // Clica no botão ENVIAR
        const enviarBtn = [...document.querySelectorAll("button")].find(b => b.innerText.trim().toUpperCase() === "ENVIAR");
        if (enviarBtn) {
            enviarBtn.click();
            console.log("✅ Formulário enviado.");
        } else {
            console.warn("❌ Botão ENVIAR não encontrado.");
            return;
        }

        // Aguarda envio e clique em "Enviar outra resposta"
        await delay(5000);
        const repetirSpan = document.querySelector('[data-automation-id="submitAnother"]');
        if (repetirSpan?.parentElement) {
            repetirSpan.parentElement.click();
            console.log("🔄 Repetindo votação...");
        } else {
            console.warn("❌ Botão 'Enviar outra resposta' não encontrado.");
        }
    }

    while (true) {
        await votar();
        await delay(2000);
    }
})();
