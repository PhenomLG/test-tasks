<?php

class Token{
    public TokenType $Type;
    public string $text;

    public function __construct(TokenType $type, string $text)
    {
        $this ->Type = $type;
        $this -> text = $text;
    }
    public function __toString(): string
    {
        return $this->text;
    }
}

enum TokenType{
    case Word;
    case Tag;
    case Space;
}

