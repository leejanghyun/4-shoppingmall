function btnClick(){
    
    condition=$("#orderSelect2 option:selected").val();
    
    if(condition=='total'){
        window.location.href = './upload.php';
    }
    else{
    
        value=$("#conditionValue").val();
        
        if(value.length<1){//값을 입력하세요
             alert('값을 선택해주세요');
        }
        else{

            if(value=='notype' || value=='Notype' || value=='NoType'){
                value='noType';
            }
            
            if(value=='Best' || value=='BEST'){
                value='best';
            }
            
            if(value=='New' || value=='NEW'){
                value='new';
            }
            
            switch(condition){
                case 'code':
                    window.location.href = './upload.php?condition='+condition+'&value='+value;
                    break;
                case 'object':
                    window.location.href = './upload.php?condition='+condition+'&value='+value;
                    break;
                case 'type':
                    window.location.href = './upload.php?condition='+condition+'&value='+value;
                    break;
                case 'select':
                        alert('조건을 선택해주세요');
                    break;
            }
        }
    }
}

$(function(){

     $('#selectimg').change(function() {    
        
         num=$("#selectimg option:selected").val();
         $('#fileimg').empty();
         
         for(var i=1;i<=num;i++){
            $('#fileimg').append("<input type='file' name='file"+i+"'>");
         }
     });
    
    $('#category1').change(function() {  
        var temp=$("#category1 option:selected").val();
        location.hash=temp;
     });
    
});






