<?php echo $this->extend('layout/main') ?>
<?php echo $this->section('content') ?>
<link href="<?php echo base_url() ?>/public/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
<link href="<?php echo base_url() ?>/public/assets/libs/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<input type="hidden" id="baseUrl" value="<?php echo base_url(); ?>">

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Calendar</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="dashboard" class="text-muted">Home</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Calendar</li>
                        </ol>
                    </nav>
                </div>
            </div>
          
        </div>
    </div>                         
    <div class="container-fluid">
         <div class="card border-right">
            <div class="card-body">
                <div class="row justify-content-between">
                    <h4 class="card-title">Appointments</h4>
                    <button data-toggle="modal" data-target="#add-appointment"  class="btn btn-primary"><i class="fas fa-plus"></i>
                                                Appointment</button>  
                </div>
                <div class="row">
                    <div class="col-lg-3 px-0">
                        <div class="row  d-flex justify-content-center">
                        <h4 class="card-title mr-2"><?php echo date('M d Y') ?></h4>
                            <div class="col-md-12">
                                <div id="calendar-day"></div>
                            </div>                     
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="card-body b-l calender-sidebar">
                            <div id="calendar-week"></div>
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
  
</div>
<? echo $this->endSection(); ?>