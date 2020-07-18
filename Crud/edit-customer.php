<?php

require_once './Customer.php';
use App\classes\Customer;

$customer=new Customer();
$queryResult=$customer-> getCustomerInfoById($_GET['id']);
$data=mysqli_fetch_assoc($queryResult);

if(isset($_POST['btn'])){
   // $customer->updateCustomerInfo($_GET['id']);
    $customer->updateCustomerInfo();
}

//echo '<pre>';
//print_r($data);


        //echo $_GET['id'];
?>


<hr/>
<a href="index.php">Add Customer</a> ||
<a href="view-customer.php">View Customer</a>
<hr/>


<form action="" method="POST">
    <table>
        <tr>
            <th>Name</th>
            <td><input type="text" value="<?php echo $data['name']; ?>"  required name="name"/></td>
            <td><input type="hidden" value="<?php echo $data['id']; ?>"  required name="id"/></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><input type="email"value="<?php echo $data['email']; ?>"  required name="email"/></td>
        </tr>
        <tr>
            <th>Mobile</th>
            <td><input type="number"value="<?php echo $data['mobile']; ?>" required name="mobile"/></td>
        </tr>
        <tr>
            <th></th>
            <td><input type="submit" name="btn" value="Update"/></td>
        </tr>
    </table>
</form>

