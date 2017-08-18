function addnew(urlpage,id,viewresult=""){
        
        $.ajax({
           type: "POST",
           url: urlpage,
           data: $('#'+id).serialize(), // serializes the form's elements.
           success: function(data)
           {
                
                // show response from the php script.
                if (viewresult==""){
                    console.log('ordinary succes Modal ');
                }
                else{
                    $('#'+viewresult).html(data);
                }
           },
           error:function(error){
               console.log('ahmed');
               console.log(error);
               Object.keys(error.responseJSON).forEach(function(key) {
                    $('#'+key).css('background','rgb(242, 159, 157)');

                });
           }
         });
}