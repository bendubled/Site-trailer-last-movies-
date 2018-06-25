<?php
include_once 'parameters.php';
//include plugins_dir_path("/imp-file/admin/partials/imp-file-admin-
//display.php");
$spt = 1;


define('ALLOCINE_PARTNER_KEY', '100043982026');
define('ALLOCINE_SECRET_KEY', '29d185d98c984a359e6e6f26a0474269');

$allocine = new Allocine(ALLOCINE_PARTNER_KEY, ALLOCINE_SECRET_KEY);




class Allocine
{
    private $_api_url = 'http://api.allocine.fr/rest/v3';
    private $_partner_key;
    private $_secret_key;
    private $_user_agent = 'Dalvik/1.6.0 (Linux; U; Android 4.2.2; Nexus 4 Build/JDQ39E)';
    public function __construct($partner_key, $secret_key)
    {
        $this->_partner_key = $partner_key;
        $this->_secret_key = $secret_key;
    }
    private function _do_request($method, $params)
    {
        // build the URL
        $query_url = $this->_api_url.'/'.$method;
        // new algo to build the query
        $sed = date('Ymd');
        $sig = urlencode(base64_encode(sha1($this->_secret_key.http_build_query($params).'&sed='.$sed, true)));
        $query_url .= '?'.http_build_query($params).'&sed='.$sed.'&sig='.$sig;
        // do the request
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $query_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_USERAGENT, $this->_user_agent);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
         
    }

    public function movielist()
    {
        
       
        // build the params
        $params = array(
            'partner' => $this->_partner_key,
            
            
           // 'striptags' => 'synopsis,synopsisshort',
            
//            'q' => $query,            
           'count' => 1,
            'profile'=>'large',
            'filter' => 'comingsoon',
           'order' => 'toprank',
//           'format' =>'json',
            
            
//            'format'=>'json',
           
        );
        // do the request
        $response = $this->_do_request('movielist', $params);
        return $response;
        
        echo "passage 1";
    
    }
    
   



  
}



    for($i=0;$i<1;$i++){
$result = $allocine->movielist();
$result2 = json_decode($result);


$uploads_dir = 'http://www.unlimited-assembly.fr/wp-content/uploads/2018/06/';
//print_r($result2->{'feed'}->{'movie'}[1]->{'originalTitle'} .'<br />');
//print_r($result2->{'feed'}->{'movie'}[1]->{'trailerEmbed'} .'<br />');
//print_r($result2);
$name=$result2->{'feed'}->{'movie'}[$i]->{'originalTitle'};
$message=$result2->{'feed'}->{'movie'}[$i]->{'trailerEmbed'};
$poster=$result2->{'feed'}->{'movie'}[$i]->{'poster'}->{'href'};
$date_prod=$result2->{'feed'}->{'movie'}[$i]->{'productionYear'};
$producteur=$result2->{'feed'}->{'movie'}[$i]->{'castingShort'}->{'directors'};
$acteur=$result2->{'feed'}->{'movie'}[$i]->{'castingShort'}->{'actors'};
$date_sortie=$result2->{'feed'}->{'movie'}[$i]->{'release'}->{'releaseDate'};
    $genre=$result2->{'feed'}->{'movie'}[$i]->{'genre'}[0]->{'$'};
$synop=$message.'DATE DE SORTIE:'.$date_sortie.'<br /><br />'.'DATE DE PRODUCTION:'.$date_prod.'<br /><br />'.'GENRE:'.$genre.'<br /><br />'.'PRODUCTEUR:'.$producteur.'<br /><br />'.'ACTEURS:'.$acteur.'<br /><br />'.$result2->{'feed'}->{'movie'}[$i]->{'synopsisShort'};
//echo $poster;
//$poster= move_uploaded_file($tmp_name, "$uploads_dir/$name");
//print_r($genre);
//echo $genre;
//echo $message;

 $upload_dir = wp_upload_dir();

   $image_data = file_get_contents($poster);
    $filename = basename($poster);
    if(wp_mkdir_p($upload_dir['path'])) {    $file = $upload_dir['path'] . '/' . $filename;}
    else    {                                $file = $upload_dir['basedir'] . '/' . $filename;}
    file_put_contents($file, $image_data);
//if (!get_post_mime_type($wp_filetype, 'type55')) {
//    if ($filename == $filename) {
//    if($filename !EXIST){
    global $wpdb;
    try {
        
        
        $db = openBDD(); //fonction pour ouvrir acces BDD

        $bdd = $db->query("SELECT post_title, ID FROM wp_posts ");
        $bdd->execute;
        
        $result = $bdd->fetch(); // retourne sous forme d'un tableau la PREMIERE valeur.
        foreach($bdd as $result){
        
        
//         print_r('RESULTJSON:'.$result);
//      
//          print_r('<div style=color:red>Title dans la bdd :'.basename($result[post_title]).'</div><br />');
//          print_r('id dans BDD:'.$result[ID]);
        
        
        }
        
        
       
        
    }catch (PDOException $e) {
        echo"pas bon";
        return $e->getMessage();
    }
    
   
    
//   $final_result= basename($result);
    
    
    
    
    
//    $name_title=trim($filename);
//    $resul = $wpdb->query("SELECT post_title FROM wp_posts ");
   // $resultat5 = $wpdb->query('SELECT post_title FROM wp_posts WHERE post_title="' . $filename . '" ');
//$req = fetch_array($result);
   //  $wpdb->get_results($resultat5);
    
//        print_r('BBBBBBBBBBBBBBBBBBBB'.$resultx);
//if ($filename != in_array($result)) {
//    if (in_array($filename, $result, true)) {
//    trim($filename);

//echo 'XXXXXXXXXXXXXXX'.$filename.'XXXXXXXXXXXXXXXXXXX';
    
//    print_r('XXXXXXXXXXXXXXXXXX'.$filename);
//    echo'BBBBBBBBBBBBBBBBBBBB'.$resultx;
//    if($filename == $result[post_title]){
//    if (in_array('2232761.jpg', $result)){
//          echo $filename.'n est pas dans la base';
//          break;
//        
//      }else{
//    if (!get_the_title($filename)) {
//    $wp_filetype = wp_check_filetype($filename, null );
//    $attachment = array(
//        'post_title' => $filename,
//        'post_mime_type' =>$wp_filetype['type'],
//        
//        'post_content' => '',
//        'post_status' => 'inherit',
//        'post_name'=>''
//        
//    );
//   
//    $attach_id = wp_insert_attachment( $attachment, $file, $post_id );
//    require_once(ABSPATH . 'wp-admin/includes/image.php');
//    $attach_data = wp_generate_attachment_metadata( $attach_id, $file );
//    $res1= wp_update_attachment_metadata( $attach_id, $attach_data );
//    $res2= set_post_thumbnail( $post_id, $attach_id );
//
//    }
// 


//        $tmp_name = $_FILES["pictures"]["tmp_name"][$key];
//        // basename() peut empêcher les attaques de système de fichiers;
//        // la validation/assainissement supplémentaire du nom de fichier peut être approprié
//        $name = basename($_FILES["pictures"]["name"][$key]);
//        move_uploaded_file($tmp_name, "$uploads_dir/$name");


//echo '<img src=' .$poster.'>';
//   $contact_post = array(
//  'post_title' => $name,
//  'post_content' => $message,
//  'post_type' => 'post',
//  'post_status' => 'publish',
//  
//);
$gallery ='Galerie';
 if (!get_page_by_title($name, 'OBJECT', 'post')) {
            
            $contact_post = array(
            'post_title'    => $name,
            'post_content'  => $synop, 
                'post_format' => $gallery,
                'post_type' => 'post',
            'post_status'   => 'publish'
//                'post_parent'=>'1'
//                'post_category' => array( 34 ),
//        'filter' => true
            
//            'post_mime_type' => $wp_filetype['type']
//            'post_mime_type' => $poster
            )
               
            
;
//                if (in_array('2232761.jpg', $result)){
//          echo $filename.'n est pas dans la base';
//          break;
//        
$post_id = wp_insert_post($contact_post);

//    set_post_thumbnail( $post, $thumbnail_id );
//   $post_ID = wp_insert_post($post);
    $wp_filetype = wp_check_filetype($filename, null );
    $attachment = array(
        'post_title' => $filename,
        'post_mime_type' =>$wp_filetype['type'],
        
        'post_content' => '',
        'post_status' => 'inherit',
        'post_name'=>'',
        'post_status'   => 'publish'
       
        
    );
    
   
    $attach_id = wp_insert_attachment( $attachment, $file, $post_id );
    require_once(ABSPATH . 'wp-admin/includes/image.php');
    $attach_data = wp_generate_attachment_metadata( $attach_id, $file );
    $res1= wp_update_attachment_metadata( $attach_id, $attach_data );
    $res2= set_post_thumbnail( $post_id, $attach_id );
//echo 'XXXXXXXXXXXXXX'.$post_id.'XXXXXXXXXXXXXXXXXXXX';
//echo $post_id;
//   $post_ID = wp_insert_post( $post_data, $error_obj );
//
//
//set_post_thumbnail( $post_ID, $thumbnail_id );
 }
// $post_id = wp_insert_post($contact_post);

add_post_meta($post_id, '_thumbnail_id','../wp-content/uploads/2018/06/2232761-508x677.jpg', true);
    }



    
