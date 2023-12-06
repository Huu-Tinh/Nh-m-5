<?php
class order
{
    public function addorder($code, $total, $pttt, $username, $phone, $address)
    {
        $db = new connect();
        $query = "INSERT INTO orders(code, total, pttt, username_od, phone_od, address_od) VALUES ( '$code', '$total', '$pttt', '$username', '$phone', '$address')";
        // $id = $db->pdo_execute($query);
        
        return $db->pdo_lastinsertID($query);
    }
    public function addtocat($id_order, $idpro, $namepro, $img, $price, $quantity)
    {
        $db = new connect();
        $query = "INSERT INTO orders_detail(order_id, product_id, `name`, img_odt, unit_price, quantity_odt) VALUES ( '$id_order', '$idpro', '$namepro', '$img', '$price', '$quantity')";
        $result = $db->pdo_execute($query);
        return $result;
    }
    public function getorder()
    {
        $db = new connect();
        $query = "SELECT orders.code as code, orders.total as total, orders.username_od as username, orders.address_od as `address`, orders.phone_od as phone, orders.id_order as id, COUNT(orders_detail.order_id) AS count FROM orders INNER JOIN orders_detail ON orders.id_order = orders_detail.order_id GROUP BY orders.id_order";
        $result = $db->pdo_query($query);
        return $result;
    }
    public function checkId($id)
    {
        $db = new connect();
        $select = "SELECT * from orders_detail where order_id ='$id'";
        $result = $db->pdo_query($select);
        return $result;
    }
}
