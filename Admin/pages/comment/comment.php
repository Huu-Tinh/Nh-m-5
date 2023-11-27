<?php
class comment
{
   var $id_cmt  = null;
   var $cmt = null;
   var $user_id = null;
   var $product_id  = null;
   // var $total_comments = null;

   function getComment($id_pr)
   {
      $db = new connect();
      $select = " SELECT * from comments 
      inner join users on id_user = user_id where product_id = " .$id_pr;
      return $db->pdo_query($select);
   }


   // require_once 'pdo.php';

   public function add( $cmt, $user_id, $product_id)
   {
      $db = new connect();
      $query = "INSERT INTO comments( cmt, user_id, product_id) VALUES ( `$cmt`, `$user_id`, `$product_id`)";
      $result = $db->pdo_execute($query); 
      return $result;
   }

   function update($id_cmt, $cmt, $user_id, $product_id)
   {
      $db = new connect();
      $query = "UPDATE comments SET id_cmt=`$id_cmt` cmt=`$cmt`, user_id=`$user_id`, product_id=`$product_id`
       WHERE product_id= '.$product_id' and user_id ".$user_id;
      $result = $db->pdo_execute($query); 
      return $result;
   }


   function delete($product_id ,$user_id){
      $db = new connect();
      $query = "DELETE * FROM comments WHERE product_id= '$product_id' and user_id ".$user_id;
      $result = $db->pdo_execute($query);
      return $result;
    
  }

   // function binh_luan_delete($id_cmt)
   // {
   //    $db = new connect();
   //    $sql = "DELETE FROM comments WHERE id_cmt=?";
   //    if (is_array($id_cmt)) {
   //       foreach ($id_cmt as $ma) {
   //          pdo_execute($sql, $ma);
   //       }
   //    } else {
   //       pdo_execute($sql, $ma_bl);
   //    }
   // }

 

   // function binh_luan_select_by_id($ma_bl)
   // {
   //    $sql = "SELECT * FROM comments WHERE ma_bl=?";
   //    return pdo_query_one($sql, $ma_bl);
   //    $result = $db->pdo_execute($query); 
   //    return $result;
   // }

   // function binh_luan_exist($ma_bl)
   // {
   //    $sql = "SELECT count(*) FROM comments WHERE ma_bl=?";
   //    return pdo_query_value($sql, $ma_bl) > 0;
   // }

   // function binh_luan_select_by_hang_hoa($ma_hh)
   // {
   //    $sql = "SELECT b.*, h.ten_hh FROM comments b JOIN hang_hoa h ON h.ma_hh-b.ma_hh WHERE b.ma_hh=? ORDER BY ngay_bl DESC";
   //    return pdo_query($sql, $ma_hh);
   // }


   function exist_param($fieldname)
{
    return array_key_exists($fieldname, $_REQUEST);
}
}
