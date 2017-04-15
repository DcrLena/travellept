
$(document).ready(function () 
{
    $('#flights-checkin').datepicker({
		inline: true,
		numberOfMonths:1,
		minDate:0, 
		maxDate: "+1Y",
		dateFormat:"dd/mm/yy",
	
		closeText:"Đóng",
		currentText:"Hôm nay",
		onClose: function(selectedDate){
		
			$('#flights-checkout').datepicker("show");
		},
	});
    $('input:radio[name=radbook]:checked').parent('tr').addClass("selected");
    //If another radio button is clicked, add the select class, and remove it from the previously selected radio
    $('input').click(function () {
        $('input:radio[name=radbook]:not(:checked)').parent().parent().removeClass("selected");
        $('input:radio[name=radbook]:checked').parent().parent().addClass("selected");
    });
      $('input:radio[name=radbookout]:checked').parent('tr').addClass("selected");
    //If another radio button is clicked, add the select class, and remove it from the previously selected radio
    $('input').click(function () {
        $('input:radio[name=radbookout]:not(:checked)').parent().parent().removeClass("selected");
        $('input:radio[name=radbookout]:checked').parent().parent().addClass("selected");
  
    });
   

   
      $("#loading-div-background").css({ opacity: 0.8 });
      
     $(".depDate").datepicker().change(function () {
            var d = $(".depDate").datepicker("getDate");
            d.setDate(d.getDate() + 3);
            $(".retDate").datepicker("setDate", d);
     });
        $('#selectnd').bind('click', function(){
            var url = "index.php?route=vemaybay/select";
        $('#frmsearchair').attr('action',url);
        $('#frmsearchair').submit();

     });
      var dates = $( "#flights-checkin, #flights-checkout" ).datepicker({
			defaultDate: "+1w",
			regional :"vi",
			changeMonth: true,
			changeYear: true,
			showButtonPanel: true,
			minDate: new Date(),
			onSelect: function( selectedDate ) {
					var option = this.id == "flights-checkin" ? "minDate" : "maxDate",
					instance = $( this ).data( "datepicker" ),
					date = $.datepicker.parseDate(
						instance.settings.dateFormat ||
						$.datepicker._defaults.dateFormat,
						selectedDate, instance.settings );
				dates.not( this ).datepicker( "option", option, date ); 
			}
		});
        
		var newOptions = {
	    path: '/',
	    expiresAt: new Date( 2012, 1, 1 )
  	}
       
		$.cookies.setOptions(newOptions);
		
		$('input[name=loaive]').live("change",function() {
		 	var tem = $('input[name=loaive]:checked').val();
		    $("#trip_select_hidden").val(tem);
		    $.cookies.set('f_trip', tem);
		    if (tem=='motluot')
		    {
		    $("#ngayve").css("display","none");
		    }
		    else
		     $( "#ngayve" ).css("display",""); 
		});
		/** function select city **/
        $("#departCity,#returnCity").click(function(){
        var elm = $(this);
            //$('#page_effect').fadeIn(500);
            $.ajax({
                dataType: 'html',
                type: 'get',
                url: 'http://muavere.vn/timve/index.php?route=vemaybay/loadsanbay',
                success: function(data){
                    $.fancybox({
                    'autoDimensions'	: false,
			        'width'         	: 650,
			        'height'        	: '630',
                    content     : data,
                    maxWidth    : 650,
                    fitToView   : false,
                    autoSize    : false,
                    closeClick  : true,
                    openEffect  : 'fade',
                    closeEffect : 'fade',
                    enableEscapeButton : 'false',
                    
                    
                });
                //$.fancybox(data);
			     setAirfunction(elm);
                }
            });
         
        });	
        
       $('#radbook').select(function(){
        
        
       })
        /*** chua dung den **/
		$('#adt_nd').change(function(){
			var tongpax = $('#adt_nd').val()*1+$('#chd_nd').val()*1;
			
			if (tongpax >9)
			{
				tongpax =9 -$('#chd_nd').val()*1;
				var tempx='#adt_nd option[value=\''+tongpax+'\']';
				$(tempx).attr("selected", "selected");
				
		  }
	  });	
	  $('#chd_nd').change(function(){
			var tongpax = $('#adt_nd').val()*1+$('#chd_nd').val()*1;
			
			if (tongpax >9)
			{
				tongpax =9 -$('#adt_nd').val()*1;
				var tempx='#chd_nd option[value=\''+tongpax+'\']';
				$(tempx).attr("selected", "selected");
				
		  }
	  });

      
     $("img.close_detail").live("click",function(){
     $.fancybox.close();
     });
    
     /** function details **/
     
     $('span.detailqt').click(function(){
       var sum = $(this).attr('data');
       
       $.fancybox({ 	
			            'content': '<div class="walting">Ðang xử lý</div>'
			        });
           $.ajax({
           type:'post',
           data:{sum:sum},
           url: 'index.php?route=vemaybay/detailqt',
           before:function(){
            alert(item);
           },
           error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
            alert(thrownError);
          },
           success: function(data){
              $.fancybox({
                    content     : data,
                    'autoDimensions'	: false,
			        'width'         		: 650,
			        'height'        		: 'auto',
                    'transitionIn'	:	'elastic',
                    'transitionOut'	:	'elastic',
                    openEffect	: 'elastic',
                    closeEffect	: 'elastic',
                    fitToView   : false,
                    autoSize    : false,
                    closeClick  : true,
                    openEffect  : 'fade',
                    closeEffect : 'fade',
                    enableEscapeButton : 'false',
                });
              
                }
        });
     });
    
     $('ul.navdate li.changdate').click(function(){
         var day = $(this).attr('day');
        $('#flights-checkin').val(day);
        $('#frmsearchair').submit();
     });
     $('ul.navdateout li.changdate').click(function(){
         var day = $(this).attr('day');
        $('#flights-checkout').val(day);
        $('#frmsearchair').submit();
     });
     
   
   
});
  
	function close_fd(vala){
    	$("#f_detail"+vala).css("display","none");
    }

 function setAirfunction(elm) 
 {	
				$("li.aircode").click(function(event){
				 elm.val($(this).text());
                 var str = $(this).text();
                 var code = $(this).attr('code');
                   
				 var elmhiden = "#"+elm.attr("id")+"_hidden";
                   
					if(elm.attr("id")=="departCity")
					{
						$("#returnCity_hidden").val("");
						$("#returnCity").val("");
						$.cookies.set('Sanbaydi', $(this).attr('code'));
						$.cookies.set('Sanbaydi_name',$(this).text());
					}
					else
						{
							$.cookies.set('Sanbayden', $(this).attr('code'));
					       $.cookies.set('Sanbayden_name', $(this).text());
						}	
					$(elmhiden).val($(this).attr('code')); 
     			$.fancybox.close();
			  });
              $('.sanbay ul').eq(2).css('margin','35px 0px 0px 5px');
               
              	$("li.aircode").hover(
				function()
				{
    
					$(this).toggleClass("actived");
				},
				function()
				{
					$(this).toggleClass("actived");
				});
           
		$( "#airport" ).click(function(){
			$(this).val("");
		});        
        $("#airport").autocomplete({
        source: makeRequest,
        minLength: 2,
        select: function( event, ui ) {
				elm.val(ui.item.label);
					var id = "#"+elm.attr("id")+"_hidden";
					$(id).val(ui.item.value); 
     			$.fancybox.close();
			},
    });	
}		
	//<![CDATA[ 
var source = [
		     {"id":"40","AirportCode":"AEP","AirportCode":"Buenos Aires, Jorge Newbery, Argentina"},{"id":"229","AirportCode":"BRC","FullCityName":"San Carlos de Bariloche, Argentina"},{"id":"247","AirportCode":"BUE","FullCityName":"Buenos Aires, Argentina"},{"id":"347","AirportCode":"COR","FullCityName":"Cordoba, Argentina"},{"id":"498","AirportCode":"EZE","FullCityName":"Buenos Aires, Ezeiza International Airport, Argentina"},{"id":"710","AirportCode":"IGR","FullCityName":"Iguazu, Cataratas, Argentina"},{"id":"810","AirportCode":"JNI","FullCityName":"Junin, Argentina"},{"id":"826","AirportCode":"JSM","FullCityName":"Jose De San Martin, Argentina"},{"id":"833","AirportCode":"JUJ","FullCityName":"Jujuy - El Cadillal Airport, Argentina"},{"id":"1058","AirportCode":"MDQ","FullCityName":"Mar del Plata, Argentina"},{"id":"1062","AirportCode":"MDZ","FullCityName":"Mendoza, Argentina"},{"id":"1458","AirportCode":"ROS","FullCityName":"Rosario, Argentina"},
             {"id":"11","AirportCode":"ABM","FullCityName":"Bamaga, Australia"},{"id":"16","AirportCode":"ABX","FullCityName":"Albury, Australia"},{"id":"34","AirportCode":"ADL","FullCityName":"Adelaide, Australia"},{"id":"66","AirportCode":"ALH","FullCityName":"Albany, Australia"},{"id":"98","AirportCode":"ASP","FullCityName":"Alice Springs, Australia"},{"id":"120","AirportCode":"AYQ","FullCityName":"Ayers Rock - Connellan, Australia"},{"id":"121","AirportCode":"AYR","FullCityName":"Ayr, Australia"},{"id":"138","AirportCode":"BDB","FullCityName":"Bundaberg, Australia"},{"id":"150","AirportCode":"BEO","FullCityName":"Newcastle - Belmont, Australia"},{"id":"175","AirportCode":"BHQ","FullCityName":"Broken Hill, Australia"},{"id":"203","AirportCode":"BLT","FullCityName":"Blackwater, Australia"},{"id":"206","AirportCode":"BME","FullCityName":"Broome, Australia"},
             {"id":"262","AirportCode":"BZL","FullCityName":"Barisal, Bangladesh"},{"id":"300","AirportCode":"CGP","FullCityName":"Chittagong, Bangladesh"},{"id":"386","AirportCode":"DAC","FullCityName":"Dhaka - Zia International Airport, Bangladesh"},{"id":"827","AirportCode":"JSR","FullCityName":"Jessore - Jessore Airport, Bangladesh"},{"id":"1942","AirportCode":"ZYL","FullCityName":"Sylhet, Bangladesh"},{"id":"1154","AirportCode":"MSQ","FullCityName":"Minsk, International, Belarus"},
             {"id":"274","AirportCode":"CBB","FullCityName":"Cochabamba, Bolivia"},{"id":"990","AirportCode":"LPB","FullCityName":"La Paz - El Alto, Bolivia"},{"id":"1580","AirportCode":"SRB","FullCityName":"Santa Rosa, Bolivia"},{"id":"1583","AirportCode":"SRZ","FullCityName":"Santa Cruz de la Sierra, Bolivia"},
             {"id":"56","AirportCode":"AJU","FullCityName":"Aracaju, Brazil"},{"id":"148","AirportCode":"BEL","FullCityName":"Belem, Brazil"},{"id":"238","AirportCode":"BSB","FullCityName":"Brasilia - President Juscelino Kubitschek International Airport, Brazil"},{"id":"253","AirportCode":"BVB","FullCityName":"Boa Vista, Brazil"},{"id":"296","AirportCode":"CGB","FullCityName":"Cuiaba, Brazil"},{"id":"297","AirportCode":"CGH","FullCityName":"Sao Paulo - Congonhas, Brazil"},{"id":"302","AirportCode":"CGR","FullCityName":"Campo Grande, Brazil"},{"id":"341","AirportCode":"CNF","FullCityName":"Belo Horizonte, Brazil"},{"id":"376","AirportCode":"CWB","FullCityName":"Curitiba, Brazil"},{"id":"522","AirportCode":"FLN","FullCityName":"Florianopolis, Brazil"},{"id":"573","AirportCode":"GIG","FullCityName":"Rio de Janeiro - Galeao, Brazil"},{"id":"601","AirportCode":"GRU","FullCityName":"Guarulhos International - Sao Paulo, Brazil"},
             {"id":"18","AirportCode":"ABZ","FullCityName":"Aberdeen, United Kingdom"},{"id":"145","AirportCode":"BEB","FullCityName":"Benbecula, United Kingdom"},{"id":"160","AirportCode":"BFS","FullCityName":"Belfast - Belfast International Airport, United Kingdom"},{"id":"171","AirportCode":"BHD","FullCityName":"Belfast - Harbour, United Kingdom"},{"id":"177","AirportCode":"BHX","FullCityName":"Birmingham - Birmingham International Airport, United Kingdom"},{"id":"199","AirportCode":"BLK","FullCityName":"Blackpool, United Kingdom"},{"id":"218","AirportCode":"BOH","FullCityName":"Bournemouth, United Kingdom"},{"id":"235","AirportCode":"BRR","FullCityName":"Barra (the famous tidal beach landing), United Kingdom"},{"id":"236","AirportCode":"BRS","FullCityName":"Bristol, United Kingdom"},{"id":"270","AirportCode":"CAL","FullCityName":"Campbeltown, United Kingdom"},{"id":"275","AirportCode":"CBG","FullCityName":"Cambrigde, United Kingdom"},{"id":"374","AirportCode":"CVT","FullCityName":"Coventry - Baginton, United Kingdom"},
             {"id":"1809","AirportCode":"VTE","FullCityName":"Vientiane - Wattay, Lao PDR"},{"id":"1350","AirportCode":"PNH","FullCityName":"Phnom Penh - Pochentong, Cambodia"},{"id":"191","AirportCode":"BKK","FullCityName":"Bangkok, Thailand"},{"id":"343","AirportCode":"CNX","FullCityName":"Chiang Mai - Chiang Mai International Airport, Thailand"},{"id":"638","AirportCode":"HDY","FullCityName":"Hatyai (Hat Yai), Thailand"},{"id":"656","AirportCode":"HKT","FullCityName":"Phuket, Thailand"},{"id":"1233","AirportCode":"NST","FullCityName":"Nakhon Si Thammarat, Thailand"},{"id":"1401","AirportCode":"PYX","FullCityName":"Pattaya, Thailand"},{"id":"1721","AirportCode":"UBP","FullCityName":"Ubon Ratchathani - Muang Ubon Airport, Thailand"},{"id":"1763","AirportCode":"UTH","FullCityName":"Udon Thani, Thailand"},{"id":"1765","AirportCode":"UTP","FullCityName":"Utapao (Pattaya), Thailand"},
             {"id":"190","AirportCode":"BKI","FullCityName":"Kota Kinabalu, Malaysia"},{"id":"244","AirportCode":"BTU","FullCityName":"Bintulu, Malaysia"},{"id":"777","AirportCode":"JHB","FullCityName":"Johor Bahru - Sultan Ismail International, Malaysia"},{"id":"851","AirportCode":"KCH","FullCityName":"Kuching, Malaysia"},{"id":"908","AirportCode":"KUA","FullCityName":"Kuantan, Malaysia"},{"id":"911","AirportCode":"KUL","FullCityName":"Kuala Lumpur - International Airport, Malaysia"},{"id":"936","AirportCode":"LBU","FullCityName":"Labuan, Malaysia"},{"id":"960","AirportCode":"LGK","FullCityName":"Langkawi, Malaysia"},{"id":"1186","AirportCode":"MYY","FullCityName":"Miri, Malaysia"},{"id":"1317","AirportCode":"PEN","FullCityName":"Penang International, Malaysia"},{"id":"1488","AirportCode":"SBW","FullCityName":"Sibu, Malaysia"},{"id":"1618","AirportCode":"SZB","FullCityName":"Kuala Lumpur - Sultan Abdul Aziz Shah, Malaysia"},{"id":"1531","AirportCode":"SIN","FullCityName":"Singapore - Changi, Singapore"},
             {"id":"277","AirportCode":"CBU","FullCityName":"Cebu, Philippines"},{"id":"381","AirportCode":"CYU","FullCityName":"Cuyo, Philippines"},{"id":"816","AirportCode":"JOL","FullCityName":"Jolo, Philippines"},{"id":"1127","AirportCode":"MNL","FullCityName":"Manila - Ninoy Aquino International, Philippines"},{"id":"1224","AirportCode":"NOP","FullCityName":"Mactan Island - Nab, Philippines"},{"id":"1057","AirportCode":"MDL","FullCityName":"Mandalay - Annisaton, Myanmar"},{"id":"1435","AirportCode":"RGN","FullCityName":"Rangoon (Yangon) - Mingaladon, Myanmar"},{"id":"863","AirportCode":"KHH","FullCityName":"Kaohsiung International, Taiwan"},{"id":"1188","AirportCode":"MZG","FullCityName":"Makung, Taiwan"},{"id":"1630","AirportCode":"TAY","FullCityName":"Taipei - Sung Shan, Taiwan"},{"id":"1680","AirportCode":"TPE","FullCityName":"Taipei - Chiang Kai Shek, Taiwan"},
             {"id":"1389","AirportCode":"PUS","FullCityName":"Pu San (Pusan) - Kimhae, South Korea"},{"id":"1511","AirportCode":"SEL","FullCityName":"Seoul - Kimpo, South Korea"},{"id":"1762","AirportCode":"USN","FullCityName":"Ulsan, South Korea"},{"id":"531","AirportCode":"FNJ","FullCityName":"Pyongyang - Sunan, North Korea"},
            {"id":"654","AirportCode":"HKG","FullCityName":"Hong Kong - International Airport (HKIA), Hong Kong"},{"id":"1930","AirportCode":"ZJK","FullCityName":"Hong Kong - Chek Lap Kok, Hong Kong"},
            {"id":"6","AirportCode":"AAT","FullCityName":"Altay, PR China"},{"id":"271","AirportCode":"CAN","FullCityName":"Guangzhou (Canton) - Baiyun International Airport, Guangdong, PR China"},{"id":"301","AirportCode":"CGQ","FullCityName":"Changchun, Jilin, PR China"},{"id":"306","AirportCode":"CHG","FullCityName":"Chaoyang, Beijing - Chaoyang Airport, PR China"},{"id":"311","AirportCode":"CHW","FullCityName":"Jiuquan, PR China"},{"id":"322","AirportCode":"CKG","FullCityName":"Chongqing - Jiangbei International Airport, Sichuan, PR China"},{"id":"366","AirportCode":"CTU","FullCityName":"Chengdu - Shuangliu, Sichuan, PR China"},{"id":"404","AirportCode":"DGM","FullCityName":"Dongguan, Guangdong, PR China"},{"id":"415","AirportCode":"DLC","FullCityName":"Dalian - Zhoushuizi International Airport, Liaoning, PR China"},{"id":"644","AirportCode":"HGH","FullCityName":"Hangchow (Hangzhou), Zhejiang, PR China"},{"id":"659","AirportCode":"HLH","FullCityName":"Ulanhot, PR China"},{"id":"679","AirportCode":"HRB","FullCityName":"Harbin (Haerbin), Heilongjiang, PR China"},
            {"id":"83","AirportCode":"AOJ","FullCityName":"Aomori, Japan"},{"id":"95","AirportCode":"ASJ","FullCityName":"Amami, Japan"},{"id":"119","AirportCode":"AXT","FullCityName":"Akita, Japan"},{"id":"365","AirportCode":"CTS","FullCityName":"Chitose, Japan"},{"id":"519","AirportCode":"FKS","FullCityName":"Fukushima-shi, Fukushima Airport, Japan"},{"id":"547","AirportCode":"FUK","FullCityName":"Fukuoka, Japan"},{"id":"552","AirportCode":"GAJ","FullCityName":"Yamagata, Junmachi, Japan"},{"id":"624","AirportCode":"HAC","FullCityName":"Hachijo Jima, Japan"},{"id":"650","AirportCode":"HIJ","FullCityName":"Hiroshima International, Japan"},{"id":"653","AirportCode":"HKD","FullCityName":"Hakodate, Japan"},{"id":"666","AirportCode":"HNA","FullCityName":"Morioka, Hanamaki, Japan"},{"id":"667","AirportCode":"HND","FullCityName":"Tokyo - Haneda, Japan"},
            {"id":"11","AirportCode":"ABM","FullCityName":"Bamaga, Australia"},{"id":"16","AirportCode":"ABX","FullCityName":"Albury, Australia"},{"id":"34","AirportCode":"ADL","FullCityName":"Adelaide, Australia"},{"id":"66","AirportCode":"ALH","FullCityName":"Albany, Australia"},{"id":"98","AirportCode":"ASP","FullCityName":"Alice Springs, Australia"},{"id":"120","AirportCode":"AYQ","FullCityName":"Ayers Rock - Connellan, Australia"},{"id":"121","AirportCode":"AYR","FullCityName":"Ayr, Australia"},{"id":"138","AirportCode":"BDB","FullCityName":"Bundaberg, Australia"},{"id":"150","AirportCode":"BEO","FullCityName":"Newcastle - Belmont, Australia"},{"id":"175","AirportCode":"BHQ","FullCityName":"Broken Hill, Australia"},{"id":"203","AirportCode":"BLT","FullCityName":"Blackwater, Australia"},{"id":"206","AirportCode":"BME","FullCityName":"Broome, Australia"},
            {"id":"44","AirportCode":"AGB","FullCityName":"Augsburg - Muehlhausen (Munic), Germany"},{"id":"151","AirportCode":"BER","FullCityName":"Berlin, Germany"},{"id":"231","AirportCode":"BRE","FullCityName":"Bremen - Bremen Airport (Flughafen Bremen), Germany"},{"id":"260","AirportCode":"BYU","FullCityName":"Bayreuth - Bindlacher-Berg, Germany"},{"id":"299","AirportCode":"CGN","FullCityName":"Cologne - Cologne International Airport (Flughafen Köln/Bonn), Germany"},{"id":"432","AirportCode":"DRS","FullCityName":"Dresden - Dresden Airport, Germany"},{"id":"436","AirportCode":"DTM","FullCityName":"Dortmund, Germany"},{"id":"443","AirportCode":"DUS","FullCityName":"Duesseldorf - Düsseldorf International Airport, Germany"},{"id":"481","AirportCode":"ERF","FullCityName":"Erfurt - Erfurt Airport (Flughafen Erfurt), Germany"},{"id":"510","AirportCode":"FDH","FullCityName":"Friedrichshafen - Bodensee-Airport Friedrichshafen, Germany"},{"id":"516","AirportCode":"FKB","FullCityName":"Karlsruhe-Baden - Soellingen, Germany"},{"id":"526","AirportCode":"FMO","FullCityName":"Muenster/Osnabrueck, Germany"},
            {"id":"76","AirportCode":"AMS","FullCityName":"Amsterdam - Amsterdam Airport Schiphol, Netherlands"},{"id":"222","AirportCode":"BON","FullCityName":"Bonaire, Netherlands Antilles"},{"id":"369","AirportCode":"CUR","FullCityName":"Curacao - Curaçao International Airport, Netherlands Antilles"},{"id":"463","AirportCode":"EIN","FullCityName":"Eindhoven, Netherlands"},{"id":"599","AirportCode":"GRQ","FullCityName":"Groningen - Eelde, Netherlands"},{"id":"625","AirportCode":"HAG","FullCityName":"Den Haag (The Hague), Netherlands"},{"id":"954","AirportCode":"LEY","FullCityName":"Lelystad, Netherlands"},{"id":"1156","AirportCode":"MST","FullCityName":"Maastricht/Aachen, Netherlands"},{"id":"1467","AirportCode":"RTM","FullCityName":"Rotterdam, Netherlands"},{"id":"1613","AirportCode":"SXM","FullCityName":"St. Marteen, Netherlands Antilles"},{"id":"1724","AirportCode":"UDE","FullCityName":"Uden - Volkel Airport, Netherlands"},{"id":"84","AirportCode":"AOK","FullCityName":"Karpathos, Greece"},{"id":"102","AirportCode":"ATH","FullCityName":"Athens, Greece"},{"id":"294","AirportCode":"CFU","FullCityName":"Corfu, Greece"},{"id":"309","AirportCode":"CHQ","FullCityName":"Chania, Greece"},{"id":"593","AirportCode":"GPA","FullCityName":"Araxos, Greece"},{"id":"640","AirportCode":"HER","FullCityName":"Heraklion, Greece"},{"id":"641","AirportCode":"HEW","FullCityName":"Athens, Hellinikon Airport, Greece"},{"id":"795","AirportCode":"JKH","FullCityName":"Chios, Greece"},{"id":"803","AirportCode":"JMK","FullCityName":"Mykonos, Greece"},{"id":"812","AirportCode":"JNX","FullCityName":"Naxos - Naxos Airport, Greece"},{"id":"825","AirportCode":"JSI","FullCityName":"Skiathos, Greece"},{"id":"830","AirportCode":"JTR","FullCityName":"Thira, Greece"},
             {"id":"246","AirportCode":"BUD","FullCityName":"Budapest - Budapest Ferihegy International Airport, Hungary"},
             {"id":"378","AirportCode":"CXI","FullCityName":"Christmas Line, Iceland"},{"id":"412","AirportCode":"DKI","FullCityName":"Dunk Iceland, Australia"},{"id":"462","AirportCode":"EGS","FullCityName":"Egilsstadir, Iceland"},{"id":"856","AirportCode":"KEF","FullCityName":"Reykjavik - Keflavik International, Iceland"},{"id":"1430","AirportCode":"REK","FullCityName":"Reykjavik - Metropolitan Area, Iceland"},{"id":"124","AirportCode":"AYW","FullCityName":"Ayawasi, Indonesia"},{"id":"140","AirportCode":"BDO","FullCityName":"Bandung - Husein Sastranegara International Airport, Indonesia"},{"id":"298","AirportCode":"CGK","FullCityName":"Jakarta - Soekarno-Hatta International, Indonesia"},{"id":"408","AirportCode":"DJB","FullCityName":"Jambi - Sultan Taha Syarifudn, Indonesia "},{"id":"410","AirportCode":"DJJ","FullCityName":"Jayapura - Sentani, Indonesia"},{"id":"429","AirportCode":"DPS","FullCityName":"Denpasar/Bali, Indonesia"},{"id":"661","AirportCode":"HLP","FullCityName":"Jakarta - Halim Perdana Kusuma, Indonesia"},{"id":"797","AirportCode":"JKT","FullCityName":"Jakarta - Metropolitan Area, Indonesia"},{"id":"1055","AirportCode":"MDC","FullCityName":"Manado, Indonesia"},{"id":"1068","AirportCode":"MES","FullCityName":"Medan, Indonesia"},{"id":"1596","AirportCode":"SUB","FullCityName":"Surabaya - Juanda, Indonesia"},{"id":"1673","AirportCode":"TOD","FullCityName":"Tioman, Indonesia"},
             {"id":"292","AirportCode":"CFN","FullCityName":"Donegal (Carrickfin), Ireland"},{"id":"439","AirportCode":"DUB","FullCityName":"Dublin - Dublin International Airport, Ireland"},{"id":"618","AirportCode":"GWY","FullCityName":"Galway, Ireland"},{"id":"872","AirportCode":"KIR","FullCityName":"Kerry County, Ireland"},{"id":"1223","AirportCode":"NOC","FullCityName":"Knock, Ireland"},{"id":"1276","AirportCode":"ORK","FullCityName":"Cork, Ireland"},{"id":"1564","AirportCode":"SNN","FullCityName":"Shannon (Limerick), Ireland"},{"id":"1612","AirportCode":"SXL","FullCityName":"Sligo, Ireland"},
             {"id":"871","AirportCode":"KIN","FullCityName":"Kingston - Norman Manley, Jamaica"},{"id":"1041","AirportCode":"MBJ","FullCityName":"Montego Bay - Sangster International, Jamaica"},
             {"id":"190","AirportCode":"BKI","FullCityName":"Kota Kinabalu, Malaysia"},{"id":"244","AirportCode":"BTU","FullCityName":"Bintulu, Malaysia"},{"id":"777","AirportCode":"JHB","FullCityName":"Johor Bahru - Sultan Ismail International, Malaysia"},{"id":"851","AirportCode":"KCH","FullCityName":"Kuching, Malaysia"},{"id":"908","AirportCode":"KUA","FullCityName":"Kuantan, Malaysia"},{"id":"911","AirportCode":"KUL","FullCityName":"Kuala Lumpur - International Airport, Malaysia"},{"id":"936","AirportCode":"LBU","FullCityName":"Labuan, Malaysia"},{"id":"960","AirportCode":"LGK","FullCityName":"Langkawi, Malaysia"},{"id":"1186","AirportCode":"MYY","FullCityName":"Miri, Malaysia"},{"id":"1317","AirportCode":"PEN","FullCityName":"Penang International, Malaysia"},{"id":"1488","AirportCode":"SBW","FullCityName":"Sibu, Malaysia"},{"id":"1618","AirportCode":"SZB","FullCityName":"Kuala Lumpur - Sultan Abdul Aziz Shah, Malaysia"},
             {"id":"193","AirportCode":"BKO","FullCityName":"Bamako - Bamako-Senou International Airport, Mali"},{"id":"1084","AirportCode":"MGQ","FullCityName":"Mogadishu, Somalia"},{"id":"1182","AirportCode":"MYD","FullCityName":"Malindi, Kenya"},
             {"id":"19","AirportCode":"ACA","FullCityName":"Acapulco, Mexico"},{"id":"47","AirportCode":"AGU","FullCityName":"Aguascaliente, Mexico"},{"id":"127","AirportCode":"AZP","FullCityName":"Mexico City - Atizapan, Mexico"},{"id":"188","AirportCode":"BJX","FullCityName":"Leon, Mexico"},{"id":"288","AirportCode":"CEN","FullCityName":"Ciudad Obregon, Mexico"},{"id":"320","AirportCode":"CJS","FullCityName":"Ciudad Juarez, Mexico"},{"id":"329","AirportCode":"CLQ","FullCityName":"Colima, Mexico"},{"id":"333","AirportCode":"CME","FullCityName":"Ciudad Del Carmen, Mexico"},{"id":"367","AirportCode":"CUL","FullCityName":"Culiacan, Mexico"},{"id":"368","AirportCode":"CUN","FullCityName":"Cancun, Mexico"},{"id":"370","AirportCode":"CUU","FullCityName":"Chihuahua, Gen Fierro Villalobos, Mexico"},{"id":"372","AirportCode":"CVM","FullCityName":"Ciudad Victoria, Mexico"},{"id":"1744","AirportCode":"ULN","FullCityName":"Ulaanbaatar - Buyant Uhaa Airport, Mongolia"},
             {"id":"1057","AirportCode":"MDL","FullCityName":"Mandalay - Annisaton, Myanmar"},{"id":"1435","AirportCode":"RGN","FullCityName":"Rangoon (Yangon) - Mingaladon, Myanmar"},{"id":"37","AirportCode":"ADY","FullCityName":"Alldays, South Africa"},{"id":"48","AirportCode":"AGZ","FullCityName":"Aggeneys, South Africa"},{"id":"67","AirportCode":"ALJ","FullCityName":"Alexander Bay - Kortdoorn, South Africa"},{"id":"158","AirportCode":"BFN","FullCityName":"Bloemfontein - Bloemfontein Airport, South Africa"},{"id":"352","AirportCode":"CPT","FullCityName":"Cape Town - Cape Town International Airport, South Africa"},{"id":"442","AirportCode":"DUR","FullCityName":"Durban, South Africa"},{"id":"468","AirportCode":"ELL","FullCityName":"Ellisras, South Africa"},{"id":"471","AirportCode":"ELS","FullCityName":"East London, South Africa"},{"id":"597","AirportCode":"GRJ","FullCityName":"George, South Africa"},{"id":"658","AirportCode":"HLA","FullCityName":"Lanseria, South Africa"},{"id":"808","AirportCode":"JNB","FullCityName":"Johannesburg - OR Tambo International Airport, South Africa"},{"id":"870","AirportCode":"KIM","FullCityName":"Kimberley, South Africa"},
             {"id":"42","AirportCode":"AES","FullCityName":"Alesund, Norway"},{"id":"64","AirportCode":"ALF","FullCityName":"Alta, Norway"},{"id":"144","AirportCode":"BDU","FullCityName":"Bardufoss, Norway"},{"id":"165","AirportCode":"BGO","FullCityName":"Bergen, Norway"},{"id":"213","AirportCode":"BNN","FullCityName":"Broennoeysund, Norway"},{"id":"223","AirportCode":"BOO","FullCityName":"Bodo, Norway"},{"id":"491","AirportCode":"EVE","FullCityName":"Evenes, Norway"},{"id":"506","AirportCode":"FBU","FullCityName":"Oslo - Fornebu, Norway"},{"id":"539","AirportCode":"FRO","FullCityName":"Floro, Norway"},{"id":"632","AirportCode":"HAU","FullCityName":"Haugesund, Norway"},{"id":"643","AirportCode":"HFT","FullCityName":"Hammerfest, Norway"},{"id":"876","AirportCode":"KKN","FullCityName":"Kirkenes, Norway"},
             {"id":"789","AirportCode":"JIR","FullCityName":"Jiri, Nepal"},{"id":"796","AirportCode":"JKR","FullCityName":"Janakpur, Nepal"},{"id":"804","AirportCode":"JMO","FullCityName":"Jomsom, Nepal"},{"id":"835","AirportCode":"JUM","FullCityName":"Jumla, Nepal"},{"id":"904","AirportCode":"KTM","FullCityName":"Kathmandu - Tribhuvan International Airport, Nepal"},{"id":"58","AirportCode":"AKL","FullCityName":"Auckland - Auckland International Airport, New Zealand"},{"id":"172","AirportCode":"BHE","FullCityName":"Blenheim, New Zealand"},{"id":"305","AirportCode":"CHC","FullCityName":"Christchurch, New Zealand"},{"id":"440","AirportCode":"DUD","FullCityName":"Dunedin, New Zealand"},{"id":"610","AirportCode":"GTN","FullCityName":"Mount Cook, New Zealand"},{"id":"663","AirportCode":"HLZ","FullCityName":"Hamilton, New Zealand"},{"id":"740","AirportCode":"IVC","FullCityName":"Incercargill, New Zealand"},{"id":"1075","AirportCode":"MFN","FullCityName":"Milford Sound, New Zealand"},{"id":"1231","AirportCode":"NSN","FullCityName":"Nelson, New Zealand"},{"id":"1348","AirportCode":"PMR","FullCityName":"Palmerston North, New Zealand"},{"id":"1459","AirportCode":"ROT","FullCityName":"Rotorua, New Zealand"},{"id":"1642","AirportCode":"TEU","FullCityName":"Te Anau, New Zealand"},
             {"id":"100","AirportCode":"ASU","FullCityName":"Asuncion - Asuncion International Airport, Paraguay"},
             {"id":"41","AirportCode":"AER","FullCityName":"Adler/Sochi, Russia"},{"id":"90","AirportCode":"ARH","FullCityName":"Arkhangelsk, Russia"},{"id":"420","AirportCode":"DME","FullCityName":"Moscow - Domodedovo, Russia"},{"id":"685","AirportCode":"HTA","FullCityName":"Chita (Tschita), Russia"},{"id":"712","AirportCode":"IKT","FullCityName":"Irkutsk, Russia"},{"id":"866","AirportCode":"KHV","FullCityName":"Chabarovsk (Khabarovsk), Russia"},{"id":"919","AirportCode":"KZN","FullCityName":"Kazan (Ka San), Russia"},{"id":"948","AirportCode":"LED","FullCityName":"St. Petersburg (Leningrad) - Pulkovo, Russia"},{"id":"1123","AirportCode":"MMK","FullCityName":"Murmansk, Russia"},{"id":"1132","AirportCode":"MOW","FullCityName":"Moscow - Metropolitan Area, Russia"},{"id":"1146","AirportCode":"MRV","FullCityName":"Mineralnye Vody, Russia"},{"id":"1295","AirportCode":"OVB","FullCityName":"Novosibirsk - Tolmachevo, Russia"},
             {"id":"728","AirportCode":"IQT","FullCityName":"Iquitos, Peru"},{"id":"761","AirportCode":"JAU","FullCityName":"Jauja, Peru"},{"id":"792","AirportCode":"JJI","FullCityName":"Juanjui, Peru"},{"id":"834","AirportCode":"JUL","FullCityName":"Juliaca, Peru"},{"id":"969","AirportCode":"LIM","FullCityName":"Lima - J Chavez International, Peru"},{"id":"1314","AirportCode":"PEG","FullCityName":"Perugia, Italy"},
             {"id":"53","AirportCode":"AJA","FullCityName":"Ajaccio, France"},{"id":"113","AirportCode":"AUR","FullCityName":"Aurillac, France"},{"id":"152","AirportCode":"BES","FullCityName":"Brest, France"},{"id":"178","AirportCode":"BIA","FullCityName":"Bastia, France"},{"id":"181","AirportCode":"BIQ","FullCityName":"Biarritz, France"},{"id":"216","AirportCode":"BOD","FullCityName":"Bordeaux - Bordeaux Airport, France"},{"id":"284","AirportCode":"CDG","FullCityName":"Paris - Charles de Gaulle, France"},{"id":"290","AirportCode":"CFE","FullCityName":"Clermont Ferrand, France"},{"id":"331","AirportCode":"CLY","FullCityName":"Calvi, France"},{"id":"334","AirportCode":"CMF","FullCityName":"Chambery, France"},{"id":"423","AirportCode":"DNR","FullCityName":"Dinard, France"},{"id":"450","AirportCode":"EAP","FullCityName":"Basel/Mulhouse, Switzerland/France"},
             {"id":"478","AirportCode":"ENF","FullCityName":"Enontekioe, Finland"},{"id":"639","AirportCode":"HEL","FullCityName":"Helsinki - Vantaa, Finland"},{"id":"741","AirportCode":"IVL","FullCityName":"Ivalo, Finland"},{"id":"814","AirportCode":"JOE","FullCityName":"Joensuu, Finland"},{"id":"842","AirportCode":"JYV","FullCityName":"Jyväskylä (Jyvaskyla), Finland"},{"id":"843","AirportCode":"KAJ","FullCityName":"Kajaani, Finland"},{"id":"845","AirportCode":"KAO","FullCityName":"Kuusamo, Finland"},{"id":"858","AirportCode":"KEM","FullCityName":"Kemi/Tornio, Finland"},{"id":"865","AirportCode":"KHJ","FullCityName":"Kauhajoki, Finland"},{"id":"892","AirportCode":"KOK","FullCityName":"Kokkola/Pietarsaari, Finland"},{"id":"907","AirportCode":"KTT","FullCityName":"Kittilä, Finland"},{"id":"912","AirportCode":"KUO","FullCityName":"Kuopio, Finland"},
		     {"id":"277","AirportCode":"CBU","FullCityName":"Cebu, Philippines"},{"id":"381","AirportCode":"CYU","FullCityName":"Cuyo, Philippines"},{"id":"816","AirportCode":"JOL","FullCityName":"Jolo, Philippines"},{"id":"1127","AirportCode":"MNL","FullCityName":"Manila - Ninoy Aquino International, Philippines"},{"id":"1224","AirportCode":"NOP","FullCityName":"Mactan Island - Nab, Philippines"},
   {"id":"426","AirportCode":"DOH","FullCityName":"Doha - Doha International Airport, Qatar"},
	{"id":"250","AirportCode":"BUH","FullCityName":"Bucharest, Romania"},{"id":"340","AirportCode":"CND","FullCityName":"Constanta (Constanza) - Constanta International Airport, Romania"},{"id":"1287","AirportCode":"OTP","FullCityName":"Bucharest - Henri Coanda International Airport, Romania"},{"id":"458","AirportCode":"EDI","FullCityName":"Edinburgh - BAA Edinburgh Airport, Scotland, UK"},
    {"id":"21","AirportCode":"ACE","FullCityName":"Arrecife/Lanzarote, Spain"},{"id":"45","AirportCode":"AGP","FullCityName":"Malaga, Spain"},{"id":"63","AirportCode":"ALC","FullCityName":"Alicante, Spain"},{"id":"135","AirportCode":"BCN","FullCityName":"Barcelona, Spain"},{"id":"180","AirportCode":"BIO","FullCityName":"Bilbao, Spain"},{"id":"189","AirportCode":"BJZ","FullCityName":"Badajoz, Spain"},{"id":"451","AirportCode":"EAS","FullCityName":"San Sebastian, Spain"},{"id":"546","AirportCode":"FUE","FullCityName":"Fuerteventura, Spain"},{"id":"598","AirportCode":"GRO","FullCityName":"Gerona, Spain"},{"id":"602","AirportCode":"GRX","FullCityName":"Granada, Spain"},{"id":"703","AirportCode":"IBZ","FullCityName":"Ibiza, Ibiza/Spain"},{"id":"939","AirportCode":"LCG","FullCityName":"La Coruna, Spain"},
    {"id":"28","AirportCode":"ADA","FullCityName":"Adana, Turkey"},{"id":"29","AirportCode":"ADB","FullCityName":"Izmir - Adnan Menderes, Turkey"},{"id":"32","AirportCode":"ADF","FullCityName":"Adiyaman, Turkey"},{"id":"79","AirportCode":"ANK","FullCityName":"Ankara, Turkey"},{"id":"99","AirportCode":"ASR","FullCityName":"Kayseri, Turkey"},{"id":"122","AirportCode":"AYT","FullCityName":"Antalya, Turkey"},{"id":"128","AirportCode":"AZS","FullCityName":"Elazig, Turkey"},{"id":"187","AirportCode":"BJV","FullCityName":"Bodrum - Milas Airport, Turkey"},{"id":"418","AirportCode":"DLM","FullCityName":"Dalaman, Turkey"},{"id":"424","AirportCode":"DNZ","FullCityName":"Denizli, Turkey"},{"id":"480","AirportCode":"ERC","FullCityName":"Erzincan, Turkey"},{"id":"484","AirportCode":"ERZ","FullCityName":"Erzurum, Turkey"},
    {"id":"92","AirportCode":"ARN","FullCityName":"Stockholm - Arlanda, Sweden"},{"id":"205","AirportCode":"BMA","FullCityName":"Stockholm - Bromma, Sweden"},{"id":"589","AirportCode":"GOT","FullCityName":"Gothenburg (Göteborg) - Landvetter, Sweden"},{"id":"778","AirportCode":"JHE","FullCityName":"Helsingborg, Sweden"},{"id":"794","AirportCode":"JKG","FullCityName":"Jönköping (Jonkoping) - Axamo Airport, Sweden"},{"id":"867","AirportCode":"KID","FullCityName":"Kristianstad, Sweden"},{"id":"877","AirportCode":"KLR","FullCityName":"Kalmar, Sweden"},{"id":"895","AirportCode":"KRN","FullCityName":"Kiruna, Sweden"},{"id":"899","AirportCode":"KSD","FullCityName":"Karlstad, Sweden"},{"id":"944","AirportCode":"LDK","FullCityName":"Lidkoeping, Sweden"},{"id":"977","AirportCode":"LLA","FullCityName":"Lulea, Sweden"},{"id":"1119","AirportCode":"MMA","FullCityName":"Malmo (Malmoe), Sweden"},
    {"id":"22","AirportCode":"ACH","FullCityName":"Altenrhein, Switzerland"},{"id":"234","AirportCode":"BRN","FullCityName":"Berne, Bern-Belp, Switzerland"},{"id":"239","AirportCode":"BSL","FullCityName":"Basel, Switzerland"},{"id":"450","AirportCode":"EAP","FullCityName":"Basel/Mulhouse, Switzerland/France"},{"id":"614","AirportCode":"GVA","FullCityName":"Geneva - Geneva-Cointrin International Airport, Switzerland"},{"id":"1009","AirportCode":"LUG","FullCityName":"Lugano, Switzerland"},{"id":"1928","AirportCode":"ZDJ","FullCityName":"Berne, Railway Service, Switzerland"},{"id":"1937","AirportCode":"ZRH","FullCityName":"Zurich (Zürich) - Kloten, Switzerland"},{"id":"956","AirportCode":"LFW","FullCityName":"Lome, Togo"},
    {"id":"1173","AirportCode":"MVD","FullCityName":"Montevideo - Carrasco, Uruguay"},	 {"id":"51","AirportCode":"AHO","FullCityName":"Alghero Sassari, Italy"},{"id":"82","AirportCode":"AOI","FullCityName":"Ancona, Italy"},{"id":"143","AirportCode":"BDS","FullCityName":"Brindisi, Italy"},{"id":"169","AirportCode":"BGY","FullCityName":"Bergamo/Milan - Orio Al Serio, Italy"},{"id":"201","AirportCode":"BLQ","FullCityName":"Bologna, Italy"},{"id":"232","AirportCode":"BRI","FullCityName":"Bari, Italy"},{"id":"267","AirportCode":"CAG","FullCityName":"Cagliari, Italy"},{"id":"312","AirportCode":"CIA","FullCityName":"Rome - Ciampino, Italy"},{"id":"362","AirportCode":"CTA","FullCityName":"Catania, Italy"},{"id":"454","AirportCode":"EBA","FullCityName":"Elba Island, Marina Di Campo, Italy"},{"id":"508","AirportCode":"FCO","FullCityName":"Rome - Fuimicino, Italy"},{"id":"524","AirportCode":"FLR","FullCityName":"Florence (Firenze) - Peretola Airport, Italy"},
    {"id":"929","AirportCode":"LAX","FullCityName":"Los Angeles, CA - International, USA"},
    {"id":"629","AirportCode":"HAN","FullCityName":"Hanoi - Noibai, Viet Nam"},{"id":"690","AirportCode":"HUI","FullCityName":"Hue - Phu Bai, Viet Nam"},{"id":"1521","AirportCode":"SGN","FullCityName":"Ho Chi Minh City, Viet Nam"},{"id":"1943","AirportCode":"VDH","FullCityName":"Dong Hoi, Viet Nam"},{"id":"1944","AirportCode":"DAD","FullCityName":"Da Nang, Viet Nam"},{"id":"1945","AirportCode":"VCL","FullCityName":"Tam Ky, Viet Nam"},{"id":"1946","AirportCode":"UIH","FullCityName":"Qui Nhon, Viet Nam"},{"id":"1947","AirportCode":"TBB","FullCityName":"Tuy Hoa, Viet Nam"},{"id":"1948","AirportCode":"NHA","FullCityName":"Nha Trang, Viet Nam"},{"id":"1949","AirportCode":"PXU","FullCityName":"Pleiku, Viet Nam"},{"id":"1950","AirportCode":"BMV","FullCityName":"Ban Me Thuot, Viet Nam"},{"id":"1951","AirportCode":"DLI","FullCityName":"Da lat - Lien Khuong, Viet Nam"},
    {"id":"93","AirportCode":"ASB","FullCityName":"Ashgabat, Ashkhabat - Saparmurat Turkmenbashy International Airport, Turkmenistan"},{"id":"100","AirportCode":"ASU","FullCityName":"Asuncion - Asuncion International Airport, Paraguay"},{"id":"284","AirportCode":"CDG","FullCityName":"Paris - Charles de Gaulle, France"},{"id":"606","AirportCode":"GSP","FullCityName":"Greenville/Spartanburg, SC, USA"},{"id":"696","AirportCode":"HWN","FullCityName":"Hwange National Park, Zimbabwe"},{"id":"1280","AirportCode":"ORY","FullCityName":"Paris - Orly, France"},{"id":"1306","AirportCode":"PBH","FullCityName":"Paro, Bhutan"},{"id":"1308","AirportCode":"PBM","FullCityName":"Paramaribo - Zanderij International, Suriname"},{"id":"1309","AirportCode":"PBO","FullCityName":"Paraburdoo, Australia"},{"id":"1773","AirportCode":"VAP","FullCityName":"Valparaiso, Chile"},{"id":"1842","AirportCode":"XRY","FullCityName":"Jerez de la Frontera/Cadiz - La Parra, Spain"},
];		 

function makeRequest(request, response) {
    airports = [];
    var searchTerm = request.term.toLowerCase();
     $.each(source, function(i, airportItem){
            //Do your search here...
            if (airportItem.AirportCode.toLowerCase().indexOf(searchTerm) !== -1 || airportItem.AirportCode.indexOf(searchTerm) === 0)
                //ret.push(airportItem.AirportCode + ' - ' + airportItem.FullCityName);
                airports.push({label:airportItem.FullCityName, value:airportItem.AirportCode});
                
        });
        

        response(airports);
   
    
}

//]]> 

   function ShowProgressAnimation() {
           
            $("#loading-div-background").show();
             $("#loading-div-background").fadeOut(10000);
        }
$(function(){
 $(".results tr").show();
 
    $(".filters li input[type=checkbox]").click(function(){
 
        var selection = $(this).val();
        if (selection == "ALL"){
            //show all items
            if ($(this).is(':checked')){
                $(".results tr").removeClass('hidden');
                $(".filters li input[type=checkbox]").attr('checked','checked');
                $(".filters li").addClass('checked');
           
            }else{
                $(".results tr").addClass('hidden');
                $(".filters li input[type=checkbox]").removeAttr('checked');
                $(".filters li").removeClass('checked');
            }
        }else{
            
            if ($(this).is(':checked')){
                $(".results tr."+selection+"").removeClass('hidden');
                var stringOfClassNames = '';
                var thisClassString = $(".results tr."+selection).attr('class');
                stringOfClassNames = stringOfClassNames +' '+ thisClassString;
 
                var arrayClasses = stringOfClassNames.split(' ');
                $.each(arrayClasses, function() {
                    $('.filters input[value='+this+']').parent('li').addClass('checked');
                    });
                    $('.filters input[value='+this+']').attr('checked','checked');
                
            }else{
 
               $(".results tr."+selection+"").addClass('hidden'); 
                    if ($('.filters input:checked').length <= 0){
                      $(".results tr."+selection+"").addClass('hidden');
                      $(this).parent('li').removeClass('checked');
                    }
 
              $(this).parent('li').removeClass('checked');
            }
        }
    });
   
});
        
 
