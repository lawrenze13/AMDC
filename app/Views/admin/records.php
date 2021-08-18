<?php echo $this->extend('layout/main') ?>
<?php echo $this->section('content') ?>
<input type="hidden" id="baseUrl" value="<?php echo base_url(); ?>">
<link rel="stylesheet" type="text/css" href="https://unpkg.com/file-upload-with-preview@4.1.0/dist/file-upload-with-preview.min.css"/>
<link rel="stylesheet" type="text/css" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('/public/dist/css/admin/records.css') ?>"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('/public/dist/css/lightbox/master.css') ?>"/>
<input type="hidden" id="patient_id" value="<?php echo $patientData[0]['patient_id']; ?>">
<div class="page-wrapper">
   
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Records</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="dashboard" class="text-muted">Patient Photos</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Records</li>
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
                            <h4 class="card-title"><?php echo $patientData[0]['last_name'] . ', ' . $patientData[0]['first_name'] ?></h4>
                            <button data-toggle="modal" data-target="#add-record-modal"  class="btn btn-primary"><i class="fas fa-plus"></i>
                                                Photo</button>    
                        </div>
                        <div class="row mt-3 gallery">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="add-record-modal" class="modal fade" tabindex="-1" role="dialog"  aria-modal="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body">  
                                                <h4 class="card-title">Add Patient Record</h4>                      
                                                <form class="pl-3 pr-3" action="#">
                                                       <div class="row">
                                                           <div class="col-12">
                                                                <div class="form-group">
                                                                    <div class="custom-file">
                                                                        <input type="file" class="custom-file-input" id="file-upload" accept="image/x-png,image/gif,image/jpeg">
                                                                        <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                                                                    </div>
                                                                </div>
                                                                <div class="file-preview">

                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="todescriptionoth_no">Note:</label>
                                                                    <textarea class="form-control" rows="3"  id="note" name="note" ></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 border-top pt-3">
                                                                <button type="button" id="save-record" class="btn waves-effect waves-light btn-success  justify-self-center">Save</button>
                                                            </div>
                                                        </div>

                                                </form>

                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div>
  
</div>
<? echo $this->endSection(); ?>