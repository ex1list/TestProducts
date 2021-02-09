<?php
 require('CProducts.php'); 

if (isset ($_POST['ID'])) {
     // print_r($_POST['ID']); die();
    //die("Привет)");
    $product = CProducts::getProductById ((int)$_POST['ID']);
    print_r($product);  
    $product->Hidden = '0';
    print_r($product);
   // var_dump(Privet);die();
   // echo json_encode($article);
    
    
    $conn = new PDO( "mysql:host=localhost;dbname=testproduct;charset=utf8;","root","");
    $sql = "UPDATE Products SET Hidden=:Hidden WHERE ID= :ID";      
    $st = $conn->prepare ($sql); 
    $st->bindValue( ":Hidden", $product->Hidden , PDO::PARAM_INT);
    $st->bindValue( ":ID", (int)$_POST['ID'] , PDO::PARAM_INT);
    $st->execute();
 
    $conn = null;
}
 
if (isset ($_POST['PRODUCT_ID'])) {
     // 
    //die("Привет)");
       $conn = new PDO( "mysql:host=localhost;dbname=testproduct;charset=utf8;","root","");
    $sql = "UPDATE Products SET PRODUCT_QUANTIT=:PRODUCT_QUANTIT WHERE ID = :ID";      
    $st = $conn->prepare ($sql); 
    $st->bindValue( ":PRODUCT_QUANTITY", $product->PRODUCT_QUANTITY-1 , PDO::PARAM_INT);
    $st->bindValue( ":ID", (int)$_POST['ID'] , PDO::PARAM_INT);
    $st->execute();
 
    $conn = null; 
    
    
    /*
    for ($i=1;$i<=3;$i++) {
    $product = CProducts::getProductById ((int)$_POST['$i']);
    print_r($product);  
    $product->Hidden = '1';
    print_r($product);
   // var_dump(Privet);die();
   // echo json_encode($article);
    
    
    $conn = new PDO( "mysql:host=localhost;dbname=testproduct;charset=utf8;","root","");
    $sql = "UPDATE Products SET Hidden=:Hidden WHERE ID= :ID";      
    $st = $conn->prepare ($sql); 
    $st->bindValue( ":Hidden", $product->Hidden , PDO::PARAM_INT);
    $st->bindValue( ":ID", (int)$_POST['ID'] , PDO::PARAM_INT);
    $st->execute();
 
    $conn = null;
    }
     
     */
}




    
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


