<?php

test('profile layout removes address and optional profile fields', function () {
    $response = $this->get('/profile');

    $response->assertSuccessful();
    $response->assertSee('Security');
    $response->assertSee('Danger Zone');
    $response->assertDontSee('Address');
    $response->assertDontSee('Bio');
    $response->assertDontSee('Social Links');
});
