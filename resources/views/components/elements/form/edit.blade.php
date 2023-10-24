{{-- 編集 --}}
<form action="{{ route('app.post.update', $post) }}" method="post" class="ml-10 w-full">
  <h1 class="text-4xl mt-5">Edit Post</h1>
  <hr class="my-6 border-gray-200 dark:border-gray-600 w-4/5 mt-10" />
  {{-- 保存しましたと表示 --}}
  @if(session('message'))
    <div class="text-red-600 font-bold">
      {{ session('message') }}
    </div>
  @endif
  @csrf
  @method('patch')
    <div class="w-1/6 mt-10">
      <label for="title" class="block text-sm text-gray-500 dark:text-gray-300">Title</label>
      <x-input-error :messages="$errors->get('title')"></x-input-error>
      <input type="date" name="title" id="title" placeholder="Title" value="{{ old('deadline', $post->deadline) }}" class="block  mt-2 w-full placeholder-gray-400/70 dark:placeholder-gray-500 rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-blue-300" />
    </div>
    <div class="w-4/5 mt-10">
      <label for="title" class="block text-sm text-gray-500 dark:text-gray-300">Title</label>
      <x-input-error :messages="$errors->get('title')"></x-input-error>
      <input type="text" name="title" id="title" placeholder="Title" value="{{ old('title', $post->title) }}" class="block  mt-2 w-full placeholder-gray-400/70 dark:placeholder-gray-500 rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-blue-300" />
    </div>
    <div class="w-4/5">
      <label for="body" class="block text-sm text-gray-500 dark:text-gray-300 mt-5">body</label>
      <x-input-error :messages="$errors->get('body')"></x-input-error>
      <textarea id="body" name="body" placeholder="body" class="block  mt-2 w-full  placeholder-gray-400/70 dark:placeholder-gray-500 rounded-lg border border-gray-200 bg-white px-4 h-32 py-2.5 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-blue-300">{{ old('body', $post->body) }}</textarea>
    </div>
    <div class="mt-5">
      <button class="px-6 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80 flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M16.1 260.2c-22.6 12.9-20.5 47.3 3.6 57.3L160 376V479.3c0 18.1 14.6 32.7 32.7 32.7c9.7 0 18.9-4.3 25.1-11.8l62-74.3 123.9 51.6c18.9 7.9 40.8-4.5 43.9-24.7l64-416c1.9-12.1-3.4-24.3-13.5-31.2s-23.3-7.5-34-1.4l-448 256zm52.1 25.5L409.7 90.6 190.1 336l1.2 1L68.2 285.7zM403.3 425.4L236.7 355.9 450.8 116.6 403.3 425.4z" /></svg>
        <span class="ml-2">Update</span>
      </button>
    </div>
</form>
