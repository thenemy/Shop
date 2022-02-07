const colors = require('tailwindcss/colors')
module.exports = {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue'
    ],
    daisyui: {
        themes: [
            {
                'custom': {                          /* your theme name */
                    'primary' : '#a991f7',           /* Primary color */
                    'primary-focus' : '#8462f4',     /* Primary color - focused */
                    'primary-content' : '#ffffff',   /* Foreground content color to use on primary color */

                    'secondary' : '#f6d860',         /* Secondary color */
                    'secondary-focus' : '#f3cc30',   /* Secondary color - focused */
                    'secondary-content' : '#ffffff', /* Foreground content color to use on secondary color */

                    'accent' : '#37cdbe',            /* Accent color */
                    'accent-focus' : '#2aa79b',      /* Accent color - focused */
                    'accent-content' : '#ffffff',    /* Foreground content color to use on accent color */

                    'neutral' : '#3d4451',           /* Neutral color */
                    'neutral-focus' : '#2a2e37',     /* Neutral color - focused */
                    'neutral-content' : '#ffffff',   /* Foreground content color to use on neutral color */

                    'base-100' : '#ffffff',          /* Base color of page, used for blank backgrounds */
                    'base-200' : '#f9fafb',          /* Base color, a little darker */
                    'base-300' : '#d1d5db',          /* Base color, even more darker */
                    'base-content' : '#1f2937',      /* Foreground content color to use on base color */

                    'info' : '#2094f3',              /* Info */
                    'success' : '#12c436',           /* Success */
                    'warning' : '#ff9900',           /* Warning */
                    'error' : '#ff5724',             /* Error */
                },
            },
        ]
    },
    theme: {
        colors: colors,
        extend: {
            fontFamily: {
                'sans': ['Roboto', 'Helvetica', 'Arial', 'sans-serif']
            },
            flexBasis: {
                '1/12': "8.3333333%",
                '1/14': "7.14285714%",
                'bar': "5%",
                '2/4': '50%',
            },
            colors: {
                black_custom: "#525252",
                filter_color: "#43c7d7",
                gray: colors.neutral,
                green: colors.emerald,
                sidebar: '#191919',
                background: "#EEEEEE",
                side_elem: "#91a7c6",
                open_items: "#303F52",
                side_border: "#43c7d7",
                side_hovering: "#30b5e1",
                table_color: "#898989",
                title_color: '#626262'
            },
            screens: {
                'xs': {'min': '300px', "max": "639px"},
            },
            transitionProperty: {
                'width': 'width'
            },
        },
    },

    plugins: [
        require('daisyui'),
    ],
}
