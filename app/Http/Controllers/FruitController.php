<?php

namespace App\Http\Controllers;

use App\Models\Fruit;
use App\Http\Requests\StoreFruitRequest;
use App\Http\Requests\UpdateFruitRequest;

class FruitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fruits = Fruit::paginate(10);
        return view('fruits.index', compact('fruits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = ['Citrus', 'Berry', 'Tropical', 'Stone Fruit', 'Melons', 'Grapes', 'Apples', 'Pears'];
        return view('fruits.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFruitRequest $request)
    {
        Fruit::create($request->validated());
        return redirect()->route('fruits.index')->with('success', 'Fruit added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Fruit $fruit)
    {
        return view('fruits.show', compact('fruit'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fruit $fruit)
    {
        $categories = ['Citrus', 'Berry', 'Tropical', 'Stone Fruit', 'Melons', 'Grapes', 'Apples', 'Pears'];
        return view('fruits.edit', compact('fruit', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFruitRequest $request, Fruit $fruit)
    {
        $fruit->update($request->validated());
        return redirect()->route('fruits.show', $fruit)->with('success', 'Fruit updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fruit $fruit)
    {
        $fruit->delete();
        return redirect()->route('fruits.index')->with('success', 'Fruit deleted successfully!');
    }
}
