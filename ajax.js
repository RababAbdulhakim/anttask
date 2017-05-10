/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(function () {
    $('#submit').click(function (e) {
         e.preventDefault();
      
 
           var sum= $('#sum').val();
           var file=  $('#fileUpload').val();
           var table=   $('#table').val();
            var id=  $('#id').val();
               var data=[sum,file,table,id];
        $.ajax({
            type: 'POST',
            url: 'insert.php',
            data:data,
            success: function (data) {
              
                $(".loadajax").load(data);
            }
        });
       
    });


});