<?php

function DoubleZero($int)
{
    if(strlen($int)==1) 
    {
        return '0'.$int;
    } 
    else
    {
        return $int;
    }
}

function HEX_vers_RGB($couleur_hex) 
{
    $couleur_hex=substr($couleur_hex,1);
    $rouge = substr($couleur_hex, 0, 2);
    $vert  = substr($couleur_hex, 2, 2);
    $bleu  = substr($couleur_hex, 4, 2);

    $tab_rgb = array('Rouge' => hexdec($rouge),
                     'Vert'  => hexdec($vert),
                     'Bleu'  => hexdec($bleu));
    return "(".hexdec($rouge).",".hexdec($vert).",".hexdec($bleu).")";
}

function RGB_vers_HEX($r, $g, $b) 
{
    $rouge = DoubleZero(dechex($r));
    $vert = DoubleZero(dechex($g));
    $bleu = DoubleZero(dechex($b));

    return strtoupper($rouge.$vert.$bleu);
}

function getDomaine($domaine,$idEvenement,$dbh)
{
    $requete=NULL;
    if($domaine!='') $requete="SELECT * from evenement where domaineEvenement='".$domaine."'";
    if($idEvenement!="" && $idEvenement!=NULL) $requete="SELECT * from evenement where idEvenement=".$idEvenement;
    
    $array = array();
    $resultats = $dbh->query('SET NAMES UTF8');
    $resultats = $dbh->query($requete);
    $lignes=$resultats->fetchAll(PDO::FETCH_OBJ);
    foreach ($lignes as $colonne)
    {
        $array['idEvenement']=$colonne->idEvenement;
        $array['domaineEvenement']=$colonne->domaineEvenement;
        $array['titreEvenement']=$colonne->titreEvenement;
        $array['dateEvenement']=$colonne->dateEvenement;
        $array['couleurPrincipaleEvenement']=$colonne->couleurPrincipaleEvenement;
        $array['couleurSecondaireEvenement']=$colonne->couleurSecondaireEvenement;
    }
    return $array;
}

function getConfiguration($idAppareil,$dbh)
{
    if($idAppareil=='' || $idAppareil==NULL) $idAppareil=1;
    $json = array();
    $resultats = $dbh->query('SET NAMES UTF8');
    $resultats = $dbh->query('SELECT 
    E.idEvenement,
    E.idAppareil,
    E.domaineEvenement,
    E.titreEvenement,
    E.titre2Evenement,
    E.dateEvenement,
    E.templateEvenement, 
    E.couleurPrincipaleEvenement,
    E.couleurSecondaireEvenement
    from evenement E where actifEvenement=1 AND idAppareil='.$idAppareil);
    $lignes=$resultats->fetchAll(PDO::FETCH_OBJ);
    foreach ($lignes as $colonne)
    {
        $json['idEvenement']=$colonne->idEvenement;
        $json['idAppareil']=$colonne->idAppareil;
        $json['domaineEvenement']=$colonne->domaineEvenement;
        $json['titreEvenement']=$colonne->titreEvenement;
        $json['titre2Evenement']=$colonne->titre2Evenement;
        $json['templateEvenement']=$colonne->templateEvenement;
        $json['couleurPrincipaleEvenement']=HEX_vers_RGB($colonne->couleurPrincipaleEvenement);
        $json['couleurSecondaireEvenement']=HEX_vers_RGB($colonne->couleurSecondaireEvenement);
    }

    return $json;
}

function uploadImage($fichier,$nomFichier,$idEvenement,$dateCreationImage,$typeImage,$idImageParent,$dbh)
{
    $return=array();
    $return['ecritureFichierImage']=false;
    $return['ecritureBddImage']=false;
    $dateReceptionImage=date('Y-m-d H:i:s');
    
    try 
    {
        $nomFichierFinal = $nomFichier;
        $current = file_get_contents($fichier['tmp_name']);
        $result=file_put_contents(dirname(__DIR__, 1)."/photos/".$nomFichierFinal, $current);
        $return['ecritureFichierImage']=false;     
        if($result>0) $return['ecritureFichierImage']=true;
    }
    catch (Exception $e) 
    {
        $return['ecritureFichierImage']=false;
        $return['errorDetailEcritureFichierImage']=$e->getMessage();
    }

    if($return['ecritureFichierImage'])
    {
        try 
        {
            $reqInsert = $dbh->prepare("INSERT INTO image (idEvenement,nomImage,dateCreationImage,dateReceptionImage,typeImage,idImageParent) VALUES (?,?,?,?,?,?)");
            $reqInsert->bindParam(1, $idEvenement);
            $reqInsert->bindParam(2, $nomFichierFinal);
            $reqInsert->bindParam(3, $dateCreationImage);
            $reqInsert->bindParam(4, $dateReceptionImage);
            $reqInsert->bindParam(5, $typeImage);
            $reqInsert->bindParam(6, $idImageParent);
            $etatExecution=$reqInsert->execute();
            $idImage=$dbh->lastInsertId();
            $return['ecritureBddImage']=$etatExecution;
            $return['idImage']=$idImage;
        } 
        catch (Exception $e) 
        {
            $return['ecritureBddImage']=false;
            $return['idImage']=NULL;
            $return['errorDetailEcritureBddImage']=$e->getMessage();
        }
        
    }
    
    
    return $return;
}

function insertReferenceImage($idEvenement,$idAppareil,$nomImage,$dateCreationImage,$dateDebutTransfertImage,$dateFinTransfertImage,$dureeTransfertImage,$typeImage,$dbh)
{
    $return=array();
    $return['returnInsertReferenceImage']=false;
    $dateReceptionImage=date('Y-m-d H:i:s');
    
    try 
    {
        $reqInsert = $dbh->prepare("INSERT INTO image (idEvenement,idAppareil,nomImage,dateCreationImage,dateDebutTransfertImage,dateFinTransfertImage,dateReceptionImage,dureeTransfertImage,typeImage) VALUES (?,?,?,?,?,?,?,?,?)");
        $reqInsert->bindParam(1, $idEvenement);
        $reqInsert->bindParam(2, $idAppareil);
        $reqInsert->bindParam(3, $nomImage);
        $reqInsert->bindParam(4, $dateCreationImage);
        $reqInsert->bindParam(5, $dateDebutTransfertImage);
        $reqInsert->bindParam(6, $dateFinTransfertImage);
        $reqInsert->bindParam(7, $dateReceptionImage);
        $reqInsert->bindParam(8, $dureeTransfertImage);
        $reqInsert->bindParam(9, $typeImage);
        $etatExecution=$reqInsert->execute();
        $idImage=$dbh->lastInsertId();
        $return['returnInsertReferenceImage']=$etatExecution;
    } 
    catch (Exception $e) 
    {
        $return['returnInsertReferenceImage']=false;
        $return['errorDetailEcritureBddImage']=$e->getMessage();
    }    
    return $return;  
}

function getListeMontagesParEvenement($idEvenement, $dbh)
{
    $array = array();
    $resultats = $dbh->query('SET NAMES UTF8');
    $resultats = $dbh->query("SELECT * from image where affichageImage=1 and idEvenement=".$idEvenement." AND typeImage=0 ORDER BY dateCreationImage DESC");
    $lignes=$resultats->fetchAll(PDO::FETCH_OBJ);
    $i=0;
    foreach ($lignes as $colonne)
    {
        $array[$i]['idImage']=$colonne->idImage;
        $array[$i]['nomImage']=$colonne->nomImage;
        $array[$i]['dateCreationImage']=$colonne->dateCreationImage;
        $array[$i]['dateReceptionImage']=$colonne->dateReceptionImage;
        $i++;
    }
    
    return $array;
}

?>
