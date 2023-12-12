<?php
include('include/con.php');
if(isset($_GET['id']) && isset($_GET['qty'])){
	$busid = $_GET['id'];
	$qty = $_GET['qty'];
	$email = $_SESSION['useremail'];
	$query1 = "SELECT id FROM users where email = '$email'";
	$q1 = mysqli_query($con,$query1);
	$res = mysqli_fetch_assoc($q1);
	$userID = $res['id'];
	$query="INSERT INTO `bookings`(`busID`, `userID`, `qty`) VALUES ('$busid','$userID','$qty')";
	$q2=mysqli_query($con,$query);
	$query2 = "SELECT * from buses where id ='$busid'";
	$q2=mysqli_query($con,$query2);
	$res = mysqli_fetch_assoc($q2);
	$seatsBooked = $res['seatsBooked'];
	$finalSeatsBooked = $seatsBooked + $qty;
	$query3 = "Update buses set seatsBooked ='$finalSeatsBooked' where id ='$busid'";
	echo $query3;
	$q3 = mysqli_query($con,$query3);
	echo "<script type='text/javascript'>alert('Bus Booked') </script>";
	echo "<script>window.location.href='index.php'</script>";
}
?>