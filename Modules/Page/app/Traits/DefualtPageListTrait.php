<?php

namespace Modules\Page\Traits;

trait DefualtPageListTrait {
    public static function getDefaultPageList()
    {
        return [
            'home' => 'Home',
            'about' => 'About',
            'services' => 'Services',
            'portfolios' => 'Portfolios',
            'team' => 'Team',
            'pricing' => 'Pricing',
            'faq' => 'FAQ',
            'blog' => 'Blog',
            'contact' => 'Contact',
            'login' => 'Login',
            'register' => 'Register',
        ];
    }
}
