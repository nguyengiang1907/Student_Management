<?php
    include_once 'connect_database/connect.php';
    include_once 'student.php';
    include_once 'model/studentDTO.php';

 

    $student = new Student($conn);
    $studentDTO = new StudentDTO('Chinh',19,'Thanh Hoá','D101_C2K14');
    $students = $student->find_all();

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
        $id = $_POST['id'];
        $student = new Student($conn);
        
        $result = $student->deleteByID($id);
        
        if ($result) {
            header("Location: " . $_SERVER['PHP_SELF']);
            exit; // Dừng việc thực thi mã tiếp theo
        } else {
            echo "Delete failed.";
        }
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/home.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
</head>
<body>
    
<?php include_once('layout/header.php') ?>
    <div class='content'>
    <?php include_once('layout/left.php') ?>
        <div class='right_home'>
            <div class='content_right'>
                <div class="title_right">
                        <div class="content_title">
                            <h5>Quản lý sinh viên</h5>
                        </div>
                        <div class='button_create'>
                                <button onclick="window.location.href='create.php'" type="button" class="btn btn-success"><i class="bi bi-plus-circle-fill"></i>Create</button>
                        </div>   
                </div>
                <div class='table_container'>
                    <table class="table">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Age</th>
                            <th>Address</th>
                            <th>Class Student</th>
                            <th>Actions</th>
                        </tr>
                        <?php foreach ($students as $student): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($student['id']); ?></td>
                                <td><?php echo htmlspecialchars($student['name']); ?></td>
                                <td><?php echo htmlspecialchars($student['age']); ?></td>
                                <td><?php echo htmlspecialchars($student['address']); ?></td>
                                <td><?php echo htmlspecialchars($student['class_student']); ?></td>
                                <td>
                                    <span>
                                        <i  onclick="window.location.href='update.php?id=<?php echo $student['id']; ?>'" class="bi bi-pencil-square pencil-icon"></i>
                                    </span>
                                    <span>
                                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" style="display:inline;">
                                            <input type="hidden" name="id" value="<?php echo $student['id']; ?>">
                                            <i class="bi bi-trash-fill trash-icon" onclick="this.closest('form').submit();" style="cursor: pointer;"></i>
                                        </form>
                                    </span>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>  
<?php include_once('layout/footer.php') ?>

</body>
</html>