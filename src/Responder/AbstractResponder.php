<?php

declare(strict_types=1);

namespace Everlution\Ajaxcom\Responder;

/**
 * Class AbstractResponder.
 *
 * @author Everlution s.r.o. <support@everlution.sk>
 */
abstract class AbstractResponder implements ResponderInterface
{
    private $validOptions = [];
    private $options = [];

    public function setOption(string $option, $value)
    {
        if ($this->isValidOption($option)) {
            $this->options[$option] = $value;
        }

        return $this;
    }

    private function isValidOption(string $option)
    {
        if (false === in_array($option, $this->validOptions)) {
            throw new \Exception('Not a valid option type for this component');
        }

        return true;
    }

    protected function registerOption($option)
    {
        if (false === in_array($option, $this->validOptions)) {
            $this->validOptions[] = $option;
        }

        return $this;
    }

    public function render(): array
    {
        $operation = [
            'operation' => $this->getIdentifier(),
            'options' => $this->options,
        ];

        return $operation;
    }

    abstract protected function getIdentifier(): string;
}
