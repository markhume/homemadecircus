# Homemade Circus

WordPress theme and database export for [Homemade Circus](https://homemadecircus.yme.so) — a resource site by Upswing Aerial for circus activities and workshops.

This repository contains the **custom theme** and a **sanitized database dump**. It does **not** include WordPress core, plugins, or uploaded media files.

---

## What’s in this repo

| Item | Location |
|------|----------|
| WordPress theme | Theme root (this folder) |
| Database export | `database/homemade-circus.sql` |

---

## Requirements

- [WordPress](https://wordpress.org/) (6.x recommended)
- PHP 8.0+
- MySQL 8.0+ or MariaDB
- A local development environment — [Local](https://localwp.com/) is what the original site uses

### Required plugins

These plugins are used by the theme and stored in the database. Install and activate them after setting up WordPress. Several are **premium** and must be licensed separately:

| Plugin | Purpose |
|--------|---------|
| Advanced Custom Fields PRO | Page content, options, activity fields |
| MemberPress | Membership / gated content |
| MemberPress Mailchimp Tags | Mailchimp integration |
| WPForms Lite | Contact and sign-up forms |
| Yoast SEO (`wordpress-seo`) | SEO |
| Rate My Post | Activity ratings |
| Google Site Kit | Analytics |
| WP Super Cache | Caching (production) |

Other plugins on the live site (migration, backups, etc.) are optional for local development.

### Media files

Uploaded images and documents live in `wp-content/uploads/` and are **not** in this repo. Copy them from a backup or the live server, or re-upload through the WordPress admin after import.

---

## Local setup (recommended)

### 1. Clone the repository

```bash
git clone git@github.com:markhume/homemadecircus.git HomemadeCircus
```

### 2. Create a WordPress site in Local

1. Open **Local** and create a new site (e.g. `homemade-circus`).
2. Use PHP 8+ and MySQL 8.
3. Copy the cloned theme into the site’s theme folder:

   ```bash
   cp -R HomemadeCircus "/path/to/Local Sites/homemade-circus/app/public/wp-content/themes/"
   ```

   Or clone directly into that folder:

   ```bash
   cd "/path/to/Local Sites/homemade-circus/app/public/wp-content/themes"
   git clone git@github.com:markhume/homemadecircus.git HomemadeCircus
   ```

### 3. Install plugins

Install the required plugins listed above into `wp-content/plugins/` and activate them in **Plugins** in the WordPress admin.

> **Note:** ACF field groups and site content are stored in the database export. Plugin PHP files still need to be present for everything to work.

### 4. Import the database

**Option A — Local’s database tool**

1. In Local, open the site and go to the **Database** tab.
2. Open **Adminer** (or phpMyAdmin).
3. Select the `local` database.
4. Import `database/homemade-circus.sql`.

**Option B — Command line (Local site running)**

Find your site’s MySQL socket in Local (Site → Database → Connect), then:

```bash
mysql --socket="/path/to/mysqld.sock" -u root -proot local < database/homemade-circus.sql
```

**Option C — WP-CLI (from the WordPress root)**

```bash
cd app/public
wp db import wp-content/themes/HomemadeCircus/database/homemade-circus.sql
```

### 5. Update site URLs

The export uses the local URL `http://homemade-circus.local`. If your Local domain is different, run a search-replace.

**With WP-CLI:**

```bash
wp search-replace 'http://homemade-circus.local' 'http://your-site.local' --all-tables
```

**Without WP-CLI:** use a plugin such as [Better Search Replace](https://wordpress.org/plugins/better-search-replace/) or [WP-CLI](https://wp-cli.org/) via Local’s site shell.

Also check **Settings → General** for **WordPress Address** and **Site Address**.

### 6. Activate the theme

In **Appearance → Themes**, activate **WELLMADE STARTER THEME** (the Homemade Circus theme).

### 7. Finish up

1. Go to **Settings → Permalinks** and click **Save** (flushes rewrite rules).
2. Copy `wp-content/uploads/` from a backup if you have one.
3. Log in with an account from the imported database, or reset a password:

   ```bash
   wp user update admin --user_pass='your-new-password'
   ```

4. Re-enter any API keys in plugin settings (see **Security notes** below).

---

## Database export details

- **File:** `database/homemade-circus.sql`
- **Table prefix:** `wp_`
- **Original local URL:** `http://homemade-circus.local`
- **Production URL (in content):** `https://homemadecircus.yme.so`

API keys (Stripe, Mailchimp, AWS, etc.) are **redacted** in the committed export so the file can live safely on GitHub. After importing, configure those integrations again in the relevant plugin settings.

To create a fresh export from a running Local site:

```bash
mysqldump --socket="/path/to/mysqld.sock" -u root -proot \
  --single-transaction --quick local > database/homemade-circus.sql
```

Sanitize secrets before committing if you plan to push the file to GitHub.

---

## Theme development

### Structure

```
HomemadeCircus/
├── assets/
│   ├── fonts/
│   ├── js/          # Source and minified JS
│   └── scss/        # Source styles (Bootstrap 4 base)
├── inc/
├── page-templates/
├── database/        # SQL export
├── style.css        # Compiled theme stylesheet
├── functions.php
├── header.php
├── footer.php
└── content.php
```

### Styles

Source SCSS lives in `assets/scss/`. The compiled output is `style.css`. The project was built with [CodeKit](https://codekitapp.com/) (`config.codekit3`).

After editing SCSS, recompile to `style.css` using CodeKit or your own Sass build.

### JavaScript

- Source: `assets/js/main.js`, `assets/js/plugins/`
- Enqueued minified files: `assets/js/min/main.min.js`, `assets/js/min/plugins.min.js`

### Custom post types & fields

- Activities and other content types are registered via plugins/ACF (stored in the database).
- Global options (footer, strapline, sign-up popup, etc.) are ACF **Options** pages.
- Member-only content uses MemberPress (`mepr-active` capability checks in templates).

### Menus

The theme registers these menu locations:

- Primary Menu
- Home Menu
- Help and Info Menu
- Planning Your Workshop
- Footer Menu

Assign menus under **Appearance → Menus** after import.

---

## Git notes

If `git commit` fails with an unknown `--trailer` option, use Apple’s system Git:

```bash
/usr/bin/git commit -m "Your message"
```

---

## Security & privacy

- The database contains **user accounts, email addresses, and site content**. Treat the repo accordingly — a **private** GitHub repository is recommended.
- Passwords in the export are hashed, but you should still change them on any shared or staging environment.
- Never commit un-sanitized database dumps; GitHub push protection will block API keys and secrets.
- Do not commit `wp-config.php`, `.env` files, or plugin licence keys.

---

## Deployment checklist

When moving to staging or production:

1. Import or sync the database.
2. Run URL search-replace to the live domain.
3. Install and licence required plugins.
4. Upload/sync `wp-content/uploads/`.
5. Reconfigure API keys (Mailchimp, Stripe, AWS, etc.).
6. Activate the theme and flush permalinks.
7. Test MemberPress login, forms, and gated activity pages.

---

## Credits

- **Site:** Upswing Aerial / Homemade Circus
- **Theme:** Based on WELLMADE Starter Theme
- **Photography:** Christopher Andreou
- **Website:** [You, Me + Everyone](https://www.youmeandeveryone.com)
