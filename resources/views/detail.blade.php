<x-layouts.app>
<style>
    .carousel-item {
  height: 400px; /* Adjust as needed */
  overflow: hidden;
}

.carousel-item img {
  width: 100%; /* Ensure image fills the width */
  height: 100%; /* Ensure image fills the height of the item */
  object-fit: cover; /* Crop image to fill, maintaining aspect ratio */
}
</style>

    <x-slot name="title">Home Page</x-slot>

        <div id="dt" class="w-full flex flex-col justify-between items-center mx-auto mt-5 ">
            <div class="flex xl:flex-row xl:w-full flex-col gap-4 ">
                <div class="xl:flex-row xl:w-full border-1  border-gray-300 rounded-lg p-4 h-fit  bg-white">
                    <div class="row">
                        <div class="col-lg-6">
                            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner rounded-lg  ">
                                        @foreach ($dtimg as $key=>$item )
                                            @if($key==0)
                                            <div class="carousel-item active">  
                                                <img src="/storage/{{ $item->catalog_images }}" class="d-block w-100 " alt="...">
                                            </div>
                                            @else
                                            <div class="carousel-item ">
                                                <img src="/storage/{{ $item->catalog_images }}" class="d-block w-100" alt="...">
                                            </div>
                                            @endif
                                        @endforeach


                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                            </div>
                            <hr class="my-4">
                            <div class="flex flex-col my-2">
                                <span class="font-semibold">Share:</span>
                                <div class="flex space-x-4 mt-2">
                                    <a href="#" class="text-blue-600 hover:text-blue-800">Facebook</a>
                                    <a href="#" class="text-blue-400 hover:text-blue-600">Twitter</a>
                                    <a href="#" class="text-pink-600 hover:text-pink-800">Instagram</a>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-6">                                
                            <h2 class="text-2xl font-bold">{{ $dt[0]->name }}</h2>
                            <p class="text-gray-600 mt-2">{{ $dt[0]->category_name }} • {{ $dt[0]->group_name }}</p>
                            <p class="text-gray-800 mt-2">Duration: {{ $dt[0]->duration }} minutes</p>
                            <p style="color:#068498" class="text-2xl  mt-2 font-semibold">{{ $dt[0]->currency_code }} {{ number_format($dt[0]->price, 0, ',', '.') }}</p>
                            <hr class="my-4">

                            {!! $dt[0]->description !!}

                        </div>
                    </div>
                    
                </div>


                <div class=" xl:flex-row xl:w-2/6 border-1  border-gray-300 rounded-lg p-4 h-fit  bg-white">
                    <h2 class="text-2xl font-bold">Order</h2>
                    <div class="flex flex-col my-2">
                        <div class="flex justify-between my-2">
                            <span>Price</span>
                            <span style="color:#068498" class="font-semibold">{{ $dt[0]->currency_code }} {{ number_format($dt[0]->price, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between my-2">
                            <span>Quantity</span>
                            <span class="font-semibold">
                                <input type="number" min="1" value="1" class="w-16 text-right border border-gray-300 rounded">

                            </span>
                        </div>
                        <hr class="my-2">
                        <div class="flex justify-between my-2">
                            <span>Total</span>
                            <span style="color:#068498" class="font-semibold">{{ $dt[0]->currency_code }} {{ number_format($dt[0]->price, 0, ',', '.') }}</span>
                        </div>

                    </div>

                    <button class="bg-blue-600 text-white my-3 px-4 py-2 rounded hover:bg-blue-700 transition">Book Now</button>
                </div>


            </div>

            <div class="flex xl:flex-row w-full my-3 flex-col">
                <div class="flex-col w-full xl:flex-row    border-gray-300 rounded-lg p-4 h-fit bg-white">
                    <h2 class="text-xl font-bold">Other Items</h2>
                </div>
            </div>

        </div>
   


</x-layouts.app>