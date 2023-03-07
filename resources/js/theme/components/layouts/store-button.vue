<template>
  <div class="md:absolute md:bottom-0 w-full">
    <hr class="w-full border-t" />
    <div class="pt-3 flex items-center gap-3">
      <div class="flex flex-row items-center space-x-2">
        <div
          class="w-10 h-10 bg-gray-800 rounded items-center justify-center flex"
        >
          <v-icon
            name="BuildingStorefrontIcon"
            type="outline"
            class="w-8 h-8 text-white"
          />
        </div>
        <div class="flex flex-col space-y-[9px]">
          <a
            :href="route('client.stores.index')"
            target="blank"
            class="font-bold flex flex-row items-center duration-300 transition-all hover:text-indigo-500"
          >
            <span>App Store</span>
            <v-icon
              type="outline"
              name="ArrowTopRightOnSquareIcon"
              class="w-4 h-4 text-gray-800 ml-1.5"
            />
          </a>
          <span class="text-[10px] text-gray-500">Find item to buy..</span>
        </div>
      </div>
    </div>
  </div>
</template>
