<?php
/**
 * Created by PhpStorm.
 * User: diogoazevedo
 * Date: 03/11/15
 * Time: 00:03
 */

namespace Onlinecorrection\Services;

use Onlinecorrection\Repositories\ClientRepository;
use Onlinecorrection\Repositories\UserRepository;


class ClientService
{
    /**
     * @var ClientRepository
     */
    private $clientRepository;
    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(ClientRepository $clientRepository, UserRepository $userRepository)
    {


        $this->clientRepository = $clientRepository;
        $this->userRepository = $userRepository;
    }

    public function update(array $data,$id)
    {
        $encrypt = $data['user']['password'];
        $data['user']['password'] = bcrypt($encrypt);
        $this->clientRepository->update($data,$id);
        $userId = $this->clientRepository->find($id,['user_id'])->user_id;
        $this->userRepository->update($data['user'],$userId);
    }

    public function update_role(array $data,$id)
    {
        $this->clientRepository->update($data,$id);
        $userId = $this->clientRepository->find($id,['user_id'])->user_id;
        $this->userRepository->update($data['user'],$userId);
    }

    public function create(array $data)
    {

        $encrypt = $data['user']['password'];
        $data['user']['password'] = bcrypt($encrypt);
        $user =  $this->userRepository->create($data['user']);
        $data['user_id']=$user->id;
        $this->clientRepository->create($data);

    }

}