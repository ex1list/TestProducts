  <?php include "header.php" ?>

  <head> 
   

    
		<script>
	$( document ).ready(function(){     
	  $( `.hidden[id="1"]` ).click(function(){ // задаем функцию при нажатиии на элемент с классом hide
	   // $( "table" ).hide(); // скрывыаем все элементы <p>
            $("#w1").remove();
	  });
          $( `.hidden[id="2"]` ).click(function(){ // задаем функцию при нажатиии на элемент с классом hide
	   // $( "table" ).hide(); // скрывыаем все элементы <p>
            $("#w2").remove();
	  });
          $( `.hidden[id="3"]` ).click(function(){ // задаем функцию при нажатиии на элемент с классом hide
	   // $( "table" ).hide(); // скрывыаем все элементы <p>
            $("#w3").remove();
	  });
	  $( ".show" ).click(function(){ // задаем функцию при нажатиии на элемент с классом show
	    $( "table" ).show(); // отображаем все элементы <p>
	  });
	});
		</script>
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
   
      <tr id="w<?php echo $i ?>"   >
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
        <td> <a class="ajaxPOSTminus" data-contentId="<?php echo $product->PRODUCT_ID?>" href="admin.php?ID=<?php echo $product->ID?>">-</a>
          <?php if(isset ($product->PRODUCT_QUANTITY )) {
                  echo  $product->PRODUCT_QUANTITY ; 
                 
                } else {
                    echo "Без PRODUCT_QUANTITY ";
                  }
          ?>  <button class="ajaxPOSTplus" data-contentId="<?php echo $product->ID?>" >+</button>
            
        </td>
        <td>
          <?php if(isset ($product->DATE_CREATE)) {
                  echo  $product->DATE_CREATE; 
                } else {
                    echo "Без DATE_CREATE";
                  }
          ?>
        </td>
        
         <td class="w<?php echo $i?>">
              <a   class="ajaxPOSTnew" id= "<?php echo $i; ?>"    
                  href="admin.php?ID=<?php echo $product->ID?>" 
             data-contentId="<?php echo $product->ID?>">hide</a> 
             
                   
                

         
            
             
        </td>
    </tr>   
    <?php } else {continue;} } ?>
   
    <button class = "ajaxShowNew" id= "<?php echo $i; ?>"    
                  href="admin.php?ID=<?php echo $product->ID?>" 
             data-contentId="<?php echo $product->ID?>">Показать</button>

</table>
  <!-- <p><?php echo $results['totalRows']?> tovar<?php echo ( $results['totalRows'] != 1 ) ? 's' : '' ?> </p> -->
  <p><a href="admin.php?action=newTovar">Add a new product</a></p>

 
                </body>
                
                
                
                