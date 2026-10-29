# Broadside: design direction

A classic newspaper broadsheet for a personal blog. Ink on warm paper, a masthead, a
left rail of sections, one strong reading column, and a colophon footer.

Reading this as: editorial blog for readers who come to read, in a print broadsheet
language, dial ENERGY 2 / RHYTHM 2 / MOTION 1.

## Palette

| Token | Day | Night edition | Use |
|---|---|---|---|
| `--paper` | `#f4efe2` | `#14130f` | Page ground, newsprint warmth |
| `--paper-raise` | `#faf6eb` | `#1b1a14` | Inputs and comment fields only |
| `--ink` | `#1a1712` | `#ebe5d6` | Body text, rules, buttons |
| `--ink-soft` | `#57503f` | `#a9a18d` | Metadata, excerpts, captions |
| `--rule` | `#cfc6b0` | `#3a362b` | Hairlines between entries and widgets |
| `--accent` | `#8f3b1b` | `#d98a55` | Links, category labels, focus ring, quote rule |

Two cores (ink and paper) plus one accent (rust, the colour of a second ink run).
Neutral tints of the two cores do the rest. Verified contrast: ink/paper 15.56 day and
14.79 night, soft/paper 6.97 and 7.23, accent/paper 6.51 and 6.83. All text passes
WCAG AA, including the accent used for links and small labels.

## Typography

| Role | Face | Reason |
|---|---|---|
| Headlines and prose | Georgia, falling back to Iowan Old Style and Times | Georgia was drawn for low resolution screens and keeps the sturdy, slightly wide look of newspaper text at both 17px body size and 48px headline size, without a webfont request |
| Metadata, navigation, labels | Helvetica Neue / Arial stack | A neutral grotesque separates datelines, sections and navigation from the prose, which is how printed papers differentiate furniture from text |
| Numerals in the masthead and 404 | the serif face, tabular figures | Keeps figures aligned in a medium where columns matter |

Body copy is 17px with 1.7 line height and a 42rem measure, close to the 65 character
line a broadsheet column holds. Uppercase metadata is tracked at 0.08em, not the wide
0.2em that reads as a template label: it marks furniture without shouting.

## Dial and levers

- **ENERGY 2**: the masthead and the lead headline carry the page. There is one focal
  point per screen: the lead story on the index, the headline on a single entry.
- **RHYTHM 2**: the index is a lead story, then a dated ledger of shorter entries.
  Archive heads, the single entry and the 404 each use a different composition.
- **MOTION 1**: hover and focus states plus a 150ms colour transition when the edition
  changes. Nothing loops, nothing scrolls into view.

## Decisions and their reasons

- **Rules instead of cards.** Hairlines carry hierarchy, so entries sit on the page
  rather than float above it. No shadows, no radii except inputs at 0.
- **Left rail, content first in the markup.** The sidebar is visually left through grid
  placement, but it comes after the article in the DOM, so keyboard and screen reader
  users reach the writing first and phones get the rail after the text.
- **Category in rust, date in ink-soft.** Section and time are different facts; colour
  separates them without adding an icon.
- **Night edition toggle.** Reading happens at night, and reverting cream paper against
  a dark room is uncomfortable. The choice persists in localStorage and defaults to the
  operating system preference. Default paper stays light because the newsprint ground is
  the identity, not an arbitrary theme. The control sits in the colophon beside RSS, as a
  sun/moon icon that shows the edition you would switch to, so the masthead stays a plain
  nameplate.
- **Logo and wordmark.** The wordmark is the site title set in the masthead face, so the
  theme ships no invented brand mark. A custom logo can be uploaded in the Customizer;
  when one exists it sits to the left of the title, which stays because the site name is
  the masthead's job, not the file's.
- **Print styles.** A print sheet drops the rail, navigation and footer and keeps the
  text, because a broadsheet theme gets printed.
- **Home band.** A widget area sits between the posts page heading and the first entry on
  the blog home, first page only, so a carousel or a featured module drops in without a
  template edit. It prints nothing when empty and has no chrome of its own: widget titles
  carry the hairline rule and the lead story's 3px rule closes the area. It lives inside
  the reading column rather than across the shell, to keep the broadsheet grid intact.

## Assets not included

- `screenshot.png`: WordPress shows it in the theme browser. It is not artwork for the
  site and has no effect on the front end; add a 1200x900 capture of your own site.
- No demo images, no logo file, no avatars. Featured images and gravatars come from
  real content.
