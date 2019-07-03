<?php

$con=mysqli_connect("localhost","root","Orion@1234","project2");
$query=mysqli_query($con,"SELECT * FROM department");
$numrows=mysqli_num_rows($query);
if($numrows>0)
{
	while($row=mysqli_fetch_assoc($query))
	{
		$deptname=$row['deptname'];
		echo "Department no.: ".$row['deptno']."<br>";
		echo "Department name: ".$row['deptname']."<br>";
		$_SESSION['sess_deptname']=$deptname;
		echo "<a href='hod.php'>'".$row['deptname']."'</a><br>";
	}
}
else
{
	echo "No departments";
}
?>