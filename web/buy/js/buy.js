var selectstring;
var count;

function changefunction(){
    var target = document.getElementById("kind");
    var colorsize=target.options[target.selectedIndex].text
    selectstring= colorsize;
    document.getElementById('quantity').value=0;
    count=selectstring.split('--');
}
  
function btn_up(){
    var maxcount=parseInt(count[1]);
    var num= document.getElementById("quantity").value;
    if(num < maxcount){
        num=parseInt(num);
        num+=1;
        document.getElementById('quantity').value=''+num;
    }
    else{
        document.getElementById('quantity').value=''+num;
    }  
}  

    
function btn_down(){

    var maxcount=parseInt(count[1]);
    var num=  document.getElementById("quantity").value;
    num=parseInt(num);
    
    if(num > 0){
    num-=1;
    document.getElementById('quantity').value=''+num;
    }
    else{
        document.getElementById('quantity').value=''+num;
    }
}    
    

    
  