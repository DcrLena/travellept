<?php  
    class ControllerModuleHotelcared extends Controller {
        protected function index($setting) {
            $this->load->model('catalog/hotels'); 
            $this->language->load('module/hotelcared');
            $this->data['heading_title'] = $this->language->get('heading_title');
            /*GET EXPERIA */ 
            $getid = isset($this->request->get['city'])?$this->request->get['city']:'danang';        
            switch($getid){
                //'Hanoi'//'Dalat'//Phanthiet-'EABE8D4B-48D4-4CB9-9AB6-CB66D1BDBCC4'//NTrang-'ACAC4592-7C7B-4FE9-B650-B56734345C52'//DN-'442B953D-BA7F-42E3-8DF9-F421D1A7409F'//HCM-'D3432BD8-99B3-4B18-98E6-F10F55EB6587';
                case 'hanoi':
                    $city = array('destinationString' ,'Hanoi');
                    break;
                case 'hochiminh':
                    $city = array('destinationId' ,'D3432BD8-99B3-4B18-98E6-F10F55EB6587');
                    break; 
                case 'dalat':
                    $city = array('destinationString' ,'Dalat');
                    break;
                case 'phanthiet':
                    $city = array('destinationId' ,'EABE8D4B-48D4-4CB9-9AB6-CB66D1BDBCC4');
                    break; 
                case 'nhatrang':
                    $city = array('destinationId' ,'ACAC4592-7C7B-4FE9-B650-B56734345C52');
                    break; 
                case 'danang' :
                    $city = array('destinationId' ,'442B953D-BA7F-42E3-8DF9-F421D1A7409F');
                    break;                           
            }  
            $nows = getdate();
            $arrivalDate = $nows["mon"] . "/" .  ($nows["mday"]+3) . "/" . $nows["year"];  
            $departureDate =  $nows["mon"] . "/" .($nows["mday"]+4) . "/" .$nows["year"];
            $data = array(
            'ver'     => 'v3/',
            'method'  => 'list/',                
            'countryCode'  => 'VN',                 
            'arrivalDate'  => $arrivalDate,  
            'departureDate'  => $departureDate,  
            'room1'  => 1,              
            'numberOfResults'  => 8,              
            $city[0]  => $city[1],
            );                        
            $result = json_decode($this->model_catalog_hotels->getApi($data));       
						
            $list = $result->HotelListResponse->HotelList->HotelSummary;  
            if(!isset($list)){  
                if(isset( $result->HotelListResponse->LocationInfos->LocationInfo)){
                    $data['destinationId']= $result->HotelListResponse->LocationInfos->LocationInfo[0]->destinationId;
                    $result = json_decode($this->model_catalog_hotels->getApi($data));  
                    $list = $result->HotelListResponse->HotelList->HotelSummary; 
                }
            }
            $this->data['hotelcareds'] = $hotelcareds = array(); 
            foreach($list as $val){ 	
                $hotelcareds[] = array(
				'order' => isset($val->order)?$val->order:'',
				'hotelId' => $val->hotelId,
				'name' => substr($val->name,0,38),
				'hotelRating' => floor((float)$val->hotelRating*100/5),
				'price' => $this->currency->format($val->lowRate),
				'rateCurrencyCode' => $val->rateCurrencyCode,
				'shortDescription' => substr($val->shortDescription,63),
				'thumbNailUrl' =>'http://images.travelnow.com'.$val->thumbNailUrl,
				'BigUrl' =>'http://images.travelnow.com'.str_replace('_t.','_b.',$val->thumbNailUrl),
				'deepLink' => $val->deepLink,
				'href' =>  $this->url->link('product/hotel','&hotelId='.$val->hotelId)
				); 
            } 	
            $this->data['hotelcareds'] = $hotelcareds;
            /*END EXPERIA */                      
            if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/module/hotelcared.tpl')) {
                $this->template = $this->config->get('config_template') . '/template/module/hotelcared.tpl';
            } else {
                $this->template = 'default/template/module/hotelcared.tpl';
            }   
            $this->render();
        }        
        public function gethtml() {  
            $this->load->model('catalog/hotels'); 
            $this->language->load('module/hotelcared');
            $this->data['heading_title'] = $this->language->get('heading_title');
            /*GET EXPERIA */ 
            $getid = isset($this->request->get['city'])?$this->request->get['city']:'danang';        
            switch($getid){
                //'Hanoi'//'Dalat'//Phanthiet-'EABE8D4B-48D4-4CB9-9AB6-CB66D1BDBCC4'//NTrang-'ACAC4592-7C7B-4FE9-B650-B56734345C52'//DN-'442B953D-BA7F-42E3-8DF9-F421D1A7409F'//HCM-'D3432BD8-99B3-4B18-98E6-F10F55EB6587';
                case 'hanoi':
                    $city = array('destinationString' ,'Hanoi');
                    break;
                case 'hochiminh':
                    $city = array('destinationId' ,'D3432BD8-99B3-4B18-98E6-F10F55EB6587');
                    break; 
                case 'dalat':
                    $city = array('destinationString' ,'Dalat');
                    break;
                case 'phanthiet':
                    $city = array('destinationId' ,'EABE8D4B-48D4-4CB9-9AB6-CB66D1BDBCC4');
                    break; 
                case 'nhatrang':
                    $city = array('destinationId' ,'ACAC4592-7C7B-4FE9-B650-B56734345C52');
                    break; 
                case 'danang':
                    $city = array('destinationId' ,'442B953D-BA7F-42E3-8DF9-F421D1A7409F');
                    break;                           
            }      
            $nows = getdate();
            $arrivalDate = $nows["mon"] . "/" .  ($nows["mday"]+3) . "/" . $nows["year"];  
            $departureDate =  $nows["mon"] . "/" .($nows["mday"]+4) . "/" .$nows["year"];
            $data = array(
            'ver'     => 'v3/',
            'method'  => 'list/',                
            'countryCode'  => 'VN',                 
            'arrivalDate'  => $arrivalDate,  
            'departureDate'  => $departureDate,            
            'room1'  => 1,   
			'numberOfResults'  => 8, 			
            $city[0]  => $city[1],
            );  			
            $result = json_decode($this->model_catalog_hotels->getApi($data));   
            
			$list = $result->HotelListResponse->HotelList->HotelSummary;  
            $this->data['hotelcareds'] = $hotelcareds = array(); 
            foreach($list as $val){ 
				$val =	get_object_vars($val);              
				$hotelcareds[] = array(
				'order' => $val['@order'],
				'hotelId' => $val['hotelId'],
				'name' => $val['name'],
				'hotelRating' => floor((float)$val['hotelRating']*100/5),
				'price' => $this->currency->format($val['lowRate']),
				'rateCurrencyCode' => $val['rateCurrencyCode'],
				'shortDescription' => substr($val['shortDescription'],63),
				'thumbNailUrl' =>'http://images.travelnow.com'.$val['thumbNailUrl'],
				'BigUrl' =>'http://images.travelnow.com'.str_replace('_t.','_b.',$val['thumbNailUrl']),
				'deepLink' => $val['deepLink'],
				'href' =>  $this->url->link('product/hotel','&hotelId='.$val['hotelId'])
				); 
            }                                             
            $this->data['hotelcareds'] = $hotelcareds;      
            /*END EXPERIA */                               
            if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/module/hotelcaredhtml.tpl')) {
                $this->template = $this->config->get('config_template') . '/template/module/hotelcaredhtml.tpl';
            } else {
                $this->template = 'default/template/module/hotelcaredhtml.tpl';
            }       
            echo $this->render(); exit;
        }        
        // get hotels to Experia API

    }
?>