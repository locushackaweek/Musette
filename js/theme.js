function changeDefault()
{
	document.getElementById("header").style.background = "#f3f5f6";
	document.getElementById("logo").src = "logo.png";
	document.cookie = "theme = #F1F1F1";
}
function changeMidnightBlack()
{
	document.getElementById("header").style.background = "#1d1f20";
	document.getElementById("logo").src = "logo-r.png";
	document.cookie = "theme = #1d1f20";
}
function changeRed()
{
	document.getElementById("header").style.background = "#c82e2d";
	document.getElementById("logo").src = "logo.png";
	document.cookie = "theme = #c82e2d";
}
function changeBlue()
{
	document.getElementById("header").style.background = "#0068aa";
	document.getElementById("logo").src = "logo.png";
	document.cookie = "theme = #0068aa";
}
function changeCyan()
{
	document.getElementById("header").style.background = "#1abc9c";
	document.getElementById("logo").src = "logo.png";
	document.cookie = "theme = #1abc9c";
}
function changeAuto()
{
	var color=prompt("Give valid color code or name:");
	document.getElementById("header").style.background = color;
	if(color=="black"||color=="#000000"||color=="#000")
	{
		document.getElementById("logo").src = "logo-r.png";
	}
	else
	{
		document.getElementById("logo").src = "logo.png";
	}
	document.cookie = "theme = color";
}