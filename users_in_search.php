<?php
//парсим список пользователей из поиска


$ch=curl_init();

for ($i=0,$n=0;$n<11;$i++,$n=$n+10) {
    
      $url="http://www.mamba.ru/ru/search.phtml?ia=N&lf=M&af=18&at=80&s_c=3159_4481_0_0&wp=1&geo=0&t=a&offset=$n&nchanged=1428846994&noid=1444506538";
   
   
      $desc=fopen("murn_man2.html","a+");
    //echo $url,"<br>";
      curl_setopt($ch,CURLOPT_FILE, $desc);
      curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);    
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Macintosh; U; PPC Mac OS X; en) AppleWebKit/125.2 (KHTML, like Gecko) Safari/125.8');
       curl_setopt($ch,CURLOPT_PROXY,'127.0.0.1');
      curl_setopt($ch,CURLOPT_PROXYPORT,9050);
      curl_setopt($ch,CURLOPT_PROXYTYPE,CURLPROXY_SOCKS5);

      //результат выполнения переменной записываем в  файл 
     $result=curl_exec($ch);
   
      fwrite($desc,$result);    
	//  echo $i; 
}
?>