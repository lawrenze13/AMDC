var base_url = $('#baseUrl').val();
var table;
function validateForm(){
    var errorCount = 0;
    if($("#tooth_no").val().trim().length == 0){
        errorCount++;
        $('#invalidToothNo').remove();
        $("#tooth_no").addClass('is-invalid');
        $("#tooth_no").after("<div id='invalidToothNo' class='invalid-feedback'> Tooth No. is required.</div>");
    }else{
        $('#invalidToothNo').remove();
        $('#tooth_no').removeClass('is-invalid');
    }
    if($("#description").val().trim().length == 0){
        errorCount++;
        $('#invalidDescription').remove();
        $("#description").addClass('is-invalid');
        $("#description").after("<div id='invalidDescription' class='invalid-feedback'> Description is required.</div>");
    }else{
        $('#invalidDescription').remove();
        $('#description').removeClass('is-invalid');
    }
    if($("#amount").val().trim().length == 0){
        errorCount++;
        $('#invalidAmount').remove();
        $("#amount").addClass('is-invalid');
        $("#amount").after("<div id='invalidAmount' class='invalid-feedback'> Amount is required.</div>");
    }else{
        $('#invalidAmount').remove();
        $('#amount').removeClass('is-invalid');
    }
    if($("#transaction_date").val().trim().length == 0){
        errorCount++;
        $('#invalidTransaction_date').remove();
        $("#transaction_date").addClass('is-invalid');
        $("#transaction_date").after("<div id='invalidTransaction_date' class='invalid-feedback'> Transact Date is required.</div>");
    }else{
        $('#invalidTransaction_date').remove();
        $('#transaction_date').removeClass('is-invalid');
    }

    if(errorCount>0){
        return false;
    }else{
        return true;
    }
   
}
var externalDataRetrievedFromServer = [
    { name: 'Bartek', age: 34 },
    { name: 'John', age: 27 },
    { name: 'Elizabeth', age: 30 },
];



function buildTableBody(data, columns) {
    delete data['from_date'];
    delete data['to_date'];
    var body = [];
    console.log(data);
    console.log(columns);
    body.push(columns);
    var row = [];
    $.each(data, function (i, val) { 
        row.push({text: val['transaction_date'], alignment: 'center'});
        row.push({text: val['tooth_no'], alignment: 'center'});
        row.push({text: val['description'], alignment: 'center'});
        row.push({text: val['amount'], alignment: 'center'});
        row.push({text: '', alignment: 'center'});
        console.log(row);
        body.push(row);
        row = [];
    });

    return body;
}

function generatepdf(data){
    
    var table =function(data, columns) {
        return {
            table: {
                widths: [100, 80, '*', 100, 100],
                headerRows: 1,
                body: buildTableBody(data, columns)
            }
        };
    }
    var docDefinition = {
        content: [
            { 
                alignment: 'center',
                text: 'Agbing Magbuhos Dental Clinic',
                style: 'header',
                fontSize: 23,
                bold: true,
                margin: [0, 10],
            },
            {
                margin: [0, 0, 0, 10],
                layout: {
                    fillColor: function (rowIndex, node, columnIndex) {
                        return (rowIndex % 2 === 0) ? '#ebebeb' : '#f5f5f5';
                    }
                },
                table: {
                    widths: ['100%'],
                    heights: [20,10],
                    body: [
                        [
                            { 
                                text: 'Report: Transaction Report',
                                fontSize: 9,
                                bold: true,
                            }
                        ],
                        [
                            { 
                                text: 'Date: ' + data['from_date'] + ' - ' + data['to_date'],
                                fontSize: 9,
                                bold: true
                            }
                        ],
                    ],
                }
            },
            table(data, ['Date', 'Tooth No.', 'Description', 'Amount', 'Signature'])
           
        ]
    };
    var pdf = createPdf(docDefinition);
    pdf.download('PPRA.pdf');
    
}
function initialiseTable(){
    loadTransUrl = base_url + '/public/Admin/transaction/load_table';
    console.log(loadTransUrl);
    table =   $('#trans_table').DataTable( {
        responsive: true,
        ajax: {
            "url":  loadTransUrl, 
            "type": "POST",
            "dataSrc": ""
        },
    
                    "columns": [
                        { "data": "fullname" },
                        { "data": "tooth_no" },
                        { "data": "amount" },
                        { "data": "description" },
                        { "data": "transaction_date" },
                        {"render": actionlinks},
                    ],
       
    } );
    function actionlinks(data, type, full) {
     
        $('.delete-trans').on('click',function () { 
     
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
                    var transId = row.find(".trans-id").val();
                    console.log(transId);
                    var data = {
                         transId : transId  
                    };
                    $.ajax({
                        method  : 'POST',
                        url : base_url + '/public/Admin/transaction/delete',
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
                                initialiseTable();
                        }              
                  });
                }
              })
    
        });
      
        return '<input type="hidden" class="patient-id" value="'+full['patient_id']+'">' +
        '<input type="hidden" class="trans-id" value="'+full['trans_id']+'">' +
        '<button type="button" class="print-trans btn btn-info btn-circle"><i class="fa fa-print"></i></button>' +
        '<button type="button" id="delete-trans" class="btn btn-danger btn-circle delete-trans"><i class="fa fa-trash"></i></button>'
   
    }
}
$(function () {
    initialiseTable();
    $('#generate-report').click(function(){
        data = {
            from_date : $('#from_date').val(),
            to_date: $('#to_date').val()
        }
        $.ajax({
            method  : 'POST',
            url : base_url + '/public/Admin/transaction/generate_report',
            data    : data,
            success : function(response){
                console.log("success");
                    Swal.fire({
                        title: 'Success!',
                        text: response['status'],
                        icon: 'success',
                        confirmButtonText: 'Cool'
                    }).then( function() {
                        
                    });
                generatepdf(response);
                
            }              
      });
   });
    
    $('.patient-name').select2({
        width: 'resolve' 
    });

    $("#save-transaction").click(function () { 

        isValidate = validateForm();
        if(isValidate){
            var data = {
                'patient_id' : $('#patient_id').val(),
                'tooth_no' : $('#tooth_no').val(),
                'description' : $('#description').val(),
                'amount' : $('#amount').val(),
                'transaction_date' : $('#transaction_date').val(),
            }
            $.ajax({
                method  : 'POST',
                url : base_url + '/public/Admin/transaction/save',
                data    : data,
                success : function(response){
                    console.log("success");
                        Swal.fire({
                            title: 'Success!',
                            text: response['status'],
                            icon: 'success',
                            confirmButtonText: 'Cool'
                        }).then( function() {
                            table.destroy();
                            initialiseTable();
                        });
              
                    
                }              
          });
        }
    }); 
   
});