<?php
 require('CProducts.php'); 
 
 
if (isset ($_POST['PLUS'])) {
     // 
    //die("Привет)");
    $product = CProducts::getProductById ((int)$_POST['ID']);
       $conn = new PDO( "mysql:host=localhost;dbname=testproduct;charset=utf8;","root","");
    $sql = "UPDATE Products SET PRODUCT_QUANTITY=:PRODUCT_QUANTITY WHERE ID = :ID";      
    $st = $conn->prepare ($sql); 
    $st->bindValue( ":PRODUCT_QUANTITY", (int) $product->PRODUCT_QUANTITY+1 , PDO::PARAM_INT);
    $st->bindValue( ":ID", (int)$_POST['ID'] , PDO::PARAM_INT);
    $st->execute();
 
    $conn = null; 
    
}

if (isset ($_POST['HIDE'])) {
     //  echo ($_POST['ID']); 
    //die("Привет)");
    $product = CProducts::getProductById ((int)$_POST['ID']);
   // print_r($product);  
    $product->Hidden = '0';
    //print_r($product);
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

if (isset ($_POST['MINUS'])) {
     // 
    //die("Привет)");
    $product = CProducts::getProductById ((int)$_POST['ID']);
       $conn = new PDO( "mysql:host=localhost;dbname=testproduct;charset=utf8;","root","");
    $sql = "UPDATE Products SET PRODUCT_QUANTITY=:PRODUCT_QUANTITY WHERE ID = :ID";      
    $st = $conn->prepare ($sql); 
    $st->bindValue( ":PRODUCT_QUANTITY", (int) $product->PRODUCT_QUANTITY-1 , PDO::PARAM_INT);
    $st->bindValue( ":ID", (int)$_POST['ID'] , PDO::PARAM_INT);
    $st->execute();
    $conn = null;  
}




  


