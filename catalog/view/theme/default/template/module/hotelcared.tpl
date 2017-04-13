           <div class="large-block container" id="listhotelcarest">
                        <div class="row">
                            <div class="col-md-12">
                                <h2 class="heading_title" ><?php echo $heading_title; ?></h2>
                                <div class="bor-petant"></div>
                                <div class="tab-container style1 box">
                                    <ul class="tabs">
                                        <li class="active"><a href="#danang" data="danang" data-toggle="tab">Da Nang</a></li>
                                        <li><a href="#nhatrang" data="nhatrang" data-toggle="tab">Nha Trang</a></li>
                                        <li><a href="#dalat" data="dalat" data-toggle="tab">Da Lat</a></li>
                                        <li><a href="#phanthiet" data="phanthiet" data-toggle="tab">Phan Thiet</a></li>
                                        <li><a href="#hochiminh" data="hochiminh" data-toggle="tab">Ho Chi Minh City</a></li>
                                        <li><a href="#hanoi" data="hanoi" data-toggle="tab">Ha Noi</a></li>
                                    </ul>
                                    <script type="text/javascript">
                                                $('#listhotelcarest .tabs li a').live('click',function(){
                                                        var city = $(this).attr('data') ;
                                                        var listhotel = '#' + city;  
                                                        $.ajax({
                                                            type:'POST',
                                                            url:'khach-san-duoc-quan-tam&city=' + city,  
                                                            success: function(data){    
                                                               $(listhotel).html("");  
                                                               $(listhotel).append(data); 
                                                            }
                                                        });                                               
                                                });
                                    </script>
                                    <div class="tab-content">
                                        <div class="tab-pane fade in active" id="danang">
                                        <?php 
										$i=0;
										foreach($hotelcareds as $hotel){ ?>
                                           <div class="row col-md-3">
                                                <div class="col-xs-12">
                                                    <a href="<?php echo $hotel['href']; ?>" class="badge-container imghotel">
													<img class="full-width" src="<?php echo $hotel['BigUrl'];?>" alt=""  />
													</a>
                                                </div>
                                                <div class="col-xs-12">
                                                    <h5 class="box-title">
                                                        <a href="<?php echo $hotel['href']; ?>" class="badge-container">
                                                            <?php echo $hotel['name'];?>
                                                        </a>
                                                    </h5>
                                                    <div class="five-stars-container" title=""><span class="five-stars" style="width: <?php echo $hotel['hotelRating']; ?>"></span></div>
                                                    <p class="no-margin"><?php echo $hotel['shortDescription'];?></p>
                                                </div>
                                                <div class="col-xs-12">
                                                    <span class="price"><small>Price from</small>
                                                    <?php echo $hotel['price']; ?>
                                                    </span>
                                                    <br /><br />
                                                    <a class="button green-bg pull-right" href="<?php echo $hotel['href']; ?>">Detail</a>
                                                </div>
                                            </div>    
										<?php if(($i>0) && ($i!=(count($hotelcareds)-1)) &&(($i%4)==3)){ ?>
										<div class="full-width left" style="margin:15px 0px; border-top:1px dotted #ccc;"> </div>
										<?php } ?>										
										<?php 
										$i++;
										} ?>                                      
                                        </div>
                                        <div class="tab-pane fade" id="nhatrang">
                                          Updating...   
                                        </div>
                                        <div class="tab-pane fade" id="dalat">
                                           Updating...  
                                        </div>
                                        <div class="tab-pane fade" id="phanthiet">
                                         Updating...    
                                        </div>
                                        <div class="tab-pane fade" id="hochiminh">
                                            Updating... 
                                        </div>
                                        
                                        <div class="tab-pane fade" id="hanoi">
                                          Updating...  
                                        </div>
                                    </div>
                                </div>
                            </div>