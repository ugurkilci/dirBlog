<?php
    header("Content-Type: text/xml");
    echo '<?xml version="1.0" encoding="UTF-8"?>';
    echo '
    <urlset
    xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
    xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
    xsi:schemaLocation="
    http://www.sitemaps.org/schemas/sitemap/0.9
    http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
    ';

    $a = opendir('s/posts/'); // Directory
    while ($o = readdir($a)) {
        if (!is_dir($o)){ // If the value in the file variable is not the folder
            if (strstr($o, ".txt")) {
                $t = str_replace('.txt', '', $o);
                echo '
    <url>
        <loc>https://site.com/'.$t.'</loc>
        <lastmod>'.date("Y").'-'.date("m").'-'.date("d").'T'.date("H:i:s").'+00:00</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.5000</priority>
    </url>';
            }
        }
    }
    
    echo '</urlset>';
