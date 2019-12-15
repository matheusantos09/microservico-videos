<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /*
     *
     * Existem duas formas de fazer a consulta usando o Depency Inject:
     *
     * Implicito é onde apeas se passa o TypeHint (Classe junto com a varaivel) como parametro e se
     * subentende oque será feito por traz para hidratar a variavel
     *
     * Explicito é quando nos adicionamos alguma validação para que os dados sejam tratados diferente e
     * por sequencia hidratar a variavel.
     *
     */


    private $rules = [
        'name'      => 'required|max:255',
        'is_active' => 'boolean'
    ];

    //GET
    public function index()
    {
        return Category::where('is_active', true)->get();
    }

    //POST
    public function store(Request $request)
    {
        $this->validate($request, $this->rules);

        return Category::create($request->all());
    }

    //GET
    public function show(Category $category) // Route Model Binding
    {
        return $category;
    }

    //PUT
    public function update(Request $request, Category $category)
    {
        $this->validate($request, $this->rules);
        $category->update($request->all());

        return $category;
    }

    //DELETE
    public function destroy(Category $category)
    {
        $category->delete();

        return response()->noContent(); // Status Code 204
    }
}
