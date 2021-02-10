<?php
  // otkrivaem sessiy
  session_start();
  // var_dump($_GET); die();
  require("CProducts.php");
  $action = isset($_GET['action']) ? $_GET['action'] : "";
  // var_dump($action);die();

  switch ($action) {
    case 'newProduct':
        newProduct();
         break;
    case 'editProduct':
        editProduct();
        break;
    case 'deleteProduct':
        deleteProduct();
        break;  
    default:
        listProduct();
  }   

// Novii tovar  
  function newProduct() {
    $results = array();
    $results['pageTitle'] = "New Product";
    $results['formAction'] = "newProduct";   
    if ( isset( $_POST['saveChanges'] ) ) {
      $article = new Tovar();
      $article->storeFormValues( $_POST );          
      $article->insert();
      header( "Location: admin.php?status=changesSaved" );
    } elseif ( isset( $_POST['cancel'] ) ) {
        header( "Location: admin.php" );
      } else {
        $data = new Product;
        require("editProduct.php");    
        }
  }
// Vivod tovarov
  function listProduct() {
    $results = array();   
    $data = CProducts::getListProducts();
    $arr['Product'] = $data; 
    $arr['totalRows'] = $data;
    require("listProduct.php");
  }

// Redaktirovanie productov
  function editProduct() {    
    $results = array();
    $results['pageTitle'] = "Edit Product";
    $results['formAction'] = "editProduct";
    if (isset($_POST['saveChanges'])) {   
      if ( !$tovar = CProducts::getProductById ( (int)$_POST['tovarId'] ) ) {
        header( "Location: admin.php?error=TovarNotFound" );
        return;
      }       
      $tovar->storeFormValues( $_POST );
      $tovar->update();
      header( "Location: admin.php?status=changesSaved" );
    } elseif ( isset( $_POST['cancel'] ) ) {
        header( "Location: admin.php" );
      } else {
          // dannie o tovare s opredelennim id
          $data = CProducts::getProductById((int)$_GET['tovarId']);     
          //var_dump( $data );die();
          require("editProduct.php");
        }      
  }
  
// Ydalenie tovarov
  function deleteProduct() {
    $data = CProducts::getTovarById((int)$_GET['tovarId']);
    $data->delete();
    header( "Location: admin.php" );
}
