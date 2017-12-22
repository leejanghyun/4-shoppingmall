$(document).ready(function(){
    var selectstring;
    var count;
    
    $("#kind").change(function() {  
    var Colorsize= $("#kind option:selected").text();
    selectstring= Colorsize;
    $('#quantity').val(0);
    count=selectstring.split('--');
    console.log(count);
    });
    
    $('#up').click(function() {
    var maxcount=parseInt(count[1]);
        //var text=$('#kind option').filter(':selected').text();
        var num=$("#quantity").val();
        if(num < maxcount){
        num=parseInt(num);
        num+=1;
        var quantity=$("#count").val();
        $("#quantity").val(''+num);
        }
        else{
            var quantity=$("#count").val();
            $("#quantity").val(''+num);
        }  
    });
    
    
    
     $('#down').click(function() {
        var num=$("#quantity").val();
        num=parseInt(num);
        if(num > 0){
        num-=1;
        var quantity=$("#count").val();
        $("#quantity").val(''+num);
        }
        else{
            var quantity=$("#count").val();
        $("#quantity").val(''+num);

        }
    });   
    
    
    
    
    
    
});


                  