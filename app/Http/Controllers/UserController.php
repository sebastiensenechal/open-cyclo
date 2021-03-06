<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\User;
use Auth;
use App\Repositories\UserRepository;

use Illuminate\Http\Request;

class UserController extends Controller
{

    protected $userRepository;

    protected $nbrPerPage = 4; 

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }


    public function index(User $user)
    {
        $this->authorize('create', new User);

        $users = $this->userRepository->getPaginate($this->nbrPerPage);
        $links = $users->render();

        return view('indexUsers', compact('users', 'links'));
    }


    public function create(User $user)
    {
        $this->authorize('create', new User);

        return view('createUser');
    }


    public function store(UserCreateRequest $request, User $user)
    {
        $this->authorize('store', new User);

        $this->setAdmin($request);
        $user = $this->userRepository->store($request->all());

        return redirect('user')->withOk("L'utilisateur " . $user->name . " a été créé.");
    }


    public function show($id)
    {
        $user = $this->userRepository->getById($id);

        return view('showUser',  compact('user'));
    }


    public function edit($id)
    {
		if (Auth::user()->admin == 1) {
			$user = $this->userRepository->getById($id);
	        return view('editUser',  compact('user'));
		}
		if (Auth::user()->admin == 0) {
			if ($id != Auth::user()->id) {
				return view('errors.404');
			}
	        $user = $this->userRepository->getById($id);
	        return view('editUser',  compact('user'));
		}

    }


    public function update(UserUpdateRequest $request, $id)
    {
        $this->setAdmin($request);

        $user = $this->userRepository->getById($id);
        $this->userRepository->update($id, $request->all());

        return redirect('contribute')->withOk("L'utilisateur " . $request->input('name') . " a été modifié.");
    }


    public function destroy($id)
    {
        $this->authorize('destroy', new User);

        $this->userRepository->destroy($id);

        return redirect('home')->withOk("L'utilisateur a bien été supprimé.");
    }


    private function setAdmin($request) // Checkbox "Adminitrateur" du formulaire
    {
        if(!$request->has('admin'))
        {
            $request->merge(['admin' => 0]);
        }
    }
}
