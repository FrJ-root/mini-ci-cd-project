<?php
$db_host = getenv('DB_HOST'); // We get this from AWS
$db_user = "admin";
$db_pass = "admin123";        // Simple password for this learning project
$db_name = "app_db";

echo "<h1>DevOps Project: WebApp (Public) + DB (Private)</h1>";
echo "<h2>Hello World</h2>";

if ($db_host) {
    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

    if ($conn->connect_error) {
        echo "<p style='color:red'>Connection to DB failed: " . $conn->connect_error . "</p>";
    } else {
        echo "<p style='color:green'>Successfully connected to Database!</p>";
        $sql = "SELECT message FROM messages LIMIT 1";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo "<h3>DB Message: " . $row["message"] . "</h3>";
        } else {
            echo "No results found.";
        }
        $conn->close();
    }
} else {
    echo "<p>DB_HOST environment variable not set.</p>";
}
?>
