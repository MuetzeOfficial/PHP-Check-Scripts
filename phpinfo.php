<?php
ob_start();
phpinfo();
$phpinfo = ob_get_contents();
ob_end_clean();
$title	 = preg_replace('%^.*<title>(.*)</title>.*$%ms', '$1', $phpinfo);
$phpinfo = preg_replace('%^.*<body>(.*)</body>.*$%ms', '$1', $phpinfo);
$phpinfo = preg_replace("/<a(.*?)>/", "<a$1 target=\"_blank\">", $phpinfo);
$phpinfo = str_replace('<table>','<table class="table table-bordered table-dark table-striped table-hover mb-0">',$phpinfo);
$phpinfo = str_replace('<td class="e">','<td class="w-25">',$phpinfo);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- title><?php echo strstr($title, ' -', true); ?></title -->
    <title><?php echo $title; ?></title>
    <link rel="shortcut icon"type="image/x-icon" href="data:image/x-icon;base64,AAABAAEAEBAQAAEABAAoAQAAFgAAACgAAAAQAAAAIAAAAAEABAAAAAAAgAAAAAAAAAAAAAAAEAAAAAAAAAAAAAAAkSRdAPXy9AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAARERERERERAREREREREREREREREREREREhERERESERESERERERIRERIiESESEiIREhEhIRISESESESEhEhIRIRIRISESEhEhEiIRIiESIhEREREhERERERERESERERERERERERERERERERERERERERERERERERERARERERERERCAAQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACAAQAA">
    <style>
        body {
            color: #fff;
            max-width: 1000px;
            margin: 0 auto;
            background-color: #343a40;
            /**
             *
             * CSS Patern by Lea Verou
             * https://leaverou.github.io/css3patterns/
             *
             */
            background:
                    linear-gradient(27deg, #151515 5px, transparent 5px) 0 5px,
                    linear-gradient(207deg, #151515 5px, transparent 5px) 10px 0px,
                    linear-gradient(27deg, #222 5px, transparent 5px) 0px 10px,
                    linear-gradient(207deg, #222 5px, transparent 5px) 10px 5px,
                    linear-gradient(90deg, #1b1b1b 10px, transparent 10px),
                    linear-gradient(#1d1d1d 25%, #1a1a1a 25%, #1a1a1a 50%, transparent 50%, transparent 75%, #242424 75%, #242424);
            background-color: #131313;
            background-size: 20px 20px;
        }
        td.v {
            word-break: break-word !important;
        }
        h1:not(.p),h2,h3 {
            text-align: center;
        }
        img {
            max-width: 100%;
            height: auto;
            float: right;
        }
        p {
            font-size: 80%;
            font-weight: 400;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="table-responsive">
        <?php echo $phpinfo; ?>
    </div>
</div>
</body>
</html>
