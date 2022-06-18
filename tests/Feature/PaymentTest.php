<?php

// use function Pest\Laravel\{get, getJson};
 
// get('/')->assertStatus(200);
 
// getJson('api/posts')->assertStatus(200);



it('has payment api', function () {
    $response = $this->post('/api/pay', [
        'reference' => 'Testing reference',
        'msisdn' => 123456789,
        'amount' => 10000
    ]);

    $response->assertStatus(200);
})->only();
