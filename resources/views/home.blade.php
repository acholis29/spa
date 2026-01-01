

<x-layouts.app>
    <x-slot name="title">Home Page</x-slot>
        
            <div>
                <section class="py-6 mx-auto">
                    <p class="heading1 font-bold text-3xl">Bali Spa Treatment</p>
                </section>
                 <section >
                        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-3 md:gap-4  pb-6">
                            @foreach($dt as $key=>$catalog)
                                <div class="relative w-full max-w-sm tas-bg rounded-lg shadow-sm shrink-0 md:shrink flex flex-col h-full hover:shadow-lg transition-shadow duration-300">
                                    <a class="relative block overflow-hidden rounded-t-lg" href="#">
                                    <img style="height:220px;" class="w-full object-cover transition-transform duration-300 ease-in-out hover:scale-150"
                                    alt="CANYONING LEVEL 2"
                                    src="storage/{{ $catalog->catalog_images }}">
                                    </a>
                                    {{-- <button type="button"
                                    class="absolute top-1 right-1 cursor-pointer text-white hover:text-red-500 hover:border-red-500 p-2 rounded-full transition"
                                    aria-label="Add to wishlist"><svg aria-hidden="true" focusable="false" data-prefix="fas"
                                    data-icon="heart" class="svg-inline--fa fa-heart w-4 h-4" role="img"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path fill="currentColor"
                                    d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z">
                                    </path>
                                    </svg>
                                    </button> --}}
                                    <div class="px-4 pb-4 flex flex-col flex-grow mt-3">
                                        <a href="/detail/{{ $catalog->sku }}">
                                            <h5 class="text-sm md:text-sm text-transform: uppercase font-semibold tracking-tight text-gray-800 min-h-[30px] truncate"
                                            title="{{ $catalog->name }}">{{ $catalog->name }}
                                            </h5>
                                            <p class="text-gray-500 text-wrap text-xs md:text-xs min-h-[36px] text-transform: uppercase">
                                                {{ $catalog->category_name }} • {{ $catalog->group_name }}<br>
                                                 Duration {{ $catalog->duration }} (minutes) 
                                            </p>
                                            <p class="text-gray-500 text-wrap text-xs md:text-xs min-h-[36px] text-transform: uppercase">
                                              
                                            </p>
                                        </a>
                                        <div class="flex flex-col md:flex-row items-center justify-between mt-auto">
                                            <span class="text-md font-bold text-red-700">{{ $catalog->currency_code }} {{ number_format($catalog->price, 0, ',', '.') }}</span>
                                            <span class="font-normal text-sm"></span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </section> 
            </div>
        
    
</x-layouts.app>
