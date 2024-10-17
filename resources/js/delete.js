$(function() {
    $('.delete').click(function(){
        Swal.fire({
            title: "Are you sure?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes",
            cancelButtonText: "No"
          }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    method: "DELETE",
                    url: deleteUrl + $(this).data("id"),
                })
                .done(function(response) {
                    window.location.reload();
                })
                .fail(function(data) {
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: data.responseJSON.message,
                        footer: data.responseJSON.status
                      });
                });
            }
          });
    });
});