<?php //http://m.mamba.ru/?area=GeoList&status=all&me=N&lookFor=N&location=Other&fromAge=18&toAge=80&sr=0&back=SearchResult&minLevel=0&offset=60&force_wap=1
$desc=fopen("countries.html","a+");
echo $desc;
$ch=curl_init();
for ($i=0,$n=0;$i<220;$i=$i=$i+30,$n++) {
   $url="http://m.mamba.ru/?area=GeoList&status=all&me=N&lookFor=N&location=Other&fromAge=18&toAge=80&sr=0&back=SearchResult&minLevel=0&offset=$i&force_wap=1";
   //"https://encrypted.google.com/search?tbm=isch&q=";///
        
    //echo $url,"<br>";
      curl_setopt($ch,CURLOPT_FILE, $desc);
      curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);    
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:26.0) Gecko/20100101 Firefox/26.0');
       curl_setopt($ch,CURLOPT_PROXY,'127.0.0.1');
      curl_setopt($ch,CURLOPT_PROXYPORT,9050);
      curl_setopt($ch,CURLOPT_PROXYTYPE,CURLPROXY_SOCKS5);

      //результат выполнения переменной записываем в  файл 
     $result=curl_exec($ch);
     //echo $result;//CURLOPT_FILE  ,"     " , CURLOPT_RETURNTRANSFER , "   ",    CURLOPT_URL, "<br>";
      fwrite($desc,$result);    
	//  echo $i; 
}
?>