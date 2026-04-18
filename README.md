# Portfolio Website

A clean, professional personal website built with vanilla HTML, CSS, and JavaScript.

## Running Locally

Option 1: **Python** (recommended — comes with most systems)
```bash
python -m http.server 3000
```
Then open http://localhost:3000

Option 2: **Node.js** (if you have npx)
```bash
npx serve .
```
Then open the URL shown (usually http://localhost:3000)

**Translator Demo:** The GPT Translator app is available at `/translator` (e.g. http://localhost:3000/translator). Note that the live translation API requires the Flask backend (`translate-app` folder) to be running.

## Deployment

This site is static — just upload the contents to any static hosting (Vercel, Netlify, GitHub Pages, Render, AWS S3, etc.).

- `index.html` + `styles.css` + `script.js` = main portfolio
- `translator/` folder = built React translator app
