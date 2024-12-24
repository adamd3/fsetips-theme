/**
 * See https://tailwindcss.com/docs/configuration for configuration details
 */

/**
 * Convert pixels to rems
 * @param {int} px The pixel value to convert to rems
 */

const fs = require('fs');
const glob = require('glob');

const themeJson = fs.readFileSync('./theme.json');
const theme = JSON.parse(themeJson);

const rem = (px) => `${px / 16}rem`;

let colors = {};
theme.settings.color.palette.forEach((color) => {
  colors[color.slug] = color.color;
});

let fonts = {};
theme.settings.typography.fontFamilies.forEach((fam) => {
  fonts[fam.slug] = fam.fontFamily.split(',');
});

module.exports = {
  content: ['./inc/**/*.php', './template-parts/**/*.php'].concat(
    glob.sync('./*.php')
  ),
  // have to use glob sync because otherwise base folder becomes tw dependency and infinite loop because of index.asset.php
  // glob returns array of actual files and this way build folder is definitively ignored
  theme: {
    fontFamily: fonts,
    extend: {
      colors: colors,
    },
  },
};
