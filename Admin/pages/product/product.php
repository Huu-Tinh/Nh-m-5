<?php
class product {
   var $name = null;
   var $price = null;
   var $img = null;
   var $img_1 = null;
   var $img_2 = null;
   var $img_3 = null;
   var $note = null;
   var $quantity = null;
   var $id_product = null;



   function getproduct()
   {
      $db = new connect();
      $select = "select * from products";
      return $db->pdo_query($select);
   }



    function add($name, $price, $img, $img_1, $img_2, $img_3, $note,$quantity)
   {
      $db = new connect();
      $query = "INSERT INTO products(`name`,`price`,img,img_1,`img_2`,img_3, note,quantity) VALUES(`$name`,`$price`,$img,$img_1,`$img_2`,$img_3, $note,$quantity)";
      $result = $db->pdo_execute($query);
      return $result;
   }
   public function update($id_product,$name, $price, $img, $img_1, $img_2, $img_3, $note,$quantity)
    {
        $db = new connect();
        $sql = "UPDATE products SET  name = '$name', `price` = '$price', img = '$img', img_1 = '$img_1',img_2 = '$img_2', `img_3` ='$img_3', note = '$note', quantity ='$quantity'  WHERE id_product = " . $id_product;
        $result = $db->pdo_execute($sql);
        return $result;
    }
}