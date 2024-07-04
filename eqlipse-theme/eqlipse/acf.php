<?php

if (function_exists('acf_add_options_page')) {
  acf_add_options_page(array(
    'page_title'    => 'Eqlipse Settings',
    'menu_title'    => 'Eqlipse Settings',
    'menu_slug'     => 'eqlipse-settings',
    'capability'    => 'edit_posts',
    'redirect'      => false
  ));
}

if (function_exists('acf_register_block_type')) {
  acf_register_block_type(
    array(
      'name'            => 'accordion',
      'title'           => 'Eqlipse - Accordion',
      'description'     => 'Adds accordion.',
      'render_template' => 'custom-blocks/accordion.php',
      'category'        => 'theme',
      'icon'            => '<svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_3_28)"><path d="M11.2 8.7L9.4 0H6.6L4.8 8.7L3.1 0H0L3.2 12H6.3L8 3.7L9.6 12H12.7L16 0H12.9L11.2 8.7Z" fill="black"/></g><defs><clipPath id="clip0_3_28"><rect width="16" height="12" fill="white"/></clipPath></defs></svg>',
      'api_version'     => 2,
      'keywords'        => array('eqlipse', 'accordion', 'eqlipse accordion'),
      'mode'            => 'preview',
      'align'           => 'full',
      'supports'        => array(
        'anchor'        => true,
        'align_text' => false,
      ),
    )
  );
  acf_register_block_type(
    array(
      'name'            => 'big_text_accordion',
      'title'           => 'Eqlipse - Big Text Accordion',
      'description'     => 'Displays accordion with large headings.',
      'render_template' => 'custom-blocks/big_text_accordion.php',
      'category'        => 'theme',
      'icon'            => '<svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_3_28)"><path d="M11.2 8.7L9.4 0H6.6L4.8 8.7L3.1 0H0L3.2 12H6.3L8 3.7L9.6 12H12.7L16 0H12.9L11.2 8.7Z" fill="black"/></g><defs><clipPath id="clip0_3_28"><rect width="16" height="12" fill="white"/></clipPath></defs></svg>',
      'api_version'     => 2,
      'keywords'        => array('eqlipse', 'big', 'text', 'accordion', 'eqlipse big text accordion'),
      'mode'            => 'preview',
      'align'           => 'full',
      'supports'        => array(
        'anchor'        => true,
        'align_text' => false,
      ),
    )
  );
  acf_register_block_type(
    array(
      'name'            => 'card_grid',
      'title'           => 'Eqlipse - Card Grid',
      'description'     => 'Adds a grid of cards.',
      'render_template' => 'custom-blocks/card_grid.php',
      'category'        => 'theme',
      'icon'            => '<svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_3_28)"><path d="M11.2 8.7L9.4 0H6.6L4.8 8.7L3.1 0H0L3.2 12H6.3L8 3.7L9.6 12H12.7L16 0H12.9L11.2 8.7Z" fill="black"/></g><defs><clipPath id="clip0_3_28"><rect width="16" height="12" fill="white"/></clipPath></defs></svg>',
      'api_version'     => 2,
      'keywords'        => array('eqlipse', 'card', 'grid', 'eqlipse card grid'),
      'mode'            => 'preview',
      'align'           => 'full',
      'supports'        => array(
        'anchor'        => true,
        'align_text' => false,
      ),
    )
  );
  acf_register_block_type(
    array(
      'name'            => 'content',
      'title'           => 'Eqlipse - Content',
      'description'     => 'Adds a WYSIWYG content block.',
      'render_template' => 'custom-blocks/content.php',
      'category'        => 'theme',
      'icon'            => '<svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_3_28)"><path d="M11.2 8.7L9.4 0H6.6L4.8 8.7L3.1 0H0L3.2 12H6.3L8 3.7L9.6 12H12.7L16 0H12.9L11.2 8.7Z" fill="black"/></g><defs><clipPath id="clip0_3_28"><rect width="16" height="12" fill="white"/></clipPath></defs></svg>',
      'api_version'     => 2,
      'keywords'        => array('eqlipse', 'content', 'eqlipse content'),
      'mode'            => 'preview',
      'align'           => 'full',
      'supports'        => array(
        'anchor'        => true,
        'align_text' => false,
      ),
    )
  );
  acf_register_block_type(
    array(
      'name'            => 'descriptive_list',
      'title'           => 'Eqlipse - Descriptive List',
      'description'     => 'Displays a list of items with short description.',
      'render_template' => 'custom-blocks/descriptive_list.php',
      'category'        => 'theme',
      'icon'            => '<svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_3_28)"><path d="M11.2 8.7L9.4 0H6.6L4.8 8.7L3.1 0H0L3.2 12H6.3L8 3.7L9.6 12H12.7L16 0H12.9L11.2 8.7Z" fill="black"/></g><defs><clipPath id="clip0_3_28"><rect width="16" height="12" fill="white"/></clipPath></defs></svg>',
      'api_version'     => 2,
      'keywords'        => array('eqlipse', 'descriptive', 'list', 'eqlipse descriptive list'),
      'mode'            => 'preview',
      'align'           => 'full',
      'supports'        => array(
        'anchor'        => true,
        'align_text' => false,
      ),
    )
  );
  acf_register_block_type(
    array(
      'name'            => 'quote',
      'title'           => 'Eqlipse - Quote',
      'description'     => 'Display a single quote.',
      'render_template' => 'custom-blocks/quote.php',
      'category'        => 'theme',
      'icon'            => '<svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_3_28)"><path d="M11.2 8.7L9.4 0H6.6L4.8 8.7L3.1 0H0L3.2 12H6.3L8 3.7L9.6 12H12.7L16 0H12.9L11.2 8.7Z" fill="black"/></g><defs><clipPath id="clip0_3_28"><rect width="16" height="12" fill="white"/></clipPath></defs></svg>',
      'api_version'     => 2,
      'keywords'        => array('eqlipse', 'quote', 'eqlipse quote'),
      'mode'            => 'preview',
      'align'           => 'full',
      'supports'        => array(
        'anchor'        => true,
        'align_text' => false,
      ),
    )
  );
  acf_register_block_type(
    array(
      'name'            => 'form',
      'title'           => 'Eqlipse - Form',
      'description'     => 'Displays form.',
      'render_template' => 'custom-blocks/form.php',
      'category'        => 'theme',
      'icon'            => '<svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_3_28)"><path d="M11.2 8.7L9.4 0H6.6L4.8 8.7L3.1 0H0L3.2 12H6.3L8 3.7L9.6 12H12.7L16 0H12.9L11.2 8.7Z" fill="black"/></g><defs><clipPath id="clip0_3_28"><rect width="16" height="12" fill="white"/></clipPath></defs></svg>',
      'api_version'     => 2,
      'keywords'        => array('eqlipse', 'form', 'eqlipse form'),
      'mode'            => 'preview',
      'align'           => 'full',
      'supports'        => array(
        'anchor'        => true,
        'align_text' => false,
      ),
    )
  );
  acf_register_block_type(
    array(
      'name'            => 'heading_with_background',
      'title'           => 'Eqlipse - Heading with Background',
      'description'     => 'Display a hero type heading.',
      'render_template' => 'custom-blocks/heading_with_background.php',
      'category'        => 'theme',
      'icon'            => '<svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_3_28)"><path d="M11.2 8.7L9.4 0H6.6L4.8 8.7L3.1 0H0L3.2 12H6.3L8 3.7L9.6 12H12.7L16 0H12.9L11.2 8.7Z" fill="black"/></g><defs><clipPath id="clip0_3_28"><rect width="16" height="12" fill="white"/></clipPath></defs></svg>',
      'api_version'     => 2,
      'keywords'        => array('eqlipse', 'heading', 'background', 'image', 'eqlipse heading with background'),
      'mode'            => 'preview',
      'align'           => 'full',
      'supports'        => array(
        'anchor'        => true,
        'align_text' => false,
      ),
    )
  );
  acf_register_block_type(
    array(
      'name'            => 'image_grid',
      'title'           => 'Eqlipse - Image Grid',
      'description'     => 'Displays a row of up to 3 images.',
      'render_template' => 'custom-blocks/image_grid.php',
      'category'        => 'theme',
      'icon'            => '<svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_3_28)"><path d="M11.2 8.7L9.4 0H6.6L4.8 8.7L3.1 0H0L3.2 12H6.3L8 3.7L9.6 12H12.7L16 0H12.9L11.2 8.7Z" fill="black"/></g><defs><clipPath id="clip0_3_28"><rect width="16" height="12" fill="white"/></clipPath></defs></svg>',
      'api_version'     => 2,
      'keywords'        => array('eqlipse', 'image', 'grid', 'eqlipse image grid'),
      'mode'            => 'preview',
      'align'           => 'full',
      'supports'        => array(
        'anchor'        => true,
        'align_text' => false,
      ),
    )
  );
  acf_register_block_type(
    array(
      'name'            => 'large_heading',
      'title'           => 'Eqlipse - Large Heading',
      'description'     => 'Displays large heading.',
      'render_template' => 'custom-blocks/large_heading.php',
      'category'        => 'theme',
      'icon'            => '<svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_3_28)"><path d="M11.2 8.7L9.4 0H6.6L4.8 8.7L3.1 0H0L3.2 12H6.3L8 3.7L9.6 12H12.7L16 0H12.9L11.2 8.7Z" fill="black"/></g><defs><clipPath id="clip0_3_28"><rect width="16" height="12" fill="white"/></clipPath></defs></svg>',
      'api_version'     => 2,
      'keywords'        => array('eqlipse', 'heading', 'large', 'eqlipse large heading'),
      'mode'            => 'preview',
      'align'           => 'full',
      'supports'        => array(
        'anchor'        => true,
        'align_text' => false,
      ),
    )
  );
  acf_register_block_type(
    array(
      'name'            => 'large_heading_w_image_col',
      'title'           => 'Eqlipse - Large Heading with Image Column',
      'description'     => 'Displays 2 columns: one with a large heading, one with an image.',
      'render_template' => 'custom-blocks/large_heading_w_img_col.php',
      'category'        => 'theme',
      'icon'            => '<svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_3_28)"><path d="M11.2 8.7L9.4 0H6.6L4.8 8.7L3.1 0H0L3.2 12H6.3L8 3.7L9.6 12H12.7L16 0H12.9L11.2 8.7Z" fill="black"/></g><defs><clipPath id="clip0_3_28"><rect width="16" height="12" fill="white"/></clipPath></defs></svg>',
      'api_version'     => 2,
      'keywords'        => array('eqlipse', 'heading', 'image', 'large', 'eqlipse large heading', 'ecqlipse large heading with image'),
      'mode'            => 'preview',
      'align'           => 'full',
      'supports'        => array(
        'anchor'        => true,
        'align_text' => false,
      ),
    )
  );
  acf_register_block_type(
    array(
      'name'            => 'loop_video',
      'title'           => 'Eqlipse - Loop Video',
      'description'     => 'Display an infinite loop video.',
      'render_template' => 'custom-blocks/loop_video.php',
      'category'        => 'theme',
      'icon'            => '<svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_3_28)"><path d="M11.2 8.7L9.4 0H6.6L4.8 8.7L3.1 0H0L3.2 12H6.3L8 3.7L9.6 12H12.7L16 0H12.9L11.2 8.7Z" fill="black"/></g><defs><clipPath id="clip0_3_28"><rect width="16" height="12" fill="white"/></clipPath></defs></svg>',
      'api_version'     => 2,
      'keywords'        => array('eqlipse', 'loop', 'video', 'ecqlipse loop video'),
      'mode'            => 'preview',
      'align'           => 'full',
      'supports'        => array(
        'anchor'        => true,
        'align_text' => false,
      ),
    )
  );
  acf_register_block_type(
    array(
      'name'            => 'multipurpose_carousel',
      'title'           => 'Eqlipse - Multipurpose Carousel',
      'description'     => 'Multipurpose Carousel.',
      'render_template' => 'custom-blocks/multipurpose_carousel.php',
      'category'        => 'theme',
      'icon'            => '<svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_3_28)"><path d="M11.2 8.7L9.4 0H6.6L4.8 8.7L3.1 0H0L3.2 12H6.3L8 3.7L9.6 12H12.7L16 0H12.9L11.2 8.7Z" fill="black"/></g><defs><clipPath id="clip0_3_28"><rect width="16" height="12" fill="white"/></clipPath></defs></svg>',
      'api_version'     => 2,
      'keywords'        => array('eqlipse', 'multipurpose', 'carousel', 'eqlipse multipurpose carousel'),
      'mode'            => 'preview',
      'align'           => 'full',
      'supports'        => array(
        'anchor'        => true,
        'align_text' => false,
      ),
    )
  );
  acf_register_block_type(
    array(
      'name'            => 'multipurpose_grid',
      'title'           => 'Eqlipse - Multipurpose Grid',
      'description'     => 'Display a grid of image or specification cards',
      'render_template' => 'custom-blocks/multipurpose_grid.php',
      'category'        => 'theme',
      'icon'            => '<svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_3_28)"><path d="M11.2 8.7L9.4 0H6.6L4.8 8.7L3.1 0H0L3.2 12H6.3L8 3.7L9.6 12H12.7L16 0H12.9L11.2 8.7Z" fill="black"/></g><defs><clipPath id="clip0_3_28"><rect width="16" height="12" fill="white"/></clipPath></defs></svg>',
      'api_version'     => 2,
      'keywords'        => array('eqlipse', 'multipurpose', 'grid', 'eqlipse multipurpose grid'),
      'mode'            => 'preview',
      'align'           => 'full',
      'supports'        => array(
        'anchor'        => true,
        'align_text' => false,
      ),
    )
  );
  acf_register_block_type(
    array(
      'name'            => 'page_navigation',
      'title'           => 'Eqlipse - Page Navigation',
      'description'     => 'Adds in-page navigation menu.',
      'render_template' => 'custom-blocks/page_navigation.php',
      'category'        => 'theme',
      'icon'            => '<svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_3_28)"><path d="M11.2 8.7L9.4 0H6.6L4.8 8.7L3.1 0H0L3.2 12H6.3L8 3.7L9.6 12H12.7L16 0H12.9L11.2 8.7Z" fill="black"/></g><defs><clipPath id="clip0_3_28"><rect width="16" height="12" fill="white"/></clipPath></defs></svg>',
      'api_version'     => 2,
      'keywords'        => array('eqlipse', 'page', 'navigation', 'menu', 'eqlipse page navigation menu'),
      'mode'            => 'preview',
      'align'           => 'full',
      'supports'        => array(
        'anchor'        => true,
        'align_text' => false,
      ),
    )
  );
  acf_register_block_type(
    array(
      'name'            => 'post_display',
      'title'           => 'Eqlipse - Post Display',
      'description'     => 'Displays list of posts.',
      'render_template' => 'custom-blocks/post_display.php',
      'category'        => 'theme',
      'icon'            => '<svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_3_28)"><path d="M11.2 8.7L9.4 0H6.6L4.8 8.7L3.1 0H0L3.2 12H6.3L8 3.7L9.6 12H12.7L16 0H12.9L11.2 8.7Z" fill="black"/></g><defs><clipPath id="clip0_3_28"><rect width="16" height="12" fill="white"/></clipPath></defs></svg>',
      'api_version'     => 2,
      'keywords'        => array('eqlipse', 'post', 'display', 'eqlipse post display'),
      'mode'            => 'preview',
      'align'           => 'full',
      'supports'        => array(
        'anchor'        => true,
        'align_text' => false,
      ),
    )
  );
  acf_register_block_type(
    array(
      'name'            => 'scroll_slider',
      'title'           => 'Eqlipse - Scroll Slider',
      'description'     => 'Displays large horizontal slider that you scroll vertically to use.',
      'render_template' => 'custom-blocks/scroll_slider.php',
      'category'        => 'theme',
      'icon'            => '<svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_3_28)"><path d="M11.2 8.7L9.4 0H6.6L4.8 8.7L3.1 0H0L3.2 12H6.3L8 3.7L9.6 12H12.7L16 0H12.9L11.2 8.7Z" fill="black"/></g><defs><clipPath id="clip0_3_28"><rect width="16" height="12" fill="white"/></clipPath></defs></svg>',
      'api_version'     => 2,
      'keywords'        => array('eqlipse', 'slide', 'slider', 'scroll', 'carousel'),
      'mode'            => 'preview',
      'align'           => 'full',
      'supports'        => array(
        'anchor'        => true,
        'align_text' => false,
      ),
    )
  );
  acf_register_block_type(
    array(
      'name'            => 'scroll_slider_deprecate',
      'title'           => 'Eqlipse - Scroll Slider Deprecated',
      'description'     => 'Displays large horizontal slider that you scroll vertically to use.',
      'render_template' => 'custom-blocks/scroll_slider_deprecate.php',
      'category'        => 'theme',
      'icon'            => '<svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_3_28)"><path d="M11.2 8.7L9.4 0H6.6L4.8 8.7L3.1 0H0L3.2 12H6.3L8 3.7L9.6 12H12.7L16 0H12.9L11.2 8.7Z" fill="black"/></g><defs><clipPath id="clip0_3_28"><rect width="16" height="12" fill="white"/></clipPath></defs></svg>',
      'api_version'     => 2,
      'keywords'        => array('eqlipse', 'slide', 'slider', 'scroll', 'carousel'),
      'mode'            => 'preview',
      'align'           => 'full',
      'supports'        => array(
        'anchor'        => true,
        'align_text' => false,
      ),
    )
  );
  acf_register_block_type(
    array(
      'name'            => 'single_image',
      'title'           => 'Eqlipse - Single Image',
      'description'     => 'Display single image.',
      'render_template' => 'custom-blocks/single_image.php',
      'category'        => 'theme',
      'icon'            => '<svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_3_28)"><path d="M11.2 8.7L9.4 0H6.6L4.8 8.7L3.1 0H0L3.2 12H6.3L8 3.7L9.6 12H12.7L16 0H12.9L11.2 8.7Z" fill="black"/></g><defs><clipPath id="clip0_3_28"><rect width="16" height="12" fill="white"/></clipPath></defs></svg>',
      'api_version'     => 2,
      'keywords'        => array('eqlipse', 'single', 'image', 'eqlipse single image'),
      'mode'            => 'preview',
      'align'           => 'full',
      'supports'        => array(
        'anchor'        => true,
        'align_text' => false,
      ),
    )
  );
  acf_register_block_type(
    array(
      'name'            => 'spec_table',
      'title'           => 'Eqlipse - Specification Table',
      'description'     => 'Display a specification table.',
      'render_template' => 'custom-blocks/spec_table.php',
      'category'        => 'theme',
      'icon'            => '<svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_3_28)"><path d="M11.2 8.7L9.4 0H6.6L4.8 8.7L3.1 0H0L3.2 12H6.3L8 3.7L9.6 12H12.7L16 0H12.9L11.2 8.7Z" fill="black"/></g><defs><clipPath id="clip0_3_28"><rect width="16" height="12" fill="white"/></clipPath></defs></svg>',
      'api_version'     => 2,
      'keywords'        => array('eqlipse', 'specification', 'table', 'eqlipse specification table'),
      'mode'            => 'preview',
      'align'           => 'full',
      'supports'        => array(
        'anchor'        => true,
        'align_text' => false,
      ),
    )
  );
  acf_register_block_type(
    array(
      'name'            => 'text_banner',
      'title'           => 'Eqlipse - Text Banner',
      'description'     => 'Displays a large text banner with CTA.',
      'render_template' => 'custom-blocks/text_banner.php',
      'category'        => 'theme',
      'icon'            => '<svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_3_28)"><path d="M11.2 8.7L9.4 0H6.6L4.8 8.7L3.1 0H0L3.2 12H6.3L8 3.7L9.6 12H12.7L16 0H12.9L11.2 8.7Z" fill="black"/></g><defs><clipPath id="clip0_3_28"><rect width="16" height="12" fill="white"/></clipPath></defs></svg>',
      'api_version'     => 2,
      'keywords'        => array('eqlipse', 'banner', 'text', 'cta'),
      'mode'            => 'preview',
      'align'           => 'full',
      'supports'        => array(
        'anchor'        => true,
        'align_text' => false,
      ),
    )
  );
  acf_register_block_type(
    array(
      'name'            => 'timeline',
      'title'           => 'Eqlipse - Timeline',
      'description'     => 'Displays a vertical timeline',
      'render_template' => 'custom-blocks/timeline.php',
      'category'        => 'theme',
      'icon'            => '<svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_3_28)"><path d="M11.2 8.7L9.4 0H6.6L4.8 8.7L3.1 0H0L3.2 12H6.3L8 3.7L9.6 12H12.7L16 0H12.9L11.2 8.7Z" fill="black"/></g><defs><clipPath id="clip0_3_28"><rect width="16" height="12" fill="white"/></clipPath></defs></svg>',
      'api_version'     => 2,
      'keywords'        => array('eqlipse', 'timeline', 'eqlipse timeline'),
      'mode'            => 'preview',
      'align'           => 'full',
      'supports'        => array(
        'anchor'        => true,
        'align_text' => false,
      ),
    )
  );
  acf_register_block_type(
    array(
      'name'            => 'video_player',
      'title'           => 'Eqlipse - Video Player',
      'description'     => 'Adds YouTube video player',
      'render_template' => 'custom-blocks/video_player.php',
      'category'        => 'theme',
      'icon'            => '<svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_3_28)"><path d="M11.2 8.7L9.4 0H6.6L4.8 8.7L3.1 0H0L3.2 12H6.3L8 3.7L9.6 12H12.7L16 0H12.9L11.2 8.7Z" fill="black"/></g><defs><clipPath id="clip0_3_28"><rect width="16" height="12" fill="white"/></clipPath></defs></svg>',
      'api_version'     => 2,
      'keywords'        => array('eqlipse', 'video', 'player', 'eqlipse video player'),
      'mode'            => 'preview',
      'align'           => 'full',
      'supports'        => array(
        'anchor'        => true,
        'align_text' => false,
      ),
    )
  );
}

function validate_phone_number_field( $valid, $value, $field, $input ) {
    
  // If the field's name is 'phone_number', then proceed with the validation.
  if( $field['name'] == 'phone_number' ) {
      
      // If the value is empty, it's valid.
      if( empty($value) ) {
          return $valid;
      }
      
      // Regular expression to match the desired phone number format.
      if( ! preg_match('/^(\d{3}-\d{3}-\d{4})$/', $value) ) {
          $valid = 'Please enter a valid phone number in the format 555-555-5555';
      }
  }

  // Return the possibly altered $valid variable.
  return $valid;
}

add_filter('acf/validate_value', 'validate_phone_number_field', 10, 4);
