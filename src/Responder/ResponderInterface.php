<?php

declare(strict_types=1);

namespace Everlution\Ajaxcom\Responder;

/**
 * Interface ResponderInterface.
 *
 * @author Everlution s.r.o. <support@everlution.sk>
 */
interface ResponderInterface
{
    public function render(): array;
}
