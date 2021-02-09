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
    case 'editTovar':
        editProduct();
        break;
    case 'deleteTovar':
        deleteProduct();
        break;
    case 'sortTovar':
       // sortProduct();
        break;  
    case 'hide':
   // sortProduct();
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
    // вывод всего товара 
    $data = CProducts::getListProducts();
   // var_dump($data); die();
    $arr['Product'] = $data; 
    //var_dump($arr['Product']['results']); die();
    // вывод количества  товара 
    $arr['totalRows'] = $data;
    require("listProduct.php");
  }

// Redaktirovanie tovarov
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
  function deleteTovar() {
    $data = CProducts::getTovarById((int)$_GET['tovarId']);
    $data->delete();
    header( "Location: admin.php" );
}
// Sortirovka tovarov

/*
  function sortProduct() {
    $sorttovarid= array ();
    // var_dump($_GET );die();
    // var_dump($_GET['tovarsizesort']);die();
    //  var_dump($_GET['Parametr']);die();
    // var_dump( (int) $_GET['tovarsizesort']);die();
    $sorttovarid= CProducts::ProductsFunction( );
    // var_dump($sorttovarid);die();
    $results = array();  
    // vivod vsego tovara
    $data = CProducts::getListProducts();
    //var_dump($data); die();
    $arr['tovar'] = $data; 
    // var_dump($results['tovar']); die();
    // vivod kolichestva tovara
    //$arr['totalRows'] = $data;
    require("sortTovar.php");
} */

function hide() {
    
    require("listProduct.php");
}