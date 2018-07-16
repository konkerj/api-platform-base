<?php
/**
 * Created by PhpStorm.
 * User: xupanjiang
 * Date: 17/07/18
 * Time: 9:12 AM
 */

namespace App\DataFixtures;


use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setUsername('admin');
        $user->setName('Administrator');
        $user->setEmail('admin@example.com');
        $user->setRoles(array('ROLE_SUPER_ADMIN'));

        $encodedPassword = $this->encoder->encodePassword($user, 'abcd');
        $user->setPassword($encodedPassword);

        $manager->persist($user);
        $manager->flush();
    }
}
