<?php
//GROUP CONTRIBUTE
//Establish Connection
$conn = mysqli_connect("localhost","root","","cpsc351_ufoc");

if(!$conn)
{
    die(" OOPS Connection failed: " . mysqli_connect_error());
}

?>