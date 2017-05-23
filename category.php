<?php
require_once "jssdk/jssdk.php";
$jssdk = new JSSDK("wxaee09625f0b7eba2", "e65fd81d62f4189121c2527a0b308c1b");
$signPackage = $jssdk->GetSignPackage();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1,minimum-scale=1, maximum-scale=1, user-scalable=no"/>
		<title></title>
	</head>
	<body>
		<button id="getImage">获得图片</button>
		<img src="" id="img" width="200" />
		
		<script src="http://res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>
		<script>
			//wx就是微信的js中定义的对象
			wx.config({
			    debug: true,
			    appId: '<?php echo $signPackage["appId"];?>',
			    timestamp: <?php echo $signPackage["timestamp"];?>,
			    nonceStr: '<?php echo $signPackage["nonceStr"];?>',
			    signature: '<?php echo $signPackage["signature"];?>',
			    jsApiList: [
			      // 所有要调用的 API 都要加到这个列表中
			      'chooseImage',
			      'previewImage',
			      'onMenuShareTimeline'
			    ]
			  });
			  
			//就可以调用微信的jssdk的api  
			wx.ready(function () {
				
				wx.onMenuShareTimeline({
				    title: 'nihao', // 分享标题
				    link: 'https://www.baidu.com', // 分享链接
				    imgUrl: 'https://ss0.bdstatic.com/5aV1bjqh_Q23odCf/static/superman/img/logo/bd_logo1_31bdc765.png', // 分享图标
				    success: function () { 
				        // 用户确认分享后执行的回调函数
				        alert(1)
				    },
				    cancel: function () { 
				        // 用户取消分享后执行的回调函数
				        alert(2)
				    }
				});
			    
			    //给按钮添加点击事件
			    document.getElementById('getImage').onclick = function(){
			    	wx.chooseImage({
					    count: 1, // 默认9
					    sizeType: ['original', 'compressed'], // 可以指定是原图还是压缩图，默认二者都有
					    sourceType: ['album', 'camera'], // 可以指定来源是相册还是相机，默认二者都有
					    success: function (res) {
					    	
					        var localIds = res.localIds; // 返回选定照片的本地ID列表，localId可以作为img标签的src属性显示图片
					    	document.getElementById('img').src = localIds[0];
					    }
					});
			    }
			    
			    
			    
			    
			    
		    	
			    	
			    		
			    
			    
			    
			    
			    
			  });
		</script>
		
	</body>
</html>




<!--
	ad5a24fd62b2f5afc4a0fbc11a02dcac
	wx412bbe740f1c9d0f
-->