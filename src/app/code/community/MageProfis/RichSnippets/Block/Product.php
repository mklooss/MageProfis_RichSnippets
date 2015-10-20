<?php

class MageProfis_RichSnippets_Block_Product
extends Mage_Catalog_Block_Product_Abstract
{

    /**
     * encode json with extra options
     * 
     * @param mixed $string
     * @return string
     */
    public function jsonEncode($string)
    {
        return Mage::helper('richsnippets')->jsonEncode($string);
    }

    /**
     * get Currency ISO Code
     * 
     * @return string
     */
    public function getCurrencyCode()
    {
        return Mage::app()->getStore()->getCurrentCurrencyCode();
    }

    /**
     * get Final Price with Tax Calculation
     * 
     * @return string
     */
    public function getFinalPriceInclTax()
    {
        $price = Mage::helper('tax')
            ->getPrice($this->getProduct(), $this->getProduct()->getFinalPrice(), true);
        return number_format($price, 2, '.', '');
    }
}