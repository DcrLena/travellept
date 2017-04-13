<?php 
    class ControllerProductSearchhotels extends Controller { 	
    public function index() {     
        $this->load->model('catalog/hotels');    
        $this->language->load('module/hotelcared');
        $this->data['heading_title'] = $this->language->get('heading_title');
        $this->data['href_page'] = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];  
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
            $limit = 100;
        }            
        /*GET EXPERIA */ 
        $nows = getdate();
        $arrivalDate = $nows["mon"] . "/" .  ($nows["mday"]+3) . "/" . $nows["year"];  
        $departureDate =  $nows["mon"] . "/" .($nows["mday"]+4) . "/" .$nows["year"];
        $data = array(
        'ver'     => 'v3/',
        'method'  => 'list/',      
        'room1'  => 2              
        );

		if(isset($this->request->post['hotelId'])){
			$data['hotelId'] = $this->request->post['hotelId'];
		}else{
			$data['hotelId'] = 0;
		}

        if(isset($this->request->post['destinationString'])){
			$data['destinationId']= $this->request->post['destinationId']; 
		}else{
			if(isset($this->request->post['destinationString']))$data['destinationString']= $this->locdau(str_replace(" ","",$this->request->post['destinationString'])); 
		}

        $data['arrivalDate']=(isset($this->request->post['arrivalDate']) && $this->request->post['arrivalDate']!='' )?date('m/d/Y', strtotime($this->request->post['arrivalDate'])):$arrivalDate;
        $data['departureDate']=(isset($this->request->post['departureDate']) && $this->request->post['departureDate']!='')?date('m/d/Y', strtotime($this->request->post['departureDate'])):$departureDate;
        if(isset($this->request->post['rooms'])) $data['rooms']=$this->request->post['rooms']; 
        if(isset($this->request->post['adults'])) $data['adults']= $this->request->post['adults']; 
        if(isset($this->request->post['kids'])) $data['kids'] = $this->request->post['kids'];                
        $result = json_decode($this->model_catalog_hotels->getApi($data));

		$this->data['moreResultsAvailable'] = $result->HotelListResponse->moreResultsAvailable;
		$this->data['cacheKey'] = $result->HotelListResponse->cacheKey;
		$this->data['cacheLocation'] = $result->HotelListResponse->cacheLocation;
		$this->data['arrivalDate'] = $data['arrivalDate'];
		$this->data['departureDate'] = $data['departureDate'];
		$this->data['rooms'] = $data['rooms'];
		$this->data['adults'] = $data['adults'];
		$this->data['kids'] = $data['kids'];

        $list = $result->HotelListResponse->HotelList->HotelSummary;

		if(!is_array($list)){
			$item = $list;
			$list = array();
			$list[0] = $item;
		}

        if(isset($list) && count($list > 0)){
            $this->session->data['hotels'] = $list;   
        }else if(isset($this->request->get['page'])){
                $list = $this->session->data['hotels'];  
		} 
		$this->data['hotels'] = $hotelcareds = array();
        foreach($list as $val){			
			$href = '';		
			$href = '&hotelId='.$val->hotelId.'&arrivalDate='.$data['arrivalDate'].'&departureDate='.$data['departureDate'].'&rooms='.$data['rooms'].'&adults='.$data['adults'].'&kids='.$data['kids'];	
			$hotelcareds[] = array(
			'hotelId' => $val->hotelId,
			'name' => $val->name,
			'address' => $val->address1.' '.(isset($val->address2)?$val->address2:''),
			'countryCode' => $val->countryCode,
			'city' => $val->city,
			'rate' =>  $val->tripAdvisorReviewCount,
			'hotelRating' => floor((float)$val->hotelRating*100/5),
			'tripAdvisorRating' => $val->tripAdvisorRating * 2,
			'tripAdvisorReviewCount' =>$val->tripAdvisorReviewCount,
			'tripAdvisorRatingUrl' => $val->tripAdvisorRatingUrl,
			'promoDescription' => isset($val->RoomRateDetailsList->RoomRateDetails->RateInfos->RateInfo->promoDescription)?$val->RoomRateDetailsList->RoomRateDetails->RateInfos->RateInfo->promoDescription:'',
			'highRate' => $this->currency->format($val->highRate),
			'price' => $this->currency->format($val->lowRate),
			'rateCurrencyCode' => $val->rateCurrencyCode,
			'shortDescription' => substr($val->shortDescription,63),
			'thumbNailUrl' =>'http://images.travelnow.com'.str_replace('_t','_b',$val->thumbNailUrl),
			'deepLink' => $val->deepLink,
			'href' =>  $this->url->link('product/hotel',$href),
			'latitude' => $val->latitude,
			'longitude' => $val->longitude,
			);
		}
		
				
        $this->data['hotels'] = $hotelcareds;
        /*END EXPERIA */   
		if(isset($this->request->get['order_by'])){
			$obs = array();
			$obs = explode(',',$this->request->get['order_by']);
			foreach($obs as $o){
				if($o == 'hotelRating' || $o == 'rate'){
				$this->myARSort($this->data['hotels'],$o);
				}else{
					$this->myASort($this->data['hotels'],$o);
				}				
			}
			if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/product/searchhotels_html.tpl')) {
				$this->template = $this->config->get('config_template') . '/template/product/searchhotels_html.tpl';
			} else {
				$this->template = 'default/template/product/searchhotels_html.tpl';
			}
			$this->response->setOutput($this->render());
		}else{			
			if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/product/searchhotels.tpl')) {
				$this->template = $this->config->get('config_template') . '/template/product/searchhotels.tpl';
			} else {
				$this->template = 'default/template/product/searchhotels.tpl';
			}
			$this->children = array(
			'common/column_left',
			'common/column_right',
			'common/content_top',
			'common/content_bottom',
			'common/content_positionheader',
			'common/footer',
			'common/header'
			);
			$this->response->setOutput($this->render());
		}
    }
	function myASort (&$array, $key) {
		$sorter=array();
		$ret=array();
		reset($array);
		foreach ($array as $ii => $va) {
			$sorter[$ii]=$va[$key];
		}
		asort($sorter);
		foreach ($sorter as $ii => $va) {
			$ret[$ii]=$array[$ii];
		}
		$array=$ret;
	}
	function myARSort (&$array, $key) {
		$sorter=array();
		$ret=array();
		reset($array);
		foreach ($array as $ii => $va) {
			$sorter[$ii]=$va[$key];
		}
		arsort($sorter);
		foreach ($sorter as $ii => $va) {
			$ret[$ii]=$array[$ii];
		}
		$array=$ret;
	}

	public function pagingHotels()
		{
			$this->load->model('catalog/hotels');
			if(isset($this->request->post['cacheKey']) && isset($this->request->post['cacheLocation'])) {
				$data = array(
					'ver'     => 'v3/',
					'method'  => 'list/',
					'room1'  => 2,
					'cacheKey' => $this->request->post['cacheKey'],
					'cacheLocation' => $this->request->post['cacheLocation'],
				);
				$result = json_decode($this->model_catalog_hotels->getMoreResults($data));
				$json['moreResultsAvailable'] = $result->HotelListResponse->moreResultsAvailable;
				$json['cacheKey'] = $result->HotelListResponse->cacheKey;
				$json['cacheLocation'] = $result->HotelListResponse->cacheLocation;
				$list = $result->HotelListResponse->HotelList->HotelSummary;
				$html = '';
				foreach($list as $val){
					$hotelId = $val->hotelId;
					$name = $val->name;
					$address = $val->address1.' '.(isset($val->address2)?$val->address2:'');
					$countryCode = $val->countryCode;
					$city = $val->city;
					$rate =  $val->tripAdvisorReviewCount;
					$hotelRating = floor((float)$val->hotelRating*100/5);
					$tripAdvisorRating = $val->tripAdvisorRating * 2;
					$tripAdvisorReviewCount =$val->tripAdvisorReviewCount;
					$tripAdvisorRatingUrl = $val->tripAdvisorRatingUrl;
					$promoDescription = isset($val->RoomRateDetailsList->RoomRateDetails->RateInfos->RateInfo->promoDescription)?$val->RoomRateDetailsList->RoomRateDetails->RateInfos->RateInfo->promoDescription:'';
					$price = $this->currency->format($val->lowRate);
					$rateCurrencyCode = $val->rateCurrencyCode;
					$shortDescription = substr($val->shortDescription,63);
					$thumbNailUrl = 'http://images.travelnow.com'.str_replace('_t','_b',$val->thumbNailUrl);
					$deepLink = $val->deepLink;
					$href =  $this->url->link('product/hotel',$href);

					$html.='<article class="box">                                    
							<div class="dtresult details col-sm-7 col-md-12" dtname="'.$name.'" dtprice="'.$price.'" dtrating="'.$hotelRating.'" dtpopularity="'.$rate.'">
								<div>
									<div>												
										<div class="col-sm-12 col-md-12">                                        
											<figure class="col-sm-5 col-md-4">
											<a target="_blank"  title="" href="'.$href.'" class="hover-effect "><img style="width:202px; height:122px" alt="" src="'.$thumbNailUrl.'"></a>
											</figure>
											<div class="col-sm-8 col-md-8" >';
											if($promoDescription!=""){
											$html.='
												<div class="col-sm-12 col-md-12">
													<i class="sale color-green glyphicon-tag"> </i>
													<a class="color-green ">'.$promoDescription.'</a>
												</div>';
											}
											$html.='<h4 class="col-sm-12 col-md-12">
												<a target="_blank"  class="color-gray" style="float:left;" href="'.$href.'">'.$name.'</a> <div class="five-stars-container" style="float:left; margin-left:10px;">
												<span class="five-stars" style="width: '.$hotelRating.'%;"></span>
												</div><br>
												<small class="address"><i class="soap-icon-departure yellow-color"></i> '.$address.'</small>
												</h4>
												<div class="col-sm-12 col-md-12">													
													<div class="col-sm-6 col-md-6 border-right">													
													<span class="review"><img alt="tripAdvisorReviewCount" src="image/data/logo/logo-2.png"><a class="color-green ">'.$tripAdvisorRating.'</a>&nbsp;/&nbsp;10 </span>
													</div>
													<div class="col-sm-6 col-md-6">													
													<span class="review"><img alt="tripAdvisorReviewCount" src="'.$tripAdvisorRatingUrl.'">'.$tripAdvisorReviewCount.'</span>
													</div>
												</div>
												
											</div>
										</div>                                    
									</div>
									<div>
										
										<div class="col-sm-12 col-md-12">                                        
											<div>
												<span class="price"><small class="line-through">'.$highRate.'</small>
												'.$price.'
												</span>
												<a class="button green-bg btn-small full-width text-center" title="" href="'.$href.'" target="_blank">CHỌN PHÒNG</a>
											</div>
										</div>
									</div>
								</div>								
							</div>
						</article>';
				}
				
				$json['html'] = $html;
				$this->response->addHeader('Content-Type: application/json');
				$this->response->setOutput(json_encode($json));
			}
	}

    public function htmlHotels()
		{
			$this->load->model('catalog/hotels');    
        $this->language->load('module/hotelcared');
        $this->data['heading_title'] = $this->language->get('heading_title');
        $this->data['href_page'] = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];  
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
            $limit = 100;
        }            
        /*GET EXPERIA */ 
        $nows = getdate();
        $arrivalDate = $nows["mon"] . "/" .  ($nows["mday"]+3) . "/" . $nows["year"];  
        $departureDate =  $nows["mon"] . "/" .($nows["mday"]+4) . "/" .$nows["year"];
        $data = array(
        'ver'     => 'v3/',
        'method'  => 'list/',      
        'room1'  => 2              
        );
		
        if(isset($this->request->post['destinationString'])){
			$data['destinationId']= $this->request->post['destinationId']; 
		}else{
			if(isset($this->request->post['destinationString']))$data['destinationString']= $this->locdau(str_replace(" ","",$this->request->post['destinationString'])); 
		}
        $data['arrivalDate']=(isset($this->request->post['arrivalDate']) && $this->request->post['arrivalDate']!='' )?date('m/d/Y', strtotime($this->request->post['arrivalDate'])):$arrivalDate;
        $data['departureDate']=(isset($this->request->post['departureDate']) && $this->request->post['departureDate']!='')?date('m/d/Y', strtotime($this->request->post['departureDate'])):$departureDate;
        if(isset($this->request->post['rooms'])) $data['rooms']=$this->request->post['rooms']; 
        if(isset($this->request->post['adults'])) $data['adults']= $this->request->post['adults']; 
        if(isset($this->request->post['minRate'])) $data['minRate'] = (float) $this->request->post['minRate']/23000;                
        if(isset($this->request->post['maxRate'])) $data['maxRate'] = (float) $this->request->post['maxRate']/23000;                
        
		$result = json_decode($this->model_catalog_hotels->getApi($data));
		
		$this->data['moreResultsAvailable'] = $result->HotelListResponse->moreResultsAvailable;
		$this->data['cacheKey'] = $result->HotelListResponse->cacheKey;
		$this->data['cacheLocation'] = $result->HotelListResponse->cacheLocation;
		$this->data['arrivalDate'] = $data['arrivalDate'];
		$this->data['departureDate'] = $data['departureDate'];
		$this->data['rooms'] = $data['rooms'];
		$this->data['adults'] = $data['adults'];
		$this->data['kids'] = $data['kids'];

        $list = $result->HotelListResponse->HotelList->HotelSummary;
        if(isset($list) && count($list > 0)){
            $this->session->data['hotels'] = $list;   
        }else if(isset($this->request->get['page'])){
                $list = $this->session->data['hotels'];  
		} 
		$this->data['hotels'] = $hotelcareds = array();
		
        foreach($list as $val){ 
			$href = '';		
			$href = '&hotelId='.$val->hotelId.'&arrivalDate='.$data['arrivalDate'].'&departureDate='.$data['departureDate'].'&rooms='.$data['rooms'].'&adults='.$data['adults'].'&kids='.$data['kids'];	
			$rate = (int)$val->highRate + (int)$val->lowRate; 
			$rate = ($rate<0)?(-1*$rate):(1*$rate);                                
			$hotelcareds[] = array(
			'hotelId' => $val->hotelId,
			'name' => $val->name,
			'address' => $val->address1.' '.(isset($val->address2)?$val->address2:''),
			'countryCode' => $val->countryCode,
			'city' => $val->city,
			'rate' =>  $val->tripAdvisorReviewCount,
			'hotelRating' => floor((float)$val->hotelRating*100/5),
			'tripAdvisorRating' => $val->tripAdvisorRating * 2,
			'tripAdvisorReviewCount' =>$val->tripAdvisorReviewCount,
			'tripAdvisorRatingUrl' => $val->tripAdvisorRatingUrl,
			'promoDescription' => isset($val->RoomRateDetailsList->RoomRateDetails->RateInfos->RateInfo->promoDescription)?$val->RoomRateDetailsList->RoomRateDetails->RateInfos->RateInfo->promoDescription:'',
			'highRate' => $this->currency->format($val->highRate),
			'price' => $this->currency->format($val->lowRate),
			'rateCurrencyCode' => $val->rateCurrencyCode,
			'shortDescription' => substr($val->shortDescription,63),
			'thumbNailUrl' =>'http://images.travelnow.com'.str_replace('_t','_b',$val->thumbNailUrl),
			'deepLink' => $val->deepLink,
			'href' =>  $this->url->link('product/hotel',$href),
			'latitude' => $val->latitude,
			'longitude' => $val->longitude,
			); 
		}
				
        $this->data['hotels'] = $hotelcareds; 
        /*END EXPERIA */   
		
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/product/searchhotels_html.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/product/searchhotels_html.tpl';
		} else {
			$this->template = 'default/template/product/searchhotels_html.tpl';
		}
		$this->response->setOutput($this->render());
	}

	public function searchdDestination() {
        $this->load->model('catalog/hotels'); 
        /*GET EXPERIA */ 
        $data = array(
        'ver'     => 'v3/',
        'method'  => 'list/'
        );
        if(isset($this->request->post['destinationString']))$data['destinationString']= str_replace(" ","",$this->request->post['destinationString']); 
        $result = json_decode($this->model_catalog_hotels->getApi($data));
        $this->data['destination']= $destination = array();
        if(isset( $result->HotelListResponse->LocationInfos->LocationInfo)){
            $destination = $result->HotelListResponse->LocationInfos->LocationInfo;
        }  
        $this->data['destination']= $destination;
        return  $this->data['destination'];
        /*END EXPERIA */   
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