var base_url = $('#baseUrl').val();
$(function () {
  
    $('#zero_config').DataTable({
     });
     $('#zero_config tbody').on("click",".delete-patient", function(){
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true, 
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.isConfirmed) {
                var row = $(this).closest("tr");
                var patientId = row.find(".patient-id").val();
                console.log(patientId);
                var data = {
                    patientId : patientId  
                };
                $.ajax({
                    method  : 'POST',
                    url : base_url + '/public/Admin/patient/delete',
                    data    : data,
                    success : function(response){
                        console.log("success");
                        console.log(response['query ']);
                            Swal.fire({
                                title: 'Success!',
                                text: response['status'],
                                icon: 'success',
                                confirmButtonText: 'Cool'
                            }).then( function() {
                                window.location = base_url + '/public/Admin/patient'
                            });
                    }              
              });
            }
          })


     });
    $('.delete-patient').on('click', function(){
         
    });


});
