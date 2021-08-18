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
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Patient</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="dashboard" class="text-muted">Home</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Patient</li>
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
                                <h4 class="card-title">Patient list</h4>
                                <a href="<?php echo base_url('public/Admin/patient/add_patient') ?>" class="btn btn-primary"><i class="fas fa-plus"></i>
                                                Patient</a>
                                </div>
                                
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Age</th>
                                             <!--   <th>Sex</th>-->
                                                <th>Contact No.</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php foreach($patientData as $patient):?>
                                            <tr>
                                                <td><?php echo  $patient['last_name']  . ', ' . $patient['first_name'] . ', ' .  $patient['middle_initial'] ?></td>
                                                <td><?php $d = strtotime($patient['birthdate'] ); echo date('m-d-Y', $d);?></td>
                                         <!--      <td><?php //echo $patient['sex'] ?></td> -->
                                                <td><?php echo $patient['contact'] ?></td>
                                                <td>
                                                    <input type="hidden" class="patient-id" value="<?php echo $patient['patient_id'] ?>">
                                                    <a href="<?php echo base_url() ?>/public/admin/patient/patient_info/<?php echo $patient['patient_id'] ?>" class="btn btn-primary btn-sm btn-rounded"><i class="fas fa-eye"></i> View More</a>
                                                    <button type="button" id="delete-patient" class="btn btn-danger btn-circle delete-patient"><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>      
                                          <?php endforeach; ?>
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