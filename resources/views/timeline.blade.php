<x-app-layout>
    <x-container>
        <div class="grid grid-cols-12 gap-5">
            <div class="col-span-7">
                <x-card>
                    <form action="{{ Route('statuses.create') }}" method="post">
                        @csrf
                        <div class="flex">
                            <div class="flex-shrink-0 mr-3">
                                <img class="w-10 h-10 rounded-full" src="{{ Auth::user()->gravatar() }}"
                                    alt="{{ Auth::user()->name }}">
                            </div>
                            <div class="w-full">
                                <div class="font-semibold">
                                    {{ Auth::user()->name }}
                                </div>
                                <div class="my-2">
                                    <textarea name="body" id="body" placeholder="What is on your mind?"
                                        class="form-textarea w-full border-gray-300 rounded-xl resize-none focus:border-blue-600 focus:ring focus:ring-blue-200 transition duration-200"></textarea>
                                </div>
                                <div class="text-right">
                                    <x-button>Post</x-button>
                                </div>
                            </div>
                        </div>
                    </form>
                </x-card>
                <div class="space-y-6 mt-5">
                    <div class="space-y-5">
                        <x-statuses :statuses='$statuses' />
                    </div>
                </div>
            </div>
            <div class="col-span-5">
                @if (Auth::user()->follows()->count())
                    <x-card>
                        <h1 class="font-semibold mb-5">Recently Follow</h1>
                        <div class="space-y-5">

                            <x-following :users='Auth::user()->follows()->limit(5)->get()'></x-following>
                        </div>

                    </x-card>

                @endif

            </div>
        </div>

    </x-container>
</x-app-layout>
