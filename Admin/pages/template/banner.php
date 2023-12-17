<?php
class banner
{
    public function getbbanner(){
        $db = new connect();
        $select = "select * from banner";
        return $db->pdo_query($select); 
    }
    public function update($id, $h1, $h2, $img, $content)
    {
        $db = new connect();
        $sql = "UPDATE banner SET  h1  = '$h1 ', h2 = '$h2', img = '$img', content = '$content'  WHERE id = $id";
        $result = $db->pdo_execute($sql);
        return $result;
    }
}
