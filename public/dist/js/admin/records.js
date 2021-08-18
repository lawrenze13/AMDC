var base_url = $('#baseUrl').val();
var patient_id = $('#patient_id').val();
console.log(patient_id);
function isValidated(){
    var file = $('#file-upload')[0].files[0];
    var note = $('#note').val();
    var valid = true;
    if(file.length == 0){
        return false;
    }else if(note.length == 0){
        return false;
    }else{
        return true;
    }
}
function buildGallery(data){
    $('.gallery').empty();
    $.each(data, function (i, val) { 
        console.log(encodeURI(val['photo_url']) );
        $( ".gallery" ).append( 
           '<div class="col-lg-3 col-md-6">' +
                '<div class="card gallery-box">' +
                    '<img class="card-img-top image-gallery img-fluid" src="'+ base_url+'/public/uploads/'+ val['patient_id']+ '/' + encodeURI(val['photo_url']) +'" alt="Card image cap">' +
                    '<div class="card-body">' +
                        '<h5 class="card-title">'+val['photo_url']+'</h5>' +
                        '<p class="card-text">'+val['notes']+'</p>' +
                        '<div class="row justify-content-center">' +
                            '<input type="hidden" id="photo_id" class="photo_id" value="'+val['photo_id']+'"/>' +
                            '<button type="button" class="view-record btn btn-sm btn-rounded btn-success"><i class="fas fa-eye"></i></button>  ' +
                            '<a  href="'+ base_url+'/public/uploads/'+ val['patient_id']+ '/' + encodeURI(val['photo_url']) +'"  download="'+val['photo_url']+'" class="download-record btn btn-sm btn-rounded btn-info ml-2"><i class="fas fa-download"></i></a>  ' +
                            '<button type="button" class="delete-record btn btn-sm btn-rounded btn-danger ml-2"><i class="fas fa-trash"></i></button>  ' +
                        '</div>' +
                    '</div>' +
                '</div>' +
            '</div>' 
        );
    });
    $('.lightbox').append(
        ' <div id="image-viewer">' +
        '<span class="close">&times;</span>'+
        '<img class="modal-content" id="full-image">'+
        '</div>'
    );
    $('.view-record').click(function(){
        var src = $(this).closest('.gallery-box').find('img.image-gallery').attr('src'); 
        console.log(src);
        $("#full-image").attr("src", src);
        $('#image-viewer').show();
        $('#image-viewer').addClass('in-front');
    });

    $("#image-viewer .close").click(function(){
          $('#image-viewer').hide();
        });

    $(".delete-record").click(function () { 
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
                var photo_id = $(this).closest('div.row').find('input.photo_id').val();
                var data = {
                    photo_id : photo_id  
                };
                $.ajax({
                    method  : 'POST',
                    url : base_url + '/public/Admin/patient_photos/delete',
                    data    : data,
                    success : function(response){
                        console.log("success");
                            Swal.fire({
                                title: 'Success!',
                                text: response['status'],
                                icon: 'success',
                                confirmButtonText: 'Okay'
                            });
                            get_records();
                    }              
              });
            }
          })
      });  
     

}
function get_records(){
    var data = {
        patient_id : patient_id
    }
    $.ajax({
        method  : 'POST',
        url : base_url + '/public/Admin/patient_photos/get_records',
        data    : data,
        success : function(response){
            buildGallery(response['patientData']);
        }              
  });
}
$(function () {
    $('#image-viewer').hide();
    get_records();
    $('#file-upload').change(function() {
        var i = $(this).prev('label').clone();
        var fileName = $('#file-upload')[0].files[0].name;
        $('.custom-file-label').text(fileName);
        var file = $('#file-upload')[0].files[0];
      
      });
    $('#save-record').click(function(){
        var validate = isValidated();
        if(validate){
            var note = $('#note').val();
            var file = $('#file-upload')[0].files[0];
            var fd = new FormData();
            fd.append('file', file);
            fd.append('note', note);
            fd.append('patient_id', patient_id);
            data = {
                file : file,
                note : note
            }
            console.log(data);
            $.ajax({
                method  : 'POST',
                url : base_url + '/public/Admin/patient_photos/save_record',
                data    : fd,
                processData: false,
                contentType: false,
                success : function(response){
                    if(response['success'].length > 0 ){
                        console.log("success");
                        Swal.fire({
                            title: 'Success!',
                            text: response['success'],
                            icon: 'success',
                            confirmButtonText: 'Okay'
                        }).then( function() {
                            $('#add-record-modal').modal('hide');
                            get_records();
                        });
                    }else{
                        console.log("error");
                        Swal.fire({
                            title: 'Error!',
                            text: response['error'],
                            icon: 'error',
                            confirmButtonText: 'Cool'
                        }).then( function() {
                           
                        });
                    }
                    
                }              
          });
        }
    });

});