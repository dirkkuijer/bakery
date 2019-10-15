<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SwitchLanguageController extends Controller
{
    /**
     * @Route("{language}/", name="switch_language")
     * @Method("GET")
     *
     * @param mixed $_locale
     * @param mixed $route
     */
    public function switchLanguage(Request $request, $_locale)
    {
        // dump($request = $this->container->get('request'));

        // dump($routeName = $request->get('_route'));
        // dump($route);
        // die;
        $_locale = $request->setLocale($_locale);

        return $response = $this->redirectToRoute('fos_user_security_login');
    }
}
