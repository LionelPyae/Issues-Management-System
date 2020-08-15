<?php

defined('Function') or die("NOT With me my friend");

$ip_address = $_SERVER['REMOTE_ADDR'];
$prev_page = $_SERVER['HTTP_REFERER'];
$DateTime = date("Y:m:d H:i:s");

function check_var($var) {
    $var = filter_var($var, FILTER_SANITIZE_MAGIC_QUOTES);
    $var = strip_tags($var);
    $var = htmlspecialchars($var);
    $var = stripcslashes($var);
    return $var;
}

function check_empty($var) {
    if ($var != "" AND ! empty($var) AND isset($var)) {
        return $var;
    } else {
        return FALSE;
    }
}

function check_name($var) {
    $var = check_var($var);
    $NAME_PATTERN = "/^[a-z, A-Z]*$/";
    if (check_empty($var) != FALSE) {
//        $var = preg_match($NAME_PATTERN, $var);
        $var = filter_var($var, FILTER_SANITIZE_STRING);
        return $var;
    } else {
        return FALSE;
    }
}

function check_str($var) {
    $var = check_var($var);
    $STRING_PATTERN = "/^[A-Za-z\\- \']+$/";
    if (check_empty($var) != FALSE) {
        $var = filter_var($var, FILTER_SANITIZE_STRING);
        return $var;
    } else {
        return FALSE;
    }
}

function check_phone($var) {
    $var = check_var($var);
//    $PHONE_PATTERN = "/^[0-9]{10}+$/";
    if (check_empty($var) != FALSE) {
        $var = filter_var($var, FILTER_SANITIZE_NUMBER_INT);
        return $var;
    } else {
        return FALSE;
    }
}

function check_email($var) {
    $var = check_var($var);
    if (check_empty($var) != FALSE) {
        $var = filter_var($var, FILTER_VALIDATE_EMAIL);
        if (!$var) {
            return FALSE;
        } else {
            $var = filter_var($var, FILTER_SANITIZE_EMAIL);
            return $var;
        }
    } else {
        return FALSE;
    }
}
function check_url($var) {
    $var = check_var($var);
    if (check_empty($var) != FALSE) {
//        $var = filter_var($var, FILTER_VALIDATE_URL);
        if (!$var) {
            return FALSE;
        } else {
            $var = filter_var($var, FILTER_SANITIZE_URL);
            return $var;
        }
    } else {
        return FALSE;
    }
}

function check_int($var) {
    $var = check_var($var);
    if (check_empty($var) != FALSE) {
        $var = filter_var($var, FILTER_SANITIZE_NUMBER_INT);
        return $var;
    }
}

function file_upload($path, $file_name, $temp_name) {
    if (is_uploaded_file($temp_name) AND $path != "") {
        $ext = pathinfo($file_name, PATHINFO_EXTENSION);
        $ext = check_img($ext);
        if ($ext != FALSE) {
            $filename = date("d-m-Y") . "-" . time() . "." . $ext;
            $target_path = $path . $filename;
            move_uploaded_file($temp_name, $target_path);
            return $filename;
        } else {
            $err = "Incorrect_Img";
            return $err;
        }
    } else {
        return FALSE;
    }
}

function check_img($ext) {
    switch ($ext) {
        case png OR PNG:
            return png;
            break;
        case jpg OR JPG:
            return jpg;
            break;
        case jpeg OR jpeg:
            return jpeg;
            break;
        case gif OR GIF:
            return gif;
            break;
        default:
            return FALSE;
    }
}

function redirect($path) {
    $loc = header("location:$path");
    return $loc;
}

?>
