<?php

use App\Models\User;
use GuzzleHttp\Promise\Create;

test('Can rendor a notice overview screen', function () {

    $this->assertGuest();

    $response = $this->get('/notices');
    $response->assertStatus(200);
});
