<?php
$config = array (	
		//应用ID,您的APPID。
		'app_id' => "2016092300575343",

		//商户私钥，您的原始格式RSA私钥
		'merchant_private_key' => "MIIEvgIBADANBgkqhkiG9w0BAQEFAASCBKgwggSkAgEAAoIBAQCpC08f2Gx4FXuauu0jBgldnFzcjxQnZMdP3IaDaUNNRl1HHNnN7NGoS3A6b9n2X5ZoUcnzlrrhNKdcQ08tjdJpjigdBQcxagMlrORp4VasUNUp0/PNDykrnUUjp7oO9rlJ6TjBSo88JHtFtYcV6ssEScfJRChianWWyE6veEJlEeAmqEH+qbBv6eKjX5o0ulG3xxcHPM6cNrpKnmgzZhS6G4QBr5x4iQajuO3ixjxJUbqQJrrn0XeYFTnKbs9BhXrd7ZInVLnFw8ikpGD1VDEnMecMby2BaHpGFLYeUfDg/HzctcZmznHAm4ixTU1O9eDzibF27T5la3OwUkziXYcnAgMBAAECggEAMtOUqdWP35dN/9r+XA5/mGbgQOzAOYwCpY9/3lkzBDQI7c3N6y2uaDSufNOOrJZXCey1lQkYDYigXYxbbS38OwKkKv2NCR1/7r8KOo+nWM5BGX+CCYDqdxOlazAOMFucoI2AJBX/9Sxe6DnJcRyUiCiK6ogUwGqUCo8VoYq+I9b7/q3isMPOR4lwqQNwBMsHM3t1vrykDm0xl6K4lSR1cIkDuDnkmrU+3m8QuCClsDwAaiiet+hka/KNXKMZ4e8yslByHNEoS1zxWj9rnztodcRNszeVEIVUcLdVUrsqniInzPpC/Fb2KS3Gg6YPn1x4dxwMOIBft3nAFUYIaOXccQKBgQDQSWIQ+TrH8G+b3oI7PqV4k6e+S2OO1EsGNDfd3lMV9ASNkJCWVY9LK5hagoy3NPL/RIqpntjev7DBGH0BUOsLZErVRtOO0ylldvy3H+X18H6O0iwQz8JSWNKXTPBHCNpej5eXE0svvwEdxgENbWHC2vScvw+uiCSKVqCkpUjZbwKBgQDPxJ4dMANqNwOVFvHObSl98j0veEYvxj3WFrv4cClErosAJLxG3bgXUv9/PIGFlnjjaVIvjHYNi24vaCi57qqdZNWRiJLfuCnliKoK5g86QAFxuS/KNXGoRT2Soy1KKDQgKEXZSbEV9nuySiRp51HWJ2LZ2+jV+2yrwbq6vVShyQKBgQC3h2HM2P7tfDOr4WVZdLrzQw/0gpNIIFG3Nr3fVu5ZEroMT0zH2r43m0NUxWHecN6JBUk1as1ngPrrOnuzdCyXzhiOUylI2VHJoQ3PAmFr0yyBBjpj2d09GBz/yoCR5wAbgGUvboW6nZALPxRgU3hn7OzLTSMxQ68G4owMZ8OIKwKBgQC8LDt3+/Bb1o+sDCfc6glWRHsd7zTCOC3xJI4CKLN3vQ2vh5XuKQl+NnGo70fvkaTTcqQ45GJXShz1WsToAT0NaDH1qVg8vzNS7D/1tv+7phSoxyx9W4IhAPUPRjLSoy7yoQcCETgNyDun8nagZB0+dFWXMxDiHOEDfmZ8ktV/4QKBgGc/aUZK18JhNst7GMaGNyXzzCTsBD8b/AgP1YzkXtXcKtnbhSWtl4uja6+bfsJGSAWyttBAm/bwUSsODfOe/o2Sv48XRlbM1PiLyaPClXztfuQ3xbaK2vdGt8tMUZhH1jyF0RDQN1Xnw4nLesic0SQu+plbaL7P5eaOD499aG6U",
		
		//异步通知地址
		'notify_url' => "http://47.106.158.215/result",
		
		//同步跳转
		'return_url' => "http://47.106.158.215/index",

		//编码格式
		'charset' => "UTF-8",

		//签名方式
		'sign_type'=>"RSA2",

		//支付宝网关
		'gatewayUrl' => "https://openapi.alipaydev.com/gateway.do",

		//支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
		'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEA9UIBgmlli8umzLX3XFZJyw6pVLAWWMI7Nx43FlDLbmNDSu3zAgfLmjyrH+49RVnEfYEY36Uep7/nB3ds6SMZm71hmdDkWSQLW37wcZM0ywkLUcwrozNM+EhGJaLIT/UAVe4viGhnbSlPNR21KJNFEeZfdc+f1v0u50+TJgATih+bnVi+SudER4qb+Uust4INPzgB1j8JD6cTbsosV4bVMThmIl12fGJJjPAbV21i8GiXoQdFN69Vg13KDuIxWBzrVB/G4Q8JJ+tUxJcg79Lz9BL5HVpZ5c8pSNNz8XC5JD6xzdaiWbXUZ696q6DH40vWvCSOrPIgJoz1VnVazqSJaQIDAQAB",
		
	
);
return $config;
