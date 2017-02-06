`<?php
class Car
{
    private $make_model;
    private $price;
    private $miles;
    private $style;
    private $picture;

    function __construct($make_model, $price, $miles, $style, $picture)
    {
        $this->make_model = $make_model;
        $this->price = $price;
        $this->miles = $miles;
        $this->style = $style;
        $this->picture = $picture;
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

    function setPicture($new_picture)
    {
        $this->picture = $new_picture;
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
    function getPicture()
    {
        return $this->picture;
    }

    function worthBuying($max_price, $max_mileage)
    {
        if($max_price >= $this->price && $max_mileage >= $this->miles)
        return $this->price && $this->miles;
    }

}

$porsche = new Car("2014 Porsche 911", 114991, 7864, "Sedan", "img/porsche.jpg");
$ford = new Car("2011 Ford F450", 55995, 14241, "Coupe", "img/ford.jpg");
$lexus = new Car("2013 Lexus RX 350", 44700, 20000, "Sedan", "img/lexus.jpg");
$mercedes = new Car("Mercedes Benz CLS550", 39900, 37979, "Coupe", "img/benz.jpg");

$cars = array($porsche, $ford, $lexus, $mercedes);

$cars_matching_search = array();
foreach ($cars as $car) {
    if ($car->worthBuying($_GET["price"], $_GET["mileage"])) {
        array_push($cars_matching_search, $car);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Your Car Dealership's Homepage</title>
    <link rel="stylesheet" href="css/styles.css" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
    <h1>Your Car Dealership</h1>
    <ul>
        <?php
            if (empty($cars_matching_search)) {
                echo "<li>There are no cars matching your search</li>";
            }
            else {
                foreach ($cars_matching_search as $car) {
                    $price = $car->getPrice();
                    $name = $car->getMakeModel();
                    $total_mileage = $car->getMiles();
                    $car_style = $car->getStyle();
                    $car_picture = $car->getPicture();
                    echo "<img src='$car_picture' alt= 'picture of $name'/>
                        <ul>
                            <li><em>name:</em> <strong>$name</strong>($car_style) - <em>price:</em> <strong>$price</strong> - <em>mileage:</em> <strong>$total_mileage</strong></li>
                        </ul>";
                }
            }

            // $new_name = $ford->setMakeModel("Ugly Ass Car");
            // echo "<p>" . $ford->getMakeModel() . "</p>";

        ?>
    </ul>
</body>
</html>
