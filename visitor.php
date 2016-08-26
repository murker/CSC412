<?php

// Create connection
$con = mysqli_connect('setapproject.org', 'csc412', 'csc412', 'csc412');

if (mysqli_connect_errno($con)) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con, "SELECT * FROM YMCMB_table");

while ($row = mysqli_fetch_array($result)) {
    echo "<h3>" . $row['Name'] . "</h3>";
    echo "<p>" . $row['Quote'] . "</p>";
}

$name = $_POST['input_name'];
$quote = $_POST['input_quote'];
$sql = "INSERT INTO YMCMB_table (Name, Quote) VALUES ('$name','$quote')";

if (mysqli_query($con, $sql)) {
    echo "<h3>" . $name . "</h3>";
    echo "<p>" . $quote . "</p>";
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($con);
?>
    