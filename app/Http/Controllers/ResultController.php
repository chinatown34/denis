<?php

namespace App\Http\Controllers;

use App\Person;
use App\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ResultStoreFormRequest;
use App\Http\Requests\ResultUpdateFormRequest;

class ResultController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Result::class, 'result');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = Result::paginate();

        $title = 'Чтение лиц';

        return view('result.index', compact('results', 'title'));
    }

    public function forModeration()
    {
        $results = Result::notModerated()->paginate();

        $title = 'Чтение лиц для модерации';

        return view('result.index', compact('results', 'title'));
    }

    public function moderated()
    {
        $results = Result::moderated()->paginate();

        $title = 'Чтение лиц модерированные';

        return view('result.index', compact('results', 'title'));
    }

    public function mineAll()
    {
        $results = Result::mine()->paginate();

        $title = 'Мои оценки';

        return view('result.results', compact('results', 'title'));
    }

    public function mine()
    {
        $results = Result::moderated()->mine()->paginate();

        $title = 'Мои результаты';

        return view('result.results', compact('results', 'title'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $result = new Result;

        $person = Person::forReview()->get();
        // dd($person);
        $person = Person::forReview()->first();

        if(is_null($person)) {

            return view('result.no_models');
        }

        $result->person_id = $person->id;

        return view('result.create', compact('result'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ResultStoreFormRequest $request)
    {
        $result = Result::make($request->all());
        $result->author_id =  Auth::id();

        $result->save();
        

        return redirect()->route('result.show', $result)->with('success', 'Модель оценена!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function show(Result $result)
    {
        return view('result.show', compact('result'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function edit(Result $result)
    {
        return view('result.edit', compact('result'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function update(ResultUpdateFormRequest $request, Result $result)
    {
        $result->update($request->all());

        $result->moderator_id =  Auth::id();
        $result->moderated_at =  now();
 
        $result->save();

        return redirect()->route('result.forModeration')->with('success', 'Данные обновлены!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function destroy(Result $result)
    {
        $result->save();

        return redirect()->route('result.index')->with('success', 'Оценка удалена!');
    }
}
