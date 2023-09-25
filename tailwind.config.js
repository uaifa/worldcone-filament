import preset from './vendor/filament/support/tailwind.config.preset'
const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors');
/** @type {import('tailwindcss').config} */ 
export default {
    presets: [preset],
    content: [
        './app/Filament/**/*.php',
        './resources/views/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
    ],
    theme:{
        extends:{
            fontFamily:{
                sans:['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors:{
                danger: colors.rose,
                primary: colors.green,
                success: colors.blue,
                warning: colors.purple
            }
        }
    },
    plugins:[require('@tailwindcss/forms'), require('@tailwindcss/typography')],
}
