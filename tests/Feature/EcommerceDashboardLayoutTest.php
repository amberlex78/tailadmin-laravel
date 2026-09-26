<?php

test('dashboard keeps the top row and splits the lower cards evenly on desktop', function () {
    $response = $this->get(route('dashboard'));

    $response->assertSeeInOrder([
        '<div class="col-span-12 xl:col-span-7">',
        '<div class="col-span-12 xl:col-span-5">',
        '<div class="col-span-12 xl:col-span-6">',
        '<div class="col-span-12 xl:col-span-6">',
    ], false);
});
