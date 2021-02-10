<?php
  // Klass dlya obrabotki tovarov
  class CProducts {
    // Svoistva
    public $ID = null;
    public $PRODUCT_ID = null;
    public $PRODUCT_NAME= null;
    public $PRODUCT_PRICE= null;
    public $PRODUCT_ARTICLE= null;
    public $PRODUCT_QUANTITY = null;
    public $DATE_CREATE = null;
    public $Hidden = null;
    


    public function __construct($data=array())  {
      if (isset($data['ID'])) {
        $this->ID = (int) $data['ID'];
      }
      
      if (isset( $data['PRODUCT_ID'])) {
        $this->PRODUCT_ID= (string) $data['PRODUCT_ID'];     
      }

      if (isset( $data['PRODUCT_NAME'])) {
        $this->PRODUCT_NAME= (string) $data['PRODUCT_NAME'];     
      }

      if (isset($data['PRODUCT_PRICE'])) {
        $this->PRODUCT_PRICE= $data['PRODUCT_PRICE'];        
      }

      if (isset($data['PRODUCT_ARTICLE'])) {
        $this->PRODUCT_ARTICLE = (int) $data['PRODUCT_ARTICLE'];      
      }

      if (isset($data['PRODUCT_QUANTITY'])) {
        $this->PRODUCT_QUANTITY = (int) $data['PRODUCT_QUANTITY'];      
      }

      if (isset($data['DATE_CREATE'])) {
        $this->DATE_CREATE = $data['DATE_CREATE'];         
      }
     
      if (isset($data['Hidden'])) {
        $this->Hidden = $data['Hidden'];         
      }
          
    }
  // Zapis' v svoistva
  public function storeFormValues ( $params ) {
     var_dump( $params); die();
    $this->__construct( $params );
  }

  public static function getProductById ($id) {
    $conn = new PDO( "mysql:host=localhost;dbname=testproduct;charset=utf8;","root","");
    $sql = "SELECT * FROM Products WHERE id = :id";
    $st = $conn->prepare($sql);
    $st->bindValue(":id", $id, PDO::PARAM_INT);
    $st->execute();       
    $row = $st->fetch();
    // var_dump($row); die();
    $conn = null;       
    if ($row) { 
      return new CProducts($row);
    }    
  } 

  public static function getListProducts($numRows=3, 
    $categoryId=null, $order="publicationDate DESC") {
    $conn = new PDO( "mysql:host=localhost;dbname=testproduct;charset=utf8;","root","");
    $sql = "SELECT * FROM Products ORDER BY DATE_CREATE DESC LIMIT :numRows ";   
    $st = $conn->prepare($sql);
    $st->bindValue(":numRows", $numRows, PDO::PARAM_INT);
    $st->execute(); 
    $list = array();
      while ($row = $st->fetch()) {
        $product = new CProducts($row);
        $list[] = $product;
      }
     // var_dump($list);die();
    // Получаем общее количество продуктов
    $sql = "SELECT FOUND_ROWS() AS totalRows";
    $totalRows = $conn->query($sql)->fetch();
    $conn = null;      
    return (array(
      "results" => $list, 
      "totalRows" => $totalRows[0]
      ) 
    );
  }
  
  
  


  public function insert() {
    // Вставляем товар
    $conn = new PDO( "mysql:host=localhost;dbname=testproduct;charset=utf8;","root","");
    $sql = "INSERT INTO Products (PRODUCT_ID, PRODUCT_NAME, PRODUCT_PRICE, PRODUCT_ARTICLE, PRODUCT_QUANTITY,DATE_CREATE,Hidden) VALUES (:PRODUCT_ID, :PRODUCT_NAME , :PRODUCT_PRICE, :PRODUCT_ARTICLE, :PRODUCT_QUANTITY, :DATE_CREATE,:Hidden)";
    $st = $conn->prepare ($sql);
    $st->bindValue( ":PRODUCT_ID", $this->PRODUCT_ID, PDO::PARAM_STR );
    $st->bindValue( ":PRODUCT_NAME", $this->PRODUCT_NAME, PDO::PARAM_STR );
    $st->bindValue( ":PRODUCT_PRICE", $this->PRODUCT_PRICE, PDO::PARAM_INT );
    $st->bindValue( ":PRODUCT_ARTICLE", $this->PRODUCT_ARTICLE, PDO::PARAM_INT );
    $st->bindValue( ":PRODUCT_QUANTITY", $this->PRODUCT_QUANTITY, PDO::PARAM_INT );
    $st->bindValue( ":DATE_CREATE", $this->DATE_CREATE, PDO::PARAM_INT); 
    $st->bindValue( ":Hidden", $this->Hidden, PDO::PARAM_INT); 
    $st->execute();
    $this->ID = $conn->lastInsertId();
    $conn = null;
  }
  
  
    public function updatehide() {
    // Вставляем товар
    $conn = new PDO( "mysql:host=localhost;dbname=testproduct;charset=utf8;","root","");
     $sql = "UPDATE Products SET Hidden=:Hidden, WHERE ID= :ID";      
    $st = $conn->prepare ($sql); 
    $st->bindValue( ":Hidden", $this->Hidden , PDO::PARAM_INT); 
    $st->execute();
    $this->ID = $conn->lastInsertId();
    $conn = null;
  }



  public function update() {
    $conn = new PDO( "mysql:host=localhost;dbname=testproduct;charset=utf8;","root","");
    $sql = "UPDATE Products SET 
    PRODUCT_ID=:PRODUCT_ID, PRODUCT_NAME=:PRODUCT_NAME, PRODUCT_PRICE=:PRODUCT_PRICE, PRODUCT_ARTICLE=:PRODUCT_ARTICLE,PRODUCT_QUANTITY=:PRODUCT_QUANTITY,DATE_CREATE:=DATE_CREATE,Hidden:=Hidden, WHERE ID= :ID";      
    $st = $conn->prepare ( $sql );
    $st->bindValue( ":PRODUCT_ID", $this->PRODUCT_ID, PDO::PARAM_STR );
    $st->bindValue( ":PRODUCT_NAME", $this->PRODUCT_NAME, PDO::PARAM_STR );
    $st->bindValue( ":PRODUCT_PRICE", $this->PRODUCT_PRICE, PDO::PARAM_INT );
    $st->bindValue( ":PRODUCT_ARTICLE", $this->PRODUCT_ARTICLE, PDO::PARAM_INT );
    $st->bindValue( ":PRODUCT_QUANTITY", $this->PRODUCT_QUANTITY, PDO::PARAM_INT );
    $st->bindValue( ":DATE_CREATE", $this->DATE_CREATE, PDO::PARAM_INT); 
    $st->bindValue( ":Hidden", $this->Hidden, PDO::PARAM_INT); 
    $st->execute();
    $conn = null;
  }

  
 
  
  
  public function delete() {
    $conn = new PDO( "mysql:host=localhost;dbname=testproduct;charset=utf8;","root","");
    $st = $conn->prepare ( "DELETE FROM Products WHERE id = :id LIMIT 1" );
    $st->bindValue( ":id", $this->ID, PDO::PARAM_INT );
    $st->execute();
    $conn = null;
  }

  public static function  ProductsFunction ( ) {
      
      /*
    //$a=$_GET['Parametr'];
    // var_dump($_GET );die();
    // $str = $_GET['Parametr'];
    // $str = str_replace('"', '', $str);
    //echo $str;die();
    // var_dump($tovarsizesort);die();
    $a=$_GET['Parametr'];
    //$str = str_replace('"', '', $a);
    $conn = new PDO( "mysql:host=localhost;dbname=testproduct;charset=utf8;","root","" );
    $sql = "SELECT IF("."$a"."<:Sort, id, 0) FROM Products;";
    $st = $conn->prepare ( $sql );
    //var_dump($st);die();
    $st->bindValue( ":Sort", $_GET['tovarsizesort'], PDO::PARAM_INT );
    $st->execute();
    $array = $st->fetchAll(PDO::FETCH_ASSOC);
    $conn = null; 
    // var_dump($array); die();
    $sortlistid =array ();
    // $key ="IF('".$_GET['Parametr']."'<".$tovarsizesort.", id, 0)";
    //var_dump($key); die();
    foreach ($array as $key => $value) {
      //echo $key;
      // var_dump($value) ;
      //  'IF( 'Length'<50, id, 0)'
      foreach ($value as $key => $strid) {
        //  var_dump( (int) $strid) ;
        if ( (int) $strid != 0 ) {
          $sortlistid [] = (int) $strid; 
        }
      }
    }
    // var_dump($sortlistid);
    return $sortlistid; */
  }

  }