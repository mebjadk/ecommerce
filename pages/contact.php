<?php
include('connection.php');
$placed="";
if (isset($_POST['mail']))
{
    $cusername = $_POST['fullname'];
    $cemail = $_POST['email'];
    $cmessage = $_POST['message'];
    $query = "INSERT INTO contact_us (cid, cusername, cemail, cmessage) 
         VALUES ('Null', '$cusername', '$cemail', '$cmessage')";
    if(mysqli_query($dbconn, $query))
    {
        $placed = "your mail is sent";
    }
}
?>
<html>
	<br><br>
<div class="container" style="padding: 5px;">
		<div class="row">
			<div id="map" class="col-md-6">
	
			</div>
			<div class="col-md-6">
            <form action='index.php?page=pages/contact' method='post' style="background-color: lightgoldenrodyellow; padding: 5px; border-radius: 5px;">
			<br>
	            <div class="form-group">
		            <input type="text" class="form-control" name='fullname' placeholder="Enter your name" required > <br>
	            </div>
	            <div class="form-group">
		            <input type="email" class="form-control" name='email' placeholder="Enter your email"required > <br>
	            </div>
	            <div class="form-group">
	                <div class="form-group shadow-textarea">
		                <textarea class="form-control z-depth-1" id="" rows="3" name='message' placeholder="Write your feedback..." required ></textarea><br><br>
	                </div>
	            </div>
                <div>
                    <h3 class="text-success"><?php echo $placed; ?></h3>
                </div>
	            <button type="submit" class="btn btn-info" name='mail'>Send Feedback</button>
            </form> 
			</div>
		</div>
	</div>
</html>