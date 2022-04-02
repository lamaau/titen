<template>
  <v-app-head :title="title" />

  <div :class="{ dark: dark }">
    <div class="flex min-h-screen w-full bg-gray-50 text-gray-700 dark:bg-cool-gray-600">
      <aside class="fixed inset-y-0 left-0 z-20 hidden h-screen w-[14rem] translate-x-0 flex-col overflow-hidden shadow-2xl duration-300 lg:z-0 lg:flex lg:translate-x-0">
        <header class="flex h-[4rem] shrink-0 items-center border-b px-6 dark:border-none dark:bg-cool-gray-800">
          <v-app-link class="mx-auto text-xl font-bold tracking-tight dark:text-gray-200" href="/"> INERTIA STARTER </v-app-link>
        </header>

        <!-- desktop navigator -->
        <navigator :navigator="app.navigator" />

        <footer class="flex shrink-0 items-center gap-3 border-t px-6 py-3 dark:border-none">
          <div
            class="h-11 w-11 rounded-full bg-cover bg-center"
            v-bind:style="{
              'background-image': 'url(' + auth.user.profile_picture + ')',
            }"
          ></div>

          <div>
            <p class="text-sm font-bold dark:text-gray-200">{{ auth.user.username }}</p>

            <p class="text-xs text-gray-500 hover:text-gray-700 focus:text-gray-700 dark:text-gray-300">
              <v-app-link href="/auth/logout" method="delete" as="button"> Logout </v-app-link>
            </p>
          </div>
        </footer>
      </aside>
      <div class="flex w-screen flex-1 space-y-6 lg:pl-[14rem]">
        <div class="w-full flex-1">
          <header class="flex h-[4rem] w-full shrink-0 items-center border-b dark:border-none dark:bg-cool-gray-700">
            <div class="flex w-full items-center px-2 sm:px-4 md:px-6 lg:px-8">
              <button class="text-primary-500 focus:bg-primary-500/10 flex h-10 w-10 shrink-0 items-center justify-center rounded-full hover:bg-gray-500/5 focus:outline-none lg:hidden">
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
              </button>

              <div class="flex flex-1 items-center justify-between">
                <div>
                  <!-- breadcrumb -->
                  <breadcrumb :items="app.breadcrumbs" />
                </div>

                <!-- search -->
                <div class="flex items-center">
                  <button @click.prevent="themeToggle" type="button">
                    <v-icon v-if="!dark" name="MoonIcon" class="h-6 w-6 text-cool-gray-600" type="outline" />
                    <v-icon v-else name="SunIcon" class="h-6 w-6 dark:text-purple-200" type="outline" />
                  </button>
                </div>
              </div>
            </div>
          </header>

          <div class="p-6">
            <!-- slot -->
            <slot />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import navigator from "~/components/navigator.vue";
import breadcrumb from "~/components/breadcrumb.vue";

export default {
  components: {
    navigator,
    breadcrumb,
  },
  props: {
    app: Object,
    auth: Object,
    title: String,
  },
  data() {
    return { dark: false };
  },
  mounted() {
    this.dark = this.getTheme();
  },
  methods: {
    themeToggle() {
      this.dark = !this.dark;
      this.setThemeToLocalStorage(this.dark);
    },
    setThemeToLocalStorage(value) {
      window.localStorage.setItem("dark", value);
    },
    getTheme() {
      // if the local storage have dark value
      if (window.localStorage.getItem("dark")) {
        return JSON.parse(window.localStorage.getItem("dark"));
      }

      // else return their preferences
      return !!window.matchMedia && window.matchMedia("(prefers-color-scheme: dark)").matches;
    },
  },
};
</script>
