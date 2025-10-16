{{--
  Template Name: Single Post Custom
  Template Post Type: post
--}}

@extends('layouts.app')

@section('content')
<article class="max-w-[1440px] mx-auto px-4 py-10">
  
  <header class="mb-8">
    <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">{{ get_the_title() }}</h1>
    <div class="w-full h-64 md:h-80 rounded-xl overflow-hidden flex items-center justify-center bg-gray-100 mb-4 relative">
      @if(has_post_thumbnail())
        {!! get_the_post_thumbnail(null, 'large', ['class' => 'w-full h-full object-cover object-center']) !!}
      @else
        <img 
          src="https://placehold.co/600x400?text=No+Image" 
          alt="No Image" 
          class="w-full h-full object-cover object-center"
        />
      @endif
    </div>
    <div class="text-gray-400 text-sm mb-2">
      <span>{{ get_the_date() }}</span>
    </div>
  </header>
  
  <section class="prose prose-neutral max-w-none">
    {!! get_the_content() !!}
  </section>

  <section class="bg-gray-50">
        <div class="max-w-[1440px] mx-auto">
            <div class="text-left mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-3">Other News</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @php
                $latest_posts = get_posts([
                    'post_type'      => 'post',
                    'posts_per_page' => 3,
                    'post_status'    => 'publish',
                    'orderby'        => 'rand',
                ]);
                @endphp

                @foreach ($latest_posts as $post)
                @php setup_postdata($post); @endphp


                <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-shadow flex flex-col">
                    @if (has_post_thumbnail($post->ID))
                    <div class="overflow-hidden">
                        {!! get_the_post_thumbnail($post->ID, 'medium_large', ['class' => 'h-48 w-full object-cover hover:scale-110 transition-transform duration-500']) !!}
                    </div>
                    @else
                    <img src="{{ asset('images/placeholder.jpg') }}" class="h-48 w-full object-cover" alt="Placeholder">
                    @endif

                    <div class="p-6 flex flex-col flex-grow">
                        <h3 class="font-bold text-lg mb-2 text-gray-800">{{ get_the_title($post->ID) }}</h3>
                        <p class="text-sm text-gray-600 flex-grow leading-relaxed mb-4">
                            {{ get_the_excerpt($post->ID) }}
                        </p>
                        <div class="pt-4 border-t">
                            <a href="{{ get_permalink($post->ID) }}" class="text-[#4E8D7C] hover:text-[#3D7465] font-semibold text-sm inline-flex items-center group">
                                Read more 
                                <i class="bi bi-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach

                @php wp_reset_postdata(); @endphp
            </div>
        </div>
    </section>

</article>
@endsection
