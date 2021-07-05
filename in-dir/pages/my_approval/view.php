<?php
session_start();
include '../../../functions.php';
$username = $_SESSION['user'][0]['username'];
// $login_id = $_SESSION['user'][0]['login_id'];
// $val = getEmployee_login($login_id);
include '../inc/session2.php';
if(isset($_SESSION['user'])) {
?>

<!DOCTYPE html>
<html>
<head>

  <title>HR-Soft | My Approval</title>
  <?php include '../inc/head.php' ?>
  
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<?php include '../inc/header.php' ?>
  <!-- Left side column. contains the logo and sidebar -->
 
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p> Director | <?php echo $username ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="../../index.php">
            <i class="fa fa-dashboard"></i>Dashboard
          </a>
        </li>

        <li>
          <a href="../users/index.php"><i class="fa fa-users"></i> Users</a>
        </li>

        <li>
          <a href="../appraisal/index.php"><i class="fa fa-user"></i> Employee Appraisal</a>
        </li>

        <li>
          <a href="../hr_promotions/index.php"><i class="fa fa-circle-o-notch"></i> HR Promotions</a>
        </li>

        <li class="active">
          <a href="#"><i class="fa fa-gavel"></i> My Approval</a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      All Approvals
      </h1>
     
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Full Name</th>
                  <th>Designation</th>
                  <th>New Level</th>
                  <th>Approval Status</th>
                  <th>Description</th>
                  <th>Date</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                        $approval = joinApprovalPro();
                        // die(var_dump($approval));
                        // $rank = 1;
                        // die(var_dump($survey1));
                        foreach ($approval as $value) {?>
                <tr>
                  <td><?php echo $value['fname'];?></td>
                  <td><?php echo $value['designation'];?></td>
                  <td><?php echo $value['new_level'];?></td>
                  <td><?php echo $value['approval_status'];?></td>
                  <td><?php echo $value['description'];?></td>
                  <td><?php echo $value['date_added'];?></td>
                  <td>
                    <center>
                      <a href="../../../delprocess.php?dir_approval_id=<?php echo $value['dir_approval_id']?>" type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                    </center>
                  </td>
                </tr>
                
                <?php }?>
                
                
                </tbody>
                
              </table>
              <br>
              <a href="../hr_promotions/index.php" class="btn btn-primary"><b>Return</b></a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2021 <a href="https://oracode.net">oraCode</a>.</strong> All rights
    reserved.
  </footer>


  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<?php include '../inc/scripts2.php' ?>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>
<?php }else{ ?>
<?php header('location: ../../../login.php');?>
<?php }?>