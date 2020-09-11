module.exports = {
    purge: [],
    theme: {
        fontFamily: {
            'base': 'Inter',
            // 'base-ar': 'Tajawal' // I love this font for arabic
        },
        extend: {
            spacing: {
                '70': '20.125rem',
                '72': '42.375rem',
              }
        },
    },
    variants: {},
    plugins: [
        require('@tailwindcss/custom-forms'),
    ],
};
