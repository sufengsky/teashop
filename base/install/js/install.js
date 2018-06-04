function CheckForm (src, step) {
	if (src.command.value == "goprev") return true;
	if (step == "1" && src.skip.value != "allow") {
		var letter = "abcdefghijklmnopqrstuvwxyz_0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ~!@#$%^&*[{]}/";
		if (src.username.value == "") {
			alert ('请输入会员登录帐号');
			src.username.focus ();
			return false;
		}
		if (src.password.value == "") {
			alert ('请输入登录密码');
			src.password.focus ();
			return false;
		}
		if(src.username.value.length > 20)
		  {
			alert ('请输入5-20位会员帐号');
			src.username.focus ();
			return false;
		  }
		  if(src.username.value.length < 5)
		  {
			alert ('请输入5-20位会员帐号');
			src.username.focus ();
			return false;
		  }
		 

		return true;

	}  else if (step == "3") {
		
		if (src.dbname.value == "") {
			alert ("请输入数据库名");
			src.dbname.focus ();
			return false;
		}
		if (src.dbuser.value == "") {
			alert ("请输入数据库用户名");
			src.dbuser.focus ();
			return false;
		}
		//if (src.dbpwd.value == "") {
			//alert ("请输入数据库密码");
			//src.dbpwd.focus ();
			//return false;
		//}
		if (src.tablepre.value == "" || src.tablepre.value.length<2 || src.tablepre.value.length>3) {
			alert ("请输入2-3位数据表前缀，如pw");
			src.tablepre.focus ();
			return false;
		}
	} else if (step == "5") {
		if (src.admin_user.value == "") {
			alert ("请输入系统管理员");
			src.admin_user.focus ();
			return false;
		}
		if (src.admin_pass.value == "") {
			alert ("请输入管理员密码");
			src.admin_pass.focus ();
			return false;
		}
		
		
	}
	return true;
}