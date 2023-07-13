<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-4">
                        <span>
                            Name:
                        </span>

                        <span>
                            {{$product->name}}
                        </span>
                    </div>

                    <div class="mb-4">
                        <span>
                            Price: 
                        </span>

                        <span>
                            {{$product->price}}
                        </span>
                    </div>

                    <div class="mb-4">
                        <span>
                            Category:
                        </span>

                        <span>
                            {{$product->category->name}}
                        </span>
                    </div>

                    <div class="mb-4">
                        <span>
                            Description:
                        </span>

                        <span>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero numquam, quos eius totam vero ab tempore provident iste dolores at! Tempora aliquid aspernatur sed iste voluptatibus doloremque natus nostrum provident?
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
