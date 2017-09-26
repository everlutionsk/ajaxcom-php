<?php

declare(strict_types=1);

namespace Everlution\Ajaxcom\Responder;

/**
 * Class ChangeUrl.
 *
 * @author Everlution s.r.o. <support@everlution.sk>
 */
class ChangeUrl extends AbstractResponder
{
    const PUSH = 'push';
    const REPLACE = 'replace';
    const REDIRECT = 'redirect';

    private const OPTION_URL = 'url';
    private const OPTION_METHOD = 'method';
    private const OPTION_WAIT = 'wait';

    public function __construct(string $url, string $method, int $wait = 0)
    {
        $this->registerOption(self::OPTION_URL);
        $this->registerOption(self::OPTION_METHOD);
        $this->registerOption(self::OPTION_WAIT);

        $this->setOption(self::OPTION_URL, $url);
        $this->setOption(self::OPTION_METHOD, $method);
        $this->setOption(self::OPTION_WAIT, $wait);
    }

    protected function getIdentifier(): string
    {
        return 'changeurl';
    }
}
