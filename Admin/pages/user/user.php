<?php
class user
{
    var $username = null;
    var $password = null;
    var $name = null;
    var $email = null;
    var $images = null;

    public function logout()
    {
        unset($_SESSION['admin']);
        header('Location: index.php?act=home');
    }
    function getUser()
    {
        $db = new connect();
        $select = "select * from users";
        return $db->pdo_query($select);
    }
    public function checkUser($username, $password)
    {
        $db = new connect();
        $select = "select * from users where username='$username' and password='$password'";
        $result = $db->pdo_query_one($select);
        if ($result != null)
            return true;
        else
            return false;
    }
    public function checkId($id)
    {
        $db = new connect();
        $select = "SELECT * from users where id_user='$id'";
        $result = $db->pdo_query_one($select);
        return $result;
    }
    public function userid($username, $password)
    {
        $db = new connect();
        $select = "SELECT * from users where username='$username' and `password`='$password'";
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
    function register($username, $password, $email)
    {
        $db = new connect();
        $query = "INSERT INTO users(username,`password`,email) VALUES ('$username','$password','$email')";
        $result = $db->pdo_execute($query);
        return $result;
    }
    public function update($id, $username, $password, $email, $phone, $address, $avatar, $gender, $role_id)
    {
        $db = new connect();
        $sql = "UPDATE users SET role_id = '$role_id', username = '$username', `password` = '$password', email = '$email', phone = '$phone', `address` ='$address', gender = '$gender', avatar ='$avatar'  WHERE id_user = " . $id;
        $result = $db->pdo_execute($sql);
        return $result;
    }
    public function update_info_cart($id, $username, $phone, $address)
    {
        $db = new connect();
        $sql = "UPDATE users SET username = '$username', phone = '$phone', `address` ='$address' WHERE id_user = " . $id;
        $result = $db->pdo_execute($sql);
        return $result;
    }
    public function delete($id)
   {
      $db = new connect();
      $sql = "DELETE FROM users WHERE id_user = " . $id;
      $result = $db->pdo_execute($sql);
      if ($result != null)
            return true;
        else
            return false;
   }
}
