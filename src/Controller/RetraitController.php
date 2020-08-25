<?php
namespace App\Controller;

use App\Entity\Retrait;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;



class RetraitController
{
    public function __construct(TokenStorageInterface $tokenStorage)
    {
        $this->tokenStorage = $tokenStorage;
    }

    public function __invoke(Retrait $data):Retrait
    {
        // User qui fait le depot
        $userConnect = $this->tokenStorage->getToken()->getUser();
        $data->setUser($userConnect);

        $montant=$data->getMontant();
        $compte=$data->getComptes();
        $solde=$compte->getSolde();
        if($montant <= $solde){
            $compte->setSolde($solde - $montant);
            return $data;
        }else{
            throw new Exception("Le solde de votre compte ne vous permet pas de réaliser cette opération");
        }
    }
}