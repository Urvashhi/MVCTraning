 <?php include "components/h1.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Employees</title>
   
    <?php linkCSS("assets/css/dataTables.bootstrap4.min.css"); ?>
</head>
<body>


   <div class="container mt-5">
   <div class="row">
   <div class="col-md-8">
  

   <?php include "components/editEmpForm.php"; ?>

   </div>
   <!-- Close col-md-5 -->
   </div>
   <!-- Close row -->
   </div>
   <?php include "components/footer.php"; ?>
   <script>
   $(document).ready(function() {
    $('#example').DataTable();
} );
   </script>

   <?php linkJS('assets/js/jquery.dataTables.min.js');?>
   <?php linkJS('assets/js/dataTables.bootstrap4.min.js');?>

</body>
</html>