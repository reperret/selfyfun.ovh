<?php
require_once 'classes/ImageManager.php';

/**
 * Enregistre un message dans un fichier de log.
 */
function logToFile($message)
{
    $logFile = __DIR__ . '/logs/upload_php.log';
    $timestamp = date("[Y-m-d H:i:s]");
    file_put_contents($logFile, "$timestamp $message\n", FILE_APPEND);
}

// 📥 Vérification méthode POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    logToFile("⛔ Requête non-POST refusée");
    exit("Invalid method");
}

logToFile("📩 Requête POST reçue");

// 🔐 Lecture des paramètres
$device_id = $_POST['device_id'] ?? null;
$guid = $_POST['guid'] ?? uniqid();

$image = $_FILES['image'] ?? null;
$thumb = $_FILES['thumbnail'] ?? null;

// 🧱 Vérification présence fichiers
if (!$image || !$thumb || !$device_id) {
    logToFile("❌ Paramètres manquants (image, thumbnail ou device_id)");
    exit("Missing data");
}

$imageName = $guid . ".jpg";
$thumbName = $guid . "_thumb.jpg";

$uploadDir = __DIR__ . '/uploads/';
$thumbDir = $uploadDir . 'thumbnails/';
if (!is_dir($thumbDir)) mkdir($thumbDir, 0755, true);

// 📁 Sauvegarde des fichiers
if (
    move_uploaded_file($image['tmp_name'], $uploadDir . $imageName) &&
    move_uploaded_file($thumb['tmp_name'], $thumbDir . $thumbName)
) {
    logToFile("✅ Fichiers déplacés localement : $imageName / $thumbName");
} else {
    logToFile("❌ Erreur lors du déplacement des fichiers uploadés");
    exit("File move error");
}

// 📊 Connexion base & insertion
try {
    $manager = new ImageManager();
    $eventId = $manager->getActiveEventIdForDevice($device_id);

    if (!$eventId) {
        logToFile("⚠️ Aucun événement actif trouvé pour device_id=$device_id");
        exit("No active event for device");
    }

    $now = date("Y-m-d H:i:s");
    $manager->saveImage(
        $eventId,
        $device_id,
        $imageName,
        $thumbName,
        $guid,
        $now,
        $now
    );

    logToFile("✅ Image enregistrée en base pour event $eventId (GUID $guid)");
    echo "OK";
} catch (Exception $e) {
    logToFile("🔥 Exception PHP : " . $e->getMessage());
    exit("Exception");
}