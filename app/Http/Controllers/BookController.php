<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\PublishingCompany;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BookController extends Controller
{
    public function showAdditionalData()
    {
        $authorData = Author::all();
        $categoryData = Category::all();
        $subcategoryData = SubCategory::with('category')->get();
        $subcategoryCategoryData = $subcategoryData->map(function ($subcategoryData) {
            return [
                'category_name' => $subcategoryData->category->category_name,
                'subcategory_id' => $subcategoryData->subcategory_id,
                'subcategory_name' => $subcategoryData->subcategory_name
            ];
        });
        $publishingCompanyData = PublishingCompany::all();
        return view('admin.addFunction.admin-add-book', compact('authorData', 'categoryData', 'subcategoryCategoryData', 'publishingCompanyData'));
    }

    public function addBook(Request $request)
    {
        $validatedData = $request->validate([
            'title' =>  ['required', 'string', 'max:255'],
            'ISBN' => ['required', 'string', 'max:255', 'regex:/^(978|979)[\-]?\d[\-]?\d{2}[\-]?\d{6}[\-]?\d$/'],
            'page_number' => ['required'],
            'price' => ['required'],
            'inventory_quantity' => ['required'],
            'description' => ['required', 'max:1000', 'string'],
            'book_image_path'=>['required','image', 'mimes: jpeg,png,jpg,gif'],
            'author_id' => ['required'],
            'company_id' => ['required'],
            'cover_type' => ['required'],
            'category_id' => ['required'],
            'subcategory_id' => ['required']
        ]);

        $bookData = new Book();
        $bookData->book_id = (string) Str::uuid();
        $bookData->company_id = $request->company_id;
        $bookData->title = $validatedData['title'];
        $bookData->ISBN = $validatedData['ISBN'];
        $bookData->page_number = $validatedData['page_number'];
        $bookData->cover_type = $request->cover_type;
        $bookData->price = $validatedData['price'];
        $bookData->description = $validatedData['description'];
        $bookData->inventory_quantity = $validatedData['inventory_quantity'];

        if ($request->has('book_image_path')) {
            $image = $request->file('book_image_path');
            $originalFileName = $image->getClientOriginalName(); // Get the original file name
            // Generate a unique file name (e.g., to prevent overwriting existing files)
            $imageName = time() . '_' . str_replace(' ', '_', $originalFileName);
            $image->storeAs('public/image/bookImage', $imageName);
            // Update the book_image_path column with the stored file path
            $bookData->book_image_path = 'public/image/bookImage/' . $imageName;
        }

        $bookData->save();

        //Inside each foreach loop, every ID from the arrays is attached individually to the Book instance ($bookData).
        if ($request->has('category_id')) {
            foreach ($request->category_id as $categoryId) {
                $bookData->category()->attach($categoryId, ['book_category_id' => (string) Str::uuid()]);
            }
        }
        if ($request->has('subcategory_id')) {
            foreach ($request->subcategory_id as $subcategoryId) {
                $bookData->subcategory_table()->attach($subcategoryId, ['subcategory_book_id' => (string) Str::uuid()]);
            }
        }
        if ($request->has('author_id')) {
            foreach ($request->author_id as $authorId) {
                $bookData->author()->attach($authorId, ['author_book_id' => (string) Str::uuid()]);
            }
        }

        return redirect('/redirect/admin-book-main')->with('message', 'Add successfully');
    }

    public function showBookList()
    {
        $book = Book::with('author', 'category', 'subcategory_table', 'publishing_company')->get();
        $data = $book->map(function ($book) {
            return [
                'book_id' => $book->book_id,
                'title' => $book->title,
                'author_name' => $book->author->pluck('author_name')->join(', '),
                'publishing_company_name' => $book->publishing_company->company_name,
                'book_isbn' => $book->ISBN,
                'number_of_page' => $book->page_number,
                "cover_type" => $book->cover_type,
                "price" => $book->price,
                "inventory_quantity" => $book->inventory_quantity,
                "category" => $book->category->pluck('category_name')->join(', '),
                'subcategory' => $book->subcategory_table->pluck('subcategory_name')->join(', ')
            ];
        });
        return view('admin.admin-list', compact('data'));
    }

    public function getBookWithId($book_id)
    {
        $book_with_id = Book::with('category', 'subcategory_table', 'author', 'publishing_company')->find($book_id);
        $authorData = Author::all();
        $categoryData = Category::all();
        $subcategoryData = SubCategory::all();
        $subcategoryCategoryData = $subcategoryData->map(function ($subcategoryData) {
            return [
                'category_name' => $subcategoryData->category->category_name,
                'subcategory_id' => $subcategoryData->subcategory_id,
                'subcategory_name' => $subcategoryData->subcategory_name
            ];
        });
        $publishingCompanyData = PublishingCompany::all();
        return view(
            'admin.editFunction.admin-edit-book',
            compact('book_with_id', 'authorData', 'categoryData', 'subcategoryCategoryData', 'publishingCompanyData')
        );
    }

    public function updateBookWithId(Request $request, $book_id)
    {
        $validatedData = $request->validate([
            'title' =>  ['required', 'string', 'max:255'],
            'ISBN' => ['required', 'string', 'max:255', 'regex:/^(978|979)[\-]?\d[\-]?\d{2}[\-]?\d{6}[\-]?\d$/'],
            'page_number' => ['required'],
            'price' => ['required'],
            'inventory_quantity' => ['required'],
            'description' => ['required', 'max:1000'],
            'book_image_path'=>['required','image', 'mimes: jpeg,png,jpg,gif'],
        ]);

        $book_with_id = Book::with('category', 'subcategory_table', 'author', 'publishing_company')->find($book_id);
        $book_with_id->company_id = $request->company_id;
        $book_with_id->title = $validatedData['title'];
        $book_with_id->ISBN = $validatedData['ISBN'];
        $book_with_id->page_number = $validatedData['page_number'];
        $book_with_id->cover_type = $request->cover_type;
        $book_with_id->price = $validatedData['price'];
        $book_with_id->description = $validatedData['description'];
        $book_with_id->inventory_quantity = $validatedData['inventory_quantity'];

        if ($request->has('book_image_path')) {
            $image = $request->file('book_image_path');
            $originalFileName = $image->getClientOriginalName(); // Get the original file name
            // Generate a unique file name (e.g., to prevent overwriting existing files)
            $imageName = time() . '_' . str_replace(' ', '_', $originalFileName);
            $image->storeAs('public/image/bookImage', $imageName);
            // Update the book_image_path column with the stored file path
            $book_with_id->book_image_path = 'public/image/bookImage/' . $imageName;
        }

        $book_with_id->save();

        //  For each relationship (categories, subcategories, and authors), sync takes an array of IDs and updates the associated pivot table.
        //  It will attach any IDs that are not already attached to the model and detach any that are not in the given array.
        // There's no need to generate a new UUID for each pivot table record. The sync method will handle the attachment and detachment of relationships based on the IDs you pass to it. 
        // The UUID generation would be relevant if you had custom fields in the pivot table that needed unique identifiers on each sync, but that's not a common practice.
        if ($request->has('category_id')) {
            $book_with_id->category()->detach();
            foreach ($request->category_id as $categoryId) {
                $book_with_id->category()->attach($categoryId, ['book_category_id' => (string) Str::uuid()]);
            }
        }

        if ($request->has('subcategory_id')) {
            $book_with_id->subcategory_table()->detach();
            foreach ($request->subcategory_id as $subcategoryId) {
                $book_with_id->subcategory_table()->attach($subcategoryId, ['subcategory_book_id' => (string) Str::uuid()]);
            }
        }

        if ($request->has('author_id')) {
            $book_with_id->author()->detach();
            foreach ($request->author_id as $authorId) {
                $book_with_id->author()->attach($authorId, ['author_book_id' => (string) Str::uuid()]);
            }
        }


        return redirect('/redirect/admin-book-main')->with('message', "Edit successfully");
    }

    public function deleteBook($book_id){
        $book_with_id = Book::with('category', 'subcategory_table', 'author', 'publishing_company')->find($book_id);
        $book_with_id->category()->detach();
        $book_with_id->subcategory_table()->detach();
        $book_with_id->author()->detach();
        $book_with_id->delete();
        return redirect('/redirect/admin-book-main')->with('message', "Delete successfully");
    }

    public function getBookbyIdForUser($book_id){
        $bookData = Book::with("author", "publishing_company")->find($book_id);
        return view('user.book-detail', compact('bookData'));
    }
}
