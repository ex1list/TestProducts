<?php
 require('CProducts.php'); 

if (isset ($_POST)) {
     // print_r($_POST['ID']); die();
    //die("Привет)");
    $product = CProducts::getProductById ((int)$_POST['ID']);
    // print_r($product->ID); die();
   // var_dump(Privet);die();
   // echo json_encode($article);
    echo $product->ID;
//        die("Привет)");
//    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
//    
//        if (isset($conn)) {
//            die("Соединенте установлено");
//        }
//        else {
//            die("Соединение не установлено");
//        }
//    $article = "WHERE Id=". (int)$_POST[articleId];
//    echo $article;
//    $sql = "SELECT content FROM articles". $article;
//    $contentFromDb = $conn->prepare( $sql );
//    $contentFromDb->execute();
//    $result = $contentFromDb->fetch();
//    $conn = null;
//    echo json_encode($result);
}

