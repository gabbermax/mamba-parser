<?php
//файл для проверки доступа к сайтам 
$ch = curl_init();


   $url=/"https://encrypted.google.com/search?tbm=isch&q=fallout%20art&tbs=imgo:2"//"http://www.deviantart.com/?q=$pattern&offset=".$i;
  
     // curl_setopt($ch,CURLOPT_FILE, $desc);
      curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);    
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9.0.1) Gecko/2008070208 Firefox/3.0.1)');
      //curl_setopt($ch,CURLOPT_PROXY,'127.0.0.1');
      //curl_setopt($ch,CURLOPT_PROXYPORT,9050);
      //curl_setopt($ch,CURLOPT_PROXYTYPE,CURLPROXY_SOCKS5);
      
      $result=curl_exec($ch);
      file_put_contents('tesing_curl.html', $result);
      //echo $result;

curl_close($ch);
?>