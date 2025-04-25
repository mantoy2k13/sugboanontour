
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

