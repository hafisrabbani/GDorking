<?php

error_reporting(0);

function dorking(string $dork): void
{
    for ($i = 2; $i <= 100; $i++) {


        $sa = curl_init();
        curl_setopt($sa, CURLOPT_URL, "https://www.google.com/search?q=$dork");
        curl_setopt($sa, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($sa, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($sa, CURLOPT_USERAGENT, "Google Bot");
        curl_setopt($sa, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($sa, CURLOPT_SSL_VERIFYHOST, 0);
        $result = curl_exec($sa);

        preg_match_all('/a href="(.*?)"/i', $result, $a);
        echo $a[1][$i];
        echo "\n";
    }
}

echo "Your Dork -> ";
$dor = trim(fgets(STDIN));
echo "\n";
$dork = urlencode($dor);
echo "Dorking...\n";
dorking($dork);
