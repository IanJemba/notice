<?php

use App\Models\User;

test('everyone can render a notices overview screen', function () {

    $this->assertGuest();


    $response = $this->get('/notices');
    $response->assertStatus(200);
});
