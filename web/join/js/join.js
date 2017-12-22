
$(function(){
	$('#ckid').blur(function(){

		$.ajax({
			url:"../join/server/idCheck.php",
			dataType:'json',
			type:'post',
			data:{'id':$('#ckid').val()},
			success:function(result){
				  $('#idck').html(result);

                if($('#idck').html()=='<span style="color:red;">사용불가능합니다.</span>'){

                       $(':submit').attr('disabled',true);
                  }
                  else{
                       $(':submit').attr('disabled',false);
                  }

			},error: function error(){
				alert('시스템 에러');
			}
		});
	});
});
