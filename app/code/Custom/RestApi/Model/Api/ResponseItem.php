<?php
namespace Custom\RestApi\Model\Api;

use Custom\RestApi\Api\ResponseItemInterface;
use Magento\Framework\DataObject;

class ResponseItem extends DataObject implements ResponseItemInterface{

     /**
     * @return int
     */

     public function getId() : int {
        return $this->_getData(self::DATA_ID);
     }

    /**
     * @return string
     */

     public function getSku() : string {
        return $this->_getData(self::DATA_SKU);
     }
     
    /**
     * @return string
     */

     public function getName() : string{
        return $this->_getData(self::DATA_NAME);
     }

    /**
     * @return string
     */

     public function getDescription() : ?string{
        return $this->_getData(self::DATA_DESCRIPTION);
     }

      /**
       * @param int $id
      * @return $this
      */
      public function setId(int $id) : mixed
      {
         return $this->setData(self::DATA_ID, $id);
      }


    /**
     * @param string $sku
     * @return $this
     */

     public function setSku(string $sku) : mixed
     {
        return $this->setData(self::DATA_SKU, $sku);
     }

    /**
     * @param string $name
     * @return $this
     */

     public function setName(string $name) : mixed
     {
        return $this->setData(self::DATA_NAME, $name);
     }

    /**
     * @param string $description
     * @return $this
     */

     public function setDescription(?string $description) : mixed
     {
        return $this->setData(self::DATA_DESCRIPTION, $description);
     }
}