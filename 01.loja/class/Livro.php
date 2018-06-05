<?php

class Livro extends Produto
{
    private $isbn;
    private $taxaImpressao;
    private $waterMark;

    public function getIsbn()
    {
        return $this->isbn;
    }

    public function setIsbn($isbn)
    {
        return $this->isbn = $isbn;
    }

    public function calculaImposto()
    {
        return $this->getPreco() * 0.065;
    }

    public function getTaxaImpressao()
    {
        return $this->taxaImpressao;
    }


    public function setTaxaImpressao($taxaImpressao)
    {
        return $this->taxaImpressao = $taxaImpressao;
    }


    public function getWatermark()
    {
        return $this->waterMark;
    }


    public function setWatermark($waterMark)
    {
        return $this->waterMark = $waterMark;
    }
}
