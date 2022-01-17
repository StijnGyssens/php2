<?php
class  ShoppinList{
    # eigenschappen of properties
    # zijn private(niet zomaar toegankelijk) , public(toegangkelijk of protected
    private $shop;# bevat een string
    private $date; #bevat DateTime
    private $items=[];

    public function __construct($p_shop)
    {
        $this->setShop($p_shop);
        $this->setDate(new DateTime());
    }

    public function setShop($naam_winkel){
        if (strlen($naam_winkel)<4)die("Sorry, naam moet minstens 4 kar");
        $this->shop=$naam_winkel;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date): void
    {
        $this->date = $date;
    }

    /**
     * @param array $items
     */
    public function setItems(array $items): void
    {
        $this->items = $items;
    }

    /**
     * @return mixed
     */
    public function getShop()
    {
        return $this->shop;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date->format("d/m/Y");
    }

    /**
     * @return array
     */
    public function getItems(): array
    {
        return $this->items;
    }

    public function getShoppingList(){
        return [$this->shop,$this->date,$this->items];
    }



}