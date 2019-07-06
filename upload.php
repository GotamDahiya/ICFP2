<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title> Connec upload MySQL</title>
</head>

<body>
<form method = "post" enctype = "multipart/form-data">
        <input type="file" name ='myfile'/>
        <button name="btn">Upload File</button>
        
    </form>
<p></p>
    <?php
    echo "hi </br>";

if(isset($_POST['btn'])){

    $file = $_FILES['myfile'];
    $filename = $_FILES['myfile']['tmp_name'];
    echo $filename;
    
    $mysqli=mysqli_connect('localhost','root','Orion@1234','project2');
    
    if (!$mysqli)
        die("Can't connect to MySQL: ".mysqli_connect_error());
    
    $stmt = $mysqli->prepare("INSERT INTO documents(doc) VALUES(?)");
    $null = NULL;
    $stmt->bind_param("b", $null);
    
    $stmt->send_long_data(0, file_get_contents($filename));
    
    echo " before exec ";
   
    $stmt->execute();
    
    echo " </br> done with execution ";
}
?>


</body>
</html