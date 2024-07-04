// wp.blocks.registerBlockStyle( 'core/columns', {
//   name: 'eqlipse-columns',
//   label: 'Eqlipse Columns',
// } );

// console.log(wp.blocks.getBlockAttributes('columns'));

wp.blocks.registerBlockVariation( 
  'core/columns', 
  {
    name: 'eqlipse-columns',
    title: 'Eqlipse Columns',
    attributes: { 
      className: 'eqlipse-columns' 
    },
  }
);