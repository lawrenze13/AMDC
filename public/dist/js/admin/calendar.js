var base_url = $('#baseUrl').val();
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

function initialiseToday(){
    $.ajax({
        method  : 'POST',
        url : base_url + '/public/Admin/calendar/get_today',
        success : function(response){
            console.log("response");
            var event = []
            $.each(response, function( i, val ) {
                var title = val['fullname'];
                var startstr = val['appt_date'] + ' ' + val['appt_start'];
                var start = new Date(startstr);
                var endstr = val['appt_date'] + ' ' + val['appt_end'];
                var end = new Date(startstr);
                var bg = 'bg-info'
                if(val['is_canceled'] == 'yes'){
                    bg = 'bg-danger'
                }
                if(val['is_completed'] == 'yes'){
                    bg = 'bg-success'
                }
                var e = { 
                    title : title,
                    start : start,
                    end : end,
                    className: bg,
                    allDay: false
                }
                event.push(e);
              });
              console.log(event);
              $('#calendar-day').fullCalendar({
                defaultView: 'agendaDay',
                height: 'auto',
                events: event,
                eventLimit: true, // allow "more" link when too many events
                selectable: true,
                select: function(start, end, allDay) { $this.onSelect(start, end, allDay); },
                minTime: '07:00:00',
                maxTime: '22:00:00',
                // eventClick: ,
              });
              $('#calendar-day .fc-toolbar').remove();
        }              
  });
}
function initialiseAll(){
    $.ajax({
        method  : 'POST',
        url : base_url + '/public/Admin/calendar/get_all',
        success : function(response){
            console.log("response");
            var event = []
            $.each(response, function( i, val ) {
                var title = val['fullname'];
                var startstr = val['appt_date'] + ' ' + val['appt_start'];
                var start = new Date(startstr);
                var endstr = val['appt_date'] + ' ' + val['appt_end'];
                var end = new Date(startstr);
                var bg = 'bg-info'
                if(val['is_canceled'] == 'yes'){
                    bg = 'bg-danger'
                }
                if(val['is_completed'] == 'yes'){
                    bg = 'bg-success'
                }
                var e = { 
                    title : title,
                    start : start,
                    end : end,
                    className: bg,
                    allDay: false
                }
                event.push(e);
              });
              console.log(event);
              $('#calendar-week').fullCalendar({
                defaultView: 'agendaWeek',
                events: event,
                eventLimit: true, // allow "more" link when too many events
                selectable: true,
                select: function(start, end, allDay) { $this.onSelect(start, end, allDay); },
                minTime: '07:00:00',
                maxTime: '22:00:00',
              });
              $('#calendar-day .fc-toolbar').remove();
        }              
  });
}
function refetchCalendar(){
    $('#calendar-day').fullCalendar('destroy');
    $('#calendar-day').empty();
    $('#calendar-week').fullCalendar('destroy');
    $('#calendar-week').empty();
    initialiseAll();
    initialiseToday();
 
}
$(function () {

    initialiseAll();
    initialiseToday();
    
    $("#save-appointment").click(function () { 
        isValidate = validateForm();
        if(isValidate){
            var data = {
                'patient_id' : $('#patient_id').val(),
                'appt_date' : $('#appt_date').val(),
                'appt_start' : $('#appt_start').val(),
                'appt_end' : $('#appt_end').val(),
            }
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
                            refetchCalendar(response);
                        }); 
                }              
          });
        }
    }); 
});