<?php

function is_logged_in()
{
    if (!isset($_SESSION['user_id'])) {
        echo header('Location: /workstreet/public/users/login');
    }
}

function show($arr)
{
    echo "<pre>";
    print_r($arr);
    echo "</pre>";
}
//execute query
function f_query($sql)
{
    global $conn;
    return $conn->query($sql);
}

function f_last_insert_id()
{
    global $conn;
    return $conn->lastInsertId();
}
//fetch single row
function f_get_row($sql, $arr = [])
{
    global $conn;
    $result = [];
    $stmt = $conn->prepare($sql);
    $stmt->execute($arr);

    $result = $stmt->fetch(PDO::FETCH_ASSOC);


    return $result;
}
//fetch all rows with prepared statements
/*
$sql = query
$arr = values in where clause
*/
function &f_get_rows($sql, $arr = [])
{
    global $conn;
    $result = [];
    $stmt = $conn->prepare($sql);
    $stmt->execute($arr);

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $result[] = $row;
    }


    return $result;
}
//get only single record in db
function f_get_one($sql, $arr = [])
{
    global $conn;
    $result = '';
    $stmt = $conn->prepare($sql);
    $stmt->execute($arr);

    $row = $stmt->fetch(PDO::FETCH_NUM);
    $result = $row[0];



    return $result;
}
//fetch in an indexed array
function f_get_ones($sql, $arr = [])
{
    global $conn;
    $result = [];
    $stmt = $conn->prepare($sql);
    $stmt->execute($arr);

    while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
        $result[] = $row[0];
    }


    return $result;
}
//array_map on db records
function f_get_map($sql, $arr = [])
{
    global $conn;
    $result = [];
    $stmt = $conn->prepare($sql);
    $stmt->execute($arr);

    while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
        $result[$row[0]] = $row[1];
    }


    return $result;
}
//for escaping string
function f_sanitize($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
//insert record to db
function f_insert($table, $map)
{
    $fields = '';
    $values = '';
    $mark = '';

    foreach ($map as $i => &$v) {
        $fields .= $mark . $i;
        $values .= $mark . "'" . f_sanitize($v) . "'";
        $mark = ', ';
    }
    $sql = "INSERT INTO $table($fields) VALUES ($values)";
    return f_query($sql);
}
//update record in db
function f_update($table, $map, $where)
{
    $sql = '';
    $mark = '';

    foreach ($map as $i => &$v) {
        $sql .= "$mark$i = '" . f_sanitize($v) . "'";
        $mark = ', ';
    }
    return f_query("UPDATE $table SET " . $sql . ($where ? " WHERE " . $where : ''));
}
//delete record in db
function f_delete($table, $where = '')
{
    return f_query("DELETE FROM $table" . ($where ? " WHERE " . $where : ''));
}
//function for creating combo box
function f_select_tag($name, $value, $map, $blank = false)
{
    $multiple = is_array($value) ? ' multiple' : '';
    $tag = "<select name=\"$name\"$multiple>\n";
    if ($blank !== false) {
        $tag .= "<option value=\"\">$blank</option>\n";
    }
    foreach ($map as $i => $v) {
        $selected = ($multiple ? in_array($i, $value) : ($i == $value)) ? ' selected="selected"' : '';
        $tag .= "<option value=\"$i\"$selected>$v</option>\n";
    }
    $tag .= "</select>\n";
    return $tag;
}

function check_for_errmsg()
{
    if (isset($_SESSION['error']) && $_SESSION['error'] != "") {
        echo $_SESSION['error'];
        unset($_SESSION['error']);
    }
}

//for validating user registration and update
function validate_user_registration($for_update = false, $user_profile = [])
{
    $website = f_sanitize($_POST['website']);
    $company = f_sanitize($_POST['company']);
    $user_email =  f_sanitize($_POST['email']);
    $password =  f_sanitize($_POST['password']);
    $confirm_password =  f_sanitize($_POST['confirm_password']);
    $address = f_sanitize($_POST['address']);
    $validationErr = [];

    // if (!preg_match('/^[a-z]*$/i', $firstname)) {
    //     $signupErr[] = "$firstname is not a valid name";
    // }
    // if (!preg_match('/^[a-z]*$/i', $lastname)) {
    //     $signupErr[] = "$lastname is not a valid name";
    // }

    //company
    if ($company == "") {
        $validationErr[] = "Company field must not be empty.";
    }

    //email address
    if ($user_email == "") {
        $validationErr[] = "Email field must not be empty.";
    } else if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
        $validationErr[] = "$user_email is not a valid email address";
    }
    //password
    if ($password == "") {
        $validationErr[] = "Password field must not be empty.";
    } else if (strlen($password) < 8) {
        $validationErr[] = "Password must contain atleast 8 characters";
    } else if ($password !== $confirm_password) {
        if (!$for_update) {
            $validationErr[] = "Password and Confirm password must match";
        } else {
            if ($user_profile['password'] != sha1($password)) {
                $validationErr[] = "Current password not match with entered password";
            } else if (request('new_password') != "" && request('new_password') !== request('confirm_password')) {
                $validationErr[] =  "New password not match with confirm password";
            }
        }
    }

    //website
    if ($website == "") {
        $validationErr[] = "Website field must not be empty.";
    } else if (!filter_var($website, FILTER_VALIDATE_URL)) {
        $validationErr[] = "Invalid website URL";
    }

    //address
    if ($address == "") {
        $validationErr[] = "Address field must not be empty.";
    }


    return $validationErr;
}


function validate_listing()
{
    $title = f_sanitize($_POST['title']);
    $tags = f_sanitize($_POST['tags']);
    $description =  f_sanitize($_POST['description']);
    $tags_regex = '/([a-z])+,/';


    $validationErr = [];

    //listing title
    if ($title == "") {
        $validationErr[] = "Title field must not be empty.";
    }

    //tags
    if ($tags == "") {
        $validationErr[] = "Tags field must not be empty.";
    } else if (!preg_match($tags_regex, $tags)) {
        $validationErr[] = "Tags field must be a comma separated value.";
    }

    //address
    if ($description == "") {
        $validationErr[] = "Description field must not be empty.";
    }

    return $validationErr;
}



function request($name, $array = false)
{
    if (!is_array($array)) {
        //        $array = $_REQUEST;
        $array = &$_REQUEST;
    }
    if (isset($array[$name]) && is_array($array[$name])) {
        $result = array();
        //        foreach($array[$name] as $key => $value)
        foreach ($array[$name] as $key => &$value) {
            $result[$key] = request($key, $array[$name]);
        }
        return $result;
    }
    $v = $array[$name] ?? NULL;
    return stripslashes($v);
}

function time_ago($timestamp)
{
    $time_ago = strtotime($timestamp);
    $current_time = time();
    $time_difference = $current_time - $time_ago;
    $seconds = $time_difference;
    $minutes      = round($seconds / 60);           // value 60 is seconds  
    $hours           = round($seconds / 3600);           //value 3600 is 60 minutes * 60 sec  
    $days          = round($seconds / 86400);          //86400 = 24 * 60 * 60;  
    $weeks          = round($seconds / 604800);          // 7*24*60*60;  
    $months          = round($seconds / 2629440);     //((365+365+365+365+366)/5/12)*24*60*60  
    $years          = round($seconds / 31553280);     //(365+365+365+365+366)/5 * 24 * 60 * 60  
    if ($seconds <= 60) {
        return "Just Now";
    } else if ($minutes <= 60) {
        if ($minutes == 1) {
            return "one minute ago";
        } else {
            return "$minutes minutes ago";
        }
    } else if ($hours <= 24) {
        if ($hours == 1) {
            return "about an hour ago";
        } else {
            return "$hours hrs ago";
        }
    } else if ($days <= 7) {
        if ($days == 1) {
            return "yesterday";
        } else {
            return "$days days ago";
        }
    } else if ($weeks <= 4.3) //4.3 == 52/12  
    {
        if ($weeks == 1) {
            return "a week ago";
        } else {
            return "$weeks weeks ago";
        }
    } else if ($months <= 12) {
        if ($months == 1) {
            return "a month ago";
        } else {
            return "$months months ago";
        }
    } else {
        if ($years == 1) {
            return "one year ago";
        } else {
            return "$years years ago";
        }
    }
}

function redirectTo($url)
{
    header('Location: ' . $url);
    die();
}

function unset_userSessions()
{
    unset($_SESSION['company_error']);
    unset($_SESSION['address_error']);
    unset($_SESSION['email_error']);
    unset($_SESSION['website_error']);
    unset($_SESSION['errors']);
}

function unset_listingSessions()
{
    unset($_SESSION['title_error']);
    unset($_SESSION['tags_error']);
    unset($_SESSION['description_error']);
    unset($_SESSION['errors']);
}
function is_admin()
{
    if ($_SESSION['user_role'] == 1) {
        return true;
    }
    return false;
}
