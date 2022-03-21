<?php
session_start();

require_once('./require/Utils.php');
?>


<!DOCTYPE html>
<html>
<head>
  <style>
    <?php include './css/style.css'; ?>
  </style>
  <title>Customize</title>

   <div class="topnav11">
<style type="text/css">







img {
    border-radius: 5px;
    width: 100%;
}




.btn {
    width: 76%;
    color: rgb(244, 236, 241);
    font-weight: 700;
    font-size: 14px;
    letter-spacing: 1px;
    background: linear-gradient(to right, #9C27B0, #E040FB);
    padding: 10px 20px;
    border: none;
    border-radius: 20px;
    outline: none;
    box-sizing: border-box;
    border: 3px solid rgba(255, 255, 255, 0.81);
    margin-bottom: 50px;
    margin-left: 1px;
    text-align: center;
    margin-bottom: 27px;
    font-family: 'Ubuntu', sans-serif;}


  header{
  border: solid #9f8c8c;
  margin-top: -1%;
  background-color: #9012b599;
  border-radius: 5px;
  width: 100%;
  height: ;
  padding-top: 1%;
  padding-bottom: 1%;
  }
  button {
    background-color: #d2266f7d;
    border: solid #ffffff4a;
    border-radius: 5px;
    color: #141c1c;
    font-family: 'Ubuntu', sans-serif;
    letter-spacing: 1px;
    font-size: 110%;
    width: 12%;
    height: 115%;
    margin-bottom: 1%;
}

.add{

  cursor: pointer;
  border-radius: 5em;
  color: #fff;
  background: linear-gradient(to right, #9C27B0, #E040FB);
  border: 0;
  padding-left: 40px;
  padding-right: 40px;
  padding-bottom: 10px;
  padding-top: 10px;
  font-family: 'Ubuntu', sans-serif;
  margin-left: 12%;
  font-size: 13px;
  box-shadow: 0 0 20px 1px rgba(0, 0, 0, 0.04);
}


 /* Style inputs with type="text", select elements and textareas */
input[type=text], select, textarea {
  width: 100%; /* Full width */
  padding: 12px; /* Some padding */ 
  border: 1px solid #ccc; /* Gray border */
  border-radius: 4px; /* Rounded borders */
  box-sizing: border-box; /* Make sure that padding and width stays in place */
  margin-top: 6px; /* Add a top margin */
  margin-bottom: 16px; /* Bottom margin */
  resize: vertical /* Allow the user to vertically resize the textarea (not horizontally) */
}

/* Style the submit button with a specific background color etc */
input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

/* When moving the mouse over the submit button, add a darker green color */
input[type=submit]:hover {
  background-color: #45a049;
}

/* Add a background color and some padding around the form */
.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
} 


</style>

</head>
<header>
  
    <?php 

  if (!isset($_SESSION['email'])) {
    echo "<a class='btn' href='./auth/authentication.php'>Login</a>";
    echo "<a class='btn'  href='./auth/authentication2.php'>Register</a>";
      }
  else{

    if ($_SESSION['admin']==1) {
      echo "<a class='btn'  href='home.php'>Home</a>";
      echo "<a class='btn' href='profile.php' class='active' >Profile</a>";
      echo "<a class='btn' href='./Admin/Dashboard.php'>Users</a>";
      echo "<a class='btn' href='./Admin/users/add_user_details.php'>  Add user  </a>";
      echo "<a class='btn' href='./Admin/products/AddProductDetails.php'>  Add product  </a>";
      echo "<a class='btn' href='./Admin/orders.php'>  Orders  </a>";
      echo "<a class='btn' href='./Admin/COrders.php'>  Customized Orders  </a>";
      echo "<a class='btn' href='Logout.php'>Logout</a>";
     }

     else{
      echo "<a class='btn'  href='home.php'>Home</a>";
      echo "<a  class='btn' href='profile.php' class='active' >profile</a>";
      echo "<a class='btn'  href='preorderproducts.php'>My Orders</a>";
      echo "<a class='btn' href='customize_cake.php'>  Customizes Cake  </a>";
      echo "<a class='btn'  href='cutomize_cupcake.php'>Cutomize Cupcake</a>";
      echo "<a class='btn' href='Logout.php'>Logout</a>";
     } 

  }?>
   </div> 


</header>



<!DOCTYPE html>
<html>
<head>
  <title>Customize You Order</title>
</head>
<body>

  <h1>Customize You Cupcake</h1>


 <div class="container">
  
       <form action="submit_customised.php"
             method="POST"
             enctype="multipart/form-data">


  <br />


     <label for="type" name="type" >Type:</label>
    <select id="type" name="type"  class="form-control rounded-left" >
      <option value="Coconut Cupcakes">Coconut Cupcakes</option>
      <option value="Guinness">Guinness</option>
      <option value="Margarita Cupcakes">Margarita Cupcakes</option>
      <option value="Homemade Funfetti Cupcakes">Homemade Funfetti Cupcakes</option>
      <option value="Pumpkin Cupcakes">Pumpkin Cupcakes</option>
      <option value="Mocha Cupcakes">Mocha Cupcakes</option>
      <option value="Ultimate Chocolate Cupcakes">Ultimate Chocolate Cupcakes</option>
      <option value="Red Velvet Cupcakes">Red Velvet Cupcakes</option>
      <option value="Pumpkin Spice Latte Cupcakes">Pumpkin Spice Latte Cupcakes</option>
      <option value="Pumpkin Cupcakes">Pumpkin Cupcakes</option>
      <option value="Mocha Cupcakes">Mocha Cupcakes</option>


    </select> 






     <label for="cars" name="ingrediens" >Choose Some Ingrediens:</label>
    <select id="Ingrediens" name="ingrediens">
      <option value="Chocolat">Chocolat</option>
      <option value="Cream Cheese Frosting">Cream Cheese Frosting</option>
      <option value="Peanut Butter Frosting">Peanut Butter Frosting</option>
      <option value="Espresso Frosting">Espresso Frosting</option>
      <option value="Toasted Coconut Frosting">Toasted Coconut Frosting</option>

      
    </select> 

     <label for="size" name="size">Choose a Size:</label>
    <select id="size" name="size"  class="form-control rounded-left" >
      <option value="1.18">1.18-inch</option>
      <option value="1.97">1.97-inch</option>
      <option value="2.76">2.76-inch</option>
    </select> 


     <label for="size">Number Of Piece:</label>
    <select id="size" name="numbers"  class="form-control rounded-left" >
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
      <option value="6">6</option>
      <option value="7">7</option>
      <option value="8">8</option>
    </select> 


    <label for="subject">Description:</label>
    <textarea id="subject" name="description" placeholder="Write something.." style="height:200px"></textarea>

    <input type="submit" value="Submit" name="submit"></button>

  </form>
</div> 





</body>
</html>