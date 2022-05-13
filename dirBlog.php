<?php

function dirBlog() {
    $dir = 'posts'; // List what's in the folder

    $q = @$_GET["q"] . '.txt'; // GET

    $arr = []; // Empty array. Then this will list the files in the "posts" folder

    // "posts" list your folder
    $a = opendir($dir); // Directory
    while ($o = readdir($a)) {
        if (!is_dir($o)){ // If the value in the file variable is not the folder
            array_push($arr, $o);
        }
    }

    // Security /404
    if (in_array($q, $arr)) { // If the files are in

        $file = $dir . '/' . $q;
        $contents =  file_get_contents($file) ;

        return nl2br($contents);
    } else { // Or give an error
        return '<meta http-equiv="refresh" content="0;URL=/404">';
        exit;
    }
}

function get_string_between($string, $start, $end){
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
}

function markdown($text, $type = "") {
    if ($type) {
        if ($type == "title") {
            // Site Title
            $text = get_string_between($text, ";t ", ";");
            return $text;
        }
    
        if ($type == "description") {
            // Site Description
            $text = get_string_between($text, ";d ", ";");
            return $text;
        }
    
        if ($type == "keywords") {
            // Site Keywords
            $text = get_string_between($text, ";k ", ";");
            return $text;
        }

        if ($type == "image") {
            // Site Image
            $text = get_string_between($text, ";i ", ";");
            return $text;
        }
    } else {
        // /----
        // Delete metadata if used
        $oldtext = get_string_between($text, ";t ", ";");
        $text = str_replace(';t '.$oldtext.';', '', $text);

        $oldtext = get_string_between($text, ";k ", ";");
        $text = str_replace(';k '.$oldtext.';', '', $text);

        $oldtext = get_string_between($text, ";d ", ";");
        $text = str_replace(';d '.$oldtext.';', '', $text);

        $oldtext = get_string_between($text, ";i ", ";");
        $text = str_replace(';i '.$oldtext.';', '', $text);

        // ----/

        // BOLD
        $oldtext = get_string_between($text, "**", "**");
        $text = str_replace('**'.$oldtext.'**', '<b>'.$oldtext.'</b>', $text);

        // Italic
        $oldtext = get_string_between($text, "*", "*");
        $text = str_replace('*'.$oldtext.'*', '<i>'.$oldtext.'</i>', $text);

        // H6
        $oldtext = get_string_between($text, "###### ", "\n");
        $text = str_replace('###### '.$oldtext."\n", '<h6>'.$oldtext.'</h6>', $text);

        // H5
        $oldtext = get_string_between($text, "##### ", "\n");
        $text = str_replace('##### '.$oldtext."\n", '<h5>'.$oldtext.'</h5>', $text);

        // H4
        $oldtext = get_string_between($text, "#### ", "\n");
        $text = str_replace('#### '.$oldtext."\n", '<h4>'.$oldtext.'</h4>', $text);

        // H3
        $oldtext = get_string_between($text, "### ", "\n");
        $text = str_replace('### '.$oldtext."\n", '<h3>'.$oldtext.'</h3>', $text);

        // H2
        $oldtext = get_string_between($text, "## ", "\n");
        $text = str_replace('## '.$oldtext."\n", '<h2>'.$oldtext.'</h2>', $text);

        // H1
        $oldtext = get_string_between($text, "# ", "\n");
        $text = str_replace('# '.$oldtext."\n", '<h1>'.$oldtext.'</h1>', $text);

        // Image 
        $text = preg_replace('/!\[(.*?)\]\s*\(((?:http:\/\/|https:\/\/)(?:.+))\)/', '<img src="$2" class="img-fluid rounded shadow" alt="$1">', $text);
        
        // Link
        $text = preg_replace('/\[(.*?)\]\s*\(((?:http:\/\/|https:\/\/)(?:.+))\)/', '<a href="$2">$1</a>', $text);

        // HR
        $text = str_replace('---', '<hr>', $text);

        return $text;
    }
    
}
