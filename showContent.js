$(function(){
    
console.log('Привет, это страый js ))');
    init_post_minus();
    init_post_plus();
    init_post_new(); // добавлены  новые функции
    show_post_new();
    

});

    function init_post_minus() {
            $('a.ajaxPOSTminus').one('click', function(){
             var content = $(this).attr('data-contentId'),
                  minus = "q";
             $.ajax({
              url:'phppostajax.php', 
              dataType: 'text',
              data: { ID: content, MINUS:minus},
              method: 'POST'
        });

        });
    }
    
    function init_post_plus() {
        $('a.ajaxPOSTplus').one('click', function(){
             var content = $(this).attr('data-contentId'),
                 plus = 'q';
             $.ajax({
              url:'phppostajax.php', 
              dataType: 'text',
              data: { ID: content,PLUS:plus},
              method: 'POST'
        });
        });
    }

function init_post_new() 
{
    
    $('a.ajaxPOSTnew').one('click', function(){
        var content = $(this).attr('data-contentId'),
            hide = 'q';
        $.ajax({
            url:'phppostajax.php', 
            dataType: 'text',
            data: { ID:content,HIDE:hide},
            method: 'POST'
        })
        .done (function(obj){

            console.log('Ответ получен', obj);
            $('li.' + content).append(obj);
        })
        .fail(function(xhr, status, error){
 
    
    
            console.log('Ошибка соединения с сервером (POST)');
            console.log('ajaxError xhr:', xhr); // выводим значения переменных
            console.log('ajaxError status:', status);
            console.log('ajaxError error:', error);
        });
        
        return false;
        
    });  
}


function show_post_new() 
{
    $('a.ajaxShowNew').one('click', function(){
        var content = $(this).attr('data-contentId');
        
        $.ajax({
            url:'phppostajax.php', 
            dataType: 'text',
            data: { ID: content},
            method: 'POST'
        })
        .done (function(obj){

            console.log('Ответ получен', obj);
            $('li.' + content).append(obj);
        })
        .fail(function(xhr, status, error){
 
    
    
            console.log('Ошибка соединения с сервером (POST)');
            console.log('ajaxError xhr:', xhr); // выводим значения переменных
            console.log('ajaxError status:', status);
            console.log('ajaxError error:', error);
        });
        
        return false;
        
    });  
}