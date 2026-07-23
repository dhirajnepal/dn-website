# dn-website

Run this site locally on your laptop with PHP's built-in server:

```bash
cd /home/runner/work/dn-website/dn-website
php -S localhost:8000
```

Then open:

- `http://localhost:8000/` for the website
- `http://localhost:8000/api.php?action=status` for the API health response

## Notes

- This project is plain PHP/CSS/JS, so no package install step is required.
- Firebase config in `script.js` is intentionally placeholder-based. Replace it with your own Firebase project values if you want auth/database features to work locally.
