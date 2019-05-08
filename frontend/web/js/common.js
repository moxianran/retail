$(function(){

	layui.use('element', function(){
  		var element = layui.element;
	});

	//关闭弹窗
	$('.popup-close').on('click',function(){
		$(this).parents('.filter-bg').fadeOut();
	});

	//回到顶部
	$('.back-top').on('click',function(){
		$('html,body').animate({scrollTop:0},300);
	});

	$('.nav-btn').on('click',function(){
		$('.hd-nav').addClass('nav-show');
	});

	$('.nav-close').on('click',function(){
		$('.hd-nav').removeClass('nav-show');
	});

	//游戏体验弹出
	$('.game-box-show').on('click',function(){
		$('.game-select').fadeIn();
	});

	//手机投注弹窗
	$('.betting-box-show').on('click',function(){
		$('.betting-box').fadeIn();
	});

	
	//移动端客服边栏
	$('.service-popup-show').on('click',function(){
		$('.filter-service').fadeIn();
		$('.service-bar').addClass('service-bar-show');
	});
	$('.service-bar-close,.filter-service').on('click',function(){
		$('.filter-service').fadeOut();
		$('.service-bar').removeClass('service-bar-show');
	});

	//手机登录弹窗
	$('.wap-login-btn').on('click',function () {
		$('.login-popup').fadeIn();
    })
	

	//$('.hd-space').height($('.top-fixed').outerHeight());
	function setTopSpace(){
		$('.hd-space').height($('.top-fixed').outerHeight());
	}
	setTopSpace();
	$(window).resize(function(){setTopSpace()});
	var oldScrollTop = 0;
	$(window).on('scroll',function(){
		var toph = $('#top').outerHeight();
		var space = $('#hd').outerHeight();
		var st = $(this).scrollTop();
		// if(st>=toph){
		// 	$('#hd').addClass('hd-fixed');
		// 	$('.hd-space').height(space);
		// }else{
		// 	$('#hd').removeClass('hd-fixed');
		// 	$('.hd-space').height(0);
		// }

		// if(st<oldScrollTop&&st>0){
		// 	$('.back-top').show();
		// }else{
		// 	$('.back-top').hide();
		// }
		// oldScrollTop = st;
		$('.back-top').show();
	});

	function doProhibit(){
	 	if(window.Event) 
	     	document.captureEvents(Event.MOUSEUP);
	   
	 	function nocontextmenu(){
	     	event.cancelBubble = true
	     	event.returnvalue = false;
	     	return false;
	 	}
	  
	 	function norightclick(e) {
	     	if (window.Event){
	        	if (e.which == 2 || e.which == 3)
	        	return false;
     		}else if (event.button == 2 || event.button == 3){
	   			event.cancelBubble = true
	   			event.returnvalue = false;
	   			return false;
	     	}
	 	}
	 	document.oncontextmenu = nocontextmenu;  // for IE5+ 
	 	document.onmousedown = norightclick;  // 
	}
	doProhibit();


	//顶部时间
    var weekArr = ['星期日','星期一','星期二','星期三','星期四','星期五','星期六'];
    var topTime = setInterval(function () {
        var myDate = new Date();
        var year = addZero(myDate.getFullYear());
        var mon = addZero(myDate.getMonth()+1);
        var day = addZero(myDate.getDate());
        var hour = addZero(myDate.getHours());
        var min = addZero(myDate.getMinutes());
        var sec = addZero(myDate.getSeconds());
        var week = myDate.getDay();
        var timeStr = weekArr[week]+'　'+year+'-'+mon+'-'+day+' '+hour+':'+min+':'+sec;
        $('.top-time').html(timeStr);
    },1000);
    
    function addZero(param) {
		if(param<10){
			return '0'+param
		}else{
			return param
		}
    }
	

});