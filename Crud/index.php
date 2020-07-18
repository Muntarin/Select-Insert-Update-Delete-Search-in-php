<?php

require_once './Customer.php';
use App\classes\Customer;

$message='';
if(isset($_POST['btn'])){
    $customer= new Customer();
   $message= $customer->saveCustomerInfo();
}
?>
<hr/>
    <a href="index.php">Add Customer</a>
    <a href="view-customer.php">View Customer</a>
<hr/>
<h2><?php echo $message; ?></h2>

<form action="" method="POST">
    <table>
      <tr>
          <th>Name</th>
          <td><input type="text" name="name"/></td>
      </tr>
        <tr>
            <th>Email</th>
            <td><input type="email" name="email"/></td>
        </tr>
        <tr>
            <th>Mobile</th>
            <td><input type="number" name="mobile"/></td>
        </tr>
        <tr>
            <th></th>
            <td><input type="submit" name="btn" value="Submit"/></td>
        </tr>
    </table>
</form>
