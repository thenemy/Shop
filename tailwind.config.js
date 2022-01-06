const colors = require('tailwindcss/colors')
module.exports = {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
    ],
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
