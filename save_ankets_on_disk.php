<?php

$time = time();

echo time(), "<br>";
$path_pref='murm/man/';
//require_once('work_with_dir.php');
require_once ('dbase.php');
$mans=  file_get_contents('murn_man.html');
preg_match_all('/u-name.*?\?hit/', $mans,$matches);

foreach ($matches[0] as $key => $value) {
   
    
    
    $url=str_replace('?hit','',(str_replace('u-name" href="','', $matches[0][$key])));
    $desc=fopen($path_pref.$key,'w+');
    echo $url,'<br>';
     //echo $desc,'<br>';
    $ch=curl_init();
      curl_setopt($ch,CURLOPT_FILE, $desc);
      curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);    
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Macintosh; U; PPC Mac OS X; en) AppleWebKit/125.2 (KHTML, like Gecko) Safari/125.8');
       curl_setopt($ch,CURLOPT_PROXY,'127.0.0.1');
      curl_setopt($ch,CURLOPT_PROXYPORT,9050);
      curl_setopt($ch,CURLOPT_PROXYTYPE,CURLPROXY_SOCKS5);
    $result=curl_exec($ch);
    //echo $result,"<br>";
        fwrite($desc,$result );
    
    
}

?>
