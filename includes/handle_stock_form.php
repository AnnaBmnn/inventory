<?php

    if(!empty($_POST))
    {
        $limit = $_POST['limit'];
        $sign = $_POST['sign'];
    }
    else
    {
        $sign = '<';
        $limit = '100';
    }