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
      inner join users on id_user = user_id where product_id = " . $id_pr;
      return $db->pdo_query($select);
   }
   function listcomment()
   {
      $db = new connect();
      $select = "SELECT p.id_product, p.name_pr, COUNT(c.id_cmt) AS comment_count
      FROM products AS p
      JOIN (
          SELECT DISTINCT product_id,id_cmt
          FROM comments
      ) AS c ON p.id_product = c.product_id
      GROUP BY p.id_product, p.name_pr";
      $result = $db->pdo_query($select);
      return  $result;
   }

   function detail_coment($id)
   {
      $db = new connect();
      $select = "SELECT c.`cmt`, u.username, p.name_pr, c.`create_at`,c.`id_cmt`,c.`user_id`
   FROM comments AS c
   JOIN users AS u ON c.`user_id` = u.id_user
   JOIN products AS p ON  c.product_id = p.id_product
   where id_product = " . $id;
      $result = $db->pdo_query($select);
      return $result;
   }
   public function checkId($product_id)
   {
      $db = new connect();
      $select = "SELECT * from comments where product_id ='$product_id'";
      $result = $db->pdo_query_one($select);
      return $result;
   }


   // require_once 'pdo.php';

   public function add($cmt, $user_id, $product_id)
   {
      $db = new connect();
      $query = "INSERT INTO comments( cmt, user_id, product_id) VALUES ( '$cmt', '$user_id', '$product_id')";
      $result = $db->pdo_execute($query);
      return $result;
   }

   function getCommentsByItemId($id_pr)
   {
      $db = new connect();
      $select = " SELECT * from comments 
      inner join users on id_user = user_id where product_id = " . $id_pr;
      return $db->pdo_query($select);
   }

   function update($id_cmt, $cmt, $user_id, $product_id)
   {
      $db = new connect();
      $query = "UPDATE comments SET id_cmt='$id_cmt' cmt='$cmt', user_id='$user_id', product_id='$product_id'
       WHERE product_id= '.$product_id' and user_id " . $user_id;
      $result = $db->pdo_execute($query);
      return $result;
   }


   function delete($id_cmt)
   {
      $db = new connect();
      $query = "DELETE FROM comments WHERE  id_cmt=  " . $id_cmt;
      $result = $db->pdo_execute($query);
      return $result;
   }


}
