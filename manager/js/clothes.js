$(function(){
	$('#orderSelect1').change(function() {
        
        temp=$("#orderSelect1 option:selected").val();//이름
        temp1=$("#orderSelect2 option:selected").val();//수량
      
        window.location.href = './clothes.php?name='+temp+'&num='+temp1;
    });
    
    $('#orderSelect2').change(function() {
        
        temp=$("#orderSelect1 option:selected").val();//이름
        temp1=$("#orderSelect2 option:selected").val();//수량
        
        window.location.href = './clothes.php?name='+temp+'&num='+temp1;
    });
    
    $( document ).ready(function() {
        var name= document.getElementById("name").innerHTML;
        var num= document.getElementById("num").innerHTML;
        
        $('#orderSelect1 option[value="'+name+'"]').attr('selected', 'selected');
        $('#orderSelect2 option[value='+num+']').attr('selected', 'selected');
    });

});






