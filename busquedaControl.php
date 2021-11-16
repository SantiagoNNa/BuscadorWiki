<?php
if ( is_ajax() ) {

    if ( $_POST['action'] === "search" && $_POST['table'] === "APIWIKI") {
        $endPoint = "https://en.wikipedia.org/w/api.php";
        $params = [
            "action" => "query",
            "list" => "search",   
            "srsearch" => $_POST['busq'],
            "srnamespace" => "*",
            "srlimit"  => 25, 
            "format" => "json"
        ];
        $url = $endPoint . "?" . http_build_query( $params );
        $ch = curl_init( $url );
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        $output = curl_exec( $ch );
        curl_close( $ch );

        $result = json_decode( $output, true );
        if (count($result['query']['search']) > 0 ){
            foreach ($result['query']['search'] as $key){
            echo  ' <div class="separador"> <strong> Titulo: </strong> ' . "  " . $key['title'] . "<br>" . '<strong> Page Id: </strong> ' . " " . $key['pageid'] . "<br>" . '<strong> Snippet: </strong>  ' . " " . $key['snippet'] . "<br> </div>";     
           }
        }else{
            echo 1;
        }
       
              
    } 
}

function is_ajax() {
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
}

?>