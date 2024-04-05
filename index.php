<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Calculator</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
            <video autoplay muted loop id="video-background">
                <source src="gojo-and-kitty-jujutsu-kaisen-moewalls-com.mp4" type="video/mp4">
            </video>
            
    <div class="calculator">
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="text" name="display" id="display" placeholder="0" readonly>
            <div class="buttons">
                <button type="button" onclick="appendToDisplay('7')">7</button>
                <button type="button" onclick="appendToDisplay('8')">8</button>
                <button type="button" onclick="appendToDisplay('9')">9</button>
                <button type="button" class="operator" onclick="appendToDisplay('+')">+</button>
                <button type="button" onclick="appendToDisplay('4')">4</button>
                <button type="button" onclick="appendToDisplay('5')">5</button>
                <button type="button" onclick="appendToDisplay('6')">6</button>
                <button type="button" class="operator" onclick="appendToDisplay('-')">-</button>
                <button type="button" onclick="appendToDisplay('1')">1</button>
                <button type="button" onclick="appendToDisplay('2')">2</button>
                <button type="button" onclick="appendToDisplay('3')">3</button>
                <button type="button" class="operator" onclick="appendToDisplay('*')">X</button>
                <button type="button" onclick="appendToDisplay('0')">0</button>
                <button type="button" onclick="appendToDisplay('.')">.</button>
                <button type="button" onclick="appendToDisplay('/')">/</button>
                <button type="button" onclick="clearDisplay()">C</button>
                <button type="submit" name="submit" class="operators">=</button>
            </div>
        </form>
        
        <?php
        if (isset($_POST['submit'])) {
            $expression = $_POST['display'];
            $result = null;

            if (!empty($expression)) {
   
                try {
                    $result = eval('return (' . $expression . ');');
                    if ($result === false) {
                        throw new Exception('Syntax Error');
                    }
                } catch (Throwable $e) {
                    echo "<script>alert('Error: " . $e->getMessage() . "');</script>";
                }
                if ($result !== null) {
                    echo "<script>document.getElementById('display').value = $result;</script>";
                }
            }
        }
        ?>
        </div>
    </div>
    <script>
        function appendToDisplay(value) {
            document.getElementById("display").value += value;
        }

        function clearDisplay() {
            document.getElementById("display").value = '';
        }
    </script>   
</body>
</html>