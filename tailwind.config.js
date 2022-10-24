/**
 * TailwindCSS Configuration File
 *
 * @see     https://tailwindcss.com/docs/configuration
 * @default https://github.com/studiometa/tailwind-config/blob/develop/src/index.js
 */
module.exports = {
  presets: [require('tailwindcss/defaultConfig'), require('@studiometa/tailwind-config').config],
  // Extends the default Studio Meta Tailwind configuration here...
  // plugins: [...],
  // theme: {...},
  // Learn more on https://tailwindcss.com/docs/controlling-file-size/#removing-unused-css
  content: [
    './web/wp-content/themes/studiometa/src/js/**/*.js',
    './web/wp-content/themes/studiometa/src/js/**/*.vue',
    './web/wp-content/themes/studiometa/templates/**/*.twig',
    './vendor/studiometa/ui/package/ui/**/*.twig',
    './vendor/studiometa/ui/package/ui/**/*.js',
    'tailwind.safelist.txt',
  ],
};
