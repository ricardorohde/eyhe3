<?php

include 'conecta.php';
$id = $_POST['idanjo'];
$status = $_POST['status'];


     try{

          $stmt = $conexao->prepare("UPDATE anjos
          SET online = :status
          WHERE id = :id");
          $stmt->bindParam(':status', $status);
          $stmt->bindParam(':id', $id);
          $executa = $stmt->execute();

        }

        catch(PDOException $e){

          echo $e->getMessage();
        }


    echo 'Atualizado';


?>
