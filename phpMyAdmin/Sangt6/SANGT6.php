<?php
class QuadraticEquation {
    protected $a;
    protected $b;
    protected $c;

    public function __construct($a, $b, $c) {
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
    }

    public function solve() {
        if ($this->a == 0) {
            if ($this->b == 0) {
                return "Phương trình vô nghiệm";
            } else {
                return "Phương trình có một nghiệm: " . (-$this->c / $this->b);
            }
        } else {
            return "Phương trình có một nghiệm: " . (-$this->b / $this->a);
        }
    }
}

class QuadraticEquation2 extends QuadraticEquation {
    public function solve() {
        $delta = $this->b * $this->b - 4 * $this->a * $this->c;
        if ($delta < 0) {
            return "Phương trình vô nghiệm";
        } elseif ($delta == 0) {
            return "Phương trình có nghiệm kép: " . (-$this->b / (2 * $this->a));
        } else {
            $x1 = (-$this->b + sqrt($delta)) / (2 * $this->a);
            $x2 = (-$this->b - sqrt($delta)) / (2 * $this->a);
            return "Phương trình có hai nghiệm phân biệt: $x1 và $x2";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Giải phương trình bậc 2</title>
</head>
<body>
    <h2>Nhập các hệ số của phương trình ax^2 + bx + c = 0</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        a: <input type="number" step="any" name="a"><br>
        b: <input type="number" step="any" name="b"><br>
        c: <input type="number" step="any" name="c"><br>
        <input type="submit" name="submit" value="Giải">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $a = $_POST['a'];
        $b = $_POST['b'];
        $c = $_POST['c'];

        // Include the classes directly in this file
        // require_once 'QuadraticEquation.php'; // No longer needed
        // require_once 'QuadraticEquation2.php'; // No longer needed

        $equation = new QuadraticEquation2($a, $b, $c);

        echo "Kết quả: " . $equation->solve();
    }
    ?>
</body>
</html>
