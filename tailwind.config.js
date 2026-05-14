/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    corePlugins: {
        preflight: false, // Prevent Tailwind from overriding Bootstrap styles globally during migration
    },
    theme: {
        extend: {
            colors: {
                primary: {
                    DEFAULT: '#2563EB', // Blue 600
                    light: '#60A5FA', // Blue 400
                    dark: '#1E40AF', // Blue 800
                },
                secondary: {
                    DEFAULT: '#0EA5E9', // Sky 500
                    light: '#38BDF8', // Sky 400
                    dark: '#0369A1', // Sky 700
                },
                accent: {
                    DEFAULT: '#F59E0B', // Amber 500
                },
                dark: '#0F172A', // Slate 900
                light: '#F8FAFC', // Slate 50
                gray: {
                    50: '#F9FAFB',
                    100: '#F3F4F6',
                    200: '#E5E7EB',
                    800: '#1F2937',
                    900: '#111827',
                }
            },
            fontFamily: {
                sans: ['Outfit', 'Inter', 'sans-serif'],
                heading: ['Outfit', 'sans-serif'],
            },
            boxShadow: {
                'soft': '0 4px 20px -2px rgba(0, 0, 0, 0.05)',
                'card': '0 10px 40px -10px rgba(0,0,0,0.08)',
                'glow': '0 0 20px rgba(37, 99, 235, 0.5)',
            },
            borderRadius: {
                'xl': '1rem',
                '2xl': '1.5rem',
                '3xl': '2rem',
            }
        },
    },
    plugins: [],
}
