<?php echo $this->extend('layout/main') ?>
<?php echo $this->section('content') ?>
<input type="hidden" id="baseUrl" value="<?php echo base_url(); ?>">
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Add Patient</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('public/Admin/patient') ?>" class="text-muted">Patient</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Add Patient</li>
                        </ol>
                    </nav>
                </div>
            </div>
          
        </div>
    </div>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body collapse show">
                <h4 class="card-title">Add patient form</h4>
                <form id="addPatientForm" action="">
                <div class="row p-3">
                    
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" class="form-control" id="last_name" name="last_name"  placeholder="Enter Last Name">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="first_name">Middle Initial</label>
                        <input type="text" class="form-control" id="middle_initial" name="middle_initial"  placeholder="Enter Middle Initial" maxlength="1">
                    </div>  
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" class="form-control" id="first_name" name="first_name"  placeholder="Enter First Name" required>
                        </div>  
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="birthdate">Birthdate</label>
                            <input type="date" class="form-control" id="birthdate" name="birthdate" >
                        </div>
                    </div>
                    <div class="col-md-6 d-none">
                        <div class="form-group">
                            <label for="birthdate">Sex</label>
                            <div class="row">
                                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                    <input type="radio" class="btn-check sex" name="sexRadio" id="btnradio1" autocomplete="off" value="Male" >
                                    <label class="btn btn-outline-primary" for="btnradio1">Male</label>

                                    <input type="radio" class="btn-check sex" name="sexRadio" id="btnradio2" autocomplete="off" value="Female">
                                    <label class="btn btn-outline-primary" for="btnradio2">Female</label>
                                </div>
                            </div>                   
                        </div>
                    </div>
                    <div class="col-md-6 d-none">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="contact">Contact No.</label>
                            <input type="contact" class="form-control" id="contact" name="contact" >
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="address" class="form-control" id="address" name="address" >
                        </div>
                    </div>
                    <div class="col">
                        <button type="button" id="save-patient" class="btn waves-effect waves-light btn-success">Save</button>
                    </div>
                   
                </div>
                </form>
              </div>
            
         </div>
    </div> 
  
  
</div>
<? echo $this->endSection(); ?>