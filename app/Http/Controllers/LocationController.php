<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\IUnitRepository;

class LocationController extends Controller
{
    protected $unitRepository;

    public function __construct(IUnitRepository $unitRepository)
    {
        $this->unitRepository = $unitRepository;
    }

    public function index($id)
    {
        $coordinate = $this->randomCoordinate();
        $unit = $this->unitRepository->getById($id);

        return view('pages.locations.index', compact('coordinate', 'unit'));
    }

    private function randomCoordinate()
    {
        $coordinate = array(
            '-2.293974605144342,114.87087965011598',
            '-2.832958795292959,114.7855854034424',
            '-3.762121219821541,114.43393707275392',
            '-4.028681556578677,116.03265702724458',
            '-3.3300042181994853,114.55140709877016',
        );

        return $coordinate[array_rand($coordinate, 1)];
    }
}
