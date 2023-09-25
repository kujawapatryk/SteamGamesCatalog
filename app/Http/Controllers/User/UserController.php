<?php
declare(strict_types=1);

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Repository\Interface\UserRepositoryInterface;
use Illuminate\View\View;

class UserController extends Controller{

    private UserRepositoryInterface $userRepository;
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function list():View{

        return view('user.list',[
            'users' => $this->userRepository->all(),
        ]);
    }

    public function show(int $userId):View{

        return view('user.show',[
            'user' => $this->userRepository->get($userId),
            ]);
    }

}
