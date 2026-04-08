<?php

use App\Models\User;

it('requires authentication', function () {
    $this->get(route('profile.edit'))->assertRedirect('/login');
});

it('edits profile', function () {
    $user = User::factory()->create([
        'password' => 'password',
    ]);
    $this->actingAs($user);

    visit(route('profile.edit'))
        ->assertValue('name', $user->name)
        ->assertValue('email', $user->email)
        ->fill('name', $user->name)
        ->fill('email', $user->email)
        ->fill('old-password', 'password')
        ->click('Update Account')
        ->assertPathIs(parse_url(route('idea.index'), PHP_URL_PATH));

    expect(Auth::user()->first())->toMatchArray([
        'name' => $user->name,
        'email' => $user->email,
    ]);
});
