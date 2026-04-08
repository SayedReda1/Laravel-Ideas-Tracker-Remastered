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
        ->fill('@step-field', 'Start bug hunting')
        ->click('@add-new-step-button')
        ->fill('@link-field', 'https://example.com')
        ->click('@add-new-link-button')
        ->fill('@link-field','https://laravel.com')
        ->click('@add-new-link-button')
        ->click('Create')
        ->debug()
        ->assertPathIs('/ideas');

    expect($idea = $user->ideas)->toHaveCount(1);

    expect($idea->steps)->toHaveCount(1);
});
