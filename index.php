<?php
    require_once __DIR__.'/utils/fetchP5.php';
    require_once __DIR__.'/utils/parseProjectAPIResponse.php';

    $response = fetchP5();

    $projects = parseProjectAPIResponse($response);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link rel="apple-touch-icon" sizes="180x180" href="https://editor.p5js.org/favicon.ico">
    <link rel="icon" type="image/png" sizes="32x32" href="https://editor.p5js.org/favicon.ico">
    <title>List of projects</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="logo">
            <img src="https://editor.p5js.org/favicon.ico" alt="P5.js Icon">
            <h1>p5.js Projects</h1>
        </div>
        <a class="json_link" href="/json">See JSON</a>
    </header>
    <ul class="projects">
        <?php 
        foreach ($projects as $project) {
            if($project['visible']){
                echo <<<HTML
                <li class="project">
                    <a class="project__link" href="{$project['link']}" rel="noopener noreferrer" target="_blank">{$project['name']}</a>
                    <p class="project__description">{$project['description']}</p>
                    <p class="project__createdAt">Created at: {$project['createdAt']}</p>
                </li>
HTML;
            }
        }
        ?>
    </ul>
</body>
</html>
