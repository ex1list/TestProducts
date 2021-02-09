$(function(){
    
console.log('Привет, это страый js ))');
    init_post_new(); // добавлены  новые функции
  
    

});



function init_post_new() 
{
    $('a.ajaxPOSTnew').one('click', function(){
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