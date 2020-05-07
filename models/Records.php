<?php

  class Records{

    public static function deleteRecord($conn, $id_record){
      $query = "DELETE FROM records WHERE id_record = :id_record";
      $stmt = $conn->getConnection()->prepare($query);
      $stmt->bindValue(":id_record", $id_record);
      $stmt->execute();
    }

    public static function showRecords($conn, $id_user){
      $query = "SELECT * FROM records WHERE idUser_record = :id_user ORDER BY id_record DESC";
      $stmt = $conn->getConnection()->prepare($query);
      $stmt->bindValue(":id_user", $id_user);
      $stmt->execute();
      $movements_list = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $movements_list;
    }

  }

?>
