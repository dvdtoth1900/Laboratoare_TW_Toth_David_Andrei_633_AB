<?php
// Inițializare variabile
$name = $email = $message = "";
$successMessage = "";
$nameErr = $emailErr = $messageErr = "";

// Verificăm dacă formularul a fost trimis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validare Nume
    $nameInput = trim($_POST["name"] ?? '');
    if (empty($nameInput)) {
        $nameErr = "Numele este obligatoriu";
    } elseif (strlen($nameInput) < 3) {
        $nameErr = "Numele trebuie să aibă minim 3 caractere";
    } else {
        $name = htmlspecialchars($nameInput);
    }

    // Validare Email
    $emailInput = trim($_POST["email"] ?? '');
    if (empty($emailInput)) {
        $emailErr = "Email-ul este obligatoriu";
    } elseif (!filter_var($emailInput, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Email invalid";
    } else {
        $email = htmlspecialchars($emailInput);
    }

    // Validare Mesaj
    $messageInput = trim($_POST["message"] ?? '');
    if (empty($messageInput)) {
        $messageErr = "Mesajul este obligatoriu";
    } elseif (strlen($messageInput) < 10) {
        $messageErr = "Mesajul trebuie să aibă minim 10 caractere";
    } else {
        $message = htmlspecialchars($messageInput);
    }

    // Dacă toate câmpurile sunt valide
    if (!$nameErr && !$emailErr && !$messageErr) {
        $successMessage = "Mulțumim, $name! Mesajul tău a fost trimis: \"$message\"";
        $name = $email = $message = "";
    }
}
?>

<!DOCTYPE html>
<html lang="ro">
<head>
<meta charset="UTF-8">
<title>Formular de Contact</title>
<style>
.error { color: red; }
.success { color: green; font-weight: bold; margin-bottom: 20px; }
</style>
</head>
<body>

<h1>Formular de Contact</h1>

<?php if ($successMessage): ?>
    <p class="success"><?= htmlspecialchars($successMessage) ?></p>
<?php endif; ?>

<form method="post" action="">
    <label>Nume:</label><br>
    <input type="text" name="name" value="<?= htmlspecialchars($name) ?>"><br>
    <span class="error"><?= htmlspecialchars($nameErr) ?></span><br><br>

    <label>Email:</label><br>
    <input type="text" name="email" value="<?= htmlspecialchars($email) ?>"><br>
    <span class="error"><?= htmlspecialchars($emailErr) ?></span><br><br>

    <label>Mesaj:</label><br>
    <textarea name="message"><?= htmlspecialchars($message) ?></textarea><br>
    <span class="error"><?= htmlspecialchars($messageErr) ?></span><br><br>

    <button type="submit">Trimite</button>
</form>

</body>
</html>
