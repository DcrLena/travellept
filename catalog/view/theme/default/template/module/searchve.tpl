<link rel="stylesheet" type="text/css" href="catalog/view/javascript/date_time_new/jquery-ui-1.8.7.all.css" />
<script type="text/javascript" src="catalog/view/javascript/select_datetime.js"></script>
<script type="text/javascript" src="catalog/view/javascript/date_time_new/ui.datepicker.lunar.min.js"></script>
<link  rel="stylesheet" type="text/css" href="catalog/view/javascript/jquery-ui-1.9.2/css/ui-lightness/optionred.css" />
<style>
	.ui-helper-hidden-accessible{display: none;}
</style>
<?php  
if(isset($layout_id) && $layout_id == 30) { ?>
<form action="Tim-hotels" method="post" id="frmhotel" class="acc-searchform" >
	<div class="toggle-container filters-container">
		<div class="style1 arrow-right">
			<a id="viewmap" class="fancybox" href="#map">
			<img src="catalog/view/theme/default/image/map.png"/> 
			<span class="seemap">Xem bản đồ</span>
			</a>
			<script>
				$(".fancybox").fancybox({
					openEffect  : "fade",
					closeEffect : "fade",
					fullScreen : true,
				});
			</script>
		</div>
		<div class="panel style1 arrow-right">
			<h4 class="panel-title">
				<a data-toggle="collapse" href="#price-filter" >Price</a>
			</h4>
			<div id="price-filter" class="panel-collapse collapse in">
				<div class="panel-content">
					<div id="price-range"></div>
					<br />
					<span class="min-price-label pull-left"></span>
					<span class="max-price-label pull-right"></span>
					<div class="clearer"></div>
				</div><!-- end content -->
				<input type="hidden" name="minRate" value="0">
				<input type="hidden" name="maxRate" value="10000000">

			</div>
		</div>

		<div class="panel style1 arrow-right">
			<h4 class="panel-title">
				<a data-toggle="collapse" href="#rating-filter" >User Rating</a>
			</h4>
			<div id="rating-filter" class="panel-collapse collapse in filters-container">
				<div class="panel-content">
					<div class="checkbox">
						<label>
							<input name="filterStar[]" value="0" class="filterStar" type="checkbox">
							No star
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input name="filterStar[]" value="1" class="filterStar" type="checkbox">
							<div class="contentStar">
								<span class="glyphicon glyphicon-star"></span>    </div>
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input name="filterStar[]" value="2" class="filterStar" type="checkbox">
							<div class="contentStar">
								<span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span>    </div>
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input name="filterStar[]" value="3" class="filterStar" type="checkbox">
							<div class="contentStar">
								<span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span>    </div>
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input name="filterStar[]" value="4" class="filterStar" type="checkbox">
							<div class="contentStar">
								<span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span>    </div>
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input name="filterStar[]" value="5" class="filterStar" type="checkbox">
							<div class="contentStar">
								<span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span>    </div>
						</label>
					</div>
				</div>
			</div>
		</div>

		<div class="panel style1 arrow-right">
			<h4 class="panel-title">
				<a data-toggle="collapse" href="#accomodation-type-filter" >Accomodation Type</a>
			</h4>
			<div id="accomodation-type-filter" class="panel-collapse collapse in">
				<div class="panel-content">
					<div class="checkbox">
						<label>
							<input name="accomodation[]" value="6" type="checkbox">
							All
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input name="accomodation[]" value="1" type="checkbox">
							Hotel
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input name="accomodation[]" value="2" type="checkbox">
							Suite
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input name="accomodation[]" value="3" type="checkbox">
							Resort
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input name="accomodation[]" value="4" type="checkbox">
							Vacation rental/condo
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input name="accomodation[]" value="5" type="checkbox">
							B&B
						</label>
					</div>
				</div>
			</div>
		</div>

		<div class="panel style1 arrow-right">
			<h4 class="panel-title">
				<a data-toggle="collapse" href="#amenities-filter" >Amenities</a>
			</h4>
			<div id="amenities-filter" class="panel-collapse collapse in">
				<div class="panel-content">
					<div class="checkbox">
						<label>
							<input name="amenities[]" value="6" type="checkbox">
							WiFi
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input name="amenities[]" value="1" type="checkbox">
							Swimming Pool
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input name="amenities[]" value="2" type="checkbox">
							Parking
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input name="amenities[]" value="3" type="checkbox">
							Restaurant
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input name="amenities[]" value="4" type="checkbox">
							Elevator
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input name="amenities[]" value="5" type="checkbox">
							24-Hour Front Desk
						</label>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="toggle-container style1 filters-container">
		<div class="panel style1 arrow-right">
			<h4 class="panel-title">
				<a data-toggle="collapse" href="#modify-search-panel" class="">Modify Search</a>
			</h4>
			<div id="modify-search-panel" class="panel-collapse collapse in">
				<div class="panel-content">
					<input type="hidden" name="post_type" value="accommodation">
					<input type="hidden" name="view" value="list">
					<input type="hidden" name="order_by" value="name">
					<input type="hidden" name="order" value="ASC">
					<div class="form-group">
						<label>Your Destination</label>
						<input type="text" id="destinationString" name="destinationString" class="input-text full-width" placeholder="enter a destination or hotel name"  value="<?php echo $destinationString; ?>"  >
						<input type="hidden" name="destinationId" class="input-text full-width" placeholder="enter a destination or hotel name"  value="<?php echo $destinationId; ?>"  >
					</div>
					<div class="search-when" data-error-message1="Your check-out date is before your check-in date. Have another look at your date and try again." data-error-message2="Please select current or future dates for check-in and check-out.">
						<div class="form-group">
							<label>CHECK IN</label>
							<div class="datepicker-wrap from-today">
								<input name="arrivalDate" id="flights-checkin" type="text" class="date depDate input-text full-width" placeholder="dd/mm/yy" value="<?php echo $arrivalDate; ?>"><img class="ui-datepicker-trigger" src="http://www.travelservice.vn/wp-content/themes/Travelo/images/icon/blank.png" alt="" title="">
							</div>
						</div>
						<div class="form-group">
							<label>CHECK OUT</label>
							<div class="datepicker-wrap from-today">
								<input name="departureDate" id="flights-checkout" type="text" class="date depDate input-text full-width" placeholder="dd/mm/yy" value="<?php echo $departureDate; ?>"><img class="ui-datepicker-trigger" src="http://www.travelservice.vn/wp-content/themes/Travelo/images/icon/blank.png" alt="" title="">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-4">
							<label>Rooms</label>
							<div class="selector">
								<select name="rooms" class="full-width">
									<?php for($i=1;$i<=8;$i++) { ?>
									<option value="<?php echo $i;?>" <?php echo ($i==$rooms)?'selected="selected"':''; ?> ><?php echo $i;?></option>
									<?php } ?>
								</select>
								<span class="custom-select full-width"><?php echo $rooms;?></span>
							</div>
						</div>
						<div class="col-xs-4">
							<label>Adults</label>
							<div class="selector">
								<select name="adults" class="full-width">
									<?php for($i=1;$i<=6;$i++) { ?>
									<option value="<?php echo $i;?>" <?php echo ($i==$adults)?'selected="selected"':''; ?> ><?php echo $i;?></option>
									<?php } ?>
								</select>
								<span class="custom-select full-width"><?php echo $adults;?></span>
							</div>
						</div>
						<div class="col-xs-4">
							<label>Kids</label>
							<div class="selector">
								<select name="kids" class="full-width">
									<?php for($i=0;$i<=6;$i++) { ?>
									<option value="<?php echo $i;?>" <?php echo ($i==$kids)?'selected="selected"':''; ?> ><?php echo $i;?></option>
									<?php } ?>
								</select>
								<span class="custom-select full-width"><?php echo $kids;?></span>
							</div>
						</div>
					</div>
					<div class="age-of-children no-display">
						<h5>Age of Children</h5>
						<div class="row">

							<div class="col-xs-4 child-age-field">
								<label>Child 1</label>
								<div class="selector validation-field">
									<select name="child_ages[]" class="full-width">
										<option value="0" selected="">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option>														</select><span class="custom-select full-width">0</span>
								</div>
							</div>
						</div>
					</div>
					<br>
					<button  onclick="checkformhotel()" id="cmdsearchhotel"  class="btn-medium icon-check uppercase full-width">search again</button>

				</div>
			</div>
		</div>
	</div>
</form>
<?php
}else if(isset($layout_id) && $layout_id == 29) { ?>
<div class="toggle-container filters-container">
	<div class="panel style1 arrow-right">
		<header style="display:none;">
			<p>
				<input name="loaive" id="loaive_o" value="motluot" onclick="disabledate(0)" type="radio"  class="loaive"  checked="checked" />
				<input name="trip_select_hidden" id="trip_select_hidden" type="hidden" value="khuhoi"/>
				<label><?php echo $text_motluot;?></label>
			</p>
			<p>
				<input name="loaive" id="loaive_r" onclick="disabledate(1);"  value="khuhoi" <?php if(isset($hanhtrinh)&& ($hanhtrinh=='khuhoi')){echo 'checked="checked"';} else echo '';?> type="radio"  class="loaive" />
				<label><?php echo $text_khuhoi;?></label>
			</p>
		</header>
		<h4 class="panel-title">
			<a data-toggle="collapse" href="#modify-search-panel" class="collapsed">Modify Search</a>
		</h4>
		<div id="modify-search-panel" class="panel-collapse ">
			<div class="panel-content">
				<form action="<?php echo $action;?>" method="POST" class="black" name="frmsearchair" id="frmsearchair"  >
					<div class="form-group">
						<label>Hotel Name</label>                                                       <input style="background: #f1f1f1;" type="text" id="HotelId" class="city input-text full-width" name="HotelId" value="<?php echo isset($hotel['name'])? $hotel['name'] : ''  ?>" placeholder="Tên Khách sạn" />
						<input type="hidden" id="HotelId_hidden" name="HotelId_hidden" value="<?php echo  isset($hotel['hotelId'])? $hotel['hotelId'] : ''  ?>"/>
					</div>
					<div class="form-group">
						<label>Check in</label>
						<div class="datepicker-wrap">
							<input type="hidden" name="txt-date-departure" class="txt-date txt-date-departure input-text full-width" value="" datetype="departure" />
							<input type="text" name="arrivalDate" id="arrivalDate" class="date depDate input-text full-width" value="<?php echo  isset($checkin) ? $checkin : date("d-m-Y", strtotime(' +2 day')); ?>" />
						</div>
					</div>
					<div class="form-group">
						<label>Check out</label>
						<div class="datepicker-wrap">
							<input type="hidden" name="txt-date-return" class="txt-date txt-date-return" value="" datetype="return" />
							<input type="text" name="departureDate"  id="departureDate" class="date retDate input-text full-width" value="<?php echo isset($checkout) ? $checkout : date("d-m-Y", strtotime(' +4 day'));?>" />
						</div>
					</div>
					<input type="hidden" name="rooms" value="<?php echo $rooms; ?>" />
					<input type="hidden" name="audlts" value="<?php echo $audlts; ?>" />
					<input type="hidden" name="kids" value="<?php echo $kids; ?>" />
					<br />
					<button class="btn-medium icon-check uppercase full-width" id="cmdsearch" name="cmdsearch">search again</button>
				</form>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){

		$("#loaive_r").live('click',function(){
			$("#ngayve").show();
		});

		$("#loaive_o").live('click',function(){
			$("#ngayve").hide();
		});


	});
</script>
<?php
            }else if(isset($layout_id) && $layout_id == 31){ ?>
<div id="hotel-availability">
	<div class="update-search clearfix">
		<form action="Chi-tiet-khach-san" method="get" id="frmhotel" class="acc-searchform" >
			<div class="hidden">
				<label>hotel Id</label>
				<input type="hidden" name="hotelId" class="input-text full-width" placeholder="enter a destination or hotel name"  value="<?php echo $hotelId; ?>"  >
			</div>
			<div class="col-md-5">
				<div class="row">
					<div class="col-xs-6">
						<label>CHECK IN</label>
						<div class="datepicker-wrap">
							<input name="arrivalDate" id="flights-checkin" type="text" placeholder="mm/dd/yy" value="<?php echo $arrivalDate; ?>" class="date depDate input-text full-width"><img class="ui-datepicker-trigger" src="images/icon/blank.png" alt="" title="">
						</div>
					</div>
					<div class="col-xs-6">
						<label>CHECK OUT</label>
						<div class="datepicker-wrap">
							<input name="departureDate" id="flights-checkout" type="text" placeholder="mm/dd/yy" value="<?php echo $departureDate; ?>" class="date depDate input-text full-width" ><img class="ui-datepicker-trigger" src="images/icon/blank.png" alt="" title="">
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="row">
					<div class="col-xs-4">
						<label>Rooms</label>
						<div class="selector">
							<select name="rooms" class="full-width">
								<?php for($i=1;$i<=8;$i++) { ?>
								<option value="<?php echo $i;?>" <?php echo ($i==$rooms)?'selected="selected"':''; ?> ><?php echo $i;?></option>
								<?php } ?>
							</select>
							<span class="custom-select full-width"><?php echo $rooms;?></span>
						</div>
					</div>
					<div class="col-xs-4">
						<label>Adults</label>
						<div class="selector">
							<select name="adults" class="full-width">
								<?php for($i=1;$i<=6;$i++) { ?>
								<option value="<?php echo $i;?>" <?php echo ($i==$adults)?'selected="selected"':''; ?> ><?php echo $i;?></option>
								<?php } ?>
							</select>
							<span class="custom-select full-width"><?php echo $adults;?></span>
						</div>
					</div>
					<div class="col-xs-4">
						<label>Kids</label>
						<div class="selector">
							<select name="kids" class="full-width">
								<?php for($i=0;$i<=6;$i++) { ?>
								<option value="<?php echo $i;?>" <?php echo ($i==$kids)?'selected="selected"':''; ?> ><?php echo $i;?></option>
								<?php } ?>
							</select>
							<span class="custom-select full-width"><?php echo $kids;?></span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<label class="visible-md visible-lg">&nbsp;</label>
				<div class="row">
					<div class="col-xs-12">
						<button data-animation-duration="1" data-animation-type="bounce" class="full-width icon-check animated bounce" type="submit" style="animation-duration: 1s; visibility: visible;">SEARCH NOW</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>

<script type="text/javascript">
	$('#cmdsearchtour').bind('click', function() {

		url = $('base').attr('href') + 'Tim-tour';

		var filter_tourstart = $('select[name=\'tourstart\']').attr('value');

		if (filter_tourstart) {
			url += '&filter_tourstart=' + encodeURIComponent(filter_tourstart);
		}
		var filter_tourend = $('select[name=\'tourend\']').attr('value');

		if (filter_tourend) {
			url += '&filter_tourend=' + encodeURIComponent(filter_tourend);
		}

		var filter_tour_date = $('input[name=\'date\']').attr('value');

		if (filter_tour_date) {
			url += '&filter_tour_date=' + encodeURIComponent(filter_tour_date);
		}

		location = url;
	});
</script>
<script type="text/javascript"><!--

	function checkformhotel(){
		var txtdestination = $('input[name=\'destinationString\']').val();
		var txtdepartureDate = $('input[name=\'destinationId\']').val();
		var txtarrivalDate = $('input[name=\'arrivalDate\']').val();
		var txtdepartureDate = $('input[name=\'departureDate\']').val();
		var sub = true;
		if(txtdestination==""){
			sub = false;
			alert('Vui lòng nhập điểm đến của bạn!');
			$('input[name=\'destinationString\']').focus();
		}else if(destinationId==""){
			sub = false;
			alert('Vui lòng nhập điểm đến của bạn!');
			$('input[name=\'destinationString\']').focus();

		}else if(txtarrivalDate==""){
			sub = false;
			alert('Vui lòng nhập ngày đến của bạn!');
			$('input[name=\'arrivalDate\']').focus();
		}else if(txtdepartureDate==""){
			sub = false;
			alert('Vui lòng nhập ngày đi của bạn!');
			$('input[name=\'departureDate\']').focus();
		}
		if(sub===true){$('#frmhotel').submit();}
				}

	//--></script>
<?php }else if($layout_id==1){ ?>
<div class="search-box-wrapper">
	<div class="search-box container">
		<div class="center-block-wrapper full-width">
			<div class="center-block">
				<ul class="search-tabs clearfix">
					<li  <?php  echo ($pagehotel)?'class="active"':''; ?> ><a href="#hotels-tab" data-toggle="tab"> <i class="soap-icon-hotel"></i>
						<span>HOTELS</span></a></li>
					<li <?php  echo ($pageflight)?'class="active"':''; ?> ><a href="#flights-tab" data-toggle="tab"><i class="soap-icon-plane"></i>
						<span>FLIGHTS</span></a></li>
					<li <?php  echo ((!$pageflight) && (!$pagehotel))?'class="active"':''; ?> ><a href="#tours-tab" data-toggle="tab"><i class="soap-icon-beach"></i>
						<span>Tours</span></a></li>
					
				</ul>
				<div class="visible-mobile">
					<ul id="mobile-search-tabs" class="search-tabs clearfix">
						<li <?php echo 'class="active"'; ?> ><a href="#tours-tab"><i class="soap-icon-beach"></i>
							<span>Tours</span></a></li>
						<li ><a href="#hotels-tab"> <i class="soap-icon-hotel"></i>
								<span>HOTELS</span></a></li>
						<li><a href="#flights-tab"><i class="soap-icon-plane"></i>
								<span>FLIGHTS</span></a></li>
					</ul>
				</div>
				<div class="search-tab-content">
					<div <?php  echo ($pagehotel)?'class="tab-pane fade active in"':'class="tab-pane fade"'; ?>    id="hotels-tab">
					<form action="Tim-hotels" method="post" id="frmhotel">
						<div class="row">
							<div class="form-group col-sm-2 col-md-2"> 
								  <input type="radio" name="countryCode" id="quocnoi" value="VN" checked> <strong>Nội địa</strong>
							</div>
							<div class="form-group col-sm-2 col-md-2">
								<input type="radio" name="countryCode" id="quocte" value=""> <strong>Quốc tế</strong>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-sm-6 col-md-3">
								<label>Where do you want to go?</label>
								<input id="destinationString" name="destinationString" type="text" autocomplete="off" class="input-text full-width" placeholder="Enter a destination or hotel name" value="<?php echo $destinationString; ?>" />
								<input id="destinationId" name="destinationId" type="hidden" value="<?php echo $destinationId; ?>" />
								<input id="hotelIdList" name="hotelIdList" type="hidden" value="" />
								<input id="hotelId" name="hotelId" type="hidden" value="" />
								<ul class="auto-complete">
								</ul>
							</div>

							<div class="form-group col-sm-6 col-md-4">
								<div class="row">
									<div class="col-xs-6">
										<label>Check in</label>
										<div class="datepicker-wrap">
											<input name="arrivalDate" id="flights-checkin" type="text" class="depDate input-text full-width" placeholder="mm/dd/yy" value="<?php echo $arrivalDate; ?>"/>
										</div>
									</div>
									<div class="col-xs-6">
										<label>Check out</label>
										<div class="datepicker-wrap">
											<input  name="departureDate" id="flights-checkout" type="text" class="date depDate input-text full-width" placeholder="mm/dd/yy" value="<?php echo $departureDate; ?>" />
										</div>
									</div>
								</div>
							</div>

							<div class="form-group col-sm-6 col-md-3">
								<div class="row">
									<div class="col-xs-4">
										<label>Room</label>
										<div class="selector">
											<select class="full-width" name="rooms">
												<?php for($i=1;$i<=8;$i++) { ?>
												<option value="<?php echo $i;?>" <?php echo ($i==$rooms)?'selected="selected"':''; ?> ><?php echo $i;?></option>
												<?php } ?>
											</select>
										</div>
									</div>
									<div class="col-xs-4">
										<label>Adult (18+) </label>
										<div class="selector">
											<select class="full-width" name="adults">
												<?php for($i=1;$i<=6;$i++) { ?>
												<option value="<?php echo $i;?>" <?php echo ($i==$adults)?'selected="selected"':''; ?> ><?php echo $i;?></option>
												<?php } ?>
											</select>
										</div>
									</div>
									<div class="col-xs-4">
										<label>Children (0-17)</label>
										<div class="selector">
											<select class="full-width" name="kids">
												<?php for($i=0;$i<=6;$i++) { ?>
												<option value="<?php echo $i;?>" <?php echo ($i==$kids)?'selected="selected"':''; ?> ><?php echo $i;?></option>
												<?php } ?>
											</select>
										</div>
									</div>
								</div>
							</div>

							<div class="form-group col-sm-6 col-md-2 fixheight">
								<label class="hidden-xs">&nbsp;</label>
								<input type="button" onclick="checkformhotel()" id="cmdsearchhotel" class="full-width icon-check animated" data-animation-type="bounce" data-animation-duration="1" value ="SEARCH NOW" />
							</div>
						</div>
					</form>
				</div>
				<div <?php  echo ($pageflight)?'class="tab-pane fade active in"':'class="tab-pane fade"'; ?>  id="flights-tab">
				<form action="<?php echo $action_flight;?>" method="POST" class="black" name="frmsearchair" id="frmsearchair"  >
					<div class="row">
						<div class="form-group col-sm-2 col-md-2"> 
							  <input type="radio" name="countryCode" id="quocnoi" value="VN" checked> <strong>Nội địa</strong>
						</div>
						<div class="form-group col-sm-2 col-md-2">
							<input type="radio" name="countryCode" id="quocte" value=""> <strong>Quốc tế</strong>
						</div>
					</div>
					<div class="row">						
						<div class="col-md-4">
							<div class="col-xs-6">
								<label>Điểm đi</label>
								<input type="text" id="departCity" class="city input-text full-width" name="departCity" value="<?php echo isset($diemdi)? $diemdi : 'Hồ Chí Minh (SGN)'  ?>" />
								<input type="hidden" id="departCity_hidden" name="departCity_hidden" value="<?php echo  isset($codedi)? $codedi : '8785,Hồ Chí Minh (SGN)' ?>" />
							</div>
							<div class="col-xs-6">
								<label>Điểm đến</label>
								<input type="text" id="returnCity" class="city input-text full-width" name="returnCity" value="<?php echo isset($diemden)? $diemden : 'Hà Nội (HAN)'  ?>"/>
								<input type="hidden" id="returnCity_hidden" name="returnCity_hidden" value="<?php echo  isset($codeden)? $codeden : '8772,Hà Nội (HAN)'  ?>"/>

							</div>
						</div>


						<div class="col-md-3">
							<div class="col-xs-6"> <label>Ngày đi</label>
								<div class="datepicker-wrap">

									<input type="hidden" name="txt-date-departure" class="txt-date txt-date-departure input-text full-width" value="" datetype="departure" />
									<input type="text" name="flights-checkin" id="flights-checkin" class="date depDate input-text full-width" value="<?php echo  isset($ngaydi) ? $ngaydi : date("d-m-Y", strtotime(' +2 day')); ?>" />

								</div>
							</div>
							<div class="col-xs-6">
								<label>Ngày về</label>
								<div class="datepicker-wrap" id="ngayve">
									<input type="hidden" name="txt-date-return" class="txt-date txt-date-return" value="" datetype="return" />
									<input type="text" name="flights-checkout"  id="flights-checkout" class="date retDate input-text full-width" value="<?php echo isset($ngayve) ? $ngayve : date("d-m-Y", strtotime(' +4 day'));?>" />
								</div>
							</div>
						</div>
						<div class="col-md-5">
							<div class="form-group row">
								<div class="col-xs-3">
									<label>Người lớn</label>
									<div class="selector">
										<select name="adt_nd" class="full-width">
											<option value="1">01</option>
											<option value="2">02</option>
											<option value="3">03</option>
											<option value="4">04</option>
										</select>
									</div>
								</div>
								<div class="col-xs-3">
									<label>Trẻ em</label>
									<div class="selector">
										<select name="chd_nd" class="full-width">
											<option value="0">00</option>
											<option value="1">01</option>
											<option value="2">02</option>
											<option value="3">03</option>
											<option value="4">04</option>
										</select>
									</div>
								</div>
								<div class="col-xs-3">
									<label>Em bé</label>
									<div class="selector">
										<select name="INF" class="full-width">
											<option value="0">00</option>
											<option value="1">01</option>
											<option value="2">02</option>
											<option value="3">03</option>
											<option value="4">04</option>
										</select>
									</div>
								</div>
								<div class="col-xs-3">
									<label>&nbsp;</label>
									<button id="cmdsearch" class="full-width icon-check">TÌM </button>
								</div>


							</div>

						</div>
						<input type="hidden" name="price" id="price" value="" />
						<input type="hidden" name="dt" id="dt" value="" />
						<input  type="hidden" name="qt" value="<?php echo isset($qt) ? $qt : 0 ; ?>"/>
						<input type="hidden" id="departCity_hidden1" name="departCity_hidden1" value="<?php echo  isset($departCity_hidden1)? $departCity_hidden1 : 'SGN'  ?>" />
						<input type="hidden" id="returnCity_hidden1" name="returnCity_hidden1" value="<?php echo  isset($returnCity_hidden1)? $returnCity_hidden1 : 'HAN'  ?>" />
						<input type="hidden" name="typeflight" id="typeflight" value="0"/>
					</div>


				</form>
			</div>

			<div   <?php  echo ((!$pageflight) && (!$pagehotel))?'class="tab-pane fade active in"':'class="tab-pane fade"'; ?>   id="tours-tab">
			<form>
				<!----->                   <div id="tab-tour" >
					<div class="search_leavingfrom">
						<div><label><?php echo $text_leaving ?></label></div>
						<select name="tourstart" id="tourstart" style="width:230px;">
							<option value="">Chọn thành phố</option>
							<?php foreach($name_tour as $ten){?>
							<option value="<?php echo $ten['destination'];?>"><?php echo $ten['name']?></option>
							<?php }?>
						</select>
					</div>



					<div class="search_goto">
						<div><label><?php echo $text_goto ?></label></div>
						<select name="tourend" id="tourend" style="width:230px;">
							<option value="">Chọn thành phố</option>
							<?php foreach($name_tour as $ten){?>
							<option value="<?php echo $ten['destination'];?>"><?php echo $ten['name']?></option>
							<?php }?>
						</select>
					</div>



					<div class="search_date">
						<div><label><?php echo $text_datetime ?></label></div>
						<div class="datepicker-wrap">
							<input type="text" name="date" class="date depDate input-text full-width" placeholder="mm/dd/yy" style="padding-left:10px;font-weight:bold;"/>
						</div>

					</div>


					<div class="button_search">
						<!--<button class="icon-check full-width" id="cmdsearchtour" name="<?php echo $txt_classsearchtour ;?>"><?php echo $text_buttonsearch ?></button>-->
						<input type="button" class="label_search" value="<?php echo $txt_searchtour ;?>" name="<?php echo $txt_classsearchtour ;?>" id="<?php echo $txt_classsearchtour ;?>">
						<div class="icon_check"></div>
					</div>
				</div>

			</form>
		</div>
	</div>
</div>
</div>
</div>
</div>
<script type="text/javascript">
	$('#cmdsearchtour').bind('click', function() {

		url = $('base').attr('href') + 'Tim-tour';

		var filter_tourstart = $('select[name=\'tourstart\']').attr('value');

		if (filter_tourstart) {
			url += '&filter_tourstart=' + encodeURIComponent(filter_tourstart);
		}
		var filter_tourend = $('select[name=\'tourend\']').attr('value');

		if (filter_tourend) {
			url += '&filter_tourend=' + encodeURIComponent(filter_tourend);
		}

		var filter_tour_date = $('input[name=\'date\']').attr('value');

		if (filter_tour_date) {
			url += '&filter_tour_date=' + encodeURIComponent(filter_tour_date);
		}

		location = url;
	});
</script>
<script type="text/javascript"><!--

	function checkformhotel(){
		var txtdestination = $('input[name=\'destinationString\']').val();
		var txtdepartureDate = $('input[name=\'destinationId\']').val();
		var txtarrivalDate = $('input[name=\'arrivalDate\']').val();
		var txtdepartureDate = $('input[name=\'departureDate\']').val();
		var sub = true;
		if(txtdestination==""){
			sub = false;
			alert('Vui lòng nhập điểm đến của bạn!');
			$('input[name=\'destinationString\']').focus();
		}else if(destinationId==""){
			sub = false;
			alert('Vui lòng nhập điểm đến của bạn!');
			$('input[name=\'destinationString\']').focus();

		}else if(txtarrivalDate==""){
			sub = false;
			alert('Vui lòng nhập ngày đến của bạn!');
			$('input[name=\'arrivalDate\']').focus();
		}else if(txtdepartureDate==""){
			sub = false;
			alert('Vui lòng nhập ngày đi của bạn!');
			$('input[name=\'departureDate\']').focus();
		}
		if(sub===true){$('#frmhotel').submit();}
				}

	//--></script>
<?php } else { ?>
<div class="toggle-container filters-container">
	<div class="panel style1 arrow-right">
		<header style="display:none;">
			<p>
				<input name="loaive" id="loaive_o" value="motluot" onclick="disabledate(0)" type="radio"  class="loaive"  checked="checked" />
				<input name="trip_select_hidden" id="trip_select_hidden" type="hidden" value="khuhoi"/>
				<label><?php echo $text_motluot;?></label>
			</p>
			<p>
				<input name="loaive" id="loaive_r" onclick="disabledate(1);"  value="khuhoi" <?php if(isset($hanhtrinh)&& ($hanhtrinh=='khuhoi')){echo 'checked="checked"';} else echo '';?> type="radio"  class="loaive" />
				<label><?php echo $text_khuhoi;?></label>
			</p>
		</header>
		<h4 class="panel-title">
			<a data-toggle="collapse" href="#modify-search-panel" class="collapsed">Modify Search</a>
		</h4>
		<div id="modify-search-panel" class="panel-collapse ">
			<div class="panel-content">
				<form action="<?php echo $action;?>" method="POST" class="black" name="frmsearchair" id="frmsearchair"  >
					<div class="form-group">
						<label>Leaving from</label>

						<input style="background: #f1f1f1;" type="text" id="returnCity" class="city input-text full-width" name="returnCity" value="<?php echo isset($diemden)? $diemden : 'Hà Nội (HAN)'  ?>"/>
						<input type="hidden" id="returnCity_hidden" name="returnCity_hidden" value="<?php echo  isset($codeden)? $codeden : '8772,Hà Nội (HAN)'  ?>"/>

					</div>
					<div class="form-group">
						<label>Departure on</label>
						<div class="datepicker-wrap">
							<input type="hidden" name="txt-date-departure" class="txt-date txt-date-departure input-text full-width" value="" datetype="departure" />
							<input type="text" name="flights-checkin" id="flights-checkin" class="date depDate input-text full-width" value="<?php echo  isset($ngaydi) ? $ngaydi : date("d-m-Y", strtotime(' +2 day')); ?>" />
						</div>
					</div>
					<div class="form-group">
						<label>Arriving On</label>
						<div class="datepicker-wrap">
							<input type="hidden" name="txt-date-return" class="txt-date txt-date-return" value="" datetype="return" />
							<input type="text" name="flights-checkout"  id="flights-checkout" class="date retDate input-text full-width" value="<?php echo isset($ngayve) ? $ngayve : date("d-m-Y", strtotime(' +4 day'));?>" />
						</div>
					</div>
					<input type="hidden" name="loaive" id="" value="<?php echo $loaive; ?>" />
					<input type="hidden" name="adt_nd" id="" value="<?php echo $nguoilon; ?>" />
					<input type="hidden" name="chd_nd" id="" value="<?php echo $chd_nd; ?>" />
					<input type="hidden" name="INF" id="" value="<?php echo $INF; ?>" />
					<input type="hidden" id="departCity" class="city" name="departCity" value="<?php echo isset($diemdi)? $diemdi : 'Hồ Chí Minh (SGN)'  ?>" />
					<input type="hidden" id="departCity_hidden" name="departCity_hidden" value="<?php echo  isset($codedi)? $codedi : '8785,Hồ Chí Minh (SGN)'  ?>" />
					<input type="hidden" name="price" id="price" value="" />
					<input type="hidden" name="dt" id="dt" value="" />
					<input  type="hidden" name="qt" value="<?php echo isset($qt) ? $qt : 0 ; ?>"/>
					<?php if(isset($code)) {?>
					<input type="hidden" id="departCity_hidden1" name="departCity_hidden1" value="<?php echo  isset($codeden) ? $codeden : 'SGN'  ?>" />
					<input type="hidden" id="returnCity_hidden1" name="returnCity_hidden1" value="<?php echo   isset($code)? $code : "" ?>" />
					<input type="hidden" name="typeflight" id="typeflight" value="0"/>
					<?php } else{?>
					<input type="hidden" id="departCity_hidden1" name="departCity_hidden1" value="<?php echo  isset($departCity_hidden1)? $departCity_hidden1 : 'SGN'  ?>" />
					<input type="hidden" id="returnCity_hidden1" name="returnCity_hidden1" value="<?php echo  isset($returnCity_hidden1)? $returnCity_hidden1 : 'HAN'  ?>" />
					<input type="hidden" name="typeflight" id="typeflight" value="0"/>
					<?php }?>
					<br />

					<button class="btn-medium icon-check uppercase full-width" id="cmdsearch" name="cmdsearch">search again</button>
				</form>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){

		$("#loaive_r").live('click',function(){
			$("#ngayve").show();
		});

		$("#loaive_o").live('click',function(){
			$("#ngayve").hide();
		});
	});
</script>
<?php
            } 
?>
<script type="text/javascript">
	$('#tabs a').tabs();
	$('#languages a').tabs();

</script>
<script type="text/javascript" src="catalog/view/javascript/jquery/ui/jquery-ui-timepicker-addon.js"></script>
<script type="text/javascript">
	$('.date').datepicker({dateFormat: 'dd-mm-yy'});
	$('.datetime').datetimepicker({
		dateFormat: 'yy-mm-dd',
		timeFormat: 'h:m:s'
	});
	$('.time').timepicker({timeFormat: 'h:m'});
</script>

<script type="text/javascript">


	$("#departCity,#returnCity").click(function(){

		var deOffset = $(this).offset(),elm="";
		var inputHeight = $(this).height() +  $(window).scrollTop();
		$(".sanbay,.sanbayres").dialog({
			closeOnEscape: true,
			autoOpen: false,
			closeOnEscape: true,
			draggable: false,
			resizable: false,
			autoOpen: false,
			width: 580,
			position: [deOffset.left, deOffset.top +inputHeight]
		});
		$('.sanbay').dialog({
			title: 'Lựa chọn thành phố đi ',
			show: {
				effect: "blind",
				duration: 100
			},
			hide: {
				effect: "explode",
				duration: 400
			},
			autoOpen: false,
			modal: false
		});
		$('.sanbayres').dialog({
			title: 'Lựa chọn thành phố đến',
			show: {
				effect: "blind",
				duration: 100
			},
			hide: {
				effect: "explode",
				duration: 400
			},
			autoOpen: false,
			modal: false
		});
		if($(this).attr('id')=="departCity"){
			$('.sanbay').dialog("open");
			$( "#airport" ).click(function(){
				$(this).val("");
			});
			$('.sanbay li.aircode').click(function(){
				$("#departCity").val($(this).text());
				if($(this).children('a').attr("airportcode")!== undefined){
					$("#departCity_hidden").val($(this).children('a').attr("airportcode"));
					$("#departCity_hidden1").val($(this).children('a').attr("code"));
					$("#typeflight").val($(this).children('a').attr("typeflight"));
				}else{
					$("#departCity_hidden1").val($(this).attr("code"));
					$("#departCity_hidden").val($(this).attr("code"));
					$("#typeflight").val($(this).attr("typeflight"));
				}
				$(".sanbay").dialog("close");
				$("#returnCity").focus();
			});
			$("#airport").autocomplete({
						source: function( request, response ) {
							url = "autocomple-airflight&keyword=" + request.term;
							$.getJSON(url, function(data) {
								response($.map(data, function (item) {
									return {

										city : item.city,
										airflights_id : item.airflights_id,
									}
								}));
							});
						} ,
						open: function(event, ui) {
							$(this).autocomplete("widget").css({
								"min-width": 250
							});
						},
						minLength: 2,
						select: function( event, ui ) {
							$("#departCity").val(ui.item.city);
							$("#departCity_hidden").val(ui.item.airflights_id);
							$("#departCity_hidden1").val(ui.item.airflights_id);
							$(".sanbay").dialog("close");
						},
					})
					.data( "autocomplete" )._renderItem = function( ul, item ) {
				var inner_html = '<a>' + item.city + '<b style="float:right;color:#333">' + item.item.airflights_id + '</b></a>';
				return $( "<li></li>" )
						.data( "item.autocomplete", item )
						.append(inner_html)
						.appendTo( ul );
			};
		}else{
			$('.sanbayres').dialog("open");
		}
		$('.sanbayres li.aircode').click(function(){
			$("#returnCity").val($(this).text());
			if($(this).children('a').attr("airportcode")!== undefined){
				$("#returnCity_hidden").val($(this).children('a').attr("airportcode"));
				$("#returnCity_hidden1").val($(this).children('a').attr("code"));
				$("#typeflight").val($(this).children('a').attr("typeflight"));
			}else{
				$("#returnCity_hidden").val($(this).attr("code"));
				$("#returnCity_hidden1").val($(this).attr("code"));
				$("#typeflight").val($(this).attr("typeflight"));
			}
			$(".sanbayres").dialog("close");
			return true;
		});

		$( "#airportres" ).click(function(){
			$(this).val("");
		});

		$("#airportres").autocomplete({
					source: function( request, response ) {
						url = "autocomple-airflight&keyword=" + request.term;
						$.getJSON(url, function(data) {
							response($.map(data, function (item) {
								return {
									city : item.city,
									airflights_id : item.airflights_id,
								}
							}));
							autocomple-airflight
						});
					} ,
					open: function(event, ui) {
						$(this).autocomplete("widget").css({
							"width": 250
						});
					},
					minLength: 2,
					select: function( event, ui ) {
						$("#returnCity").val(ui.item.city);
						$("#returnCity_hidden").val(ui.item.airflights_id);
						$("#returnCity_hidden1").val(ui.item.airflights_id);
						$(".sanbayres").dialog("close");
						return false;
					},
				})

				.data( "autocomplete" )._renderItem = function( ul, item ) {

			var inner_html = '<a>' + item.city + '<b style="float:right;color:#333">' + item.airflights_id + '</b></a>';

			return $( "<li></li>" )

					.data( "item.autocomplete", item )

					.append(inner_html)

					.appendTo( ul );

		};

	});

</script>

<script type="text/javascript"><!--
	$('input[name=\'district_from_tour[name]\']').autocomplete({
		delay: 0,
		source: function(request, response) {
			$.ajax({
				url: 'index.php?route=module/searchve/autocomplete&district_from_tour=' +  encodeURIComponent(request.term),
				dataType: 'json',
				success: function(json) {
					response($.map(json, function(item) {
						return {
							label: item.name,
							value: item.destination
						}
					}));
				}
			});

		},
		select: function(event, ui) {
			$('input[name=\'district_from_tour[name]\']').attr('value', ui.item.label);
			$('input[name=\'district_from_tour[id]\']').attr('value', ui.item.value);
			return false;
		},
		focus: function(event, ui) {
			return false;
		}
	});
	$('input[name=\'district_to_tour[name]\']').autocomplete({
		delay: 0,
		source: function(request, response) {
			$.ajax({
				url: 'index.php?route=module/searchve/autocomplete&district_to=' +  encodeURIComponent(request.term),
				dataType: 'json',
				success: function(json) {
					response($.map(json, function(item) {
						return {
							label: item.name,
							value: item.destination
						}
					}));
				}
			});

		},
		select: function(event, ui) {
			$('input[name=\'district_to_tour[name]\']').attr('value', ui.item.label);
			$('input[name=\'district_to_tour[id]\']').attr('value', ui.item.value);
			return false;
		},
		focus: function(event, ui) {
			return false;
		}
	});
	//-----------------------------------auto complete---------------------------------
	//setup before functions
	var typingTimer;                //timer identifier
	var doneTypingInterval = 1000;  //time in ms (2 seconds)

	//on keyup, start the countdown
	$('#destinationString').keyup(function(){
		clearTimeout(typingTimer);
		if ($('#destinationString').val()) {
			typingTimer = setTimeout(doneTyping, doneTypingInterval);
		}
	});

	//user is "finished typing," do something
	function doneTyping () {
		countryCode = '';
		if ($('input[@name=countryCode]:checked').val()!="") {		
			var countryCode = '&countryCode=' +  $('#quocnoi').val()
		}
		$.ajax({
			url: 'index.php?route=module/searchve/getdestination&destinationString=' +  $('#destinationString').val() + countryCode,
			dataType: 'html',
			success: function(html) {
				$('.auto-complete').html(html);
				$('.auto-complete').show();
				//console.log(json);

			}
		});
	}

	$('.auto-complete').on('click','li',function(){
		$('.auto-complete').hide();

		if($(this).attr('type') == 'city'){
			$('#frmhotel').attr('action', 'Tim-hotels');
			$('#frmhotel').attr('method', 'post');
			$('input[name=\'destinationString\']').attr('value', $(this).html());
			$('input[name=\'destinationId\']').attr('value', $(this).attr('des-id'));
		}
		if($(this).attr('type') == 'hotel'){			
			$('#frmhotel').attr('action', 'Chi-tiet-khach-san');
			$('#frmhotel').attr('method', 'get');
			$('input[name=\'destinationString\']').attr('value', $(this).html());
			$('input[name=\'hotelId\']').attr('value', $(this).attr('hotel-id'));
		}
	});

	//--></script>
