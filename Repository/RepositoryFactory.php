<?php
namespace PMS\Component\Core\Repository;

class RepositoryFactory extends \PMS\Bundle\CoreBundle\Doctrine\ORM\EntityRepository implements \Doctrine\ORM\Repository\RepositoryFactory
{
    /**
     * Id
     * @var array $ids
     */
    private $ids;
    
    /**
     * Container
     * @var \Symfony\Component\DependencyInjection\ContainerInterface $container 
     */
    private $container;
    
    /**
     * Repository Factory
     * @var RepositoryFactory $default
     */
    private $default;

    /**
     * Construct
     * @param array $ids
     * @param \Symfony\Component\DependencyInjection\ContainerInterface $container
     * @param \PMS\CoreBundle\Repository\RepositoryFactory $default
     */
    public function __construct(
        array $ids,
        \Symfony\Component\DependencyInjection\ContainerInterface $container,
        \Doctrine\ORM\Repository\RepositoryFactory $default
    ) {
        $this->ids = $ids;
        $this->container = $container;
        $this->default = $default;
        parent::construct();
    }

    /**
     * Get Repository
     * @param \Doctrine\ORM\EntityManagerInterface $entityManager
     * @param string $entityName
     * @return type
     */
    public function getRepository(\Doctrine\ORM\EntityManagerInterface $entityManager, $entityName)
    {
        if (isset($this->ids[$entityName])) {
            return $this->container->get($this->ids[$entityName]);
        }

        return $this->default->getRepository($entityManager, $entityName);
    }
}
