<?php

namespace BoutiqueBundle\Repository;
use BoutiqueBundle\Entity\Produit;

/**
 * ProduitRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ProduitRepository extends \Doctrine\ORM\EntityRepository
{
    //si j'ai des requêtes qui concernent exclusivement la table produit et qui sont spécifiques... je vais les coder ici plutôt que de la faire dans le controller.
    //cela maintient un controller plus claire/générique

    //Fonction pour récupérer toutes les catégories via le queryBuilder()
    public function findAllCategorie()
    {
        //nous avons besoin du Manager ici pour utiliser queryBuilder():
        $em = $this->getEntityManager();
        $query=$em->createQueryBuilder();
        $query
            ->select('p.categorie')
            ->distinct(true)
            ->from(Produit::class, 'p')
            ->orderBy('p.categorie', 'ASC');
        //on bâtit une fonction via des fonctions PHP de doctrine
        return $query->getQuery()->getResult();
        // exeécute la requête et on fetch.



    }
    //Fonction pour récupérer toutes les catégories via le createQuery()
    public function findAllCategorie2()
    {
        //nous avons besoin du Manager ici pour utiliser createQuery():
        $query = $em->createQuery("SELECT DISTINCT p.categorie FROM BoutiqueBundle\Entity\Produit p ORDER BY p.categorie");
        // Créer une requête en SQL via Doctrine
        return $query->getResult();
        // On exécute la requête et fetch.

    }

}
