<?php
session_start();
include_once 'model/connect.php';
include_once 'view/header.php';
include_once 'view/main.php';
include_once 'view/footer.php';
pdo_get_connection();
if (isset($_GET['pg'])) {
    switch ($_GET['pg']) {
        case 'main':
            include_once 'view/main.php';
                break;
        // case 'user':
        //     include_once 'view/categories.php';
        //         break;
        // case 'cart':
        //     include_once 'view/check-out.php';
        //         break;
        // case 'product':
        //     include_once 'controller/product.php';
        //         break;
        // case 'catrgories':
        //     include_once 'controller/catrgories.php';
        //         break;
        default:
            header("Location: view/main.php");
            break;
    }
}else{
    header("Location: view/main.php");
}

?>