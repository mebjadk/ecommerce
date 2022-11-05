<?php 
if (!isset($_SESSION['name'])){
    header('Location:admin_login_page.php');
}
?>
<!DOCTYPE html>
<html>
<body> 
  <br><br>
<h2 class='text-primary text-center'>Feedbacks from users and customers</h2>
<br><br>

<table class="table table-hover">
  <thead>
    <th class='text-center'>No of feedback</td>
    <th class='text-center'>Mailed by</td>
    <th class='text-center'>Email</td>
    <th class='text-center'>Message</td>
  </thead>

<?php
include "connection.php"; // Using database connection file here
$records = mysqli_query($dbconn,"select * from contact_us"); // fetch data from database
while($data = mysqli_fetch_assoc($records))
{
?>
  <tr>
    <td class='text-center'><?php echo $data['cid']; ?></td>
    <td class='text-center'><?php echo $data['cusername']; ?></td>
    <td class='text-center'><?php echo $data['cemail']; ?></td>
    <td class='text-center'><?php echo $data['cmessage']; ?></td>
  </tr>	
<?php
}
?>
</table>
</body>
</html>