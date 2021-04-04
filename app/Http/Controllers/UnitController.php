<?php

namespace App\Http\Controllers;

use App\Http\Requests\UnitStoreRequest;
use App\Repositories\Interfaces\IOwnerRepository;
use App\Repositories\Interfaces\IUnitRepository;
use Illuminate\Http\Request;

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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
