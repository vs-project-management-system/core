<?php
namespace PMS\Component\Core\Builder;

class Builder implements \PMS\Component\Core\Interfaces\BuilderInterface
{
    /**
     * Object
     * 
     * @var mixed $object 
     */
    protected $object;
    
    /**
     * Object Manager
     * @var ObjectManager $objectManager
     */
    protected $objectManager;
    
    /**
     * Object Repository
     * @var RepositoryInterface $objectRepository
     */
    protected $objectRepository;
    
    public function __construct(
        \Doctrine\Common\Persistence\ObjectManager $objectManager,
        \PMS\Component\Core\Interfaces\RepositoryInterface $objectRepository
    ) {
        $this->objectManager = $objectManager;
        $this->objectRepository = $objectRepository;
    }
    
    
    public function __call($method, $arguments)
    {
        if (!method_exists($this->object, $method)) {
            throw new \BadMethodCallException(
                sprintf(
                    '%s has no "%s()" method',
                    get_class($this->object),
                    $method
                )
            );
        }
        
        call_user_func_array(array($this->object, $method, $arguments));
        
        return $this;
    }
    
    public function create($name)
    {
        $this->object = $this->objectRepository->createNew();
        
        $this->object->setName($name);
        
        return $this;
    }
    
    public function save($flush = true)
    {
        $this->objectManager->persist($flush);
        
        if ($flush) {
            $this->objectManager->flush();
        }
        
        return $this->object;
    }
}
