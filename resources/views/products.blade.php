<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="flex justify-between mx-auto mb-4 w-1/3">
                        <input id="search-name" class="border border-black rounded py-1 px-2" typet="text" placeholder="Name"/>

                        <input id="search-price" class="border border-black rounded py-1 px-2" typet="number" placeholder="Price"/>

                        <select id="search-cat" class="border-black rounded py-1 pr-9 pl-2">
                            <option value="" selected disabled>
                                -- select category --
                            </option>

                            @foreach ($categories as $category)
                            <option value="{{$category->id}}">
                                {{$category->name}}
                            </option>
                            @endforeach

                        </select>
                    </div>


                    <!-- Table for patient info, patient status, appointments, tasks, notes, actions -->
                    <table class="table-auto border-collapse w-4/12 mx-auto">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="border-b-2 border-r-2 text-left px-4 py-2 w-1/3">{{ __("Product Name") }}</th>
                                <th class="border-b-2 border-r-2 text-left px-4 py-2 w-1/3">{{ __("Product Price") }}</th>
                                <th class="border-b-2 border-r-2 text-left px-4 py-2 w-1/3 ">{{ __("Product Category") }}</th>
                            </tr>
                        </thead>
                        <tbody id="product-body">
                            <!-- Add rows for each patient here -->
                            @foreach ($products as $product)

                                <tr>
                                   
                                    <td class="border px-4 py-2">
                                        <a 
                                          href="{{ route('product', ['id' => $product->id]) }}"

                                          class="text-blue-500 hover:text-blue-700"
                                        >
                                        {{$product->name}}
                                        </a>
                                    </td>
                                    

                                    <td class="border px-4 py-2">
                                        <div class="flex justify-between">
                                            <span>Php</span> 
                                            
                                            <span>{{number_format($product->price, 2, '.', ',')}}</span>
                                        </div>
                                    </td>

                                    <td class="border px-4 py-2 text-center">
                                        {{$product->category->name}}
                                    </td>
                                </tr>
                           
                            @endforeach
                            <!-- Add more rows for each patient here -->
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
