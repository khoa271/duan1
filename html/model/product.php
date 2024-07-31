<?php
//lay tat ca san pham
    function get_products($category_id=0,$start=0,$limit=0){
        global $conn;
        $sql = "SELECT s.*, d.category FROM product s INNER JOIN category d ON s.category_id = d.category_id";
        if($category_id!=0){
            $sql .= " WHERE s.category_id=".$category_id;
        }
        if ($limit!=0) {
            $sql .= " LIMIT ".$start.",".$limit;
        }
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(); //lay tat ca san pham
    }
// lay id san pham
    function get_product($id){
        global $conn;
        $sql = "SELECT s.*, d.category FROM product s INNER JOIN category d ON s.category_id = d.category_id WHERE s.id=".$id;
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(); // chi lay 1 sann pham
    }
// them san pham    
    function add_product($id,$category_id,$tittle,$discount,$img,$description,$deteled){
        global $conn;
        $sql = "INSERT INTO product (`id`,`category_id`,`tittle`,`discount`,`img`,`description`,`deteled`) VALUES (:id, :category_id, :tittle, :discount, :img, :description, :deteled)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":category_id", $category_id);
        $stmt->bindParam(":tittle", $tittle);
        $stmt->bindParam(":discount", $discount);
        $stmt->bindParam(":img", $img);
        $stmt->bindParam(":description", $description);
        $stmt->bindParam(":deteled", $deteled);
        return $stmt->execute();
    }
// sua san pham
    function edit_product($id, $tittle, $discount, $img, $description, $deteled,$category_id){
        global $conn;
        $sql = "UPDATE product SET `tittle`=:tittle, `discount`=:discount,
         `img`=:img, `description`=:description, `deteled`=:deteled,`category_id`=:category_id WHERE id=:id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":tittle", $tittle);
        $stmt->bindParam(":discount", $discount);
        $stmt->bindParam(":img", $img);
        $stmt->bindParam(":description", $description);
        $stmt->bindParam(":deteled", $deteled);
        $stmt->bindParam(":category_id", $category_id);
        return $stmt->execute();
    }
// xoa san pham
    function delete_product($id){
        global $conn;
        $sql = "DELETE FROM product WHERE id=:id";
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":id",$id);
        return $stmt->execute();
    }
?>