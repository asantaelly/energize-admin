<x-app-layout>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
        
            <div class="flex items-ceter justify-center">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Edit Fuel') }}
                </h2>
            </div>

            <div class="flex flex-row items-center justify-center py-5">

                <div class="rounded-lg bg-white p-5 w-1/2">
                    <form action="{{ route('fuel.update', ['fuel' => $fuel->id ])}}" method="POST" class="">
                        @method('PUT')
                        @csrf

                        <div class="py-3">
                            <label for="name">Name</label>
                            <div class="py-2">
                                <input name="name" id="name" value="{{ ucfirst($fuel->name) }}" class="bg-gray-200 p-3 w-full rounded-lg focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 @error('name') is-invalid @enderror" placeholder="Name" />

                                @error('name')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>


                           
                        </div>

                        <div class="py-3">
                            <label for="price">Price</label>
                            <div class="py-2">
                                <input name="price" id="price" value="{{ $fuel->price}}" class="bg-gray-200 p-3 w-full rounded-lg focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 @error('price') is-invalid @enderror" placeholder="Enter Price" />

                                @error('price')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="py-3">
                            <label for="total_litres">Fuel total litres</label>
                            <div class="py-2">
                                <input name="total_litres" id="total_litres" value="{{ $fuel->total_litres}}" class="bg-gray-200 p-3 w-full rounded-lg focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 @error('total_litres') is-invalid @enderror" placeholder="Enter fuel in Litres" />

                                @error('total_litres')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
    
    
                        <div class="flex flex-column items-center justify-start">
                            <div class="py-2 px-3">
                                @if($fuel->status == TRUE)
                                    <input type="radio" id="statusAvailable" name="status" value="{{ $fuel->status}}" class="p-2 rounded-lg shadow-lg" checked>
                                @else
                                    <input type="radio" id="statusAvailable" name="status" value="{{ __(TRUE)}}" class="p-2 rounded-lg shadow-lg">
                                @endif
                                <label for="statusAvailable">Available</label>
                            </div>

                            <div class="py-2 px-3">
                                @if($fuel->status == FALSE)
                                    <input type="radio" id="statusUnavailable" name="status" value="{{ $fuel->status }}" class="p-2 rounded-lg shadow-lg" checked>
                                @else
                                    <input type="radio" id="statusUnavailable" name="status" value=0 class="p-2 rounded-lg shadow-lg">
                                @endif
                                <label for="statusUnavailable">Unvailable</label>
                            </div>


                            @error('status')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                            
                        </div>

                        <div class="flex items-center justify-end">
                            <button type="submit" class="bg-indigo-500 px-10 py-3 rounded text-white">Edit Fuel</button>
                        </div>
                        
                    </form>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
