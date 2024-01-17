<x-admin-layout>
    <h2 class="main_page_title">Book - {{$book_with_id->title}}</h2>
    <div class="row">
        <div class="col-8">
            <div class="form_container_for_book">
                <form enctype="multipart/form-data" method="POST" action="{{url('/admin-book-edit', $book_with_id->book_id)}}">
                    @csrf

                    <div class="input_container">
                        <label for="title" class="form-label" style='width:230px'>Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{$book_with_id->title}}">
                    </div>
                    @error('title')
                    <div class="error_display">{{ $message }}</div>
                    @enderror

                    <div class="input_container">
                        <p class="category_label">Author</p>
                        <div class="category_checkbox_container">
                            @foreach($authorData as $data)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="{{$data->author_id}}" id="{{$data->author_name}}" name="author_id[]" @if(in_array($data->author_id, $book_with_id->author->pluck('author_id')->toArray())) checked @endif
                                >
                                <label class="form-check-label" for="{{$data->author_name}}">
                                    {{$data->author_name}}
                                </label>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="input_container">
                        <label class="form-label" style='width:230px'>Publishing Company</label>
                        <select class="form-select" aria-label="Default select example" name="company_id">
                            <option value="">Select a publishing company</option>
                            @foreach($publishingCompanyData as $data)
                            <option value="{{$data->company_id}}" @if ($data->company_id == $book_with_id->company_id) selected @endif>
                                {{$data->company_name}}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="input_container">
                        <label for="ISBN" class="form-label" style='width:230px'>ISBN-13</label>
                        <input type="number" class="form-control" id="ISBN" name="ISBN" value="{{$book_with_id->ISBN}}">
                    </div>
                    @error('ISBN')
                    <div class="error_display">{{ $message }}</div>
                    @enderror

                    <div class="input_container">
                        <label for="page_number" class="form-label" style='width:230px'>Number of page</label>
                        <input type="number" class="form-control" id="page_number" name="page_number" value="{{$book_with_id->page_number}}">
                    </div>
                    @error('page_number')
                    <div class="error_display">{{ $message }}</div>
                    @enderror

                    <div class="input_container">
                        <p class="cover_type_label">Choose a cover type</p>
                        <div class="radio_container">
                            <div class="form-check" style="margin-bottom: 10px;">
                                <input class="form-check-input" type="radio" name="cover_type" id="soft_cover" value="Soft Cover" @if ($book_with_id->cover_type == "Soft Cover") checked @endif
                                >
                                <label class="form-check-label" for="soft_cover" style="margin-top: 0px;">
                                    Soft cover
                                </label>
                            </div>
                            <div class="form-check" style="margin-bottom: 10px;">
                                <input class="form-check-input" type="radio" name="cover_type" id="hard_cover" value="Hard Cover" @if ($book_with_id->cover_type == "Hard Cover") checked @endif>
                                <label class="form-check-label" for="hard_cover" style="margin-top: 0px;">
                                    Hard cover
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="cover_type" id="boxset" value="Boxset" @if ($book_with_id->cover_type == "Boxset") checked @endif>
                                <label class="form-check-label" for="boxset" style="margin-top: 0px;">
                                    Boxset
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="input_container">
                        <label for="price" class="form-label" style='width:230px'>Price</label>
                        <input class="form-control" id="price" name="price" type="number" min='0' value="{{$book_with_id->price}}">
                    </div>
                    @error('price')
                    <div class="error_display">{{ $message }}</div>
                    @enderror

                    <div class="input_container">
                        <label for="description" class="form-label" style='width:230px'>Description</label>
                        <textarea class="form-control" id="description" rows="3" name="description">
                        {{$book_with_id->description}}
                        </textarea>
                    </div>
                    @error('description')
                    <div class="error_display">{{ $message }}</div>
                    @enderror

                    <div class="input_container">
                        <label for="inventory_quantity" class="form-label" style='width:230px'>Inventory Quantity</label>
                        <input type="number" class="form-control" id="inventory_quantity" name="inventory_quantity" min='0' value="{{$book_with_id->inventory_quantity}}">
                    </div>
                    @error('inventory_quantity')
                    <div class="error_display">{{ $message }}</div>
                    @enderror

                    <div class="input_container">
                        <p class="category_label">Category</p>
                        <div class="category_checkbox_container">
                            @foreach($categoryData as $data)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="{{$data->category_id}}" id="{{$data->category_name}}" name="category_id[]" @if(in_array($data->category_id, $book_with_id->category->pluck('category_id')->toArray())) checked @endif
                                >
                                <label class="form-check-label" for="{{$data->category_name}}">
                                    {{$data->category_name}}
                                </label>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="input_container">
                        <p class="category_label">Subcategory</p>
                        <div class="category_checkbox_container">
                            @foreach($subcategoryCategoryData as $data)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="{{$data['subcategory_id']}}" id="{{$data['subcategory_name']}}" name="subcategory_id[]" @if(in_array($data['subcategory_id'], $book_with_id->subcategory_table->pluck('subcategory_id')->toArray())) checked @endif
                                >
                                <label class="form-check-label" for="{{$data['subcategory_name']}}">
                                    {{$data['subcategory_name']}} - {{$data['category_name']}}
                                </label>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="input_container book_upload_button">
                        <label style='width:178px'>Upload image file</label>
                        <input type="file" name="book_image_path" id="image_input">
                        <img id="image_preview" src="#" alt="Image Preview">
                    </div>
                    @error('book_image_path')
                    <div class="error_display">{{ $message }}</div>
                    @enderror

                    <div class="submit_form">
                        <button type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-3">
            <?php
            $imageUrl = Illuminate\Support\Facades\Storage::url($book_with_id->book_image_path);
            ?>
            @if($imageUrl=="/storage/")
            <p class="book_image_alert">No image available!</p>
            @else
            <img class="book_image" src="{{$imageUrl}}" />
            @endif
        </div>
    </div>


    <script>
        const imageInput = document.getElementById('image_input');
        const imagePreview = document.getElementById('image_preview');

        imageInput.addEventListener('change', function() {
            const file = this.files[0];

            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    imagePreview.style.display = 'block';
                };

                reader.readAsDataURL(file);
            } else {
                imagePreview.src = '#';
                imagePreview.style.display = 'none';
            }
        });
    </script>
</x-admin-layout>