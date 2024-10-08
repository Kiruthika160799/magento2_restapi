<?php
namespace Custom\RestApi\Model\Api;

use Custom\RestApi\Api\RequestItemInterface;
use Magento\Framework\DataObject;

class RequestItem extends DataObject implements RequestItemInterface{

    /**
     * @return int
     */
    public function getId() :int{
        return $this->_getData(self::DATA_ID);
    }

    /**
     * @return string
     */

     public function getDescription() : string{
        return $this->_getData(self::DATA_DESCRIPTION);
     }

    /**
     * @param int $id
     * @return $this
     */

     public function setId(int $id){
        return $this->setData(self::DATA_ID, $id);
     }

    /**
     * @param string $description
     * @return $this
     */

     public function setDescription(string $description){
        return $this->setData(self::DATA_DESCRIPTION, $description);
     }

    
}