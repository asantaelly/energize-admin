<x-app-layout>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
        
            <div class="flex items-center justify-center">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Register Fuel') }}
                </h2>
            </div>

            <div class="flex flex-row items-center justify-center py-5">

                <div class="rounded-lg bg-white p-5 w-full sm:w-2/3">

                    <form action="{{ route('fuel.store')}}" method="POST" class="">
                        @csrf
    
                        <div class="py-3">
                            <label for="name">Name<span class="text-red-500">*</span></label>
                            <div class="py-2">
                                <input name="name" id="name" class="bg-gray-200 p-3 w-full rounded-lg focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 @error('name') is-invalid @enderror" placeholder="Name" required />

                                @error('name')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                           
                        </div>

                        <div class="py-3">
                            <label for="price">Price<span class="text-red-500">*</span></label>
                            <div class="py-2">
                                <input name="price" id="price" class="bg-gray-200 p-3 w-full rounded-lg focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500  @error('price') is-invalid @enderror" placeholder="Enter Price" required />

                                @error('price')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="py-3">
                            <label for="amount">Fuel amount</label>
                            <div class="py-2">
                                <input name="total_litres" id="total_litres" class="bg-gray-200 p-3 w-full rounded-lg focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 " placeholder="Enter fuel in Litres" />
                            </div>
                        </div>
    
    
                        <div class="flex flex-column items-center justify-start">
                            <div class="py-2 px-3">
                                <input type="radio" id="status" name="status" value=1 class="p-2 rounded-lg shadow-lg" checked>
                                <label for="status">Available</label>
                            </div>

                            <div class="py-2 px-3">
                                <input type="radio" id="statusUnavailable" name="status" value=0>
                                <label for="statusUnavailable">Unvailable</label>
                            </div>
                            
                        </div>

                        <div class="flex items-center justify-end">
                            <button type="submit" class="bg-indigo-500 px-10 py-3 rounded text-white">Register Fuel</button>
                        </div>
                        
                    </form>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
