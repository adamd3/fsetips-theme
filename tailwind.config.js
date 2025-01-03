const fs = require('fs');
const glob = require('glob');

const themeJson = fs.readFileSync('./theme.json');
const theme = JSON.parse(themeJson);

let colors = {};
theme.settings.color.palette.forEach((color) => {
  colors[color.slug] = color.color;
});

let fonts = {};
theme.settings.typography.fontFamilies.forEach((fam) => {
  fonts[fam.slug] = fam.fontFamily.split(',');
});

module.exports = {
  content: [
    './inc/**/*.php',
    './template-parts/**/*.php',
    './templates/**/*.html',
    './*.php',
    './*.html',
  ].concat(glob.sync('./*.php')),
  theme: {
    screens: {
      sm: '640px',
      md: '768px',
      lg: '1024px',
      xl: '1280px',
      '2xl': '1536px',
    },
    fontFamily: fonts,
    extend: {
      colors: colors,
    },
  },
};
