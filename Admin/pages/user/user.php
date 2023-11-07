<?php
class user {
   var $username = null;
   var $password = null;
   var $name = null;
   var $email = null;
   var $images = null;

   function getUser()
   {
      $db = new connect();
      $select = "select * from users";
      return $db->pdo_query($select);
   }
   public function checkUser($username,$password) 
   { 
       $db = new connect();               
       $select="select * from users where UserName='$username' and Password='$password'"; 
       $result = $db->pdo_query_one($select);
       if($result!=null) 
           return true; 
       else 
           return false; 
   }

   public function userid($username,$password) 
    { 
        $db = new connect();               
        $select="select UserID from users where UserName='$username' and Password='$password'"; 
        $result = $db->pdo_query_one($select);
        return $result;
    }

    function add($username, $password, $email, $phone, $address, $avatar, $gender, $role_id)
   {
      $db = new connect();
      $query = "INSERT INTO users(username,`password`,email,phone,`address`,avatar, gender,role_id) VALUES ('$username','$password','$email','$phone','$address','$avatar','$gender','$role_id')";
      $result = $db->pdo_execute($query);
      return $result;
   }
}