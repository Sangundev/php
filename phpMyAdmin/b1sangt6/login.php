<?php
session_start();

if(isset($_SESSION['username'])){
    header("Location: dashboard.php");
    exit();
}
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    if($username == 'sang@gmail.com' && $password == '1234'){
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Tên đăng nhập hoặc mật khẩu không đúng.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
</head>
<body>

<h2>Đăng Nhập</h2>

<?php if(isset($error)): ?>
    <p style="color: red;"><?php echo $error; ?></p>
<?php endif; ?>

<form method="post">
    <label for="username">Tên đăng nhập:</label>
    <input type="text" name="username" required><br>

    <label for="password">Mật khẩu:</label>
    <input type="password" name="password" required><br>

    <input type="submit" name="login" value="Đăng nhập">
</form>

</body>
</html>
