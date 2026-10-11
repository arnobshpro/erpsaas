<?php

it('uses the Place for Stay ERP brand on company authentication pages', function () {
    auth()->logout();

    $login = $this->get('/company/login')->assertOk()->assertSee('ERP PFS');
    expect(preg_match('/<title>\s*Login -\s*ERP PFS\s*<\/title>/', $login->getContent()))->toBe(1);

    $register = $this->get('/company/register')->assertOk()->assertSee('ERP PFS');
    expect(preg_match('/<title>\s*Register -\s*ERP PFS\s*<\/title>/', $register->getContent()))->toBe(1);
});
