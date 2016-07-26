<?php

namespace oangia\OAuth;

use oangia\CUrl\CUrl;

class Google {
	// https://accounts.google.com/o/oauth2/auth?response_type=code&client_id=1043035954080-fgu7mekck12eetsfce9t625e5hm6md59.apps.googleusercontent.com&redirect_uri=http://localhost/google&scope=email

	public function getInfo( $access_token ) {
		$url = 'https://www.googleapis.com/plus/v1/people/me?access_token=' . $access_token;

		return  json_decode( Curl::curl_get_file_contents( $url ) );
	}
}