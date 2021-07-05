$(document).ready(function(){
    var _token = $('input[name="_token"]').val();
    $(document).on("click",'.action-delete', function(e){
        e.stopPropagation();
        var article_id= $(this).data('id');
        var url = $(this).data('url');
        swal({
            title: "Do you want to delete?",
            type: "error",
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes!",
            showCancelButton: true,
        },
        function() {
            $.ajax({
            url: url,
            type: "DELETE",
            data: {article_id:article_id, _token:_token},
            success: function(dataResult){
                if(dataResult.status == "ok"){
                    $('#response-message').removeClass('d-none').html("<div class='alert alert-success alert-dismissible'><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button><p>"+dataResult.data+"</p></div>");
                    $('#article_'+article_id).addClass('d-none');
                }
                else{
                    $('#response-message').removeClass('d-none').html("<div class='alert alert-danger alert-dismissible'><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button><p>"+dataResult.data+"</p></div>");
                }
            }
            });
        });
    });
});  