<script setup name="VNavigator">
import { ref } from "vue";
import { router } from "@inertiajs/vue3";

const props = defineProps({
 navigators: String,
});

const currentUrl = ref(null);

router.on("navigate", () => (currentUrl.value = route().current()));
</script>
<template>
 <ul class="space-y-2 pb-2">
  <li v-for="(navigator, index) in JSON.parse(navigators)" :key="index">
   <v-app-link
    v-if="!navigator.subItems.length"
    v-show="!navigator.native"
    :href="route().has(navigator.url) ? route(navigator.url) : '#'"
    :class="{
     'bg-emerald-100 text-emerald-500':
      route().has(navigator.url) && currentUrl === navigator.url ? true : false,
    }"
    class="p-2 flex group rounded-lg font-normal items-center transition-all hover:bg-emerald-100 hover:text-emerald-500 text-sm text-gray-900"
   >
    <v-icon :name="navigator.icon" type="outline" class="w-4 h-4" />
    <span class="ml-2">{{ navigator.name }}</span>
    <span
     v-show="navigator.badge"
     class="ml-auto mr-2 px-1 py-[1.6px] text-xs bg-purple-600 text-gray-200 rounded-md"
    >
     {{ navigator.badge }}
    </span>
   </v-app-link>
   <a
    v-show="navigator.native"
    v-if="!navigator.subItems.length"
    :href="route().has(navigator.url) ? route(navigator.url) : '#'"
    :class="{
     'bg-emerald-100 text-emerald-500':
      route().has(navigator.url) && currentUrl === navigator.url ? true : false,
    }"
    class="p-2 flex group rounded-lg font-normal items-center transition-all hover:bg-emerald-100 hover:text-emerald-500 text-sm text-gray-900"
   >
    <v-icon :name="navigator.icon" type="outline" class="w-4 h-4" />
    <span class="ml-2">{{ navigator.name }}</span>
    <span
     v-show="navigator.badge"
     class="ml-auto mr-2 px-1 py-[1.6px] text-xs bg-gray-900 text-gray-200 rounded-md"
    >
     {{ navigator.badge }}
    </span>
   </a>
   <a
    v-else
    class="p-2 flex group rounded-lg font-normal items-center transition-all hover:bg-emerald-100 hover:text-emerald-500 text-sm text-gray-900"
    :class="{
     'bg-emerald-100 text-emerald-500': navigator.subItems.filter((v) => v.url === currentUrl)
      .length,
    }"
   >
    <v-icon v-if="navigator.icon" :name="navigator.icon" type="outline" class="w-4 h-4" />
    <span class="ml-2">{{ navigator.name }}</span>
   </a>

   <template v-if="navigator.subItems.length">
    <transition name="slide">
     <ul
      class="mt-2 transition-all flex flex-col space-y-2 duration-100 relative border-l ml-4 border-gray-300"
     >
      <li v-for="(subNavigator, subIndex) in navigator.subItems" :key="subIndex">
       <v-app-link
        :href="route().has(subNavigator.url) ? route(subNavigator.url) : '#'"
        :class="{
         'text-emerald-500 font-bold font-sans':
          route().has(subNavigator.url) && currentUrl === subNavigator.url ? true : false,
        }"
        class="py-2 ml-2 flex text-sm rounded-lg transition font-normal duration-75 items-center text-gray-600 hover:text-emerald-500"
       >
        <v-icon
         v-if="subNavigator.heroicon"
         :name="subNavigator.heroicon"
         type="outline"
         class="w-4 h-4 duration-75 transition-all text-gray-500 hover:text-emerald-500"
        />

        <div
         v-else
         class="w-2 h-2 absolute -left-[5px] rounded-full bg-gray-600 border border-gray-100"
        ></div>

        <span class="ml-2">{{ subNavigator.name }}</span>
       </v-app-link>
      </li>
     </ul>
    </transition>
   </template>
  </li>
 </ul>
</template>
