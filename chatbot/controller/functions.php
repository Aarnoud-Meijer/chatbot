<?php

if(strtolower($userMessage) == 'ok2'){

// $data = new \LINE\LINEBot\MessageBuilder\FlexMessageBuilder("Allernatief", $res);
  
  	$data = FlexSampleRestaurant::get();

    file_put_contents('php://stderr', 'reply data: ' . print_r($data, true));


	$result = $bot->replyMessage($event['replyToken'], $data);

	//return $response->withJson($result->getJSONDecodedBody(), $result->getHTTPStatus());

	return $result->getHTTPStatus() . ' ' . $result->getRawBody();

}


if(strtolower($userMessage) == 'wie'){
	$message = $thesender;
    $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
	$result = $bot->replyMessage($event['replyToken'], $textMessageBuilder);
	return $result->getHTTPStatus() . ' ' . $result->getRawBody();

}


if(strtolower($userMessage) == 'sticker'){

    $mysticker = new \LINE\LINEBot\MessageBuilder\StickerMessageBuilder("11538", "51626501");
	$result = $bot->replyMessage($event['replyToken'], $mysticker);
	return $result->getHTTPStatus() . ' ' . $result->getRawBody();

}

if(strtolower($userMessage) == 'emo'){

    $message = "Hallo "  . json_decode('"\ud83d\ude00"');

    $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
	$result = $bot->replyMessage($event['replyToken'], $textMessageBuilder);
	return $result->getHTTPStatus() . ' ' . $result->getRawBody();

}

