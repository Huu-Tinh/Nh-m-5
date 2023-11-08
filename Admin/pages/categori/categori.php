<?php	
class categori {
   var $tenloaiSP = null;
   var $soluong = null;

   function getcategori()
   {
      $db = new connect();
      $select = "select * from categori";
      return $db->pdo_query($select);
   }
  
    function add($tenloaiSP, $soluong)
   {
      $db = new connect();
      $query = "INSERT INTO categori(tenloaiSP,`soluong`) VALUES ('$tenloaiSP','$soluong')";
      $result = $db->pdo_execute($query);
      return $result;
   }
   public function update($id,$tenloaiSP, $soluong)
    {
        $db = new connect();
        $sql = "UPDATE categori SET  tenloaiSP = '$tenloaiSP', `soluong` = '$soluong'  WHERE  = " ;
        $result = $db->pdo_execute($sql);
        return $result;
    }
}