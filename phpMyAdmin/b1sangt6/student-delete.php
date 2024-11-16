<?php
session_start();

function deleteStudent() {
    $studentId = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
    if ($studentId !== false && $studentId !== null) {
        $index = $studentId - 1;
        if (isset($_SESSION['sinhVienList'][$index])) {
            unset($_SESSION['sinhVienList'][$index]);
            $_SESSION['sinhVienList'] = array_values($_SESSION['sinhVienList']);
            echo json_encode(['status' => 'success', 'message' => "Student with ID $studentId deleted successfully."]);
            exit();
        } else {
            echo json_encode(['status' => 'error', 'message' => "Student with ID $studentId not found."]);
            exit();
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid student ID.']);
        exit();
    }
}

deleteStudent();
?>
