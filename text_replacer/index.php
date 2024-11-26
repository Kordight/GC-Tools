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
    <link rel="stylesheet" href="../style.css">
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
</head>

<body>
    <h1>Usuwanie Tagów Allegro z HTML</h1>
    <form id="text-form">
        <label for="input-text">Wprowadź tekst:</label>
        <textarea id="input-text" placeholder="Wprowadź tekst do przetworzenia..."></textarea>
        <button type="button" onclick="processText()">Usuń fragmenty</button>
    </form>
    <br>
    <button id="copy-button" type="button" onclick="copyToClipboard()" disabled>Kopiuj do schowka</button>
    <h2>Przetworzony tekst:</h2>
    <div id="output-text" class="output"></div>
    <script>
        const patterns = <?php echo json_encode($patterns); ?>;
    </script>
    <script src="script.js"></script>


</body>

</html>