<?php

function getImageToDisplay($idEvenement, $type,$dbh)
{
    $base64=NULL;
    $resultats = $dbh->query('SET NAMES UTF8');
    $resultats = $dbh->query("SELECT ".$type." FROM evenement where idEvenement=".$idEvenement);
	$lignes=$resultats->fetchAll(PDO::FETCH_OBJ);
	foreach ($lignes as $colonne)
	{
        $base64=$colonne->$type;
    }
    
    return $base64;
}

function getEvenements($idEvenement,$dbh)
{
    $requete="SELECT 
    E.idEvenement,
    E.idAppareil,
    E.domaineEvenement,
    E.actifEvenement,
    E.titreEvenement,
    E.dateEvenement,
    E.accueilEvenement,
    E.templateEvenement,
    E.couleurPrincipaleEvenement,
    E.couleurSecondaireEvenement,
    A.idAppareil,
    A.titreAppareil,
    R.idReglagePhoto,
    R.libelleReglagePhoto,
    R.contrastReglagePhoto,
    R.brightnessReglagePhoto,
    R.qualityReglagePhoto
    from evenement E inner join reglagePhoto R on R.idReglagePhoto=E.idReglagePhoto inner join appareil A on A.idAppareil=E.idAppareil ";
    if($idEvenement!="ALL") 
    {
        $requete.=" where E.idEvenement=".$idEvenement;
    }
    $data=array();
    $resultats = $dbh->query('SET NAMES UTF8');
    $resultats = $dbh->query($requete);
	$lignes=$resultats->fetchAll(PDO::FETCH_OBJ);
    $i=0;
	foreach ($lignes as $colonne)
	{
        $data[$i]['idEvenement']=$colonne->idEvenement;
        $data[$i]['idAppareil']=$colonne->idAppareil;
        $data[$i]['domaineEvenement']=$colonne->domaineEvenement;
        $data[$i]['actifEvenement']=$colonne->actifEvenement;
        $data[$i]['titreEvenement']=$colonne->titreEvenement;
        $data[$i]['dateEvenement']=$colonne->dateEvenement;
        $data[$i]['accueilEvenement']=$colonne->accueilEvenement;
        $data[$i]['templateEvenement']=$colonne->templateEvenement;
        $data[$i]['couleurPrincipaleEvenement']=$colonne->couleurPrincipaleEvenement;
        $data[$i]['couleurSecondaireEvenement']=$colonne->couleurSecondaireEvenement;
        $data[$i]['idAppareil']=$colonne->idAppareil;
        $data[$i]['titreAppareil']=$colonne->titreAppareil;
        $data[$i]['idReglagePhoto']=$colonne->idReglagePhoto;
        $data[$i]['libelleReglagePhoto']=$colonne->libelleReglagePhoto;
        $data[$i]['contrastReglagePhoto']=$colonne->contrastReglagePhoto;
        $data[$i]['brightnessReglagePhoto']=$colonne->brightnessReglagePhoto;
        $data[$i]['qualityReglagePhoto']=$colonne->qualityReglagePhoto;
        $i++;
    }
    return $data;
}

function getAppareils($idAppareil,$dbh)
{
    $requete="SELECT idAppareil,titreAppareil, capacitePhotosAppareil from appareil ";
    if($idAppareil!="ALL") 
    {
        $requete.=" where idAppareil=".$idAppareil;
    }
    $data=array();
    $resultats = $dbh->query('SET NAMES UTF8');
    $resultats = $dbh->query($requete);
	$lignes=$resultats->fetchAll(PDO::FETCH_OBJ);
    $i=0;
	foreach ($lignes as $colonne)
	{
        $data[$i]['idAppareil']=$colonne->idAppareil;
        $data[$i]['titreAppareil']=$colonne->titreAppareil;
        $data[$i]['capacitePhotosApareil']=$colonne->capacitePhotosApareil;
        $i++;
    }
    return $data;
}

function getReglages($idReglagePhoto,$dbh)
{
    $requete="SELECT * from reglagePhoto where idReglagePhoto=".$idReglagePhoto;
    if($idReglagePhoto=="ALL") 
    {
        $requete="SELECT * from reglagePhoto";
    }
    $data=array();
    $resultats = $dbh->query('SET NAMES UTF8');
    $resultats = $dbh->query($requete);
	$lignes=$resultats->fetchAll(PDO::FETCH_OBJ);
    $i=0;
	foreach ($lignes as $colonne)
	{
        $data[$i]['idReglagePhoto']=$colonne->idReglagePhoto;
        $data[$i]['libelleReglagePhoto']=$colonne->libelleReglagePhoto;
        $data[$i]['contrastReglagePhoto']=$colonne->contrastReglagePhoto;
        $data[$i]['brightnessReglagePhoto']=$colonne->brightnessReglagePhoto;
        $data[$i]['qualityReglagePhoto']=$colonne->qualityReglagePhoto;
        $i++;
    }
    return $data;
}

function getPhotosEvenement($idEvenement,$dbh)
{    
    $requete="SELECT I.idImage,I.idImageParent, I.nomImage, I.dateCreationImage, I.dateReceptionImage, I.typeImage, E.domaineEvenement,E.idEvenement from image I inner join evenement E on E.idEvenement=I.idEvenement where E.idEvenement=".$idEvenement;
    
    $listing=array();
    $data=array();
    
    $first=true;
    $listingString=NULL;
    $domaineEvenement=NULL;
    $idEvenement=NULL;
    
    $resultats = $dbh->query('SET NAMES UTF8');
    $resultats = $dbh->query($requete);
	$lignes=$resultats->fetchAll(PDO::FETCH_OBJ);
    
    $i=0;
	foreach ($lignes as $colonne)
	{
        if($first)
        {
            $domaineEvenement=$colonne->domaineEvenement;
            $idEvenement=$colonne->idEvenement;
            $first=false;
        }
        
        $listing[$i]['idImage']=$colonne->idImage;
        $listing[$i]['idImageParent']=$colonne->idImageParent;
        $listing[$i]['nomImage']=$colonne->nomImage;
        $listing[$i]['dateCreationImage']=$colonne->dateCreationImage;
        $listing[$i]['dateReceptionImage']=$colonne->dateReceptionImage;
        $listing[$i]['typeImage']=$colonne->typeImage;
        
        $listingString.=" ".$colonne->nomImage;
        $i++;
    }
    
    $listingStringTrim=trim($listingString);
    
    $data['listing']=$listing;
    $data['listingString']=$listingStringTrim;
    $data['domaineEvenement']=$domaineEvenement;
    $data['idEvenement']=$idEvenement;
    
    
    return $data;
    

}

function deleteReglage($idReglagePhoto,$dbh)
{
    $exec=false;
    
    // Changement de tous les évenements concerné par le réglage pour mettre le réglage par défaut
    $reqUpdate = $dbh->prepare("UPDATE evenement set idReglagePhoto=1 where idReglagePhoto=?");
    $reqUpdate->bindParam(1, $idReglagePhoto);
    $exec1=$reqUpdate->execute();
    
    // Suppression du réglage
    $reqDelete = $dbh->prepare("DELETE FROM reglagePhoto where idReglagePhoto=?");
    $reqDelete->bindParam(1, $idReglagePhoto);
    $exec2=$reqDelete->execute();

    
    return $exec2 ;
}

function deleteEvenement($idEvenement,$dbh)
{
    $exec=false;
    $reqDelete = $dbh->prepare("DELETE FROM evenement where idEvenement=?");
    $reqDelete->bindParam(1, $idEvenement);
    $exec=$reqDelete->execute();

    
    return $exec ;
}

function updateReglage($idReglagePhoto,$parametres,$dbh)
{
    $exec=true;
    foreach($parametres as $key=>$value)
    {
        $reqUpdate = $dbh->prepare("UPDATE reglagePhoto set ".$key."=? where idReglagePhoto=?");
        $reqUpdate->bindParam(1, $value);
        $reqUpdate->bindParam(2, $idReglagePhoto);

        $exec1=$reqUpdate->execute();
        if(!$exec1) $exec=false;
    }
    return $exec;
}

function updateEvenement($idEvenement,$parametres,$dbh)
{
    $exec=true;
    foreach($parametres as $key=>$value)
    {
        $reqUpdate = $dbh->prepare("UPDATE evenement set ".$key."=? where idEvenement=?");
        $reqUpdate->bindParam(1, $value);
        $reqUpdate->bindParam(2, $idEvenement);

        $exec1=$reqUpdate->execute();
        if(!$exec1) $exec=false;
    }
    return $exec;
}

function updateActifEvenement($idEvenement,$idAppareil,$dbh)
{
    $inactif=0;
    $actif=1;
    //**** ON REINITIALISE TOUS LES EVENEMENTS DE CET APPAREIL************
    $reqUpdate = $dbh->prepare("UPDATE evenement set actifEvenement=? where idAppareil=?");
    $reqUpdate->bindParam(1,$inactif);
    $reqUpdate->bindParam(2,$idAppareil);
    $exec=$reqUpdate->execute();
    
    //**** ON ACTIVE LE BON EVENEMENT
    $reqUpdate = $dbh->prepare("UPDATE evenement set actifEvenement=? where idEvenement=?");
    $reqUpdate->bindParam(1,$actif);
    $reqUpdate->bindParam(2,$idEvenement);
    $exec=$reqUpdate->execute();

    return $exec;
}

function insertReglage($dbh)
{
    $libelleDefaut="Libelle Défaut";

    $reqInsert = $dbh->prepare("INSERT INTO reglagePhoto (libelleReglagePhoto) VALUES (?)");
    $reqInsert->bindParam(1, $libelleDefaut);
    $etatExecution=$reqInsert->execute();
    $idReglagePhoto=$dbh->lastInsertId();

    return $idReglagePhoto;
}

function insertEvenement($dbh)
{
    $titreEvenement="Libelle Défaut";
    $actifEvenement=0;
    $idAppareil=1;
    $idReglagePhoto=1;
    $dateEvenement=date('Y-m-d');

    $reqInsert = $dbh->prepare("INSERT INTO evenement (titreEvenement,actifEvenement,idAppareil,idReglagePhoto, dateEvenement) VALUES (?,?,?,?,?)");
    $reqInsert->bindParam(1,$titreEvenement);
    $reqInsert->bindParam(2,$actifEvenement);
    $reqInsert->bindParam(3,$idAppareil);
    $reqInsert->bindParam(4,$idReglagePhoto);
    $reqInsert->bindParam(5,$dateEvenement);
    $etatExecution=$reqInsert->execute();
    $idEvenement=$dbh->lastInsertId();

    return $idEvenement;
}

function uploadImage($target_dir, $nomInputFile, $type)
{
    $base64=NULL;
    $return=array();
    $ext = pathinfo($_FILES[$nomInputFile]["name"], PATHINFO_EXTENSION);
    $erreur=NULL;
    $nomFichier=$type."_".time().".".$ext;
    $target_file = $target_dir.$nomFichier;
    $uploadOk = 1;
    $imageFileType = strtolower($ext);


    if(isset($_POST["submit"]))
    {
        $check = getimagesize($_FILES[$nomInputFile]["tmp_name"]);
        if($check !== false)
        {
            $erreur.= "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            $erreur.= "Ce fichier n'est pas un fichier image";
            $uploadOk = 0;
        }
    }

    if (file_exists($target_file))
    {
        $erreur.="Ce nom de fichier existe déjà<br>";
        $uploadOk = 0;
    }

    if ($_FILES[$nomInputFile]["size"] > 200000)
    {
        $erreur.="Votre fichier est trop lourd et doit peser moins de 1mo";
        $uploadOk = 0;
    }


    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" )
    {
        $erreur.="Veuillez utiliser un format parmi : JPG, JPEG, PNG & GIF<br>";
        $uploadOk = 0;
    }

    if ($uploadOk == 0)
    {
        $erreur.= "Désolé, le téléchargement de l'image a échoué<br>";
    }
    else
    {
        if (move_uploaded_file($_FILES[$nomInputFile]["tmp_name"], $target_file))
        {
            $base64=base64_encode(file_get_contents( $target_file ));
            unlink($target_file);
            $erreur.="Le fichier a bien été téléchargé et enregistré<br>";
            $uploadOk=1;
        }
        else
        {
            $erreur.= "Désolé, une erreur est survenue pendant le téléchargement. Veuillez recommencer<br>";
            $uploadOk=0;
            
        }
    }
    
    
    
    
    $return['codeErreur']='ERROR_UPLOAD';
    if($uploadOk==1) $return['codeErreur']='SUCCESS';
    $return['base64']=$base64;
    $return['message']=$erreur;
    

    return $return;
}


    
    
/*
function uploadBase64($base64,$type,$ext)
{
    global $absolutePathRoot;
    $target_dir=NULL;

      //****Fichier GPX Station*****
    if(substr($type,0,3)=='INT')
    {
        $target_dir=$absolutePathRoot.'s/compte/interets/'.substr($type,3).'/';
    }
      //****Fichier GPX Station*****
    elseif(substr($type,0,3)=='STA')
    {
        $target_dir=$absolutePathRoot.'s/compte/stations/'.substr($type,3).'/';
    }

    //****Fichier GPX*****
    elseif($type==0)
    {
        $target_dir=$absolutePathRoot.'s/course/parcoursGps/';
    }
    //****Fichier Bandeau Haut*****
    elseif($type==1)
    {
        $target_dir=$absolutePathRoot.'s/utils/uploads/bandeauxHaut/';
    }
    //****Fichier Bandeau Bas*****
    elseif($type==2)
    {
        $target_dir=$absolutePathRoot.'s/utils/uploads/bandeauxBas/';
    }
    //****Fichier Vignette*****
    elseif($type==3)
    {
        $target_dir=$absolutePathRoot.'s/utils/uploads/vignettes/';
    }





    $erreur=NULL;
    $nomFichier=$type.rand(0,999)."_".time().".".$ext;
    $target_file = $target_dir.$nomFichier;
    $uploadOk=1;
    $imageFileType = strtolower($ext);



    if (file_exists($target_file))
    {
        $erreur.="Ce nom de fichier existe déjà<br>";
        $uploadOk = 0;
    }



    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif"  && $imageFileType != "gpx" )
    {
        $erreur.="Veuillez utiliser un format parmi : JPG, JPEG, PNG & GIF ou GPX<br>";
        $uploadOk = 0;
    }

    if ($uploadOk == 0)
    {
        $erreur.= "Désolé, le téléchargement du fichier a échoué<br>";
    }
    else
    {
        $data = base64_decode($base64);
        if(file_put_contents($target_file, $data))
        {
            $erreur.="Le fichier de type ".$ext." a bien été téléchargé<br>";
        }
        else
        {
            $erreur.= "Désolé, une erreur est survenue pendant le téléchargement. Veuillez recommencer<br>";
            $uploadOk=0;
        }
    }

    $return=array();
    $return['codeErreur']='ERROR_UPLOAD';
    if($uploadOk==1)
    {
        $return['codeErreur']='SUCCESS';
        $return['nomFichier']=$nomFichier;
    }
    $return['message']=$erreur;


    return $return;
}

function cleanString($chaine, $maj)
{
    if(trim($chaine)=='' || $chaine==NULL)
    {
        return NULL;
    }
    else
    {
        //SUPPRIMER TOUT ACCENT OU CARACTERE CHELOU SUR UNE LETTRE
        $a = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ð', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'ß', 'à', 'á', 'â', 'ã', 'ä', 'å', 'æ', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ø', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', 'Ā', 'ā', 'Ă', 'ă', 'Ą', 'ą', 'Ć', 'ć', 'Ĉ', 'ĉ', 'Ċ', 'ċ', 'Č', 'č', 'Ď', 'ď', 'Đ', 'đ', 'Ē', 'ē', 'Ĕ', 'ĕ', 'Ė', 'ė', 'Ę', 'ę', 'Ě', 'ě', 'Ĝ', 'ĝ', 'Ğ', 'ğ', 'Ġ', 'ġ', 'Ģ', 'ģ', 'Ĥ', 'ĥ', 'Ħ', 'ħ', 'Ĩ', 'ĩ', 'Ī', 'ī', 'Ĭ', 'ĭ', 'Į', 'į', 'İ', 'ı', 'Ĳ', 'ĳ', 'Ĵ', 'ĵ', 'Ķ', 'ķ', 'Ĺ', 'ĺ', 'Ļ', 'ļ', 'Ľ', 'ľ', 'Ŀ', 'ŀ', 'Ł', 'ł', 'Ń', 'ń', 'Ņ', 'ņ', 'Ň', 'ň', 'ŉ', 'Ō', 'ō', 'Ŏ', 'ŏ', 'Ő', 'ő', 'Œ', 'œ', 'Ŕ', 'ŕ', 'Ŗ', 'ŗ', 'Ř', 'ř', 'Ś', 'ś', 'Ŝ', 'ŝ', 'Ş', 'ş', 'Š', 'š', 'Ţ', 'ţ', 'Ť', 'ť', 'Ŧ', 'ŧ', 'Ũ', 'ũ', 'Ū', 'ū', 'Ŭ', 'ŭ', 'Ů', 'ů', 'Ű', 'ű', 'Ų', 'ų', 'Ŵ', 'ŵ', 'Ŷ', 'ŷ', 'Ÿ', 'Ź', 'ź', 'Ż', 'ż', 'Ž', 'ž', 'ſ', 'ƒ', 'Ơ', 'ơ', 'Ư', 'ư', 'Ǎ', 'ǎ', 'Ǐ', 'ǐ', 'Ǒ', 'ǒ', 'Ǔ', 'ǔ', 'Ǖ', 'ǖ', 'Ǘ', 'ǘ', 'Ǚ', 'ǚ', 'Ǜ', 'ǜ', 'Ǻ', 'ǻ', 'Ǽ', 'ǽ', 'Ǿ', 'ǿ');
        $b = array('A', 'A', 'A', 'A', 'A', 'A', 'AE', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'D', 'N', 'O', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 's', 'a', 'a', 'a', 'a', 'a', 'a', 'ae', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', 'A', 'a', 'A', 'a', 'A', 'a', 'C', 'c', 'C', 'c', 'C', 'c', 'C', 'c', 'D', 'd', 'D', 'd', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'G', 'g', 'G', 'g', 'G', 'g', 'G', 'g', 'H', 'h', 'H', 'h', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'IJ', 'ij', 'J', 'j', 'K', 'k', 'L', 'l', 'L', 'l', 'L', 'l', 'L', 'l', 'l', 'l', 'N', 'n', 'N', 'n', 'N', 'n', 'n', 'O', 'o', 'O', 'o', 'O', 'o', 'OE', 'oe', 'R', 'r', 'R', 'r', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', 'S', 's', 'T', 't', 'T', 't', 'T', 't', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'W', 'w', 'Y', 'y', 'Y', 'Z', 'z', 'Z', 'z', 'Z', 'z', 's', 'f', 'O', 'o', 'U', 'u', 'A', 'a', 'I', 'i', 'O', 'o', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'A', 'a', 'AE', 'ae', 'O', 'o');
        $chaine=str_replace($a, $b, $chaine);

        //ON MET TOUT EN MINUSCULE
        $chaine=strtolower($chaine);

        //ON NE GARDE QUE DES LETTRES DE A 0 Z
        $email=NULL;
        if($maj==2) $regex='0-9@\.\-_';
        if($maj==3) $regex='0-9\'';
        $chaine = preg_replace("/[^a-z".$regex."]+/", " ", $chaine);

        //SUPPRESSION ESPACES EN TROP
        $chaine = trim($chaine);
        if($maj==1 || $maj==3){$chaine=strtoupper($chaine);}else{$chaine=ucwords($chaine);}
        if($maj==2){$chaine=strtolower($chaine);}
        return $chaine;
    }


}

function envoiEmailTemplate($titrePrincipal,$sujet,$message,$lien,$email)
{

	global $domaine;
	global $dbh;

    $message2 = file_get_contents('templateEmailFavoris.html');
    $message2 = str_replace('[TITRE_PRINCIPAL]', $titrePrincipal, $message2);
    $message2 = str_replace('[TAG_RESUME_COURSE]', $message, $message2);
    $message2 = str_replace('[TAG_URL_DETAILEQUIPE]', $lien, $message2);

    $mail = new PHPMailer();
    $mail->IsHTML(true);
    $mail->CharSet = "utf-8";
    $mail->From = "nepasrepondre@folomi.fr";
    $mail->FromName = "Folomi Live";
    $mail->Subject = $sujet;
    $mail->Body = stripslashes ($message2);
    $mail->AddAddress($email, $email);
    return $mail->send();
}



function createEditeur($libelleEditeur,$dbh)
{
    $return=false;
    $reqInsert = $dbh->prepare("INSERT INTO editeur (libelleEditeur) VALUES (?)");
    $reqInsert->bindParam(1, $libelleEditeur);
    $return=$reqInsert->execute();

    return $return;
}

function createJeuExemplaire($dbh)
{
    global $idLudotheque;
    $idExemplaire=-1;
    
    //****CREATION JEU******
    $typeJeu='Compétition';
    $difficulteJeu='Familial';
    $dureeJeu=0;
    $litteratieJeu=0;
    $ageMinimumJeu=0;
    $joueursMinJeu=0;
    $joueursMaxJeu=0;
    $surdimensionneJeu=0;
    $valeurNeufJeu=0;
    $dateEditionJeu=date('Y');
    $editeurs=getEditeurs($dbh);
    $idEditeur=$editeurs[0]['idEditeur'];
    $libelleEditeur="Nouveau jeu";
    $reqInsert = $dbh->prepare("INSERT INTO jeu (libelleJeu,idEditeur,typeJeu,difficulteJeu,dureeJeu,litteratieJeu,ageMinimumJeu,joueursMinJeu,joueursMaxJeu,surdimensionneJeu,valeurNeufJeu,dateEditionJeu) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
    $reqInsert->bindParam(1, $libelleEditeur);
    $reqInsert->bindParam(2, $idEditeur);
    $reqInsert->bindParam(3, $typeJeu);
    $reqInsert->bindParam(4, $difficulteJeu);
    $reqInsert->bindParam(5, $dureeJeu);
    $reqInsert->bindParam(6, $litteratieJeu);
    $reqInsert->bindParam(7, $ageMinimumJeu);
    $reqInsert->bindParam(8, $joueursMinJeu);
    $reqInsert->bindParam(9, $joueursMaxJeu);
    $reqInsert->bindParam(10, $surdimensionneJeu);
    $reqInsert->bindParam(11, $valeurNeufJeu);
    $reqInsert->bindParam(12, $dateEditionJeu);
    
    $return=$reqInsert->execute();
    $idJeu=$dbh->lastInsertId();
    
    //****CREATION EXEMPLAIRE******
    $versionExemplaire="A";
    $libelleExemplaire="";
    $dateAjoutExemplaire=date('Y-m-d H:i:s');
    $reqInsert = $dbh->prepare("INSERT INTO exemplaire (idJeu,idLudotheque,versionExemplaire, libelleExemplaire, dateAjoutExemplaire) VALUES (?,?,?,?,?)");
    $reqInsert->bindParam(1, $idJeu);
    $reqInsert->bindParam(2, $idLudotheque);
    $reqInsert->bindParam(3, $versionExemplaire);
    $reqInsert->bindParam(4, $libelleExemplaire);
    $reqInsert->bindParam(5, $dateAjoutExemplaire);
    $return=$reqInsert->execute();
    $idExemplaire=$dbh->lastInsertId();

    return $idExemplaire;
}

function createAdhesion($idAdherent,$dateAdhesion,$cautionVerseeAdhesion,$dbh)
{
    $return=false;
    $reqInsert = $dbh->prepare("INSERT INTO adhesion (idAdherent, dateAdhesion, cautionVerseeAdhesion) VALUES (?,?,?)");
    $reqInsert->bindParam(1, $idAdherent);
    $reqInsert->bindParam(2, $dateAdhesion);
    $reqInsert->bindParam(3, $cautionVerseeAdhesion);
    $return=$reqInsert->execute();

    return $return;
}


function deleteAdhesion($idAdhesion,$dbh)
{
    $return=false;
    $reqDelete = $dbh->prepare("DELETE FROM adhesion where idAdhesion=?");
    $reqDelete->bindParam(1, $idAdhesion);
    $return=$reqDelete->execute();

    return $return;
}



function updateAdhesion($idAdhesion,$cautionVerseeAdhesion,$dbh)
{
    $return=false;
    $reqUpdate = $dbh->prepare("UPDATE adhesion set cautionVerseeAdhesion=? where idAdhesion=?");
    $reqUpdate->bindParam(1, $cautionVerseeAdhesion);
    $reqUpdate->bindParam(2, $idAdhesion);
    $return=$reqUpdate->execute();

    return $return;
}

function getTdb($idLudotheque, $dbh)
{
    $data=array();
    $nbJeux=0;
    $nbExemplaires=0;
    $nbJeuxConsultables=0;
    $nbJeuxEmpruntables=0;
    $nbJeuxSortis=0;
    $nbJeuxRetard=0;
    $nbJeuxHS=0;
    $nbJeuxAReparer=0;
    $nbAdherentsActifs=0;
    $nbAdherentsTotal=0;
    $nbExemplaires=0;
    $idJeux=array();

    $listingJeux=getExemplaire($idLudotheque,NULL,NULL,$dbh);
   
    for($i=0;$i<sizeof($listingJeux);$i++)
    {
        if(!in_array($listingJeux[$i]['idJeu'], $idJeux)) $idJeux[]=$listingJeux[$i]['idJeu'];
        $nbExemplaires++;
        if($listingJeux[$i]['statutExemplaire']=='Sorti')       $nbJeuxSortis++;
        if($listingJeux[$i]['statutExemplaire']=='Empruntable') $nbJeuxEmpruntables++;
        if($listingJeux[$i]['statutExemplaire']=='Consultable') $nbJeuxConsultables++;
        if($listingJeux[$i]['statutExemplaire']=='HS')          $nbJeuxHS++;
        if($listingJeux[$i]['statutExemplaire']=='A réparer')   $nbJeuxAReparer++;
    }
    
    $listingAdherents=getAdherent($idLudotheque,NULL,$dbh);
    for($i=0;$i<sizeof($listingAdherents);$i++)
    {
        $nbAdherentsTotal++;
        if($listingAdherents[$i]['cotisationAJour']==1) $nbAdherentsActifs++;
    }
    
    $data['nbJeux']=sizeof($idJeux);
    $data['nbExemplaires']=$nbExemplaires;
    $data['nbJeuxConsultables']=$nbJeuxConsultables;
    $data['nbJeuxEmpruntables']=$nbJeuxEmpruntables;
    $data['nbJeuxSortis']=$nbJeuxSortis;
    $data['nbJeuxRetard']=getNbRetard($dbh);
    $data['nbAdherentsActifs']=$nbAdherentsActifs;
    $data['nbAdherentsTotal']=$nbAdherentsTotal;
    
    return $data;
}

*/
?>
