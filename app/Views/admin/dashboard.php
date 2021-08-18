
<?php echo $this->extend('layout/main') ?>
<?php echo $this->section('content') ?>
<link href="../assets/extra-libs/c3/c3.min.css" rel="stylesheet">
<link href="../assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">



<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Dashboard</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item text-muted active" aria-current="page">Dashboard</li>
                        </ol>
                    </nav>
                </div>
            </div>
          
        </div>
    </div>
    <div class="container-fluid">
        <!---------------------------------->
        <!-- APPOINTMENT AND PATIENT CARD -->
        <!---------------------------------->
        <div class="row">
            <div class="col-md-6">
                <div class="card-group">
                    <div class="card border-right">
                        <div class="card-body">
                            <h5 class="card-title">Patients</h5>
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                    <div class="d-inline-flex align-items-center">
                                        <h2 class="text-dark mb-1 font-weight-medium"><?php echo $patientCount ?></h2>
                                        <span class="badge bg-primary font-12 text-white font-weight-medium badge-pill ml-2 d-lg-block d-md-none">+18.33%</span>
                                    </div>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">New Patients this month</h6>
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-muted"><i data-feather="user-plus"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card border-right">
                        <div class="card-body">
                            <h5 class="card-title">Patients</h5>
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                    <div class="d-inline-flex align-items-center">
                                        <h2 class="text-dark mb-1 font-weight-medium"><?php echo $patientCount ?></h2>
                                    </div>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Patients</h6>
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-muted"><i data-feather="user-plus"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-group">
                    <div class="card border-right">
                       
                        <div class="card-body">
                            <h5 class="card-title">Appointments</h5>
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                    <div class="d-inline-flex align-items-center">
                                        <h2 class="text-dark mb-1 font-weight-medium">1</h2>
                                        <span class="badge bg-primary font-12 text-white font-weight-medium badge-pill ml-2 d-lg-block d-md-none">+18.33%</span>
                                    </div>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Today</h6>
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-muted"><i data-feather="user-plus"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card border-right">
                        <div class="card-body">
                            <h5 class="card-title">Appointments</h5>
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                    <div class="d-inline-flex align-items-center">
                                        <h2 class="text-dark mb-1 font-weight-medium">19</h2>
                                    </div>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Upcomming</h6>
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-muted"><i data-feather="user-plus"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!---------------------------------->
        <!-- APPOINTMENT AND PATIENT CARD -->
        <!---------------------------------->

        <!-------------->
        <!-- SALES ROW-->
        <!-------------->
        <div class="row">
            <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Total Sales</h4>
                    <div id="campaign-v2" class="mt-2" style="height:283px; width:100%;"></div>
                        <ul class="list-style-none mb-0">
                            <li>
                                <i class="fas fa-circle text-primary font-10 mr-2"></i>
                                <span class="text-muted">Direct Sales</span>
                                <span class="text-dark float-right font-weight-medium">$2346</span>
                            </li>
                            <li class="mt-3">
                                <i class="fas fa-circle text-danger font-10 mr-2"></i>
                                <span class="text-muted">Referral Sales</span>
                                <span class="text-dark float-right font-weight-medium">$2108</span>
                            </li>
                            <li class="mt-3">
                                <i class="fas fa-circle text-cyan font-10 mr-2"></i>
                                <span class="text-muted">Affiliate Sales</span>
                                <span class="text-dark float-right font-weight-medium">$1204</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Latest Transaction</h4>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">First</th>
                                                <th scope="col">Last</th>
                                                <th scope="col">Handle</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Mark</td>
                                                <td>Otto</td>
                                                <td>@mdo</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>Jacob</td>
                                                <td>Thornton</td>
                                                <td>@fat</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td>Larry</td>
                                                <td>the Bird</td>
                                                <td>@twitter</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">4</th>
                                                <td>Jerick</td>
                                                <td>Jones</td>
                                                <td>@twitter</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">5</th>
                                                <td>Lawrence</td>
                                                <td>Kim</td>
                                                <td>@twitter</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">6</th>
                                                <td>Angel</td>
                                                <td>Tix</td>
                                                <td>@twitter</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                </div>
            </div>   
        </div>
        <!-------------->
        <!-- SALES ROW-->
        <!-------------->
       
    </div>
  
  
</div>
<? echo $this->endSection(); ?>