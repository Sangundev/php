<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit();
}
include('student_list.php');

$sinhVienList = isset($_SESSION['sinhVienList']) ? $_SESSION['sinhVienList'] : [];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>

<body>

    <h2>Xin chào, <?php echo $_SESSION['username']; ?>!</h2>

    <form method="post">
        <input type="submit" name="logout" value="Đăng xuất">
        <button type="button" onclick="addStudent()">Add Student</button>
    </form>

    <h3>Danh sách sinh viên:</h3>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Tài Khoản</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($sinhVienList as $sinhVien) {
                echo "<tr id='row_" . $sinhVien['id'] . "'>";
                echo "<td>" . $sinhVien['id'] . "</td>";
                echo "<td>" . $sinhVien['fullname'] . "</td>";
                echo "<td>" . $sinhVien['taikhoan'] . "</td>";
                echo "<td><button onclick=\"deleteStudent(" . $sinhVien['id'] . ")\">Delete</button></td>";
                echo "<td><button onclick=\"editStudent(" . $sinhVien['id'] . ")\">Edit</button></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
        function deleteStudent(studentId) {
            $.ajax({
                type: 'POST',
                url: 'student-delete.php',
                data: { id: studentId },
                dataType: 'json', 
                success: function (response) {
                    alert(response.message); 
                    if (response.status === 'success') {
                        $('#row_' + studentId).fadeOut(500, function () {
                            $(this).remove();
                        });
                    }
                },
                error: function (error) {
                    console.error('Error deleting student:', error);
                }
            });
        }



        function addStudent() {
            window.location.href = 'student-add.php';
        }

        function editStudent(studentId) {
            window.location.href = 'student-add.php?id=' + studentId;
        }
    </script>

</body>

</html>
