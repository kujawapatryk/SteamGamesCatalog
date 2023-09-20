<?php
declare(strict_types=1);

namespace App\Http\Controllers\Game;

use App\Http\Controllers\Controller;
use App\Repository\Interface\GameRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GameController extends Controller{
    private GameRepositoryInterface $gameRepository;

    public function __construct(GameRepositoryInterface $repository)
    {
        $this->gameRepository = $repository;
    }


    public function index(Request $request): View{
        $phrase = $request->get('phrase');
        $type = $request->get('type', GameRepositoryInterface::TYPE_DEFAULT);
        $limit = $request->get('size', GameRepositoryInterface::LIMIT);

        $resultPagination = $this->gameRepository->filterBy($phrase, $type, $limit);
        $resultPagination->appends([
            'phrase' => $phrase,
            'type' => $type,
        ]);

        return view('game.list',[
            'games' => $resultPagination,
            'phrase' => $phrase,
            'type' => $type,
        ]);
    }

    public function showDetails($game): View{

        return view('game.show',[
            'game' => $this->gameRepository->showDetails((int) $game),
        ]);
    }

    public function dashboard(): View{


        return \view('game.dashboard',[
            'stats' => $this->gameRepository->stats(),
        ]);
    }
}
