<?php

namespace oangia\OAuth;

use oangia\CUrl\CUrl;

class Facebook {
	public function getGraph( $fields, $access_token ) {
		$url = 'https://graph.facebook.com/me?fields=' . $fields . '&access_token=' . $access_token;

		$curl = new CUrl();

		return  json_decode( $curl->connect( 'GET', $url ) );
	}
}