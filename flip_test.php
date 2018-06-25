<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>找相同游戏</title>
	<script language="javascript">
		var pai=[1,1,2,2,3,3,4,4,5,5,6,6,7,7,8,8];
		var flag=false;
		var oneid=-1;
    	function fanpai(id){
			if(pai[id]==-1){
					return;
				}
				document.getElementById("img"+id).src="img/image"+pai[id]+".jpg";
				if(flag){//翻第2张
					if(pai[id]==pai[oneid]){
						pai[id]=-1;
						pai[oneid]=-1;
					}
					else{
						setTimeout("koupai("+id+","+oneid+")",600);
					}
					oneid=-1;
					flag=false;
				}
				else{//翻第1张
					oneid=id;
					flag=true;
				}
				checkSuccess();
		}
		//每次载入页面进行重新洗牌
		function xipai(){
			var a,b,temp;
			for(i=0;i<16;i++){
				var a=Math.floor(Math.random()*16);
				var b=Math.floor(Math.random()*16);
				temp=pai[a];
				pai[a]=pai[b];
				pai[b]=temp;
			}
		}
		//第一次与第二次不相同，扣住两张牌
		function koupai(id,oneid){
			document.getElementById("img"+id).src="pic/image0.jpg";
			document.getElementById("img"+oneid).src="pic/image0.jpg";
		}
		//每次翻完两张相同的后，检验是否全部成功翻开
		function checkSuccess(){
			for(var i=0;i<16;i++){
				if(pai[i]!=-1)
					return;
				}
			alert("恭喜，OK了");
			location.reload();
		}
    </script>
</head>
<body>
	<center>
    <br /><br />
    <h1>找相同游戏</h1>
        <br />
    	<table>
        <tr>
        <td><img src="pic/image0.jpg" id="img0" onclick="fanpai(0)"/></td>
        <td><img src="pic/image0.jpg" id="img1" onclick="fanpai(1)"/></td>
        <td><img src="pic/image0.jpg" id="img2" onclick="fanpai(2)"/></td>
        <td><img src="pic/image0.jpg" id="img3" onclick="fanpai(3)"/></td>
        </tr>
        <tr>
        <td><img src="pic/image0.jpg" id="img4" onclick="fanpai(4)"/></td>
        <td><img src="pic/image0.jpg" id="img5" onclick="fanpai(5)"/></td>
        <td><img src="pic/image0.jpg" id="img6" onclick="fanpai(6)"/></td>
        <td><img src="pic/image0.jpg" id="img7" onclick="fanpai(7)"/></td>
        </tr>
        <tr>
        <td><img src="pic/image0.jpg" id="img8" onclick="fanpai(8)"/></td>
        <td><img src="pic/image0.jpg" id="img9" onclick="fanpai(9)"/></td>
        <td><img src="pic/image0.jpg" id="img10" onclick="fanpai(10)"/></td>
        <td><img src="pic/image0.jpg" id="img11" onclick="fanpai(11)"/></td>
        </tr>
        <tr>
        <td><img src="pic/image0.jpg" id="img12" onclick="fanpai(12)"/></td>
        <td><img src="pic/image0.jpg" id="img13" onclick="fanpai(13)"/></td>
        <td><img src="pic/image0.jpg" id="img14" onclick="fanpai(14)"/></td>
        <td><img src="pic/image0.jpg" id="img15" onclick="fanpai(15)"/></td>
        </tr>
        </table>
    </center>
</body>
<script language="javascript">
	xipai();
</script>
</html>