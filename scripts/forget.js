$(function(){
	//显示提示
	function showPrompt(text){
		var $prompt = $('.prompt');
		$prompt.text(text);
		$prompt.show();
	}
	//隐藏提示
	function hidePrompt(){
		var $prompt = $('.prompt');
		$prompt.hide();
	}
	//路由地址
	var route_path = {
		forget:'doAction.php?action=forget',	//忘记密码得知
        reset:"reset.php?action=email-ok"
	};
	
	var DEFAULT_AJAX = {
		type:'post',
		dataType:'JSON'
	}
	//设置ajax的返回data
	var ajax_data,
		sign = false;

	/*
	* fn: 验证邮箱地址，并且发送数据
	*
	*/	
	function comfirEmail(){
		var email = $('#email').val().trim(),
			reg =  /^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
		if(email == null|| email == ""){
			showPrompt('输入邮箱不能为空哦~~');
		}else if(!reg.test(email)){
			showPrompt('邮箱格式不正确哦~~');
		}else{
			sign = true;
		}
	}
	function sendEmail(){
		var email = $('#email').val().trim();
        $.ajax({
            type:'post',
            dataType:'JSON',
            url:route_path.forget,
            data:{
                'email':email
            },
            success:function(data){
                switch (data.success) {
                    case 1:
                        window.location.href=route_path.reset;
                        break;
                    case 2:
                        alert('邮件发送失败,请重新验证!');
                        break;
                    case 3:
                        alert('邮箱未注册，请重新填写邮箱!')
                        break;
                }
            }
        })





	}
	//当失去input框的焦点时，显示提示信息
	$('#email').on({
		focus:function(){
			hidePrompt();
		},
		blur:function(){	
			comfirEmail();
		}
	})
	
	$("[role='submit']").on('click',function(){
		if(sign){
			sendEmail();
		}
	})
});