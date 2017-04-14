<?php

class ModelVemaybaySearchve extends Model{

    

    var $channel ;var $cookies;var $allcookies ="";

     /** khoi tao curl **/   

    function __destruct() {

        if($this->curl_session) {

            curl_close($this->curl_session);

        }

    }

    function curl()

    {

        $this->channel = curl_init( );

        // you might want the headers for http codes

        curl_setopt( $this->channel, CURLOPT_HEADER, true );

        curl_setopt($this->channel, CURLOPT_USERAGENT, sprintf("Mozilla/%d.0",rand(4,5)));

        curl_setopt( $this->channel, CURLOPT_FOLLOWLOCATION, true );   

        curl_setopt($this->channel, CURLOPT_SSL_VERIFYHOST, 0);

        curl_setopt($this->channel, CURLOPT_SSL_VERIFYPEER, false);

        curl_setopt($this->channel, CURLOPT_VERBOSE, true);

        curl_setopt($this->channel, CURLOPT_FAILONERROR, true);

        curl_setopt($this->channel, CURLOPT_TIMEOUT,30); 

        curl_setopt($this->channel, CURLOPT_FOLLOWLOCATION, TRUE); // Follow redirects      

        curl_setopt( $this->channel, CURLOPT_RETURNTRANSFER, true );

        curl_setopt($this->channel,CURLOPT_ENCODING,"gzip"); 

        

        curl_setopt ($this->channel, CURLOPT_REFERER, '/vegiare24h/localhost/tim-ve');

        curl_setopt($this->channel, CURLOPT_SSL_VERIFYHOST, 0);

        curl_setopt($this->channel, CURLOPT_SSL_VERIFYPEER, 0);

}

function makeRequest( $method, $url,$referer, $vars,$cookies )

    {
        
        curl_setopt( $this->channel, CURLOPT_URL, $url );

        if(isset($_COOKIE)){           

                foreach($_COOKIE as $key=> $value){

                  $this->allcookies .=$key."=".$value.";path=/";   

                }              

          curl_setopt($this->channel, CURLOPT_COOKIE,$this->allcookies);       

        }        

        // probably unecessary, but cookies may be needed to

        curl_setopt( $this->channel, CURLOPT_COOKIEJAR, $cookies);

        // the actual post bit

        if ( strtolower( $method ) == 'post' ) :

            $elements='';            

            foreach ($vars as $name=>$value)

            { 
            $elements.='&';

            $elements.="{$name}=".urlencode($value);

            }               

           // $this->http_build_query_for_curl($vars,$elements);            

            curl_setopt( $this->channel, CURLOPT_POST, true );

            curl_setopt( $this->channel, CURLOPT_POSTFIELDS, $elements );

        endif;              

        // return data        

        $result['EXE'] = curl_exec($this->channel);       

        $result['INF'] = curl_getinfo($this->channel); 

        $result['ERR'] = curl_error($this->channel); 

        return ($result);        

    }    

function http_build_query_for_curl( $arrays, &$new = array(), $prefix = null ) {

    if ( is_object( $arrays ) ) {

        $arrays = get_object_vars( $arrays );

    }

    foreach ( $arrays AS $key => $value ) {

        $k = isset( $prefix ) ? $prefix . '[' . $key . ']' : $key;

        if ( is_array( $value ) OR is_object( $value )  ) {

           $this->http_build_query_for_curl( $value, $new, $k );

        } else {

            $new[$k] = $value;

        }

    }

}

    function close_curl(){

        curl_close($this->channel);

    }

    function makeRequest1($url,$referer,$cookies){

        

        

         curl_setopt( $this->channel, CURLOPT_URL, $url );

         curl_setopt ($this->channel, CURLOPT_REFERER, $referer);

        //ussing cookies 

        if($cookies!=""){

            

        curl_setopt( $this->channel, CURLOPT_COOKIEFILE, $cookies); 

        curl_setopt($this->channel, CURLOPT_COOKIEJAR, $cookies);

      }

        $result['EXE'] = curl_exec($this->channel); 

       

        $result['INF'] = curl_getinfo($this->channel); 

        $result['ERR'] = curl_error($this->channel); 

         

        return $result; 

        

    }

  public   function freadjson($filename){

        $string = file_get_contents($filename);

        $json_a=json_decode($string,true);

        return ($json_a);    

    }

}

?>