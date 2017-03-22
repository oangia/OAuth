<?php

namespace oangia\OAuth;

use oangia\CUrl\CUrl;
use oangia\OAuth\Exceptions\TokenInvalidException;

class Facebook {
    public function getGraph(
    	$access_token,
    	$fields = 'id,name,about,email,picture{url}'
	) {
        $url = 'https://graph.facebook.com/me?fields=' . $fields . '&access_token=' . $access_token;
        $curl = new CUrl();
        $graph = json_decode($curl->connect('GET', $url), true);

        if (isset($graph['error'])) {
            throw new TokenInvalidException('Access token invalid');
        }

        if (! isset($graph['email'])) {
        	$graph['email'] = null;
        }

        return $graph; 
    }
}