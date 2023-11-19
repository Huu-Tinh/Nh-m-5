<?php
class comment
{
   var $id_cmt  = null;
   var $cmt = null;



   function getComment()
   {
      $db = new connect();
      $select = "select * from comments";
      return $db->pdo_query($select);
   }


}
