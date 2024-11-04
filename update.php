<?php
include_once 'connect_database/connect.php';
include_once 'student.php';
include_once 'model/studentDTO.php';


// Lấy id từ GET hoặc POST
$id = $_GET['id'] ?? $_POST['id_update'] ?? null;


$student = new Student($conn);
$std = $student->findById($id);



if ($std) {
    $name = $std['name'];
    $address = $std['address'];
    $age = $std['age'];
    $class_student = $std['class_student'];
} else {
    die("Student with ID $id not found.");
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_update = $_POST['id_update'];
    $name_update = $_POST['name_update'];
    $address_update = $_POST['address_update'];
    $age_update = $_POST['age_update'];
    $class_student_update = $_POST['class_student_update'];
    
    $studentDTO = new StudentDTO($name_update, $age_update, $address_update, $class_student_update);
    $result = $student->update($studentDTO, $id_update);
    if ($result) {
        // Chuyển hướng về trang home nếu update thành công
        header("Location: main.php");
        exit; // Dừng việc thực thi tiếp mã sau khi chuyển hướng
    } else {
        echo "Update failed.";
    }
    
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
        <form action="update.php" method="post">
            <input type="hidden" name="id_update" value="<?php echo htmlspecialchars($id); ?>">
            <div class="mb-3">
                <label for="name" class="form-label">Name: </label>
                <input type="text" class="form-control" id="name" name='name_update' value="<?php echo htmlspecialchars($name); ?>" >
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address: </label>
                <input type="text" class="form-control" id="address" name='address_update' value="<?php echo htmlspecialchars($address); ?>">
            </div>
            <div class="mb-3">
                <label for="age" class="form-label">Age: </label>
                <input type="number" class="form-control" id="age" name='age_update' value="<?php echo htmlspecialchars($age); ?>">
            </div>
            <div class="mb-3">
                <label for="class_student" class="form-label">Class Student: </label>
                <input type="text" class="form-control" id="class_student" name='class_student_update' value="<?php echo htmlspecialchars($class_student); ?>">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        </div>
        </div>
        </div>
    </div>  
<?php include_once('layout/footer.php') ?>

</body>
</html>