# sc-shortcodes

[![Build Status](https://travis-ci.org/Softcatala/sc-shortcodes.svg?branch=master)](https://travis-ci.org/Softcatala/sc-shortcodes)
[![Stable Version](https://poser.pugx.org/softcatala/sc-shortcodes/v/stable)](https://packagist.org/packages/softcatala/sc-shortcodes)

This WordPress extension adds the possibility to create complex lists based on specific styles. Each type of list has a specific name and properties.

##List types

###llista-icones
Available options: gris, blanc, blancgris

Examples:

    [llista-icones color="blancgris"]
    calendar|Element title|Element description
    calendar|Element title|Element description
    calendar|Element title|Element description
    [/llista-icones]
    
    [llista-icones color="blanc"]
    calendar|Element title|Element description
    calendar|Element title|Element description
    calendar|Element title|Element description
    [/llista-icones]


    [llista-icones color="gris"]
    calendar|Element title|Element description
    calendar|Element title|Element description
    calendar|Element title|Element description
    [/llista-icones]
    

###llista-links

Example:

    [llista-links]
    icon|Element title|url
    icon|Element title|url
    icon|Element title|url
    icon|Element title|url
    icon|Element title|url
    [/llista-links]
