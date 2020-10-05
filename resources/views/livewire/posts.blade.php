<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Blog Posts
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            <button wire:click="create()"
                    class="h-10 px-5 text-sm bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">Create New Post
            </button>

            @if($confirmingDeletingPost)
            <!-- Delete Token Confirmation Modal -->
                <x-jet-confirmation-modal wire:model="confirmingDeletingPost">
                    <x-slot name="title">
                        {{ __('Delete API Token') }}
                    </x-slot>

                    <x-slot name="content">
                        {{ __('Are you sure you would like to delete this API token?') }}
                    </x-slot>

                    <x-slot name="footer">
                        <x-jet-secondary-button wire:click="$toggle('confirmingDeletingPost')"
                                                wire:loading.attr="disabled">
                            {{ __('Nevermind') }}
                        </x-jet-secondary-button>

                        <x-jet-danger-button class="ml-2" wire:click="deletePost" wire:loading.attr="disabled">
                            {{ __('Delete') }}
                        </x-jet-danger-button>
                    </x-slot>
                </x-jet-confirmation-modal>

            @endif

            @if($postModalForm)
                @include('livewire.create')
            @endif


            <div class="my-2 flex sm:flex-row flex-col">
                <div class="flex flex-row mb-1 sm:mb-0">
                    <div class="relative">
                        <select
                            class="appearance-none h-full rounded-l border block appearance-none w-full bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                            <option>5</option>
                            <option>10</option>
                            <option>20</option>
                        </select>
                        <div
                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="relative">
                        <select
                            class="appearance-none h-full rounded-r border-t sm:rounded-r-none sm:border-r-0 border-r border-b block appearance-none w-full bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:border-l focus:border-r focus:bg-white focus:border-gray-500">
                            <option>All</option>
                            <option>Active</option>
                            <option>Inactive</option>
                        </select>
                        <div
                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="block relative">
                    <span class="h-full absolute inset-y-0 left-0 flex items-center pl-2">
                        <svg viewBox="0 0 24 24" class="h-4 w-4 fill-current text-gray-500">
                            <path
                                d="M10 4a6 6 0 100 12 6 6 0 000-12zm-8 6a8 8 0 1114.32 4.906l5.387 5.387a1 1 0 01-1.414 1.414l-5.387-5.387A8 8 0 012 10z">
                            </path>
                        </svg>
                    </span>
                    <input placeholder="Search"
                           class="appearance-none rounded-r rounded-l sm:rounded-l-none border border-gray-400 border-b block pl-8 pr-6 py-2 w-full bg-white text-sm placeholder-gray-400 text-gray-700 focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none"/>
                </div>
            </div>

            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead>
                                <tr>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Name
                                    </th>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Title
                                    </th>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Status
                                    </th>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Role
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($posts as $post)
                                    <tr class="group">
                                        <td class="px-6 py-4 whitespace-no-wrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-10 w-10">
                                                    <img class="h-10 w-10 rounded-full"
                                                         src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=4&amp;w=256&amp;h=256&amp;q=60"
                                                         alt="">
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm leading-5 font-medium text-gray-900">
                                                        {{ $post->title  }}
                                                    </div>
                                                    <div
                                                        class="flex flex-row items-center opacity-0 group-hover:opacity-100 ">
                                                        <div wire:click="edit({{ $post->id }})"
                                                             class="text-xs font-medium text-gray-500 flex flex-row items-center mr-2 text-blue-400 hover:text-blue-800 hover:underline">
                                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor"
                                                                 viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                      stroke-width="1"
                                                                      d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                            </svg>
                                                            <span>Edit</span>
                                                        </div>

                                                        <div wire:click="confirmDelete({{ $post->id }})"
                                                             class="text-xs font-medium text-gray-500 flex flex-row items-center text-blue-400 hover:text-blue-800 hover:underline">
                                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor"
                                                                 viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                      stroke-width="1"
                                                                      d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                            </svg>
                                                            <span>Delete</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap">
                                            <div class="text-sm leading-5 text-gray-900">{{  $post->body }}</div>
                                            <div class="text-sm leading-5 text-gray-500">Optimization</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                  Active
                </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                                            Admin
                                        </td>
                                    </tr>
                                @endforeach
                                <!-- More rows... -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            {{ $posts->links() }}


        </div>
    </div>

    <div class="absolute bottom-0 right-0">
@if (session()->has('message'))
        <div class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-green-400"
             x-data="{ isShow: false }"
              x-init="setTimeout(() => {
                isShow = true;
              }, 10);
              setTimeout(() => {
                isShow = false;
              }, 3000);
              "
             x-show="isShow"

             x-transition:enter="transition ease-out duration-1000"
             x-transition:enter-start="opacity-0 transform scale-90"
             x-transition:enter-end="opacity-100 transform scale-100"

             x-transition:leave="transition ease-in duration-500"
             x-transition:leave-start="opacity-100 transform scale-100"
             x-transition:leave-end="opacity-0 transform scale-90"
        >
  <span class="text-xl inline-block mr-5 align-middle">
<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
    <path
        stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path></svg>
  </span>
            <span class="inline-block align-middle mr-8">
                <p class="font-bold">Success!</p>
                <p class="text-sm">{{ session('message') }}</p>
  </span>
            <button
                class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none"
                @click="isShow = false">
                <span>×</span>

            </button>
        </div>
@endif

{{--        <div class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-red-400"--}}
{{--             x-data="{ isShow: true }"--}}
{{--              x-init="setTimeout(() => {--}}
{{--                isShow = false;--}}
{{--              }, 1500);--}}
{{--              "--}}
{{--             x-show="isShow"--}}
{{--             x-transition:leave="transition ease-in duration-1000"--}}
{{--             x-transition:leave-start="opacity-100 transform scale-100"--}}
{{--             x-transition:leave-end="opacity-0 transform scale-90"--}}
{{--        >--}}
{{--            <span class="text-xl inline-block mr-5 align-middle">--}}
{{--                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">--}}
{{--                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>--}}
{{--                </svg>--}}
{{--            </span>--}}
{{--            <span class="inline-block align-middle mr-8">--}}
{{--                    <p class="font-bold">Error!</p>--}}
{{--                    <p class="text-sm">Post didn't created.</p>--}}
{{--            </span>--}}
{{--            <button class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none" @click="isShow = false">--}}
{{--                <span>×</span>--}}
{{--            </button>--}}
{{--        </div>--}}


    </div>

</div>

