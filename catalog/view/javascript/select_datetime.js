function isEmpty(obj) {
        if (typeof obj == 'undefined' || obj === null || obj === '') return true;
        if (typeof obj == 'number' && isNaN(obj)) return true;
        if (obj instanceof Date && isNaN(Number(obj))) return true;
        return false;
}
    $(document).ready(function () {
        $('.cbo-datetype').each(function () {
            var dateType = $(this).attr('datetype');
            $('.txt-date-' + dateType).val($('.cbo-' + dateType + '-day').val() + '-' + $('.cbo-' + dateType + '-month').val());
        });
        var currentDate = new Date();
        var maxDate = new Date(currentDate.getFullYear() + 1, currentDate.getMonth(), 1);
        maxDate.setDate(maxDate.getDate() - 1);
        $('.txt-date-departure').datepickerlunar({
            minDate: 0,
            showOn: "button",
            buttonImage: "calendar.png",
            buttonImageOnly: true,
            buttonText: "Ngày đi",
            maxDate: maxDate
        });
        $('.txt-date-return').datepickerlunar({
            minDate: 0,
            showOn: "button",
            buttonImage: "calendar.png",
            buttonImageOnly: true,
            buttonText: "Ngày về",
            maxDate: maxDate
        });
        $(".txt-date-return").datepickerlunar("option", "minDate", $(".txt-date-departure").datepickerlunar("getDate"));
        $(".txt-date").change(function () {
            var dateType = $(this).attr('datetype');
            var d = $(this).datepickerlunar("getDate");
            $('.cbo-' + dateType + '-day').val(d.getDate());
            var month = d.getMonth() + 1;
            var str = (month < 10 ? "0" + month : month) + '-' + d.getFullYear();
            $('.cbo-' + dateType + '-month').val(str);
            if (dateType == 'departure') {
                $(".txt-date-return").datepickerlunar("option", "minDate", d);
                var ngaydi = (d.getDate() < 10 ? "0" + d.getDate() : d.getDate());
                var years = d.getFullYear();
                  //lay ngày rui cong them tháng
                    if(d.getDate() > 28){
                       month = month + 1; 
                       //nam tang len
                       if(month==13){
                          month = 1;  
                          years = d.getFullYear() + 1;
                       }
                    }
                    var str_in = (month < 10 ? "0" + month : month) + '-' + years;
                $("#cboReturnMonth").val(str_in);
                $("#flights-checkin").val(ngaydi+'-'+str);//25-07-2014
                //them so 0 vào ngày nho hon 9
                d.setDate(d.getDate()); 
                $("#cboReturnDay").val(d.getDate());
                var ngayve = (d.getDate() < 10 ? "0" + d.getDate() : d.getDate());
                $("#flights-checkout").val(ngayve+'-'+str_in);//25-07-2014
            }
            else {
                $(".txt-date-departure").datepickerlunar("option", "maxDate", d);
                var ngayve = (d.getDate() < 10 ? "0" + d.getDate() : d.getDate());
                var years = d.getFullYear();
                  //lay ngày rui tru cho tháng
                    if(d.getDate() < 4){
                       month = month - 1; 
                       //nam tang len
                       if(month==0){
                          month = 12;  
                          years = d.getFullYear() - 1;
                       }
                    }
                    var str_in = (month < 10 ? "0" + month : month) + '-' + years;
                //$("#cboDepartureMonth").val(str_in);
                $("#flights-checkout").val(ngayve+'-'+str);//25-07-2014
                //them so 0 vào ngày nho hon 9
                d.setDate(d.getDate()); 
                //$("#cboDepartureDay").val(d.getDate());
                var ngayve = (d.getDate() < 10 ? "0" + d.getDate() : d.getDate());
               // $("#flights-checkin").val(ngayve+'-'+str_in);//25-07-2014
            }
        });
        $('.cbo-datetype').change(function () {
            var dateType = $(this).attr('datetype');
            var date_select = $('.cbo-' + dateType + '-day').val();
            var month_select = $('.cbo-' + dateType + '-month').val();
            if(dateType=='departure'){
                 //gan giá tri vao return
                 $('#cboReturnDay').val(parseInt(date_select) + 3);
                 $("#flights-checkin").val($('.cbo-' + dateType + '-day').val() + '-' + $('.cbo-' + dateType + '-month').val());//25-07-2014
                 //tháng hien tai
                 var month_select_out = $('#cboDepartureMonth').val();
                 var month_first = parseInt(month_select_out.substr(0,2));//10-2014
               //  alert(month_select_out);
             //    alert(month_first);
                 var year_first = month_select_out.substr(3,6);//lay nam
                 //end
                 if(date_select > 28){
                       month_first = parseInt(month_first) + 1; 
                       //nam tang len
                       if(month_first==13){
                          month_first = 1;  
                          year_first = parseInt(year_first) + 1;
                       }
                 }
                 var str = (month_first < 10 ? "0" + month_first : month_first) + '-' + year_first;
                 $("#cboReturnMonth").val(str);
                 if((parseInt(date_select) + 3)>31){
                     var date_current = 1;
                 }else{
                     var date_current = parseInt(date_select) + 3;
                 }
                 var ngayve = (date_current < 10 ? "0" + date_current : date_current);
                 $("#flights-checkout").val(ngayve + '-' + str);//25-07-2014
            }else{
            
                 $("#flights-checkout").val($('.cbo-' + dateType + '-day').val() + '-' + $('.cbo-' + dateType + '-month').val());//25-07-2014
            }
            $('.txt-date-' + dateType).val($('.cbo-' + dateType + '-day').val() + '-' + $('.cbo-' + dateType + '-month').val());
        });
        
        $('.cbo-datetype-month').change(function () {
            
            var dateType = $(this).attr('datetype');
            var date_current = ($('.cbo-' + dateType + '-day').val() < 10 ? "0" + $('.cbo-' + dateType + '-day').val() : $('.cbo-' + dateType + '-day').val());
            if(dateType=='departure'){
                
                $("#flights-checkin").val(date_current + '-' + $('.cbo-' + dateType + '-month').val());//25-07-2014
            }else{
               $("#flights-checkout").val(date_current + '-' + $('.cbo-' + dateType + '-month').val());//25-07-2014 
            }  
            
               $('.txt-date-' + dateType).val($('.cbo-' + dateType + '-day').val() + '-' + $('.cbo-' + dateType + '-month').val());  
        });    
        
        

    });