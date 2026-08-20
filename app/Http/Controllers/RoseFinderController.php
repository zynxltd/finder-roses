<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilterRosesRequest;
use App\Services\RoseFinder;
use App\Support\RoseFinderCatalog;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class RoseFinderController extends Controller
{
    public function index(FilterRosesRequest $request, RoseFinder $roseFinder): View|JsonResponse
    {
        $filters = $request->filters();
        $roses = $roseFinder->search($filters);

        $data = [
            'groups' => RoseFinderCatalog::characteristicGroups(),
            'sizes' => RoseFinderCatalog::sizes(),
            'colours' => RoseFinderCatalog::colours(),
            'filters' => $filters,
            'hasFilters' => $request->hasActiveFilters(),
            'chips' => $request->activeChips(),
            'roses' => $roses,
        ];

        $wantsPartial = $request->header('X-Finder-Partial')
            || (
                $request->boolean('partial')
                && str_contains((string) $request->header('Accept'), 'application/json')
            );

        if ($wantsPartial) {
            return response()->json([
                'total' => $roses->total(),
                'chips' => view('rose-finder.partials.chips', $data)->render(),
                'results' => view('rose-finder.partials.results', $data)->render(),
                'drawerFooter' => view('rose-finder.partials.drawer-footer', $data)->render(),
            ]);
        }

        return view('rose-finder.index', $data);
    }
}
