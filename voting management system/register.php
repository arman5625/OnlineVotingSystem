<?php
include 'includes/conn.php';
  $firstname = $_POST['firstname'];
  $F_name=$_POST['F_name'];
  $lastname = $_POST['lastname'];
  $voters_id = $_POST['voters_id'];
  $password = $_POST['password'];
  $cpassword = $_POST['cpassword'];
  $address = $_POST['address'];
  $image = $_FILES['Photo']['name'];
  $tmp_name = $_FILES['Photo']['tmp_name'];

  $vql = "SELECT * FROM voters";
  $query = $conn->query($vql);
  $voterp = mysqli_fetch_array($query);
   if($voterp['voters_id']!=$voters_id){
    echo'
    <script>
    alert("Data Not Found!");
    window.location = "register.html";
    </script>
    ';
    
   }

  else{

  if($password==$cpassword){
    
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
   
      move_uploaded_file($tmp_name, "images/$image");
      $sql = "SELECT * FROM voters where voters_id=$voters_id";
		$query = $conn->query($sql);
		$voter = mysqli_fetch_array($query);
  
    
    if($voter){
      if(($voter['voters_id']==$voters_id)&&($voter['firstname']==$firstname )&&( $voter['lastname']==$lastname)&&$voter['F_name']==$F_name){
      if($voter['stat']!=NULL){
        echo'
        <script>
        alert(" Already Registered Plz Log In");
        window.location = "index.php";
        </script>
        ';
  
      }
      else{
      
      $insert = mysqli_query($conn, "UPDATE voters SET firstname='$firstname', lastname='$lastname', password='$password', address='$address', photo='$image', stat=0 WHERE voters_id='".$voter['voters_id']."'");
      if($insert){
        echo'
      <script>
      alert("Registration successfull!");
      window.location = "index.php";
      </script>
      ';
    }
  
    else{
        echo'
      <script>
      alert("Registration Failed!");
      window.location = "register.html";
      </script>
      ';
     

    }
  } 
  
}
    
  
  else{
    echo'
    <script>
    alert("Data Not Found!");
    window.location = "register.html";
    </script>
    ';
  }
}
  

    
}
  else{
      echo'
      <script>
      alert("Password and Confirm Password are different!");
      window.location = "register.html";
      </script>
      ';
  }
}
?>