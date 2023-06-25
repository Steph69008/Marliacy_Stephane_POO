<?php
class moto{
    private $id;
    private $brand;
    private $model;

    private $type;
    private $typename;
    private $picture;

    /**
     * @param $id
     * @param $brand
     * @param $model
     * @param $type
     * @param $picture
     */
    public function __construct($id, $brand, $model, $type, $picture)
    {
        $this->id = $id;
        $this->brand = $brand;
        $this->model = $model;
        $this->type = $type;
        $this->picture = $picture;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * @param mixed $brand
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;
    }

    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param mixed $model
     */
    public function setModel($model)
    {
        $this->model = $model;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * @param mixed $picture
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;
    }

    public function getTypeName($type) {
        // Assuming $this->bdd is your PDO instance
        $query = $this->bdd->prepare("SELECT name FROM types WHERE id = :type");
        $query->bindParam(":type", $type);
        $query->execute();

        $result = $query->fetch();

        if ($result) {
            return $result['name'];
        } else {
            return null;
        }
    }

}