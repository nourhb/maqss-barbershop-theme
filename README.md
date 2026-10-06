# Maqss — Barbershop Block Theme

**Maqss** (مقصّ — "scissors") is a bold, editorial WordPress block theme built for modern barbershops. Dark, moody, poster-style typography, scrolling marquee strips and photo-rich patterns — a theme with attitude, built on Full Site Editing.

- **Author:** Nour El Houda Bouajila
- **Portfolio:** https://nour-el-houda-bouajila.rf.gd/
- **GitHub:** https://github.com/Nourhb
- **LinkedIn:** https://www.linkedin.com/in/nour-el-houda-bouajila
- **Version:** 1.0.0 · **License:** GPL-2.0-or-later · **Requires:** WordPress 6.4+, PHP 7.4+

## Features

- **Full Site Editing** — edit headers, footers, templates and every pixel with the block editor
- **Complete theme.json design system** — ink/coal/bone/amber/ember palette, Oswald display + Inter body type, fluid type scale, spacing scale, shadows
- **9 hand-built block patterns** — hero, marquee strip, services price list, animated stats band, photo gallery, barbers team, testimonials, opening hours, booking CTA
- **"Bone" style variation** — one-click light mode (bone-white backgrounds, ink text)
- **Photo-rich by default** — real barbershop photography wired into hero, gallery, team and hours patterns
- **Motion with manners** — scroll reveals, animated counters, marquee strip; all disabled under `prefers-reduced-motion`
- **Accessibility** — skip link, visible focus states, semantic landmarks, keyboard-friendly navigation
- **Translation-ready** — `maqss` text domain, `/languages` directory

## Installation

1. Download or clone this repository.
2. Copy the `maqss-barbershop-theme` folder into `wp-content/themes/` (rename the folder to `maqss` if you like).
3. In WordPress, go to **Appearance → Themes** and activate **Maqss**.
4. Open **Appearance → Editor** to customize templates, or insert any **Maqss** pattern from the block inserter.

No plugins required. Google Fonts (Oswald + Inter) load automatically; the theme works offline with system fallbacks.

## Pattern catalog

| Pattern | Slug | What it is |
|---|---|---|
| Hero Barber | `maqss/hero-barber` | Poster headline, photo, dual CTAs |
| Marquee Strip | `maqss/marquee-strip` | Infinite scrolling services ticker |
| Services & Prices | `maqss/services-prices` | Price list with dotted leaders |
| Stats Band | `maqss/stats-band` | Animated counters (years, cuts, rating) |
| Gallery of Cuts | `maqss/gallery-cuts` | 6-photo masonry-style gallery |
| Barbers Team | `maqss/barbers-team` | 4 barber profiles with photos |
| Testimonials | `maqss/testimonials` | 3 client reviews |
| Opening Hours | `maqss/opening-hours` | Hours table + shop photo + address |
| Booking CTA | `maqss/booking-cta` | Ember-gradient booking banner |

## Customization

- **Colors & fonts:** everything flows from `theme.json` — tweak the palette, type scale or spacing there.
- **Style variation:** switch to the **Bone** light style from the Site Editor's Styles panel.
- **Custom page templates:** `page-wide.html` (1400px canvas) and `page-no-title.html` are registered as page templates.
- **Block styles:** Cut outline (button), Big (quote), Card (group), Framed (image), Poster (heading).
- **Front-end script:** `assets/js/theme.js` handles the back-to-top button, scroll reveals and stat counters — vanilla JS, no dependencies.

## Design Previews

![Homepage](https://nour-el-houda-bouajila.rf.gd/wp-content/uploads/2026/10/maqss-main.png)

![Services & prices](https://nour-el-houda-bouajila.rf.gd/wp-content/uploads/2026/10/maqss-services.png)

![Mobile](https://nour-el-houda-bouajila.rf.gd/wp-content/uploads/2026/10/maqss-mobile.png)

![Bone light variation](https://nour-el-houda-bouajila.rf.gd/wp-content/uploads/2026/10/maqss-bone.png)

![Gallery](https://nour-el-houda-bouajila.rf.gd/wp-content/uploads/2026/10/maqss-gallery.png)

![Team](https://nour-el-houda-bouajila.rf.gd/wp-content/uploads/2026/10/maqss-team.png)

![Booking](https://nour-el-houda-bouajila.rf.gd/wp-content/uploads/2026/10/maqss-booking-scaled.png)

![Testimonials](https://nour-el-houda-bouajila.rf.gd/wp-content/uploads/2026/10/maqss-testimonials.png)

## Changelog

### 1.0.0
- Initial release: 8 templates, 2 template parts, 9 block patterns, Bone style variation, theme.js interactions, full a11y pass.

## License

GNU General Public License v2 or later — see `LICENSE`.
