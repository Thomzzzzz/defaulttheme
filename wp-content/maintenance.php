<?php
include('../wp-config.php');
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die("Er kan (tijdelijk) geen verbinding met de server worden gemaakt. Probeer het nogmaals.");
$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if (mysqli_connect_errno()) {
    printf("No connection");
    exit;
}
//$query = "SELECT * FROM `wp_options` WHERE `option_name` = 'template' ";
$query = "SELECT * FROM `wp_options` LIMIT 10";

$result = $mysqli->query($query);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $aTemplate[] = $row;
    }
    $themeName = $aTemplate['option_value'];
    $css = 'wp-content/themes/' . $themeName . '/' . 'style.css';
}
?>
<!doctype html>
<html>
<head>
    <title>opdaten</title>
    <link rel="stylesheet" href="<?php echo(file_exists($css) ? $css : null); ?>" type="text/css">
</head>
<body>
<div class="wrapper">
    <h1></h1>
</div>
</body>
</html>