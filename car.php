<?php
class Car
{
    private $make_model;
    private $price;
    private $miles;
    private $style;

    function __construct($make_model, $price, $miles, $style)
    {
        $this->make_model = $make_model;
        $this->price = $price;
        $this->miles = $miles;
        $this->style = $style;
    }

    function setMakeModel($new_make_model)
    {
        $this->make_model = $new_make_model;

    }

    function setPrice($new_price)
    {
        $this->price = $new_price;
        return $new_price;
    }

    function setMiles($new_miles)
    {
        $this->miles = $new_miles;
        return $new_miles;
    }

    function setStyle($new_style)
    {
        $this->style = $new_style;
        return $new_miles;
    }

    function getMakeModel()
    {
        return $this->make_model;
    }
    function getPrice()
    {
        return $this->price;
    }
    function getMiles()
    {
        return $this->miles;
    }
    function getStyle()
    {
        return $this->style;
    }

    function worthBuying($max_price)
    {
        return $this->price < ($max_price + 100);
    }
}

$porsche = new Car("2014 Porsche 911", 114991, 7864, "Sedan");
$ford = new Car("2011 Ford F450", 55995, 14241, "Coupe");
$lexus = new Car("2013 Lexus RX 350", 44700, 20000, "Sedan");
$mercedes = new Car("Mercedes Benz CLS550", 39900, 37979, "Coupe");

$cars = array($porsche, $ford, $lexus, $mercedes);

$cars_matching_search = array();
foreach ($cars as $car) {
    if ($car->worthBuying($_GET["price"])) {
        array_push($cars_matching_search, $car);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Your Car Dealership's Homepage</title>
</head>
<body>
    <h1>Your Car Dealership</h1>
    <ul>
        <?php
            foreach ($cars_matching_search as $car) {
                $price = $car->getPrice();
                $name = $car->getMakeModel();
                $total_mileage = $car->getMiles();
                $car_style = $car->getStyle();
                echo "<ul>
                        <li><em>name:</em> <strong>$name</strong>($car_style) - <em>price:</em> <strong>$price</strong> - <em>mileage:</em> <strong>$total_mileage</strong></li>
                    </ul>";
            }

            // $new_name = $ford->setMakeModel("Ugly Ass Car");
            // echo "<p>" . $ford->getMakeModel() . "</p>";

        ?>
    </ul>
</body>
</html>
