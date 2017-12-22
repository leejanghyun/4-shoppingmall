///드롭다운
(function($){
  $(function(){
    function pointIconLoop() {
      $('.util_top .left_section a span').animate ({'top': '20px' }, 200).animate({'top': '15px' }, 200).animate ({'top': '20px' }, 200).animate({'top': '15px' }, 200).animate({'top':'15px'}, 1000, function(){
        pointIconLoop();
      });
    }
    pointIconLoop();
    $('.cate_wrap .inner_area > ul > li ').on('mouseenter', function(){
      $(this).find('.dep2').css('display','block');
    });
    $('.cate_wrap .inner_area > ul > li ').on('mouseleave', function(){
      $(this).find('.dep2').css('display','none');
    });
    var cate_position = $('.cate_wrap').offset().top-28;
    $(window).scroll(function(){
      var position = $(window).scrollTop();
      //console.log(cate_position,position);
      if (position > cate_position){
        $('.header_wrap').addClass('fix');
      }else{
        $('.header_wrap').removeClass('fix');
      }
      if (position > 100){
        $('.header_wrap h1.fix_logo').stop().animate({'top':'16'},400);
      }else{
        $('.header_wrap h1.fix_logo').stop().animate({'top':'-43'},200);
      }
    });

  })
})(jQuery);
///배너 클릭
$('html').ready(function(){
    $('.prdList > li').each(function(){
            var ttl=$(this).find('.name').find('span:last').html();
            if(ttl.indexOf('<br')>-1){
                $(this).find('.color').css('top','-55px');
            }
        });
});

///배너 타임
(function($){
  $(function(){
    $('.main_roll_banner .banner_wrap').cycle({
      fx:      'scrollHorz',
      next:   '.main_roll_banner .next',
      prev:   '.main_roll_banner .prev',
      pause:      true,
      pauseOnPagerHover:true,
      timeout:  4000, //롤링시 멈춰있는시간
      speed:   300, //롤링 속도
      pager: '.main_roll_banner .pager',
      pagerEvent : 'mouseover',
    });

  })
})(jQuery)
