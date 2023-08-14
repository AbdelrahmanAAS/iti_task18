<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
  <?php include 'header.php'; ?>
  <link href="assets/css/dataTables.bootstrap4.css" rel="stylesheet" />
</head>

<body>

  <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">

    <?php include "head.php" ?>

    <aside class="left-sidebar" data-sidebarbg="skin5">
      <!-- Sidebar scroll-->
      <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
          <ul id="sidebarnav" class="pt-4">
            <li class="sidebar-item">
              <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Home</span></a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Employees </span></a>
              <ul aria-expanded="false" class="collapse first-level">
                <li class="sidebar-item">
                  <a href="#" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> All Employees </span></a>
                </li>
                <li class="sidebar-item">
                  <a href="add.php" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> Add Employee </span></a>
                </li>
              </ul>
            </li>
          </ul>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>

    <div class="page-wrapper">
      <!-- Bread crumb -->
      <div class="page-breadcrumb">
        <div class="row">
          <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Students</h4>
            <div class="ms-auto text-end">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">
                    <a href="add.php">Add New</a>
                  </li>
                  </li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
      <!-- End Bread crumb -->

      <!-- Container fluid -->
      <div class="container-fluid">
        <!-- Start Page Content -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Basic Datatable</h5>
                <div class="table-responsive">
                  <table id="zero_config" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>SSN</th>
                        <th>Name</th>
                        <th>Department</th>
                        <th>Gender</th>
                        <th>action</th>

                      </tr>
                    </thead>
                    <tbody>

                      <?php require_once "connect.php";
                      $stmt = $connect->prepare("SELECT * FROM employee;");
                      $stmt->execute();
                      $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                      use Employee;
                      foreach ($results as $row) {
                        
                      
                      ?>
                      <tr>
                        <td><?php echo $row['SSN'];?></td>
                        <td><?php echo $row['Fname']." ".$row['Lname'];?></td>
                        <td><?php echo $row['Dno'];?></td>
                        <td><?php echo $row['sex'];?></td>
                        <td>  
                          <button type="button" class="btn btn-dark"><a style="color:white;" href="show.php?SSN=<?php echo $row['SSN'];?>">Show</a></button>
                          <button type="button" class="btn btn-danger"><a style="color:white;" href="edit.php?SSN=<?php echo $row['SSN'];?>">Edit</a></button>
                          <button type="button" class="btn btn-primary"><a style="color:white;" href="delete.php?SSN=<?php echo $row['SSN'];?>">Delete</a></button>
                        </td>
                      </tr>
                      <?php }
                      $connect=null;
                      ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Salary</th>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- End Page Content -->

      </div>
      <!-- End Container fluid -->

      <!-- footer -->
      <?php include 'footer.php' ?>
      <!-- End footer -->

    </div>
    <!-- End Page wrapper -->
  </div>
  <!-- End Wrapper -->

  <!-- All Jquery -->
  <!-- ============================================================== -->
  <script src="assets/js/jquery.min.js"></script>
  <!-- Bootstrap tether Core JavaScript -->
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <!-- slimscrollbar scrollbar JavaScript -->
  <script src="assets/js/perfect-scrollbar.jquery.min.js"></script>
  <script src="assets/js/sparkline.js"></script>
  <!--Wave Effects -->
  <script src="assets/js/waves.js"></script>
  <!--Menu sidebar -->
  <script src="assets/js/sidebarmenu.js"></script>
  <!--Custom JavaScript -->
  <script src="assets/js/custom.min.js"></script>

  <!-- this page js -->
  <script src="assets/js/datatables.min.js"></script>
  <script>
    /****************************************
     *       Basic Table                   *
     ****************************************/
    $("#zero_config").DataTable();
  </script>
</body>

</html>