// Funkcja do uciekania znaków specjalnych w wyrażeniach regularnych
function escapeRegExp(string) {
    return string.replace(/[.*+?^${}()|[\]\\]/g, '\\$&'); // Ucieka wszystkie znaki specjalne
}

function processText() {
    const inputText = document.getElementById('input-text').value;
    let outputText = inputText;

    // Usuń wszystkie wzorce z tekstu
    patterns.forEach(pattern => {
        const escapedPattern = escapeRegExp(pattern); // Ucieknij znaki specjalne
        const regex = new RegExp(escapedPattern, 'g');
        outputText = outputText.replace(regex, '');
    });

    document.getElementById('output-text').innerText = outputText.trim();
}
