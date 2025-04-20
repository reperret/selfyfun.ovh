<?php
require_once '../classes/ImageManager.php';

header("Content-Type: application/json");
$device_id = $_GET['device_id'] ?? null;

if (!$device_id) {
    http_response_code(400);
    echo json_encode(["error" => "device_id requis"]);
    exit;
}

$manager = new ImageManager();
$eventId = $manager->getActiveEventIdForDevice($device_id);

if (!$eventId) {
    http_response_code(404);
    echo json_encode(["error" => "Aucun événement actif trouvé"]);
    exit;
}

$db = Database::connect();
$stmt = $db->prepare("SELECT templateEvenement FROM evenement WHERE idEvenement = ?");
$stmt->execute([$eventId]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$row) {
    http_response_code(404);
    echo json_encode(["error" => "Événement non trouvé"]);
    exit;
}

echo json_encode([
    "id_evenement" => $eventId,
    "template" => $row['templateEvenement']
]);