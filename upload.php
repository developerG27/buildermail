<?php
  //Se c'è qualcosa all'interno della variabile globale $_FILES prosegui
  if (($_FILES['my_file']['name']!="")){
    $target_dir = "upload/"; //il nome della cartella dove salverà i caricamenti
    $file = $_FILES['my_file']['name']; //salvo in una variaibile il contenuto del input file
    $path = pathinfo($file); //scopro il percorso della variabile globale
    $filename = $path['filename']; //il nome del file che carico
    $ext = $path['extension']; //l'estensione del file
    $temp_name = $_FILES['my_file']['tmp_name']; //il percorso in cui è situato ora
    $filesize = filesize($temp_name) /1024; //calcola la dimensione del file caricato
    $path_filename_ext = $target_dir.$filename.".".$ext; //nomeCartella.nomeFile.estensione
    
    // if (file_exists($path_filename_ext)) { //Se il nome del file è già presente nella cartella
    //   echo "Hei! Hai già caricato in precenza questo progetto!";
    // } else{
    move_uploaded_file($temp_name,$path_filename_ext); //muovo il file(percorso di dove è situato ora, dove lo salvo)
    $za = new ZipArchive();
    $za->open($path_filename_ext);
    echo "
    <p>" . $filename . " è stato caricato correttamente </p>" . "<br>" .
    "Nome: ". $filename . "." . $ext . "<br>" .
    "Dimensione: ". round($filesize) . " KB" . "<br>" . 
    "Numero File: ".$za->numFiles . "<br>" .
    "Lista dei file: " . "<br>" ;
    // }


    for($i = 1; $i < $za->numFiles; $i++){
      $stat = $za->statIndex($i);
      print_r('<p style="margin-left: 100px;"> - ' .   basename($stat['name']).PHP_EOL  .'</p> <br>');
    }
  }
?>