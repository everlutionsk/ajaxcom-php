<?php

declare(strict_types=1);

namespace Everlution\Ajaxcom;

use Everlution\Ajaxcom\Responder\CallbackFunction;
use Everlution\Ajaxcom\Responder\ChangeUrl;
use Everlution\Ajaxcom\Responder\Container;
use Everlution\Ajaxcom\Responder\ResponderInterface;

/**
 * Class Handler.
 *
 * @author Everlution s.r.o. <support@everlution.sk>
 */
class Handler
{
    /** @var ResponderInterface[] */
    private $queue = [];

    public function isQueueEmpty(): bool
    {
        return empty($this->queue);
    }

    public function register(ResponderInterface $responder): self
    {
        $this->queue[] = $responder;

        return $this;
    }

    public function unregister(ResponderInterface $responder): self
    {
        if (false === ($key = array_search($responder, $this->queue, true))) {
            unset($this->queue[$key]);
        }

        return $this;
    }

    public function container(string $identifier): Container
    {
        $responder = new Container($identifier);
        $this->register($responder);

        return $responder;
    }

    public function callback(string $function, ?array $params): CallbackFunction
    {
        $responder = new CallbackFunction($function, $params);
        $this->register($responder);

        return $responder;
    }

    public function changeUrl(string $url, string $method = ChangeUrl::PUSH, int $wait = 0): ChangeUrl
    {
        $responder = new ChangeUrl($url, $method, $wait);
        $this->register($responder);

        return $responder;
    }

    public function respond(): array
    {
        $response = [];
        foreach ($this->queue as $responder) {
            $response[] = $responder->render();
        }

        return $response;
    }
}
