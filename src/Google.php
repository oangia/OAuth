<?php

namespace oangia\OAuth;

use oangia\CUrl\CUrl;

class Google {
	public function getInfo( $access_token ) {
		$url = 'https://www.googleapis.com/plus/v1/people/me?access_token=' . $access_token;

		$curl = new CUrl;

		return  json_decode( $curl->connect( 'GET', $url ) );
	}
}