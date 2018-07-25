<?php

class Ebook extends Livro
{
    private $waterMark;

    public function getWatermark()
    {
        return $this->waterMark;
    }

    public function setWatermark($waterMark)
    {
        return $this->waterMark = $waterMark;
    }

    public function atualizaBaseadoEm($params)
    {
        $this->setIsbn($params["isbn"]);
        $this->setWaterMark($params["waterMark"]);
    }
}
