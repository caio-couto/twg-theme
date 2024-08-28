/** @type {import('tailwindcss').Config} */
module.exports =
{
  content: ["./*.php", "./**/*.php"],
  theme:
  {
    extend:
    {
      fontFamily:
      {
        "open-sans": "Open Sans, sans-serif"
      },
      maxWidth:
      {
        "screen-content": "50rem",
        "screen-xxl": "90rem"
      },
      padding:
      {
        "54": "13.563rem"
      }
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
