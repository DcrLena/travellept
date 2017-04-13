<?php foreach($hotels as $hotel ){ ?>
	<article class="box">                                    
		<div class="dtresult details col-sm-7 col-md-12" dtname="<?php echo $hotel['name']; ?>" dtprice="<?php echo $hotel['price']; ?>" dtrating="<?php echo $hotel['hotelRating']; ?>" dtpopularity="<?php echo $hotel['rate']; ?>">
			<div>
				<div>												
					<div class="col-sm-12 col-md-12">                                        
						<figure class="col-sm-5 col-md-4">
						<a  target="_blank" title="" href="<?php echo $hotel['href']; ?>" class="hover-effect "><img style="width:202px; height:122px" alt="" src="<?php echo $hotel['thumbNailUrl']; ?>"></a>
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
