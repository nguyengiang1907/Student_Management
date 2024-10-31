<?php
    include_once 'connect_database/connect.php';
    include_once 'student.php';
    include_once 'model/studentDTO.php';

 

    $student = new Student($conn);
    $studentDTO = new StudentDTO('Chinh',19,'Thanh Hoá','D101_C2K14');

    // $student->create($studentDTO);
    // $student->update($studentDTO,2);
    // $student->deleteById(2);

    $students = $student->find_all();
    // foreach($students as $std){
    //     echo("Id: ".$std['id'] . "Name: " . $std['name'] . "Age:" . $std['age'] . "Address: " . $std['address'] . "Class: " . $std['class_student'] . '<br>');
    // }
    // $result = $student->findById(2);

    // if ($result) {
    //     echo "ID: " . $result['id'] . "<br>";
    //     echo "Name: " . $result['name'] . "<br>";
    //     echo "Age: " . $result['age'] . "<br>";
    //     echo "Address: " . $result['address'] . "<br>";
    //     echo "Class Student: " . $result['class_student'] . "<br>";
    // } else {
    //     echo "Student with ID $id not found.";
    // }
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
    

    <div class='header_home'>

    </div>
    <div class='content'>
        <div class='left_home'>

        </div>
        <div class='right_home'>
            <div class='content_right'>
                <div class="title_right">
                        <div>
                            
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
                                        <i class="bi bi-pencil-square pencil-icon"></i>
                                    </span>
                                    <span>
                                        <i class="bi bi-trash-fill trash-icon"></i>
                                    </span>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>  
    <div class='footer_home'> 

    </div>

</body>
</html>