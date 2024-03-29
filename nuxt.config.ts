// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
  runtimeConfig: {
    public: {
      urlApi: process.env.API_URL ?? 'https://efarm.shiny.my.id/api',
    }
  },

  css: ['~/assets/css/main.css'],
  app: {
    head: {
      charset: 'utf-8',
      viewport: 'width=device-width, initial-scale=1',
      title: process.env.APP_NAME ?? "FIOEP Overstore",
      meta: [
        { name: 'description', content: 'FIOEP Overstore for amazing unecessary item.' },
        { property: 'og:title', content: process.env.APP_NAME ?? "FIOEP Overstore" },
        { property: 'og:description', content: 'FIOEP Overstore for amazing unecessary item.' },
        { property: 'og:image', content: "https://resume-beta.fioep.com/profile.jpg" }
      ],
      link: [
        {
          href: 'https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap',
          rel: "stylesheet"
        }
      ]
    }
  },
  devtools: { enabled: true },
  postcss: {
    plugins: {
      tailwindcss: {},
      autoprefixer: {},
    },
  },
  colorMode: {
    preference: 'light', // default value of $colorMode.preference
    fallback: 'light', // fallback value if not system preference found
    hid: 'nuxt-color-mode-script',
    globalName: '__NUXT_COLOR_MODE__',
    componentName: 'ColorScheme',
    classPrefix: '',
    classSuffix: '',
    storageKey: 'nuxt-color-mode'
  },
  shadcn: {
    /**
     * Prefix for all the imported component
     */
    prefix: '',
    /**
     * Directory that the component lives in.
     * @default "./components/ui"
     */
    componentDir: './components/ui'
  },
  modules: ['@nuxtjs/color-mode', '@pinia/nuxt',]
})