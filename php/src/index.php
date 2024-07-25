<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Document</title>
</head>
<body>
    <?php
        $host = 'db';
        $user = 'MYSQL_USER';
        $pass = 'MYSQL_PASSWORD';
        $db = 'MYSQL_DATABASE';

        $conn = new mysqli($host, $user, $pass, $db);
        if ($conn->connect_error){
            die("Connection failed: " . $conn->connect_error);
        } else {
            echo "Connected to MySQL server successfully!";
        }

        $sql = "SELECT * FROM users";

        if ($result = $conn->query($sql)) {
            while($data = $result->fetch_object()) {
                $users[] = $data;
            }
        }

        echo "<ul>";
        foreach($users as $user) {
            echo "<li>";
            echo $user->first_name . " " . $user->last_name . " " . $user->age;
            echo "</li>";
        }
        echo "</ul>";
    ?>
</body>
</html>