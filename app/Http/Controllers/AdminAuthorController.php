<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminAuthorController extends Controller
{
    public function addAuthor(Request $request)
    {
        $validatedData = $request->validate(
            [
                'author_name' => ['required', 'regex:/^[a-zA-Z\s&.]+$/'],
            ],
            [
                'author_name.regex' => 'Wrong format for name of author'
            ]
        );

        $data = new Author;
        $data->author_id = (string) Str::uuid();
        $data->author_name = $validatedData['author_name'];
        $data->save();

        return redirect('/admin-author-main')
            ->with('message', 'Add successfully');
    }

    public function showAuthorList()
    {
        $data = Author::all();
        return view('admin.admin-list', compact('data'));
    }

    public function getAuthorWithIdInfor($author_id)
    {
        $author_with_id = Author::find($author_id);
        return view('admin.editFunction.admin-edit-author', compact('author_with_id'));
    }

    public function updateAuthorWithIdInfor(Request $request, $author_id)
    {
        $validatedData = $request->validate(
            [
                'author_name' => ['required', 'regex:/^[a-zA-Z\s&.]+$/'],
            ],
            [
                'author_name.regex' => 'Wrong format for name of author'
            ]
        );

        $author_with_id = Author::find($author_id);
        $author_with_id->author_name = $validatedData['author_name'];

        $author_with_id->save();

        return redirect('/admin-author-main')->with('message', "Edit successfully");
    }

    public function deleteAuthor($author_id)
    {
        $author_with_id = Author::find($author_id);
        $author_with_id->delete();
        return redirect('/admin-author-main')->with('message', "Delete successfully");
    }
}
