import { defineConfig } from '@studiometa/webpack-config';
import {
  tailwindcss,
  eslint,
  stylelint,
  withContentHash,
} from '@studiometa/webpack-config/presets';

// Paths must be relative to the package.json root
export default defineConfig({
  presets: [tailwindcss(), eslint(), stylelint(), withContentHash()],
  src: [
    './web/wp-content/themes/studiometa/src/js/app.js',
    './web/wp-content/themes/studiometa/src/css/**/[!_]*.scss',
  ],
  dist: './web/wp-content/themes/studiometa/dist/',
  public: '/wp-content/themes/studiometa/dist/',
  watch: ['./web/wp-content/themes/studiometa/templates/**/*.twig'],
});
