<?php
declare(strict_types=1);

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Game\AddGameToUserList;
use App\Http\Requests\Game\RemoveGameFromUserList;
use App\Repository\Interface\GameRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;


class UserGameController extends Controller{

    private GameRepositoryInterface $gameRepository;
    public function __construct(GameRepositoryInterface $repository){
        $this->gameRepository = $repository;
    }

    public function add(AddGameToUserList $request): RedirectResponse{
        $gameId = (int) $request->input('gameId');
        $game = $this->gameRepository->get($gameId);
        $user = Auth::user();
        $user->addGame($game);

        return redirect()
            ->route('games.show', ['game' => $gameId])
            ->with('success', 'Gra została dodana');
    }

    public function remove(RemoveGameFromUserList $request): RedirectResponse{
        $gameId = (int) $request->input('gameId');
        $game = $this->gameRepository->get($gameId);

        $user = Auth::user();
        $user->removeGame($game);

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
}
