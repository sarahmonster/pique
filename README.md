# Pique

Pique is a one-page scrolling theme for your business needs. It's great for businesses, event promotion, and probably other stuff too.

Note: this is not ideal from a setup perspective!

## Setting up your front page

When you first activate Pique, your homepage will display posts in a traditional blog format. To set up your one-page template as the homepage, follow these steps:

* Create or edit a page, and assign it the Front Page Template from the Page Attributes box.
* Go to Settings → Reading and set “Front page displays” to “A static page.”
* Select the page created in Step One as “Front page,” and choose another page as “Posts page” to display your blog posts.

The Front Page Template is pretty bare-bones on its own. It displays a single panel with a full-screen featured image, your site logo and navigation, and your page content.

To get your one-page site set up, you'll need to add some more panels.

### Adding more panels

Each "panel" is a page. To add additional panels to your Front Page, follow these steps:

* Create or edit a page.
* From the [Page Attributes box](https://en.support.wordpress.com/pages/page-attributes/), set the parent page as your Front Page.

Panels will display in according to the Order set in Page Attributes.

To add items to the grid, create additional pages and set their parent page in the Page Attributes box to the grid page you just created. Be sure to set a featured image for each child page if you want an image to show up inside the grid. Repeat these steps for every item you want to display in the grid.

### Using page templates

Pique comes with a number of page templates, designed to give you flexibility in the way you arrange your content.
To use a page template, edit your page and select the template you'd like under Page Attributes.

#### Grid Template

The Grid Page template is designed to show child pages in a grid format. This is good for showcasing your services or featuring your staff.

To get started, first create or edit a page, and assign it to the Grid Page template from the Page Attributes box. The content of this page (if any) will be displayed above the grid.

To add an item to the grid, create a second page and set its parent page to the grid page you just created. Be sure to set a featured image for each child page if you want an image to show up inside the grid. Repeat these steps for every item you want to display in the grid.

#### Full-Width Template

The Full-Width template gives you more space for your content. It’s the perfect way to showcase a gallery of images or a video.

#### Testimonials Template

This panel will show two testimonials, selected at random. When the page is refreshed, two different testimonials will display, allowing your customers to see a rotating display of your testimonials.

To add a testimonial, go to Testimonials → Add New in your dashboard. Testimonials are composed of the testimonial text, the name of the customer (added as testimonial title), and an image or logo (which can be added as a Featured Image).

You may wish to display supplementary information about your testimonial author, like their job title or company. Pique can show this information with a different formatting so it's visually distinct from the name. To make use of this, add `<span>` and `</span>` tags around your supplementary text, for example:

`Groucho Marx, <span>Marx Brother and general mischief-maker</span>`

#### Displaying your recent blog posts

You can show a panel of the four most recent blog posts by adding the page you selected as your “Posts page” above as a child page of your Front Page.

## Special Formatting

### Using icons

Pique comes packaged with the Font Awesome icon library so that you have easy access to hundreds of icons. To use an icon, find the icon you're looking for on [Font Awesome's website](http://fortawesome.github.io/Font-Awesome/icons/) and copy the code provided.

Open any page or post for editing. Select Text in your editor tab, then add this code where you'd like the icon to appear.

### Call-to-action buttons

You can add call-to-action buttons to your site by using the following code:

```
<a href="#" class="button">Learn more</a>
<a href="#" class="button minimal">Try it out</a>
```

### Adding a background to panel text

Sometimes, you may want to show a smaller area of content with a solid background. This is especially useful if you'd like to show a map in the background, with your content information overlaid on top.

```
<div class="overlay alignright">
This overlay will be aligned to the right-hand side of its panel.

You can add whatever content you'd like here.
</div>
```

This works particularly nicely when combined with a Full-Width Template.

## Site Logo

Your logo is an important part of your brand identity, so Pique supports a Site Logo. To add your logo, go to Customize → Site Title. Your logo will appear on the first panel of your site, as well as in your navbar.

## Custom Menus

Pique allows you to have two Custom Menus: one in the theme’s header and one in the footer. To set up your menus, go to Appearance → Menus.

### Primary Menu

The Primary Menu will display at the top of your page. To add links to panels of your Front Page, just add the page to your menu. The theme will handle the rest and make sure it links to the right spot!

### Secondary Menu

The Secondary Menu has been designed to provide quick links for your visitors. It only supports top-level links; if you have a child link, it won’t be displayed. The Secondary Menu will be displayed in the footer of your site. It's a good place to put Terms & Conditions and a Privacy Policy, or quick links to important pages on your site. Alternatively, you could use this area to add your social media links.

### Social media links

Pique doesn't have a specific menu just for social media links, but it offers two excellent spots to put them. You can use a [Social Media Icons Widget](https://en.support.wordpress.com/widgets/social-media-icons-widget/) in one of the three footer widget areas, or you can use the secondary menu for your social media links.

Pique supports the following networks: (any icon used in FontAwesome). Adding a social media link will automatically show the icon.

## Testimonials

Pique features testimonials in two ways:

* The dedicated testimonial archive page displays all testimonials in reverse chronological order, with the newest displayed first.
* The Testimonials Template displays two random testimonials. (If you prefer to select which two testimonials are displayed on the homepage, add the number 1 or 2 to the Order field in the Page Attributes box on the testimonial edit screen. --> Maybe add as enhancement?)

### Testimonial archive page

All testimonials are displayed on the testimonial archive page. This page can be added to a Custom Menu using the Links Panel.

The testimonial archive page can be found at http://mygroovysite.wordpress.com/testimonial/ — just replace http://mygroovysite.wordpress.com/ with the URL of your website.

This page can be further customized by adding a title, intro text, and featured image via Customizer → Testimonials. This content will appear above the testimonials list.
