<?php echo $header; ?>   
<div id="content-spe">
<?php echo $content_positionheader; ?>  
</div> 
<div style="clear:both; height:30px"></div>   
  <div class="content">
           <div class="page-title-container">
            <div class="container">
                <div class="page-title pull-left">
                    <h2 class="entry-title">Hotel Search Results</h2>
                </div>
                <ul class="breadcrumbs pull-right">
                    <li><a href="#">HOME</a></li>
                    <li class="active">Hotel Search Results</li>
                </ul>
            </div>
        </div>   
          <section id="content">
            <div class="container">
                <div id="main">
                    <div class="row">
                       <div class="col-sm-4 col-md-3">
                       <?php echo $column_left; ?>
                        </div>
                        <div class="col-sm-8 col-md-9">
                            <div class="sort-by-section clearfix">
                                <h4 class="sort-by-title block-sm">Sort results by:</h4>
                                <ul class="sort-bar clearfix block-sm">
                                    <li class="sort-by-name" ob="name" data="0" ><a class="sort-by-container" ><span>name</span></a></li>
                                    <li class="sort-by-price" ob="price" data="0" ><a class="sort-by-container" ><span>price</span></a></li>
                                    <li class="clearer visible-sms" data="0" ></li>
                                    <li class="sort-by-rating" ob="rate" data="0" ><a class="sort-by-container" ><span>rating</span></a></li>
                                    <li class="sort-by-popularity" ob="hotelRating" data="0" ><a class="sort-by-container"><span>popularity</span></a></li>
                                </ul>
                            </div>
                            <div id="loading-div" style="display:none; text-align:center;">
							<img alt="Loadding..." src="image/Loadding.gif" />
                            </div>
                            <div class="hotel-list listing-style3 hotel" id="totalresulth" data="<?php echo count($hotels); ?>">
                                <div style="width: 0; height: 0; position:absolute; margin:-9999px">
                                    <div id="map" style="width: 900px; height: 500px;"></div>
                                </div>
								<?php foreach($hotels as $hotel ){ ?>
                                <article class="box">                                    
                                    <div class="dtresult details col-sm-7 col-md-12" dtname="<?php echo $hotel['name']; ?>" dtprice="<?php echo $hotel['price']; ?>" dtrating="<?php echo $hotel['hotelRating']; ?>" dtpopularity="<?php echo $hotel['rate']; ?>">
                                        <div>
                                            <div>												
												<div class="col-sm-12 col-md-12">                                        
													<figure class="col-sm-5 col-md-4">
													<a  target="_blank" title=""  target="_blank" href="<?php echo $hotel['href']; ?>" class="hover-effect "><img style="width:202px; height:122px" alt="" src="<?php echo $hotel['thumbNailUrl']; ?>"></a>
													</figure>
													<div class="col-sm-8 col-md-8" >
														<?php if($hotel['promoDescription']!=""){ ?>
														<div class="col-sm-12 col-md-12">
															<i class="sale color-green glyphicon-tag"> </i>
															<a class="color-green "><?php echo $hotel['promoDescription']; ?></a>
														</div>
														<?php } ?>
														<h4 class="col-sm-12 col-md-12">
														<a  target="_blank" class="color-gray" style="float:left;" href="<?php echo $hotel['href']; ?>"><?php echo $hotel['name']; ?></a> <div class="five-stars-container" style="float:left; margin-left:10px;">
														<span class="five-stars" style="width: <?php echo $hotel['hotelRating']; ?>%;"></span>
														</div><br>
														<small class="address"><i class="soap-icon-departure yellow-color"></i> <?php echo $hotel['address']; ?></small>
														</h4>
														<div class="col-sm-12 col-md-12">													
															<div class="col-sm-6 col-md-6 border-right">													
															<span class="review"><img alt="tripAdvisorReviewCount" src="image/data/logo/logo-2.png"><a class="color-green "><?php echo $hotel['tripAdvisorRating']; ?></a>&nbsp;/&nbsp;10 </span>
															</div>
															<div class="col-sm-6 col-md-6">													
															<span class="review"><img alt="tripAdvisorReviewCount" src="<?php echo $hotel['tripAdvisorRatingUrl']; ?>"><?php echo $hotel['tripAdvisorReviewCount']; ?> </span>
															</div>
														</div>
														
													</div>
												</div>                                    
                                            </div>
                                            <div>
												
												<div class="col-sm-12 col-md-12">                                        
													<div>
														<span class="price"><small class="line-through"><?php echo $hotel['highRate']; ?></small>
														<?php echo $hotel['price']; ?>
														</span>
														<a class="button green-bg btn-small full-width text-center" title="" href="<?php echo $hotel['href']; ?>" target="_blank">CHỌN PHÒNG</a>
													</div>
												</div>
                                            </div>
                                        </div>
                                        
									</div>
                                </article>
                                <?php } ?>
							</div>
                            <?php if($moreResultsAvailable):?>
                            <div style="text-align: right">
                                <a class="btn-view-more" id="view-more" data-cachekey="<?php echo $cacheKey;?>" data-cachelocaion="<?php echo $cacheLocation;?>" arr-date="<?php echo $arrivalDate;?>" dep-date="<?php echo $departureDate;?>" room="<?php echo $rooms;?>" adult="<?php echo $adults;?>" kid="<?php echo $kids;?>"><b>Xem thêm <i class="fa fa-angle-down" aria-hidden="true"></i></b></a>
                            </div>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
  </div>
<script>
    var flag = 1;
    $('#view-more').click(function(e){
        if(flag) {
            $.ajax({
                url: 'index.php?route=product/searchhotels/pagingHotels',
                type: 'post',
                dataType: 'json',
                beforeSend: function () {
                    $('#view-more b').html('Đang tải..');
                    flag = 0;
                },
                data: {
                    cacheKey: $(this).attr('data-cachekey'),
                    cacheLocation: $(this).attr('data-cachelocaion'),
                    arrivalDate: $(this).attr('arr-date'),
                    departureDate: $(this).attr('dep-date'),
                    rooms: $(this).attr('room'),
                    adults: $(this).attr('adult'),
                    kids: $(this).attr('kid'),
                },
                success: function (json) {
                    $('#totalresulth').append(json['html']);
                    if (json['moreResultsAvailable'] == true) {
                        $('#view-more').attr('data-cachekey', json['cacheKey']);
                        $('#view-more').attr('data-cachelocaion', json['cacheLocation']);
                        $('#view-more b').html('Xem thêm <i class="fa fa-angle-down" aria-hidden="true"></i>');
                    } else {
                        $('#view-more').hide();
                    }
                    flag = 1;
                }
            });
        }
    });
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCvwryvPG1-OcPRLrMb89YcrFRlTbJQ69g"></script>
<script>
    function initialize() {
        var mylat = <?php echo isset($hotels[0]) ? $hotels[0]['latitude'] : 0;?>;
        var mylong = <?php echo isset($hotels[0]) ? $hotels[0]['longitude'] : 0;?>;

        var locations = [
            <?php foreach($hotels as $hotel ){ ?>
            ["<?php echo $hotel['name']; ?>", <?php echo $hotel['latitude']; ?>, <?php echo $hotel['longitude']; ?>],
            <?php } ?>
        ];

        var mapCanvas = document.getElementById('map');
        var mapOptions = {
            center: new google.maps.LatLng(mylat, mylong),
			zoom: 15,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		}
		var map = new google.maps.Map(mapCanvas, mapOptions);
        var infowindow = new google.maps.InfoWindow();
        var marker, i;

        for (i = 0; i < locations.length; i++) {
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                map: map,
                icon: "http://maps.google.com/mapfiles/kml/pal3/icon21.png"
            });

            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                    infowindow.setContent(locations[i][0]);
                    infowindow.open(map, marker);
                }
            })(marker, i));
          var infowindow = new google.maps.InfoWindow({
		    content: "<?php echo $hotel['name']; ?>"
            });
            infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);

        }
}
    google.maps.event.addDomListener(window, 'load', initialize);


</script>
<?php echo $footer; ?>