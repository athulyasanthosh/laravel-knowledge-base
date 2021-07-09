$(document).ready(function() {
    $('.like-btn').on('click', function() {
    	var id = $(this).data('id');    	
    	$.ajax({
        type:"post",
        url: "{{ route('home.voting') }}",
        
        data: { id : id, vote:'like' },
        headers: {
		    'X-CSRF-Token': '{{ csrf_token() }}',
		},
        success:function(data){
             location.reload();
        }
    });
    })
})