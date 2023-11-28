<?php
class order
{
    public function addorder($code, $total, $pttt, $username, $phone, $address)
    {
        $db = new connect();
        $query = "INSERT INTO orders(code, total, pttt, username_od, phone_od, address_od) VALUES ( '$code', '$total', '$pttt', '$username', '$phone', '$address')";
        $db->pdo_execute($query);
        $id = $db->pdo_get_connection()->lastInsertId();
        return $id;
    }
    public function addtocat($id_order, $idpro, $namepro, $img, $price, $quantity)
    {
        $db = new connect();
        $query = "INSERT INTO orders_deatail(order_id, product_id, `name`, img_odt, unit_price, quantity_odt) VALUES ( '$id_order', '$idpro', '$namepro', '$img', '$price', '$quantity')";
        $result = $db->pdo_execute($query);
        return $result;
    }
}
