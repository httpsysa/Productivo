<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete_student']))
{
    $student_id = mysqli_real_escape_string($conn, $_POST['delete_student']);

    $query = "DELETE FROM students WHERE id='$student_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Employee Deleted!";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Employee Not Deleted!";
        header("Location: index.php");
        exit(0);
    }
}

if(isset($_POST['update_student']))
{
    $student_id = mysqli_real_escape_string($conn, $_POST['student_id']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $course = mysqli_real_escape_string($conn, $_POST['course']);

    $query = "UPDATE students SET name='$name', email='$email', phone='$phone', course='$course' WHERE id='$student_id'";

    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $_SESSION['message'] = "Employee Updated succesfully!";
        header("Location: index.php");
        exit(0);
    }
    else {
        $_SESSION['message'] = "Employee not updated!";
        header("Location: index.php");
        exit(0);
    }
}

if(isset($_POST['save_employee'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $course = mysqli_real_escape_string($conn, $_POST['course']);

    $query = "INSERT INTO students (name,email,phone,course) VALUES ('$name','$email','$phone','$course')";

    $query_run = mysqli_query($conn, $query);
    if($query_run){
        $_SESSION['message'] = "Employee added succesfully!";
        header("Location: student-create.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Employee Cannot Add!";
        header("Location: student-create.php");
        exit(0);
    }
}
?>