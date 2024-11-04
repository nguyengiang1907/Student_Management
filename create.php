

<?php
include_once 'connect_database/connect.php';
include_once 'student.php';
include_once 'model/studentDTO.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Lấy dữ liệu từ form
    $name = $_POST['name'];
    $address = $_POST['address'];
    $age = $_POST['age'];
    $class_student = $_POST['class_student'];
    
    // Khởi tạo đối tượng StudentDTO với dữ liệu từ form
    $studentDTO = new StudentDTO($name, $age, $address, $class_student);
    
    // Khởi tạo đối tượng Student và gọi phương thức create
    $student = new Student($conn);
    $result = $student->create($studentDTO);
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/create.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/left.css">
    <link rel="stylesheet" href="css/footer.css">
</head>
<body>
<?php include_once('layout/header.php') ?>
    <div class='content'>
    <?php include_once('layout/left.php') ?>
        <div class='right_home'>
            <div class='form-create'>
                <div class='content-form'>
        <form action="create.php" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Name: </label>
                <input type="text" class="form-control" id="name" name='name' >
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address: </label>
                <input type="text" class="form-control" id="address" name='address'>
            </div>
            <div class="mb-3">
                <label for="age" class="form-label">Age: </label>
                <input type="number" class="form-control" id="age" name='age' >
            </div>
            <div class="mb-3">
                <label for="class_student" class="form-label">Class Student: </label>
                <input type="text" class="form-control" id="class_student" name='class_student'>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>
        </div>
        </div>
    </div>  
<?php include_once('layout/footer.php') ?>

</body>
</html>