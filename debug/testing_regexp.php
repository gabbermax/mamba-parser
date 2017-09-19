<?php

//файл для быстрой проверки регулярок
echo '<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">';
//countries

//v poiske
$user_v_ankete='/u-name.*?\?hit/';
//anketa
$user_id_re = '/vUserId:.*?[\d]{1,12}/';
$user_link_re='/selected\-link">.+?<\/a>/s'; 
$user_name_re='/dib mb10">.*?</s';
$user_age_re='/[\d]{1,2}.*лет/';
$user_town_re='/self\-age.*?\/div/s';
$user_education_re='/Образование.*?">.*?<\/div>/s';
$user_searching_whom_re='/Познакомлюсь:.*?лет/s';
$user_height_re='/Рост:.*?см/s';
$user_flat_re='/Проживание:.*?content">.*?div>/s';
$user_child_re='/Дети:.*?content">.*?div>/s';
$user_money_re='/положение:.*?content">.*?div>/s';
$user_seen_re='/месяц:\ [\d]{1,7}/';
$user_reply_rate_re='/i style="width:[\d]{1,3}%/';
$string3=  file_get_contents('murm/1060712992');
$string4='u-name" href="http://www.mamba.ru/ru/mb1444500310?hit';

$listofdir=file_get_contents('murn_man2.html');

/*preg_match_all($user_child_re, $string3, $matches);
$result=file_put_contents('fucking_town_regex2',$matches[0][0]);
//echo $result;
echo($matches[0][0]);
//preg_match_all('/,[\w ]{1,30}$/iu',$string4, $matches2);
preg_match_all('/>[\w(,| ) ]{1,30}</ius',$matches[0][0], $matches2);
$pured=preg_replace('/[><]/','',$matches2[0][0]);
file_put_contents('fucking_town_regex',$matches2[0][0] );
//preg_match_all('/[\w ]{1,30}$/ius',$matches2[0][0], $matches3);
//print_r($matches2[0][0]);
//$matches=str_replace('/dating','',$matches2[0][0]);
var_dump($pured) */

preg_match_all($user_v_ankete, $listofdir, $user_name2);
//$user_name=substr($user_name2[0][0],10);
$user_link_anketa= str_replace('?hit','',(str_replace('u-name" href="','', $user_name2[0][0])));

foreach ($user_name2[0] as $key => $value) {
    echo $key." is ".$value."<br>";
    
}
var_dump($user_link_anketa);
?>
        
