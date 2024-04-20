<?php
$con=mysqli_connect("localhost","root","anini17","loginsystem");
if(isset($_POST['login_submit'])){
	$username=$_POST['username'];
	$password=$_POST['password'];
	$query="select * from logintb where username='$username' and password='$password'";
	$result=mysqli_query($con,$query);
	if(mysqli_num_rows($result)==1)
	{
		header("Location:admin-panel.php");
	
}
	else
    {
        echo "<script>alert('error login')</script>";
        echo "<script>window.open('admin-panel.php','_self')</script>";
    }
    }
if(isset($_POST['pat_submit']))
{
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $contact=$_POST['contact'];
    $docapp=$_POST['docapp'];
    $query="insert into doctorapp(fname,lname,email,contact,docapp)values('$fname','$lname','$email','$contact','$docapp')";
     $result=mysqli_query($con,$query);
    if($result)
    {
      echo "<script>alert('Member added.')</script>";
        echo "<script>window.open('admin-panel.php','_self')</script>";
    }
    } 
    if(isset($_POST['tra_submit']))
    {
        $Trainer_id=$_POST['Trainer_id'];
        $Name=$_POST['Name'];
        $phone=$_POST['phone'];
        $query="insert into Trainer(Trainer_id,Name,phone)values('$Trainer_id','$Name','$phone')";
         $result=mysqli_query($con,$query);
        if($result)
        {
          echo "<script>alert('Trainer added.')</script>";
            echo "<script>window.open('admin-panel.php','_self')</script>";
        }
        } 
        if(isset($_POST['pay_submit']))
        {
            $Payment_id=$_POST['Payment_id'];
            $Amount=$_POST['Amount'];
            $customer_id=$_POST['customer_id'];
            $payment_type=$_POST['payment_type'];
            $customer_name=$_POST['customer_name'];
            $query="insert into Payment(Payment_id,Amount,customer_id,payment_type,customer_name)values('$Payment_id','$Amount','$customer_id','$payment_type','$customer_name')";
             $result=mysqli_query($con,$query);
            if($result)
            {
              echo "<script>alert('Payment sucessfull.')</script>";
                echo "<script>window.open('admin-panel.php','_self')</script>";
            }
            } 
 function get_patient_details(){
    global $con;
    $query="select * from doctorapp";
    $result=mysqli_query($con,$query);
    while ($row=mysqli_fetch_array($result)){
         $fname=$row ['fname'];
    $lname=$row['lname'];
    $email=$row['email'];
    $contact=$row['contact'];
    $docapp=$row['docapp'];
      echo "<tr>
          <td>$fname</td>
        <td>$lname</td>
            <td>$email</td>
            <td>$contact</td>
          <td>$docapp</td>
        </tr>";
    }
}
function get_package(){
    global $con;
    $query="select * from Package";
    $result=mysqli_query($con,$query);
    while($row=mysqli_fetch_array($result)){
        $packageId=$row['Package_id'];
        $packageName=$row['Package_name']; // Corrected to $packageName
        $amount=$row['Amount']; // Corrected to $amount
        echo "<tr>
                <td>$packageId</td>
                <td>$packageName</td>
                <td>$amount</td>
            </tr>";
    }
}

function get_trainer(){
    global $con;
    $query="select * from Trainer";
    $result=mysqli_query($con,$query);
    while($row=mysqli_fetch_array($result)){
        $trainerId=$row['Trainer_id'];
        $trainerName=$row['Name']; // Corrected to $trainerName
        $phone=$row['phone'];
        echo "<tr>
                <td>$trainerId</td>
                <td>$trainerName</td> <!-- Corrected variable name to $trainerName -->
                <td>$phone</td>
            </tr>";
    }
}


function get_payment(){
    global $con;
    $query="select * from Payment";
    $result=mysqli_query($con,$query);
    while($row=mysqli_fetch_array($result)){
        $paymentId=$row['Payment_id']; // Corrected to $paymentId
        $amount=$row['Amount']; // Corrected to $amount
        $paymentType=$row['payment_type']; // Corrected to $paymentType
        $customerId=$row['customer_id']; // Corrected to $customerId
        $customerName=$row['customer_name']; // Corrected to $customerName
        
        echo "<tr>
                <td>$paymentId</td>
                <td>$amount</td> <!-- Corrected variable name to $amount -->
                <td>$paymentType</td>
                <td>$customerId</td>
                <td>$customerName</td>
            </tr>";
    }
}




?>