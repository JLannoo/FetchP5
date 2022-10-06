<?php
    function getMetadata($project){
        $fileArray = $project->files;
            
        $metadataFile = array_values(array_filter($fileArray, function($file){
            return $file->name == "metadata.json";
        }));
    
        $metadata = null;
        if(count($metadataFile) > 0){
            $metadata = json_decode($metadataFile[0]->content);
        }

        return $metadata;
    }

    function parseProjectAPIResponse($response){
        $projects = array_map(function($project){
            $metadata = getMetadata($project);    

            return [
                "name" => $project->name,
                "link" => "https://editor.p5js.org/julianlannoo/full/".$project->id,
                "createdAt" => date("Y/m/d", strtotime($project->createdAt)),
                "description" => isset($metadata) ? $metadata->description : "",
                "visible" => isset($metadata) ? $metadata->visible : false
            ];
        }, json_decode($response));
        return $projects;
    }
?>