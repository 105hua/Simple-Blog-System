<?php

    function ValidateDetails($username, $password){

        if($username == '' || $password == '' || $username == null || $password == null){

            return false;

        }else{

            return true;

        }

    }

?>