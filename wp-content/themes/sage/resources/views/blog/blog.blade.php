{{--
  Template Name: Blog
  Template Post Type: page
--}}

@extends('layouts.app')
@section('content')
<section class="max-w-7xl mx-auto px-4 py-10">
    <!-- Search Bar -->
    <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="mb-8 flex justify-center">
        <input type="text" name="s" placeholder="Search articles..."
            class="w-full max-w-md border border-gray-300 rounded-l-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
            value="<?php echo get_search_query(); ?>">
        <button type="submit" class="bg-indigo-600 text-white px-4 rounded-r-lg hover:bg-indigo-700">
            <i class="fa-solid fa-magnifying-glass"></i>
        </button>
    </form>

    <!-- Featured + Grid Layout -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Featured Post -->
    <?php
        $featured_query = new WP_Query([
            'posts_per_page' => 1,
            'ignore_sticky_posts' => 1,
        ]);
        if ( $featured_query->have_posts() ) :
            while ( $featured_query->have_posts() ) : $featured_query->the_post();
    ?>
        <article class="relative h-[400px] rounded-xl overflow-hidden group">
            <?php if ( has_post_thumbnail() ) : ?>
            <?php the_post_thumbnail('large', ['class' => 'w-full h-full object-cover group-hover:scale-105 transition duration-500']); ?>
            <?php endif; ?>
            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
            <div class="absolute bottom-4 left-4 text-white">
                <h2 class="text-2xl font-bold mb-2">
                    <a href="<?php the_permalink(); ?>" class="hover:underline"><?php the_title(); ?></a>
                </h2>
                <p class="text-sm opacity-90"><?php echo get_the_date(); ?></p>
            </div>
        </article>
        <?php
        endwhile;
        wp_reset_postdata();
      endif;
    ?>

        <!-- 4 Grid Posts -->
        <div class="grid grid-cols-2 gap-4">
    <?php
            $paged = get_query_var('paged') ? get_query_var('paged') : 1;
            $posts_per_page = 4;
            $offset_start = 1; // skip featured post
            $calculated_offset = $offset_start + ( ($paged - 1) * $posts_per_page );

            $grid_query = new WP_Query([
            'posts_per_page'      => $posts_per_page,
            'offset'              => $calculated_offset,
            'ignore_sticky_posts' => 1,
            'paged'               => $paged,
            ]);

        if ( $grid_query->have_posts() ) :
          while ( $grid_query->have_posts() ) : $grid_query->the_post();
      ?>
            <article class="relative h-[190px] rounded-lg overflow-hidden group">
                <?php if ( has_post_thumbnail() ) : ?>
                <?php the_post_thumbnail('medium', ['class' => 'w-full h-full object-cover group-hover:scale-105 transition duration-500']); ?>
                <?php endif; ?>
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent"></div>
                <div class="absolute bottom-3 left-3 text-white">
                    <h3 class="text-sm font-semibold leading-tight">
                        <a href="<?php the_permalink(); ?>" class="hover:underline"><?php the_title(); ?></a>
                    </h3>
                </div>
            </article>
            <?php
          endwhile;
          wp_reset_postdata();
        endif;
      ?>
        </div>
    </div>

    <!-- Pagination -->
    <div class="mt-10 flex justify-center">
        <?php
        $big = 999999999;
        $pages = paginate_links([
            'base'      => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
            'format'    => '?paged=%#%',
            'current'   => max(1, get_query_var('paged')),
            'total'     => $grid_query->max_num_pages,
            'prev_text' => '<i class="fa-solid fa-chevron-left"></i>',
            'next_text' => '<i class="fa-solid fa-chevron-right"></i>',
            'type'      => 'array'
        ]);

        if (is_array($pages)) :
            echo '<nav class="inline-flex rounded-md shadow-sm" aria-label="Pagination">';
            foreach ($pages as $page) {
                // Detect active page and style it differently
                if (strpos($page, 'current') !== false) {
                    echo '<span class="px-4 py-2 space-x-1 border border-indigo-600 bg-indigo-600 text-white text-sm font-medium">' . wp_kses_post($page) . '</span>';
                } elseif (strpos($page, 'dots') !== false) {
                    echo '<span class="px-4 py-2 space-x-1 border border-gray-300 bg-white text-gray-500 text-sm">' . wp_kses_post($page) . '</span>';
                } else {
                    echo '<span class="px-4 py-2 space-x-1 border border-gray-300 bg-white text-gray-700 hover:bg-indigo-50 text-sm transition">' . wp_kses_post($page) . '</span>';
                }
            }
            echo '</nav>';
        endif;
        ?>
    </div>

</section>
@endsection
