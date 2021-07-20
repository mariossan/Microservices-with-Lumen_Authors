<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response as HttpResponse;

class AuthorController extends Controller
{
    use ApiResponser;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /*
    * Method to return list of authors
    * @return Illuminate\Http\Response
    */
    public function index()
    {
        return $this->successResponse(Author::all());
    }

    /*
    * Method to return list of authors
    * @return Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $rules = [
            "name" => "required|max:255",
            "gender" => "required|max:255|in:male,female",
            "country" => "required|max:255",
        ];

        $this->validate($request, $rules);

        $author = Author::create($request->all());

        return $this->successResponse($author, HttpResponse::HTTP_CREATED);
    }

    /*
    * Method to create an author
    * @return Illuminate\Http\Response
    */
    public function show($author)
    {
        $author = Author::findOrFail($author);
        return $this->successResponse($author, HttpResponse::HTTP_CREATED);
    }

    /*
    * Method to return list of authors
    * @return Illuminate\Http\Response
    */
    public function update(Request $request, $author)
    {
        $rules = [
            "name" => "required|max:255",
            "gender" => "required|max:255|in:male,female",
            "country" => "required|max:255",
        ];

        $this->validate($request, $rules);

        $author = Author::findOrFail($author);
        $author->fill( $request->all() );

        if ( $author->isClean() ) {
            return $this->errorResponse("At leastone value must change", HttpResponse::HTTP_UNPROCESSABLE_ENTITY);
        }

        $author->save();

        return $this->successResponse($author);

    }

    /*
    * Method to return list of authors
    * @return Illuminate\Http\Response
    */
    public function destroy($author)
    {
        $author = Author::findOrFail($author);
        $author->delete();

        return $this->successResponse($author);
    }
}
