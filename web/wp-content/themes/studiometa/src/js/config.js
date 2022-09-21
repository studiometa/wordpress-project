/**
 * Test if the current env is a dev env.
 *
 * @returns {boolean}
 */
export const isDev = () => !window.location.hostname.startsWith('www.');

export default {
  isDev,
};
