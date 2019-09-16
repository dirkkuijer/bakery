<?php

namespace AppBundle\EventListener;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Symfony\Component\Templating\EngineInterface;
use Symfony\Bundle\FrameworkBundle\Routing\Router;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


class ExceptionListener
{
    protected $isDev;
    private $templateEngine;
    private $router;
    private $routeToRedirect = 'dashboard';

    public function __construct(EngineInterface $templateEngine, Router $router, $env)
    {
        $this->templateEngine = $templateEngine;
        $this->router = $router;
        $this->isDev = $env === 'dev';
    }

    public function onKernelException(GetResponseForExceptionEvent $event)
    {
        

        // if (!$this->isDev) 
        // {
            $statusCode = 'OEPS!';

            if (method_exists($event, 'getStatusCode')) {
                $statusCode = $event->getException()->getStatusCode();  
            }

            $exception = $event->getException();

            if ($exception instanceof AccessDeniedHttpException) 
            {
                $url = $this->router->generate($this->routeToRedirect);
                $response = new RedirectResponse($url);
                $event->setResponse($response);
            
            } else {
                
                $response = $this->templateEngine->render(
                'exceptions/error.html.twig',
                    [
                        'status_code' => $statusCode,
                        'status_text' => $exception->getMessage(),
                        'exception_in_file' => $exception->getFile(),
                        'exception_on_line' => $exception->getLine(),
                    ]
                );

                $event->setResponse(new Response($response));
            }
        // }
    }
}

