<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>localhost</title>
    <link rel="stylesheet" href="css/semantic.min.css">
</head>
<body>
    <h1 class="ui center aligned header">localhost</h1>
    <div class="ui divider"></div>
    <div class="container ui segment">
        <h2 class="ui center aligned header">Projects</h2>
        <table class="ui celled table">
            <tbody>

                <?php

                    // Adds pretty filesizes
                    function pretty_filesize($file) {
                        $size=filesize($file);
                        if($size<1024){$size=$size." Bytes";}
                        elseif(($size<1048576)&&($size>1023)){$size=round($size/1024, 1)." KB";}
                        elseif(($size<1073741824)&&($size>1048575)){$size=round($size/1048576, 1)." MB";}
                        else{$size=round($size/1073741824, 1)." GB";}
                        return $size;
                    }

                    // Checks to see if veiwing hidden files is enabled
                    if($_SERVER['QUERY_STRING']=="hidden") {
                        $hide="";
                        $ahref="./";
                        $atext="Hide";
                    }
                    else {
                        $hide=".";
                        $ahref="./?hidden";
                        $atext="Show";
                    }

                    // Opens directory
                    $myDirectory=opendir("./projects");
                    
                    // Gets each entry
                    while($entryName=readdir($myDirectory)) {
                        $dirArray[]=$entryName;
                    }

                    // Closes directory
                    closedir($myDirectory);
                    
                    // Counts elements in array
                    $indexCount=count($dirArray);

                    //Check if there are no projects in the projects folder
                    if ($indexCount == 2) {

                        $projectsFolderEmpty = 1;

                    }

                    // Sorts files
                    sort($dirArray);

                    // Loops through the array of files
                    for($index=0; $index < $indexCount; $index++) {

                        // Decides if hidden files should be displayed, based on query above.
                        if(substr("$dirArray[$index]", 0, 1)!=$hide) {
                            
                            // Gets File Names
                            $name=$dirArray[$index];
                            $namehref=$dirArray[$index];

                            // Output
                            echo ("
                            <tr>
                                <td><a href='./projects/$namehref'>$name</a></td>
                            </tr>
                            ");
                        }
                    }

                        // Output some additional folders when the show hidden files options is enabled
                    if ($hide == "") {

                        // Output
                        echo ("
                        <tr>
                            <td><a href='./projects'>Projects</a></td>
                        </tr>
                        ");

                    }

                    // Output if the projects folder is empty
                    if ($projectsFolderEmpty) {
                        
                        // Output
                        echo ("
                        <tr>
                            <td>There are no projects in the projects folder.</td>
                        </tr>
                        ");

                    }

                ?>

            </tbody>
        </table>
        <h2 class="ui center aligned header"><?php echo("<a href='$ahref'>$atext hidden files</a>"); ?></h2>
    </div>
    <div class="ui divider"></div>
    <div class="container ui segment">
        <h2 class="ui center aligned header">Tools</h2>
        <table class="ui celled table">
            <tbody>
                <tr>
                    <td><a href="./phpmyadmin">phpMyAdmin</a></td>
                </tr>
                <tr>
                    <td><a href="./phpinfo.php">phpInfo</a></td>
                </tr>
            </tbody>
        </table>
    </div>

    <style>
    .last.container {
        margin-bottom: 300px !important;
    }
    h1.ui.center.header {
        margin-top: 14px;
    }
    body {
        height: auto;
    }
    </style>
    
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/semantic.min.js"></script>
</body>
</html>
