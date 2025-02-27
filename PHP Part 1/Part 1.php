<!-- Practice Set 1 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Triangle Area Calculator</title>
</head>
<body>
    <h1>Triangle Area Calculator</h1>
    <form method="POST" action="">
        <label for="side1">Side 1:</label>
        <input type="number" step="any" name="side1" id="side1" required>
        <br><br>
        <label for="side2">Side 2:</label>
        <input type="number" step="any" name="side2" id="side2" required>
        <br><br>
        <label for="side3">Side 3:</label>
        <input type="number" step="any" name="side3" id="side3" required>
        <br><br>
        <input type="submit" value="Calculate Area">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $side1 = $_POST['side1'];
        $side2 = $_POST['side2'];
        $side3 = $_POST['side3'];

        $s = ($side1 + $side2 + $side3) / 2;

        $areaSquared = $s * ($s - $side1) * ($s - $side2) * ($s - $side3);

        $area = $areaSquared ** 0.5;

        echo "<h2>Result:</h2>";
        echo "The area of the triangle is: " . number_format($area, 2) . " square units.";
    }
    ?>
</body>
</html>

<!-- Practice Set 2 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array of Fruits</title>
</head>
<body>
    <h1>List of Fruits</h1>
    <ol>
        <?php
        $fruits = array("Apple", "Banana", "Cherry", "Grapes", "Melon");

        $fruitCount = count($fruits);

        for ($i = 0; $i < $fruitCount; $i++) {
            echo "<li>" . $fruits[$i] . "</li>";
        }
        ?>
    </ol>
</body>
</html>

<!-- Practice Set 3 -->
<?php
$matrix = [
    [12, 23, 34],
    [45, 55, 62],
    [71, 84, 90]
];

$i = 0;
while ($i < count($matrix)) {
    $j = 0;
    while ($j < count($matrix[$i])) {
        if ($matrix[$i][$j] % 2 == 0) {
            echo $matrix[$i][$j] . " ";
        }
        $j++;
    }
    $i++;
}
?>