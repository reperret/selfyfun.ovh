<?php
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
    E.accueilEvenement,
    E.templateEvenement, 
    E.couleurPrincipaleEvenement,
    E.couleurSecondaireEvenement,
    E.domaineEvenement,
    E.idEvenement,
    RP.qualityReglagePhoto,
    RP.contrastReglagePhoto,
    RP.brightnessReglagePhoto
    from evenement E inner join reglagePhoto RP on E.idReglagePhoto=RP.idReglagePhoto where actifEvenement=1 AND idAppareil='.$idAppareil);
    $lignes=$resultats->fetchAll(PDO::FETCH_OBJ);
    foreach ($lignes as $colonne)
    {
        $json['accueilEvenement']=$colonne->accueilEvenement;
        $json['templateEvenement']=$colonne->templateEvenement;
        $json['couleurPrincipaleEvenement']=$colonne->couleurPrincipaleEvenement;
        $json['couleurSecondaireEvenement']=$colonne->couleurSecondaireEvenement;
        $json['domaineEvenement']=$colonne->domaineEvenement;
        $json['idEvenement']=$colonne->idEvenement;
        $json['qualityReglagePhoto']=$colonne->qualityReglagePhoto;
        $json['contrastReglagePhoto']=$colonne->contrastReglagePhoto;
        $json['brightnessReglagePhoto']=$colonne->brightnessReglagePhoto;
        $json['reglageRaspistill']=" -q ".$json['qualityReglagePhoto']." -br ".$json['brightnessReglagePhoto']." -co ".$json['contrastReglagePhoto']." ";
    }
    
    $resultats = $dbh->query('SET NAMES UTF8');
    $resultats = $dbh->query('SELECT * from parametre');
    $lignes=$resultats->fetchAll(PDO::FETCH_OBJ);
    foreach ($lignes as $colonne)
    {
        if($colonne->nomParametre=="urlSiteWeb") $json['urlSiteWeb']=$colonne->valeurParametre;
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

function getListeMontagesParEvenement($idEvenement, $dbh)
{
    $array = array();
    $resultats = $dbh->query('SET NAMES UTF8');
    $resultats = $dbh->query("SELECT * from image where idEvenement=".$idEvenement." AND typeImage=0 ORDER BY dateCreationImage DESC");
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