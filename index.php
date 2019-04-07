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
                    $projectsDirectory=opendir("./projects");
                    
                    // Gets each entry
                    while($entryName=readdir($projectsDirectory)) {
                        $projectsDirectoryArray[]=$entryName;
                    }

                    // Closes directory
                    closedir($projectsDirectory);
                    
                    // Counts elements in array
                    $indexCount=count($projectsDirectoryArray);

                    //Check if there are no projects in the projects folder
                    if ($indexCount == 2) {

                        $projectsFolderEmpty = 1;

                    }
                    else {

                        $projectsFolderEmpty = 0;

                    }

                    // Sorts files
                    sort($projectsDirectoryArray);

                    // Loops through the array of files
                    for($index=0; $index < $indexCount; $index++) {

                        // Decides if hidden files should be displayed, based on query above.
                        if(substr("$projectsDirectoryArray[$index]", 0, 1)!=$hide) {
                            
                            // Gets File Names
                            $name=$projectsDirectoryArray[$index];
                            $namehref=$projectsDirectoryArray[$index];

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
    <div class="container ui segment">
        <h2 class="ui center aligned header">Virtual Hosts</h2>
        <table class="ui celled table">
            <tbody>
                <tr>
                    <td><a href="http://mylittleproject.local">MyLittleProject</a></td>
                </tr>
            </tbody>
        </table>
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
    <div class="ui divider"></div>
    <div class="container ui segment">
        <h2 class="ui center aligned header">Open Source</h2>
        <table class="ui celled table">
            <tbody>
                
                <?php

                    // Opens directory
                    $openSourceDirectory=opendir("./opensource");
                    
                    // Gets each entry
                    while($entryName=readdir($openSourceDirectory)) {
                        $openSourceDirectoryArray[]=$entryName;
                    }

                    // Closes directory
                    closedir($openSourceDirectory);
                    
                    // Counts elements in array
                    $indexCount=count($openSourceDirectoryArray);

                    //Check if there are no projects in the opensource folder
                    if ($indexCount == 2) {

                        $openSourceFolderEmpty = 1;

                    }
                    else {

                        $openSourceFolderEmpty = 0;

                    }

                    // Sorts files
                    sort($openSourceDirectoryArray);

                    // Loops through the array of files
                    for($index=0; $index < $indexCount; $index++) {

                        // Decides if hidden files should be displayed, based on query above.
                        if(substr("$openSourceDirectoryArray[$index]", 0, 1)!=$hide) {
                            
                            // Gets File Names
                            $name=$openSourceDirectoryArray[$index];
                            $namehref=$openSourceDirectoryArray[$index];

                            // Output
                            echo ("
                            <tr>
                                <td><a href='./opensource/$namehref'>$name</a></td>
                            </tr>
                            ");
                        }
                    }

                    // Output if the projects folder is empty
                    if ($openSourceFolderEmpty) {
                        
                        // Output
                        echo ("
                        <tr>
                            <td>There are no projects installed in the opensource folder.</td>
                        </tr>
                        ");

                    }

                ?>

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
