<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title> Upload file MySQL</title>
</head>

<body>
   
   <?php
  
   $con=mysqli_connect("localhost", "root", "Orion@1234", "project2");
    if(isset($_POST['btn'])){

        $deptname = $_FILES['myfiles']['deptname'];
        $shopname = $_FILES['myfiles']['shopname'];
        $docname = $_FILES['myfiles']['docname'];
        $pdf = file_get_contents($_FILES['myfile']['tmp_name']);

        $stmt = $con->prepare("insert into documents values(?,?,?,?)");
        $stmt->bindParam(1,$deptname);
        $stmt->bindParam(2,$shopname);
        $stmt->bindParam(3,$docname);
        $stmt->bindParam(4,$pdf);

        $stmt->execute();

        echo "hi";
    }
    ?>
    <form method = "post" enctype = "multipart/form-data">
        <input type="file" name ="myfile"/>
        <button name="btn">Upload File</button>
        
    </form>
<p></p>

</body>
</html>
