var base_url = $('#baseUrl').val();
var patient_id = $('#patient_id').val();
function validateForm(){
    var errorCount = 0;
   if($("#first_name").val().trim().length == 0){
        errorCount++;
        $('#invalidFirstName').remove();
        $("#first_name").addClass('is-invalid');
        $("#first_name").after("<div id='invalidFirstName' class='invalid-feedback'> First name is required.</div>");
    }else{
        $('#invalidFirstName').remove();
        $('#first_name').removeClass('is-invalid');
    }
    if($("#last_name").val().trim().length == 0){
        errorCount++;
        $('#invalidLastName').remove();
        $("#last_name").addClass('is-invalid');
        $("#last_name").after("<div id='invalidLastName' class='invalid-feedback'> Last name is required.</div>");
    }else{
        $('#invalidLastName').remove();
        $('#last_name').removeClass('is-invalid');
    }
    if(errorCount>0){
        return false;
    }else{
        return true;
    }
   
}
function readURL(){
	var file = document.getElementById("getval").files[0];
		var reader = new FileReader();
		reader.onloadend = function(){
			document.getElementById('profile-upload').style.backgroundImage = "url(" + reader.result + ")";        
		}
		  if(file){
			reader.readAsDataURL(file);
		}else{
		}
			var fd = new FormData();
			fd.append('file', file);
            fd.append('patient_id', patient_id);
            console.log(fd);
            $.ajax({
                method  : 'POST',
                url : base_url + '/public/Admin/patient/upload_profile_pic',
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

document.getElementById('getval').addEventListener('change', readURL, true);
$(function () {


   $(".edit-info").click(function () { 
        $('#first_name').prop("disabled", false); 
        $('#last_name').prop("disabled", false); 
        $('#birthdate').prop("disabled", false); 
        $('#email').prop("disabled", false); 
        $('#contact').prop("disabled", false); 
        $('#address').prop("disabled", false); 
        $('.update-profile').prop("disabled", false);
		  $('#middle_initial').prop("disabled", false);
   }); 
   
   $(".update-profile").click(function () { 
        isValidate = validateForm();
        if(isValidate){
            var data = {
				'patient_id' : $('#patient_id').val(),
				'first_name' : $('#first_name').val(),
                'last_name' : $('#last_name').val(),
				 'middle_initial' : $('#middle_initial').val(),
                'birthdate' : $('#birthdate').val(),
                'contact' : $('#contact').val(),
                'address' : $('#address').val(),
            }
            console.log(data);                                                                              
            $.ajax({
                method  : 'POST',
                url : base_url + '/public/Admin/patient/update',
                data    : data,
                
                success : function(response){
                    console.log("success");
                        Swal.fire({
                            title: 'Success!',
                            text: response['status'],
                            icon: 'success',
                            confirmButtonText: 'Cool'
                        }).then( function() {
								location.reload();
                        }); 
                   
                }              
          });
        }
    }); 
   
});