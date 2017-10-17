<?php

declare(strict_types=1);

namespace Everlution\Ajaxcom\Responder;

/**
 * Class Container.
 *
 * @author Everlution s.r.o. <support@everlution.sk>
 */
class Container extends AbstractResponder
{
    private const OPTION_VALUE = 'value';
    private const OPTION_TARGET = 'target';
    private const OPTION_METHOD = 'method';
    private const OPTION_ATTR = 'attr';

    public function __construct(string $identifier)
    {
        $this->registerOption(self::OPTION_VALUE);
        $this->registerOption(self::OPTION_TARGET);
        $this->registerOption(self::OPTION_METHOD);

        $this->setOption(self::OPTION_TARGET, $identifier);
    }

    public function append(string $html): self
    {
        $this->setOption(self::OPTION_VALUE, $html);
        $this->setOption(self::OPTION_METHOD, 'append');

        return $this;
    }

    public function prepend(string $html): self
    {
        $this->setOption(self::OPTION_VALUE, $html);
        $this->setOption(self::OPTION_METHOD, 'prepend');

        return $this;
    }

    public function replace(string $html): self
    {
        $this->setOption(self::OPTION_VALUE, $html);
        $this->setOption(self::OPTION_METHOD, 'replace');

        return $this;
    }

    public function html(string $html): self
    {
        $this->setOption(self::OPTION_VALUE, $html);
        $this->setOption(self::OPTION_METHOD, 'html');

        return $this;
    }

    public function remove(): self
    {
        $this->setOption(self::OPTION_METHOD, 'remove');

        return $this;
    }

    public function removeClass(string $class): self
    {
        $this->setOption(self::OPTION_VALUE, $class);
        $this->setOption(self::OPTION_METHOD, 'removeClass');

        return $this;
    }

    public function addClass(string $class): self
    {
        $this->setOption(self::OPTION_VALUE, $class);
        $this->setOption(self::OPTION_METHOD, 'addClass');

        return $this;
    }

    public function attr(string $attribute, string $value): self
    {
        $this->setOption(self::OPTION_METHOD, 'attr');
        $this->setOption(self::OPTION_ATTR, $attribute);
        $this->setOption(self::OPTION_VALUE, $value);

        return $this;
    }

    protected function getIdentifier(): string
    {
        return 'container';
    }
}
