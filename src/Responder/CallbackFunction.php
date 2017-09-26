<?php

declare(strict_types=1);

namespace Everlution\Ajaxcom\Responder;

/**
 * Class CallbackFunction.
 *
 * @author Everlution s.r.o. <support@everlution.sk>
 */
class CallbackFunction extends AbstractResponder
{
    private const OPTION_FUNCTION = 'callFunction';
    private const OPTION_PARAMS = 'params';

    public function __construct(string $function, ?array $params)
    {
        $this->registerOption(self::OPTION_FUNCTION);
        $this->registerOption(self::OPTION_PARAMS);

        $this->setOption(self::OPTION_FUNCTION, $function);
        $this->setOption(self::OPTION_PARAMS, $params);
    }

    protected function getIdentifier(): string
    {
        return 'callback';
    }
}
