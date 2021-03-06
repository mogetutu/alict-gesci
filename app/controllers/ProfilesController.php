<?php

class ProfilesController extends BaseController {

	/**
	 * Profile Repository
	 *
	 * @var Profile
	 */
	protected $profile;
	protected $application;

	public function __construct(Profile $profile, Application $application)
	{
		$this->profile = $profile;
		$this->application = Application::firstOrCreate(['user_id' => Auth::user()->id]);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$profile = Auth::user()->profile;

		if (is_null($profile))
		{
			return Redirect::route('profiles.create');
		}

		return View::make('profiles.edit', compact('profile'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$profile = Auth::user()->profile;
		if ($profile)
		{
			return Redirect::route('profiles.edit', $profile->id);
		}
		return View::make('profiles.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Profile::$rules);

		if ($validation->passes())
		{
			$profile = New Profile($input);
			Auth::user()->profile()->save($profile);
			$this->application->update(['profiles' => 1]);

			return Redirect::route('profiles.index');
		}

		return Redirect::route('profiles.create')
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$profile = $this->profile->findOrFail($id);

		return View::make('profiles.show', compact('profile'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$profile = $this->profile->find($id);

		if (is_null($profile))
		{
			return Redirect::route('profiles.create');
		}

		return View::make('profiles.edit', compact('profile'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = array_except(Input::all(), '_method');
		$validation = Validator::make($input, Profile::$rules);

		if ($validation->passes())
		{
			$profile = $this->profile->find($id);
			$profile->update($input);
			$this->application->update(['profiles' => 1]);
			return Redirect::route('profiles.index')->with('message', 'Profile Updated.');
		}

		return Redirect::route('profiles.edit', $id)
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->profile->find($id)->delete();

		return Redirect::route('profiles.index');
	}
}
