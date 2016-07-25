<?php

namespace oangia\OAuth;

use oangia\Curl\Curl;

class Facebook {
	public function getGraph( $fields, $access_token ) {
		$url = 'https://graph.facebook.com/me?fields=' . $fields . '&access_token' . $access_token;

		return  json_decode( Curl::curl_get_file_contents( $url ) );
	}
}