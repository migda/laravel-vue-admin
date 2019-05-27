<?php

namespace App\Http\Controllers\Admin\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\Api\V1\CountryResource;
use App\Http\Resources\Admin\Api\V1\CountryResourceCollection;
use App\Http\Resources\Admin\Api\V1\SuccessResource;
use App\Models\Country;
use Illuminate\Http\Request;

class CountriesController extends Controller
{
    /**
     * @param Request $request
     * @return CountryResourceCollection
     */
    public function index(Request $request): CountryResourceCollection
    {
        $countries = Country::query()->withCount(['users'])->orderBy('name');
        if ($request->get('paginate') == 'false') {
            return new CountryResourceCollection($countries->get());
        }
        return new CountryResourceCollection($countries->paginate(config('api.default_per_page')));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return SuccessResource
     */
    public function store(Request $request): SuccessResource
    {
        $country = Country::create([
            'name' => $request->name,
        ]);
        return (new SuccessResource(new CountryResource($country)))->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return CountryResource
     */
    public function show($id): CountryResource
    {
        $country = Country::findOrFail($id);
        return new CountryResource($country);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return SuccessResource
     */
    public function update(Request $request, $id): SuccessResource
    {
        $country = Country::findOrFail($id);
        $country->update([
            'name' => $request->name,
        ]);
        return new SuccessResource(new CountryResource($country));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     */
    public function destroy($id)
    {
        // todo
    }
}
