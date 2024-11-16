<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$fullName = '';
$taiKhoan = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullName = $_POST['fullname'];
    $taiKhoan = $_POST['taikhoan'];
    if (isset($_POST['student_id'])) {
        $studentId = $_POST['student_id'];

        foreach ($_SESSION['sinhVienList'] as &$student) {
            if ($student['id'] == $studentId) {
                $student['fullname'] = $fullName;
                $student['taikhoan'] = $taiKhoan;
                break;
            }
        }
    } else {
        $newStudent = [
            'id' => count($_SESSION['sinhVienList']) + 1, 
            'fullname' => $fullName,
            'taikhoan' => $taiKhoan,
            'action' => ''
        ];

        $_SESSION['sinhVienList'][] = $newStudent;
    }

    header("Location: dashboard.php");
    exit();
}
if (isset($_GET['id'])) {
    $studentId = $_GET['id'];
    $studentToEdit = null;
    foreach ($_SESSION['sinhVienList'] as $student) {
        if ($student['id'] == $studentId) {
            $studentToEdit = $student;
            break;
        }
    }
    if ($studentToEdit) {
        $fullName = $studentToEdit['fullname'];
        $taiKhoan = $studentToEdit['taikhoan'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($studentToEdit) ? 'Edit Student' : 'Add Student'; ?></title>
</head>

<body>

    <h2><?php echo isset($studentToEdit) ? 'Edit Student' : 'Add Student'; ?></h2>

    <form method="post" action="">
        <label for="fullname">Full Name:</label>
        <input type="text" name="fullname" value="<?php echo $fullName; ?>" required>

        <label for="taikhoan">Tài Khoản:</label>
        <input type="text" name="taikhoan" value="<?php echo $taiKhoan; ?>" required>
        <?php if (isset($studentToEdit)) : ?>
            <input type="hidden" name="student_id" value="<?php echo $studentId; ?>">
        <?php endif; ?>

        <input type="submit" name="<?php echo isset($studentToEdit) ? 'update_student' : 'add_student'; ?>" value="<?php echo isset($studentToEdit) ? 'Update Student' : 'Add Student'; ?>">
    </form>

</body>

</html>
