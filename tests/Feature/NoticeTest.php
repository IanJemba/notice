<?php

use App\Models\User;
use App\Models\Notice;
use App\Models\Category;
use App\Models\Marking;

function createNotice() {
    Marking::factory()->create(['name' => 'Test Marking', 'color' => '#000000']);

    return Notice::factory()->create([
        'title' => 'Test Notice',
        'description' => 'Test Content',
        'user_id' => User::factory()->create()->id,
        'category_id' => Category::factory()->create()->id
    ]);
}

test('everyone can render a notices overview screen', function () {

    $this->assertGuest();


    $response = $this->get('/notices');
    $response->assertStatus(200);
});

test('everyone can render a notice detail screen', function () {
    $this->assertGuest();

    $notice = createNotice();

    $response = $this->get('/notices/' . $notice->id);
    $response->assertStatus(200);
});

test('Only logged in users can render a notice creation screen', function () {
    $this->assertGuest();

    $response = $this->get('/notices/create');
    $response->assertStatus(302);

    $user = User::factory()->create();
    $response = $this->actingAs($user)->get('/notices/create');
    $response->assertStatus(200);
});

test('Only logged in users can create a notice', function () {
    $this->assertGuest();

    Marking::factory()->create(['name' => 'Test Marking', 'color' => '#000000']);

    // Attempt to create as a guest
    $response = $this->post('/notices', [
        'title' => 'Test Notice',
        'description' => 'Test Content',
        'category_id' => Category::factory()->create()->id
    ]);
    $response->assertStatus(302);

    // Create as a logged-in user
    $user = User::factory()->create();
    $response = $this->actingAs($user)->post('/notices', [
        'title' => 'Test Notice',
        'description' => 'Test Content',
        'category_id' => Category::factory()->create()->id
    ]);
    $response->assertStatus(302);
});
