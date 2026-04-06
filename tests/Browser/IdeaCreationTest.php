<?php

use App\Models\User;
use function Pest\Laravel\assertDatabaseHas;

it("creates new idea", function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    visit(route('idea.index'))
        ->click('@create-idea-button')
        ->fill('@idea-title', 'Buy a car')
        ->fill('@idea-description', 'Bla Bla Bla')
        ->click('@idea-status-in_progress')
        ->click('Create')
        ->assertPathIs('/ideas')
        ->assertSee('Buy a car');

    assertDatabaseHas('ideas', [
        'title' => 'Buy a car',
        'description' => 'Bla Bla Bla',
        'status' => 'in_progress',
        'user_id' => $user->id,
    ]);
});
