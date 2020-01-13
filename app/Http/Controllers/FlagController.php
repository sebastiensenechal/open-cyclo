<?php

namespace App\Http\Controllers;

use App\Flag;
use App\User;
use Auth;
use Illuminate\Http\Request;

class FlagController extends Controller
{
    /**
     * Display a listing of the flag.
     *
     * @return \Illuminate\View\View
     */
    public function index(User $user)
    {
            $this->authorize('manage_flag');
            $flagQuery = Flag::query();
            $flagQuery->where('name', 'like', '%'.request('q').'%');
            $flags = $flagQuery->paginate(25);

            return view('flags.index', compact('flags'));
    }
    /**
     * Show the form for creating a new flag.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $this->authorize('create', new Flag);
        return view('flags.create');
    }
    /**
     * Store a newly created flag in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->authorize('create', new Flag);
        $newFlag = $request->validate([
            'name'      => 'required|max:60',
            'latitude'  => 'nullable|required_with:longitude|max:15',
            'longitude' => 'nullable|required_with:latitude|max:15',
        ]);
        $newFlag['creator_id'] = auth()->id();
        $flag = Flag::create($newFlag);
        return redirect()->route('flags.show', $flag);
    }
    /**
     * Display the specified flag.
     *
     * @param  \App\Flag  $flag
     * @return \Illuminate\View\View
     */
    public function show(Flag $flag)
    {
        return view('flags.show', compact('flag'));
    }
    /**
     * Show the form for editing the specified flag.
     *
     * @param  \App\Flag  $flag
     * @return \Illuminate\View\View
     */
    public function edit(Flag $flag)
    {
        $this->authorize('update', $flag);
        return view('flags.edit', compact('flag'));
    }
    /**
     * Update the specified flag in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Flag  $flag
     * @return \Illuminate\Routing\Redirector
     */
    public function update(Request $request, Flag $flag)
    {
        $this->authorize('update', $flag);
        $flagData = $request->validate([
            'name'      => 'required|max:60',
            'latitude'  => 'nullable|required_with:longitude|max:15',
            'longitude' => 'nullable|required_with:latitude|max:15'
        ]);
        $flag->update($flagData);
        return redirect()->route('flags.show', $flag);
    }
    /**
     * Remove the specified flag from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Flag  $flag
     * @return \Illuminate\Routing\Redirector
     */
    public function destroy(Request $request, Flag $flag)
    {
        $this->authorize('delete', $flag);
        $request->validate(['flag_id' => 'required']);
        if ($request->get('flag_id') == $flag->id && $flag->delete()) {
            return redirect()->route('flags.index');
        }
        return back();
    }
}
