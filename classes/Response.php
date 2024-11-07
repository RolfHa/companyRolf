<?php

class Response
{
    /**
     * Daten für Ausgabe: entweder ein Object oder ein Array von Objekten der Basisklassen
     */
    private $array = [];
    /**
     * @var string
     * für Info an user z.B. unrichtige Eingaben
     */
    private string $message;
    /**
     * @var string
     * für form-tag eine hidden Übergabevariable, die angibt, was die nächste action ist: z.B. insert oder update
     */
    private string $action;

    /**
     * @param array $array
     * @param string $message
     */
    public function __construct(array $array, string $message)
    {
        $this->array = $array;
        $this->message = $message;
    }

    public function getArray(): array
    {
        return $this->array;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getAction(): string
    {
        return $this->action;
    }

    public function setAction(string $action): void
    {
        $this->action = $action;
    }



}