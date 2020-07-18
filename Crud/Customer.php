<?php
namespace App\classes;

class Customer
{
    public function saveCustomerInfo(){
        //$data=(object)$_POST;
        extract($_POST);

       $link=mysqli_connect('localhost','root','','customer');
      //echo "<pre>";
      //print_r($link);
        $sql="INSERT INTO customers (name,email,mobile) VALUES ('$name','$email','$mobile') ";

       // $sql="INSERT INTO customers (name,email,mobile) VALUES ('$_POST[name]','$_POST[email]','$_POST[mobile]') ";
       // $sql="INSERT INTO customers (name,email,mobile) VALUES ('$data->name','$data->email','$data->mobile') ";
        if(mysqli_query($link,$sql)){
            return" Student info save successfully";
        }else{
            die( "Query Problem".mysqli_error($link));
        }

    }
    public function getAllCustomerInfo(){

        $link = mysqli_connect('localhost', 'root', '', 'customer');
        $sql="SELECT * FROM customers";

        if( $queryResult=mysqli_query($link,$sql)){

            return  $queryResult;
        /*
          while ($customer=mysqli_fetch_assoc( $queryResult)) {

              echo '<pre>';
              print_r($customer);
              //echo $customer;

              echo '<pre>';
              print_r($queryResult);
          }*/

        }else{
            die( "Query Problem".mysqli_error($link));
        }

    }
    public function getCustomerInfoById($id){
        $link = mysqli_connect('localhost', 'root', '', 'customer');
        $sql="SELECT * FROM customers WHERE  id ='$id'";
        if( $queryResult=mysqli_query($link,$sql)){
            return  $queryResult;
        }else{
            die( "Query Problem".mysqli_error($link));
        }

    }
    public function updateCustomerInfo(){
        extract($_POST);
        $link = mysqli_connect('localhost', 'root', '', 'customer');
        $sql= "UPDATE customers SET name = '$name',email= '$email',mobile='$mobile' WHERE id='$id'";
        if( mysqli_query($link,$sql)){
           header('Location:view-customer.php');
        }else{
            die( "Query Problem".mysqli_error($link));
        }

    }
    public function deleteCustomerInfo($id){
        $link = mysqli_connect('localhost', 'root', '', 'customer');
        $sql="DELETE FROM customers WHERE id='$id'";
        if( mysqli_query($link,$sql)){
            header('Location:view-customer.php');
        }else{
            die( "Query Problem".mysqli_error($link));
        }

    }
    public function searchCustomerInfo(){
        extract($_POST);
        $link = mysqli_connect('localhost', 'root', '', 'customer');
        $sql="SELECT  * FROM customers WHERE name LIKE '%$search_text%' 
        || email LIKE '%$search_text%' || mobile LIKE '%$search_text%' ";
        if( $queryResult=mysqli_query($link,$sql)){
           return $queryResult;
        }else{
            die( "Query Problem".mysqli_error($link));
        }

    }



}