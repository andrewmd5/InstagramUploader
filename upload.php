<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 9/26/2014
 * Time: 5:59 AM
 */
include_once("InstagramUploader.php");
function randomString($length, $type = '')
{

    // Select which type of characters you want in your random string

    switch ($type)
    {
        case 'num':

            // Use only numbers

            $salt = '136262215';
            break;

        case 'lower':

            // Use only lowercase letters

            $salt = 'abcdefghijklmnopqrstuvwxyz';
            break;

        default:

            // Use uppercase, lowercase, numbers, and symbols

            $salt = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
            break;
    }

    $rand = '';
    $i = 0;
    while ($i < $length)
    { // Loop until you have met the length
        $num = rand() % strlen($salt);
        $tmp = substr($salt, $num, 1);
        $rand = $rand . $tmp;
        $i++;
    }

    return $rand; // Return the random string
}

function make_links_clickable($text)
{
    return preg_replace('!(((f|ht)tp(s)?://)[-a-zA-Zа-яА-Я()0-9@:%_+.~#?&;//=]+)!i', '<a href="$1">$1</a>', $text);
}

$valid_formats = array( "gif",
    "jpeg",
    "jpg",
    "png");
$max_file_size = 20000000;
$count = 0;
// Сheck that we have a file
foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ){
    $file_name = $key.$_FILES['files']['name'][$key];

    $temp = explode(".",  $file_name);
    $extension = end($temp);
    $random_name = randomString(7);
    if ((($_FILES['files']['type'][$key] == "image/gif") || ($_FILES['files']['type'][$key] == "image/jpeg") || ($_FILES['files']['type'][$key] == "image/jpg") || ($_FILES['files']['type'][$key] == "image/pjpeg") || ($_FILES['files']['type'][$key] == "image/x-png") || ($_FILES['files']['type'][$key] == "image/png")) && ($_FILES['files']['size'][$key] < 20000000) && in_array(strtolower($extension), $valid_formats))
    {
        if ($_FILES["file"]["error"][$key] > 0)
        {
            echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
            die();
        } else {
            if (file_exists("uploads/" . $random_name . "." . $extension))
            {
                die("Some how file exist?");
            } else {
                $caption = "";
                $username = "";
                $password = "";
                if (!empty($_POST["caption"])) {
                    $caption = $_POST["caption"];
                }
                if (!empty($_POST["password"])) {
                    $password = $_POST["password"];
                }
                if (!empty($_POST["username"])) {
                    $username = $_POST["username"];
                }

                move_uploaded_file($_FILES['files']['tmp_name'][$key], "uploads/" . $random_name . "." . $extension);
                $fileName = $random_name . "." . $extension;
                $instagram = new InstagramUploader($username, $password, $caption, $fileName);
                $instagram->PostImage();
                echo "$fileName uploaded";
            }
        }
    } else {
        echo 'Invalid file, supported types. ["gif", "jpeg", "jpg", "png"]';
    }
}
