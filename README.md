# nyuque_blog
基于语雀的博客
***该项目可直接部署至vercel***

------------

部署前需要修改2个地方：
1. curl_func.php的第41行，把{your token}修改成语雀中你创建的token；
2. set.php的第4行，"{用户id}/{知识库id}" => "{显示的知识库名称}",按要求填写，
	如 
	"avga325/awgfaw2" => "测试库",
    "avga325/awgfaw3" => "测试库2",
    "avga325/awgfaw4" => "测试库3",