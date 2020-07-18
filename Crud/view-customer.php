<?php
require_once './Customer.php';
use App\classes\Customer;

$customer=new Customer();
$queryResult=$customer->getAllCustomerInfo();

if(isset($_GET['a'])) {
    $customer->deleteCustomerInfo($_GET['id']);
}

if(isset($_POST['btn'])){
    $queryResult=$customer->searchCustomerInfo();
    echo '<pre>';
    print_r($queryResult);
}

?>
<hr/>
    <a href="index.php">Add Customer</a> ||
    <a href="view-customer.php">View Customer</a>
<hr/>

<form action="" method="post">
    <table>
        <tr>
            <th>Enter Your Search Item</th>
            <td><input type="text" name="search_text"/></td>
        </tr>
        <tr>
            <th></th>
            <td><input type="submit" name="btn" value="Search"/></td>
        </tr>
    </table>
</form>

<table border="1" width="500">
    <tr>
        <th>Customer Id</th>
        <th>Customer Name</th>
        <th>Customer Address</th>
        <th>Customer Number</th>
        <th>Action</th>
    </tr>
    <?php while ( $customer=mysqli_fetch_assoc($queryResult)){ ?>
    <tr>
        <td><?php echo $customer['id']; ?></td>
        <td><?php echo $customer['name']; ?></td>
        <td><?php echo $customer['email']; ?></td>
        <td><?php echo $customer['mobile']; ?></td>
        <td>
            <a href="edit-customer.php?id=<?php echo $customer['id']; ?>">Edit</a>
            <a href="?a=delete&id=<?php echo $customer['id'];
            ?>"onclick="return confirm('Are you sure to delete this !!')">Delete</a>
        </td>
    </tr>
    <?php }?>
</table>
