console.log('Hello from editor.js!');

// Log postData to make sure it's available
console.log('postData:', postData);

wp.domReady(() => {
  console.log('domReady fired!');

  /**
   * Manage Block Types By Post Type
   */
  if (postData.postType == 'page') {
    console.log('Processing page blocks...');

    wp.blocks.getBlockTypes().forEach(function (block) {
      // UNCOMMENT TO CHECK WHICH BLOCKS ARE REGISTERED
      // console.log('Block found:', block.name);

      // ALLOW LIST BY CATEGORY
      if (block.category == 'custom') return;

      if (block.category == 'text') return;

      if (block.category == 'media') return;

      // REMOVE VARIATIONS
      if (block.name === 'core/embed') {
        block.variations.forEach((variant) => {
          wp.blocks.unregisterBlockVariation(block.name, variant.name);
        });
        return;
      }

      // ALLOW BY NAME
      if (
        block.name == 'core/columns' ||
        block.name == 'core/separator' ||
        block.name == 'core/spacer'
      )
        return;

      // Unregister everything that does not match
      wp.blocks.unregisterBlockType(block.name);
    });
  }

  // DEFINE THE BLOCKS WE WANT ON POSTS
  else if (postData.postType == 'post') {
    wp.blocks.getBlockTypes().forEach(function (block) {
      // Unregister all blocks not in text category
      if (block.category !== 'text') {
        wp.blocks.unregisterBlockType(block.name);
      }
    });
  }

  // SAFE DEFAULTS FOR NEW POST TYPES
  else {
    wp.blocks.getBlockTypes().forEach(function (block) {
      // Just selectively unregister blocks we don't want - leave everything else alone
      if (block.name == 'core/columns') {
        wp.blocks.unregisterBlockType(block.name);
      }
    });
  }

  // Block styling
  wp.blocks.unregisterBlockStyle('core/button', 'outline');
  wp.blocks.unregisterBlockStyle('core/button', 'fill');

  wp.blocks.registerBlockStyle('core/button', {
    name: 'primary-button',
    label: 'Primary',
    isDefault: true,
  });

  wp.blocks.registerBlockStyle('core/button', {
    name: 'secondary-button',
    label: 'Secondary',
  });
});
