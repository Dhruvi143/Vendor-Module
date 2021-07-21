<?php
namespace Dhruvi\Vendor\Model\Api;

use Dhruvi\Vendor\Api\VendorRepositoryInterface;
use Dhruvi\Vendor\Model\ResourceModel\Vendor\CollectionFactory;
use Dhruvi\Vendor\Model\Vendor as Model;
use Dhruvi\Vendor\Model\VendorFactory as ModelFactory;
use Dhruvi\Vendor\Model\ResourceModel\Vendor as ResourceModel;
use Magento\Setup\Exception;

/**
 * Class VendorRepository
 * @package Dhruvi\Vendor\Model\Api
 */
class VendorRepository implements VendorRepositoryInterface
{
    /**
     * @var ModelFactory\
     */
    private $modelFactory;
    /**
     * @var ResourceModel
     */
    private $resourceModel;
    /**
     * @var CollectionFactory\
     */
    private $collectionFactory;

    /**
     * VendorRepository constructor.
     * @param CollectionFactory $collectionFactory
     * @param ModelFactory $modelFactory
     * @param ResourceModel $resourceModel
     */
    public function __construct(
        CollectionFactory $collectionFactory,
        ModelFactory $modelFactory,
        ResourceModel $resourceModel
    ) {
        $this->collectionFactory = $collectionFactory;
        $this->modelFactory = $modelFactory;
        $this->resourceModel = $resourceModel;
    }

    /**
     * @param $id
     * @return Model
     */
    public function getDataById($id)
    {
        return $this->load($id);
    }

    /**
     * @param Model $model
     * @return Model
     */
    public function save(Model $model)
    {
        $this->resourceModel->save($model);
    }

    /**
     * @param Model $model
     * @return Model
     */
    public function afterSave(Model $model)
    {
        return $this->afterSave($model);
    }

    /**
     * @param Model $model
     * @return Model
     */
    public function delete(Model $model)
    {
        try {
            $this->resourceModel->delete($model);
            return true;
        } catch (Exception $exception) {
            return false;
        }
    }

    /**
     * @param $value
     * @param null $field
     * @return Model
     */
    public function load($value, $field = null)
    {
        $model = $this->create();
        $this->resourceModel->load($model, $value, $field);
        return $model;
    }

    /**
     * @return Model
     */
    public function create()
    {
        return $this->modelFactory->create();
    }

    /**
     * @param $id
     * @return Model
     */
    public function deleteById($id)
    {
        $model = $this->load($id);
        return $this->delete($model);
    }

    /**
     * @return Collection
     */
    public function getCollection()
    {
        return $this->collectionFactory->create();
    }
}
