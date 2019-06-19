<?php


// initiate app
$configs =  [
	'settings' => ['displayErrorDetails' => true],
];
$app = new Slim\App($configs);

/* ROUTES */
$app->get('/', function ($request, $response) {
	return $response->withStatus(200, 'Okido');
});

$app->post('/', function ($request, $response)
{
	// get request body and line signature header
	$body 	   = file_get_contents('php://input');
$signature = $_SERVER['HTTP_X_LINE_SIGNATURE'];

	// log body and signature
	file_put_contents('php://stderr', 'Body: '.$body);

	// is LINE_SIGNATURE exists in request header?
	if (empty($signature)){
		return $response->withStatus(400, 'Signature not set');
	}

	// is this request comes from LINE?
	if($_ENV['PASS_SIGNATURE'] == false && ! SignatureValidator::validateSignature($body, $_ENV['CHANNEL_SECRET'], $signature)){
		return $response->withStatus(400, 'Invalid signature');
	}

	// init bot
	$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($_ENV['CHANNEL_ACCESS_TOKEN']);
	$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $_ENV['CHANNEL_SECRET']]);
	$data = json_decode($body, true);
	foreach ($data['events'] as $event)
	{
		$userMessage = $event['message']['text'];

		$thesender = $event['source']['userId'];

      file_put_contents('php://stderr', " ----- ");


	   if(strtolower($userMessage) == 'ok2')
		{
			/*
			$res = file_get_contents("demo.json");
			$res = utf8_encode($res);
        	$res = json_decode($res);
*/

		// $data = new \LINE\LINEBot\MessageBuilder\FlexMessageBuilder("Allernatief", $res);
		  
		  	$data = FlexSampleRestaurant::get();

          file_put_contents('php://stderr', 'reply data: ' . print_r($data, true));


			$result = $bot->replyMessage($event['replyToken'], $data);

			//return $response->withJson($result->getJSONDecodedBody(), $result->getHTTPStatus());

			return $result->getHTTPStatus() . ' ' . $result->getRawBody();
		
		}


	   if(strtolower($userMessage) == 'wie')
		{
			$message = $thesender;
            $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
			$result = $bot->replyMessage($event['replyToken'], $textMessageBuilder);
			return $result->getHTTPStatus() . ' ' . $result->getRawBody();
		
		}




     if(strtolower($userMessage) == 'sticker')
		{
	
            $mysticker = new \LINE\LINEBot\MessageBuilder\StickerMessageBuilder("11538", "51626501");
			$result = $bot->replyMessage($event['replyToken'], $mysticker);
			return $result->getHTTPStatus() . ' ' . $result->getRawBody();
		
		}

	   if(strtolower($userMessage) == 'emo')
		{

	    
		$message = "Hallo "  . json_decode('"\ud83d\ude00"');

			//$message = "Hallo " . $unicodeChar;

            $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
			$result = $bot->replyMessage($event['replyToken'], $textMessageBuilder);
			return $result->getHTTPStatus() . ' ' . $result->getRawBody();
		
		}






	}
	

});

// $app->get('/push/{to}/{message}', function ($request, $response, $args)
// {
// 	$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($_ENV['CHANNEL_ACCESS_TOKEN']);
// 	$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $_ENV['CHANNEL_SECRET']]);

// 	$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($args['message']);
// 	$result = $bot->pushMessage($args['to'], $textMessageBuilder);

// 	return $result->getHTTPStatus() . ' ' . $result->getRawBody();
// });

/* JUST RUN IT */
$app->run();
echo "test";