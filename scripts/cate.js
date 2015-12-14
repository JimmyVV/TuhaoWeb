define(function(require) {
	var key='';
	var $ul,eventListener = require('./modules/cateData').event;
	window.onload=function(){
		init();
		eventListener('doPerson/cate.php');
	}
	function init(){
		key = $('.result h2').attr("data-key");
	}
});


