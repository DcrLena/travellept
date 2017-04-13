<?php echo $header; ?>
<link rel="stylesheet" type="text/css" href="catalog/view/javascript/date_time_new/jquery-ui-1.8.7.all.css" />
<script type="text/javascript" src="catalog/view/javascript/select_datetime.js"></script>
    <script type="text/javascript" src="catalog/view/javascript/date_time_new/ui.datepicker.lunar.min.js"></script>
<div class="page-title-container">
            <div class="container">
                <div class="page-title pull-left">                       
                </div>
                <ul class="breadcrumbs pull-right">
                    <li><a href="#">KHÁCH SẠN</a></li>
                    <li class="active">CHI TIẾT</li>
                </ul>
            </div>
 </div>
<section id="content">
           <div class="container">
           <div class="row">
                    <div id="main" class="col-md-9">
                        <div class="tab-container style1" id="hotel-main-content">
                            <div class="tab-content">
								<div class="title-fade">
									<h2><?php echo $hotel['name']; ?></h2>  <span class="five-stars-container"  data-placement="bottom"><span class="five-stars" style="width: <?php echo ($hotel['hotelRating']/5)*100;?>%;"></span></span><br>
									<i class="soap-icon-departure yellow-color"></i> <span class="fourty-space"><?php echo $hotel['address'].', '.$hotel['city'].', '.$hotel['countryCode']; ?></span>
								</div>
                                <div id="photos-tab" class="tab-pane fade in active">
                                    <div class="photo-gallery style1" data-animation="slide" data-sync="#photos-tab .image-carousel">
                                        <ul class="slides">
                                        <?php foreach($hotel['HotelImages'] as $item){ ?>
                                            <li><img src="<?php echo $item['image']; ?>" alt="" /></li>
                                           <?php } ?>
                                        </ul>
                                    </div>
                                    <div class="image-carousel style1" data-animation="slide" data-item-width="70" data-item-margin="10" data-sync="#photos-tab .photo-gallery">
                                        <ul class="slides">
                                        <?php foreach($hotel['HotelImages'] as $item){ ?>
                                            <li><img src="<?php echo $item['thumb']; ?>" alt="" /></li>
                                        <?php } ?>                                          
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar col-md-3">
                        <article class="detailed-logo">
                            <div class="details">
							 <form action="<?php echo $href_checkout; ?>" method="post" id="frmhotel">
                                <h2 class="box-title"><?php echo $hotel['name']; ?><small>
                                <div class=" clearfix">
                                    <div  class="five-stars-container"  data-placement="bottom"><span class="five-stars" style="width: <?php echo ($hotel['hotelRating']/5)*100;?>%;"></span></div>
                                </div>
                                <span class="price clearfix">
                                    <small class="">Khởi điểm từ</small>
                                    <span class="large">
									<input style="border: none; text-align: right;width: 58%;" name="cRoomPrice" type="text"  readonly value="<?php echo $hotel['rate']; ?>" /> 
									<input type="hidden" name="iRoomPrice" type="text"  readonly value="<?php echo $hotel['rateNET']; ?>" /> 
									</span>
                                </span><br>
								<input name="hotelId" type="hidden" value="<?php echo $hotel['hotelId']; ?>" />
								<input name="iRoomTypeId" type="hidden" value="" />
								<input name="iRoomCode" type="hidden" value="" />
								<input name="iRoomImg" type="hidden" value="" />
								<input name="supplierType" type="hidden" value="" />
								<input name="quotedOccupancy" type="hidden" value="" />
								<input name="rateKey" type="hidden" value="" />
                                 <input name="rateCode" type="hidden" value="" />
                                 <input name="roomTypeCode" type="hidden" value="" />
								<input name="BedType" type="hidden" value="" />
								<input name="checkin" type="hidden" value="<?php echo isset($arrivalDate)?$arrivalDate:''; ?>" />
								<input name="checkout" type="hidden" value="<?php echo isset($departureDate)?$departureDate:''; ?>" />
								<input name="rooms" type="hidden" value="<?php echo isset($rooms)?$rooms:''; ?>" />
								<input name="maxrooms" type="hidden" value="" />
								<input name="audlts" type="hidden" value="<?php echo isset($audlts)?$audlts:''; ?>" />
								<input name="kids" type="hidden" value="<?php echo isset($kids)?$kids:''; ?>" />
                                <a id="checkcart" class="button yellow full-width uppercase btn-small" style="font-size: 13px">Chọn Phòng</a>
							</form>							
                            </div>
                        </article>
						<div class="detailed-logo" id="map" style="height: 255px; margin-bottom: 20px">

						</div>
                        <?php echo $tnt_yahoo; ?>
                    </div>                                 
                    </div>                    
                     <div id="main" class="full-width">					 
					 <div  id="hotel-availability">
						<h2>Chọn phòng</h2>
						<?php echo $content_top; ?>
						<div class="full-width listing-style3 flight">                                  
						<?php 
						$i=0;
						foreach($hotel['RoomType'] as $item){  									
						?>
						<article class="box">
							<figure class="col-xs-3 col-sm-3">
							<h4><?php echo $item['description'];?></h4>
									<div class="flexslider photo-gallery style3">
										<ul class="slides">
										<?php 
										$j=0;
										$RoomImg ='';
										foreach($hotel['HotelImages'] as $image){ 
											if(($i*5)<=$j && $j < (($i+1)*5)){
											if($j==($i*5)){$RoomImg = $image['image'];}
											?>
												<li style="width: 243px; height: 163px;"><img src="<?php echo $image['image']; ?>" alt=""></li>
											<?php 
											}
											$j++;
										}
									?>
										</ul>
									</div>                                        
									<br>
									<?php
									echo $item['RoomType']; ?>
							</figure>
							<div class="details col-xs-9 col-sm-10"> 
							   <table class="table table-striped table-bordered table-hover" id="dataTables-example">
								<thead>
									<tr>
										<th>Tùy chọn</th>
										<th>Ưu đãi</th>
										<th>Giá trung bình 1 đêm</th>
										<th>Đặt phòng</th>

									</tr>
								</thead>
								<tbody>
								<?php  foreach($item['detail']['BedTypes'] as $BT){ ?>
								<tr class="gradeC">
										<td> <strong title="<?php echo $item['detail']['cancellationPolicy'] ; ?>">Không hoàn tiền </strong>
										<ul class="setting">
										<?php foreach($item['detail']['ValueAdds'] as $VA){ ?>
										<?php if($VA['id']== 2192){?>
										<li><i class="soap-icon-wifi circle"></i> <span><?php echo $VA['description']; ?></span></li>
										<?php } ?>
										<?php if($VA['id']== 2205 || $VA['id']== 1073742786){?>
										<li><i class="soap-icon-fork circle"></i> <span><?php echo $VA['description']; ?></span></li>
										<?php } ?>
										<?php } ?>
										</ul>
										</td>										
										<td> <strong style="color:red;"><?php echo $item['detail']['promoDescription'] ; ?></strong></td>
										<td>
										<?php if(($item['detail']['quotedOccupancy'])>0){ ?>
										<div class="quantity">Chúng tôi còn <span class="hot"><?php echo $item['detail']['quotedOccupancy'] ; ?> </span> phòng</div>
										<?php } ?>
										<?php if(count($item['detail']['BedTypes'])>1){ ?>
										<div class="typeBed"><small><?php echo $BT['description']; ?></small></div>
										<?php } ?>
										<div class="price"><?php echo $item['detail']['chargeableRate'] ; ?></div>
										</td>										
										<td align="center"> 
										<?php if(($item['detail']['quotedOccupancy'])>0){ ?>
										<div class="iSelect">
										   <input class="rSelect red" type="button" name="rSelect" value="BOOK NOW" /> 
										   <input type="hidden" class="roomTypeId" name="roomTypeId" value="<?php echo $item['roomTypeId']; ?>" /> 
										   <input type="hidden" class="roomCode" name="roomCode" value="<?php echo $item['roomCode']; ?>" />
										   <input type="hidden" class="roomImg" name="roomImg" value="<?php echo $RoomImg; ?>" />
										   <input type="hidden" class="quotedOccupancy"  value="<?php echo $item['detail']['quotedOccupancy']; ?>" />
										   <input type="hidden" class="chargeableRate" value="<?php echo $item['detail']['chargeableRate']; ?>" />
										   <input type="hidden" class="chargeableRateNet" value="<?php echo $item['detail']['chargeableRateNet']; ?>" />
										   <input type="hidden" class="supplierType" value="<?php echo $item['detail']['supplierType']; ?>" />
										   <input type="hidden" class="rateKey"  value="<?php echo $item['detail']['rateKey']; ?>" />
										   <input type="hidden" class="rateCode" value="<?php echo $item['detail']['rateCode']; ?>" />
										   <input type="hidden" class="roomTypeCode" value="<?php echo $item['detail']['roomTypeCode']; ?>" />
										   <input type="hidden" class="BedType" value="<?php echo $BT['id']; ?>" />
										</div>
										<?php }else{?>
										<div class="hot">Hết phòng</div>
										<?php }?>
										</td>
									</tr>
								<?php } ?>
								</tbody>
                                </table>	
								<div class="toggle-container box">
									  <div class="panel style1">
										  <h4 class="panel-title">
										  <a class="collapsed" data-toggle="collapse" href="<?php echo $hotel['href']; ?>#tgg<?php echo $i; ?>">Hiển thị thêm thông tin dịch vụ</a>
										  </h4>
										  <div id="tgg<?php echo $i; ?>" class="panel-collapse collapse" style="height: 0px;">
												<div class="panel-content"> 
												<ul>
													<?php  foreach($item['RoomAmenity'] as $Amenity){ ?>
													  <li style="width: 32%; float: left; display: block;">
													  <?php echo '- '.$Amenity->amenity.'</br>';  ?>
													  </li> 
												   <?php } ?>
												</ul>
												</div>
										  </div>
									  </div>
								</div>                                    
						 </div>                                
						</article>                            
					   <?php
						$i++;
						} ?>  
						</div>                                    
					 </div>
                     <div id="hotel-features" class="tab-container nt" >
                            <ul class="tabs">
                                <li class="active"><a href="<?php echo $hotel['href']; ?>#hotel-description" data-toggle="tab">Thông tin khách sạn</a></li>
                                <li><a href="<?php echo $hotel['href']; ?>#hotel-write-review" data-toggle="tab">Những điều cần biết</a></li>
                                <li><a href="<?php echo $hotel['href']; ?>#hotel-reviews" data-toggle="tab">Đánh giá</a></li>
								<li><a href="<?php echo $hotel['href']; ?>#nearby-location" data-toggle="tab">Vị trí</a></li>
                            
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="hotel-description">                                  
                                    <div class="long-description">
                                        <h2><?php echo $hotel['name']; ?></h2>
                                        <div>                                            
                                            <strong><?php //echo $text_propertyDescription; ?></strong><br>
                                            <?php echo $hotel['propertyDescription']; ?>
                                            <br><br>                                            
                                        </div>
                                    </div>  
								</div>  
								<div class="tab-pane fade" id="hotel-reviews">
                                    <div class="intro table-wrapper full-width hidden-table-sms">
                                        <div class="rating table-cell col-sm-4">
                                            <span class="score"><?php echo $hotel['hotelRating']; ?>/5.0</span>
                                            <div class="five-stars-container"><div class="five-stars" style="width: <?php echo $hotel['hotelpercent']; ?>%;"></div></div>
                                            <a href="#" class="goto-writereview-pane button green btn-small full-width">Dựa trên <?php echo $hotel['rate']; ?> Đánh giá</a>
                                        </div>
                                        <div class="table-cell col-sm-8">
                                            <div class="detailed-rating">
                                                <ul class="clearfix">
                                                    <li class="col-md-12">
                                                     <div class="skillbar-title"><span>highRate (<?php echo number_format($hotel['highRate']); ?>) REVIEW </span></div>
                                                       <div class="skillbar clearfix " data-percent="<?php echo $hotel['highRatepercent']; ?>%">
                                                            <div class="skillbar-bar" style="background: #7fb231;"></div>
                                                       </div> <!-- End Skill Bar -->
                                                    </li>
                                                    <li class="col-md-12">
                                                    <div class="skillbar-title"><span>lowRate (<?php echo number_format($hotel['lowRate']); ?>) REVIEW </span></div>
                                                       <div class="skillbar clearfix " data-percent="<?php echo $hotel['lowRatepercent']; ?>%">
                                                            <div class="skillbar-bar" style="background: #e44049;"></div>
                                                       </div> <!-- End Skill Bar -->
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>                                
                                <div class="tab-pane fade" id="hotel-write-review">
                                    <div class="main-rating table-wrapper full-width hidden-table-sms intro">
                                            <?php echo $hotel['propertyInformation']; ?>
                                            <strong><?php //echo $text_hotelPolicy; ?></strong><br>
                                            <?php echo $hotel['hotelPolicy']; ?>
                                            <strong><?php //echo $text_roomInformation; ?></strong><br>
                                            <?php echo $hotel['roomInformation']; ?>
                                            <strong><?php //echo $text_roomInformation; ?></strong><br>
                                            <?php echo $hotel['checkInInstructions']; ?>
                                            <br>
                                    </div>                                  
                                </div>
								<div class="tab-pane fade" id="nearby-location">
									<div class="main-rating table-wrapper full-width hidden-table-sms intro">
									<?php echo $hotel['areaInformation']; ?>
									</div>
								</div>
                                
                            </div>                        
                        </div>
                     </div>
                </div>
           </div> 
</section>
<?php echo $footer; ?>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCvwryvPG1-OcPRLrMb89YcrFRlTbJQ69g"></script>
<script>
	function initialize() {
		var mapCanvas = document.getElementById('map');
		var mapOptions = {
			center: new google.maps.LatLng(<?php echo $hotel['latitude']; ?>, <?php echo $hotel['longitude']; ?>),
			zoom: 12,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		}
		var map = new google.maps.Map(mapCanvas, mapOptions);
		var myLatlng = new google.maps.LatLng(<?php echo $hotel['latitude']; ?>, <?php echo $hotel['longitude']; ?>);
		var marker = new google.maps.Marker({
			position: myLatlng,
			map: map,
			title: "<?php echo $hotel['name']; ?>",
			icon: "http://maps.google.com/mapfiles/kml/pal3/icon21.png"
		});
		  var infowindow = new google.maps.InfoWindow({
		  content: "<?php echo $hotel['name']; ?>"
        });
          infowindow.open(map, marker);

	}
	google.maps.event.addDomListener(window, 'load', initialize);
</script>
<script type="text/javascript">
    $('#checkcart').on("click",function(){
		if($('input[name=iRoomTypeId]').attr('value')=='' || $('input[name=iRoomCode]').attr('value')==''){
			$('html, body').animate({
				scrollTop: $('#hotel-availability').offset().top
			}, 1500);	
			return false;
		}else{
			$('#frmhotel').submit();
		}			
	});
    $('#number').bind('change',function(){
        var number = $(this).val();
        var price= $('#number_fare').attr('data');        
        $.ajax({
         dataType:"html",
         data:'number=' + number + '&price=' + price ,
         type:"POST",
         url:"index.php?route=product/search/number_price&token=<?php echo $token; ?>",
         success: function(data){
            $('#number_fare').html(data);  
         },
         error:function(){
           alert("Đã có lỗi xảy ra !");
           return false;
         }
        });
    }); 
	$('.rSelect').on('click',function(){		    
        var roomTypeId = $(this).parent().find('.roomTypeId').attr('value');        
        var roomCode = $(this).parent().find('.roomCode').attr('value');
        var roomImg = $(this).parent().find('.roomImg').attr('value');
        var chargeableRate = $(this).parent().find('.chargeableRate').attr('value');
        var chargeableRateNet = $(this).parent().find('.chargeableRateNet').attr('value');
        var quotedOccupancy = $(this).parent().find('.quotedOccupancy').attr('value');
        var supplierType = $(this).parent().find('.supplierType').attr('value');
        var rateKey = $(this).parent().find('.rateKey').attr('value');
        var rateCode = $(this).parent().find('.rateCode').attr('value');
        var roomTypeCode = $(this).parent().find('.roomTypeCode').attr('value');
        var BedType = $(this).parent().find('.BedType').attr('value');
		var hotelId = $('input[name=hotelId]').attr('value');	
		var arrivalDate = $('input[name=checkin]').attr('value');	
		var departureDate = $('input[name=checkout]').attr('value');
		if(quotedOccupancy!='' && quotedOccupancy != 'undefined' && quotedOccupancy > 0){
			$('input[name=iRoomTypeId]').attr('value',roomTypeId);				
			$('input[name=iRoomCode]').attr('value',roomCode);
			$('input[name=iRoomImg]').attr('value',roomImg);
			$('input[name=iRoomPrice]').attr('value',chargeableRateNet);
			$('input[name=cRoomPrice]').attr('value',chargeableRate);
			$('input[name=supplierType]').attr('value',supplierType);
			$('input[name=rateKey]').attr('value',rateKey);
			$('input[name=rateCode]').attr('value',rateCode);
			$('input[name=roomTypeCode]').attr('value',roomTypeCode);
			$('input[name=BedType]').attr('value',BedType);
			$('input[name=maxrooms]').attr('value',quotedOccupancy);
			if(BedType !=''){
				$('#checkcart')	.click();
			}else{
			$('input[name=iRoomTypeId]').attr('value','');				
			$('input[name=iRoomCode]').attr('value','');
			$('input[name=iRoomImg]').attr('value','');
			$('input[name=iRoomPrice]').attr('value','');
			$('input[name=supplierType]').attr('value','');
			$('input[name=rateKey]').attr('value','');
			$('input[name=BedType]').attr('value','');				
			}
			return false;				
		}else{
			$('input[name=iRoomTypeId]').attr('value','');				
			$('input[name=iRoomCode]').attr('value',''); 
			$('input[name=iRoomImg]').attr('value',''); 
			$('input[name=supplierType]').attr('value',''); 
			$('input[name=rateKey]').attr('value',''); 
			$('input[name=BedType]').attr('value',''); 
			alert("Vui lòng chọn loại phòng khác, loại phòng này đã hết!");
			return false;
		}	
		if($('input[name=iRoomTypeId]').attr('value')!='' && $('input[name=iRoomCode]').attr('value')!='' ){
			$('.rSelect').removeClass('red').removeClass('green').addClass('red');
			$(this).removeClass('red').addClass('green'); 
		}
    });
</script>