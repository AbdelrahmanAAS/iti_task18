<?php
require_once "../layout/Database.php";
require_once "../layout/Validate.php";
require_once "../layout/Employee.php";

$employee= new Employee();
$data=$employee->index();
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
  <?php include "../layout/header.php"; ?>
</head>

<body>

  <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">

    <?php include "../layout/head.php";
    include_once "../layout/aside.php"; ?>

      
      <div class="page-wrapper">
        <!-- Bread crumb -->
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Students</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../layout/home.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                    <a href="add.php">Add New</a></li>
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
                  <div class="table-responsive">
                    <table
                      id="zero_config"
                      class="table table-striped table-bordered"
                    >
                      <thead>
                        <tr>
                          <th>ssn</th>
                          <th>fullname</th>
                          <th>Department</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach($data as $value){ ?>
                        <tr>
                          <td><?php echo $value["SSN"] ?></td>
                          <td><?php echo $value["Fullname"] ?></td>
                          <td><?php echo $value["Dname"] ?></td>
                          <td>
                            <a href="show.php?ssn=<?php echo $value["SSN"] ?>" class="btn btn-primary">show</a>
                            <a href="edit.php?ssn=<?php echo $value["SSN"] ?>" class="btn btn-success">edit</a>
                            <a href="delete.php?ssn=<?php echo $value["SSN"] ?>" class="btn btn-danger" onclick="if(!confirm('Are you sure')){return false; }">delete</a>
                          </td>
                        </tr>
                       <?php } ?>
                      </tbody>
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
        <footer class="footer text-center">
          <?php include_once '../layout/footer.php' ?>
        </footer>
        <!-- End footer -->
        
      </div>
      <!-- End Page wrapper -->
    </div>
    <!-- End Wrapper -->

    <!-- All Jquery -->
    <!-- ============================================================== -->
    <?php include_once '../layout/scripts.php' ?>
    
    <!-- this page js -->
    <script src="../layout/assets/js/datatables.min.js"></script>
    <script>
      /****************************************
       *       Basic Table                   *
       ****************************************/
      $("#zero_config").DataTable();
    </script>
  </body>
</html>
