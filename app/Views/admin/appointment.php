<?php echo $this->extend('layout/main') ?>
<?php echo $this->section('content') ?>
<link href="../assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
<link href="https://cdn.datatables.net/datetime/1.1.0/css/dataTables.dateTime.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('/public/dist/css/admin/appointment.css') ?>"/>
<input type="hidden" id="baseUrl" value="<?php echo base_url(); ?>">

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Appointment</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="dashboard" class="text-muted">Home</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Appointment</li>
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
                                    <h4 class="card-title">Appointment List</h4>
                                    <div class="">
                                        <button data-toggle="modal" data-target="#add-appointment"  class="btn btn-primary"><i class="fas fa-plus"></i>
                                                        Appointment</button>
                                    </div>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="col-md-3 pr-0">
                                        <div class="form-group">
                                            <label for="appt_date">From date:</label>
                                            <input type="text" class="form-control" id="min" name="min" >
                                        </div>
                                    </div>
                                    <div class="col-md-3  px-0">
                                        <div class="form-group">
                                            <label for="appt_date"> To date:</label>
                                            <input type="text" class="form-control" id="max" name="max" >
                                        </div>
                                    </div>
                                    <div class="col-md-1 d-flex align-items-end mb-3 pl-0">
                                         <button type="button" id="filter" class="btn waves-effect waves-light btn-primary  justify-self-center">Filter</button>

                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table id="appt_table" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Name</th>
                                                <th>Start time</th>
                                                <th>End time</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                         
                                        </tbody>
                                       
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
   
    </div>
    <div id="add-appointment" class="modal fade" tabindex="-1" role="dialog"  aria-modal="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <div class="modal-body">
                                               <h4 class="card-title">Add Appointment</h4>
                                                <form class="pl-3 pr-3" action="#">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="username">Patient Name
                                                                <select style="width: 100%" class="form-control patient-name" id="patient_id">
                                                                    <?php foreach($patientData as $patient): ?>
                                                                    <option value="<?php echo $patient['patient_id'] ?>"><?php echo $patient['first_name']. " " . $patient['last_name'] ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>    
                                                                </label>                                                                                         
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="appt_date">Date</label>
                                                                <input type="date" class="form-control" id="appt_date" name="appt_date" >
                                                            </div>
                                                        </div>  
                                                        <div class="col-md-6">              
                                                            <div class="form-group">
                                                                <label for="appt_start">Start Time</label>
                                                                <input type="time" class="form-control" id="appt_start" name="appt_start" >
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">   
                                                            <div class="form-group">
                                                                <label for="appt_end">End Time</label>
                                                                <input type="time" class="form-control" id="appt_end" name="appt_end" >
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <button type="button" id="save-appointment" class="btn waves-effect waves-light btn-success  justify-self-center">Save</button>
                                                        </div>
                                                    </div>                    
                                                </form>

                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div>
    <div id="edit-appt-modal" class="modal fade" tabindex="-1" role="dialog"  aria-modal="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <div class="modal-body">
                                               <h4 class="card-title">Edit Appointment</h4>
                                                <form class="pl-3 pr-3" action="#">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                            <div class="form-group">
                                                                <label for="appt_date">Patient Name</label>
                                                                <input disabled type="text" class="form-control" id="edit_appt_fullname" name="appt_date" >
                                                                <input id="edit_appt_id" type="hidden" value="">
                                                            </div>
                                                                </label>                                                                                         
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="appt_date">Date</label>
                                                                <input type="date" class="form-control" id="edit_appt_date" name="appt_date" >
                                                            </div>
                                                        </div>  
                                                        <div class="col-md-6">              
                                                            <div class="form-group">
                                                                <label for="appt_start">Start Time</label>
                                                                <input type="time" class="form-control" id="edit_appt_start" name="appt_start" >
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">   
                                                            <div class="form-group">
                                                                <label for="appt_end">End Time</label>
                                                                <input type="time" class="form-control" id="edit_appt_end" name="appt_end" >
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">   
                                                            <div class="form-group">
                                                                <label for="appt_end">Status</label>
                                                                <select class="form-control" id="edit_appt_status">
                                                                    <option value = 'not completed'>Not Completed</option>
                                                                    <option value = 'completed'>Completed</option>
                                                                    <option value = 'cancelled'>Cancelled</option>
                                                                </select>                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <button type="button" id="edit-appointment" class="btn waves-effect waves-light btn-success  justify-self-center">Save</button>
                                                        </div>
                                                    </div>                    
                                                </form>

                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div>
  
</div>
<? echo $this->endSection(); ?>