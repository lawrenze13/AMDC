var base_url = $('#baseUrl').val();
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
    // if($("#birthdate").val().trim().length == 0){
    //     errorCount++;
    //     $('#invalidBirthdate').remove();
    //     $("#birthdate").addClass('is-invalid');
    //     $("#birthdate").after("<div id='invalidBirthdate' class='invalid-feedback'> Birthdate is required.</div>");
    // }else{
    //     $('#invalidBirthdate').remove();
    //     $('#birthdate').removeClass('is-invalid');
    // }
   
    // if($("#contact").val().trim().length == 0){
    //     errorCount++;
    //     $('#invalidContact').remove();
    //     $("#contact").addClass('is-invalid');
    //     $("#contact").after("<div id='invalidContact' class='invalid-feedback'> Contact is required.</div>");
    // }else{
    //     $('#invalidContact').remove();
    //     $('#contact').removeClass('is-invalid');
    // }
    // if($("#address").val().trim().length == 0){
    //     errorCount++;
    //     $('#invalidAddress').remove();
    //     $("#address").addClass('is-invalid');
    //     $("#address").after("<div id='invalidAddress' class='invalid-feedback'> Address is required.</div>");
    // }else{
    //     $('#invalidAddress').remove();
    //     $('#address').removeClass('is-invalid');
    // }

    if(errorCount>0){
        return false;
    }else{
        return true;
    }
   
}
$(function () {
    console.log(base_url);
    $("#save-patient").click(function (e) { 
        e.preventDefault();
        isValidate = validateForm();
        if(isValidate){
            var sex = $('input[name="sexRadio"]:checked').val();
            console.log(sex)
            var data = {
                'first_name' : $('#first_name').val(),
                'last_name' : $('#last_name').val(),
				 'middle_initial' : $('#middle_initial').val(),
                'birthdate' : $('#birthdate').val(),
                'sex' : sex,
                'email' : $('#email').val(),
                'contact' : $('#contact').val(),
                'address' : $('#address').val(),
            }
            $.ajax({
                method  : 'POST',
                url : base_url + '/public/Admin/patient/save',
                data    : data,
                success : function(response){
                    console.log("success");
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
        $(this).prop('disabled', true);
    }); 

});