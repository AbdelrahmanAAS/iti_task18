<?php
require_once "../layout/connect.php";
$deptResult=$connect->query("select Dno,Dname from departments"); //object
$deptData=$deptResult->fetchAll(PDO::FETCH_ASSOC);

if(isset($_GET['ssn'])){
    $ssn=$_GET['ssn'];
}else{
    $ssn=0;
}

$empresult=$connect->query("select * from employee where SSN=$ssn");
$empData=$empresult->fetch(PDO::FETCH_ASSOC);


if($_SERVER['REQUEST_METHOD'] == "POST"){
  $errors=[];
  $fname=$_POST['fname'];
  $lname=$_POST['lname'];
  $newSSN=$_POST['ssn'];
  $email=$_POST['email'];
  $gender=$_POST['gender'];
  $dno=$_POST['dno'];
  if(empty($_FILES['image']['name'])){
    $image_name=$empData['ImageName'];
  }else{
    $image_name=$_FILES['image']['name'];
  }

  $ssnResult=$connect->query("select * from employee WHERE SSN = $newSSN");
  $ssnCount=$ssnResult->rowCount();
  if($ssnCount > 0){
    $errors[]="ssn must be unique..";
  }

  if(empty($errors)){
    if(!empty($_FILES['image']['name'])){
        move_uploaded_file($_FILES['image']['tmp_name'],"../layout/assets/images/employee/$image_name");
    }
    $updateResult=$connect->query("UPDATE `employee` SET `SSN`='$newSSN',`Fname`='$fname',`Lname`='$lname',`Email`='$email',`Gender`='$gender',`ImageName`='$image_name',`Dno`='$dno' WHERE SSN=$ssn"); // object
    if($updateResult){
        header("location: index.php");
    }
  } 
}

?>

<!DOCTYPE html>
<html dir="ltr" lang="en">
  <head>
    <?php include_once '../layout/head.php' ?>
  </head>

  <body>
    <div
      id="main-wrapper"
      data-layout="vertical"
      data-navbarbg="skin5"
      data-sidebartype="full"
      data-sidebar-position="absolute"
      data-header-position="absolute"
      data-boxed-layout="full"
    >
      <!-- ============================================================== -->
      <!-- Topbar header - style you can find in pages.scss -->
      <!-- ============================================================== -->
      <header class="topbar" data-navbarbg="skin5">
        <?php include_once '../layout/header.php' ?>
      </header>
      <!-- ============================================================== -->
      <!-- End Topbar header -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Left Sidebar - style you can find in sidebar.scss  -->
      <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <?php include_once '../layout/aside.php' ?>
        </aside>
      <!-- ============================================================== -->
      <!-- End Left Sidebar - style you can find in sidebar.scss  -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Page wrapper  -->
      <!-- ============================================================== -->
      <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
          <div class="row">
            <?php if(isset($errors) && !empty($errors)){ ?>
            <div class="alert alert-danger">
              <ul>
                <?php foreach($errors as $error){ ?>
                  <li><?php echo $error; ?></li>
                <?php } ?>
              </ul>
            </div>
            <?php } ?>

            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Add Student</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                    <a href="index.php">All Students</a>
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
          <!-- ============================================================== -->
          <!-- Start Page Content -->
          <!-- ============================================================== -->
          <div class="row">
          <div class="col-md-12">
              <div class="card">
                <form class="form-horizontal" action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" enctype="multipart/form-data" method="post">
                  <div class="card-body">
                  <div class="form-group row">
                      <label
                        for="ssn"
                        class="col-sm-3 text-end control-label col-form-label"
                        >SSN</label
                      >
                      <div class="col-sm-9">
                        <input
                          type="text"
                          class="form-control"
                          id="ssn"
                          placeholder="SSN Here"
                          name="ssn"
                          value="<?php echo $empData['SSN'] ?>"
                        />
                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="fname"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Fname</label
                      >
                      <div class="col-sm-9">
                        <input
                          type="text"
                          class="form-control"
                          id="fname"
                          placeholder="First Name Here"
                          name="fname"
                          value="<?php echo $empData['Fname'] ?>"
                        />
                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="fname"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Lname</label
                      >
                      <div class="col-sm-9">
                        <input
                          type="text"
                          class="form-control"
                          id="lname"
                          placeholder="Last Name Here"
                          name="lname"
                          value="<?php echo $empData['Lname'] ?>"
                        />
                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="email"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Email</label
                      >
                      <div class="col-sm-9">
                        <input
                          type="email"
                          class="form-control"
                          id="email"
                          placeholder="Email Here"
                          name="email"
                          value="<?php echo $empData['Email'] ?>"
                        />
                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="image"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Image</label
                      >
                      <div class="col-sm-9">
                        <input
                          type="file"
                          class="form-control"
                          id="image"
                          placeholder="First Name Here"
                          name="image"
                        />
                        <img src="../layout/assets/images/employee/<?php echo $empData['ImageName'] ?>" width="100">
                      </div>
                    </div>
                    <div class="form-group row">
                    <label
                        for="email"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Gender</label
                      >
                      <div class="col-md-9">
                        <div class="form-check">
                          <input
                            type="radio"
                            class="form-check-input"
                            id="customControlValidation1"
                            name="gender"
                            value="M"
                            <?php if($empData['Gender'] == "M"){ ?>
                            checked
                            <?php } ?>
                          />
                          <label
                            class="form-check-label mb-0"
                            for="customControlValidation1"
                            >Male</label
                          >
                        </div>
                        <div class="form-check">
                          <input
                            type="radio"
                            class="form-check-input"
                            id="customControlValidation2"
                            name="gender"
                            value="F"
                            <?php if($empData['Gender'] == "F"){ ?>
                            checked
                            <?php } ?>
                          />
                          <label
                            class="form-check-label mb-0"
                            for="customControlValidation2"
                            >Female</label
                          >
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="fname"
                        class="col-sm-3 text-end control-label col-form-label"
                        >Department</label
                      >
                      <div class="col-sm-9">
                        <select class="form-control" name="dno">
            
                          <?php foreach($deptData as $dept){ ?>
                            <option value="<?php echo $dept['Dno'] ?>" <?php if($empData['Dno'] == $dept['Dno']){ ?>selected <?php } ?>><?php echo $dept['Dname'] ?></option>
                            <?php } ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="border-top">
                    <div class="card-body">
                      <button type="submit" class="btn btn-primary">
                        Add
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- End Page Content -->

        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer text-center">
          <?php include_once '../layout/footer.php' ?>
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
      </div>
      <!-- ============================================================== -->
      <!-- End Page wrapper  -->
      <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <?php include_once '../layout/scripts.php' ?>
    <!-- This Page JS -->

  </body>
</html>
