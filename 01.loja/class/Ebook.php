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
}
