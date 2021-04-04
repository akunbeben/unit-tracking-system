<?php

namespace App\Http\Controllers;

use App\Http\Requests\UnitStoreRequest;
use App\Http\Requests\UnitUpdateRequest;
use App\Repositories\Interfaces\IOwnerRepository;
use App\Repositories\Interfaces\IUnitRepository;

class UnitController extends Controller
{
    protected $unitRepository;
    protected $ownerRepository;

    public function __construct(IUnitRepository $unitRepository, IOwnerRepository $ownerRepository) {
        $this->unitRepository = $unitRepository;
        $this->ownerRepository = $ownerRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->unitRepository->paginated(8, ['owner']);

        return view('pages.units.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $owners = $this->ownerRepository->getAll();

        return view('pages.units.create', compact('owners'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UnitStoreRequest $request)
    {
        $this->unitRepository->create($request->validated());

        return redirect(route('unit.list'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $unit = $this->unitRepository->getById($id);
        $owners = $this->ownerRepository->getAll();

        return view('pages.units.edit', compact('unit', 'owners'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UnitUpdateRequest $request, $id)
    {
        $this->unitRepository->update($id, $request->validated());

        return redirect(route('unit.list'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->unitRepository->delete($id);

        return redirect(route('unit.list'));
    }
}
