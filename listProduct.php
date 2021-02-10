  <?php include "header.php" ?>

  <head> 
   
   <style>  
 a {text-decoration:none; font-size: 15px}
 a:hover {
  color: #FFFFFF;  
  }
      </style> <!-- конец внутренних стилей -->
    
 
  </head> 
                <body>     
                    
                      <h1>Products</h1>
  
                                 
                
  <table border="1">
    <tr >     
      <th>ID</th>
      <th>PRODUCT_ID</th>
      <th>PRODUCT_NAME
      </th>
      <th>PRODUCT_PRICE    
      </th>
      <th>PRODUCT_ARTICLE    
      </th>
      <th>PRODUCT_QUANTITY    
      </th>   
      <th>DATE_CREATE      
      </th>
      <th>HIDDEN      
      </th>
    </tr>
    
  
   
 <?php $i=0;   foreach ($arr['Product']['results'] as $product ) { 
        if ($product->Hidden == 1) {  $i++; ?>
   
      <tr>
        <td> 
          <?php if(isset ($product->ID)) {
                  echo $product->ID;                        
                } 
          ?>
        </td>
        <td>
          <?php if(isset ($product->PRODUCT_ID)) {
                  echo  $product->PRODUCT_ID; 
                } else {
                    echo "Без PRODUCT_ID";
                  }
          ?>
        </td>
        <td>
          <?php if(isset ($product->PRODUCT_NAME)) {
                  echo  $product->PRODUCT_NAME; 
                } else {
                    echo "Без PRODUCT_NAME";
                  }
          ?>
        </td>
        <td>
          <?php if(isset ($product->PRODUCT_PRICE)) {
                 echo  $product->PRODUCT_PRICE; 
                } else {
                    echo "Без PRODUCT_PRICE";
                  }
          ?>
        </td>
        <td>
          <?php if(isset ($product->PRODUCT_ARTICLE)) {
                  echo  $product->PRODUCT_ARTICLE; 
                } else {
                    echo "Без PRODUCT_ARTICLE";
                  }
          ?>
        </td>
        <td> 
            <a class="ajaxPOSTminus" 
                data-contentId="<?php echo $product->ID?>"
                id= "<?php echo $i; ?>"
                href="admin.php?ID=<?php echo $product->ID?>">
                -
            </a>
          <?php if(isset ($product->PRODUCT_QUANTITY )) {
                  echo  $product->PRODUCT_QUANTITY ; 
                 
                } else {
                    echo "Без PRODUCT_QUANTITY ";
                  }
          ?>  
            <a class="ajaxPOSTplus"
                  id= "<?php echo $i; ?>"
                  data-contentId="<?php echo $product->ID?>"
                  href="admin.php?ID=<?php echo $product->ID?>">
                +
            </a>     
        </td>
        <td>
          <?php if(isset ($product->DATE_CREATE)) {
                  echo  $product->DATE_CREATE; 
                } else {
                    echo "Без DATE_CREATE";
                  }
          ?>
        </td>
        
         <td>
              <a   class="ajaxPOSTnew" id= "<?php echo $i; ?>"    
                   href="admin.php?ID=<?php echo $product->ID?>" 
                   data-contentId="<?php echo $product->ID?>">
                      Скрыть
              </a> 
                
        </td>
    </tr>   
    <?php } else {continue;} } ?>
   


</table>
  <!-- <p><?php echo $results['totalRows']?> tovar<?php echo ( $results['totalRows'] != 1 ) ? 's' : '' ?> </p> -->
  <p><a href="admin.php?action=newTovar">Add a new product</a></p>

 
                </body>
                
                
                
                