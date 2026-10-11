<?php

it('does not offer GitHub sign-in on the company login page', function () {
    auth()->logout();

    $this->get('/company/login')
        ->assertOk()
        ->assertDontSee('GitHub')
        ->assertDontSee('github');

    $this->get('/company/register')
        ->assertOk()
        ->assertDontSee('GitHub')
        ->assertDontSee('github');

    $this->get('/company/oauth/github')->assertNotFound();
});
