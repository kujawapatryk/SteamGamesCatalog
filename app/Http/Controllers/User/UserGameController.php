<?php
declare(strict_types=1);

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Game\AddGameToUserList;
use App\Http\Requests\Game\RateGame;
use App\Http\Requests\Game\RemoveGameFromUserList;
use App\Repository\Interface\GameRepositoryInterface;
use App\Repository\Interface\UserGameRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;



class UserGameController extends Controller{

    private GameRepositoryInterface $gameRepository;
    private UserGameRepositoryInterface $userGamesRepository;
    public function __construct(GameRepositoryInterface $repository, UserGameRepositoryInterface $userGamesRepository){
        $this->gameRepository = $repository;
        $this->userGamesRepository = $userGamesRepository;
    }

    public function add(AddGameToUserList $request): RedirectResponse{
        $gameId = (int) $request->input('gameId');
        $game = $this->gameRepository->get($gameId);
        $this->userGamesRepository->addGame($game);

        return redirect()
            ->route('games.show', ['game' => $gameId])
            ->with('success', 'Gra została dodana');
    }

    public function remove(RemoveGameFromUserList $request): RedirectResponse{
        $gameId = (int) $request->input('gameId');
        $game = $this->gameRepository->get($gameId);
        $this->userGamesRepository->removeGame($game);

        return redirect()
            ->route('games.show', ['game' => $gameId])
            ->with('success', 'Gra została usunięta');
    }

    public function list(): View
    {
        $user = Auth::user();

        return view('user.game.list', [
            'games' => $user->games()->paginate()
        ]);
    }

    public function rate(RateGame $request): RedirectResponse{
        $gameId = (int) $request->input('gameId');
        $rate = $request->input('rate') ? (int) $request->input('rate') : null;
        $game = $this->gameRepository->get($gameId);
        $this->userGamesRepository->rateGame($game, $rate);


        return redirect()
            ->route('user.games.list')
            ->with('success', 'Ocena została zapisana');
    }

}
