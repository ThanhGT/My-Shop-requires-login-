<?php
    include('config.php');
    include('session.php');

    $sql = "SELECT `order_id`, `username`, `address`, `city`, `postal_code`, `province`, `num_prod_1`, `num_prod_2`, `num_prod_3`, `delivery_time`, `order_date` from orders;";

    $result = $db->query($sql);
    
?>
<?php include('header.php'); ?>

    <?php 
        if($result->num_rows > 0){
    ?>
        <p>Welcome <?php echo $_SESSION['name']; ?></p>
        <?php 
            if(isset($_GET['deleted']) && $_GET['deleted'] == 0){
                echo '<p>Sorry, could not delete.</p>';
            }
            if(isset($_GET['deleted']) && $_GET['deleted'] == 1){
                echo '<p>Deleted successfully</p>';
            }

        ?>
  
        <table>
            <thead>
                <tr>
                    <th>user_id</th>
                    <th>Username</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>Postal Code</th>
                    <th>Province</th>
                    <th>Number of Product 1</th>
                    <th>Number of Product 2</th>
                    <th>Number of Product 3</th>
                    <th>Delivery Time</th>
                    <th>Order Date</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    while($row = $result->fetch_assoc()){
                        /*echo '<pre>';
                        print_r($row);
                        echo '</pre>';*/
                ?>
                <tr>
                    <td><?php echo $row['order_id']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><?php echo $row['city']; ?></td>
                    <td><?php echo $row['postal_code']; ?></td>
                    <td>$<?php echo $row['province']; ?></td>
                    <td>$<?php echo $row['num_prod_1']; ?></td>
                    <td>$<?php echo $row['num_prod_2']; ?></td>
                    <td>$<?php echo $row['num_prod_3']; ?></td>
                    <td>$<?php echo $row['delivery_time'];?></td>
                    <td>$<?php echo $row['order_date'];?></td>
                    <td>
                        <a href="delete.php?id=<?php echo $row['order_id']; ?>">Delete</a><br/>
                    </td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    <?php 
        }
        else{
            echo "<p>No data to display</p>";
        }
    ?>
 <?php include('footer.php'); ?>