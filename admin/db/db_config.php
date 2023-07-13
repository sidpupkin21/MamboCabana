<!--DB Config-->
<?php
$host = 'localhost';
$userN = 'root';
$pass = '';
$db   = 'momcaban';

$conn = mysqli_connect($host, $userN, $pass, $db);

if (!$conn) {
    die("Cannot Connect to Database" . mysqli_connect_error());
}

// function filternation($data){
//     foreach($data as $key => $value){
//         $data[$key] = trim($value);
//         $data[$key] = stripcslashes($value);
//         $data[$key] = htmlspecialchars($value);
//         $data[$key] = strip_tags($value);
//     }
//     return $data;
// }
function filternation($data)
{
    foreach ($data as $key => $value) {
        $value = trim($value);
        $value = stripslashes($value);
        $value = strip_tags($value);
        $value = htmlspecialchars($value);
        $data[$key] = $value;
    }
    return $data;
}

//Select Functions
function selectAll($table)
{
    $conn = $GLOBALS['conn'];
    $res = mysqli_query($conn, "SELECT * FROM $table");
    return $res;
}

function select($sql, $values, $datatypes)
{
    $conn = $GLOBALS['conn'];
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
        if (mysqli_stmt_execute($stmt)) {
            $res = mysqli_stmt_get_result($stmt);
            mysqli_stmt_close($stmt);
            return $res;
        } else {
            mysqli_stmt_close($stmt);
            die("Query Error execute - SELECT");
        }
    } else {
        die("Query Error prepare - SELECT");
    }
}

//update functions
function update($sql, $values, $datatypes)
{
    $conn = $GLOBALS['conn'];
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
        if (mysqli_stmt_execute($stmt)) {
            $res = mysqli_stmt_affected_rows($stmt);
            mysqli_stmt_close($stmt);
            return $res;
        } else {
            mysqli_stmt_close($stmt);
            die("Update Query Cannot be executed....Please Try Again");
        }
    } else {
        die("Update Query Cannot be executed....Please Try Again");
    }
}

//Insert Function
function insert($sql, $values, $datatypes)
{
    $conn = $GLOBALS['conn'];
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
        if (mysqli_stmt_execute($stmt)) {
            $res = mysqli_stmt_affected_rows($stmt);
            mysqli_stmt_close($stmt);
            return $res;
        }
        else{
            mysqli_stmt_close($stmt);
            die("Insert Query Cannot be executed....Please Try Again");
        }
    }
    else{
        die("Insert Query Cannot be executed....Please Try Again");

    }
}

//delete function
function delete($sql,$values,$datatypes){
    $conn = $GLOBALS['conn'];
    if($stmt = mysqli_prepare($conn,$sql)){
        mysqli_stmt_bind_param($stmt,$datatypes,...$values);
        if(mysqli_stmt_execute($stmt)){
            $res=mysqli_stmt_affected_rows($stmt);
            mysqli_stmt_close($stmt);
            return $res;
        }
        else{
            mysqli_stmt_close($stmt);
            die("Delete Query Cannot be executed....Please Try Again");
        }
    }
    else{
        die("Query Query Cannot be executed....Please Try Again");

    }
}



?>