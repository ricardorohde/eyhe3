<?php

  $idAnjo = $_POST['idAnjo'];
  $idPush = $_POST['idOneSignal'];
  $disp = $_POST['Dispositivo'];


  //anjo TEM REGISTRO NO BANCO ?
  include ("conecta.php");

  $qtd = 0;
  $erro = 0;

  $consulta = $conexao->prepare("SELECT * FROM pushnotificationsanjo WHERE idanjo = $idAnjo");
  $consulta->execute();
  $qtd = $consulta->rowCount();


  if($qtd == 0){

    if($disp == 'desktop'){
      $iddesktop = $idPush;
      $idmobile = '';
    }else{
      $idmobile = $idPush;
      $iddesktop = '';
    }

    try{
       $stmte2 = $conexao->prepare("INSERT INTO pushnotificationsanjo (idanjo, idpushdesktop, idpushmobile) VALUES (?,?,?)");
       $stmte2->bindParam(1, $idAnjo , PDO::PARAM_STR);
       $stmte2->bindParam(2, $iddesktop , PDO::PARAM_STR);
       $stmte2->bindParam(3, $idmobile , PDO::PARAM_STR);
       $executa2 = $stmte2->execute();

         if(!$executa2){
             $erro = 1;
             //echo "erro tipo 1";
          }
      }
     catch(PDOException $e){
        echo $e->getMessage();
     }

  }

 else{

   if($disp == 'desktop'){
       $iddesktop = $idPush;
       try{
         $stmt = $conexao->prepare('UPDATE pushnotificationsanjo
         SET idpushdesktop = :idpushdesktop
         WHERE idanjo = :idanjo');
         $stmt->bindParam(':idpushdesktop', $iddesktop);
         $stmt->bindParam(':idanjo', $idAnjo);
         $executa = $stmt->execute();

             if(!$executa){
                 $erro = 2;
                 //echo "erro tipo 2";
             }
        }

       catch(PDOException $e){
         echo $e->getMessage();
       }
  }

  else{
      $idmobile = $idPush;
      try{
        $stmt = $conexao->prepare('UPDATE pushnotificationsanjo
        SET idpushmobile = :idpushmobile
        WHERE idanjo = :idanjo');
        $stmt->bindParam(':idpushmobile', $idmobile);
        $stmt->bindParam(':idanjo', $idAnjo);
        $executa = $stmt->execute();

            if(!$executa){
                $erro = 2;
                echo "erro tipo 2";
            }
       }

      catch(PDOException $e){
        echo $e->getMessage();
      }
 }
}


 ?>
