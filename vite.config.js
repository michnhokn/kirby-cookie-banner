export default () => ({
  build: {
    manifest: true,
    emptyOutDir: true,
    rollupOptions: {input: 'src/cookie-banner.js'},
  },
});
