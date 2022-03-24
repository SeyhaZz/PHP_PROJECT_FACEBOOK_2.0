<?php

// USERNAME
function validate_username($firstName, $lastName)
{
    $isValidName = TRUE;
    if (!empty($firstName) and !empty($lastName)) {
        for ($i=0; $i<strlen($firstName); $i++) {
            if (!ctype_alnum($firstName[$i])) {
                $isValidName = FALSE;
            }
        }
        for ($i=0; $i<strlen($lastName); $i++) {
            if (!ctype_alnum($lastName[$i])) {
                $isValidName = FALSE;
            }
        }
    } else {
        $isValidName = FALSE;
    }

    return $isValidName;
}

// EMAIL
function validate_email($email)
{
    $isValidEmail = FALSE;
    if (!empty($email)) {
        for ($i=0; $i<strlen($email); $i++) {
            if ($email[$i] == "@") {
                $isValidEmail = TRUE;
            }
        }
    }
    return $isValidEmail;
}

// PASSWORD
function validate_password($password, $cfpassword)
{
    $isValidPassword = FALSE;
    if (!empty($password) and !empty($cfpassword)) {
        if (strlen($password) >= 8 and strlen($password) <= 12 and strlen($cfpassword) >= 8 and strlen($cfpassword) <= 12 and $password === $cfpassword) {
            $isValidPassword = TRUE;
        }
    }
    return $isValidPassword;
}

// PHONE
function validate_phone($phone) 
{
    $isValidPhone = FALSE;
    if (!empty($phone)) {
        if (strlen($phone) >= 9 and strlen($phone) <= 12) {
            $isValidPhone = TRUE;
        }
    }
    return $isValidPhone;
}

?>