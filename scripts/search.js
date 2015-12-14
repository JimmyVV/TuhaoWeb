define(function(require){
	var resTop=0,key='',mes={};
	var $ul,eventListener;
	window.onload=function(){
		init();
		eventListener('doPerson/search.php');
	}
	function init(){
		resTop = $('body .result').offset().top;
		//page init
		eventListener = require('./modules/cateData').event;
	}
	
});

