<?php
$path_pref='/man';
require_once('../work_with_dir.php');
//узнаем сколько времени уйдет на разбор
echo time(),"<br>";

$user_id_re = '/vUserId:.*?[\d]{1,12}/';
$user_link_re='/selected\-link">.+?<\/a>/s'; 
$user_name_re='/dib mb10">.*?</s';
$user_age_re='/[\d]{1,2}.*лет/';
$user_town_re='/\/span.*<\/div?/';
$user_education_re='/Образование.*?">.*?<\/div>/s';
$user_searching_whom_re='/Познакомлюсь:.*?лет/s';
$user_height_re='/Рост:.*?см/s';
$user_flat_re='/Проживание:.*?content">.*?div>/s';
$user_child_re='/Дети:.*?content">.*?div>/s';
$user_money_re='/положение:.*?content">.*?div>/s';
$user_seen_re='/месяц:\ [\d]{1,7}/';
$user_reply_rate_re='/i style="width:[\d]{1,3}%/';



foreach ($listofdir as $key => $value) {


        $full_file = file_get_contents($path.'/'.$value);
    

        preg_match_all($user_id_re, $full_file, $user_id2);
        preg_match_all('/\d{1,20}/',$user_id2[0][0], $user_id);
        $user_id=$user_id[0][0];


        //page_link
        preg_match_all($user_link_re, $full_file,$user_link2);
        preg_match_all('/http:.*?dating/s', $user_link2[0][0],$user_link);
        $user_link=str_replace('/dating','',$user_link[0][0]);


        //user name
        preg_match_all($user_name_re, $full_file, $user_name2);
        $user_name=substr($user_name2[0][0],10);

        //age
        preg_match_all($user_age_re, $full_file, $user_age2);
        preg_match_all('/^\d{2}/', $user_age2[0][0], $user_age);
        $user_age=$user_age[0][0];

        //town
        preg_match_all($user_town_re, $full_file,$user_town3);
        preg_match_all('/\..*,[\w ]{1,30}/ius', $user_town3[0][0],$user_town2);
        preg_match_all('/[\w ]{1,30}$/ius',$user_town2[0][0], $user_town);
        $user_town=$user_town[0][0];

        //education
        preg_match_all($user_education_re, $full_file, $user_education2);
        preg_match_all('/>[\w ]{1,30}</ius',$user_education2[0][0], $user_education);
        $user_education=preg_replace('/[>< ]/','',$user_education[0][0]);

        //child
        preg_match_all($user_child_re, $full_file, $user_child2);
        preg_match_all('/>[\w(,| ) ]{1,30}</ius',$user_child2[0][0], $user_child);
        $user_child=preg_replace('/[><]/','',$user_child[0][0]);


$user[]=array(  'id'=>$user_id,
                'page_link'=>$user_link,
                'user_name'=>$user_name,
                'age'=>$user_age,
                'town'=>$user_town,
                'education'=>$user_education,
                'child'=>$user_child);


}
$count=count($user);


require_once ('../dbase.php');
//чистим данные 
for($i=0;$i<$count;$i++){
    foreach($user[$i] as $key=>$value){
        $user[$i][$key]=$db_con->real_escape_string($user[$i][$key]);
        
                
    }
    //кодировка 
    $db_con->multi_query('set character_set_client="utf8"');
    $db_con->multi_query('set character_set_results="utf8"');
    $db_con->multi_query("SET NAMES 'utf8'");
    
    $query="insert into man(user_id,page_link,user_name,age,town,education,child) values ('"
                .$user[$i]['id']."','"
                .$user[$i]['page_link']."','"
                .$user[$i]['user_name']."','"
                .$user[$i]['age']."','"
                .$user[$i]['town']."','"
                .$user[$i]['education']."','"
                .$user[$i]['child']."')";
    
    $db_con->multi_query($query); 
    
            

}
echo time();
?>