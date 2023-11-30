<?php

// $dataPoints = array(
//     array("label" => "Education", "y" => 284935),
//     array("label" => "Entertainment", "y" => 256548),
//     array("label" => "Lifestyle", "y" => 245214),
// );

//For Sales
$sql = query("SELECT price FROM order_details");
$salesDataPoints = array();
while ($row = $sql->fetch_assoc()) {
    $salesDataPoints[] = array("label" => "2023", "y" => $row['price']);
}

$aggregatedSalesData = array();
foreach ($salesDataPoints as $item) {
    $label = $item["label"];
    $y = $item["y"];

    if (!isset($aggregatedSalesData[$label])) {
        $aggregatedSalesData[$label] = $y;
    } else {
        $aggregatedSalesData[$label] += $y;
    }
}

$finalSalesArray = array();
foreach ($aggregatedSalesData as $label => $y) {
    $finalSalesArray[] = array("label" => $label, "y" => $y);
}

//For product sales
$sql = query("SELECT product_name, price FROM order_details");
$dataPoints = array();
while ($row = $sql->fetch_assoc()) {
    $dataPoints[] = array("label" => $row['product_name'], "y" => $row['price']);
}

$aggregatedData = array();
foreach ($dataPoints as $item) {
    $label = $item["label"];
    $y = $item["y"];

    if (!isset($aggregatedData[$label])) {
        $aggregatedData[$label] = $y;
    } else {
        $aggregatedData[$label] += $y;
    }
}

$finalArray = array();
foreach ($aggregatedData as $label => $y) {
    $finalArray[] = array("label" => $label, "y" => $y);
}

?>
<!DOCTYPE HTML>
<html>

<head>
    <script>
        window.onload = function() {

            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                theme: "light2", // "light1", "light2", "dark1", "dark2"
                title: {
                    text: "Sales per Products"
                },
                axisY: {
                    title: "Number of Sales"
                },
                data: [{
                    type: "column",
                    dataPoints: <?php echo json_encode($finalArray, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart.render();

            var salesChart = new CanvasJS.Chart("salesChart", {
                animationEnabled: true,
                theme: "light2", // "light1", "light2", "dark1", "dark2"
                title: {
                    text: "Sales Per Year"
                },
                axisY: {
                    title: "Number of Sales"
                },
                data: [{
                    type: "column",
                    dataPoints: <?php echo json_encode($finalSalesArray, JSON_NUMERIC_CHECK); ?>
                }]
            });
            salesChart.render();

        }
    </script>
</head>

<body>
    <div class="row">
        <div class="col-6">
            <div id="salesChart" style="height: 370px; width: 60%; margin: auto;"></div>
        </div>
        <div class="col-6">
            <div id="chartContainer" style="height: 370px; width: 60%; margin: auto;"></div>
        </div>
    </div>
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
</body>

</html>