<?php
    include_once 'connect_database/connect.php';
    require 'model/studentDTO.php';

class Student{
    

    private $conn;
    private $table = 'students';

    public $id;
    public $name;
    public $age;
    public $address;
    public $class_student;

    function __construct($db){
        //nhận về $conn kết nối database
        $this-> conn=$db;
    }

    public function find_all(){
        $sql = "SELECT * FROM $this->table";
        // prepare(câu lệnh truy vấn) => chuẩn bị câu lệnh truy vấn, chờ giá trị 
        $stmt = $this->conn->prepare($sql);
        // execute() thực thi câu truy vấn 
        $stmt->execute();
        // trả dữ liệu sau khi 'fetch() => lấy ra tất cả theo dạng mãng kết hợp FETCH_ASSOC'
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create(StudentDTO $student){
        $sql = "INSERT INTO $this->table (name, age, address, class_student) VALUES (:name, :age, :address, :class_student)";
        $stmt = $this->conn->prepare($sql);
        // bindParam là một phương thức của PDO dùng để gán giá trị cho các tham số trong câu truy vấn => (':tên tham số trong câu truy vấn', biến trong PHP liên kết, kiểu dữ liệu của tham số : INT OR STR)
        $stmt->bindParam(':name', $student->name, PDO::PARAM_STR);
        $stmt->bindParam(':age', $student->age, PDO::PARAM_INT);
        $stmt->bindParam(':address', $student->address, PDO::PARAM_STR);
        $stmt->bindParam(':class_student', $student->class_student, PDO::PARAM_STR);
        $stmt->execute();

    }

    public function findById($id){
        $sql = "SELECT * FROM $this->table WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id',$id,PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update(StudentDTO $student, $id){
        // $std = findById($id);
        $sql = "UPDATE $this->table SET name = :name, age = :age, address = :address, class_student = :class_student WHERE id =:id ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':name', $student->name, PDO::PARAM_STR);
        $stmt->bindParam(':age', $student->age, PDO::PARAM_INT);
        $stmt->bindParam(':address', $student->address, PDO::PARAM_STR);
        $stmt->bindParam(':class_student', $student->class_student, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function deleteById($id){
        $sql = "DELETE FROM $this->table WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
}
?>