<?php 
include '../includes/config.php';
include '../includes/handle_stock_form.php';

$query = $pdo->query('SELECT * FROM cheese_inventory WHERE quantity '.$sign.'"'. $limit.'"');

$low_quantity_cheeses = $query->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
        <title>Check the stock</title>
        <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
        <link rel="stylesheet" href="../src/css/main.css">
    </head>
    <body>
        <div class="container">
            <div class="table-inventory">
                <div class="title">
                    <h1>Check stock</h1>
                    <span class="yellow">.</span>
                </div>
                <div class="line table-title">
                    <div class="cell name">Cheese name</div>
                    <div class="cell type">Type of milk</div>
                    <div class="cell price">Price</div>
                    <div class="cell quantity">Quantity</div>
                    <div class="cell price-total">Total Price</div>
                </div>
                <div class="table-content">
                    <?php foreach($low_quantity_cheeses as $_cheese): ?>
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
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="add-form">
                <form action="#" method="post">
                    <div class="field">
                        <h2>
                            choose </br> a limit 
                        <span class="yellow">.</span>
                        </h2>
                    </div>
                    <span>Cheese where there is</span>
                    <div class="field">
                        <label>
                            <input type="radio" name="sign" value="<" <?= $sign == '<'? 'checked' : '' ?>>
                            less
                        </label>
                        <label>
                            <input type="radio" name="sign" value=">" <?= $sign == '>'? 'checked' : '' ?>>
                            more
                        </label>
                        <label>
                            <input type="radio" name="sign" value="=" <?= $sign == '='? 'checked' : '' ?>>
                            equal
                        </label>                       
                    </div>
                    <div class="field">
                        <input type="number" name="limit" step="0.01"  placeholder="Limit" id="limit" value="<?= $limit ?>">
                        <spans>kg</spans>
                    </div>
                    <input type="submit">
                </form>
            <div class="button"><a href="./index.php">Back to the inventory</a></div>
        </div>
        </div>       
    </body>
</html>