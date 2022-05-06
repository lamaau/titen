<template>
  <div>
    <div class="grid w-full grid-cols-1 gap-4 xl:grid-cols-2 2xl:grid-cols-3">
      <div
        class="dark:border-cool-gray-600 rounded-lg border bg-white p-4 shadow sm:p-6 xl:p-8 2xl:col-span-2"
      >
        <!--  -->
      </div>
      <div class="rounded-lg border bg-white p-6 shadow">
        <div class="mb-4 flex items-center justify-between">
          <div>
            <h3 class="mb-2 text-xl font-bold text-gray-900">
              Pembelian Terbaru
            </h3>
            <span class="text-base font-normal text-gray-500"
              >Daftar pembelian barang terbaru</span
            >
          </div>
          <div class="flex-shrink-0">
            <v-app-link
              href="/logistics/purchase"
              class="rounded-lg p-2 text-sm font-medium text-purple-600 hover:bg-gray-100"
              >Lihat Semua</v-app-link
            >
          </div>
        </div>
        <div class="mt-8 flex flex-col">
          <div class="overflow-x-auto rounded-lg">
            <div class="inline-block min-w-full align-middle">
              <div class="overflow-hidden shadow sm:rounded-lg">
                <table class="min-w-full">
                  <thead>
                    <tr>
                      <th
                        scope="col"
                        class="p-4 text-left text-xs font-medium uppercase tracking-wider text-gray-500"
                      >
                        Kode
                      </th>
                      <th
                        scope="col"
                        class="p-4 text-left text-xs font-medium uppercase tracking-wider text-gray-500"
                      >
                        Jumlah
                      </th>
                      <th
                        scope="col"
                        class="p-4 text-left text-xs font-medium uppercase tracking-wider text-gray-500"
                      >
                        Biaya
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="border-t transition hover:bg-gray-100">
                      <!--  -->
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import { defineComponent } from "vue";

export default defineComponent({
  setup() {
    //
  },
});
</script>
