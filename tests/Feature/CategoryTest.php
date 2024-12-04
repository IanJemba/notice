<?php

use App\Models\User;
use App\Models\Category;

test('everyone can render a categories overview screen', function () {

    $this->assertGuest();

    $response = $this->get('/categories');
    $response->assertStatus(200);
});

test('only admins can render a category creation screen', function () {
    $this->assertGuest();

    $response = $this->get('/categories/create');
    $response->assertStatus(403);

    $user = User::factory()->create();
    $response = $this->actingAs($user)->get('/categories/create');
    $response->assertStatus(403);

    $admin = User::factory()->create(['role' => 'admin']);
    $response = $this->actingAs($admin)->get('/categories/create');
    $response->assertStatus(200);
});

test('only admins can create a category', function () {
    $this->assertGuest();

    // Attempt to create as a guest
    $response = $this->post('/categories', [
        'title' => 'Test Category',
        'description' => 'Test Description'
    ]);
    $response->assertStatus(403);

    // Attempt to create as a user
    $user = User::factory()->create();
    $response = $this->actingAs($user)->post('/categories', [
        'title' => 'Test Category',
        'description' => 'Test Description'
    ]);
    $response->assertStatus(403);

    // Attempt to create as an admin
    $admin = User::factory()->create(['role' => 'admin']);
    $response = $this->actingAs($admin)->post('/categories', [
        'title' => 'Test Category',
        'description' => 'Test Description'
    ]);
    $response->assertRedirect('/categories');
    $this->assertDatabaseHas('categories', ['title' => 'Test Category']);
});

test('only admins can render a category edit screen', function () {
    $this->assertGuest();

    $category = Category::factory()->create();

    $response = $this->get('/categories/' . $category->id . '/edit');
    $response->assertStatus(403);

    $user = User::factory()->create();
    $response = $this->actingAs($user)->get('/categories/' . $category->id . '/edit');
    $response->assertStatus(403);

    $admin = User::factory()->create(['role' => 'admin']);
    $response = $this->actingAs($admin)->get('/categories/' . $category->id . '/edit');
    $response->assertStatus(200);
});

test('only admins can update a category', function () {
    $this->assertGuest();

    $category = Category::factory()->create();

    // Attempt to update as a guest
    $response = $this->patch('/categories/' . $category->id, [
        'title' => 'Updated Category',
        'description' => 'Updated Description'
    ]);
    $response->assertStatus(403);

    // Attempt to update as a user
    $user = User::factory()->create();
    $response = $this->actingAs($user)->patch('/categories/' . $category->id, [
        'title' => 'Updated Category',
        'description' => 'Updated Description'
    ]);
    $response->assertStatus(403);

    // Attempt to update as an admin
    $admin = User::factory()->create(['role' => 'admin']);
    $response = $this->actingAs($admin)->patch('/categories/' . $category->id, [
        'title' => 'Updated Category',
        'description' => 'Updated Description'
    ]);
    $response->assertRedirect('/categories');
    $this->assertDatabaseHas('categories', ['title' => 'Updated Category']);
});

test('only admins can delete a category', function () {
    $this->assertGuest();

    $category = Category::factory()->create();

    // Attempt to delete as a guest
    $response = $this->delete('/categories/' . $category->id);
    $response->assertStatus(403);

    // Attempt to delete as a user
    $user = User::factory()->create();
    $response = $this->actingAs($user)->delete('/categories/' . $category->id);
    $response->assertStatus(403);

    // Attempt to delete as an admin
    $admin = User::factory()->create(['role' => 'admin']);
    $response = $this->actingAs($admin)->delete('/categories/' . $category->id);
    $response->assertRedirect('/categories');
    $this->assertDatabaseMissing('categories', ['title' => $category->title]);
});
