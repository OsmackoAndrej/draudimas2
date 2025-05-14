<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarRequest;
use App\Models\Car;
use App\Models\CarPhoto;

class CarsController extends Controller
{
    public function index()
    {
        $cars = Car::with('owner')->get();
        return view('cars.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('cars.create'        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate();
        $car = new Car();
        $car->reg_number = $request->reg_number;
        $car->brand = $request->brand;
        $car->model = $request->model;
        $car->owner_id = $request->owner_id;
        $car->save();

        return redirect()->route('cars.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        return view('cars.edit', ['car' => $car]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CarRequest $request, Car $car)
    {
       // dd($request->messages());

        // dd($request->all()); // Посмотрим, что приходит в запросе
        if ($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'image|max:2048', // Проверяем, что это изображение и его размер
            ]);

            // Сохраняем файл в папку `storage/app/public/car_photos`
            $path = $request->file('photo')->store('car_photos', 'public');

            // Добавляем запись в таблицу `car_photos`
            CarPhoto::create([
                'car_id' => $car->id,
                'photo' => $path,
            ]);
        }


    //$car = new Car();
        //dd($car);  dump and die. ostanovka.
       // $request->validate();
        $car->reg_number=$request->reg_number;
        $car->brand=$request->brand;
        $car->model=$request->model;
        $car->owner_id=$request->owner_id;
        $car->save();

        return redirect()->route('cars.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        $car->delete();
        return redirect()->route('cars.index');
    }
}
