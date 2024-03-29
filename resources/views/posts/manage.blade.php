<x-layout>

    <section class="px-6 py-8">

        <main class="max-w-5xl mx-auto mt-10 bg-gray-100 border border-gray-200 p-6 rounded-xl">

            <h1 class="text-center font-bold text-xl">Manage Post</h1>

            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 allign middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow oveflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <tbody class="bg-white divide-y divide-gray-200">

                                @foreach($posts as $post)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="text-sm font-medium text-gray-900">
                                                    <a href="/posts/{{ $post->slug }}">
                                                        {{ $post->title }}
                                                    </a>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="px-6 py-1 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="/posts/{{ $post->id }}/edit"
                                               class="text-blue-500 hover:text-blue-600"
                                            >Edit</a>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">

                                            <form method="POST" action="/posts/{{$post->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="text-xs text-gray-400">
                                                    Delete</button>

                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </main>

    </section>

</x-layout>
