<?php
namespace PMS\Component\Core\Model;

class Carousel
{
    protected $name;
    
    protected $items;
    
    public function getName()
    {
        return $this->name;
    }
    
    public function setName($name)
    {
        $this->name = $name;
        
        return $this;
    }
    
    public function getItems()
    {
        return $this->items;
    }
    
    public function setItems(array $items)
    {
        $this->items = $items;
        
        return $this;
    }
    
    public function getItem($item)
    {
        return $this->items[$item];
    }
    
    public function addItem(CarouselItem $item)
    {
        $this->items[] = $item;
        
        return $this;
    }
}
