<?php

include('dbConnect.php');

if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $age = $_POST['age'];
    $course = $_POST['course'];
    $school_name = $_POST['school_name'];


    $insertNewUser = mysqli_query($con,"INSERT INTO users (name, age, course, school_name) VALUES('$name', '$age', '$course', '$school_name')");

    if($insertNewUser){
        echo "New record created successfully";
    } else {
        echo "Error: ". mysqli_error($con);
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CREATE Operation</title>
</head>
<style>
   table {
        width: 78rem;
        
   }
   table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        height: 50px;
        text-align: center;
        align-items: center;
    }
    

</style>
<body>
    <h1>Create Operation</h1>
    <form action="index.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="age">Age:</label>
        <input type="number" id="age" name="age" required><br><br>

        <label for="course&year">Course:</label>
        <input type="text" id="course" name="course" required><br><br>

        <label for="school_name">School Name:</label>
        <input type="text" id="school_name" name="school_name" required><br><br>


        <input type="submit" name="submit" value="Submit">
    </form>

    <hr>

   

    <table style="border: 1px solid black;">
        <thead style="Font-size: 25px;">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Age</th>
                <th>Course</th>
                <th>School Name</th>
            </tr>
        </thead>

        <tbody>

            <?php

                $result = mysqli_query($con,"SELECT * FROM users");

                if(mysqli_num_rows($result) != 0){

                    $count = 0;

                    while($users = mysqli_fetch_array($result)){
                        $count++;
                        echo "<tr>
                                <td>".$count."</td>
                                <td>".$users['name']."</td>
                                <td>".$users['age']."</td>
                                <td>".$users['course']."</td>
                                <td>".$users['school_name']."</td>
                              </tr>";
                    }

                }else{
                    echo "<tr>
                            <td colspan='6'>No Records Found</td>
                          </tr>";
                } 


            ?>

        </tbody>
    </table>
</body>
</html>
