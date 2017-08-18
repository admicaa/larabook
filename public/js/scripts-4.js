//  ahmed ali thabet

function update(){
    var a =getReturn('/lastuploaded.php?q=tyreid');
    var b = getReturn('/lastuploaded.php?ql='+a[0].num+'&table=tyres');
    if (b.length!=0){
        b = JSON.stringify(b);
        var c = getReturn('http://basos.epizy.com/public/tyre.php?online='+b);
        console.log(c);
    }

    
    
}
function getReturn(url){
        
            var me = $.ajax({
                url:url,
                type:"GET",
                async: false,
                dataType: 'jsonp', // Notice! JSONP <-- P (lowercase)
                success:function(json){
                    // do stuff with json (in this case an array)
                    return json;
                }
            });
            return me.responseJSON;
}
function getinvent(q){
    document.getElementById("inventg").innerHTML='<div class="col-xs-12 inventq">ahmed ali </div><div class="col-xs-12 inventq">ahmed ali </div>';
}
function enablebtn(id,value="  "){
    if(value===''){
        $(id).prop('disabled',true);
        return false;
    }
    else{
        $(id).prop('disabled',false);
        return true;
    }
}
function addnew(urlpage,id,btn){
        $(btn).prop('disabled',true);
        $.ajax({
           type: "POST",
           url: urlpage,
           data: $(id).serialize(), // serializes the form's elements.
           success: function(data)
           {
               $(btn).prop('disabled',false);
                $('input').filter('[required]').val("")
                $("#successModal").modal({
                    show:true
                }); 
                // show response from the php script.
           },
           error:function(error){
               $(btn).prop('disabled',false);
               console.log(error)
            $("#errorModal").html(error.responseText);
            $("#failModal").modal({
                show:true
            });
            
           }
         });
}
function showThing(str,page,id,hiddenInputId="",shownInputId="",changefunc="") {
    if (str.length == 0) { 
        document.getElementById(id).innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var vale2 = "";
                document.getElementById(id).innerHTML = this.responseText;
                if( hiddenInputId != "" ){
                        $('.inventq').click(function(){
                            var valuee =$(this).find('.hidden').text();
                            $('#'+hiddenInputId).val(valuee);
                            if(shownInputId!=""){
                                vale2= $(this).find('.namee').text();
                                $("#"+shownInputId).val(vale2);
                                $("#"+id).html("");
                            }
                        });
                }
                if(changefunc!=""){
                    $('.inventq').click(function(){
                        var valee = $(this).find('.hidden').text();
                        changefunc(valee);
                    });
                }
            }
        };
        xmlhttp.open("GET", page+"?q=" + str, true);
        xmlhttp.send();
    }

}
function tmdaf3(value){
    $('#tmdf3').val(($('#total').val()-value));
}
function bakey(value){
    $('#baky').val(($('#total').val()-value));
}
function changetotal(value){
    $('#oneprice').val((value/($('#number').val())).toFixed(2));
}
function changeoneprice(value){
    $('#total').val((value*($('#number').val())).toFixed(0));
}
function numberchange(value){
    $('#oneprice').val(($('#total').val()/value).toFixed(2));
}
function fifo(valee,next=1,total=0){
    if (valee<=0){
        for(var i=next ; i<=$('#pricelisttable tbody tr').length;i++ ){
        $('#pricelisttable tbody :nth-child('+i+') :nth-child(1)').text("");
        }
    
        $('#totalcost').text(total);
        return 
    }
    else{
        var instore = $('#pricelisttable tbody :nth-child('+next+') :nth-child(3)').text();
        var instoreoneprice  = $('#pricelisttable tbody :nth-child('+next+') :nth-child(2)').text();
        if (valee >= parseInt(instore)){
            var newvalee = valee-instore;
            var newtotal = total + instore*instoreoneprice;
            $('#pricelisttable tbody :nth-child('+next+') :nth-child(1)').text(instore*instoreoneprice);
            return fifo(newvalee,next+1,newtotal);
        }
        else{
            $('#pricelisttable tbody :nth-child('+next+') :nth-child(1)').text(valee*instoreoneprice);
            var newtotal = total + valee*instoreoneprice;
            return fifo(0,next+1,newtotal);
        }
    }
}
function firstcustomer(valuee){
    if (valuee==1){
        $('#baky').val(0);
        $('#baky').hide();
        $('#baky').attr('readonly','true');
        $('#tmdf3').val($('#total').val());
        $('#sheeknum').val(0);
        $('#sheeknum').attr('readonly','true');
        setsheekat();
    }
    else{
        showThing(valuee,'/getsheekhistory.php','sheek');
        $('#baky').removeAttr('readonly');
        $('#tmdf3').removeAttr('readonly');
        $('#sheeknum').removeAttr('readonly');
        $('#sheeknum').val(1);
        
    }
    
}
function setsheekat(){
    var baky = parseInt($('#baky').val());
    console.log(baky);
    if (baky<=0||(isNaN(baky))){
        $('#sheekat').html(" ");
        return false;
    }
    var num = parseInt($('#sheeknum').val());
    var firstdate = new Date();
    var lastdate = new Date();
    firstdate  =new  Date(firstdate.setMonth(firstdate.getMonth()+1));
    lastdate = new Date(firstdate);
    lastdate =new Date(lastdate.setMonth(lastdate.getMonth()+num-1));
    var totalmoney = $('#baky').val();
    var moneyforsheek = Math.round((totalmoney/num)/100)*100;
    var moneyforlast = totalmoney-(moneyforsheek*(num-1));
    if (num<=0){
        $('#sheekat').html(" ");
        return false;
    }
    var classfirst = '<div class="col-md-4 pull-right col-sm-6 col-xs-8 col-xs-offset-2 col-md-offset-0 fieldset col-sm-offset-0"><fieldset><legend> شيك رقم : ';
    var classlast = '</legend></fieldset></div>';
    if ($('#firstdate').val()!=""){
        firstdate =  new  Date($('#firstdate').val());
        lastdate = new Date(firstdate);
        lastdate =new Date(lastdate.setMonth(lastdate.getMonth()+num-1));
        
    
    }
    if ($('#lastdate').val()!=""){
        lastdate = new Date($('#lastdate').val());
    }
    
    var days = timediff(firstdate,lastdate);
    var moamel =days/(num-1);
    $('#sheekat').html(" ");
    if (moamel<1){
        return false;
    }
    newnum = num;
    if (num==1){
        $('#sheekat').append(classfirst+inputsheek(totalmoney,1,getdate(firstdate))+classlast);
    }
    else{
        $('#sheekat').append(classfirst+inputsheek(moneyforsheek,1,getdate(firstdate))+classlast);
    
    }
    
    for (var i=1 ; i<=num-2;i++){
        newnum--;
        var thisDate = new Date(firstdate);
        thisDate = new Date(thisDate.setDate(thisDate.getDate()+i*moamel));
        if (newnum ==1){
            $('#sheekat').append(classfirst+inputsheek(moneyforlast,i+1,getdate(thisDate))+classlast);
        }
        else{
            $('#sheekat').append(classfirst+inputsheek(moneyforsheek,i+1,getdate(thisDate))+classlast);
        }
        
        
    }
    if (newnum>1){
        $('#sheekat').append(classfirst+inputsheek(moneyforlast,i+1,getdate(lastdate))+classlast);
               
    }
    $('input.datepicker').datepicker({
    nextText:"&#9654",
    prevText:"&#9664",
    showOtherMonths:true,
    dayNamesMin:  ['احد', 'اثنين', 'ثﻻثاء', 'ابعاء', 'خميس', 'جمعة', 'سبت'],
    dateFormat:"yy-mm-dd",
    firstDay:6,
 });
    

}
function getdate(date=""){
    var today = new Date(date);
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!

    var yyyy = today.getFullYear();
    if(dd<10){
        dd='0'+dd;
    } 
    if(mm<10){
        mm='0'+mm;
    } 
    var today = yyyy+'-'+mm+'-'+dd;
    return today;
}
function timediff(firstdate,seconddate){
    firstdate = new Date(firstdate);
    seconddate = new Date(seconddate);
    var me = seconddate.getTime()-firstdate.getTime();
    var minutes = 1000 * 60;
    var hours = minutes * 60;
    var days = hours * 24;
    var me = Math.round(me / days);
    return me;
}
function inputsheek(value,number,date){
    return number+"<input class='myinput form-control' id=money"+number+" name=money"+number+" form='addnew' value="+value+" >"+"<input class='datepicker myinput form-control' form='addnew' id=date"+number+" name=date"+number+" value="+date+" >";

}
function changeoneprice2(){
    var total = $('#total').val();
    var num = $('#number').val();
    total = parseInt(total);
    num = parseInt(num);
    if (num==0){return;}
    if (isNaN(total)){total=0;}
    $('#oneprice').val((total/num).toFixed(2));
}
function changebaky(){
    var paid = parseInt($('#tmdf3').val());
    var total = parseInt($('#total').val());
    if(isNaN(total)){total=0;}
    if (isNaN(paid)){
        paid=0;
        $('#tmdf3').val(total);
        return false;
    }
    $('#baky').val(total-paid);
}
function searchintable(valuee,table){
    var elements = $('#'+table+' tr');
    elements.each(function(){
        var me = $(this).children('td');
        var zee =0;
        me.each(function(){
            $(this).css('background','none');
            if ($(this).text().indexOf(valuee)!=-1){
                zee=1;
                if(valuee!=''){
                    $(this).css('background','rgba(12, 250, 10, 0.5)');
                }
            }
            else{
                $(this).css('background','none');
            }
        });
        if(me.length==0){
            zee=1;
        }
        if (zee==0){
            $(this).hide();
        }
        else{
            $(this).show();
        }
    });
}
function showhide(di){
    var me = $('#'+di)
    if (me.css('display')=='none'){
        me.fadeIn(250);
    }
    else{
        me.fadeOut(250);
    }
}