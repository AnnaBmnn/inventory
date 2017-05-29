<?php 
include 'includes/config.php';

$query = $pdo->query('SELECT * FROM cheese_inventory');
$cheeses = $query->fetchAll();

include 'includes/handle_form.php';
include 'includes/delete_item.php';

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
        <title>Inventory Cheese</title>
        <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
        <link rel="stylesheet" href="src/css/main.css">
    </head>
    <body> 
        <div class="container">
           <!-- table inventory -->
            <div class="table-inventory">
                <div class="title">
                    <h1>Cheese inventory</h1>
                    <span class="yellow">.</span>
                </div>
                <div class="line table-title">
                    <div class="cell name">Cheese name</div>
                    <div class="cell type">Type of milk</div>
                    <div class="cell price">Price</div>
                    <div class="cell quantity">Quantity</div>
                    <div class="cell price-total">Total Price</div>
                    <div class="cell update">Update</div>
                    <div class="cell delete">Delete</div>
                </div>
                <div class="table-content">    
                    <?php foreach($cheeses as $_cheese): ?>
                    <!-- fill the table with the database info -->
                    <div class=line>
                        <div class="cell name">
                            <?= $_cheese->name ?>
                        </div>
                        <div class="cell type">
                            <?= $_cheese->type ?>
                        </div>
                        <div class="cell price">
                            <?= $_cheese->price . ' €/kg' ?>
                        </div>
                        <div class="cell quantity">
                            <?= $_cheese->quantity . ' kg' ?>
                        </div>
                        <div class="cell price-total">
                            <?= ($_cheese->price*$_cheese->quantity). ' €'?>
                        </div>
                        <div class="cell update"><a href='index.php?update=<?=$_cheese->id ?>' alt="update my cheese">update</a></div>
                        <div class="cell delete" data-index="<?=$_cheese->id ?>">
                            <a href='index.php?delete=<?=$_cheese->id ?>' alt="delete my cheese">x</a></div>            
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="add-form">
                <form action="#" method="post">
                    <div class="field">
                        <h2>
                            <?php
                            if( isset($_GET['update']) ){
                                echo 'update cheese';
                            } else {
                                echo 'add cheese';
                            }

                            ?>
                            <span class="yellow">.</span>
                        </h2>
                    </div>
                    <div class="field <?= array_key_exists('name',$error_messages)?'error':''?>">
                        <label for="name">Cheese name</label>
                        <input type="text" name="name" placeholder="My cheese" id="name" value="<?= $name ?>">
                        <div class="error-message"><?= array_key_exists('name',$error_messages)?$error_messages['name']:'' ?></div>
                    </div>  
                    <div class="field <?= array_key_exists('type',$error_messages)?'error':''?>">
                        <label for="type">Type of milk :</label>
                        <select name="type" id="type" >
                            <option value="" selected disabled >Type of milk</option>
                            <option value="cow" <?= $type=='cow'?'selected':'' ?>>cow</option>
                            <option value="sheep" <?= $type=='sheep'?'selected':'' ?>>sheep</option>
                            <option value="goat" <?= $type=='goat'?'selected':'' ?>>goat</option>
                            <option value="donkey" <?= $type=='donkey'?'selected':'' ?>>donkey</option>
                        </select>
                        <div class="error-message"><?= array_key_exists('type',$error_messages)?$error_messages['type']:'' ?></div>
                    </div>        
                    <div class="field <?= array_key_exists('price', $error_messages)?'error':''?>">
                        <label for="price">Price (€/kg)</label>
                        <input type="number" step="0.01" name="price" placeholder="10.00" id="price" value="<?= $price ?>">
                        <div class="error-message"><?= array_key_exists('price', $error_messages)?$error_messages['price']:'' ?></div>
                    </div>  
                    <div class="field <?= array_key_exists('quantity', $error_messages)?'error':'' ?>">
                        <label for="quantity">Quantity (kg)</label>
                        <input type="number" step="0.01" name="quantity" placeholder="20.00" value="<?=$quantity ?>" id="quantity">
                        <div class="error-message"><?= array_key_exists('quantity', $error_messages)?$error_messages['quantity']:'' ?></div>
                    </div>
                    <input type="submit" value="<?= isset($_GET['update'])?'update':'add'?>"</input>
                </form>
                <div class="button"><a href="pages/check_stock.php">Check stock</a></div>
            </div>
        </div>      
    </body>
</html>
