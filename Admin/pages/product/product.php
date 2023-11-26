<?php
class product
{
   var $name = null;
   var $price = null;
   var $img = null;
   var $img_1 = null;
   var $img_2 = null;
   var $img_3 = null;
   var $describe = null;
   var $quantity = null;
   var $id_product = null;
   var $categori_id = null;



   function getproduct()
   {
      $db = new connect();
      $select = "SELECT * from products  ";
      return $db->pdo_query($select);
   }
   public function checkId($id_product)
   {
      $db = new connect();
      $select = "SELECT * from products where id_product ='$id_product'";
      $result = $db->pdo_query_one($select);
      return $result;
   }
   function add($name, $price, $img, $img_1, $img_2, $img_3, $describe, $quantity, $categori_id)
   {
      $db = new connect();
      $query = "INSERT INTO products(`name_pr`,`price`,img,img_1,`img_2`,img_3, `describe`,`quantity`,`categori_id`) VALUES('$name','$price','$img','$img_1','$img_2','$img_3', '$describe','$quantity','$categori_id')";
      $result = $db->pdo_execute($query);
      return $result;
   }
   public function update($id_product, $name, $price, $img, $img_1, $img_2, $img_3, $describe, $quantity, $categori_id)
   {
      $db = new connect();
      $sql = "UPDATE products SET  name_pr = '$name', `price` = '$price', img = '$img', img_1 = '$img_1',img_2 = '$img_2', `img_3` ='$img_3',` describe` = '$describe', quantity ='$quantity',categori_id ='$categori_id'   WHERE id_product = " . $id_product;
      $result = $db->pdo_execute($sql);
      return $result;
   }

   public function delete($id_product)
   {
      $db = new connect();
      $sql = "DELETE FROM products WHERE id_product = " . $id_product;
      $result = $db->pdo_execute($sql);
      return $result;
   }
}
