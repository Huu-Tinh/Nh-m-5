<?php	
class categori {
   var $name_ct  = null;
  
   function getcategori()
   {
      $db = new connect();
      $select = "select * from categories";
      return $db->pdo_query($select);
   }
  
    function add($name_ct ,)
   {
      $db = new connect();
      $query = "INSERT INTO categories(name_ct ,`soluong`) VALUES ('$name_ct ')";
      $result = $db->pdo_execute($query);
      return $result;
   }
   public function update($name_ct )
    {
        $db = new connect();
        $sql = "UPDATE categories SET  name_ct  = '$name_ct '  WHERE  = " ;
        $result = $db->pdo_execute($sql);
        return $result;
    }
}