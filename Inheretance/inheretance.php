<!DOCTYPE html>
<html>
<head>
    <title>BMI Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e0f7fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }
        h1 {
            text-align: center;
            color: #00796b;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #00796b;
        }
        input[type="text"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .btn {
            background-color: #00796b;
            color: white;
            padding: 10px;
            border: none;
            width: 100%;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #004d40;
        }
        .result {
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>BMI Calculator</h1>
        <form method="post">
            <div class="form-group">
                <label for="height">Height (cm):</label>
                <input type="text" id="height" name="height" required>
            </div>
            <div class="form-group">
                <label for="weight">Weight (kg):</label>
                <input type="text" id="weight" name="weight" required>
            </div>
            <button type="submit" class="btn">Calculate BMI</button>
        </form>

        <?php
        // Base class Person
        class Person {
            protected $height;
            protected $weight;

            public function __construct($height, $weight) {
                $this->height = $height;
                $this->weight = $weight;
            }

            public function getHeight() {
                return $this->height;
            }

            public function getWeight() {
                return $this->weight;
            }
        }

        // Derived class BMI extends Person
        class BMI extends Person {
            public function calculateBMI() {
                $heightInMeters = $this->height / 100;
                return $this->weight / ($heightInMeters * $heightInMeters);
            }
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $height = $_POST['height'];
            $weight = $_POST['weight'];

            $bmiCalculator = new BMI($height, $weight);
            $bmi = $bmiCalculator->calculateBMI();

            echo "<div class='result'><strong>BMI:</strong> " . number_format($bmi, 2) . "</div>";
        }
        ?>
    </div>
</body>
</html>
