<?php
class categori
{
   var $name_ct  = null;
   var $note = null;
   function getcategori()
   {
      $db = new connect();
      $select = "select * from categories";
      return $db->pdo_query($select);
   }
   public function checkId($id)
   {
      $db = new connect();
      $select = "SELECT * from categories where id_categori='$id'";
      $result = $db->pdo_query_one($select);
      return $result;
   }
   function add($name_ct, $note)
   {
      $db = new connect();
      $query = "INSERT INTO categories(name_ct ,`note`) VALUES ('$name_ct','$note')";
      $result = $db->pdo_execute($query);
      return $result;
   }
   public function update($id, $name_ct, $note)
   {
      $db = new connect();
      $sql = "UPDATE categories SET  name_ct  = '$name_ct ', note = '$note'  WHERE id_categori = $id";
      $result = $db->pdo_execute($sql);
      return $result;
   }
   public function delete($id)
   {
      $db = new connect();
      $sql = "DELETE FROM categories WHERE id_categori = " . $id;
      $result = $db->pdo_execute($sql);
      return $result;
   }
}
