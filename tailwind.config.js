const colors = require('tailwindcss/colors')
module.exports = {

    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
    ],
    theme: {
        extend: {
            flexBasis: {
                '1/12': "8.3333333%",
                '1/14': "7.14285714%",
                'bar': "5%",
                '2/4': '50%',
            },
            colors: {
                gray: colors.neutral,
                sidebar: '#191919'
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
