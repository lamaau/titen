<template>
  <Popover v-slot="{ open }" class="relative">
    <PopoverButton
      :class="open ? '' : 'text-opacity-90'"
      class="group inline-flex items-center rounded-md bg-orange-700 px-3 py-2 text-base font-medium text-white hover:text-opacity-100 focus:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-opacity-75"
    >
      <span>+</span>
    </PopoverButton>

    <transition
      enter-active-class="transition duration-200 ease-out"
      enter-from-class="translate-y-1 opacity-0"
      enter-to-class="translate-y-0 opacity-100"
      leave-active-class="transition duration-150 ease-in"
      leave-from-class="translate-y-0 opacity-100"
      leave-to-class="translate-y-1 opacity-0"
    >
      <PopoverPanel class="absolute z-10 mt-3 -translate-x-1/2 transform px-4">
        <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5">
          <div class="">
            <a v-for="item in solutions" :key="item.name" :href="item.href" class="bg-red-500f -m-3 flex items-center rounded-lg p-2 transition duration-150 ease-in-out">
              <div class="flex h-10 w-10 flex-shrink-0 items-center justify-center text-red-500 sm:h-12 sm:w-12">
                <div v-html="item.icon"></div>
              </div>
              <div class="ml-4">
                <p class="text-sm font-medium text-gray-900">
                  {{ item.name }}
                </p>
                <p class="text-sm text-gray-500">
                  {{ item.description }}
                </p>
              </div>
            </a>
          </div>
        </div>
      </PopoverPanel>
    </transition>
  </Popover>
</template>

<script>
import { Popover, PopoverButton, PopoverPanel } from "@headlessui/vue";
import { ChevronDownIcon } from "@heroicons/vue/solid";

export default {
  components: { Popover, PopoverButton, PopoverPanel, ChevronDownIcon },

  setup() {
    return {
      solutions: [
        {
          name: "Insights",
          description: "Measure actions your users take",
          href: "##",
          icon: `
            <svg
              width="48"
              height="48"
              viewBox="0 0 48 48"
              fill="none"
              aria-hidden='true'
              xmlns="http://www.w3.org/2000/svg"
            >
              <rect width="48" height="48" rx="8" fill="#FFEDD5" />
              <path
                d="M24 11L35.2583 17.5V30.5L24 37L12.7417 30.5V17.5L24 11Z"
                stroke="#FB923C"
                stroke-width="2"
              />
              <path
                fill-rule="evenodd"
                clip-rule="evenodd"
                d="M16.7417 19.8094V28.1906L24 32.3812L31.2584 28.1906V19.8094L24 15.6188L16.7417 19.8094Z"
                stroke="#FDBA74"
                stroke-width="2"
              />
              <path
                fill-rule="evenodd"
                clip-rule="evenodd"
                d="M20.7417 22.1196V25.882L24 27.7632L27.2584 25.882V22.1196L24 20.2384L20.7417 22.1196Z"
                stroke="#FDBA74"
                stroke-width="2"
              />
            </svg>
          `,
        },
      ],
    };
  },
};
</script>
