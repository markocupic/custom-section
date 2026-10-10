![Logo](https://github.com/markocupic/markocupic/blob/main/logo.png)

# Contao Custom Section
This bundle provides a Contao frontend module, that allows you to add content to your layout using a Twig template.

## Requirements

- PHP ^8.2
- Contao ^5.3 || ^6.0

## Usage

Create a template `mod_custom_section_*.html.twig` and select it in the module settings (field "custom template").
The key-value pairs of the "data" field are available in the template as `data`, e.g. `{{ data.my_key }}`.

Contao 6 no longer supports `.html5` templates.
