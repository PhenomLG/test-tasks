<?php


// Лексический разбор переданной строки на токены (тэги, слова и пробелы)
function lex(string $input, int $wordsLimit = null) : array {
    $result = [];
    $wordsLimit ??= strlen($input);

    for($i = 0; $i < strlen($input); $i++){
        if($wordsLimit === 0) {
            break;
        }

        switch ($input[$i]){
            case '<' :
                $tag = '';
                while($input[$i] != ">"){
                    $tag .= $input[$i];
                    $i++;
                }
                $tag .= $input[$i];
                $result[] = new Token(TokenType::Tag, $tag);
                break;

            case ' ':
                $result[] = new Token(TokenType::Space, ' ');
                break;

            default:
                $word = '';
                while($i < strlen($input) && !ctype_space($input[$i]) && $input[$i] != '<' ){
                    $word .= $input[$i];
                    $i++;
                }
                
                if($input[$i] == '<' || $input[$i] == ' ')
                    $i--;

                if(!empty($word)) {
                    $result[] = new Token(TokenType::Word, $word);
                    $wordsLimit--;
                }
                break;
        }
    }
    return $result;
}

function cutText ($text, $wordsLimit = null) : string {
    $tokens = lex($text, $wordsLimit);
    $result = implode('', $tokens);
    if($wordsLimit != null)
        $result .= '...';
    return $result;
};