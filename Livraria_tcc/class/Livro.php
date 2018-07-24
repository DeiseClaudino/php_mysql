<?php

abstract class Livro extends Produto
{
    private $isbn;
    public function getIsbn()
    {
        return $this->isbn;
    }

    public function setIsbn($isbn)
    {
        return $this->isbn = $isbn;
    }

}
