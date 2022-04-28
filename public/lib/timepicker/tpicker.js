/*! version : 1.0.2
 =========================================================
 tpicker.js
 https://github.com/sonukedia55
 Created by Sonu Kedia - 2019
 =========================================================
 */


 

 var fhr = 12;
 var fmi = 0;
 var ampm = 0;
 var showpicker = 0;
 var elid = 'none';
 var picker_type=0;
 
 function showpickers(a,b){
     if(showpicker){
         $('.tpicker').hide();
         showpicker=0;
     }else{
         elid = a;
         picker_type = b;
         var x = $("#"+elid).offset();
         $('.tpicker').show();
         var kk = $("#"+elid).outerHeight();
         $('.tpicker').offset({ top: x.top+kk, left: x.left});
         showpicker=1;
     }
 }
 function showpickers2(a,b){
     if(showpicker2){
         $('.tpicker').hide();
         showpicker2=0;
     }else{
         elid = a;
         picker_type = b;
         var x = $("#"+elid).offset();
         $('.tpicker').show();
         var kk = $("#"+elid).outerHeight();
         $('.tpicker').offset({ top: x.top+kk, left: x.left});
         showpicker2=1;
     }
 }
 
 function showdate(){
     $('.pk1').show();
     $('.pk2').hide();
 }
 function showtime(){
     $('.pk1').hide();
     $('.pk2').show();
 }
 function updatetime(){
     var gg="AM";
     if(ampm)gg = "PM";
     if(picker_type==24){
         var thr = fhr;var tmin = fmi;
         if(ampm){
             if(fhr<12)thr = fhr+12;
         }else{
             if(fhr==12)thr = 0;
         }
         $('#'+elid).val(("0" + thr).slice(-2)+":"+("0" + tmin).slice(-2));
     }else{
         $('#'+elid).val(("0" + fhr).slice(-2)+":"+("0" + fmi).slice(-2)+" "+gg);
     }
     $('.hrhere').html(("0" + fhr).slice(-2));
     $('.minhere').html(("0" + fmi).slice(-2));
     $('.medchange').html(gg);
 }
 
 $(function(){
 
     var pickerhtml = '<div class="tpicker"><div class="pk1"><div class="row"><div class="hr"><i class="fa fa-angle-up hrup"></i><a class="hrhere">12</a><i class="fa fa-angle-down hrdown"></i></div><div class="dot2">:</div><div class="hr">	<i class="fa fa-angle-up minup"></i><a class="minhere">00</a><i class="fa fa-angle-down mindown"></i></div><div class="dot"><button type="button" class="btn btn-primary medchange">AM</button></div></div></div><div class="pk2 mintt"><table class="table table-bordered mintable"><tr><td>00</td><td>05</td><td>10</td><td>15</td></tr><tr><td>20</td><td>25</td><td>30</td><td>35</td></tr><tr><td>40</td><td>45</td><td>50</td><td>55</td></tr></table></div><div class="pk2 hrtt"><table class="table table-bordered hrtable"><tr><td>01</td><td>02</td><td>03</td><td>04</td></tr><tr><td>05</td><td>06</td><td>07</td><td>08</td></tr><tr><td>09</td><td>10</td><td>11</td><td>12</td></tr></table></div></div>';
 
     $('.timepicker').html(pickerhtml);
 
     $('.hrup').click(function(){
         if(fhr<12){fhr++;updatetime();}else{fhr=1;updatetime();}
     });
     $('.hrdown').click(function(){
         if(fhr>1){fhr--;updatetime();}else{fhr=12;updatetime();}
     });
     $('.minup').click(function(){
         if(fmi<59){fmi++;updatetime();}else{fmi=0;updatetime();}
     });
     $('.mindown').click(function(){
         if(fmi>0){fmi--;updatetime();}else{fmi=59;updatetime();}
     });
     $('.medchange').click(function(){
         if(ampm){ampm=0;updatetime();}else{ampm=1;updatetime();}
     });
     $('.hrhere').click(function(){
         $('.hrtt').show();
         $('.pk1').hide();
         $('.mintt').hide();
     });
     $('.minhere').click(function(){
         $('.hrtt').hide();
         $('.pk1').hide();
         $('.mintt').show();
     });
     $('.hrtable td').click(function(){
         var vaa = $(this).html();
         $('.hrtt').hide();
         $('.pk1').show();
         $('.mintt').hide();
         fhr = parseInt(vaa);updatetime();
     });
     $('.mintable td').click(function(){
         var vaa = $(this).html();
         $('.hrtt').hide();
         $('.pk1').show();
         $('.mintt').hide();
         fmi = parseInt(vaa);updatetime();
     });
 });


//  =====================================
 
 var fhr2 = 12;
 var fmi2 = 0;
 var ampm2 = 0;
 var showpicker2 = 0;
 var elid2 = 'none';
 var picker_type2=0;
 
 function showpickers2(a,b){
     if(showpicker2){
         $('.tpicker2').hide();
         showpicker2=0;
     }else{
         elid2 = a;
         picker_type2 = b;
         var x = $("#"+elid2).offset();
         $('.tpicker2').show();
         var kk = $("#"+elid2).outerHeight();
         $('.tpicker2').offset({ top: x.top+kk, left: x.left});
         showpicker2=1;
     }
 }


 function showdate2(){
     $('.pk1').show();
     $('.pk2').hide();
 }
 function showtime2(){
     $('.pk1').hide();
     $('.pk2').show();
 }
 function updatetime2(){
     var gg="AM";
     if(ampm2)gg = "PM";
     if(picker_type2==24){
         var thr = fhr2;var tmin = fmi2;
         if(ampm2){
             if(fhr2<12)thr = fhr2+12;
         }else{
             if(fhr2==12)thr = 0;
         }
         $('#'+elid2).val(("0" + thr).slice(-2)+":"+("0" + tmin).slice(-2));
     }else{
         $('#'+elid2).val(("0" + fhr2).slice(-2)+":"+("0" + fmi2).slice(-2)+" "+gg);
     }
     $('.hrhere').html(("0" + fhr2).slice(-2));
     $('.minhere').html(("0" + fmi2).slice(-2));
     $('.medchange').html(gg);
 }
 
 $(function(){
 
     var pickerhtml = '<div class="tpicker2" style="display:none"><div class="pk1"><div class="row"><div class="hr"><i class="fa fa-angle-up hrup"></i><a class="hrhere">12</a><i class="fa fa-angle-down hrdown"></i></div><div class="dot2">:</div><div class="hr">	<i class="fa fa-angle-up minup"></i><a class="minhere">00</a><i class="fa fa-angle-down mindown"></i></div><div class="dot"><button type="button" class="btn btn-primary medchange">AM</button></div></div></div><div class="pk2 mintt"><table class="table table-bordered mintable"><tr><td>00</td><td>05</td><td>10</td><td>15</td></tr><tr><td>20</td><td>25</td><td>30</td><td>35</td></tr><tr><td>40</td><td>45</td><td>50</td><td>55</td></tr></table></div><div class="pk2 hrtt"><table class="table table-bordered hrtable"><tr><td>01</td><td>02</td><td>03</td><td>04</td></tr><tr><td>05</td><td>06</td><td>07</td><td>08</td></tr><tr><td>09</td><td>10</td><td>11</td><td>12</td></tr></table></div></div>';
 
     $('.timepicker2').html(pickerhtml);
 
     $('.hrup').click(function(){
         if(fhr2<12){fhr2++;updatetime2();}else{fhr2=1;updatetime2();}
     });
     $('.hrdown').click(function(){
         if(fhr2>1){fhr2--;updatetime2();}else{fhr2=12;updatetime2();}
     });
     $('.minup').click(function(){
         if(fmi2<59){fmi2++;updatetime2();}else{fmi2=0;updatetime2();}
     });
     $('.mindown').click(function(){
         if(fmi2>0){fmi2--;updatetime2();}else{fmi2=59;updatetime2();}
     });
     $('.medchange').click(function(){
         if(ampm2){ampm2=0;updatetime2();}else{ampm2=1;updatetime2();}
     });
     $('.hrhere').click(function(){
         $('.hrtt').show();
         $('.pk1').hide();
         $('.mintt').hide();
     });
     $('.minhere').click(function(){
         $('.hrtt').hide();
         $('.pk1').hide();
         $('.mintt').show();
     });
     $('.hrtable td').click(function(){
         var vaa = $(this).html();
         $('.hrtt').hide();
         $('.pk1').show();
         $('.mintt').hide();
         fhr2 = parseInt(vaa);updatetime2();
     });
     $('.mintable td').click(function(){
         var vaa = $(this).html();
         $('.hrtt').hide();
         $('.pk1').show();
         $('.mintt').hide();
         fmi2 = parseInt(vaa);updatetime2();
     });
 });