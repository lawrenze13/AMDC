var base_url = $('#baseUrl').val();
var table;
var minDate, maxDate;
var ins= 0;

function validateForm(){
    var errorCount = 0;
    if($("#appt_date").val().trim().length == 0){
        errorCount++;
        $('#invalidAppt_date').remove();
        $("#appt_date").addClass('is-invalid');
        $("#appt_date").after("<div id='invalidAppt_date' class='invalid-feedback'> Date is required.</div>");
    }else{
        $('#invalidAppt_date').remove();
        $('#appt_date').removeClass('is-invalid');
    }
    if($("#appt_start").val().trim().length == 0){
        errorCount++;
        $('#invalidAppt_start').remove();
        $("#appt_start").addClass('is-invalid');
        $("#appt_start").after("<div id='invalidAppt_start' class='invalid-feedback'> Start time is required.</div>");
    }else{
        $('#invalidAppt_start').remove();
        $('#appt_start').removeClass('is-invalid');
    }
    if($("#appt_end").val().trim().length == 0){
        errorCount++;
        $('#invalidAppt_end').remove();
        $("#appt_end").addClass('is-invalid');
        $("#appt_end").after("<div id='invalidAppt_end' class='invalid-feedback'> End time is required.</div>");
    }else{
        $('#invalidAppt_end').remove();
        $('#appt_end').removeClass('is-invalid');
    }
    if(errorCount>0){
        return false;
    }else{
        return true;
    }
   
}
function initializeTable(){
    loadTransUrl = base_url + '/public/Admin/appointment/get_all';
    console.log(loadTransUrl);
    table =   $('#appt_table').DataTable( {
        responsive: true,
        ajax: {
            "url":  loadTransUrl, 
            "type": "POST",
            "dataSrc": ""
        },
    
                    "columns": [
                        { "data": "appt_date", "className": 'appt-date'},
                        { "data": "fullname", "className": 'fullname' },
                        { "data": "appt_start_con" },
                        { "data": "appt_end_con" },
                        { "data": "status" },
                        {"render": actionlinks},
                    ],
                    "order": [[0, "desc"]]
       
    } );
}

function actionlinks(data, type, full) {
    $('#appt_table tbody ').on('click','.cancel-appt ', function (){
        Swal.fire({
            title: 'Are you sure?',
            text: "You want to cancel this appointment?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Cancel it!'
          }).then((result) => {
            if (result.isConfirmed) {
                var row = $(this).closest("tr");
                var apptId = row.find(".appt-id").val();
                console.log(apptId);
                var data = {
                    appt_id : apptId  
                };
                $.ajax({
                    method  : 'POST',
                    url : base_url + '/public/Admin/appointment/cancel_appointment',
                    data    : data,
                    success : function(response){
                        console.log("success");
                            Swal.fire({
                                title: 'Success!',
                                text: response['status'],
                                icon: 'success',
                                confirmButtonText: 'Cool'
                            })
                            table.destroy();
                            initializeTable();
                    }              
              });
            }
          })   
    });
    $('#appt_table tbody ').on('click','.Delete ', function (){
        Swal.fire({
            title: 'Are you sure?',
            text: "You want to delete this appointment?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Delete it!'
          }).then((result) => {
            if (result.isConfirmed) {
                var row = $(this).closest("tr");
                var apptId = row.find(".appt-id").val();
                console.log(apptId);
                var data = {
                    appt_id : apptId  
                };
                $.ajax({
                    method  : 'POST',
                    url : base_url + '/public/Admin/appointment/delete_appointment',
                    data    : data,
                    success : function(response){
                        console.log("success");
                            Swal.fire({
                                title: 'Success!',
                                text: response['status'],
                                icon: 'success',
                                confirmButtonText: 'Cool'
                            })
                            table.destroy();
                            initializeTable();
                    }              
              });
            }
          })   
    });
    $('#appt_table tbody ').on('click', '.complete-appt', function (){
        Swal.fire({
            title: 'Are you sure?',
            text: "You want to mark this appointment as completed?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
          }).then((result) => {
            if (result.isConfirmed) {
                var row = $(this).closest("tr");
                var apptId = row.find(".appt-id").val();
                console.log(apptId);
                var data = {
                    appt_id : apptId  
                };
                $.ajax({
                    method  : 'POST',
                    url : base_url + '/public/Admin/appointment/complete_appointment',
                    data    : data,
                    success : function(response){
                        console.log("success");
                            Swal.fire({
                                title: 'Success!',
                                text: response['status'],
                                icon: 'success',
                                confirmButtonText: 'Cool'
                            });
                            table.destroy();
                            initializeTable();
                    }              
              });
            }
          })   
    });
    $('#appt_table tbody ').on('click','.edit-appt',function (){
        var row = $(this).closest("tr");
        var appt_id = row.find(".appt-id").val();
        var fullname = row.find(".appt-fullname").val();
        var appt_start = row.find(".appt-start").val();
        var appt_end = row.find(".appt-end").val();
        var appt_date = row.find("input.appt-date").val();
        var status = row.find(".appt-status").val();
        console.log(appt_date)
        $('#edit_appt_fullname').val(fullname);
        $('#edit_appt_start').val(appt_start);
        $('#edit_appt_end').val(appt_end);
        $('#edit_appt_date').val(appt_date);
        $('#edit_appt_id').val(appt_id);
        $('#edit_appt_status').val(status.toLowerCase());
        $('#edit-appt-modal').modal('show');
      
    });
    var disable_all = "";
    if(full['is_canceled'] == 'yes'){
        disable_all = "disabled"
        
    }
    if(full['is_completed'] == 'yes'){
        disable_all = "disabled"
    }
    return '<input type="hidden" class="patient-id " value="'+full['patient_id']+'">' +
    '<input type="hidden" class="appt-id" value="'+full['appt_id']+'">' +
    '<input type="hidden" class="appt-start" value="'+full['appt_start']+'">' +
    '<input type="hidden" class="appt-end" value="'+full['appt_end']+'">' +
    '<input type="hidden" class="appt-date" value="'+full['appt_date']+'">' +
    '<input type="hidden" class="appt-fullname" value="'+full['fullname']+'">' +
    '<input type="hidden" class="appt-status" value="'+full['status']+'">' +
    '<div class="btn-group">' +
   ' <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'+
       ' Actions'+
    '</button>'+
    '<div class="dropdown-menu">'+
        '<a type="button" class=" edit-appt dropdown-item" ><i class="fa fa-edit"></i> Edit</a>'+
        '<a type="button"  '+ disable_all+' class="cancel-appt dropdown-item" ><i class="fa fa-window-close"></i> Cancel</a>'+
       '<a type="button" '+ disable_all+' class="complete-appt dropdown-item" ><i class="fa fa-check"></i> Completed</a>'+
        '<div class="dropdown-divider"></div>'+
        '<a type="button"  class="dropdown-item Delete" ><i class="fa fa-trash"></i> Delete</a>'+
    '</div>'+
    '</div>'
    // '<button type="button" class=" edit-appt btn btn-info btn-sm btn-rounded"><i class="fa fa-edit"></i>Edit</button>' +
    // '<button type="button" '+ disable_all+' class=" cancel-appt btn btn-danger btn-sm btn-rounded"><i class="fa fa-window-close"></i>Cancel</button>' +
    // '<button type="button" '+ disable_all+' class=" btn btn-success btn-sm btn-rounded complete-appt"><i class="fa fa-check"></i>Completed</button>'+
    // '<button type="button"  class=" btn btn-danger btn-sm btn-rounded complete-appt"><i class="fa fa-trash"></i></button>'
}
function filter(){

}
$(function () {

  initializeTable();
  minDate = new DateTime($('#min'), {
    format: 'MMMM Do YYYY'
    });
    maxDate = new DateTime($('#max'), {
        format: 'MMMM Do YYYY'
    });
    $('#filter').click(function(){
        var min = $('#min').val();
        var max = $('#max').val();
        console.log(min);
        console.log(max);
        var not_validate = 0;
        if($('#min').val().length == 0){
            not_validate++
        }
        if($('#max').val().length == 0){
            not_validate++
        }
        if(not_validate!=0){

        }else{
            var loadTransUrl = base_url + '/public/Admin/appointment/filter';
            console.log(loadTransUrl);
            var data = {
                min : min,
                max: max
            }
            table.destroy();
            table =   $('#appt_table').DataTable( {
                responsive: true,
                ajax: {
                    "url":  loadTransUrl, 
                    "type": "POST",
                    "dataSrc": "",
                    'data': data,
                },
            
                            "columns": [
                                { "data": "appt_date", "className": 'appt-date'},
                                { "data": "fullname", "className": 'fullname' },
                                { "data": "appt_start_con" },
                                { "data": "appt_end_con" },
                                { "data": "status" },
                                {"render": actionlinks},
                            ],
                            "order": [[0, "desc"]]
               
            } );
        }

        
    });
  $('#edit-appointment').click(function(){
    var app_start = $('#edit_appt_start').val();
    var app_end = $('#edit_appt_end').val();
    var appt_date = $('#edit_appt_date').val();
    var appt_id = $('#edit_appt_id').val();
    var appt_status = $('#edit_appt_status').val();
    var data = {
        appt_id : appt_id,
        appt_start : app_start,
        appt_end : app_end,
        appt_status : appt_status,
        appt_date : appt_date,
    }
    $.ajax({
        method  : 'POST',
        url : base_url + '/public/Admin/appointment/edit_appointment',
        data    : data,
        success : function(response){
            console.log("success");
                Swal.fire({
                    title: 'Success!',
                    text: response['status'],
                    icon: 'success',
                    confirmButtonText: 'Okay'
                }).then( function() {
                    $('#edit_appt_start').val('');
                    $('#edit_appt_date').val('');
                    $('#edit_appt_end').val('');
                    $('#edit-appt-modal').modal('hide');  
                }); 
                table.destroy();
                initializeTable();
        }              
    });
    });
    $("#save-appointment").click(function () { 
        isValidate = validateForm();
        if(isValidate){
            var data = {
                'patient_id' : $('#patient_id').val(),
                'appt_date' : $('#appt_date').val(),
                'appt_start' : $('#appt_start').val(),
                'appt_end' : $('#appt_end').val(),
            }
            console.log(data);                                                                              
            $.ajax({
                method  : 'POST',
                url : base_url + '/public/Admin/calendar/save',
                data    : data,
                
                success : function(response){
                    console.log("success");
                        Swal.fire({
                            title: 'Success!',
                            text: response['status'],
                            icon: 'success',
                            confirmButtonText: 'Cool'
                        }).then( function() {
                            $('#appt_start').val('');
                            $('#appt_date').val('');
                            $('#appt_end').val('');
                            $('#add-appointment').modal('hide');  
                            table.destroy();
                            initializeTable();
                        }); 
                   
                }              
          });
        }
    }); 
});