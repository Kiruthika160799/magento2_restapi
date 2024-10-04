<?php
namespace Custom\RestApi\Model\Api;

use Custom\RestApi\Api\ProductRepositoryInterface;
use Custom\RestApi\Api\RequestItemInterfaceFactory;
use Custom\RestApi\Api\ResponseItemInterfaceFactory;
use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Catalog\Model\ResourceModel\Product\Action;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Store\Model\StoreManagerInterface;

class ProductRepository implements ProductRepositoryInterface{

    /**
     * @var Action
     */
    private $productAction;

     /**
     * @var RequestItemInterfaceFactory
     */
    private $requestItemFactory;

     /**
     * @var ResponseItemInterfaceFactory
     */
    private $responseItemFactory;

     /**
     * @var CollectionFactory
     */
    private $productCollectionFactory;

     /**
     * @var StoreManagerInterface
     */
    private $storeManager;

    /**
     * @param Action $productAction
     * @param RequestItemInterfaceFactory $requestItemFactory
     * @param ResponseItemInterfaceFactory $responseItemFactory
     * @param CollectionFactory $productCollectionFactory
     * @param StoreManagerInterface $storeManager
     */
    public function __construct(
        Action $productAction,
        RequestItemInterfaceFactory $requestItemFactory,
        ResponseItemInterfaceFactory $responseItemFactory,
        CollectionFactory $productCollectionFactory,
        StoreManagerInterface $storeManager
    ){
        $this->productAction = $productAction;
        $this->requestItemFactory = $requestItemFactory;
        $this->responseItemFactory = $responseItemFactory;
        $this->productCollectionFactory = $productCollectionFactory;
        $this->storeManager = $storeManager;

    }

     /**
     * Return a filtered product
     * @param int $id
     * @return \Custom\RestApi\Api\ResponseItemInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityexception
     */
   
    public function getItem(int $id) : mixed
    {
        $collection = $this->getProductCollection()
                            ->addAttributeToFilter(
                               'entity_id', ['eq' => $id]
                            );

        $product = $collection->getFirstItem();

        if(!$product->getId()){
            throw new NoSuchEntityException(__('Product not found.'));
        }

        return $this->getResponseItemFromProduct($product);
    }

     /**
     * Set description for a product
     * @param \Custom\RestApi\Api\RequestItemInterface[] $products
     * @return void 
     */

    public function setDescription(array $products) : void 
    {
        foreach($products as $product){
            $this->setDescriptionForProduct(
                $product->getId(),
                $product->getDescription()
            );
        }
    }

    /**
     * Set the description for the product.
     *
     * @param int $id
     * @param string $description
     * @return void
     * @throws \Magento\Framework\Exception\NoSuchEntityException

     */

    private function setDescriptionForProduct(int $id, string $description) : void 
    {
        $productExists = $this->getProductCollection()
                ->addAttributeToFilter('entity_id', ['eq' => $id])
                ->getFirstItem()
                ->getId();
        if ($productExists) {
            $this->productAction->updateAttributes(
                [$id],
                ['description' => $description],
                $this->storeManager->getStore()->getId()
            );
        } else{
            throw new \Magento\Framework\Exception\NoSuchEntityException(
                __('Product with ID %1 does not exist.', $id)
            );    
        }
    }

    /**
     * @return Collection
     */

    private function getProductCollection() : mixed
    {
        $collection = $this->productCollectionFactory->create();
        $collection->addAttributeToSelect(
            [
                'entity_id',
                ProductInterface::SKU,
                ProductInterface::NAME,
                'description'
            ],
            'left'
        );
        return $collection;
    }

    /**
     * @param ProductInterface $product
     * @return ResponseItemInterface
     */

    public function getResponseItemFromProduct($product) : mixed
    {
         /** @var ResponseItemInterface $responseItem */
         $responseItem = $this->responseItemFactory->create();
         $responseItem->setId($product->getId())
             ->setSku($product->getSku())
             ->setName($product->getName())
             ->setDescription($product->getDescription());
         return $responseItem;
 

    }

}