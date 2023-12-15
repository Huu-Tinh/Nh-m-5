<?php
class order
{
    public function get_buy_month()
    {
        $db = new connect();
        $query = "SELECT YEAR(created_at) AS `year`, MONTH(created_at) AS `month`, SUM(quantity_odt) AS total_quantity FROM orders_detail GROUP BY YEAR(created_at), MONTH(created_at) ORDER BY YEAR(created_at), MONTH(created_at);";
        $result = $db->pdo_query($query);
        return $result;
    }
    public function getorder()
    {
        $db = new connect();
        $query = "SELECT orders.status as `status`, orders.created_at as created_at, orders.code as code, orders.total as total, orders.username_od as username, orders.address_od as `address`, orders.phone_od as phone, orders.id_order as id, COUNT(orders_detail.order_id) AS count FROM orders INNER JOIN orders_detail ON orders.id_order = orders_detail.order_id GROUP BY orders.id_order";
        $result = $db->pdo_query($query);
        return $result;
    }
    public function get_myorder($iduser)
    {
        $db = new connect();
        $query = "SELECT orders.pttt as pttt, orders.status as `status`, orders.code as code, orders.total as total, orders.username_od as username, orders.address_od as `address`, orders.phone_od as phone, orders.id_order as id, COUNT(orders_detail.order_id) AS count FROM orders INNER JOIN orders_detail ON orders.id_order = orders_detail.order_id WHERE orders.user_id = '$iduser' GROUP BY orders.id_order";
        $result = $db->pdo_query($query);
        return $result;
    }
    public function getcart()
    {
        $db = new connect();
        $query = "SELECT * from tocart";
        $result = $db->pdo_query($query);
        return $result;
    }
    public function gettocart($iduser)
    {
        $db = new connect();
        $query = "SELECT * from tocart as c,products as p where c.product_id = p.id_product and c.user_id =" . $iduser;
        $result = $db->pdo_query($query);
        return $result;
    }
    public function getcountcart($iduser)
    {
        $db = new connect();
        $query = "SELECT COUNT(user_id) as count from tocart  where user_id =" . $iduser;
        $result = $db->pdo_query_one($query);
        return $result;
    }
    public function getsum_quantity_cart($iduser, $idpro)
    {
        $db = new connect();
        $query = "SELECT SUM(quantity_cart) as sum from tocart  where product_id = $idpro and user_id =" . $iduser;
        $result = $db->pdo_query_one($query);
        return $result;
    }
    public function addcart($iduser, $idproduct, $quantity_cart, $size)
    {
        $db = new connect();
        $query = "INSERT INTO tocart(user_id, product_id, quantity_cart, `size`) VALUES ('$iduser', '$idproduct', '$quantity_cart', '$size')";
        $result = $db->pdo_execute($query);
        return $result;
    }
    public function updatecart($id, $quantity)
    {
        $db = new connect();
        $query = "UPDATE tocart SET  quantity_cart = '$quantity' where  id_cart =" . $id;
        $result = $db->pdo_execute($query);
        return $result;
    }
    public function updatestatus($id)
    {
        $db = new connect();
        $query = "UPDATE orders SET  `status` = '1' where  id_order =" . $id;
        $result = $db->pdo_execute($query);
        return $result;
    }
    public function delete_idcart($id)
    {
        $db = new connect();
        $sql = "DELETE FROM tocart WHERE id_cart = " . $id;
        $result = $db->pdo_execute($sql);
        return $result;
    }
    public function delete_formcart_user($id)
    {
        $db = new connect();
        $sql = "DELETE FROM tocart WHERE user_id = " . $id;
        $result = $db->pdo_execute($sql);
        return $result;
    }
    public function addorder($code, $total, $pttt, $username, $phone, $address, $iduser)
    {
        $db = new connect();
        $query = "INSERT INTO orders(code, total, pttt, username_od, phone_od, address_od, user_id) VALUES ( '$code', '$total', '$pttt', '$username', '$phone', '$address','$iduser')";
        return $db->pdo_lastinsertID($query);
    }
    public function addtocat($id_order, $idpro, $namepro, $img, $price, $quantity)
    {
        $db = new connect();
        $query = "INSERT INTO orders_detail(order_id, product_id, `name`, img_odt, unit_price, quantity_odt) VALUES ( '$id_order', '$idpro', '$namepro', '$img', '$price', '$quantity')";
        $result = $db->pdo_execute($query);
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
