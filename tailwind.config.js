module.exports = {
    purge: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
    ],
    darkMode: false, // or 'media' or 'class'
    theme: {
        extend: {
            screens: {
                'xs': {'min': '300px', "max": "639px"},
            },
        },
    },
    variants: {
        extend: {},
    },
    plugins: [],
}
