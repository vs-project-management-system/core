<?php
namespace PMS\Component\Core\Model;

class CarouselItem
{
    protected $name;
    
    protected $capton;
    
    protected $carousel;
    
    public function getName()
    {
        return $this->name;
    }
    
    public function setName($name)
    {
        $this->name = $name;
        
        return $this;
    }
    
    public function getCaption()
    {
        return $this->caption;
    }
    
    public function setCaption($caption)
    {
        $this->caption = $caption;
        
        return $this;
    }
    
    public function getCarousel()
    {
        return $this->carousel;
    }
    
    public function setCarousel(\PMS\Component\Core\Model\Carousel $carousel)
    {
        $this->carousel = $carousel;
        
        return $this;
    }
}
