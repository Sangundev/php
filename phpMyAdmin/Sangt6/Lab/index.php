<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <?php
        //more oop user
        require_once("userclass.php");
        $nguyenanh = new User('nguyen anh','dinhanh@gmail.com');
        echo "<h2> ---User info---</h2>";  
        echo "UserID: ".$nguyenanh-> GetUserID()."<br/>";
        echo"UserName:".$nguyenanh-> GetUserName()."<br/>";

        $nguyenanhmore = new User('nguyen van a','yourname@gmail.com');
        echo "<h2> ---User info---</h2>";  
        echo "UserID: ".$nguyenanhmore->GetUserID()."<br/>";
        echo"UserName:".$nguyenanhmore->GetUserName()."<br/>";

        //more oop par
        include ("employeeclass.php");
        $person_a = new Person("Nguyen Van B", 1234);
        echo "<h2> --More OPP PHP--</h2>";
        echo "Person Name:".$person_a -> GetName()."<br/>";
        echo "Person ID:".$person_a -> GetNationalID()."<br/>";
    
        echo "<h2>Employee</h2>";
        $employee_a = new Employee("Nguyen Van C", 5678,"Security");
        echo "Employee ID:".$employee_a -> GetEmployeeID()."<br/>";
        echo "Employee Name:".$employee_a -> GetName()."<br/>";
        echo "Employee Department:".$employee_a -> GetDepartment()."<br/>";
        echo "<h2>Employee More</h2>";
        $employee_b = new Employee("Nguyen Van D", 112233,"Offical");
        echo "Employee ID:".$employee_b -> GetEmployeeID()."<br/>";
        echo "Employee Name:".$employee_b -> GetName()."<br/>";
        echo "Employee Department:".$employee_b -> GetDepartment()."<br/>";
        ?>
    </div>
    <footer>
        &#169; 2016 - Anh Nguyen - Faculty of Information Technology (Hutech)
    </footer>
</body>
</html>