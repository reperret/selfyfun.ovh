<?php
require_once __DIR__ . '/Database.php';

class ImageManager
{
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    /**
     * Récupère l’ID de l’événement actif pour un appareil donné
     */
    public function getActiveEventIdForDevice($deviceId)
    {
        $stmt = $this->db->prepare("
            SELECT idEvenement FROM evenement
            WHERE idAppareil = ? AND actifEvenement = 1
            ORDER BY dateEvenement DESC
            LIMIT 1
        ");
        $stmt->execute([$deviceId]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ? $row['idEvenement'] : null;
    }

    /**
     * Enregistre une image dans la base après upload
     */
    public function saveImage($eventId, $deviceId, $filename, $thumbName, $guid, $startTime, $endTime)
    {
        $duree = strtotime($endTime) - strtotime($startTime);

        $stmt = $this->db->prepare("
            INSERT INTO image (
                idEvenement,
                idAppareil,
                nomImage,
                dateCreationImage,
                dateDebutTransfertImage,
                dateFinTransfertImage,
                dureeTransfertImage,
                guid
            ) VALUES (?, ?, ?, NOW(), ?, ?, ?, ?)
        ");
        $stmt->execute([
            $eventId,
            $deviceId,
            $filename,
            $startTime,
            $endTime,
            $duree,
            $guid
        ]);
    }

    /**
     * Récupère toutes les images visibles pour un événement donné (pour la galerie)
     */
    public function getImagesByEvent($eventId)
    {
        $stmt = $this->db->prepare("
            SELECT * FROM image
            WHERE idEvenement = ? AND affichageImage = 1
            ORDER BY dateCreationImage DESC
        ");
        $stmt->execute([$eventId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}