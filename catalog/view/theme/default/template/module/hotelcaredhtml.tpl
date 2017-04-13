<?php if(isset($hotelcareds) && count($hotelcareds)> 0){?>
    <?php 
	$i=0;	
	foreach($hotelcareds as $hotel){?>
    <div class="row col-md-3" >
        <div class="col-xs-12">
            <a href="href" class="badge-container imghotel">
			<img class="full-width" src="<?php echo $hotel['BigUrl'];?>" alt=""  />
			</a>
        </div>
        <div class="col-xs-12">
            <h5 class="box-title"><?php echo $hotel['name'];?></h5>
            <div class="five-stars-container" title=""><span class="five-stars" style="width: <?php echo $hotel['hotelRating'];?>%;"></span></div>
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
<?php }else{  ?>
    Updating... 
<?php } ?>    

                             