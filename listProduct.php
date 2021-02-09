  <?php include "header.php" ?>

  <head> 
      
      <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<script>
	$( document ).ready(function(){
	  $( ".hidden[data-id="${id}"]" ).click(function(){ // задаем функцию при нажатиии на элемент с классом hide
	    $( "table" ).hide(); // скрывыаем все элементы <p>
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
    
  
   
 <?php $i=0; foreach ($arr['Product']['results'] as $product ) { 
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
        <td>
          <?php if(isset ($product->PRODUCT_QUANTITY )) {
                  echo  $product->PRODUCT_QUANTITY ; 
                } else {
                    echo "Без PRODUCT_QUANTITY ";
                  }
          ?>
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
             <button class="hidden"  data-id= "<?php echo $i ?>">hide</button>
        </td>
    </tr>   
    <?php } else {continue;} } ?>
   
    <button class = "show">Показать</button>

</table>
  <!-- <p><?php echo $results['totalRows']?> tovar<?php echo ( $results['totalRows'] != 1 ) ? 's' : '' ?> </p> -->
  <p><a href="admin.php?action=newTovar">Add a new product</a></p>

 
                </body>
                
                
                
                