<?php echo $this->extend('layout/main') ?>
<?php echo $this->section('content') ?>
<link href="../assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
<input type="hidden" id="baseUrl" value="<?php echo base_url(); ?>">
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Transactions</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="dashboard" class="text-muted">Home</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Transactions</li>
                        </ol>
                    </nav>
                </div>
            </div>
          
        </div>
    </div>                         
    <div class="container-fluid">
    <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row justify-content-between mb-3">
                                <h4 class="card-title">Transactions</h4>
                                <div>
                                <button data-toggle="modal" data-target="#signup-modal" class="btn btn-primary"><i class="fas fa-plus"></i>
                                                Transaction</button>
                                <button data-toggle="modal" data-target="#report-modal"  class="btn btn-primary"><i class="fas fa-notes-medical"></i>
                                                Report</button>    
                                </div>            
                                </div>
                                <div id="report-modal" class="modal fade" tabindex="-1" role="dialog"  aria-modal="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <div class="modal-body">
                                                 <h4 class="modal-title">Report Date Range</h4>
                                                    <form class="pl-3 pr-3" action="#">
                                                        <div class="form-group">
                                                            <label for="from_date">From:</label>
                                                            <input type="date" class="form-control" id="from_date" name="from_date" >
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="to_date">To:</label>
                                                            <input type="date" class="form-control" id="to_date" name="to_date" >
                                                        </div>
                                                        <div class="col">
                                                            <button type="button" id="generate-report" class="btn waves-effect waves-light btn-success  justify-self-center">Save</button>
                                                        </div>
                                                </form>

                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div>
                                <div id="signup-modal" class="modal fade" tabindex="-1" role="dialog"  aria-modal="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <div class="modal-body">
                                               

                                                <form class="pl-3 pr-3" action="#">

                                                    <div class="form-group">
                                                        <label for="username">Patient Name
                                                        <select style="width: 100%" class="form-control patient-name" id="patient_id">
                                                            <?php foreach($patientData as $patient): ?>
                                                            <option value="<?php echo $patient['patient_id'] ?>"><?php echo $patient['last_name']. ",  " . $patient['first_name'] ?></option>
                                                            <?php endforeach; ?>
                                                        </select>    

                                                        </label>                                                                                         
                                                    </div>
                                                        <div class="form-group">
                                                            <label for="tooth_no">Tooth No.</label>
                                                            <input type="text" class="form-control" id="tooth_no" name="tooth_no" >
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="todescriptionoth_no">Description</label>
                                                            <textarea class="form-control" rows="3"  id="description" name="description" ></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="amount">Amount</label>
                                                            <input type="number" class="form-control" id="amount" name="amount" >
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="transaction_date">Date Transact</label>
                                                            <input type="date" class="form-control" id="transaction_date" name="transaction_date" >
                                                        </div>
                                                        <div class="col">
                                                            <button type="button" id="save-transaction" class="btn waves-effect waves-light btn-success  justify-self-center">Save</button>
                                                        </div>

                                                </form>

                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div>
                                <div class="table-responsive">
                                    <table id="trans_table" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Tooth No.</th>
                                                <th>Description</th>
                                                <th>Amount</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                  <!-- <?php  //foreach($transactionData as $transaction):?> 
                                            <tr>
                                                <td><?php // echo $transaction['fullname'] ?></td>
                                                <td><?php // echo $transaction['tooth_no']  ?></td>
                                                <td><?php //echo $transaction['description'] ?></td>                                           
                                                <td><?php //echo $transaction['amount']  ?></td>
                                                <td><?php //echo $transaction['transaction_date']  ?></td>
                                                <td>
                                                    <input type="hidden" class="patient-id" value="<?php //echo $transaction['patient_id']  ?> ">
                                                    <input type="hidden" class="trans-id" value="<?php //echo $transaction['trans_id']  ?> ">
                                                    <button type="button" class="btn btn-info btn-circle"><i class="fa fa-print"></i></button>
                                                    <button type="button" id="delete-trans" class="btn btn-danger btn-circle delete-trans"><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>      
                                          <?php // endforeach; ?> -->
                                        </tbody>
                                      
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
   
    </div>
  
  
</div>
<? echo $this->endSection(); ?>