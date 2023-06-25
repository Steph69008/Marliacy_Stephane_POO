<?php
// Cette classe aura le role de transformer nos requêtes MySQL en objet (Selection)
// Elle devra aussi transformer nos objets en requête mysql (insert / update)
// Cette classe elle étend de la classe abstraite DbManager qui contient la connection
// a notre BDD (attribut PDO)
class MotoManager extends DbManager {

    // Ici, nous avons mèthode getAll
    public function getAll() {
        $query = $this->bdd->prepare("SELECT * FROM moto");
        $query->execute();
        $results = $query->fetchAll();
        $motos = [];



        // On parcours nos resultats, on les tranforme en objet
        foreach ($results as $res){
            // On ajoute ces objets dans notre tableau créé à la ligne 17
            $motos[] = new Moto($res['moto_id'], $res['moto_brand'],
                $res['moto_model'],
                $res['id_moto_type'],
                $res['moto_picture']);
        }
        // On retourne notre tableau contenant nos objets !!!
        return $motos;
    }

    public function getOne($id){
        $query =
            $this->bdd->prepare("SELECT * FROM moto WHERE moto_id = :id");
        $query->bindParam(':id', $id);
        $query->execute();
        $res = $query->fetch();

        $moto = null;
        if($res){
            $moto = new Moto($res['moto_id'], $res['moto_brand'],
            $res['moto_model'],
            $res['id_moto_type'],
            $res['moto_picture']);
    }

        return $moto;
    }
    public function add(Moto $moto) {
        $brand= $moto->getBrand();
        $model = $moto->getModel();
        $type= $moto->getType();
        $picture = $moto->getPicture();

        $query = $this->bdd->prepare(
            "INSERT INTO moto (moto_id ,moto_brand, moto_model, id_moto_type, moto_picture) VALUES
                    (:brand, :model, :type, :picture)");

        $query->execute(
            [
                "brand"=>$brand,
                "model"=> $model,
                "type"=> $type,
                "picture"=> $picture]);

        $moto->setId($this->bdd->lastInsertId());

        return $moto;

    }

    public function delete($id){
        $query = $this->bdd->prepare("DELETE FROM moto WHERE moto_id=:id");
        $query->bindParam(":id", $id);
        $query->execute();
    }

    public function getMotosByType($typeId) {
        $query = $this->bdd->prepare("SELECT * FROM moto WHERE id_moto_type = :typeId");
        $query->bindParam(':typeId', $typeId, PDO::PARAM_INT);
        $query->execute();

        $results = $query->fetchAll(PDO::FETCH_CLASS, 'Moto');
        return $results;
    }

}
