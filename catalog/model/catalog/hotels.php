<?php
    class ModelCatalogHotels extends Model {     
        public function getApi($data){
            $secret = 'f7ftb8n27le7b';
            $host = 'http://api.ean.com/';  
            $path = "ean-services/rs/hotel/{$data['ver']}{$data['method']}";             
            // query parameters
            $apiKey = 'mf5l1buqk9oi79j8r7ur4limp';
            $cid = '464112';
            $minorRev = '30';
            $customerUserAgent = 'Mozilla/4.0';
            $customerIpAddress = '125.212.250.6';
            $customerSessionId= '123';
            $locale = 'vi_VN';
            $currencyCode = 'USD';
            $type = isset($data['type'])?"&type={$data['type']}":'';
            $room1 = isset($data['room1'])?"&room1={$data['room1']}":'';
            $arrivalDate = isset($data['checkin'])?"&arrivalDate={$data['checkin']}":(isset($data['arrivalDate'])?"&arrivalDate={$data['arrivalDate']}":'');
            $departureDate = isset($data['checkout'])?"&departureDate={$data['checkout']}":(isset($data['departureDate'])?"&departureDate={$data['departureDate']}":'');
            $hotelId = isset($data['hotelId'])? "&hotelId={$data['hotelId']}":'';
            $hotelIdList = isset($data['hotelIdList'])? "&hotelIdList={$data['hotelIdList']}":'';
            $audlts = isset($data['audlts'])?",{$data['audlts']}":'';
            $kids = isset($data['kids'])?",{$data['kids']}":'';
            $rooms = isset($data['rooms'])?"&rooms={$data['rooms']}{$audlts}{$kids}":'';
            $xml = isset($data['xml'])?"&xml={$data['xml']}":'';
            $city = isset($data['city'])?"&city={$data['city']}":'';
            $regionId = isset($data['regionId'])?"&regionId={$data['regionId']}":'';
            $Country = isset($data['Country'])?"&Country={$data['Country']}":'';
            $destinationId = isset($data['destinationId'])?"&destinationId={$data['destinationId']}":'';
            $destinationString = isset($data['destinationString']) && $hotelId =='' ?"&destinationString={$data['destinationString']}":'';
            $countryCode = isset($data['countryCode'])?"&countryCode={$data['countryCode']}":'';
            $stateProvinceCode = isset($data['stateProvinceCode'])?"&stateProvinceCode={$data['stateProvinceCode']}":'';  
            $options = isset($data['options'])?"&options={$data['options']}":'';              
            $includeDetails = isset($data['includeDetails'])?"&includeDetails={$data['includeDetails']}":'';              
            $numberOfResults = isset($data['numberOfResults'])?"&numberOfResults={$data['numberOfResults']}":200;              
            // Filter
			$minRate = isset($data['minRate'])?"&minRate={$data['minRate']}":'';              
            $maxRate = isset($data['maxRate'])?"&maxRate={$data['maxRate']}":'';              
            			
			$timestamp = gmdate('U');
            $sig = md5($apiKey . $secret . $timestamp);

            $query = "?apikey={$apiKey}&cid={$cid}&sig={$sig}&minorRev={$minorRev}"
            . "&customerUserAgent={$customerUserAgent}&customerIpAddress={$customerIpAddress}&customerSessionId={$customerSessionId}"
            . "&locale={$locale}&currencyCode={$currencyCode}{$type}{$room1}{$rooms}{$arrivalDate}{$departureDate}{$hotelId}{$hotelIdList}{$xml}{$city}{$regionId}{$Country}{$destinationId}{$destinationString}{$countryCode}{$stateProvinceCode}{$options}{$includeDetails}{$numberOfResults}{$minRate}{$maxRate}";		
            // initiate curl
			$urlapi =  $host.$path.$query; 
			//echo $urlapi; exit;
			$ch = curl_init();
			curl_setopt($ch,CURLOPT_URL,$urlapi);
            curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
            curl_setopt($ch, CURLOPT_HTTPHEADER,array('Accept:application/json'));
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $data = curl_exec($ch); //var_dump($data); exit;
            $headers = curl_getinfo($ch);
            // close curl            
            // return XML data
            if ($headers['http_code'] != '200') {
                echo "An error has occurred.";
                return false;
            } else {                                     
                return($data);
            }
        }

		public function bookApi($data){
            $secret = 'eBUCY6Kr';
            $host = 'https://book.api.ean.com/';  
            $path = "ean-services/rs/hotel/{$data['ver']}{$data['method']}";             
            // query parameters
            $apiKey = 'zhhs78vwn5stcjm5dwnkdz7e';
            $cid = '307632';
            $minorRev = '30';
            $customerUserAgent = 'Mozilla/4.0';
            $customerIpAddress = '58.186.163.62';
            //$cacheKey = '-1b4e68c9:14f1bcb28ae:-2785'; '125.212.250.6'
            //$cacheLocation = '10.186.170.203:7300';
            $locale = 'en_US';
            $currencyCode = 'USD';
            $room1 = isset($data['room1'])?"{$data['room1']}":'';
            $arrivalDate = isset($data['checkin'])?"{$data['checkin']}":(isset($data['arrivalDate'])?"{$data['arrivalDate']}":'');
            $departureDate = isset($data['checkout'])?"{$data['checkout']}":(isset($data['departureDate'])?"{$data['departureDate']}":'');
            $hotelId = isset($data['hotelId'])?"{$data['hotelId']}":'';
            $audlts = isset($data['audlts'])?",{$data['audlts']}":'';
            $kids = isset($data['kids'])?",{$data['kids']}":'';
            $rooms = isset($data['rooms'])?"{$data['rooms']}{$audlts}{$kids}":'';
            $xml = isset($data['xml'])?"{$data['xml']}":'';
            $city = isset($data['city'])?"{$data['city']}":'';
            $destinationId = isset($data['destinationId'])?"{$data['destinationId']}":'';
            $destinationString = isset($data['destinationString'])?"{$data['destinationString']}":'';
            $countryCode = isset($data['countryCode'])?"{$data['countryCode']}":'';
            $stateProvinceCode = isset($data['stateProvinceCode'])?"{$data['stateProvinceCode']}":'';
            $options = isset($data['options'])?"{$data['options']}":'';
            $includeDetails = isset($data['includeDetails'])?"{$data['includeDetails']}":'';
            $supplierType = isset($data['supplierType'])?"{$data['supplierType']}":'';
            $rateKey = isset($data['rateKey'])?"{$data['rateKey']}":'';
            $roomTypeCode = isset($data['roomTypeCode'])?"{$data['roomTypeCode']}":'';
            $rateCode = isset($data['rateCode'])?"{$data['rateCode']}":'';
            $chargeableRate = isset($data['chargeableRate'])?"{$data['chargeableRate']}":'';
            $email = isset($data['email'])?"{$data['email']}":'';
            $firstName = isset($data['firstName'])?"{$data['firstName']}":'';
            $lastName = isset($data['lastName'])?"{$data['lastName']}":'';
            $homePhone = isset($data['homePhone'])?"{$data['homePhone']}":'';
            $workPhone = isset($data['workPhone'])?"{$data['workPhone']}":'';
            $creditCardType = isset($data['creditCardType'])?"{$data['creditCardType']}":'';
            $creditCardNumber = isset($data['creditCardNumber'])?"{$data['creditCardNumber']}":'';
            $creditCardIdentifier = isset($data['creditCardIdentifier'])?"{$data['creditCardIdentifier']}":'';
            $creditCardExpirationMonth = isset($data['creditCardExpirationMonth'])?"{$data['creditCardExpirationMonth']}":'';
            $creditCardExpirationYear = isset($data['creditCardExpirationYear'])?"{$data['creditCardExpirationYear']}":'';
            $address1 = isset($data['address1'])?"{$data['address1']}":'';
            $city = isset($data['city'])?"{$data['city']}":'';
            $stateProvinceCode = isset($data['stateProvinceCode'])?"{$data['stateProvinceCode']}":'';
            $countryCode = isset($data['countryCode'])?"{$data['countryCode']}":'';
            $postalCode = isset($data['postalCode']) ? "{$data['postalCode']}":'';
            $timestamp = gmdate('U');
            $sig = md5($apiKey . $secret . $timestamp);
			// room
			$strroom='';
			for($i=1;$i<=$rooms;$i++){
				$strroom .= "&room".$i."=".$audlts."&room".$i."FirstName=".$data['txtFirstName']."&room".$i."LastName=".$data['txtLastName']."
            &room".$i."BedTypeId=23&room".$i."SmokingPreference=NS";

			}
			// end room
            $query = "?apikey={$apiKey}&cid={$cid}&sig={$sig}&minorRev={$minorRev}"
            . "&customerUserAgent={$customerUserAgent}&customerIpAddress={$customerIpAddress}"
            . "&locale={$locale}&currencyCode={$currencyCode}{$room1}{$rooms}{$arrivalDate}{$departureDate}{$hotelId}{$xml}{$city}{$destinationId}{$destinationString}{$countryCode}{$stateProvinceCode}{$options}{$includeDetails}{$supplierType}{$rateKey}{$roomTypeCode}{$rateCode}{$chargeableRate}{$email}{$firstName}{$lastName}{$homePhone}{$workPhone}{$creditCardType}{$creditCardNumber}{$creditCardIdentifier}{$creditCardExpirationMonth}{$creditCardExpirationYear}{$address1}{$city}{$stateProvinceCode}{$countryCode}{$postalCode}";	

            $query = array(
            'cid'=>$cid,
            'sig'=>$sig,
            'apiKey'=>$apiKey,
            'customerUserAgent'=>$customerUserAgent,
            'customerIpAddress'=>$customerIpAddress,
            'customerSessionId'=>123,
            'locale'=>$locale,
            'minorRev'=>$minorRev,
            'currencyCode'=>$currencyCode,
            'hotelId'=>$hotelId,
            'arrivalDate' => date('m/d/Y',strtotime($arrivalDate)),
            'departureDate' => date('m/d/Y',strtotime($departureDate)),
            'supplierType'=>$supplierType,
            'rateKey'=>$rateKey,
            'roomTypeCode'=>$roomTypeCode,
            'rateCode'=>$rateCode,
            'chargeableRate'=>$chargeableRate,
            'room1'=>1,
            'room1FirstName'=>$firstName,
            'room1LastName'=>$lastName,
            'room1BedTypeId'=>23,
            'room1SmokingPreference'=>'NS',
            'email'=>$email,
            'firstName'=>$firstName,
            'lastName'=>$lastName,
            'homePhone'=>$homePhone,
            'workPhone'=>$workPhone,
            'creditCardType'=>$creditCardType,
            'creditCardNumber'=>$creditCardNumber,
            'creditCardIdentifier'=>$creditCardIdentifier,
            'creditCardExpirationMonth'=>$creditCardExpirationMonth,
            'creditCardExpirationYear'=>$creditCardExpirationYear,
            'address1'=> $address1,
            'city'=> $city,
            'city'=> $city,
            'stateProvinceCode'=> $stateProvinceCode,
            'countryCode'=> $countryCode,
            'postalCode'=> $postalCode);

            // initiate curl
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $host . $path);
            curl_setopt($ch, CURLOPT_POST, 1);
            // Thiết lập các dữ liệu gửi đi
            curl_setopt($ch, CURLOPT_POSTFIELDS, $query);

            curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
            curl_setopt($ch, CURLOPT_HTTPHEADER,array('Accept:application/json'));
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $data = curl_exec($ch);
            $headers = curl_getinfo($ch);
            // close curl            
            // return XML data
            var_dump($data); print_r($query); echo $host.$path; exit;
//			print_r($headers);

            if ($headers['http_code'] != '200') {
                echo "An error has occurred.";
                return false;
            } else {                                     
                return($data);
            }
        }

        public function getMoreResults($data)
        {
            $secret = 'f7ftb8n27le7b';
            $host = 'http://api.ean.com/';
            $path = "ean-services/rs/hotel/{$data['ver']}{$data['method']}";
            // query parameters
            $apiKey = 'mf5l1buqk9oi79j8r7ur4limp';
            $cid = '464112';
            $minorRev = '30';
            $customerUserAgent = 'Mozilla/4.0';
            $customerIpAddress = '125.212.250.6';
            $customerSessionId= '123';
            $locale = 'vi_VN';
            $currencyCode = 'USD';
            $timestamp = gmdate('U');
            $sig = md5($apiKey . $secret . $timestamp);

            $cacheKey = "&cacheKey=".$data['cacheKey'];
            $cacheLocation = "&cacheLocation=".$data['cacheLocation'];
            $query = "?apikey={$apiKey}&cid={$cid}&sig={$sig}&minorRev={$minorRev}"
                . "&customerUserAgent={$customerUserAgent}&customerIpAddress={$customerIpAddress}&customerSessionId={$customerSessionId}"
                . "&locale={$locale}&currencyCode={$currencyCode}{$cacheKey}{$cacheLocation}";

            // initiate curl
            $urlapi =  $host.$path.$query; //echo $urlapi;// exit;
            $ch = curl_init();
            curl_setopt($ch,CURLOPT_URL,$urlapi);
            curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
            curl_setopt($ch, CURLOPT_HTTPHEADER,array('Accept:application/json'));
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $data = curl_exec($ch); //var_dump($data); exit;
            $headers = curl_getinfo($ch);
            // close curl
            // return XML data
            if ($headers['http_code'] != '200') {
                echo "An error has occurred.";
                return false;
            } else {
                return($data);
            }
        }

        public function searchHotels($name)
        {
            $sql = "SELECT EANHotelId, Name FROM ".DB_PREFIX."hotel WHERE LCASE(Name) LIKE '%". $this->db->escape(utf8_strtolower($name))."%' LIMIT 0,6";
            $query = $this->db->query($sql);
            return $query->rows;
        }
    }
?>