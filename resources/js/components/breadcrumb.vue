<template>
  <div>
    <ul class="text-md hidden items-center text-sm font-medium lg:flex">
      <li class="flex items-center">
        <v-app-link
          href="/dashboard"
          class="dark:text-cool-gray-300 text-gray-800"
          >Dashboard</v-app-link
        >
        <svg
          v-if="items.length"
          class="dark:text-cool-gray-300 m-0 h-6 w-6 text-gray-300"
          viewBox="0 0 21 21"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="m12.5 3.5-4 14"
            fill="none"
            stroke="currentColor"
            stroke-linecap="round"
            stroke-linejoin="round"
          />
        </svg>
      </li>

      <li
        v-for="(item, index) in items"
        :key="index"
        :class="{
          'dark:text-cool-gray-200 flex items-center text-gray-500':
            !isLast(index),
        }"
      >
        <v-app-link
          v-if="!isLast(index)"
          :href="item.url"
          class="dark:text-cool-gray-200 text-gray-500"
        >
          {{ item.title }}
        </v-app-link>

        <v-app-link
          v-else
          href="#"
          class="dark:text-cool-gray-200 text-gray-500"
        >
          {{ item.title }}
        </v-app-link>

        <svg
          v-if="!isLast(index)"
          class="m-0 h-6 w-6 text-gray-300"
          viewBox="0 0 21 21"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="m12.5 3.5-4 14"
            fill="none"
            stroke="currentColor"
            stroke-linecap="round"
            stroke-linejoin="round"
          />
        </svg>
      </li>
    </ul>
  </div>
</template>
<script>
export default {
  props: {
    items: Object,
  },
  methods: {
    isLast(index) {
      return index === this.items.length - 1;
    },
  },
};
</script>
