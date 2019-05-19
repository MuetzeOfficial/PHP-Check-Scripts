<?php
/**
 * Copyright (c) 2019 Norman Huth
 * contact@normanhuth.com
 *
 */

$ProjectName = 'My Script';
$RequiredPHP = '7.2.1';
//$Copyright = '© 2012 Example'; // Empty or comment out to deactivate

/*
 * Requirements - empty for none
 * */
$RequiredClasses = array(
    'DirectoryIterator',
    'PDO',
);
$RequiredFunctions = array(
    'nl2br',
    'strlen',
    'parse_url',
    'base64_encode',
    'base64_decode',
    'random_bytes',
    'file_get_contents',
    'password_verify',
    'password_hash',
    'openssl_cipher_iv_length',
    'openssl_random_pseudo_bytes',
    'openssl_encrypt',
    'openssl_decrypt',
    'hash_equals',
    'hash_hmac',
    'strtoupper',
    'basename',
    'filesize',
    'gmdate',
);

$RequiredExtensions = array(
    'xml',
    'session',
);
$NeedOnlyOnePDODriver = true; // false: Every PDO driver required | true: Only one PDO driver required (show only warning if missing, but one or more exist)
$RequiredPDODrivers = array(
    'mysql',
    'mysql2',
);

/********************************************************
 *
 * CONFIG END
 *
 * Copyright (c) 2019 Norman Huth
 * contact@normanhuth.com
 * License: MIT
 *
 * SCRIPT START
 *
 ********************************************************/

$available_row=$missing_row=$Extensions_row='';

if (!defined('PHP_VERSION_ID')) {
    $version = explode('.', PHP_VERSION);

    define('PHP_VERSION_ID', ($version[0] * 10000 + $version[1] * 100 + $version[2]));
}
$version = explode('.', $RequiredPHP);
define('Required_PHP_Version', ($version[0] * 10000 + $version[1] * 100 + $version[2]));

$RequiredFunctions=array_unique($RequiredFunctions);
$RequiredClasses=array_unique($RequiredClasses);
$RequiredExtensions=array_unique($RequiredExtensions);
$RequiredPDODrivers=array_unique($RequiredPDODrivers);
sort($RequiredFunctions);
sort($RequiredClasses);
sort($RequiredExtensions);
sort($RequiredPDODrivers);
$string = base64_decode(strrev('=4jdpR2L84TYvwDa0VHSg4WYtJ3bO5jIvZmbp1Cd4VGdi0zczFGbjBiIr5WYsJ2Xi0DdldmchRHIiwWYpNWamZ2TlpHdlVXTv02bj5iY1hGdpd2LvISPmVmcoBSY8ASeiBCdwlmcjNFI0NXZU5jIsxWYtNnI9M3chx2YgYXakxjPyhGP'));
foreach ($RequiredClasses as $class) {
    if(class_exists($class)) {
        $available_row.='<tr><td>Class: '.$class.'</td><td class="alert-success">Available<i class="fas fa-check fa-lg fa-fw text-success"></td></tr>';
    } else {
        $missing_row.='<tr><td class="alert-danger font-weight-bold"></i> Class: '.$class.'</td><td class="alert-danger">Not Available<i class="fas fa-times fa-lg fa-fw text-danger"></td></tr>';
    }
}
foreach ($RequiredExtensions as $Extensions) {
    if(extension_loaded($Extensions)) {
        $available_row.='<tr><td>Extensions: '.$Extensions.'</td><td class="alert-success">Available<i class="fas fa-check fa-lg fa-fw text-success"></td></tr>';
    } else {
        $missing_row.='<tr><td class="alert-danger font-weight-bold">Extensions: '.$Extensions.'</td><td class="alert-danger">Not Available<i class="fas fa-times fa-lg fa-fw text-danger"></td></tr>';
    }
}
$PDOAvailableDrivers = array();
if(class_exists('PDO')) {
    $PDOAvailableDrivers = PDO::getAvailableDrivers();
}
$i=0;
$j=count($PDOAvailableDrivers);
foreach ($RequiredPDODrivers as $driver) {
    if(isset($PDOAvailableDrivers) && in_array($driver,$PDOAvailableDrivers)) {
        $available_row.='<tr><td>PDO driver: '.$driver.'</td><td class="alert-success">Available<i class="fas fa-check fa-lg fa-fw text-success"></td></tr>';
    } else {
        $missing_row.='<tr><td class="alert-{msg} font-weight-bold">PDO driver: '.$driver.'</td><td class="alert-{msg}">Not Available<i class="fas fa-{icon} fa-lg fa-fw text-danger"></td></tr>';
        $i++;
    }
}
foreach ($RequiredFunctions as $function) {
    if(function_exists($function)) {
        $available_row.='<tr><td>Function: '.$function.'</td><td class="alert-success">Available<i class="fas fa-check fa-lg fa-fw text-success"></td></tr>';
    } else {
        $missing_row.='<tr><td class="alert-danger font-weight-bold">Function: '.$function.'</td><td class="alert-danger">Not Available<i class="fas fa-times fa-lg fa-fw text-danger"></td></tr>';
        $i++;
    }
}
if($NeedOnlyOnePDODriver && $i<$j) {
    $missing_row = str_replace('{msg}','warning',$missing_row);
    $missing_row = str_replace('{icon}','ban',$missing_row);
} else {
    $missing_row = str_replace('{msg}','danger',$missing_row);
    $missing_row = str_replace('{icon}','times',$missing_row);
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title><?php echo htmlspecialchars($ProjectName); ?></title>
    <link rel="shortcut icon"type="image/x-icon" href="data:image/x-icon;base64,AAABAAEAEBAQAAEABAAoAQAAFgAAACgAAAAQAAAAIAAAAAEABAAAAAAAgAAAAAAAAAAAAAAAEAAAAAAAAAAAAAAAkSRdAPXy9AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAARERERERERAREREREREREREREREREREREhERERESERESERERERIRERIiESESEiIREhEhIRISESESESEhEhIRIRIRISESEhEhEiIRIiESIhEREREhERERERERESERERERERERERERERERERERERERERERERERERERARERERERERCAAQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACAAQAA">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/solid.css" integrity="sha384-ioUrHig76ITq4aEJ67dHzTvqjsAP/7IzgwE7lgJcg2r7BRNGYSK0LwSmROzYtgzs" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/fontawesome.css" integrity="sha384-sri+NftO+0hcisDKgr287Y/1LVnInHJ1l+XC7+FOabmTTIK0HnE2ID+xxvJ21c5J" crossorigin="anonymous">
    <!--
    *
    * Script by (c) 2017 Norman Huth
    * contact@normanhuth.com
    * Licence: MIT
    *
    -->
    <style>
        body {
            max-width: 1000px;
            margin: 0 auto;
            background-color: #343a40;
            /**
             *
             * CSS Patern by Lea Verou
             * https://leaverou.github.io/css3patterns/
             *
             */
            background: linear-gradient(27deg, #151515 5px, transparent 5px) 0 5px,
            linear-gradient(207deg, #151515 5px, transparent 5px) 10px 0px,
            linear-gradient(27deg, #222 5px, transparent 5px) 0px 10px,
            linear-gradient(207deg, #222 5px, transparent 5px) 10px 5px,
            linear-gradient(90deg, #1b1b1b 10px, transparent 10px),
            linear-gradient(#1d1d1d 25%, #1a1a1a 25%, #1a1a1a 50%, transparent 50%, transparent 75%, #242424 75%, #242424);
            background-color: #131313;
            background-size: 20px 20px;
        }
        td:nth-child(2) {
            text-align: right;
            width: 25%;
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="card my-4 bg-dark text-light border border-secondary">
    <div class="card-header text-center">
        <h4 class="font-weight-bold">System Check for &quot;<?php echo htmlspecialchars($ProjectName); ?>&quot;</h4>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-dark table-hover m-0">
            <thead>
            <tr>
                <th scope="col">Required</th>
                <th scope="col" class="text-right">Server</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td<?php echo PHP_VERSION_ID<Required_PHP_Version ? ' class="alert-danger font-weight-bold"':''; ?>>PHP Version <?php echo $RequiredPHP ?></td>
                <td class="alert-<?php echo PHP_VERSION_ID<Required_PHP_Version ? 'danger':'success'; ?>">
                    <?php echo phpversion(); ?>
                </td>
            </tr>
            <?php
            echo $missing_row;
            echo $available_row;
            ?>
            </tbody>
        </table>
    </div>
    <div class="card-footer text-center">
        <?php echo isset($Copyright) && $Copyright!=''?$Copyright.$string:$string ?>
    </div>
</div>
</body>
</html>
