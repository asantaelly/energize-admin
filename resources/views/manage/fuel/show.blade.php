<x-app-layout>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
        
            <div class="flex items-ceter justify-evenly">
                

                <div>
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('Fuel Details') }}
                    </h2>
                </div>

                <div>
                    <a href="{{ route('fuel.edit', ['fuel' => $fuel])}}" class="px-5 py-2 bg-indigo-500 rounded-lg shadow-lg text-white">Edit Fuel</a>
                </div>
            </div>

            <div class="flex flex-row  items-center justify-center py-5">

                <div class="rounded-lg bg-white p-5 w-full sm:w-1/2">

                    <div class="flex flex-row items-center justify-between px-5 mb-3">

                        <div>
                            <h2>
                                Serial No.
                            </h2>
                        </div>

                        <div>
                            <h2>
                                000{{ $fuel->id}}
                            </h2>
                        </div>

                    </div>

                    <div class="flex flex-row items-center justify-between px-5 mb-3">

                        <div>
                            <h2>
                                Name
                            </h2>
                        </div>

                        <div>
                            <h2>
                                {{ ucfirst($fuel->name)}}
                            </h2>
                        </div>

                    </div>

                    <div class="flex flex-row items-center justify-between px-5 mb-3">

                        <div>
                            <h2>
                                Price Per Litre
                            </h2>
                        </div>

                        <div>
                            <h2>
                                {{ $fuel->price}}
                            </h2>
                        </div>

                    </div>



                    <div class="flex flex-row items-center justify-between px-5 mb-3">

                        <div>
                            <h2>
                                Fuel Amount
                            </h2>
                        </div>

                        <div>
                            <h2>
                                {{ $fuel->total_litres }}
                            </h2>
                        </div>

                    </div>



                    <div class="flex flex-row items-center justify-between px-5 mb-3">

                        <div>
                            <h2>
                                Status
                            </h2>
                        </div>

                        <div>
                            <h2>

                                @if ($fuel->status == TRUE)
                                    <span class="text-xs bg-green-600 p-1 rounded-lg text-black bg-opacity-50">Available</span>
                                @else
                                    <span class="text-xs bg-gray-600 p-1 rounded-lg text-black bg-opacity-50">Unavailable</span>
                                @endif
                            </h2>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
