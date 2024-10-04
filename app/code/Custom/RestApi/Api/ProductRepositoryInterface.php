<?php
namespace Custom\RestApi\Api;

interface ProductRepositoryInterface{

    /**
     * Return a filtered product
     * @param int $id
     * @return \Custom\RestApi\Api\ResponseItemInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityexception
     */
   
    public function getItem(int $id);

     /**
     * Set description for a product
     * @param \Custom\RestApi\Api\RequestItemInterface[] $products
     * @return void 
     */

    public function setDescription(array $products);

}



