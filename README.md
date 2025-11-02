# Adventure Wedding — Product Showcase (Mini Test)

A tiny Product Showcase built with **Laravel Blade**, **SCSS**, **Alpine.js** (menu + modal), and **Vue 3** (Like button).

## Quick Start (Existing Laravel App)

1. Create a fresh Laravel app (if needed):

```bash
composer create-project laravel/laravel aw-showcase
cd aw-showcase
```

2. Copy the contents of this repo into your Laravel app, preserving folders:
- `routes/web.php`
- `resources/views/**`
- `resources/js/**`
- `resources/scss/app.scss`
- `vite.config.js`
- `package.json`

3. Install node deps and run Vite:

```bash
npm install
npm run dev
```

4. Start Laravel server in another terminal:

```bash
php artisan serve
```

Visit `http://127.0.0.1:8000/products`

## What’s Inside

- **Header** with responsive hamburger (Alpine.js)
- **Product Grid** (6–8 items) looped in Blade
- **Modal** for product details (Alpine.js)
- **Vue 3 Like Button** mounted into each card (and modal)
- **SCSS** with variables, clean spacing, hover states
- **SEO**: sensible `<title>`, meta description, `alt` attributes
- **Accessible**: semantic HTML, labels, `aria-*`, keyboard escape closes modal

## Notes

- Images use `picsum.photos` placeholders.
- The Vue component auto-mounts on `.like-button-root` nodes. Pass an initial count via `data-initial` if desired.
- Keep commits small and meaningful to reflect your process.