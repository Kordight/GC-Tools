// Funkcja do uciekania znaków specjalnych w wyrażeniach regularnych
function escapeRegExp(string) {
    return string.replace(/[.*+?^${}()|[\]\\]/g, '\\$&'); // Ucieka wszystkie znaki specjalne
}

function processText() {
    console.log("process"); // Debugowanie
    const inputText = document.getElementById('input-text').value;
    let outputText = inputText;

    // Usuń wszystkie wzorce z tekstu
    patterns.forEach(pattern => {
        const escapedPattern = escapeRegExp(pattern); // Ucieknij znaki specjalne
        const regex = new RegExp(escapedPattern, 'g');
        outputText = outputText.replace(regex, '');
    });

    const outputTextElement = document.getElementById('output-text');
    outputTextElement.textContent = outputText; 


    const copyButton = document.getElementById('copy-button');
    copyButton.disabled = outputText.trim().length === 0;
}


function copyToClipboard() {
    const outputTextElement = document.getElementById('output-text');
    const textToCopy = outputTextElement.innerText;

    // Tworzenie tymczasowego pola tekstowego do kopiowania
    const tempTextArea = document.createElement('textarea');
    tempTextArea.value = textToCopy;
    document.body.appendChild(tempTextArea);

    // Wybierz i skopiuj tekst
    tempTextArea.select();
    document.execCommand('copy');

    // Usuń tymczasowe pole tekstowe
    document.body.removeChild(tempTextArea);

    // Opcjonalnie: Powiadom użytkownika
    alert('Tekst został skopiowany do schowka!');
}
