<?php
    class ControllerProductHotel extends Controller {

        public function index() { 
            $this->document->addScript('catalog/view/javascript/review.js');           
            $this->document->addStyle('catalog/view/theme/default/stylesheet/css/style.css');           
            $this->language->load('product/hotel');
            $this->data['text_gia'] = $this->language->get('text_gia');
            $this->data['text_macode'] = $this->language->get('text_macode');
            $this->data['text_cacngay'] = $this->language->get('text_cacngay');
            $this->data['text_khoihanh'] = $this->language->get('text_khoihanh');
            $this->data['text_diemden'] = $this->language->get('text_diemden');
            $this->data['text_thoigiantuor'] = $this->language->get('text_thoigiantuor');
            $this->data['text_giaca_chuyendi'] = $this->language->get('text_giaca_chuyendi');
            $this->data['text_ngaykhoihanh'] = $this->language->get('text_ngaykhoihanh');
            $this->data['text_songuoi'] = $this->language->get('text_songuoi');
            $this->data['text_giokhoihanh'] = $this->language->get('text_giokhoihanh');
            $this->data['text_datve'] = $this->language->get('text_datve');
            $this->data['text_Mota'] = $this->language->get('text_Mota');
            $this->data['text_chuacothongtin'] = $this->language->get('text_chuacothongtin');
            $this->data['text_chuacoAnh'] = $this->language->get('text_chuacoAnh');
            $this->data['text_tongtien'] = $this->language->get('text_tongtien');                   
            $this->data['text_areaInformation'] = $this->language->get('text_areaInformation');                   
            $this->data['text_propertyDescription'] = $this->language->get('text_propertyDescription');                   
            $this->data['text_hotelPolicy'] = $this->language->get('text_hotelPolicy');                   
            $this->data['text_roomInformation'] = $this->language->get('text_roomInformation');                   
            $this->load->model('catalog/hotels'); 
			
            /*GET EXPERIA */ 
            $nows = getdate();
            $arrivalDate = $nows["mon"] . "/" .  ($nows["mday"]+3) . "/" . $nows["year"];  
            $departureDate =  $nows["mon"] . "/" .($nows["mday"]+4) . "/" .$nows["year"];
            $data = array(
            'ver'     => 'v3/',
            'method'  => 'info',                
            'countryCode'  => 'VN', 
            'arrivalDate'  => $arrivalDate,  
            'departureDate'  => $departureDate,
            'options'  => '0'           
            ); 
			
            if(isset($this->request->get['hotelId']))$data['hotelId'] = $this->request->get['hotelId']; 
            if(isset($this->request->get['destinationString']))$data['destinationString']= str_replace(" ","",$this->request->get['destinationString']); 
            if(isset($this->request->get['arrivalDate'])) $this->data['arrivalDate']=$data['arrivalDate']=date('m/d/Y', strtotime($this->request->get['arrivalDate']));
            if(isset($this->request->get['departureDate']))$this->data['departureDate']=$data['departureDate']=date('m/d/Y', strtotime($this->request->get['departureDate']));
            $this->data['rooms']=$data['room1']=(isset($this->request->get['rooms']))?$this->request->get['rooms']:1; 
            $this->data['audlts']=$data['audlts']=(isset($this->request->get['audlts']))? $this->request->get['audlts']:1; 
            $this->data['kids'] = $data['kids'] = (isset($this->request->get['kids']))?$this->request->get['kids']:0; 			
            $result = json_decode($this->model_catalog_hotels->getApi($data));	
			
            if(isset($result)){
                $images = array();
                $HotelImages = $result->HotelInformationResponse->HotelImages->HotelImage;                           
                foreach($HotelImages as $item){                 
                    $images[] = array(
                    'image' => str_replace('_b','_z',$item->url),
                    'thumb' => $item->thumbnailUrl
                    ); 
                }
				$types = array();
                $RoomTypes = $result->HotelInformationResponse->RoomTypes->RoomType; 
				
				$minRate = 1000000;
				foreach($RoomTypes as $item){ 
					$item = get_object_vars($item);	
                    $detail = $description =  $descriptions = array();                         
                    $description =  explode('<b>',$item['descriptionLong']); 
                    foreach($description as $long){
                        $descriptions[]= explode('-',$long);  
                    }  
					$detail = $this->getpricebyTyperoom($item['@roomCode']);					
					if($minRate > $detail['chargeableRateNet']){
						$minRate =  $detail['chargeableRateNet'];
					}
					
					$types[] = array(
                    'roomTypeId' => $item['@roomTypeId'],
                    'roomCode' => $item['@roomCode'],
                    'description' => $item['description'],
                    'descriptions' => $descriptions,
                    'detail' => $detail,
                    'RoomType' => isset($descriptions[0][0])?html_entity_decode($descriptions[0][0],ENT_QUOTES, 'UTF-8'):'',
                    'descriptionLong' => html_entity_decode($item['descriptionLong'],ENT_QUOTES, 'UTF-8'),
                    'RoomAmenity' => isset($item['roomAmenities']->RoomAmenity)?$item['roomAmenities']->RoomAmenity:array()
                    ); 					
                }
				$rate = $minRate;				
				// active
				$this->data['href_checkout'] = $this->url->link('checkout/carthotel/addTocart');
	            $this->data['hotel'] = array(
                'hotelId' => $result->HotelInformationResponse->HotelSummary->hotelId,
                'href' =>  $this->url->link('product/hotel','hotelId='.$result->HotelInformationResponse->HotelSummary->hotelId),
                'name' => $result->HotelInformationResponse->HotelSummary->name,
                'address' => isset($result->HotelInformationResponse->HotelSummary->address2)?($result->HotelInformationResponse->HotelSummary->address1.', '.$result->HotelInformationResponse->HotelSummary->address2):$result->HotelInformationResponse->HotelSummary->address1,
                'city' => $result->HotelInformationResponse->HotelSummary->city,
                'countryCode' => $result->HotelInformationResponse->HotelSummary->countryCode,
                'hotelRating' => $result->HotelInformationResponse->HotelSummary->hotelRating,
                'hotelpercent' =>  floor((float)$result->HotelInformationResponse->HotelSummary->hotelRating*100/5),
                'rateNet' =>  $rate,
                'rate' =>  $this->currency->format($rate),
                'highRate' => $this->currency->format((float)$result->HotelInformationResponse->HotelSummary->highRate),
                'highRateformat' =>  $this->currency->format((float)$result->HotelInformationResponse->HotelSummary->highRate),
                'lowRate' => $this->currency->format((float)$result->HotelInformationResponse->HotelSummary->lowRate),
                'lowRateformat' => $this->currency->format((float)$result->HotelInformationResponse->HotelSummary->lowRate),
                'propertyInformation' => html_entity_decode($result->HotelInformationResponse->HotelDetails->propertyInformation,ENT_QUOTES, 'UTF-8'),
                'areaInformation' => html_entity_decode($result->HotelInformationResponse->HotelDetails->areaInformation,ENT_QUOTES, 'UTF-8'),
                'propertyDescription' => html_entity_decode($result->HotelInformationResponse->HotelDetails->propertyDescription,ENT_QUOTES, 'UTF-8'),
                'hotelPolicy' => html_entity_decode($result->HotelInformationResponse->HotelDetails->hotelPolicy,ENT_QUOTES, 'UTF-8'),
                'roomInformation' => html_entity_decode($result->HotelInformationResponse->HotelDetails->roomInformation,ENT_QUOTES, 'UTF-8'),
                'checkInInstructions' => html_entity_decode($result->HotelInformationResponse->HotelDetails->checkInInstructions,ENT_QUOTES, 'UTF-8'),
                'RoomType' => $types,
                'HotelImages' => $images,
                'latitude' => $result->HotelInformationResponse->HotelSummary->latitude,
                'longitude' => $result->HotelInformationResponse->HotelSummary->longitude,
                );
            }
            /*END EXPERIA */   
            if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/product/hotel.tpl')) {
                $this->template = $this->config->get('config_template') . '/template/product/hotel.tpl';
            } else {
                $this->template = 'default/template/product/hotel.tpl';
            }
            $this->children = array(
            'common/column_left',
            'common/column_right',
            'common/content_top',
            'common/content_bottom',
            'common/content_positionheader',
            'common/footer',
            'common/header',
			'module/tnt_yahoo'
            );	
            $this->response->setOutput($this->render());
        }

        public function write() {

            $this->language->load('product/product');

            $this->load->model('catalog/review');

            $json = array();

            if ($this->request->server['REQUEST_METHOD'] == 'POST') {
                if ((utf8_strlen($this->request->post['name']) < 3) || (utf8_strlen($this->request->post['name']) > 25)) {
                    $json['error'] = $this->language->get('error_name');
                }

                if ((utf8_strlen($this->request->post['text']) < 25) || (utf8_strlen($this->request->post['text']) > 1000)) {
                    $json['error'] = $this->language->get('error_text');
                }

                if (empty($this->request->post['rating'])) {
                    $json['error'] = $this->language->get('error_rating');
                }

                if (!isset($json['error'])) {
                    $this->model_catalog_review->addReview($this->request->get['product_id'], $this->request->post);

                    $json['success'] = $this->language->get('text_success');
                }
            }

            $this->response->setOutput(json_encode($json));
        }

		public function getpricebyTyperoom($roomCode) {
			$this->load->model('catalog/hotels'); 
            $data = array(
            'ver'     => 'v3/',
            'method'  => 'avail',   
            'includeDetails'  => 'true',
            'includeRoomImages'  => 'true'
            ); 			
            if(isset($this->request->get['hotelId']))$data['hotelId'] = $this->request->get['hotelId']; 
            if(isset($this->request->get['destinationString']))$data['destinationString']= str_replace(" ","",$this->request->get['destinationString']); 
            if(isset($this->request->get['arrivalDate'])) $this->data['arrivalDate']=$data['arrivalDate']=date('m/d/Y', strtotime($this->request->get['arrivalDate']));
            if(isset($this->request->get['departureDate']))$this->data['departureDate']=$data['departureDate']=date('m/d/Y', strtotime($this->request->get['departureDate']));
            $this->data['rooms']=$data['room1']=(isset($this->request->get['rooms']))?$this->request->get['rooms']:1; 
            $this->data['audlts']=$data['audlts']=(isset($this->request->get['audlts']))? $this->request->get['audlts']:1; 
            $this->data['kids'] = $data['kids'] = (isset($this->request->get['kids']))?$this->request->get['kids']:0; 	
            $result = json_decode($this->model_catalog_hotels->getApi($data));
			$roomdetail = array();
			if(isset($result)){				
				foreach($result->HotelRoomAvailabilityResponse->HotelRoomResponse as $room){
					$item = get_object_vars($room); 
					$ValueAdd = get_object_vars($item['ValueAdds']);
					$ValueAdds = array();
					foreach($ValueAdd['ValueAdd'] as $VA){
						$VA = get_object_vars($VA);
						$ValueAdds[] = array(
							'id' => $VA['@id'],
							'description' => $VA['description'],
						);
					}		
					$BedType = get_object_vars($item['BedTypes']);
					
					$BedTypes = array();
					if($BedType['@size']>1){
						foreach($BedType['BedType'] as $BT){
							$BT = get_object_vars($BT);
							$BedTypes[] = array(
								'id' => $BT['@id'],
								'description' => $BT['description'],
							);
						}
					}else{
						$BT = get_object_vars($BedType['BedType']);
						$BedTypes[] = array(
							'id' => $BT['@id'],
							'description' => $BT['description'],
						);
					}
										
					if($roomCode == $item['roomTypeCode']){
						 $roomdetail = array(
						 'supplierType' =>$item['supplierType'],
						 'rateKey' =>$item['RateInfos']->RateInfo->RoomGroup->Room->rateKey,
						 'roomTypeCode' =>$item['roomTypeCode'],
						 'rateCode' =>$item['rateCode'],
						 'chargeableRateNet' => $item['RateInfos']->RateInfo->ChargeableRateInfo->{'@averageRate'},
						 'chargeableRate' => $this->currency->format($item['RateInfos']->RateInfo->ChargeableRateInfo->{'@averageRate'}),
						 'quotedOccupancy' => $item['quotedOccupancy'],
						 'promoDescription' => get_object_vars($item['RateInfos']->RateInfo)['promoDescription'],
						 'cancellationPolicy' => get_object_vars($item['RateInfos']->RateInfo)['cancellationPolicy'],
						 'BedTypes' => $BedTypes,
						 'ValueAdds' => $ValueAdds,						 
						 ); 
						break;						 
					}
					$i++;
					if($i==count($result)){
						$roomdetail = array(
						 'supplierType' =>$item['supplierType'],
						 'rateKey' =>$item['RateInfos']->RateInfo->RoomGroup->Room->rateKey,
						 'roomTypeCode' =>$item['roomTypeCode'],
						 'rateCode' =>$item['rateCode'],
						 'chargeableRateNet' => $item['RateInfos']->RateInfo->ChargeableRateInfo->{'@averageRate'},
						 'chargeableRate' => $this->currency->format($item['RateInfos']->RateInfo->ChargeableRateInfo->{'@averageRate'}),
						 'quotedOccupancy' => 0,
						 'promoDescription' => get_object_vars($item['RateInfos']->RateInfo)['promoDescription'],
						 'cancellationPolicy' => get_object_vars($item['RateInfos']->RateInfo)['cancellationPolicy'],
						 'BedTypes' => $BedTypes,
						 'ValueAdds' => $ValueAdds,
						);
					}
				}
				return $roomdetail;	
            }                
        }
    
		public function importDatabase() {
			$this->load->model('catalog/hotels'); 
			$filename = "ActivePropertyList.txt";
			$fp = fopen($filename, "r");
			$content = fread($fp, filesize($filename));
			$lines = explode("\n", $content);
			fclose($fp);
			$list = array(0,1,9,10,12,14,15,19,20,21);
			$colums = $line = array();
			$colums = explode('|',$lines[0]);
			/* $sql="";
			$sql="INSERT INTO `tgm_hotel` (";
			foreach($colums as $colum){
				 
				$sql.="`".$colum."`,";
			}
			$sql.=") VALUES ";
			$sql= str_replace(",)",")",$sql);
			 */
			$sql = $sql0 ="";
			$sql0="INSERT INTO `tgm_hotel` (`EANHotelID`,`SequenceNumber`,`Name`,`Address1`,`Address2`,`City`,`StateProvince`,`PostalCode`,`Country`,`Latitude`,`Longitude`,`AirportCode`,`PropertyCategory`,`PropertyCurrency`,`StarRating`,`Confidence`,`SupplierType`,`Location`,`ChainCodeID`,`RegionID`,`HighRate`,`LowRate`,`CheckInTime`,`CheckOutTime`) VALUES ";
			//echo count($lines); exit;
			for($i=132528;$i<count($lines);$i++){
				$values = explode('|',$lines[$i]);
				$sql1="";	
				$sql1.="(";	
				foreach($values as $key => $val){
					if(in_array($key,$list)){
						if($val!=""){
							$sql1.=" ".$val.",";
						}else{
							$sql1.=' "'.$val.'",';
						}						
					}else{
						$val = str_replace('"',"",$val);
						$sql1.=' "'.$val.' ",';
					}					
				}
				$sql1.=")";	
				$sql1= str_replace(",)",")",$sql1);
				$sql = "";
				$sql= $sql0.$sql1;
				$this->model_catalog_hotels->importDatabase($sql);
			}
			echo 'success';
			exit;
			
        }

	}
?>