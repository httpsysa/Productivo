<?php
session_start();
require 'dbcon.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Edit Employee Details</title>
  </head>
  <body>
    

    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Employee Edit
                            <a href="index.php" class="btn-danger float-end">Back</a>
                        </h4> 
                    </div>
                    <div class="class-body">
                        <?php
                            if(isset($_GET['id']))
                            {
                                $student_id = mysqli_real_escape_string($conn, $_GET['id']);
                                $query = "SELECT * FROM students WHERE id='$student_id' ";
                                $query_run = mysqli_query($conn, $query);

                                if(mysqli_num_rows($query_run) > 0){
                                    $student = mysqli_fetch_array($query_run);
                                    ?>
                                    
                        <form action="code.php" method="POST">
                            <input type="hidden" name="student_id" value="<?=$student['id']; ?>">
                        
                            <div class="mb-3">
                            <label>Employee Name</label>
                            <input type="text"  name="name" value="<?=$student['name'];?>" class="form-control">
                            </div>
                            <div class="mb-3">
                            <label>Employee Email</label>
                            <input type="email"  name="email" value="<?=$student['email'];?>" class="form-control">
                            </div>
                            <div class="mb-3">
                            <label>Employee Phone</label>
                            <input type="text"  name="phone" value="<?=$student['phone'];?>" class="form-control">
                            </div>
                            <div class="mb-3">
                            <label>Employee Position</label>
                            <input type="text"  name="course"value="<?=$student['course'];?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="update_student" class="btn btn-primary">Update Employee</button>
                            </div>
                        </form>

                        <?php
                                }
                                else{
                                    echo "<h4>No such ID found!</h4>";
                                }
                            }    
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>