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
                    <form action="#" method="" class="">
    
                        <div class="py-3">
                            <label for="name">Name</label>
                            <div class="py-2">
                                <input name="name" id="name" value="Petrol" class="bg-gray-200 p-3 w-full rounded-lg focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 " placeholder="Name" />
                            </div>
                           
                        </div>

                        <div class="py-3">
                            <label for="price">Price</label>
                            <div class="py-2">
                                <input name="name" id="name" value="2,994" class="bg-gray-200 p-3 w-full rounded-lg focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 " placeholder="Enter Price" />
                            </div>
                        </div>

                        <div class="py-3">
                            <label for="amount">Fuel amount</label>
                            <div class="py-2">
                                <input name="amount" id="amount" value="15,238" class="bg-gray-200 p-3 w-full rounded-lg focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 " placeholder="Enter fuel in Litres" />
                            </div>
                        </div>
    
    
                        <div class="flex flex-column items-center justify-start">
                            <div class="py-2 px-3">
                                <input type="radio" id="status" name="status" value="available" class="p-2 rounded-lg shadow-lg" checked>
                                <label for="status">Available</label>
                            </div>

                            <div class="py-2 px-3">
                                <input type="radio" id="statusUnavailable" name="status" value="unavailable">
                                <label for="statusUnavailable">Unvailable</label>
                            </div>
                            
                        </div>

                        <div class="flex items-center justify-end">
                            <button type="submit" class="bg-indigo-500 px-10 py-3 rounded">Edit Fuel</button>
                        </div>
                        
                    </form>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
