Bootstrap Shortcodes for WordPress
===

This is a plugin for WordPress that adds shortcodes that set the contained elements to the height of the tallest contained element.

## Requirements

The plugin is tested to work with ```WordPress 3.9```.

## Supported shortcodes

### Equal Height (direct children)
	[equal-height] … [/equal-height]

### Equal Height (targetted child elements)
	[equal-height target=".col-md-6"] … [/equal-height]

#### [equal-height] parameters
Parameter | Description | Required | Values | Default
--- | --- | --- | --- | ---
target | The target element, class, or ID that should be made equal-height with the other elements or classes of the same name or type | optional | any text | none
