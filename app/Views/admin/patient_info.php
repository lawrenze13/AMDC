<?php echo $this->extend('layout/main') ?>
<?php echo $this->section('content') ?>
<link href="../assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
<link href="<?php echo base_url('/public/dist/css/admin/patient.css') ?> "  rel="stylesheet">
<input type="hidden" id="baseUrl" value="<?php echo base_url(); ?>">
<input type="hidden" id="patient_id" value="<?php echo $patientData[0]['patient_id']; ?>">
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Patient Info</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="public/patient" class="text-muted">Patient</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Patient Info</li>
                        </ol>
                    </nav>
                </div>
            </div>
          
        </div>
    </div>                         
    <div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Personal Information</h4>
            <div class="row">
                <div class="col-md-4 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
					<div id='profile-upload' style="background-image : url(<?php echo base_url('/public/uploads/profile_pic') . '/' . $patientData[0]['photo_url'] ?>)">
						<div class="hvr-profile-img">
						<input type="file" name="logo" id='getval'  class="upload w180" title="Dimensions 180 X 180" ></div>
						<i class="fa fa-camera"></i>
					  </div> 

					<!--<img class="rounded-circle mt-5" src="">-->
						<span class="font-weight-bold"><?php echo $patientData[0]['last_name'] . ',  ' .$patientData[0]['first_name'] . ',  ' .$patientData[0]['middle_initial']   ?></span>
						<span class="text-black-50"><?php echo $patientData[0]['contact']  ?></span><span> </span></div>
                </div>
                <div class="col-md-8 border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center justify-content-between mb-3">
                            <h4 class="text-right">Profile Settings</h4>
                            <button type="button" class="btn btn-primary btn-sm btn-rounded edit-info"><i class="fas fa-edit"></i> Edit Info</button>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="first_name">First Name</label>
                                    <input type="text" class="form-control" id="first_name" name="first_name"  placeholder="Enter First Name" value="<?php echo $patientData[0]['first_name']?>" disabled>
                                </div>  
                            </div>
							   <div class="col-md-2">
                                <div class="form-group">
                                    <label for="last_name">Middle I.</label>
                                    <input type="text" class="form-control" id="middle_initial" name="middle_initial"  maxlength="1"  placeholder="Enter Middle Initial" value="<?php echo $patientData[0]['middle_initial']?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name"  placeholder="Enter Last Name" value="<?php echo $patientData[0]['last_name']?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label for="birthdate">Birthdate</label>
                                    <input type="date" class="form-control" id="birthdate" name="birthdate" value="<?php echo $patientData[0]['birthdate']?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-6 d-none">
                                <div class="form-group">
                                    <label for="birthdate">Sex</label>
                                    <div class="row">
                                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                            <input type="radio" class="btn-check sex" name="sexRadio" id="btnradio1" autocomplete="off" value="Male" <?php if($patientData[0]['sex']=="Male") echo 'checked'?>>
                                            <label class="btn btn-outline-primary" for="btnradio1">Male</label>

                                            <input type="radio" class="btn-check sex" name="sexRadio" id="btnradio2" autocomplete="off" value="Female" <?php if($patientData[0]['sex']=="Female") echo 'checked'?>>
                                            <label class="btn btn-outline-primary" for="btnradio2">Female</label>
                                        </div>
                                    </div>                   
                                </div>
                            </div>
                            <div class="col-md-6 d-none ">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $patientData[0]['email']?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="contact">Contact No.</label>
                                    <input type="contact" class="form-control" id="contact" name="contact" value="<?php echo $patientData[0]['contact']?>" disabled>
                                </div>
                            </div>
                            <div class="col-12 ">
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="address" class="form-control" id="address" name="address" value="<?php echo $patientData[0]['address']?>" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="mt-5 text-center"><button class="btn btn-primary update-profile" type="button" disabled>Save Profile</button></div>
                    </div>
                </div>
                <div class="col-md-4 border-top border-right">
                    <div class="pt-4">
                        <button type="button" class="btn btn-primary btn-lg btn-block btn-rounded edit-info"><i class="fas fa-calendar-alt"></i> Appointments</button>
                        <button type="button" class="btn btn-primary btn-lg btn-block btn-rounded edit-info"><i class="fas fa-file-image"></i> Patient Photos</button>
                        <button type="button" class="btn btn-primary btn-lg btn-block btn-rounded edit-info"><i class="fas fa-money-bill-alt"></i> Transactions</button>
                        <button type="button" class="btn btn-primary btn-lg btn-block btn-rounded edit-info"><i class="fas fa-notes-medical"></i> Medical History</button>

                    </div>
                </div>
                <div class="col-md-8 border-top border-right">
                 <h4 class="card-title mt-3">Recent Transactions</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Tooth No.</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Date</th>
                                </tr>
                            </thead>
                            <?php foreach($transData as $trans):?>
                                            <tr>
                                                <td><?php echo $trans['tooth_no']?></td>
                                                <td><?php echo $trans['description'] ?></td>
                                                <td><?php echo $trans['amount'] ?></td>
                                                <td><?php echo $trans['transaction_date'] ?></td>
                                            </tr>      
                                          <?php endforeach; ?>
                            <tbody>
                                            
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