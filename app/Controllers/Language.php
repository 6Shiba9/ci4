<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Language extends BaseController
{
    public function index()
    {
        $request = \Config\Services::request();
        $url = $request->getGet('url');
        $session = session();
        $language = \Config\Services::language();
        $locale = $request->getLocale();
        $session->remove('lang');
        $session->set('lang', $locale);
        return redirect()->to($url);
    }
}

?>