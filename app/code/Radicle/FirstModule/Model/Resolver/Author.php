<?php

declare(strict_types=1);
namespace Radicle\FirstModule\Model\Resolver;
use Radicle\FirstModule\Model\AuthorFactory;

use Magento\Authorization\Model\UserContextInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Magento\TestFramework\Exception\NoSuchActionException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Exception\GraphQlAuthorizationException;
use Magento\Framework\GraphQl\Exception\GraphQlNoSuchEntityException;
use Magento\Framework\GraphQl\Query\Resolver\ContextInterface;
use Magento\Framework\GraphQl\Query\Resolver\Value;
use Magento\Framework\GraphQl\Query\Resolver\ValueFactory;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\Webapi\ServiceOutputProcessor;
use Magento\Framework\Api\ExtensibleDataObjectConverter;

/**
 * Authors field resolver, used for GraphQL request processing.
 */
class Author implements ResolverInterface
{
    /**
     * @var ValueFactory
     */
    private $valueFactory;

    /**
     * @var ServiceOutputProcessor
     */
    private $serviceOutputProcessor;

    /**
     * @var ExtensibleDataObjectConverter
     */
    private $dataObjectConverter;

    /**
     * @var \Psr\Log\LoggerInterface
     */
    private $logger;

    /**
     * @var AuthorFactory
     */
    private $authorFactory;

    /**
     * @param ValueFactory $valueFactory
     * @param ServiceOutputProcessor $serviceOutputProcessor
     * @param ExtensibleDataObjectConverter $dataObjectConverter
     * @param \Psr\Log\LoggerInterface $logger
     * @param AuthorFactory $authorFactory
     */
    public function __construct(
        ValueFactory $valueFactory,
        ServiceOutputProcessor $serviceOutputProcessor,
        ExtensibleDataObjectConverter $dataObjectConverter,
        \Psr\Log\LoggerInterface $logger,
        AuthorFactory $authorFactory

    ) {
        $this->valueFactory = $valueFactory;
        $this->serviceOutputProcessor = $serviceOutputProcessor;
        $this->dataObjectConverter = $dataObjectConverter;
        $this->logger = $logger;
        $this->authorFactory = $authorFactory;
    }

    /**
     * {@inheritdoc}
     */
//    public function resolve(
//        Field $field,
//              $context,
//        ResolveInfo $info,
//        array $value = null,
//        array $args = null
//    ) : Value {
//        if ((!$context->getUserId()) || $context->getUserType() == UserContextInterface::USER_TYPE_GUEST) {
//            throw new GraphQlAuthorizationException(
//                __(
//                    'Current customer does not have access to the resource "%1"',
//                    [\Magento\Customer\Model\Customer::ENTITY]
//                )
//            );
//        }
//
//        try {
//            $data = $this->getCustomerData($context->getUserId());
//            $result = function () use ($data) {
//                return !empty($data) ? $data : [];
//            };
//            return $this->valueFactory->create($result);
//        } catch (NoSuchEntityException $exception) {
//            throw new GraphQlNoSuchEntityException(__($exception->getMessage()));
//        } catch (LocalizedException $exception) {
//            throw new GraphQlNoSuchEntityException(__($exception->getMessage()));
//        }
//    }


//    private function getCustomerData($customerId) : array
//    {
//        try {
//            $customerData = [];
//            $customerColl = $this->customerFactory->create()->getCollection()
//                ->addFieldToFilter("entity_id", ["eq"=>$customerId]);
//            foreach ($customerColl as $customer) {
//                array_push($customerData, $customer->getData());
//            }
//            return isset($customerData[0])?$customerData[0]:[];
//        } catch (NoSuchEntityException $e) {
//            return [];
//        } catch (LocalizedException $e) {
//            throw new NoSuchEntityException(__($e->getMessage()));
//        }
//    }

    /**
     * @param Field $field
     * @param $context
     * @param ResolveInfo $info
     * @param array|null $value
     * @param array|null $args
     * @return Value
     * @throws GraphQlNoSuchEntityException
     */
    public function resolve(
        Field $field,
              $context, //model
        ResolveInfo $info,
        array $value = null,
        array $args = null
    ) : Value {
        try {
            $data = $this->getAuthorData();
            $result = function () use ($data) {
                return !empty($data) ? $data : [];
            };
            return $this->valueFactory->create($result);
        } catch (NoSuchEntityException $exception) {
            throw new GraphQlNoSuchEntityException(__($exception->getMessage()));
        } catch (LocalizedException $exception) {
            throw new GraphQlNoSuchEntityException(__($exception->getMessage()));
        }
    }

    /**
     * @param $authorId
     * @return array
     * @throws NoSuchEntityException
     */
    private function getAuthorData(){
        try{
            $authorData = [];
            $authorColl = $this->authorFactory->create()->getCollection();
            foreach($authorColl as $author){
//                $author["Customer_Id"] = $author->getData("Customer Id");
                \Magento\Framework\App\ObjectManager::getInstance()
            ->get(\Psr\Log\LoggerInterface::class)->debug('Author data -----> '.json_encode($author->getData()));
                array_push($authorData,$author->getData());
            }
            return isset($authorData[0]) ? $authorData : [];
        }catch(NoSuchEntityException $e){
            return [];
        }catch(LocalizedException $e){
            throw new NoSuchEntityException(__($e->getMessage()));
        }
    }
}
