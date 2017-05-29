<?php
    $error_messages = Array();
    $success_messages = Array();

//check if a new item is add
    if(!empty($_POST)){
        
        if(!isset($_POST['type'])){
            $_POST['type'] = '';
        }

        $name = trim($_POST['name']);
        $type = $_POST['type'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        
        if(empty($name))                                //test if field are not empty or number negative
            $error_messages['name'] = 'Name should not be empty';
        else {
            foreach($cheeses as $_cheese){
                if($name == $_cheese->name && $_GET['update'] != $_cheese->id)
                    $error_messages['name'] = 'This cheese already exist';                
            }

        }
        
        if(empty($type))
            $error_messages['type'] = 'The type of milk has to be define';
        else if(!in_array($type, array('cow', 'donkey', 'sheep', 'goat' )))
            $error_messages['type'] = 'Incorrect type of milk';
            
        if(empty($price))
            $error_messages['price'] = 'The price has to be define';
        else if($price <= 0)
            $error_messages['price'] = 'The price can not be negative or nul';
        
        if(empty($quantity))
            $error_messages['quantity'] = 'The quantity has to be define';
        else if($quantity <= 0)
            $error_messages['quantity'] = 'The quantity can not be negative or nul';
        if(empty($error_messages)){
        
        if(isset($_GET['update'])){             //test if we upadte something for a different SQL request
            $prepare = $pdo->prepare('UPDATE cheese_inventory SET name = :name, price = :price, type= :type, quantity= :quantity WHERE id = :id');
            $prepare -> bindValue('id',$_GET['update']);
        }
        else{                           //SQL request when we add something
            $prepare = $pdo->prepare('INSERT INTO cheese_inventory (name, type, price, quantity) VALUES (:name, :type, :price, :quantity)');
        }
        $prepare -> bindValue('name',$name);
        $prepare -> bindValue('type', $type);
        $prepare -> bindValue('price', $price);
        $prepare -> bindValue('quantity', $quantity);
        $prepare -> execute();
        header('Location: index.php');  
            //relaunch the page so that the table update

        }
    }
    else {
        if(isset($_GET['update'])){         //fill in the fields with information of the update item
            $query = $pdo->query('SELECT * FROM cheese_inventory WHERE id='. $_GET['update']);
            $cheese_update = $query->fetchAll();
            
            $name = $cheese_update[0]->name;
            $price = $cheese_update[0]->price;
            $quantity = $cheese_update[0]->quantity;
            $type = $cheese_update[0]->type;
            

        }
        else {
            $name = '';
            $price = '';
            $quantity = '';
            $type = '';            
        }
    }


