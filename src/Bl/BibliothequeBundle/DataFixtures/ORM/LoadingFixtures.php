<?php
# Fichier Symfony/src/Bl/Bundle/BibliothequeBundle/DataFixtures/ORM/LoadingFixtures.php
/* Les Fixtures doivent êtres stockées dans le namespace suivant */
namespace  Bl\BibliothequeBundle\DataFixtures\ORM;

/*
 * On a besoin de recourir à l'interface FixtureInterface pour définir une fixture alors on le déclare
 * Si nous n'avions pas mis ce use, on aurait dû taper
 * class LoadingFixtures implements Doctrine\Common\DataFixtures\FixtureInterface pour l'implémentation
 * de l'interface FixtureInterface, ce qui avouons-le n'est pas toujours très pratique, surtout si on
 * veut utiliser plusieurs fois l'objet / interface en question.
 */
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/*
 * Nous aurons besoin de nos entités Genre et Livre également, on le déclare donc ici aussi...
 */
use Bl\BibliothequeBundle\Entity\Genre;
use Bl\BibliothequeBundle\Entity\Livre;
use Bl\BibliothequeBundle\Entity\Role;
use Bl\BibliothequeBundle\Entity\User;

# il nous faut ce namespace pour la gestion du cryptage du mot de passe
use Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder;

/*
 * Les fixtures sont des objets qui doivent obligatoirement implémenter l'interface FixtureInterface
 */
class LoadingFixtures implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        // Création d'un Genre "Science"
        $Science = new Genre();
        $Science->setLabel("Science");
        // Enregistrment dans la base de données
        $manager->persist($Science);
        $manager->flush();

        // Création d'un genre Informatique
        $Informatique = new Genre();
        $Informatique->setLabel("Informatique");
        // Enregistrment dans la base de données
        $manager->persist($Informatique);
        $manager->flush();

        // Création d'un genre Litterature
        $Litterature = new Genre();
        $Litterature->setLabel("Litterature");
        // Enregistrment dans la base de données
        $manager->persist($Litterature);
        $manager->flush();

        // Création d'un genre Chimie
        $Chimie = new Genre();
        $Chimie->setLabel("Chimie");
        // Enregistrment dans la base de données
        $manager->persist($Chimie);
        $manager->flush();

        // On crée le Livre Java !
        $Livre = new Livre();
        $Livre->setTitre("Java");
        $Livre->setDescription("Un super Livre ou on apprend a programmer en Java. Sa mission sera de vous familliarisez avec les syntaxe de Jav. Mais ... Qu'est ce que Java ?");
        $Livre->getListeDesGenres()->add($Informatique); 
        // Enregistrment dans la base de données
        $manager->persist($Livre);
        $manager->flush(); 



    // Create the roles
    $role_user = new Role();
    $role_user->setName("ROLE_USER");
    $manager->persist($role_user);
    $manager->flush();

    $role_admin = new Role();
    $role_admin->setName("ROLE_ADMIN");
    $manager->persist($role_admin);
    $manager->flush();

    // create a user
    $user = new User();

    // On donne le login Admin à notre nouvel utilisateur
    $user->setUsername('admin');

    // On cré un salt pour amélioré la sécurité
    $user->setSalt(md5(time()));

    // On crée un mot de passe (attention, comme vous pouvez le voir, il faut utiliser les même paramètres
    // que spécifiés dans le fichier security.yml, à savoir SHA512 avec 10 itérations.
    $encoder = new MessageDigestPasswordEncoder('sha512', true, 10);
    // On crée donc le mot de passe "admin" à partir de l'encodage choisi au-dessus
    $password = $encoder->encodePassword('password', $user->getSalt());
    // On applique le mot de passe à l'utilisateur
    $user->setPassword($password);

    $user->getUserRoles()->add($role_admin);

    $manager->persist($user);
    $manager->flush();

  
    }        
}
?>
