<?php 
    class ControllerModuleSearchve extends Controller {
        public function index(){ 
            $this->delete_catche();
			if (isset($this->request->get['route'])) {
				$route = (string)$this->request->get['route'];
			} else {
				$route = 'common/home';
			}
            $this->document->addStyle('catalog/view/theme/default/stylesheet/form.css');
            $this->document->addStyle('catalog/view/theme/default/stylesheet/formleft.css');
            $this->document->addScript("catalog/view/javascript/script.js");            
            $data['action'] = 'tim-ve-truc-tuyen';
            $data['action_flight']= "tim-ve-truc-tuyen";
            $this->language->load('module/searchve');
            $this->load->model('vemaybay/searchve');
            $data['text_tourSpecial'] = $this->language->get('text_tourSpecial'); 
            $data['text_select'] = $this->language->get('text_select'); 
            $data['text_rountrip'] = $this->language->get('text_rountrip'); 
            $data['text_search'] = $this->language->get('text_search');            
            $data['text_didau'] = $this->language->get('text_didau');
            $data['text_nhanphong'] = $this->language->get('text_nhanphong');
            $data['text_traphong'] = $this->language->get('text_traphong');
            $data['text_yet'] = $this->language->get('text_yet');
            $data['text_18tuoi'] = $this->language->get('text_18tuoi');
            $data['text_17tuoi'] = $this->language->get('text_17tuoi');
            $data['text_chuoiks'] = $this->language->get('text_chuoiks');
            $data['text_xephangsao'] = $this->language->get('text_xephangsao');
            $data['text_timkiem'] = $this->language->get('text_timkiem');
            $data['text_phong'] = $this->language->get('text_phong');

            $data['tab_hotel'] = $this->language->get('tab_hotel');
            $data['tab_flight'] = $this->language->get('tab_flight');
            $data['tab_tour'] = $this->language->get('tab_tour');
            $data['text_leaving']=$this->language->get('text_leaving');
            $data['text_leaving_city']=$this->language->get('text_leaving_city');
            $data['text_goto']=$this->language->get('text_goto');
            $data['text_datetime']=$this->language->get('text_datetime');
            $data['text_buttonsearch']=$this->language->get('text_buttonsearch');
            $data['text_destination']=$this->language->get('text_destination');
            $data['text_checkin']=$this->language->get('text_checkin');
            $data['text_checkout']=$this->language->get('text_checkout');
            $data['text_rooms']=$this->language->get('text_rooms');
            $data['text_adults']=$this->language->get('text_adults');
            $data['text_kids']=$this->language->get('text_kids');
            $data['text_promo_code']=$this->language->get('text_promo_code');
            $data['text_dateout']=$this->language->get('text_dateout');
            $data['text_datein']=$this->language->get('text_datein');
            $data['text_morning']=$this->language->get('text_morning');
            $data['text_dayall']=$this->language->get('text_dayall');
            $data['text_infants']=$this->language->get('text_infants');
            $data["date"]=date('d/m/Y');
            $data["text_date"]="dd/mm/YYYY";        

            $data['text_childcount'] = $this->language->get('text_childcount');
            $data['text_autcount'] = $this->language->get('text_autcount');
            $data['text_babycount'] = $this->language->get('text_babycount');
            $data['text_childlim'] = $this->language->get('text_childlim');
            $data['text_video'] = $this->language->get('text_video');
            $data['text_camket'] = $this->language->get('text_camket');
            $data['text_autlim'] = $this->language->get('text_autlim');
            $data['text_inflim'] = $this->language->get('text_inflim');
            $data['flights_checkout'] = $this->language->get('flights_checkout');
            $data['flights_checkin'] = $this->language->get('flights_checkin');
            $data['text_loaive'] = $this->language->get('text_loaive');
            $data['text_khuhoi'] = $this->language->get('text_khuhoi');
            $data['text_motluot'] = $this->language->get('text_motluot');
            $data['text_from']  = $this->language->get('text_from');
            $data['text_to']  = $this->language->get('text_to');
            $data['thanhtoan'] = $this->url->link('information/information', 'information_id=9');
            $data['datve'] = $this->url->link('information/information', 'information_id=8');            
            $data['caccamket'] = $this->url->link('information/information', 'information_id=12');
            $data['suport_online'] = $this->language->get('suport_online');
            $data['textheading_title'] = $this->language->get('heading_title');
            $data['text_licham'] = $this->language->get('text_licham');
            $data['Testtimeoutin'] = $this->url->link('module/searchve/Testtimeoutin');
            // tour

            $data['txt_tourin'] = $this->language->get('txt_tourin'); 
            $data['txt_tourout'] = $this->language->get('txt_tourout'); 
            $data['txt_searchtour'] = $this->language->get('txt_searchtour'); 
            $data['txt_classsearchtour'] = $this->language->get('txt_classsearchtour'); 
            $data['dateout'] = $this->language->get('dateout'); 
            $data['datein'] = $this->language->get('datein'); 
            $data['add_in'] = $this->language->get('add_in'); 
            $data['add_out'] = $this->language->get('add_out'); 
            $data['text_rountrip'] = $this->language->get('text_rountrip'); 
            $data['text_search'] = $this->language->get('text_search');

            $data['xemdonhang'] = $this->url->link('information/xemdonhang');
            $data['text_childcount'] = $this->language->get('text_childcount');
            $data['text_autcount'] = $this->language->get('text_autcount');
            $data['text_babycount'] = $this->language->get('text_babycount');
            $data['flights_checkout'] = $this->language->get('flights_checkout');
            $data['flights_checkin'] = $this->language->get('flights_checkin');
            $data['text_loaive'] = $this->language->get('text_loaive');
            $data['text_khuhoi'] = $this->language->get('text_khuhoi');
            $data['text_motluot'] = $this->language->get('text_motluot');
            $data['text_from']  = $this->language->get('text_from');
            $data['text_to']  = $this->language->get('text_to');
            $data['datve']=$this->url->link('news/news', '&catid=91&news_id=104');
            $data['thanhtoan']=$this->url->link('news/news', '&catid=91&news_id=77'); 
            $data['suport_online'] = $this->language->get('suport_online');
            $data['textheading_title'] = $this->language->get('heading_title');
            $data['text_searchair'] = $this->language->get('text_searchair');
            $data['text_searchair1'] = $this->language->get('text_searchair1');
            $data['text_licham'] = $this->language->get('text_licham');                
            $data['action_view']=$this->url->link('product/search/view', '&product_id=');
            // news			
			$layout_id = 0;
			$data['layout_id'] = $layout_id = $this->model_design_layout->getLayout($route);
			
			if(isset($this->request->get['route']) &&  $this->request->get['route']== 'search/hotel'){   
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
				'room1'  => 1,         
				'options'  => '0'             
				);           
				if(isset($this->request->post['hotelId']))$data['hotelId'] = $this->request->post['hotelId'];            
				$data['rooms']=(isset($this->request->post['rooms']))?$this->request->post['rooms']:1; 
				$data['audlts']=(isset($this->request->post['audlts']))? $this->request->post['audlts']:1; 
				$data['kids'] = (isset($this->request->post['kids']))?$this->request->post['kids']:0;             
				$result = json_decode($this->model_catalog_hotels->getApi($data));
				if(isset($result)){
					$rate = (int)$result->HotelInformationResponse->HotelSummary->highRate + (int)$result->HotelInformationResponse->HotelSummary->lowRate; 
					$rate = ($rate<0)?(-1*$rate/2):(1*$rate/2);
					$images = array();
					$HotelImages = $result->HotelInformationResponse->HotelImages->HotelImage;                           
					foreach($HotelImages as $item){                 
						$images[] = array(
						'image' => $item->url,
						'thumb' => $item->thumbnailUrl
						); 
					}
					$types = array();
					$RoomTypes = $result->HotelInformationResponse->RoomTypes->RoomType;   
					foreach($RoomTypes as $item){       
						$description =  $descriptions = array();                         
						$description =  explode('<b>',$item->descriptionLong); 
						foreach($description as $long){
							$descriptions[]= explode('-',$long);  
						}                      
						$types[] = array(
						'description' => $item->description,
						'descriptions' => $descriptions,
						'RoomType' => isset($descriptions[0][0])?html_entity_decode($descriptions[0][0],ENT_QUOTES, 'UTF-8'):'',
						'descriptionLong' => html_entity_decode($item->descriptionLong,ENT_QUOTES, 'UTF-8'),
						'RoomAmenity' => $item->roomAmenities->RoomAmenity
						); 
					}
					// active
					$data['href_checkout'] = $this->url->link('checkout/carthotel', 'hotelId=' . $result->HotelInformationResponse->HotelSummary->hotelId);
					
					$data['hotel'] = array(
					'hotelId' => $result->HotelInformationResponse->HotelSummary->hotelId,
					'href' =>  $this->url->link('product/hotel','hotelId='.$result->HotelInformationResponse->HotelSummary->hotelId),
					'name' => $result->HotelInformationResponse->HotelSummary->name,
					'address' => $result->HotelInformationResponse->HotelSummary->address1.', '.$result->HotelInformationResponse->HotelSummary->address2,
					'city' => $result->HotelInformationResponse->HotelSummary->city,
					'countryCode' => $result->HotelInformationResponse->HotelSummary->countryCode,
					'hotelRating' => $result->HotelInformationResponse->HotelSummary->hotelRating,
					'hotelpercent' =>  floor((float)$result->HotelInformationResponse->HotelSummary->hotelRating*100/5),
					'rate' =>  $this->currency->format($rate),
					'highRate' => floor((float)$result->HotelInformationResponse->HotelSummary->highRate),
					'highRateformat' => $this->currency->format((float)$result->HotelInformationResponse->HotelSummary->highRate),
					'lowRate' => floor((float)$result->HotelInformationResponse->HotelSummary->lowRate),
					'lowRateformat' =>$this->currency->format((float)$result->HotelInformationResponse->HotelSummary->lowRate),
					'propertyInformation' => html_entity_decode($result->HotelInformationResponse->HotelDetails->propertyInformation,ENT_QUOTES, 'UTF-8'),
					'areaInformation' => html_entity_decode($result->HotelInformationResponse->HotelDetails->areaInformation,ENT_QUOTES, 'UTF-8'),
					'propertyDescription' => html_entity_decode($result->HotelInformationResponse->HotelDetails->propertyDescription,ENT_QUOTES, 'UTF-8'),
					'hotelPolicy' => html_entity_decode($result->HotelInformationResponse->HotelDetails->hotelPolicy,ENT_QUOTES, 'UTF-8'),
					'roomInformation' => html_entity_decode($result->HotelInformationResponse->HotelDetails->roomInformation,ENT_QUOTES, 'UTF-8'),
					'checkInInstructions' => html_entity_decode($result->HotelInformationResponse->HotelDetails->checkInInstructions,ENT_QUOTES, 'UTF-8'),
					'RoomType' => $types,
					'HotelImages' => $images,
					'post' => isset($this->request->post)?$this->request->post: array(),
					);          
				}	
			}	
			
            if (isset($this->request->post['hotelId'])) {
                $data['hotelId'] = $this->request->post['hotelId'];
            }else if (isset($this->request->get['hotelId'])) {
                $data['hotelId'] = $this->request->get['hotelId'];
            } else {
                $data['hotelId'] = '';
            }
			if (isset($this->request->post['destinationString'])) {
                $data['destinationString'] = $this->request->post['destinationString'];
            }else if (isset($this->request->get['destinationString'])) {
                $data['destinationString'] = $this->request->get['destinationString'];
            } else {
                $data['destinationString'] = '';
            }
			if (isset($this->request->post['destinationId'])) {
                $data['destinationId'] = $this->request->post['destinationId'];
            }else if (isset($this->request->get['destinationId'])) {
                $data['destinationId'] = $this->request->get['destinationId'];
            } else {
                $data['destinationId'] = '';
            }
			if (isset($this->request->post['arrivalDate'])) {
                $data['arrivalDate'] = $this->request->post['arrivalDate'];
            } else if (isset($this->request->get['arrivalDate'])) {
                $data['arrivalDate'] = $this->request->get['arrivalDate'];
            } else {
                $data['arrivalDate'] = '';
            }
			if (isset($this->request->post['departureDate'])) {
                $data['departureDate'] = $this->request->post['departureDate'];
            }else if (isset($this->request->get['departureDate'])) {
                $data['departureDate'] = $this->request->get['departureDate'];
            } else {
                $data['departureDate'] = '';
            }
			if (isset($this->request->post['rooms'])) {
                $data['rooms'] = $this->request->post['rooms'];
            }else if (isset($this->request->get['rooms'])) {
                $data['rooms'] = $this->request->get['rooms'];
            } else {
                $data['rooms'] = 1;
            }
			if (isset($this->request->post['adults'])) {
                $data['adults'] = $this->request->post['adults'];
            }else if (isset($this->request->get['adults'])) {
                $data['adults'] = $this->request->get['adults'];
            } else {
                $data['adults'] = 2;
            }
			if (isset($this->request->post['kids'])) {
                $data['kids'] = $this->request->post['kids'];
            }else if (isset($this->request->get['kids'])) {
                $data['kids'] = $this->request->get['kids'];
            } else {
                $data['kids'] = 0;
            }
			
			if (isset($this->request->get['cat_id'])) {
                $data['cat_id'] = $this->request->get['cat_id'];
            } else {
                $data['cat_id'] = '';
            }
			
			if (isset($this->request->get['catid'])) {
                $parts = explode('_', (string)$this->request->get['catid']);
            } else {
                $parts = array();
            }

            if (isset($parts[0])) {
                $data['cat_id'] = $parts[0];
            } else {
                $data['cat_id'] = 0;
            }

            if (isset($parts[1])) {
                $data['child_id'] = $parts[1];
            } else {
                $data['child_id'] = 0;
            }
            if($data['cat_id'] == 84 || $data['child_id'] == 84){
                $pagehotel= $pagetour = false;
                $pageflight = true; 
            }else if($data['cat_id'] == 101 || $data['child_id'] == 101){
                    $pagehotel = true;
                    $pagetour = $pageflight = false; 
                }else{
                    $pagetour = $pageflight = false;
                    $pagehotel = true; 
            }
             $data['pagehotel'] =$pagehotel;
             $data['pageflight'] =$pageflight;
             $data['pagetour'] =$pagetour;


            if(isset($this->request->get['news_id'])){
                $data['newid'] = $this->request->get['news_id'];
            }else{
                $data['newid'] =0;
            }                    
            // news


            $this->load->model('module/searchve'); 
            $data['name_tour']=$this->model_module_searchve->gettour();   
            $gettourSpecial=$this->model_module_searchve->gettourSpecial();//sửa 16/07/2015 


            if(isset($gettourSpecial))
            {
                foreach($gettourSpecial as $kq)
                { 
                    if(isset($kq['district_from']) && $kq['district_from'] !=0 && $kq['district_to'] && $kq['district_to'] !=0)
                    {
                        $data['gettourSpecial'][]=array(
                        'product_id' => $kq['product_id'],
                        'image' =>  HTTPS_IMAGE.$kq['image'],
                        'price' => str_replace(',','.',number_format($kq['price'])),
                        'district_from' => $this->model_module_searchve->getdistrict($kq['district_from']),
                        'district_to'  =>  $this->model_module_searchve->getdistrict($kq['district_to']),
                        'description'  =>  html_entity_decode($kq['meta_description'], ENT_QUOTES, 'UTF-8')
                        );
                    }
                }
            }

			return $this->load->view('module/searchve', $data);
        }
        function delete_catche(){
            $files = glob(DIR_CACHE.'dataflight/*'); // get all file names
            foreach($files as $file){ // iterate files
                if ((time()-filectime($file)) > 60*60*24) {
                    if(is_file($file))
                    {
                        unlink($file); // delete file
                    }
                }    
            }
            $files = glob(DIR_CACHE.'dataflightqt/*'); // get all file names
            foreach($files as $file){ // iterate files
                if ((time()-filectime($file)) > 60*60*24) {
                    if(is_file($file))
                    {
                        unlink($file); // delete file
                    }
                } 
            }
        } 
        public function Testtimeoutin(){
            //thoi gian hien tai
            $nows = getdate();
            $currentDate = $nows["mday"] . "-" . $nows["mon"] . "-" . $nows["year"]; 
            $chuoi = '';
            if (($this->request->server['REQUEST_METHOD'] == 'POST')) {
                $loaive = $_POST['loaive'];
                $ngaydi = $_POST['flights-checkin'];
                $ngayve = $_POST['flights-checkout'];
                if($loaive=="motluot"){     
                    if(strtotime($ngaydi) < strtotime($currentDate)){
                        $chuoi .= " Ngày xuất phát phải lớn hơn hoặc bằng ngày hiện tại! "; 
                    }else{
                        $chuoi .= "ok"; 
                    }
                }elseif($loaive=="khuhoi"){
                    if(strtotime($ngaydi) < strtotime($currentDate)){
                        $chuoi .= " Ngày xuất phát phải lớn hơn hoặc bằng ngày hiện tại! "; 
                    }elseif(strtotime($ngayve) < strtotime($ngaydi)){
                        $chuoi .= " Ngày về phải lớn hơn hoặc bằng ngày xuất phát! ";  
                    }else{
                        $chuoi .= "ok"; 
                    }  
                }
            }else{
                $chuoi .= "Không thành công !";
            }
            echo $chuoi;
        }
        public function autocomplete()
        {
            if(isset($this->request->get['district_from_tour']))
            {
                $district_from_tour=$this->request->get['district_from_tour'];
            }else{
                $district_from_tour='';
            }           

            $json = array();
            if(isset($district_from_tour))
            {
                $this->load->model('module/searchve');          

                $getnametour=$this->model_module_searchve->gettour($district_from_tour); 

                foreach($getnametour as $kq)
                {
                    $json[]=array(
                    'name' => $kq['name'],
                    'destination' => $kq['destination']
                    );
                }

                $this->response->setOutput(json_encode($json));
            }
        }
		public function getdestination()
        {
            if(isset($this->request->get['destinationString']))
            {
                $destinationString=$this->request->get['destinationString'];
            }else{
                $destinationString='';
            }
			$this->load->model('catalog/hotels');    
			$this->language->load('module/hotelcared');   
			$data['heading_title'] = $this->language->get('heading_title');
			$data['href_page'] = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];  
			$url = '';          
			if (isset($this->request->get['page'])) {
				$page = $this->request->get['page'];
				$url .= '&page=' . $this->request->get['page'];
			} else {
				$page = 1;
			}

			if (isset($this->request->get['limit'])) {
				$limit = $this->request->get['limit'];
				$url .= '&limit=' . $this->request->get['limit'];
			} else {
				$limit = 5;
			}			
			/*GET EXPERIA */ 
			$nows = getdate();
			$arrivalDate = $nows["mon"] . "/" .  ($nows["mday"]+3) . "/" . $nows["year"];  
			$departureDate =  $nows["mon"] . "/" .($nows["mday"]+4) . "/" .$nows["year"];
			$data = array(
			'ver'     => 'v3/',
			'method'  => 'geoSearch/',
			'type'  => '1'
			);
			$json = array();
            $destinationString = $this->locdau($this->request->get['destinationString']);
			if(isset($this->request->get['destinationString']))$data['destinationString']= str_replace(" ","%20",$destinationString);
			if(isset($this->request->get['countryCode']) && $this->request->get['countryCode'] != "")$data['countryCode']= $this->request->get['countryCode'];
			$result = json_decode($this->model_catalog_hotels->getApi($data));     			
            if(isset($result->LocationInfoResponse->LocationInfos->LocationInfo)){
				$destinations = array();
				$destinations = $result->LocationInfoResponse->LocationInfos->LocationInfo;
				if(isset($destinations->destinationId)){
					$json['city'][]=array(
						'name' => $destinations->destinationId,
						'destination' => isset($destinations->description)?($destinations->description.', '.$destinations->countryName):($destinations->city.', '.$destinations->countryName)
					);
				}else{
					foreach($destinations as $destination){
						$json['city'][]=array(
							'name' => $destination->destinationId,
							'destination' => isset($destination->description)?($destination->description.', '.$destination->countryName):($destination->city.', '.$destination->countryName)
						);
					}							
				}
			}
			
			if(count($json)<1){
				$result = json_decode($this->model_catalog_hotels->getApi($data));     			
				if(isset($result->LocationInfoResponse->LocationInfos->LocationInfo)){
					$destinations = array();
					$destinations = $result->LocationInfoResponse->LocationInfos->LocationInfo;
					if(isset($destinations->destinationId)){
						$json['city'][]=array(
							'name' => $destinations->destinationId,
							'destination' => isset($destinations->description)?($destinations->description.', '.$destinations->countryName):($destinations->city.', '.$destinations->countryName)
						);
					}else{
						foreach($destinations as $destination){
							$json['city'][]=array(
								'name' => $destination->destinationId,
								'destination' => isset($destination->description)?($destination->description.', '.$destination->countryName):($destination->city.', '.$destination->countryName)
							);
						}							
					}
				}
			}
            //search hotels
            $results = $this->model_catalog_hotels->searchHotels($destinationString);
            foreach($results as $result){
                $json['hotels'][]=array(
                    'hotelId' => $result['EANHotelId'],
                    'name' => $result['Name'],
                );
            }

            $html = '';
            if(isset($json['city'])){
                $json['city'] = array_slice($json['city'],0,6);
                $html .= '<li type="city"><b>Thành phố</b></li>';
                foreach($json['city'] as $city){
                    $html .= '<li class="item-auto" type="city" des-id="'.$city['name'].'">'.$city['destination'].'</li>';
                }
            }

            if(isset($json['hotels'])){
                $html .= '<li type="hotel"><b>Khách sạn</b></li>';
                foreach($json['hotels'] as $hotel){
                    $html .= '<li class="item-auto" type="hotel" hotel-id="'.$hotel['hotelId'].'">'.$hotel['name'].'</li>';
                }
            }
            echo $html;
//            $this->response->setOutput(json_encode($json));
        }
		public function locdau($str){
            $unicode = array(
            'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
            'd'=>'đ',
            'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
            'i'=>'í|ì|ỉ|ĩ|ị',
            'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
            'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
            'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
            'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
            'D'=>'Đ',
            'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
            'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
            'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
            'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
            'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
            );
            foreach($unicode as $nonUnicode=>$uni){
                $str = preg_replace("/($uni)/i", $nonUnicode, $str);
            }
            return $str;

        } 
    }
?>