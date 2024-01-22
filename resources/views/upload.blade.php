<x-layout>

    <section class="px-6 py-8">

        <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 p-6 rounded-xl">

            <h1 class="text-center font-bold text-xl">Create Post!</h1>

            <form method="POST" enctype ="multipart/form-data" action="{{url('image/upload')}}" class="mt-10">
                @csrf

         <!--       <div class="mb-6">

                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="title">
                        Title
                    </label>

                    <input class="border border-gray-400 p-2 w-full"
                           type="text"
                           name="title"
                           id="title"
                           value="{{ old('title') }}"
                           required
                    >

                    @error('title')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror

                </div>


                <div class="mb-6">

                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="slug">
                        Job position
                    </label>

                    <input class="border border-gray-400 p-2 w-full"
                           type="text"
                           name="slug"
                           id="slug"
                           value="{{ old('slug') }}"
                           required
                    >

                    @error('slug')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror

                </div>


                <div class="mb-6">

                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="excerpt">
                        Company
                    </label>

                    <textarea class="border border-gray-400 p-2 w-full"
                              name="excerpt"
                              id="excerpt"
                              required
                    >{{ old('excerpt') }}</textarea>

                    @error('excerpt')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror

                </div>


                <div class="mb-6">

                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="body">
                        Description
                    </label>

                    <textarea class="border border-gray-400 p-2 w-full"
                              name="body"
                              id="body"
                              required
                    >{{ old('body') }}</textarea>

                    @error('body')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror

                </div>


                <div class="mb-6">

                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="category_id">
                        Category
                    </label>

                    <select name="category_id" id="category_id">

                        @php
                            $categories = \App\Models\Category::all();

                        @endphp

                        @foreach(@$categories as $category)
                            <option value="{{ $category->id }}" >{{ $category->name }}</option>
                        @endforeach

                    </select>

                    @error('category')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror

                </div>

-->
                <div class="mb-6">

                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="image_src">
                        Image
                    </label>

                    <td> <input class="border border-gray-400 p-2 w-full"
                              type="text" name ="img_alt"
                    /></td>

                    <td> <input class="border border-gray-400 p-2 w-full"
                                type="file" name ="img_src"
                        /></td>

                    @error('image')
                    <p class="text-red-500 text-5xl mt-1">{{ $message }}</p>
                    @enderror

                </div>


                <div class="mb-6">

                    <button type="submit"
                            class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500"
                    >
                        Publish
                    </button>

                </div>


                @if ($errors->any())
                    <ul>
                        @foreach($errors->all() as $error)
                            <li class="text-red-500 text-xs mt-1">{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
            </form>

        </main>

    </section>

</x-layout>
