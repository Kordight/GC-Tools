<?php
// Wczytanie wzorców z bazy danych
require 'database.php';

$patterns = [];
$sql = "SELECT pattern FROM remove_patterns";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $patterns[] = $row['pattern'];
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuwanie Tekstu</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <h1>Usuwanie Tagów Allegro z HTML</h1>
    <form id="text-form">
        <label for="input-text">Wprowadź tekst:</label>
        <textarea id="input-text" placeholder="Wprowadź tekst do przetworzenia..."></textarea>
        <button type="button" onclick="processText()">Usuń fragmenty</button>
    </form>
    <h2>Przetworzony tekst:</h2>
    <div id="output-text" class="output"></div>

    <script>
        // Lista wzorców do usunięcia wczytana z bazy
        const patterns = <?php echo json_encode($patterns); ?>;

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
    </script>
</body>

</html>