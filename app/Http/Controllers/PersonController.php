<?php

namespace App\Http\Controllers;

use App\Photo;
use App\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PersonStoreFormRequest;

class PersonController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Person::class, 'person');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $persons = Person::paginate();

        $title = 'Модели';

        return view('person.index', compact('persons', 'title'));
    }

    public function forReview()
    {
        $persons = Person::forReview()->paginate();

        $title = 'Модели для чтения';

        return view('person.index', compact('persons', 'title'));
    }

    public function forModeration()
    {
        $persons = Person::notModerated()->paginate();

        $title = 'Модели для модерации';

        return view('person.index', compact('persons', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $person = new Person;

        return view('person.create', compact('person'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PersonStoreFormRequest $request)
    {
       $person = Person::create($request->all());

       $person->author_id =  Auth::id();

       $person->save();
       
       
       
       if ($request->hasFile('pic') && $request->file('pic')->isValid()) {
           
           $path = $request->file('pic')->store('/', 'public');
           
           $person->photo_path = $path;
           $person->save();
            
        }


        if ($request->hasFile('pics')) {
            
            foreach($request->file('pics') as $file) {

                if( $file->isValid()) {

                    $path = $file->store('/', 'public');
                }

                Photo::create(['person_id' => $person->id, 'path' => $path]);
            }
            
            $person->update(['stamp' => $path]);
            
        }

        return redirect()->route('person.forReview')->with('success', 'Cпасибо! Gосле модерации модель будет доступна всем пользователем для чтения!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function show(Person $person)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function edit(Person $person)
    {
        return view('person.edit', compact('person'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Person $person)
    {
        $person->update($request->all());

        $person->moderator_id =  Auth::id();
 
        $person->save();

        return redirect()->route('person.forModeration')->with('success', 'Данные обновлены!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function destroy(Person $person)
    {
        $person->delete();

        return redirect()->route('person.index')->with('success', 'Модель удалена!');
    }
}
