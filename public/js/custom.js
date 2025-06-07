
    // $("#searchtour").keyup(function(){
    //     $('.row.d-flex').html(
    //         ''+
    //         '<div class="blog-entry justify-content-end">'+
    //         '<div class="text pt-4">'+
    //         '<h3 class="heading mt-2"> '+
    //         'No refulst No results found'+
    //         '</h3>'+
    //         '</div>'+
    //         '</div>' 
    //         + ''
    //     );
    //     console.log('okay');
    // });
 





tourdel = (id, t) =>{
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        /*------------------------------------------
        --------------------------------------------
        When click user on Delete Button
        --------------------------------------------
        --------------------------------------------*/

            if (confirm("Are you sure you want to delete this Tour?") == true) {
                $.ajax({
                    url: "/tours/"+id,
                    type: 'DELETE',
                    dataType: 'json',
                    success: function(data) {
                        $tr= $(t).closest("tr");

                    
                        $tr.find('td').fadeOut(700, function () {
                            $tr.remove();    
                        });
                        $('.messagealert').text(data.success);                       
                        console.log(data);
                    }
                });
            }
                
       
}



cardelete = (id, t) =>{
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        /*------------------------------------------
        --------------------------------------------
        When click user on Delete Button
        --------------------------------------------
        --------------------------------------------*/

            if (confirm("Are you sure you want to delete this Car?") == true) {
                
                $.ajax({
                    url: '/cardelete/'+id,
                    type: 'DELETE',
                    dataType: 'json',
                    success: function(data) {
                        // $tr= $(t).closest("div");

                    
                        // $tr.find('#car'+id).fadeOut(700, function () {
                        //     $tr.remove();    
                        // });
                        $("#car"+id).fadeToggle(500, "swing",function(){
                        this.remove();
                        });
                        $('.messagealert').text(data.success);                       
                        console.log(data);
                    }
                });
                
            }                
}

setavailable = (id, book_status) => {
    
    var message = '';
    if(book_status == 1){
        message = 'Are you sure you want to set to available';
    }
    else{
        message = 'Are you sure you want to set to not available';
    }
    
     $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        /*------------------------------------------
        --------------------------------------------
        When click user on Delete Button
        --------------------------------------------
        --------------------------------------------*/

            if (confirm(message) == true) {
               var id = id;
               var book_status = book_status;
                $.ajax({
                    method:'POST',
                     url: adminUrl+"/car/update/"+id,  
                    dataType: 'JSON',
                    data: {id,book_status},
                    success: function(data) {
                        $('.messagealert').text(data.success);                       
                        console.log(data);
                    }
                });
                
        }              
}

